<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:51:14
  from "D:\www\yunjuke\application\pay\views\mall_express_area_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d70021f1988_17583025',
  'file_dependency' => 
  array (
    '380d77a28acf9e89b9d159384ebf215087e78ef6' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express_area_add.html',
      1 => 1501581895,
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
function content_598d70021f1988_17583025 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/pay/views/css/admin_other.css" rel="stylesheet" type="text/css"/>

<body style="background-color: #FFF; overflow: auto;">


<div class="page-container">
    <div class="fixed-bar">
        <nav class="breadcrumb">
            <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span><a href="mall_express_tools" style="color: #333;">运费管理</a><span class="c-gray en">&gt;</span>运费模板编辑
            &nbsp;<a href="mall_express_tools" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
        </nav>
    </div>
    <div class="ncap-form-default mt-20">
        <form method="post" id="tpl_form" name="tpl_form" action="">
           <input type="hidden" name="transport_id" id="transport_id" value="顺丰快递">           <input type="hidden" name="ept_id" id="ept_id" value="20">           <!-- <input type="hidden" name="fee_data" id="fee_data" value="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: data_fee</p>
<p>Filename: templates_c/380d77a28acf9e89b9d159384ebf215087e78ef6_0.file.mall_express_area_add.html.cache.php</p>
<p>Line Number: 47</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\380d77a28acf9e89b9d159384ebf215087e78ef6_0.file.mall_express_area_add.html.cache.php<br />
			Line: 47<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 4563<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/380d77a28acf9e89b9d159384ebf215087e78ef6_0.file.mall_express_area_add.html.cache.php</p>
<p>Line Number: 47</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\380d77a28acf9e89b9d159384ebf215087e78ef6_0.file.mall_express_area_add.html.cache.php<br />
			Line: 47<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Store.php<br />
			Line: 4563<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>">            --><dl class="row">
                <dt class="tit">
                    <label for="J_TemplateTitle" class="label-like"><em>*</em>模板名称：</label>
                </dt>
                <dd class="opt vali_err">
                    <input type="text" class="text " id="title" placeholder="不能为空且最多输入10个字" autocomplete="off" value="顺丰快递" name="title">
                    <p class="J_Message" style="display:none" error_type="title"><i class="fa fa-exclamation-circle"></i>模板名称为空</p>
                    <p class="J_Message" style="display:none" error_type="title_check"><i class="fa fa-exclamation-circle"></i>该模板名称已存在</p>
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="express_code" class="label-like">快递方式：</label>
                </dt>
                <dd class="opt vali_err">

                                            <input type="hidden" name="express_code" value="shunfeng">
                        <span>shunfeng--顺丰快递</span>
                                        <span class="err" style="display:none;color:red"><i class="fa fa-exclamation-circle"></i>请选择快递</span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="J_TemplateTitle" class="label-like">排序：</label>
                </dt>
                <dd class="opt vali_err">
                    <input type="number" name="num" placeholder="最大不超过127" max="127" value="1" class="text">
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image">默认快递：</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <input id="status_1" type="radio" name="default" value="1"  >
                        <label for="status_1" id="check_yes" class="cb-enable ">是</label>
                        <input id="status_0" type="radio" name="default" value="0"  checked  >
                        <label for="status_0" id="check_no" class="cb-disable selected checked">否</label>
                    </div>
                    <span class="err"></span>
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit">
                    <label class="label-like">计费规则：</label>
                </dt>
                <dd class="opt">
                    <label class="mr20">
                        <input type="radio" class="radio vm" name="goods_trans_type" value="1"  >
                        按重量</label>
                    <label class="mr20">
                        <input type="radio" class="radio vm" name="goods_trans_type" value="2" checked="checked">
                        按件数</label>
                    <!-- <label>
                        <input type="radio" class="radio vm" name="goods_trans_type" value="3" >
                        按体积</label> -->
                </dd>
            </dl>

            <dl class="row">
                <dt class="tit"><em>*</em>详细设置：</dt>
                <dd class="trans-line opt">
                    <div class="ncsu-trans-type" data-delivery="kd">
                        <div class="entity ">
                            <div class="tbl-except vali_err">
                                <table cellspacing="0" class="ncsc-table-style table ">
                                    <thead>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <th style="padding-left:5px">运送到</th>
                                        <th class="w110">首(重)</th>
                                        <th class="w110">首费(元)</th>
                                        <th class="w110">续(重)</th>
                                        <th class="w110">续费(元)</th>
                                        <th class="w110">免费额度(重)</th>
                                        <th class="w110">操作</th>
                                    </tr>
                                    </thead>
                                                                                                            <tr class="bd-line text-c">
                                    <input type="hidden" class="epa_id" name="epa_id[36]" value="36">
                <td class="cell-area" style="padding-left:5px">
                <span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1">
                <p style="display:inline-block">北京,天津,河北省,山西省,内蒙古区,上海,浙江省,江苏省,山东省,安徽省,福建省,江西省,重庆,四川省,贵州省,云南省,西藏区,广东省,海南省,广西区,河南省,湖北省,湖南省,辽宁省,吉林省,黑龙江省,陕西省,甘肃省</p> </span><input type="hidden" value="北京,天津,河北省,山西省,内蒙古区,上海,浙江省,江苏省,山东省,安徽省,福建省,江西省,重庆,四川省,贵州省,云南省,西藏区,广东省,海南省,广西区,河南省,湖北省,湖南省,辽宁省,吉林省,黑龙江省,陕西省,甘肃省" class="select_area_name" name="area_name[36]"> <input type="hidden" value="1000,1368,1002,1370,1007,1120,1121,1122,1123,1124,1125,1126,1127,1128,1129,1130,1008,1276,1277,1278,1279,1280,1281,1282,1283,1284,1285,1286,1030,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1001,1369,1004,1353,1354,1355,1356,1357,1358,1359,1360,1361,1362,1363,1006,1197,1198,1199,1200,1201,1202,1203,1204,1205,1206,1207,1208,1209,4314,4315,1014,1259,1260,1261,1262,1263,1264,1265,1266,1267,1268,1269,1270,1271,1272,1273,1274,1275,1015,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1045,1046,1047,1048,1049,1050,4313,1016,1051,1052,1053,1054,1055,1056,1057,1058,1059,1020,1210,1211,1212,1213,1214,1215,1216,1217,1218,1219,1220,4324,1003,1371,1009,1297,1298,1299,1300,1301,1302,1303,1304,1305,1306,1307,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,1021,1109,1110,1111,1112,1113,1114,1115,1116,1117,1022,1337,1338,1339,1340,1341,1342,1343,1344,1345,1346,1347,1348,1349,1350,1351,1352,4334,4336,4337,4339,1029,1318,1319,1320,1321,1322,1323,1324,1005,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1019,1118,1119,1375,1376,1377,1378,1379,1380,1381,1382,1383,1384,1385,1386,1387,1388,1389,1390,3306,4335,1025,1095,1096,1097,1098,1099,1100,1101,1102,1103,1104,1105,1106,1107,1108,1010,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,1143,1144,1145,1146,1147,1391,1017,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,1173,1392,1393,1394,1395,4310,1018,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,1184,1185,1186,1187,1011,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,1234,1012,1188,1189,1190,1191,1192,1193,1194,1195,1196,1013,1148,1149,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1023,1288,1289,1290,1291,1292,1293,1294,1295,1296,4291,4340,1024,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,4012,4013" class="select_area_id" name="area[36]"> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="1"  name="first_w[36]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="10.00" name="first_f[36]" onblur="valid()" data-field="postage">
                <em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4"  autocomplete="off" value="1"  name="last_w[36]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="5.00"  name="last_f[36]" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="0.00"  name="no_fee[36]" onblur="valid()" data-null="no_fee" data-field="postage"> </td>
                <td class="nscs-table-handle">
                 <a class=" btn red btn-del btn-grapefruit J_DeleteRule_36" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i> </a>
                  <a class=" btn green btn-bluejeans_36" title="编辑" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i></a>
                    </td> </tr>
                                                                        <tr class="bd-line text-c">
                                    <input type="hidden" class="epa_id" name="epa_id[37]" value="37">
                <td class="cell-area" style="padding-left:5px">
                <span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1">
                <p style="display:inline-block">宁夏区,青海省,新疆区</p> </span><input type="hidden" value="宁夏区,青海省,新疆区" class="select_area_name" name="area_name[37]"> <input type="hidden" value="1026,1247,1248,1249,1250,4268,1027,1251,1252,1253,1254,1255,1256,1257,1258,1028,1325,1326,1327,1328,1329,1330,1331,1332,1333,1334,1335,1336,1364,1365,1366,1367,4302,4338" class="select_area_id" name="area[37]"> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="1"  name="first_w[37]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="15.00" name="first_f[37]" onblur="valid()" data-field="postage">
                <em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4"  autocomplete="off" value="1"  name="last_w[37]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="5.00"  name="last_f[37]" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="0.00"  name="no_fee[37]" onblur="valid()" data-null="no_fee" data-field="postage"> </td>
                <td class="nscs-table-handle">
                 <a class=" btn red btn-del btn-grapefruit J_DeleteRule_37" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i> </a>
                  <a class=" btn green btn-bluejeans_37" title="编辑" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i></a>
                    </td> </tr>
                                                                        <tr class="bd-line text-c">
                                    <input type="hidden" class="epa_id" name="epa_id[38]" value="38">
                <td class="cell-area" style="padding-left:5px">
                <span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1">
                <p style="display:inline-block">香港,澳门,台湾</p> </span><input type="hidden" value="香港,澳门,台湾" class="select_area_name" name="area_name[38]"> <input type="hidden" value="1031,1372,1032,1373,1033,4277,4278,4279,4280,4281,4282" class="select_area_id" name="area[38]"> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="1"  name="first_w[38]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="50.00" name="first_f[38]" onblur="valid()" data-field="postage">
                <em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4"  autocomplete="off" value="1"  name="last_w[38]" onblur="valid()" data-field="postage"> </td>
                <td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="5.00"  name="last_f[38]" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td>
                <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="0.00"  name="no_fee[38]" onblur="valid()" data-null="no_fee" data-field="postage"> </td>
                <td class="nscs-table-handle">
                 <a class=" btn red btn-del btn-grapefruit J_DeleteRule_38" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i> </a>
                  <a class=" btn green btn-bluejeans_38" title="编辑" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i></a>
                    </td> </tr>
                                                                                                        </table>
                            </div>

                            <div class="tbl-attach pd-5">
                                <div class="J_SpecialMessage"></div>
                                <a class="J_AddRule ncbtn-mini ml5" href="JavaScript:void(0);"><i class="fa fa-map-marker   "></i>为指定地区城市设置运费</a>


                            </div>

                        </div>
                    </div>
                </dd>
            </dl>
            <div class="bottom text-c">
                <label class="submit-border"><input type="btn btn-primary" id="submit_tpl" class="submit" value="保存"></label>
            </div>
        </form>
    </div>
</div>
<script>
    $("input[type=radio]").click(function () {
        if($(this))
            $(this).next().addClass('selected');

    })
    $('#status_1').click(function () {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "ajax_get_default_express?ept_id="+20,
            success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state == true){
                    $('#status_1').attr("checked","checked");
                    $('#status_0').removeAttr("checked");
                    $("#check_yes").addClass('selected');
                    $("#check_no").removeClass('selected');
                }else if(data.state == false){
                    layer.msg('已设置默认运费模板！');
                    $('#status_0').attr("checked","checked");
                    $('#status_1').removeAttr("checked");
                    $("#check_yes").removeClass('selected');
                    $("#check_no").addClass('selected');
                }
            }
        });
    });
    $('#status_0').click(function () {
        $('#status_0').attr("checked","checked");
        $('#status_1').removeAttr("checked");
        $("#check_yes").removeClass('selected');
        $("#check_no").addClass('selected');
    });

