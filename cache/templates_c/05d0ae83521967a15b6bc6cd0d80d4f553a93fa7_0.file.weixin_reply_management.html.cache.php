<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:31:38
  from "D:\www\yunjuke\application\admin\views\weixin_reply_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980204a13fd19_98710048',
  'file_dependency' => 
  array (
    '05d0ae83521967a15b6bc6cd0d80d4f553a93fa7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\weixin_reply_management.html',
      1 => 1496923836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5980204a13fd19_98710048 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2386259802049e38196_23796702';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css" />
	<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/H-ui.min.js"><?php echo '</script'; ?>
>
  	<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-ui.js"><?php echo '</script'; ?>
>
<style>
	.addtext{
		position: fixed;
		top: 30%;
		left: 15%;
		right: 0;
		margin:  0 auto;
		width: 505px;
		height: 190px;
		padding: 5px;
		border: 1px solid #929292;
		border-radius: 5px;
		background: #fff;
	}
	
	.addlink{
		position: fixed;
		top: 30%;
		left: 0;
		right: 0;
		margin:  0 auto;
		width: 505px;
		height: 170px;
		padding: 5px;
		border: 1px solid #929292;
		border-radius: 5px;
		background: #fff;
	}
	.addarticle{
		position: absolute;
		top: -20px;
		left: 305px;
		margin:  0 auto;
		width: 505px;
		min-height: 200px;
		padding: 15px;
		border: 1px solid #929292;
		border-radius: 5px;
		background: #fff;
		z-index: 9000;
	}
	.mainImg{
		width: 270px;
		height: 135px;
	}
	.mainTitle{
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 32px;
		line-height: 32px;
		color: #fff;
		background: #777777;
		text-indent: 10px;
		overflow: hidden;
		text-align: center
	}
	.msg-item{
		position: relative;
		padding: 10px 0;
		border-bottom: 1px solid #e3e3e3;
	}
	.mainMsg{
		height: 135px;
	}
	#form_email-guide a{
		display: block;
		width: 270px;
		overflow: hidden;
		position: relative;
		color: #333;
	}
	.fn-left{
		float: left;
		padding-top: 5px;
	}
	.msg-item .simage{
		width: 48px;
		height: 48px;
	}
	.fn-right{
		float: right;
	}
	.actionTipCover{
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		text-align: center;
		line-height: 48px;
		display: none;
		background: #fff;
		opacity: 0.8;
	}
	.actionCover{
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: #fff;
		text-align: center;
		line-height: 48px;
		font-size: 22px;
		display: none;
		opacity: 0.8;
	}
	.actionCover i{
		margin: 0 10px;
	}
	.msgBox .newMsg{
		text-align: center;
		background: #f3f3f3;
		line-height: 58px;
		color: #999;
		border: 1px dashed #ddd;
		margin: 10px 0 0;
		height: 58px;
		font-size: 18px;
	}
	.msgBox .newMsg:hover{
		border: 1px dashed #4F4F4F;color: #4F4F4F;
	}
	.fn-tip{
		color: #999;
		line-height: 1.3;
		padding-top: 7px;
		text-align: center;
		font-size: 14px;
	}
	.loadpic{
		width: 80px;height:80px;position: absolute;top:0;left:0;
		background: #fff;
		z-index: 5;
		opacity: 0.2;
		text-align: center;
		line-height: 80px;
		border: 1px dashed #6A6969;
	}
	.col-xsxs{
		    float: left;
	    min-height: 1px;
	    position: relative;
	    padding-left: 15px;
	    box-sizing: border-box;
	    transition: all 0.3s ease-in;
	}
	.longs{
	    width: 390px;
	    height: 80px;
	    padding: 5px 10px;
	    font-size: 14px;
	    line-height: 1.8;
	    color: #555;
	    background-color: #fff;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-sizing: border-box;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>微信自动回复设置</h3>
        <h5>设置微信自动回复</h5>
      </div>
       <ul class="tab-base nc-row">
        <li><a href="JavaScript:void(0);" class="current" id="menu-public">关注公众号自动回复</a></li>
        <li><a href="JavaScript:void(0);" id="menu-guide">导购拉粉及绑定微信回复</a></li>
      </ul>
      </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
		<li> 回复场景:用户关注公众号的微信回复消息。</li>
    </ul>
  </div>
  <form method="post" id="form_email-public" action="setting" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
       <div class="msgBox" style="height:320px;">
				<img src="https://qncdn.qiakr.com/mall/default-photo.png" class="supplierPhoto">
				<div class="supplierMsg"><div class="cont"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div><i class="iconfont"></i></div>
			</div>
			<div class="msgTipBox">
				<div class="tip">
					<b>回复场景:</b>
					<p>用户关注公众号的微信回复消息。</p>
				</div>
				<div class="toolBar ml30 mt20 mb5">
					<a href="javascript:;" class="insertLink db" id="open-link"><i class="Hui-iconfont-link"></i>添加链接</a>
				    <a href="javascript:;" class="insertLink db" id="open-text"><i class="Hui-iconfont Hui-iconfont-link"></i>添加纯文本</a>
				</div>
				<textarea class="long ml30" name="content" id="welcomeWordsArea"></textarea>
		
		
<!--弹出添加纯文本框-->		
	<div class="addtext form form-horizontal" style="display: none">
			<div class="row c1">
				<label class="form-label col-xsxs" style="font-size: 15px;color:#8A8A8A">文字：</label>
				<div class="formControls col-xs-10">
				    <textarea class="long" name="addtext" id="addtext"></textarea>
				</div>
			</div>
			<div style="clear: both"></div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-8">
					<a class="btn btn-default radius" id="text-can">取消</a>
					<a class="btn btn-primary radius" id="text-add">提交</a>
				</div>
			</div>
		</div>		
		
		
		
		
		
		
		
		
		
		
				
<!--				弹出添加链接框-->
		<div class="addlink form form-horizontal" style="display: none">
			<div class="row c1">
				<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">文字：</label>
				<div class="formControls col-xs-10">
					<input type="text" class="input-text radius size-M">
				</div>
			</div>
			<div style="clear: both"></div>
			<div class="row c1" style="margin-top: 10px;">
				<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">链接：</label>
				<div class="formControls col-xs-10">
					<input type="text" class="input-text radius size-M" placeholder="http://">
				</div>
			</div>
			<div style="clear: both"></div>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-8">
					<a class="btn btn-default radius" id="link-can">取消</a>
					<a class="btn btn-primary radius" id="link-add">提交</a>
				</div>
			</div>
		</div>
		
		
<!--		弹出添加链接框结束-->
		
			</div>
			</div>
     
      <div class="bot col-xs-4 col-xs-offset-4"><a href="JavaScript:void(0);" class="btn btn-success radius" onclick="guanzhu_reply()" id="getup">确认保存</a></div>
    </div>
  </form>
  <form  id="form_email-guide"  name="settingForm" style="display: none">
    	<div class="ncap-form-default">
       		<div class="msgBox draggable ui-widget-content" style="min-height:300px;margin-left: 10px;margin-bottom: 400px;">
				<ul class="show cont ui-sortable" id="msgList" style="font-size: 14px;">
				
					<li class="msg-item" id="strnum1">
						<a href="javascript:;" class="mainMsg">
							<img id="strnum1img"src="<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['PicUrl'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['PicUrl'];
} else {
echo TEMPLE;?>
images/defaultStoreImg.jpg<?php }?>" class="mainImg image">
							<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['Title'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['Title'];
}?>" id = "strnum1Title" name="strnum1Title">
							<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['PicUrl'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['PicUrl'];
}?>" id = "strnum1PicUrl" name="strnum1PicUrl">
							<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['Url'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['Url'];
} else { ?>http://www.jukeyunduan.com/vmall.php/index<?php }?>" id = "strnum1Url" name="strnum1Url">
							<input type="text" style="display:none" value="1" id = "strnum1PicUrltype" name="strnum1PicUrltype">
							<input type="text" style="display:none" value="1" id = "strnum1Urltype" name="strnum1Urltype">
							<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['Description'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['Description'];
}?>" id = "strnum1Description" name="strnum1Description">
							<div class="mainTitle fn-left" style="padding: 0" id = "strnum1divTitle"><?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[0]['Title'])) {
echo $_smarty_tpl->tpl_vars['newcontents']->value[0]['Title'];
} else { ?>欢迎来到[导购所属门店名称]<?php }?></div>
							<div class="actionCover" style="line-height: 134px;"><i class="Hui-iconfont-feedback2"><img src="<?php echo TEMPLE;?>
