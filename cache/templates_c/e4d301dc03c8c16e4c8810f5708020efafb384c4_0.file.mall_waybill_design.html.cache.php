<?php
/* Smarty version 3.1.29, created on 2017-08-15 15:32:18
  from "D:\www\yunjuke\application\admin\views\mall_waybill_design.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5992a3825df924_72739922',
  'file_dependency' => 
  array (
    'e4d301dc03c8c16e4c8810f5708020efafb384c4' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_waybill_design.html',
      1 => 1502782316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5992a3825df924_72739922 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '151685992a382406e33_82037439';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .waybill_item{
        background-color: #FEF5E6;
        width: 90px;
        height: 20px;
        padding: 1px 5px 4px 5px !important;
        border-color: #FFBEBC;
        border-style: solid;
        border-width: 1px 1px 1px 1px;
        cursor: move;
        position: absolute;
        left: 0;
        top: 0;
    }
    .waybill_item:hover{
        padding: 1px 5px 1px 5px !important;
        border-color: #FF7A73 !important;
        border-width: 1px 1px 4px 1px !important;
    }
    .waybill_back { position: relative; width: 870px; height:490px; }
    .waybill_back img { width: 100%; height: 100%; }
    .waybill_area {
        position: relative;
        width: 870.2px;
        height: 478.8px;
    }
    #edit_model{
    	width: 1100px;
    	height: 600px;
    	border: 1px solid #ccc;
    	font-size: 15px;
    	padding: 10px;
    }
    .model_top{
    	width:100%;
    	height:110px;
    }
    .cl-red{
    	color: red;
    }
    .form-group{
    	margin-right: 30px;
    }
    .model_left{
    	width:160px;
    	height: 490px;
    	float: left;
    }
    .print_con{
    	width: 160px;
    	height: 460px;
    	border: 1px solid #666;
    	overflow-y:scroll;
    }
    .print_con p{
    	cursor: pointer;
    	padding: 3px;
    	margin-bottom: 0;
    }
    .print_con p.selected{
    	background: #a8c6ee;
    }
    .print_con p:hover{
    	background: #cedbef;
    }
    .model_right{
    	width: 870px;
    	height: 490px;
    	border: 1px solid #efefef;
    	margin-left: 20px;
    	float: left;
    	position: relative;
    	background: no-repeat;
    	background-size:auto 490px;
    }
    .model_right p{
    	border: 1px solid #666;
    	padding: 5px 10px;
    	background: #ffe6e6;
    	cursor: pointer;
    	margin-bottom: 0;
    	z-index: 999999;
    }
    .model_right p.active{
    	border: 1px solid #0f0;
    }
    .remove_p{
    	position: absolute;
    	right: -5px;
    	top: -10px;
    }
    .form-group label{
    	display: inline-block;
    	text-align: right;
    }
    .w_120{
    	width: 120px!important;
    }
    .w_155{
    	width: 155px!important;
    }
    .w_80{
    	width: 80px;
    }
    .set{
    	color: blue;
    	text-decoration: underline;
    }
    .size-MINI{
    	width: 30px!important;
    	height: 26px!important;
    }
    .num-minus{
    	border-bottom-left-radius: 4px;
    	border-top-left-radius: 4px;
    }
    .num-plus{
    	border-bottom-right-radius: 4px;
    	border-top-right-radius: 4px;
    }
    .form-group{
    	margin-bottom: 5px;
    }
    .illsu{
    	margin-top: -5px;
    	color: red;
    }
    .text-right{
    	text-align: right;
    	font-weight: bold;
    }
    .look{
    	width: 585px;
    	height: 150px;
    	border: 1px solid #555;
    }
    .look-header{
    	background: #dfdfdf;
    	border: #ccc;
    	padding: 0px 10px;
    }
    #goodinfo{
    	font-size: 15px;
    }
    .clear{
    	clear: both;
    }
    .form-set{
    	margin-bottom: 8px;
    	font-family: ;
    }
    
    textarea{
    	border: 0px!important;
    	background: #ffe6e6!important;
    	box-shadow: none;
    }
    textarea:hover,
    textarea:active,
    textarea:focus{
    	border-color: #ffe6e6!important;
    	box-shadow: none;
    }
    .look-body p{
    	margin-bottom: 0;
    	line-height: 16px;
    	font-size: 14px;
    } 
    .goodinfo{
    	margin-left: 5px;
    }
    .look-body{
    	overflow-y: auto;
    	height: 125px;
    }
    #print_separate{
    	opacity: 0;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <!--<div class="item-title"><a class="back" href="index.php?act=waybill&amp;op=waybill_list" title="返回运单模板列表"><i class="fa fa-arrow-circle-o-left"></i></a>-->
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>运单模板 - 设计“<?php echo $_smarty_tpl->tpl_vars['waybill_express_name']->value;?>
”运单模板</h3>
                <h5>预设供商家选择的运单快递模板</h5>
            </div>

        </div>
    </div>
    <!--操作提示-->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>勾选需要打印的项目，勾选后可以用鼠标拖动确定项目的位置、宽度和高度，也可以点击项目后边的微调按钮手工录入</li>
            <li>设置完成后点击提交按钮完成设计</li>
        </ul>
    </div>
    <div class="ncap-form-default">
        <div id="edit_model">
        	<div class="model_top">
        		<form class="form-inline" role="form">
				  <div class="form-group">
				    <label class="w_120">模板名称：&nbsp;</label>
				    <span class="cl-red">* </span><input type="text" class="form-control w_155" id="" value="百世汇通">
				  </div>
				  <div class="form-group">
				    <label class="w_80" style="margin-left: 45px;">打印机：&nbsp;</label>
				    <select name="" style="width: 215px;">
				    	<option value="">惠普201705216</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label class="w_80" style="margin-left: 90px;">物流公司：&nbsp;</label>
				    <select name="" style="width: 160px;">
				    	<option value="">京东</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label class="w_120">打印位置调整：&nbsp;</label>
				    上移 <input type="text" class="form-control" id="" value="50" style="width: 30px;"> 毫米&nbsp;左移 <input type="text" class="form-control" id="" value="50" style="width: 30px;"> 毫米
				  </div>
				  <div class="form-group">
				    <label>面单大小：&nbsp;</label>
				    宽度 <input type="text" class="form-control" id="img_width" value="50" style="width: 70px;"> 毫米 &nbsp;高度 <input type="text" class="form-control" id="img_height" value="50" style="width: 70px;"> 毫米
				  </div>
				  <div class="form-group">
				    <label class="w_80" style="margin-left: -2px;">背景图片：&nbsp;</label>
				    <span class="btn btn-primary radius size-S">选择图片</span>
				    <input type="file" onchange="preview(this)" style="opacity:0;margin-left:-70px;display: inline-block;width: 70px;"/>
				  </div>
				  <br>
				  <div class="form-group">
				    <label class="w_120">字体：&nbsp;</label>
					<select class="form-control font_size" style="width: 170px;">
					    <option value="宋体">宋体</option>
					   	<option value="微软雅黑">微软雅黑</option>
					   	<option value="黑体">黑体</option>
					   	<option value="楷体">楷体</option>
					   	<option value="仿宋">仿宋</option>
					</select>
				  </div>
				  <div class="form-group">
				  		<label class="w_80" style="margin-left: 52px;">字体大小：&nbsp;</label>
						<div class="btn-group" style="float: right;">
						    <span class="btn btn-default size-MINI num-minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
						    <input type="text" name="" id="f-size" value="15" style="width: 20px;border-radius: 0px;"/>
						    <span class="btn btn-default size-MINI num-plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
				  </div>
				  <div class="form-group">
						<div class="btn-group">
						  <span class="btn btn-default size-MINI radius bold"><i class="fa fa-bold" aria-hidden="true"></i></span>
						  <span class="btn btn-default size-MINI radius italic"><i class="fa fa-italic" aria-hidden="true"></i></span>
						  <span class="btn btn-default size-MINI radius underline"><i class="fa fa-underline" aria-hidden="true"></i></span>
						</div>
				  </div>
				  <div class="form-group">
						<div class="btn-group">
						  <span class="btn btn-default size-MINI radius align-left"><i class="fa fa-align-left" aria-hidden="true"></i></span>
						  <span class="btn btn-default size-MINI radius align-center"><i class="fa fa-align-center" aria-hidden="true"></i></span>
						  <span class="btn btn-default size-MINI radius align-right"><i class="fa fa-align-right" aria-hidden="true"></i></span>
						</div>
				  </div>
				  <div class="form-group">
				    	<a href="javascript:;"class="set" style="margin-left: 60px;">商品信息设置</a>
				  </div>
				</form>
        	</div>
        	<div class="model_left">
        		<p class="illsu">将打印项拖拽至面单</p>
        		<div class="print_con">
        			<p>商品信息</p>
        			<a href="javascript:;" class="set" style="float: right;margin-top: -28px;z-index: 99999;">配置</a>
        			<p>寄件人</p>
        			<p>寄件人_邮编</p>
        			<p>寄件人_省</p>
        			<p>寄件人_市</p>
        			<p>寄件人_区</p>
        			<p>寄件人_街道地址</p>
        			<p>寄件人_完整地址</p>
        			<p>寄件人_电话</p>
        			<p>寄件人_手机</p>
        			<p>寄件人_手机/电话</p>
        			<p>寄件人_公司</p>
        			<p>店铺名称</p>
        			<p>寄件人_自定义1</p>
        			<p>寄件人_自定义2</p>
        			<p>寄件人_自定义3</p>
        			<p>收件人</p>
        			<p>收件人_ID</p>
        			<p>卖家_ID</p>
        			<p>收件人_邮编</p>
        			<p>收件人_省</p>
        			<p>收件人_市</p>
        			<p>收件人_区</p>
        			<p>收件人_街道地址</p>
        			<p>收件人_完整地址</p>
        			<p>收件人_电话</p>
        			<p>收件人_手机</p>
        			<p>收件人_手机/电话</p>
        			<p>商品数量合计</p>
        			<p>商品重量合计</p>
        			<p>店铺名</p>
        			<p>发票抬头</p>
        			<p>运单号</p>
        			<p>电子面单号</p>
        			<p>电子单号128A</p>
        			<p>电子单号128B</p>
        			<p>电子单号128C</p>
        			<p>电子单号二维码</p>
        			<p>单号跟踪二维码</p>
        			<p>始发站点</p>
        			<p>目的站点</p>
        			<p>末端分拣号</p>
        			<p>末端分拣号128A</p>
        			<p>始发编号</p>
        			<p>始发编号128A</p>
        			<p>集包地</p>
        			<p>集包代码</p>
        			<p>安能四段码</p>
        			<p>二维码或图片</p>
        			<p>图片</p>
        			<p>金额合计</p>
        			<p>金额大写</p>
        			<p>大头笔</p>
        			<p>收件人简省</p>
        			<p>订单编号</p>
        			<p>点单号条码</p>
        			<p>卖家备注</p>
        			<p>买家留言</p>
        			<p>打印日期</p>
        			<p>打印时间</p>
        			<p>付款时间</p>
        			<p>包裹编码</p>
        			<p>月结账号</p>
        			<p>陆运</p>
        			<p>付款方式</p>
        			<p>业务类型</p>
        			<p>自定义内容</p>
        			<p>横线</p>
        			<p>竖线</p>
        			<p><i class="fa fa-check" aria-hidden="true"></i></p>
        		</div>
        	</div>
        	<div class="model_right">
        		
        	</div>
        </div>
        <div class="bot"><a id="submit" href="javascript:;" class="ncap-btn-big ncap-btn-green">确认提交</a></div>
    </div>
</div>
<div id="goodinfo" style="display: none;">
<p style="color: #999;text-align: center;">商品信息的内容主要由三项组成：商品标题，商品规格，数量</p>
<form>
   <div class="form-set" id="print_obj">
  	<div class="col-xs-3 text-right">打印项：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label>
          <input type="checkbox">商品信息
        </label>
        <label>
          <input type="checkbox">数量合计
        </label>
        <label>
          <input type="checkbox">买家留言
        </label>
        <label>
          <input type="checkbox">卖家备注
        </label>
        <label>
          <input type="checkbox">买家旺旺
        </label>
        <label>
          <input type="checkbox">订单编号
        </label>
        <label>
          <input type="checkbox">总金额
        </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_other">
  	<div class="col-xs-3 text-right">其他选项：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label>
          <input type="checkbox">商品数量置前
        </label>
        <label>
          <input type="checkbox">打印商品序号
        </label>
        <label>
          <input type="checkbox">打印单价
        </label>
        <label>
          <input type="checkbox">打印重量
        </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_title">
  	<div class="col-xs-3 text-right">商品标题打印方式：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id="" value="优先编码">	优先打印商家编码
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value="简称"> 仅商品简称
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id="" value="编码"> 仅商家编码
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value="两个都打印"> 两者都打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value="不打印"> 不打印
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_if">
  	<div class="col-xs-3 text-right">商品规格是否打印：</div>
    <div class="col-xs-9">
      <div class="checkbox">
      	<label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id="" value="打印">	打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id="" value="未填写编码时打印"> 未填写商家编码时打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id="" value="不打印"> 不打印
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_show">
  	<div class="col-xs-3 text-right">商品数量显示方式：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id="" value="数字">	数字
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value="-x件"> -X件
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id="" value="件"> 加'件'
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value="-"> 加-
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value="*"> 加*
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value="()"> 用()区分
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value="[]"> 用[]区分
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_line">
  	<div class="col-xs-3 text-right">每款商品是否换行：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value="自动"> 自动
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value="换行"> 换行
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value="不换行"> 不换行
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set" id="print_separate">
  	<div class="col-xs-3 text-right">每款商品分隔符：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value="空格"> 空格
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value="+"> 加号+
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=";"> 分号；
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value="/"> 斜杠/
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value="|"> 竖线|
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
</form>
	<div class="look col-xs-offset-2">
		<div class="look-header">预览</div>
		<div class="look-body"></div>
  	</div>
</div>
<?php echo '<script'; ?>
>
	$(".print_con p").click(function(){
		$(this).parent().find('p').removeClass('selected');
		$(this).addClass('selected');
	})
	function preview(file){
	 	if(file.files && file.files[0]){
	 		var reader = new FileReader();
	 		reader.onload = function(evt){
	 			$(".model_right").css('background-image','url(' + evt.target.result + ')');
			}
	 		reader.readAsDataURL(file.files[0]);
	 	}
	}
	
$(function() {
//  $( ".print_con" ).accordion();
    $( ".print_con p" ).draggable({
      appendTo: "body",
      helper: "clone"
    });
    $( ".model_right" ).droppable({
      activeClass: "",
      hoverClass: "",
      accept: ".print_con p",
      drop: function( event, ui ) {
      	var posix = event.pageX-document.getElementsByClassName('model_right')[0].offsetLeft;
      	var posiy = event.pageY-document.getElementsByClassName('model_right')[0].offsetTop;
//		$( "<p></p>" ).html(ui.draggable.text()+'<span class="remove_p fa fa-times"></span>').appendTo($(this)).css({'position':'absolute','top':posiy-10,'left':posix-30}).draggable({ containment: ".model_right", scroll: false })
//		.resizable({
//    		containment: ".model_right"
//  	}).mouseenter(function(){
//  		$(".ui-icon-gripsmall-diagonal-se").css('background','red');
//  	}).click(function(){
//  		$(this).parent().find('p').removeClass('active');
//  		$(this).addClass('active');
//  	});

		if(ui.draggable.text()=='自定义内容'){
      		$( "<p></p>" ).html('<textarea placeholder="请输入" style="width: 100%;height:100%"></textarea><span class="remove_p fa fa-times"></span>').appendTo($(this)).css({'position':'absolute','top':posiy-10,'left':posix-30}).draggable({ containment: ".model_right", scroll: false })
			.resizable({
	      		containment: ".model_right"
	    	}).mouseenter(function(){
			//$(".ui-icon-gripsmall-diagonal-se").css('background','red');
	    	}).click(function(){
	    		$(this).parent().find('p').removeClass('active');
	    		$(this).addClass('active');
	    	});
    		$("textarea").draggable({ containment: ".model_right", scroll: false })
    		
      	}else if(ui.draggable.text()=='商品信息'){
      		$( "<p style='width: 250px;height: 100px;'></p>" ).html(ui.draggable.html()+'<span class="remove_p fa fa-times"></span>').appendTo($(this)).css({'position':'absolute','top':posiy-10,'left':posix-30}).draggable({ containment: ".model_right", scroll: false })
			.resizable({
	      		containment: ".model_right"
	    	}).mouseenter(function(){
			//$(".ui-icon-gripsmall-diagonal-se").css('background','red');
	    	}).click(function(){
	    		$(this).parent().find('p').removeClass('active');
	    		$(this).addClass('active');
	    	});
      	}else{
      		$( "<p></p>" ).html(ui.draggable.html()+'<span class="remove_p fa fa-times"></span>').appendTo($(this)).css({'position':'absolute','top':posiy-10,'left':posix-30}).draggable({ containment: ".model_right", scroll: false })
			.resizable({
	      		containment: ".model_right"
	    	}).mouseenter(function(){
			//$(".ui-icon-gripsmall-diagonal-se").css('background','red');
	    	}).click(function(){
	    		$(this).parent().find('p').removeClass('active');
	    		$(this).addClass('active');
	    	});
      	}
    	
    	$(".remove_p").click(function(){
    		$(this).parent().remove();
    	})
    	
    	
      }
   })

//字体大小设置
$(".num-minus").click(function(){
	$(this).next().val($(this).next().val()-1);
	var v = $(this).next().val();
	$(".model_right p.active").css('font-size',v+'px')
})
$(".num-plus").click(function(){
	$(this).prev().val(parseInt($(this).prev().val())+1);
	var v = $(this).prev().val();
	$(".model_right p.active").css('font-size',v+'px')
})
$('.model_top').bind('input propertychange', function() {  
    $(".model_right p.active").css('font-size',$('#f-size').val()+'px');
}); 
//加粗
var i=0,u=0,b=0;
$(".bold").click(function(){
	if(b==0){
		$(".model_right p.active").css('font-weight','bold');
		b=1;
	}else{
		$(".model_right p.active").css('font-weight','100');
		b=0;
	}
})
//斜体
$(".italic").click(function(){
	if(i==0){
		$(".model_right p.active").css('font-style','italic');
		i=1;
	}else{
		$(".model_right p.active").css('font-style','normal');
		i=0;
	}
})
//下划线
$(".underline").click(function(){
	if(u==0){
		$(".model_right p.active").css('text-decoration','underline');
		u=1;
	}else{
		$(".model_right p.active").css('text-decoration','none');
		u=0;
	}
})
//左对齐
$(".align-left").click(function(){
	$(".model_right p.active").css('text-align','left');
})
//居中
$(".align-center").click(function(){
	$(".model_right p.active").css('text-align','center');
})
//右对齐
$(".align-right").click(function(){
	$(".model_right p.active").css('text-align','right');
})

//面单大小
$("#img_width").change(function(){
	$(".model_right").css('background-size',$(this).val()+'mm'+' auto');
})
$("#img_height").change(function(){
	$(".model_right").css('background-size','auto '+$(this).val()+'mm');
})
//改变字体
$(".font_size").change(function(){
	$(".model_right p.active").css('font-family',$(this).val());
})

//弹出设置商品信息
$('.set').click(function(){
	layer.open({
	  type: 1,
	  skin: 'layui-layer-rim', //加上边框
  	  area: ['766px', '524px'], //宽高
	  shadeClose: true, //开启遮罩关闭 
	  btn:['保存','取消'],
	  title: '商品信息打印设置', //不显示标题
	  content: $('#goodinfo'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
	  cancel: function(){
	    
	  }
	});
})

});
  
//商品信息设置
//打印项
$("#print_obj label input").click(function(){
	switch ($(this).parent().index())
{
case 0:
	if($(this).prop('checked')){
		$('.look-body').append('<p class="goodinfo"><span class="order">一 . </span><span class="infocontent"><span class="good_title"> kz213123 </span><span class="good_spec"> 黄色 M2 </span><span class="good_money"> 2.00 </span><span class="good_kg"> 2kg </span><span class="good_num"> 2件 </span></span></p>'
		+'<span class="good_separate"></span>'+'<p class="goodinfo"><span class="order">二 . </span><span class="infocontent"><span class="good_title"> kz213123 </span><span class="good_spec"> 黄色 M2 </span><span class="good_money"> 2.00 </span><span class="good_kg"> 2kg </span><span class="good_num"> 2件 </span></span></p>');
		if($('#print_other label:eq(0)').find('input').prop('checked')){
			$('.good_num').remove();
		$(".infocontent").prepend('<span class="good_num">2件</span>');
		}else{
			$('.good_num').remove();
			$(".infocontent").append('<span class="good_num">2件</span>');
		}
		if($('#print_other label:eq(1)').find('input').prop('checked')){
			$('.order').show();
		}else{
			$('.order').hide();
		}
		if($('#print_other label:eq(2)').find('input').prop('checked')){
			$('.good_money').show();
		}else{
			$('.good_money').hide();
		}
		if($('#print_other label:eq(3)').find('input').prop('checked')){
			$('.good_kg').show();
		}else{
			$('.good_kg').hide();
		}
	}else{
		$(".goodinfo").remove();
	}
  break;
case 1:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="num">【合计】共5件</p>');
	}else{
		$(".num").remove();
	}
  break;
case 2:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="talk_cus">【买家留言】买家留言速速发货</p>');
	}else{
		$(".talk_cus").remove();
	}
  break;
case 3:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="talk_store">【卖家备注】卖家备注恭喜发财</p>');
	}else{
		$(".talk_store").remove();
	}
  break;
case 4:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="dog">【买家旺旺】出水芙蓉</p>');
	}else{
		$(".dog").remove();
	}
  break;
case 5:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="tel">【订单编号】124588777441</p>');
	}else{
		$(".tel").remove();
	}
  break;
case 6:
  	if($(this).prop('checked')){
		$('.look-body').append('<p class="money">【总金额】共8.00元</p>');
	}else{
		$(".money").remove();
	}
  break;
}
	if(check_length($('#print_obj label input'))>=6&&$('#print_line label:eq(0)').find('input').prop('checked')){
		$(".look-body p").css('display','inline-block');
		$(".good_separate").show();
	}else{
		$(".look-body p").css('display','block');
		$(".good_separate").hide();
	}
})

//其他选项
$("#print_other label input").click(function(){
	switch ($(this).parent().index())
	{
	case 0:
		if($(this).prop('checked')){
			$('.good_num').remove();
			$(".infocontent").prepend('<span class="good_num">2件</span>');
		}else{
			$('.good_num').remove();
			$(".infocontent").append('<span class="good_num">2件</span>');
		}
	  break;
	case 1:
	  	if($(this).prop('checked')){
			$('.order').show();
		}else{
			$('.order').hide();
		}
	  break;
	case 2:
	  	if($(this).prop('checked')){
			$('.good_money').show();
		}else{
			$('.good_money').hide();
		}
	  break;
	case 3:
	  	if($(this).prop('checked')){
			$('.good_kg').show();
		}else{
			$('.good_kg').hide();
		}
	  break;
	}
})

//商品标题打印方式
$("#print_title label input").change(function(){
	switch ($(this).val())
	{
	case '优先编码':
		$('.good_title').text(' kz213123 ');
		if($("#print_if label:eq(1)").find('input').prop('checked')){
			$('.good_spec').hide();
		}
	  break;
	case '简称':
	  	$('.good_title').text(' 裤子 ');
	  	if($("#print_if label:eq(1)").find('input').prop('checked')){
			$('.good_spec').show();
		}
	  break;
	case '编码':
	  	$('.good_title').text(' kz213123 ');
	  	if($("#print_if label:eq(1)").find('input').prop('checked')){
			$('.good_spec').hide();
		}
	  break;
	case '两个都打印':
	  	$('.good_title').text(' kz213123 裤子 ');
	  	if($("#print_if label:eq(1)").find('input').prop('checked')){
			$('.good_spec').hide();
		}
	  break;
	case '不打印':
	  	$('.good_title').text('');
	  	if($("#print_if label:eq(1)").find('input').prop('checked')){
			$('.good_spec').show();
		}
	  break;
	}
})

//商品规格是否打印
$("#print_if label input").change(function(){
	switch ($(this).val())
	{
	case '打印':
		$('.good_spec').show();
	  break;
	case '未填写编码时打印':
		if($(".good_title").text().indexOf('kz213123')>0){
			$('.good_spec').hide();
		}else{
			$('.good_spec').show();
		}
	  	
	  break;
	case '不打印':
	  	$('.good_spec').hide();
	  break;
	}
})

//商品数量显示方式
$("#print_show label input").change(function(){
	switch ($(this).val())
	{
	case '数字':
		$('.good_num').text('2');
	  break;
	case '-x件':
		$('.good_num').text('-2件');
	  break;
	case '件':
	  	$('.good_num').text('2件');
	  break;
	case '-':
		$('.good_num').text('-2');
	  break;
	case '*':
		$('.good_num').text('*2');
	  break;
	case '()':
	  	$('.good_num').text('(2)');
	  break;
	case '[]':
	  	$('.good_num').text('[2]');
	  break;
	}
})

//每款商品是否换行
$("#print_line label input").change(function(){
	switch ($(this).val())
	{
	case '自动':
		if(check_length($('#print_obj label input'))>=6){
			$(".look-body p").css('display','inline-block');
			$(".good_separate").show();
		}else{
			$(".look-body p").css('display','block');
			$(".good_separate").hide();
		}
		$("#print_separate").css('opacity','1');
	  break;
	case '换行':
		$(".look-body p").css('display','block');
	  	$(".good_separate").hide();
	  	$("#print_separate").css('opacity','0');
	  break;
	case '不换行':
		$(".look-body p").css('display','inline-block');
		$(".good_separate").show();
		$("#print_separate").css('opacity','1');
	  break;
	}
})

//每款商品分隔符
$("#print_separate label input").change(function(){
	switch ($(this).val())
	{
	case '空格':
		$(".good_separate").text('　');
	  break;
	case '+':
		$(".good_separate").text(' + ');
	  break;
	case ';':
	  	$(".good_separate").text(' ; ');
	  break;
	  case '/':
		$(".good_separate").text(' / ');
	  break;
	case '|':
	  	$(".good_separate").text(' | ');
	  break;
	}
})

//封装查看被选中的checkbox的个数
function check_length(obj){
	var n=0;
	obj.each(function(){
		if($(this).prop('checked')){
			n++;
		}
	})
	return n;
}
  	
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
