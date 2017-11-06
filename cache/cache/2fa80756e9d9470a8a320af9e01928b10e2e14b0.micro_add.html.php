<?php
/* Smarty version 3.1.29, created on 2017-09-30 10:56:40
  from "D:\www\yunjuke\application\admin\views\micro_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59cf07e855d6f2_05110366',
  'file_dependency' => 
  array (
    '2fa80756e9d9470a8a320af9e01928b10e2e14b0' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\micro_add.html',
      1 => 1506740192,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1505983976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59cf07e855d6f2_05110366 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<style>
	.mb-special-layout{background-color: #fff;}
	.mb-special-layout div{float: left;}
	.mb-special-layout .ncap-form-default{width: 72.5%;}
	.select2{margin-bottom:0;}
	.limit_container{
		width:500px;
		height:100px;
		border:1px solid #efefef;
		margin-top:10px;
		background: #f5f5f5;
	}
	.selected-group-goods{
		width:180px;
		border:1px solid #eee;
		text-align: center;
		padding:5px;
		margin:2px;
	}
	.selected-group-goods div{
		width:100%;
		margin:0 auto;
		display:block;
		white-space:nowrap;
		overflow:hidden;
		text-overflow:ellipsis;
	}
	.selected-group-goods img{
		width:180px;
		height:180px;
	}
	.search_goods{
		border:1px solid #eee;
		padding: 10px;
		width:100%;
	}
	.col-xs-3{
		width:22%!important;
	}
	.choice_title{
		border-bottom: 1px solid #eee;
		padding-bottom: 10px;
		margin-bottom:10px;
		width:100%;
	}
	p{
		margin-bottom:0 ;
	}
	.preview_img{
		width:90px;
		height: 90px;
		vertical-align: top;
		margin-right: 7px;
		margin-bottom: 5px;
	}
	.uploadimg{
		position: relative;
		float: left;
	}
	.fa-close:before, .fa-times:before {
		position: absolute;
		top: -7px;
		left: 88px;
	}
	.ncap-form-default{display:none;}
	.active{display:block;}
	.el-form-item__content div{
		float: none;
	}
	.w_80{
		width:80px;
		margin:5px 10px;
	}
	.panel-header{
		padding:4px 15px;
	}
	.panel{
		margin-top:10px;
		border-radius: 2px;
	}
	.myself{
		float: none!important;
		background: #f7f7f7;
		padding: 5px;
		display: none;
	}
	.tarea{
		width: 350px;
		height:70px;
	}
	.clear{
		clear: both;
	}
	.myself_title{
		margin:5px 10px;
	}
	.btn{
		margin-right: 10px;
	}
	.w_50{
		width:50px!important;
	}
	.remove_s{
		margin-right:5px;
	}
	.add_num a{
		text-decoration: underline;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
			<div class="subject">
				<h3>微砍价-添加活动</h3>
				<h5>添加微砍价活动</h5>
			</div>
			<ul class="tab-base nc-row">
				<li><a href="JavaScript:void(0);" id = 'bargain_setings1' class="bargainset current">基础设置</a></li>
				<li><a href="JavaScript:void(0);" id = 'bargain_setings2' class="bargainset ">活动设置</a></li>
				<li><a href="JavaScript:void(0);" id = 'bargain_setings3' class="bargainset ">高级设置</a></li>
			</ul>
		</div>

	</div>
	<!-- 操作说明 -->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li> 注意：创建好优惠券后就不可以修改，请确认后再创建</li>
		</ul>
	</div>

	<div class="mb-special-layout">
		<div class="mb-item-box" style="padding-left: 25px;padding-top: 50px;">
			<img src="http://[::1]/yunjuke/application/admin/views/images/bargain_img.png"  width="300px"  height="540px"/>
		</div>
		
		<div class="ncap-form-default active" id="add_form_op">
			<!--基础设置-->
			<span id="bargain_seting1"  class="bargain_seting">
			  <form id="add_form1" method="post" name="add_form1" enctype="multipart/form-data">
				<dl class="row">
					<dt class="tit">
						<label for="bargain_title"><em>*</em>活动标题：</label>
					</dt>
					<dd class="opt">
					    <input id="bargain_title" name="bargain_title" type="text" class="input-txt" value="">
						<span class="err"></span>
					</dd>
				</dl>
			   	<dl class="row">
					<dt class="tit"><label for="start_end_time"><em>*</em>活动时间：</label></dt>
					<dd class="opt">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time" style="background-color: #fff" class="data-start">
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time" style="background-color: #fff" class="data-end">
						<span class="err"></span>

					</dd>
			   	</dl>
				<dl class="row">
					<dt class="tit">
						<label for="goods_image"><em>*</em>砍价轮播图：</label>
					</dt>
					<dd class="opt">
						<div class="formControls">
							<div id="previews1" style="float:left"></div>
							<div id="previews2" style="float:left"></div>
							<div id="previews3" style="float:left"></div>
							<div style="float:left">
								<input type="file" id="goods_images1" name ="goods_images1"   onchange="previews1(this)" style="opacity:0"/>
								<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px"><i class="fa fa-cloud-download"></i>上传图片1</span>
								<br>
								<input type="file" id="goods_images2" name ="goods_images2"   onchange="previews2(this)" style="opacity:0"/>
								<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px"><i class="fa fa-cloud-download"></i>上传图片2</span>
								<br>
								<input type="file" id="goods_images3" name ="goods_images3"   onchange="previews3(this)" style="opacity:0"/>
								<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px"><i class="fa fa-cloud-download"></i>上传图片3</span>
							</div>
						</div>
						<input type="hidden" id="goods_image" name ="goods_image" value="1"/><span class="err"></span>
						<p class="notic">建议尺寸：750x400素，最多三张哦</p>
					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="bargain_rule">活动说明：</label>
					</dt>
					<dd class="opt">
						<textarea name="bargain_rule" rows="6" class="tarea" id="bargain_rule"></textarea>
						<span class="err"></span>

					</dd>
				</dl>
				
				
				<dl class="row">
					<dt class="tit"><label for="store_type">门店类型：</label></dt>
					<dd class="opt">
						<input type="radio" id="store_type_1" name="store_type" value="1" checked ><label for="store_type_1">实体店</label>
						<input type="radio" id="store_type_2" name="store_type" value="2" ><label for="store_type_2">电商店</label>
						<span class="err"></span>
					</dd>
				</dl>
				
				<dl class="row">
					<dt class="tit"><label for="goods_pos">商品类型：</label></dt>
					<dd class="opt">
						<input type="radio" id="goods_pos_1" name="goods_pos" value="0" checked ><label for="goods_pos_1">总库</label>
						<input type="radio" id="goods_pos_2" name="goods_pos" value="1" ><label for="goods_pos_2">自建</label>
				        <span class="err"></span>
					</dd>
				</dl>
				
			    <dl class="row" >
					<dt class="tit"><label for="store_id"><em>*</em>活动门店:</label></dt>
					<dd class="opt">
						<select class="valid select2" id="store_id" name="store_id">
		
						</select>
						<span class="err"></span>
					</dd>
			    </dl>
			    
			    
			    
			    
			    
				<dl class="row" >
					<dt class="tit">
						<label for="goods_id"><em>*</em>活动商品:</label>
					</dt>
					<dd class="opt">
						<div class="selected-group-goods" >
							<div class="goods-thumb"><img id="groupbuy_goods_image" src="http://[::1]/yunjuke/data/images/default_goods_image.jpg"></div>
							<div class="goods-name" id="groupbuy_goods_name"></div>
							<div class="goods-price">吊牌价：￥<span id="groupbuy_goods_price">0.00</span></div>
						</div>
						<input id="goods_id" name="goods_id" type="hidden" value=""><span class="err"></span>
						<div style="clear: both;"></div>
						<div class="row search_goods" style="margin-top: 10px;">
							<div class="choice_title">
								搜索店内商品 <input type="text" name="search_goods_name" id="search_goods_name">
								<a href="javascript:;" id="btn_search_goods" class="btn btn-primary radius size-S">搜索</a>
								<span>不输入名称直接搜索将显示店内所有普通商品，特殊商品不能参加</span>
							</div>
							<div style="clear: both;"></div>
							<div class="div_goods_search_result" style="display:none;">
							</div>
						</div>
					</dd>
				</dl>
				<div class="bot">
					<a href="javascript:void(0)"  flag="1" class="btn btn-success radius submitnext">下一步</a>
				</div>
				</form>
			</span>
			
			
			
			
			
			<!--活动设置-->
			<span id="bargain_seting2"  class="bargain_seting" style="display:none">
			   <form id="add_form2" method="post"   name="add_form2" enctype="multipart/form-data">
			   
				<dl class="row">
					<dt class="tit"><label for="goods_nums"><em>*</em>活动商品数量：</label></dt>
					<dd class="opt">
						<input id="goods_nums" name="goods_nums" type="text" value="">&nbsp;&nbsp;件
						<span class="err"></span>
						<p class="notic">活动发布后无法更新</p>
					</dd>
				</dl>
				
				
				<dl class="row">
					<dt class="tit"><label for="goods_price">商品原价：</label></dt>
					<dd class="opt">
					    <input id="goods_price" name="goods_price" type="hidden" value="" >
						<input id="goodss_price" name="goodss_price" type="text" value="" disabled>&nbsp;&nbsp;元
						<span class="err"></span>
						<p class="notic">活动发布后无法更新</p>
					</dd>
				</dl>
				
				
				<dl class="row">
					<dt class="tit"><label for="bargain_price"><em>*</em>砍价目标/最低价：</label></dt>
					<dd class="opt">
						<input id="bargain_price" name="bargain_price" type="text" value="">&nbsp;&nbsp;元
						<span class="err"></span>
						<p class="notic">活动发布后无法更新</p>
					</dd>
				</dl>
				
				
				<dl class="row">
					<dt class="tit"><label for="depreciate_odds"><em>*</em>砍价设置：</label></dt>
					<dd class="opt">
						<div class="el-form-item__content">
							<p class="notic">(涨价概率及金额最好小于降价概率及金额，避免出现砍不到最低价的情况)</p>
							<table class="table table-border table-bg table-bordered">
							  	<thead>
									<tr class="text-c">
										<th>阶段</th>
										<th>人数</th>
										<th>降价</th>
										<th>砍价概率</th>
										<th>砍价范围</th>
										<th>涨价概率</th>
										<th>涨价范围</th>
										<th>操作</th>
									</tr>
							  	</thead>
							  	<tbody class="add_stage">
									<tr class="text-c">
										<td class="stage">1</td>
										<td><input type="text" class="w_50"></td>
										<td><input type="text" class="w_50">&nbsp;元</td>
										<td><input type="text" class="w_50">&nbsp;%</td>
										<td><input type="text" class="w_50">&nbsp;%&nbsp;-&nbsp;<input type="text" class="w_50">&nbsp;%</td>
										<td><input type="text" class="w_50" disabled>&nbsp;&nbsp;%</td>
										<td><input type="text" class="w_50">&nbsp;%&nbsp;-&nbsp;<input type="text" class="w_50">&nbsp;%</td>
										<td class="add_num"><a href="javascript:;" class="add_s">添加</a></td>
									</tr>
							  	</tbody>
							</table>
							<!--<div class="panel panel-default">-->
								<!--<div class="panel-header">砍价时降价<span class="text-small">(好友帮砍价时，砍一刀价格会降低)</span></div>-->
								<!--<div class="panel-body">-->
									<!--<div class="chance">-->
				             	 	<!--<span>降价几率</span>-->
				             	 	<!--<input  onchange="changePrice(this)"  type="text" id="depreciate_odds" name="depreciate_odds" class="w_80">%-->
			             	 	<!--</div>-->
			             	   	<!--<div class="price-range">-->
				             	   <!--<span>参与人数    0-</span><input type="text" name="price_low" class="w_80">-<input type="text" name="price_height" class="w_80">-<input type="text" name="price_height" class="w_80">-->
			             	   	<!--</div>-->
			             	   	<!--<div class="price-range">-->
				             	   <!--<span>降价范围  0-</span><input type="text" name="price_low" class="w_80">-<input type="text" name="price_height" class="w_80">-<input type="text" name="price_height" class="w_80">-->
			             	   	<!--</div>-->
								<!--</div>-->
							<!--</div>-->
							<!--<div class="panel panel-default">-->
								<!--<div class="panel-header">砍价时涨价<span class="text-small">(好友帮砍价时，砍一刀价格会上涨)</span></div>-->
								<!--<div class="panel-body">-->
									<!--<div class="chance">-->
				             	 	<!--<span>涨价几率</span>-->
				             	 	<!--<input id="depreciate_odds_low" type="text" class="w_80" disabled>%-->
			             	 	<!--</div>-->
			             	   	<!--<div class="price-range">-->
				             	   <!--<span>涨价范围</span>-->
				             	   <!--<input type="text" name="prices_lows" class="w_80">-<input type="text"name="prices_heights"  class="w_80">-->
			             	   	<!--</div>-->
								<!--</div>-->
							<!--</div>-->

				         <div class="text-small bargain-time">
					         <span>按照当前你填的概率计算，需要砍</span> 
					         <span class="bargain-time-strong">24</span>
					         <span class="bargain-time-strong">-</span>
					         <span class="bargain-time-strong">37</span>
					         <span>刀才能砍到最低价</span>
				         </div> 
				         <div class="error-msg" style="display: none;"></div><!---->
				         </div>
					</dd>
				</dl>
             	<div class="bot">
					<a id="" href="javascript:void(0)" flag="2" class="btn btn-primary submitgo">上一步</a>
					<a id="" href="javascript:void(0)" flag="2" class="btn btn-success submitnext">下一步</a>
				</div>
				</form>
             </span>
             
             
			<!--高级设置-->
			<span id="bargain_seting3" class="bargain_seting" style="display:none">
			   <form id="add_form3" method="post" name="add_form3" enctype="multipart/form-data">
				<dl class="row">
					<dt class="tit">
						<label for="bargain_key"><em>*</em>关键词：</label>
					</dt>
					<dd class="opt">
					    <input id="bargain_key" name="bargain_key" type="text" class="input-txt" value="">
						<span class="err"></span>
					</dd>
				</dl>
				
				<dl class="row">
					<dt class="tit">
						<label for="bargain_image"><em>*</em>活动图片：</label>
					</dt>
					<dd class="opt">
						<div class="formControls">
							<div id="preview1"></div>
							<div style="clear:both"></div>
							<input type="file" id="bargain_image" name ="bargain_image" onchange="preview1(this)" style="opacity:0"/>
							<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px"><i class="fa fa-cloud-download"></i>上传图片</span>
						</div>
						<p class="notic">图片建议尺寸：900*500 ,图片支持格式：jpg、jpeg、png</p>
					</dd>
				</dl>


				
				<dl class="row">
					<dt class="tit">
						<label for="bargain_note">活动介绍：</label>
					</dt>
					<dd class="opt">
						<textarea name="bargain_note" rows="6" class="tarea" id="bargain_note"></textarea>
						<span class="err"></span>

					</dd>
				</dl>
					
				<dl class="row">
					<dt class="tit"><label for="">分享设置：</label></dt>
					<dd class="opt">
						<input type="radio" id="ous_tag_1" name="ous_tag" value="1" checked ><label for="ous_tag_1">默认设置</label>
						<input type="radio" id="ous_tag_2" name="ous_tag" value="2" ><label for="ous_tag_2">自定义设置</label>
						<div class="myself">
							<div class="myself_title">分享图&nbsp;&nbsp;&nbsp;</div>
							<div>
								<div class="formControls">
									<div id="preview2"></div>
									<div style="clear:both"></div>
									<input type="file" name ="share_image" onchange="preview2(this)" style="opacity:0"/>
									<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px;margin-top: 3px;"><i class="fa fa-cloud-download"></i>上传图片</span>
								</div>
							</div>
							<p class="clear"></p>
							<div class="myself_title">分享标题</div><div><input type="text" name="share_title" style="width: 220px"></div>
							<p class="clear"></p>
							<div class="myself_title">分享内容</div><div><textarea name="share_content" class="tarea" id=""></textarea></div>
							<p class="clear"></p>
						</div>
					</dd>
				</dl>
				<div class="bot">
					<a  href="javascript:void(0)" flag="3" class="btn btn-primary submitgo">上一步</a>
					<a  href="javascript:void(0)" class="btn btn-success radius " id="submits">保存</a>
				</div>
				</form>
				</span>
		</div>
	</div>
</div>

<div id="goTop">
	<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
	<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>
<script type="text/javascript">

	$("table").on('click','.add_s',function () {
	    var html = `<tr class="text-c">
						<td class="stage"></td>
						<td><input type="text" class="w_50"></td>
						<td><input type="text" class="w_50">&nbsp;元</td>
						<td><input type="text" class="w_50">&nbsp;%</td>
						<td><input type="text" class="w_50">&nbsp;%&nbsp;-&nbsp;<input type="text" class="w_50">&nbsp;%</td>
						<td><input type="text" class="w_50" disabled>&nbsp;&nbsp;%</td>
						<td><input type="text" class="w_50">&nbsp;%&nbsp;-&nbsp;<input type="text" class="w_50">&nbsp;%</td>
						<td class="add_num"><a href="javascript:;" class="add_s">添加</a></td>
					</tr>`;
		$(".add_stage").append(html);
		console.log($(this).parent().find("td:first"))
		console.log($(this).parent())
		console.log($(this))
		$(this).parent().parent().next().find("td:first").html($(".stage").length);
		$(".add_num").each(function(index){
		    if(index==$(".add_num").length-1){
                $(this).html('<a href="javascript:;" class="remove_s">删除</a><a href="javascript:;" class="add_s">添加</a>')
			}else{
		        $(this).html('')
			}
		})
    })

    $("table").on('click','.remove_s',function () {
        $(this).parents('tr').remove();
        if($(".add_num").length==1){
            $(".add_num").html('<a href="javascript:;" class="add_s">添加</a>');
		}else{
            $(".add_num").each(function(index){
                if(index==$(".add_num").length-1){
                    $(this).html('<a href="javascript:;" class="remove_s">删除</a><a href="javascript:;" class="add_s">添加</a>')
                }else{
                    $(this).html('')
                }
            })
		}
	})

function changePrice(obj){
	var num = Number($(obj).val());
	var nums = 100 -num;
	$("#depreciate_odds_low").val(nums);
}
//结束时间不能大于开始时间且不能小于现在
jQuery.validator.methods.greaterThanStartDate = function(value, element) {
	var start_date = $("#start_time").val();
	var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
	var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
	return date1 < date2;
};
jQuery.validator.methods.greaterThanNowDate = function(value, element) {
	var date1 = new Date();
	var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
	return date1 < date2;
};

//下一步
$("body .bot").on("click",".submitnext",function(){
	 var flags = $(this).attr("flag");
	 checked_info(flags,1);
/* 	 ids   = parseInt(flags)+1;
	 if($('#add_form').valid()){
		 $(".bargainset").removeClass("current");
		 $("#bargain_setings"+ids).addClass("current");
		 $(".bargain_seting").siblings().css("display","none");
		 $("#bargain_seting"+ids).css("display","block"); 
	 }else{
		 return false;
	 } */

});
//上一步
$("body .bot").on("click",".submitgo",function(){
	 var flags = $(this).attr("flag");
	 checked_info(flags,2);
/* 	 ids   = parseInt(flags)-1;
	 if($('#add_form').valid()){
		 $(".bargainset").removeClass("current");
		 $("#bargain_setings"+ids).addClass("current");
		 $(".bargain_seting").siblings().css("display","none");
		 $("#bargain_seting"+ids).css("display","block"); 
	 }else{
		 return false;
	 } */
});
$("#submits").click(function(){
	$("#add_form3").validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
			error_td.append(error);
		},
		rules : {
			bargain_key : {
				required : true
			},
			bargain_image : {
				required : true
			}
		
		},
		messages : {
			bargain_key : {
				required : '<i class="fa fa-exclamation-circle"></i>请输入关键词'
			},
			bargain_image : {
				required : '<i class="fa fa-exclamation-circle"></i>请选择活动图片'
			}
		}
	});
	
	if($('#add_form3').valid()){
        for (var i = 0, len = Number($("form").length); i < len; ++i) {
        	var data = new FormData($("form")[i]);
        	console.log(data);
      	    $.ajax({
   				type: "POST",
   		        url: "micro_add_edit?id="+i,
   		        data: data,
   		        dataType: "json",
   		        processData: false,
   	            contentType: false,
   		        success: function(data){
   		        	
   		        }
   			});
          
        }

	}
});


