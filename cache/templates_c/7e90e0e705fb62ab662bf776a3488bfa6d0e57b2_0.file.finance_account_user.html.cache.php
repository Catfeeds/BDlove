<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:23:04
  from "D:\www\yunjuke\application\admin\views\finance_account_user.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59804878791e85_84277206',
  'file_dependency' => 
  array (
    '7e90e0e705fb62ab662bf776a3488bfa6d0e57b2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_account_user.html',
      1 => 1501579077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59804878791e85_84277206 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '20307598048786da4e7_93676394';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>会员管理</h3>
        <h5>会员资金相关信息管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可在此查看各个会员的支付明细，充值历史和提现历史</li>
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
            url: 'get_finance_account_user',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 120, sortable : false, align: 'center', className: 'handle'},
                {display: '用户名', name : 'name', width : 120, sortable : false, align: 'center'},
                {display: '电话号码', name : 'tel', width : 110, sortable : false, align: 'center'},
                {display: 'QQ', name : 'qq', width : 110, sortable : false, align: 'center'},
                {display: '余额', name : 'account', width : 60, sortable : false, align : 'center'},
                {display: '交易笔数', name : 'num', width : 50, sortable : false, align : 'center'}
            ],
             searchitems : [
                {display: '用户名', name : 'name'},
                {display: '电话号码', name : 'tel'},
                {display: 'QQ', name : 'qq'}
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '会员资金列表'
        });
    });


    function pay_detail(id){
        window.location.href = 'user_pay_detail/'+id;
    }

    function deposit_history(id){
        window.location.href = 'user_deposit_history/'+id;
    }

    function cash_history(id){
        window.location.href = 'user_cash_history/'+id;
    }
<?php echo '</script'; ?>
>
</html><?php }
}
