<?php
/* Smarty version 3.1.29, created on 2017-09-28 16:07:14
  from "D:\www\yunjuke\application\admin\views\member_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ccadb2ed46a5_21718704',
  'file_dependency' => 
  array (
    '30b26472361882a14979e26c9035798d7a8a5152' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_management.html',
      1 => 1506305288,
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
function content_59ccadb2ed46a5_21718704 ($_smarty_tpl) {
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
    .select2{
        margin-bottom:0;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>会员管理</h3>
				<h5>商城注册会员账户信息设置管理</h5>
			</div>
		</div>
	</div>
	<!-- 操作说明 -->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>通过会员管理，你可以进行查看、编辑会员资料等操作</li>
			<li>你可以根据条件搜索会员，然后选择相应的操作</li>
		</ul>
	</div>
	<form id="formSearch" method="post">

		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label for="class_sort">加入时间：</label>
				</dt>
				<dd class="opt opt1">
					<div class="area-region-select">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time" style="background-color: #fff" class="input-text  data-start">
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time" style="background-color: #fff" class="input-text  data-end">
						<input name="time" class="check_i" type="hidden" value=""/>
						<span class="check_box  check_boxtime">
								 <span class="check  all current" data-para="all">全部</span>
								 <span class="check time" data-start="2017-09-28 00:00:00" data-end="2017-09-28 23:59:59">今日</span>
								 <span class="check time" data-start="2017-09-27 00:00:00" data-end="2017-09-27 23:59:59">昨日</span>
								 <span class="check time" data-start="2017-09-21 00:00:00" data-end="2017-09-28 23:59:59">最近7天</span>
								 <span class="check time" data-start="2017-08-28 00:00:00" data-end="2017-09-28 23:59:59">最近30天</span>
						        </span>
					</div>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name">消费金额：</label>
				</dt>
				<dd class="opt opt1">
					<input type="number" id="start_monney"  value="" name="start_monney" style="background-color: #fff" class="input-text  data-start">
					至&nbsp;<input type="number" id="end_monney"  value="" name="end_monney" style="background-color: #fff" class="input-text  data-end">
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
					<input type="number" id="start_num"  value="" name="start_num" style="background-color: #fff" class="input-text  data-start">
					至&nbsp;<input type="number" id="end_num"  value="" name="end_num" style="background-color: #fff" class="input-text  data-end">
					<input name="num" class="check_i" type="hidden" value=""/>
					<span class="check_box check_boxnumber">
							 <span class="check all current" data-para="all">全部</span>
							 <span class="check number" data-start="0" data-end="10">0~10单</span>
							 <span class="check number" data-start="10" data-end="50">10~50单</span>
							 <span class="check number" data-start="50" data-end="">50单以上</span>
						    </span>
				</dd>
			</dl>
			<!-- 					<dl class="row row1">
                                    <dt class="tit">
                                <label for="class_sort">关注公众号：</label>
                            </dt>
                                    <dd class="opt">
                                        <div class="area-region-select">
                                            <select class="valid" name="wx_num">
                                                <option value="" >-请选择-</option>
                                                <option value="1" >-男-</option>
                                                <option value="2" >-女-</option>

                                            </select>
                                            <span class="err"></span></div>
                                        <span class="err"></span>
                                    </dd>
                                    </dl> -->
			<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">所属门店：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="valid select2" name="understore" id="area_region_select_store">
							<option value="" >-请选择-</option>
																					<option value="44"  class="understore">-射洪-品牌店-</option>
														<option value="47"  class="understore">-射洪 妮可贝贝-</option>
														<option value="50"  class="understore">-射洪 公主安娜-</option>
														<option value="51"  class="understore">-射洪 ABC-</option>
														<option value="52"  class="understore">-射洪 大头儿子-</option>
														<option value="54"  class="understore">-射洪 全品牌店铺-</option>
														<option value="57"  class="understore">-万达 植木西-</option>
														<option value="60"  class="understore">-万达 公主安娜-</option>
														<option value="61"  class="understore">-万达 ABC 探路者-</option>
														<option value="62"  class="understore">-万达 大头儿子-</option>
														<option value="64"  class="understore">-春熙路 探路者-</option>
														<option value="65"  class="understore">-犀浦--品牌店-</option>
														<option value="66"  class="understore">-小头爸爸-</option>
																				</select>
						<span class="err"></span></div>
					<span class="err"></span>

				</dd>
			</dl>
			<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">所属导购：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="valid select2" name="underguide" id="area_region_select_guide">
							<option value=""  class="underguide"  >-请选择-</option>
                                                                                    <option value="1"  class="understore">-张奇豪-</option>
                                                        <option value="4"  class="understore">-李洋-</option>
                                                        <option value="13"  class="understore">-李月婷-</option>
                                                        <option value="17"  class="understore">-黄雷-</option>
                                                        <option value="18"  class="understore">-彭飞-</option>
                                                        <option value="19"  class="understore">-吴鑫丽-</option>
                                                        <option value="21"  class="understore">-李小成-</option>
                                                        <option value="22"  class="understore">-李刚-</option>
                                                        <option value="23"  class="understore">-何力-</option>
                                                        <option value="24"  class="understore">-吴恩廷-</option>
                                                        <option value="26"  class="understore">-黄雷-</option>
                                                        <option value="27"  class="understore">-钟霞-</option>
                                                        <option value="28"  class="understore">-刘贤柯-</option>
                                                        <option value="29"  class="understore">-李正鹏-</option>
                                                        <option value="30"  class="understore">-李昕泽-</option>
                                                        <option value="31"  class="understore">-lll-</option>
                                                        						</select>
						<span class="err"></span></div>
					<span class="err"></span>

				</dd>
			</dl>
			<!-- 					<dl class="row row1">
                                    <dt class="tit">
                                <label for="class_sort">申请会员卡：</label>
                            </dt>

                                    <dd class="opt">
                                    <input type="text" id="card"  value="" name="card" style="background-color: #fff" class="input-text">
                                    </dd>
                                    </dl>
                                    <dl class="row row1">
                                    <dt class="tit">
                                <label for="class_sort">卡号：</label>
                            </dt>
                                    <dd class="opt">
                                    <input type="text" id="card_num"  value="" name="card_num" style="background-color: #fff" class="input-text">
                                    </dd>
                                    </dl> -->
			<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">姓名：</label>
				</dt>
				<dd class="opt">
					<input type="text" id="true_name"  value="" name="true_name" style="background-color: #fff" class="input-text">
				</dd>
			</dl>
			<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">微信昵称：</label>
				</dt>
				<dd class="opt">
					<input id="wx_nike" name="wx_nike"  type="text" class="input-text" value="">
					<span class="err"></span>

				</dd></dl>
			<dl class="row row1 row2">
				<dt class="tit">
					<label for="class_sort">手机号：</label>
				</dt>
				<dd class="opt opt2">
					<input type="text" id="mobile"  value="" name="mobile" style="background-color: #fff" class="input-text">
				</dd>
				<a id="submit" href="javascript:void(0)" class="btn btn-success radius">搜索</a>
			</dl>

		</div>
	</form>
	<div id="flexigrid"></div>
</div>
<script type="text/javascript">

    $(".select2").select2({
            width:'150px'
        });
    $(function(){
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
        })
        $("#flexigrid").flexigrid({
            url: 'member_list?role=w',
            colModel : [
                {display: '操作', name : 'operation', width : 140, sortable : false, align: 'center'},
                {display: '会员姓名', name : 'member_id', width : 80, sortable : true, align: 'left'},
				/* {display: '会员卡', name : 'member_name', width : 80, sortable : true, align: 'center'}, */
                {display: '手机号', name : 'member_email', width : 120, sortable : true, align: 'center'},
                {display: '性别', name : 'member_mobile', width : 40, sortable : true, align: 'center'},
                {display: '最近绑定导购', name : 'member_sex', width : 80, sortable : true, align: 'center'},
                {display: '付款订单数', name : 'member_truename', width : 80, sortable : true, align: 'center'},
                {display: '付款订单额', name : 'member_birthday', width : 100, sortable : true, align: 'center'},
				/*  {display: '公众号', name : 'member_time', width : 100, sortable : true, align: 'center'}, */
                {display: '剩余积分', name : 'member_login_time', width : 80, sortable : true, align: 'center'},
                {display: '账户余额', name : 'member_login_ip', width : 100, sortable : true, align: 'center'},
				/* {display: '可用充值卡', name : 'member_points', width : 60, sortable : true, align: 'center'}, */
                {display: '加入时间', name : 'member_grade', width : 130, sortable : false, align: 'center'},
                {display: '省份(直辖市)', name : 'member_province', width : 80, sortable : false, align: 'center'},
                {display: '市', name : 'member_city', width : 80, sortable : false, align: 'center'},
                {display: '区(县)', name : 'member_area', width : 80, sortable : false, align: 'center'},
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
                {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件',onpress : fg_operate  }
            ],

            title: '商城会员列表'
        });
        $('#submit').click(function(){
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
            $("#flexigrid").flexOptions({url: 'member_list?role=w&'+$("#formSearch").serialize(),query:'',qtype:''}).flexReload();
        })

        $("#area_region_select_store").change(function(){
            var  storeid = $(this).val();
            if(storeid){
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "get_guide_info",
                    data: "storeid="+storeid,
                    success: function(data){
                        if(data.state){
                            var htmlStr = '<option value=""  class="underguide"  >-请选择-</option>';
                            $.each(data.data,function(k,v){
                                htmlStr+='<option value="'+v.spg_id+'" >-'+v.spg_name+'-</option>';
                            });
                            $('#area_region_select_guide').html(htmlStr);
                        }else {
                            var htmlStr = '<option value=""  class="underguide"  >-请选择-</option>';
                            $('#area_region_select_guide').html(htmlStr);
                        }
                    }
                });
            }
        })





















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
            window.location.href="user_management_add?role=w";
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
                    if(data.state==403){
                        login_ajax('shopadmin');return false;
                    }
                    layer.msg(data);
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
        window.location.href = 'code_excel?role=w&id=' + id;

    }


</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
