<?php
/* Smarty version 3.1.29, created on 2017-07-06 10:57:40
  from "D:\www\yunjuke\application\vmall\views\evaluate_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595da724ec9c22_13908918',
  'file_dependency' => 
  array (
    '317540beb6eb26462ed61a3cab82f2c7af840ed7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\evaluate_list.html',
      1 => 1499309745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595da724ec9c22_13908918 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7651595da724d049c4_61464733';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>评价列表</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/example.css">
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/example.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/weui.min.js"><?php echo '</script'; ?>
>


</head>
<style>
	.clear{
		clear: both;
	}
    .evalstar{
		width: 190px;
	}
	.evalstar li{
		float:left;
		margin-left: 5px;
	}
	.evalstar img{
		width: 15px;
	}
	.small{
		color: #999;
		font-size: 12px;
		margin-left: 5px;
	}
	.small-time{
		color: #999;
		font-size: 12px;
		margin-left: 5px;
		margin-top: -5px;
		float: right;
	}
	.content{
		padding:5px
		font-size: 16px;
	}
	.eval-img-group{
		margin:10px 5px;
		
	}
	.eval-img{
		width: 100px;
		margin-right: 10px;
		float: left;
	}
	.img-r{
		max-width: 100%;
		height: auto;
	}
	.info {
   margin: 10px;
   position  :relative;
   padding: 10px;
   margin-left: 15px;
   margin-right: 15px;
   background :#eee;
   border-radius :4px;
   text-align :center;
   font-size: 14px;
  }
  .nav {
   position   :absolute;
   top    :-8px;
   left    :30px;
   overflow   :hidden;
   width    :13px;
   height   :13px;
   background  :#eee;
  -webkit-transform :rotate(45deg);
  -moz-transform :rotate(45deg);
  -o-transform  :rotate(45deg);
   transform   :rotate(45deg);
  }
  .evaltar-name{
  	float: left;margin:3px 10px 0 5px;
  	font-size: 15px;
  }
  .head-logo{
  	width:35px;margin-right:5px;display:block;margin-top: 8px;
  }
  .pull-left{
  	float: left;
  }
  .pull-right{
  	float: right;
  }
  .eval-total{
  	display: flex;
  	justify-content:space-around;
  	padding: 5px;
  }
  .eval-total a{
  	color: #333;
  }
  .eval-total a p{
  	text-align: center;
  	font-size: 15px;
  }
  .eval-total a p:last-child{
  	font-size: 14px;
  }
  .eval-total .active{
  	color: red;
  }
</style>
<body ontouchstart>
	
	<div class="weui-gallery" id="gallery">
            <span class="weui-gallery__img" id="galleryImg"></span>
            <div class="weui-gallery__opr">
                <a href="javascript:" class="weui-gallery__del">
                    <i class="weui-icon-delete weui-icon_gallery-delete"></i>
                </a>
            </div>
        </div>

	<div class="weui-cells" style="margin-top: 0px;">
		
		<ul class="eval-total">
			<li>
				<a href="javascript:;" class="active">
					<p>全部评价</p>
					<p>1400</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>好评</p>
					<p>1390</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>中评</p>
					<p>26</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>差评</p>
					<p>283</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>有图</p>
					<p>2580</p>
				</a>
			</li>
		</ul>
		
	 <?php
$_from = $_smarty_tpl->tpl_vars['evaluate_info']->value;
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
		<div class="weui-cell">
			<div class="weui-cell__hd" style="align-self:flex-start"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['head_portrait'])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['info']->value['head_portrait'];?>
" alt="" class="head-logo"><?php }?></div>
                <div class="weui-cell__bd">
                    <p><p class="evaltar-name"><?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
</p><br>
                    	<ul class="evalstar">
                    	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['info']->value['evaluation_level']+1 - (1) : 1-($_smarty_tpl->tpl_vars['info']->value['evaluation_level'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
							<li><img src="<?php echo TEMPLE;?>
images/evalstar2.png" alt="1"></li>
						<?php }
}
?>

					</ul>
                   	</p>
                   	<p class="small-time"><?php echo date("Y.m.d",$_smarty_tpl->tpl_vars['info']->value['evaluation_time']);?>
</p>
                   	<div class="clear"></div>
			        <p class="content"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['evaluation_content'])) {
echo $_smarty_tpl->tpl_vars['info']->value['evaluation_content'];
}?></p>
			        <div class="eval-img-group">
			             <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['geval_image'])) {?>
			             <?php
$_from = $_smarty_tpl->tpl_vars['info']->value['geval_image'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
				        	<div class="eval-img">
				        		<img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" alt="" class="img-r"/>
				        	</div>
				         <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
if ($__foreach_val_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_1_saved_key;
}
?>
			        	<?php }?>
			        		<div class="clear"></div>
			        </div>
			        
			        <div>
			           <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['geval_explain'])) {?>
						<div class="info">
							<div class="nav"></div>
							<p>掌柜回复：<?php echo $_smarty_tpl->tpl_vars['info']->value['geval_explain'];?>
</p>
						</div>
						<?php }?>
						
					</div>
					<div class="clear"></div>
					<?php if (!empty($_smarty_tpl->tpl_vars['info']->value['add_evaluation_content'])) {?>
					    <br/>
					    <p class="small" style="color:red !important;"><?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
的追评*****</p>	
					    <p class="content"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['add_evaluation_content'])) {
echo $_smarty_tpl->tpl_vars['info']->value['add_evaluation_content'];
}?></p>
				        <div class="eval-img-group">
				             <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['add_geval_image'])) {?>
				             <?php
$_from = $_smarty_tpl->tpl_vars['info']->value['add_geval_image'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_2_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_2_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_2_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
					        	<div class="eval-img">
					        		<img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" alt="" style="width:80px;height: 80px;"/>
					        	</div>
					         <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_local_item;
}
if ($__foreach_val_2_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_item;
}
if ($__foreach_val_2_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_2_saved_key;
}
?>
				        	<?php }?>
				        </div>
				        <div style="clear: both;"></div>
					<?php }?>
					<p class="small pull-left"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['goods_color'])) {
echo $_smarty_tpl->tpl_vars['info']->value['goods_color'];
}?> ; <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['goods_size'])) {
echo $_smarty_tpl->tpl_vars['info']->value['goods_size'];
}?></p>
					<p class="small pull-right">购买日期：2017-06-31</p>
               </div>
		</div>
        
		
		<?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_0_saved_local_item;
}
if ($__foreach_info_0_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_0_saved_item;
}
?>
		
	</div>
	
	
</body>
<?php echo '<script'; ?>
 type="text/javascript">
        var $gallery = $("#gallery"), $galleryImg = $("#galleryImg");
            
        $(".eval-img-group").on("click", ".eval-img", function(){
            $galleryImg.css("background-image", "url("+$(this).find("img").attr("src")+")");
            $gallery.fadeIn(100);
        });
        $gallery.on("click", function(){
            $gallery.fadeOut(100);
        });


<?php echo '</script'; ?>
>
</html>
<?php }
}
