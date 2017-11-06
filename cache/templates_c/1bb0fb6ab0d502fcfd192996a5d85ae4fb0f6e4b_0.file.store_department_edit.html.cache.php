<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:20:17
  from "D:\www\yunjuke\application\admin\views\store_department_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801da128ca63_12906479',
  'file_dependency' => 
  array (
    '1bb0fb6ab0d502fcfd192996a5d85ae4fb0f6e4b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_department_edit.html',
      1 => 1501568407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801da128ca63_12906479 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1420259801da10ac271_69832989';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- <link href="<?php echo PLUGIN;?>
plugins/muitipleSelect/sumoselect.css" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/muitipleSelect/jquery.sumoselect.min.js"><?php echo '</script'; ?>
> -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
plugins/select2/css/select2.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.add.js"><?php echo '</script'; ?>
>
<style>
	#allmap{width: 300px;height: 300px;}
    .select2{width:auto !important;min-width:100px;}
    #store-list{width:60%;}
    #store-list label{float:left;margin-left:4px;width:110px;}
</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>集合店管理 - 编辑添加集合店</h3>
						<h5></h5>
					</div>
				</div>
			</div>
			<form id="add_form" method="post" action="depart_add" >
			     <input type="hidden" name="depart_id" id="depart_id" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['dpms_id'])) {
echo $_smarty_tpl->tpl_vars['data']->value['dpms_id'];
}?>">
				<div class="ncap-form-default">
					<dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>集合店名称</label>
                </dt>
						<dd class="opt">
							<input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['dpms_name'])) {
echo $_smarty_tpl->tpl_vars['data']->value['dpms_name'];
}?>" name="class_name" id="class_name" class="input-txt">
							<span class="err"></span>
							<p class="notic">名称不能为空且长度不能超过10</p>
						</dd>
					</dl>
					<?php if (!isset($_smarty_tpl->tpl_vars['data']->value)) {?>
					<!-- <dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>登录密码</label>
                </dt>
						<dd class="opt">
							<input id="class_pwd" name="class_pwd" type="text" class="input-txt" value="">
							<input id="pwd" name="pwd" type="hidden" class="input-txt" value="">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl> -->
					<?php }?>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>联系电话</label>
                </dt>
						<dd class="opt">
							<input id="class_mobile" name="class_mobile" type="text" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['dpms_contact_tel'])) {
echo $_smarty_tpl->tpl_vars['data']->value['dpms_contact_tel'];
}?>">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">联系人</label>
                </dt>
						<dd class="opt">
							<input id="class_contact" name="class_contact" type="text" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['dpms_contact_name'])) {
echo $_smarty_tpl->tpl_vars['data']->value['dpms_contact_name'];
}?>">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">联系地址</label>
                </dt>
						<dd class="opt">
							<input id="class_contact_address" name="class_contact_address" type="text" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['dpms_address'])) {
echo $_smarty_tpl->tpl_vars['data']->value['dpms_address'];
}?>">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">门店选择</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
							    <div id="store-list">
							    <?php
$_from = $_smarty_tpl->tpl_vars['store']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
								<label for="store_<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
">
                                   <input type="checkbox" name="store_id[]" data-brand="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['store']) && in_array($_smarty_tpl->tpl_vars['v']->value['store_id'],$_smarty_tpl->tpl_vars['data']->value['store'])) {?>checked<?php }?> id="store_<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>

                                </label>
                                <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                                </div>
                                <!-- <br>
                                <div style="margin-top:10px;">
                                <input type="checkbox" name="checkAll" value="1" id="checkAll">全选&nbsp;&nbsp;&nbsp;&nbsp;
							    <input type="checkbox" name="checkNo" value="2" id="checkNo">取消
							    </div> -->
								<span class="err"></span>
								<p class="notic"></p>
							</div>
							
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
<?php echo '<script'; ?>
 type="text/javascript">

  $(document).ready(function(){
	  //多炫
	  /* window.searchSelAll = $('.search-box-sel-all').SumoSelect({ 
            csvDispCount: 3,
            selectAll:true,
            search: true,
            searchText:'请选择.',
            okCancelInMulti:true ,
            floatWidth: 50,
        }); */
        $(".select2").select2();
        $('#store-list').find('input[type=checkbox]').click(function(){
        	brand = $(this).attr('data-brand');
        	if(brand){
        		if($(this).is(':checked')){
        			var brand_arr = [];
        			$(this).attr('checked',false);
        			$('#store-list').find('input[type=checkbox]').each(function(){
        				if($(this).is(':checked')){
        					brand_arr.push($(this).attr('data-brand'));
        				}
        			})
        			brand_arr_str = brand_arr.join(',');
        			brand_arr_str = ","+brand_arr_str+",";
        			brand_str = brand.split(',');
        			var is_check = true;
        			for (i=0;i<brand_str.length ;i++ ) 
        			{ 
        				var check_str = ","+brand_str[i]+",";
        			    if(brand_arr_str.indexOf(check_str)>=0){
        			    	is_check = false;
        			    }
        			}
        			if(is_check){
        				$(this).attr('checked',true);
        			}
        			
        		}
        	}else{
        		$(this).attr('disabled',true);
        		$(this).attr('checked',false);
        	}
        })
	  $('#submit').click(function(){
		  if($("#add_form").valid()){
			  var pwd = $('input[name=class_pwd]').val();
			  if(pwd){
				  $('input[name=pwd]').val(pwd_addMD5(pwd));
				  $('input[name=class_pwd]').attr('disabled',true);
			  }
			  $('#add_form').submit();
		  }
	  })
	  /*验证编码为数字或字母*/
	   	jQuery.validator.addMethod("numberAndLettersVal",function(value,element){  
	           return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);  
	          },$.validator.format("请输入字母或数字")  
	          ); 
	  /*验证为正确的电话号码*/
   	  jQuery.validator.addMethod("isMobile", function(value, element) { 
   		  var length = value.length; 
   		  var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/; 
   		  return this.optional(element) || (length == 11 && mobile.test(value)); 
   		}, "请正确填写您的手机号码"); 
	  //验证表单
		  valid_rule = {
			        class_name : {
			            required : true,
			            /* numberAndLettersVal : true, */
			            maxlength : 10,
			            remote	: {
	                        url :'check_JHstore',
	                        type:'post',
	                        cache:false,
		                    async:false,
	                        data:{
	                        	name : function(){
	                                return $('#class_name').val();
	                            },
	                        	id : function(){
	                                return $('#depart_id').val();
	                            },
	                        }
	                    },
			          },
			          /* class_pwd : {
			            required : true,
			          }, */
			          class_mobile: {
			            required: true,
			            isMobile:true,
			          },
			        };
		  valid_msg = {
		    	  class_name : {
		              required : '<i class="icon-exclamation-sign">请输入名称</i>',
		              /* numberAndLettersVal : '<i class="icon-exclamation-sign">名称只能为数字或者字母</i>', */
		              maxlength : '<i class="icon-exclamation-sign">长度不超过10</i>',
		              remote : '<i class="icon-exclamation-sign">该名称已存在</i>',
		            },
		            /* class_pwd : {
		              required : '<i class="icon-exclamation-sign">密码必填</i>',
		            }, */
		            class_mobile: {
		              required : '<i class="icon-exclamation-sign">请输入联系电话</i>',
		              isMobile : '<i class="icon-exclamation-sign">请输入正确的手机号码</i>',
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
  });
  <?php echo '</script'; ?>
>
	</html><?php }
}