function del_area(obj){
	layer.confirm('<div class="pd-5 text-c"><i class="fa fa-warning c-orange" style="margin-right: 10px;font-size: 30px"></i>确认删除吗?</div>', {
        title:'<b>提示信息</b>',
        btn: ['确定','取消'] //按钮
    },function(){
    	$(obj).parents('tr').remove();
    	layer.msg('已删除');
    });
}
function edit_area(obj){
	obj = $(obj);
	var area_id = [];
	var this_area_id = obj.parents("tr").find("td.cell-area").find("input.select_area_id").val();
	//console.log(this_area_id)
	this_area_id = this_area_id.split(',');

	obj.parents('tr').siblings().each(function(){
		area_id.push($(this).find('td.cell-area').find("input.select_area_id").val())
	})
	area_id = area_id.join(',');
	area_id = area_id.split(',');
	//console.log(area_id)
    layer.open({
        type: 1,
        title:'<b>选择区域</b>',
        btn:['确定','取消'],
        skin: 'layui-layer-rim', //加上边框
        area: ['750px', '50%'], //宽高
        content: '<div class="pd-10 dialog-areas"><ul id="J_CityList"><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="华北"> <label for="J_Group_1">华北</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1000"><input type="hidden" name="province_name" value="北京"> ' +
        '<label for="J_Province_1">北京</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1368"><input type="hidden" name="city_name" value="北京市"> <label for="J_City_36">北京市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1002"><input type="hidden" name="province_name" value="天津"> ' +
        '<label for="J_Province_1">天津</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1370"><input type="hidden" name="city_name" value="天津市"> <label for="J_City_36">天津市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1007"><input type="hidden" name="province_name" value="河北省"> ' +
        '<label for="J_Province_1">河北省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1120"><input type="hidden" name="city_name" value="廊坊市"> <label for="J_City_36">廊坊市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1121"><input type="hidden" name="city_name" value="秦皇岛市"> <label for="J_City_36">秦皇岛市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1122"><input type="hidden" name="city_name" value="邢台市"> <label for="J_City_36">邢台市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1123"><input type="hidden" name="city_name" value="石家庄市"> <label for="J_City_36">石家庄市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1124"><input type="hidden" name="city_name" value="唐山市"> <label for="J_City_36">唐山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1125"><input type="hidden" name="city_name" value="张家口市"> <label for="J_City_36">张家口市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1126"><input type="hidden" name="city_name" value="保定市"> <label for="J_City_36">保定市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1127"><input type="hidden" name="city_name" value="沧州市"> <label for="J_City_36">沧州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1128"><input type="hidden" name="city_name" value="承德市"> <label for="J_City_36">承德市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1129"><input type="hidden" name="city_name" value="衡水市"> <label for="J_City_36">衡水市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1130"><input type="hidden" name="city_name" value="邯郸市"> <label for="J_City_36">邯郸市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1008"><input type="hidden" name="province_name" value="山西省"> ' +
        '<label for="J_Province_1">山西省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1276"><input type="hidden" name="city_name" value="吕梁市"> <label for="J_City_36">吕梁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1277"><input type="hidden" name="city_name" value="临汾市"> <label for="J_City_36">临汾市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1278"><input type="hidden" name="city_name" value="忻州市"> <label for="J_City_36">忻州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1279"><input type="hidden" name="city_name" value="朔州市"> <label for="J_City_36">朔州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1280"><input type="hidden" name="city_name" value="太原市"> <label for="J_City_36">太原市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1281"><input type="hidden" name="city_name" value="阳泉市"> <label for="J_City_36">阳泉市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1282"><input type="hidden" name="city_name" value="运城市"> <label for="J_City_36">运城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1283"><input type="hidden" name="city_name" value="长治市"> <label for="J_City_36">长治市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1284"><input type="hidden" name="city_name" value="大同市"> <label for="J_City_36">大同市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1285"><input type="hidden" name="city_name" value="晋中市"> <label for="J_City_36">晋中市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1286"><input type="hidden" name="city_name" value="晋城市"> <label for="J_City_36">晋城市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1030"><input type="hidden" name="province_name" value="内蒙古区"> ' +
        '<label for="J_Province_1">内蒙古区</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1235"><input type="hidden" name="city_name" value="兴安盟"> <label for="J_City_36">兴安盟</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1236"><input type="hidden" name="city_name" value="乌兰察布市"> <label for="J_City_36">乌兰察布市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1237"><input type="hidden" name="city_name" value="乌海市"> <label for="J_City_36">乌海市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1238"><input type="hidden" name="city_name" value="锡林郭勒盟"> <label for="J_City_36">锡林郭勒盟</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1239"><input type="hidden" name="city_name" value="通辽市"> <label for="J_City_36">通辽市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1240"><input type="hidden" name="city_name" value="巴彦淖尔市"> <label for="J_City_36">巴彦淖尔市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1241"><input type="hidden" name="city_name" value="包头市"> <label for="J_City_36">包头市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1242"><input type="hidden" name="city_name" value="阿拉善盟"> <label for="J_City_36">阿拉善盟</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1243"><input type="hidden" name="city_name" value="赤峰市"> <label for="J_City_36">赤峰市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1244"><input type="hidden" name="city_name" value="鄂尔多斯市"> <label for="J_City_36">鄂尔多斯市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1245"><input type="hidden" name="city_name" value="呼伦贝尔市"> <label for="J_City_36">呼伦贝尔市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1246"><input type="hidden" name="city_name" value="呼和浩特市"> <label for="J_City_36">呼和浩特市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="华东"> <label for="J_Group_1">华东</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1001"><input type="hidden" name="province_name" value="上海"> ' +
        '<label for="J_Province_1">上海</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1369"><input type="hidden" name="city_name" value="上海市"> <label for="J_City_36">上海市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1004"><input type="hidden" name="province_name" value="浙江省"> ' +
        '<label for="J_Province_1">浙江省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1353"><input type="hidden" name="city_name" value="衢州市"> <label for="J_City_36">衢州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1354"><input type="hidden" name="city_name" value="丽水市"> <label for="J_City_36">丽水市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1355"><input type="hidden" name="city_name" value="绍兴市"> <label for="J_City_36">绍兴市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1356"><input type="hidden" name="city_name" value="温州市"> <label for="J_City_36">温州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1357"><input type="hidden" name="city_name" value="台州市"> <label for="J_City_36">台州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1358"><input type="hidden" name="city_name" value="宁波市"> <label for="J_City_36">宁波市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1359"><input type="hidden" name="city_name" value="舟山市"> <label for="J_City_36">舟山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1360"><input type="hidden" name="city_name" value="杭州市"> <label for="J_City_36">杭州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1361"><input type="hidden" name="city_name" value="湖州市"> <label for="J_City_36">湖州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1362"><input type="hidden" name="city_name" value="嘉兴市"> <label for="J_City_36">嘉兴市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1363"><input type="hidden" name="city_name" value="金华市"> <label for="J_City_36">金华市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1006"><input type="hidden" name="province_name" value="江苏省"> ' +
        '<label for="J_Province_1">江苏省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1197"><input type="hidden" name="city_name" value="连云港市"> <label for="J_City_36">连云港市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1198"><input type="hidden" name="city_name" value="徐州市"> <label for="J_City_36">徐州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1199"><input type="hidden" name="city_name" value="苏州市"> <label for="J_City_36">苏州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1200"><input type="hidden" name="city_name" value="宿迁市"> <label for="J_City_36">宿迁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1201"><input type="hidden" name="city_name" value="泰州市"> <label for="J_City_36">泰州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1202"><input type="hidden" name="city_name" value="无锡市"> <label for="J_City_36">无锡市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1203"><input type="hidden" name="city_name" value="扬州市"> <label for="J_City_36">扬州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1204"><input type="hidden" name="city_name" value="盐城市"> <label for="J_City_36">盐城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1205"><input type="hidden" name="city_name" value="镇江市"> <label for="J_City_36">镇江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1206"><input type="hidden" name="city_name" value="南通市"> <label for="J_City_36">南通市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1207"><input type="hidden" name="city_name" value="南京市"> <label for="J_City_36">南京市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1208"><input type="hidden" name="city_name" value="常州市"> <label for="J_City_36">常州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1209"><input type="hidden" name="city_name" value="淮安市"> <label for="J_City_36">淮安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4314"><input type="hidden" name="city_name" value="吴中市"> <label for="J_City_36">吴中市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4315"><input type="hidden" name="city_name" value="昆山市"> <label for="J_City_36">昆山市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1014"><input type="hidden" name="province_name" value="山东省"> ' +
        '<label for="J_Province_1">山东省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1259"><input type="hidden" name="city_name" value="临沂市"> <label for="J_City_36">临沂市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1260"><input type="hidden" name="city_name" value="聊城市"> <label for="J_City_36">聊城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1261"><input type="hidden" name="city_name" value="莱芜市"> <label for="J_City_36">莱芜市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1262"><input type="hidden" name="city_name" value="青岛市"> <label for="J_City_36">青岛市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1263"><input type="hidden" name="city_name" value="日照市"> <label for="J_City_36">日照市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1264"><input type="hidden" name="city_name" value="泰安市"> <label for="J_City_36">泰安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1265"><input type="hidden" name="city_name" value="潍坊市"> <label for="J_City_36">潍坊市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1266"><input type="hidden" name="city_name" value="威海市"> <label for="J_City_36">威海市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1267"><input type="hidden" name="city_name" value="烟台市"> <label for="J_City_36">烟台市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1268"><input type="hidden" name="city_name" value="枣庄市"> <label for="J_City_36">枣庄市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1269"><input type="hidden" name="city_name" value="滨州市"> <label for="J_City_36">滨州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1270"><input type="hidden" name="city_name" value="德州市"> <label for="J_City_36">德州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1271"><input type="hidden" name="city_name" value="东营市"> <label for="J_City_36">东营市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1272"><input type="hidden" name="city_name" value="菏泽市"> <label for="J_City_36">菏泽市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1273"><input type="hidden" name="city_name" value="济南市"> <label for="J_City_36">济南市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1274"><input type="hidden" name="city_name" value="济宁市"> <label for="J_City_36">济宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1275"><input type="hidden" name="city_name" value="淄博市"> <label for="J_City_36">淄博市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1015"><input type="hidden" name="province_name" value="安徽省"> ' +
        '<label for="J_Province_1">安徽省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1034"><input type="hidden" name="city_name" value="马鞍山市"> <label for="J_City_36">马鞍山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1035"><input type="hidden" name="city_name" value="六安市"> <label for="J_City_36">六安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1036"><input type="hidden" name="city_name" value="宣城市"> <label for="J_City_36">宣城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1037"><input type="hidden" name="city_name" value="宿州市"> <label for="J_City_36">宿州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1038"><input type="hidden" name="city_name" value="铜陵市"> <label for="J_City_36">铜陵市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1039"><input type="hidden" name="city_name" value="芜湖市"> <label for="J_City_36">芜湖市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1040"><input type="hidden" name="city_name" value="亳州市"> <label for="J_City_36">亳州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1041"><input type="hidden" name="city_name" value="蚌埠市"> <label for="J_City_36">蚌埠市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1042"><input type="hidden" name="city_name" value="安庆市"> <label for="J_City_36">安庆市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1043"><input type="hidden" name="city_name" value="滁州市"> <label for="J_City_36">滁州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1045"><input type="hidden" name="city_name" value="阜阳市"> <label for="J_City_36">阜阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1046"><input type="hidden" name="city_name" value="池州市"> <label for="J_City_36">池州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1047"><input type="hidden" name="city_name" value="合肥市"> <label for="J_City_36">合肥市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1048"><input type="hidden" name="city_name" value="黄山市"> <label for="J_City_36">黄山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1049"><input type="hidden" name="city_name" value="淮南市"> <label for="J_City_36">淮南市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1050"><input type="hidden" name="city_name" value="淮北市"> <label for="J_City_36">淮北市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4313"><input type="hidden" name="city_name" value="巢湖"> <label for="J_City_36">巢湖</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1016"><input type="hidden" name="province_name" value="福建省"> ' +
        '<label for="J_Province_1">福建省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1051"><input type="hidden" name="city_name" value="龙岩市"> <label for="J_City_36">龙岩市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1052"><input type="hidden" name="city_name" value="三明市"> <label for="J_City_36">三明市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1053"><input type="hidden" name="city_name" value="泉州市"> <label for="J_City_36">泉州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1054"><input type="hidden" name="city_name" value="厦门市"> <label for="J_City_36">厦门市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1055"><input type="hidden" name="city_name" value="漳州市"> <label for="J_City_36">漳州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1056"><input type="hidden" name="city_name" value="莆田市"> <label for="J_City_36">莆田市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1057"><input type="hidden" name="city_name" value="南平市"> <label for="J_City_36">南平市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1058"><input type="hidden" name="city_name" value="宁德市"> <label for="J_City_36">宁德市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1059"><input type="hidden" name="city_name" value="福州市"> <label for="J_City_36">福州市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1020"><input type="hidden" name="province_name" value="江西省"> ' +
        '<label for="J_Province_1">江西省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1210"><input type="hidden" name="city_name" value="新余市"> <label for="J_City_36">新余市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1211"><input type="hidden" name="city_name" value="上饶市"> <label for="J_City_36">上饶市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1212"><input type="hidden" name="city_name" value="宜春市"> <label for="J_City_36">宜春市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1213"><input type="hidden" name="city_name" value="鹰潭市"> <label for="J_City_36">鹰潭市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1214"><input type="hidden" name="city_name" value="南昌市"> <label for="J_City_36">南昌市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1215"><input type="hidden" name="city_name" value="萍乡市"> <label for="J_City_36">萍乡市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1216"><input type="hidden" name="city_name" value="赣州市"> <label for="J_City_36">赣州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1217"><input type="hidden" name="city_name" value="抚州市"> <label for="J_City_36">抚州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1218"><input type="hidden" name="city_name" value="吉安市"> <label for="J_City_36">吉安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1219"><input type="hidden" name="city_name" value="九江市"> <label for="J_City_36">九江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1220"><input type="hidden" name="city_name" value="景德镇市"> <label for="J_City_36">景德镇市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4324"><input type="hidden" name="city_name" value="红谷滩新区"> <label for="J_City_36">红谷滩新区</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="西南"> <label for="J_Group_1">西南</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1003"><input type="hidden" name="province_name" value="重庆"> ' +
        '<label for="J_Province_1">重庆</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1371"><input type="hidden" name="city_name" value="重庆市"> <label for="J_City_36">重庆市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1009"><input type="hidden" name="province_name" value="四川省"> ' +
        '<label for="J_Province_1">四川省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1297"><input type="hidden" name="city_name" value="绵阳市"> <label for="J_City_36">绵阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1298"><input type="hidden" name="city_name" value="泸州市"> <label for="J_City_36">泸州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1299"><input type="hidden" name="city_name" value="乐山市"> <label for="J_City_36">乐山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1300"><input type="hidden" name="city_name" value="凉山彝族自治州"> <label for="J_City_36">凉山彝族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1301"><input type="hidden" name="city_name" value="眉山市"> <label for="J_City_36">眉山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1302"><input type="hidden" name="city_name" value="遂宁市"> <label for="J_City_36">遂宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1303"><input type="hidden" name="city_name" value="雅安市"> <label for="J_City_36">雅安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1304"><input type="hidden" name="city_name" value="宜宾市"> <label for="J_City_36">宜宾市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1305"><input type="hidden" name="city_name" value="攀枝花市"> <label for="J_City_36">攀枝花市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1306"><input type="hidden" name="city_name" value="南充市"> <label for="J_City_36">南充市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1307"><input type="hidden" name="city_name" value="内江市"> <label for="J_City_36">内江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1308"><input type="hidden" name="city_name" value="巴中市"> <label for="J_City_36">巴中市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1309"><input type="hidden" name="city_name" value="阿坝藏族羌族自治州"> <label for="J_City_36">阿坝藏族羌族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1310"><input type="hidden" name="city_name" value="成都市"> <label for="J_City_36">成都市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1311"><input type="hidden" name="city_name" value="达州市"> <label for="J_City_36">达州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1312"><input type="hidden" name="city_name" value="德阳市"> <label for="J_City_36">德阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1313"><input type="hidden" name="city_name" value="甘孜藏族自治州"> <label for="J_City_36">甘孜藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1314"><input type="hidden" name="city_name" value="广元市"> <label for="J_City_36">广元市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1315"><input type="hidden" name="city_name" value="广安市"> <label for="J_City_36">广安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1316"><input type="hidden" name="city_name" value="资阳市"> <label for="J_City_36">资阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1317"><input type="hidden" name="city_name" value="自贡市"> <label for="J_City_36">自贡市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1021"><input type="hidden" name="province_name" value="贵州省"> ' +
        '<label for="J_Province_1">贵州省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1109"><input type="hidden" name="city_name" value="六盘水市"> <label for="J_City_36">六盘水市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1110"><input type="hidden" name="city_name" value="黔西南布依族苗族自治州"> <label for="J_City_36">黔西南布依族苗族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1111"><input type="hidden" name="city_name" value="黔南布依族苗族自治州"> <label for="J_City_36">黔南布依族苗族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1112"><input type="hidden" name="city_name" value="黔东南苗族侗族自治州"> <label for="J_City_36">黔东南苗族侗族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1113"><input type="hidden" name="city_name" value="铜仁地区"> <label for="J_City_36">铜仁地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1114"><input type="hidden" name="city_name" value="安顺市"> <label for="J_City_36">安顺市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1115"><input type="hidden" name="city_name" value="毕节地区"> <label for="J_City_36">毕节地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1116"><input type="hidden" name="city_name" value="贵阳市"> <label for="J_City_36">贵阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1117"><input type="hidden" name="city_name" value="遵义市"> <label for="J_City_36">遵义市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1022"><input type="hidden" name="province_name" value="云南省"> ' +
        '<label for="J_Province_1">云南省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1337"><input type="hidden" name="city_name" value="临沧市"> <label for="J_City_36">临沧市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1338"><input type="hidden" name="city_name" value="丽江市"> <label for="J_City_36">丽江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1339"><input type="hidden" name="city_name" value="昆明市"> <label for="J_City_36">昆明市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1340"><input type="hidden" name="city_name" value="德宏傣族景颇族自治州"> <label for="J_City_36">德宏傣族景颇族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1341"><input type="hidden" name="city_name" value="曲靖市"> <label for="J_City_36">曲靖市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1342"><input type="hidden" name="city_name" value="普洱市"> <label for="J_City_36">普洱市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1343"><input type="hidden" name="city_name" value="文山壮族苗族自治州"> <label for="J_City_36">文山壮族苗族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1344"><input type="hidden" name="city_name" value="昭通市"> <label for="J_City_36">昭通市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1345"><input type="hidden" name="city_name" value="玉溪市"> <label for="J_City_36">玉溪市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1346"><input type="hidden" name="city_name" value="怒江傈僳族自治州"> <label for="J_City_36">怒江傈僳族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1347"><input type="hidden" name="city_name" value="保山市"> <label for="J_City_36">保山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1348"><input type="hidden" name="city_name" value="楚雄彝族自治州"> <label for="J_City_36">楚雄彝族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1349"><input type="hidden" name="city_name" value="大理白族自治州"> <label for="J_City_36">大理白族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1350"><input type="hidden" name="city_name" value="迪庆藏族自治州"> <label for="J_City_36">迪庆藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1351"><input type="hidden" name="city_name" value="红河哈尼族彝族自治州"> <label for="J_City_36">红河哈尼族彝族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1352"><input type="hidden" name="city_name" value="西双版纳傣族自治州"> <label for="J_City_36">西双版纳傣族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4334"><input type="hidden" name="city_name" value="文山市"> <label for="J_City_36">文山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4336"><input type="hidden" name="city_name" value="西双版纳"> <label for="J_City_36">西双版纳</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4337"><input type="hidden" name="city_name" value="红河"> <label for="J_City_36">红河</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4339"><input type="hidden" name="city_name" value="德宏"> <label for="J_City_36">德宏</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1029"><input type="hidden" name="province_name" value="西藏区"> ' +
        '<label for="J_Province_1">西藏区</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1318"><input type="hidden" name="city_name" value="林芝地区"> <label for="J_City_36">林芝地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1319"><input type="hidden" name="city_name" value="拉萨市"> <label for="J_City_36">拉萨市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1320"><input type="hidden" name="city_name" value="日喀则地区"> <label for="J_City_36">日喀则地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1321"><input type="hidden" name="city_name" value="山南地区"> <label for="J_City_36">山南地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1322"><input type="hidden" name="city_name" value="那曲地区"> <label for="J_City_36">那曲地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1323"><input type="hidden" name="city_name" value="阿里地区"> <label for="J_City_36">阿里地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1324"><input type="hidden" name="city_name" value="昌都地区"> <label for="J_City_36">昌都地区</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="华南"> <label for="J_Group_1">华南</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1005"><input type="hidden" name="province_name" value="广东省"> ' +
        '<label for="J_Province_1">广东省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1074"><input type="hidden" name="city_name" value="茂名市"> <label for="J_City_36">茂名市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1075"><input type="hidden" name="city_name" value="梅州市"> <label for="J_City_36">梅州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1076"><input type="hidden" name="city_name" value="清远市"> <label for="J_City_36">清远市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1077"><input type="hidden" name="city_name" value="汕尾市"> <label for="J_City_36">汕尾市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1078"><input type="hidden" name="city_name" value="汕头市"> <label for="J_City_36">汕头市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1079"><input type="hidden" name="city_name" value="深圳市"> <label for="J_City_36">深圳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1080"><input type="hidden" name="city_name" value="韶关市"> <label for="J_City_36">韶关市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1081"><input type="hidden" name="city_name" value="阳江市"> <label for="J_City_36">阳江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1082"><input type="hidden" name="city_name" value="云浮市"> <label for="J_City_36">云浮市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1083"><input type="hidden" name="city_name" value="湛江市"> <label for="J_City_36">湛江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1084"><input type="hidden" name="city_name" value="肇庆市"> <label for="J_City_36">肇庆市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1085"><input type="hidden" name="city_name" value="中山市"> <label for="J_City_36">中山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1086"><input type="hidden" name="city_name" value="珠海市"> <label for="J_City_36">珠海市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1087"><input type="hidden" name="city_name" value="潮州市"> <label for="J_City_36">潮州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1088"><input type="hidden" name="city_name" value="东莞市"> <label for="J_City_36">东莞市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1089"><input type="hidden" name="city_name" value="佛山市"> <label for="J_City_36">佛山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1090"><input type="hidden" name="city_name" value="广州市"> <label for="J_City_36">广州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1091"><input type="hidden" name="city_name" value="河源市"> <label for="J_City_36">河源市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1092"><input type="hidden" name="city_name" value="惠州市"> <label for="J_City_36">惠州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1093"><input type="hidden" name="city_name" value="揭阳市"> <label for="J_City_36">揭阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1094"><input type="hidden" name="city_name" value="江门市"> <label for="J_City_36">江门市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1019"><input type="hidden" name="province_name" value="海南省"> ' +
        '<label for="J_Province_1">海南省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1118"><input type="hidden" name="city_name" value="三亚市"> <label for="J_City_36">三亚市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1119"><input type="hidden" name="city_name" value="海口市"> <label for="J_City_36">海口市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1375"><input type="hidden" name="city_name" value="白沙黎族自治县"> <label for="J_City_36">白沙黎族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1376"><input type="hidden" name="city_name" value="保亭黎族苗族自治县"> <label for="J_City_36">保亭黎族苗族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1377"><input type="hidden" name="city_name" value="昌江黎族自治县"> <label for="J_City_36">昌江黎族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1378"><input type="hidden" name="city_name" value="澄迈县"> <label for="J_City_36">澄迈县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1379"><input type="hidden" name="city_name" value="定安县"> <label for="J_City_36">定安县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1380"><input type="hidden" name="city_name" value="东方市"> <label for="J_City_36">东方市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1381"><input type="hidden" name="city_name" value="乐东黎族自治县"> <label for="J_City_36">乐东黎族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1382"><input type="hidden" name="city_name" value="临高县"> <label for="J_City_36">临高县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1383"><input type="hidden" name="city_name" value="陵水黎族自治县"> <label for="J_City_36">陵水黎族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1384"><input type="hidden" name="city_name" value="琼海市"> <label for="J_City_36">琼海市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1385"><input type="hidden" name="city_name" value="琼中黎族苗族自治县"> <label for="J_City_36">琼中黎族苗族自治县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1386"><input type="hidden" name="city_name" value="屯昌县"> <label for="J_City_36">屯昌县</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1387"><input type="hidden" name="city_name" value="万宁市"> <label for="J_City_36">万宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1388"><input type="hidden" name="city_name" value="文昌市"> <label for="J_City_36">文昌市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1389"><input type="hidden" name="city_name" value="五指山市"> <label for="J_City_36">五指山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1390"><input type="hidden" name="city_name" value="儋州市"> <label for="J_City_36">儋州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="3306"><input type="hidden" name="city_name" value="琼山市"> <label for="J_City_36">琼山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4335"><input type="hidden" name="city_name" value="保亭黎族苗族自治县"> <label for="J_City_36">保亭黎族苗族自治县</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1025"><input type="hidden" name="province_name" value="广西区"> ' +
        '<label for="J_Province_1">广西区</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1095"><input type="hidden" name="city_name" value="柳州市"> <label for="J_City_36">柳州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1096"><input type="hidden" name="city_name" value="崇左市"> <label for="J_City_36">崇左市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1097"><input type="hidden" name="city_name" value="钦州市"> <label for="J_City_36">钦州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1098"><input type="hidden" name="city_name" value="梧州市"> <label for="J_City_36">梧州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1099"><input type="hidden" name="city_name" value="玉林市"> <label for="J_City_36">玉林市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1100"><input type="hidden" name="city_name" value="南宁市"> <label for="J_City_36">南宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1101"><input type="hidden" name="city_name" value="来宾市"> <label for="J_City_36">来宾市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1102"><input type="hidden" name="city_name" value="百色市"> <label for="J_City_36">百色市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1103"><input type="hidden" name="city_name" value="北海市"> <label for="J_City_36">北海市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1104"><input type="hidden" name="city_name" value="防城港市"> <label for="J_City_36">防城港市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1105"><input type="hidden" name="city_name" value="桂林市"> <label for="J_City_36">桂林市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1106"><input type="hidden" name="city_name" value="贵港市"> <label for="J_City_36">贵港市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1107"><input type="hidden" name="city_name" value="河池市"> <label for="J_City_36">河池市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1108"><input type="hidden" name="city_name" value="贺州市"> <label for="J_City_36">贺州市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="华中"> <label for="J_Group_1">华中</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1010"><input type="hidden" name="province_name" value="河南省"> ' +
        '<label for="J_Province_1">河南省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1131"><input type="hidden" name="city_name" value="洛阳市"> <label for="J_City_36">洛阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1132"><input type="hidden" name="city_name" value="新乡市"> <label for="J_City_36">新乡市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1133"><input type="hidden" name="city_name" value="许昌市"> <label for="J_City_36">许昌市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1134"><input type="hidden" name="city_name" value="信阳市"> <label for="J_City_36">信阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1135"><input type="hidden" name="city_name" value="商丘市"> <label for="J_City_36">商丘市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1136"><input type="hidden" name="city_name" value="三门峡市"> <label for="J_City_36">三门峡市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1137"><input type="hidden" name="city_name" value="濮阳市"> <label for="J_City_36">濮阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1138"><input type="hidden" name="city_name" value="漯河市"> <label for="J_City_36">漯河市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1139"><input type="hidden" name="city_name" value="南阳市"> <label for="J_City_36">南阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1140"><input type="hidden" name="city_name" value="平顶山市"> <label for="J_City_36">平顶山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1141"><input type="hidden" name="city_name" value="周口市"> <label for="J_City_36">周口市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1142"><input type="hidden" name="city_name" value="郑州市"> <label for="J_City_36">郑州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1143"><input type="hidden" name="city_name" value="安阳市"> <label for="J_City_36">安阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1144"><input type="hidden" name="city_name" value="鹤壁市"> <label for="J_City_36">鹤壁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1145"><input type="hidden" name="city_name" value="焦作市"> <label for="J_City_36">焦作市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1146"><input type="hidden" name="city_name" value="开封市"> <label for="J_City_36">开封市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1147"><input type="hidden" name="city_name" value="驻马店市"> <label for="J_City_36">驻马店市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1391"><input type="hidden" name="city_name" value="济源市"> <label for="J_City_36">济源市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1017"><input type="hidden" name="province_name" value="湖北省"> ' +
        '<label for="J_Province_1">湖北省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1161"><input type="hidden" name="city_name" value="孝感市"> <label for="J_City_36">孝感市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1162"><input type="hidden" name="city_name" value="随州市"> <label for="J_City_36">随州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1163"><input type="hidden" name="city_name" value="十堰市"> <label for="J_City_36">十堰市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1164"><input type="hidden" name="city_name" value="咸宁市"> <label for="J_City_36">咸宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1165"><input type="hidden" name="city_name" value="襄阳市"> <label for="J_City_36">襄阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1166"><input type="hidden" name="city_name" value="武汉市"> <label for="J_City_36">武汉市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1167"><input type="hidden" name="city_name" value="宜昌市"> <label for="J_City_36">宜昌市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1168"><input type="hidden" name="city_name" value="鄂州市"> <label for="J_City_36">鄂州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1169"><input type="hidden" name="city_name" value="恩施市"> <label for="J_City_36">恩施市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1170"><input type="hidden" name="city_name" value="黄石市"> <label for="J_City_36">黄石市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1171"><input type="hidden" name="city_name" value="黄冈市"> <label for="J_City_36">黄冈市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1172"><input type="hidden" name="city_name" value="荆门市"> <label for="J_City_36">荆门市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1173"><input type="hidden" name="city_name" value="荆州市"> <label for="J_City_36">荆州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1392"><input type="hidden" name="city_name" value="潜江市"> <label for="J_City_36">潜江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1393"><input type="hidden" name="city_name" value="神农架林区"> <label for="J_City_36">神农架林区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1394"><input type="hidden" name="city_name" value="天门市"> <label for="J_City_36">天门市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1395"><input type="hidden" name="city_name" value="仙桃市"> <label for="J_City_36">仙桃市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4310"><input type="hidden" name="city_name" value="武昌"> <label for="J_City_36">武昌</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1018"><input type="hidden" name="province_name" value="湖南省"> ' +
        '<label for="J_Province_1">湖南省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1174"><input type="hidden" name="city_name" value="娄底市"> <label for="J_City_36">娄底市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1175"><input type="hidden" name="city_name" value="邵阳市"> <label for="J_City_36">邵阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1176"><input type="hidden" name="city_name" value="湘潭市"> <label for="J_City_36">湘潭市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1177"><input type="hidden" name="city_name" value="湘西土家族苗族自治州"> <label for="J_City_36">湘西土家族苗族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1178"><input type="hidden" name="city_name" value="岳阳市"> <label for="J_City_36">岳阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1179"><input type="hidden" name="city_name" value="永州市"> <label for="J_City_36">永州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1180"><input type="hidden" name="city_name" value="张家界市"> <label for="J_City_36">张家界市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1181"><input type="hidden" name="city_name" value="益阳市"> <label for="J_City_36">益阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1182"><input type="hidden" name="city_name" value="株洲市"> <label for="J_City_36">株洲市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1183"><input type="hidden" name="city_name" value="常德市"> <label for="J_City_36">常德市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1184"><input type="hidden" name="city_name" value="长沙市"> <label for="J_City_36">长沙市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1185"><input type="hidden" name="city_name" value="郴州市"> <label for="J_City_36">郴州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1186"><input type="hidden" name="city_name" value="衡阳市"> <label for="J_City_36">衡阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1187"><input type="hidden" name="city_name" value="怀化市"> <label for="J_City_36">怀化市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="东北"> <label for="J_Group_1">东北</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1011"><input type="hidden" name="province_name" value="辽宁省"> ' +
        '<label for="J_Province_1">辽宁省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1221"><input type="hidden" name="city_name" value="辽阳市"> <label for="J_City_36">辽阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1222"><input type="hidden" name="city_name" value="沈阳市"> <label for="J_City_36">沈阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1223"><input type="hidden" name="city_name" value="铁岭市"> <label for="J_City_36">铁岭市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1224"><input type="hidden" name="city_name" value="营口市"> <label for="J_City_36">营口市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1225"><input type="hidden" name="city_name" value="盘锦市"> <label for="J_City_36">盘锦市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1226"><input type="hidden" name="city_name" value="鞍山市"> <label for="J_City_36">鞍山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1227"><input type="hidden" name="city_name" value="本溪市"> <label for="J_City_36">本溪市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1228"><input type="hidden" name="city_name" value="朝阳市"> <label for="J_City_36">朝阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1229"><input type="hidden" name="city_name" value="大连市"> <label for="J_City_36">大连市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1230"><input type="hidden" name="city_name" value="丹东市"> <label for="J_City_36">丹东市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1231"><input type="hidden" name="city_name" value="抚顺市"> <label for="J_City_36">抚顺市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1232"><input type="hidden" name="city_name" value="阜新市"> <label for="J_City_36">阜新市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1233"><input type="hidden" name="city_name" value="葫芦岛市"> <label for="J_City_36">葫芦岛市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1234"><input type="hidden" name="city_name" value="锦州市"> <label for="J_City_36">锦州市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1012"><input type="hidden" name="province_name" value="吉林省"> ' +
        '<label for="J_Province_1">吉林省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1188"><input type="hidden" name="city_name" value="辽源市"> <label for="J_City_36">辽源市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1189"><input type="hidden" name="city_name" value="松原市"> <label for="J_City_36">松原市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1190"><input type="hidden" name="city_name" value="四平市"> <label for="J_City_36">四平市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1191"><input type="hidden" name="city_name" value="通化市"> <label for="J_City_36">通化市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1192"><input type="hidden" name="city_name" value="延边朝鲜族自治州"> <label for="J_City_36">延边朝鲜族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1193"><input type="hidden" name="city_name" value="白山市"> <label for="J_City_36">白山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1194"><input type="hidden" name="city_name" value="白城市"> <label for="J_City_36">白城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1195"><input type="hidden" name="city_name" value="长春市"> <label for="J_City_36">长春市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1196"><input type="hidden" name="city_name" value="吉林市"> <label for="J_City_36">吉林市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1013"><input type="hidden" name="province_name" value="黑龙江省"> ' +
        '<label for="J_Province_1">黑龙江省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1148"><input type="hidden" name="city_name" value="绥化市"> <label for="J_City_36">绥化市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1149"><input type="hidden" name="city_name" value="双鸭山市"> <label for="J_City_36">双鸭山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1150"><input type="hidden" name="city_name" value="伊春市"> <label for="J_City_36">伊春市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1151"><input type="hidden" name="city_name" value="齐齐哈尔市"> <label for="J_City_36">齐齐哈尔市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1152"><input type="hidden" name="city_name" value="牡丹江市"> <label for="J_City_36">牡丹江市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1153"><input type="hidden" name="city_name" value="七台河市"> <label for="J_City_36">七台河市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1154"><input type="hidden" name="city_name" value="大庆市"> <label for="J_City_36">大庆市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1155"><input type="hidden" name="city_name" value="大兴安岭地区"> <label for="J_City_36">大兴安岭地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1156"><input type="hidden" name="city_name" value="哈尔滨市"> <label for="J_City_36">哈尔滨市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1157"><input type="hidden" name="city_name" value="黑河市"> <label for="J_City_36">黑河市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1158"><input type="hidden" name="city_name" value="鹤岗市"> <label for="J_City_36">鹤岗市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1159"><input type="hidden" name="city_name" value="佳木斯市"> <label for="J_City_36">佳木斯市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1160"><input type="hidden" name="city_name" value="鸡西市"> <label for="J_City_36">鸡西市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="西北"> <label for="J_Group_1">西北</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1023"><input type="hidden" name="province_name" value="陕西省"> ' +
        '<label for="J_Province_1">陕西省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1288"><input type="hidden" name="city_name" value="咸阳市"> <label for="J_City_36">咸阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1289"><input type="hidden" name="city_name" value="铜川市"> <label for="J_City_36">铜川市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1290"><input type="hidden" name="city_name" value="渭南市"> <label for="J_City_36">渭南市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1291"><input type="hidden" name="city_name" value="西安市"> <label for="J_City_36">西安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1292"><input type="hidden" name="city_name" value="延安市"> <label for="J_City_36">延安市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1293"><input type="hidden" name="city_name" value="榆林市"> <label for="J_City_36">榆林市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1294"><input type="hidden" name="city_name" value="安康市"> <label for="J_City_36">安康市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1295"><input type="hidden" name="city_name" value="宝鸡市"> <label for="J_City_36">宝鸡市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1296"><input type="hidden" name="city_name" value="汉中市"> <label for="J_City_36">汉中市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4291"><input type="hidden" name="city_name" value="韩城市"> <label for="J_City_36">韩城市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4340"><input type="hidden" name="city_name" value="西安"> <label for="J_City_36">西安</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1024"><input type="hidden" name="province_name" value="甘肃省"> ' +
        '<label for="J_Province_1">甘肃省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1060"><input type="hidden" name="city_name" value="临夏回族自治州"> <label for="J_City_36">临夏回族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1061"><input type="hidden" name="city_name" value="陇南市"> <label for="J_City_36">陇南市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1062"><input type="hidden" name="city_name" value="兰州市"> <label for="J_City_36">兰州市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1063"><input type="hidden" name="city_name" value="天水市"> <label for="J_City_36">天水市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1064"><input type="hidden" name="city_name" value="武威市"> <label for="J_City_36">武威市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1065"><input type="hidden" name="city_name" value="庆阳市"> <label for="J_City_36">庆阳市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1066"><input type="hidden" name="city_name" value="张掖市"> <label for="J_City_36">张掖市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1067"><input type="hidden" name="city_name" value="平凉市"> <label for="J_City_36">平凉市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1068"><input type="hidden" name="city_name" value="白银市"> <label for="J_City_36">白银市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1069"><input type="hidden" name="city_name" value="定西市"> <label for="J_City_36">定西市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1070"><input type="hidden" name="city_name" value="甘南藏族自治州"> <label for="J_City_36">甘南藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1071"><input type="hidden" name="city_name" value="嘉峪关市"> <label for="J_City_36">嘉峪关市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1072"><input type="hidden" name="city_name" value="金昌市"> <label for="J_City_36">金昌市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1073"><input type="hidden" name="city_name" value="酒泉市"> <label for="J_City_36">酒泉市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4012"><input type="hidden" name="city_name" value="玉门市"> <label for="J_City_36">玉门市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4013"><input type="hidden" name="city_name" value="敦煌市"> <label for="J_City_36">敦煌市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1026"><input type="hidden" name="province_name" value="宁夏区"> ' +
        '<label for="J_Province_1">宁夏区</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1247"><input type="hidden" name="city_name" value="石嘴山市"> <label for="J_City_36">石嘴山市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1248"><input type="hidden" name="city_name" value="吴忠市"> <label for="J_City_36">吴忠市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1249"><input type="hidden" name="city_name" value="银川市"> <label for="J_City_36">银川市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1250"><input type="hidden" name="city_name" value="固原市"> <label for="J_City_36">固原市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4268"><input type="hidden" name="city_name" value="中卫市"> <label for="J_City_36">中卫市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1027"><input type="hidden" name="province_name" value="青海省"> ' +
        '<label for="J_Province_1">青海省</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1251"><input type="hidden" name="city_name" value="西宁市"> <label for="J_City_36">西宁市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1252"><input type="hidden" name="city_name" value="玉树藏族自治州"> <label for="J_City_36">玉树藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1253"><input type="hidden" name="city_name" value="果洛藏族自治州"> <label for="J_City_36">果洛藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1254"><input type="hidden" name="city_name" value="海西蒙古族藏族自治州"> <label for="J_City_36">海西蒙古族藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1255"><input type="hidden" name="city_name" value="海南藏族自治州"> <label for="J_City_36">海南藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1256"><input type="hidden" name="city_name" value="海北藏族自治州"> <label for="J_City_36">海北藏族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1257"><input type="hidden" name="city_name" value="海东地区"> <label for="J_City_36">海东地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1258"><input type="hidden" name="city_name" value="黄南藏族自治州"> <label for="J_City_36">黄南藏族自治州</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1028"><input type="hidden" name="province_name" value="新疆区"> ' +
        '<label for="J_Province_1">新疆区</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1325"><input type="hidden" name="city_name" value="吐鲁番地区"> <label for="J_City_36">吐鲁番地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1326"><input type="hidden" name="city_name" value="乌鲁木齐市"> <label for="J_City_36">乌鲁木齐市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1327"><input type="hidden" name="city_name" value="伊犁哈萨克自治州"> <label for="J_City_36">伊犁哈萨克自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1328"><input type="hidden" name="city_name" value="克孜勒苏柯尔克孜自治州"> <label for="J_City_36">克孜勒苏柯尔克孜自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1329"><input type="hidden" name="city_name" value="阿克苏地区"> <label for="J_City_36">阿克苏地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1330"><input type="hidden" name="city_name" value="昌吉回族自治州"> <label for="J_City_36">昌吉回族自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1331"><input type="hidden" name="city_name" value="博尔塔拉蒙古自治州"> <label for="J_City_36">博尔塔拉蒙古自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1332"><input type="hidden" name="city_name" value="哈密地区"> <label for="J_City_36">哈密地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1333"><input type="hidden" name="city_name" value="和田地区"> <label for="J_City_36">和田地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1334"><input type="hidden" name="city_name" value="巴音郭楞蒙古自治州"> <label for="J_City_36">巴音郭楞蒙古自治州</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1335"><input type="hidden" name="city_name" value="克拉玛依市"> <label for="J_City_36">克拉玛依市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1336"><input type="hidden" name="city_name" value="喀什地区"> <label for="J_City_36">喀什地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1364"><input type="hidden" name="city_name" value="石河子市"> <label for="J_City_36">石河子市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1365"><input type="hidden" name="city_name" value="阿拉尔市"> <label for="J_City_36">阿拉尔市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1366"><input type="hidden" name="city_name" value="图木舒克市"> <label for="J_City_36">图木舒克市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1367"><input type="hidden" name="city_name" value="五家渠市"> <label for="J_City_36">五家渠市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4302"><input type="hidden" name="city_name" value="阿勒泰地区"> <label for="J_City_36">阿勒泰地区</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4338"><input type="hidden" name="city_name" value="伊犁"> <label for="J_City_36">伊犁</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li><li><dl class="ncsc-region">' +
        '<dt class="ncsc-region-title"> <span> <input type="checkbox" id="J_Group_1" class="J_Group"  value=""><input type="hidden" name="group_name" value="台港澳地区"> <label for="J_Group_1">台港澳地区</label> </span> </dt>' +
        '<dd class="ncsc-province-list"><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1031"><input type="hidden" name="province_name" value="香港"> ' +
        '<label for="J_Province_1">香港</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1372"><input type="hidden" name="city_name" value="香港"> <label for="J_City_36">香港</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1032"><input type="hidden" name="province_name" value="澳门"> ' +
        '<label for="J_Province_1">澳门</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="1373"><input type="hidden" name="city_name" value="澳门"> <label for="J_City_36">澳门</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div><div class="ncsc-province"><span class="ncsc-province-tab"> ' +
        '<input type="checkbox" class="J_Province" id="J_Province_1" value="1"><input type="hidden" name="province_id" value="1033"><input type="hidden" name="province_name" value="台湾"> ' +
        '<label for="J_Province_1">台湾</label> <span class="check_num"></span><i class="fa fa-angle-down"></i> ' +
        '<div class="ncsc-citys-sub"><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4277"><input type="hidden" name="city_name" value="台北市"> <label for="J_City_36">台北市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4278"><input type="hidden" name="city_name" value="高雄市"> <label for="J_City_36">高雄市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4279"><input type="hidden" name="city_name" value="新竹市"> <label for="J_City_36">新竹市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4280"><input type="hidden" name="city_name" value="台中市"> <label for="J_City_36">台中市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4281"><input type="hidden" name="city_name" value="嘉义市"> <label for="J_City_36">嘉义市</label> </span><span class="areas"> <input type="checkbox" class="J_City" id="J_City_36" value="36"><input type="hidden" name="city_id" value="4282"><input type="hidden" name="city_name" value="台南市"> <label for="J_City_36">台南市</label> </span>' +
        ' <p class="tr hr8"><a href="javascript:void(0);" class="ncbtn-mini ncbtn-bittersweet close_button">关闭</a></p> </div></span> </div></dd></dl></li>' +
        '</ul></div>',
        success:function(){
        	//console.log(this_area_id)
        	$("#J_CityList").find("input[type=checkbox]").each(function(){
        		now_n_val = $(this).next().val();
        		if($.inArray(now_n_val,this_area_id)!=-1){
        			//console.log($(this).next().val())
        			$(this).attr('checked',true);
        		}
        	})
        	$("#J_CityList").find("input.J_Province").each(function(){
        		var i = 0;
        		$(this).parents(".ncsc-province-tab").find(".ncsc-citys-sub").find("span.areas").each(function(){
        			if($.inArray($(this).find("input[name=city_id]").val(),this_area_id)!=-1){
        				i++;
        			}
        		})
        		if(i>0){
        			$(this).siblings(".check_num").text('('+i+')');
        		}

        	})
        	now_area = [];
        	$('#J_CityList').find('input.J_City').each(function(){
        		var city_val = $(this).next().val();
        		if($.inArray(city_val, area_id)!=-1){
        			$(this).parents("dl.ncsc-region").find("input.J_Group").attr("disabled",true);
        			$(this).parents(".ncsc-province-tab").find("input.J_Province").attr("disabled",true);
        			$(this).attr("disabled",true);
        		}else{
        			$(this).attr("disabled",false);
        		}

        	})

            //展开
            $(".ncsc-province i.fa").click(function(){
                var par= $(this).parents(".ncsc-province");
                if(par.hasClass("showCityPop")){
                    par.removeClass('showCityPop')
                }else {
                    par.addClass("showCityPop")
                }
            })
            //关闭
            $(".close_button").click(function(){
                var par= $(this).parents(".ncsc-province");
                par.removeClass('showCityPop')
            })
            //全选
            $("input.J_Group").click(function(){

            	//console.log(now_area)
                if($(this).is(":checked")){
                    $(this).parents(".ncsc-region").find('.ncsc-province-list').find("input[type=checkbox]").prop('checked',true);
                    $(this).parents(".ncsc-region").find('.ncsc-province').each(function(){
                    	var num = $(this).find(".ncsc-citys-sub").find("span").size();
                    	$(this).find(".check_num").text('('+num+')');
                    })
                }else{
                    $(this).parents(".ncsc-region").find('.ncsc-province-list').find("input[type=checkbox]").prop('checked',false);
                    $(this).parents(".ncsc-region").find('.ncsc-province').each(function(){
                    	$(this).find(".check_num").text('');
                    })
                }
            })
            //全选
            $("input.J_Province").click(function(){
                if($(this).is(":checked")){
                    $(this).parents(".ncsc-province").find('.ncsc-citys-sub').find("input[type=checkbox]").prop('checked',true);
                    var num = $(this).parents(".ncsc-province-tab").find(".ncsc-citys-sub").find("span").size();
                    $(this).parents(".ncsc-province-tab").find(".check_num").text('('+num+')');
                }else{
                    $(this).parents(".ncsc-province").find('.ncsc-citys-sub').find("input[type=checkbox]").prop('checked',false);
                    $(this).parents(".ncsc-province-tab").find(".check_num").text('');
                }
            })
            //单选
            $("input.J_City").click(function(){
               var num = 0;
               var j=0;
                	$(this).parents(".ncsc-citys-sub").find("span.areas").each(function(){
                		j++;
                		if($(this).find("input.J_City").is(":checked")){
                			num++;
                		}
                	})
                	if(num==j){
                		$(this).parents(".ncsc-province-tab").find("input.J_Province").prop('checked',true);
                	}else{
                		$(this).parents(".ncsc-province-tab").find("input.J_Province").prop('checked',false);
                	}
                	if(num>0){
                		$(this).parents(".ncsc-province-tab").find(".check_num").text('('+num+')');
                	}else{
                		$(this).parents(".ncsc-province-tab").find(".check_num").text('');
                	}

            })

        },
        yes:function(index){
        	var item_id = new Array();
        	var item_name = new Array();
        	var tt = $("#J_CityList").children("li");

    		tt.each(function(){
    			var flag = true
    			tt_val = $(this).find(".ncsc-province");
    			tt_val.each(function(){
    				if($(this).find("input.J_Province").is(":checked")==false){
    					flag = false;
    				}
    			})
    			if(flag){
    				item_id.push($(this).find("input[name=group_name]").val());
    			}
    		})
        	$("input.J_Province").each(function(){

        		if($(this).is(":checked")){
        			item_id.push($(this).next().val());
    				item_name.push($(this).next().next().val());
    				$(this).parents(".ncsc-province").find(".ncsc-citys-sub").find("span.areas").each(function(){
    					item_id.push($(this).find("input[name=city_id]").val());
    				})
        		}else{
        			$(this).parents("span.ncsc-province-tab").find(".ncsc-citys-sub").find("input[type=checkbox]").each(function(){
        				if($(this).is(":checked")){
        					item_id.push($(this).next().val());
            				item_name.push($(this).next().next().val());
        				}
        			})
        		}
        	})
        	if(item_id.length>0){
        		id = item_id.join(',');
            	name = item_name.join(',');
            	obj.parents("tr").find("td.cell-area").find("p").text(name);
            	obj.parents("tr").find("td.cell-area").find("input.select_area_name").val(name);
            	obj.parents("tr").find("td.cell-area").find("input.select_area_id").val(id);
            	layer.close(index);
            	$('.tbl-attach').find('span[error_type="area"]').hide();
        	}else{
        		layer.msg('请选择至少一个地区');
        		return false;
        	}

        },no:function(){}
    });
}
$(function(){
	$(".select2").select2();
    //为指定地区城市设置运费
    var epa_id_length = $('input.epa_id').size();
    var index_table = 0;
    if(epa_id_length>0){
    	epa_id_length = epa_id_length-1;
    	index_table = $('input.epa_id').eq(epa_id_length).val();
    }
    //console.log(index_table)
    $(".tbl-attach .J_AddRule").click(function(){

    	index_table++;
        var str='<tr class="bd-line text-c">' +
                '<td class="cell-area" style="padding-left:5px">' +
                '<span class="area-group"><input class="J_BatchField" style="width:15px; display:none" type="checkbox" value="" name="kd_n1"> ' +
                '<p style="display:inline-block">未添加地区</p> </span><input type="hidden" value="" class="select_area_name" name="area_name['+index_table+']"> <input type="hidden" value="" class="select_area_id" name="area['+index_table+']"> </td>' +
                ' <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="1"  name="first_w['+index_table+']" onblur="valid()" data-field="postage"> </td> ' +
                '<td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value="" name="first_f['+index_table+']" onblur="valid()" data-field="postage"> ' +
                '<em class="add-on"><i class="fa fa-rmb"></i></em> </td> <td> <input class="w50 text" type="number" maxlength="4" autocomplete="off"  value="1"  name="last_w['+index_table+']" onblur="valid()" data-field="postage"> </td> ' +
                '<td> <input class="w50 mr5 text" type="number" maxlength="6" autocomplete="off" value=""  name="last_f['+index_table+']" onblur="valid()" data-field="postage"> <em class="add-on"> <i class="fa fa-rmb"></i> </em> </td> ' +
                '<td> <input class="w50 text" type="number" maxlength="4" autocomplete="off" value="0"  name="no_fee['+index_table+']" onblur="valid()" data-null="no_fee" data-field="postage"> </td> ' +
                '<td class="nscs-table-handle"> <span> <a class="btn red btn-del btn-grapefruit J_DeleteRule_'+index_table+'" title="删除" onclick="del_area(this)" href="JavaScript:void(0);"> <i class="fa fa-trash"></i>  </a> </span>' +
                ' <span> <a class="btn green btn-bluejeans_'+index_table+'" onclick="edit_area(this)"  title="编辑运送区域" href="JavaScript:void(0);"> <i class="fa fa-edit"></i> </a> </span> </td> </tr>'
        $(".ncsc-table-style").append(str);
        //批量操作
       $("a.J_ToggleBatch").show();

        //全选
        $(".J_BatchCheck").click(function(){
            if($(this).is(":checked")){
                $(".area-group .J_BatchField").prop('checked',true);
            }else{
                $(".area-group .J_BatchField").prop('checked',false);
            }
        })
        //取消全选
        $(".area-group .J_BatchField").click(function(){
            if(!$(this).is(":checked")){
                $(".J_BatchCheck").prop('checked',false);
            }
        })
        //删除
        /*$(".J_DeleteRule_"+index_table).on("click",function(){
        	obj = $(".J_DeleteRule_"+index_table);
        	del_area(obj);
        })
        //编辑
        $(".btn-bluejeans_"+index_table).click(function(){
        	var obj = $(".btn-bluejeans_"+index_table);
        	edit_area(obj);
        })*/
    })
    //批量操作  取消批量
    $("a.J_ToggleBatch").click(function(){
        if($(this).parents(".entity").find('.J_BatchField').eq(0).is(":hidden")){
            $(".batch").show();
            $(".area-group .J_BatchField").show();
            $(this).text("取消批量");
        }else{
            $(".batch").hide();
            $(".area-group .J_BatchField").hide();
            $(this).text("批量操作");
        }
    })
    //批量删除
    $('.J_BatchDel').on("click",function(){
        layer.confirm('<div class="pd-5 text-c"><i class="fa fa-warning c-orange" style="margin-right: 10px;font-size: 30px"></i>确认删除吗?</div>', {
            title:'<b>提示信息</b>',
            btn: ['确定','取消'] //按钮
        });
    })
    //批量设置
    $(".J_BatchSet").on("click",function(){
        layer.open({
            type: 1,
            title: '<b>批量操作</b>',
            skin: 'layui-layer-rim', //加上边框
            btn:["确定","取消"],
            area: ['400px', '150px'], //宽高
            content: '<div class="pd-10 text-c lh-30">运费：<input class="w60 text" type="text" maxlength="6" autocomplete="off" value="0.00" name="express_postage" data-field="postage">' +
            '<em class="add-on"> <i class="fa fa-rmb"></i> </em></div>'
        });
    })
})

