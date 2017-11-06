<?php
/* Smarty version 3.1.29, created on 2017-08-12 09:19:46
  from "D:\www\yunjuke\application\pay\views\welcome.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598e57b2336a12_53342637',
  'file_dependency' => 
  array (
    '3602332279a1598e271de0f27bb9199b4c5fa078' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\welcome.html',
      1 => 1501490650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_598e57b2336a12_53342637 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13772598e57b22252d7_96127773';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/style.css" />
<link href="<?php echo PLUGIN;?>
plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
	.show_iframe{ position:absolute; top:0; right:0; left:0; bottom:0}
@media (max-width: 767px) {
	.show_iframe{-webkit-overflow-scrolling: touch;overflow-y: scroll}
}

	.br,.br-c{
		border-right: 1px solid #eee;
	}
		@media screen and (max-width: 992px) {
    .br-v{
		border-right: 1px solid #eee;
	}
	.br-c{
		border-right: none;
	}
	}
	.clear{
		clear: both;
	}
	/*改写hui中的panel样式*/
	
	.panel{
		border: 1px solid #efefef;
	}
	.panel-header{
		border-bottom: none;
		height: 30px;
		line-height: 30px;
		background: #f2f3f3;
	}
	.row .panel-header{
		border-bottom: none;
		text-align: center;
		height: 61px;
		line-height: 61px;
	}
	.row .panel-body{
		text-align: center;
		height: 40px;
		line-height: 40px;
	}
	.panel-body p{
		color: #888888;
	}
	.num{
		color: #333;
		font-size: 21px;
	}
	.cl-g{
		color: #999;
	}
	


</style>

<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<div class="panel panel-default">
		<div class="panel-header"><i class="Hui-iconfont mr-5 f-12">&#xe61c;</i>今日指标</div>
		<div class="panel-body" style="padding: 40px 20px;">
			<div class="row">
				<div class="col-md-2 col-xs-4">
					<div class="panel panel-danger">
						<div class="panel-header" style="background: #f44336;">0</div>
						<div class="panel-body">销售额<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
				<div class="col-md-2 col-xs-4">
					<div class="panel panel-warning">
						<div class="panel-header">0</div>
						<div class="panel-body">订单数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
				<div class="col-md-2  col-xs-4">
					<div class="panel panel-success">
						<div class="panel-header">0</div>
						<div class="panel-body" style="padding: 15px 0;">关注并绑定会员<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
				<div class="col-md-2  col-xs-4">
					<div class="panel panel-primary">
						<div class="panel-header">0</div>
						<div class="panel-body">待处理订单<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
				<div class="col-md-2  col-xs-4">
					<div class="panel panel-danger">
						<div class="panel-header" style="background: #972cb0;">0</div>
						<div class="panel-body">购买会员数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
				<div class="col-md-2  col-xs-4">
					<div class="panel panel-danger">
						<div class="panel-header" style="background: #0aa89e;">0</div>
						<div class="panel-body"  style="padding: 15px 0;">销售商品件数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="panel panel-default mt-20">
		<div class="panel-header"><i class="Hui-iconfont mr-5 f-12">&#xe61c;</i>累计指标</div>
		<div class="panel-body" style="padding: 30px 0px 45px 0px;">
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">4083.4</span>元<br>总销售额<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">112</span><br>总订单数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204/130/128</span><br>关注/绑定/关注并绑定会员<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">75</span><br>总购买会员数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">150</span>件<br>总销售商品件数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204</span><br>总商品数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">7</span><br>总门店数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">14</span><br>总导购数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="panel panel-default mt-20">
		<div class="panel-header"><i class="Hui-iconfont mr-5 f-12">&#xe61c;</i>累计指标</div>
		<div class="panel-body" style="padding: 30px 0px 45px 0px;">
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">4083.4</span>元<br>总销售额<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">112</span><br>总订单数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204/130/128</span><br>关注/绑定/关注并绑定会员<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">75</span><br>总购买会员数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">150</span>件<br>总销售商品件数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204</span><br>总商品数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">7</span><br>总门店数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">14</span><br>总导购数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="panel panel-default mt-20">
		<div class="panel-header">
			<i class="Hui-iconfont mr-5 f-12">&#xe61c;</i>核心指标
			<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
			-
			<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
			<button name="" id="" class="btn btn-primary" type="submit">搜索</button>
		</div>
		<div class="panel-body" style="padding: 30px 0px 45px 0px;">
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">4083.4</span>元<br>销售额<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">112</span><br>订单数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204/130/128</span><br>关注/绑定/关注并绑定会员<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">75</span><br>购买会员数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">150</span>件<br>销售商品件数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-c mt-25">
				<p><span class="num">204</span><br>动销商品数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br mt-25">
				<p><span class="num">7</span><br>动销门店数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="col-md-3 col-xs-4 text-c br-v mt-25">
				<p><span class="num">14</span><br>动销导购数<i class="Hui-iconfont ml-5 cl-g" data-toggle="tooltip" data-placement="bottom" title="提示说明">&#xe633;</i></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/datatables/1.10.0/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
