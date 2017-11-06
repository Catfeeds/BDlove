<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:33:02
  from "D:\www\yunjuke\application\pay\views\shop_cart.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a518ae945623_76560549',
  'file_dependency' => 
  array (
    'adfe7572deb484ea48d5cccb3e94aac1d0aaf8e5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\shop_cart.html',
      1 => 1502155931,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59a518ae945623_76560549 ($_smarty_tpl) {
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
.table-info input{height:30px !important;}
.table-info select{height:30px !important;}
.cur_p {
	width: 30px;
	height: 28px;
	line-height: 28px;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 购物车 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page-container">
  <div class="fixed-bar">
</div>
<form id="form1" action="shop_cart_sure" method="post">
<table class="mt-10 table_goods table table-border table-bordered table-bg">
    <tr class="text-c" bgcolor="EAEDF1">
        <th width="8%">款号</th>
        <th width="10%">货号</th>
        <th width="7%">品牌</th>
        <th width="6%">颜色</th>
        <th width="6%">尺码</th>
        <th width="8%">发布季</th>
        <th width="7%">库存</th>
        <th width="10%">数量</th>
        <th width="9%">单价</th>
        <th width="8%">重量（KG/款）</th>
        <th width="9%">合计金额</th>
        <th width="4%">操作</th>
    </tr>
   <input type="hidden" name="goods_info" value="" id="goods_info_message">
        <tr>
        <td class="text-c f-14">共计</td>
        <td colspan="10" class="f-14"><span class="shop_cart_num ml-20">3</span> 件商品 大概重量：<span class="shop_cart_kg">2.20</span>(kg) 商品总价：<span class="shop_cart_total">543.25 </span>元</td>
        <td width="8%" class="text-c"><input type="button" onclick="javascript:clear_shop();" class="btn btn-danger radius" value="清空购物车"></td>
    </tr>
</table>
<table class="mt-20  table table-border table-bordered table-bg table-info">
    <tr>
        <td colspan="2" bgcolor="#EAEDF1" class="text-c f-14">收货人信息</td>
    </tr>
    <tr>
        <td width="15%" class="va-m text-r">地址解析：</td>
        <td width="85%">
            <textarea name="text_box" id="text_box"  cols="" rows="" class="pd-5" style="width: 70%;height: 80px;"></textarea>
            <span class="err"></span>
            <div class="bk-gray radius pd-5" style="background-color: #F2FFEA">
                可以从淘宝等平台复制物流信息到这里，提高下单效率，格式要求（姓名，手机，电话，地址，邮编）
                例如1：张XX ，13888888888，0579-88888888 ，浙江省 金华市 婺城区 永康街697号东侧二楼 ，321000<br/>
                 例如2：张XX ，13888888888， ，浙江省 金华市 婺城区 永康街697号东侧二楼 ，321000<br/>
                例如3：张XX ，13888888888，浙江省 金华市 婺城区 永康街697号东侧二楼 ，321000
                <div class="c-error">注:淘宝地址格式严格按照以上格式填写,省,市,区后面要有[空格]！提交不成功请检查地址格式！</div>
            </div>
        </td>
    </tr>
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>收货人姓名：</td>
        <td width="85%"><input type="text" class="input-text f-12" name="name" id="name" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr>
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>所属地区：</td>
        <td width="85%">
            <select name="sel" id="sel" data-id="sel1" onchange="changed(this)" onclick="area_change(this)" style="width: 100px;height: 24px;">
                <option value="0" selected>-请选择-</option>
	            	            <option value="1000">北京</option>
	            	            <option value="1001">上海</option>
	            	            <option value="1002">天津</option>
	            	            <option value="1003">重庆</option>
	            	            <option value="1004">浙江省</option>
	            	            <option value="1005">广东省</option>
	            	            <option value="1006">江苏省</option>
	            	            <option value="1007">河北省</option>
	            	            <option value="1008">山西省</option>
	            	            <option value="1009">四川省</option>
	            	            <option value="1010">河南省</option>
	            	            <option value="1011">辽宁省</option>
	            	            <option value="1012">吉林省</option>
	            	            <option value="1013">黑龙江省</option>
	            	            <option value="1014">山东省</option>
	            	            <option value="1015">安徽省</option>
	            	            <option value="1016">福建省</option>
	            	            <option value="1017">湖北省</option>
	            	            <option value="1018">湖南省</option>
	            	            <option value="1019">海南省</option>
	            	            <option value="1020">江西省</option>
	            	            <option value="1021">贵州省</option>
	            	            <option value="1022">云南省</option>
	            	            <option value="1023">陕西省</option>
	            	            <option value="1024">甘肃省</option>
	            	            <option value="1025">广西区</option>
	            	            <option value="1026">宁夏区</option>
	            	            <option value="1027">青海省</option>
	            	            <option value="1028">新疆区</option>
	            	            <option value="1029">西藏区</option>
	            	            <option value="1030">内蒙古区</option>
	            	            <option value="1031">香港</option>
	            	            <option value="1032">澳门</option>
	            	            <option value="1033">台湾</option>
	                        </select>
            <select name="sel1" id="sel1" data-id="sel2" onchange="changed(this)" onclick="area_change(this)" style="width: 100px;height: 24px;"><option value="0" selected>-请选择-</option></select>
            <select name="sel2" id="sel2" data-id="sel3" onchange="changed(this)" onclick="area_change(this)" style="width: 100px;height: 24px;"><option value="0" selected>-请选择-</option></select><span class="err"></span>
        </td>
    </tr>
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>详细地址：</td>
        <td width="85%">
            <input type="text" name="detail_adr" id="detail_adr" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span>
            <span class="bk-gray radius pd-5 " style="background-color: #F2FFEA;line-height: 30px;">注:详细地址中也要输入省市县(区)（例如:浙江省 金华市 婺城区 永康街697号东侧二楼），格式严格按照以上格式填写,省,市,县（区）后面要有[空格]！</span>
        </td>
    </tr>
<!--     <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>邮政编码：</td>
        <td width="85%"><input type="text" class="input-text f-12" id="postalcode" name="postcode" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr> -->
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>手机：</td>
        <td width="85%"><input type="text" name="phone" id="phone" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr>
    <!-- <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>寄件人姓名：</td>
        <td width="85%"><input type="text" name="sender" id="sender" value="" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr>
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>寄件人电话：</td>
        <td width="85%"><input type="text" name="sender_mobile" id="sender_mobile" value="" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr> -->
    <tr>
        <td width="15%" class="text-r">固定电话：</td>
        <td width="85%"><input type="text" name="phone_" id="telephone" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr>
     <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>缺货处理：</td>
        <td width="85%">
            <input type="radio" name="rad_" value="1" checked class="mr-5 va-m">有货就发
            <input type="radio" name="rad_" value="2" class="ml-50 mr-5 va-m">缺一不发
            <input type="radio" name="rad_" value="3" class="ml-50 mr-5 va-m">联系本人
            <span class="err"></span>
        </td>
    </tr> 
    <tr>
        <td width="15%" class="text-r"><b class="c-red va-m ml-5 mr-5">*</b>外部单号：</td>
        <td width="85%"><input type="text" name="c_order" id="c_order" class="input-text f-12" style="width:300px;height: 24px" ><span class="err"></span></td>
    </tr>
    <tr>
        <td width="15%" class="text-r va-m">备 注：</td>
        <td width="85%">
            <textarea name="bz" id="bz_info" cols="" rows="" style="width: 50%;height: 80px;" class="pd-5 goods_info"></textarea><span class="err"></span>
        </td>
    </tr>
</table>
<div class="text-c mt-10 mb-30">
    <input type="button" value="确认订购" name="sure_submit" id="sure_submit" class="btn btn-primary radius sure_do pl-30 pr-30">
</div>
</form>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
    <script>
    var user_id = 61;
$(function(){
    
	/*验证为数字或字母*/
	jQuery.validator.addMethod("numberAndLettersVal",function(value,element){  
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);  
       },$.validator.format("请输入字母或数字")  
       );  
    /*表单验证*/
    $('#form1').validate({
        errorPlacement: function(error, element){
            var error_td = element.nextAll('span.err');
            error_td.append(error);
        },
        rules : {
            name : {required : true},
            sel : {min:1},
            sel1 : {min:1},
            sel2 : {min:1},
            detail_adr :{required : true},
            c_order : {
            	required : true,
            	numberAndLettersVal:true,
            	remote	: {
                    url :'check_out_order',
                    type:'post',
                    cache:false,
                    async:false,
                    dataType: "json", 
                    data:{
                    	order : function(){
                            return $('#c_order').val();
                        }
                    }
                }
            }, 
            phone : {
                required : true,
                mobile  : true,
            },
            /*sender : {
                required : true,
            },
            sender_mobile : {
                required : true,
                mobile  : true,
            },*/
            rad_ : {required : true}
        },
        messages : {
            text_box : {required :  '<i class="fa fa-exclamation-circle"></i> 请填写地址信息'},
            name : {required : '<i class="fa fa-exclamation-circle"></i> 请填写收货人姓名'},
            sel : {min : '<i class="fa fa-exclamation-circle"></i>请选择退所属地区省份'},
            sel1 : {min : '<i class="fa fa-exclamation-circle"></i>请选择退所属地区城市'},
            sel2: {min : '<i class="fa fa-exclamation-circle"></i>请选择退所属地区区县'},
            detail_adr :{required : '<i class="fa fa-exclamation-circle"></i> 请填写详细地址'},
            c_order : {
            	required : '<i class="fa fa-exclamation-circle"></i> 请填写外部单号',
            	numberAndLettersVal : '<i class="fa fa-exclamation-circle"></i>外部单号只能为数字或字母', 
            	remote : '<i class="fa fa-exclamation-circle"></i>此外部单号已存在'
            }, 
            phone : {
                required : '<i class="fa fa-exclamation-circle"></i> 请填写手机号码',
                mobile : '<i class="fa fa-exclamation-circle"></i> 请填写正确的手机号码格式'
            },
           /* sender : {
                required : '<i class="fa fa-exclamation-circle"></i> 请填写寄件人姓名',
            },
            sender_mobile : {
                required : '<i class="fa fa-exclamation-circle"></i> 请填写寄件人手机号码',
                mobile : '<i class="fa fa-exclamation-circle"></i> 请填写正确的手机号码格式'
            },*/
            phone_ : {required : '<i class="fa fa-exclamation-circle"></i> 请填写固定号码'},
            rad_ : {required : '<i class="fa fa-exclamation-circle"></i> 请选择缺货处理方式'},
            c_order : {required : '<i class="fa fa-exclamation-circle"></i> 请填写客户单号'},
            bz : {required : '<i class="fa fa-exclamation-circle"></i> 请上传图片'}
        }
    });
    
    
    
})
//地区选择
function changed(obj){
  	var area_id=$(obj).val();
  	var son_area=$(obj).attr('data-id');
  	
  	$.ajax({
	type: "post",
       url: "area_select",
       data: 'area_id='+area_id,
       dataType: "json",
       success: function(data){
       	var option='<option value="">请选择...</option>';
       	$.each(data,function(k,v){
       		option+='<option value="'+v.area_id+'">'+v.area_name+'</option>';
       	})
       	if(son_area=='sel1'){
       		$('#sel2').html('<option value="">请选择...</option>');
       	}
       	$('#'+son_area).html(option);
       }
   })	
 }
function area_change(obj){
	var area_id=$(obj).val();
  	var son_area=$(obj).attr('data-id');
  	
  	$.ajax({
	type: "post",
       url: "area_select",
       data: 'area_id='+area_id,
       dataType: "json",
       success: function(data){
       	var option='<option value="">请选择...</option>';
       	$.each(data,function(k,v){
       		option+='<option value="'+v.area_id+'">'+v.area_name+'</option>';
       	})
       	$('#'+son_area).html(option);
       }
   })
}  
//删除
function del_stock(obj){
	var usc_id = $(obj).parents('tr').attr('data-id');
	layer.confirm('确认删除此货品？', {
		  btn: ['确定','取消'] //按钮
		}, function(index,layero){
			$.ajax({
				   type: "post",
			       url: "delete_shop_cart",
			       data: 'usc_id='+usc_id,
			       dataType: "json",
			       success: function(data){
                       if(data.state == '403'){
                           layer.msg(data.msg);
                           window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                       }else if(data.state == '401'){
                           layer.msg(data.msg);
                           return false;
                       }else if(data.state){
                            if($(obj).parents('tr').siblings('tr').length==2){
                                str ='<td class="text-c f-14">共计</td>'+
                                   '<td colspan="13" class="f-14">购物车为空。请先挑选商品！</td>';
                               $(obj).parents('tr').next().html(str);
                               $(obj).parents('tr').remove();
                            }else{
                                $(obj).parents('tr').remove();
                                total_num();total_kg();setTotal();
                            }
                            layer.msg('已删除');
                            if(data.num == 0){
                                $('#shop_cart_total', window.parent.document).empty();
                            }else{
                                $('#shop_cart_total', window.parent.document).text(data.num);
                            }
                        }else{
                            layer.msg('操作失败请重试');
                        }
			       	layer.close(index);
			       }
				})
		});
	
}
//地址解析
$("#text_box").change(function(){
     var text=$(this).val();
    $(this).val(text.replace(/,/g,'，'));
    var arr=$(this).val().split('，');

    if(arr.length==5){
        var add=arr[3].trim();
        var arr_=add.split(" ");
        $("#name").val(arr[0].trim());
        $("#phone").val(arr[1].trim());
        $("#telephone").val(arr[2].trim());
        $("#postalcode").val(parseInt(arr[4].trim()));

        $("#sel option:selected").text(arr_[0]);
        $("#sel1 option:selected").text(arr_[1]);
        $("#sel2 option:selected").text(arr_[2]);
        $("#detail_adr").val(arr[3].trim());

    }else if(arr.length==4){
        arr.splice(2, 0, " ");
        var add=arr[3].trim();
        var arr_=add.split(" ");
        $("#name").val(arr[0].trim());
        $("#phone").val(arr[1].trim());
        $("#telephone").val(arr[2].trim());
        $("#postalcode").val(parseInt(arr[4].trim()));

        $("#sel option:selected").text(arr_[0]);
        $("#sel1 option:selected").text(arr_[1]);
        $("#sel2 option:selected").text(arr_[2]);
        $("#detail_adr").val(arr[3].trim());
    }

    $.ajax({
		type: "post",
        url: "area_analyze",
        data: {area:arr_[2],city:arr_[1],province:arr_[0]},
        dataType: "json",
        success: function(data){
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
                return false;
            }else if(data){
        		$("#sel option:selected").val(data.province_id);
                $("#sel1 option:selected").val(data.city_id);
                $("#sel2 option:selected").val(data.area_id);
                /*var content = '<tr><td colspan="2" class="text-c f-14" bgcolor="#EAEDF1">物流设置</td></tr>';
                $.each(data.data,function(key,val){
                	
                	if(v){
                		content +='<tr><td width="20%" class="va-m text-c">+'key'+现货仓--快递公司：</td>'+
                	    '<td width="80%" class="pd-10">'+
                	    '<table class="table table-border table-bordered table-bg ">'+
                	    '<tr class="text-c" bgcolor="#EAEDF1"><td>物流</td><td>运费（元）</td>'+         
                	    '<td>预计发货日期</td><td>预计到货日期</td><td>首重</td><td>续重</td></tr>';            
                	    $.each(val,function(ka,va){
                	    	$.each(val,function(ka,va){
                	    		
                	    	})
                	    })                
                	                    
                	}
                })*/
        	}else{
        		layer.msg('地址解析失败请手动选择地区');
        	}
        }
	})
})
/*清空购物车*/
function clear_shop(){
	layer.confirm('确认清空购物车？', {
		  btn: ['确定','取消'] //按钮
		}, function(index,layero){
			$.ajax({
				type: "post",
		        url: "clear_shop",
		        data: 'user_id='+user_id,
		        dataType: "json",
		        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.msg){
		        		$('.table_goods')
		        		str ='<tr><td class="text-c f-14">共计</td>'+
		       		       '<td colspan="13" class="f-14">购物车为空。请先挑选商品！</td></tr>';
		       		    $('.table_goods').find('tbody').find('tr:eq(0)').nextAll('tr').remove();
		       		    $('.table_goods').find('tr:eq(0)').after(str);
		       		    layer.msg(data.msg,{icon:1});
		        		$('#shop_cart_total', window.parent.document).empty();
		        	}else{
		        		layer.msg(data.msg,{icon:2});
		        	}
		        }
			})
		})
	
}
$("#sure_submit").click(function(){
        
        if($("#form1").valid()){
        	total_num = 0;
        	$('#form1').find('.goods_num').each(function(){
        		if(parseInt($(this).val())>=1){
        			total_num += parseInt($(this).val())
        		}
        	}) 
        	if(total_num>0){
        		$("#sure_submit").attr("disabled",true).val('提交中...').css("background-color","#ccc !important");
        		$.ajax({
    				type: "post",
    		        url: "shop_cart_sure",
    		        data: $('#form1').serialize(),
    		        dataType: "json",
    		        
    		        success: function(data){
    		        	$("#sure_submit").attr("disabled",false).val('确认订购').css("background-color","#0099CC !important");
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else  if(data.state==101){
    		        		layer.msg(data.msg,{icon:2});
    		        		setTimeout(function(){
    		        			window.location.href = 'place_order';
    		        	    },2000);
    		        		return false;
    		        	}else if(data.state){
    		        		layer.msg(data.msg,{icon:1});
    		        		$('#shop_cart_total', window.parent.document).text(data.num);
    		        		setTimeout(function(){
    		        			window.location.href = 'store_order';
    		        	    },1000);
    		        	}else{
    		        		layer.msg(data.msg,{icon:2});
    		        	}
    		        }
        		})
            	//$('#form1').submit();
        	}else{
        		layer.msg('你的购物车为空，请先挑选商品',{icon:2});
        		setTimeout(function(){
        			window.location.href = 'place_order';
        	    },2000);
        		return false;
        	}
        	
        	
        	
        	//window.location.href = 'shop_cart_sure?user_id='+user_id+'&'+user_info+'&goods_data='+goods_val+'&area_id='+area_id+'&city_id='+city_id+'&province_id='+province_id;
        	/*console.log(goods_val);
        	console.log(user_info);
        	return false;
        	window.location.href = 'order_submit?user_id='+user_id;*/
        }
    })
    //订单改货 商品数量的改变
    function num_change(obj){

        var k=$(obj).val()*1,i=$(obj).parents("tr").find(".stock").text()*1;
        if((/^(\+|-)?\d+$/.test( k )&&k>0)){

            //if(k<=i){
                setTotal();
                total_kg();
                total_num();
                active_payment(obj);
            /* }else{
                $(obj).val(i);
                layer.msg('商品数量应小于库存总量');
                setTotal();
                total_kg();
                total_num();
                active_payment(obj); 
            } */
        }else{
            layer.msg('商品数量最小为1');
            $(obj).val(1);
        }

    }
