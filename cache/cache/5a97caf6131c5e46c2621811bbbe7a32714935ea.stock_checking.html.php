<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:10:31
  from "D:\www\yunjuke\application\pay\views\stock_checking.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59843a07a788b6_61115684',
  'file_dependency' => 
  array (
    '5a97caf6131c5e46c2621811bbbe7a32714935ea' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_checking.html',
      1 => 1501636154,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
    '4379b6740719dd7689b65b50209b65c69516b51b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\common_list_page.html',
      1 => 1500341760,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59843a07a788b6_61115684 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
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
    <div class="pDiv">
       <div class="pDiv2">
          <div class="pGroup-left">每页最多显示
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')">
                  <option value="1"  >1&nbsp;&nbsp;</option>
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list')"><i class="fa fa-fast-forward"></i></div>
         </div>
         <div class="pPageStat"></div>
         <div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">0</span>条记录，
                              当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>
        </div>
       </div>
       <div style="clear:both"></div> 
</div>
</div>
<script type="text/javascript">
	
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
        var url = 'http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list';
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
		window.location.href="http://[::1]/yunjuke/pay.php/store/store_decoration_edit?id="+id;
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
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                        }
			        	$.get('stock_checking',function () {load_page('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list');});
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
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
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
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                        }
			        	 $.get('stock_checking',function () {load_page('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list');});
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
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else {
                    layer.msg(data.msg);
                }
	        	 $.get('stock_checking',function () {load_page('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list');});
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
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
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
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
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
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else {
                    layer.msg(data.msg);
                }
	        	$.get('stock_checking',function () {load_page('http://[::1]/yunjuke/pay.php/stock/stock_checking?op=get_list');});
	        }
	   })
	}
	    
	function canceluser(){
		layer.closeAll();
	}
 


</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
