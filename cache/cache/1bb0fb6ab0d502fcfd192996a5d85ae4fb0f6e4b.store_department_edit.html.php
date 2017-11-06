<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:20:17
  from "D:\www\yunjuke\application\admin\views\store_department_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801da138a924_00564618',
  'file_dependency' => 
  array (
    '1bb0fb6ab0d502fcfd192996a5d85ae4fb0f6e4b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_department_edit.html',
      1 => 1501568407,
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
function content_59801da138a924_00564618 ($_smarty_tpl) {
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
<!-- <link href="http://[::1]/yunjuke/plugins/muitipleSelect/sumoselect.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/muitipleSelect/jquery.sumoselect.min.js"></script> -->
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.add.js"></script>
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
			     <input type="hidden" name="depart_id" id="depart_id" value="">
				<div class="ncap-form-default">
					<dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>集合店名称</label>
                </dt>
						<dd class="opt">
							<input type="text" value="" name="class_name" id="class_name" class="input-txt">
							<span class="err"></span>
							<p class="notic">名称不能为空且长度不能超过10</p>
						</dd>
					</dl>
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
										<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>联系电话</label>
                </dt>
						<dd class="opt">
							<input id="class_mobile" name="class_mobile" type="text" class="input-txt" value="">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">联系人</label>
                </dt>
						<dd class="opt">
							<input id="class_contact" name="class_contact" type="text" class="input-txt" value="">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">联系地址</label>
                </dt>
						<dd class="opt">
							<input id="class_contact_address" name="class_contact_address" type="text" class="input-txt" value="">
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
							    								<label for="store_61">
                                   <input type="checkbox" name="store_id[]" data-brand="376,377,378" value="61"  id="store_61">BE18品牌童装
                                </label>
                                								<label for="store_65">
                                   <input type="checkbox" name="store_id[]" data-brand="378" value="65"  id="store_65">ABC成都仓
                                </label>
                                								<label for="store_66">
                                   <input type="checkbox" name="store_id[]" data-brand="376,377,378,380,385,386" value="66"  id="store_66">雅鹿 淘宝C店
                                </label>
                                								<label for="store_67">
                                   <input type="checkbox" name="store_id[]" data-brand="386" value="67"  id="store_67">雅鹿成都仓
                                </label>
                                								<label for="store_68">
                                   <input type="checkbox" name="store_id[]" data-brand="376,380" value="68"  id="store_68">BE18供货仓
                                </label>
                                								<label for="store_70">
                                   <input type="checkbox" name="store_id[]" data-brand="376,377,378,380,385,386" value="70"  id="store_70">云聚客拍摄室
                                </label>
                                								<label for="store_73">
                                   <input type="checkbox" name="store_id[]" data-brand="377,380" value="73"  id="store_73">久思微测试仓
                                </label>
                                								<label for="store_74">
                                   <input type="checkbox" name="store_id[]" data-brand="378" value="74"  id="store_74">ABC旗舰店
                                </label>
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
<script type="text/javascript">

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
  </script>
	</html><?php }
}
