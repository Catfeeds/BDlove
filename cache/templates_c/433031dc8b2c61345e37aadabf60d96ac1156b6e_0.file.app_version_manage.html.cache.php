<?php
/* Smarty version 3.1.29, created on 2017-09-28 16:07:38
  from "D:\www\yunjuke\application\admin\views\app_version_manage.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ccadca20c3f3_51920624',
  'file_dependency' => 
  array (
    '433031dc8b2c61345e37aadabf60d96ac1156b6e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\app_version_manage.html',
      1 => 1501580700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59ccadca20c3f3_51920624 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2147759ccadca16ffd4_39673152';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>版本管理</h3>
        <h5>APP版本相关信息管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>APP版本管理的相关设置，包括新增，删除，编辑，禁用等操作</li>
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
            url: 'get_app_version_manage',
            dataType: 'xml',
            colModel : [
                {display: '操作', name : 'operation', width : 100, sortable : false, align: 'center', className: 'handle'},
                {display: '编号', name : 'id', width : 60, sortable : false, align: 'center'},
                {display: '客户端设备', name : 'app_id', width : 90, sortable : false, align: 'center'},
                {display: '版本标识', name : 'version_code', width : 150, sortable : false, align : 'center'},
                {display: '安装包地址', name : 'apk_url', width : 150, sortable : false, align: 'center'},
                {display: '升级提示', name : 'upgrade_point', width : 150, sortable : false, align: 'center'},
                {display: '是否可用', name : 'status', width : 60, sortable : false, align: 'center'},
                {display: '创建时间', name : 'create_time', width : 115, sortable : false, align: 'center'}
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate }],
            searchitems : [
                {display: '编号', name : 'id'},
                {display: '版本标识', name : 'version_code'}
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: 'APP版本列表'
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
        }else if(name == 'add'){
            window.location.href = 'app_version_edit/0';
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
            url: "app_version_delete",
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
    
    function update_state(id,state){
        $.ajax({
            url:'update_state',
            data:{'id':id,'state':state==1?0:1},
            type:'post',
            dataType:'json',
            success:function(data){
                if (data.state){
                    layer.msg(data.msg);
                    $("#flexigrid").flexReload();
                } else {
                    layer.msg(data.msg);
                }
            }
        });
    }
    function fg_edit(id){
        window.location.href = 'app_version_edit/'+id;
    }
<?php echo '</script'; ?>
>
</html><?php }
}
