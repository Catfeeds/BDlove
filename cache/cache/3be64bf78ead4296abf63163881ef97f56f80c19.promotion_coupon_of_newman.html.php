<?php
/* Smarty version 3.1.29, created on 2017-11-01 13:42:19
  from "D:\www\yunjuke\application\admin\views\promotion_coupon_of_newman.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f95ebb57bf16_27554672',
  'file_dependency' => 
  array (
    '3be64bf78ead4296abf63163881ef97f56f80c19' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_coupon_of_newman.html',
      1 => 1501573995,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1505983976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59f95ebb57bf16_27554672 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<style>
td.active-time div{padding:2px !important;height:38px !important;line-height:18px !important;}
.stop:hover{
	color: #F37B1D!important;
	border: 1px space #F37B1D!important;
}
</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
							<div class="subject">
								<h3>新会员送券</h3>
								<h5>平台中的所有优惠卷的管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <li><a class="current" >进行中</a></li>
						        <li><a href="couponOfNewman?op=2" >未开始</a></li>
						        <li><a href="couponOfNewman?op=3" >已结束</a></li>
						      
					      </ul>
		            </div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 创建并管理新会员送券活动</li>
				</ul>
		     </div>
		    
            <div id="flexigrid">
            </div>
	</div>
	<script>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_couponOfNewman?op=1',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '活动时间', name : 'storelogo', width : 150, sortable : true, align: 'center',className: 'active-time'},
			{display: '被领取数', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '优惠券名称', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '优惠卷', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '活动备注', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '使用说明', name : 'member_email', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>创建新会员送券', name : 'add', bclass : 'add', title : '创建新会员送券', onpress : fg_operate },
			{display: '<i class="fa fa-trash-o"></i>结束活动', name : 'stop', bclass : 'stop', title : '结束活动', onpress : fg_operate },
		],
		searchitems : [
			{display: '优惠券类型', name : 'ous_tel'},
		],
		title: '新会员送券活动列表'
	});
	function fg_operate(name, grid) {
    if (name == 'del') {
        if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
           layer.msg('请至少选择一个活动',{icon:2}); return false;
        }
    }else if (name == 'add') {
    	window.location.href="PromotionCouponOfNewman_edit";
    }else if(name=='stop'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	fg_stop(itemlist);
    }
}
});
function fg_edit(id){
	window.location.href="PromotionCouponOfNewman_edit?id="+id;
}
/*删除*/
function fg_delete(id,name){
	title = '';
	if(!name){
		title = '这'+id.length+'个活动';
		id = id.join(',');
		
	}else{
		title = '活动优惠卷’'+name+'’';
	}
	layer.confirm('确认删除'+title+'吗？',
			   {btn: ['确认','取消']}, 
			   function(){
				   $.ajax({
				        type: "post",
				        dataType: "json",
				        url: "del_promotionCouponOfNewman",
				        data: {id:id},
				        success: function(data){
						  if(data.state=='403'){
					           login_ajax('shopadmin');
				            }else if(data.state){
				            	layer.msg(data.msg);
				            	$("#flexigrid").flexReload();
				            	layer.close(index);
				            }else{
				            	$("#flexigrid").flexReload();
				            	layer.alert(data.msg);
				            }
				        }
				   })
			   }
	)
}
function fg_stop(id) {
    if (typeof id == 'number') {
        var id = new Array(id.toString());
    }
    layer.confirm('确认要结束这 ' + id.length + ' 项吗？', {
        btn: ['确认','取消'] //按钮
    }, function(){
        ids = id.join(',');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "stop_activity?type=1&id="+ids,
            data: '',
            success: function(data){
                if(data.state=='403'){
                    login_ajax('shopadmin');
                }else if(data.state==false){
                    layer.msg(data.msg);
                }else if(data.state==true){
                    layer.msg(data.msg);
                }
                    window.location.href="couponOfNewman";
                }
        });
    });
}
        </script>
        <div id="goTop">
            <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
            <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
        </div>
        </body>

</html><?php }
}