images/write.png"/></i></div>
						</a>
					</li>
					
					<li class="msg-item" id="strnum2">
						<a href="javascript:;">
							<div class="fn-left" id = "strnum2divTitle">我是您的服务顾问[导购名称]</div>
							<input type="text" style="display:none" value="" id = "strnum2Title" name="strnum2Title">
							<input type="text" style="display:none" value="" id = "strnum2PicUrl" name="strnum2PicUrl">
							<input type="text" style="display:none" value="http://www.jukeyunduan.com/vmall.php/index" id = "strnum2Url" name="strnum2Url">
							<input type="text" style="display:none" value="1" id = "strnum2PicUrltype" name="strnum2PicUrltype">
							<input type="text" style="display:none" value="1" id = "strnum2Urltype" name="strnum2Urltype">
							<input type="text" style="display:none" value="" id = "strnum2Description" name="strnum2Description">
							<img id="strnum2img" src="<?php echo TEMPLE;?>
images/defaultStoreImg.jpg" alt="" class="simage image fn-right">
							<div class="actionTipCover">该信息不能被编辑</div>
						</a>
					</li>
					
					
					<div id="article-add">
					<?php if (!empty($_smarty_tpl->tpl_vars['newcontents']->value[1])) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['newcontents']->value[1];
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
						<li class="msg-item" id="strnum3">
							<a href="javascript:;">
								<div class="fn-left" id = "strnum3divTitle"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['Title'])) {
echo $_smarty_tpl->tpl_vars['val']->value['Title'];
} else { ?>查看本店最新促销新品<?php }?></div>
								<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['Title'])) {
echo $_smarty_tpl->tpl_vars['val']->value['Title'];
}?>" id = "strnum3Title" name="strnum3Title">
								<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['PicUrl'])) {
echo $_smarty_tpl->tpl_vars['val']->value['PicUrl'];
}?>" id = "strnum3PicUrl" name="strnum3PicUrl">
								<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['Url'])) {
echo $_smarty_tpl->tpl_vars['val']->value['Url'];
} else { ?>http://www.jukeyunduan.com/vmall.php/index<?php }?>" id = "strnum3Url" name="strnum3Url">
								<input type="text" style="display:none" value="1" id = "strnum3PicUrltype" name="strnum3PicUrltype">
								<input type="text" style="display:none" value="1" id = "strnum3Urltype" name="strnum3Urltype">
								<input type="text" style="display:none" value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['Description'])) {
echo $_smarty_tpl->tpl_vars['val']->value['Description'];
}?>" id = "strnum3Description" name="strnum3Description">
								<img  id="strnum3img" src="<?php echo TEMPLE;?>
