<?php
/* Smarty version 3.1.29, created on 2017-08-08 10:59:29
  from "D:\www\yunjuke\application\admin\views\mall_news.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59892911b7a811_33651860',
  'file_dependency' => 
  array (
    'd23bf065e62b4095b3e2777446aa8c667e56224c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_news.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59892911b7a811_33651860 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1629859892911a901e5_70004590';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>消息通知</h3>
                <h5>商城对商家及用户消息类发送设定</h5>
            </div>
         </div>
    </div>
    <!-- 操作提示 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>平台可给商家提供站内信、手机短信、邮件三种通知方式。平台可以选择开启一种或多种通知方式供商家选择。</li>
            <li>开启强制接收后，商家不能取消该方式通知的接收。</li>
            <li>短消息、邮件需要商家设置正确号码后才能正常接收。</li>
            <li class="red">编辑完成后请清理“商家消息模板”缓存。</li>
        </ul>
    </div>
    <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $('#flexigrid').flexigrid({
        	url: 'mall_msg_list',
            height:'auto',// 高度自动
            usepager: false,// 不翻页
            striped: true,// 使用斑马线
            resizable: false,// 不调节大小
            title: '商家消息模板列表',// 表格标题
            reload: false,// 不使用刷新
            columnControl: false,// 不使用列控制
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '模版描述', name : 'member_name', width : 200, sortable : true, align: 'left'},
                {display: '站内信', name : 'member_mobile', width : 100, sortable : true, align: 'center'},
                {display: '手机短信', name : 'member_mobile', width : 100, sortable : true, align: 'center'},
                {display: '邮件', name : 'member_state', width : 60, sortable : true, align: 'center'}
            ],
        });
        
    });
    function fg_edit(mmt_code) {
        window.location.href = "mall_news_edit?code="+mmt_code;
    }
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
