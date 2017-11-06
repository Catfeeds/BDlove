<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:29:22
  from "D:\www\yunjuke\application\admin\views\finance_account_store.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598049f2b83655_98355136',
  'file_dependency' => 
  array (
    '78c2b7565094a10f34db951e77b0aebe90335cdf' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_account_store.html',
      1 => 1501579542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598049f2b83655_98355136 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '5119598049f2a8d4a7_17350092';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>门店管理</h3>
        <h5>门店资金相关信息管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可查看门店下的账户明细，提现历史并可以修改门店的绑定银行卡</li>
      <li>可以设置门店资金列表显示哪些内容</li>
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
            url: 'get_finance_account_store',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 100, sortable : false, align: 'center', className: 'handle'},
                {display: '门店名称', name : 'store_name', width : 120, sortable : false, align: 'center'},
                {display: '店长昵称', name : 'nike_name', width : 90, sortable : false, align: 'center'},
                {display: '店长姓名', name : 'name', width : 90, sortable : false, align : 'center'},
                {display: '电话号码', name : 'tel', width : 150, sortable : false, align : 'center'},
                {display: '余额', name : 'asset', width : 60, sortable : false, align : 'center'},
                {display: '银行卡开户银行', name : 'bank_name', width : 150, sortable : false, align : 'center'},
                {display: '银行卡账号', name : 'bank_code', width : 150, sortable : false, align : 'center'},
                {display: '银行卡开户人', name : 'bank_code', width : 90, sortable : false, align : 'center'},
            ],
            searchitems : [
                {display: '门店名', name : 'store_name'},
                {display: '电话号码', name : 'tel'}
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '门店资金列表'
        });
    });

    function pay_detail(id){
        window.location.href = 'store_asset_detail/'+id;
    }

    function cash_history(id){
        window.location.href = 'store_cash_history/'+id;
    }

    function edit_bank(id){
        window.location.href = 'edit_bind_bank/'+id;
    }
<?php echo '</script'; ?>
>
</html><?php }
}
