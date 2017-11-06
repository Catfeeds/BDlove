<?php
/* Smarty version 3.1.29, created on 2017-08-21 14:31:47
  from "D:\www\yunjuke\application\pay\views\store_decoration_template.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599a7e539b4b95_52899146',
  'file_dependency' => 
  array (
    '0165aea23a9db6e749f4fece37cabec80ff8dd71' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\store_decoration_template.html',
      1 => 1501636154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
  ),
),false)) {
function content_599a7e539b4b95_52899146 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '10154599a7e5386c947_19172061';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
plugins/select2/css/select2.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
	<style type="text/css">
		a:hover{
			color: #333;
		}
	</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
		    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>装修模板列表
		    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		        <i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
<div class="page-container">

    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">装修模板列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">操作</th>
            <th width="">是否启用</th>
            <th width="">模板名称</th>
        </tr>
        <tr><th colspan="11">
            <span class="btn btn-primary radius" onclick="fg_operate('add')"><i class="fa fa-plus"> 新增模板</i></span>
            <span class="btn btn-danger radius " onclick="fg_operate('delete')"><i class="fa fa-trash"> 批量删除</i></span>
        </th></tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="flexigrid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common_list_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
	
	//	实现tab切换的源码
	jQuery.Huitab =function(tabBar,tabCon,class_name,tabEvent,i){
	var $tab_menu=$(tabBar);
	  // 初始化操作
	  $tab_menu.removeClass(class_name);
	  $(tabBar).eq(i).addClass(class_name);
	  $(tabCon).hide();
	  $(tabCon).eq(i).show();
  
  	$tab_menu.bind(tabEvent,function(){
  	  $tab_menu.removeClass(class_name);
      $(this).addClass(class_name);
      var index=$tab_menu.index(this);
      $(tabCon).hide();
      $(tabCon).eq(index).show()})}
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","1");
	
    function get_check()
    {
        $("input[name='check']:checkbox").each(function(i) {
            if($(this).attr("checked")){
                $(this).parent().parent().addClass('trSelected');
            } else {
                $(this).parent().parent().removeClass('trSelected');
            }
        });
    }
    $(function(){
        var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
        $(".select2").select2({
            width:'200px'
        });

    });  
    

    function fg_operate(name, grid) {
    	get_check();
        if (name == 'delete') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                	itemlist.push($(this).attr('data-id'));
                });
                fg_delete(itemlist);
            }else{
            	layer.msg("至少选择一个盘点区域");
                return false;
            }
        }else if (name == 'add') {
        	window.location.href="<?php echo base_url('pay.php/store/');?>
store_decoration_add";
        }
    }
    
  //编辑
    function fg_edit(id){
    	window.location.href="<?php echo base_url('pay.php/store/');?>
store_decoration_edit?id="+id;
    }
    //删除
    function fg_delete(id,name){
    	var stname = '';
    	if(typeof(id)=='object'){
    		var size = id.length;
    		stname = '这'+size+'个模板';
    		id = id.join(',');
    	}else{
    		stname = name;
    	}
    	layer.confirm('确认删除'+stname+'吗？',
    	   {btn: ['确认','取消']}, 
    	   function(){
    		   $.ajax({
    		        type: "post",
    		        dataType: "json",
    		        url: "store_decoration_del",
    		        data: "id="+id,
    		        success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
    		            	layer.msg(data.msg);
    		            	$.get('store_decoration_template',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
    		            }
    		        }
    		   })
    	   }
    	)
    	//console.log(typeof(id))
    }


    //启用模块
    function use_template(sdt_id){
    	   $.ajax({
    	        type: "post",
    	        dataType: "json",
    	        url: "use_decoration_template",
    	        data: "sdt_id="+sdt_id,
    	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
    				  layer.msg(data.msg)
    				  setTimeout('location.reload("get_store_decoration_template");',2000);
    	            }else{
    	            	layer.msg(data.msg);
    	            }
    	        }
    	   })
    }


    //解绑模块
    function close_template(sdt_id){
    	   $.ajax({
    	        type: "post",
    	        dataType: "json",
    	        url: "close_decoration_template",
    	        data: "sdt_id="+sdt_id,
    	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
    				  layer.msg(data.msg)
    				  setTimeout('location.reload("get_store_decoration_template");',2000);
    	            }else{
    	            	layer.msg(data.msg);
    	            }
    	        }
    	   })
    }   
    
    
  


<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
