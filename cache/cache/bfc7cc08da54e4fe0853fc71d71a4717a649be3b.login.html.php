<?php
/* Smarty version 3.1.29, created on 2017-11-01 13:41:00
  from "D:\www\yunjuke\application\admin\views\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f95e6cbb7aa2_49422724',
  'file_dependency' => 
  array (
    'bfc7cc08da54e4fe0853fc71d71a4717a649be3b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\login.html',
      1 => 1498098958,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59f95e6cbb7aa2_49422724 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <title>登录</title>

    <link href="http://[::1]/yunjuke/application/admin/views/css/login.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
	<script type="text/javascript" src="http://[::1]/yunjuke//plugins/layer/layer.js"></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/jquery.js" type="text/javascript"></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/common.js" type="text/javascript"></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/jquery.tscookie.js" type="text/javascript" type="text/javascript"></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/jquery.supersized.min.js" ></script>
    <script src="http://[::1]/yunjuke/application/admin/views/js/jquery.progressBar.js" type="text/javascript"></script>



</head>
<body>

<div class="login-layout">
    <div class="top">
        <h5>聚客电商新零售管理中心<em></em></h5>

        <h2>在线多门店线上线下管理中心</h2>
        <h6>商城&nbsp;&nbsp;|&nbsp;&nbsp;微商城&nbsp;&nbsp;|&nbsp;&nbsp;导购&nbsp;&nbsp;|&nbsp;&nbsp;收银台&nbsp;&nbsp;|&nbsp;&nbsp;手机端</h6>
    </div>
    <form method="post" id="form_login">
        <input type="hidden" name="formhash" value="AIDYEogVwJTVFJyjsT2R8su35vsv6FZ"> <input type="hidden" name="form_submit" value="ok">
        <input type="hidden" name="SiteUrl" id="SiteUrl" value="">

        <div class="lock-holder">
            <div class="form-group pull-left input-username">

                <label>账号</label>
                <input name="user_name" id="user_name" autocomplete="off" type="text" class="input-text" value=""
                       required="">

            </div>
            <i class="fa fa-ellipsis-h dot-left"></i> <i class="fa fa-ellipsis-h dot-right"></i>

            <div class="form-group pull-right input-password-box">
                <label>密码</label>
                <input name="password" id="password" class="input-text" autocomplete="off" type="password" required=""
                       pattern="[\S]{6}[\S]*" title="密码不少于6个字符">
            </div>
        </div>
        <div class="avatar"><img src="http://[::1]/yunjuke/application/admin/views/img/login_pic.png" alt=""></div>
        <div class="submit"> <span>
      <div class="code">
          <div class="arrow"></div>
          <div class="code-img">
          <a href="javascript:void(0)" nctype="btn_change_seccode"><img
									src="verify_image?t=116635778" name="codeimage"
									border="0" id="codeimage"></a>
          </div>
          <a href="JavaScript:void(0);" id="hide" class="close" title="关闭"><i></i></a><a href="JavaScript:void(0);" onclick="change_seccode()" class="change" title="看不清,点击更换验证码"><i></i></a>
      </div>
      <input name="captcha" type="text" required="" class="input-code" id="captcha" placeholder="输入验证"
             pattern="[A-z0-9]{4}" title="验证码为4个字符" autocomplete="off" value="">
      </span> <span>
      <input name="nchash" type="hidden" value="374bd9bd">
      <input name="" class="input-button btn-submit" type="button" value="登录">
      </span></div>
        <div class="submit2"></div>
    </form>
    <div class="bottom">
        <h5>版权 <span class="vol"><font class="b">成都久思微信息技术有限公司</font><font class="o">所有</font></span></h5>
        <h6 title="">© 2007-2016 <a href="" target="_blank">Chengdu Pondering information teachnology ITd.cd</a></h6>
    </div>
</div>
<script>
    $(function () {
    	if (window.parent != window)
        {
            window.top.location.href = location.href;
        }
        $.supersized({
            // 功能
            slide_interval: 4000,
            transition: 1,
            transition_speed: 1000,
            performance: 1,

            // 大小和位置
            min_width: 0,
            min_height: 0,
            vertical_center: 1,
            horizontal_center: 1,
            fit_always: 0,
            fit_portrait: 1,
            fit_landscape: 0,

            // 组件
            slide_links: 'blank',
            slides: [
                {image: 'http://[::1]/yunjuke/application/admin/views//img/login/1.jpg'},
                {image: 'http://[::1]/yunjuke/application/admin/views//img/login/2.jpg'},
                {image: 'http://[::1]/yunjuke/application/admin/views//img/login/3.jpg'},
                {image: 'http://[::1]/yunjuke/application/admin/views//img/login/4.jpg'},
                {image: 'http://[::1]/yunjuke/application/admin/views//img/login/5.jpg'}
            ]

        });
        //显示隐藏验证码
        $("#hide").click(function () {
            $(".code").fadeOut("slow");
        });
        $("#captcha").focus(function () {
            $(".code").fadeIn("fast");
        });
        
        $('[nctype="btn_change_seccode"]').on('click', function() {
            change_seccode();
        });
        //跳出框架在主窗口登录
        if (top.location != this.location)    top.location = this.location;
        $('#user_name').focus();
        if ($.browser.msie && ($.browser.version == "6.0" || $.browser.version == "7.0")) {
            window.location.href = 'login';
        }
        $("#captcha").nc_placeholder();
        //动画登录
        $('.btn-submit').click(function (e) {
        	var username = $("input[name='user_name']").val();
           	var password = $("input[name='password']").val();
           	var captcha = $("input[name='captcha']").val();
           	//alert(username);
           	if(username == ''){
           		layer.msg('请输入管理员账号');
           		return false;
           	}
           	if(password == ''){
           		layer.msg('请输入账号密码');
           		return false;
           	}
           	if(captcha == ''){
           		layer.msg('请输入验证码');
           		return false;
           	}
           	$.ajax({
        		type: "post",
                url: "check_captcha",
                data: {captcha:captcha},
                dataType: "json",
                success: function(data){
                	if(data.state==false){
                		layer.msg(data.msg);
                		return false;
                	}else{
                		$('.input-username,.dot-left').addClass('animated fadeOutRight')
                        $('.input-password-box,.dot-right').addClass('animated fadeOutLeft')
                        $('.btn-submit').addClass('animated fadeOutUp')
                        //setTimeout(function () {
                                    $('.avatar').addClass('avatar-top');
                                    $('.submit').hide();
                                    $('.submit2').html('<div class="progress"><div class="progress-bar progress-bar-success" aria-valuetransitiongoal="100"></div></div>');
                                    $('.progress .progress-bar').progressbar({
                                        done: function () {
                                           	
                                           	check(captcha,username,password);
                                            
                                            function check(captcha,username,password){
                                            	$.ajax({
                                            		type: "post",
                                                    url: "check",
                                                    data: {username:username, password:password},
                                                    dataType: "json",
                                                    success: function(data){
                                                    	if(data.state==false){
                                                    		change_seccode();
                                                    		layer.msg(data.msg);
                                                    		setTimeout(function(){
                                                    			window.location.href="login";
                                                    	    },2000);
                                                    	}else{
                                                    		window.location.href="index";
                                                    	}
                                                    }
                                            	})
                                            }
                                        }
                                    });
                                //},
                                //300);
                	}
                }
        	})
            

        });

        // 回车提交表单
        $('#form_login').keydown(function (event) {
            if (event.keyCode == 13) {
                $('.btn-submit').click();
            }
        });
    });
  //更换验证码
    function change_seccode() {
        $('#codeimage').attr('src', 'verify_image?t=' + Math.random());
        $('#captcha').select();
    }

</script>



</body>
</html>
<?php }
}
