<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:31:02
  from "D:\www\yunjuke\application\admin\views\business_evaluate_shop.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59802026ad4da7_28136791',
  'file_dependency' => 
  array (
    '9c2e19fb499fdd8836f7283f22f8941e2cb5200b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_evaluate_shop.html',
      1 => 1498098958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59802026ad4da7_28136791 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '22379598020269909e9_14086520';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>评价管理</h3>
                <h5>商品交易评价及导购评价管理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a  href="business_evaluate_buyers"><span>商品评价</span></a></li>
                <li><a  class="current"><span>导购评价</span></a></li>
            </ul>
        </div>
    </div>
  <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家可在订单完成后对导购进行动态评价操作</li>
            <li>评价统计信息将显示在对应的店铺相应页面</li>
        </ul>
    </div>

  <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#flexigrid").flexigrid({
            url: '',
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '评价人', name : 'seval_membername', width : 70, sortable : true, align: 'left'},
                {display: '描述相符', name : 'seval_desccredit', width : 90, sortable : false, align: 'center'},
                {display: '服务态度', name : 'seval_servicecredit', width : 90, sortable : false, align: 'center'},
                {display: '发货速度', name : 'seval_deliverycredit', width : 90, sortable : false, align: 'center'},
                {display: '被评商家', name : 'seval_storename', width : 150, sortable : true, align: 'left'},
                {display: '评价时间', name : 'seval_id', width : 80, sortable : true, align: 'center'},
                {display: '订单编号', name : 'seval_orderno', width : 120, sortable : true, align: 'center'},
                {display: '评价人ID', name : 'seval_memberid', width : 60, sortable : true, align: 'center'},
                {display: '商家ID', name : 'seval_storeid', width : 40, sortable : true, align: 'center'}
            ],
            buttons : [
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate }
            ],
            searchitems : [
                {display: '评价人', name : 'seval_membername'},
                {display: '被评商家', name : 'seval_storename'}
            ],
            sortname: "seval_id",
            sortorder: "desc",
            title: '店铺评分列表',
            onSuccess : function(){

            }
        });
    });
    function fg_operate() {

    }

<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
