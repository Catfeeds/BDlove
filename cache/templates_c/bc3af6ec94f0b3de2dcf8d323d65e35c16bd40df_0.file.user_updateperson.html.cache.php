<?php
/* Smarty version 3.1.29, created on 2017-09-13 11:45:16
  from "D:\www\yunjuke\application\vmall\views\user_updateperson.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b8a9cc49b062_29699919',
  'file_dependency' => 
  array (
    'bc3af6ec94f0b3de2dcf8d323d65e35c16bd40df' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_updateperson.html',
      1 => 1505274291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b8a9cc49b062_29699919 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1698359b8a9cc2d1f77_30518178';
?>
<!doctype>
<html>
<head>
<meta charset="utf-8">
<title>个人信息</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/example.css">

<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/framework7.picker.min.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/LArea.css">

<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/example.js"><?php echo '</script'; ?>
> -->

</head>
<style>
	.mt-0{
		margin-top: 0;
	}
	.headimg{
		width: 60px;
		height: 60px;
		margin: 20px auto 15px auto;
	}
	.username{
		text-align: center;
		font-size: 18px;
		color: #000;
		margin-bottom: 5px;
	}
	.img-responsive{
		width: 100%;
		height: auto;
		border-radius: 50%;
	}
	.level{
		text-align: center;
		font-size: 15px;
		margin-left:15px;
		margin-bottom: 15px;
	}
	.level span{
		color: #ff9c00;
		padding-right: 15px;
	}
    a:link { 
        text-decoration: none; 
    } 
    a:visited { 
        text-decoration: none; 
    } 
    a:hover { 
        text-decoration: underline; 
    } 

</style>
<body ontouchstart>
	<div class="weui-cells mt-0">
		<div class="headimg"><img src="<?php if (!empty($_smarty_tpl->tpl_vars['wxuser_info']->value['head_portrait'])) {
echo $_smarty_tpl->tpl_vars['wxuser_info']->value['head_portrait'];
}?>" alt="" class="img-responsive"/></div>
		<p class="username"><?php echo $_smarty_tpl->tpl_vars['wxuser_info']->value['wx_nickname'];?>
</p>
		<p class="level">等级：<span style="font-style: italic;"><?php echo $_smarty_tpl->tpl_vars['wxuser_info']->value['lv'];?>
</span>积分：<span><?php echo $_smarty_tpl->tpl_vars['wxuser_info']->value['integral_total'];?>
</span></p>
    </div>
	<div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="javascript:;" id="showPicker">
                <div class="weui-cell__bd">
                    <p>性别</p>
                </div>
                <div class="weui-cell__ft" >
                    <form id="wxuser_sex">
                    <span id="wxsex">
                        <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['member_sex'] == 0) {?>保密<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['member_sex'] == 1) {?>男<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['member_sex'] == 2) {?>女<?php }?>    
                    </span>
                    </form>
                </div>
            </a>
            <a class="weui-cell weui-cell_access" href="javascript:;" id="showDatePicker">
                <div class="weui-cell__bd">
                    <p>生日</p>
                </div>
                <div class="weui-cell__ft">
                <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['birthday'] == '') {?>
                <?php } else {
echo $_smarty_tpl->tpl_vars['wxuser_info']->value['birthday'];
}?>
                </div>
            </a>
        <a class="weui-cell weui-cell_access" href="javascript:;" id="showAddressPicker">
            <div class="weui-cell__bd">
                <p>地址</p>
            </div>
            <div class="weui-cell__ft">
                请选择地址
            </div>
        </a>
            <a class="weui-cell weui-cell_access" href="javascript:;" id="address">
                <div class="weui-cell__bd">
                    <p>所在地</p>
                </div>
                <div class="weui-cell__ft" >
                    <input id="addressPicker"  onfocus = "javascript:this.blur()" style="text-align:right;" class="weui-input" type="text" value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['addressPicker'])) {
echo $_smarty_tpl->tpl_vars['address']->value['addressPicker'];
}?>" >
                    <input id="addressPickers" type="hidden"  value="<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['addressPickers'])) {
echo $_smarty_tpl->tpl_vars['address']->value['addressPickers'];
}?>" >
                </div>
            </a>
   </div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <p>手机</p>
                </div>
                <div class="weui-cell__ft">
                <span id="phone">
                <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['tel'] == '') {?>
                请输入手机号码
                <?php } else {
echo $_smarty_tpl->tpl_vars['wxuser_info']->value['tel'];
}?>
                </span>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <p>邮箱</p>
                </div>
                <div class="weui-cell__ft">
                <!-- <a style=" text-decoration:none;" href="<?php echo base_url();?>
vmall.php/user/user_valteemail"> -->
                <input style="text-align:right;" class="weui-input" type="text" id="email" placeholder="请输入邮箱" value="<?php echo $_smarty_tpl->tpl_vars['wxuser_info']->value['user_email'];?>
">
                <!-- <?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['user_email'] == '') {?>
                请输入邮箱
                <?php } else {
echo $_smarty_tpl->tpl_vars['wxuser_info']->value['user_email'];
}?> -->
                <!-- </a> -->
                </div>
            </div>
            
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <p>QQ</p>
                </div>
                <div class="weui-cell__ft">
                <input style="text-align:right;" id="qqnum" name="qqnum"  type="tel" class="weui-input" placeholder="<?php if ($_smarty_tpl->tpl_vars['wxuser_info']->value['qq'] == '') {?>
                请输入QQ号码
                <?php } else {
echo $_smarty_tpl->tpl_vars['wxuser_info']->value['qq'];
}?>" >
                </div>
            </div>
        </div>




        <!--<a href="javascript:;" class="weui-btn weui-btn_default" id="showDatePicker">日期选择器</a>-->

	
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/LArea.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    
    //生日
	$('#showDatePicker').on('click', function () {
        weui.datePicker({
            start: 1990,
            end: new Date().getFullYear(),
            // onChange: function (result) {
            // 	$("#showDatePicker .weui-cell__ft").text(result[0]+'-'+result[1]+'-'+result[2]);
            // },
            onConfirm: function (result) {
                var data = result[0]+'-'+result[1]+'-'+result[2];
                //console.log(data);return;
                $.ajax({
                    type : "POST",
                    url : "wu_info",
                    data : {"wxbir":data},
                    dataType:'json',
                    success : function(msg) {
                        //alert(msg.sex);
                        $("#showDatePicker .weui-cell__ft").text(msg[0]+'-'+msg[1]+'-'+msg[2]);
                        
                    }  
                });
            }
        });
    });

    //性别
	$('#showPicker').on('click', function () {
        weui.picker([{
            label: '男',
            value: '男'
        }, {
            label: '女',
            value: '女'
        },{
            label: '保密',
            value: '保密'
        }],{
            // onChange: function (result) {
            // 	$("#showPicker .weui-cell__ft").text(result);
            // },
            onConfirm: function (result) {
                //console.log(result['0']);
            	var data = result['0'];
                $.ajax({
                    type : "POST",
                    url : "wu_info",
                    data : {"wxsex":data},
                    dataType:'json',
                    success : function(msg) {
                        //alert(msg.sex);
                        $("#showPicker .weui-cell__ft").text(msg.sex);
                    }  
                });   
            }
        });
    });


    //地址
    var provs_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['provs_data'];?>
;
    var citys_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['citys_data'];?>
;
    var dists_data =<?php echo $_smarty_tpl->tpl_vars['area_info']->value['dists_data'];?>
;
    var area = new LArea();
    area.init({
        'trigger': '#addressPicker',
        'valueTo': '#addressPickers',

        'keys': {
            id: 'value',
            name: 'text'
        },
        'type': 2,
        'data': [provs_data, citys_data, dists_data]
    });
    $('#addressPicker').on('blur',function(){
        var data = $('#addressPickers').val();
        //console.log(data);return;
        $.ajax({
            type : "POST",
            url : "wu_info",
            data : {"wxadd":data},
            dataType:'json',
            success : function(msg) {
                //alert(msg.sex);
                //$('#qqnum').val(msg);
            }
        });
        return false;
    });
    
    //qq
    $('#qqnum').on('change',function(){
        var data = $('#qqnum').val();
        //console.log(data);return;
        $.ajax({
            type : "POST",
            url : "wu_info",
            data : {"wxqq":data},
            dataType:'json',
            success : function(msg) {
                //alert(msg.sex);
                $('#qqnum').val(msg);
            }
        });
    });

    //手机页面跳转
    $("#phone").click(function(){
        window.location.href = '<?php echo base_url();?>
vmall.php/user/user_valtephone';
    })

    //邮箱
    $("#email").on("change",function(){
        var email = $("#email").val();
        var reg = /\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/;

        //alert(email);return;
        if(!reg.test(email)){
            alert("请输入正确的邮箱");
        }else{
            $.ajax({
                type : "POST",
                url : "send_email",
                data : {"email":email},
                dataType:'json',
                success : function(msg) {
                    // console.log(msg.state);
                    // alert(typeof(msg.state))
                    if(msg.state==true){
                        alert(msg.errmsg);
                    }else if(msg.state==false){
                        alert(msg.errmsg);
                    } 
                }
            });
        }
    })

<?php echo '</script'; ?>
>

</html>
<?php }
}
