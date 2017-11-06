<?php
/* Smarty version 3.1.29, created on 2017-08-25 09:11:44
  from "D:\www\yunjuke\application\index\views\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599f7950656c40_84409158',
  'file_dependency' => 
  array (
    '9e9fa0363e6d256f9538a4a2b9fdeccf080c93ee' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\index.html',
      1 => 1503623484,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_599f7950656c40_84409158 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>云聚客首页</title>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/yunjuke/application/index/views//css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/yunjuke/application/index/views//css/index.css"/>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script src="http://127.0.0.1/yunjuke/application/index/views//js/bootstrap.min.js"></script>
		<script src="http://127.0.0.1/yunjuke/application/index/views//js/L_slide.js"></script>
		<style>
			.contain{
				width: 1200px;
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<div class="contain h_100">
			<div class="logo pull-left"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/logo.png"/></div>
			<div class="login pull-right">
				<a href="javascript:;" class="admin">后台登录</a><a href="javascript:;" class="pay" style="padding-right: 0;">商家登录</a>
			</div>
			<div class="search pull-right">
				<input type="text" class="search-input" placeholder="搜索云聚客"/>
				<span class="glyphicon glyphicon-search search-icon"></span>
			</div>
		</div>
		<div class="head">
			<div class="top-line"></div>
			<div class="contain">
				<ul class="list-inline">
				<li class="active"><a href="index">首页</a></li>
					<li><a href="allChannel">全渠道运营</a></li>
					<li><a href="memberService">会员服务</a></li>
					<li><a href="programm">软件开发</a></li>
					<li><a href="addUs">加入我们</a></li>
				</ul>
			</div>
		</div>
		<!-- 把要轮播的地方写上来 -->
		<div class="wrap af4">
			<ul class="slidebox">
				<li class="figure1">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">
			        			电商微商代运营
			        			<span class="brief-small">Full channel operation</span>
			        		</p>
			        		<p class="brief-content">
			        			<span class="bri-1">线上多屏零售，线下门店管理</span><br>
			        			<span class="bri-2">丰富的功能，满足企业销售管理各种需求。覆盖各层次消费者，帮助企</span><br>
			        			<span class="bri-3">业打开市场。</span>
			        		</p>
			        		<a href="http://127.0.0.1/yunjuke/application/index/views/channel.html" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure1-bag">
		        		<span class="bag-1">微商运营</span>
		        		<span class="bag-2">线下门店</span>
		        		<span class="bag-3">电商运营</span>
		        		<div class="people"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/figure1_3.png"/></div>
		        	</div>
		        </li>
		        <li class="figure2">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">会员服务</p>
			        		<p class="brief-small">Membership service</p>
			        		<p class="brief-content">
			        			精准营销，数据管理，会员培养<br>
			        			管理好会员，复购成为一种常态，与会员高频互动流量难题轻松击破。
			        		</p>
			        		<a href="http://127.0.0.1/yunjuke/application/index/views/member.html" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure2-bag">
		        		<div class="service"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/figure2_2.png" alt="" /></div>
		        	</div>
		        </li>
		        <li class="figure3">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">软件开发</p>
			        		<p class="brief-small">Software development</p>
			        		<p class="brief-content">
			        			为企业打造符合互联网最佳实践的自动化研发流程<br>
			        			让企业可以专注于业务创新，持续推进产品升级，最终实现企业商业价<br>
			        			值的不断提升。
			        		</p>
			        		<a href="http://127.0.0.1/yunjuke/application/index/views/program.html" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure3-bag">
		        		
		        	</div>
		        </li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<!--<div class="banner" id="b04">
		    <ul>
		        <li class="figure1">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">电商微商代运营</p>
			        		<p class="brief-small">Full channel operation</p>
			        		<p class="brief-content">
			        			线上多屏零售，线下门店管理<br>
			        			丰富的功能，满足企业销售管理各种需求。覆盖各层次消费者，帮助企<br>
			        			业打开市场。
			        		</p>
			        		<a href="javascript:;" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure1-bag">
		        		<span class="bag-1">微商运营</span>
		        		<span class="bag-2">线下门店</span>
		        		<span class="bag-3">电商运营</span>
		        	</div>
		        </li>
		        <li class="figure2">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">会员服务</p>
			        		<p class="brief-small">Membership service</p>
			        		<p class="brief-content">
			        			精准营销，数据管理，会员培养<br>
			        			管理好会员，复购成为一种常态，与会员高频互动流量难题轻松击破。
			        		</p>
			        		<a href="javascript:;" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure2-bag">
		        		<div class="service"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/figure2_2.png" alt="" /></div>
		        	</div>
		        </li>
		        <li class="figure3">
		        	<div class="contain">
			        	<div class="brief">
			        		<p class="brief-title">软件开发</p>
			        		<p class="brief-small">Software development</p>
			        		<p class="brief-content">
			        			为企业打造符合互联网最佳实践的自动化研发流程<br>
			        			让企业可以专注于业务创新，持续推进产品升级，最终实现企业商业价<br>
			        			值的不断提升。
			        		</p>
			        		<a href="javascript:;" class="btn-look">查看详情</a>
			        	</div>
			        </div>
		        	<div class="figure3-bag">
		        		
		        	</div>
		        </li>
		        
		    </ul>-->
		    <!--左右切换箭头-->
		    <!--<a href="javascript:void(0);" class="unslider-arrow04 prev"><img class="arrow" id="al" src="arrowl.png" alt="prev" width="20" height="35"></a>
		    <a href="javascript:void(0);" class="unslider-arrow04 next"><img class="arrow" id="ar" src="arrowr.png" alt="next" width="20" height="37"></a>-->
		<!--</div>-->
		<div class="contain">
			<p class="business-title">业务范畴</p>
			<p class="business-content">
				作为四川地区首家专注于实体店铺提供引流服务的科技公司，秉承"坚守诚信，持续创新，追求卓越，开放共赢"的价值观，力争为客户创造价值。<br>
				1，实体店铺引流 2，企业电商运营 3，企业微商城运营<br>
				聚焦客户的痛点，提供有效的解决方案
			</p>
		</div>
		<div class="contain" style="margin-top: 70px;position: relative;">
			<div class="action-topimg">实时活动</div>
			<div class="action">
				<div class="action-banner">
					<div class="new-img"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/news.png" alt="" /></div>
					<p class="action-title">【行业动态】企业应用变革 基础产品交流会</p>
					<a href="javascript:;" class="more">查看更多<span style="padding: 0 2px;">></span>></a>
				</div>
				<p class="action-text mt-20">【行业动态】电商网站搭建实践技巧</p>
				<p class="action-text">【行业动态】云计算时代企业IT解决方案解析</p>
			</div>
			<div class="action">
				<div class="action-banner">
					<div class="new-img"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/custom.png" alt=""/></div>
					<p class="action-title">【商户活动】电商网站搭建实践技巧</p>
					<a href="javascript:;" class="more">查看更多<span style="padding: 0 2px;">></span>></a>
				</div>
				<p class="action-text mt-20">【商户活动】云计算时代企业IT解决方案解析</p>
				<p class="action-text">【商户活动】企业应用变革 基础产品交流会</p>
			</div>
			<div class="action" style="margin-right: 0;">
				<div class="action-banner">
					<div class="new-img"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/skill.png" alt=""/></div>
					<p class="action-title">【运营技巧】云计算时代企业IT解决方案解析</p>
					<a href="javascript:;" class="more">查看更多<span style="padding: 0 2px;">></span>></a>
				</div>
				<p class="action-text mt-20">【运营技巧】企业应用变革 基础产品交流会</p>
				<p class="action-text">【运营技巧】电商网站搭建实践技巧</p>
			</div>
			<div class="clearfix"></div>
		</div>	
		<div class="footer mt-50 pt-40">
			<div class="contain" style="position:relative">
				<!--<div class="ft-logo"><img src="http://127.0.0.1/yunjuke/application/index/views//imges/ft-logo.png" /></div>-->
				<ul class="list-inline ft-content">
					<li><img src="http://127.0.0.1/yunjuke/application/index/views//imges/ft-logo.png" /></li>
					<li>
						<ul class="list-unstyled">
							<li><a href="javascript:;">关于我们</a></li>
							<li><a href="javascript:;">公司简介</a></li>
							<li><a href="javascript:;">业务范畴</a></li>
							<li><a href="javascript:;">文化和价值观</a></li>
							<li><a href="javascript:;">诚信合规</a></li>
							<li><a href="javascript:;">常见问题</a></li>
						</ul>
					</li>
					<li>
						<ul class="list-unstyled">
							<li><a href="javascript:;">产品服务</a></li>
							<li><a href="javascript:;">软件开发</a></li>
							<li><a href="javascript:;">全渠道运营</a></li>
							<li><a href="javascript:;">会员服务</a></li>
						</ul>
					</li>
					<li>
						<ul class="list-unstyled">
							<li><a href="javascript:;">新闻及媒体资源</a></li>
							<li><a href="javascript:;">新闻发布</a></li>
							<li><a href="javascript:;">媒体报道</a></li>
							<li><a href="javascript:;">社交媒体</a></li>
							<li><a href="javascript:;">媒体资料库</a></li>
						</ul>
					</li>
					<li>
						<ul class="list-unstyled">
							<li><a href="javascript:;">三方地址</a></li>
							<li><a href="javascript:;">后台登录</a></li>
							<li><a href="javascript:;">商家登录</a></li>
							<li><a href="javascript:;">公众号二维码</a></li>
							<li><a href="javascript:;">导购APP安卓下载</a></li>
							<li><a href="javascript:;">导购APP苹果下载</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="line"></div>
			<div class="copyright">
				<a href="javascript:;">加入我们</a><a href="javascript:;">免责声明</a><a href="javascript:;">隐私政策</a><a href="javascript:;" style="border: none;">版权公告</a>
				 <span class="glyphicon glyphicon-copyright-mark"></span><span style="padding: 0 5px;">Copyright 2016 成都云聚客科技有限公司 版权所有</span>
			</div>
		</div>
	</body>
	<script>
	//affect:4
	$(".af4").slide({
		affect:4,
		time:3000,
		speed:400,
		dot_text:false,
	});
	
	$(".new-img img").mouseenter(function(){
		$(this).animate({'width':'120%','height':'120%','margin':'-5% -5% -5% -5%'})
	})
	$(".new-img img").mouseout(function(){
		$(this).animate({'width':'100%','height':'100%','margin':'0 0 0 0'})
	})
	$(window).scroll(function() {
	  if($(this).scrollTop()>=100){
	  	$('.head').css({'position':'fixed','top':'0','z-index':'9999999999999'})
	  }else{
	  	$('.head').css('position','relative');
	  }
	});
	</script>
</html>
<?php }
}
