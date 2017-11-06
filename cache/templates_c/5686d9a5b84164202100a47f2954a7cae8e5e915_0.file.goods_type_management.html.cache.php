<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:33:46
  from "D:\www\yunjuke\application\admin\views\goods_type_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c227eabf6aa8_21183224',
  'file_dependency' => 
  array (
    '5686d9a5b84164202100a47f2954a7cae8e5e915' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_type_management.html',
      1 => 1501555009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c227eabf6aa8_21183224 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1425959c227eaabe259_97922654';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">


<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>类型管理</h3>
                <h5>商品类型的管理可用于绑定商品分类</h5>
            </div>
        </div>
    </div>
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>当管理员添加商品分类时需选择类型。前台分类下商品列表页通过类型生成商品检索，方便用户搜索需要的商品。</li>
            <li>类型的属性为商品的附加属性，以展示更多商品参数，其关联到分类管理中的子分类</li>
        </ul>
    </div>
    <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
>

    $(function(){
        $("#flexigrid").flexigrid({
            url: 'goods_type_management?op=getList',
            colModel : [
                {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
                
                {display: '类型名称', name : 'type_name', width : 120, sortable : true, align: 'left'},
                {display: '类型属性数', name : 'type_sort', width : 120, sortable : true, align: 'center'},
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增类型', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operation },
                {display: '<i class="fa fa-plus"></i>新增属性', name : 'add_', bclass : 'add', title : '新增数据', onpress : fg_add_val }
            ],
            searchitems : [
                {display: '类型名称', name : 'type_name'},
            ],
            title: '类型列表'
        });
    });

    function fg_operation() {
        window.location="goods_type_add";
    }
    function fg_add_val() {
        window.location="type_val_add";
    }
    function fg_edit(type_id) {
        window.location.href = 'goods_type_edit?type_id='+type_id;
    }

    //编辑属性列表
    function fg_spec(type_id, type_name) {
        //window.location.href = 'type_spec?type_id='+type_id;
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "type_spec?type_id="+type_id,
            data: '',
            success: function(data){
                if(data.state=='403'){
                    login_ajax('shop',data);
                }else if(data.state == false){
                    layer.msg(data.msg);
                }else if(data.state == true){
                    layer.msg(data.msg);
                }
                var attr_div  = '';
                $.each(data, function() {
                    var input_type = this.sp_input_type== '1' ? '手工录入' : (this.sp_input_type == '2' ? '从列表中选择' : '多行文本');
                    var str = '<tr id="'+this.sp_id+'">'+
                                '<td><input  type="checkbox" name="sp_id" class="check" value="'+this.sp_id+'"></td>'+
//                                '<td>'+this.sp_id+'</td>'+
                                '<td id="'+this.sp_cl_id+'"><b>'+this.sp_name+'</b></td>'+
                                '<td>'+input_type+'</td>'+
                                '<td>'+this.sp_select_lists+'</td>'+
                                '<td><button class="btn red"  onclick="fg_spec_delete('+this.sp_id+');">删除</button>'+
                                '<a class="btn" href="type_val_edit?type_id='+this.sp_id+'">编辑</a></td>'+
                             '</tr>';
                    attr_div = attr_div + str;
                });
                var str_div = '<div class="pt-20 pb-30 pl-30 pr-20 ">' +
                            '<table class="table">'+
                                '<th  style="width: 10px;!important;"><input type="checkbox" name="sp" onclick="checkAll();"></th>'+
//                                '<th>ID</th>'+
                                '<th>属性名</th>'+
                                '<th>录入方式</th>'+
                                '<th>选项值</th>'+
                                '<th>操作</th>'+
                                attr_div+
                                '<tr><td><button onclick="fg_spec_deleteM()" class="btn red">批量删除</button></td></tr>'+
                            '</table>'+
                            '</div>';
                layer.open({
                    type: 1,
                    btn: ['新增',  '取消'],
                    title: '<b> '+type_name+' 属性列表</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['780px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        //跳转到添加
                        window.location.href="type_val_add?type_id="+type_id;
                    }
                });
            }
        });
    }
    function checkAll()
    {
        if($("[name='sp']").attr('checked')){
            $("[name='sp_id']").attr("checked",'true');//全选
        }else{
            $("[name='sp_id']").attr("checked",false);//全不选
        }
    }
    function fg_spec_deleteM()
    {
        var itemlist = new Array();
        $('input:checkbox[name=sp_id]:checked').each(function () {
            itemlist.push($(this).val());
        });
        if (itemlist.length>0) {
            fg_spec_delete(itemlist);
        } else {
            layer.msg('请选择');
        }

    }
    function fg_spec_delete(id)  //删除选中的属性
    {
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            }
            layer.confirm('确认要删除这 ' + id.length + ' 项吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                ids = id.join(',');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "type_spec_delete?type_id="+ids,
                    data: '',
                    success: function(data){
                        if(data.state=='403'){
                            login_ajax('shopadmin');
                        }else
                        if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                        layer.closeAll();
                        layer.msg('删除成功');
                    }
                });
            });
    }
    function fg_delete(id) {
    	if (typeof id == 'number') {
        	var id = new Array(id.toString());
    	};
    	layer.confirm('确认要删除这 ' + id.length + ' 项吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
		    ids = id.join(',');
		    $.ajax({
	            type: "GET",
	            dataType: "json",
	            url: "type_delete?type_id="+ids,
	            data: '',
	            success: function(data){
				if(data.state == '403'){
				login_ajax('shopadmin');
			}else if(data.state == false){
		        		layer.msg(data.msg);
		        	}else if(data.state == true){
			        	layer.msg(data.msg);
		        	}
		        	window.location.href = "goods_type_management";
		        }
	        });
		});	    
    }


<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
