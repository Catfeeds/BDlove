<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:41
  from "D:\www\yunjuke\application\admin\views\business_evaluate_buyers.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022e1587807_27355416',
  'file_dependency' => 
  array (
    '52487e9579e0d0e09f8a3aea464d300b00584e37' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_evaluate_buyers.html',
      1 => 1498098958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598022e1587807_27355416 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '12499598022e14f30e6_58445826';
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
                <li><a class="current"><span>商品评价</span></a></li>
                <li><a href="business_evaluate_shop"><span>导购评价</span></a></li>
            </ul>
        </div>
    </div>
  <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家可在订单完成后对订单商品进行评价操作，评价信息将显示在对应的商品页面</li>
        </ul>
    </div>

  <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#flexigrid").flexigrid({
            url: 'evaluate_buyers_list',
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '评价人', name : 'geval_frommembername', width : 70, sortable : true, align: 'center'},
                {display: '评分', name : 'geval_scores', width : 90, sortable : false, align: 'center'},
                {display: '评价内容', name : 'geval_content', width: 250, sortable : false, align : 'left'},
                {display: '晒单图片', name : 'geval_image', width : 80, sortable : false, align : 'center'},
                {display: '评价时间', name : 'geval_addtime', width : 120, sortable : true, align: 'center'},
                {display: '被评商品', name : 'geval_goodsid', width : 150, sortable : true, align : 'center'},
                {display: '所属商家', name : 'geval_storename', width : 120, sortable : true, align: 'center'},
                {display: '订单编号', name : 'geval_orderno', width : 120, sortable : true, align: 'center'},
                {display: '评价人ID', name : 'geval_frommemberid', width : 60, sortable : true, align: 'center'},
                {display: '商家ID', name : 'geval_storeid', width : 40, sortable : true, align: 'center'},
//                {display: '追评内容', name : 'geval_content_again', width: 250, sortable : false, align : 'left'},
//                {display: '追评晒单', name : 'geval_image_again', width : 190, sortable : false, align : 'left'}
            ],
            buttons : [
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'del', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate }
            ],
            searchitems : [
                {display: '评价人', name : 'geval_frommembername'},
                {display: '被评商品', name : 'geval_goodsname'},
                {display: '所属商家', name : 'geval_storename'}
            ],
            sortname: "geval_addtime",
            sortorder: "desc",
            title: '商品评价列表',
            onSuccess : function(){

            }
        });
    });
    function fg_operate(name,grid) {
        if (name == 'del') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                del_this(itemlist);
            }else{
                return false;
            }
        }
    }
    
    function del_this(id){
        if($.isArray(id)){
            id = id.join(',');
        }
        layer.confirm('确定要删除吗？', {
            btn: ['确定','取消'] //按钮
          }, function(){
              $.ajax({
                 url:'evaluate_buyers_del',
                 data:{id:id},
                 type:'post',
                 dataType:'json',
                 success:function(msg){
                     layer.msg(msg);
                     $('#flexigrid').flexReload();
                 }
              });
          });
    }
    function show_msg(msg){
        layer.open({
            type: 1,
            skin: 'layui-layer-demo', //样式类名
            closeBtn: 0, //不显示关闭按钮
            area: ['420px', '240px'], //宽高
            shift: 2,
            shadeClose: true, //开启遮罩关闭
            content: '<div class="pd-20 "><p style="text-align: center;"><span style="font-family: 楷体, 楷体_GB2312, SimKai; font-size: 14px;">'+msg+'</span></p></div>'
          });
    }
<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