images/defaultImg.png" alt="" class="simage image fn-right">
								<div class="actionCover">
									<i class="Hui-iconfont-feedback2"><img src="<?php echo TEMPLE;?>
images/write.png"/></i>
									<i class="Hui-iconfont-del3"><img src="<?php echo TEMPLE;?>
images/delete.png"/></i>
									<i class="Hui-iconfont-menu move"><img src="<?php echo TEMPLE;?>
images/drag.png"/></i>
								</div>
							</a>
						</li>
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
					<?php }?>
					
					</div>
				</ul>
				<a href="javascript:;" class="newMsg" id="addNewMsg">
					<i class="Hui-iconfont-add"><img src="<?php echo TEMPLE;?>
images/add.png"/></i>
				</a>
				<div class="fn-tip">您还可以添加<span id="leftMsgCount">5</span>篇文章</div>
			</div>
			<div class="msgTipBox">
				<div class="tip">
					<b>回复场景:</b>
					<p>1.未关注用户微信扫描导购二维码关注公众号，并绑定导购。<br>
					   2.已关注用户微信扫描导购二维码绑定导购。
					</p>
				</div>
				<div style="row">
					<div class="bot col-xs-8 col-xs-offset-2"><span class="btn btn-secondary radius" id="restoreform">还原初始设置</span><span class="btn btn-success radius" id="submitform" style="margin-left: 5px;">保存设置</span></div>
				</div>
			</div>
		</div>
    </div>
  </form>
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
<?php echo '<script'; ?>
>
  var ids = "";
	$("ul").on("click",".Hui-iconfont-feedback2",function(){
		ids = $(this).parent().parent().parent().attr("id");
		$(this).parent().parent().parent().append(
		'<div class="addarticle form form-horizontal">\
			<div class="row c1">\
				<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">标题：</label>\
				<div class="formControls col-xs-10">\
					<input type="text" class="input-text radius size-M" id="artic-title" placeholder="查看本店最新促销新品">\
				</div>\
			</div>\
			<div style="clear: both"></div>\
			<div class="row c1">\
			<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">描述：</label>\
			<div class="formControls col-xs-10">\
			      <textarea class="longs" name="Description" id="artic-Description"></textarea>\
			</div>\
		</div>\
		<div style="clear: both"></div>\
			<div class="row c1" style="margin-top: 10px;">\
				<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">图片：</label>\
				<div class="formControls col-xs-10">\
					<span class="select-box">\
						<select name="pic" id="pic" class="select" style="height: 25px;">\
							<option value="1" selected>导购所属门店店招</option>\
							<option value="2">自定义图片</option>\
						</select>\
					</span>\
				</div>\
			</div>\
			<div style="clear: both"></div>\
			<div class="row c1" id="loadpic" style="display: none">\
				<div class="formControls col-xs-10 col-xs-offset-2">\
					<span class="btn-upload form-group" style="height: 100px;width: 100px;position: relative">\
						<span class="upload-btn"><img id="loadpicimg" src="<?php echo TEMPLE;?>
images/defaultImg.png" style="width: 80px;height: 80px;"></span>\
						<form method="post" enctype="multipart/form-data" name="formloadpic"  id="btn-uploadform">\
							<input type="file" class="input-file" id="filepic" name="loadpic">\
							<label for="filepic" class="loadpic">点击上传</label>\
						</form>\
						</span>\
					<p style="color: #A2A2A2">建议400KB以下的图片（jpg/jpeg/png），建议尺寸200*200</p>\
				</div>\
			</div>\
			<div style="clear: both"></div>\
			<div class="row c1" style="margin-top: 10px;">\
				<label class="form-label col-xs-2" style="font-size: 15px;color:#8A8A8A">链接：</label>\
				<div class="formControls col-xs-10">\
					<span class="select-box">\
						<select name="articlepic" id="articlelink" class="select" style="height: 25px;">\
							<option value="1" selected>自定义链接</option>\
							<option value="2">微商城首页</option>\
							<option value="3">个人中心</option>\
							<option value="4">我的导购</option>\
							<option value="5">我的订单</option>\
						</select>\
					</span>\
				</div>\
			</div>\
			<div style="clear: both"></div>\
			<div class="row c1" id="zi">\
				<div class="formControls col-xs-10 col-xs-offset-2">\
					<input type="text" class="input-text radius size-M" id="article_link" placeholder="http://">\
				</div>\
			</div>\
			<div style="clear: both"></div>\
			<div class="row">\
				<div class="col-xs-4 col-xs-offset-8">\
					<div class="btn btn-default radius" id="cancel-article">取消</div>\
					<div class="btn btn-primary radius" id="add-article">确定</div>\
				</div>\
			</div>\
		</div>')
	})
	

	$("body").on("change",".btn-upload .input-file",function(){
		var form = document.getElementById("btn-uploadform");
	     var form_data =new FormData(form);
		 $.ajax({
				type: "POST",
		        url: "weixin_set_onload",
		        data: form_data,
		        dataType: "json",
		        processData: false,
	            contentType: false,
		        success: function(data){
		        	    if(data.state){
		        	    	$("#"+ids+"PicUrl").attr("value","<?php echo TEMPLE;?>
images/"+data.msg);
		        	    	$("#"+ids+"img").attr("src","<?php echo TEMPLE;?>
images/"+data.msg);
		        	    }else{
		        	    	layer.msg(data.msg);
		        	    }
		        }
			})
			
		
	})

	
	 
		var arr = '';
		var sort = $( "#article-add" ).sortable({
			handle: ".move",
			opacity: 0.7,
			delay: 150,
			cursor:'move',
			revert: true,
			stop:function(){
	 //记录sort后的id顺序数组
			var arr = $( "#article-add" ).sortable('toArray');
				console.log(arr);
	//拖拽后利用localStorage记录顺序
				localStorage.arr = arr;
			}
		});
		var localSt = localStorage.arr;
		//如果有localst记录则，按照这个进行排序元素
		if(localSt){
			var resArr = localSt.split(',');
			var resUl = $('ul');
			//li 数组
			for(var i = 0;i < resArr.length;i++){
				resUl.append($("#" + resArr[i]));
			}
		}
	
	
	
//	确定添加
	$("ul").on("click","#add-article",function(){
		var title = $("#artic-title").val();
		var Description = $("#artic-Description").val();
		var pictype = $("#pic").val();
		var link = $("#article_link").val();
		var linktype = $("#articlelink").val();
		$("#"+ids+"divTitle").html(title);
		$("#"+ids+"Title").attr("value",title);
		$("#"+ids+"Description").attr("value",Description);
		$("#"+ids+"PicUrltype").attr("value",pictype);
		$("#"+ids+"Urltype").attr("value",linktype);
		$("#"+ids+"Url").attr("value",link);
		
		//$(this).parent().parent().parent().parent().find(".fn-left").html(title);
		$(this).parent().parent().parent().remove();
	})
	
	$("ul").on("click","#cancel-article",function(){
		$(this).parents("li:eq(0)").find("div:eq(1)").hide();
		$(".addarticle").remove();
		
	})
	
	
//	添加文章选择自定义链接下面出现文本框
	$("ul").on("change","#articlelink",function(){
		if($("#articlelink").val()==1){
			$("#zi").show();
		}else{
			$("#zi").hide();
		}
	})
	
	$("ul").on("change","#pic",function(){
		if($("#pic").val()==2){
			$("#loadpic").show();
		}else{
			$("#loadpic").hide();
		}
	})
	
//	鼠标滑过显示操作面板
	$("ul").on("mousemove",".msg-item",function(){
		$(this).find("div:eq(1)").show();
	})
	$("ul").on("mouseout",".msg-item",function(){
		$(this).find("div:eq(1)").hide();
	})
	
//	添加文章
	var n=5;
	var m=4;
	$("#addNewMsg").click(function(){
		$("#article-add").append(
		'<li class="msg-item" id="strnum'+m+'">\
			<a href="javascript:;">\
				<div class="fn-left" id = "strnum'+m+'divTitle" ></div>\
				<input type="text" style="display:none" value="" id = "strnum'+m+'Title" name="strnum'+m+'Title">\
				<input type="text" style="display:none" value="" id = "strnum'+m+'PicUrl" name="strnum'+m+'PicUrl">\
				<input type="text" style="display:none" value="http://www.jukeyunduan.com/vmall.php/index" id = "strnum'+m+'Url" name="strnum'+m+'Url">\
				<input type="text" style="display:none" value="1" id = "strnum'+m+'PicUrltype" name="strnum'+m+'PicUrltype">\
				<input type="text" style="display:none" value="1" id = "strnum'+m+'Urltype" name="strnum'+m+'Urltype">\
				<input type="text" style="display:none" value="" id = "strnum'+m+'Description" name="strnum'+m+'Description">\
				<img id="strnum'+m+'img" src="<?php echo TEMPLE;?>
images/defaultImg.png" alt="" class="simage image fn-right">\
				<div class="actionCover">\
					<i class="Hui-iconfont-feedback2"><img src="<?php echo TEMPLE;?>
images/write.png"/></i>\
					<i class="Hui-iconfont-del3"><img src="<?php echo TEMPLE;?>
images/delete.png"/></i>\
					<i class="Hui-iconfont-menu move"><img src="<?php echo TEMPLE;?>
images/drag.png"/></i>\
				</div>\
			</a>\
		</li>'
		)
		n--;
		m++;
		$("#leftMsgCount").html(n);
		if(n==0){
			$("#addNewMsg").hide();
		}
	})
	$("ul").on("click",".Hui-iconfont-del3",function(){
		$(this).parent().parent().parent().remove();
		n++;
		$("#leftMsgCount").html(n);
		if(n>0){
			$("#addNewMsg").show();
		}
	})
	
//	打开链接弹出框s
	$("#open-link").click(function(){
		$(".addlink").fadeIn(200);
	})
	$("#link-can").click(function(){
		$(".addlink").hide();
	})
	
	
	
	//	打开文本弹出框
	$("#open-text").click(function(){
		$(".addtext").fadeIn(200);
	})
	$("#text-can").click(function(){
		$(".addtext").hide();
	})
	
	
	
	//	点击提交添加文本
	$("#text-add").click(function(){
		var addcontent = $("#addtext").val();
		var old = $("#welcomeWordsArea").val();
		var newcontent = old+addcontent;
		$("#welcomeWordsArea").val(newcontent);
		$("#linkcontent").html(newcontent);
		$(".addtext").hide();
	})
	
	
	
	
//	点击提交添加链接
	
	$("#link-add").click(function(){
		var addcontent = $(".addlink input:eq(0)").val();
		var addhref = $(".addlink input:eq(1)").val();
		var old = $("#welcomeWordsArea").val();
		var newcontent = old+'<a href="'+addhref+'">'+addcontent+'</a>';
		$("#welcomeWordsArea").val(newcontent);
		var i = $("#welcomeWordsArea").val().split("</a>").length;
		var linkcontent;
		for(var c=0;c<i-1;c++){
			linkcontent+=$("#welcomeWordsArea").val().split("</a>")[c].split(">")[1];
		}
		$("#linkcontent").html(linkcontent);
		$(".addlink").hide();
	})
	
	
	$("#welcomeWordsArea").keydown(function(){
		var i = $("#welcomeWordsArea").val().split("</a>").length;
		var linkcontent;
		for(var c=0;c<i-1;c++){
			linkcontent+=$("#welcomeWordsArea").val().split("</a>")[c].split(">")[1];
		}
		$("#linkcontent").html(linkcontent);
	
		
	})
	
	
	
	$("#menu-guide").click(function(){
		$(".current").removeClass("current");
		$(this).addClass("current");
		$("#form_email-public").css("display","none");
		$("#form_email-guide").css("display","block");
	})
	$("#menu-public").click(function(){
		$(".current").removeClass("current");
		$(this).addClass("current");
		$("#form_email-guide").css("display","none");
		$("#form_email-public").css("display","block");
	})
	
  function guanzhu_reply(){
	  var form_data =  $("#form_email-public").serialize();
	  $.ajax({
			type:'POST',
			data : form_data,
			url:'guanzhu_reply',
			success:function(data){
		          if(data.state=='403'){
					login_ajax('shopadmin',data);
				  }
				 layer.msg(data.msg);
				 setTimeout("location.reload()",1000);
			},
			dataType:'json'
		});
	  
  }
	
	//保存设置
	$("body").on("click","#submitform",function(){
		form_data = $("#form_email-guide").serialize();
		console.log(form_data)
		$.ajax({
			type: "post",
	        url: "weixin_set_daogou",
	        data: form_data,
	        dataType: "json",
	        success: function(data){
	        		layer.msg(data.msg);
	        		setTimeout("location.reload()",1000);
	        }
		})
	})
	
	//还原设置
	$("body").on("click","#restoreform",function(){
		$.ajax({
			type: "post",
	        url: "weixin_set_daogouinof",
	        data: "",
	        dataType: "json",
	        success: function(data){
	        		layer.msg(data.msg);
	        		setTimeout("location.reload()",1000);
	        }
		})
	})

	
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
