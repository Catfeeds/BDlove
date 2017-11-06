<?php
/* Smarty version 3.1.29, created on 2017-08-01 10:20:52
  from "D:\www\yunjuke\application\admin\views\goods_management_trash.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fe584365cd2_50083764',
  'file_dependency' => 
  array (
    '03696646b29bb3eba9542c32bff2ecd5eb9dfa41' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_management_trash.html',
      1 => 1501553535,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597fe584365cd2_50083764 ($_smarty_tpl) {
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
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
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
    .flexigrid .bDiv td div, .colCopy div{height:auto}
    .flexigrid .hDiv th, .flexigrid .bDiv td{vertical-align: middle !important;}
    .new_goods{color:white;background-color: red;}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>商品管理</h3>
                <h5>商城所有商品索引及管理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="goods_management?source=all"><span>全库商品</span></a></li>
                <li><a href="goods_management?op=shop_goods&source=all"><span>门店自建</span></a></li>
                                <li><a class="current"  href="goods_management?op=trash&source=all"><span>回收站</span></a></li>
                            </ul>
        </div>
    </div>
    <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>回收站收录全库商品和门店自建删除的数据</li>
            <li>回收站中的商品数据不会在前台显示</li>
        </ul>
    </div>
    <div class="mt-10 mb-10">
        <form method="post" name="formSearch" id="formSearch">
            <div class="search mt-20 mb-10">
                <select name="brand_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                    <option value="">-全部品牌-</option>
                                                            <option value="378">ABC KIDS</option>
                                        <option value="377">公主安娜</option>
                                        <option value="380">妮可贝贝</option>
                                        <option value="385">企鹅仔仔</option>
                                        <option value="386">雅鹿</option>
                                        <option value="376">植木西</option>
                                                        </select>
                名称：
                <input type="text" name="goods_name" class="input-text input_text mb-10">
                款号：
                <input type="text" name="goods_spu" class="input-text input_text mb-10">
                <input type="button" class="btn btn-warning radius ml-10 mb-10" id="submit" name="submit" value="搜索">
            </div>
        </form>
    </div>
    <div id="flexigrid"></div>
</div>
<script type="text/javascript">

  $(function(){
	$('#submit').click(function(){
            var search = $("#formSearch").serialize();
            $("#flexigrid").flexOptions({url: 'get_trash_list?'+search, method: 'post', qtype:'', query:'',}).flexReload();
	});
    $("#flexigrid").flexigrid({
      url: 'get_trash_list',
      colModel : [
        {display: '操作', name: 'article_number', width: 120, sortable: false, align: 'center',className:'handle'},
        {display: '商品信息', name: 'goods_info', width: 200, sortable: false, align: 'center'},
        {display: '销售价', name: 'goods_price', width: 80, sortable: false, align: 'center'},
        {display: '市场价', name: 'goods_marketprice', width: 80, sortable: false, align: 'center'},
        {display: '总销量', name: 'sales', width: 100, sortable: false, align: 'center'},
        {display: '添加时间', name: 'add_time', width: 120, sortable: false, align: 'center'},
      ],
      buttons : [
        {display: '<i class="fa fa-trash"></i>彻底删除', name : 'completely_delete', bclass : 'del', title : '', onpress : fg_operate },
        {display: '<i class="fa fa-plus"></i>批量还原', name : 'restore', bclass : 'add', title : '', onpress : fg_operate }
      ],
//      searchitems : [
//        {display: 'SKU', name : 'goods_id'},
//        {display: '商品名称', name : 'goods_name'},
//        {display: '分类ID', name : 'gc_id'},
//        /*{display: '店铺ID', name : 'store_id'},
//        {display: '店铺名称', name : 'store_name'},*/
//        {display: '品牌ID', name : 'brand_id'},
//        {display: '品牌名称', name : 'brand_name'}
//      ],
      title: '商品列表'
    });
    $('#ncreset').click(function(){
    	$("#formSearch")[0].reset();
    });

  });
    function fg_edit(goods_id){
            window.location.href = "goods_edit_goods_second?op=edit&goods_id="+goods_id;
    }
    //下架
    function fg_unshelve(goods_id){
            layer.confirm('您确定要将此商品下架吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_unshelve?goods_id="+goods_id,
                data: '',
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shopadmin');
                    }else if(data.state==false){
                            layer.msg(data.msg);
                    }else if(data.state==true){
                            layer.msg(data.msg);
                    }
                    window.location.href="goods_management?op=shop_goods&type=sale_off";
                }
            });
        })
    }
    //上架
    function fg_putaway(goods_id){
            layer.confirm('您确定要将此商品上架吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){
                    $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_putaway?goods_id="+goods_id,
                data: '',
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shopadmin');
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    window.location.href="goods_management?op=shop_goods&type=putaway";
                    }
            });
            })
    }
        
    function fg_operate(name, grid) {
      if (name == 'completely_delete') {  //彻底删除
          if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                        itemlist.push($(this).attr('data-id'));
                });
                fg_completely_delete(itemlist);
          }else{
                layer.msg('请至少选择一项！');
          }
      }else if (name == 'restore') {   //还原
          if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                        itemlist.push($(this).attr('data-id'));
                });
                fg_restore(itemlist);
          }else{
                layer.msg('请至少选择一项！');
          }
      }
    }
    //彻底删除
    function fg_completely_delete(id){
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + ' 项从回收站彻底删除吗？', {
            btn: ['确认','取消'] //按钮
          }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_completely_delete",
                data: "id="+id,
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shop',data);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $("#flexigrid").flexOptions({url: 'get_trash_list? ', method: 'post', qtype: '', query: '', }).flexReload();
                }
            });
        });	    
    }
    //还原
    function fg_restore(id){
        console.log(id);
        console.log(typeof id);
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + ' 项还原吗？', {
            btn: ['确认','取消'] //按钮
          }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_restore",
                data: "id="+id,
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shop',data);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $("#flexigrid").flexOptions({url: 'get_trash_list? ', method: 'post', qtype: '', query: '', }).flexReload();
                }
            });
        });	    
    }


</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
