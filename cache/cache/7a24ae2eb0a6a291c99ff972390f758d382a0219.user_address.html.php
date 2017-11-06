<?php
/* Smarty version 3.1.29, created on 2017-09-22 15:21:58
  from "D:\www\yunjuke\application\vmall\views\user_address.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c4ba16084e55_67025217',
  'file_dependency' => 
  array (
    '7a24ae2eb0a6a291c99ff972390f758d382a0219' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_address.html',
      1 => 1506064904,
      2 => 'file',
    ),
    '5cea575055325e574f9e509e31fe0032e5018982' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1505370736,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59c4ba16084e55_67025217 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<link href="favicon.ico" rel="shortcut icon" />
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />
<meta content="成都云聚客科技有限公司" name="author" />
<meta content="Copyright 1999-2017. www.jukeyunduan.cn . All Rights Reserved." name="copyright" />
<meta name="application-name" content="云聚客" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/weui.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">

<script>
  (function(doc, win) {
    // 移动端REM自适应
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
          var clientWidth=docEl.clientWidth||320;
          var docCls = docEl.classList;
          var width = clientWidth < 320 ? 320 : clientWidth > 640 ? 640 : clientWidth;
          docEl.style.fontSize = 100 * (width / 320) + 'px';
          docEl.style.opacity=1;

          // 添加屏幕标识，便于文字调整
          if(375 <= clientWidth && clientWidth < 414){
            docCls.add('view6');
          }else if(414 <= clientWidth){
            docCls.add('view6s');
          }else{
            docCls.remove('view6');
            docCls.remove('view6s');
          }
        };
    docEl.style.opacity=0;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
    // IOS8下1px线条改为0.5px
    if (/iP(hone|od|ad)/.test(navigator.userAgent)) {
        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/),
            version = parseInt(v[1], 10);
        if(version >= 8){
            document.documentElement.classList.add('hairlines');
        }
    }
    })(document, window);








</script>
<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/weui1.css">
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
						<div class="weui-cells">
					<div class="weui-cell">
						<p>李刚</p>
						<p>15883974812</p>
					</div>
					<div class="weui-cell address">
						四川省 成都市 青羊区						4号						
					</div>
					<div class="weui-cell">
						<div>
								<label  class="active" >
									<input onclick="defaultAddrs(this)" type="radio" ua_ids="42" id="0addres" name="address" checked="checked" class='showLoadingToast'>
									<span style="vertical-align: middle;">默认地址</span><!-- onclick="updateAddrs(this)" -->
								</label>
						</div>
						<div>
							<span class="edit" style="margin-right: 5px;" name="42">
								<span class="addres-icon">&#xe611;</span>
								编辑
							</span>
							<span class="delete" name="42" default="1">
								<span class="addres-icon">&#xe6eb;</span>
								删除
							</span>
						</div>
					</div>
				</div>
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
	<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
	<script>
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

	</script>
</html>
<?php }
}
