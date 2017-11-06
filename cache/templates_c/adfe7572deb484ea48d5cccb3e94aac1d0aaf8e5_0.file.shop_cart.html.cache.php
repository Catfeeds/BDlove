<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:33:02
  from "D:\www\yunjuke\application\pay\views\shop_cart.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a518ae7a74c8_30801740',
  'file_dependency' => 
  array (
    'adfe7572deb484ea48d5cccb3e94aac1d0aaf8e5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\shop_cart.html',
      1 => 1502155931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59a518ae7a74c8_30801740 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3264859a518ae401a66_11067518';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
    <?php
$_from = $_smarty_tpl->tpl_vars['shop']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
    <tr class="text-c" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
">
     <input type="hidden" name="goods[key_code][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['key_code'];?>
">
    <input type="hidden" name="goods[cart_id][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
">
    <input type="hidden" name="goods[goods_ea_id][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
">
    <input type="hidden" name="goods[brand_name][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
">
    <input type="hidden" name="goods[store_name][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
">
    <input type="hidden" name="goods[goods_spu][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_spu'];?>
">
    <input type="hidden" name="goods[stocks_sn][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_sn'];?>
">
    <input type="hidden" name="goods[brand_id][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_id'];?>
">

    <input type="hidden" name="goods[color][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_color'];?>
">
    <input type="hidden" name="goods[size][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_spec'];?>
">
    <input type="hidden" name="goods[time_to_market][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['market_date'];?>
">
    <input type="hidden" name="goods[amount][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_num'];?>
">
        <td width="8%" class="goods_info"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_spu'];?>
</td>
        <td width="10%" class="goods_info"><?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_sn'];?>
</td>
        <td width="7%" class="goods_info "><?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
</td>
 
        <td width="7%" class="goods_info "><?php if (empty($_smarty_tpl->tpl_vars['v']->value['goods_color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['goods_color'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['goods_color_remark'];
}?></td>
        <td width="7%" class="goods_info"><?php if (empty($_smarty_tpl->tpl_vars['v']->value['goods_size_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['goods_spec'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['goods_size_remark'];
}?></td>
        <td width="8%" class="goods_info"><?php echo $_smarty_tpl->tpl_vars['v']->value['market_date'];?>
</td>
        <td width="7%" class="goods_info stock"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
        <td width="15%" class="gn">
            <div class="cl" style="margin: auto;width: 109px;">
                <span class="bk-gray  cur_p span_minus f-l" onclick="span_minus(this)">-</span>
                <input type="text" class="text-c f-l goods_num" name="goods[amount][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" style="width: 35px;height: 24px;border-radius: 0;border-color: #eee" onchange="num_change(this)" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_num'];?>
">
                <span class="bk-gray  cur_p  span_plus f-l" onclick="javascript:span_plus(this)">+</span>
            </div>
        </td>
        <input type="hidden" name="goods[stocks_price][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_price'];?>
">
        <input type="hidden" name="goods[weight][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['weight'];?>
">
        <input type="hidden" name="goods[monney_amount][<?php echo $_smarty_tpl->tpl_vars['v']->value['cart_id'];?>
]" value="<?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['v']->value['stocks_price']*$_smarty_tpl->tpl_vars['v']->value['goods_num']);?>
">
        <td width="9%" class="goods_info goods_price"><?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_price'];?>
</td>
        <td width="8%" class="goods_kg goods_info"><?php echo $_smarty_tpl->tpl_vars['v']->value['weight'];?>
</td>
        <td width="9%" class="goods_info goods_active"><?php echo sprintf('%.2f',$_smarty_tpl->tpl_vars['v']->value['stocks_price']*$_smarty_tpl->tpl_vars['v']->value['goods_num']);?>
</td>
        <td width="4%" ><a onclick="javascript:del_stock(this);" class="btn btn-del" title="删除"><i class="fa fa-trash-o"></i></a></td>
    </tr>
    <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
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
	            <?php
$_from = $_smarty_tpl->tpl_vars['pro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
	            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['area_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['area_name'];?>
</option>
	            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
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
    <?php echo '<script'; ?>
>
    var user_id = <?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
;
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
                           window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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
                window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