$('#submit_tpl').click(function(){
	SpecialMessage = '';
	SpecialMessage += "<span  error_type=\"area\" class=\"msg J_Message\" style=\"display:none\"><i class=\"fa fa-exclamation-circle\"><\/i>指定地区城市为空或指定错误<\/span>\n";
	SpecialMessage += "<span error_type=\"postage\" class=\"msg J_Message\" style=\"display:none\"><i class=\"fa fa-exclamation-circle\"><\/i>运费应输入0.00至999.99的数字<\/span>\n";
	$('.J_SpecialMessage').html(SpecialMessage);
	isSubmit = true;
	//首件跟续件由于有默认值，鼠标离开也有默认值，这里只需判断首费与续费即可

	//首费JS空判断-------------------------------
	//只判断已显示的，即只判断EMS、平邮、快递中已选择的内容
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('.tbl-except').find('input[data-field="postage"]').each(function(){
			if ($(this).val()=='' && ($(this).attr('data-null')!='no_fee')){
				$(this).addClass('input-error');isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="postage"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="postage"]').hide();
		}
	}
	//地区JS空判断-------------------------------
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('div[data-delivery="kd"]').find('input[type="hidden"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error'); isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="area"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="area"]').hide();
		}
	}
	//售卖区域名称校验
	var isCheck = true;
	if ($('#title').val()==''){
		isCheck = false;
		$('p[error_type="title"]').css('display','block');
		$('p[error_type="title_check"]').css('display','none');
	}else{
		var name = $('#title').val();
		var transport_id = $('#transport_id').val();
		$('p[error_type="title"]').css('display','none');
	    $.ajax({
			type: "post",
	        url: "check_express_name",
	        async :false,
	        data: {name:name,transport_id:transport_id},
	        dataType: "json",
	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
	        			$('p[error_type="title_check"]').css('display','none');
	        			isCheck = true;
	        		}else{
	        			$('p[error_type="title_check"]').css('display','');
	        			isCheck = false;
	        		}
	        },
		})

	}
	if(!isCheck){
		isSubmit = false;
	}
	if($("tr.bd-line").size()==0){
		$('.tbl-attach').find('span[error_type="area"]').show();
		isSubmit = false;
	}
	if($("#express_code").val()==''){
		$("#express_code").siblings('span.err').show();
		isSubmit = false;
	}else{
		$("#express_code").siblings('span.err').hide();
	}
	if (isSubmit == true){
		var form_data = $("#tpl_form").serialize();
		$("#submit_tpl").attr("disabled",true);
		$("#submit_tpl").css("background-color","#ccc");
		 $.ajax({
				type: "post",
		        url: "mall_express_area_submit",
		        data: form_data,
		        dataType: "json",
		        beforeSend:function(){
    				layer.msg('数据提交中...',{icon:1});
    			},
		        success: function(data){
		        	$("#submit_tpl").attr("disabled",false);
		        	$("#submit_tpl").css("background-color","#48CFAE");
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
                        window.location.href = 'mall_express_tools';
                        layer.msg(data.msg,{icon:1})
                    }else{
                        layer.msg(data.msg,{icon:2})
                    }
		        }
			})

	}else{
		return false;
	}
})
/*仓库，快递改变判断为空*/
function code_change(code){
	if($(code).val()==''){
		$(code).siblings('span.err').show();
	}else{
		$(code).siblings('span.err').hide();
	}
}
/**/
function check_name(){
	var name = $('#title').val();
	var transport_id = $('#transport_id').val();
	return $.ajax({
		type: "post",
        url: "check_express_name",
        data: {name:name,transport_id:transport_id},
        dataType: "json",
        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
        			$('p[error_type="title"]').css('display','none');
        		    return true;
        		}else{
        			$('p[error_type="title"]').css('display','');
        			return false;
        		}
        },
	})
}

/*配送信息费用不能为空判断*/
function valid(){
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('.tbl-except').find('input[data-field="postage"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error');isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="postage"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="postage"]').hide();
		}
	}
}
/*配送地区不能为空判断*/
function validate(){
	if($('.tbl-except').find('.cell-area').html() != null){
		isShowError = false;
		$('div[data-delivery="kd"]').find('input[type="hidden"]').each(function(){
			if ($(this).val()==''){
				$(this).addClass('input-error'); isShowError = true; isSubmit = false;return false;
			}
		});

		if (isShowError){
			$('.tbl-attach').find('span[error_type="area"]').show();
		}else{
			$('.tbl-attach').find('span[error_type="area"]').hide();
		}
	}
}

$('#title').on('change',function(){
	if ($(this).val()!=''){
		      $('p[error_type="title"]').css('display','none');
			}
})
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
