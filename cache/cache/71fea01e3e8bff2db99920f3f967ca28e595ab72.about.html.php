<?php
/* Smarty version 3.1.29, created on 2017-06-12 14:46:56
  from "D:\www\yunjuke\application\index\views\about.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_593e38e0819ad4_15006681',
  'file_dependency' => 
  array (
    '71fea01e3e8bff2db99920f3f967ca28e595ab72' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\about.html',
      1 => 1495764403,
      2 => 'file',
    ),
    'f9e6701cbe258a4938a483bb780b1bfc4e73b6c7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\lib\\header.html',
      1 => 1497249999,
      2 => 'file',
    ),
    '70a4cfe8242f6d817e0e5f78eb2340a5909e7036' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\lib\\footer.html',
      1 => 1495683481,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_593e38e0819ad4_15006681 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>云聚客首页</title>
	<link rel="stylesheet" href="http://[::1]/yunjuke/application/index/views/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/index/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/index/views/css/about.css" />
	<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/index/views/css/case.css" />
	<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/index/views/css/style_new.css" />
	<script type="text/javascript" src="http://[::1]/yunjuke/application/index/views/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/index/views/js/bootstrap.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7MH97gy8hQKq7T4iiQ4GWdzxIudjKGh5"></script>
	<style>
		h4{
			font-size: 17px;
			font-weight: 500;
		}
	</style>
</head>

<body>
<div class="float-top">
	<div style="width: 80%;margin: 0 auto;">
		<img src="http://[::1]/yunjuke/application/index/views/images/logo.png" alt="logo" class="logo pull-left" />
		<div class="login pull-right">
			<a href="http://[::1]/yunjuke/admin.php">后台登录&nbsp;&nbsp;</a><span>|</span>
			<a href="http://[::1]/yunjuke/pay.php">收银登录</a>
		</div>
		<ul class="list-inline top-menu pull-left">
			<li class="">
				<a href="http://[::1]/yunjuke/index.php/Index/index">首页</a>
			</li>
			<li class=" tab-active ">
				<a href="http://[::1]/yunjuke/index.php/Index/programm">软件开发</a>
			</li>
			<li class="">
				<a href="http://[::1]/yunjuke/index.php/Index/allChannel">全渠道运营</a>
			</li>
			<li class="">
				<a href="http://[::1]/yunjuke/index.php/Index/memberService">会员服务</a>
			</li>
			<li class="">
				<a href="http://[::1]/yunjuke/index.php/Index/assUs">加入我们</a>
			</li>
		</ul>
	</div>
</div>

		<div class="title-logo">
			<img src="http://[::1]/yunjuke/application/index/views/images/about-banner.png" alt="title-logo" class="img-responsive" />
		</div>
		<div class="title-menu">
			<ul class="list-inline menu-content">
				<li><a href="javascript:;">关于我们</a></li>
				<li><a href="javascript:;">联系我们</a></li>
				<li><a href="javascript:;" style="border:0px">加入我们</a></li>
			</ul>
		</div>
		<div class="aboutus text-center">
			<h3 class="text-center-title">关于我们</h3>
			<p class="aboutus-text">
				成都云聚客科技有限公司<br>是一家致力于电子商务运作与经营的企业<br>聚客科技整合同类商品，
				通过专业的互联网工具及系列营销<br>手段，打造优秀的购物精选平台，从而激活实体店铺的既有<br>
				资源，带动线下销售
			</p>
			<p class="business">
				业务范围：1，实体店铺引流 2，企业电商运营 3，企业微商运营<br>作为四川地区首家专注于为实体店铺提供引流服务的科技公司
				，秉承"坚守诚信，持续创新，追求卓越，开放共赢"的价值观，力争为客户创造价值。<br>企业使命：聚焦客户痛点，
				提供有效的解决方案<br>企业愿景：打造具有影响力的微信购物精选平台
			</p>
		</div>
		<div class="telus text-center">
			<h3 class="text-center-title">联系我们</h3>
			<div id="map"></div>
			<div class="telus-address">
				<p class="text-left">公司地址：四川省成都市金牛区金泉路5号蓝灵集团501室</p>
				<p class="text-left">联系电话：028-87650517</p>
			</div>
		</div>
		<div class="personrecruit">
			<h3 class="text-center-title text-center" style="color: #333;">人才招聘</h3>
			<div class="personrecruit-img"><img src="http://[::1]/yunjuke/application/index/views/images/recruit-img.png" alt="recruit" class="img-responsive"/></div>
			<div class="recruitlist">
				<div class="job1">
				<a href="javascript:;" class="job">货品编辑</a>
				<div class="job-info">
					<div class="job-info-top">
						<div class="row">
							<div class="col-xs-2"><h4>货品编辑</h4></div>
							<div class="col-xs-10">
								<div class="row" style="margin: 1%;">
									<div class="col-xs-5">职位月薪：2500-5000元/月</div>
									<div class="col-xs-4">工作性质：全职</div>
									<div class="col-xs-3 text-right">最低学历：大专</div>
								</div>
								<div class="row" style="margin: 1%;">
									<div class="col-xs-5">职位类型：网站编辑</div>
									<div class="col-xs-4">工作经验：1-3年</div>
									<div class="col-xs-3 text-right">工作地点：成都</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="job-content row">
						<div class="col-xs-6">
							<h5>岗位职责：</h5>
							<ol style="margin-left: -25px;">
								<li>微信公众平台以及公司后台，商城图片美化和协助商城运营</li>
								<li>负责原创素材采编及整理，负责公司产品及广告的摄影摄像及后期制作</li>
								<li>负责商品上架以及上架前的审核提炼</li>
								<li>协助部门其他美术设计工作</li>
								<li>完成领导交办的其他事物</li>
							</ol>
						</div>
						<div class="col-xs-6">
							<h5>任职要求：</h5>
							<ol style="margin-left: -25px;">
								<li>大专及以上学历，美术，网页设计，计算机等相关专业优先，可接受优秀应届毕业生</li>
								<li>有淘宝美编，电商货品编辑工作经验者优先</li>
								<li>具有良好的美术功底与创意能力</li>
								<li>熟悉Photoshop，Illustrator，flash，CAD，3Dmax等设计软件</li>
								<li>能熟练使用专业摄影摄像器材及修图软件</li>
								<li>有较强的色彩搭配能力及审美观念</li>
								<li>有良好的视觉创意和网页美工制作经验</li>
							</ol>
						</div>
						<div style="clear: both"></div>
					</div>
				</div>
				</div>
				<a href="javascript:;" class="job">PHP开发工程师</a>
				<a href="javascript:;" class="job">前端开发工程师</a>
			</div>
		</div>
		<div class="returntop"><img src="http://[::1]/yunjuke/application/index/views/images/returntop.png" alt="" class="img-responsive"/></div>
<div class="footer">
	<div class="tel pull-left">
		<div class="tel-img pull-left"><img src="http://[::1]/yunjuke/application/index/views/images/tel.png" class="img-responsive"/></div>
		<h1 class="tel-text pull-left">028-87650517</h1>
		<div class="clear"></div>
		<p class="address">
			公司地址：四川省成都市金牛区金泉路5号蓝灵集团501室
		</p>
	</div>
	<div class="QRcode pull-right">
		<div class="QRcode-downloadapp pull-left">
			<div class="QRcode-img"><img src="http://[::1]/yunjuke/application/index/views/images/QRcode.jpg" alt="" class="img-responsive"/></div>
			<h6 class="QRcodename text-center">公众号</h6>
		</div>
		<div class="QRcode-downloadapp pull-left">
			<div class="QRcode-img"><img src="http://[::1]/yunjuke/application/index/views/images/QRcode.jpg" alt="" class="img-responsive"/></div>
			<h6 class="QRcodename text-center">安卓APP下载</h6>
		</div>
		<div class="QRcode-downloadapp pull-left">
			<div class="QRcode-img"><img src="http://[::1]/yunjuke/application/index/views/images/QRcode.jpg" alt="" class="img-responsive"/></div>
			<h6 class="QRcodename text-center">苹果APP下载</h6>
		</div>
	</div>
	<div class="clear"></div>
	<p class="copyright text-center">Copyright　2016.成都云聚客科技有限公司 版权所有|苏ICP备13057902号-6</p>
</div>
	</body>
<script type="text/javascript">
	
	var centercontentwidth = parseInt($("body").css("width").split("px")[0]);
	//$(".title-menu").css("height",centercontentwidth*0.05+"px");
	$(".aboutus").css("height",centercontentwidth*0.37+"px");
	$(".telus").css("height",centercontentwidth*0.48+"px");
	window.onresize = function(){
		var centercontentwidth = parseInt($("body").css("width").split("px")[0]);
		//$(".title-menu").css("height",centercontentwidth*0.05+"px");
		$(".aboutus").css("height",centercontentwidth*0.37+"px");
		$(".telus").css("height",centercontentwidth*0.48+"px");
		var mapheight  =  $("#map").offset().top - $(".telus").offset().top;
		$('.map-float').css("top",mapheight+"px")
	}
	

	// 百度地图API功能
	var map = new BMap.Map("map");
	map.centerAndZoom(new BMap.Point(104.020775,30.721598),18);
	map.enableScrollWheelZoom(true);
	
	// 使用自己的图标定位
	var pt = new BMap.Point(104.020775,30.721598);
	var myIcon = new BMap.Icon("http://[::1]/yunjuke/application/index/views/images/mapicon.png", new BMap.Size(70,180));
	var marker2 = new BMap.Marker(pt,{icon:myIcon});  // 创建标注
	map.addOverlay(marker2);
		
		
//	地图覆盖一层
	var mapheight  =  $("#map").offset().top - $(".telus").offset().top;
	$('.map-float').css("top",mapheight+"px")
	

//	点击职位显示职位详细信息
	var ace=0;
	$(".job:eq(0)").click(function(){
		console.log(ace)
		$(this).hide();
		$(this).next().show();
	})
	$(".job-info").mouseleave(function(){
		ace=1;
	})
	$(".job:eq(0)").mouseenter(function(){
		ace=0;
	})
	$(".job-info").mouseenter(function(){
		ace=0;
	})
	$("body").click(function(){
		if(ace===1){
			$(".job:eq(0)").show();
			$(".job:eq(0)").next().hide();
		}else{
			
		}
	})
	$(".menu-content a").click(function(){
		var index = $(".menu-content a").index($(this));
		var telustop = $(".telus").position().top;
		var abouttop = $(".aboutus").position().top;
		var personrecruittop = $(".personrecruit").position().top;
		switch(index){
			case 0:
			$(document).scrollTop(abouttop-100);
			break;
			case 1:
			$(document).scrollTop(telustop-100);
			break;
			case 2:
			$(document).scrollTop(personrecruittop-100);
			break;
		}
	})
	$(".logo").click(function(){
		alert($(document).scrollTop());
	})
	
	$(".returntop").click(function(){
		$(document).scrollTop(0);
	})
</script>
</html><?php }
}
