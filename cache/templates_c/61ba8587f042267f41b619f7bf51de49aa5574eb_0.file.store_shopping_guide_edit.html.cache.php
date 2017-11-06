<?php
/* Smarty version 3.1.29, created on 2017-06-28 18:13:35
  from "D:\www\yunjuke\application\admin\views\store_shopping_guide_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5953814fe68885_64875868',
  'file_dependency' => 
  array (
    '61ba8587f042267f41b619f7bf51de49aa5574eb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_shopping_guide_edit.html',
      1 => 1497237694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5953814fe68885_64875868 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '37445953814fb7a7d1_03740252';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.add.js"><?php echo '</script'; ?>
>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>导购管理 - 编辑添加导购</h3>
						<h5>平台中的所有导购的管理</h5>
					</div>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					
				</ul>
			</div>
			<form id="add_form" method="post" action="store_guide_add" enctype="multipart/form-data">
			     <input type="hidden" id="spguide_id" name="spg_id" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_id'])) {
echo $_smarty_tpl->tpl_vars['data']->value['spg_id'];
}?>">
			     <?php if (isset($_smarty_tpl->tpl_vars['store_id']->value)) {?><input type="hidden" name="store_id" value="<?php echo $_smarty_tpl->tpl_vars['store_id']->value;?>
"><?php }?>
				<div class="ncap-form-default">
				     <?php if (isset($_smarty_tpl->tpl_vars['store_id']->value)) {?>
                        <dl class="row">
				        <dt class="tit">
                    <label for="class_sort"><em>*</em>所属店铺：</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid" name="spg_store_id">
									<option value="<?php echo $_smarty_tpl->tpl_vars['store_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['store_name']->value;?>
</option>
								</select>
								<span class="err"></span></div>
						</dd>
                    </dl>
				     <?php } else { ?>
					<dl class="row">
				        <dt class="tit">
                    <label for="class_sort"><em>*</em>所属店铺：</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid" name="spg_store_id">
									<option value="">-请选择-</option>
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
									<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_store_id']) && $_smarty_tpl->tpl_vars['data']->value['spg_store_id'] == $_smarty_tpl->tpl_vars['v']->value['store_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
</option>
									<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
								</select>
								<span class="err"></span></div>
						</dd>
                    </dl>
                    <?php }?>
					<dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>名字：</label>
                </dt>
						<dd class="opt">
							<input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_name'])) {
echo $_smarty_tpl->tpl_vars['data']->value['spg_name'];
}?>" name="spg_name" id="class_name" class="input-txt">
							<span class="err"></span>
							<p class="notic">名字不能为空且必须小于(或等于)4个字</p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>呢称：</label>
                </dt>
						<dd class="opt">
							<input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_nike_name'])) {
echo $_smarty_tpl->tpl_vars['data']->value['spg_nike_name'];
}?>" name="spg_nike_name" id="class_nike" class="input-txt">
							<span class="err"></span>
							<p class="notic">呢称不能为空且必须小于(或等于)10个字</p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">性别：</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid" name="spg_sex">
									<option value="1" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_sex']) && $_smarty_tpl->tpl_vars['data']->value['spg_sex'] == 1) {?>selected<?php }?>>-男-</option>
									<option value="2" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_sex']) && $_smarty_tpl->tpl_vars['data']->value['spg_sex'] == 2) {?>selected<?php }?>>-女-</option>
									
								</select>
								<span class="err"></span></div>
							<span class="err"></span>
							
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">生日：</label>
                </dt>
						<dd class="opt">
						<input type="text" id="birth" onclick="laydate()" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['birth'])) {
echo $_smarty_tpl->tpl_vars['data']->value['birth'];
}?>" name="birth" style="background-color: #fff" class="input-txt">
							<!-- <div class="area-region-select">
								<select class="valid" name="birth_y">
									<option value="">-请选择-</option>
								</select>
								<select class="valid" name="birth_m">
									<option value="">-请选择-</option>
									<option value="01">01月</option><option value="02">02月</option><option value="03">03月</option><option value="04">04月</option><option value="05">05月</option><option value="06">06月</option><option value="07">07月</option><option value="08">08月</option><option value="09">09月</option><option value="10">10月</option><option value="11">11月</option><option value="12">12月</option>
								</select>
								<select class="valid" name="birth_d">
									<option value="">-请选择-</option>
									<option value="01">01日</option><option value="02">02日</option><option value="03">03日</option><option value="04">04日</option><option value="05">05日</option><option value="06">06日</option><option value="07">07日</option><option value="08">08日</option><option value="09">09日</option><option value="10">10日</option><option value="11">11日</option><option value="12">12日</option><option value="13">13日</option><option value="14">14日</option><option value="15">15日</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option><option value="20">20日</option><option value="21">21日</option><option value="22">22日</option><option value="23">23日</option><option value="24">24日</option><option value="25">25日</option><option value="26">26日</option><option value="27">27日</option><option value="28">28日</option><option value="29">29日</option><option value="30">30日</option>
								</select>
							 <span class="err"></span></div> -->

							
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>联系电话：</label>
                </dt>
						<dd class="opt">
							<input id="spguide_tel" name="spg_tel" placeholder="登录账号" type="text" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_tel'])) {
echo $_smarty_tpl->tpl_vars['data']->value['spg_tel'];
}?>">
							<span class="err"></span>
							
						</dd>
					</dl>
					<?php if (!isset($_smarty_tpl->tpl_vars['data']->value['password'])) {?>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">登录密码：</label>
                </dt>
						<dd class="opt">
							<input id="class_password" name="class_password" placeholder="若为空则后台随机生成发送到所填联系电话"  type="text" class="input-txt" value="">
							<input id="class_password" name="password"  type="hidden" class="input-txt" value="">
							<span class="err"></span>
							
						</dd>
					</dl>
					<?php }?>
					<dl class="row">
						<dt class="tit">
                         <label for="class_sort">导购角色：</label>
                       </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class=""role_type"" name="role_type">
									<option value="">-请选择-</option>
									<option value="1" <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['role_type']) && $_smarty_tpl->tpl_vars['data']->value['role_type'] == 1) || !isset($_smarty_tpl->tpl_vars['data']->value['role_type'])) {?>selected<?php }?>>店员</option>
									<option value="2" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['role_type']) && $_smarty_tpl->tpl_vars['data']->value['role_type'] == 2) {?>selected<?php }?>>店长</option>
								
								</select>
								<span class="err"></span></div>
						</dd>
					</dl>
					
					<dl class="row">
						<dt class="tit">
                    <label for="">头像：</label>
                </dt>
						<dd class="opt">
							<div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="">
                            <i class="fa fa-picture-o" id="" data-geo="<img src=&quot;<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['head_portrait'])) {
echo base_url();
echo $_smarty_tpl->tpl_vars['data']->value['head_portrait'];
} else {
echo base_url();?>
/application/admin/views/images/default_goods_image.jpg<?php }?>&quot; width=100px height=50px>"></i>
                        </a>
                    </span>
								<span class="type-file-box">
                        <input type="text" name="textfield" id="textfield" class="type-file-text">
                        <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
                        <input class="type-file-file" id="default_goods_image" name="default_goods_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        
                     </span>
							</div>
							
							
							<p class="notic">建议300KB以下的图片(jpg/jpeg/png)</p>
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
	//上传显示
      $("#default_goods_image").change(function () {
          $("#textfield").val($(this).val());
      });
     

   /*验证为正确的电话号码*/
   	  jQuery.validator.addMethod("isMobile", function(value, element) { 
   		  var length = value.length; 
   		  var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/; 
   		  return this.optional(element) || (length == 11 && mobile.test(value)); 
   		}, "请正确填写您的手机号码"); 
   /*验证一个店铺 有一个店长*/
   	  jQuery.validator.addMethod("checkStoreGuide", function(value, element) { 
   		  var store = $('select[name=spg_store_id]').val(); 
   		  var role = value;status = false;
   		  var spg_id = $('input[name=spg_id]').val();
   		  if(role==2&&store){
   			$.ajax({
	            type:"post",
	            url:'store_guide_check',
	            async:false,
	            data:{store_id: store, spg_id: spg_id},
	            dataType: 'json',
	            success: function(data){
					if(data.state=='403'){
						login_ajax('shopadmin');return false;
					}else if(data.state) {
						status = true;
	                }
	            }
	        });
   		  }else{
   			status = true;
   		  }
          if(status=='true'){
        	  return true;
          }else{
        	  return false;
          }
   		}, "该门店已添加店长，请重新选择"); 
	  //验证表单
	  var store_id = "<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_id'])) {
echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];
}?>";
	
	  valid_rule = {
			      spg_store_id : {
				    required : true,
		          },
			      spg_name : {
				    required : true,
				    maxlength : 4,
		          },
		          spg_nike_name : {
		            required : true,
		            maxlength : 10,
		          },
		          spg_tel : {
		            required : true,
		            isMobile :true,
		            remote	: {
                        url :'check_guideTel',
                        type:'post',
                        cache:false,
	                    async:false,
                        data:{
                        	tel : function(){
                                return $('#spguide_tel').val();
                            },
                            id : function(){
                                return $('#spguide_id').val();
                            },
                        }
                    },
		            
		          },
		          role_type : {
		        	  required : true,
		        	  checkStoreGuide : true,
		          },
		          class_password : {
		        	  required : true,
		          }, 
		        };
	  valid_msg = {
			  spg_store_id : {
	              required : '<i class="icon-exclamation-sign">请选择导购所属店铺</i>',
	            },
			  spg_name : {
	              required : '<i class="icon-exclamation-sign">请输入姓名</i>',
	              maxlength : '<i class="icon-exclamation-sign">长度不超过4</i>',
	            },
	            spg_nike_name : {
	              required : '<i class="icon-exclamation-sign">请输入昵称</i>',
	              maxlength : '<i class="icon-exclamation-sign">长度不超过10</i>',
	            },
	            spg_tel : {
	              required : '<i class="icon-exclamation-sign">请输入联系电话</i>',
	              isMobile : '<i class="icon-exclamation-sign">请输入正确格式的电话号码</i>',
	              remote   : '<i class="fa fa-exclamation-circle"></i>该电话所属导购已存在',
	              
	            },
	            role_type : {
	            	required : '<i class="icon-exclamation-sign">请选择导购角色</i>',
	            	checkStoreGuide : '<i class="icon-exclamation-sign">该门店已添加店长，请重新选择</i>',
	            },
	            class_password : {
	            	required : '<i class="icon-exclamation-sign">请输入密码</i>',
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
		  if($("#add_form").valid){
			  var pwd = $('input[name=class_password]').val();
			  if(pwd){
				  $('input[name=password]').val(pwd_addMD5(pwd));
				  $('input[name=class_password]').val('123456');
			  }
			  if($("#add_form").valid){
				  $('#add_form').submit();
			  }
			  
		  }
	  })
  });
  <?php echo '</script'; ?>
>
	</html><?php }
}
