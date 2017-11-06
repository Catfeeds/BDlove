<?php
/* Smarty version 3.1.29, created on 2017-06-06 10:46:13
  from "D:\www\yunjuke\application\pay\views\store_pwd_update.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5936177513ae37_00231045',
  'file_dependency' => 
  array (
    '1a64d1f86b13da0597c0145f33b6bb6b7d3b599f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\store_pwd_update.html',
      1 => 1495588444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/link.html' => 1,
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5936177513ae37_00231045 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2508259361774f2d2e7_80461095';
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>云聚客门店收银系统 | 智慧店铺</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<style>
          a.btn-danger{ background-color: #ed5565 !important;
					    border-color: #ed5565 !important;
					    color: #FFFFFF !important;
             }
          input.form-control{
	          
             }
             #captcha1{background-color:#ccc !important;}
        </style>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/link.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</head>

	<body>
		<div id="wrapper">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>智慧店铺</h2>
					<ol class="breadcrumb">
						<li>
							<a>智慧店铺</a>
						</li>
						<li>
							<a>配置设置</a>
						</li>
						<li class="active">
							<strong>修改密码</strong>
						</li>
					</ol>
				</div>
				<div class="col-lg-2">

				</div>
			</div>
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h5>密码修改</h5>
							</div>
							<div class="ibox-content">
								<form class="form-horizontal" id="pwdform" onsubmit="return false;" method="POST">
                                 <input type="hidden"  name="old_tel" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
">
																			<p>密码很重要，请记住</p>
										<div class="form-group"><label class="col-lg-2 control-label">老手机号</label>
											<div class="col-sm-9 input-group"><input type="text" class="form-control" value="验证码将发送到【<?php echo $_smarty_tpl->tpl_vars['retel']->value;?>
】上" readonly="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">手机号</label>
											<div class="col-sm-9 input-group"><input type="text" class="form-control" placeholder="如不填写则不修改手机号，修改后短信验证码将发送到您修改的手机号上" name="phone"><span class="err"></span></div>
										</div>
																																		<div class="form-group"><label class="col-lg-2 control-label">旧密码</label>
													<div class="col-sm-9 input-group"><input type="password" class="form-control" placeholder="旧密码" name="oldpwd"><span class="err"></span> <span class="help-block m-b-none"></span>
													</div>
												</div>
												<div class="form-group"><label class="col-lg-2 control-label">新密码</label>
													<div class="col-sm-9 input-group"><input type="password" class="form-control" placeholder="新密码" name="newpwd"><span class="err"></span></div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">确认新密码</label>
													<div class="col-sm-9 input-group"><input type="password" class="form-control" placeholder="再输入一次新密码" name="new2pwd"><span class="err"></span></div>
												</div>
																									<div class="form-group">
														<label class="col-lg-2 control-label">验证码</label>
														<div class="col-sm-9 input-group">
															<input type="text" class="form-control" placeholder="输入您获取的短信验证码" name="code">
															<input type="hidden" value="-1" id="codetime">
															<a class="btn-danger input-group-addon" id="captcha">获取验证码</a>
															<span class="input-group-addon" style="display:none;" id="captcha1"></span>
															<span class="err"></span>
														</div>
													</div>
																										<div class="form-group">
														<div class="col-lg-offset-2 col-lg-10">
															<button type="submit" class="btn btn-sm btn-primary"> 修 改 </button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.add.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/common/jquery.validation.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 language="JavaScript" type="text/javascript">
			$(document).ready(function() {
				//计时器
				var timeIndex = 0;
				function setTime(){
					show = 120-timeIndex;
					$("#captcha1").text(show);
					if(timeIndex==120){
						$('#captcha').show();
						$('#captcha1').hide();
					}
					timeIndex++;
				}
				$('#captcha').click(function(){
					$(this).hide();
					$('#captcha1').show();
					$.ajax({
			            type:"post",
			            url:'send_captcha',
			            dataType: 'json',
			            success: function(data){
			            	if(data.state){
			            		setTime();
								times = setInterval(setTime, 1000);    //每隔1秒执行函数
			            	}else{
			            		$('#captcha').show();
								$('#captcha1').hide();
			            		swal("", data.msg, "error");return false;
			            	}	
			            }
			        })
					
					
				})
				/*验证为正确的电话号码*/
			   	  jQuery.validator.addMethod("isMobile", function(value, element) { 
			   		  var length = value.length; 
			   		  var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/; 
			   		  return this.optional(element) || (length == 11 && mobile.test(value)); 
			   		}, "请正确填写您的手机号码");
			   	jQuery.validator.addMethod("checkPwd", function(value, element) { 
			   		 
			   		$.ajax({
			            type:"post",
			            url:'checkPwd',
			            async:false,
			            data:{pwd: pwd_addMD5(value)},
			            dataType: 'json',
			            success: function(data){
							if(data.state=='403'){
								//login_ajax('shopadmin');return false;
							}else if(data.state) {
								status = true;
			                }else{
			                	status = false;
			                }
			            }
				        });
				   		if(status=='true'){
				   			return true;
				   		}else{
				   			return false;
				   		}
			   		}); 
			   	  jQuery.validator.addMethod("checkOld", function(value, element) { 
			   		 
			   		$.ajax({
			            type:"post",
			            url:'checkOld',
			            async:false,
			            data:{pwd: pwd_addMD5(value)},
			            dataType: 'json',
			            success: function(data){
							if(data.state=='403'){
								//login_ajax('shopadmin');return false;
							}else if(data.state) {
								status = true;
			                }else{
			                	status = false;
			                }
			            }
				        });
				   		if(status=='true'){
				   			return true;
				   		}else{
				   			return false;
				   		}
			   		}); 
			   	  jQuery.validator.addMethod("checkSame", function(value, element) { 
			   		  pwd = value;
			   		  pwd2 = $('input[name=newpwd]').val();
			   		  if(pwd==pwd2){
			   			 return true;
			   		  }else{
			   			 return false;
			   		  }
			   		}); 
				valid_rule = {
						phone : {
							isMobile : true,
				          },
				          oldpwd : {
				        	  required : true,
				        	  checkPwd : true,
				          },
				          newpwd : {
				        	  required : true,
				        	  minlength:6,
				        	  checkOld : true,
				          },
				          new2pwd : {
				        	  required : true,
				        	  checkSame:true
				          },
				          code : {
				        	  required : true,
				          },
				        };
			  valid_msg = {
					  phone : {
						  isMobile : '<i class="icon-exclamation-sign">请输入正确的手机号码</i>',
			            },
			            oldpwd : {
			              required : '<i class="icon-exclamation-sign">请输入旧密码</i>',
			              checkPwd : '<i class="icon-exclamation-sign">密码不正确</i>',
			            },
			            newpwd : {
			            	required : '<i class="icon-exclamation-sign">请输入新密码</i>',
			            	minlength : '<i class="icon-exclamation-sign">密码不能小于6位</i>',
			            	checkOld : '<i class="icon-exclamation-sign">新密码不能与旧密码相同</i>',
			            },
			            new2pwd : {
			            	required : '<i class="icon-exclamation-sign">请再次输入新密码</i>',
			            	checkSame : '<i class="icon-exclamation-sign">两次输入密码不同</i>',
			            },
			            code : {
			            	required : '<i class="icon-exclamation-sign">请输入验证码</i>',
			            },
			          };
			
		     $("#pwdform").validate({
		      errorPlacement: function(error, element){
		        var error_td = element.parents('div.form-group').find('span.err');
		        error_td.append(error);
		      },
		      rules : valid_rule,
		      messages : valid_msg
		    });
		     $('button[type=submit]').click(function(){
		    	 //console.log($("#pwdform").valid())
		    	 var obj = $(this);
		    	 if($("#pwdform").valid()){
		    		 tel = $('input[name=phone]').val();
		    		 pwd = $('input[name=newpwd]').val();
		    		 code = $('input[name=code]').val();
		    		 $(this).attr('disabled',true)
		    		 $.ajax({
				            type:"post",
				            url:'modifyPwd',
				            data:{pwd: pwd_addMD5(pwd),tel:tel,code:code},
				            dataType: 'json',
				            success: function(data){
				            	obj.attr('disabled',false)
								if(data.state=='403'){
									//login_ajax('shopadmin');return false;
								}else if(data.state) {
									window.location.href="<?php echo base_url('pay.php/index/login_out');?>
";//刷新当前页面.
				                }else{
				                	swal("修改密码", data.msg, "error");return false;
				                }
				            }
					        });
		    	 }
		     });
          })
		     
	  <?php echo '</script'; ?>
>

</body>
</html><?php }
}
