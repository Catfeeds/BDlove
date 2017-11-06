<?php
/* Smarty version 3.1.29, created on 2017-09-13 09:37:43
  from "D:\www\yunjuke\application\vmall\views\user_valtephone.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b88be7407ec4_07171971',
  'file_dependency' => 
  array (
    'bd75f9821ab7f5c561a83a320c410c4db500a2f8' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_valtephone.html',
      1 => 1505209021,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59b88be7407ec4_07171971 ($_smarty_tpl) {
?>
<!doctype>
<html>
<head>
    <meta charset="utf-8">
    <title>手机验证</title>
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/weui1.css">
    <link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/example.css">
    <script src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
    <script src="http://[::1]/yunjuke/application/vmall/views/js/base.js"></script>
    
    
</head>
<style>
    .tel{
        width:90%;
        height: 40px;
        border-radius: 5px;
        background: #fff;
        margin: 15px auto;
        position: relative;
    }
    .valte{
        width: 90%;
        margin: 10px auto;
        display: flex;
        justify-content: space-between;
    }
    .valte-inp{
        width: 68%;
        height: 40px;
        border-radius: 5px;
        background: #fff;
        position: relative;
    }
    .btn-message{
        width: 29%;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 5px;
        background: #f54336;
        border: none;
        color: #fff;
        font-size: 12px;
        display: block;
    }
    .btn-message.active{
        background: #ccc;
        color: #fff;
        display: none;
    }
    .illste{
        margin-left: 5%;
        font-size: 13px;
        color: #999;
    }
    #confirm{
        width:90%;
        margin-top:20px;
    }
    @font-face {
        font-family: 'iconfont';  /* project id 272444 */
        src: url('//at.alicdn.com/t/font_272444_0ntwae8141sxxbt9.eot');
        src: url('//at.alicdn.com/t/font_272444_0ntwae8141sxxbt9.eot?#iefix') format('embedded-opentype'),
        url('//at.alicdn.com/t/font_272444_0ntwae8141sxxbt9.woff') format('woff'),
        url('//at.alicdn.com/t/font_272444_0ntwae8141sxxbt9.ttf') format('truetype'),
        url('//at.alicdn.com/t/font_272444_0ntwae8141sxxbt9.svg#iconfont') format('svg');
    }
    .phone-icon{
        font-family: iconfont;
        font-size: 22px;
        color: #9a9a9a;
        position: absolute;
        top:3px;
        left:10px;
    }
    .detae{
        font-family: iconfont;
        font-size: 18px;
        color: #ccc;
        position: absolute;
        top:5px;
        right:8px;
    }
    .weui-input{
        padding-left:40px;
        margin-top:8px;
    }
</style>
<body ontouchstart>
<form name="wxuser_phone" id="wx_p">
    <div class="tel">
        <span class="phone-icon">&#xe632;</span>
        <input id="pnum" name="pnum" class="weui-input" type="tel" placeholder="请输入您的手机号"/>
    </div>
    <div class="valte">
        <div class="valte-inp">
            <span class="phone-icon">&#xe79c;</span>
            <input class="weui-input" type="tel" id="code" name="code" placeholder="验证码"/>
            <!--删除验证码-->
            <span class="detae" id="delete" >&#xe60d;</span>
        </div>
        <a class="btn-message" name="send_code" id="send_code">获取短信验证</a>
        <!--获取后60重发-->
        <a id="send_later" disabled="true" class="btn-message active"><span id="time">60</span>s后重发</a>
    </div>
    <p class="illste">我们会发送短信至您的手机，请注意查收验证码</p>
    <input type="button" class="weui-btn weui-btn_warn " id="confirm" name="confirm" value="确认">
</form>

</body>
<script type="text/javascript">
    //发送验证码
    $("#send_code").click(function() {
        var phone=$("#pnum").val();
        var reg = /0?(13|14|15|18)[0-9]{9}/;
        
        //console.log(t);
        if(phone.length<11&!reg.test(phone))
        {
            alert("请输入正确的手机号");return;
        }else{
            $("#send_code").hide();
            $("#send_later").show();
            var time = 60;
            function timeclock() { //发送验证码倒计时
                if(time == 0) {
                    $("#send_code").show();
                    $("#send_later").hide(); 
                    return;
                }else{
                    $("#time").text(time);
                    time--;
                } 
                setTimeout(function() {timeclock();},1000)
            }
            timeclock();
            $.ajax({
                type : "POST",
                url : "send_code",
                data : {"phone":phone},
                dataType:'json',
                success : function(msg) {
                    // console.log(msg.state);
                    // alert(typeof(msg.state))
                    if(msg.state==true){
                        //alert(msg.errmsg);

                    }else if(msg.state==false){
                        alert(msg.errmsg);
                    } 
                }
            });
        }
        
    })
    //绑定手机
    $("#confirm").on('click',function() {
        var phone=$("#pnum").val();
        var yzm=$("#code").val();
        var reg = /0?(13|14|15|18)[0-9]{9}/;
        if(phone.length<11&!reg.test(phone))
        {
            alert("请输入正确的手机号");return;
        }
        else if(yzm.length<1)
        {
            alert("请输入验证码");return;
        }else{
            $.ajax({
                type : "POST",
                url : "user_bind_tel",
                data : {"phone":phone,"yzm":yzm},
                dataType:'json',
                success : function(msg) {
                    if(msg.state==true){
                        alert(msg.errmsg);
                        window.location.href = 'http://[::1]/yunjuke/vmall.php/user/user_updateperson';
                    }else if(msg.state==false){
                        alert(msg.errmsg);
                    }   
                }
            });
        }
        
    })

    //删除验证码
    $("#delete").click(function(){
        $("#code").val("");
    })

</script>
</html>
<?php }
}
