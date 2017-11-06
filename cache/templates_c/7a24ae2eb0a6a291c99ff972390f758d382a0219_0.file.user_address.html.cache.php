<?php
/* Smarty version 3.1.29, created on 2017-09-22 15:21:58
  from "D:\www\yunjuke\application\vmall\views\user_address.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c4ba1601f537_02656578',
  'file_dependency' => 
  array (
    '7a24ae2eb0a6a291c99ff972390f758d382a0219' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_address.html',
      1 => 1506064904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59c4ba1601f537_02656578 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1266159c4ba15e6f601_04120104';
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<title>管理收货地址</title>
<style>
.addr-list dl{box-sizing:border-box;padding-left: 15px;}
a.addr{display: block;width: 100%;}
a.addr .item{width: 100%; overflow: hidden;text-overflow:ellipsis;word-break:break-all;}
a.newAddress{line-height: 40px;background: #e04241;display: block;text-align: center;color:#fff;position: fixed;bottom: 0;width:100%;font-size:16px;}
.weui-cell{justify-content: space-between;font-size: 14px;}
.weui-cells:first-child{margin-top:0;}
.weui-cells{margin-top:10px;}
.address:before{border:none!important;}
@font-face {
	font-family: 'iconfont';  /* project id 272444 */
	src: url('//at.alicdn.com/t/font_272444_4qcvt9pf8d0r7ldi.eot');
	src: url('//at.alicdn.com/t/font_272444_4qcvt9pf8d0r7ldi.eot?#iefix') format('embedded-opentype'),
	url('//at.alicdn.com/t/font_272444_4qcvt9pf8d0r7ldi.woff') format('woff'),
	url('//at.alicdn.com/t/font_272444_4qcvt9pf8d0r7ldi.ttf') format('truetype'),
	url('//at.alicdn.com/t/font_272444_4qcvt9pf8d0r7ldi.svg#iconfont') format('svg');
}
.addres-icon{font-family: iconfont;font-size:16px;margin-right:3px;}
.f-15{font-size:15px;}
.address-list{margin-bottom:50px}
label.active{
	color: #e04241;
}
.weui-icon_toast.weui-loading{
	margin-top: 20px!important;
}
.weui-toast{
	width: 80px!important;
	min-height: 80px!important;
	left: 55%;
}
</style>
</head>
	<body>

	<div class="address-list">
		<?php
$_from = $_smarty_tpl->tpl_vars['address']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
				<div class="weui-cells">
					<div class="weui-cell">
						<p><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['rec_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['rec_name'];
}?></p>
						<p><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['tel'])) {
echo $_smarty_tpl->tpl_vars['val']->value['tel'];
}?></p>
					</div>
					<div class="weui-cell address">
						<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['addressPicker'])) {
echo $_smarty_tpl->tpl_vars['val']->value['addressPicker'];
}?>
						<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['address'])) {
echo $_smarty_tpl->tpl_vars['val']->value['address'];
}?>
						
					</div>
					<div class="weui-cell">
						<div>
								<label  class="<?php if ($_smarty_tpl->tpl_vars['val']->value['is_default'] == 1) {?>active<?php }?>" >
									<input onclick="defaultAddrs(this)" type="radio" ua_ids="<?php echo $_smarty_tpl->tpl_vars['val']->value['ua_id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
addres" name="address" <?php if ($_smarty_tpl->tpl_vars['val']->value['is_default'] == 1) {?>checked="checked"<?php }?> class='showLoadingToast'>
									<span style="vertical-align: middle;"><?php if ($_smarty_tpl->tpl_vars['val']->value['is_default'] == 1) {?>默认地址<?php } else { ?>设为默认<?php }?></span><!-- onclick="updateAddrs(this)" -->
								</label>
						</div>
						<div>
							<span class="edit" style="margin-right: 5px;" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['ua_id'];?>
">
								<span class="addres-icon">&#xe611;</span>
								编辑
							</span>
							<span class="delete" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['ua_id'];?>
" default="<?php echo $_smarty_tpl->tpl_vars['val']->value['is_default'];?>
">
								<span class="addres-icon">&#xe6eb;</span>
								删除
							</span>
						</div>
					</div>
				</div>
		<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
	</div>
	<div class="qk-pro-list">
		<ul class="small-block-grid-2" id="favListItem"><section class="tc"><span class="iconfont">&#xe627;</span><span>还没有收货地址哦</span><div></div></section></ul>
	</div>
	<!--加载提示  -->
	<div id="loadingToast" style="display:none;">
        <div class="weui-mask_transparent"></div>
        <div class="weui-toast">
            <i class="weui-loading weui-icon_toast"></i>   
        </div>
    </div>
	<a class="newAddress bde4">添加新地址</a>
	</body>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		//加载提示
	 	var $loadingToast = $('#loadingToast');
        $('.showLoadingToast').on('click', function(){
            if ($loadingToast.css('display') != 'none') return;

            $loadingToast.fadeIn(100);
            setTimeout(function () {
                $loadingToast.fadeOut(100);
            }, 22000);
        });

		//编辑收货地址
		$(".edit").on("click",function(){
			var id = $(this).attr("name");
			//console.log(id);return;
			location.href="user_address_add?op=edit&id="+id;
		});
		//添加新地址
		$(".newAddress").on("click",function(){
			location.href="user_address_add?op=add";
		});

		//设置默认地址
		function defaultAddrs(obj){
			var $this = $(obj);
			var id = $(obj).attr("ua_ids");
			//console.log(id);
			$.ajax({
				url : 'set_default_address',
				type : 'POST',
				dataType : 'json',
				data : {ua_id: id}, 
				success : function(msg){
					if(msg.state == true){
						$("label").removeClass('active');
            			$this.parent().addClass('active');
            			$("label span").text("设为默认");
            			$this.next().text("默认地址");
            			$loadingToast.fadeOut(100);
            			//$this.attr("checked","checked");
            			//console.log($("label span").text());
					}else if(msg.state == false){
						alert(msg.msg);
					}
				}
			})		
		}
		
		//删除地址
		$(".delete").click(function(){
			var $this = $(this);
			var id = $(this).attr("name");
			var de = $(this).attr("default");
			//console.log(de);return;
			if(de == 1){
				alert("默认地址不能被删除！");
				return;
			}
			var flag = confirm("确认删除吗？");
			if(flag == true){
				$.ajax({
					type : "POST",
					url : "user_address_delete",
					data :{"ua_id":id},
					dataType : 'json',
					success : function(msg){
						if(msg.state == true){
							alert(msg.msg);
							$this.parents('.weui-cells').remove();
							//console.log($this.parents('.weui-cells'));
							//$(this).parents('.weui-cells').remove();
						}else if(msg.state == false){
							alert(msg.msg);	return;
						}
					}
				});
			} 
		});

	<?php echo '</script'; ?>
>
</html>
<?php }
}
