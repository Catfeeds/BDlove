<?php
/* Smarty version 3.1.29, created on 2017-08-14 17:15:22
  from "D:\www\yunjuke\application\pay\views\freetag_manage.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59916a2a03bdb9_18276378',
  'file_dependency' => 
  array (
    'd5684ae3f25d5f8d455ca555382ccff152f9c1f4' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\freetag_manage.html',
      1 => 1502702114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_59916a2a03bdb9_18276378 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3149559916a29e84189_65520054';
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui/css/H-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/style.css" />
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/iconfont.css" />
		<title>自定义标签</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			.recharge-content {
				border: 1px solid #ccc;
				padding: 15px;
			}
			
			.cl-b {
				color: #009dd9;
			}
			
			.cl-g {
				color: #44b549
			}
			
			.cl-o {
				color: #f90;
			}
			
			.first {
				display: block;
				width: 10px;
				cursor: pointer;
			}
			a:hover{
				color: #333;
			}
			 .select-res span,.select-res2 span {
				display: inline-block;
				width:180px;
				height:14px;
				line-height:14px;
				padding:7px 15px 7px 5px;
				border:solid 1px #c0c0c0;
				background:url(images/select_box_bg.gif) no-repeat 190px center;
				cursor: pointer;
				color:#c2c2c2;
				text-overflow:ellipsis;
				white-space:nowrap;
				overflow:hidden;
			}
			.select-res p ,.select-res2 p {
				position:relative;
				width: 200px;
				height:28px;
				line-height:28px;
				border-bottom:dashed 1px #c0c0c0;
				padding:0 5px;
				text-overflow:ellipsis;
				white-space:nowrap;
				overflow:hidden;
				padding-right:20px;
			}
			.select-res a,.select-res2 a {
				position:absolute;
				top:0;
				right:0;
				display: block;
				width:28px;
				height:28px;
				background:url(images/close_btn.jpg) no-repeat center;
				cursor:pointer;
			}
			.select-res input,.select-res2 input {
				width:172px;
				height:14px;
				line-height:14px;
				margin-left:4px;
				padding:7px 5px;
				border:solid 1px #c0c0c0;
				color:#2c2c2c;
			}
			.select-res span.selected,.select-res2 span.selected {
				color:#626262;
			}
			.select-box,.select-box2 {
				border: 1px solid #ccc;
				width:550px;
				height:220px;
				position:absolute;
				display:none;
				z-index:5;
				background: #fff;
				border-radius: 4px;
				padding: 0px 4px;
			}
			.select-box .close-btn,.select-box2 .close-btn {
				position:absolute;
				right:5px;
				top:5px;
				cursor: pointer;
			}
			.select-box .wrap,.select-box2 .wrap2 {
				height:200px;
				border:solid 1px #ddd;
				margin-top:5px;
			}
			.select-box ul,.select-box2 ul {
				float:left;
				width:178px;
				height:200px;
				overflow-y: scroll;
			}
			.select-box ul li,.select-box2 ul li {
				height:25px;
				line-height:25px;
				padding:0 10px;
				background: url(images/arr.gif) no-repeat 152px center;
				color:#626262;
				cursor: pointer;
			}
			.select-box ul li.selected,.select-box2 ul li.selected {
				background:url(images/arr_selected.gif) no-repeat 152px center #fd8340;
				color:#fff;
			}
		</style>
	</head>
	
	<div id="classit" style="display: none">
            <div class="select-res">
				<input type="text" id="show" name="gcs_ids" class=" mr-5 pd-5 mb-10" value="-全部分类-"/>
				<input type="hidden" id="show2" name="gc_id" class=" mr-5 pd-5 mb-10" value=""/>
            </div>
			<div class="select-box">
			<div class="wrap">
				<ul class="first"></ul>
				<ul class="second"></ul>
				<ul class="third"></ul>
			</div>
		</div>
	</div>
	<body>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span> 自定义标签管理
			<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<div class="page-container">
			<div id="tab_demo" class="HuiTab">
				<div class="tabBar clearfix"><a href="freetag"><span>标签管理</span></a><a href="javascript:;"><span>标签商品</span></a></div>
				<div class="recharge-content">
					<div class="tabCon">数据加载中...</div>
					<div class="tabCon">
						<table class="table table-border table-bordered table-hover table-bg table-content">
					        <thead>
					        <tr>
					            <th scope="col" colspan="13">商品列表</th>
					        </tr>
					        <tr class="text-c">
					            <th width=""><input type="checkbox"  value="" name="" onclick="content_checkAll(this)"></th>
					            <th width="">商品名称</th>
					            <th width="">所属标签</th>
					            <th width="">实际售价</th>
					            <th width="">条形码</th>
					            <th width="">创建时间</th>
					            <th width="">操作</th>
					        </tr>
					        <tr><th  colspan="11">
					            <span class="btn btn-success radius" id="alledit">批量编辑标签</span>
					        </th></tr>
					        </thead>
					        <tbody>
					        <tr>
					            <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
					        </tr>
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
		</div>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			<!--请在下方写此页面业务相关的脚本-->
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/H-ui/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">
				//	实现tab切换的源码
				jQuery.Huitab = function(tabBar, tabCon, class_name, tabEvent, i) {
					var $tab_menu = $(tabBar);
					// 初始化操作
					$tab_menu.removeClass(class_name);
					$(tabBar).eq(i).addClass(class_name);
					$(tabCon).hide();
					$(tabCon).eq(i).show();

					$tab_menu.bind(tabEvent, function() {
						$tab_menu.removeClass(class_name);
						$(this).addClass(class_name);
						var index = $tab_menu.index(this);
						$(tabCon).hide();
						$(tabCon).eq(index).show()
					})
				}
				$.Huitab("#tab_demo .tabBar span", "#tab_demo .tabCon", "current", "click", "1");

		$('#alledit').click(function(){
			layer.open({
				type: 1,
				btn: ['确认', '取消'],
				title: '<b>修改项商品的分类</b>',
				skin: 'layui-layer-rim', //加上边框n
				area: ['569px', '390px'], //宽高
				content: $('#classit'),
				success:function(){
				    setTimeout(function(){
				        $('.select-box').show();
				        fillData();
				    },200)
				},
				yes: function (index) {
				    if($('#show').val()==''){
				        layer.msg('请选择分类！');
				        return false;
				    }
				    layer.closeAll();
				},
				no: function(index){
				        	 
				    }
				});
		})
		
    $('#show', $('.select-res')).on('click', function() {
    	$('.select-box').show();
    	if (canClick) {
    		$('ul', $('.select-box')).html('');
    		fillData();
    		canClick = !1;
    	}
    	return false;
    });
    
var dataJson = {
	"option": [{
		"id": "1",
		"name": "户外玩具\/设施",
		"child": [{
			"id": "4",
			"name": "平衡木",
			"child": [{
				"id": "12",
				"name": "塑制平衡木"
			}, {
				"id": "13",
				"name": "木质平衡木"
			}, {
				"id": "14",
				"name": "独木桥"
			}, {
				"id": "15",
				"name": "平衡步道"
			}]
		}, {
			"id": "5",
			"name": "滑梯",
			"child": [{
				"id": "35",
				"name": "组合滑梯"
			}, {
				"id": "36",
				"name": "直筒滑梯"
			}, {
				"id": "37",
				"name": "旋转滑梯"
			}, {
				"id": "38",
				"name": "双排滑梯"
			}, {
				"id": "39",
				"name": "单排滑梯"
			}, {
				"id": "41",
				"name": "多功能滑梯"
			}, {
				"id": "42",
				"name": "木质滑梯"
			}]
		}, {
			"id": "6",
			"name": "蹦床",
			"child": [{
				"id": "58",
				"name": "护网蹦床"
			}, {
				"id": "59",
				"name": "折叠蹦床"
			}, {
				"id": "60",
				"name": "弹跳床"
			}, {
				"id": "61",
				"name": "城堡蹦床"
			}]
		}, {
			"id": "7",
			"name": "跷跷板",
			"child": [{
				"id": "74",
				"name": "双人跷跷板"
			}, {
				"id": "75",
				"name": "单人跷跷板"
			}, {
				"id": "76",
				"name": "摇马"
			}, {
				"id": "77",
				"name": "室外跷跷板"
			}, {
				"id": "78",
				"name": "弹簧跷跷板"
			}, {
				"id": "79",
				"name": "摇摇乐"
			}]
		}, {
			"id": "8",
			"name": "荡船",
			"child": [{
				"id": "90",
				"name": "彩棚荡船"
			}, {
				"id": "91",
				"name": "公鸡荡船"
			}, {
				"id": "92",
				"name": "秋千"
			}, {
				"id": "93",
				"name": "吊椅"
			}, {
				"id": "94",
				"name": "摇椅"
			}, {
				"id": "95",
				"name": "荡桥"
			}]
		}, {
			"id": "9",
			"name": "攀岩",
			"child": [{
				"id": "107",
				"name": "塑料攀岩"
			}, {
				"id": "108",
				"name": "爬山坡"
			}, {
				"id": "109",
				"name": "木质攀岩"
			}, {
				"id": "110",
				"name": "保险带"
			}, {
				"id": "111",
				"name": "攀岩石"
			}, {
				"id": "112",
				"name": "安全绳"
			}, {
				"id": "113",
				"name": "拖鞋儿童帐篷"
			}, {
				"id": "114",
				"name": "爬网攀岩架"
			}, {
				"id": "115",
				"name": "攀岩鞋"
			}, {
				"id": "116",
				"name": "充气攀岩"
			}]
		}, {
			"id": "10",
			"name": "淘气堡",
			"child": [{
				"id": "119",
				"name": "淘气堡玩具"
			}, {
				"id": "120",
				"name": "淘气堡配件"
			}, {
				"id": "121",
				"name": "充气城堡"
			}, {
				"id": "122",
				"name": "小型淘气堡"
			}]
		}, {
			"id": "11",
			"name": "其他玩具",
			"child": [{
				"id": "137",
				"name": "隧道"
			}, {
				"id": "138",
				"name": "钻洞"
			}, {
				"id": "139",
				"name": "轨道火车"
			}, {
				"id": "140",
				"name": "围栏"
			}, {
				"id": "141",
				"name": "垃圾桶"
			}, {
				"id": "142",
				"name": "滚筒"
			}, {
				"id": "143",
				"name": "木制设施"
			}]
		}]
	}, {
		"id": "2",
		"name": "室内玩具",
		"child": [{
			"id": "151",
			"name": "亲子玩具",
			"child": [{
				"id": "156",
				"name": "儿童健身器材"
			}, {
				"id": "157",
				"name": "高跷"
			}, {
				"id": "158",
				"name": "玩具球"
			}, {
				"id": "159",
				"name": "跨栏"
			}, {
				"id": "160",
				"name": "跳跳袋"
			}, {
				"id": "161",
				"name": "体能器材"
			}]
		}, {
			"id": "152",
			"name": "海洋球类",
			"child": [{
				"id": "162",
				"name": "海洋球帐篷"
			}, {
				"id": "163",
				"name": "澳乐海洋球"
			}, {
				"id": "164",
				"name": "儿童帐篷"
			}, {
				"id": "165",
				"name": "海洋球池"
			}, {
				"id": "1059",
				"name": "决明子沙池"
			}]
		}, {
			"id": "153",
			"name": "积木",
			"child": [{
				"id": "166",
				"name": "拼装积木"
			}, {
				"id": "167",
				"name": "星钻积木"
			}, {
				"id": "168",
				"name": "木质积木"
			}, {
				"id": "169",
				"name": "乐高积木"
			}, {
				"id": "170",
				"name": "电子积木"
			}, {
				"id": "171",
				"name": "拼图"
			}, {
				"id": "172",
				"name": "塑料积木"
			}, {
				"id": "173",
				"name": "启蒙积木"
			}, {
				"id": "1060",
				"name": "邦宝积木"
			}, {
				"id": "1061",
				"name": "LOZ积木"
			}, {
				"id": "1062",
				"name": "数字积木"
			}]
		}, {
			"id": "154",
			"name": "转椅",
			"child": [{
				"id": "174",
				"name": "三座转椅"
			}, {
				"id": "175",
				"name": "四座转椅"
			}, {
				"id": "176",
				"name": "六座转椅"
			}, {
				"id": "177",
				"name": "八座转椅"
			}, {
				"id": "178",
				"name": "十二座转椅"
			}, {
				"id": "179",
				"name": "蘑菇转椅"
			}, {
				"id": "180",
				"name": "旋转木马"
			}]
		}, {
			"id": "155",
			"name": "软体玩具",
			"child": [{
				"id": "184",
				"name": "软体积木"
			}, {
				"id": "185",
				"name": "软体长椅"
			}, {
				"id": "186",
				"name": "毛绒玩具"
			}]
		}, {
			"id": "1057",
			"name": "教学玩具",
			"child": [{
				"id": "1063",
				"name": "益智玩具"
			}, {
				"id": "1064",
				"name": "感官玩具"
			}, {
				"id": "1065",
				"name": "数学玩具"
			}, {
				"id": "1066",
				"name": "手眼协调"
			}, {
				"id": "1067",
				"name": "拼图玩具"
			}, {
				"id": "1068",
				"name": "其他玩具"
			}]
		}, {
			"id": "1058",
			"name": "区角器材",
			"child": [{
				"id": "1069",
				"name": "娃娃家"
			}, {
				"id": "1070",
				"name": "超市"
			}, {
				"id": "1071",
				"name": "医院"
			}, {
				"id": "1072",
				"name": "交通"
			}, {
				"id": "1073",
				"name": "邮局"
			}, {
				"id": "1074",
				"name": "厨房"
			}, {
				"id": "1075",
				"name": "创意区角"
			}]
		}]
	}]
}
var l1 = 0,
	l2 = 0;
var cname1, cname2, cname3;
var cid1, cid2, cid3;
var canClick = !0;
var canClose = !1;

$('.select-box').click(function(){
	return false;
})
$('span', $('.select-box')).on("click", function() {
	canClose ? $('.select-box').hide() : alert('请选择下级品类！');
	canClick = !0;
});

$('.select-res').on('click', 'a', function() {
	$(this).parent().remove();
	$('.select-box').css({
		top: $('.select-res').offset().top + $('.select-res').outerHeight(true)
	});
})

$('ul.first', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.second').html('');
	$('ul.third').html('');
	fillData($(this).index());
	l1 = $(this).index();
	cname1 = $(this).text();
	if(cname1.indexOf('*')>0){
		cname1 = cname1.split('*')[0];
	}
	cid1 = $(this).attr('val');
	canClose = !1;
});
//双击如果有*的话就选中
//$('ul.first', $('.select-box')).on('dblclick', 'li', function() {
//	if(flag!='all'){
//		$('#show').val(cname1);
//		$('#show2').val(cid1);
//		//$('.select-box').hide();
//		$('.select-box').css("display","none");
//	}else{
//		var patt = /\* */g;
//		if(patt.test($(this).html())){
//			$('#show').val(cname1);
//			$('#show2').val(cid1);
//			//$('.select-box').hide();
//			$('.select-box').css("display","none");
//		}
//	}
//	
//
//}); 
$('ul.second', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.third').html('');
	fillData(l1, $(this).index());
	l2 = $(this).index();
	cname2 = $(this).text();
	if(cname2.indexOf('*')>0){
		cname2 = cname2.split('*')[0];
	}
	cid2 = $(this).attr('val');
	canClose = !1;
});
//双击如果有*的话就选中
//$('ul.second', $('.select-box')).on('dblclick', 'li', function() {
//	if(flag!='all'){
//		$('#show').val(cname1 + '>' + cname2);
//		$('#show2').val(cid2);
//		//$('.select-box').hide();
//		$('.select-box').css("display","none");
//	}else{
//		var patt = /\* */g;
//		if(patt.test($(this).html())){
//			$('#show').val(cname1 + '>' + cname2);
//			$('#show2').val(cid2);
//			//$('.select-box').hide();
//			$('.select-box').css("display","none");
//		}
//	}
//	
//});

