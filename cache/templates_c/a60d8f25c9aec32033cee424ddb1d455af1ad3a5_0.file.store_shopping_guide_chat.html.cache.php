<?php
/* Smarty version 3.1.29, created on 2017-06-03 11:21:06
  from "D:\www\yunjuke\application\vmall\views\store_shopping_guide_chat.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59322b22db8f94_75391132',
  'file_dependency' => 
  array (
    'a60d8f25c9aec32033cee424ddb1d455af1ad3a5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\store_shopping_guide_chat.html',
      1 => 1496218311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59322b22db8f94_75391132 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2559659322b22be4321_86705071';
?>
<!doctype html>
<html lang="zh-cn" ng-app="demo"><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo base_url();?>
/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_nike_name'];?>
</title>
<link href="<?php echo TEMPLE;?>
css/framework7.ios.messages.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
rongcloude/css/jquery-rebox-0.1.0.css"/>
<link rel="stylesheet" href="<?php echo TEMPLE;?>
rongcloude/css/reset.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/framework7.ios.min.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/framework7.ios.colors.min.css">
<?php echo '<script'; ?>
>window["WEB_XHR_POLLING"] = true<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://cdn.ronghub.com/RongIMLib-2.1.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/framework7.min.js" type="text/javascript"><?php echo '</script'; ?>
>


    
    
<style>
    .toptextarea{position: fixed;width: 100%;height: 100%;background: rgba(0,0,0,.6);z-index: 5001;display: none;}
    .toptextarea textarea{box-sizing:border-box;width: 100%;padding: 4px 8px;border:1px solid #c8c8cd;height: 32px;line-height: 22px;}
    .message .message-text{font-size:15px;}
    /* iphone4 */
    @media screen and (device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2){
        .message .message-text{font-size:14px;}
    }
    /* iphone5 */
    @media screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2){
        .message .message-text{font-size:14px;}
    }
	.martop{
		margin-top: 120px;
	}
	.chat-content{
		width: 100%;
		overflow-y:scroll;
	}	
	.chat-left{
		margin-left: 10px;
		max-width: 60%;
		float: left;
		
	}
	.chat-right{
		max-width: 60%;
		margin-right: 10px;
		float: right;
		
		
	}
	#show { width: 770px; margin: 20px auto; background: #fff; padding: 5px; border: 1px solid #DDD; vertical-align: top; display: none;}
	.headimg-he{
		width: 33px;height: 33px;background: #4298E8;float: left;border-radius: 50%;
	}
	.headimg-me{
		width: 33px;height: 33px;background: #4298E8;float: right;border-radius: 50%;
	}
	.chat-input{
		position: fixed;
		bottom: 0;
		z-index:99;
	}
	.look{
		height: 120px;
		width: 100%;
		overflow-x: scroll;
		display: none;
	}
	.history{
		background: #d6d5d5;
		padding: 2px 8px;
		color: #fff;
		border-radius: 5px;
	}
</style>
</head>
    <body ng-controller="main">
		    <div class="salesInfo bdrbox" style="height: 100px;">
                <div class="wbox sales-info bdrbox">
                    <a href="../mall/salesProfile.htm?salesId=<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_id'];?>
" style="display:block;"><img src="<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['head_portrait'];?>
" class="size40 round"></a>
                    <div class="wbox-1 rel store-info">
                        <div class="sales">
                        	<span class="sales-name-box ell dib"><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_nike_name'];?>
</span>
                             <span class="onLineSatus c-8"></span>
                                                    </div>
                        <a href="../mall/getStoreHomePage.htm?storeId=191" class="store"><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['area_name'];
echo $_smarty_tpl->tpl_vars['guide_info']->value['store_name'];?>
</a>
                    </div>
                    <!-- <a href="javascript:;" class="c-gr" id="infoFlod">收起</a> -->
                                    </div>
                <div class="wbox chat-menus bdrbox">
                    <div class="wbox-1"><a class="inStore external" href="../index/index?storeId=<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_store_id'];?>
"><i class="iconfont"></i> 进入店铺</a></div>
                    <div class="wbox-1"><a class="inStore external" id="goTelephone" href="tel:<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_tel'];?>
"><i class="iconfont"></i> 致电导购</a></div>
                    <div class="wbox-1"><a class="newMsg external" href="user_chat_history?spg_id=<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_id'];?>
