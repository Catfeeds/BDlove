<?php
/* Smarty version 3.1.29, created on 2017-08-08 09:20:11
  from "D:\www\yunjuke\application\admin\views\public_store_shopping_guide_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598911cb182e78_98804322',
  'file_dependency' => 
  array (
    'c4817fe64e187626274c058874db9e0a7e5015fa' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\public_store_shopping_guide_edit.html',
      1 => 1501491119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598911cb182e78_98804322 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '22105598911cae735e1_89862688';
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
				<h3>导购管理 - <?php if (isset($_smarty_tpl->tpl_vars['data']->value['spg_name'])) {?>编辑导购：<?php echo $_smarty_tpl->tpl_vars['data']->value['spg_name'];
} else { ?>添加导购<?php }?></h3>
				<h5><?php if (isset($_smarty_tpl->tpl_vars['role']->value) && $_smarty_tpl->tpl_vars['role']->value == 'w') {?>微商城<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'd') {?>电商<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'g') {?>供应仓库<?php } else { ?>平台<?php }?>中的导购管理</h5>
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
	<form id="add_form" method="post" action="store_guide_add?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>" enctype="multipart/form-data">
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
					<p class="notic">名字不能为空且必须小于(或等于)10个字</p>
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

			<dl class="row">
				<dt class="tit">
					<label for="class_sort"><em>*</em>导购角色：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="role_type" name="role_type" id="role_type">
							<option value="">-请选择-</option>
							<?php if (!empty($_smarty_tpl->tpl_vars['roles']->value)) {?>
							    <?php
$_from = $_smarty_tpl->tpl_vars['roles']->value;
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
?>
							       <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['role_id'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['role_type']) && $_smarty_tpl->tpl_vars['data']->value['role_type'] == $_smarty_tpl->tpl_vars['v']->value['role_id'])) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['role_name'];?>
</option>
							    <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
if ($__foreach_v_1_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_1_saved_key;
}
?>
							<?php }?>

						</select>
						<span class="err"></span></div>
				</dd>
			</dl>

			<?php if (!isset($_smarty_tpl->tpl_vars['data']->value['password'])) {?>
			<dl class="row">
				<dt class="tit">
					<label for="class_sort"><em>*</em>登录密码：</label>
				</dt>
				<dd class="opt">
					<input id="class_password" name="class_password" placeholder="若为空则后台随机生成发送到所填联系电话"  type="password" class="input-txt" value="">
					<input id="class_password" name="password"  type="hidden" class="input-txt" value="">
					<span class="err"></span>
				</dd>
			</dl>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['data']->value['distribution_point'])) {?>
			<dl class="row" id="fenxiao">
				<dt class="tit">
					<label for="class_sort"><em>*</em>分销返点比例：</label>
				</dt>
				<dd class="opt">
					<input id="distribution_point" name="distribution_point" placeholder="兼职导购必填项" type="number" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['distribution_point'])) {
echo $_smarty_tpl->tpl_vars['data']->value['distribution_point'];
}?>">
					<span class="err"></span>
				</dd>
			</dl>
			<?php } else { ?>
			<dl class="row" id="fenxiao" style="display: none">
				<dt class="tit">
					<label for="class_sort"><em>*</em>分销返点比例：</label>
				</dt>
				<dd class="opt">
					<input id="distribution_point" name="distribution_point" placeholder="兼职导购必填项" type="number" class="input-txt" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['distribution_point'])) {
echo $_smarty_tpl->tpl_vars['data']->value['distribution_point'];
}?>">
					<span class="err"></span>
				</dd>
			</dl>
			<?php }?>

			<dl class="row">
				<dt class="tit">
					<label for="">头像：</label>
				</dt>
				<dd class="opt">
					<div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="javascript:void();">
                            <i class="fa fa-picture-o" id="img-data" data-geo="<img src=&quot;<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['head_portrait'])) {
echo base_url();
echo $_smarty_tpl->tpl_vars['data']->value['head_portrait'];?>

                            <?php } else {
echo base_url();?>
/application/admin/views/images/default_goods_image.jpg<?php }?>&quot; width=100px height=50px>"></i>
                        </a>
                    </span>
						<span class="type-file-box">
                        <input type="text" name="textfield" id="textfield" class="type-file-text">
                        <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
                        <input class="type-file-file" id="default_goods_image" name="default_goods_image" id="default_goods_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        
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
        
        $("#role_type").change(function () {
            var role_type=$('#role_type option:selected').val();
            if(role_type!=1){
                $("#fenxiao").hide();
			}else {
                $("#fenxiao").show();
			}
        });


		/*验证为正确的电话号码*/
        jQuery.validator.addMethod("isMobile", function(value, element) {
            var length = value.length;
            var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/;
            return this.optional(element) || (length == 11 && mobile.test(value));
        }, "请正确填写您的手机号码");
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
            },
            role_type : {
                required : true,
            },
            /*class_password : {
                required : true,
            }
			  distribution_point:{
                required : true,
                range: [0.001,0.999],
			}*/
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

            },
            role_type : {
                required : '<i class="icon-exclamation-sign">请选择导购角色</i>',
            },
            /* class_password : {
                required : '<i class="icon-exclamation-sign">请输入密码</i>',
            }
			   distribution_point:{
                required :'<i class="icon-exclamation-sign">请输入分销返点比例</i>' ,
                range: '<i class="icon-exclamation-sign">请填写0.001至0.999之间的小数</i>',
            }*/
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
                    var role_type=$('#role_type option:selected').val();
                    var distribution_point=$("#distribution_point").val();
//                    if(role_type==1){
//                        if(distribution_point==''){
//                            layer.msg('分销返点比例必填');
//                            return false;
//						}else {
//                            if(distribution_point>=1 || distribution_point<=0){
//                                layer.msg('分销返点比例请填写0.01至0.99的小数');
//                                return false;
//							}
//						}
//                    }
                	$.ajax({
            	        type: "post",
            	        dataType: "json",
            	        url: 'check_guideTel',
            	        data: {
            	        	    tel:$('#spguide_tel').val(),
            	        	    id :$('#spguide_id').val()
            	        	    },
            
            	        success: function(data){
            			if(data.state=='403'){
            				login_ajax('shopadmin');
            			}else
            	        	if(data.state){
            	        		layer.msg(data.msg, {icon: 6});
            	        		return false;
            	        	}else{
            	        		 $('#add_form').submit();
            	        	}
            	        	
            	        }
            	    });
                }
            }
        })
    });


    $("#default_goods_image").change(function(){
        var objUrl = getObjectURL(this.files[0]) ;
        console.log("objUrl = "+objUrl) ;
        if (objUrl) {
            $("#img-data").data('geo','<img src="'+objUrl+'" />');
        }
    })

    function getObjectURL(file) {		//建立一個可存取该file的url
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
<?php echo '</script'; ?>
>
</html><?php }
}
