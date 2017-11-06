<?php
/* Smarty version 3.1.29, created on 2017-08-01 16:03:11
  from "D:\www\yunjuke\application\admin\views\promotion_coupon_of_shopping_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598035bf6f6240_06455661',
  'file_dependency' => 
  array (
    '17b2c82a959dfe6f651cca26b4e9e037f5f404ac' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_coupon_of_shopping_edit.html',
      1 => 1492225885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598035bf6f6240_06455661 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '9625598035bf392e77_64314450';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .couponBox {
        overflow: inherit !important;
    }

    .couponBox {
        border: solid 1px #ddd;
        padding: 15px;
        overflow: hidden;
        width: 450px;
        height: 145px;
    }

    .couponWrap {
        width: 375px;
        height: 145px;
        border-radius: 4px;
        box-shadow: 0 0 1px 1px #efefef;
        text-align: left;
        float: left;
        color: #fff;
        background: #f44336;
    }

    .couponWrap .top {
        position: relative;
        height: 91px;
        padding: 12px 15px;
        border-radius: 4px 4px 0 0;
    }

    .couponWrap .top .couponName {
        font-size: 22px;
        height: 40px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        outline: 0 !important;
    }

    .couponWrap .top .type {
        font-size: 14px;
        height: 25px;
    }

    .couponWrap .bottom {
        height: 35px;
        padding: 0 15px;
        line-height: 36px;
        font-size: 12px;
    }
    .limit-res-box {
        max-height: 100px;
        overflow-y: auto;
        background-color: #F5F5F5;
        margin-right: 50px;
        padding: 5px;
        border-radius: 3px;
        overflow-x:visible;
        overflow-y:scroll; 
    }
    .limit-close-btn {
        right: 5px;
        top: 3px;
        cursor: pointer;
        color: red;
        position: absolute;
    }
    .rel {
        position: relative;float: left;
    }
    .pl-list-nav {
        padding: 10px 10px 0 10px;
        background: #F7F7F7;
    }
    .pl-list-nav a:hover, .pl-list-nav a.active {
        border-color: #428BCA;
        color: #428BCA;
    }
    .pl-list-nav a {
        display: inline-block;
        color: #888;
        font-weight: bold;
        padding: 2px 5px;
        margin-bottom: 5px;
        margin-right: 6px;
        -webkit-transition: all .2s linear;
        transition: all .2s linear;
        border-bottom: 2px solid #F7F7F7;
    }
    #chkAllPL {
        padding: 3px 10px;
        border: 1px solid #F90;
        color: #f90;
    }
    #chkAllPL.active, #chkAllPL:active {
        background: #f90 !important;
        color: #fff;
    }
    .pl-list-leaf a {
        display: inline-block;
        border: 1px solid #EAEAEA;
        text-align: center;
        margin-right: 6px;
        padding: 3px 10px;
        margin-bottom: 10px;
        color: #888;
        -webkit-transition: all .2s linear;
        transition: all .2s linear;
    }
    .pl-list-leaf a:hover {
        border-color: #428BCA;
    }
    .pl-list-leaf a:active, .pl-list-leaf a.active1 {
        border-color: #428BCA;
        background-color: #428BCA !important;
        color: #fff;
    }
    .l {
        float: left;
    }
</style>

<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
                <div class="subject">
                    <h3>买后送券-<?php if (isset($_smarty_tpl->tpl_vars['cpaos_id']->value)) {?>编辑<?php } else { ?>添加<?php }?>活动</h3>
                    <h5>平台中的买后送券的管理</h5>
                </div>
            </div>
        </div>
        <!-- 操作说明 -->
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span> </div>
            <ul>
                <li> 平台中的买后送券的管理</li>
                <li> 优惠券信息只能在添加的时候编辑，不能二次修改，请谨慎填写</li>
            </ul>
        </div>
        <form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
            <?php if (isset($_smarty_tpl->tpl_vars['cpaos_id']->value)) {?>
            <input type="hidden" name="cpaos_id" value="<?php if (isset($_smarty_tpl->tpl_vars['cpaos_id']->value)) {
echo $_smarty_tpl->tpl_vars['cpaos_id']->value;
}?>">
            <?php }?>
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label for="class_name"><em>*</em>券码生成方式：</label>
                    </dt>
                    <dd class="opt">
                        <?php if (isset($_smarty_tpl->tpl_vars['activity']->value)) {?>
                        <span>
                        <?php if ($_smarty_tpl->tpl_vars['activity']->value['cpaos_create_type'] == 1) {?>系统生成<?php } else { ?>自有券码导入<?php }?>
                        <input type="hidden" name="activit[cpaos_create_type]" value="<?php if (isset($_smarty_tpl->tpl_vars['activity']->value)) {
echo $_smarty_tpl->tpl_vars['activity']->value['cpaos_create_type'];
}?>">
                        </span>
                        <?php } else { ?>
                        <div class="area-region-select">
                            <input type="radio" id="coupon_create1" checked  name="activit[cpaos_create_type]" onclick="setCouponCreate(this.value)" value="1"><label for="coupon_create1">系统生成</label>
                            <input type="radio" id="coupon_create2"  name="activit[cpaos_create_type]" onclick="setCouponCreate(this.value)" value="2"><label for="coupon_create2">自有券码导入</label>
                            <span class="err"></span></div>
                        <?php }?>
                        <p class="notic">导入的外部券码库通过洽客活动进行发放设置后，消费者领取到券后，显示的券码为外部券码库中的券码</p>
                    </dd>
                </dl>

                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>优惠券：</label>
                    </dt>
                    <dd class="opt">
                        <div class="couponBox">
                            <div class="couponWrap" style="background-color: rgb(244, 67, 54);">
                                <div class="top">
                                    <div class="couponName"><?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {
echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_name'];
}?></div>
                                    <div class="type">
                                        <span class="couponValue"><?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {
echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_denomination'];
} else { ?>0.00<?php }?></span>元优惠券,满<span class="orderLimitValue"><?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {
echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_order_limit'];
} else { ?>0.00<?php }?></span>元可用
                                    </div>
                                </div>
                                <div class="bottom">
                                    <span class="r" id="couponDateLimit">
                                        <span class="couponstart"></span><?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {
echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_start_time'];
}?> - <?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {
echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_end_time'];
}?><span class="couponend"></span>
                                    </span>
                                </div>
                            </div>
                            <?php if (isset($_smarty_tpl->tpl_vars['coupons']->value)) {?>
                            <a href="javascript:;" onclick="seeCoupon(<?php echo $_smarty_tpl->tpl_vars['coupons']->value['coupon_id'];?>
)" class="btn  ml20 mt20 btn-warning radius">查看</a>
                            <?php } else { ?>
                            <a href="javascript:;" id="editCoupon" class="btn  ml20 mt20 btn-warning radius">编辑</a>
                            <?php }?>
                        </div>
                        <span class="err"></span>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row" id="importexcel" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_create_type'] == 2) {
} else { ?>style="display: none;"<?php }?>>
                    <dt class="tit">
                        <label for="class_sort">导入券码：</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div>
                        <span class="err"></span>

                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>发放时间：</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <input type="text" id="start_time" onclick="laydate()" value="<?php if (isset($_smarty_tpl->tpl_vars['activity']->value)) {
echo $_smarty_tpl->tpl_vars['activity']->value['cpaos_start_time'];
}?>" name="activit[cpaos_start_time]" placeholder="开始时间">至
                            <input type="text" id="end_time" onclick="laydate()" value="<?php if (isset($_smarty_tpl->tpl_vars['activity']->value)) {
echo $_smarty_tpl->tpl_vars['activity']->value['cpaos_end_time'];
}?>" name="activit[cpaos_end_time]" placeholder="结束时间">
                            <span class="err"></span></div>
                        <span class="err"></span>
                    </dd>
                </dl>
                <div class="title">
                    <h3>活动限制：发放数量限制</h3>
                </div>
                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>发放总量</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid input-text input_text limit_state" id="coupon_to_store" name="activit[cpaos_amount_limit_st]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_amount_limit_st'] == 1) {?>selected<?php }?>>不限量</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_amount_limit_st'] == 1) {?>selected<?php }?>>限量</option>
                            </select>
                            <input type="text" name="activit[cpaos_amount]" 
                                   <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_amount_limit_st'] == 1) {?>value="<?php echo $_smarty_tpl->tpl_vars['activity']->value['cpaos_amount'];?>
"
                                   <?php } else { ?>style="display: none;" value="0"<?php }?> placeholder="不可修改" id="cpaos_amount" class="input-text input_text " maxlength="8"   >
                        </div>
                    </dd>
                </dl>
                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>每日限量</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid  input-text input_text limit_state" id="cpaos_day_amount" name="activit[cpaos_day_limit_st]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_day_limit_st'] != 1) {?>selected<?php }?>>不限量</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_day_limit_st'] == 1) {?>selected<?php }?>>限量</option>
                            </select>
                            <input type="text" name="activit[cpaos_day_amount]"  
                                   <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpaos_day_limit_st'] == 1) {?>value="<?php echo $_smarty_tpl->tpl_vars['activity']->value['cpaos_day_amount'];?>
"
                                   <?php } else { ?>style="display: none;" value="0"<?php }?>  placeholder="不可修改" id="cpaos_day_amount" class="input-text input_text" maxlength="8">
                        </div>
                    </dd>
                </dl>

                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>每人限领</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid  input-text input_text limit_state" id="coupon_to_store" name="activit[cpapos_peru_amount]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpapos_peru_amount'] != 1) {?>selected<?php }?>>不限量</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpapos_peru_amount'] == 1) {?>selected<?php }?>>限量</option>
                            </select>
                            <input type="text" name="activit[cpapos_peru_amount]"  
                                   <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['cpapos_peru_amount'] == 1) {?>value="<?php echo $_smarty_tpl->tpl_vars['activity']->value['cpapos_peru_amount'];?>
"
                                   <?php } else { ?>style="display: none;" value="0"<?php }?> placeholder="不可修改" id="cpapos_peru_amount" class="input-text input_text" maxlength="8">
                        </div>
                    </dd>
                </dl>
                <div class="title">
                    <h3>活动限制：指定商品/指定门店/订单金额</h3>
                </div>
                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>需购买指定商品</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid input-text input_text limit_state" id="coupon_limit_type" name="activit[limit_goods_type]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] > 0) {
} else { ?>selected<?php }?>>无限制</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] == 1) {?>selected<?php }?>>类目限制</option>
                                <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] == 2) {?>selected<?php }?>>商品限制</option>
                                <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] == 3) {?>selected<?php }?>>品牌限制</option>
                            </select>
                            <input name="activit[limit_goods]" type="hidden" id="limit_goods" value="<?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] > 0) {
echo $_smarty_tpl->tpl_vars['activity']->value['limit_goods'];
}?>">
                            <input class="btn btn-link radius" type="button" id="BtnLimitGoods" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] > 0) {
} else { ?>style="display:none"<?php }?> name="BtnLimitStore" value="编辑"></br>
                            <div id="limitResBox" class="limit-res-box mt-5" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] > 0) {
} else { ?>style="display:none"<?php }?>>
                                <?php if (isset($_smarty_tpl->tpl_vars['limit_goods']->value)) {?>
                                <?php if ($_smarty_tpl->tpl_vars['activity']->value['limit_goods_type'] == 1) {?>
                                 <?php
$_from = $_smarty_tpl->tpl_vars['limit_goods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                    <div> <b><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
: </b><?php echo $_smarty_tpl->tpl_vars['v']->value['value'];?>
</div>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
                                <?php } else { ?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['limit_goods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_1_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                <div data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="rel dib w150 ell pr20 mr5">
                                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span><i class="iconfont limit-close-btn" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"></i>
                                </div>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
if ($__foreach_v_1_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_1_saved_key;
}
?>
                                <?php }?>
                                <?php }?>
                            </div>
                            <p class="notic">只要订单内含有以上任一商品才会赠送该券，示例：设置商品A、商品B，若其它限制条件都满足，则订单只要含有商品A或商品B即可赠送优惠券。</p>
                    </dd>
                </dl>
                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>指定门店</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid input-text input_text" id="limit_stores_type" name="activit[limit_stores_type]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_stores_type'] != 1) {?>selected<?php }?>>全部门店</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_stores_type'] == 1) {?>selected<?php }?>>限制部分门店</option>
                            </select>
                            <input type="hidden" id="limit_store" name="activit[limit_stores]" value="<?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_stores_type'] > 0) {
echo $_smarty_tpl->tpl_vars['activity']->value['limit_stores'];
}?>">
                            <input class="btn btn-link radius" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_stores_type'] > 0) {
} else { ?>style="display:none"<?php }?> type="button" id="BtnLimitStore" name="BtnLimitStore" value="编辑"></br>
                            <div id="LimitStoreResBox" class="limit-res-box mt-5" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_stores_type'] > 0) {
} else { ?>style="display:none"<?php }?>>
                                 <?php if (isset($_smarty_tpl->tpl_vars['limit_stores']->value)) {?>
                                 <?php
$_from = $_smarty_tpl->tpl_vars['limit_stores']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_2_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                 <div data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="rel dib w150 ell pr20 mr5">
                                    <span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span><i class="iconfont limit-close-btn" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"></i>
                                </div>
                                 <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
if ($__foreach_v_2_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_2_saved_key;
}
?>
                                 <?php }?>
                            </div>
                            <p class="notic">只有在以上门店消费付款才会赠送该券</p>
                    </dd>
                </dl>

                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>订单限额</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid  input-text input_text limit_state" id="limit_order_type" name="activit[limit_order_type]">
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_order_type'] != 1) {
} else { ?>selected<?php }?>>不限金额</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_order_type'] == 1) {?>selected<?php }?>>限金额</option>
                            </select>
                            <input type="text" name="activit[limit_order_fee]"  
                                   <?php if (isset($_smarty_tpl->tpl_vars['activity']->value) && $_smarty_tpl->tpl_vars['activity']->value['limit_order_type'] == 1) {?>value="<?php echo $_smarty_tpl->tpl_vars['activity']->value['limit_order_fee'];?>
"
                                   <?php } else { ?>style="display: none;" value="0"<?php }?> placeholder="不可修改" id="limit_order_fee" class="input-text input_text" maxlength="8">
                        </div>
                        <p class="notic">示例：购买后送券活动，若订单金额设置为100元，则订单金额≥100元的订单才会赠送该券。</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort">活动备注</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="activit[cpaos_desc]" rows="6" class="tarea" id="cpaos_desc"></textarea>
                        <span class="err"></span>

                    </dd>
                </dl>

                <div class="bot">
                    <a id="submit" href="javascript:void(0)" class="btn btn-success radius">确认提交</a>
                </div>
            </div>
        </form>
    </div>

    <div id="goTop">
        <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
        <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
    </div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
    var coupon_info = '';  //优惠券信息序列化
    var coupon_flag = false;
    var limitResBox = "";
    var LimitStoreResBox = "";
    laydate({
        elem: '#start_time', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        format: 'YYYY/MM/DD hh:mm:ss',
        event: 'focus', //触发事件
        istime: true
    });
    laydate({
        elem: '#end_time', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
        format: 'YYYY/MM/DD hh:mm:ss',
        event: 'focus', //触发事件
        istime: true
    });
    function setCouponCreate(sRadioValue) { //传入radio的name和选中项的值
        if (sRadioValue == 1) {
            document.getElementById("importexcel").style.display = 'none';
        } else {
            document.getElementById("importexcel").style.display = 'block';
        }
    }

    $(document).ready(function () {
        $("select.limit_state").change(function () {
            if ($(this).val() == 1) {
                $(this).next("input").attr('style','display: inline;');
            } else {
                $(this).next("input").attr('style','display: none;');
            }
        });
        //叉叉图标
        $(".limit-res-box").on('click','i.limit-close-btn',function () {
            var val = $(this).data('id');
            console.log($(this).parents('div.area-region-select').find("input[type='hidden']").val());
            if($(this).parents('div.area-region-select').find("input[type='hidden']").length>0){
                var id = $(this).data("id");
                var val = $(this).parents('div.area-region-select').find("input[type='hidden']").val();
                var val_arr = val.split(',');
                if($.inArray(id.toString(),val_arr)>-1){
                    val_arr.splice($.inArray(id.toString(),val_arr),1);
                    val = val_arr.join(',');
                    $(this).parents('div.area-region-select').find("input[type='hidden']").val(val);
                }
            }
            $(this).parent('div').remove();

        })
        $("#editCoupon").click(function() {
            layer.open({
                type: 2,
                title: '<b>编辑优惠券</b>',
                btn: ['确认', '取消'],
                skin: 'layui-layer-rim', //加上边框
                area: ['90%', '80%'], //宽高
                content: "PromotionCouponEdit?"+coupon_info+"&limitResBox="+limitResBox+"&LimitStoreResBox="+LimitStoreResBox,
                yes: function (index,layero) {
                    var obj = document.getElementById("layui-layer-iframe"+index).contentDocument;
                    $(obj).find('#coupon_form').validate({
                        errorPlacement: function (error, element) {
                            __formSubmit = false;
                            $(element).nextAll('span.err').append(error);
                        },
                        rules: {
                            "coupon_name": {
                                required: true,
                            },
                            "coupon_denomination": {
                               required: true,
                               min:0.01
                            },
                            "coupon_order_limit": {
                               required: true,
                               min:0.01
                            },
                            "limit_goods_type" : {
                                required    : true,
                             },
                            "limit_store_type": {
                                required: true,
                            },
                            "coupon_start_time" : {
                                required    : true
                             },
                            "coupon_end_time": {
                                required: true
                            },
                            "coupon_desc": {
                                required: true
                            }
                        },
                        messages: {
                            "coupon_name": {
                                required: '<i class="fa fa-exclamation-circle"></i>优惠券名称必填',
                            },
                            "coupon_denomination": {
                               required: '<i class="fa fa-exclamation-circle"></i>优惠券面值必填',
                               min:'<i class="fa fa-exclamation-circle"></i>优惠券面值至少大于0.01'
                            },
                            "coupon_order_limit": {
                                required: '<i class="fa fa-exclamation-circle"></i>优惠券订单满足条件必填',
                                min:'<i class="fa fa-exclamation-circle"></i>优惠券满足条件至少大于0.01'
                            },
                            "coupon_limit_type": {
                                required: '<i class="fa fa-exclamation-circle"></i>限制条件必选',
                                min: '<i class="fa fa-exclamation-circle"></i>限制条件必选',
                            },
                            "limit_store_type": {
                                required: '<i class="fa fa-exclamation-circle"></i>可使用门店必选',
                                min: '<i class="fa fa-exclamation-circle"></i>可使用门店必选',
                            },
                            "coupon_start_time": {
                                required: '<i class="fa fa-exclamation-circle"></i>有效期开始时必填'
                            },
                            "coupon_end_time": {
                                required: '<i class="fa fa-exclamation-circle"></i>有效期结束时必填'
                            },
                            "coupon_desc": {
                                required: '<i class="fa fa-exclamation-circle"></i>使用说明必填'
                            }
                        }
                    });
                    if($(obj).find('#coupon_form').valid()){
                        coupon_info = $(obj).find('#coupon_form').serialize();
                        $("div.couponName").html($(obj).find('#coupon_name').val());
                        $("span.couponValue").html($(obj).find('#coupon_denomination').val());
                        $("span.orderLimitValue").html($(obj).find('#coupon_order_limit').val());
                        $("span.couponstart").html($(obj).find("input[name='coupon_start_time']").val());
                        $("span.couponend").html($(obj).find("input[name='coupon_end_time']").val());
                        if($(obj).find("#coupon_limit_type").val()>1 && $(obj).find("#limitResBox div").length>0){
                            $.each($(obj).find("#limitResBox div"),function(){
                                limitResBox += $(this).data('id')+":"+$(this).find('span').html()+";"; 
                            })
                        }else if($(obj).find("#coupon_limit_type").val()==1){
                            limitResBox = $(obj).find("#limitResBox").html();
                        }else{
                            limitResBox = '';
                        }
                        if($(obj).find("#SLLimitStore").val()>0 && $(obj).find("#LimitStoreResBox div").length>0){
                             $.each($(obj).find("#LimitStoreResBox div"),function(){
                                LimitStoreResBox += $(this).data('id')+":"+$(this).find('span').html()+";"; 
                            })
                        }else{
                            LimitStoreResBox = '';
                        }
                        layer.close(index); 
                    }
                }
               
            })
        });
        $("#submit").click(function(){
            if($("input[name='activit[cpaos_create_type]']:checked").val() == 2){
                if($("input[name='file_']").val() == ''){
                    layer.msg('请选择要导入码券的文件！');
                    return false;
                }else{
                    getfileinfo($("input[name='file_']"));
                }
            }
            if($(".couponName").html() == ''){
                layer.msg('请先编辑优惠券！');
                return false;
            }
            $('#add_form').validate({
                errorPlacement: function (error, element) {
                    __formSubmit = false;
                    $(element).nextAll('span.err').append(error);
                },
                rules: {
                    "activit[cpaos_create_type]": {
                        required: true,
                    },
                    "activit[cpaos_start_time]": {
                       required: true
                    },
                    "activit[cpaos_end_time]": {
                       required: true
                    },
                    "activit[cpaos_amount_limit_st]" : {
                        required    : true,
                     },
                    "activit[cpaos_day_limit_st]": {
                        required: true
                    }
                },
                messages: {
                    "activit[cpaos_create_type]": {
                        required: '<i class="fa fa-exclamation-circle"></i>券码生成方式必填',
                    },
                    "activit[cpaos_start_time]": {
                       required: '<i class="fa fa-exclamation-circle"></i>发放开始时间必填',
                    },
                    "activit[cpaos_end_time]": {
                       required: '<i class="fa fa-exclamation-circle"></i>发放结束时间必填',
                    },
                    "activit[cpaos_amount_limit_st]": {
                        required: '<i class="fa fa-exclamation-circle"></i>发放总量限量方式必选',
                    },
                    "activit[cpaos_day_limit_st]": {
                        required: '<i class="fa fa-exclamation-circle"></i>每日限量方式必选',
                    }
                }
            });
            if($('#add_form').valid()){
                $.each($("#add_form select"),function(){
                    if($(this).val()==0){
                        $(this).next('input').val('');
                    }
                })
                var data = new FormData($("#add_form")[0]);
                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:'CouponOfShoppingEdit?op=submit&'+coupon_info,
                    data:data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        layer.msg(data.msg);
                        if(data.state){
                             setTimeout(
                                function(){
                                    window.location.href = 'CouponOfShopping';
                                },3000)
                        }
                    }
                })
            }
        })
        $("input[name='file_']").change(function(){
            getfileinfo($(this));
        })
        $("#limit_stores_type").change(function () {  //限制门店
            var slvalue = $('#limit_stores_type option:selected').val();
            if (slvalue == 0)
            {
                document.getElementById("BtnLimitStore").style.display = 'none';
                document.getElementById("LimitStoreResBox").style.display = 'none';
            } else if (slvalue == 1) {
                document.getElementById("BtnLimitStore").style.display = 'inline-block';
                document.getElementById("LimitStoreResBox").style.display = 'inline-block';
                open_limit_store();
            }
        });
        $("#BtnLimitStore").click(function () {
            open_limit_store();
        })
    })
    function getfileinfo(obj){
        fileExt=obj.val().substr(obj.val().lastIndexOf(".")).toLowerCase();//获得文件后缀名
        if(fileExt!='.xlsx'){  //只允许excel2007的格式
            layer.msg("请上传后缀名为xls或xlsx的文件!");
            return false;
        }
    }
     function open_limit_store(){
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "ajax_get_stores_info",
            data: '',
            success: function (data) {
                if (data.state) {
                    var content = '<div class="text-r pd-10"><div > ' +
                            '<input type="text" class="form-control  w150 " name="storeName" placeholder="店铺名称">' +
                            '<span class="input-group-btn">' +
                            '<button type="button" class="btn btn-success radius ml-10" id="store_search">筛选</button> </span> </div> </div>' +
                            '<div class="text-l pd-10 store_info" >';
                    if (data.info) {
                        if ($("#LimitStoreResBox div.dib").length > 0) {
                            var old_store = new Array();
                            $.each($("#LimitStoreResBox div.dib"), function () {
                                old_store.push($(this).data("id"));
                            });
                        } else {
                            var old_store = false;
                        }
                        var checked = '';
                        $.each(data.info, function (k, v) {
                            if (old_store) {
                                if (old_store.indexOf(v.store_id * 1) > -1) {
                                    checked = "checked='checked'";
                                } else {
                                    checked = '';
                                }
                            }
                            content += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                    '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '" ' + checked + '> ' +
                                    '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                    '</div>';
                        })
                    } else {
                        content += '<div>暂无相关数据</div>';
                    }
                    content += '</div>';
                    layer.open({
                        type: 1,
                        title: '<b>选择门店</b>',
                        area: ['60%', '45%'], //宽高
                        content: content,
                        btn: ['确认', '取消'],
                        skin: 'layui-layer-rim', //加上边框
                        success: function () {
                            $("#store_search").click(function () {
                                var storeName = $("input[name='storeName']").val();
                                $.ajax({
                                    type: 'get',
                                    dataType: 'json',
                                    url: "ajax_get_stores_info?storeName=" + storeName,
                                    data: '',
                                    success: function (data) {
                                        if (data.state) {
                                            var html = '';
                                            if (data.info) {
                                                $.each(data.info, function (k, v) {
                                                    html += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                                            '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '"> ' +
                                                            '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                                            '</div>';
                                                })
                                            } else {
                                                html += '<div class="ml-20"><span>暂无相关数据</span></div>';
                                            }
                                            $("div.store_info").html(html);
                                        }
                                    }
                                })
                            })
                        },
                        yes: function () {
                            var store_div = '';
                            var select_store = [];
                            $.each($("input[type='checkbox']"), function () {
                                if ($(this).is(':checked')) {
                                    var id = $(this).val();
                                    select_store.push(id);
                                    var name = $("label[for='d-" + id + "']").html();
                                    store_div += "<div data-id='" + id + "' class='rel dib w150 ell pr20 mr5'><span>" + name +
                                            "</span><i class='iconfont limit-close-btn' data-id='" + id + "'></i></div>";
                                }
                            });
                            $("#LimitStoreResBox").html(store_div);
                            $("#limit_store").val(select_store.join(','));
                            layer.closeAll();
                        }, no: function () {
                            return false;
                        }
                    })
                }
            }
        })
    }
    $(function(){
    //限制条件
        $("#coupon_limit_type").change(function () {
            var slvalue = $('#coupon_limit_type option:selected').val();
            if (slvalue == 0)
            {
                document.getElementById("BtnLimitGoods").style.display = 'none';
                document.getElementById("limitResBox").style.display = 'none';
            } else {
                document.getElementById("BtnLimitGoods").style.display = 'inline-block';
                document.getElementById("limitResBox").style.display = 'inline-block';
                if (slvalue == 1) {
                    open_limit_cate();
                } else if (slvalue == 2) {
                    open_limit_goods();
                } else if (slvalue == 3){
                    open_limit_brand();
                }
            }
        });
        $("#BtnLimitGoods").click(function () {
            var slvalue = $('#coupon_limit_type option:selected').val();
            if (slvalue == 1) {
                open_limit_cate();
            } else if (slvalue == 2) {
                open_limit_goods();
            } else if (slvalue == 3){
                open_limit_brand();
            }
        })
        function open_limit_cate()  //品类
        {
            var old_cate = $("#limit_goods").val();
            var old_cate = old_cate.split(',');
            var old_cate_str = $("#limitResBox").html();
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: "ajax_get_class_use_coupon",
                data: '',
                success: function (data) {
                    if (data.state) {
                        if (data.info) {
                            var content = '<div class="text-r pd-10">' +
                                    '<table class="table mt-10">' +
                                    '<tbody>' +
                                    '<tr>' +
                                    '<td>' +
                                    '<div class="ovh">' +
                                    '<p class="ovh pl-list-nav" id="plListNav">';
                            $.each(data.info, function (k, v) {
                                content += '<a href="javascript:;" data-id="' + v.gc_id + '" class="">' + v.gc_name + '</a>';
                            })
                            content += '</p>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>' +

                                    '<table class="table mt-10">' +
                                    '<tbody>' +
                                    '<tr>' +
                                    '<td>' +
                                    '<div class="ovh pl-list-leaf bdr-e4-t">' +
                                    '<a href="javascript:;" id="chkAllPL" class="dib l mr10">全选</a>' +
                                    '<div id="plListLeaf">' +
                                    '</div>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>' +

                                    '<table class="table mt-10">' +
                                    '<tbody>' +
                                    '<tr>' +
                                    '<td>' +
                                    '<div class="pl-chk-res pl15"><h5 class="limit-h5 mt5 mb5">已选择如下品类:</h5>' ;
                                    if(old_cate_str!==''){
                                        content +='<div class="limit-res-box  c-8" id="limitResBox4Category">'+old_cate_str+'</div>';
                                    }else{
                                        content += '<div class="limit-res-box  c-8" id="limitResBox4Category">请选择需要限制的品类</div>' ;
                                    }
                                content +='</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>' +
                                    '</div>';
                        }
                        layer.open({
                            type: 1,
                            title: '<b>选择品类</b>',
                            area: ['80%', '80%'], //宽高
                            content: content,
                            btn: ['确认', '取消'],
                            skin: 'layui-layer-rim', //加上边框
                            success: function () {
                                get_class_list_by_parent($("p.pl-list-nav").find('a').first().data('id'));
                                $("p.pl-list-nav").find('a').first().addClass('active');
                                $(".pl-list-nav a").click(function () {  //切换分类
                                    $(this).addClass('active').siblings().removeClass('active');
                                    $("#chkAllPL").removeClass('active');
                                    var p_id = $(this).data('id');
                                    get_class_list_by_parent(p_id);
                                })
                                function get_class_list_by_parent(parent_id) {
                                    if ((parent_id == 'undfined') || (parent_id == '') || (parent_id == 0)) {
                                        return false;
                                    }
                                    if ($("#plListLeaf").find('div').length > 0) {
                                        $("#plListLeaf").find('div').attr('style', 'display:none');
                                        if ($("#plListLeaf").find("div[id='PLLeaf-" + parent_id + "']").length > 0) {
                                            $("#PLLeaf-" + parent_id + "").attr('style', 'display:block');
                                            return false;
                                        }
                                    }
                                    $.ajax({
                                        type: 'get',
                                        dataType: 'json',
                                        url: "ajax_get_class_use_coupon?parent_id=" + parent_id,
                                        data: '',
                                        success: function (data) {
                                            var html = '<div id="PLLeaf-' + parent_id + '">';
                                            if (data.state && data.info) {
                                                $.each(data.info, function (k, v) {
                                                    var class_str="";
                                                    if($.inArray(v.gc_id,old_cate)>=0){
                                                        class_str="active1";
                                                    }
                                                    html += '<a href="javascript:;" onclick="change_cate(this)" class="'+class_str+'" ' +
                                                            'style="-webkit-animation-delay:0ms;animation-delay:0ms;" data-id="' + parent_id + '-' + v.gc_id + '">' + v.gc_name + '</a>';
                                                    if (!$.isEmptyObject(v.son_cate)) {
                                                        $.each(v.son_cate, function (kk, vv) {
                                                            var class_str="";
                                                            if($.inArray(vv.gc_id,old_cate)>=0){
                                                                class_str="active1";
                                                            }
                                                            html += '<a href="javascript:;"  onclick="change_cate(this)" class="'+class_str+' ' +
                                                                    'style="-webkit-animation-delay:0ms;animation-delay:0ms;" data-id="' + parent_id + '-' + vv.gc_id + '">' + vv.gc_name + '</a>';
                                                        })
                                                    }
                                                })
                                            } else {
                                                html += '<span>暂无相关数据</span>';
                                            }
                                            html += '</div>';
                                            $("#plListLeaf").append(html);
                                        }
                                    })
                                }
                                $("#chkAllPL").click(function () { //全选
                                    var id = $("#plListNav").find('a.active').data('id');
                                    if ($(this).hasClass('active')) {
                                        $(this).removeClass('active');
                                        $("#plListLeaf").find("#PLLeaf-" + id + "").find('a').removeClass('active1');
                                    } else {
                                        $(this).addClass('active');
                                        $("#plListLeaf").find("#PLLeaf-" + id + "").find('a').addClass('active1');
                                    }
                                    set_cate_selected();
                                })
                            },
                            yes: function () {
                                var cate_div = $("#limitResBox4Category").html();
                                var select_cate = [];
                                $.each($("#plListLeaf").find('div'), function () {
                                    if ($(this).find('a').length > 0) {
                                        $.each($(this).find('a'), function () {
                                            if ($(this).hasClass('active1')) {
                                                var id_str = $(this).data("id");
                                                var id = id_str.substring(id_str.indexOf("-")+1);
                                                select_cate.push(id);
    //                                                    var name = $(this).html();
    //                                                    cate_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5">' + name +
    //                                                            '<i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
    //                                                            '</div>';
                                            }
                                        })
                                    }
                                })
                                select_cate = select_cate.join(',');
                                $("#limitResBox").html(cate_div);
                                $("#limit_goods").val(select_cate);
                                layer.closeAll();
                            }, no: function () {
                                return false;
                            }
                        })
                    }
                }
            })
        }
    })
    function change_cate(obj) { //单选
        if ($(obj).hasClass('active1')) {
            $(obj).removeClass('active1');
        } else {
            $(obj).addClass('active1');
        }
        set_cate_selected();
    }
    function set_cate_selected() {  //重置选中的品类
        if ($("#plListLeaf").find('div').length > 0) {
            var set_selected_str = '';
            $.each($("#plListLeaf").find('div'), function () {
                if ($(this).find('a').length > 0) {
                    var id = ($(this).attr('id').substr(7)) * 1;
                    var name = $("#plListNav").find("a[data-id='" + id + "']").html();
                    var str = '<div> <b>' + name + ': </b>';
                    var len = 0;
                    $.each($(this).find('a'), function () {
                        if ($(this).hasClass('active1')) {
                            len++;
                            str += $(this).html() + '/';
                        }
                    })
                    if (len > 0) {
                        str += '</div>';
                        set_selected_str += str;
                    }
                }
            })
            $("#limitResBox4Category").html(set_selected_str);
        }
    }
    function open_limit_goods()  //商品
    {
        if($("#limit_goods").val()!==''){
            var old_goods = $("#limit_goods").val().split(',');
        }else{
            var old_goods = [];
        }
        var content = '<div class="pd-10">' +
                '<div class="search mt-5 mb-10">' +
                '<select class="valid  input-text input_text mr-5 " id="cate_type" name="cate_type">' +
                '<option value="1" seleted>类目</option>' +
                '<option value="2">自定义分类</option>' +
                '</select>' +
                '<select class="valid  input-text input_text cate_type select2 mr-5" id="cate" name="cate">' +
                '<option value="">-类目-</option>' +
                '</select>' +
                '<select class="valid  input-text input_text cate_type select2 hidden mr-5" id="self_taxonomy" name="self_taxonomy">' +
                '<option value="">-自定义分类-</option>' +
                '</select>' +
                '<input type="text" class="form-control  w150 input-text input_text ml-20" name="goods_name" placeholder="商品名称或款号">' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-success radius ml-5" id="goods_search">筛选</button> </span> ' +
                '</div>' +
                '<table class="table table-border table-bordered mb-10" >' +
                '<thead>' +
                '<tr bgcolor="EAEDF1" class=""><th>选择</th><th>款号</th><th>商品信息</th><th>现售价</th><th>吊牌价</th><th>总库存</th></tr>' +
                '</thead>' +
                '<tbody id="goods_info">';
        content += '</tbody>' +
                '</table>' +
                '<div class="checkbox">'+
                '<input class="j-dia-chkall" type="checkbox" id="goods-chkall"> '+
                '<label for="cate-chkall">全选</label>&emsp;&emsp;'+
                '<span>已选择 <span class="text-primary f14 goods-num">'+old_goods.length+'</span> 项</span>'+
                '</div>'+
                '<div id="page1" class="mt-5 text-c"></div>' +
                '</div>';
        layer.open({
            type: 1,
            title: '<b>选择商品</b>',
            area: ['80%', '80%'], //宽高
            content: content,
            btn: ['确认', '取消'],
            skin: 'layui-layer-rim', //加上边框
            success: function () {
                //分页
                page(1);
                function page(curr,search=false) {
                    if(!search){
                        if($("#goods_info tr:not(.hidden)").length>0){  
                            $("#goods_info tr:not(.hidden)").addClass('hidden');
                        }
                        $("#goods-chkall").attr('checked',false);
                        if($("#goods_info tr.page_"+curr+"").length>0){ 
                            $("#goods_info tr.page_"+curr+"").removeClass('hidden');
                            return false;
                        }
                    }
                    var cate_type = $("#cate_type").val();
                    var cate = $('select.cate_type:not(.hidden)').val();
                    var goods_name = $("input[name='goods_name']").val();
                    $.getJSON('ajax_get_goods_use_coupon?cate_type='+cate_type+'&cate='+cate+'&goods_name='+goods_name, {
                        page: curr || 1 //向服务端传的参数，此处只是演示
                    }, function (data) {
                        var html = '';
                        if (data.state && data.info) {
                            $.each(data.info, function (k, v) {
                                var checked = "";
                                html += '<tr class="goods_tr page_'+curr+'">' +
                                        '<td>' +
                                        '<div class="checkbox sltdia-item checkbox-primary m0">' ;
                                if($.inArray(v.goods_id,old_goods)>=0){
                                    checked = "checked='true'";
                                }
                                        html +='<input id="d-' + v.goods_id + '" name="d-' + v.goods_id + '" '+checked+' class="" data-id="' + v.goods_id + '" onclick="change_goods(this)" type="checkbox" value="' + v.goods_id + '">' +
                                        '<label for="d-' + v.goods_id + '" title="' + v.goods_name + '"></label> ' +
                                        '</div></td>' +
                                        '<td>' + v.goods_spu + '</td>' +
                                        '<td class="goods_name">' + v.goods_name + '</td>' +
                                        '<td>' + v.goods_price + '</td>' +
                                        '<td>' + v.goods_marketprice + '</td>' +
                                        '<td>100</td>' +
                                        '</tr>';
                            })
                        } else {
                            html += '<tr><td colspan="6">暂无信息</td></tr>';
                        }
                        if(!search){
                            $("#goods_info").append(html);
                        }else{
                            $("#goods_info").html(html);
                        }
                        laypage({
                            cont: $("#page1"), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                            pages: data.pages, //通过后台拿到的总页数
                            curr: curr || 1, //当前页
                            skin: "#5eb95e",
                            jump: function (obj, first) { //触发分页后的回调
                                if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                    page(obj.curr);
                                }
                            }
                        });
                    });
                }
                get_class_list_by_type($("#cate_type").val());
                function get_class_list_by_type(type) {
                    var cate_id = new Array();
                    cate_id[1] = 'cate';
                    cate_id[2] = 'self_taxonomy';
                    if ((type == 'undfined') || (type == '') || (type == 0)) {
                        type = 1;
                    }
                    var id = cate_id[type];
                    $("select[id='" + id + "']").removeClass('hidden').siblings('select.cate_type').addClass('hidden');
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: "ajax_get_class_use_coupon?show_list=1&type=" + type,
                        data: '',
                        success: function (data) {
                            if (data.state && data.list) {
                                $("#" + id + "").append(data.list);
                            }
                        }
                    })
                }
                $("#cate_type").change(function () {  //切换分类
                    var type = $(this).val();
                    get_class_list_by_type(type);
                })
                $("#goods_search").click(function () {  //切换分类
                    page(1);
                })
                $("#goods-chkall").click(function () { //全选
                    console.log($(this).is(':checked'));
                    if ($(this).is(':checked')){
                        if($("tr.goods_tr:not(.hidden)").length>0){
                            $("tr.goods_tr:not(.hidden) input[type='checkbox']").attr("checked", true);
                        }
                    }else{
                        if($("tr.goods_tr:not(.hidden)").length>0){
                            $("tr.goods_tr:not(.hidden) input[type='checkbox']").attr("checked", false);
                        }
                    }
                    set_goods_selected();
                })
            },
            yes: function () {
                var goods_div = '';
                var select_goods = [];
                if ($("#goods_info tr.goods_tr").length > 0) {
                    $.each($("#goods_info tr.goods_tr "), function () {
                        if ($(this).find('input[type="checkbox"]').is(':checked')) {
                            var id= $(this).find('input[type="checkbox"]').data('id');
                            select_goods.push(id);
                            var name = $(this).find('td.goods_name').html();
                            goods_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5"><span>' + name +
                                        '</span><i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
                                        '</div>';
                        }
                    })
                }
                select_goods = select_goods.join(',');
                $("#limitResBox").html(goods_div);
                $("#limit_goods").val(select_goods);
                layer.closeAll();
            }, no: function () {
                return false;
            }
        })
    }
    function change_goods(obj) { //单选
        set_goods_selected();
    }
    function set_goods_selected() {  //重置选中的商品
        var num = 0;
        if ($("#goods_info tr.goods_tr").length > 0) {
            $.each($("#goods_info tr.goods_tr "), function () {
                if ($(this).find('input[type="checkbox"]').is(':checked')) {
                    num++;
                }
            })
        }
        $("span.goods-num").html(num);
    }
    function open_limit_brand()  //品牌
    {
        if($("#limit_goods").val()!==''){
            var old_brand = $("#limit_goods").val().split(',');
        }else{
            var old_brand = [];
        }
        var content = '<div class=" pd-10"><div class="text-r">' +
                        '<input type="text" class="form-control  w150 " name="brandName" placeholder="品牌名称">' +
                        '<span class="input-group-btn">' +
                        '<button type="button" class="btn btn-success radius ml-10" id="brand_search">筛选</button> </span> </div>' +
                        '<div class="text-l pd-10 brand_info" id="brand_info" >'+
                        '</div>'+
                        '<div class="checkbox text-c">'+
                        '<input class="j-dia-chkall" type="checkbox" id="brand-chkall"> '+
                        '<label for="brand-chkall">全选</label>&emsp;&emsp;'+
                        '<span>已选择 <span class="text-primary f14 brand-num">'+old_brand.length+'</span> 项</span>'+
                        '</div>'+
                        '<div class="page2 text-c" id="page2"></div>';
            content += '</div>';

        layer.open({
            type: 1,
            title: '<b>选择品牌</b>',
            area: ['80%', '80%'], //宽高
            content: content,
            btn: ['确认', '取消'],
            skin: 'layui-layer-rim', //加上边框
            success: function () {
                //分页
                brand_page(1);
                function brand_page(curr,search=false) {
                   if(!search){
                        if($("#brand_info div.brand_div:not(.hidden)").length>0){  
                            $("#brand_info div.brand_div:not(.hidden)").addClass('hidden');
                        }
                        $("#brand-chkall").attr('checked',false);
                        if($("#brand_info div.page_"+curr+"").length>0){ 
                            $("#brand_info div.page_"+curr+"").removeClass('hidden');
                            return false;
                        }
                   }
                    var brand_name = $("input[name='brandName']").val();
                    $.getJSON('ajax_get_brands_use_coupon?brands_name='+brand_name, {
                        page: curr || 1 //向服务端传的参数，此处只是演示
                    }, function (data) {
                        var html = '';
                        if (data.state && data.info) {
                            $.each(data.info, function (k, v) {
                                var checked = "";
                                if($.inArray(v.brand_id,old_brand)>=0){
                                    checked = "checked='true'";
                                }
                                html += '<div class="checkbox sltdia-item checkbox-primary brand_div page_'+curr+'" style="width: 230px; display: inline-block;">'+
                                        '<input id="d-'+v.brand_id+'" '+checked+' onclick="set_brand_selected()" class="j-dia-item" data-id="'+v.brand_id+'" type="checkbox" value="'+v.brand_id+'"> '+
                                        '<label for="d-'+v.brand_id+'" title="'+v.brand_name+'">'+v.brand_name+'</label>'+
                                        ' </div>';
                            })
                        } else {
                            html += '<div class="ml-20"><span>暂无相关数据</span></div>';
                        }
                        if(!search){
                            $("#brand_info").append(html);
                        }else{
                            $("#brand_info").html(html);
                        }
                        laypage({
                            cont: $("#page2"), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                            pages: data.pages, //通过后台拿到的总页数
                            curr: curr || 1, //当前页
                            skin: "#5eb95e",
                            jump: function (obj, first) { //触发分页后的回调
                                if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                    brand_page(obj.curr);
                                }
                            }
                        });
                    });
                }
                $("#brand_search").click(function () {  
                    brand_page(1,true);
                })
                $("#brand-chkall").click(function () { //全选
                    if ($(this).is(':checked')){
                        if($("div.brand_div:not(.hidden)").length>0){
                            $("div.brand_div:not(.hidden) input[type='checkbox']").attr("checked", true);
                        }
                    }else{
                        if($("div.brand_div:not(.hidden)").length>0){
                            $("div.brand_div:not(.hidden) input[type='checkbox']").attr("checked", false);
                        }
                    }
                    set_brand_selected();
                })
            },
            yes: function () {
                var brand_div = '';
                var select_brand = [];
                if ($("#brand_info div.brand_div").length > 0) {
                    $.each($("#brand_info div.brand_div"), function () {
                        if ($(this).find('input[type="checkbox"]').is(':checked')) {
                            var id= $(this).find('input[type="checkbox"]').data('id');
                            select_brand.push(id);
                            var name = $(this).find('label').html();
                            brand_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5"><span>' + name +
                                        '</span><i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
                                        '</div>';
                        }
                    })
                }
                select_brand = select_brand.join(',');
                $("#limitResBox").html(brand_div);
                $("#limit_goods").val(select_brand);
                layer.closeAll();
            }, no: function () {
                return false;
            }
        })
    }

    function set_brand_selected() {  //重置选中的商品
        var num = 0;
        if ($("#brand_info div.brand_div").length > 0) {
            $.each($("#brand_info div.brand_div"), function () {
                if ($(this).find('input[type="checkbox"]').is(':checked')) {
                    num++;
                }
            })
        }
        $("span.brand-num").html(num);
    }
    function seeCoupon(coupon_id){
        layer.open({
            type: 2,
            title: '<b>查看优惠券</b>',
            skin: 'layui-layer-rim', //加上边框
            area: ['90%', '80%'], //宽高
            content: "PromotionCouponEdit?coupon_id="+coupon_id,
        })
    }
<?php echo '</script'; ?>
>

</html><?php }
}
