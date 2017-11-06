<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:19:15
  from "D:\www\yunjuke\application\admin\views\finance_user_pay_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598047931ff758_76832539',
  'file_dependency' => 
  array (
    '5896439635c158772c1dde12cc6388d0de3490d4' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_user_pay_detail.html',
      1 => 1501579150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598047931ff758_76832539 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18275598047931865b8_02008864';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <a class="back" href="javascript:history.back();" title="返回列表">
        <i class="fa fa-arrow-circle-o-left"></i>
      </a>
      <div class="subject">
        <h3>会员支付明细</h3>
        <h5>会员支付相关信息</h5>
      </div>
    </div>
  </div>
  <div id="flexigrid"></div>
</div>



<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#flexigrid").flexigrid({
            url: '../get_user_pay_detail?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
',
            dataType: 'xml',
            colModel : [
                {display: '订单号', name : 'order_sn', width : 150, sortable : false, align: 'center'},
                {display: '收银号', name : 'pay_sn', width : 150, sortable : false, align: 'center'},
                {display: '支付金额', name : 'money', width : 80, sortable : false, align: 'center'},
                {display: '支付方式', name : 'version_code', width : 80, sortable : false, align : 'center'},
                {display: '余额', name : 'asset', width : 80, sortable : false, align : 'center'},
                {display: '交易时间', name : 'create_time', width : 125, sortable : false, align: 'center'}
            ],
            searchitems : [
                {display: '订单号', name : 'order_sn'},
                {display: '收银号', name : 'pay_sn'}
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
的支付明细'
        });
    });

<?php echo '</script'; ?>
>
</html><?php }
}
