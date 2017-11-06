<?php
/* Smarty version 3.1.29, created on 2017-08-14 17:12:40
  from "D:\www\yunjuke\application\pay\views\freetag.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5991698860ce40_11050535',
  'file_dependency' => 
  array (
    '03416e2a44c09d3a331ac9c4a5d8d2d66cd78515' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\freetag.html',
      1 => 1502696936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5991698860ce40_11050535 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '30991599169883f5b46_72034585';
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
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/iconfont.css" />
		<title>自定义标签</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			.recharge-content {
				border: 1px solid #ccc;
				padding: 15px;
			}
			
			.cl-b {
				color: #009dd9;
			}
			
			.cl-g {
				color: #44b549
			}
			
			.cl-o {
				color: #f90;
			}
			
			.first {
				display: block;
				width: 10px;
				cursor: pointer;
			}
			/*展开动画*/
			
			@keyframes out {
				from {
					transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-webkit-transform: rotate(0deg);
				}
				to {
					transform: rotate(90deg);
					-ms-transform: rotate(90deg);
					-webkit-transform: rotate(90deg);
				}
			}
			
			@-webkit-keyframes out {
				from {
					transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-webkit-transform: rotate(0deg);
				}
				to {
					transform: rotate(90deg);
					-ms-transform: rotate(90deg);
					-webkit-transform: rotate(90deg);
				}
			}
			
			.out {
				animation: out 0.5s;
				-webkit-animation: out 0.5s;
				/* Safari 与 Chrome */
				animation-iteration-count: infinite;
			}
			/*收起动画*/
			
			@keyframes in {
				from {
					transform: rotate(90deg);
					-ms-transform: rotate(90deg);
					-webkit-transform: rotate(90deg);
				}
				to {
					transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-webkit-transform: rotate(0deg);
				}
			}
			
			@-webkit-keyframes in {
				from {
					transform: rotate(90deg);
					-ms-transform: rotate(90deg);
					-webkit-transform: rotate(90deg);
				}
				to {
					transform: rotate(0deg);
					-ms-transform: rotate(0deg);
					-webkit-transform: rotate(0deg);
				}
			}
			
			.in {
				animation: in 0.5s;
				-webkit-animation: in 0.5s;
				/* Safari 与 Chrome */
				animation-iteration-count: infinite;
			}
			/*洽客样式*/
			
			.c1 {
				width: 34%;
				display: inline-block;
				padding: 8px;
			}
			
			.c2 {
				width: 17%;
				display: inline-block;
				padding: 8px;
			}
			
			.c3 {
				width: 12%;
				display: inline-block;
				padding: 8px;
			}
			
			.c4 {
				width: 12%;
				display: inline-block;
				padding: 8px;
			}
			
			.c5 {
				width: 13%;
				display: inline-block;
				padding: 8px;
			}
			
			.head {
				border-bottom: 1px solid #e5e5e5;
			}
			
			.second .c1 i {
				margin-left: 20px;
			}
			
			.third .c1 i {
				margin-left: 50px;
			}
			
			.zhuan {
				width: 15px;
				height: 15px;
				border-left: 2px solid #ccc;
				border-bottom: 2px solid #ccc;
				margin-top: 3px;
			}
			
			.first-add,
			.second-add,
			.third-add {
				position: relative;
			}
			
			.first-add:before {
				font-family: Hui-iconfont;
				content: "\e600";
				position: absolute;
				top: 12px;
				left: 50px;
				font-size: 14px;
			}
			
			.second-add:before {
				font-family: Hui-iconfont;
				content: "\e600";
				position: absolute;
				top: 12px;
				left: 98px;
				font-size: 14px;
			}
			
			.third-add:before {
				font-family: Hui-iconfont;
				content: "\e600";
				position: absolute;
				top: 12px;
				left: 128px;
				font-size: 14px;
			}
			
			.input-text {
				padding-left: 10px;
			}
			
			.first-menu>li {
				border-bottom: 1px solid #e5e5e5;
			}
			
			.third,
			.second {
				display: none;
			}
			.btn-danger{
				margin-left: 10px;
				display: none;
			}
			.c2 span{
				margin-left: 7px;
			}
			a:hover{
				color: #333;
			}
		</style>
	</head>

	<body>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span> 自定义标签管理
			<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<div class="page-container">
			<div id="tab_demo" class="HuiTab">
				<div class="tabBar clearfix"><a href=""><span>标签管理</span></a><a href="freetag_manage"><span>标签商品</span></a></div>
				<div class="recharge-content">
					<div class="tabCon">
						<a href="javascript:;" class="btn btn-default allout">全部展开</a>
						<a href="javascript:;" class="btn btn-default allin">全部收起</a>
						<div class="tag-table">
							<div class="head">
								<div class="c1">标签名称</div>
								<div class="c2">移动</div>
								<div class="c3">创建时间</div>
								<div class="c4">标签商品数</div>
								<div class="c5">操作</div>
							</div>
							<ul class="first-menu">
								<li>
									<div class="c1">
										<i class="iconfont first l mt-5">&#xe656;</i>
										<input type="text" class="input-text radius ml-20" value="中童（3-6）" placeholder="" id="" name="" style="width: 160px;"><a class="btn btn-danger radius">保存</a>
									</div>
									<div class="c2">
										<span class="iconfont t1">&#xe60d;</span>
										<span class="iconfont t2">&#xe60e;</span>
										<span class="iconfont t3">&#xe60c;</span>
										<span class="iconfont t4">&#xe60a;</span>
									</div>
									<div class="c3">2017-04-11</div>
									<div class="c4">77</div>
									<div class="c5">
										<a href="">删除</a><a href="" class="ml-10">查看商品</a>
									</div>
									<ul class="second">
										<li>
											<div class="c1">
												<i class="iconfont first l mt-5">&#xe656;</i>
												<div class="l zhuan ml-20"></div>
												<input type="text" class="input-text radius ml-10" value="中童（3-6）" placeholder="" id="" name="" style="width: 160px;position: relative;"><a class="btn btn-danger radius">保存</a>
											</div>
											<div class="c2">
												<span class="iconfont t2">&#xe60e;</span>
												<span class="iconfont t3">&#xe60c;</span>
											</div>
											<div class="c3">2017-04-11</div>
											<div class="c4">77</div>
											<div class="c5">
												<a href="">删除</a><a href="" class="ml-10">查看商品</a>
											</div>
											<ul class="third">
												<li class="add">
													<div class="c1 third-add">
														<div class="l zhuan" style="margin-left: 80px;"></div>
														<input type="text" class="input-text radius ml-10" value="添加三级标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">
													</div>
												</li>
											</ul>
										</li>
										<li>
											<div class="c1">
												<i class="iconfont first l mt-5">&#xe656;</i>
												<div class="l zhuan ml-20"></div>
												<input type="text" class="input-text radius ml-10" value="中童（3-6）" placeholder="" id="" name="" style="width: 160px;"><a class="btn btn-danger radius">保存</a>
											</div>
											<div class="c2">
												<span class="iconfont t2">&#xe60e;</span>
												<span class="iconfont t3">&#xe60c;</span>
											</div>
											<div class="c3">2017-04-11</div>
											<div class="c4">77</div>
											<div class="c5">
												<a href="">删除</a><a href="" class="ml-10">查看商品</a>
											</div>
											<ul class="third">
												<li>
													<div class="c1">
														<div class="l zhuan" style="margin-left: 80px;"></div>
														<input type="text" class="input-text radius ml-10" value="中童（3-6）" placeholder="" id="" name="" style="width: 160px;"><a class="btn btn-danger radius">保存</a>
													</div>
													<div class="c2">
														<span class="iconfont t2">&#xe60e;</span>
														<span class="iconfont t3">&#xe60c;</span>
													</div>
													<div class="c3">2017-04-11</div>
													<div class="c4">77</div>
													<div class="c5">
														<a href="">删除</a><a href="" class="ml-10">查看商品</a>
													</div>
												</li>
												<li class="add">
													<div class="c1 third-add">
														<div class="l zhuan" style="margin-left: 80px;"></div>
														<input type="text" class="input-text radius ml-10" value="添加三级标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">
													</div>
												</li>
											</ul>
										</li>
										<li class="add">
											<div class="c1 second-add">
												<div class="l zhuan ml-50"></div>
												<input type="text" class="input-text radius ml-10" value="添加二级标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">
											</div>
										</li>
									</ul>
								</li>
								<li class="add">
									<div class="c1 first-add">
										<input type="text" class="input-text radius ml-30" value="添加顶层标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="tabCon">数据加载中...</div>
				</div>
			</div>
		</div>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			<!--请在下方写此页面业务相关的脚本-->
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript">
				//	实现tab切换的源码
				jQuery.Huitab = function(tabBar, tabCon, class_name, tabEvent, i) {
					var $tab_menu = $(tabBar);
					// 初始化操作
					$tab_menu.removeClass(class_name);
					$(tabBar).eq(i).addClass(class_name);
					$(tabCon).hide();
					$(tabCon).eq(i).show();

					$tab_menu.bind(tabEvent, function() {
						$tab_menu.removeClass(class_name);
						$(this).addClass(class_name);
						var index = $tab_menu.index(this);
						$(tabCon).hide();
						$(tabCon).eq(index).show()
					})
				}
				$.Huitab("#tab_demo .tabBar span", "#tab_demo .tabCon", "current", "click", "0");

				//	封装点击展开收起动画方法
				function iconchange(obj) {
					$("body").on("click", obj, function() {
						var $this = $(this);
						if($this.css("transform") == "matrix(6.12323e-17, 1, -1, 6.12323e-17, 0, 0)") {
							$(this).addClass("in");
							setTimeout(function() {
								$this.removeClass("in");
								$this.css("-webkit-transform", "rotate(0deg)")
							}, 450)

						} else {
							$this.addClass("out");
							setTimeout(function() {
								$this.removeClass("out");
								$this.css("-webkit-transform", "rotate(90deg)")
							}, 450)
						}
						console.log($this.css("transform"))
					})
				}

				iconchange(".first");

				//	展开收起js方法
				$("body").on("click", ".first-menu li .c1 i", function() {
					$(this).parent().parent().find(".second").slideToggle();
				})
				$("body").on("click", ".second li .c1 i", function() {
					$(this).parent().parent().find(".third").slideToggle();
				})

				//	添加顶层标签
				$("body").on("click", ".first-add", function() {
					$(this).parent().before('<li>' +
						'<div class="c1">' +
						'<i class="iconfont first l mt-5">&#xe656;</i>' +
						'<input type="text" class="input-text radius ml-20" value="" placeholder="" id="" name="" style="width: 160px;">' +
						'<a class="btn btn-danger radius">保存</a>'+
						'</div>' +
						'<div class="c2 ml-5"">\n' +
						'<span class="iconfont t1">&#xe60d;</span>\n' +
						'<span class="iconfont t2">&#xe60e;</span>\n' +
						'<span class="iconfont t3">&#xe60c;</span>\n' +
						'<span class="iconfont t4">&#xe60a;</span>\n' +
						'</div>' +
						'<div class="c3 ml-5">2017-04-11</div>' +
						'<div class="c4 ml-5">77</div>' +
						'<div class="c5"><a href="">删除</a><a href="" class="ml-10">查看商品</a></div>' +
						'<ul class="second">' +
						'<li class="add">' +
						'<div class="c1 second-add">' +
						'<div class="l zhuan ml-50"></div>' +
						'<input type="text" class="input-text radius ml-10" value="添加二级标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">' +
						'</div>' +
						'</li>' +
						'</ul>' +
						'</li>')
				})

				//	添加二级标签
				$("body").on("click", ".second-add", function() {
					$(this).parent().before(
						'<li>' +
						'<div class="c1">' +
						'<i class="iconfont first l mt-5">&#xe656;</i>' +
						'<div class="l zhuan ml-20"></div>' +
						'<input type="text" class="input-text radius ml-10" value="" placeholder="" id="" name="" style="width: 160px;">' +
						'<a class="btn btn-danger radius">保存</a>'+
						'</div>' +
						'<div class="c2 ml-5"">\n' +
						'<span class="iconfont t2">&#xe60e;</span>\n' +
						'<span class="iconfont t3">&#xe60c;</span>\n' +
						'</div>' +
						'<div class="c3 ml-5">2017-04-11</div>' +
						'<div class="c4 ml-5">77</div>' +
						'<div class="c5"><a href="">删除</a><a href="" class="ml-10">查看商品</a></div>' +
						'<ul class="third">' +
						'<li class="add">' +
						'<div class="c1 third-add">' +
						'<div class="l zhuan" style="margin-left: 80px;"></div>' +
						'<input type="text" class="input-text radius ml-10" value="添加三级标签" placeholder="add-second" id="" name="" style="width: 160px;padding-left: 30px;">' +
						'</div>' +
						'</li>' +
						'</ul>' +
						'</li>'
					)
				})

				//	添加三级标签
				$("body").on("click", ".third-add", function() {
					$(this).parent().before(
						'<li>' +
						'<div class="c1">' +
						'<div class="l zhuan" style="margin-left: 80px;"></div>' +
						'<input type="text" class="input-text radius ml-10" value="" placeholder="" id="" name="" style="width: 160px;">' +
						'<a class="btn btn-danger radius">保存</a>'+
						'</div>' +
						'<div class="c2 ml-5"">\n' +
						'<span class="iconfont t3">&#xe60e;</span>\n' +
						'<span class="iconfont t4">&#xe60c;</span>\n' +
						'</div>' +
						'<div class="c3 ml-5">2017-04-11</div>' +
						'<div class="c4 ml-5">77</div>' +
						'<div class="c5"><a href="">删除</a><a href="" class="ml-10">查看商品</a></div>' +
						'</li>'
					)
				})
				
//				改变分类名称显示保存按钮
				$("body").on('input propertychange','.c1', function() {
				    $(this).children(".btn-danger").show();
				});
				
//				上下移动位置
				$("body").on("click",".t2",function(){
					var $befor = $(this).parent().parent().prev();
					$befor.insertAfter($(this).parent().parent());
				})
				$("body").on("click",".t3",function(){
					var $after = $(this).parent().parent().next();
					if(!$after.hasClass("add")){
						$(this).parent().parent().insertAfter($after);
					}
				})
				$("body").on("click",".t1",function(){
					var $first = $(this).parent().parent().parent().children("li:first-child");
					$(this).parent().parent().insertBefore($first)
				})
				$("body").on("click",".t4",function(){
					var $last = $(this).parent().parent().parent().children("li:last-child").prev();
					$(this).parent().parent().insertAfter($last)
				})
				
				$(".allout").click(function(){
					$(".first-menu li .second").show();
					$(".first-menu li .second li .third").show();
				})
				
				$(".allin").click(function(){
					$(".first-menu li .second").hide();
					$(".first-menu li .second li .third").hide();
				})
				
				
			<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
