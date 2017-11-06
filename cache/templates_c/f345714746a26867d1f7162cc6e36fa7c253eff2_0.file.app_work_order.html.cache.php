<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:51:31
  from "D:\www\yunjuke\application\admin\views\app_work_order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59804f23472e00_03480453',
  'file_dependency' => 
  array (
    'f345714746a26867d1f7162cc6e36fa7c253eff2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\app_work_order.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59804f23472e00_03480453 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3147159804f233ee0e8_98737515';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>工单信息</h3>
        <h5>工单信息管理</h5>
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
            url: 'get_work_order',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 100, sortable : false, align: 'center', className: 'handle'},
                {display: '编号', name : 'id', width : 90, sortable : false, align: 'center'},
                {display: '类型', name : 'type', width : 105, sortable : false, align: 'center'},
                {display: '工单标题', name : 'title', width : 95, sortable : false, align: 'center'},
                {display: '工单内容', name : 'content', width : 300, sortable : false, align: 'center'},
                {display: '提交人', name : 'guide', width : 60, sortable : false, align: 'center'},
                {display: '联系电话', name : 'tel', width : 100, sortable : false, align: 'center'},
                {display: '紧急程度', name : 'urgency', width : 60, sortable : false, align: 'center'},
                {display: '提交时间', name : 'time', width : 130, sortable : false, align: 'center'},
            ],
            buttons : [
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate },
                   ],
            searchitems : [
                {display: '标题', name : 'title'},
                {display: '提交人', name : 'guide'},
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '工单信息列表'
        });
    });

    function fg_operate(name,grid){
        if (name == 'delete') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_delete(itemlist);
            } else {
                return false;
            }
        }else {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_look(itemlist);
            } else {
                return false;
            }
        }
    }

function fg_delete(id) {
    if (typeof id == 'number') {
        var id = new Array(id.toString());
    }
  /*  if(confirm('确认删除操作吗？')){
   id = id.join(',');
   } else {
   return false;
   }*/
    layer.confirm('确认要删除吗', {
        btn: ['确认','取消'] //按钮
    }, function(){
        id = id.join(',');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "work_order_delete",
            data: "id="+id,
            success: function(data){
                //layer.msg(123);
                if (data.state){
                    layer.msg(data.msg);
                    $("#flexigrid").flexReload();
                } else {
                    layer.msg(data.msg);
                }
            }
        });
    })
}


function fg_edit(id){
    window.location.href = 'work_order_look/'+id;
}

<?php echo '</script'; ?>
>
</html><?php }
}