&user_id=<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
"><i class="iconfont"></i> 历史记录</a></div>
                </div>
            </div>
            
           
		  	
		  	
		  	<div style="width: 100%;height: 100%;margin-top: 64px;">
		  	<div class="views">
			  <!-- Your main view, should have "view-main" class -->
			  <div class="view view-main">
				<!-- Top Navbar-->

				<!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
				<div class="pages">
				  <!-- Page, "data-page" contains page name -->
				  <div data-page="index" class="page">
					<!-- Scrollable page content -->
				   <div class="page-content pull-to-refresh-content">
					  <div class="pull-to-refresh-layer">
						<div class="preloader"></div>
						<div class="pull-to-refresh-arrow"></div>
					  </div>
					  <div class="list-block media-list">
				<div class="chat-content well" style="margin-bottom:-3px;" id="chat-content">

				     <!--没有更多消息了-->
				     <div style="text-align: center;margin-bottom:20px;display:none" id="history"><span class="history">没有更多消息了</span></div>
				     <!--查看更多消息-->
				     <div style="text-align: center;margin-bottom:20px;display:none" id="readmore"><span class="history">查看更多消息</span></div>
				     <!--导购欢迎语-->
				     <div id="info_first" style="display:none"><img class="headimg-he" src="<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['head_portrait'];?>
"><div class="alert alert-info chat-left" style="padding: 5px;">欢迎光临<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['area_name'];
echo $_smarty_tpl->tpl_vars['guide_info']->value['store_name'];?>
。我是导购<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_nike_name'];?>
，很高兴为您服务!</div><div style="clear: both"></div></div>


				</div>
				
				</div>
				
			</div>
         
          </div>
          <div id="show"></div>
				<div class="bs-example bs-example-form chat-input">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default emotion" type="button" id="emot-look" style="padding: 1px 2px;"><img src="<?php echo TEMPLE;?>
rongcloude/images/look.png" alt="look" style="width: 30px;height: 30px;" id="look-img"></button>
						</span>
						<input type="text" class="form-control" id="saytext" name="saytext">
						<span class="input-group-btn">
							<button class="btn btn-primary sub_btn  submitbutton" type="button" id="btn">发送</button>
						</span>
					</div>
					<div class="look"></div>
				</div> 
        </div>
        <!-- Bottom Toolbar-->
       
      </div>
    </div>
			</div>	

		   
		
    </body>


<!-- 上传插件 -->
<?php echo '<script'; ?>
  src="<?php echo TEMPLE;?>
rongcloude/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
rongcloude/js/jquery.qqFace.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	
//	解决微信浏览器苹果手机输入框弹出遮挡输入框问题
	var bfscrolltop = document.body.scrollTop;//获取软键盘唤起前浏览器滚动部分的高度
    $("#saytext").focus(function(){//在这里‘input.inputframe’是我的底部输入栏的输入框，当它获取焦点时触发事件
        interval = setInterval(function(){//设置一个计时器，时间设置与软键盘弹出所需时间相近
        document.body.scrollTop = document.body.scrollHeight;//获取焦点后将浏览器内所有内容高度赋给浏览器滚动部分高度
        var h = (document.body.clientHeight-69).toString();
		$(".chat-content").css("height",h+"px");
        
        },200)
    }).blur(function(){//设定输入框失去焦点时的事件
        clearInterval(interval);//清除计时器
        var h = (document.body.clientHeight-130).toString();
		$(".chat-content").css("height",h+"px");
        document.body.scrollTop = bfscrolltop;将软键盘唤起前的浏览器滚动部分高度重新赋给改变后的高度
    });
    
