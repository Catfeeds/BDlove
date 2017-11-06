<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:26:20
  from "D:\www\yunjuke\application\admin\views\finance_store_asset_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980493c65c2b5_13203467',
  'file_dependency' => 
  array (
    '02c69340ced246f911e2198509f4c1e53f5645e9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_store_asset_detail.html',
      1 => 1496923836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5980493c65c2b5_13203467 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '192075980493c594f04_43071736';
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
        <h3>门店账户明细</h3>
        <h5>门店账户相关信息</h5>
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
  <div class="mt-20 mb-10 c-666">
    <form method="post" name="formSearch" id="formSearch">
      时间：<input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5">
      — <input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30">
      交易号：<input type="text" name="pay_id" id="pay_id" class=" w130">
      <input type="button" class="ml-10 btn btn-secondary radius" id="searchsubmit"  value="搜索">
    </form>
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
        $('#searchsubmit').click(function () {
            var search = $("#formSearch").serialize();
            $("#flexigrid").flexOptions({url: '../get_store_asset_detail?id=<?php echo $_smarty_tpl->tpl_vars['store']->value['store_id'];?>
&' + search}).flexReload();
        });

        $("#flexigrid").flexigrid({
            url: '../get_store_asset_detail?id=<?php echo $_smarty_tpl->tpl_vars['store']->value['store_id'];?>
',
            dataType: 'xml',
            colModel : [
                {display: '流水号', name : 'sal_id', width : 150, sortable : false, align: 'center'},
                {display: '交易号', name : 'pay_sn', width : 150, sortable : false, align: 'center'},
                {display: '订单号', name : 'order_sn', width : 150, sortable : false, align: 'center'},
                {display: '账户支出', name : 'asset_out', width : 60, sortable : false, align: 'center'},
                {display: '账户收入', name : 'asset_in', width : 60, sortable : false, align: 'center'},
                {display: '余额', name : 'asset', width : 60, sortable : false, align: 'center'},
                {display: '备注', name : 'note', width : 150, sortable : false, align: 'center'},
                {display: '交易时间', name : 'create_time', width : 125, sortable : false, align: 'center'}
            ],
            /*searchitems : [
                {display: '门店', name : 'id'}
            ],*/
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '门店账户明细'
        });
    });


<?php echo '</script'; ?>
>
</html><?php }
}
