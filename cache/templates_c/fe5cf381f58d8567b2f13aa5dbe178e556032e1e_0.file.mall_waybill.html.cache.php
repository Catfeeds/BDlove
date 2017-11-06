<?php
/* Smarty version 3.1.29, created on 2017-08-15 17:18:19
  from "D:\www\yunjuke\application\admin\views\mall_waybill.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5992bc5b38cd20_59955728',
  'file_dependency' => 
  array (
    'fe5cf381f58d8567b2f13aa5dbe178e556032e1e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_waybill.html',
      1 => 1502782708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5992bc5b38cd20_59955728 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '186675992bc5b2ae274_18154429';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .btn{border:none}
    .flexigrid .hDiv th div, .flexigrid .bDiv td div, .colCopy div {
        height: auto;
    }
    .flexigrid .hDiv th, .flexigrid .bDiv td{
        vertical-align: middle!important;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>运单模板</h3>
                <h5>提供给商家可选择的快递运单模板</h5>
            </div>
        </div>
    </div>
    <!--操作提示-->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>系统内置的快递运单模板不可删除，不可编辑。</li>
        </ul>
    </div>
    <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $("#flexigrid").flexigrid({

            url: 'mall_waybill_list',
            colModel : [
                {display: '操作', name : 'operation', width : 200, sortable : false, align: 'center', className: 'handle'},
                {display: '运单名称', name : 'w_name', width : 120, sortable : true,},
                {display: '物流公司', name : 'e_name', width : 120, sortable : true, },
                {display: '运单图例', name : 'w_image', width : 200, sortable : true, },
                {display: '宽高', name : 'w_hw', width : 100, sortable : true, },
                {display: '上偏移量', name : 'w_top', width : 60, sortable : true, align: 'left'},
                {display: '下偏移量', name : 'w_left', width : 60, sortable : true, align: 'center'},
                {display: '是否启用', name : 'w_state', width : 100, sortable : true, align: 'center'},
            ],
            buttons : [
                {display: '添加运单模版', name : '', bclass : 'add', title : '新增数据', onpress :mall_waybill_edit  }
            ],
            searchitems : [
                {display: '运单名称', name : 'w_name'},
                {display: '物流公司', name : 'e_name'},
            ],
            sortname: "id",
            sortorder: "asc",
            title: '运单模板列表'
        });
        function mall_waybill_edit(){
            window.location="mall_waybill_edit"
        }
    });
    function mall_waybill_design(id){
        window.location="mall_waybill_design?data="+id;

    }
    function mall_waybill_test(id,type){
        window.location="mall_waybill_test?data="+id+"&type="+type
    }
    function mall_waybill_edit(id){
        window.location="mall_waybill_edit?data="+id
    }
    function mall_waybill_del(id){
        layer.confirm('确认删除模板吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                type: "post",
                dataType: "json",
                url: "mall_waybill_del",
                data: {waybill_id:id},
                success: function(data){
                    //alert(123);
                    if(data.state=='403'){
                        layer.msg(data.msg);
                    }else if (data.state){
                        layer.msg(data.msg);
                        $("#flexigrid").flexReload();
                    } else {
                        layer.msg(data.msg);
                    }

                }
            });
        });
    }

    function stop_waybill(id,state,name){

        if(state==1){
            str = '禁用"'+name+'"';
        }else{
            str = '启用"'+name+'"';
        }
        layer.confirm('确认'+str+'吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                type: "post",
                dataType: "json",
                url: "mall_waybill?op=stop",
                data: {id:id,state:state},
                success: function(data){
                    //alert(123);
                    if(data.state=='403'){
                        login_ajax('shopadmin');
                    }else
                    if (data.state){
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
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
