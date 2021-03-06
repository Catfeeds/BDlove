<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:22:58
  from "D:\www\yunjuke\application\admin\views\finance_user_cash_history.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59804872f399e3_63466405',
  'file_dependency' => 
  array (
    '1261f18d53a6fe8c13503399ccbbbceb20124496' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_user_cash_history.html',
      1 => 1501579372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59804872f399e3_63466405 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '961359804872e570a7_88755368';
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
        <h3>会员提现历史</h3>
        <h5>会员提现历史记录</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可查看该会员的提现历史并设置体现历史表显示哪些内容</li>
    </ul>
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
            url: '../get_user_cash_history?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
',
            dataType: 'xml',
            colModel : [
                {display: '流水号', name : 'id', width : 60, sortable : false, align: 'center'},
                {display: '账户', name : 'user_id', width : 60, sortable : false, align: 'center'},
                {display: '交易号', name : 'pay_sn', width : 150, sortable : false, align: 'center'},
                {display: '提现金额', name : 'money', width : 80, sortable : false, align: 'center'},
                {display: '余额', name : 'asset', width : 80, sortable : false, align : 'center'},
                {display: '备注', name : 'note', width : 150, sortable : false, align : 'center'},
                {display: '提现时间', name : 'create_time', width : 125, sortable : false, align: 'center'}
            ],
            /*searchitems : [
                {display: '订单号', name : 'order_sn'},
                {display: '支付单号', name : 'pay_sn'}
            ],*/
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
的提现记录'
        });
    });

<?php echo '</script'; ?>
>
</html><?php }
}