//加
function span_plus(obj){
    var t=$(obj).parent().find('input[class*=goods_num]'),i=$(obj).parents("tr").find(".stock").text()*1;
    t.val(parseInt(t.val())+1);
    //if(t.val()<=i){
        setTotal();
        total_kg();
        total_num();
        active_payment(obj);
    /* }else{
        t.val(i);
        layer.msg('商品数量应小于库存总量');
    } */

}
//减
function span_minus(obj){
    var t=$(obj).parent().find('input[class*=goods_num]');
    t.val(parseInt(t.val())-1)
    if(parseInt(t.val())<0){
        t.val(0);
    }
    setTotal();
    total_kg();
    total_num();
    active_payment(obj);
}
//价格总计
function setTotal(){
    var s=0;
    $(".table_goods td.gn").each(function(){
        s+=parseInt($(this).find(".goods_num").val())*parseFloat($(this).nextAll('.goods_price').text());
    });
    $(".shop_cart_total").html(s.toFixed(2));
}
setTotal();
//商品总重量
function total_kg(){
    var k=0;
    $(".table_goods td.gn").each(function(){
        k+=parseInt($(this).find(".goods_num").val())*parseFloat($(this).nextAll('.goods_kg').text());
    });
    $(".shop_cart_kg").html(k.toFixed(2));
}
total_kg();
//商品数量
function total_num(){
   var n=0;
   $(".table_goods td.gn").each(function(){
       n+=parseInt($(this).find(".goods_num").val());
   });
   $(".shop_cart_num").text(n);
}
total_num();
//单个商品  实际金额
function active_payment(obj){
    var t=$(obj).parent().find('input[class*=goods_num]');
    var tot=t.val()*$(obj).parents("td").nextAll(".goods_price").text();
    $(obj).parents("td").nextAll(".goods_active").text(tot.toFixed(2));
}
    </script>
</body>
</html><?php }
}
