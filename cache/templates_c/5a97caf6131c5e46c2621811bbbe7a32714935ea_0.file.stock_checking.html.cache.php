<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:10:31
  from "D:\www\yunjuke\application\pay\views\stock_checking.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59843a07967173_28660805',
  'file_dependency' => 
  array (
    '5a97caf6131c5e46c2621811bbbe7a32714935ea' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_checking.html',
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
function content_59843a07967173_28660805 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2977859843a076f60e1_61831612';
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
			<i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span>盘点管理
			<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
				<i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
<div class="page-container">
    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">库存列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">区域名称</th>
            <th width="">添加时间</th>
            <th width="">数量</th>
            <th width="">最后录入时间</th>
            <th width="">操作</th>
        </tr>
        <tr><th colspan="11">
            <span class="btn btn-primary radius" onclick="fg_operate('add')"><i class="fa fa-cloud-upload"> 新增区域</i></span>
            <span class="btn btn-danger radius" onclick="fg_operate('delete')"><i class="fa fa-trash"> 批量删除</i></span>
            <span class="btn btn-success radius" onclick="fg_operate('submit')"><i class="fa fa-check-square-o"> 确认盘点</i></span>
            <span class="btn btn-secondary radius" onclick="fg_operate('export')"><i class="fa fa-sign-out"> 导出数据</i></span>
            <span class="btn btn-primary radius" onclick="fg_operate('back')"><i class="fa fa-window-restore"> 还原库存</i></span>
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
	    	   make_name();
	    }else if(name == 'export'){
	    	if($('.trSelected',grid).length>0){
	            var itemlist = new Array();
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	            export_data(itemlist);
	        }else{
	        	layer.msg("至少选择一个盘点区域");
	            return false;
	        }
	    }else if(name == 'submit'){
	    	submit_data();
	    }else if(name == 'back'){
	    	back_data();
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
			stname = '这'+size+'个区域';
			id = id.join(',');
		}else{
			stname = name;
		}
		layer.confirm('确认删除    '+stname+'  吗？',
		   {btn: ['确认','取消']}, 
		   function(){
			   $.ajax({
			        type: "post",
			        dataType: "json",
			        url: "del_inventory_area",
			        data: "sia_id="+id,
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
                        }
			        	$.get('stock_checking',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
			        }
			   })
		   }
		)
		//console.log(typeof(id))
	}


	//导数据
	function export_data(id,name){
		var stname = '';
		if(typeof(id)=='object'){
			var size = id.length;
			stname = '这'+size+'个区域数据';
			id = id.join(',');
		}else{
			stname = name;
		}
		layer.confirm('确认导出    '+stname+'  吗？',
		   {btn: ['确认','取消']}, 
		   function(){
			   $.ajax({
			        type: "post",
			        dataType: "json",
			        url: "inventory_data_export",
			        data: "sia_id="+id,
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
                        }
			        }
			   })
		   }
		)
		//console.log(typeof(id))
	}



	//复制区域数据
	function copy_data(id,name){
		var stname = '';
		if(typeof(id)=='object'){
			var size = id.length;
			stname = '这'+size+'个区域数据';
			id = id.join(',');
		}else{
			stname = name;
		}
		layer.confirm('确认复制    '+stname+'  的盘点数据吗？',
		   {btn: ['确认','取消']}, 
		   function(){
			   $.ajax({
			        type: "post",
			        dataType: "json",
			        url: "inventory_data_copy",
			        data: "sia_id="+id,
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
                        }
			        	 $.get('stock_checking',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
			        }
			   })
		   }
		)
		//console.log(typeof(id))
	}


	//确认盘点
	function submit_data(){
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "inventory_data_submit",
	        data: "op="+'submit',
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
                }
	        	 $.get('stock_checking',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
	        }
	   })
	}

	//库存还原
	function back_data(){
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "inventory_data_history",
	        data: "op="+'history',
	        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
	        			var contents = '<div style="margin-top: 20px;"></div>'+
							      	    '<table class="table table-border" style="width:630px !important;border-top: 0px;margin-left: 20px;">'+
										'<tr>'+
											'<th style="width: 40px !important;">序号</th>'+
											'<th style="width: 80px !important;">盘点人</th>'+
											'<th style="width: 160px !important;">盘点时间</th>'+
											'<th style="width: 180px !important;">盘点文件</th>'+
											'<th style="width: 60px !important;">操作</th>'+
										'</tr>';
		        	$(data.data).each(function(k,v){
		        		var num = k+1;
		        		contents +=	'<tr>'+
						  				'<th style="width: 40px !important;">'+num+'</th>'+
											'<th style="width: 80px !important;">'+v.create_user_name+'</th>'+
											'<th style="width: 160px !important;">'+v.date+'</th>'+
											'<th style="width: 180px !important;">'+v.sil_url+'</th>'+
											'<th style="width: 60px !important;"><a class="btn btn-warning" url="'+v.sil_url+'"  onclick="goback_data(this)">还原</a></th>'+
										'</tr>';
			    	  });
		        	contents +='<tr>'+
					  				'<th style="width: 40px !important;"></th>'+
									'<th style="width: 80px !important;"></th>'+
									'<th style="width: 160px !important;"></th>'+
									'<th style="width: 180px !important;"></th>'+
									'<th style="width: 60px !important;"></th>'+
								'</tr>'+
		        		       '</table>'+ 
							   '<div style="clear: both;"></div>';
	        		layer.open({//新增区域
	        			type: 1,
	        			title: '<b>选择还原点</b>',
	        			skin: 'layui-layer-rim', //加上边框n
	        			area: ['auto', 'auto'], //宽高
	        			content:contents,
	        	
	        		})
	        	}else{
	        		 layer.msg(data.msg); 
	        	}
	        }
	   })
	}

	function goback_data(obj){
		//alert($(obj).attr("url"))
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "inventory_data_back",
	        data: "file="+$(obj).attr("url"),
	        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
	        		layer.msg(data.msg); 
	        		setTimeout('layer.closeAll();',2000);
	        	}else{
	        		layer.msg(data.msg); 
	        	}
	        	 
	        }
	   })
	}


	function make_name(obj){
		if(typeof(obj)=='undefined'){
			layer.open({//新增区域
				type: 1,
				title: '<b>新增区域</b>',
				skin: 'layui-layer-rim', //加上边框n
				area: ['auto', '210px'], //宽高
				content:'<div style="margin-top: 20px;"></div>'+
				        '<form method="post" enctype="multipart/form-data" id="updateuserinfo" name="updateuserinfo">'+
				        '<input type="hidden" id="sia_id" value="" name="sia_id"/>'+
				        '<input type="hidden" id="old_area_name" value="" name="old_area_name"/>'+
			      	    '<table class="table table-border" style="width:370px !important;border-top: 0px;margin-left: 20px;">'+
			      				'<tr>'+
			      					'<th style="width: 40px !important;">区域名称</th>'+
			      					'<th style="width: 90px !important;"><input type="text" id="area_name" value="" name="area_name" class="size-M"/></th>'+
			      				'</tr>'+
				      	 '</table>'+ 
				      	 '</form>'+
						'<div style="clear: both;"></div>'+
						'<div class="layui-layer-btn">'+
							'<a class="layui-layer-btn0" onclick="updateuser()">确认</a>'+
							'<a class="layui-layer-btn1" onclick="canceluser()">取消</a>'+
					    '</div>'+
						'<div style="clear: both;"></div>',
		
			})
		}else{
			layer.open({//重命名
				type: 1,
				title: '<b>重命名('+obj.sia_area_name+')</b>',
				skin: 'layui-layer-rim', //加上边框n
				area: ['auto', '210px'], //宽高
				content:'<div style="margin-top: 20px;"></div>'+
				        '<form method="post" enctype="multipart/form-data" id="updateuserinfo" name="updateuserinfo">'+
				        '<input type="hidden" id="sia_id" value="'+obj.sia_id+'" name="sia_id"/>'+
				        '<input type="hidden" id="old_area_name" value="'+obj.sia_area_name+'" name="old_area_name"/>'+
			      	    '<table class="table table-border" style="width:370px !important;border-top: 0px;margin-left: 20px;">'+
			      				'<tr>'+
				      				'<th style="width: 40px !important;">区域名称</th>'+
			      					'<th style="width: 90px !important;"><input type="text" id="area_name" value="" name="area_name" class="size-M"/></th>'+
		      				    '</tr>'+
			      				
				      	 '</table>'+ 
				      	 '</form>'+
						'<div style="clear: both;"></div>'+
						'<div class="layui-layer-btn">'+
							'<a class="layui-layer-btn0" onclick="updateuser()">确认</a>'+
							'<a class="layui-layer-btn1" onclick="canceluser()">取消</a>'+
				    	'</div>'+
						'<div style="clear: both;"></div>',
		
			})
		}
	}




	function updateuser(){
		//检测区域名称
		if($("#area_name").val()==''){
			layer.msg('区域名称不能为空');
			return false;
		}
		if($("#sia_id").val()!='' && $("#old_area_name").val()!=''){
			if($("#area_name").val() ==$("#old_area_name").val()){
				layer.msg('新区域名称不能和之前相同！');
				return false;
			}
		}
		
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "add_make_area",
	        data: $('#updateuserinfo').serialize(),
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
                }
	        	$.get('stock_checking',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
	        }
	   })
	}
	    
	function canceluser(){
		layer.closeAll();
	}
 


<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
