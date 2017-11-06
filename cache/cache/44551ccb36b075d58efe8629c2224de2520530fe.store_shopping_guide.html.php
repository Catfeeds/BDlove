<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:03:43
  from "D:\www\yunjuke\application\pay\views\store_shopping_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984386fadccd0_86861267',
  'file_dependency' => 
  array (
    '44551ccb36b075d58efe8629c2224de2520530fe' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\store_shopping_guide.html',
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
function content_5984386fadccd0_86861267 ($_smarty_tpl) {
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
<title>导购管理</title>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>导购管理
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
			<i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>

<div class="page-container">
	<table class="table table-border table-bordered table-hover table-bg table-content">
		<thead>
		<tr>
			<th scope="col" colspan="13">导购列表</th>
		</tr>
		<tr class="text-c">
			<th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
			<th width="">导购昵称</th>
			<th width="">导购姓名</th>
			<th width="">电话</th>
			<th width="">职位</th>
			<th width="">所属门店</th>
			<th width="">操作</th>
		</tr>
		<tr><th  colspan="11">
			<span class="btn btn-primary radius" onclick="fg_operate('add')"><i class="fa fa-plus"></i>新增导购</span>
			<span class="btn btn-danger radius" onclick="fg_operate('delete')"><i class="fa fa-trash"></i>批量离职</span>
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
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')">
                  <option value="1"  >1&nbsp;&nbsp;</option>
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide')"><i class="fa fa-fast-forward"></i></div>
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
        var url = 'http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
    });

    //操作
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
                layer.msg('请选择要离职的导购',{icon:2});
                return false;
            }
        }else if(name == 'more'){
			/*批量导入导购*/
            data_import('导购',"http://[::1]/yunjuke/admin.php/write_import/excel_upload",'storeGuide_import?name=');
        }else if (name == 'add') {
            window.location.href="store_shopping_guide_edit";
        }else if (name == 'del') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_delete(itemlist);
            }else{
                layer.msg('请选择要离职的导购',{icon:2});
                return false;
            }
        }else if(name == 'download'){
            var itemlist = new Array();
            if($('.trSelected',grid).length>0){
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
            }
            itemlist = itemlist.join(',');
            $.ajax({
                type: "post",
                dataType: "json",
                url: 'http://[::1]/yunjuke/vmall.php/receive/download_much_short',
                data: "id=" + itemlist,
                beforeSend:function(){
                    layer.msg('正在下载，请稍等', {icon: 1});
                },
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
                        location.href = data.data;
                        layer.msg(data.msg, {icon: 1});
                    }else{
                        layer.msg(data.msg, {icon: 2});
                    }
                }
            });
        }
    }
	/*下载二维码*/
    function create_shot_code(id){
        window.location.href='http://[::1]/yunjuke/vmall.php/receive/create_shot_code?id='+id;
    }
	/*编辑*/
    function fg_edit(id){
        window.location.href="store_shopping_guide_edit?id="+id;
    }
	/*修改职务*/
    function update_role(id,check,role,name){
        role_ = (role==2)?'店长':((role==1)?'导购':'兼职导购');		//目前角色的身份
        str_grade = '';
        str_grade = "<option value=1 >兼职导购</option><option value=2 >导购</option><option value=3 >店长</option><option value=4 >管理员</option><option value=5 >负责人</option>";

		var content_grade = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
			'<form action="" id="changeRoleType" method="POST"><table class="table"><tbody>'+
			'<tr> <td width="20%">职务选择:</td><td  width="50%"><select name="role_type" value="" class="role_type">'+
			str_grade+'</select> </td></tr></tbody></table></form></div>';
		layer.open({
			type: 1,
			btn: ['确认', '取消'],
			title: '<b>修改'+role_+name+'的职务</b>',
			skin: 'layui-layer-rim', //加上边框
			area: ['320px', 'auto'], //宽高
			content: content_grade,
			yes: function(index,layero){
				role_type = $('#changeRoleType').find('.role_type').val();
				$.ajax({
					type: "post",
					dataType: "json",
					url: "update_role",
					data: {id:id,role:role_type,check:check},
					success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else if(data.state){
							layer.msg(data.msg);
							layer.close(index);
						}else{
							layer.msg(data.msg);
						}
						$.get('store_shopping_guide',function () {load_page('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide');});
					}
				});
			},no:function(){
				layer.closeAll();
			}
		})
    }
	/*删除*/
    function fg_delete(id,name){
        title = '';
        if(!name){
            title = '这'+id.length+'个导购';
            id = id.join(',');
        }else{
            title = '导购’'+name+'’';
        }
        layer.confirm('确认将'+title+'离职吗？',
            {btn: ['确认','取消']},
            function(){
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "del_guide",
                    data: {id:id},
                    success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else if(data.state){
                            layer.msg(data.msg);
                            $.get('store_shopping_guide',function () {load_page('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide');});
                        }else{
                            layer.alert(data.msg);
                        }
                        $.get('store_shopping_guide',function () {load_page('http://[::1]/yunjuke/pay.php/store/get_store_shopping_guide');});
                    }
                })
            }
        )
    }
</script>
<div id="goTop">
	<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
	<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>

</html><?php }
}
