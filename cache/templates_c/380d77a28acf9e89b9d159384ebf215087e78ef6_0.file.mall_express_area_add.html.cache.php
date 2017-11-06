<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:51:14
  from "D:\www\yunjuke\application\pay\views\mall_express_area_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d700205b526_27299311',
  'file_dependency' => 
  array (
    '380d77a28acf9e89b9d159384ebf215087e78ef6' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express_area_add.html',
      1 => 1501581895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598d700205b526_27299311 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '26372598d7001c88775_04325954';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>

<body style="background-color: #FFF; overflow: auto;">


<div class="page-container">
    <div class="fixed-bar">
        <nav class="breadcrumb">
            <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span><a href="mall_express_tools" style="color: #333;">运费管理</a><span class="c-gray en">&gt;</span>运费模板编辑
            &nbsp;<a href="mall_express_tools" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
        </nav>
    </div>
    <div class="ncap-form-default mt-20">
        <form method="post" id="tpl_form" name="tpl_form" action="">
           <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['ept_id'])) {?><input type="hidden" name="transport_id" id="transport_id" value="<?php echo $_smarty_tpl->tpl_vars['data_info']->value['ept_name'];?>
"><?php }?>
           <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['ept_id'])) {?><input type="hidden" name="ept_id" id="ept_id" value="<?php echo $_smarty_tpl->tpl_vars['data_info']->value['ept_id'];?>
"><?php }?>
           <!-- <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['ept_id'])) {?><input type="hidden" name="fee_data" id="fee_data" value="<?php echo $_smarty_tpl->tpl_vars['data_fee']->value;?>
"><?php }?>
            --><dl class="row">
                <dt class="tit">
                    <label for="J_TemplateTitle" class="label-like"><em>*</em>模板名称：</label>
                </dt>
                <dd class="opt vali_err">
                    <input type="text" class="text " id="title" placeholder="不能为空且最多输入10个字" autocomplete="off" value="<?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['ept_name'])) {
echo $_smarty_tpl->tpl_vars['data_info']->value['ept_name'];
}?>" name="title">
                    <p class="J_Message" style="display:none" error_type="title"><i class="fa fa-exclamation-circle"></i>模板名称为空</p>
                    <p class="J_Message" style="display:none" error_type="title_check"><i class="fa fa-exclamation-circle"></i>该模板名称已存在</p>
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="express_code" class="label-like">快递方式：</label>
                </dt>
                <dd class="opt vali_err">

                    <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['express_code'])) {?>
                        <input type="hidden" name="express_code" value="<?php echo $_smarty_tpl->tpl_vars['data_info']->value['express_code'];?>
">
                        <span><?php echo $_smarty_tpl->tpl_vars['data_info']->value['express_code'];?>
--<?php echo $_smarty_tpl->tpl_vars['data_info']->value['express_name'];?>
</span>
                    <?php }?>
                    <span class="err" style="display:none;color:red"><i class="fa fa-exclamation-circle"></i>请选择快递</span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="J_TemplateTitle" class="label-like">排序：</label>
                </dt>
                <dd class="opt vali_err">
                    <input type="number" name="num" placeholder="最大不超过127" max="127" value="<?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['sort'])) {
