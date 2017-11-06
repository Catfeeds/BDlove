<?php
/* Smarty version 3.1.29, created on 2017-11-01 14:05:02
  from "D:\www\yunjuke\application\admin\views\promotion_sign.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f9640e8bbdc2_41078151',
  'file_dependency' => 
  array (
    'e64b809cb190eaa66d48b0eaeb95f6814eea464f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_sign.html',
      1 => 1509516289,
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
function content_59f9640e8bbdc2_41078151 ($_smarty_tpl) {
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
	.ncap-form-default dt.tit {
		text-align: right;
		width: 16%;
		padding-right: 2%;
	}
	.ncap-form-default dd.opt {
		text-align: left;
		width: 70%;
	}
	.mb-special-layout{background-color: #fff;}
	.mb-special-layout div{float: left;}
	.mb-special-layout .ncap-form-default{width: 72.5%;}
	.select2{margin-bottom:0;}
	.limit_container{
		width:500px;
		height:100px;
		border:1px solid #efefef;
		margin-top:10px;
		background: #f5f5f5;
	}
	.selected-group-goods{
		width:180px;
		border:1px solid #eee;
		text-align: center;
		padding:5px;
		margin:2px;
	}
	.selected-group-goods div{
		width:100%;
		margin:0 auto;
		display:block;
		white-space:nowrap;
		overflow:hidden;
		text-overflow:ellipsis;
	}
	.selected-group-goods img{
		width:180px;
		height:180px;
	}
	.search_goods{
		border:1px solid #eee;
		padding: 10px;
		width:100%;
	}
	.col-xs-3{
		width:22%!important;
	}
	.choice_title{
		border-bottom: 1px solid #eee;
		padding-bottom: 10px;
		margin-bottom:10px;
		width:100%;
	}
	p{
		margin-bottom:0 ;
	}
	#preview img{
		width:90px;
		height: 90px;
		vertical-align: top;
		margin-right: 7px;
		margin-bottom: 5px;
	}
	.uploadimg{
		position: relative;
		float: left;
	}
	.fa-close:before, .fa-times:before {
		position: absolute;
		top: -7px;
		left: 88px;
	}
	.ncap-form-default{display:none;}
	.active{display:block;}
.flexigrid .mDiv {
    display: none;
    
}
.flexigrid .mDiv,.pDiv{
    display: none;
    
}
.flexigrid .bDiv{width:100%;}
#createDetail{min-width:960px !important;}
.flexigrid .bDiv .no-data{min-width:960px !important;}
 .money{
        background: url("http://[::1]/yunjuke/application/admin/views/images/coupon_money.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;

    }
    .reduce{
        background: url("http://[::1]/yunjuke/application/admin/views/images/coupon_reduce.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .sale{
        background: url("http://[::1]/yunjuke/application/admin/views/images/coupon_sale.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .for_goods{
        background: url("http://[::1]/yunjuke/application/admin/views/images/for_goods.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #333;
        position: relative;
        margin-bottom: .05rem;
    }
    .prize_show>div{display:inline-block;height:100px;float: none;width:270px}
.goods_img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-bottom: .1rem;
    margin-left: .15rem;
}
	.coupon_time{
		position: absolute;
		bottom: 8px;
		left: 10px;
	}
	.coupon_text{
		margin-top: 25px;
		font-size: 18px;
		text-align: center;
	}
</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
		<div class="item-title">
			<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
			<div class="subject">
				<h3>签到-添加活动规则</h3>
				<h5>签到送积分送奖品</h5>
			</div>
			<ul class="tab-base nc-row">
				<li><a href="JavaScript:void(0);" class="current">签到设置</a></li>
				<li><a href="JavaScript:void(0);">签到统计</a></li>
				
			</ul>
		</div>

	</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 1.签到可根据连续天数赠送用户积分及优惠券。</li>
					<li> 2.若设置了连续1天、连续2天、连续3天，最大天数3天为大于等于3天均赠送(可设置优惠券仅送一次)。</li>
					<li> 3.示例设置：连续签到1天送1积分，连续签到2天送2积分，连续签到3天送2积分及100元优惠券（设置仅送一次）。则会员第一天签到获得1积分，连续不间断第二天签到获得2积分，连续不间断第三天签到获得2积分及100元优惠券，连续不间断第四天签到获得2积分。同理之后连续签到都获得2积分。若中途断签，从第一天开始根据条件赠送。</li>
					
				</ul>
		     </div>
		    <div class="mb-special-layout">
		<div class="mb-item-box" style="padding-left: 25px;padding-top: 50px;">
			<img src="http://[::1]/yunjuke/application/admin/views/images/sign_points.png"  width="300px"  height="540px"/>
		</div>
		<div class="ncap-form-default active" id="add_form_op">
			<form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
			  <!--<input type="hidden" class="sign_id" name="sign_id" value="">-->
				<input type="hidden" class="sign_id" name="sign_id" value="">
			  <dl class="row">
					<dt class="tit">
						<label for="sign_title">签到活动标题：</label>
					</dt>
					<dd class="opt">
						<input type="text" id="sign_title" name="sign_title" value=" "  >
						<span class="err"></span>

					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="per_shopping"><em>*</em>是否启用签到：</label>
					</dt>
					<dd class="opt">
						<label class="slideBtn on">
		        					<input type="radio" class="bar" name="status" checked value="1" >
		        					<span class="stateOn">开启</span>
		        					<input type="radio" class="bar"  name="status"  value="2" >
		        					<span class="stateOff">关闭</span>
		        				</label>
						<span class="err"></span>
					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="statistics_code"><em>*</em>签到规则说明：</label>
					</dt>
					<dd class="opt">
						<textarea name="rule" rows="6" class="tarea" id="statistics_code" ></textarea>
						<span class="err"></span>

					</dd>
				</dl>
                <dl class="row">
					<dt class="tit">
						<label for="statistics_code"><em>*</em>签到活动时间：</label>
					</dt>
					<dd class="opt">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time" style="background-color: #fff" class="data-start" placeholder="起始时间" >
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time" style="background-color: #fff" class="data-end" placeholder="截止时间" ><span class="err"></span>
					</dd>
				</dl>
								<dl class="row">
					<dt class="tit">
						<label for="per_integration"><em>*</em>每次签到送：</label>
					</dt>
					<dd class="opt">
					    <input type="hidden" class="prize_day" name="prize_day[]" value="0">
						<input type="hidden" class="prize_data" name="prize_data[]" value="">
						<select class="min giveCouponSel" name="prize_type[]">
						<option value="0" selected="">不赠送</option>	
						<option value="3" >赠送积分</option>					
						<option value="5" >赠送红包</option>		
						<option value="1" >赠送优惠券</option>				
						</select>
						<span class="prize_show"></span>
					</dd>
				</dl>
								<dl class="row">
	             <dd class="opt">
	             <a class="add_rule" href="javascript:void(0)"><i class="fa fa-plus"></i>新增一个条件</a>
	             </dd>
             </dl>				
				

				
				
			</form>
		</div>


					<div class="bot">
						<!--<input type="hidden" id="wheels_id_prize"value="0" name="wheels_id">-->
						<div class="btn btn-default w-xs mr40 cancelCreateBtn" id="back" onclick="window.history.go(-1);">取消返回</div>
						<div class="btn btn-default w-xs saveCreateBtn" id="save">保存</div>						<!-- <a id="submit_prize" href="javascript:void(0)" class="btn btn-success radius">下一步</a> -->

					</div>
				</div>
			</form>
		</div>


	</div>

	</div>
	<script>
 $(function(){
	 $('.add_rule').click(function(){
		 rule_str = '<dl class="row">'+
					'<dt class="tit">'+
						'<label for="per_integration"><em>*</em>活动期间每累积签到：</label>'+
					'</dt>'+
					'<dd class="opt">'+
					   '<input type="hidden" class="prize_data" name="prize_data[]" value="">'+
					    '<input class="per_integration" name="prize_day[]" type="number" style="width: 40px">天送&nbsp;'+
						
						'<select class="min giveCouponSel" name="prize_type[]">'+
						'<option value="0" selected="">不赠送</option>'+
						'<option value="3" >赠送积分</option>	'+					
						'<option value="5" >赠送红包</option>	'+	
						'<option value="1" >赠送优惠券</option>	'+			
						'</select>'+
						'<span class="prize_show"></span>'+
						'&nbsp;&nbsp;&nbsp;&nbsp;<a class="del_rule red" onclick="del_rule(this)" href="javascript:void(0)">删除条件</a>'+
					'</dd>'+
				'</dl>';
		 $(this).parents('dl').before(rule_str);
	 })
 })
function del_rule(obj){
	 $(obj).parents('dl').remove();
 }
 $(".page").delegate(".giveCouponSel","change",function(){
	 _obj = $(this);
	  type = _obj.val();
	  if(type==5){
		  //红包
		  content = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="form_edit_prize" method="POST" enctype="">'+
				 '<div class=""><em class="red">*</em>红包金额范围：'+
			      '<input id="money" type="number" style="width:78px;" name="cash" value="">-<input id="money_max" style="width:78px;" type="number" name="cash_max" value="">&nbsp;&nbsp;元<span class="err"></span>'+
	              '<p>（若为固定金额则填一样的值）</p>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>有效期限：'+
			      '<input type="text" id="start_sale_time" onclick="laydate()" value="" name="start_sale_time" style="background-color: #fff" class="data-start" placeholder="起始时间">'+
			      '至&nbsp;'+
			      '<input type="text" id="end_sale_time" onclick="laydate()" value="" name="end_sale_time" style="background-color: #fff" class="data-end" placeholder="截止时间">'+
			      '<span class="err"></span></div>'+
			      '</form></div>';
		  layer.open({
              type: 1,
              skin: 'layui-layer-rim', //加上边框
              title: '<b>奖品设置</b>',
              area: ['auto', 'auto'], //宽高
              content: content,
              btn: ['确定','取消'], //按钮
              shade:0,
              success:function(){
            	  
              },
              yes:function(){
            	//结束时间不能大于开始时间且不能小于现在
          		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
          			var start_date = $("#start_sale_time").val();
          			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
          			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
          			return date1 < date2;
          		};
          		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
          			var date1 = new Date();
          			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
          			return date1 < date2;
          		};
          		//
          		jQuery.validator.methods.maxMin = function(value, element) {
          			var start_date = $("#money").val();
          			var date1 = start_date*1;
          			var date2 = value*1;
          			return date1 <= date2;
          		};
          		$("#form_edit_prize").validate({
          			errorPlacement: function(error, element){
          				var error_td = element.parent('div').children('span.err');
          				error_td.append(error);
          			},
          			rules : {
          				cash : {
          					required : true,min:0.01
          				},
          				cash_max : {
          					required : true,maxMin:true,
          				},
          				start_sale_time : {
        					required : true
        				},

        				end_sale_time : {
        					required : true,
        					greaterThanStartDate : true,
        					greaterThanNowDate : true,
        				},

          			},
          			messages : {
          				cash : {
          					required : '<i class="fa fa-exclamation-circle"></i>请输入红包最小金额',
          					min : '<i class="fa fa-exclamation-circle"></i>金额不能小于0.01',
          				},
          				cash_max : {
          					required : '<i class="fa fa-exclamation-circle"></i>请输入红包最大金额',
          					maxMin : '<i class="fa fa-exclamation-circle"></i>后面的值不能小于前面的值',
          				},
          				start_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入开始时间'
        				},
        				end_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入截止时间',
        					greaterThanStartDate : '<i class="icon-exclamation-sign">截止时间不能小于开始时间</i>',
        					greaterThanNowDate : '<i class="icon-exclamation-sign">截止时间不能小于当前时间</i>',
        				},
          			}
          		});
          		
       			if($('#form_edit_prize').valid()){
       				max_m = $('#money_max').val();
       				min_m = $('#money').val();
       				order_ajax_data = {'min':min_m,'max':max_m,'type':type,'start_time':$('#start_sale_time').val(),'end_time':$('#end_sale_time').val()};
       				order_ajax_data = JSON.stringify(order_ajax_data);
       				if(max_m*1==min_m*1){
       					title=min_m+"元现金红包";
       				}else{
       					title=min_m+'-'+max_m+"元随机红包";
       				}
       				
       				/*_str ='<a href="javascript:;" style="padding-right:10px;color:red;" class="edit_coupon" onclick=edit_prize('+order_ajax_data+')>编辑</a>';*/
       				_str = '<div class="money show_coupon"> '+
       	            '<div class="store_name"></div>'+ 
       	            '<p class="coupon_text"><span class="all_money">'+title+'</span><img class="goods_img" src="http://[::1]/yunjuke/application/admin/views/images/redmoney.png" alt=""></p>'+ 
       	            '<div class="coupon_bottom">'+ 
       	            '<p class="coupon_time">有效期：'+$('#start_sale_time').val()+'~'+$('#end_sale_time').val()+'</p>'+ 
       	            '</div>'+ 
       	            '</div>';   
       				_obj.siblings('.prize_show').attr('data',order_ajax_data);
       				_obj.siblings('.prize_data').val(order_ajax_data);
       				_obj.siblings('.prize_show').html(_str);
                    _obj.parent().prev().css('padding-top','3%')
       				layer.closeAll();
       			}
          		
              },no:function(){}
		  })
	  }else if(type==1){
		//券
		  content = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="form_edit_prize" method="POST" enctype="">'+
				 '<div class="mb-10"><em class="red">*</em>优惠券名称：'+
			      '<input id="coupon_name" type="text" style="width:120px;" name="coupon_name" value=""><span class="err"></span>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>限制门店：'+
			      '<select class="valid select2" id="store_id" name="store_id">'+
				  '<option value="">请选择</option>'+
				 '<option value="47" >BE18 鹭州里 童装集合店</option><option value="61" >BE18品牌童装</option><option value="66" >雅鹿 淘宝C店</option><option value="74" >ABC旗舰店</option><option value="75" >lnshop数据抽取仓</option><option value="76" >李宁畅跑天猫店数据抽取店</option><option value="77" >李洋测试店</option><option value="79" >nike门店</option><option value="81" >探路者旗舰店铺</option><option value="82" >大富大贵</option></select>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>限制商品：'+
			      '<div class="selected-group-goods" >'+
							'<div class="goods-thumb"><img id="groupbuy_goods_image" src="http://[::1]/yunjuke/data/images/default_goods_image.jpg"></div>'+
							'<div class="goods-name" id="groupbuy_goods_name"></div>'+
							'<div class="goods-price">吊牌价：￥<span id="groupbuy_goods_price">0.00</span></div>'+

						'</div>'+
						'<input id="goods_id" name="goods_id" type="hidden" value=""><span class="err"></span>'+
						'<div style="clear: both;"></div>'+
						'<div style="margin-top: 10px;">'+
							'<a href="javascript:void(0);" id="" class="btn btn-primary radius">选择商品</a>'+
						'</div>'+
						'<div style="clear: both;"></div>'+
			      '<div class="row search_goods" style="margin-top: 10px;">'+
			      '<div class="choice_title">'+
			      '搜索店内商品 <input type="text" name="search_goods_name" id="search_goods_name">'+
			      '<a href="javascript:;" id="btn_search_goods" class="btn btn-primary radius size-S">搜索</a>'+
			      '<span>不输入名称直接搜索将显示店内所有普通商品，特殊商品不能参加</span>'+
			      '</div>'+
			      '<div style="clear: both;"></div>'+
			      '<div class="div_goods_search_result" style="display:none;"></div></div>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>优惠券折扣：'+
			      '<input id="coupon_discount" type="number" style="width:50px;" name="coupon_discount" value="">折<span class="err"></span>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>有效期限：'+
			      '<input type="text" id="start_sale_time" onclick="laydate()" value="" name="start_sale_time" style="background-color: #fff" class="data-start" placeholder="起始时间">'+
			      '至&nbsp;'+
			      '<input type="text" id="end_sale_time" onclick="laydate()" value="" name="end_sale_time" style="background-color: #fff" class="data-end" placeholder="截止时间">'+
			      '<span class="err"></span></div>'+
			      '<div class="mb-10">使用规则说明：'+
			      '<textarea name="coupon_rule" rows="6" class="tarea" id="coupon_rule"></textarea>'+
			      '<span class="err"></span></div>'+
			      '</form></div>';
		  layer.open({
              type: 1,
              skin: 'layui-layer-rim', //加上边框
              title: '<b>奖品设置</b>',
              area: ['1080px', 'auto'], //宽高
              content: content,
              btn: ['确定','取消'], //按钮
              shade:0,
              success:function(){
            	//选择商品  搜索
            		$("#btn_search_goods").click(function(){
            			search_goods_name = $('#search_goods_name').val();
            			group_id = $('#now_groupbuy_id').val();
            			store_id = $('#store_id').val();
            			if(!store_id){
            				layer.msg('请先选择活动门店!');return false;
            			}
            			function show_content(curr,group_id){
            				$.ajax({
            					type: "post",
            					url: "goods_search",
            					data: {search_goods_name:search_goods_name,page:curr,group_id:group_id,store:store_id},
            					dataType: "json",
            					success: function(data){
            						if(data.state=='403'){
            							login_ajax('shopadmin');return false;
            						}
            						page = parseInt(data.page);data_goods = data.data;total_page = parseInt(data.total_page);rp = parseInt(data.rp);
            						if(data.state){

            							if(data_goods!=''){
            								str ='';
            								$.each(data_goods,function(k,v){

            									fg_v = JSON.stringify(v).replace(/ /g,"！");

            									str +='<div class="selected-group-goods col-xs-3">'+
            											'<div class="goods-thumb"><img id="groupbuy_goods_image" src="'+v.goods_image+'"></div>'+
            											'<input name="search_goods_id" class="search_goods_id" type="hidden" value="'+v.goods_id+'">'+
            											'<div class="goods-name">'+v.goods_name+'</div>'+
            											'<div class="goods-price">吊牌价：￥<span nctype="groupbuy_goods_price">'+v.goods_marketprice+'</span></div>'+
            											'<a href="javascript:;" class="btn btn-primary" onclick=select_goods('+fg_v+')><i class="fa fa-check-circle-o"></i>选择该商品</a>'+
            											'</div>';

            								})
            								str +='<div style="clear:both;"></div><div class="pagination"></div> ';
            							}
            							$('.div_goods_search_result').show();
            							$('.div_goods_search_result').html(str);
            							pages = total_page
            							curr = page
            							laypage({
            								cont: $('div.pagination'), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
            								pages: pages, //通过后台拿到的总页数
            								curr:  curr || 1, //当前页
            								first: '首页',
            								last: '末页',
            								groups:5,
            								jump: function(obj, first){ //触发分页后的回调
            									if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
            										show_content(obj.curr,group_id);
            									}
            								}
            							});
            						}else{
            							str = '<div style="font-size:20px;color:red;">未找到符合条件的商品！</div>';
            							$('.div_goods_search_result').show();
            							$('.div_goods_search_result').html(str);

            						}
            					}
            				})
            			}
            			show_content(1,group_id)
            			//console.log(search_goods_name)
            		})
              	  $('#store_id').change(function(){
            			$('.div_goods_search_result').html('');
            			var goods_str = '<div class="selected-group-goods" >'+
            							'<div class="goods-thumb"><img id="groupbuy_goods_image" src="http://[::1]/yunjuke/data/images/default_goods_image.jpg"></div>'+
            							'<div class="goods-name" id="groupbuy_goods_name"></div>'+
            							'<div class="goods-price">吊牌价：￥<span id="groupbuy_goods_price">0.00</span></div>'+

            						'</div>'+
            						'<input id="goods_id" name="goods_id" type="hidden" value=""><span class="err"></span>'+
            						'<div style="clear: both;"></div>'+
            						'<div style="margin-top: 10px;">'+
            							'<a href="javascript:void(0);" id="" class="btn btn-primary radius">选择商品</a>'+
            						'</div>'+
            						'<div style="clear: both;"></div>'+
            						'<div class="row search_goods" style="margin-top: 10px;">'+
            							'<div class="choice_title">'+
            								'搜索店内商品 <input type="text" name="search_goods_name" id="search_goods_name">'+
            								'<a href="javascript:;" id="btn_search_goods" class="btn btn-primary radius size-S">搜索</a>'+
            								'<span>不输入名称直接搜索将显示店内所有普通商品，特殊商品不能参加</span>'+
            							'</div>'+
            							'<div style="clear: both;"></div>'+
            							'<div class="div_goods_search_result" style="display:none;">'+
            							'</div>'+
            						'</div>';
            					$('#groupbuy_goods_image').attr('src','http://[::1]/yunjuke/data/images/default_goods_image.jpg');
            					$('#groupbuy_goods_name').text('');
            					$('#groupbuy_goods_price').text('0.00');
            					$('#goods_id').val('');
            		})
              },
              yes:function(){
            	//结束时间不能大于开始时间且不能小于现在
          		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
          			var start_date = $("#start_sale_time").val();
          			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
          			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
          			return date1 < date2;
          		};
          		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
          			var date1 = new Date();
          			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
          			return date1 < date2;
          		};
          		//
          		jQuery.validator.methods.maxMin = function(value, element) {
          			var start_date = $("#money").val();
          			var date1 = start_date*1;
          			var date2 = value*1;
          			return date1 <= date2;
          		};
          		$("#form_edit_prize").validate({
          			errorPlacement: function(error, element){
          				var error_td = element.parent('div').children('span.err');
          				error_td.append(error);
          			},
          			rules : {
          				coupon_name : {
          					required : true,
          				},
          				store_id : {
          					required : true,
          				},
          				goods_id : {
          					required : true,
          				},
          				coupon_discount : {
          					required : true,
          				},
          				start_sale_time : {
        					required : true
        				},

        				end_sale_time : {
        					required : true,
        					greaterThanStartDate : true,
        					greaterThanNowDate : true,
        				},
          			},
          			messages : {
          				coupon_name : {
          					required : '<i class="fa fa-exclamation-circle"></i>请输入活动名称',
          					
          				},
          				store_id : {
          					required : '<i class="fa fa-exclamation-circle"></i>请选择门店',
          					
          				},
          				goods_id : {
          					required : '<i class="fa fa-exclamation-circle"></i>请选择商品',
          					
          				},
          				coupon_discount : {
          					required : '<i class="fa fa-exclamation-circle"></i>请输入折扣值',
          					
          				},
          				start_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入开始时间'
        				},
        				end_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入截止时间',
        					greaterThanStartDate : '<i class="icon-exclamation-sign">截止时间不能小于开始时间</i>',
        					greaterThanNowDate : '<i class="icon-exclamation-sign">截止时间不能小于当前时间</i>',
        				},
          			}
          		});
          		
       			if($('#form_edit_prize').valid()){
       				coupon_name = $('#coupon_name').val();
       				goods_id = $('#goods_id').val();
       				goods_image = $('#groupbuy_goods_image').attr('src');
       				store_id = $('#store_id').val();
       				discount = $('#coupon_discount').val();
       				coupon_rule=$('#coupon_rule').val();
       				rule = $('#statistics_code').val();
       				order_ajax_data = {'coupon_name':coupon_name,'goods_id':goods_id,'store_id':store_id,'discount':discount,'rule':rule,'coupon_rule':coupon_rule,'type':type,'start_time':$('#start_sale_time').val(),'end_time':$('#end_sale_time').val()};
       				order_ajax_data = JSON.stringify(order_ajax_data);
       				title='';
       				/*_str ='<a href="javascript:;" style="padding-right:10px;color:red;" class="edit_coupon" onclick=edit_prize('+order_ajax_data+')>编辑</a>';*/
       				_str = '<div class="sale show_coupon"> '+
       	            '<div class="store_name"></div>'+ 
       	            '<p class="coupon_text"><span class="all_money">'+coupon_name+'</span><img class="goods_img" src="'+goods_image+'" alt=""></p>'+ 
       	            '<div class="coupon_bottom">'+ 
       	            '<p class="coupon_time">有效期：'+$('#start_sale_time').val()+'~'+$('#end_sale_time').val()+'</p>'+ 
       	            '</div>'+ 
       	            '</div>';    
       				_obj.siblings('.prize_show').attr('data',order_ajax_data);
       				_obj.siblings('.prize_data').val(order_ajax_data);
       				_obj.siblings('.prize_show').html(_str);
                    _obj.parent().prev().css('padding-top','3%')
       				layer.closeAll();
       			}
          		
              },no:function(){}
		  })
	  }else if(type==3){
		//积分
		  content = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="form_edit_prize" method="POST" enctype="">'+
				 '<div class="mb-10"><em class="red">*</em>赠送积分：'+
			      '<input id="prize_point" type="number" style="width:78px;" name="prize_point" value=""><span class="err"></span>'+
			      '</div>'+
			      '<div class="mb-10"><em class="red">*</em>有效期限：'+
			      '<input type="text" id="start_sale_time" onclick="laydate()" value="" name="start_sale_time" style="background-color: #fff" class="data-start" placeholder="起始时间">'+
			      '至&nbsp;'+
			      '<input type="text" id="end_sale_time" onclick="laydate()" value="" name="end_sale_time" style="background-color: #fff" class="data-end" placeholder="截止时间">'+
			      '<span class="err"></span></div>'+
			      '</form></div>';
		  layer.open({
              type: 1,
              skin: 'layui-layer-rim', //加上边框
              title: '<b>奖品设置</b>',
              area: ['auto', 'auto'], //宽高
              content: content,
              btn: ['确定','取消'], //按钮
              shade:0,
              success:function(){
            	  
              },
              yes:function(){
            	//结束时间不能大于开始时间且不能小于现在
            		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
            			var start_date = $("#start_sale_time").val();
            			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
            			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
            			return date1 < date2;
            		};
            		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
            			var date1 = new Date();
            			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
            			return date1 < date2;
            		};
          		$("#form_edit_prize").validate({
          			errorPlacement: function(error, element){
          				var error_td = element.parent('div').children('span.err');
          				error_td.append(error);
          			},
          			rules : {
          				prize_point : {
          					required : true,min:1
          				},
          				start_sale_time : {
        					required : true
        				},

        				end_sale_time : {
        					required : true,
        					greaterThanStartDate : true,
        					greaterThanNowDate : true,
        				},
          			},
          			messages : {
          				prize_point : {
          					required : '<i class="fa fa-exclamation-circle"></i>请输入赠送积分数',
          					min : '<i class="fa fa-exclamation-circle"></i>积分不能小于1',
          				},
          				start_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入开始时间'
        				},
        				end_sale_time : {
        					required : '<i class="fa fa-exclamation-circle"></i>请输入截止时间',
        					greaterThanStartDate : '<i class="icon-exclamation-sign">截止时间不能小于开始时间</i>',
        					greaterThanNowDate : '<i class="icon-exclamation-sign">截止时间不能小于当前时间</i>',
        				},

          			}
          		});
          		
       			if($('#form_edit_prize').valid()){
       				prize_point = $('#prize_point').val();
       				order_ajax_data = {'prize_point':prize_point,'type':type,'start_time':$('#start_sale_time').val(),'end_time':$('#end_sale_time').val()};
       				order_ajax_data = JSON.stringify(order_ajax_data);
       			    /*_str ='<a href="javascript:;" style="padding-right:10px;color:red;" class="edit_coupon" onclick=edit_prize('+order_ajax_data+')>编辑</a>';*/
       				_str = '<div class="reduce show_coupon"> '+
       	            '<div class="store_name"></div>'+ 
       	            '<p class="coupon_text"><span class="all_money">'+prize_point+'</span>积分劵<img class="goods_img" src="http://[::1]/yunjuke/application/admin/views/images/integ.png" alt=""></p>'+ 
       	            '<div class="coupon_bottom">'+ 
       	            '<p class="coupon_time">有效期：'+$('#start_sale_time').val()+'~'+$('#end_sale_time').val()+'</p>'+ 
       	            '</div>'+ 
       	            '</div>';
                           
       				_obj.siblings('.prize_show').attr('data',order_ajax_data);
       				_obj.siblings('.prize_data').val(order_ajax_data);
       				_obj.siblings('.prize_show').html(_str);
       				_obj.parent().prev().css('padding-top','3%')
       				layer.closeAll();
       			}
          		
              },no:function(){}
		  })
	  }
});
//创建活动保存
 $("#save").click(function(){
		obj_s = $(this);
//结束时间不能大于开始时间且不能小于现在
		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
			var start_date = $("#start_time").val();
			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
			var date1 = new Date();
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanStartDate1 = function(value, element) {
			var start_date = $("#start_sale_time").val();
			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanNowDate1 = function(value, element) {
			var date1 = new Date();
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		var Rules = {};var Messages = {};
		
			Rules = {
					rule : {
						required : true,
					},
					'prize_type[]' : {
						required : true,
						min:1,
					},

					end_time : {
						required : true,
						greaterThanStartDate : true,
						greaterThanNowDate : true,
					},
					
				};
			Messages =  {
					rule : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入活动规则',
					},
					'prize_type[]' : {
						required : '<i class="fa fa-exclamation-circle"></i>请选择赠送奖品',
						min:'<i class="fa fa-exclamation-circle"></i>请选择赠送奖品',
					},
					end_time : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
						greaterThanStartDate : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
						greaterThanNowDate : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
					},
				};
		
		$("#add_form").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : Rules,
			messages :Messages
		});
		//alert($('#wheel_prize_add').valid())
		isSubmit = $('#add_form').valid();
		if(isSubmit){	
			ohosts = $('#statistics_code');
			hosts = ohosts.val().replace(/\n|\r\n/g,"<br>"); 
			ohosts.val(hosts);
			var data = $("#add_form").serialize();
		$.ajax({
			type:'POST',
			data : data,
			url:'promotion_sign_edit',
			success:function(data){
				if(data.state=='403'){
					login_ajax('shopadmin',data);
				}else if(data.state){
                   layer.closeAll();
				}
				layer.msg(data.msg);
                window.location.href = "sign";
			},
			dataType:'json'
		});
		}
	})

 function select_goods(goods){
		re = new RegExp("！","g");
		groupbuy_goods_name = data_null(goods.goods_name).replace(re," ");
		$('#goods_id').val(goods.goods_id);
		$('#groupbuy_goods_image').attr('src',data_null(goods.goods_image));
		$('#groupbuy_goods_price').text(data_null(goods.goods_marketprice));
		$('#groupbuy_goods_name').text(groupbuy_goods_name);
		$('.div_goods_search_result').hide();
	}

//	$(document).on('click','.edit_coupon',function(){
//	    $(this).parents('.row').find('.coupon_show').show();
//	})



</script>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
