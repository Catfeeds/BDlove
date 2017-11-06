<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:31:58
  from "D:\www\yunjuke\application\pay\views\goods_management_all.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cde585a26_08748148',
  'file_dependency' => 
  array (
    '99a3ca809339339473af877df96cdd6c583efc55' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_management_all.html',
      1 => 1505803588,
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
      1 => 1505438698,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59c35cde585a26_08748148 ($_smarty_tpl) {
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
<style type="text/css">
	a:hover{
		color: #333;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>商品管理 <span class="c-gray en">&gt;</span>总库商品
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="javascript:;"><span>总库商品</span></a>
			<a href="goods_management?op=shop_goods"><span>自建商品</span></a>
			<a href="goods_management?op=trash"><span>回收站</span></a>
		</div>
	</div>
    <form method="post" name="formSearch" id="formSearch">
        <div class="search mt-20 mb-10">
            <select name="year_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-上市年份-</option>
                                    <option value="2021">
                        2021
                    </option>
                                    <option value="2020">
                        2020
                    </option>
                                    <option value="2019">
                        2019
                    </option>
                                    <option value="2018">
                        2018
                    </option>
                                    <option value="2017">
                        2017
                    </option>
                                    <option value="2016">
                        2016
                    </option>
                                    <option value="2015">
                        2015
                    </option>
                                    <option value="2014">
                        2014
                    </option>
                                    <option value="2013">
                        2013
                    </option>
                                    <option value="2012">
                        2012
                    </option>
                            </select>
            <select name="season_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-上市季节-</option>
                <option value="1">春季</option>
                <option value="2">夏季</option>
                <option value="3">秋季</option>
                <option value="4">冬季</option>
            </select>
            <select name="sex" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 100px">
                <option value="" selected>-商品性别-</option>
                <option value="2">男</option>
                <option value="1">女</option>
                <option value="3">通用</option>
            </select>
            <select name="available_coupons" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-优惠券-</option>
                <option value="1">支持</option>
                <option value="0">不支持</option>
            </select>

            <select name="brand_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                <option value="">-全部品牌-</option>
                                                <option value="379">大头儿子</option>
                                <option value="384">Discovery</option>
                                <option value="377">公主安娜</option>
                                <option value="373">耐克</option>
                                <option value="380">妮可贝贝</option>
                                            </select>
            <select name="gc_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10 select2" onchange="get_brands_list(this)" style="min-width: 160px">
                <option value="">-全部分类-</option>
                <!--
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: cate_option</p>
<p>Filename: templates_c/99a3ca809339339473af877df96cdd6c583efc55_0.file.goods_management_all.html.cache.php</p>
<p>Line Number: 119</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\99a3ca809339339473af877df96cdd6c583efc55_0.file.goods_management_all.html.cache.php<br />
			Line: 119<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 1750<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/99a3ca809339339473af877df96cdd6c583efc55_0.file.goods_management_all.html.cache.php</p>
<p>Line Number: 119</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\99a3ca809339339473af877df96cdd6c583efc55_0.file.goods_management_all.html.cache.php<br />
			Line: 119<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 1750<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>-->
            </select>
            <select name="goods_tag" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 60px">
                <option value="" selected>-标签-</option>
                <option value="1">新品</option>
                <option value="2">推荐</option>
                <option value="3">特价</option>
            </select>
            <select name="goods_image" class="selecte  pd-5 mb-10 " style="min-width: 80px">
                <option value="" selected>-是否有图-</option>
                <option value="1">有图</option>
                <option value="2">无图</option>
            </select>

            <input type="text" name="goods_name" placeholder="名称" class="input-text input_text mb-10">

            <input type="text" name="goods_spu" placeholder="款号" class="input-text input_text mb-10">

            <input name="stocks_sku" type="text" placeholder="货号"  class="input-text input_text mb-10">

            <input name="stocks_bar_code" type="text" placeholder="条码"  class="input-text input_text mb-10">

            <input type="submit" onclick="return false;" class="btn btn-warning radius ml-10 mb-10" id="searchBtn" name="searchBtn" value="搜索">

        </div>
    </form>
    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">商品列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox"  value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">商品信息</th>
            <th width="">销售价</th>
            <th width="">市场价</th>
            <th width="">总销量</th>
            <th width="">总库存</th>
            <th width="">上市年份</th>
            <th width="">上市季节</th>
            <th width="">商品性别</th>
            <th width="">添加时间</th>
            <th width="">操作</th>
        </tr>
        <tr><th  colspan="11">
            <span class="btn btn-danger radius" onclick="del_goods()"><i class="fa fa-trash"> 批量删除</i></span>
            <span class="btn btn-success radius" id="set_price" name="set_price" ><i class="fa fa-trash"> 批量设置价格</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_new')"><i class="fa fa-cog"> 设为拼团</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_recommend')"><i class="fa fa-cog"> 设为秒杀</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_sale')"><i class="fa fa-cog"> 设为特卖</i></span>
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
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/store/get_all_goods_list')">
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
                  <option value="100">100&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/store/get_all_goods_list')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/store/get_all_goods_list')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/store/get_all_goods_list')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/store/get_all_goods_list')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/store/get_all_goods_list')"><i class="fa fa-fast-forward"></i></div>
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
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","0");
	
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
        var url = 'http://[::1]/yunjuke/pay.php/store/get_all_goods_list';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
        get_class_option("select[name='gc_id']");

        function get_class_option(obj,class_id){
            if($(obj).length==0){
                return false;
            }
            $.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_cate_option?class_id='+class_id,
                success:function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
                        $(obj).append(data.info);
                    }
                }
            })
        }
    });
    
    function fg_operate(name,qid) {
    	 if (name == 'set_new') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,1);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }else if (name == 'set_recommend') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,2);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }else if (name == 'set_sale') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,3);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }
    }
    
    
    function fg_set_tag(id,value) {
        var value_string = value == '1' ? '拼团' : (value == '2' ? '推荐' : '特卖');
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项的设为'+value_string+'吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_set_tag?value="+value,
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_all_goods_list');});
                }
            });
        });
    }
    
    function fg_cancel_tags(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项的标签取消掉吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_cancel_tags",
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_all_goods_list');});
                }
            });
        });
    }
    
    
    
    
    
    
    
    
    
    
    
    
    function del_goods() {
        get_check();
        if($('.trSelected').length>0){
            var itemlist = new Array();
            $('.trSelected').each(function(){
                itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
            layer.msg('请至少选择一项！');
        }
    }
    function fg_delete(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "delete_store_goods?goods_id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else{
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_all_goods_list');});
                }
            });
        });
    }
    function get_brands_list(obj){
        var class_id = $(obj).val();
        $("select[name='brand_id']").html("<option value=''>-全部品牌-</option>");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "ajax_get_brands_by_class",
            data: "",
            success: function (data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    if(data.info){
                        var content =  "<option value=''>-全部品牌-</option>";
                        $.each(data.info,function(k,v){
                            content += '<option value="'+v.brand_id+'">'+v.brand_name+'</option>';
                        })
                    }
                }
                $("select[name='brand_id']").html(content);
            }
        })
    }
    $('#set_price').click(function(){
        get_check();
        var p = '';
        if($('.trSelected').length>0){
            var itemlist = new Array();
            $('.trSelected').each(function(){
                itemlist.push($(this).attr('data-id'));
            });
            var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
                '<p><b class="pl-30">设置类型：</b>' +
                '<select class="valid" name="p" id="p">' +
                    '<option value="1" >-设置折扣-</option>' +
                    '<option value="2" >-修改价格-</option>' +
                '</select></p>'+
                '<b class="pl-30 pt-20">设置数值：</b>' +
                '<input class="pt-20" type="number" name="num" id="price">'+
                '<p class="pl-30"><small>折扣直接输入数值,如95折,输入0.95即可</small></p>'+
                '</div>';
            layer.open({
                type: 1,
                btn: ['确认', '取消'],
                title: '<b>修改'+itemlist.length+'项商品的价格</b>',
                skin: 'layui-layer-rim', //加上边框n
                area: ['420px', '220px'], //宽高
                content: str_div,
                yes: function (index) {
                    set_goods_price(itemlist, $('#p').val(), $('#price').val());
                }
            });
        }else{
            layer.msg('请至少选择一项！');
        }
    });

    function set_goods_price(id, p, num) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "set_goods_price?id="+id+'&p='+p+'&num='+num,
            success: function(data) {
                layer.closeAll();
                layer.msg(data.msg);
                $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_all_goods_list');});
            }
        });
    }

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