//点击三级的时候,传入数据cname1 + '>' + cname2 + '>' + cname3
$('ul.third', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	cname3 = $(this).text();
	cid3 = $(this).attr('val');
	canClose = !0;
	var hasExist = !1;
	$('.select-res').find("p").each(function() {
		if ($(this).text().split(' > ')[2] == cname3) hasExist = !0;
	})
	$('#show').val(cname1 + '>' + cname2 + '>' + cname3);
	//$('.select-box').hide();
	$('.select-box').css("display","none");
});
$('body').click(function(){
	$(".select-box").hide();
})

//填充级联数据

function fillData(l1, l2) {
	var temp_html = "";
	if (typeof(dataJson.option) != 'undefined' && arguments.length == 0 ) {
		$.each(dataJson.option, function(i, pro) {
		    temp_html += '<li val="' + pro.id + '" son="'+pro.son+'">' + pro.name + '</li>';
		});
	} else if (typeof(dataJson.option[l1].child) == 'undefined') {
		return false;
	}else if (typeof(dataJson.option[l1].child) != 'undefined' && arguments.length == 1) {
		console.log(typeof(dataJson.option[l1].child))
		$.each(dataJson.option[l1].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'">' + pro.name + '</li>';
		});
	} else if (typeof(dataJson.option[l1].child[l2].child) != 'undefined' && arguments.length == 2) {
		$.each(dataJson.option[l1].child[l2].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'">' + pro.name + '</li>';
		});
	}
	$('.select-box ul:eq(' + arguments.length + ')').html(temp_html);
	
}

			
		<?php echo '</script'; ?>
>
	</body>

</html><?php }
}