var WEB_XHR_POLLING = true;
/**
* 初始化 SDK，在整个应用全局只需要调用一次。
* @param  {string} appKey  开发者后台申请的 AppKey，用来标识应用
*/
RongIMClient.init("<?php echo $_smarty_tpl->tpl_vars['getToken']->value['AppKey'];?>
");
// 设置连接监听状态 （ status 标识当前连接状态 ）// 连接状态监听器
RongIMClient.setConnectionStatusListener({
	onChanged : function(status) {
		switch (status) {
		//链接成功
		case RongIMLib.ConnectionStatus.CONNECTED:
		console.log('链接成功');
		break;
		//正在链接
		case RongIMLib.ConnectionStatus.CONNECTING:
		console.log('正在链接');
		break;
		//重新链接
		case RongIMLib.ConnectionStatus.DISCONNECTED:
		console.log('断开连接');
		break;
		//其他设备登陆
		case RongIMLib.ConnectionStatus.KICKED_OFFLINE_BY_OTHER_CLIENT:
		console.log('其他设备登陆');
		break;
		//网络不可用
		case RongIMLib.ConnectionStatus.NETWORK_UNAVAILABLE:
		console.log('网络不可用');
		break;
		}
	}
});

function openInfo(obj){
    alert(JSON.stringify(obj))
}

// 消息监听器
RongIMClient.setOnReceiveMessageListener({
	// 接收到的消息
	onReceived : function(message) {
		// 判断消息类型
		
		switch (message.messageType) {
			case RongIMClient.MessageType.TextMessage:
			// 发送的消息内容将会被打印
			//console.log(message.content.content);
			
			$(".well").append('<div><img class="headimg-he" src="<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['head_portrait'];?>
"><div class="alert alert-info chat-left" style="padding: 5px;">'+message.content.content+'</div><div style="clear: both"></div></div>');
			break;
			case RongIMClient.MessageType.VoiceMessage:
			// 对声音进行预加载                
			// message.content.content 格式为 AMR 格式的 base64 码
			RongIMLib.RongIMVoice.preLoaded(message.content.content);
			break;
			case RongIMClient.MessageType.ImageMessage:
			// do something...
			break;
			case RongIMClient.MessageType.DiscussionNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.LocationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.RichContentMessage:
			// do something...
			break;
			case RongIMClient.MessageType.DiscussionNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.InformationNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.ContactNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.ProfileNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.CommandNotificationMessage:
			// do something...
			break;
			case RongIMClient.MessageType.CommandMessage:
			// do something...
			break;
			case RongIMClient.MessageType.UnknownMessage:
			// do something...
			break;
			default:
			// 自定义消息
			// do something...
		}
	}
});




var userId = "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['userId'];?>
";
var token  = "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['token'];?>
";
//注意此ID 必须和token对应 
//关于token怎么生成 请查看我的微博记录
//d2相当于 我传给融云一个标识  他给我反应 对应这个标记的 token  
// 连接融云服务器。
RongIMClient.connect(token, {
	onSuccess : function(userId) {
		console.log("Login successfully." + userId);
	},
	onTokenIncorrect : function() {
		console.log('token无效');
	},
	onError : function(errorCode) {
		var info = '';
		switch (errorCode) {
			case RongIMLib.ErrorCode.TIMEOUT:
			info = '超时';
			break;
			case RongIMLib.ErrorCode.UNKNOWN_ERROR:
			info = '未知错误';
			break;
			case RongIMLib.ErrorCode.UNACCEPTABLE_PaROTOCOL_VERSION:
			info = '不可接受的协议版本';
			break;
			case RongIMLib.ErrorCode.IDENTIFIER_REJECTED:
			info = 'appkey不正确';
			break;
			case RongIMLib.ErrorCode.SERVER_UNAVAILABLE:
			info = '服务器不可用';
			break;
		}
		alert(errorCode);
	}
});


//发送数据   次数ID标识 就相当于  你传给融云的那个标识  
function sendInfo(id,c) {
var msg = new RongIMLib.TextMessage({content:c,user:{id:"<?php echo $_smarty_tpl->tpl_vars['getToken']->value['userId'];?>
",name:"<?php echo $_smarty_tpl->tpl_vars['getToken']->value['user_name'];?>
",portraitUri:"<?php echo $_smarty_tpl->tpl_vars['getToken']->value['portraitUri'];?>
"}});
//var msg = new RongIMLib.TextMessage({
//	content : c,
//	extra : "附加信息"
//});
//或者使用RongIMLib.TextMessage.obtain 方法.具体使用请参见文档
//var msg = RongIMLib.TextMessage.obtain("hello");
var conversationtype = RongIMLib.ConversationType.PRIVATE; // 私聊
var targetId = "<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_ids'];?>
"; // 目标 Id  注意"p" + id;的值 必须是已经传给我融云 并且生成了token的
RongIMClient.getInstance().sendMessage(conversationtype, targetId, msg,{
	// 发送消息成功
	onSuccess : function(message) {
		//message 为发送的消息对象并且包含服务器返回的消息唯一Id和发送消息时间戳
		console.log("Send successfully");
      },
	onError : function(errorCode, message) {
		var info = '';
		switch (errorCode) {
			case RongIMLib.ErrorCode.TIMEOUT:
			info = '超时';
			break;
			case RongIMLib.ErrorCode.UNKNOWN_ERROR:
			info = '未知错误';
			break;
			case RongIMLib.ErrorCode.REJECTED_BY_BLACKLIST:
			info = '在黑名单中，无法向对方发送消息';
			break;
			case RongIMLib.ErrorCode.NOT_IN_DISCUSSION:
			info = '不在讨论组中';
			break;
			case RongIMLib.ErrorCode.NOT_IN_GROUP:
			info = '不在群组中';
			break;
			case RongIMLib.ErrorCode.NOT_IN_CHATROOM:
			info = '不在聊天室中';
			break;
			default:
			info = x;
			break;
		}
		console.log('发送失败:' + info);
	}
});
} 

$("#btn").click(function(){
	var str = $("#saytext").val();
	$("#show").html(replace_em(str));
	sendInfo(2,$("#show").html());
	var urls = "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['portraitUri'];?>
";
	$(".well").append('<div><img class="headimg-me" src="'+urls+'"><div class="alert alert-info chat-right" style="padding: 5px;">'+$("#show").html()+'</div><div style="clear: both"></div></div>');
	
	setTimeout(function(){$("#saytext").val("")},20);
	
	var d = document.getElementById("chat-content");
	var c = d.scrollHeight-d.clientHeight;
	$("#chat-content").scrollTop(c);
	
	//保存聊天消息
	var data = $("#show").html();
	var userid =    "<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
";
	var spg_id =	"<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_id'];?>
";
	$.ajax({
		type : "POST",
		url  : "add_chat_log",
		data : {
			    "content" : data,
			    "userid" : userid,
			    "spg_id" : spg_id,
			    "flag":"user"
			   },
	   dataType : "json",
	   success  : function(data) {
	   		}
	});
})


	
$(function(){
	get_chat_log();
});

var myApp = new Framework7();
var $$ = Dom7;
var ptrContent = $$('.pull-to-refresh-content');
myApp.destroyPullToRefresh(ptrContent);
	
	$('#chat-content').scroll(function(){
	
		if($('#chat-content').scrollTop()==0){
			myApp.initPullToRefresh(ptrContent);
		}else{
			myApp.destroyPullToRefresh(ptrContent);
		}
	})
	

ptrContent.on('refresh',function(){

	// Emulate 2s loading
	setTimeout(function () {
		// Random image

		get_chat_log();
		// When loading done, we need to reset it
		myApp.pullToRefreshDone();
	}, 100);


})
var page = 1;
function get_chat_log(){
	var userid =    "<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
";
	var spg_id =	"<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_id'];?>
";
	$.ajax({
		type : "POST",
		url  : "get_chat_log",
		data : {
			    "userid" : userid,
			    "spg_id" : spg_id,
			    "page": page,
			   },
	   dataType : "json",
	   success  : function(data) {
		        var		userheadimg = "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['portraitUri'];?>
";
    					spgheadimg = "<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['head_portrait'];?>
";
		       	if(data.state){
		       		var list = data.data;
	        			str ='';
	        			send_time1 = 0;
	        			send_time2 = 0;
	        			$.each(list,function(k,v){
	        				if(k==0){
	        					send_time1 = v.send_time;
	        				}else{
	        					send_time2 = v.send_time;
	        				}
        				   if(send_time2-send_time1>60000){
	        		        	str+='<div style="text-align: center;margin-bottom:20px;"><span class="history">'+v.send_times+'</span></div>';
	        		        }
	        		        if(v.source==1){
	      					    str+='<div><img class="headimg-me" src="'+userheadimg+'"><div class="alert alert-info chat-right" style="padding: 5px;" logtime='+v.send_time+'>'+v.send_content+'</div><div style="clear: both"></div></div>';
	      			        }else{
	      			        	str+='<div><img class="headimg-he" src="'+spgheadimg+'"><div class="alert alert-info chat-left" style="padding: 5px;" logtime='+v.send_time+'>'+v.send_content+'</div><div style="clear: both"></div></div>';
	      			        }
	        		      
	        		        send_time1 = send_time2;
	        			});
	        			$("#info_first").after(str);
	        			$("#readmore").css("display","block");
	        			
		       	}else{
		       		$("#readmore").css("display","none");
		       		$("#history").css("display","block");
		       	}
		
	   	 }
	});
	page=page+1;
}


$(function(){
//	中间显示屏幕高度适应
	
	var h = (document.body.clientHeight-130).toString();
	$(".chat-content").css("height",h+"px");
	
	$(window).resize(function(){
   		var h = (document.body.clientHeight-130).toString();
		$(".chat-content").css("height",h+"px");
	});
	var img = "<?php echo TEMPLE;?>
rongcloude/images/look.png";
	var keyword = "<?php echo TEMPLE;?>
rongcloude/images/keyboard.png"
	
	$("#emot-look").click(function(){
		$(".look").toggle();
		if($(".look").css("display")=="none"){
			$("#look-img").attr("src",img);
		}else{
			$("#look-img").attr("src",keyword);
		}
			
		var h = (document.body.clientHeight-$(".chat-input").height()-100).toString();
		$(".chat-content").css("height",h+"px");
		})

	$('.emotion').qqFace({
		id : 'facebox', 
		assign:'saytext', 
		path:'<?php echo TEMPLE;?>
rongcloude/arclist/'	//表情存放的路径
	});

	$(".sub_btn").click(function(){
		var str = $("#saytext").val();
		$("#show").html(replace_em(str));
	});

});

//查看结果
function replace_em(str){
	str = str.replace(/\</g,'&lt;');
	str = str.replace(/\>/g,'>');
	str = str.replace(/\n/g,'<br/>');
	str = str.replace(/\[em_([0-9]*)\]/g,'<img src="<?php echo TEMPLE;?>
rongcloude/arclist/$1.gif" border="0" />');
	return str;
}



	<?php echo '</script'; ?>
>
</html><?php }
}