echo $_smarty_tpl->tpl_vars['data_info']->value['sort'];
} else { ?>127<?php }?>" class="text">
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image">默认快递：</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <input id="status_1" type="radio" name="default" value="1" <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['default']) && $_smarty_tpl->tpl_vars['data_info']->value['default'] == 1) {?> checked <?php }?> >
                        <label for="status_1" id="check_yes" class="cb-enable <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['default']) && $_smarty_tpl->tpl_vars['data_info']->value['default'] == 1) {?>selected<?php }?>">是</label>
                        <input id="status_0" type="radio" name="default" value="0" <?php if (!isset($_smarty_tpl->tpl_vars['data_info']->value['default']) || $_smarty_tpl->tpl_vars['data_info']->value['default'] != 1) {?> checked <?php }?> >
                        <label for="status_0" id="check_no" class="cb-disable <?php if (!isset($_smarty_tpl->tpl_vars['data_info']->value['default']) || $_smarty_tpl->tpl_vars['data_info']->value['default'] != 1) {?>selected checked<?php }?>">否</label>
                    </div>
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label class="label-like">计费规则：</label>
                </dt>
                <dd class="opt">
                    <label class="mr20">
                        <input type="radio" class="radio vm" name="goods_trans_type" value="1" <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['type'])) {
if ($_smarty_tpl->tpl_vars['data_info']->value['type'] == 1) {?>checked="checked"<?php }
} else { ?>checked="checked"<?php }?> >
                        按重量</label>
                    <label class="mr20">
                        <input type="radio" class="radio vm" name="goods_trans_type" value="2" <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['type'])) {
if ($_smarty_tpl->tpl_vars['data_info']->value['type'] == 2) {?>checked="checked"<?php }
}?>>
                        按件数</label>
                    <!-- <label>
                        <input type="radio" class="radio vm" name="goods_trans_type" value="3" <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['bill_method'])) {
if ($_smarty_tpl->tpl_vars['data_info']->value['bill_method'] == 3) {?>checked="checked"<?php }
}?>>
                        按体积</label> -->
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit"><em>*</em>详细设置：</dt>
                <dd class="trans-line opt">
                    <div class="ncsu-trans-type" data-delivery="kd">
                        <div class="entity ">
                            <div class="tbl-except vali_err">
                                <table cellspacing="0" class="ncsc-table-style table ">
                                    <thead>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <th style="padding-left:5px">运送到</th>
                                        <th class="w110">首(重)</th>
                                        <th class="w110">首费(元)</th>
                                        <th class="w110">续(重)</th>
                                        <th class="w110">续费(元)</th>
                                        <th class="w110">免费额度(重)</th>
                                        <th class="w110">操作</th>
                                    </tr>
                                    </thead>
                                    <?php if (isset($_smarty_tpl->tpl_vars['data_info']->value['express_info'])) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['data_info']->value['express_info'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_0_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_0_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
                                    <tr class="bd-line text-c">
                                    <input type="hidden" class="epa_id" name="epa_id[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
">
                <td class="cell-area" style="padding-left:5px">
                <span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1">
                <p style="display:inline-block"><?php echo $_smarty_tpl->tpl_vars['info']->value['area_name'];?>
</p> </span><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['area_name'];?>
" class="select_area_name" name="area_name[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]"> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['area_id'];?>
" class="select_area_id" name="area[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]"> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['first_nums'];?>
"  name="first_w[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['first_fee'];?>
" name="first_f[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" onblur="valid()" data-field="postage">
                <em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4"  autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['loan_nums'];?>
"  name="last_w[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['loan_fee'];?>
"  name="last_f[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['free_fee_num'];?>
"  name="no_fee[<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
]" onblur="valid()" data-null="no_fee" data-field="postage"> </td>
                <td class="nscs-table-handle">
                 <a class=" btn red btn-del btn-grapefruit J_DeleteRule_<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i> </a>
                  <a class=" btn green btn-bluejeans_<?php echo $_smarty_tpl->tpl_vars['info']->value['eptaf_id'];?>
" title="编辑" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i></a>
                    </td> </tr>
                                    <?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_0_saved_local_item;
}
if ($__foreach_info_0_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_0_saved_item;
}
?>
                                    <?php }?>
                                </table>
                            </div>

                            <div class="tbl-attach pd-5">
                                <div class="J_SpecialMessage"></div>
                                <a class="J_AddRule ncbtn-mini ml5" href="JavaScript:void(0);"><i class="fa fa-map-marker   "></i>为指定地区城市设置运费</a>


                            </div>

                        </div>
                    </div>
                </dd>
            </dl>
            <div class="bottom text-c">
                <label class="submit-border"><input type="btn btn-primary" id="submit_tpl" class="submit" value="保存"></label>
            </div>
        </form>
    </div>
</div>
<?php echo '<script'; ?>
>
    $("input[type=radio]").click(function () {
        if($(this))
            $(this).next().addClass('selected');

    })
    $('#status_1').click(function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "ajax_get_default_express?ept_id="+<?php echo $_smarty_tpl->tpl_vars['data_info']->value['ept_id'];?>
,
            success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state == true){
                    $('#status_1').attr("checked","checked");
                    $('#status_0').removeAttr("checked");
                    $("#check_yes").addClass('selected');
                    $("#check_no").removeClass('selected');
                }else if(data.state == false){
                    layer.msg('已设置默认运费模板！');
                    $('#status_0').attr("checked","checked");
                    $('#status_1').removeAttr("checked");
                    $("#check_yes").removeClass('selected');
                    $("#check_no").addClass('selected');
                }
            }
        });
    });
    $('#status_0').click(function () {
        $('#status_0').attr("checked","checked");
        $('#status_1').removeAttr("checked");
        $("#check_yes").removeClass('selected');
        $("#check_no").addClass('selected');
    });

