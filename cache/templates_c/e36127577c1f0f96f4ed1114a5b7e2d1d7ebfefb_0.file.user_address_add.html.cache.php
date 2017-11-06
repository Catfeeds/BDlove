<?php
/* Smarty version 3.1.29, created on 2017-09-14 14:08:19
  from "D:\www\yunjuke\application\vmall\views\user_address_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ba1cd39c2658_01524322',
  'file_dependency' => 
  array (
    'e36127577c1f0f96f4ed1114a5b7e2d1d7ebfefb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_address_add.html',
      1 => 1497844903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59ba1cd39c2658_01524322 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1808459ba1cd3817d59_40555165';
?>
<html style="opacity: 1; font-size: 200px;" class="pixel-ratio-1 view6s" lang="zh-cn">
	<head>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/framework7.picker.min.css">
			<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/LArea.css">
			<title>收货人地址</title>
			<style>
				.ma-box {
					top: 20%;
				}
				
				.btn {
					margin-bottom: 5px;
				}
				
				.picker-modal {
					position: fixed;
				}
			</style>
			
	</head>

	<body>

		<section class="addrEdit-list">
			<dl>
				<dt>收货人姓名</dt>
				<dd>
					<div class="input-box"><input name="rec_name" class="mid rName" maxlength="100" notice ="请填写收货人姓名"placeholder="姓名" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['rec_name'])) {
echo $_smarty_tpl->tpl_vars['address']->value['rec_name'];
}?>"></div>
				</dd>
			</dl>
			<dl>
				<dt>联系方式</dt>
				<dd>
					<div class="input-box"><input name="tel" class="mid rMobile" maxlength="11" notice ="请填写联系方式" placeholder="请填写联系方式" type="tel" value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['tel'])) {
echo $_smarty_tpl->tpl_vars['address']->value['tel'];
}?>"></div>
				</dd>
			</dl>
			<dl>
				<dt>省市区</dt>
				<dd>
					<div class="input-box with-go-right">
						<input id="addressPicker" class="mid mobile" placeholder="点击选择省市区" readonly="true"  onfocus=this.blur() type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['addressPicker'])) {
echo $_smarty_tpl->tpl_vars['address']->value['addressPicker'];
}?>" >
		                <input id="addressPickers" type="hidden"  value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['addressPickers'])) {
echo $_smarty_tpl->tpl_vars['address']->value['addressPickers'];
}?>" >
					</div>
				</dd>
			</dl>
			<dl>
				<dt>详细地址</dt>
				<dd>
					<div class="pr10">
						<textarea name="address" id="addrDetailArea" maxlength="200" class="addrDetail" notice ="请填写街道详细地址" placeholder="请填写街道详细地址"><?php if (!empty($_smarty_tpl->tpl_vars['address']->value['address'])) {
echo $_smarty_tpl->tpl_vars['address']->value['address'];
}?></textarea>
					</div>
				</dd>
			</dl>
		</section>
		<section class="selection">
			<div class="item wbox" id="Default">
				<div class="select" style="width:30px;text-align:left;">
					<input id="setDefault" value="0" name="is_default" type="checkbox">
				</div>
				<div class="cont wbox-1"><label for="setDefault">设为默认地址<span class="fn-tip">（下单时自动选择）</span></label></div>
			</div>
		</section>
		<a id="submit" class="btn btn-red center">保存</a>
		<a id="giveup" class="btn center mt10">取消</a>
		<a id="remove" class="btn center mt10" style="display: none;">删除</a>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/LArea.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var provs_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['provs_data'];?>
;
var citys_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['citys_data'];?>
;
var dists_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['dists_data'];?>
;
var area = new LArea();
area.init({
	'trigger': '#addressPicker',
	'valueTo': '#addressPickers',
	'keys': {
		id: 'value',
		name: 'text'
	},
	'type': 2,
	'data': [provs_data, citys_data, dists_data]
});
//设为默认地址
$("#setDefault").on("click",function(){
	if($("#setDefault").val()==1){
		$("#setDefault").val("0");
	}else{
		$("#setDefault").val("1");
	}
});
//取消
$("#giveup").on("click",function(){
	 window.location.href = "javascript:history.go(-1)";
});
//保存
$("#submit").on("click",function(e){
	  e.preventDefault();//防止打开连接
	  for(var num =0; num< $(".input-box input").length;num++){
			if($(".input-box input").eq(num).val() == ""){
				mobileAlert($(".input-box input").eq(num).attr("notice"),2000,"");
				return false;
			}
	  }
	  if($("#addrDetailArea").val()==""){
		  mobileAlert($("#addrDetailArea").attr("notice"),2000,"");
		  return false;
	  }
	  if(!(/^1(3|4|5|7|8)\d{9}$/.test($(".input-box input").eq(1).val()))){ 
		  mobileAlert("手机号码格式有误，请重填",2000,"");
	        return false; 
	    } 
	  var addinfo = new Array($(".input-box input").eq(0).val(),$(".input-box input").eq(1).val(),$(".input-box input").eq(3).val(),$("#addrDetailArea").val(),$("#setDefault").val());
	  var ua_id = <?php echo $_smarty_tpl->tpl_vars['ua_id']->value;?>
;
	  $.ajax({
			type: "post",
	        url: "user_address_add",
	        data: {
	        	data:addinfo,
	        	ua_id:ua_id
	        },
	        dataType: "json",
	        success: function(data){
	        	if(data.state){
	        		mobileAlert(data.msg,3000,"");
					window.location.href = "javascript:history.go(-1)";
	        	}else{
	        		mobileAlert(data.msg,3000,"");
					window.location.href = "javascript:history.go(-1)";
	        	}
	        }
		});
});
	
	
<?php echo '</script'; ?>
>

	</body>
</html><?php }
}
