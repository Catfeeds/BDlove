<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:10:23
  from "D:\www\yunjuke\application\admin\views\promotion_coupon_of_shopping.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c2226f4fe4f8_06416357',
  'file_dependency' => 
  array (
    'cf226fb8736c1e21d3d5e9912cc07aece7483d3c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_coupon_of_shopping.html',
      1 => 1501574955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c2226f4fe4f8_06416357 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '531959c2226f39eba3_36456115';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .flexigrid .bDiv td div, .colCopy div{height:auto}
    .flexigrid .hDiv th, .flexigrid .bDiv td{vertical-align: middle !important;}
    .stop:hover{
	color: #F37B1D!important;
	border: 1px space #F37B1D!important;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">

                <div class="subject">
                    <h3>买后送券</h3>
                    <h5>买后送券活动的管理</h5>
                </div>
                <ul class="tab-base nc-row">

                    <li><a href="CouponOfShopping?type=1" <?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>class="current"<?php }?> >进行中</a></li>
                    <li><a href="CouponOfShopping?type=2" <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>class="current"<?php }?> >未开始</a></li>
                    <li><a href="CouponOfShopping?type=3" <?php if ($_smarty_tpl->tpl_vars['type']->value == 3) {?>class="current"<?php }?> >已结束</a></li>

                </ul>
            </div>
        </div>
        <!-- 操作说明 -->
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span> </div>
            <ul>
                <li> 创建并管理买后送券活动</li>
            </ul>
        </div>

        <div id="flexigrid">
        </div>
    </div>
    <?php echo '<script'; ?>
>
        $(function () {
            $("#flexigrid").flexigrid({
                url: 'CouponOfShopping?op=get_list&type='+<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
,
                colModel: [
                    {display: '操作', name: 'operation', width: 150, sortable: false, align: 'center', className: 'handle'},
                    {display: '活动时间', name: 'storelogo', width: 120, sortable: true, align: 'center'},
                    {display: '发放总数', name: 'member_name', width: 80, sortable: true, align: 'center'},
                    {display: '被领取数', name: 'member_email', width: 80, sortable: true, align: 'center'},
                    {display: '优惠券类型', name: 'member_email', width: 120, sortable: true, align: 'left'},
                    {display: '已付款订单数', name: 'member_email', width: 100, sortable: true, align: 'center'},
                    {display: '已付款订单额', name: 'member_email', width: 100, sortable: true, align: 'center'},
                    {display: '备注', name: 'member_email', width: 120, sortable: true, align: 'left'},
                ],
                buttons: [
                    {display: '<i class="fa fa-plus"></i>创建新会员送券', name: 'add', bclass: 'add', title: '创建新会员送券', onpress: fg_operate},
                    {display: '<i class="fa fa-file-excel-o"></i>结束活动', name: 'stop', bclass: 'stop', title: '结束活动', onpress: fg_operate},
                ],
                searchitems: [
                    {display: '优惠券类型', name: 'ous_tel'},
                ],
                title: '买后送券活动列表'
            });
            function fg_operate(name, grid) {
                if (name == 'delete') {
                    if ($('.trSelected', grid).length > 0) {
                        var itemlist = new Array();
                        $('.trSelected', grid).each(function () {
                            itemlist.push($(this).attr('data-id'));
                        });
                        fg_delete(itemlist);
                    } else {
                        return false;
                    }
                } else if (name == 'add') {
                    window.location.href = "CouponOfShoppingEdit";
                } else if (name == 'stop') {
                    var itemlist = new Array();
                    if ($('.trSelected', grid).length > 0) {
                        $('.trSelected', grid).each(function () {
                            itemlist.push($(this).attr('data-id'));
                        });
                    }
                    fg_stop(itemlist);
                }
            }
        });
        function fg_edit(cpaos_id) {
             window.location.href = "CouponOfShoppingEdit?cpaos_id="+cpaos_id;
        }
        function fg_stop(id) {
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            }
            layer.confirm('确认要结束这 ' + id.length + ' 项吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                ids = id.join(',');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "stop_activity?type=2&id="+ids,
                    data: '',
                    success: function(data){
                        if(data.state=='403'){
                            login_ajax('shopadmin');
                        }else if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                            window.location.href="CouponOfShopping";
                        }
                });
            });
        }

    <?php echo '</script'; ?>
>
    <div id="goTop">
        <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
        <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
    </div>
</body>

</html><?php }
}