function del_area(obj){
	layer.confirm('<div class="pd-5 text-c"><i class="fa fa-warning c-orange" style="margin-right: 10px;font-size: 30px"></i>确认删除吗?</div>', {
        title:'<b>提示信息</b>',
        btn: ['确定','取消'] //按钮
    },function(){
    	$(obj).parents('tr').remove();
    	layer.msg('已删除');
    });
}
function edit_area(obj){
	obj = $(obj);
	var area_id = [];
	var this_area_id = obj.parents("tr").find("td.cell-area").find("input.select_area_id").val();
	//console.log(this_area_id)
	this_area_id = this_area_id.split(',');

	obj.parents('tr').siblings().each(function(){
		area_id.push($(this).find('td.cell-area').find("input.select_area_id").val())
	})
	area_id = area_id.join(',');
	area_id = area_id.split(',');
	//console.log(area_id)
    layer.open({
        type: 1,
        title:'<b>选择区域</b>',
        btn:['确定','取消'],
        skin: 'layui-layer-rim', //加上边框
        area: ['750px', '50%'], //宽高
        content: '<div class="pd-10 dialog-areas"><ul id="J_CityList"><?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_1_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['region'];?>
"> <label for="J_Group_1"><?php echo $_smarty_tpl->tpl_vars['v']->value['region'];?>
</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><?php
$_from = $_smarty_tpl->tpl_vars['v']->value['son_area'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_2_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_2_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['area_id'];?>
"><input type="hidden" name="province_name" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['area_name'];?>
"> ' +
        '<label for="J_Province_1"><?php echo $_smarty_tpl->tpl_vars['val']->value['area_name'];?>
</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><?php
$_from = $_smarty_tpl->tpl_vars['val']->value['son_area'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_city_3_saved_item = isset($_smarty_tpl->tpl_vars['city']) ? $_smarty_tpl->tpl_vars['city'] : false;
$_smarty_tpl->tpl_vars['city'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['city']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
$__foreach_city_3_saved_local_item = $_smarty_tpl->tpl_vars['city'];
?><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="<?php echo $_smarty_tpl->tpl_vars['city']->value['area_id'];?>
"><input type="hidden" name="city_name" value="<?php echo $_smarty_tpl->tpl_vars['city']->value['area_name'];?>
"> <label for="J_City_36"><?php echo $_smarty_tpl->tpl_vars['city']->value['area_name'];?>
</label> </span><?php
$_smarty_tpl->tpl_vars['city'] = $__foreach_city_3_saved_local_item;
}
if ($__foreach_city_3_saved_item) {
$_smarty_tpl->tpl_vars['city'] = $__foreach_city_3_saved_item;
}
?>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_local_item;
}
if ($__foreach_val_2_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_item;
}
?></dd></dl></li><?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
if ($__foreach_v_1_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_1_saved_key;
}
?>' +
        '</ul></div>',
        success:function(){
        	//console.log(this_area_id)
        	$("#J_CityList").find("input[type=checkbox]").each(function(){
        		now_n_val = $(this).next().val();
        		if($.inArray(now_n_val,this_area_id)!=-1){
        			//console.log($(this).next().val())
        			$(this).attr('checked',true);
        		}
        	})
        	$("#J_CityList").find("input.J_Province").each(function(){
        		var i = 0;
        		$(this).parents(".ncsc-province-tab").find(".ncsc-citys-sub").find("span.areas").each(function(){
        			if($.inArray($(this).find("input[name=city_id]").val(),this_area_id)!=-1){
        				i++;
        			}
        		})
        		if(i>0){
        			$(this).siblings(".check_num").text('('+i+')');
        		}

        	})
        	now_area = [];
        	$('#J_CityList').find('input.J_City').each(function(){
        		var city_val = $(this).next().val();
        		if($.inArray(city_val, area_id)!=-1){
        			$(this).parents("dl.ncsc-region").find("input.J_Group").attr("disabled",true);
        			$(this).parents(".ncsc-province-tab").find("input.J_Province").attr("disabled",true);
        			$(this).attr("disabled",true);
        		}else{
        			$(this).attr("disabled",false);
        		}

        	})

            //展开
            $(".ncsc-province i.fa").click(function(){
                var par= $(this).parents(".ncsc-province");
                if(par.hasClass("showCityPop")){
                    par.removeClass('showCityPop')
                }else {
                    par.addClass("showCityPop")
                }
            })
            //关闭
            $(".close_button").click(function(){
                var par= $(this).parents(".ncsc-province");
                par.removeClass('showCityPop')
            })
            //全选
            $("input.J_Group").click(function(){

            	//console.log(now_area)
                if($(this).is(":checked")){
                    $(this).parents(".ncsc-region").find('.ncsc-province-list').find("input[type=checkbox]").prop('checked',true);
                    $(this).parents(".ncsc-region").find('.ncsc-province').each(function(){
                    	var num = $(this).find(".ncsc-citys-sub").find("span").size();
                    	$(this).find(".check_num").text('('+num+')');
                    })
                }else{
                    $(this).parents(".ncsc-region").find('.ncsc-province-list').find("input[type=checkbox]").prop('checked',false);
                    $(this).parents(".ncsc-region").find('.ncsc-province').each(function(){
                    	$(this).find(".check_num").text('');
                    })
                }
            })
            //全选
            $("input.J_Province").click(function(){
                if($(this).is(":checked")){
                    $(this).parents(".ncsc-province").find('.ncsc-citys-sub').find("input[type=checkbox]").prop('checked',true);
                    var num = $(this).parents(".ncsc-province-tab").find(".ncsc-citys-sub").find("span").size();
                    $(this).parents(".ncsc-province-tab").find(".check_num").text('('+num+')');
                }else{
                    $(this).parents(".ncsc-province").find('.ncsc-citys-sub').find("input[type=checkbox]").prop('checked',false);
                    $(this).parents(".ncsc-province-tab").find(".check_num").text('');
                }
            })
            //单选
            $("input.J_City").click(function(){
               var num = 0;
               var j=0;
                	$(this).parents(".ncsc-citys-sub").find("span.areas").each(function(){
                		j++;
                		if($(this).find("input.J_City").is(":checked")){
                			num++;
                		}
                	})
                	if(num==j){
                		$(this).parents(".ncsc-province-tab").find("input.J_Province").prop('checked',true);
                	}else{
                		$(this).parents(".ncsc-province-tab").find("input.J_Province").prop('checked',false);
                	}
                	if(num>0){
                		$(this).parents(".ncsc-province-tab").find(".check_num").text('('+num+')');
                	}else{
                		$(this).parents(".ncsc-province-tab").find(".check_num").text('');
                	}

            })

        },
        yes:function(index){
        	var item_id = new Array();
        	var item_name = new Array();
        	var tt = $("#J_CityList").children("li");

    		tt.each(function(){
    			var flag = true
    			tt_val = $(this).find(".ncsc-province");
    			tt_val.each(function(){
    				if($(this).find("input.J_Province").is(":checked")==false){
    					flag = false;
    				}
    			})
    			if(flag){
    				item_id.push($(this).find("input[name=group_name]").val());
    			}
    		})
        	$("input.J_Province").each(function(){

        		if($(this).is(":checked")){
        			item_id.push($(this).next().val());
    				item_name.push($(this).next().next().val());
    				$(this).parents(".ncsc-province").find(".ncsc-citys-sub").find("span.areas").each(function(){
    					item_id.push($(this).find("input[name=city_id]").val());
    				})
        		}else{
        			$(this).parents("span.ncsc-province-tab").find(".ncsc-citys-sub").find("input[type=checkbox]").each(function(){
        				if($(this).is(":checked")){
        					item_id.push($(this).next().val());
            				item_name.push($(this).next().next().val());
        				}
        			})
        		}
        	})
        	if(item_id.length>0){
        		id = item_id.join(',');
            	name = item_name.join(',');
            	obj.parents("tr").find("td.cell-area").find("p").text(name);
            	obj.parents("tr").find("td.cell-area").find("input.select_area_name").val(name);
            	obj.parents("tr").find("td.cell-area").find("input.select_area_id").val(id);
            	layer.close(index);
            	$('.tbl-attach').find('span[error_type="area"]').hide();
        	}else{
        		layer.msg('请选择至少一个地区');
        		return false;
        	}

        },no:function(){}
    });
}
$(function(){
	$(".select2").select2();
    //为指定地区城市设置运费
    var epa_id_length = $('input.epa_id').size();
    var index_table = 0;
    if(epa_id_length>0){
    	epa_id_length = epa_id_length-1;
    	index_table = $('input.epa_id').eq(epa_id_length).val();
    }
    //console.log(index_table)
    $(".tbl-attach .J_AddRule").click(function(){

    	index_table++;
        var str='<tr class="bd-line text-c">' +
                '<td class="cell-area" style="padding-left:5px">' +
                '<span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1"> ' +
                '<p style="display:inline-block">未添加地区</p> </span><input type="hidden" value="" class="select_area_name" name="area_name['+index_table+']"> <input type="hidden" value="" class="select_area_id" name="area['+index_table+']"> </td>' +
                ' <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="1"  name="first_w['+index_table+']" onblur="valid()" data-field="postage"> </td> ' +
                '<td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="" name="first_f['+index_table+']" onblur="valid()" data-field="postage"> ' +
                '<em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off"  value="1"  name="last_w['+index_table+']" onblur="valid()" data-field="postage"> </td> ' +
                '<td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value=""  name="last_f['+index_table+']" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td> ' +
                '<td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="0"  name="no_fee['+index_table+']" onblur="valid()" data-null="no_fee" data-field="postage"> </td> ' +
                '<td class="nscs-table-handle"> <span> <a class="btn red btn-del btn-grapefruit J_DeleteRule_'+index_table+'" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i>  </a> </span>' +
                ' <span> <a class="btn green btn-bluejeans_'+index_table+'" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i> </a> </span> </td> </tr>'
        $(".ncsc-table-style").append(str);
        //批量操作
       $("a.J_ToggleBatch").show();

        //全选
        $(".J_BatchCheck").click(function(){
            if($(this).is(":checked")){
                $(".area-group .J_BatchField").prop('checked',true);
            }else{
                $(".area-group .J_BatchField").prop('checked',false);
            }
        })
        //取消全选
        $(".area-group .J_BatchField").click(function(){
            if(!$(this).is(":checked")){
                $(".J_BatchCheck").prop('checked',false);
            }
        })
        //删除
        /*$(".J_DeleteRule_"+index_table).on("click",function(){
        	obj = $(".J_DeleteRule_"+index_table);
        	del_area(obj);
        })
        //编辑
        $(".btn-bluejeans_"+index_table).click(function(){
        	var obj = $(".btn-bluejeans_"+index_table);
        	edit_area(obj);
        })*/
    })
    //批量操作  取消批量
    $("a.J_ToggleBatch").click(function(){
        if($(this).parents(".entity").find('.J_BatchField').eq(0).is(":hidden")){
            $(".batch").show();
            $(".area-group .J_BatchField").show();
            $(this).text("取消批量");
        }else{
            $(".batch").hide();
            $(".area-group .J_BatchField").hide();
            $(this).text("批量操作");
        }
    })
    //批量删除
    $('.J_BatchDel').on("click",function(){
        layer.confirm('<div class="pd-5 text-c"><i class="fa fa-warning c-orange" style="margin-right: 10px;font-size: 30px"></i>确认删除吗?</div>', {
            title:'<b>提示信息</b>',
            btn: ['确定','取消'] //按钮
        });
    })
    //批量设置
    $(".J_BatchSet").on("click",function(){
        layer.open({
            type: 1,
            title: '<b>批量操作</b>',
            skin: 'layui-layer-rim', //加上边框
            btn:["确定","取消"],
            area: ['400px', '150px'], //宽高
            content: '<div class="pd-10 text-c lh-30">运费：<input class="w60 text" type="text" maxlength="6" autocomplete="off" value="0.00" name="express_postage" data-field="postage">' +
            '<em class="add-on"> <i class="fa fa-rmb"></i> </em></div>'
        });
    })
})

$('#submit_tpl').click(function(){
	SpecialMessage = '';
	SpecialMessage += "<span  error_type=\"area\" class=\"msg J_Message\" style=\"display:none\"><i class=\"fa fa-exclamation-circle\"><\/i>指定地区城市为空或指定错误<\/span>\n";
	SpecialMessage += "<span error_type=\"postage\" class=\"msg J_Message\" style=\"display:none\"><i class=\"fa fa-exclamation-circle\"><\/i>运费应输入0.00至999.99的数字<\/span>\n";
	$('.J_SpecialMessage').html(SpecialMessage);
	isSubmit = true;
	//首件跟续件由于有默认值，鼠标离开也有默认值，这里只需判断首费与续费即可

	//首费JS空判断-------------------------------
	//只判断已显示的，即只判断EMS、平邮、快递中已选择的内容
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('.tbl-except').find('input[data-field="postage"]').each(function(){
			if ($(this).val()=='' && ($(this).attr('data-null')!='no_fee')){
				$(this).addClass('input-error');isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="postage"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="postage"]').hide();
		}
	}
	//地区JS空判断-------------------------------
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('div[data-delivery="kd"]').find('input[type="hidden"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error'); isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="area"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="area"]').hide();
		}
	}
	//售卖区域名称校验
	var isCheck = true;
	if ($('#title').val()==''){
		isCheck = false;
		$('p[error_type="title"]').css('display','block');
		$('p[error_type="title_check"]').css('display','none');
	}else{
		var name = $('#title').val();
		var transport_id = $('#transport_id').val();
		$('p[error_type="title"]').css('display','none');
	    $.ajax({
			type: "post",
	        url: "check_express_name",
	        async :false,
	        data: {name:name,transport_id:transport_id},
	        dataType: "json",
	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
	        			$('p[error_type="title_check"]').css('display','none');
	        			isCheck = true;
	        		}else{
	        			$('p[error_type="title_check"]').css('display','');
	        			isCheck = false;
	        		}
	        },
		})

	}
	if(!isCheck){
		isSubmit = false;
	}
	if($("tr.bd-line").size()==0){
		$('.tbl-attach').find('span[error_type="area"]').show();
		isSubmit = false;
	}
	if($("#express_code").val()==''){
		$("#express_code").siblings('span.err').show();
		isSubmit = false;
	}else{
		$("#express_code").siblings('span.err').hide();
	}
	if (isSubmit == true){
		var form_data = $("#tpl_form").serialize();
		$("#submit_tpl").attr("disabled",true);
		$("#submit_tpl").css("background-color","#ccc");
		 $.ajax({
				type: "post",
		        url: "mall_express_area_submit",
		        data: form_data,
		        dataType: "json",
		        beforeSend:function(){
    				layer.msg('数据提交中...',{icon:1});
    			},
		        success: function(data){
		        	$("#submit_tpl").attr("disabled",false);
		        	$("#submit_tpl").css("background-color","#48CFAE");
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
                        window.location.href = 'mall_express_tools';
                        layer.msg(data.msg,{icon:1})
                    }else{
                        layer.msg(data.msg,{icon:2})
                    }
		        }
			})

	}else{
		return false;
	}
})
/*仓库，快递改变判断为空*/
function code_change(code){
	if($(code).val()==''){
		$(code).siblings('span.err').show();
	}else{
		$(code).siblings('span.err').hide();
	}
}
/**/
function check_name(){
	var name = $('#title').val();
	var transport_id = $('#transport_id').val();
	return $.ajax({
		type: "post",
        url: "check_express_name",
        data: {name:name,transport_id:transport_id},
        dataType: "json",
        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
        			$('p[error_type="title"]').css('display','none');
        		    return true;
        		}else{
        			$('p[error_type="title"]').css('display','');
        			return false;
        		}
        },
	})
}

/*配送信息费用不能为空判断*/
function valid(){
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('.tbl-except').find('input[data-field="postage"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error');isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="postage"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="postage"]').hide();
		}
	}
}
/*配送地区不能为空判断*/
function validate(){
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('div[data-delivery="kd"]').find('input[type="hidden"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error'); isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="area"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="area"]').hide();
		}
	}
}

$('#title').on('change',function(){
	if ($(this).val()!=''){
		      $('p[error_type="title"]').css('display','none');
			}
})
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
