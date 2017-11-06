<?php
/* Smarty version 3.1.29, created on 2017-09-28 16:07:37
  from "D:\www\yunjuke\application\admin\views\finance_set_bank.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ccadc9d89996_29109686',
  'file_dependency' => 
  array (
    '21d8b2cf7702710b95f4d2ebc620d19f116a8f09' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_set_bank.html',
      1 => 1502094622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59ccadc9d89996_29109686 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2600059ccadc9ce19f0_80929857';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="overflow: auto; cursor: default; background-color: rgb(255, 255, 255);">

<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 650px; top: 412px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>平台绑定银行卡</h3>
        <h5>平台绑定银行卡信息</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>设置平台绑定的银行卡信息，请认真核实银行卡卡号</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="bDiv" style="height: auto;">
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">

      </div>
      <div class="iDiv" style="display: none;"></div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $("#flexigrid").flexigrid({
            url: 'finance_bank_list',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
                {display: '开户银行', name : 'bank_name', width : 120, sortable : false, align: 'left'},
                {display: '银行卡号', name : 'bank_sn', width : 200, sortable : false, align: 'left'},
                {display: '银行开户人', name : 'bank_user_name', width : 100, sortable : false, align : 'left'},
                {display: '添加人', name : 'add_user', width : 100, sortable : false, align: 'center'},
                {display: '添加时间', name : 'add_time', width : 140, sortable : false, align: 'center'},
                {display: '状态', name : 'status', width : 80, sortable : false, align : 'left'},
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增银行卡', name : 'add', bclass : 'add', title : '新增数据', onpress : bank_add },
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : del },
            ],
            searchitems : [
                {display: '开户银行', name : 'bank_name'},
                {display: '银行卡号', name : 'bank_sn'},
                {display: '银行开户人', name : 'bank_user_name'},
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '银行卡列表'
        });
    });

    //编辑银行卡信息
    function bank_edit(id) {
        window.location.href = 'finance_bank_edit?op=edit&bank_id='+id;
    }
    function bank_add() {
        window.location.href = 'finance_bank_edit';
    }
    //编辑银行卡启用状态
    function edit_status(id,status) {
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'edit_sys_bank?op=status&bank_id='+id+'&status='+status,
            success:function(data){
                if(data.status) {
                    layer.msg(data.msg);
                    $("#flexigrid").flexReload();
                }else {
                    layer.msg(data.msg);
                }
            }
        })
    }
    function del() {
        if($('.trSelected').length>0){
            var itemlist = new Array();
            $('.trSelected').each(function(){
                itemlist.push($(this).attr('data-id'));
            });
            var id = itemlist.join(',');
            bank_del(id);
        } else {
            layer.msg('请至少选择一项');
        }
    }
    //删除银行卡
    function bank_del(id) {
        layer.confirm('确定删除？', {
            btn: ['确认','取消'] //按钮
        }, function() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'finance_bank_del?bank_id=' + id,
                success: function (data) {
                    if (data.status) {
                        layer.msg(data.msg);
                        $("#flexigrid").flexReload();
                    } else {
                        layer.msg(data.msg);
                    }
                }
            });
        });
    }

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
