<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:09:56
  from "D:\www\yunjuke\application\admin\views\mall_express.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c22254156896_86677482',
  'file_dependency' => 
  array (
    'fa86410ad90346b22c8264722f04a557b56d4e1e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_express.html',
      1 => 1501569177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c22254156896_86677482 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1286859c22254006948_75775909';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
plugins/select2/css/select2.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
<style>
.btn{border:none}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>快递公司</h3>
                <h5>提供给商家可选择的物流快递公司</h5>
            </div>
        </div>
    </div>
    <!--操作提示-->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>系统内置的快递公司不得删除，只可编辑状态，平台可禁用不需要的快递公司，默认按首字母进行排序，常用的快递公司将会排在靠前位置</li>
        </ul>
    </div>
    <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
>

    $(function(){
        $("#flexigrid").flexigrid({
            url: 'mall_express?op=table',
            colModel : [
                {display: '操作', name : 'operation', width : 120, sortable : false, align: 'center', className: 'handle'},
                {display: '公司名称', name : 'e_name', width : 120, sortable : true, align: 'left'},
                {display: '公司编号', name : 'e_code', width : 120, sortable : true, align: 'left'},
                {display: '首字母', name : 'e_letter', width : 60, sortable : true, align: 'center'},
                {display: '公司网址', name : 'e_url', width : 200, sortable : true, align: 'left'},
                {display: '状态', name : 'e_state', width : 60, sortable : true, align: 'center'},
                {display: '是否默认', name : 'e_order', width : 60, sortable : true, align: 'center'},
                
            ],
            buttons : [
                {display: '批量启用', name : '', bclass : 'add', title : '批量启用', onpress :Batch_enable  }
            ],
            searchitems : [
                {display: '公司名称', name : 'e_name'},
                {display: '公司编号', name : 'e_code'},
                {display: '首字母', name : 'e_letter'}
            ],
            sortname: "id",
            sortorder: "asc",
            title: '快递公司列表'
        });
    });
function Batch_enable(){//批量启用
    if($('.trSelected').length>0){
        var itemlist = new Array();
        $('.trSelected').each(function(){
            itemlist.push($(this).attr('data-id'));
        });
        
        var size = itemlist.length;
		stname = '这'+size+'个运单模板';
		id = itemlist.join(',');
    	layer.confirm('确认启用'+stname+'吗？',
    	   {btn: ['确认','取消']}, 
    	   function(){
     		   $.ajax({
    		        type: "post",
    		        dataType: "json",
    		        url: "mall_express?op=batch",
    		        data: "id="+id,
    		        success: function(data){
    		         	layer.msg(data.msg);
    		         	$("#flexigrid").flexReload();
    		        }
    		   }) 
    	   }
    	)
    	
    	
    	
    	
    }else{
    	layer.msg("至少选择一个快递模板！")
        return false;
    }
	
}    
function mall_waybill_design(id){
    window.location="mall_waybill_design?data="+id
}
function mall_waybill_test(id){
    window.location="mall_waybill_test?data="+id
}
function mall_waybill_edit(id){
    window.location="mall_waybill_edit?data="+id
}
function stop_express(id,state,name){
	
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
			        url: "mall_express?op=stop",
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
function default_express(id,state,name){
	
		if(state==1){
			str = '取消"'+name+'"为默认快递';
		}else{
			str = '设置"'+name+'"为默认快递';
		}
		layer.confirm('确认'+str+'吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
				$.ajax({
			        type: "post",
			        dataType: "json",
			        url: "mall_express?op=default",
			        data: {id:id,state:state,name:name},
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
