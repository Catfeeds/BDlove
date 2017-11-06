<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:50:53
  from "D:\www\yunjuke\application\pay\views\mall_express.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d6feda72488_59781080',
  'file_dependency' => 
  array (
    '9cd00fd5b671370908204792c4de27ff18e03723' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express.html',
      1 => 1501636154,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_598d6feda72488_59781080 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<style>
.btn{border:none}
a:hover{
	color: #333;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
            <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>运费管理
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
                <i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page" style="padding: 20px;">
    <div class="fixed-bar">
       

    </div>
    <div class="page-container" style="padding: 0;">
    	<div id="tab_demo" class="HuiTab">
			<div class="tabBar clearfix">
				<a href="mall_express_tools"><span>运费管理</span></a>
				<a href="mall_express"><span>物流公司</span></a>
				<a href="mall_waybill"><span>运单模板</span></a>
			</div>
		</div>
            <table class="table mt-20">
                <tbody>
                    <tr>
                                                        <td><input type="checkbox" name="express_code" value="anxindakuaixi"
                                      >
                                    安信达
                                </td>
                                                                                    <td><input type="checkbox" name="express_code" value="longbanwuliu"
                                      >
                                    龙邦快递
                                </td>
                                                                                    <td><input type="checkbox" name="express_code" value="shentong"
                                      >
                                    申通快递
                                </td>
                                                                                    <td><input type="checkbox" name="express_code" value="shunfeng"
                                    checked  >
                                    顺丰快递
                                </td>
                            </tr>                                                        <td><input type="checkbox" name="express_code" value="yuantong"
                                      >
                                    圆通快递
                                </td>
                                                                        </tr>
                </tbody>
            </table>
            <div style="width: 100%;" class="center pt50 ">
                <button class="btn btn-success size-L radius"  onclick="save()">保存</button>
            </div>
    </div>
</div>
<script>
	
	//	实现tab切换的源码
	jQuery.Huitab =function(tabBar,tabCon,class_name,tabEvent,i){
	var $tab_menu=$(tabBar);
	  // 初始化操作
	  $tab_menu.removeClass(class_name);
	  $(tabBar).eq(i).addClass(class_name);
	  $(tabCon).hide();
	  $(tabCon).eq(i).show();
  
  	$tab_menu.bind(tabEvent,function(){
  	  $tab_menu.removeClass(class_name);
      $(this).addClass(class_name);
      var index=$tab_menu.index(this);
      $(tabCon).hide();
      $(tabCon).eq(index).show()})}
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","1");
	
    function save()
    {
        var arr = new Array();
        $('input[type=checkbox]:checked').each(function () {
            arr.push($(this).val());
        })
        if (arr.length>0) {
            var id = arr.toString();
            layer.confirm('确定要启用选中的快递？',{
                title: '<b>提示信息</b>',
                btn: ['确定','取消'],
            },function () {
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"mall_express_save?express_code="+id,
                    beforeSend:function(){
                        layer.msg('数据提交中...',{icon:1});
                        var index = layer.load(1,{shade: false});
                    },
                    success:function (data)
                    {
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.closeAll();
                            layer.msg(data.msg);
                        }
                    }
                })
            })
        } else {
            layer.msg('请至少选择一项！');
        }
    }
    function cancel()
    {
        var arr = new Array();
        $('input[type=checkbox]:checked').each(function () {
            arr.push($(this).val());
        })
        if (arr.length>0) {
            var id = arr.toString();
            layer.confirm('确定要关闭选中的快递？',{
                title: '<b>提示信息</b>',
                btn: ['确定','取消'],
            },function () {
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"mall_express_cancel?express_code="+id,
                    success:function (data)
                    {
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                            location.replace(location.href);
                        }
                    }
                })
            })
        } else {
            layer.msg('请至少选择一项！');
        }
    }

</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
