<?php
/* Smarty version 3.1.29, created on 2017-08-01 15:53:32
  from "D:\www\yunjuke\application\admin\views\promotion_coupon_of_newman_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980337cd74784_53804491',
  'file_dependency' => 
  array (
    '0cce8d9ec4aa01011855a482b779bc2d7e9e86a5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_coupon_of_newman_edit.html',
      1 => 1501573933,
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
function content_5980337cd74784_53804491 ($_smarty_tpl) {
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
a.btn-store{display:inline-block;color:#0e90d2;}
div.layui-layer-page{min-height:220px;}
.limit-res-box {
        max-height: 100px;
        overflow-y: auto;
        background-color: #F5F5F5;
        margin-right: 50px;
        padding: 5px;
        border-radius: 3px;
        overflow-x:visible;
        overflow-y:scroll; 
    }
    .limit-close-btn {
        right: 5px;
        top: 3px;
        cursor: pointer;
        color: red;
        position: absolute;
    }
    .rel {
        position: relative;float: left;
    }
    .checkAll{float:left;margin-top:10px;font-weight:bolder;}
</style>
<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
                <div class="subject">
                    <h3>新会员送券-编辑活动</h3>
                    <h5>平台中的所有新会员送券的管理</h5>
                </div>
            </div>
        </div>
        <!-- 操作说明 -->
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span> </div>
            <ul>
                <li> 优惠券创建后不可修改，请确定后再创建</li>
            </ul>
        </div>
        <form id="add_form" method="post" action="promotion_newman_edit" enctype="multipart/form-data">
            <input type="hidden" name="coupon_id" value="1">
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label for="class_name"><em>*</em>券码生成方式：</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                                                        系统生成                            <div style="display:none;">
                                <input type="radio" id="coupon_create1" name="coupon_create" onclick="setCouponCreate(this.value)" value="1" checked><label for="coupon_create1">系统生成</label>
                                <input type="radio" id="coupon_create2" name="coupon_create"  onclick="setCouponCreate(this.value)"  value="2"  ><label for="coupon_create2">自有券码导入</label>
                            </div>
                                                        <span class="err"></span></div>
                        <p class="notic">导入的外部券码库通过洽客活动进行发放设置后，消费者领取到券后，显示的券码为外部券码库中的券码</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>新会员条件</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <select class="valid select2" id="coupon_create_type" name="coupon_create_type">
                                <option value="1" selected>首次关注公众号</option>
                                <option value="2" >扫导购二维码关注</option>
                            </select>
                            <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>优惠券：</label>
                    </dt>
                    <dd class="opt">
                        <div class="couponBox">
                            <div class="couponWrap" style="background-color: rgb(244, 67, 54);">
                                <div class="top">
                                    <div class="couponName">优惠券名称</div>
                                    <div class="type">
                                        <span class="couponValue">1.00</span>元优惠券,满<span class="orderLimitValue">1</span>元可用
                                    </div>
                                </div>
                                <div class="bottom">
                                    <span class="r" id="couponDateLimit">
                                        <span class="couponstart">2017-05-15 00:00:00</span> - <span class="couponend">2017-05-20 00:00:00</span>
                                    </span>
                                </div>
                            </div>
                            <a href="javascript:;" id="editCoupon" class="btn  ml20 mt20 btn-warning radius" >查看<input type="hidden" value="1" name="haveCoupon"></a>
                            <input type="hidden" name="couponId" id="couponId" class="error-after" value="2" aria-required="true">
                            <input type="hidden" name="coupon_info" id="coupon_info"  value="{"coupon_id":"2","coupon_activity_type":"1","coupon_code":null,"coupon_name":"\u4f18\u60e0\u5238\u540d\u79f0","coupon_bg_color":null,"coupon_denomination":"1.00","coupon_order_limit":"1","limit_goods_type":"0","limit_goods":"","limit_store_type":"0","limit_store":"","coupon_start_time":"2017\/05\/15 00:00:00","coupon_end_time":"2017\/05\/20 00:00:00","coupon_desc":"1. \u5fc5\u987b\u5728\u8ba2\u5355\u91d1\u989d\u6ee1\u8db3\u65f6\u624d\u80fd\u4f7f\u7528\uff1b\r\n2. \u4e00\u5f20\u5e97\u94fa\u4f18\u60e0\u5238\u4ec5\u9650\u4e8e\u5355\u7b14\u8ba2\u5355\u6d88\u8d39\u62b5\u7528\uff1b\r\n3. \u4f18\u60e0\u5238\u8fc7\u671f\u5219\u4f5c\u5e9f;\r\n4. \u6d3b\u52a8\u5546\u54c1\uff0c\u5982\u95ea\u8d2d\u79d2\u6740\u4e0d\u53ef\u4f7f\u7528\u4f18\u60e0\u5238\r\n5. \u4f18\u60e0\u5238\u4e0d\u53ef\u62b5\u6263\u8fd0\u8d39","coupon_start_showdate":"2017-05-15 00:00:00","coupon_end_showdate":"2017-05-20 00:00:00"}" >
                        </div>
                        <span class="err"></span>
                        <p class="notic"></p>
                    </dd>
                </dl>

                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>发放时间：</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <input type="text" id="start_time" onclick="laydate({istime: true, format: 'YYYY/MM/DD hh:mm:ss'})" value="2017/05/15 00:00:00" name="start_time" placeholder="开始时间">至
                            <input type="text" id="end_time" onclick="laydate({istime: true, format: 'YYYY/MM/DD hh:mm:ss'})" value="2017/05/20 00:00:00" name="end_time" placeholder="结束时间">
                            <span class="err"></span></div>

                        <p class="notic">线上代表只有微商城，线下只有线下收银，线上线下是指线上有微商城线下有实体收银部分</p>
                    </dd>
                </dl>
                <dl class="row" id="importexcel" style="display: none;">
                    <dt class="tit">
                        <label for="class_sort">导入券码：</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" name="import_excel" type="file" hidefocus="true" nc_type="cms_image"></span></div>
                        <span class="err"></span>

                    </dd>
                </dl>
                <dl class="row" id="coupon_to_store_limit">
                    <dt class="tit">
                        <label for="class_sort"><em>*</em>发放门店</label>
                    </dt>
                    <dd class="opt">
                        <div class="area-region-select">
                            <input name="limit_store_id" value="0" type="hidden">
                            <select class="valid select2" style="margin-bottom: 0;" id="coupon_to_store" name="coupon_to_store">
                                <option value="1" selected>全部门店</option>
                                <option value="2" >部分门店</option>
                            </select>
                            <a href="javascript:;" class="btn-store" onclick="store_check_list()" >编辑</a>
                            <span class="err"></span>
                            <div id="LimitStoreResBox" class="limit-res-box" style="display:none">

                            </div>
                            <p class="notic">只有关注以上门店导购才会赠送该券</p>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="class_sort">活动备注</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="statistics_code" rows="6" class="tarea" id="statistics_code">新会员送券</textarea>
                        <span class="err"></span>

                    </dd>
                </dl>

                <div class="bot">
                    <a id="submit" href="javascript:void(0)" class="btn btn-success radius">确认提交</a>
                </div>
            </div>
        </form>
    </div>

    <div id="goTop">
        <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
        <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
    </div>
</body>
	<script type="text/javascript">
	var coupon_info = {"coupon_id":"2","coupon_activity_type":"1","coupon_code":null,"coupon_name":"\u4f18\u60e0\u5238\u540d\u79f0","coupon_bg_color":null,"coupon_denomination":"1.00","coupon_order_limit":"1","limit_goods_type":"0","limit_goods":"","limit_store_type":"0","limit_store":"","coupon_start_time":"2017\/05\/15 00:00:00","coupon_end_time":"2017\/05\/20 00:00:00","coupon_desc":"1. \u5fc5\u987b\u5728\u8ba2\u5355\u91d1\u989d\u6ee1\u8db3\u65f6\u624d\u80fd\u4f7f\u7528\uff1b\r\n2. \u4e00\u5f20\u5e97\u94fa\u4f18\u60e0\u5238\u4ec5\u9650\u4e8e\u5355\u7b14\u8ba2\u5355\u6d88\u8d39\u62b5\u7528\uff1b\r\n3. \u4f18\u60e0\u5238\u8fc7\u671f\u5219\u4f5c\u5e9f;\r\n4. \u6d3b\u52a8\u5546\u54c1\uff0c\u5982\u95ea\u8d2d\u79d2\u6740\u4e0d\u53ef\u4f7f\u7528\u4f18\u60e0\u5238\r\n5. \u4f18\u60e0\u5238\u4e0d\u53ef\u62b5\u6263\u8fd0\u8d39","coupon_start_showdate":"2017-05-15 00:00:00","coupon_end_showdate":"2017-05-20 00:00:00"};  
		coupon_info = $.param(coupon_info);//优惠券信息序列化
    var limitResBox = "";
    var LimitStoreResBox = "";
		function setCouponCreate(sRadioValue){        //传入radio的name和选中项的值
			if(sRadioValue==1)
			{
				  document.getElementById("importexcel").style.display='none';
			}
			else{
				  
				  document.getElementById("importexcel").style.display='block';
			}
		}
		
        $(document).ready(function(){
        	setCouponCreate($('input[name=coupon_create]:checked').val());
        	$("#import_excel").change(function () {
                $("#textfield2").val($(this).val());
            });
           $("#coupon_create_type").change(function(){
			  if(document.getElementById("coupon_create_type").selectedIndex==1)
				{
					 document.getElementById("coupon_to_store_limit").style.display='block';
				}
				else{
					  
					  document.getElementById("coupon_to_store_limit").style.display='none';
				}
			});
           var limit_store = $('#coupon_to_store').val();
           if(limit_store==2){
        	   $('a.btn-store').show();
        	   $('#LimitStoreResBox').show();
        	   limit_storeId = $('input[name=limit_store_id]').val();
        	   if(limit_storeId){
        		   $.ajax({
                       type: 'post',
                       dataType: 'json',
                       url: "get_ready_stores_info",
                       data: 'id='+limit_storeId,
                       success: function (data) {
                    	   if(data){
                    		   str = '';
                    		   $.each(data,function(k,v){
                    			   str +='<div data-id="'+v.store_id+'" class="rel dib w150 ell pr20 mr5">'+v.store_name+'<i class="iconfont limit-close-btn" data-id="'+v.store_id+'"></i></div>';
                    		   })
                    		   $('#LimitStoreResBox').html(str);
                    	   }
                       }
            	   })
        	   }
           }else{
        	   $('a.btn-store').hide();
        	   $('#LimitStoreResBox').hide();
           }
			//编辑优惠卷
			$("#editCoupon").click(function () {
				var isEdit = $('input[name=haveCoupon]').val();
				if(isEdit==1){
					btn = '';
				}else{
					btn = ['确认', '取消'];
				}
            layer.open({
                type: 2,
                title: '<b>编辑优惠券</b>',
                btn: btn,
                skin: 'layui-layer-rim', //加上边框
                area: ['90%', '80%'], //宽高
                content: "PromotionCouponEdit?"+coupon_info+"&limitResBox="+limitResBox+"&LimitStoreResBox="+LimitStoreResBox,
                yes: function (index,layero) {
                    var obj = document.getElementById("layui-layer-iframe"+index).contentDocument;
                    $(obj).find('#coupon_form').validate({
                        errorPlacement: function (error, element) {
                            __formSubmit = false;
                            $(element).nextAll('span.err').append(error);
                        },
                        rules: {
                            "coupon_name": {
                                required: true,
                            },
                            "coupon_denomination": {
                               required: true,
                               min:0.01
                            },
                            "coupon_order_limit": {
                               required: true,
                               min:0.01
                            },
                            "limit_goods_type" : {
                                required    : true,
                             },
                            "limit_store_type": {
                                required: true,
                            },
                            "coupon_start_time" : {
                                required    : true
                             },
                            "coupon_end_time": {
                                required: true
                            },
                            "coupon_desc": {
                                required: true
                            }
                        },
                        messages: {
                            "coupon_name": {
                                required: '<i class="fa fa-exclamation-circle"></i>优惠券名称必填',
                            },
                            "coupon_denomination": {
                               required: '<i class="fa fa-exclamation-circle"></i>优惠券面值必填',
                               min:'<i class="fa fa-exclamation-circle"></i>优惠券面值至少大于0.01'
                            },
                            "coupon_order_limit": {
                                required: '<i class="fa fa-exclamation-circle"></i>优惠券订单满足条件必填',
                                min:'<i class="fa fa-exclamation-circle"></i>优惠券满足条件至少大于0.01'
                            },
                            "coupon_limit_type": {
                                required: '<i class="fa fa-exclamation-circle"></i>限制条件必选',
                                min: '<i class="fa fa-exclamation-circle"></i>限制条件必选',
                            },
                            "limit_store_type": {
                                required: '<i class="fa fa-exclamation-circle"></i>可使用门店必选',
                                min: '<i class="fa fa-exclamation-circle"></i>可使用门店必选',
                            },
                            "coupon_start_time": {
                                required: '<i class="fa fa-exclamation-circle"></i>有效期开始时必填'
                            },
                            "coupon_end_time": {
                                required: '<i class="fa fa-exclamation-circle"></i>有效期结束时必填'
                            },
                            "coupon_desc": {
                                required: '<i class="fa fa-exclamation-circle"></i>使用说明必填'
                            }
                        }
                    });
                    if($(obj).find('#coupon_form').valid()){
                        coupon_info = $(obj).find('#coupon_form').serialize();
                        //console.log(coupon_info);
                        $("div.couponName").html($(obj).find('#coupon_name').val());
                        $("span.couponValue").html($(obj).find('#coupon_denomination').val());
                        $("span.orderLimitValue").html($(obj).find('#coupon_order_limit').val());
                        $("span.couponstart").html($(obj).find("input[name='coupon_start_time']").val());
                        $("span.couponend").html($(obj).find("input[name='coupon_end_time']").val());
                        if($(obj).find("#coupon_limit_type").val()>2 && $(obj).find("#limitResBox div").length>0){
                            $.each($(obj).find("#limitResBox div"),function(){
                                limitResBox += $(this).data('id')+":"+$(this).find('span').html()+";"; 
                            })
                        }else if($(obj).find("#coupon_limit_type").val()==2){
                            limitResBox = $(obj).find("#limitResBox").html();
                        }else{
                            limitResBox = '';
                        }
                        if($(obj).find("#SLLimitStore").val()>1 && $(obj).find("#LimitStoreResBox div").length>0){
                             $.each($(obj).find("#LimitStoreResBox div"),function(){
                                LimitStoreResBox += $(this).data('id')+":"+$(this).find('span').html()+";"; 
                            })
                        }else{
                            LimitStoreResBox = '';
                        }
                        layer.close(index); 
                    }
                }
            })
        });
			
			$("#coupon_to_store").change(function(){
				var limit_storeType = $(this).val();
				if(limit_storeType==2){	
					$('a.btn-store').show();
					$('#LimitStoreResBox').show();
					store_check_list();
				}else{
					$('a.btn-store').hide();
					$('#LimitStoreResBox').hide();
				}
				
			});
			
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
			
			valid_rule = {
					 start_time : {
					    required : true,
			          },
			          coupon_info : {
					    required : true,
			          },
			          limit_store_id : {
					    required : true,
			          },
			          end_time : {
					    required : true,
					    greaterThanStartDate : true,
					    greaterThanNowDate : true,
			          },
			        };
		  valid_msg = {
				  start_time : {
		              required : '<i class="icon-exclamation-sign">开始时间不能为空</i>',
		            },
		            coupon_info : {
		              required : '<i class="icon-exclamation-sign">优惠卷信息不能为空</i>',
		            },
		          limit_store_id : {
		              required : '<i class="icon-exclamation-sign">请选择发放门店</i>',
		            },
		            end_time : {
		              required : '<i class="icon-exclamation-sign">结束时间不能为空</i>',
		              greaterThanStartDate : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
		              greaterThanNowDate : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
		            },
		          };
		  $("#add_form").validate({
		      errorPlacement: function(error, element){
		        var error_td = element.parents('dl').find('span.err');
		        error_td.append(error);
		      },
		      rules : valid_rule,
		      messages : valid_msg
		    });
			$('#submit').click(function(){
				$('#coupon_info').val(coupon_info);
				//console.log(coupon_info)
				if($("#add_form").valid){
						  $('#add_form').attr('action','promotion_newman_edit?'+coupon_info)
						  $('#add_form').submit();
					    
				  }
			})
		})
		//门店限制选择
		$("body").delegate(".checkAll","click",function(){
			$(this).siblings('.checkAll').find('input[type=checkbox]').attr('checked',false);
	         check_val = $(this).find('input').val();
	         if(check_val==1){
	        	 if($(this).find('input[type=checkbox]').is(":checked")){
	        		 $('div.store_info').find('input[type=checkbox]').attr('checked',true);
	        	 }else{
	        		 $('div.store_info').find('input[type=checkbox]').attr('checked',false);
	        	 }
	         }else if(check_val==2){
	        	 
	        		 $('div.store_info').find('input[type=checkbox]').each(function(){
	        			 if($(this).is(":checked")){
	        				 $(this).attr('checked',false);
	        			 }else{
	        				 $(this).attr('checked',true);
	        			 }
	        		 });
	        	 
	         }
        })
      function store_check_list(){
				
                    $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: "ajax_get_stores_info",
                    data: '',
                    success: function (data) {
                        if (data.state) {
                            var content = '<div class="text-r pd-10"><div > ' +
                                    '<div class="checkAll checkbox sltdia-item checkbox-primary ml-20"><input id="d-1" type="checkbox" value="1"> <label for="d-1" title="全选">全选</label> </div>'+
                                    '<div class="checkAll checkbox sltdia-item checkbox-primary ml-20"><input id="d-1" type="checkbox" value="2"> <label for="d-1" title="反选">反选</label> </div>'+
                                    '<div class="checkbox sltdia-item checkbox-primary ml-20"><input type="text" class="form-control  w150 " name="storeName" placeholder="店铺名称">' +
                                    '<span class="input-group-btn">' +
                                    '<button type="button" class="btn btn-success radius ml-10" id="store_search">筛选</button> </span></div> </div> </div>' +
                                    '<div class="text-l pd-10 store_info" >';
                            if (data.info) {
                                if ($("#LimitStoreResBox div.dib").length > 0) {
                                    var old_store = new Array();
                                    $.each($("#LimitStoreResBox div.dib"), function () {
                                        old_store.push($(this).data("id"));
                                    });
                                } else {
                                    var old_store = false;
                                }
                                var checked = '';
                                $.each(data.info, function (k, v) {
                                    if (old_store) {
                                        if (old_store.indexOf(v.store_id * 1) > -1) {
                                            checked = "checked='checked'";
                                        } else {
                                            checked = '';
                                        }
                                    }
                                    content += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                            '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '" ' + checked + '> ' +
                                            '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                            '</div>';
                                })
                            } else {
                                content += '<div>暂无相关数据</div>';
                            }
                            content += '</div>';
                            layer.open({
                                type: 1,
                                title: '<b>选择门店</b>',
                                area: ['550px', 'aotu'], //宽高
                                content: content,
                                btn: ['确认', '取消'],
                                skin: 'layui-layer-rim', //加上边框
                                success: function () {
                                    $("#store_search").click(function () {
                                        var storeName = $("input[name='storeName']").val();
                                        $.ajax({
                                            type: 'get',
                                            dataType: 'json',
                                            url: "ajax_get_stores_info?storeName=" + storeName,
                                            data: '',
                                            success: function (data) {
                                                if (data.state) {
                                                    var html = '';
                                                    if (data.info) {
                                                        $.each(data.info, function (k, v) {
                                                            html += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                                                    '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '"> ' +
                                                                    '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                                                    '</div>';
                                                        })
                                                    } else {
                                                        html += '<div class="ml-20"><span>暂无相关数据</span></div>';
                                                    }
                                                    $("div.store_info").html(html);
                                                }
                                            }
                                        })
                                    })
                                },
                                yes: function () {
                                    var store_div = '';idCheck = [];haveCheck = false;
                                    $.each($('.store_info').find("input[type='checkbox']"), function () {
                                        if ($(this).is(':checked')) {
                                        	haveCheck = true;
                                            var id = $(this).val();
                                            idCheck.push(id);
                                            var name = $(this).siblings("label[for='d-" + id + "']").html();
                                            store_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5">' + name +
                                                    '<i class="iconfont limit-close-btn" data-id="' + id + '"></i></div>';
                                        }
                                    });
                                   
                                    if(haveCheck){
                                    	idstr = idCheck.join(',');
                                    	$('input[name=limit_store_id]').val(idstr);
                                    	$("#LimitStoreResBox").html(store_div);
                                        layer.closeAll();
                                    }else{
                                    	layer.msg('请至少选择一个门店',{icon:2})
                                    }
                                    
                                }, no: function () {
                                    return false;
                                }
                            })
                        }
                    }
                })
			}  
         
	</script>

	</html><?php }
}
