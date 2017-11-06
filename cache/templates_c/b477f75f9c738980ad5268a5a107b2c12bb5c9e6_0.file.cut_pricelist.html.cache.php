<?php
/* Smarty version 3.1.29, created on 2017-10-09 15:18:42
  from "D:\www\yunjuke\application\vmall\views\cut_pricelist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59db22d20aa124_47984115',
  'file_dependency' => 
  array (
    'b477f75f9c738980ad5268a5a107b2c12bb5c9e6' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\cut_pricelist.html',
      1 => 1507533519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink-c.html' => 1,
  ),
),false)) {
function content_59db22d20aa124_47984115 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '893959db22d1e42846_11065547';
?>
<html lang="zh-cn">

<head>
    <title>个人中心</title>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink-c.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    .topnav{
        display: flex;
        background: #fff;
        border-bottom: 1px solid #e8e8e8;
    }
    .topnav a{
        width:54%;
        height:.35rem;
        line-height:.35rem;
        text-align: center;
        color: #999;
    }
    .topnav a.active{
        border-bottom: 2px solid #f60;
        color: #f60;
     }
    .cut_list li{
        margin:.1rem;
        border:1px solid #efefef;
        background: #fff;
    }
    .goods_img{
        position: relative;
    }
    .goods_img img{
        width:100%;
        height:1.2rem;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .reduce_time{
        position: absolute;
        bottom:.05rem;
        left:.05rem;
        display: block;
        width:1.7rem;
        border:1px solid #552000;
        color: #552000;
        border-radius: 6px;
        background: #fff;
        letter-spacing: 0.5px;
        margin:0 auto;
        height:0.2rem;
        line-height: 0.21rem;
        text-align: center;
        font-size: .12rem;
        z-index: 999;
    }
    .time{
        color: #f44848;
        padding:0 .02rem;
    }
    .goods_info{
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding:.08rem;
    }
    .join_people{
        font-size: .1rem;
        color: #999;
    }
    .goods_price{
        color: #f44848;
        font-size: .13rem;
    }
    .price_new{
        font-size: .18rem;
        font-family: 楷体;
    }
    .price_order{
        font-family: 楷体;
        color: #999;
        text-decoration: line-through;
        margin-left:.1rem;
    }
    .btn_now{
        display: block;
        border:1px solid #552000;
        background: #fdd63a;
        color: #552000;
        border-radius:5px;
        width:.65rem;
        height:.2rem;
        text-align: center;
        line-height: .2rem;
        margin-bottom: .05rem;
    }
    .btn_wantbuy{
        display: block;
        border:1px solid #552000;
        background: #fff;
        color: #552000!important;
        border-radius:5px;
        width:.65rem;
        height:.2rem;
        text-align: center;
        line-height: .21rem;
    }
    .btn_wantbuy.active{
        background: #fdd63a;
    }
    .btn_wantbuy.active span{
        color: red;
    }
    .btn_cut{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .goods_name{
        font-size: .13rem;
        width:1.8rem;
        display:block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    .want{
        color: #ddd;
        font-size: .16rem;
        vertical-align: middle;
    }
    #history .goods_img img{
        opacity: 0.5;
    }
    #history .goods_info .goods_info_text{
        opacity: 0.5;
    }
    .noaction{
        text-align: center;
        font-size: .14rem;
        background: #f4f4f4!important;
        padding-top:1rem;
        border:none!important;
    }
    .noaction p{
        margin-bottom: .3rem;
    }
    .noaction img{
        width: 1rem;
    }
    .start_num{
        font-size: .10rem;
        color: #999;
        width:1.8rem;
    }
    .join_num{
        margin-top:.05rem;
        opacity: 0.5;
    }
</style>
<body>
<div class="topnav">
    <a class="active" data-id="new">最新活动</a>
    <a data-id="history">历史活动</a>
</div>
<div class="content">
    <div id="new">
        <ul class="cut_list">
            <?php if (empty($_smarty_tpl->tpl_vars['new_info']->value)) {?>
           <!--无活动的时候显示的样式-->
            <li class="noaction">
                <p><img src="<?php echo TEMPLE;?>
images/noaction.png" alt=""></p>
                <p>暂无活动，去其他地方逛逛吧~</p>
            </li>
            <?php } else { ?>
            <?php
$_from = $_smarty_tpl->tpl_vars['new_info']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
                <li>
                    <div class="goods_img">
                        <img src="<?php echo TEMPLE;?>
images/2.jpg" alt="">
                        <span class="reduce_time">仅剩<span class="iconfont time">&#xe657;</span><span class="overtimes" overtime="<?php echo $_smarty_tpl->tpl_vars['value']->value['end_time'];?>
">5天19小时49分21秒</span></span>
                    </div>
                    <div class="goods_info">
                        <div>
                            <div class="goods_name"><?php echo $_smarty_tpl->tpl_vars['value']->value['goods_name'];?>
</div>
                            <div class="goods_price">砍后最低￥<span class="price_new"><?php echo $_smarty_tpl->tpl_vars['value']->value['end_price'];?>
</span><span class="price_order">￥<?php echo $_smarty_tpl->tpl_vars['value']->value['goods_price'];?>
</span></div>
                        </div>
                        <div class="btn_cut"><a href="cuts?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['bargain_id'];?>
" class="btn_now">立即砍价</a><div class="join_people">已有<?php echo $_smarty_tpl->tpl_vars['value']->value['num'];?>
人参与</div></div>
                    </div>
                </li>
            <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
if ($__foreach_value_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_0_saved_key;
}
?>
            <?php }?>
        </ul>
     
    </div>
    <div id="history" style="display: none">
           <!--无活动的时候显示的样式-->
            <ul class="cut_list">
		            <li>
		                <div class="goods_img">
		                    <img src="<?php echo TEMPLE;?>
images/2.jpg" alt="">
		                </div>
		                <div class="goods_info">
		                    <div class="goods_info_text"><p class="goods_name"><?php echo $_smarty_tpl->tpl_vars['value']->value['goods_name'];?>
</p><p class="start_num">如商品想买人数达到50人，活动将重新开启哦！</p></div>
		                    <div class="join_people">
                                <a href="javascript:;" class="btn_wantbuy" user_id="" bargain_id="" onclick="wantBuy(this)" state="" ><span class="iconfont want" >&#xe607;</span>我想买</a>
                                <p class="join_num">已有20人参与</p>
                            </div>
		                </div>
		            </li>
           </ul>
    </div>
</div>
</body>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(function(){
	var flag="<?php if (!empty($_smarty_tpl->tpl_vars['new_info']->value)) {?>1<?php } else { ?>2<?php }?>";
	if(flag==1){
		MicroTimeOver();
		setInterval("MicroTimeOver()","1000");
	}
	
})
//活动结束倒计时
function MicroTimeOver(){
	$(".content .cut_list li").each(function(index){
		var OverTimes = $(this).find(".overtimes").attr("overtime");
		var OverTime = Number(OverTimes);
		var timestamp = (Date.parse(new Date()))/1000;
		//console.log("timestamp:"+timestamp+"//type:"+typeof(timestamp));
		//console.log("OverTime:"+OverTime+"//type:"+typeof(OverTime));
		var leftTime = (OverTime - Number(timestamp))*1000;
		
		 var days = parseInt(leftTime / 1000 / 60 / 60 / 24 , 10); //计算剩余的天数 
		 var hours = parseInt(leftTime / 1000 / 60 / 60 % 24 , 10); //计算剩余的小时 
		 var minutes = parseInt(leftTime / 1000 / 60 % 60, 10);//计算剩余的分钟 
		 var seconds = parseInt(leftTime / 1000 % 60, 10);//计算剩余的秒数 
		 hours = checkTime(hours); 
		 minutes = checkTime(minutes); 
		 seconds = checkTime(seconds); 
		var overs =  days+"天" + hours+"小时" + minutes+"分"+seconds+"秒";
		$(this).find(".overtimes").html("");
		$(this).find(".overtimes").html(overs);
	})
}

function checkTime(i){ //将0-9的数字前面加上0，例1变为01 
 if(i<10) 
 { 
  i = "0" + i; 
 } 
 return i; 
} 






    $('.topnav a').click(function () {
        $('.topnav a').removeClass('active');
        $(this).addClass('active');
        $('.content>div').hide();
        $("#"+$(this).attr('data-id')).show();
    })
   
    function wantBuy(obj){
        var user_id = $(obj).attr("user_id");
        var bargain_id = $(obj).attr("bargain_id");
        var state = $(obj).attr("state");
        //console.log(state);return;
        if(state == 1){
            alert("您已经在本次活动中！");
            return;
        }
        var flag = confirm("确认参加活动吗？");
        if(flag == true){
            $.ajax({
                url : 'bargain_restart',
                type : 'post',
                data : {user_id:user_id,bargain_id:bargain_id},
                dataType : 'json',
                success : function(msg){
                    if(msg.state == true){
                        $(obj).addClass("active");
                    }else{
                        alert("数据错误！");return;
                    }
                }
            });
        }
        
    }
<?php echo '</script'; ?>
>
</html><?php }
}
