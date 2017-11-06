<?php
/* Smarty version 3.1.29, created on 2017-09-09 15:14:31
  from "D:\www\yunjuke\application\pay\views\goods_management_shop_goods.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b394d70617b3_58099472',
  'file_dependency' => 
  array (
    '55809c0a1a4fb15aa7064a2540fd06ac615b9b70' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_management_shop_goods.html',
      1 => 1504834806,
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
function content_59b394d70617b3_58099472 ($_smarty_tpl) {
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
        .goodtitlename span{
            line-height: 12px !important;
        }
	</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>商品管理<span class="c-gray en">&gt;</span>自建商品
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="goods_management"><span>总库商品</span></a>
			<a href="javascript:;"><span>自建商品</span></a>
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
            <select name="sex" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
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
                                                <option value="378">ABC KIDS</option>
                                <option value="389">艾勒蓓力</option>
                                <option value="377">公主安娜</option>
                                <option value="380">妮可贝贝</option>
                                <option value="376">植木西</option>
                                            </select>
            <select name="gc_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10 select2" onchange="get_brands_list(this)" style="min-width: 160px">
                <option value="">-全部分类-</option>
                <!--
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: cate_option</p>
<p>Filename: templates_c/55809c0a1a4fb15aa7064a2540fd06ac615b9b70_0.file.goods_management_shop_goods.html.cache.php</p>
<p>Line Number: 122</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\55809c0a1a4fb15aa7064a2540fd06ac615b9b70_0.file.goods_management_shop_goods.html.cache.php<br />
			Line: 122<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 1741<br />
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
<p>Filename: templates_c/55809c0a1a4fb15aa7064a2540fd06ac615b9b70_0.file.goods_management_shop_goods.html.cache.php</p>
<p>Line Number: 122</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\55809c0a1a4fb15aa7064a2540fd06ac615b9b70_0.file.goods_management_shop_goods.html.cache.php<br />
			Line: 122<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 1741<br />
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
            <select name="goods_image" class="selecte  pd-5 mb-10 "  style="min-width: 80px">
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
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">商品信息</th>
            <th width="">销售价</th>
            <th width="">市场价</th>
            <th width="">总销量</th>
            <th width="">品牌</th>
            <th width="">库存</th>
            <th width="">添加时间</th>
            <th width="">操作</th>
        </tr>
        <tr><th  colspan="11" style="padding: 0 8px 8px 8px;">
            <span class="btn btn-primary radius mt-10 ml-5" onclick="fg_operate('add')"><i class="fa fa-plus"></i> 添加商品</span>
            <span class="btn btn-success radius mt-10 ml-5" id="import"><i class="fa fa-cloud-upload"></i> 导入商品</span>
            <span class="btn btn-danger radius mt-10 ml-5" onclick="fg_operate('del')"><i class="fa fa-trash"></i> 批量删除</span>
            <span class="btn btn-warning radius mt-10 ml-5" onclick="fg_operate('ban_coupons')"><i class="fa fa-ban"> 禁止使用优惠券</i></span>
            <span class="btn btn-primary radius mt-10 ml-5" onclick="fg_operate('set_new')"><i class="fa fa-cog"> 设为新品</i></span>
            <span class="btn btn-primary radius mt-10 ml-5" onclick="fg_operate('set_recommend')"><i class="fa fa-cog"> 设为推荐</i></span>
            <span class="btn btn-primary radius mt-10 ml-5" onclick="fg_operate('set_sale')"><i class="fa fa-cog"> 设为特价</i></span>
            <span class="btn btn-warning radius mt-10 ml-5" onclick="fg_operate('cancel_tags')"><i class="fa fa-ban"> 取消标签</i></span>
            <!-- <span class="btn btn-secondary radius mt-10 ml-5" onclick="fg_operate('set_sex')"><i class="fa fa-pencil-square-o"> 修改性别</i></span>
            <span class="btn btn-secondary radius mt-10 ml-5" onclick="fg_operate('set_season')"><i class="fa fa-pencil-square-o"> 修改季节</i></span>
            <span class="btn btn-secondary radius mt-10 ml-5" onclick="fg_operate('set_year')"><i class="fa fa-pencil-square-o"> 修改年份</i></span>
            <span class="btn btn-secondary radius mt-10 ml-5" onclick="fg_operate('set_brand')"><i class="fa fa-pencil-square-o"> 修改品牌</i></span> -->
            <span class="btn btn-success radius mt-10 ml-5"  id="styc"><i class="fa fa-refresh"> 同步商品</i></span>
            <span class="btn btn-success radius mt-10 ml-5"  onclick="fg_operate('brand')"><i class="fa fa-refresh"> 同步品牌</i></span>
            <!--sync_goods()-->
            <span class="btn btn-success radius mt-10 ml-5" onclick="goods_download()"><i class="fa fa-cloud-download">下载商品</i></span>
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
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')">
                  <option value="1"  >1&nbsp;&nbsp;</option>
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list')"><i class="fa fa-fast-forward"></i></div>
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
	
    //排队方法,点击同步商品弹出排队弹窗
    //若排队到你,请执行sync_goods()方法，进行同步商品

    //排队
    var int ='';
    $("#styc").click(function(){
        in_queue(1);
    });
    $("#import").click(function(){
        in_queue(2);
    });

    //入队
    function in_queue(j)
    {
        $.ajax({
            type:'get',
            dataType:'json',
            url: 'http://[::1]/yunjuke/pay.php/store/queue?task_type=2',
            success:function(data){     //成功进入排队队列
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state) {
                    if(data.queue){     //操作队列有空闲，直接执行任务
                        if(j==1)sync_goods(false);
                        if(j==2)fg_operate('import');
                        return false;
                    }
                    var place = get_queue_place(data.task);
                    if (place>0){
                        layer.confirm('当前正在排队人数：<span id="place">'+place+'</span>', {
                            title:'当前操作人数较多，需要排队：',
                            btn: ['取消排队'], //按钮
                            cancel: function(index){      //关闭询问框
                                quite_queue(data.task);
                                layer.msg('取消排队');
                            }
                        }, function(){      //取消排队
                            quite_queue(data.task);
                            layer.msg('取消排队');

                        });
                        int = setInterval(function () {    //轮询
                            place = get_queue_place(data.task);
                            if(place==0){
                                queue_action(data.task,j);
                            }
                            $('#place').html(place);
                        },1000);
                    } else {
                        queue_action(data.task);
                    }
                    window.onbeforeunload=function() {  //关闭，刷新浏览器事件，删除排队
                        quite_queue(data.task);
                    };
                } else {
                    layer.msg(data.msg);
                }
            }
        });
    }
    //成功进入操作队列
    function queue_action(id,j)
    {
        int = clearInterval(int);
        var i = 10;
        layer.confirm('是否开始操作？取消倒计时:<span id="time">10</span>', {
            title:'请确认：',
            btn: ['开始执行'], //按钮
            cancel: function(index){      //关闭询问框
                layer.msg('取消操作');
                return false;
            }
        },function(){       //确定操作
            int = clearInterval(int);   //结束轮询
            layer.closeAll();
            //把排队状态设为工作中
            $.ajax({
                type:'get',
                dataType:'json',
                url:'http://[::1]/yunjuke/pay.php/store/set_queue_state?task_id='+id,
                success:function(data){
                    if(!data.state){
                        layer.msg(data.msg);
                        return false;
                    }
                }
            })
            if(j==1)sync_goods(id);
            if(j==2)fg_operate('import',id);
        });
        int = setInterval(function (){    //轮询，倒计时
            i--;
            if(i==0){
                quite_queue(id);
                layer.msg('取消操作');
                return false;
            }
            $('#time').html(i);
        },1000);
    }
    //得到位置
    function get_queue_place(id)
    {
        var place = 1;
        $.ajax({
            async: false,
            type:'get',
            dataType:'json',
            url: 'http://[::1]/yunjuke/pay.php/store/get_queue_place?task_id='+id,
            success:function(data) {      //得到队列中的排队人数place
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    place = data.place;
                }
            }
        })
        return place;
    }
    //当用户退出排队队列或者关闭浏览器时的操作
    function quite_queue(id)
    {
        layer.closeAll();
        $.ajax({
            type:'get',
            dataType:'json',
            url: 'http://[::1]/yunjuke/pay.php/store/quit_queue?task_id='+id,
            success:function(data){
                int = clearInterval(int);   //结束轮询
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }
                return false;
            }
        })
    }
    
	
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
        var url = 'http://[::1]/yunjuke/pay.php/store/get_shop_goods_list';
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
                    }else if(data.state){
                        $(obj).append(data.info);
                    }
                }
            })
        }

    });

    function fg_operate(name,qid) {
        get_check();
        if (name == 'add') {
            window.location.href = 'goods_add_goods_second';
        }else if (name == 'del') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_delete(itemlist);
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if(name == 'brand'){
        	if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
            }else{
            	itemlist = '';
            }
        	fg_brand(itemlist);
        }else if (name == 'ban_coupons') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_ban_coupons(itemlist);
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if (name == 'set_new') {
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
        }else if (name == 'cancel_tags') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_cancel_tags(itemlist);
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if(name=="import"){
            if (!qid) qid=0;
            data_import('商品',"http://[::1]/yunjuke/pay.php/write_import/excel_upload?id="+qid,'goods_import?id='+qid+'name=',qid);
        }else if (name == 'set_sex') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
                    '<b class="pl-30 pr-20">商品性别：</b>' +
                    '<select name="base_info[sex]" class="selecte " id="change_sex" style="width: 120px;">' +
                    '<option value="" selected>-商品性别-</option>' +
                    '<option value="2">男</option>' +
                    '<option value="1">女</option>' +
                    '<option value="0">通用</option>' +
                    '</select>' +
                    '</div>';
                layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '<b>修改'+itemlist.length+'项商品的性别</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['330px', '160px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        //$('#change_xxx').val()    为要修改为的value
                        fg_set_attribute('sex', $('#change_sex').val(), itemlist);
                    }
                });
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if (name == 'set_season') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });

                var str_div =   '<div class="pt-20 pl-30 pr-20 ">' +
                    '<b class="pl-30 pr-20">上市季节：</b>' +
                    '<select name="base_info[sex]" class="selecte " id="change_season" style="width: 120px;">' +
                    '<option value="" selected>-上市季节-</option>' +
                    '<option value="1">春季</option>' +
                    '<option value="2">夏季</option>' +
                    '<option value="3">秋季</option>' +
                    '<option value="4">冬季</option>' +
                    '</select>' +
                    '</div>';
                layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '<b>修改'+itemlist.length+'项商品的季节</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['330px', '160px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        //$('#change_xxx').val()    为要修改为的value
                        fg_set_attribute('season', $('#change_season').val(), itemlist);
                    }
                });
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if (name == 'set_brand') {
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                var str_div =   '<div class="pt-20 pl-30 pr-20 ">' +
                    '<b class="pl-30 pr-20">商品品牌：</b>' +
                    '<select name="base_info[sex]" class="selecte " id="change_brand" style="width: 175px;">' +
                    '<option value="">-全部品牌-</option>' +
                    '' +
                    '' +
                    '<option value="378-ABC KIDS">ABC KIDS</option>' +
                    '' +
                    '<option value="389-艾勒蓓力">艾勒蓓力</option>' +
                    '' +
                    '<option value="377-公主安娜">公主安娜</option>' +
                    '' +
                    '<option value="380-妮可贝贝">妮可贝贝</option>' +
                    '' +
                    '<option value="376-植木西">植木西</option>' +
                    '' +
                    '' +
                    '</select>' +
                    '</div>';
                layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '<b>修改'+itemlist.length+'项商品的品牌</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['380px', '160px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        //$('#change_xxx').val()    为要修改为的value
                        //alert($('#change_brand').val());
                        fg_set_attribute('brand', $('#change_brand').val(), itemlist);
                        layer_close();
                    }
                });
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if (name == 'set_year') {
            if ($('.trSelected').length > 0) {
                var itemlist = new Array();
                $('.trSelected').each(function () {
                    itemlist.push($(this).attr('data-id'));
                });
                var str_div =  '<div class="pt-20 pl-30 pr-20 ">' +
                    '<b class="pl-30 pr-20">上市年份：</b>' +
                    '<select name="base_info[sex]" class="selecte " id="change_year" style="width: 120px;">' +
                    '<option value="" selected>-上市年份-</option>' +
                    '' +
                    '' +
                    '<option value=\'2021\'>' +
                    '2021' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2020\'>' +
                    '2020' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2019\'>' +
                    '2019' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2018\'>' +
                    '2018' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2017\' selected >' +
                    '2017' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2016\'>' +
                    '2016' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2015\'>' +
                    '2015' +
                    '</option>' +
                    '' +
                    '' +
                    '' +
                    '<option value=\'2014\'>' +
                    '2014' +
                    '</option>' +
                    '' +
                    '' +
                    '</select>' +
                    '</div>';
                layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '<b>修改'+itemlist.length+'项商品的上市年份</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['330px', '160px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        //$('#change_xxx').val()    为要修改为的value
                        fg_set_attribute('year', $('#change_year').val(), itemlist);
                    }
                });

            } else {
                layer.msg('请至少选择一项！');
            }
        }
    }
    
    function fg_brand(id) {
    	 var msg='';
    	 if(id==''){
    		 msg = '确认要同步所有商品的品牌吗？';
    	 }else{
    		 msg = '确认要同步这 '+id.length+'款商品的品牌吗？';
    	 }
        layer.confirm(msg,{
            btn: ['确认','取消'], //按钮
        }, function(){
        	if(id!=''){
        		id = id.join(',');
        	}
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_brand_tongbu",
                data: "id="+id,
                beforeSend:function(){
                    layer.closeAll();
                    layer.msg('商品品牌同步中，这可能需要几分钟，请耐心等候，不要关闭此页面！！');
                },
                success: function(data){
                	layer.closeAll();
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else{
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                }
            });
        });
    }
    
    
    function fg_delete(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        }
        layer.confirm('确认要将这 '+id.length+'项加入回收站吗？',{
            btn: ['确认','取消'], //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_delete",
                data: "del_id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state == false){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state == true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                }
            });
        });
    }
    function fg_edit_attr(goods_id){
        window.location.href = "goods_edit_goods_second?op=edit&goods_id="+goods_id;
    }
    function get_brands_list(obj){
        var class_id = $(obj).val();
        $("select[name='brand_id']").html("<option>-全部品牌-</option>");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "ajax_get_brands_by_class?class_id=" + class_id,
            data: "",
            success: function (data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    if(data.info){
                        var content =  "<option>-全部品牌-</option>";
                        $.each(data.info,function(k,v){
                            content += '<option value="'+v.brand_id+'">'+v.brand_name+'</option>';
                        })
                    }
                }
                $("select[name='brand_id']").html(content);
            }
        })
    }

    function fg_ban_coupons(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要禁用这 ' + id.length + ' 项的优惠券吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_ban_coupons",
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
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                }
            });
        });
    }
    function fg_set_tag(id,value) {
        var value_string = value == '1' ? '新品' : (value == '2' ? '推荐' : '特价');
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
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
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
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                }
            });
        });
    }
    function fg_set_attribute(attr, change_id, id) {  //attr为要修改的属性  change_id为修改后的id属性  id为商品id
        if (change_id != ""){
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            };
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_set_attribute",
                data: {"attr" : attr, "change_id" : change_id, "id" : id},
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state == false){
                        layer.msg(data.msg);
                    }else if(data.state == true){
                        layer.msg(data.msg);
                    }
                    layer.closeAll();
                    layer.msg(data.msg);
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                }
            });
        } else {
            layer.msg('请至少选择一项！');
        }
    }


    //修改库存

    function fg_edit(data){
        //console.log(typeof(data));
        var stname = '';
        if(typeof(data)=='number'){
            $.ajax({
                type: "post",
                dataType: "json",
                url: "updateAmount?store_id=61",
                data: 'id='+data,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state){
                        content = '<h5 style="padding: 5px;border-bottom:1px solid #E0E0E0;">(<span class="red">'+data.row.goods_name+'</span>)调整库存、价格</h5>'+
                            '<div style="margin-top: 20px;"></div>'+
                            '<table class="table table-border" style="border-top: 0px;">'+
                                /* '<thead>'+
                                 '<tr>'+
                                 '<th></th>'+
                                 '<th>当前门店价格</th>'+
                                 '<th>设定门店价格</th>'+
                                 '</tr>'+
                                 '</thead>'+ */
                            '<tbody>'+
                            '<tr>'+
                            '<td style="width: 33.3%;">吊牌价</td>'+
                            '<td style="width: 33.3%;">'+data.row.goods_marketprice+'</td>'+
                                /* '<td style="width: 33.3%;"><input type="text" class="input-text size-M"/></td>'+ */
                            '</tr>'+
                            '</tbody>'+
                            '</table>'+
                            '<div style="margin-top: 20px;"></div>'+
                            '<form id="goodsStocks"><div style="max-height:400px;overflow:auto"><table class="table table-border" style="border-top: 0px;">'+
                            '<thead>'+
                            '<tr>'+
                            '<th>货号</th>'+
                            '<th>颜色</th>'+
                            '<th>尺码</th>'+
                            '<th>条码</th>'+
                            '<th>销售价</th>'+
                            '<th>设定价格</th>'+
                            '<th>库存</th>'+
                            '</tr>'+
                            '</thead>'+'<tbody>';
                        $.each(data.data,function(k,v){
                            content+='<tr>'+
                                '<td style="width: 20%;">'+data_null(v.stocks_sn)+'<input type="hidden" value="'+data_null(v.stocks_sn)+'" name="stocks_sn[]"/><input type="hidden" value="'+v.goods_ea_id+'" name="goods_ea_id[]"/></td>'+
                                '<td style="width: 15%;">'+data_null(v.color_remark,v.color)+'</td>'+
                                '<td style="width: 15%;">'+data_null(v.size_note,v.size)+'<input type="hidden" value="'+v.size+'" name="size[]"/></td>'+
                                '<td style="width: 20%;">'+data_null(v.stocks_bar_code)+'</td>'+
                                '<td style="width: 10%;">￥'+v.price+'</td>'+
                                '<td style="width: 10%;"><input type="text" value="'+v.price+'" name="stocks_price[]" class="input-text size-M price"/></td>'+
                                '<td style="width: 10%;"><input type="text" value="'+v.amount+'" name="amount[]" class="input-text size-M amount"/></td>'+
                                '</tr>';
                        })
                        content+='</tbody>'+
                            '</table></div></form>'+
                            '<div style="height:50px"><div class="changeprice">'+
                            '<button class="btn pull-right mar-lef btn-warning radius" onclick="changeAmount()">调库存</button>'+
                            '<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changeAmount" /></div>'+
                            '<span class="pull-right mar-lef" style="line-height: 30px;">批量调库存</span>'+
                            '</div>'+
                            '<div class="changeamount">'+
                            '<button class="btn pull-right mar-lef btn-warning radius" onclick="changePrice()">调价</button>'+
                            '<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changePrice" /></div>'+
                            '<span class="pull-right mar-lef" style="line-height: 30px;">批量调价</span><div style="clear: both;"></div>'+
                            '</div>'+
                            '<div style="clear: both;"></div>'+
                            '<div style="margin: 10px;">'+
                            '<button class="btn pull-right mar-lef btn-warning radius" onclick="updateStocks('+data.row.goods_id+')">提交</button>'+
                            '<button class="btn pull-right mar-lef btn-default" onclick="cancel()">取消</button><div style="clear: both;"></div>'+
                            '</div></div>'+
                            '<div style="clear: both;"></div>';
                        $('.amengstock-content').html(content);
                        $('.amendstock-background').show();
                        $('.amengstock-content').show();
                    }else{
                        layer.msg(data.msg);
                    }

                }
            })
        }else{
            if(data.length==0){
                stname = '当前条件下的商品的库存';
            }else{
                stname = '这'+data.length+'个商品的库存';
            }
            layer.open({
                type: 1,
                btn: ['确认', '取消'],
                title: '<b>修改库存</b>',
                skin: 'layui-layer-rim', //加上边框n
                area: ['420px', '180px'], //宽高
                content: '<div class="pt-20 pb-20 pl-30 pr-30 "><form  id="form_edit" method="POST" enctype=>' +
                '<div class="">修改'+stname+'为：<input type="number" name="stock" style="width:50px;" id="edit_amount" class=""><span value="" class="err"></span></div>' +
                '</form></div>',
                yes: function(index){
                    /*添加代理商表单验证*/
                    $('#form_edit').validate({
                        errorPlacement: function(error, element){
                            var error_td = element.nextAll('span.err');
                            error_td.append(error);
                        },
                        rules : {
                            stock:{required : true}
                        },
                        messages : {
                            stock : {required : '<i class="fa fa-exclamation-circle"></i>请填写库存量'}
                        }
                    });
                    if($("#form_edit").valid()){

                        search = $("#formSearch").serialize();
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: "update_goodsAmount?store_id=",
                            data: search+"&id="+data+'&amount='+$('#edit_amount').val(),
                            success: function(data){
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                }else {
                                    layer.msg(data.msg);
                                    layer.close(index);
                                    $("#flexigrid").flexReload();
                                }
                            }
                        })


                    }
                }, no: function(){
                }
            })
            //console.log(data)
            //data = data.join(',');
        }
    }
    $("div.amengstock-content").delegate("input.price","blur",function(){
        if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
            $(this).removeClass('isnum');
        }else{
            $(this).addClass('isnum');
            layer.msg('请输入正确的数字');
        }
    });
    $("div.amengstock-content").delegate("input.amount","blur",function(){
        if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
            $(this).removeClass('isnum');
        }else{
            $(this).addClass('isnum');
            layer.msg('请输入正确的数字');
        }
    });
    function isNumber(){
        var isNum = true;
        $('div.amengstock-content').find('table').find("input.input-text").each(function(){
            if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
                $(this).removeClass('isnum');
            }else{
                $(this).addClass('isnum');
                isNum = false;
            }
        })
        if(!isNum){
            layer.alert('请输入正确的数字');
            return false;
        }
    }
    //同步商品
  function sync_goods(id){
        $.ajax({
            url: "get_store_goods_all",
            data:'',
            type:'POST',
            dataType:'json',
            beforeSend:function(){
                layer.closeAll();
                layer.msg('商品数据同步中，这可能需要几分钟，请耐心等候，不要关闭此页面！！');
            },
            success:function(res){
                layer.closeAll();
                layer.msg(res.msg);
                if(res.state){
                    if(id) quite_queue(id);    //操作完成后删除任务
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('http://[::1]/yunjuke/pay.php/store/get_shop_goods_list');});
                } else {
                    if(id) quite_queue(id);    //操作完成后删除任务
                }
            }
        });
    }
    //下载单个商品
 function goods_download(){
	content = '<form name="goods_form" id="goods_form"><div class="pd-10"><table class="table table-border table-bordered">' +
	  '<tr class="text-c"><td>商品链接id</td>'+
	  '<td><input type="text" name="uec_goods_iiud" class="input-text input_text ml-10" value="" ><span class="err"></span></td></tr>';
	content += '</table></div></form>';
	layer.open({
	    type: 1,
	    title: '<b>下载商品</b>',
	    skin: 'layui-layer-rim', //加上边框
	    area: ['400px', '180px'], //宽高
	    btn: ['确定','取消'],
	    content: content,
	    yes: function () {
	    	$('#goods_form').validate({
	                    errorPlacement: function (error, element) {
	                        var error_td = element.next('span.err');
	                        error_td.append(error);
	                    },
	                    rules: {
	                        
	                        "uec_goods_iiud": {required: true},
	                    },
	                    messages: {
	                        
	                        "uec_goods_iiud": {required: ''},
	                    }
	                });
	            if($('#goods_form').valid()){
	                    var data = $("#goods_form").serialize();
	                    $.ajax({
	                        type: "post",
	                        dataType: "json",
	                        url: "goods_download?op=submit",
	                        data: data,
	                        success: function (data) {
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                }else if (data.state == false) {
	                                layer.msg(data.msg);
	                            } else if (data.state == true) {
	                                layer.closeAll();
	                                layer.msg(data.msg);
	                                $("#flexigrid").flexReload();
	                                 
	                            }
	                        }
	                    });
	    	}
	    }, no: function () {}
	})
		
   
  }

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