function checked_info(flags,id){
	if(id==1){
		ids   = parseInt(flags)+1;
	}else{
		ids   = parseInt(flags)-1;
	}
	if(flags=='1'){
		$("#add_form1").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : {
				bargain_title : {
					required : true
				},
				start_time : {
					required : true
				},

				end_time : {
					required : true,
					greaterThanStartDate : true,
					greaterThanNowDate : true,
				},
				store_id : {
					required : true
				},
				goods_id : {
					required : true
				},
				goods_image: {
					required : true
				}
			
			},
			messages : {
				bargain_title : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动标题'
				},
				start_time : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动开始时间'
				},
				end_time : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
					greaterThanStartDate : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
					greaterThanNowDate : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
				},
				store_id : {
					required : '<i class="fa fa-exclamation-circle"></i>请限制参加活动的门店'
				},
				goods_id : {
					required : '<i class="fa fa-exclamation-circle"></i>请选择参加活动的商品'
				},
				goods_image : {
					required : '<i class="fa fa-exclamation-circle"></i>请选择活动轮播图'
				},
			
			}
		});
		if($('#add_form1').valid()){
			 $(".bargainset").removeClass("current");
			 $("#bargain_setings"+ids).addClass("current");
			 $(".bargain_seting").siblings().css("display","none");
			 $("#bargain_seting"+ids).css("display","block"); 
		}else{
			 return false;
		}
	}else if(flags=='2'){
		$("#add_form2").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : {
				bargain_price : {
					required    : true,
                    number      : true,
				},
				goods_nums : {
					required : true,
					number      : true
				}
			
			},
			messages : {
				bargain_price : {
		              required: '<i class="fa fa-exclamation-circle"></i>最低价格不能为空',
                      number: '<i class="fa fa-exclamation-circle"></i>商品价格只能是数字'
				},
				goods_nums  : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入商品数量',
					 number: '<i class="fa fa-exclamation-circle"></i>商品数量只能是数字'
				}

			}
		});
		if($('#add_form2').valid()){
			 $(".bargainset").removeClass("current");
			 $("#bargain_setings"+ids).addClass("current");
			 $(".bargain_seting").siblings().css("display","none");
			 $("#bargain_seting"+ids).css("display","block"); 
		}else{
			 return false;
		}
	}else{
		$("#add_form3").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : {
				bargain_key : {
					required : true
				},
				bargain_image : {
					required : true
				}
			
			},
			messages : {
				bargain_key : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入关键词'
				},
				bargain_image : {
					required : '<i class="fa fa-exclamation-circle"></i>请选择活动图片'
				}
			}
		});
		if($('#add_form3').valid()){
			 $(".bargainset").removeClass("current");
			 $("#bargain_setings"+ids).addClass("current");
			 $(".bargain_seting").siblings().css("display","none");
			 $("#bargain_seting"+ids).css("display","block"); 
		}else{
			 return false;
		}
	}
}



