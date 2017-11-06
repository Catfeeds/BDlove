<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:09
  from "D:\www\yunjuke\application\admin\views\mall_payment.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6e1ab5977_17783845',
  'file_dependency' => 
  array (
    'ffe7e65a89a89c27dd0cc08d04c0ea239eaec09d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment.html',
      1 => 1492225974,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5981a6e1ab5977_17783845 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>支付方式</h3>
                <h5>商城购物可使用支付方式/接口设置</h5>
            </div>
        </div>
    </div>
    <!-- 操作提示 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>此处列出了系统支持的支付方式，点击“设置”按钮可以编辑支付参数及开关状态</li>
        </ul>
    </div>
    
    <div id="flexigrid">
      <table class="flex-table autoht" cellpadding="0" cellspacing="0" border="0">
        <tbody>
                        <tr>
		        <td class="sign"><i class="ico-check"></i></td>
		        <td class="handle-s"><a class="btn purple" href='mall_payment_zfb?op="a:4:{s:5:\"state\";s:1:\"1\";s:7:\"account\";s:17:\"shopncpay@163.com\";s:3:\"key\";s:32:\"2b7i5fm802p0183hs6lx90qfk94ff8lm\";s:2:\"id\";s:4:\"1212\";}"'><i class="fa fa-cog"></i>设置</a></td>
		        <td>支付宝</td>
		        <td><span class="yes"><i class="fa fa-check-circle"></i>开启中</span></td>
		        <td style="width: 100%;"><div>&nbsp;</div></td>
           </tr>
                       <tr>
		        <td class="sign"><i class="ico-check"></i></td>
		        <td class="handle-s"><a class="btn purple" href='mall_payment_wx?op="a:4:{s:5:\"state\";s:1:\"1\";s:7:\"account\";s:18:\"wxd7f0060e785a517b\";s:3:\"key\";s:32:\"ssl789432lj0ljl342j0uf0sd8234jl2\";s:2:\"id\";s:10:\"1226636102\";}"'><i class="fa fa-cog"></i>设置</a></td>
		        <td>微信支付</td>
		        <td><span class="yes"><i class="fa fa-check-circle"></i>开启中</span></td>
		        <td style="width: 100%;"><div>&nbsp;</div></td>
           </tr>
                       <tr>
		        <td class="sign"><i class="ico-check"></i></td>
		        <td class="handle-s"><a class="btn purple" href='mall_payment_hdfk?op="a:4:{s:5:\"state\";s:1:\"0\";s:7:\"account\";s:0:\"\";s:3:\"key\";s:0:\"\";s:2:\"id\";s:0:\"\";}"'><i class="fa fa-cog"></i>设置</a></td>
		        <td>货到付款</td>
		        <td><span class="no"><i class="fa fa-check-circle"></i>关闭中</span></td>
		        <td style="width: 100%;"><div>&nbsp;</div></td>
           </tr>
                   </tbody>
  </table>
    </div>
</div>
<script>
    $(function(){
        $('#flexigrid').flexigrid({
            height:'auto',// 高度自动
            usepager: false,// 不翻页
            striped: true,// 使用斑马线
            resizable: false,// 不调节大小
            title: '商城支付方式列表',// 表格标题
            reload: false,// 不使用刷新
            columnControl: false,// 不使用列控制
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '支付方式', name : 'member_name', width : 200, sortable : true, align: 'left'},
                {display: '当前状态', name : 'member_mobile', width : 100, sortable : true, align: 'center'},
            ],
        });
        function fg_zfb() {
            window.location.href = "mall_payment_zfb";
        }
        function fg_wx() {
            window.location.href = "mall_payment_wx";
        }
        function fg_hdfk() {
            window.location.href = "mall_payment_hdfk";
        }
    });
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
