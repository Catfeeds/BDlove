<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:32:19
  from "D:\www\yunjuke\application\admin\views\finance_account_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59804aa30e7ff4_02026443',
  'file_dependency' => 
  array (
    '3b4c6f595340aab80dd7cefea28341cb374f069e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_account_guide.html',
      1 => 1496923836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59804aa30e7ff4_02026443 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '500059804aa30344c1_26273237';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>导购管理</h3>
        <h5>导购资金相关信息管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>区别于平台协议，可在文章列表页点击查看。</li>
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
            url: 'get_finance_account_guide',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 100, sortable : false, align: 'center', className: 'handle'},
                {display: '导购昵称', name : 'nike_name', width : 90, sortable : false, align: 'center'},
                {display: '导购姓名', name : 'name', width : 90, sortable : false, align : 'center'},
                {display: '导购电话', name : 'tel', width : 110, sortable : false, align : 'center'},
                {display: '所属门店', name : 'store', width : 200, sortable : false, align : 'center'},
                {display: '角色', name : 'role', width : 60, sortable : false, align : 'center'},
            ],
            searchitems : [
                {display: '门店名', name : 'store_name'},
                {display: '导购电话', name : 'tel'},
                {display: '导购姓名', name : 'guide_name'}
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '导购资金列表'
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
