<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:10:40
  from "D:\www\yunjuke\application\pay\views\stock_leading.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59843a10b1ea13_78527195',
  'file_dependency' => 
  array (
    'c2280668529d7899ab39dd2b423bd2dd4e0d6cec' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_leading.html',
      1 => 1501754115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59843a10b1ea13_78527195 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '764159843a109ab831_24580019';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.newtit{
	text-align: left !important;width: 100% !important;margin-left: 1% !important;
}
.newselect{
	width: 120px;
    margin: 0px 10px;
	margin-right: 20px !important;
	a:hover{
		color: #333;
	}
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span>导入库存<span class="c-gray en">&gt;</span>批量导入
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
			<i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page pt-20">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="javascript:;"><span>批量导入</span></a>
			<a href="stock_leading_less"><span>少量导入</span></a>
		</div>
	</div>
	<div class="fixed-bar">

	</div>
	  <!-- 操作说明 -->
  <div class="explanation mt-20" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    	<ul>
					<li>支持Excel数据文件格式：csv。</li>
					<li>1：按货号导入 <a target="_blank" href="<?php echo base_url();?>
/data/excel_tp/images/storeGoods.png">查看导入格式示例</a>或<a href="<?php echo base_url('admin.php');?>
/stores/storeGoods_tp">下载格式文件</a>。
					<li>2：按款号导入 <a target="_blank" href="<?php echo base_url();?>
/data/excel_tp/images/storeGoodsSku.png">查看导入格式示例</a>或<a href="<?php echo base_url('admin.php');?>
/stores/storeGoodsSku_tp">下载格式文件</a>。
					<li>3：按条形码导入 <a target="_blank" href="<?php echo base_url();?>
/data/excel_tp/images/storeGoodsBarcode.png">查看导入格式示例</a>或<a href="<?php echo base_url('admin.php');?>
/stores/storeGoodsBarcode_tp">下载格式文件</a>。
					</li>
				</ul>
  </div>
		
		<div class="ncap-form-default">
		    <dl class="row">
				<dt class="tit newtit" >
				<label>格式:</label> 
				<select class="newselect" id="waynewselect" onchange="select_change()">
	                <option value="0" selected="">请选择</option>
                    <option value="1">简单模式</option>
<!--                <option value="2">标准模式</option>
                    <option value="3">二维模式</option>
                    <option value="4">三维模式</option> -->
                    
				</select>
					
	             <label>模式:</label>
	             <select class="newselect" id="typenewselect">
 	                   <option value="9" selected="">请选择</option>
                       <option value="1">全盘</option>
                       <option value="0">局部</option>
                 </select>                                   
				</dt>
	
			</dl>
			<dl class="row" id="radiotype"style='display:none'>
				<dd class="opt" style="margin-left: 1% !important;" >
					导入方式: &nbsp;
					<input type="radio" id="qq_isuse_1" name="type" value="1" style="margin-left:10px;" checked="" >按货号导入商品库存
					<input type="radio" id="qq_isuse_0" name="type" value="2" style="margin-left:20px;">按款号导入商品库存
					<input type="radio" id="qq_isuse_0" name="type" value="3" style="margin-left:20px;">按条形码导入商品库存
				</dd>
			</dl>
			<dl class="row">
				<dd class="opt" style="margin-left: 1% !important">
					选择文件: &nbsp;&nbsp;&nbsp;&nbsp;
					<div class="input-file-show"> 
						<span class="show"> 
							<a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> 
						</span> 
						<span class="type-file-box">
						<form id="formType"  enctype="multipart/form-data"> 
							<input type="text" name="" id="textfield2" class="type-file-text"> 
							<input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> 
							<input class="type-file-file valid" id="import_excel" onchange="import_change()" name="file_" type="file" hidefocus="true">
						</form>
						</span>
					</div>
				</dd>
			</dl>
			
			<div class="bot" style="padding: 12px 0 10px 1.5%"><a href="JavaScript:;" <?php if (isset($_smarty_tpl->tpl_vars['is_delete']->value) && $_smarty_tpl->tpl_vars['is_delete']->value == 1) {?>style=" background-color: #E6E6E6 !important;border-color: #E6E6E6 !important;" disabled<?php }?> class="btn btn-success radius" id="submitBtn" >确认导入</a></div>
		</div>


</div>
<?php echo '<script'; ?>
>
	
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
	
var names = '';
function select_change(){
	if($("#waynewselect").val()==1){
        $("#radiotype").css("display","block");		
	}else{
		if( $("#radiotype").css("display")=="block"){
			$("#radiotype").css("display","none");	
		}
	}
}

function import_change(){
	  var form_data = new FormData($('#formType')[0]);
 		 $.ajax({
				type: "post",
		        url: "<?php echo base_url('admin.php');?>
/write_import/excel_upload",
		        data: form_data,
		        dataType: "json",
		        cache: false,
		        processData: false,
	            contentType: false,
		        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data['state'] == false){
						layer.alert(data['msg']);
					}else{
						names = data.name;
						$("#textfield2").val(data.name);
						layer.closeAll();
					}
		        }
			})
}

$("#submitBtn").on("click",function(){
	var flags = "<?php if (isset($_smarty_tpl->tpl_vars['is_delete']->value)) {
echo $_smarty_tpl->tpl_vars['is_delete']->value;
} else { ?>0<?php }?>";
	if(flags ==1){
		return false;
	}
	
	 if($("#waynewselect").val()==0){
		 layer.alert("请选择导入格式");
		 return false;
	 }
	 if($("#typenewselect").val()==9){
		 layer.alert("请选择导入模式");
		 return false;
	 }
	 if($("#textfield2").val()==''){
		 layer.alert("请上传导入文件");
		 return false;
	 }
	 var type = $("#typenewselect").val();
	 var url='';
	 if($("input[name='type']:checked").val()==1){
		 url = 'storeGoods_import';
	 }else if($("input[name='type']:checked").val()==2){
		 url ='storeGoodsSku_import';
	 }else{
		 url = 'storeGoodsBarcode_import';
	 }
	 
	 console.log(url+'?type='+type+'&name='+names)
		layer.open({
 			  type: 2,
 			  title: '导入明细',
				scrollbar:false,
				shade: 0.8,
 			  area: ['60%', '520px'],
 			  content: url+'?type='+type+'&name='+names
			}); 
	
})


<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
