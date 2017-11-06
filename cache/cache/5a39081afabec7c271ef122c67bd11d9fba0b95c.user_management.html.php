<?php
/* Smarty version 3.1.29, created on 2017-08-07 11:42:55
  from "D:\www\yunjuke\application\pay\views\user_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5987e1bf1d3883_19855029',
  'file_dependency' => 
  array (
    '5a39081afabec7c271ef122c67bd11d9fba0b95c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\user_management.html',
      1 => 1501813462,
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
function content_5987e1bf1d3883_19855029 ($_smarty_tpl) {
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
<style>
 dt.tit {
    width: 100px !important;
    padding-right: 2px !important;
 	font-size:14px !important;
}
.ncap-form-default dl.row{
	padding:4px 0 !important;
}
.input-text{
	width:150px ;
	height:30px !important;
}
.mDiv h5{
	display: inline !important;
}
.ncap-form-default dd.opt {
    text-align: left;
    width: 20%;
}
.ncap-form-default dd.opt1 {
    text-align: left;
    width: 80%;
}
.ncap-form-default dd.opt2 {
    text-align: left;
    min-width: 155px !important;
}
dl.row1{
	float:left;
	width:30%;
}
dl.row2{
	float:left;
	width:40% !important;
}
span.check{
	padding:0 4px;
	border-left:1px solid #ccc;
	border-bottom:1px solid #ccc;
	border-top:1px solid #ccc;
	display:inline-block;
	height:28px;
	line-height:28px;
}
span.check_box{
	display:inline-block;
	height:30px;
    cursor:pointer;
	border-right:1px solid #ccc;
}
span.current{
	background-color:#ccc;
}

</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
	  <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 会员管理 <span class="c-gray en">&gt;</span> 会员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
  </div>

	<!-- 操作说明 -->
	<!--  <div class="explanation" id="explanation">
    <!--<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
          <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
          <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
          <li>通过会员管理，你可以进行查看、编辑会员资料等操作</li>
          <li>你可以根据条件搜索会员，然后选择相应的操作</li>
        </ul>
      </div>-->
	<form id="formSearch" method="post" action="user_list" enctype="multipart/form-data">
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label for="class_sort">加入时间：</label>
				</dt>
				<dd class="opt opt1">
					<div class="area-region-select">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time"
							   style="background-color: #fff" class="input-text  data-start">
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time"
									  style="background-color: #fff" class="input-text  data-end">
						<input name="time" class="check_i" type="hidden" value=""/>
						<span class="check_box  check_boxtime">
								 <span class="check  all current" data-para="all">全部</span>
								 <span class="check time" data-start="2017-08-07 00:00:00" data-end="2017-08-07 23:59:59">今日</span>
								 <span class="check time" data-start="2017-08-06 00:00:00" data-end="2017-08-06 23:59:59">昨日</span>
								 <span class="check time" data-start="2017-07-31 00:00:00"
									   data-end="2017-08-07 23:59:59">最近7天</span>
								 <span class="check time" data-start="2017-07-07 00:00:00"
									   data-end="2017-08-07 23:59:59">最近30天</span>
						        </span>
					</div>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name">消费金额：</label>
				</dt>
				<dd class="opt opt1">
					<input type="number" id="start_monney" value="" name="start_monney" style="background-color: #fff"
						   class="input-text  data-start">
					至&nbsp;<input type="number" id="end_monney" value="" name="end_monney"
								  style="background-color: #fff" class="input-text  data-end">
					<input name="monney" class="check_i" type="hidden" value=""/>
					<span class="check_box check_boxmoney">
							 <span class="check all current" data-para="all">全部</span>
							 <span class="check money" data-start="100" data-end="500">100~500元</span>
							 <span class="check money" data-start="500" data-end="2000">500~2000元</span>
							 <span class="check money" data-start="2000" data-end="">2000元以上</span>
						    </span>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name">消费单数：</label>
				</dt>
				<dd class="opt opt1">
					<input type="number" id="start_num" value="" name="start_num" style="background-color: #fff"
						   class="input-text  data-start">
					至&nbsp;<input type="number" id="end_num" value="" name="end_num" style="background-color: #fff"
								  class="input-text  data-end">
					<input name="num" class="check_i" type="hidden" value=""/>
					<span class="check_box check_boxnumber">
							 <span class="check all current" data-para="all">全部</span>
							 <span class="check number" data-start="0" data-end="10">0~10单</span>
							 <span class="check number" data-start="10" data-end="50">10~50单</span>
							 <span class="check number" data-start="50" data-end="">50单以上</span>
						    </span>
				</dd>
			</dl>
						<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">姓名：</label>
				</dt>
				<dd class="opt">
					<input type="text" id="true_name" value="" name="true_name" style="background-color: #fff"
						   class="input-text">
				</dd>
			</dl>
						<dl class="row row1 row2">
				<dt class="tit">
					<label for="class_sort">手机号：</label>
				</dt>
				<dd class="opt opt2">
					<input type="text" id="mobile" value="" name="mobile" style="background-color: #fff"
						   class="input-text">
				</dd>
				<a id="submit" href="javascript:void(0)" class="btn btn-warning radius">搜索</a>
			</dl>
		</div>
	</form>
  <div class="">
	  <table class="table table-border table-bordered table-hover table-bg table-content mt-20">
		  <thead>
		  <tr>
			  <th scope="col" colspan="13">会员列表</th>
		  </tr>
		  <tr class="text-c">
			  <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
			  			  <th width="">会员昵称</th>
			  <th width="10%">手机号</th>
			  <th width="">性别</th>
			  			  <th width="10%">付款订单数</th>
			  <th width="10%">付款订单额</th>
			  			  <th width="">加入时间</th>
		  </tr>

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
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/User/user_list')">
                  <option value="1"  >1&nbsp;&nbsp;</option>
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/User/user_list')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/User/user_list')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/User/user_list')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/User/user_list')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/User/user_list')"><i class="fa fa-fast-forward"></i></div>
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
</div>
<script type="text/javascript">

  $(function(){
	  var url = 'http://[::1]/yunjuke/pay.php/User/user_list';
	  $(".select2").select2();
	  $('#submit').click(function(){
		  load_page_to(url);
	  });
	  load_page(url);
	$('span.check').click(function(){
		$(this).parents('dd').find('.check_i').val("");
		$(this).parents('dd').find('.data-start').val("");
		$(this).parents('dd').find('.data-end').val("");
		$(this).siblings('span').removeClass('current');
		if($(this).hasClass("all")){
			var time = $(this).attr('data-para');
			$(this).parents('dd').find('.check_i').val(time);
		}else{
			var datastart =$(this).attr('data-start');
			var dataend =$(this).attr('data-end');
			$(this).parents('dd').find('.data-start').val(datastart);
			$(this).parents('dd').find('.data-end').val(dataend);
		}
		$(this).addClass('current');
	});

      $("body").on('click',"#submit",function () {
        var stime=$("#start_time").val();
        var  etime=$("#end_time").val();
        if(stime||etime)
        {
            if(Date.parse(stime)>Date.parse(etime))
            {
                layer.msg('开始时间必须小于结束时间');
                return false;
            }
        }
        $("#flexigrid").flexOptions({url: 'user_list?'+$("#formSearch").serialize(),query:'',qtype:''}).flexReload();
    });


  });


  function fg_operate(name, grid) {
	    if (name == 'delete') {
	        if($('.trSelected',grid).length>0){
	            var itemlist = new Array();
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	            fg_delete(itemlist);
	        }else{
	            return false;
	        }
	    }else if (name == 'add') {
	    	window.location.href="user_management_add";
	    }else if (name == 'csv'){
	    	var itemlist = new Array();
	        if($('.trSelected',grid).length>0){
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	        }
            fg_csv(itemlist);
        }
	}

	function fg_delete(id, name) {
		if (typeof id == 'number') {
	    	var id = new Array(id.toString()); 
		};
		if(typeof name == 'undefined'){
			var str = '删除后将不能恢复，确认删除 这' + id.length + ' 项吗？';
		}else{
			var str = '删除后将不能恢复，确认删除 ' + name + ' 吗？';
		}
		layer.confirm(str, {
			  btn: ['确定','取消'] //按钮
			}, function(){
			  layer.msg('删除中', {icon: 1});
			  $.ajax({
			        type: "post",
			        dataType: "json",
			        url: "member_del",
			        data: "id="+id,
			        success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else{
                            layer.msg(data);
						}
	    				$("#flexigrid").flexReload();
			        }
			    });
			}, function(){
			    return ;
	    });
	}
	function fg_csv(ids){
		if(ids.length == 0 ){
			layer.msg('请至少选择一项需要导出的数据');
			return false;
		}
		
		id = ids.join(',');
		window.location.href = 'user_management_excel?id=' + id;

	}
	

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
