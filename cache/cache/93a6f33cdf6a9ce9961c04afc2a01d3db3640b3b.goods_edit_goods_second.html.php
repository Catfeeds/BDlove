<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:56:54
  from "D:\www\yunjuke\application\admin\views\goods_edit_goods_second.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a51e469c7c86_01973075',
  'file_dependency' => 
  array (
    '93a6f33cdf6a9ce9961c04afc2a01d3db3640b3b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_edit_goods_second.html',
      1 => 1503993387,
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
function content_59a51e469c7c86_01973075 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/style.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/ueditor.config.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.charCount.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<style>
    input[readonly="readonly"]{background-color: #fff}
   #content #edui1{z-index:0 !important}
   .select2-selection--multiple{line-height: 24px;width:180px;}
.errrrr{    background-color: #FFF0F0 !important;
    background-repeat: repeat !important;
    border: 1px dashed #E84C3D !important;}
    .attr_dd tr td a,.attr_dd tr td input,.attr_dd tr td select{margin-top:4px !important;}
    .attr_dd select{width:154px;}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page wrapper_search">
  <div class="fixed-bar">
      <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>商品管理</h3>
        <h5>商品数据的编辑</h5>
      </div>
      </div>
  </div>
    <form action="goods_add_goods_third?op=edit&goods_id=20438" id="form_2" method="post">
    <input type="hidden" name="editGoodsId" id="editGoodsId" value="20438">
        <input id="color_arr" value='{"1":{"cl_id":"1","cl_parent_id":"0","cl_name":"\u767d\u8272","cl_sort":"127","cl_value":"#ffffff","son_color":{"2":{"cl_id":"2","cl_parent_id":"1","cl_name":"\u767d\u8272","cl_sort":null,"cl_value":"#ffffff","son_color":[]},"3":{"cl_id":"3","cl_parent_id":"1","cl_name":"\u7c73\u767d\u8272","cl_sort":null,"cl_value":"#eedeb0","son_color":[]},"61":{"cl_id":"61","cl_parent_id":"1","cl_name":"\u4e73\u767d\u8272","cl_sort":null,"cl_value":"#fffbf0","son_color":[]}}},"12":{"cl_id":"12","cl_parent_id":"0","cl_name":"\u82b1\u8272","cl_sort":null,"cl_value":"huasebg.png","son_color":{"58":{"cl_id":"58","cl_parent_id":"12","cl_name":"\u82b1\u8272","cl_sort":null,"cl_value":"huasebg.png","son_color":[]}}},"11":{"cl_id":"11","cl_parent_id":"0","cl_name":"\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":{"50":{"cl_id":"50","cl_parent_id":"11","cl_name":"\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":[]},"51":{"cl_id":"51","cl_parent_id":"11","cl_name":"\u5de7\u514b\u529b\u8272","cl_sort":null,"cl_value":"#d2691e","son_color":[]},"52":{"cl_id":"52","cl_parent_id":"11","cl_name":"\u6817\u8272","cl_sort":null,"cl_value":"#60281e","son_color":[]},"53":{"cl_id":"53","cl_parent_id":"11","cl_name":"\u6d45\u68d5\u8272","cl_sort":null,"cl_value":"#b35c44","son_color":[]},"54":{"cl_id":"54","cl_parent_id":"11","cl_name":"\u6df1\u5361\u5176\u5e03\u8272","cl_sort":null,"cl_value":"#bdb76b","son_color":[]},"55":{"cl_id":"55","cl_parent_id":"11","cl_name":"\u6df1\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":[]},"56":{"cl_id":"56","cl_parent_id":"11","cl_name":"\u8910\u8272","cl_sort":null,"cl_value":"#855b00","son_color":[]},"57":{"cl_id":"57","cl_parent_id":"11","cl_name":"\u9a7c\u8272","cl_sort":null,"cl_value":"#a88462","son_color":[]},"69":{"cl_id":"69","cl_parent_id":"11","cl_name":"\u5496\u5561\u8272","cl_sort":null,"cl_value":"#603912","son_color":[]}}},"10":{"cl_id":"10","cl_parent_id":"0","cl_name":"\u7d2b\u8272","cl_sort":null,"cl_value":"#800080","son_color":{"46":{"cl_id":"46","cl_parent_id":"10","cl_name":"\u7d2b\u8272","cl_sort":null,"cl_value":"#800080","son_color":[]},"47":{"cl_id":"47","cl_parent_id":"10","cl_name":"\u6df1\u7d2b\u8272","cl_sort":null,"cl_value":"#430653","son_color":[]},"48":{"cl_id":"48","cl_parent_id":"10","cl_name":"\u7d2b\u7ea2\u8272","cl_sort":null,"cl_value":"#8b0062","son_color":[]},"49":{"cl_id":"49","cl_parent_id":"10","cl_name":"\u7d2b\u7f57\u5170","cl_sort":null,"cl_value":"#b7ace4","son_color":[]},"68":{"cl_id":"68","cl_parent_id":"10","cl_name":"\u6d45\u7d2b\u8272","cl_sort":null,"cl_value":"#ede0e6","son_color":[]}}},"9":{"cl_id":"9","cl_parent_id":"0","cl_name":"\u84dd\u8272","cl_sort":null,"cl_value":"#0000fe","son_color":{"39":{"cl_id":"39","cl_parent_id":"9","cl_name":"\u84dd\u8272","cl_sort":null,"cl_value":"#0000fe","son_color":[]},"40":{"cl_id":"40","cl_parent_id":"9","cl_name":"\u6e56\u84dd\u8272","cl_sort":null,"cl_value":"#30dff3","son_color":[]},"41":{"cl_id":"41","cl_parent_id":"9","cl_name":"\u6df1\u84dd\u8272","cl_sort":null,"cl_value":"#041690","son_color":[]},"42":{"cl_id":"42","cl_parent_id":"9","cl_name":"\u6d45\u84dd\u8272","cl_sort":null,"cl_value":"#d2f0f4","son_color":[]},"43":{"cl_id":"43","cl_parent_id":"9","cl_name":"\u5b9d\u84dd\u8272","cl_sort":null,"cl_value":"#4b5cc4","son_color":[]},"44":{"cl_id":"44","cl_parent_id":"9","cl_name":"\u5b54\u96c0\u84dd","cl_sort":null,"cl_value":"#00a4c5","son_color":[]},"45":{"cl_id":"45","cl_parent_id":"9","cl_name":"\u5929\u84dd\u8272","cl_sort":null,"cl_value":"#44cef6","son_color":[]},"67":{"cl_id":"67","cl_parent_id":"9","cl_name":"\u85cf\u9752\u8272","cl_sort":null,"cl_value":"#2e4e7e","son_color":[]}}},"8":{"cl_id":"8","cl_parent_id":"0","cl_name":"\u7eff\u8272","cl_sort":null,"cl_value":"#008000","son_color":{"33":{"cl_id":"33","cl_parent_id":"8","cl_name":"\u7eff\u8272","cl_sort":null,"cl_value":"#008000","son_color":[]},"34":{"cl_id":"34","cl_parent_id":"8","cl_name":"\u58a8\u7eff\u8272","cl_sort":null,"cl_value":"#057748","son_color":[]},"35":{"cl_id":"35","cl_parent_id":"8","cl_name":"\u6d45\u7eff\u8272","cl_sort":null,"cl_value":"#98fb98","son_color":[]},"36":{"cl_id":"36","cl_parent_id":"8","cl_name":"\u7fe0\u7eff\u8272","cl_sort":null,"cl_value":"#0aa344","son_color":[]},"37":{"cl_id":"37","cl_parent_id":"8","cl_name":"\u8367\u5149\u7eff","cl_sort":null,"cl_value":"#23fa07","son_color":[]},"38":{"cl_id":"38","cl_parent_id":"8","cl_name":"\u9752\u8272","cl_sort":null,"cl_value":"#00e09e","son_color":[]},"66":{"cl_id":"66","cl_parent_id":"8","cl_name":"\u519b\u7eff\u8272","cl_sort":null,"cl_value":"#5d762a","son_color":[]}}},"7":{"cl_id":"7","cl_parent_id":"0","cl_name":"\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff00","son_color":{"23":{"cl_id":"23","cl_parent_id":"7","cl_name":"\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff00","son_color":[]},"32":{"cl_id":"32","cl_parent_id":"7","cl_name":"\u9999\u69df\u8272","cl_sort":null,"cl_value":"toumingbg.png","son_color":[]},"31":{"cl_id":"31","cl_parent_id":"7","cl_name":"\u91d1\u8272","cl_sort":null,"cl_value":"#ffd700","son_color":[]},"30":{"cl_id":"30","cl_parent_id":"7","cl_name":"\u8367\u5149\u9ec4","cl_sort":null,"cl_value":"#eaff56","son_color":[]},"29":{"cl_id":"29","cl_parent_id":"7","cl_name":"\u6d45\u9ec4\u8272","cl_sort":null,"cl_value":"#faff72","son_color":[]},"28":{"cl_id":"28","cl_parent_id":"7","cl_name":"\u6854\u8272","cl_sort":null,"cl_value":"#ffa500","son_color":[]},"27":{"cl_id":"27","cl_parent_id":"7","cl_name":"\u67e0\u6aac\u9ec4","cl_sort":null,"cl_value":"#ffec43","son_color":[]},"26":{"cl_id":"26","cl_parent_id":"7","cl_name":"\u674f\u8272","cl_sort":null,"cl_value":"#f7eed6","son_color":[]},"25":{"cl_id":"25","cl_parent_id":"7","cl_name":"\u660e\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff01","son_color":[]},"24":{"cl_id":"24","cl_parent_id":"7","cl_name":"\u59dc\u9ec4\u8272","cl_sort":null,"cl_value":"#ffc773","son_color":[]},"65":{"cl_id":"65","cl_parent_id":"7","cl_name":"\u5361\u5176\u8272","cl_sort":null,"cl_value":"#c3b091","son_color":[]}}},"6":{"cl_id":"6","cl_parent_id":"0","cl_name":"\u7ea2\u8272","cl_sort":null,"cl_value":"#ff0000","son_color":{"17":{"cl_id":"17","cl_parent_id":"6","cl_name":"\u7ea2\u8272","cl_sort":null,"cl_value":"#ff0000","son_color":[]},"18":{"cl_id":"18","cl_parent_id":"6","cl_name":"\u897f\u74dc\u7ea2","cl_sort":null,"cl_value":"#f05654","son_color":[]},"19":{"cl_id":"19","cl_parent_id":"6","cl_name":"\u85d5\u8272","cl_sort":null,"cl_value":"#eed0d8","son_color":[]},"20":{"cl_id":"20","cl_parent_id":"6","cl_name":"\u9152\u7ea2\u8272","cl_sort":null,"cl_value":"#990000","son_color":[]},"21":{"cl_id":"21","cl_parent_id":"6","cl_name":"\u73ab\u7ea2\u8272","cl_sort":null,"cl_value":"#df1b76","son_color":[]},"22":{"cl_id":"22","cl_parent_id":"6","cl_name":"\u6854\u7ea2\u8272","cl_sort":null,"cl_value":"#ff7500","son_color":[]},"64":{"cl_id":"64","cl_parent_id":"6","cl_name":"\u7c89\u7ea2\u8272","cl_sort":null,"cl_value":"#ffb6c1","son_color":[]}}},"5":{"cl_id":"5","cl_parent_id":"0","cl_name":"\u9ed1\u8272","cl_sort":null,"cl_value":"#000000","son_color":{"60":{"cl_id":"60","cl_parent_id":"5","cl_name":"\u9ed1\u8272","cl_sort":null,"cl_value":"#000000","son_color":[]}}},"4":{"cl_id":"4","cl_parent_id":"0","cl_name":"\u7070\u8272","cl_sort":null,"cl_value":"#808080","son_color":{"14":{"cl_id":"14","cl_parent_id":"4","cl_name":"\u7070\u8272","cl_sort":null,"cl_value":"#808080","son_color":[]},"15":{"cl_id":"15","cl_parent_id":"4","cl_name":"\u6df1\u7070\u8272","cl_sort":null,"cl_value":"#666666","son_color":[]},"16":{"cl_id":"16","cl_parent_id":"4","cl_name":"\u6d45\u7070\u8272","cl_sort":null,"cl_value":"#e4e4e4","son_color":[]},"62":{"cl_id":"62","cl_parent_id":"4","cl_name":"\u94f6\u8272","cl_sort":null,"cl_value":"#c0c0c0","son_color":[]}}},"13":{"cl_id":"13","cl_parent_id":"0","cl_name":"\u900f\u660e","cl_sort":null,"cl_value":"toumingbg.png","son_color":{"59":{"cl_id":"59","cl_parent_id":"13","cl_name":"\u900f\u660e","cl_sort":null,"cl_value":"toumingbg.png","son_color":[]}}}}' type="hidden">
        <div class="ncsc-form-goods">
            <h3 id="demo1">商品基本信息</h3>
            <dl>
                <dt><i class="required">*</i>商品名称：</dt>
                <dd>
                    <input name="base_info[goods_name]" type="text" class="text w400" value="monkeyshoes">
                    <span class="err"></span>
                    <p class="hint">商品标题名称长度至少3个字符，最长50个汉字</p>
                </dd>
            </dl>
            <dl>
                <dt><i class="required">*</i>商品分类：</dt>
                <dd id="gcategory">
                    <input type="hidden" name="base_info[gc_name]" id="gc_name" value="童衣">
                    <select name="base_info[gc_id]" id="gc_id" data-ids="100110" class="selecte pd-5 mb-10 select2" onchange="get_info_by_class(this)">
                        <option value="100110" selected>童衣</option>
                    </select>
                    <span class="err"></span>
                    <input type="hidden" name="type_id" value="" class="text">
                </dd>
            </dl>
            
            
            
                <dl>
                    <dt><i class="required">*</i>上市年份：</dt>
                    <dd>
                        <input name="base_info[year_to_market]" type="text" class="text" value="2011">
                        <span class="err"></span>
                        <p class="hint">上市年份格式：2015 即4位数字的年份</p>
                    </dd>
                </dl>


                
                <dl>
                    <dt><i class="required">*</i>上市季节：</dt>
                    <dd id="gcategory">
                        <select name="base_info[season_to_market]"  class="selecte pd-5 mb-10 select2 ">
                            <option value="">-上市季节-</option>
	                        <option value="1" selected >春季</option>
	                        <option value="2"  >夏季</option>
	                        <option value="3"  >秋季</option>
	                        <option value="4"  >冬季</option>
                        </select>
                        <span class="err"></span>
                        <p class="hint">上市季节必须选择</p>
                    </dd>
                </dl>
                
                <dl>
                    <dt><i class="required">*</i>商品性别：</dt>
                    <dd id="gcategory">
                        <select name="base_info[sex]" class="selecte pd-5 mb-10 select2 ">
                             <option value="" selected>-商品性别-</option>
	                        <option value="2"  >男</option>
	                        <option value="1"  >女</option>
	                        <option value="0" selected >通用</option>
                        </select>
                        <span class="err"></span>
                        <p class="hint">商品性别必须选择</p>
                    </dd>
                </dl>
            <dl style="overflow: visible;">
                <dt><i class="required">*</i>商品品牌：</dt>
                <dd>
                    <div class="ncsc-brand-select">
                        <div class="selection">
                            <input name="base_info[brand_name]" id="brand_name" value="艾勒蓓力" type="text" class="text w180" readonly="">
                            <input type="hidden" name="base_info[brand_id]" id="b_id" value="389"><em class="add-on">
                            <i class="fa fa-caret-square-o-down"></i></em></div>
                        <div class="ncsc-brand-select-container">
                            <div class="brand-index" data-tid="" data-url="get_brands_by_type">
                                <div class="letter" nctype="letter">
                                    <ul>
                                        <li><a href="javascript:void(0);" data-letter="all">全部品牌</a></li>
                                        <li><a href="javascript:void(0);" data-letter="A">A</a></li>
                                        <li><a href="javascript:void(0);" data-letter="B">B</a></li>
                                        <li><a href="javascript:void(0);" data-letter="C">C</a></li>
                                        <li><a href="javascript:void(0);" data-letter="D">D</a></li>
                                        <li><a href="javascript:void(0);" data-letter="E">E</a></li>
                                        <li><a href="javascript:void(0);" data-letter="F">F</a></li>
                                        <li><a href="javascript:void(0);" data-letter="G">G</a></li>
                                        <li><a href="javascript:void(0);" data-letter="H">H</a></li>
                                        <li><a href="javascript:void(0);" data-letter="I">I</a></li>
                                        <li><a href="javascript:void(0);" data-letter="J">J</a></li>
                                        <li><a href="javascript:void(0);" data-letter="K">K</a></li>
                                        <li><a href="javascript:void(0);" data-letter="L">L</a></li>
                                        <li><a href="javascript:void(0);" data-letter="M">M</a></li>
                                        <li><a href="javascript:void(0);" data-letter="N">N</a></li>
                                        <li><a href="javascript:void(0);" data-letter="O">O</a></li>
                                        <li><a href="javascript:void(0);" data-letter="P">P</a></li>
                                        <li><a href="javascript:void(0);" data-letter="Q">Q</a></li>
                                        <li><a href="javascript:void(0);" data-letter="R">R</a></li>
                                        <li><a href="javascript:void(0);" data-letter="S">S</a></li>
                                        <li><a href="javascript:void(0);" data-letter="T">T</a></li>
                                        <li><a href="javascript:void(0);" data-letter="U">U</a></li>
                                        <li><a href="javascript:void(0);" data-letter="V">V</a></li>
                                        <li><a href="javascript:void(0);" data-letter="W">W</a></li>
                                        <li><a href="javascript:void(0);" data-letter="X">X</a></li>
                                        <li><a href="javascript:void(0);" data-letter="Y">Y</a></li>
                                        <li><a href="javascript:void(0);" data-letter="Z">Z</a></li>
                                        <li><a href="javascript:void(0);" data-letter="0-9">其他</a></li>
                                    </ul>
                                </div>
                                <div class="search" nctype="search">
                                    <input name="search_brand_keyword" id="search_brand_keyword" type="text" class="text" placeholder="品牌名称关键字查找"><a href="javascript:void(0);" class="ncbtn-mini" style="vertical-align: top;">Go</a></div>
                            </div>
                            <div class="brand-list ps-container ps-active-y" nctype="brandList">
                                <ul nctype="brand_list">
                                                                </ul>
                            </div>
                            <div class="no-result" nctype="noBrandList" style="">没有符合条件<strong></strong>的品牌</div>
                            <div class="text-c"><a href="javascript:void(0);" class="ncbtn-mini" onclick="$(this).parents('.ncsc-brand-select-container:first').hide();">关闭品牌列表</a></div>
                        </div>

                    </div>
                </dd>
            </dl>
            <dl>
                <dt>商品卖点：</dt>
                <dd>
                    <textarea maxlength="140" onchange="this.value=this.value.substring(0, 140)" onkeyup="this.value=this.value.substring(0, 140)"  name="base_info[goods_jingle]" class="textarea h60 w400"></textarea>
                    <span></span>
                    <p class="hint">商品卖点最长不能超过140个汉字</p>
                </dd>
            </dl>
            <dl>
                <dt nc_type="no_spec"><i class="required">*</i>销售价：</dt>
                <dd nc_type="no_spec">
                    <input name="base_info[goods_price]" value="123.00" data-old="0.00" type="text" class="text w60"><em class="add-on"><i class="fa fa-rmb"></i></em> <span class="price"></span><span class="err"></span>
                    <p class="hint">价格必须是0.01~9999999之间的数字，且不能高于市场价。<br>
                        此价格为商品实际销售价格，如果商品存在规格，该价格显示最低价格。</p>
                </dd>
            </dl>
            <dl>
                <dt><i class="required">*</i>吊牌价：</dt>
                <dd>
                    <input name="base_info[goods_marketprice]" value="123.00" type="text" class="text w60"><em class="add-on"><i class="fa fa-rmb"></i></em> <span class="err"></span>
                    <p class="hint">价格必须是0.01~9999999之间的数字，此价格仅为市场参考售价，请根据该实际情况认真填写。</p>
                </dd>
            </dl>
            <dl>
                <dt>折扣：</dt>
                <dd>
                    <input name="base_info[discount]" value="100" type="text" class="text w60"><em class="add-on">%</em>
                    <p class="hint">根据销售价与市场价比例自动生成，不需要编辑。</p>
                </dd>
            </dl>
            <dl>
                <dt nc_type="no_spec"><i class="required">*</i>商品款号：</dt>
                <dd nc_type="no_spec">
                    <p>
                        <input name="base_info[goods_spu]" id="stocks_code" class="stocks_code" value="KO231" type="text" class="text" nctype="stocks_code"><span class="err"></span>
                    </p>
                    <p class="hint">商家货号是指商家管理商品的编号，买家不可见<br>最多可输入20个字符，支持输入中文、字母、数字、_、/、-和小数点</p>
                </dd>
            </dl>
            <dl>
                <dt nc_type="no_spec"><i class="required">*</i>重量：</dt>
                <dd nc_type="no_spec">
                    <p>
                        <input name="base_info[weight]" id="weight" class="weight" value="1.000" type="number" class="text" nctype="weight"><span>克</span><span class="err"></span>
                    </p>
                    <p class="hint"></p>
                </dd>
            </dl>
            <dl nctype="spec_group_dl" style="overflow: visible" spec_img="t">
                <dt>
                    <i class="required">*</i>颜色：</dt>
                <dd nctype="" class="pos-r">
                    <div class="choose_color_box">
                                                                        <div class="choose_color_box_list mb-10" id="creat_tr_0">
                            <input type="hidden" name="color[0][goods_a_id]" class="color_value color_a_id"  value="40705">
                            <input type="checkbox" nctype="input_checkbox" checked="checked" onchange="color_check_click(this)" class="color-select mr-5" name="color-select[]">
                            <input type="text" name="color[0][color]" nctype="pv_name" class="picker-text w300 mr-5" onchange="change_color(this)" onfocus="f1(this)"  value="灰色" readonly placeholder="选择主色" maxlength="30" data-old="">
                            <input type="hidden" name="color[0][color_value]" class="color_value"  value="#808080">
                            <input type="text" name="color[0][color_remark]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="灰色" maxlength="30">
                            <div class="pos-a choose_color_box_hide hide mt-10 c-333">
                            </div>
                        </div>
                        <div class="choose_color_box_list mb-10" id="creat_tr_1">
                            <input type="checkbox" nctype="input_checkbox" onchange="color_check_click(this)" class="color-select mr-5" name="color-select[]">
                            <input type="text" name="color[1][color]" nctype="pv_name" class="picker-text w300 mr-5" onfocus="f1(this)" readonly value="" placeholder="选择主色" maxlength="30" data-old="">
                            <input type="hidden" name="color[1][color_value]" class="color_value"  value="">
                            <input type="text" name="color[1][color_remark]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30">
                            <div class="pos-a choose_color_box_hide hide mt-10 c-333">
                            </div>
                        </div>
                                                                    </div>
                    <p class="hint">选择标准颜色可增加搜索/导购机会，标准颜色还可填写颜色备注信息（偏深、偏亮等）！</p>
                    <input type="hidden" name="colorISnull" value=""><span class="err"></span>
                </dd>
            </dl>
            <dl nctype="size_dl" class="size_dl" style=" overflow: visible;">
                <dt>
                    <i class="required">*</i>尺码：</dt>
                <dd nctype="size_dd" class="size_dd">
                   <!--                      <div class="col-conten">
                                                <label class="mr-30">
                            <input type="radio" name="size_type" class="size_type" value="1" checked="checked" >中国码
                        </label>
                                            </div>
                     -->
                    <input type="hidden" name="sizeISnull" value=""><span class="err"></span>
                                                                                <div style="background-color: #F6F7Fb;display: block;" class="size_list size_list_1">
                        <ul style="">
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="100" name="" value="100">100
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" checked="true" class="size_val" data-text="110" name="" value="110">110
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="120" name="" value="120">120
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="130" name="" value="130">130
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="140" name="" value="140">140
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="150" name="" value="150">150
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="155" name="" value="155">155
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="160" name="" value="160">160
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="165" name="" value="165">165
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="170" name="" value="170">170
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="175" name="" value="175">175
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="180" name="" value="180">180
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="185" name="" value="185">185
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="19" name="" value="19">19
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="20" name="" value="20">20
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="21" name="" value="21">21
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="22" name="" value="22">22
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="23" name="" value="23">23
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="24" name="" value="24">24
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="25" name="" value="25">25
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="26" name="" value="26">26
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="27" name="" value="27">27
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="28" name="" value="28">28
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="29" name="" value="29">29
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="30" name="" value="30">30
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="31" name="" value="31">31
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="32" name="" value="32">32
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="33" name="" value="33">33
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="34" name="" value="34">34
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="35" name="" value="35">35
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="36" name="" value="36">36
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="37" name="" value="37">37
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="38" name="" value="38">38
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="39" name="" value="39">39
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="40" name="" value="40">40
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="41" name="" value="41">41
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="42" name="" value="42">42
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="44" name="" value="44">44
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="70" name="" value="70">70
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="80" name="" value="80">80
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="90" name="" value="90">90
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="L" name="" value="L">L
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="M" name="" value="M">M
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="S" name="" value="S">S
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="XL" name="" value="XL">XL
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="XS" name="" value="XS">XS
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="XXL" name="" value="XXL">XXL
                                </label>
                            </li>
                                                        <li class="f-l mr-20 ml-10"  style="" data-order="0" data-text="" data-value="">
                                <label>
                                    <input type="checkbox" data-code="1" class="size_val" data-text="XXXL" name="" value="XXXL">XXXL
                                </label>
                            </li>
                                                    </ul>
                        <div class="clear">
                        </div>
                    </div>
                                                                            </dd>
            </dl>
            <dl nc_type="spec_dl" class="spec-bg" style=" overflow: visible;">
                <dt>宝贝销售规格：</dt>
                <dd class="spec-dd">
                    <div class="batch-update-area" style="">
                        <label for="batch-price">批量填充:</label>
                        <input type="text" id="batch_price" placeholder="价格">
                        <input type="text" id="batch_market_price" placeholder="市场价">
                        <!-- <input type="text" id="batch_stocks_code" placeholder="商家编码" maxlength="64">
                        <input type="text" id="batch_bar_code" placeholder="条形码"> -->
                        <input type="button" class="btn btn-primary radius ml-10 mb-10" value="确定" onclick="batch_set()" class="batch-submit">
                        &nbsp;&nbsp;&nbsp;<p class="hint" style="display: inline">点击可批量修改所有的值。</p>
                    </div>
                    <div nctype="spec_div" class="spec-div ps-container">
                        <table border="0" cellpadding="0" cellspacing="0" class="spec_table" style="width:80% !important">
                            <thead>
                                <tr><th width="" nctype="spec_name_1">颜色</th>
                                    <th class="size">尺码</th>
                                    <th class="size-note">尺码备注</th>
                                    <th class="w90"><span class="red">*</span>销售价格</th>
                                    <th class="w90"><span class="red">*</span>市场价</th>
                                    <!--<th class="w90">折扣</th>-->
                                    <th class="w100">商家货号</th>
                                    <th class="w70">条形码</th>
                                </tr>
                            </thead>
                            <tbody nc_type="spec_table">
                                                                                                                                                    <tr class="creat_tr_0 size_tr_110">
                                        <input type="hidden"  class="goods_ea_id" name="size[0][0][goods_ea_id]" value="75031" />
                                        <td><input type="hidden"  class="color" name="size[0][0][color]" value="灰色" />
                                            <span class="goods_color">灰色</span>
                                        </td>
                                        <td><input type="hidden"  class="size_val" name="size[0][0][size]" value="110" />
                                            <input type="hidden"  class="code_segment" name="size[0][0][code_segment]" value="1" />
                                            <span class="goods_size">110</span>
                                        </td>
                                        <td><input class="size-note" type="text" name="size[0][0][size_note]" value="110" /></td>
                                        <td><input class="text price sell_price" type="text" name="size[0][0][stocks_price]" data_type="price" nc_type="price" value="123.00" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>
                                        <td><input class="text price goods_marketprice" type="text" name="size[0][0][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="123.00" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>
                                        <td><input class="text sku stocks_code" type="text" name="size[0][0][stocks_sku]" nctype="stocks_code" value="KN23" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>
                                        <td><input class="text bar_code" type="text" name="size[0][0][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>
                                        </tr>
                                                                                                                                        </tbody>
                        </table>
                        <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
                    <p class="hint">当规格值较多时，可在操作区域通过滑动滚动条查看超出隐藏区域。</p>
                </dd>
            </dl>
            <dl>
                <dt><i class="required"></i>商品图片：</dt>
                <dd>
                    <div class="ncsc-goods-default-pic">
                        <div class="goodspic-uplaod">
                            <div class="upload-thumb"> <img nctype="goods_image" src="http://[::1]/yunjuke/data/shop/album_pic/1_201708291541515.jpg"> </div>
                            <input type="hidden" name="base_info[goods_image]" id="image_path" nctype="goods_image" value="1_201708291541515.jpg">
                            <span class="err"></span>
                            <p class="hint">上传商品默认主图，如多规格值时将默认使用该图或分规格上传各规格主图；支持jpg、gif、png格式上传或从图片空间中选择，建议使用<font color="red">尺寸800x800像素以上、大小不超过1M的正方形图片</font>，上传后的图片将会自动保存在图片空间的默认分类中。</p>
                            <div class="handle">
                                <div class="ncsc-upload-btn">
                                    <a href="javascript:void(0);">
                                        <span><input type="file" hidefocus="true" size="1"  class="input-file" name="image" id="goods_image" data-name="jumpMenu_default" data-type="default_img" ></span>
                                        <p><i class="fa fa-upload"></i>图片上传</p>
                                    </a>
                                </div>
                                <a class="ncbtn mt5" nctype="show_image" href="javascript:;" data-name="jumpMenu_default"><i class="fa fa-photo"></i>从图片空间选择</a>
                                <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style="display:none;" ><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                            </div>
                        </div>
                    </div>
                    <div id="" class="mt-20 hide demo">
                        <div class="goods-gallery add-step2">
                        <!--  <a class="sample_demo" id="select_submit" href="" style="display:none;">提交</a>-->
                            <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                                <span class="r">
                                    <select name="jumpMenu_default"  style="width:100px;" data-function="insert_img" onchange="get_pic(this,1)">
                                        <option value="" style="width:80px;">请选择...</option>
                                                                                                                        <option value="1" style="width:80px;">默认相册</option>
                                                                                                                    </select>
                                </span>
                            </div>
                            <ul class="list pic_list" >
                                <!-- <li onclick="insert_img('xx.png','http://[::1]/yunjuke/application/admin/views/images/u374.png')"><a href="JavaScript:void(0);"><img src="http://[::1]/yunjuke/application/admin/views/images/u374.png" ></a></li> -->
                                
                            </ul>
                            <div class="pagination">
                                
                            </div>
                        </div>
                    </div>
                </dd>
            </dl>
            <h3 id="demo2">商品详情描述</h3>
            <dl class="attr_dl">
                    <dt>商品属性：</dt>
                    <dd class="attr_dd">
                         
                    </dd>
             </dl>
            <dl>
                <dt>商品描述：</dt>
                <dd id="ncProductDetails">
                    <div class="pd-10">
                        <div id="tab_demo" class="HuiTab">
                            <div class="tabBar cl">
                                <span><i class="fa fa-desktop"></i> 电脑端</span>
                                <span><i class="fa fa-mobile-phone"></i> 手机端</span>
                            </div>
                            <div class="tabCon mt-10">
                                <div class="" id="baidu_edit">
                                    <!-- 加载编辑器的容器 -->
                                    <textarea id="content" name="content" type="text/plain"></textarea>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var appcontent = UE.getEditor('content');
                                    </script>
                                </div>
                                <div class="handle">
                                    <div class="ncsc-upload-btn">
                                        <a href="javascript:void(0);">
                                            <span><input type="file" hidefocus="true" size="1" class="input-file" data-name="jumpMenu_editor" name="image" id="editor_img" data-name="jumpMenu_editor" data-type="editor_img" onchange="ajax_upload(this)"></span>
                                            <p><i class="fa fa-upload"></i>图片上传</p>
                                        </a>
                                    </div>
                                    <a class="ncbtn mt5" nctype="show_image" href="javascript:;" data-name="jumpMenu_editor"><i class="fa fa-photo"></i>从图片空间选择</a>
                                    <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style="display:none;"><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                                </div>
                                <div id="" class="mt-20 hide demo">
                                    <div class="goods-gallery add-step2">
                                    <!--  <a class="sample_demo" id="" href="">提交</a>-->
                                        <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                                <span class="r">
                                    <select name="jumpMenu_editor" id="" data-function="insert_editor" onchange="get_pic(this,1)">
                                        <option value="" style="width:80px;">请选择...</option>
                                                                                                                        <option value="1" style="width:80px;">默认相册</option>
                                                                                                                    </select>
                                </span>
                                        </div>
                                        <ul class="list pic_list">
                                        </ul>
                                        <div class="pagination">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabCon mt-10">
                                <div class="ncsc-mobile-editor">
                                    <div class="pannel">
                                        <div class="size-tip"><span nctype="img_count_tip">图片总数不得超过<em>20</em>张</span><i>|</i><span nctype="txt_count_tip">文字不得超过<em>5000</em>字</span></div>
                                        <div class="control-panel" nctype="mobile_pannel">
                                        	                                        </div>
                                        <div class="add-btn">
                                            <ul class="btn-wrap">
                                                <li><a href="javascript:void(0);" nctype="mb_add_img" data-name="jumpMenu_mobile"><i class="fa fa-photo"></i>
                                                    <p>图片</p>
                                                </a></li>
                                                <li><a href="javascript:void(0);" nctype="mb_add_txt"><i class="fa fa-font"></i>
                                                    <p>文字</p>
                                                </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="explain">
                                        <dl>
                                            <dt>1、基本要求：</dt>
                                            <dd>（1）手机详情总体大小：图片+文字，图片不超过20张，文字不超过5000字；</dd>
                                            <dd>建议：所有图片都是本宝贝相关的图片。</dd>
                                        </dl>
                                        <dl>
                                            <dt>2、图片大小要求：</dt>
                                            <dd>（1）建议使用宽度480 ~ 620像素、高度小于等于960像素的图片；</dd>
                                            <dd>（2）格式为：JPG\JEPG\GIF\PNG；</dd>
                                            <dd>举例：可以上传一张宽度为480，高度为960像素，格式为JPG的图片。</dd>
                                        </dl>
                                        <dl>
                                            <dt>3、文字要求：</dt>
                                            <dd>（1）每次插入文字不能超过500个字，标点、特殊字符按照一个字计算；</dd>
                                            <dd>（2）请手动输入文字，不要复制粘贴网页上的文字，防止出现乱码；</dd>
                                            <dd>（3）以下特殊字符“&lt;”、“&gt;”、“"”、“'”、“\”会被替换为空。</dd>
                                            <dd>建议：不要添加太多的文字，这样看起来更清晰。</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="ncsc-mobile-edit-area">
                                    <div class="ncsc-mea-img hide" nctype="mea_img">
                                    	<div class="ncsc-upload-btn">
	                                       <a href="javascript:void(0);">
	                                           <span><input type="file" hidefocus="true" size="1" class="input-file" name="image" id="mobile_img" data-name="jumpMenu_mobile" data-type="editor_img"></span>
	                                           <p><i class="fa fa-upload"></i>图片上传</p>
	                                       </a>
                                    	</div>
                                        <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style=""><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                                        <div id="" class="mt-20 hide demo" style="display: block;">
                                            <div class="goods-gallery add-step2"><a class="sample_demo" id="" href="" style="display:none;">提交</a>
                                                <div class="nav"><span class="l">相册 &gt;全部图片        </span>
                                                <span class="r">
                                                    <select name="jumpMenu_mobile" id="" style="width:100px;" data-function="insert_mobile_img">
                                                         <option value="" style="width:80px;">请选择...</option>
                                                                                                                                                                                    <option value="1" style="width:80px;">默认相册</option>
                                                                                                                                                                            </select>
                                                </span>
                                                </div>
                                                <ul class="list pic_list">
                                                </ul>
                                                <div class="pagination">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ncsc-mea-text hide" nctype="mea_txt">
                                        <p id="meat_content_count" class="text-tip"></p>
                                        <textarea class="textarea valid" nctype="meat_content"></textarea>
                                        <div class="button">
                                            <a class="ncbtn ncbtn-bluejeansjeansjeans" nctype="meat_submit" href="javascript:void(0);">确认</a>
                                            <a class="ncbtn ml10" nctype="meat_cancel" href="javascript:void(0);">取消</a>
                                        </div>
                                        <a class="text-close" nctype="meat_cancel" href="javascript:void(0);">X</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </dd>
            </dl>
            <h3 id="demo6">其他信息</h3>
            <dl>
                    <dt>物流方式：</dt>
                    <dd>
                        <select name="base_info[logistics_type]" id="base_info[gc_id]" class="selecte pd-5 mb-10 select2" onchange="">
                            <option value="0" selected>不限制</option>
                            <option value="1"   >仅限到店提货</option>
                            <option value="2" >仅限快递</option>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>限购数量：</dt>
                    <dd>
                        <input name="base_info[limit_num]" type="text" class="text w400" value="0">
                        <span class="err"></span>
                        <p class="hint">0 表示不限制</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="">是否可用优惠券</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="audit1" class="cb-enable selected" id="cb" title="开启">开启</label>
                            <label for="audit2" class="cb-disable " id="bc" title="关闭">关闭</label>
                            <input type="radio" id="audit1" name="base_info[available_coupons]" value="1" checked="checked">
                            <input type="radio" id="audit2" name="base_info[available_coupons]" value="0" >
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="">是否支持会员折扣</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="audit3" class="cb-enable selected" id="cb" title="开启">开启</label>
                            <label for="audit4" class="cb-disable " id="bc" title="关闭">关闭</label>
                            <input type="radio" id="audit3" name="base_info[available_member_dis]" value="1" checked="checked">
                            <input type="radio" id="audit4" name="base_info[available_member_dis]" value="0" >
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
        </div>
        <div class="bottom tc mt-30 mb-30">
            <label class="submit-border">
                <input type="submit " nctype="formSubmit" class="submit" style="width: 200px;cursor: pointer" value="下一步，上传商品图片">
            </label>
        </div>
        <input name="m_body" autocomplete="off" type="hidden" value=''>
    </form>
<div id="fixedNavBar">
    <h3>页面导航</h3>
    <ul>
        <li><a id="demo1Btn"  href="#demo1" class="demoBtn">基本信息</a></li>
        <li><a id="demo2Btn" href="#demo2" class="demoBtn">详情描述</a></li>
        <li><a id="demo6Btn" href="#demo6" class="demoBtn">其他信息</a></li>
    </ul>
</div>
<script>

</script>
</div>
<script type="text/javascript">
    $(function(){
    	
//  	判断是编辑还会提交新的内容
    	var confirmtype;
    	
        get_class_option('#gc_id',$('#gc_id').data('ids'));
        get_gstn_option('#gstn_id',$('#gstn_id').data('ids'));
        function get_class_option(obj,class_id){
            var class_id = arguments[1] ? arguments[1] : 0;
            if($(obj).length==0){
                return false;
            }
            $.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_cate_option?class_id='+class_id,
                success:function(data){
                    if(data.state){
                        $(obj).append(data.info);
                    } 
                }
            })
        }
        function get_gstn_option(obj,gstn_id){
            var gstn_id = arguments[1] ? arguments[1] : 0;
            if($(obj).length==0){
                return false;
            }
            $.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_gstn_option?gstn_id='+gstn_id,
                success:function(data){
                    if(data.state){
                        $(obj).append(data.info);
                    } 
                }
            })
        }
        if($('#gc_id').val()>0){
        	$.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_attr?class_id='+$('#gc_id').val(),
                success:function(data){
                    if(data.state){
                    	goods_attr = [];
                    	ajax_input_attr_html(data.info,goods_attr);
                    }
                }
            })
        }
        $(".select2").select2({
            width:'200px'
        });
        //上传显示
        $(".type-file-file").change(function () {
            $(".type-file-text").val($(this).val());
        });
        //滚动条
        $('div[nctype="brandList"]').perfectScrollbar();
        //商品品牌  隐藏显示
        $('#brand_name').focus(function(){
            $('.ncsc-brand-select > .ncsc-brand-select-container').show();
        });
        // 选择品牌
        $('ul[nctype="brand_list"]').on('click', 'li', function(){
            $('#b_id').val($(this).attr('data-id'));
            $('#brand_name').val($(this).attr('data-name'));
            $('.ncsc-brand-select > .ncsc-brand-select-container').hide();
            $.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_brand_size?brand_id='+$(this).attr('data-id'),
                success:function(data){
                    if(data.state){
                    	var size_type = Array('','中国码','美国码','英国码','日本码');
                    	var sizes_list = '';
                        var sizes_html = '<div>';
                        var num = 0;
                        var style = 'display: block;background-color: #F6F7Fb;';
                        var checked = 'checked="checked"';
                        sizes_html += '<div class="col-conten">';
                        $.each(data.sizes,function(k,v){
                            if(num>0){
                                checked = '';
                                style = 'display: none;';
                            }
                            
                            /* sizes_html +='<label class="mr-10 ml-5">'+
                                    '<input type="radio" name="size_type" class="size_type" value="'+k+'" '+checked+' >'+
                                    size_type[k]+'</label>'; */
                           if(v.size_list !== undefined){
                               sizes_list +='<div style="'+style+'" class="size_list size_list_'+k+'"><ul>';
                                $.each(v.size_list,function(kk,vv){
                                    sizes_list += '<li  style="" class="f-l mr-10 ml-5" data-order="0" data-text="'+vv.size+'" data-value="'+vv.size+'" class="remark">'+
                                            '<label>'+
                                            '<input type="checkbox" class="size_val" data-code="'+k+'" data-text="'+vv.size+'" name="" value="'+vv.size+'">'+
                                            vv.size+'</label></li>';
                                })
                                sizes_list +='</ul><div class="clear"></div></div>';
                            }
                           num ++;
                        })
                        sizes_html += '</div>';
                        sizes_html += sizes_list;
                        sizes_html += '</div>';
                        $("dl.size_dl").attr("style",'');
                        $("dd.size_dd").html(sizes_html);
                        $('tbody[nc_type=spec_table]').html('');
                    } 
                }
            })
        });
        /*表单验证*/
        var isCodeSubmit = true;
        function stockCodeCheck(){
        	isCodeSubmit = true;goodsId = $('#editGoodsId').val();
        	 $('input.sku').each(function(){
        		 obj = $(this);
             	stockCode = $(this).val();brand_id = $('#b_id').val();
             	size = $(this).parents('tr').find('.size_val').val();
             	color = $(this).parents('tr').find('.color').val();
             	goods_ea_id = $(this).parents('tr').find('.goods_ea_id').val();
             	checkStockCode = true;
             	if(stockCode!=''){
             		isUseC = true;
             		$('input.sku').each(function(){
             			sizeNow = $(this).parents('tr').find('.size_val').val();
             			colorNow = $(this).parents('tr').find('.color').val();
             			//console.log(colorNow);
             			if($(this).val()==stockCode&&color!=colorNow){
             				obj.siblings('span.checkCode').show();
             				isUseC = false;
             			}
             		})
             		//console.log(isUseC);
             		if(isUseC){
             			obj.siblings('span.checkCode').hide();
             			$.ajax({
                            url :'checkStockCode',
                            type:'post',
                            cache:false,
    	                    async:false,
                            data:{
                            	stock_code : stockCode,
                            	brand_id : brand_id,
                            	goods_id : goodsId,
                            	goods_ea_id : goods_ea_id,
                            },
                            dataType:'json',
                            success:function(data){
                            	if(data){
                            		checkStockCode = true;
                            	}else{
                            		checkStockCode = false;
                            	}
                            }
                        })
             		}else{
             			isCodeSubmit = false;
             		}
             		//console.log(checkStockCode);
             		if(!checkStockCode){
             			obj.siblings('span.dberr').show();
             			isCodeSubmit = false;
             		}else{
             			obj.siblings('span.dberr').hide();
             		}
             		price = $(this).parents('tr').find('.sell_price').val();
             		marketprice = $(this).parents('tr').find('.goods_marketprice').val();
             		if(parseFloat(price)>=0){
             			$(this).parents('tr').find('.sell_price').removeClass('errrrr');
             		}else{
             			//$(this).parents('tr').find('input.sell_price').css({"background-color":"#FFF0F0","background-repeat":"repeat","border":"1px dashed #E84C3D"});
             			$(this).parents('tr').find('input.sell_price').addClass('errrrr');
             			//$(this).parents('tr').find('input.goods_marketprice').addClass('error');
             			isCodeSubmit = false;
             		}
             		if(parseFloat(marketprice)>=0){
             			$(this).parents('tr').find('.goods_marketprice').removeClass('errrrr');
             		}else{
             			//$(this).parents('tr').find('input.sell_price').css({"background-color":"#FFF0F0","background-repeat":"repeat","border":"1px dashed #E84C3D"});
             			$(this).parents('tr').find('input.goods_marketprice').addClass('errrrr');
             			//$(this).parents('tr').find('input.goods_marketprice').addClass('error');
             			isCodeSubmit = false;
             		}
             	}else{
             		/* $(this).addClass('error');
         			isCodeSubmit = false; */
             	}
             })
        }
        var __formSubmit = false;
            $(".submit-border .submit[nctype='formSubmit']").click(function () {
            	stockCodeCheck();
                if (__formSubmit) {
                    return false;
                }
                if(!isCodeSubmit){
                	return false;
                }
                if ($("#form_2").valid()) {
                    __formSubmit = true;
                    $("#form_2").submit();
                }
            })
            
            //颜色必选
            jQuery.validator.methods.colorISnull = function(value, element) {
            	var colorStatus = false;
		        $('div.choose_color_box').find('.choose_color_box_list').each(function(){
		        	var isCheckColor = $(this).find('input[type=checkbox]');
		        	var isCheckColorValue = $(this).find('input[nctype=pv_name]').val();
		        	if(isCheckColor.is(':checked')&&isCheckColorValue!=''){
		        		colorStatus = true;
		        	}
		        })
		        return colorStatus;
		    };
            //尺码必选
            jQuery.validator.methods.sizeISnull = function(value, element) {
            	var sizeStatus = false;
		        $('dl.size_dl').find('.size_list').find('ul').find('li').each(function(){
		        	var isCheckSize = $(this).find('input[type=checkbox]');
		        	if(isCheckSize.is(':checked')){
		        		sizeStatus = true;
		        	}
		        })
		        return sizeStatus;
		    };
            //款号唯一检验
            jQuery.validator.methods.isHaveBrand = function(value, element) {
            	var brandId = $('#b_id').val();
            	if(brandId){
            		return true;
            	}else{
            		return false;
            	}
		    };
            $('#form_2').validate({
                errorPlacement: function (error, element) {
                    __formSubmit = false;
                    $(element).nextAll('span.err').append(error);
                },
                rules: {
                	"base_info[year_to_market]": {
                        required: true,
                        number: true,
                        minlength: 4,
                        maxlength: 4
                    },
                    "base_info[season_to_market]": {
                        required: true,
                    },
                    "base_info[sex]": {
                        required: true,
                    },




                    "base_info[goods_weight]": {
                        required :true,
                    },
                    "base_info[goods_name]": {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    "base_info[gc_id]": {
                       required: true
                    },
                    "base_info[brand_name]": {
                       required: true
                    },
                    "base_info[goods_jingle]": {
                        maxlength: 140
                    },
                    "base_info[goods_spu]": {
                    	required: true,
                    	isHaveBrand: true,
                    	remote	: {
                            url :'checkSpu',
                            type:'post',
                            cache:false,
    	                    async:false,
                            data:{
                            	goods_spu : function(){
                                    return $('#stocks_code').val();
                                },
                            	brand_id : function(){
                                    return $('#b_id').val();
                                },
                            	goods_id : function(){
                                    return $('#editGoodsId').val();
                                },
                            }
                        },
                    },
                    "colorISnull": {
                    	colorISnull: true,
                    },
                    "sizeISnull": {
                    	sizeISnull: true,
                    },
                    "base_info[goods_price]" : {
                        required    : true,
                        number      : true,
                        min         : 0.01
//                     max         : 9999999,
                     //checkPrice  : true
                     },
                    "base_info[goods_marketprice]" : {
                        required    : true,
                        number      : true,
                        min         : 0.01
//                     max         : 9999999,
                     //checkPrice  : true
                     },
//                    goods_costprice: {
//                        number: true,
//                        min: 0.00,
//                        max: 9999999
//                    },
                    /*amount  : {
                     required    : true,
                     digits      : true,
                     min         : 0,
                     max         : 999999999
                     },*/
                   /*  "base_info[goods_image]": {
                        required: true
                    }, */
                    g_vindate: {
                        required: function () {
                            if ($("#is_gv_1").prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    g_vlimit: {
                        required: function () {
                            if ($("#is_gv_1").prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        },
                        range: [1, 10]
                    },
                    g_deliverdate: {
                        required: function () {
                            if ($('#is_presell_1').prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                messages: {
                	"base_info[year_to_market]": {
                        required: '<i class="fa fa-exclamation-circle"></i>上市年份不能为空',
                        number: '<i class="fa fa-exclamation-circle"></i>上市年份只能是数字',
                        minlength: '<i class="fa fa-exclamation-circle"></i>上市年份长度只能是4个字符',
                        maxlength: '<i class="fa fa-exclamation-circle"></i>上市年份长度只能是4个字符',
                    },
                    "base_info[season_to_market]": {
                        required: '<i class="fa fa-exclamation-circle"></i>上市季节不能为空'
                     },
                     "base_info[sex]": {
                         required: '<i class="fa fa-exclamation-circle"></i>商品性别不能为空'
                      },
                      
                    "base_info[goods_name]": {
                        required: '<i class="fa fa-exclamation-circle"></i>商品名称不能为空',
                        minlength: '<i class="fa fa-exclamation-circle"></i>商品标题名称长度至少3个字符，最长50个汉字',
                        maxlength: '<i class="fa fa-exclamation-circle"></i>商品标题名称长度至少3个字符，最长50个汉字'
                    },
                    "base_info[gc_id]": {
                       required: '<i class="fa fa-exclamation-circle"></i>商品分类不能为空'
                    },
                    "base_info[brand_name]": {
                       required: '<i class="fa fa-exclamation-circle"></i>商品品牌不能为空'
                    },
                    "base_info[goods_jingle]": {
                        maxlength: '<i class="fa fa-exclamation-circle"></i>商品卖点不能超过140个字符'
                    },
                    "base_info[goods_spu]": {
                    	required: '<i class="fa fa-exclamation-circle"></i>款号不能为空',
                    	isHaveBrand: '<i class="fa fa-exclamation-circle"></i>请先选择品牌',
                    	remote	: '<i class="fa fa-exclamation-circle"></i>该品牌下此款号已占用',
                    },
                    "base_info[goods_weight]": {
                        required: '<i class="fa fa-exclamation-circle"></i>重量不能为空',
                    },
                    "colorISnull": {
                    	colorISnull: '<i class="fa fa-exclamation-circle"></i>颜色必选',
                    },
                    "sizeISnull": {
                    	sizeISnull: '<i class="fa fa-exclamation-circle"></i>尺码必选',
                    },
                    "base_info[goods_price]": {
                        required: '<i class="fa fa-exclamation-circle"></i>商品价格不能为空',
                        number: '<i class="fa fa-exclamation-circle"></i>商品价格只能是数字',
                        min: '<i class="fa fa-exclamation-circle"></i>商品价格必须是0.01~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>商品价格必须是0.01~9999999之间的数字',
                        checkPrice: '<i class="fa fa-exclamation-circle"></i>商品价格不能高于市场价格'
                    },
                    "base_info[goods_marketprice]": {
//                        required: '<i class="fa fa-exclamation-circle"></i>请填写市场价',
                        number: '<i class="fa fa-exclamation-circle"></i>请填写正确的价格',
                        min: '<i class="fa fa-exclamation-circle"></i>请填写0.01~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>请填写0.01~9999999之间的数字',
                        checkPrice: '<i class="fa fa-exclamation-circle"></i>市场价格不能低于商品价格'
                    },
                    goods_costprice: {
                        number: '<i class="fa fa-exclamation-circle"></i>请填写正确的价格',
                        min: '<i class="fa fa-exclamation-circle"></i>请填写0.00~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>请填写0.00~9999999之间的数字'
                    },
                    /*amount : {
                     required    : '<i class="fa fa-exclamation-circle"></i>商品库存不能为空',
                     digits      : '<i class="fa fa-exclamation-circle"></i>库存只能填写数字',
                     min         : '<i class="fa fa-exclamation-circle"></i>商铺库存数量必须为0~999999999之间的整数',
                     max         : '<i class="fa fa-exclamation-circle"></i>商铺库存数量必须为0~999999999之间的整数'
                     },*/
                   /*  "base_info[goods_image]": {
                        required: '<i class="fa fa-exclamation-circle"></i>请设置商品主图'
                    }, */
                    g_vindate: {
                        required: '<i class="fa fa-exclamation-circle"></i>请选择有效期'
                    },
                    g_vlimit: {
                        required: '<i class="fa fa-exclamation-circle"></i>请填写1~10之间的数字',
                        range: '<i class="fa fa-exclamation-circle"></i>请填写1~10之间的数字'
                    },
                    g_deliverdate: {
                        required: '<i class="fa fa-exclamation-circle"></i>请选择有效期'
                    }
                }
            });
        /**/
        $('dl[nctype="spec_group_dl"]').on('click', 'span[nctype="input_checkbox"] > input[type="checkbox"]',function(){
            //into_array();
            //goods_stock_set();
        });
        var spec_group_checked = ['',''];
        var str = '';
        var V = new Array();

        //点击从图片空间选择
        $(".ncbtn[nctype='show_image']").click(function(){
            $(this).hide();
            $(this).next().show();
            var name = $(this).data("name");
            var obj = $(this).parents("dd").find('select[name="'+name+'"]');
            get_pic(obj,1);
            $(this).parents("dd").find(".demo").show();
        })
        //关闭相册
        $(".ncbtn[nctype='del_goods_demo']").click(function(){
            $(this).hide();
            $(this).prev().show();
            $(this).parents("dd").find(".demo").hide();
        })
        //h-ui 选项卡
        $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","0");
        $('input[name="g_state"]').click(function(){
            if($(this).attr('nctype') == 'auto'){
                $('#starttime').removeAttr('disabled').css('background','');
                //$('#starttime_H').removeAttr('disabled').css('background','');
                //$('#starttime_i').removeAttr('disabled').css('background','');
            }else{
                $('#starttime').attr('disabled','disabled').css('background','#E7E7E7 none');
                //$('#starttime_H').attr('disabled','disabled').css('background','#E7E7E7 none');
                //$('#starttime_i').attr('disabled','disabled').css('background','#E7E7E7 none');
            }
        });
        //手机端
        $('.btn-wrap a[nctype="mb_add_img"]').on("click",function(){
            $(".ncsc-mobile-edit-area .ncsc-mea-text").hide();
            $(".ncsc-mobile-edit-area .ncsc-mea-img").show();
            $(".ncsc-mobile-edit-area .ncsc-mea-img a").show();
            $(".ncsc-mobile-edit-area .ncsc-mea-img div").show();
            var name = $(this).data("name");
            var obj = $(this).parents("dd").find('select[name="'+name+'"]');
            get_pic(obj,1);
            
        })

        // 手机端——插图图片
        insert_mobile_img = function(obj){
        	var filepath = $(obj).data('src');
            _data = new Object;
            _data.type = 'image';
            _data.value = filepath;
            _rs = mDataInsert(_data);
            $('<div class="module m-image"></div>')
                    .append('<div class="tools"><a nctype="mp_up" href="javascript:void(0);">上移</a><a nctype="mp_down" href="javascript:void(0);">下移</a>' +
                            '<a nctype="mp_rpl" href="javascript:void(0);">替换</a><a nctype="mp_del" href="javascript:void(0);">删除</a></div>')
                    .append('<div class="content"><div class="image-div"><img src="' + filepath + '"></div></div>')
                    .append('<div class="cover"></div>').appendTo('div[nctype="mobile_pannel"]');
        }
        /* 手机端 商品描述 */
        // 显示隐藏控制面板
        $('div[nctype="mobile_pannel"]').on('click', '.module', function(){
            mbPannelInit();
            $(this).siblings().removeClass('current').end().addClass('current');
        });
        // 上移
        $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_up"]', function(){
            var _parents = $(this).parents('.module:first');
            _rs = mDataMove(_parents.index(), 0);
            if (!_rs) {
                return false;
            }
            _parents.clone().insertBefore(_parents.prev()).end().remove();
            mbPannelInit();
        });
        // 下移
        $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_down"]', function(){
            var _parents = $(this).parents('.module:first');
            _rs = mDataMove(_parents.index(), 1);
            if (!_rs) {
                return false;
            }
            _parents.clone().insertAfter(_parents.next()).end().remove();
            mbPannelInit();
        });
         // 编辑
        $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_edit"]', function(){
        	confirmtype=1;
            $(".ncsc-mobile-edit-area .ncsc-mea-text").show();
            $(".ncsc-mobile-edit-area .ncsc-mea-img").hide();
            
            $('textarea[nctype="meat_content"]').unbind().charCount({
                allowed: 500,
                warning: 50,
                counterContainerID: 'meat_content_count',
                firstCounterText:   '还可以输入',
                endCounterText:     '字',
                errorCounterText:   '已经超出'
            });
           
            
        var text_div = $(this).parent().next().find(".text-div");
        $(".ncsc-mobile-edit-area .ncsc-mea-text textarea").val(text_div.html())
        
            mbPannelInit();
        });
        // 删除
        $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_del"]', function(){
            var _parents = $(this).parents('.module:first');
            mDataRemove(_parents.index());
            _parents.remove();
            mbPannelInit();
        });
        // 初始化控制面板
        mbPannelInit = function(){
            $('div[nctype="mobile_pannel"]')
                    .find('a[nctype^="mp_"]').show().end()
                    .find('.module')
                    .first().find('a[nctype="mp_up"]').hide().end().end()
                    .last().find('a[nctype="mp_down"]').hide();
        }
        // 获取数据
        mDataGet = function(){
            _m_body = $('input[name="m_body"]').val();
            if (_m_body == '' || _m_body == 'false') {
                var _m_data = new Array;
            } else {
                eval('var _m_data = ' + _m_body);
            }
            return _m_data;
        }
        // 设置数据
        mDataSet = function(data){
            var _i_c = 0;
            var _i_c_m = 20;
            var _t_c = 0;
            var _t_c_m = 5000;
            var _sign = true;
            $.each(data, function(i, n){
                if (n.type == 'image') {
                    _i_c += 1;
                    if (_i_c > _i_c_m) {
                        layer.msg('只能选择'+_i_c_m+'张图片');
                        _sign = false;
                        return false;
                    }
                } else if (n.type == 'text') {
                    _t_c += n.value.length;
                    if (_t_c > _t_c_m) {
                    	layer.msg('只能输入'+_t_c_m+'个字符');
                        _sign = false;
                        return false;
                    }
                }
            });
            if (!_sign) {
                return false;
            }
            $('span[nctype="img_count_tip"]').html('还可以选择图片<em>' + (_i_c_m - _i_c) + '</em>张');
            $('span[nctype="txt_count_tip"]').html('还可以输入<em>' + (_t_c_m - _t_c) + '</em>字');
           
            _data = JSON.stringify(data);
            
            $('input[name="m_body"]').val(_data);
            return true;
        }

        // type 0上移  1下移
        mDataMove = function(index, type) {

            _m_data = mDataGet();
            _data = _m_data.splice(index, 1);
            if (type) {
                index += 1;
            } else {
                index -= 1;
            }
            _m_data.splice(index, 0, _data[0]);
            return mDataSet(_m_data);
        }
        // 数据移除
        mDataRemove = function(index){
            _m_data = mDataGet();
            _m_data.splice(index, 1);     // 删除数据
            return mDataSet(_m_data);
        }
        // 替换数据
        mDataReplace = function(index, data){
            _m_data = mDataGet();
            _m_data.splice(index, 1, data);
            return mDataSet(_m_data);
        }
        // 插入数据
        mDataInsert = function(data){
            _m_data = mDataGet();
            _m_data.push(data);
            return mDataSet(_m_data);
        }
        // 手机——编辑
        $(".add-btn a[nctype='mb_add_txt']").click(function(){
        	confirmtype=2;
            $(".ncsc-mobile-edit-area .ncsc-mea-text").show();
            $(".ncsc-mobile-edit-area .ncsc-mea-img").hide();
           
            $('textarea[nctype="meat_content"]').unbind().charCount({
                allowed: 500,
                warning: 50,
                counterContainerID: 'meat_content_count',
                firstCounterText:   '还可以输入',
                endCounterText:     '字',
                errorCounterText:   '已经超出'
            });
           
        })
        // 手机——编辑 关闭
        $('a[nctype="meat_cancel"]').click(function(){
        	$(".text-tip").html("");
            $(this).parents('div[nctype="mea_txt"]').find('textarea[nctype="meat_content"]').val('').end().hide();
        });
        // 转码
        toTxt = function(str) {
            var RexStr = /\<|\>|\"|\'|\&|\\/g
            str = str.replace(RexStr, function(MatchStr) {
                switch (MatchStr) {
                    case "<":
                        return "";
                        break;
                    case ">":
                        return "";
                        break;
                    case "\"":
                        return "";
                        break;
                    case "'":
                        return "";
                        break;
                    case "&":
                        return "";
                        break;
                    case "\\":
                        return "";
                        break;
                    default:
                        break;
                }
            })
            return str;
        }
        // 手机——提交 文字输入框按钮
        $('a[nctype="meat_submit"]').click(function(){
            var _c = toTxt($('textarea[nctype="meat_content"]').val().replace(/[\r\n]/g,''));
            var _cl = _c.length;
            if (_cl == 0 || _cl > 500) {
                return false;
            }
            _data = new Object;
            _data.type = 'text';
            _data.value = _c;
            _rs = mDataInsert(_data);
            if (!_rs) {
                return false;
            }
            if(confirmtype==1){
            	$(".current .text-div").html(_c);
            }else{
            $('<div class="module m-text"></div>')
                    .append('<div class="tools"><a nctype="mp_up" href="javascript:void(0);">上移</a><a nctype="mp_down" href="javascript:void(0);">下移</a><a nctype="mp_edit" href="javascript:void(0);">编辑</a><a nctype="mp_del" href="javascript:void(0);">删除</a></div>')
                    .append('<div class="content"><div class="text-div">' + _c + '</div></div>')
                    .append('<div class="cover"></div>').appendTo('div[nctype="mobile_pannel"]');
			}
            $('a[nctype="meat_cancel"]').click();
            $(".text-tip").html("");
        });
      // 商品价格改变计算折扣
        $('input[name="base_info[goods_price]"]').change(function () {
            var _new_val = $(this).val();
            $("#batch_price").val(_new_val);
            var goods_marketprice = $("input[name='base_info[goods_marketprice]']").val();
            if (goods_marketprice) {
                discountCalculator();
            }
        })
        $('input[name="base_info[goods_marketprice]"]').change(function () {
            var _new_val = $(this).val();
            $("#batch_market_price").val(_new_val);
            var goods_price = $("input[name='base_info[goods_price]']").val();
            if (goods_price) {
                discountCalculator();
            }
        })
       // 计算折扣
        function discountCalculator() {
            var _price = parseFloat($('input[name="base_info[goods_price]"]').val());
            var _marketprice = parseFloat($('input[name="base_info[goods_marketprice]"]').val());
            if((!isNaN(_price) && _price != 0) && (!isNaN(_marketprice) && _marketprice != 0)){
                var _discount = parseInt(_price/_marketprice*100);
                $('input[name="base_info[discount]"]').val(_discount);
            }
        }

    });
    
  
    /* 插入商品图片 */
    function insert_img(obj) {
    	var name = $(obj).data('name');
    	var src = $(obj).data('src');
        $('input[nctype="goods_image"]').val(name);
        $('img[nctype="goods_image"]').attr('src',src);
    }
    //h-ui 选项卡
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
            $(tabCon).eq(index).show();
        });
    }
    //电脑端——插入图片到百度编辑器
    /* 插入编辑器 */
    function insert_editor(obj) {
    	var file_path = $(obj).data('src');
        appcontent.execCommand( 'insertimage', {
            src:file_path,
           /* width:'100',
            height:'100'*/
        } );
    }
    //品牌搜索————按字母
    $('.letter[nctype="letter"]').find('a[data-letter]').click(function(){
        var _url = $(this).parents('.brand-index:first').attr('data-url');
        var _tid = $(this).parents('.brand-index:first').attr('data-tid');
        var _letter = $(this).attr('data-letter');
        var _search = $(this).html();
        $.getJSON(_url, {type : 'letter', tid : _tid, letter : _letter}, function(data){
            insertBrand(data, _search);
        });
    });
    //品牌搜索————按关键字
    $('.search[nctype="search"]').find('a').click(function(){
        var _url = $(this).parents('.brand-index:first').attr('data-url');
        var _tid = $(this).parents('.brand-index:first').attr('data-tid');
        var _keyword = $('#search_brand_keyword').val();
        $.getJSON(_url, {type : 'keyword', tid : _tid, keyword : _keyword}, function(data){
            insertBrand(data, _keyword);
        });
    });
    function insertBrand(param, search) {
        $('div[nctype="brandList"]').show();
        $('div[nctype="noBrandList"]').hide();
        var _ul = $('ul[nctype="brand_list"]');
        _ul.html('');
        if ($.isEmptyObject(param)) {
            $('div[nctype="brandList"]').hide();
            $('div[nctype="noBrandList"]').show().find('strong').html(search);
            return false;
        }
        $.each(param, function(i, n){
            $('<li data-id="' + n.brand_id + '" data-name="' + n.brand_name + '"><em>' + n.brand_initial + '</em>' + n.brand_name + '</li>').appendTo(_ul);
        });

        //鎼滅储鍝佺墝鍒楄〃婊氭潯缁戝畾
        $('div[nctype="brandList"]').perfectScrollbar('update');
    }
    function getImageWidthAndHeight(id, callback) {
	  var _URL = window.URL || window.webkitURL;
	  $("." + id).change(function (e) {
	    var file, img;
	    if ((file = this.files[0])) {
	      img = new Image();
	      img.onload = function () {
	        callback && callback({"width": this.width, "height": this.height, "filesize": file.size});
	      };
	      img.src = _URL.createObjectURL(file);
	    }
	  });
	}
    //解决file change事件只能用一次的问题
    $("body").delegate('input[type="file"]', 'change',function () {
        ajax_upload($(this));
    });
	function ajax_upload(obj) {
	    var filepath = $(obj).val();
	    var nctype_image = $(obj).attr('id');
	    var type = $(obj).data('type');
	    var name = $(obj).data('name');
	    var next_obj = $(obj).parents("dd").find('select[name="'+name+'"]');
	  	if(!/.(gif|jpg|png|GIF|JPG|PNG)$/.test(filepath)){
		  	layer.msg("图片限于gif,jpg,png格式");
		  	$(obj).val("").focus();
		  	return false;
	  	}else{
	  	  /*getImageWidthAndHeight('goods_image', function (obj) {
		  	   if (obj.width < 800 || obj.height < 800) {
		  		 	layer.msg("建议使用尺寸800x800像素以上");
    	 			$(".type-file-file").val("").focus();
         			return false;
		  	   }
	  	  });*/
		}
        $.ajaxFileUpload({
            url : 'goods_pic_upload?op=ajax_upload',
            secureuri : false,
            fileElementId : nctype_image,
            dataType : 'json',
            data : {name : 'image'},
            success : function (data, status) {
                if(type == 'default_img'){
                    if (data.state == false) {
                        layer.msg(data.msg)
                    } else {
                        $('input[nctype="'+nctype_image+'"]').val(data.pic_info.apic_cover);
                        $('img[nctype="'+nctype_image+'"]').attr('src',data.pic_info.pic_url);
                    }
                }else if(type == 'editor_img' || type == 'mobile_img'){
                    if (data.state == false) {
                        layer.msg(data.msg)
                    }else{
                        $(next_obj).parents("dd").find(".demo").show();
                        get_pic(next_obj,1)
                    }
                }
            },
            error : function (data, status, e) {
                layer.msg(e);
                //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
            }
        });

	}
	function get_pic(this_obj,curr){
    	var aclass_id = $(this_obj).val();
    	  $.getJSON('goods_pic_room_view?op=page', {aclass_id:aclass_id,rp:24,
    		  curpage:curr //向服务端传的参数，此处只是演示
    	  }, function(data){
    		  var content = '';
    		  var onclick_function = $(this_obj).data('function');
    		 if(data.pic_info){
    			 $.each(data.pic_info,function(k,v){
    				 content += '<li data-name="'+v.apic_cover+'" data-src="'+v.pic_url+'"  onclick="'+onclick_function+'(this)">'+
    				 '<a href="JavaScript:void(0);"><img src='+v.pic_url+' ></a></li>';
    			 })
    		 }
    		  $(this_obj).parents('.nav').next('.pic_list').html(content);
    	    //显示分页
    	    laypage({
    	      cont: $(this_obj).parents('.demo').find(".pagination"),
    	      skin: '#41BEDD',
    	      pages: data.page_info.page_count, //通过后台拿到的总页数
    	      curr: data.page_info.curr, //当前页
    	      jump: function(obj, first){ //触发分页后的回调
    	        if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
    	        	get_pic(this_obj,obj.curr);
    	        }
    	      }
    	    });
    	});
    }
	function change_sp_value(obj,value_id){
    	 var value=$(obj).val();
    	 $.getJSON('ajax_edit_spec_value', {value_id : value_id, sp_value_name : value}, function(data){
		 if(data.state=='403'){
				login_ajax('shopadmin');
			}else
         	if (data.state == true) {
                
         	}else{
         		layer.msg(data.msg);
         		$(obj).value = data.data;
         	}

        });
    }
    
