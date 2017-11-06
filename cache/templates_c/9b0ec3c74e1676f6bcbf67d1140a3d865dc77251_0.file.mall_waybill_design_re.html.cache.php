<?php
/* Smarty version 3.1.29, created on 2017-08-14 10:50:40
  from "D:\www\yunjuke\application\admin\views\mall_waybill_design_re.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5991100013dbf3_57860425',
  'file_dependency' => 
  array (
    '9b0ec3c74e1676f6bcbf67d1140a3d865dc77251' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_waybill_design_re.html',
      1 => 1502678006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5991100013dbf3_57860425 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3119659910fffe74882_50978213';
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
    	background-size:auto 400px;
    }
    .model_right p{
    	border: 1px solid #666;
    	padding: 5px 10px;
    	background: #ffe6e6;
    	cursor: pointer;
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
        			<p>v</p>
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
   <div class="form-set">
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
  <div class="form-set">
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
  <div class="form-set">
  	<div class="col-xs-3 text-right">商品标题打印方式：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id="" value="" checked>	优先打印商家编码
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value=""> 仅商品简称
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id="" value=""> 仅商家编码
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value=""> 两者都打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id=""  value=""> 不打印
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set">
  	<div class="col-xs-3 text-right">商品规格是否打印：</div>
    <div class="col-xs-9">
      <div class="checkbox">
      	<label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id="" value="" checked>	打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id=""  value=""> 未填写商家编码时打印
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline1" id="" value=""> 不打印
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set">
  	<div class="col-xs-3 text-right">商品数量显示方式：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline" id="" value="" checked>	数字
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value=""> -X件
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id="" value=""> 加'件'
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value=""> 加-
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value=""> 加*
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value=""> 用()区分
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline2" id=""  value=""> 用[]区分
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set">
  	<div class="col-xs-3 text-right">每款商品是否换行：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value=""> 自动
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value=""> 换行
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline21" id=""  value=""> 不换行
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
  <div class="form-set">
  	<div class="col-xs-3 text-right">每款商品分隔符：</div>
    <div class="col-xs-9">
      <div class="checkbox">
        <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=""> 空格
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=""> 加号+
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=""> 分号；
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=""> 斜杠/
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="optionsRadiosinline23" id=""  value=""> 竖线|
	    </label>
      </div>
  	</div>
  	<div class="clear"></div>
  </div>
</form>
	<div class="look col-xs-offset-2">
		<div class="look-header">预览</div>
		<div class="look-body">面板内容</div>
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
		$( "<p></p>" ).html(ui.draggable.text()+'<span class="remove_p fa fa-times"></span>').appendTo($(this)).css({'position':'absolute','top':posiy-10,'left':posix-30}).draggable({ containment: ".model_right", scroll: false })
		.resizable({
      		containment: ".model_right"
    	}).mouseenter(function(){
//  		$(".ui-icon-gripsmall-diagonal-se").css('background','red');
    	}).click(function(){
    		$(this).parent().find('p').removeClass('active');
    		$(this).addClass('active');
    	});
    	
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
	  shade: false,
	  btn:['保存','取消'],
	  title: '商品信息打印设置', //不显示标题
	  content: $('#goodinfo'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
	  cancel: function(){
	    
	  }
	});
})

});
  
  

  
    $(document).ready(function() {
        var draggable_event = {
            stop: function(event, ui) {
                var item_name = ui.helper.attr('data-item-name');
                var position = ui.helper.position();
                $('#left_' + item_name).val(position.left);
                $('#top_' + item_name).val(position.top);
            }
        };

        var resizeable_event = {
            stop: function(event, ui) {
                var item_name = ui.helper.attr('data-item-name');
                $('#width_' + item_name).val(ui.size.width);
                $('#height_' + item_name).val(ui.size.height);
            }
        };

        $('.waybill_item').draggable(draggable_event);
        $('.waybill_item').resizable(resizeable_event);

        $('#waybill_item_list input:checkbox').on('click', function() {
            var item_name = $(this).attr('data-waybill-name');
            var div_name = 'div_' + item_name;
            if($(this).prop('checked')) {
                var item_text = $(this).attr('data-waybill-text');
                var waybill_item = '<div id="' + div_name + '" data-item-name="' + item_name + '" class="waybill_item">' + item_text + '</div>';
                $('.waybill_design').append(waybill_item);
                $('#' + div_name).draggable(draggable_event);
                $('#' + div_name).resizable(resizeable_event);
                $('#left_' + item_name).val('0');
                $('#top_' + item_name).val('0');
                $('#width_' + item_name).val('100');
                $('#height_' + item_name).val('20');
            } else {
                $('#' + div_name).remove();
            }
        });

        $('.waybill_design').on('click', '.waybill_item', function() {
            console.log($(this).position());
        });

        //微调弹出窗口
        $('[nctype="btn_item_edit"]').on('click', function() {
            var item_name = $(this).attr('data-item-name');
            $('#dialog_item_name').val(item_name);
            $('#dialog_left').val($('#left_' + item_name).val());
            $('#dialog_top').val($('#top_' + item_name).val());
            $('#dialog_width').val($('#width_' + item_name).val());
            $('#dialog_height').val($('#height_' + item_name).val());
            $('#dialog_item_edit').nc_show_dialog({title:'微调'});
        });

        //微调保存
        $('#btn_dialog_submit').on('click', function() {
            var item_name = $('#dialog_item_name').val();
            $('#div_' + item_name).css('left', $('#dialog_left').val() + 'px');
            $('#div_' + item_name).css('top', $('#dialog_top').val() + 'px');
            $('#div_' + item_name).css('width', $('#dialog_width').val() + 'px');
            $('#div_' + item_name).css('height', $('#dialog_height').val() + 'px');
            $('#left_' + item_name).val($('#dialog_left').val());
            $('#top_' + item_name).val($('#dialog_top').val());
            $('#width_' + item_name).val($('#dialog_width').val());
            $('#height_' + item_name).val($('#dialog_height').val());
            $('#dialog_item_edit').hide();
        });

        //微调取消
        $('#btn_dialog_cancel').on('click', function() {
            $('#dialog_item_edit').hide();
        });

        $('#submit').on('click', function() {
            $('#design_form').submit();
        });


        //layer弹出框
        $(".opt i.fa").click(function(){
            var left = $(this).prev("lable")
            layer.open({
                type: 1,
                btn: ['确认', '取消'],
                title: '<b>微调</b>',
                skin: 'layui-layer-rim', //加上边框
                area: ['300px', 'auto'], //宽高
                content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1"><input id="dialog_item_name" type="hidden" value="">' +
                '<table class="table">' +
                '<tr> ' +
                '<td class="text-r f-14" style="width: 80px;">左偏移量：</td>' +
                '<td class="text-l f-12"><input type="number" class="input-text " id="dialog_left" name="tem_name" id="wl_num" style="width: 100px;height: 24px;"><span class="err"></span></td> ' +
                '</tr>' +
                '<tr> ' +
                '<td class="text-r f-14" style="width: 80px;">上偏移量：</td>' +
                '<td class="text-l f-12"><input type="number" class="input-text " id="dialog_top" name="tem_name" id="wl_num" style="width: 100px;height: 24px;"><span class="err"></span></td> ' +
                '</tr>' +
                '<tr> ' +
                '<td class="text-r f-14" style="width: 80px;">高：</td>' +
                '<td class="text-l f-12"><input type="number" class="input-text " id="dialog_height" name="tem_name" id="wl_num" style="width: 100px;height: 24px;"><span class="err"></span></td> ' +
                '</tr>' +
                '<tr> ' +
                '<td class="text-r f-14" style="width: 80px;">宽：</td>' +
                '<td class="text-l f-12"><input type="number" class="input-text " id="dialog_width" name="tem_name" id="wl_num" style="width: 100px;height: 24px;"><span class="err"></span></td> ' +
                '</tr>' +
                '</table>'+
                '</form></div>',
                yes: function(){
                    var item_name = $('#dialog_item_name').val();
                    $('#div_' + item_name).css('left', $('#dialog_left').val() + 'px');
                    $('#div_' + item_name).css('top', $('#dialog_top').val() + 'px');
                    $('#div_' + item_name).css('width', $('#dialog_width').val() + 'px');
                    $('#div_' + item_name).css('height', $('#dialog_height').val() + 'px');
                    $('#left_' + item_name).val($('#dialog_left').val());
                    $('#top_' + item_name).val($('#dialog_top').val());
                    $('#width_' + item_name).val($('#dialog_width').val());
                    $('#height_' + item_name).val($('#dialog_height').val());
                    layer.closeAll();
                }, no: function(){}
            })
        })
        //微调弹出窗口
        $('[nctype="btn_item_edit"]').on('click', function() {
            var item_name = $(this).attr('data-item-name');
            $('#dialog_item_name').val(item_name);
            $('#dialog_left').val($('#left_' + item_name).val());
            $('#dialog_top').val($('#top_' + item_name).val());
            $('#dialog_width').val($('#width_' + item_name).val());
            $('#dialog_height').val($('#height_' + item_name).val());

        });
    });

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