$(document).ready(function () {
  var store_type = $("input[name='store_type']").val();
  ajax_get_store_list(store_type );
});

$("input[name='store_type']").change(function() {
	ajax_get_store_list($("input[name='store_type']:checked").val());
});
function ajax_get_store_list(type){
	$.ajax({
		type:'get',
		data:'type='+type,
		url:'ajax_get_store_list',
		success:function(data){
			console.log(data)
			var sttr = "<option value=''>请选择</option>";
			if(data.state){
				$.each(data.data,function(k,v){
					sttr+='<option value="'+v.store_id+'">'+v.store_name+'</option>';
				}) 
			}else{
				sttr +="<option value=''>店铺为空</option>";
			}
			$("#store_id").html("");
			$("#store_id").append(sttr);
		},
		dataType:'json'
	});
}
//	添加图片的方法
    function previews1(file){
        var prevDiv = document.getElementById('previews1');
        if(file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<div class="uploadimg"><img src="' + evt.target.result + '" class="preview_img"/><i class="fa fa-times remove" aria-hidden="true"></i></div>';
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
    
    function previews2(file){
        var prevDiv = document.getElementById('previews2');
        if(file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<div class="uploadimg"><img src="' + evt.target.result + '" class="preview_img"/><i class="fa fa-times remove" aria-hidden="true"></i></div>';
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
    function previews3(file){
        var prevDiv = document.getElementById('previews3');
        if(file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<div class="uploadimg"><img src="' + evt.target.result + '" class="preview_img"/><i class="fa fa-times remove" aria-hidden="true"></i></div>';
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
    
    
    
    function preview1(file){
        var prevDiv = document.getElementById('preview1');
        if(file.files && file.files[0]){
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<div><img src="' + evt.target.result + '" class="preview_img"/></div>';
            }
            reader.readAsDataURL(file.files[0]);
        }
    }
	function preview2(file){
		var prevDiv = document.getElementById('preview2');
		if(file.files && file.files[0]){
			var reader = new FileReader();
			reader.onload = function(evt){
				prevDiv.innerHTML = '<div><img src="' + evt.target.result + '" class="preview_img"/></div>';
			}
			reader.readAsDataURL(file.files[0]);
		}
	}
    $("body").on("click","#preview .uploadimg .remove",function(){
        var urls = $(this).parent().attr("imgname");$(this).parent().remove();
    });

//选择商品
$('#btn_show_search_goods').on('click', function() {
	$('#div_search_goods').show();
});
//关闭 选择商品弹出
$('#btn_hide_search_goods').on('click', function() {
	$('#div_search_goods').hide();
});
//选择商品  搜索
$("#btn_search_goods").click(function(){
	search_goods_name = $('#search_goods_name').val();
	group_id = $('#now_groupbuy_id').val();
	store_id = $('#store_id').val();
	goods_pos = $("input[name='goods_pos']:checked").val();
	if(!store_id){
		layer.msg('请先选择活动门店!');return false;
	}
	function show_content(curr,group_id){
		$.ajax({
			type: "post",
			url: "goods_search",
			data: {search_goods_name:search_goods_name,page:curr,group_id:group_id,store:store_id,goods_pos:goods_pos},
			dataType: "json",
			success: function(data){
				if(data.state=='403'){
					login_ajax('shopadmin');return false;
				}
				page = parseInt(data.page);data_goods = data.data;total_page = parseInt(data.total_page);rp = parseInt(data.rp);
				if(data.state){

					if(data_goods!=''){
						str ='';
						$.each(data_goods,function(k,v){

							fg_v = JSON.stringify(v).replace(/ /g,"！");

							str +='<div class="selected-group-goods col-xs-3">'+
									'<div class="goods-thumb"><img id="groupbuy_goods_image" src="'+v.goods_image+'"></div>'+
									'<input name="search_goods_id" class="search_goods_id" type="hidden" value="'+v.goods_id+'">'+
									'<div class="goods-name">'+v.goods_name+'</div>'+
									'<div class="goods-price">吊牌价：￥<span nctype="groupbuy_goods_price">'+v.goods_marketprice+'</span></div>'+
									'<a href="javascript:;" class="btn btn-primary" onclick=select_goods('+fg_v+')><i class="fa fa-check-circle-o"></i>选择该商品</a>'+
									'</div>';

						})
						str +='<div class="pagination"></div> ';
					}
					$('.div_goods_search_result').show();
					$('.div_goods_search_result').html(str);
					pages = total_page
					curr = page
					laypage({
						cont: $('div.pagination'), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
						pages: pages, //通过后台拿到的总页数
						curr:  curr || 1, //当前页
						first: '首页',
						last: '末页',
						groups:5,
						jump: function(obj, first){ //触发分页后的回调
							if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
								show_content(obj.curr,group_id);
							}
						}
					});
				}else{
					str = '<div style="font-size:20px;color:red;">未找到符合条件的商品！</div>';
					$('.div_goods_search_result').show();
					$('.div_goods_search_result').html(str);

				}
			}
		})
	}
	show_content(1,group_id)
	
});


function select_goods(goods){
	console.log(goods)
	re = new RegExp("！","g");
	groupbuy_goods_name = data_null(goods.goods_name).replace(re," ");
	$('#goods_id').val(goods.goods_id);
	$('#groupbuy_goods_image').attr('src',data_null(goods.goods_image));
	$('#groupbuy_goods_price').text(data_null(goods.goods_marketprice));
	$('#groupbuy_goods_name').text(groupbuy_goods_name);
	$('.div_goods_search_result').hide();
	$('#goods_price').val(data_null(goods.goods_price));
	$('#goodss_price').val(data_null(goods.goods_price));
	
}
$("input[name='ous_tag']").change(function() {
    console.log($(this).val())
    if($(this).val()==1) {
        $(".myself").hide();
    } else {
        $(".myself").fadeIn();
    }
});
</script>

</html><?php }
}
