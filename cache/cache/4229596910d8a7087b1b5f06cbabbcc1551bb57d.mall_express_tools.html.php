<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:51:08
  from "D:\www\yunjuke\application\pay\views\mall_express_tools.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d6ffc5e9814_67180545',
  'file_dependency' => 
  array (
    '4229596910d8a7087b1b5f06cbabbcc1551bb57d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express_tools.html',
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
function content_598d6ffc5e9814_67180545 ($_smarty_tpl) {
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
<style>
	.sign{width: 20px;height: 20px;margin: 0 10px;}
	.sign  .ico-check{
		background: url(http://[::1]/yunjuke/application/pay/views/images/flexigrid_pic.png) no-repeat 0 0;
		display: inline-block;
		width: 20px;
		height: 20px;
		cursor: pointer;
		vertical-align: middle;
	}
	i.fa {
    	margin-top: -2px;
	}
	tr.trSelected .sign  .ico-check{  background-position: -20px 0;}
	.ncsc-default-table thead th { font-weight:normal;line-height: 20px; color: #555; background-color: #F5F5F5; text-align:center; height: 20px; padding: 8px 0; border-bottom: solid 1px #c8c8c8;border-top: 1px solid #c8c8c8 }
	.order tbody tr td.sep-row2{height: auto;padding:8px 0;border-bottom: 1px solid #c8c8c8;background-color: #f5f5f5}
	.tDiv2 {
		font-size: 0;
		float: left;
		overflow: hidden;
		padding-left: 20px;;
	}
	.fbutton {
		vertical-align: top;
		letter-spacing: normal;
		display: inline-block;
		padding-right: 8px;
		margin-left: 8px;
		margin-right: -1px;
		border-right: dotted 1px #D7D7D7;
		cursor: pointer;
	}
	.fbutton div {
		font-size: 12px;
		line-height: 20px;
		color: #999;
		background-color: #FFFFFF;
		height: 20px;
		padding: 2px 7px;
		border: solid 1px #F0F0F0;
		border-radius: 4px;
	}
	.order tbody tr td.bdl{border-right: 1px solid #E6E6E6;vertical-align: middle}
	#explanation li a {
		text-decoration: underline;
		color: #f37b1d;
	}
	a:hover{
		border-color:rgb(79, 214, 190);
		color:#333;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>运费管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
	<div class="page-container">
		<div id="tab_demo" class="HuiTab">
			<div class="tabBar clearfix">
				<a href="mall_express_tools"><span>运费管理</span></a>
				<a href="mall_express"><span>物流公司</span></a>
				<a href="mall_waybill"><span>运单模板</span></a>
			</div>
		</div>
		<table class="table table-border table-bordered table-hover table-bg table-content mt-20">
			<thead>
			<tr>
				<th class="w20">
					<div class="sign all" onclick="sign_select(this)"><i class="ico-check"></i></div>
				</th>
				<th class="cell-area tl">运送到</th>
				<th class="w120">首(重)</th>
				<th class="w80">首费(元)</th>
				<th class="w120">续(重)</th>
				<th class="w80">续费(元)</th>
			</tr>
			</thead>
									<tbody>
			<tr>
				<th colspan="20" >顺丰快递					(快递公司：shunfeng-顺丰快递)
									<span class="fr mr5">
        <time title="最后编辑时间"><i class="icon-time"></i>2017-07-26 20:51:46</time>
         <a class="J_Modify btn btn-primary radius size-MINI" href="javascript:void(0)" onclick="edit_info(this)" data-id="{'ept_id':'20','ept_name':'\u987a\u4e30\u5feb\u9012','express_code':'shunfeng','express_name':'\u987a\u4e30\u5feb\u9012','add_time':'2017-07-26 20:51:46','sort':'1','type':'2','default':'0','express_info':[{'eptaf_id':'36','first_nums':'1','first_fee':'10.00','loan_nums':'1','loan_fee':'5.00','free_fee_num':'0.00','area_name':'\u5317\u4eac,\u5929\u6d25,\u6cb3\u5317\u7701,\u5c71\u897f\u7701,\u5185\u8499\u53e4\u533a,\u4e0a\u6d77,\u6d59\u6c5f\u7701,\u6c5f\u82cf\u7701,\u5c71\u4e1c\u7701,\u5b89\u5fbd\u7701,\u798f\u5efa\u7701,\u6c5f\u897f\u7701,\u91cd\u5e86,\u56db\u5ddd\u7701,\u8d35\u5dde\u7701,\u4e91\u5357\u7701,\u897f\u85cf\u533a,\u5e7f\u4e1c\u7701,\u6d77\u5357\u7701,\u5e7f\u897f\u533a,\u6cb3\u5357\u7701,\u6e56\u5317\u7701,\u6e56\u5357\u7701,\u8fbd\u5b81\u7701,\u5409\u6797\u7701,\u9ed1\u9f99\u6c5f\u7701,\u9655\u897f\u7701,\u7518\u8083\u7701','area_id':'1000,1368,1002,1370,1007,1120,1121,1122,1123,1124,1125,1126,1127,1128,1129,1130,1008,1276,1277,1278,1279,1280,1281,1282,1283,1284,1285,1286,1030,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1001,1369,1004,1353,1354,1355,1356,1357,1358,1359,1360,1361,1362,1363,1006,1197,1198,1199,1200,1201,1202,1203,1204,1205,1206,1207,1208,1209,4314,4315,1014,1259,1260,1261,1262,1263,1264,1265,1266,1267,1268,1269,1270,1271,1272,1273,1274,1275,1015,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1045,1046,1047,1048,1049,1050,4313,1016,1051,1052,1053,1054,1055,1056,1057,1058,1059,1020,1210,1211,1212,1213,1214,1215,1216,1217,1218,1219,1220,4324,1003,1371,1009,1297,1298,1299,1300,1301,1302,1303,1304,1305,1306,1307,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,1021,1109,1110,1111,1112,1113,1114,1115,1116,1117,1022,1337,1338,1339,1340,1341,1342,1343,1344,1345,1346,1347,1348,1349,1350,1351,1352,4334,4336,4337,4339,1029,1318,1319,1320,1321,1322,1323,1324,1005,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1019,1118,1119,1375,1376,1377,1378,1379,1380,1381,1382,1383,1384,1385,1386,1387,1388,1389,1390,3306,4335,1025,1095,1096,1097,1098,1099,1100,1101,1102,1103,1104,1105,1106,1107,1108,1010,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,1143,1144,1145,1146,1147,1391,1017,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,1173,1392,1393,1394,1395,4310,1018,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,1184,1185,1186,1187,1011,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,1234,1012,1188,1189,1190,1191,1192,1193,1194,1195,1196,1013,1148,1149,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1023,1288,1289,1290,1291,1292,1293,1294,1295,1296,4291,4340,1024,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,4012,4013','count':3},{'eptaf_id':'37','first_nums':'1','first_fee':'15.00','loan_nums':'1','loan_fee':'5.00','free_fee_num':'0.00','area_name':'\u5b81\u590f\u533a,\u9752\u6d77\u7701,\u65b0\u7586\u533a','area_id':'1026,1247,1248,1249,1250,4268,1027,1251,1252,1253,1254,1255,1256,1257,1258,1028,1325,1326,1327,1328,1329,1330,1331,1332,1333,1334,1335,1336,1364,1365,1366,1367,4302,4338','count':0},{'eptaf_id':'38','first_nums':'1','first_fee':'50.00','loan_nums':'1','loan_fee':'5.00','free_fee_num':'0.00','area_name':'\u9999\u6e2f,\u6fb3\u95e8,\u53f0\u6e7e','area_id':'1031,1372,1032,1373,1033,4277,4278,4279,4280,4281,4282','count':0}]}"><i class="fa fa-edit"></i>修改</a>
          <a class="J_Delete btn btn-danger radius size-MINI" href="javascript:void(0)" onclick="del_info('20')" data-id="20" ><i class="fa fa-trash"></i>删除</a></span></th>
			</tr>
									<tr>
				<td rowspan='3' class="bdl"><a class="sign" onclick="sign_select(this)"><i class="ico-check"></i></a></td>				<td class="cell-area tl">北京,天津,河北省,山西省,内蒙古区,上海,浙江省,江苏省,山东省,安徽省,福建省,江西省,重庆,四川省,贵州省,云南省,西藏区,广东省,海南省,广西区,河南省,湖北省,湖南省,辽宁省,吉林省,黑龙江省,陕西省,甘肃省</td>
				<td>1</td>
				<td>10.00</td>
				<td>1</td>
				<td>5.00</td>
			</tr>
						<tr>
								<td class="cell-area tl">宁夏区,青海省,新疆区</td>
				<td>1</td>
				<td>15.00</td>
				<td>1</td>
				<td>5.00</td>
			</tr>
						<tr>
								<td class="cell-area tl">香港,澳门,台湾</td>
				<td>1</td>
				<td>50.00</td>
				<td>1</td>
				<td>5.00</td>
			</tr>
									</tbody>
								</table>
	</div>
<div class="flexigrid">
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup-left">每页最多显示
				<select class="select prp" onchange="change_page()" name="rp">
					<option value="10" selected="selected">10&nbsp;&nbsp;</option>
					<option value="20" >20&nbsp;&nbsp;</option>
					<option value="25" >25&nbsp;&nbsp;</option>
					<option value="40" >40&nbsp;&nbsp;</option>
				</select>条
			</div>
			<div class="pGroup-middle">
				<div class="pFirst pButton" onclick="load_page_one()" title="最前页">
					<i class="fa fa-fast-backward"></i>
				</div>
				<div class="pPrev pButton" onclick="load_page_prev()" title="前一页">
					<i class="fa fa-backward"></i>
				</div> <span class="pcontrol">
              <input type="number" style="width:40px;" size="4" onkeypress="if (event.keyCode == 13)change_sel();" name="page" class="pcur" value="1" title="输入要跳转的页码并回车"> / <span class="ptotal page_total">1</span>页</span>
				<div class="pNext pButton" onclick="load_page_next()" title="下一页"><i class="fa fa-forward"></i></div>
				<div class="pLast pButton" onclick="load_page_last()" title="最后页"><i class="fa fa-fast-forward"></i></div>
			</div>
			<div class="pPageStat"></div>
			<div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">1</span>条记录，
                              当前页：<span class="pfrom">1</span>-<span class="pto">1</span>条</span>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>

</div>
</body>
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
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","0");
	
    $('#searchBtn').click(function(){
        var search_data = $("#formSearch").serialize();
        page_to(parseInt($('select[name=rp]').val()),1,search_data);
    })
    $(".select2").select2();
    //选择每页页数
    function change_page(){
        var rp_val = parseInt($('select[name=rp]').val());
        //console.log(rp_val)
        page_to(rp_val,1);
    }
    //到第一页
    function load_page_one(){
        var rp_val = parseInt($('select[name=rp]').val());
        var cur_page = parseInt($('input[name=page]').val());
        if(cur_page==1){
            layer.msg('已经是第一页了');return false;
        }else{
            page_to(rp_val,1);
        }
    }
    //上一页
    function load_page_prev(){
        var rp_val = parseInt($('select[name=rp]').val());
        var cur_page = parseInt($('input[name=page]').val());
        if(cur_page==1){
            layer.msg('已经是第一页了');return false;
        }else{
            cur_page -=1;
            page_to(rp_val,cur_page);
        }
    }
    //下一页
    function load_page_next(){
        var rp_val = parseInt($('select[name=rp]').val());
        var cur_page = parseInt($('input[name=page]').val());
        //console.log(cur_page)
        var page_total = parseInt($('span.page_total').text());
        if(cur_page==page_total){
            layer.msg('已经是最后一页了');return false;
        }else{

            cur_page = cur_page+1;
            //console.log(cur_page)
            page_to(rp_val,cur_page);
        }
    }
    //最后一页
    function load_page_last(){
        var rp_val = parseInt($('select[name=rp]').val());
        var cur_page = parseInt($('input[name=page]').val());
        var page_total = parseInt($('span.page_total').text());
        if(cur_page==page_total){
            layer.msg('已经是最后一页了');return false;
        }else{
            page_to(rp_val,page_total);
        }
    }

    //选择每页页数
    function change_sel(){
        var rp_val = parseInt($('select[name=rp]').val());
        var cur_page = parseInt($('input[name=page]').val());
        var page_total = parseInt($('span.page_total').text());
        if(cur_page>page_total){
            page_to(rp_val,page_total);
        }else if(cur_page<1){
            page_to(rp_val,1);
        }else{
            page_to(rp_val,cur_page);
        }
    }
    //删除
    function del_info(transport_id){
        layer.confirm('确认删除这条数据吗?', {
            title:'<b>提示信息</b>',
            btn: ['确定','取消'] //按钮
        },function(){
            $.ajax({
                type: "post",
                url: "mall_express_tools_del",
                data: {id:transport_id},
                dataType: "json",
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state){
                        layer.msg(data.msg,{icon:1});
                        var rp_val = parseInt($('select[name=rp]').val());
                        var cur_page = parseInt($('input[name=page]').val());
                        page_to(rp_val,cur_page);
                    }else{
                        layer.msg(data.msg,{icon:2})
                    }
                    location.replace(location.href);
                }
            })
        });
    }
    function page_to(rp_val,cur_page,search_data){
        $.ajax({
            type: "post",
            url: "mall_express_tools?op=change&"+search_data,
            data: {rp:rp_val,page:cur_page},
            dataType: "json",
            beforeSend:function(){
                layer.msg('正在刷新请稍等',{icon:1});
            },
            success: function(data){
                total = data.total;page = data.page;rp = data.rp;this_total = data.this_total;
                this_page = data.this_page;page_total = data.page_total;
                $('span.total').text(total);
                $('#data-total-num').text(total);
                $('span.pfrom').text(this_page);
                $('span.pto').text(this_total);
                $("input[name=page]").val(page);
                $("span.page_total").text(page_total);
                str = '<thead><tr><th class="w20"><div class="sign all" onclick="sign_select(this)"><i class="ico-check"></i></div>'+
                    '</th><th class="cell-area tl">运送到</th><th class="w120">首(件、重)</th><th class="w80">首费(元)</th>'+
                    '<th class="w120">续(件、重)</th><th class="w80">续费(元)</th></tr>'+
                    '</thead>';
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    data = data.data;
                    $.each(data,function(key,val){
                        str +='<tbody><tr><th colspan="20"><h3>'+val.ept_name+
                            '(快递公司：'+val.express_code+'-'+val.express_name+')</h3><span class="fr mr5">'+
                            '<time title="最后编辑时间"><i class="icon-time"></i>'+val.add_time+'</time>'+
                            '<a class="J_Modify btn btn-primary radius size-MINI" href="javascript:void(0)" onclick="edit_info(this)" data-id="'+val.data+'"><i class="fa fa-edit"></i>修改</a>'+
                            '<a class="J_Delete btn btn-danger radius size-MINI" href="javascript:void(0)" onclick=del_info("'+val.ept_id+'") data-id="'+val.ept_id+'"><i class="fa fa-trash"></i>删除</a></span></th></tr>';

                        var size = Object.keys(val.express_info);
                        if(size.length>0){
                            $.each(val.express_info,function(k,v){
                                if(v.count>0){
                                    str +='<td rowspan="'+v.count+'" class="bdl"><a class="sign" onclick="sign_select(this)"><i class="ico-check"></i></a></td>';
                                }
                                str +='<td class="cell-area tl">'+v.area_name+'</td>'+
                                    '<td>'+v.first_nums+'</td>'+'<td>'+v.first_fee+'</td>'+'<td>'+
                                    v.loan_nums+'</td>'+'<td>'+v.loan_fee+'</td></tr>';
                            })
                        }
                        str +='</tbody>';
                    })
                    $("table.ncsc-default-table").html(str);
                }else{
                    str +='<tbody><tr><td colspan="20"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    $("table.ncsc-default-table").html(str);
                }
            }
        })
    }
    function edit_info(obj){
        data = $(obj).attr('data-id');
        var form = $("<form></form>");
        form.attr('action','mall_express_area_add');
        form.attr('method','post');
        input1 = $("<input type='hidden' name='data' />");
        input1.attr('value',data);
        form.append(input1);
        form.appendTo("body");
        form.css('display','none');
        form.submit();
    }

    //标记数据
    function sign_select(obj){

        if($(obj).parents("tr").hasClass('trSelected')){
            if($(obj).hasClass("all")){
                $(".sign").parents("tr").removeClass("trSelected")
            }else{
                $(obj).parents("tr").removeClass("trSelected")
            }
        }else{
            if($(obj).hasClass("all")){
                $(".sign").parents("tr").addClass("trSelected")
            }else{
                $(obj).parents("tr").addClass("trSelected")
            }
        }
    }

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