</script>

<script>
        //选中input
        var d = 2;
        var s = 2;
        var i = 2;
        var s_arr = [];
        //info:选中那条的数据
        //type:类型1：颜色 2：尺码
        //op:类型1：增加 2：删除
        function change_table(info,type,op) {
            var info = arguments[0] ? arguments[0] : {};
            var type = arguments[1] ? arguments[1] : 1;
            var op   = arguments[2] ? arguments[2] : 1;
            /* if($(".size_list input.size_val:checked").length<=0 || $(".choose_color_box_list .color-select:checked").length<=0 ){
                $('dl[nc_type="spec_dl"]').hide();
                $('tbody[nc_type="spec_table"]').empty();
                return false;
            } */
            var l = '';
            var color_flag = '';
            var size_val = '';
            if($('tbody[nc_type="spec_table"] tr').length<=0){ //还没有一行数据时
                var color_arr = $(".choose_color_box_list .color-select:checked");
                var size_arr  = $(".size_list input.size_val:checked");
                var c_info = {};
                $.each(color_arr,function(){
                    if($(this).next('input.picker-text').val()==''){ //颜色值为空
                        return true;
                    }
                    color_flag = $(this).parent('.choose_color_box_list').attr('id');
                    s_arr = color_flag.split("_");
                    s = s_arr[2]*1;
                    c_info.name = $(this).next("input.picker-text").val();
                    c_info.remark_name = $(this).siblings("input.picker-remark").val();
                    color_remark = c_info.name;
                    if(c_info.remark_name){
                    	color_remark = c_info.remark_name;
                    }
                    $.each(size_arr,function(){
                        i++;
                        size_val = $(this).val(); 
                        code_segment = $(this).data("code");
                        l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                        //颜色
                        l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + c_info.name + '" />'+
                                '<span class="goods_color">'+color_remark+ '</span>' ;
                        //尺码
                        l +='<td>'+
                            '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                            '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+
                            '<span class="goods_size">' + size_val + '</span>' +
                            '</td>';
                          //尺码备注
                            l +='<td>'+
                                '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="" />'+
                                '</td>';
                        l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                            '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                            '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                            '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                            '</tr>';
                    })
                })
                $('tbody[nc_type="spec_table"]').html(l);
                if($('tbody[nc_type="spec_table"] tr').length>0){
                    $('dl[nc_type="spec_dl"]').show();
                }else{
                    $('dl[nc_type="spec_dl"]').hide();
                }
            }else if(type==1){ //颜色改变
                color_flag = info.li_id;
                if(op==2 && $('tbody[nc_type="spec_table"] tr.'+color_flag).length>0){ //
                    $('tbody[nc_type="spec_table"] tr.'+color_flag).remove();
                    return false;
                }
                if($('tbody[nc_type="spec_table"] tr.'+color_flag).length>0){
                    return false;
                }
                if(!info.name){
                	return false;
                }
                s_arr = color_flag.split("_");
                s = s_arr[2]*1;
                var size_arr  = $(".size_list input.size_val:checked"); 
                //console.log(info);
                if(size_arr.length==0){
                	i++;
                	size_val = ''; 
                    code_segment = '';
                	l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                    //颜色
                    l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + info.name + '" />'+
                            '<span class="goods_color">' + info.name + '</span>' ;
                    //尺码
                    l +='<td>'+
                        '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                        '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+
                        '<span class="goods_size">' + size_val + '</span>' +
                        '</td>';
                      //尺码备注
                        l +='<td>'+
                            '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="" />'+
                            '</td>';
                    l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                            '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                        '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                        '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                        '</tr>';
                }else{
                	$.each(size_arr,function(){
                        i++;
                        size_val = $(this).val(); 
                        code_segment = $(this).data("code");
                        l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                        //颜色
                        l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + info.name + '" />'+
                                '<span class="goods_color">' + info.name + '</span>' ;
                        //尺码
                        l +='<td>'+
                            '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                            '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+
                            '<span class="goods_size">' + size_val + '</span>' +
                            '</td>';
                          //尺码备注
                            l +='<td>'+
                                '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="" />'+
                                '</td>';
                        l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                                '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
            //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                            '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                            '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                            '</tr>';
                    })
                }
                
                if($(color_flag).nextAll('div.choose_color_box_list').length<=1){
                    $('tbody[nc_type="spec_table"]').append(l);
                }else{
                    var num = ($("#"+color_flag).prevAll('.choose_color_box_list').find('.color-select:checked').length)*1;
                    var size_num = ($('li .size_val:checked').length)*1;
                    $('tbody[nc_type="spec_table"]').find('tr').eq((num*size_num)-1).after(l);
                }
            }else if(type==2){ //尺码改变
                size_val = info.size_value;
                code_segment = info.code_segment
                i++;
                
                if(op==2 && $('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).length>0){ //
                    $('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).remove();
                    return false;
                }
                if($('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).length>0){
                    return false;
                }
                var color_arr = $(".choose_color_box_list .color-select:checked");
                var c_info = {};
                
                $.each(color_arr,function(){
                    var l = '';
                    color_flag = $(this).parent('div').attr('id');
                    s_arr = color_flag.split("_");
                    s = s_arr[2]*1;
                    c_info.name = $(this).next("input.picker-text").val();
                    c_info.remark_name = $(this).siblings("input.picker-remark").val();
                    color_remark = c_info.name;
                    if(c_info.remark_name){
                    	color_remark = c_info.remark_name;
                    }
                    l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                    //颜色
                    l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + c_info.name + '" />'+
                            '<span class="goods_color">' + color_remark+'</span>' ;
                    //尺码
                    l +='<td>'+
                        '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                        '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+
                        '<span class="goods_size">' + size_val + '</span>' +
                        '</td>';
                      //尺码备注
                        l +='<td>'+
                            '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="" />'+
                            '</td>';
                    l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                        '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                        '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                        '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                        '</tr>';
                    $('tbody[nc_type="spec_table"]').find("tr."+color_flag+":last").after(l);
                })
                var have_color = $('.spec_table').find('tr');
                have_color.each(function(){
                	if($(this).find('input.size_val').val()==''&&parseInt($(this).find('input.goods_ea_id').val())>0){
                		$(this).find('input.size_val').val(size_val);
                		$(this).find('span.goods_size').text(size_val);
                		var this_color = $(this).find('input.color').val();
                		have_color.each(function(){
                			if(!($(this).find('input.goods_ea_id').val())&&($(this).find('input.color').val()==this_color)){
                				$(this).remove();
                			}
                		})
                	}else if($(this).find('input.size_val').val()==''&&!($(this).find('input.goods_ea_id').val())){
                		$(this).remove();
                	}
                })
                $('.spec_table').find('tr').find('input.goods_ea_id').each(function(){
                	if(parseInt($(this).val())>0){
                		var this_color = $(this).parents('tr').find('input.color').val();
                		var this_price = $(this).parents('tr').find('input.sell_price').val();
                		var this_marketprice = $(this).parents('tr').find('input.goods_marketprice').val();
                		var this_sku = $(this).parents('tr').find('input.sku').val();
                		$(this).parents('tr').removeClass('size_tr_');
                		var this_class = $(this).parents('tr').attr('class');
                		
                		$(this).parents('tr').addClass('size_tr_');
           				$(this).parents('tr').siblings('tr.'+this_class.split(' ')[0]).each(function(){
           					if($(this).find('input.sell_price').val()==''){
           						$(this).find('input.sell_price').val(this_price);
           					}
           					if($(this).find('input.goods_marketprice').val()==''){
           						$(this).find('input.goods_marketprice').val(this_marketprice);
           					}
           					if($(this).find('input.sku').val()==''){
           						$(this).find('input.sku').val(this_sku);
           					}
           				})
                        
                	}
                })
                
            }
            return false;
        }

        function f1(obj) {
            var html = become_color_select(); //得到颜色选项卡
            if($(obj).val()!=''){
                $(".choose_color_box_hide").empty().hide();
                $(obj).parent().find(".choose_color_box_hide").empty();
                return false;
            }
            $(".choose_color_box_hide").empty().hide();
            $(obj).parent().find(".choose_color_box_hide").empty().append(html);
            //移出消失
//            $(obj).parent().find(".choose_color_box_hide").hover(
//                function () {},
//                function () {
//                $(this).hide()
//                }
//            )
            $(obj).nextAll(".choose_color_box_hide").show();
            //颜色系的hover
            $(obj).nextAll(".choose_color_box_hide").find('.choose_color_group_list').delegate("li", "mouseover", function () {
                var i = $(this).index();
                son_id = JSON.parse($(this).data('son'));
                $(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul").siblings("ul").hide();
                $(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul#ul_" + son_id).show();
                //$(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul").eq(i).show().siblings("ul").hide();
            })
            //选中颜色
            $(".choose_color_list li.choose_color_list_info").click(function () {
                var li_id = $(this).parents('.choose_color_box_list').attr('id');
                //console.log(li_id);
                var c_name = $(this).text();
                var c_rgb = $(this).find("span").attr('data-rgb');
                var colorBox = $(obj).parents('div.choose_color_box_list').siblings('div.choose_color_box_list');
                c_parent_name = $(this).parent().attr('data-parent-color');
                c_parent_value = $(this).parent().attr('data-parent-value');
                //console.log(c_parent_name);console.log(c_parent_value);
                $(obj).val(c_parent_name);
                $(obj).next(".color_value").val(c_parent_value);
                $(obj).siblings(".picker-remark").val(c_name);
                $("#" + li_id).find('input[nctype="input_checkbox"]').attr('checked', "checked");
                $("#" + li_id).find('.choose_color_box_hide').hide();
                if($(obj).parents('.choose_color_box_list').next('.choose_color_box_list').length<=0){  //增加一行颜色选择行（最后一行）
                    var color_div = '<div class="choose_color_box_list mb-10" id="creat_tr_' + d + '"> ' +
                        '<input type="checkbox" nctype="input_checkbox" onchange="color_check_click(this)" class="color-select mr-5" name="color-select[]" onchange="color_check_click(this)"> ' +
                        '<input type="text" name="color['+d+'][color]" class="picker-text w300 mr-5"  onchange="change_color(this)" value=""  onfocus="f1(this)" readonly placeholder="选择主色" maxlength="30" data-old=""> ' +
                        '<input type="hidden" name="color['+d+'][color_value]" class="color_value"  value=""> ' +
                        '<input type="text" name="color['+d+'][color_remark]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30"> ' +
                        '<div class="pos-a choose_color_box_hide hide mt-10 c-333"></div></div>';
                    $(".choose_color_box").append(color_div);
                    d++;
                    var info = {
                        name:c_name,
                        li_id:li_id,
                    };
                    change_table(info,1);
                }else{  //修改
                    if($('tbody[nc_type="spec_table"]').find("tr."+li_id).length>0){
                        $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td span.goods_color').text(c_name);
                        $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td input.color').val(c_name);
                    }else{
                        var info = {
                            name:c_name,
                            li_id:li_id,
                        };
                        change_table(info,1);
                    }
                }
                colorCheckS();
            })
            $(obj).keydown(function (e) {
                $(obj).nextAll(".choose_color_box_hide").hide();
                if (e.keyCode == 8 && $(obj).val().length==1) {
                    $(".choose_color_box_hide").empty().hide();
                    $(obj).parent().find(".choose_color_box_hide").empty().append(html);
                    $(obj).nextAll(".choose_color_box_hide").show();
                    $(obj).nextAll(".choose_color_box_hide").find('.choose_color_group_list').delegate("li", "mouseover", function () {
                        f1(obj);
                    })
                }
            })
        }
        function change_color(obj) {
            var name = $(obj).val();
            var li_id = $(obj).parent().attr("id");
            if($('tbody[nc_type="spec_table"]').find("tr."+li_id).length>0){
                if(name!==''){
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td span.goods_color').text(name);
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td input.color').val(name);
                }else{
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).remove();
                    if($('tbody[nc_type="spec_table"]').find("tr").length<=0){
                         $('dl[nc_type="spec_dl"]').hide();
                    }
                }
            }else{
                if(name!==''){
                    var info = {
                        name:name,
                        li_id:li_id,
                    };
                    change_table(info,1);
                }
            }
        }
      //商品属性加载
        function ajax_input_attr_html(attr,goods_attr){
    	  
         attr_str = '<table width="100%" id="attrTable"><tbody>';
       	 $.each(attr,function(sk,sv){
       		 good_attr = [];
       		 if(goods_attr){
       			$.each(goods_attr,function(gt,gv){
       				if(sv.sp_id==gv.attr_id){
       					good_attr.push(gv);
       					//good_attr[gv.attr_value_id] = gv;
       				}
       				
       			}) 
       		 }
       		 //console.log(goods_attr);
       		 //console.log(good_attr);
       		 attr_str +='<tr>';
       		 if(sv.sp_is_select==1){
       			 attr_str += '<td width="10%;" class="spec_title">'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
       			 if(sv.sp_input_type==1){
       				 old_value = '';
       				 if(good_attr.length==1){
       					old_value = good_attr[0].attr_value;
       				 }
       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="'+old_value+'">';
       			 }else if(sv.sp_input_type==2){
       				 sp_list = '';
       				 if(sv.sp_select_lists){
       					 $.each(sv.sp_select_lists,function(kk,vv){
       						 isCheck = '';
       						 if(good_attr.length==1&&vv==good_attr[0].attr_value){
       							isCheck = 'selected';
       	       				 }
       						 sp_list +='<option value="'+kk+'" '+isCheck+'>'+vv+'</option>';
           				 }) 
       				 }
       				 
       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
           			 '<option value="">请选择...</option>'+sp_list+'</select>';
       			 }else{
       				old_value = '';
      				 if(good_attr.length==1){
      					old_value = good_attr[0].attr_value;
      				 }
       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]">'+old_value+'</textarea>';
       			 }
       			 attr_str +='</td>';
       		 }else if(sv.sp_is_select==2){
  				 if(good_attr.length>=1){
  					 ii = 0;
  					$.each(good_attr,function(ak,av){
  						add_tr = '';
  						if((ii+1)<good_attr.length){
  							add_tr = '</tr><tr>';
  						}
  						if(ii==0){
   							op_str = '<a href="javascript:;" onclick="addSpec(this)">[+]</a>';
   						}else{
   							op_str = '<a href="javascript:;" onclick="delSpec(this)">[-]</a>';
   						}
  						ii++;
  						old_value = data_null(av.attr_value);
  						old_price = data_null(av.attr_price);
  						attr_str += '<td width="10%;" class="spec_title add_spec"><a href="javascript:;" onclick="addSpec(this)">[+]</a>'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
  	  	       			 if(sv.sp_input_type==1){
  	  	       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="'+old_value+'">';
  	  	       			 }else if(sv.sp_input_type==2){
  	  	       				 sp_list = '';
  	  	       				 if(sv.sp_select_lists){
  	  	       					 $.each(sv.sp_select_lists,function(kk,vv){
  	  	       						 isCheck = '';
	 	  	       					 if(vv==av.attr_value){
	 	       							isCheck = 'selected';
	 	       	       				 }
  	  	       						 sp_list +='<option value="'+kk+'" '+isCheck+'>'+vv+'</option>';
  	  	           				 }) 
  	  	       				 }
  	  	       				 
  	  	       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
  	  	           			 '<option value="">请选择...</option>'+sp_list+'</select>';
  	  	       			 }else{
  	  	       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]">'+old_value+'</textarea>';
  	  	       			 }
  	  	       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value="'+old_price+'"></td>';
  	  	       		     attr_str +=add_tr;
  					})
  				 }else{
  					attr_str += '<td width="10%;" class="spec_title add_spec"><a href="javascript:;" onclick="addSpec(this)">[+]</a>'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
  	       			 if(sv.sp_input_type==1){
  	       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="">';
  	       			 }else if(sv.sp_input_type==2){
  	       				 sp_list = '';
  	       				 if(sv.sp_select_lists){
  	       					 $.each(sv.sp_select_lists,function(kk,vv){
  	       						 sp_list +='<option value="'+kk+'">'+vv+'</option>';
  	           				 }) 
  	       				 }
  	       				 
  	       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
  	           			 '<option value="">请选择...</option>'+sp_list+'</select>';
  	       			 }else{
  	       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]"></textarea>';
  	       			 }
  	       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value=""></td>';
  				 }
       		 }else{
       			 if(good_attr.length>=1){
       				ii = 0;
   					$.each(good_attr,function(ak,av){
   						add_tr = '';
   						if((ii+1)<good_attr.length){
   							add_tr = '</tr><tr>';
   						}
   						if(ii==0){
   							op_str = '<a href="javascript:;" onclick="addSpec(this)">[+]</a>';
   						}else{
   							op_str = '<a href="javascript:;" onclick="delSpec(this)">[-]</a>';
   						}
   						ii++;
   						old_value = data_null(av.attr_value);
   						old_price = data_null(av.attr_price);
   						attr_str += '<td width="10%;" class="spec_title add_spec">'+op_str+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
   	  	       			 if(sv.sp_input_type==1){
   	  	       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="'+old_value+'">';
   	  	       			 }else if(sv.sp_input_type==2){
   	  	       				 sp_list = '';
   	  	       				 if(sv.sp_select_lists){
   	  	       					 $.each(sv.sp_select_lists,function(kk,vv){
   	  	       						 isCheck = '';
 	 	  	       					 if(vv==av.attr_value){
 	 	       							isCheck = 'selected';
 	 	       	       				 }
   	  	       						 sp_list +='<option value="'+kk+'" '+isCheck+'>'+vv+'</option>';
   	  	           				 }) 
   	  	       				 }
   	  	       				 
   	  	       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
   	  	           			 '<option value="">请选择...</option>'+sp_list+'</select>';
   	  	       			 }else{
   	  	       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]">'+old_value+'</textarea>';
   	  	       			 }
   	  	       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value="'+old_price+'"></td>';
   	  	       		     attr_str +=add_tr;
   					})
   				 }else{
   					attr_str += '<td width="10%;" class="spec_title add_spec"><a href="javascript:;" onclick="addSpec(this)">[+]</a>'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
   	       			 if(sv.sp_input_type==1){
   	       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="">';
   	       			 }else if(sv.sp_input_type==2){
   	       				 sp_list = '';
   	       				 if(sv.sp_select_lists){
   	       					 $.each(sv.sp_select_lists,function(kk,vv){
   	       						 sp_list +='<option value="'+kk+'">'+vv+'</option>';
   	           				 }) 
   	       				 }
   	       				 
   	       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
   	           			 '<option value="">请选择...</option>'+sp_list+'</select>';
   	       			 }else{
   	       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]"></textarea>';
   	       			 }
   	       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value=""></td>';
   				 }
       		 }
       		 attr_str +='</tr>';
       	 })
       	 attr_str +='</tbody></table>';
       	 $("dd.attr_dd").html(attr_str);
        }
        function addSpec(obj){
        	var add_tr = $(obj).parents('tr').html();
        	$(obj).parents('tr').after('<tr>'+add_tr+'</tr>');
        	$(obj).parents('tr').next('tr').find('a').text('[-]');
        	$(obj).parents('tr').next('tr').find('a').attr('onclick','delSpec(this)');
        }
        function delSpec(obj){
        	$(obj).parents('tr').remove();
        }
         //分类改变时，得到品牌信息、规格信息、属性信息、自定义属性等选项信息
        function get_info_by_class(obj){
//            console.log();
            var class_id = $(obj).val();
            var class_name = $(obj).find("option:selected").text();
            if(class_id==''){
                class_name = '';
            }else{
                if(class_name.indexOf('|--')>=0){
                    class_name = class_name.substring(class_name.indexOf('|--')+3,class_name.length);
                }
            }
            $("#gc_name").val(class_name);
            
             $.getJSON('ajax_get_info_by_class?class_id='+class_id, function (data) {
                 if(data.state){
                     $("ul[nctype='brand_list']").empty();
                     $(".brand-index").attr('data-tid',data.type_id);
                     $("input[name='type_id']").val(data.type_id);
                     //尺码
                     if(data.sizes){
                         var size_type = Array('','中国码','美国码','英国码','日本码');
                         var sizes_list = '';
                         var sizes_html = '<div>';
                         var num = 0;
                         var style = 'display: block;background-color: #F6F7Fb;';
                         var checked = 'checked="checked"';
                         sizes_html += '<div class="col-conten">';
                         $.each(data.sizes,function(k,v){
                             if(num>0){
                                 checked = '';
                                 style = 'display: none;';
                             }
                             
                             /* sizes_html +='<label class="mr-10 ml-5">'+
                                     '<input type="radio" name="size_type" class="size_type" value="'+k+'" '+checked+' >'+
                                     size_type[k]+'</label>'; */
                            if(v.size_list !== undefined){
                                sizes_list +='<div style="'+style+'" class="size_list size_list_'+k+'"><ul>';
                                 $.each(v.size_list,function(kk,vv){
                                     sizes_list += '<li  style="" class="f-l mr-10 ml-5" data-order="0" data-text="'+vv.size+'" data-value="'+vv.size+'" class="remark">'+
                                             '<label>'+
                                             '<input type="checkbox" class="size_val" data-text="'+vv.size+'" name="" value="'+vv.size+'">'+
                                             vv.size+'</label></li>';
                                 })
                                 sizes_list +='</ul><div class="clear"></div></div>';
                             }
                            num ++;
                         })
                         sizes_html += '</div>';
                         sizes_html += sizes_list;
                         sizes_html += '</div>';
                         $("dl.size_dl").attr("style",'');
                         $("dd.size_dd").html(sizes_html);
                     }
                    //品牌
                     if(data.brands){
                         var brands_list = '';
                         $.each(data.brands,function(k,v){
                             brands_list +='<li data-id="'+v.brand_id+'" data-name="'+v.brand_name+'">'+
                                '<em>';
                                if(v.brand_initial){
                                     brands_list += v.brand_initial;
                                }else{
                                    brands_list += '--';
                                }
                               brands_list +='</em>'+v.brand_name+'</li>'; 
                         })
                         $('.no-result').attr('style','display:none').html('没有符合<strong></strong>条件的品牌');
                         $("ul[nctype='brand_list']").html(brands_list);
                     }else{
                         $('.no-result').html('没有符合<strong></strong>条件的品牌');
                         if($('.no-result').attr('style')=='display:none'){
                             $('.no-result').attr('style','');
                         }
                     }
                     //属性
                     if(data.attr_arr){
                         var attr_list = '';
                         if($(".ncsc-form-goods").find('dl.attr_dl').length<=0){
                             attr_list += '<dl class="attr_dl">'+
                                '<dt>商品属性：</dt>'+
                                '<dd class="attr_dd">';
                         }
                         $.each(data.attr_arr,function(k,v){
                            attr_list += '<span class="property">'+
                                '<label class="mr5">'+v.attr_name+'</label>'+
                                '<input type="hidden" name="attr['+v.attr_id+'][gc_id]" value="'+class_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][type_id]" value="'+data.ype_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_id]" value="'+v.attr_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][user_attr_value]" value="">'+
                                '<select name="attr['+v.attr_id+'][attr_value_id]" attr="attr['+v.attr_id+'][__NC__]" nc_type="attr_select">'+
                                    '<option value="" nc_type="0">不限</option>';
                                    if(v.values){
                                        $.each(v.values,function(kk,vv){
                                            attr_list += '<option value="'+vv.attr_value_id+'" nc_type="'+vv.attr_value_id+'">'+vv.attr_value_name+'</option>';
                                        })
                                    }
                                attr_list +='</select>';
                            attr_list +='</span>';
                         })
                        if($(".ncsc-form-goods").find('dl.attr_dl').length<=0){
                            attr_list += '</dd>'+
                            '</dl>';
                            $("#demo2").after(attr_list);
                         }else{
                             $("dd.attr_dd").html(attr_list);
                         }
                     }else{
                         if($(".ncsc-form-goods").find('dl.attr_dl').length>0){
                             $("dl.attr_dl").remove();
                         }
                     }
                     //自定义属性
                     if(data.attr_custom){
                         var custom_list = '';
                         if($(".ncsc-form-goods").find('dl.custom_dl').length<=0){
                             custom_list += '<dl class="custom_dl">'+
                                '<dt>自定义属性：</dt>'+
                                '<dd class="custom_dd">';
                         }
                         $.each(data.attr_custom,function(k,v){
                            custom_list += '<span class="property">'+
                                '<label class="mr5">'+v.attr_name+'</label>'+
                                '<input type="hidden" name="attr['+v.attr_id+'][gc_id]" value="'+class_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][type_id]" value="'+data.ype_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_id]" value="'+v.attr_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_value_id]" value="">'+
                                '<input class="text w60" type="text" name="attr['+v.attr_id+'][user_attr_value]" value="">'+
                                '</span>'+
                                '</span>';
                         })
                        if($(".ncsc-form-goods").find('dl.custom_dl').length<=0){
                            custom_list += '</dd>'+
                            '</dl>';
                    
                            $("dl.desc_dl").before(custom_list);
                         }else{
                             $("dd.custom_dd").html(custom_list);
                         }
                     }else{
                         if($(".ncsc-form-goods").find('dl.custom_dl').length>0){
                             $("dl.custom_dl").remove();
                         }
                     }
                 }
            });
            
        }
        
   </script>
    <script>
                                                
       function batch_set(){  //批量设置信息
            if($("#batch_price").val()!=''){ //销售价
                $('tbody[nc_type="spec_table"]').find('input.sell_price').val($("#batch_price").val());
            }
            if($("#batch_market_price").val()!=''){//市场价
                $('tbody[nc_type="spec_table"]').find('input.goods_marketprice').val($("#batch_market_price").val());
            }
            /* if($("#batch_stocks_code").val()!=''){//商家货号
                $('tbody[nc_type="spec_table"]').find('input.stocks_code').val($("#batch_stocks_code").val());
            }
            if($("#batch_bar_code").val()!=''){//条形码
                $('tbody[nc_type="spec_table"]').find('input.bar_code').val($("#batch_bar_code").val());
            } */
        }
        $(function(){
            $(".size_dd").on('click','.size_val',function(){
                var size_val = $(this).val()
                var code_segment = $(this).data('code');
                var info = {
                    size_value:size_val,
                    code_segment:code_segment,
                };
                if($(this).is(':checked')){
                    change_table(info,2);
                }else{
                    change_table(info,2,2);
                }
            })
            $(".size_dd").on('click','.size_type',function(){
                return false;
            })
            $(".size_dd").on('mouseup','.size_type',function(){
                var id = $(this).val();
                var radioChecked = $(this).prop("checked");
                var obj = $(this);
                if($('tbody[nc_type="spec_table"] tr').length<=0){
                     $(this).prop('checked', !radioChecked);
                    $(".size_dd div.size_list_"+id).attr("style","display: block;background-color: #F6F7Fb;").siblings('div.size_list').attr("style","display: none;background-color: #F6F7Fb;");
                    return false;        
                }else{
                    layer.confirm('切换码制，会导致已勾选的尺码信息丢失', {
                     btn: ['不切换','知道了，仍然切换'] //按钮
                     }, function(){
                           layer.closeAll();
                           return false;
                     }, function(){
                        $(obj).prop('checked', !radioChecked);
                        $(".size_dd div.size_list_"+id).attr("style","display: block;background-color: #F6F7Fb;").siblings('div.size_list').attr("style","display: none;background-color: #F6F7Fb;");
                        $('dl[nc_type="spec_dl"]').hide();
                        $('tbody[nc_type="spec_table"]').empty();
                        $(".size_list :checkbox").removeAttr("checked");
                     });
                }
            });
        })
        
        function become_color_select(){  //组装颜色选项卡
            //组装颜色选项卡开始
            var color_arr = {"1":{"cl_id":"1","cl_parent_id":"0","cl_name":"\u767d\u8272","cl_sort":"127","cl_value":"#ffffff","son_color":{"2":{"cl_id":"2","cl_parent_id":"1","cl_name":"\u767d\u8272","cl_sort":null,"cl_value":"#ffffff","son_color":[]},"3":{"cl_id":"3","cl_parent_id":"1","cl_name":"\u7c73\u767d\u8272","cl_sort":null,"cl_value":"#eedeb0","son_color":[]},"61":{"cl_id":"61","cl_parent_id":"1","cl_name":"\u4e73\u767d\u8272","cl_sort":null,"cl_value":"#fffbf0","son_color":[]}}},"12":{"cl_id":"12","cl_parent_id":"0","cl_name":"\u82b1\u8272","cl_sort":null,"cl_value":"huasebg.png","son_color":{"58":{"cl_id":"58","cl_parent_id":"12","cl_name":"\u82b1\u8272","cl_sort":null,"cl_value":"huasebg.png","son_color":[]}}},"11":{"cl_id":"11","cl_parent_id":"0","cl_name":"\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":{"50":{"cl_id":"50","cl_parent_id":"11","cl_name":"\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":[]},"51":{"cl_id":"51","cl_parent_id":"11","cl_name":"\u5de7\u514b\u529b\u8272","cl_sort":null,"cl_value":"#d2691e","son_color":[]},"52":{"cl_id":"52","cl_parent_id":"11","cl_name":"\u6817\u8272","cl_sort":null,"cl_value":"#60281e","son_color":[]},"53":{"cl_id":"53","cl_parent_id":"11","cl_name":"\u6d45\u68d5\u8272","cl_sort":null,"cl_value":"#b35c44","son_color":[]},"54":{"cl_id":"54","cl_parent_id":"11","cl_name":"\u6df1\u5361\u5176\u5e03\u8272","cl_sort":null,"cl_value":"#bdb76b","son_color":[]},"55":{"cl_id":"55","cl_parent_id":"11","cl_name":"\u6df1\u68d5\u8272","cl_sort":null,"cl_value":"#7c4b00","son_color":[]},"56":{"cl_id":"56","cl_parent_id":"11","cl_name":"\u8910\u8272","cl_sort":null,"cl_value":"#855b00","son_color":[]},"57":{"cl_id":"57","cl_parent_id":"11","cl_name":"\u9a7c\u8272","cl_sort":null,"cl_value":"#a88462","son_color":[]},"69":{"cl_id":"69","cl_parent_id":"11","cl_name":"\u5496\u5561\u8272","cl_sort":null,"cl_value":"#603912","son_color":[]}}},"10":{"cl_id":"10","cl_parent_id":"0","cl_name":"\u7d2b\u8272","cl_sort":null,"cl_value":"#800080","son_color":{"46":{"cl_id":"46","cl_parent_id":"10","cl_name":"\u7d2b\u8272","cl_sort":null,"cl_value":"#800080","son_color":[]},"47":{"cl_id":"47","cl_parent_id":"10","cl_name":"\u6df1\u7d2b\u8272","cl_sort":null,"cl_value":"#430653","son_color":[]},"48":{"cl_id":"48","cl_parent_id":"10","cl_name":"\u7d2b\u7ea2\u8272","cl_sort":null,"cl_value":"#8b0062","son_color":[]},"49":{"cl_id":"49","cl_parent_id":"10","cl_name":"\u7d2b\u7f57\u5170","cl_sort":null,"cl_value":"#b7ace4","son_color":[]},"68":{"cl_id":"68","cl_parent_id":"10","cl_name":"\u6d45\u7d2b\u8272","cl_sort":null,"cl_value":"#ede0e6","son_color":[]}}},"9":{"cl_id":"9","cl_parent_id":"0","cl_name":"\u84dd\u8272","cl_sort":null,"cl_value":"#0000fe","son_color":{"39":{"cl_id":"39","cl_parent_id":"9","cl_name":"\u84dd\u8272","cl_sort":null,"cl_value":"#0000fe","son_color":[]},"40":{"cl_id":"40","cl_parent_id":"9","cl_name":"\u6e56\u84dd\u8272","cl_sort":null,"cl_value":"#30dff3","son_color":[]},"41":{"cl_id":"41","cl_parent_id":"9","cl_name":"\u6df1\u84dd\u8272","cl_sort":null,"cl_value":"#041690","son_color":[]},"42":{"cl_id":"42","cl_parent_id":"9","cl_name":"\u6d45\u84dd\u8272","cl_sort":null,"cl_value":"#d2f0f4","son_color":[]},"43":{"cl_id":"43","cl_parent_id":"9","cl_name":"\u5b9d\u84dd\u8272","cl_sort":null,"cl_value":"#4b5cc4","son_color":[]},"44":{"cl_id":"44","cl_parent_id":"9","cl_name":"\u5b54\u96c0\u84dd","cl_sort":null,"cl_value":"#00a4c5","son_color":[]},"45":{"cl_id":"45","cl_parent_id":"9","cl_name":"\u5929\u84dd\u8272","cl_sort":null,"cl_value":"#44cef6","son_color":[]},"67":{"cl_id":"67","cl_parent_id":"9","cl_name":"\u85cf\u9752\u8272","cl_sort":null,"cl_value":"#2e4e7e","son_color":[]}}},"8":{"cl_id":"8","cl_parent_id":"0","cl_name":"\u7eff\u8272","cl_sort":null,"cl_value":"#008000","son_color":{"33":{"cl_id":"33","cl_parent_id":"8","cl_name":"\u7eff\u8272","cl_sort":null,"cl_value":"#008000","son_color":[]},"34":{"cl_id":"34","cl_parent_id":"8","cl_name":"\u58a8\u7eff\u8272","cl_sort":null,"cl_value":"#057748","son_color":[]},"35":{"cl_id":"35","cl_parent_id":"8","cl_name":"\u6d45\u7eff\u8272","cl_sort":null,"cl_value":"#98fb98","son_color":[]},"36":{"cl_id":"36","cl_parent_id":"8","cl_name":"\u7fe0\u7eff\u8272","cl_sort":null,"cl_value":"#0aa344","son_color":[]},"37":{"cl_id":"37","cl_parent_id":"8","cl_name":"\u8367\u5149\u7eff","cl_sort":null,"cl_value":"#23fa07","son_color":[]},"38":{"cl_id":"38","cl_parent_id":"8","cl_name":"\u9752\u8272","cl_sort":null,"cl_value":"#00e09e","son_color":[]},"66":{"cl_id":"66","cl_parent_id":"8","cl_name":"\u519b\u7eff\u8272","cl_sort":null,"cl_value":"#5d762a","son_color":[]}}},"7":{"cl_id":"7","cl_parent_id":"0","cl_name":"\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff00","son_color":{"23":{"cl_id":"23","cl_parent_id":"7","cl_name":"\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff00","son_color":[]},"32":{"cl_id":"32","cl_parent_id":"7","cl_name":"\u9999\u69df\u8272","cl_sort":null,"cl_value":"toumingbg.png","son_color":[]},"31":{"cl_id":"31","cl_parent_id":"7","cl_name":"\u91d1\u8272","cl_sort":null,"cl_value":"#ffd700","son_color":[]},"30":{"cl_id":"30","cl_parent_id":"7","cl_name":"\u8367\u5149\u9ec4","cl_sort":null,"cl_value":"#eaff56","son_color":[]},"29":{"cl_id":"29","cl_parent_id":"7","cl_name":"\u6d45\u9ec4\u8272","cl_sort":null,"cl_value":"#faff72","son_color":[]},"28":{"cl_id":"28","cl_parent_id":"7","cl_name":"\u6854\u8272","cl_sort":null,"cl_value":"#ffa500","son_color":[]},"27":{"cl_id":"27","cl_parent_id":"7","cl_name":"\u67e0\u6aac\u9ec4","cl_sort":null,"cl_value":"#ffec43","son_color":[]},"26":{"cl_id":"26","cl_parent_id":"7","cl_name":"\u674f\u8272","cl_sort":null,"cl_value":"#f7eed6","son_color":[]},"25":{"cl_id":"25","cl_parent_id":"7","cl_name":"\u660e\u9ec4\u8272","cl_sort":null,"cl_value":"#ffff01","son_color":[]},"24":{"cl_id":"24","cl_parent_id":"7","cl_name":"\u59dc\u9ec4\u8272","cl_sort":null,"cl_value":"#ffc773","son_color":[]},"65":{"cl_id":"65","cl_parent_id":"7","cl_name":"\u5361\u5176\u8272","cl_sort":null,"cl_value":"#c3b091","son_color":[]}}},"6":{"cl_id":"6","cl_parent_id":"0","cl_name":"\u7ea2\u8272","cl_sort":null,"cl_value":"#ff0000","son_color":{"17":{"cl_id":"17","cl_parent_id":"6","cl_name":"\u7ea2\u8272","cl_sort":null,"cl_value":"#ff0000","son_color":[]},"18":{"cl_id":"18","cl_parent_id":"6","cl_name":"\u897f\u74dc\u7ea2","cl_sort":null,"cl_value":"#f05654","son_color":[]},"19":{"cl_id":"19","cl_parent_id":"6","cl_name":"\u85d5\u8272","cl_sort":null,"cl_value":"#eed0d8","son_color":[]},"20":{"cl_id":"20","cl_parent_id":"6","cl_name":"\u9152\u7ea2\u8272","cl_sort":null,"cl_value":"#990000","son_color":[]},"21":{"cl_id":"21","cl_parent_id":"6","cl_name":"\u73ab\u7ea2\u8272","cl_sort":null,"cl_value":"#df1b76","son_color":[]},"22":{"cl_id":"22","cl_parent_id":"6","cl_name":"\u6854\u7ea2\u8272","cl_sort":null,"cl_value":"#ff7500","son_color":[]},"64":{"cl_id":"64","cl_parent_id":"6","cl_name":"\u7c89\u7ea2\u8272","cl_sort":null,"cl_value":"#ffb6c1","son_color":[]}}},"5":{"cl_id":"5","cl_parent_id":"0","cl_name":"\u9ed1\u8272","cl_sort":null,"cl_value":"#000000","son_color":{"60":{"cl_id":"60","cl_parent_id":"5","cl_name":"\u9ed1\u8272","cl_sort":null,"cl_value":"#000000","son_color":[]}}},"4":{"cl_id":"4","cl_parent_id":"0","cl_name":"\u7070\u8272","cl_sort":null,"cl_value":"#808080","son_color":{"14":{"cl_id":"14","cl_parent_id":"4","cl_name":"\u7070\u8272","cl_sort":null,"cl_value":"#808080","son_color":[]},"15":{"cl_id":"15","cl_parent_id":"4","cl_name":"\u6df1\u7070\u8272","cl_sort":null,"cl_value":"#666666","son_color":[]},"16":{"cl_id":"16","cl_parent_id":"4","cl_name":"\u6d45\u7070\u8272","cl_sort":null,"cl_value":"#e4e4e4","son_color":[]},"62":{"cl_id":"62","cl_parent_id":"4","cl_name":"\u94f6\u8272","cl_sort":null,"cl_value":"#c0c0c0","son_color":[]}}},"13":{"cl_id":"13","cl_parent_id":"0","cl_name":"\u900f\u660e","cl_sort":null,"cl_value":"toumingbg.png","son_color":{"59":{"cl_id":"59","cl_parent_id":"13","cl_name":"\u900f\u660e","cl_sort":null,"cl_value":"toumingbg.png","son_color":[]}}}};
            var html = '<div class="choose_color_box_icon"><i class="icon"></i> ' +
                    '</div> <div class="choose_color_group_list f-l"> ' +
                    '<ul class="">';
            $.each(color_arr, function (k, v) {
                var cl_value = '';
                if (v.cl_value.indexOf('#') > -1) {
                    cl_value = v.cl_value;
                } else {
                    cl_value = 'url(http://[::1]/yunjuke/application/admin/views/images/' + v.cl_value + ')';
                }
                html += "<li class='choose_color_group_list_name' data-son='" + v.cl_id + "'>" +
                        '<span class="rgb-box" style="background:' + cl_value + '"></span>' + v.cl_name + '</li> ';
            })
            html += '</ul> </div> ' +
                    '<div class="choose_color_list pd-10"> <div class="">常用标准颜色：</div>';
            $.each(color_arr, function (k, v) {
                html += ' <ul class="hide " data-parent-color="'+v.cl_name+'" data-parent-value="'+v.cl_value+'" id="ul_' + v.cl_id + '">';
                $.each(v.son_color, function (kk, vv) {
                    var cl_value = '';
                    if (vv.cl_value.indexOf('#') > -1) {
                        cl_value = vv.cl_value;
                    } else {
                        cl_value = 'url(http://[::1]/yunjuke/application/admin/views/images/' + vv.cl_value + ')';
                    }
                    html += ' <li class="choose_color_list_info" >' +
                            '<span class="rgb-box" data-rgb="' + vv.cl_value + '" style="background:' + cl_value + '"></span>' + vv.cl_name + '</li> ';
                });
                html += '</ul>';
            });

            html += '</div>';
            return html;
             //组装颜色选项卡结束
        }
        function color_check_click(obj){
            var li_id = $(obj).parent().attr("id");
            if ($('.choose_color_box_list').length > 1) {
                if (!$(obj).attr("checked")) { //取消一行
                    $(obj).parents(".choose_color_box_list").remove();
                    var info = {
                         li_id:li_id,
                     };
                    change_table(info,1,2);
                    return false;
                }
            }
            if ($(obj).attr("checked")){
                if($(obj).parent("div.choose_color_box_list").next('div.choose_color_box_list').length<=0){
                    var color_div = '<div class="choose_color_box_list mb-10" id="creat_tr_' + d + '"> ' +
                        '<input type="checkbox" nctype="input_checkbox" onchange="color_check_click(this)" class="color-select mr-5" name="color-select[]" onchange="color_check_click(this)"> ' +
                        '<input type="text" name="color[]" class="picker-text w300 mr-5" onchange="change_color(this)" value=""  onfocus="f1(this)" readonly placeholder="选择主色" maxlength="30" data-old=""> ' +
                        '<input type="hidden" name="color_value[]" class="color_value"  value=""> ' +
                        '<input type="text" name="color_remark[]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30"> ' +
                        '<div class="pos-a choose_color_box_hide hide mt-10 c-333"></div></div>';
                    $(".choose_color_box").append(color_div);
                    d++;
                }
                var name = $("#"+li_id).find(".picker-text").val();
                 if(name==''|| name==undefined){  //颜色名称为空不增加
                    return false;
                }
                var info = {
                    name:name,
                    li_id:li_id,
                };
                change_table(info,2);
            }
        }
        /*颜色不能重复选*/
        function colorCheckS(){
        	$('.choose_color_box').find('.choose_color_box_list').each(function(k,v){
        		colorVal = $(this).find('input.picker-text').val();
        		colorRe = $(this).find('input.picker-remark').val();
        		$(this).siblings().each(function(ka,va){
        			colorValNow = $(this).find('input.picker-text').val();
        			colorReNow = $(this).find('input.picker-remark').val();
        			console.log(colorVal);console.log(colorRe);console.log(colorValNow);console.log(colorReNow);
        			if(colorVal==colorValNow&&colorRe==colorReNow){
        				colorValue = $(this).find('input.color_a_id').val();
        				console.log(colorValue);
        				if(!colorValue){
        					$(this).remove();
        				}
        			}
            	})
        	})
        }
        $(".ncsc-form-goods").delegate("input.picker-remark","change",function(){
        	 //console.log(typeof($(this).val()));
        	   if($(this).val().replace(/(^\s+)|(\s+$)/g,"").length >0){
        		   div_id = $(this).parent().attr('id');
    			   $('.spec_table').find('tr.'+div_id).find('.goods_color').text($(this).val());
        	   }else{
        		   div_id = $(this).parent().attr('id');
    			   $('.spec_table').find('tr.'+div_id).find('.goods_color').text($(this).siblings('input.picker-text').val());
        	   }
			   
			   //console.log(div_id)
			}); 
    </script>

<div id="goTop"> <a hres="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
