<?php
/* Smarty version 3.1.29, created on 2017-10-08 09:50:15
  from "D:\www\yunjuke\application\admin\views\public_store_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d98457b87290_06733219',
  'file_dependency' => 
  array (
    '0c41fe5b6170517433c66d2fbc5f9073750bb081' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\public_store_management.html',
      1 => 1503646397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59d98457b87290_06733219 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3199659d9845796ff94_45101321';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
th.percentage-s div{text-align:center !important;}
.download:hover{
	border: 1px solid #5a98de!important;
	color: #5a98de!important;
}
.delete:hover{
	border: 1px solid red!important;
	color: red!important;
}
.stop:hover{
	color: #f37b1d!important;
	border: 1px solid #f37b1d!important;
}

</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>店铺管理</h3>
						<h5><?php if (isset($_smarty_tpl->tpl_vars['role']->value) && $_smarty_tpl->tpl_vars['role']->value == 'w') {?>微商城<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'd') {?>电商<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'g') {?>供应仓库<?php } else { ?>平台<?php }?>中的店铺管理</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a <?php if (!isset($_smarty_tpl->tpl_vars['op']->value)) {?>class="current"<?php } else { ?>href="store_management?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>"<?php }?>>营业中</a>
						</li>
						<li>
							<a <?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {?>class="current"<?php } else { ?>href="store_management?op=stop&role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>"<?php }?>>暂停中</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li>店铺管理是对店铺原始数据的建立，并对店铺进行所需销售品牌进行授权</li>
					<li>任何店铺销售都需做品牌授权，销售商品也只能是授权商品</li>
					<li>设置项中可编辑店铺基本信息，对商品、导购进行管理，运费设置；门店专属二维码也在此下载</li>
					<li>删除店铺提示操作失败的原因：</li>
					<li>所选店铺中还有未离职的导购，不能删除</li>
					<li>所选店铺中还有未完成的订单，不能删除</li>
					<li>所选店铺中还有资金未提现/转账，不能删除</li>
					<li>所选店铺中还有未完成的售后申请，不能删除</li>
				</ul>
		     </div>
		     <div class="mt-10 mb-10">
            <form method="post" name="formSearch" id="formSearch">
                <div class="search mt-20 mb-10">
                    <select name="store_id" class=" mr-5 m_w_120 pd-5 mb-10 select2">
                        <option value="" selected>-门店名称-</option>
                                <?php if (!empty($_smarty_tpl->tpl_vars['store']->value)) {?>
		                        	<?php
$_from = $_smarty_tpl->tpl_vars['store']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
		                        		<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
</option>
		                        	<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
		                        <?php }?>
                   </select>
                   
                    <select name="brand_code" class="pd-5 m_w_120 mr-10 select2">
                        <option value="" selected>-授权品牌-</option>
                        <?php if (!empty($_smarty_tpl->tpl_vars['brands']->value)) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
                        <?php }?>
                   </select>
                   <!-- <select name="store_cate" class=" mr-5 m_w_120 pd-5 mb-10 select2">
                        <option value="" selected>-门店形式-</option>
                        <option value="1">线上</option>
                        <option value="2">线下</option>
                        <option value="3">线上线下店</option>
                   </select>
                    <select name="store_type" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                        <option value="" selected>-门店类型-</option>
                        <option value="1">加盟店</option>
                        <option value="2">旗舰店</option>
                        <option value="3">直营店</option>
                        <option value="4">商场超市店</option>
                   </select>-->
                    <select name="store_province" id="store_province"  class=" mr-5 m_w_120 pd-5 mb-10 select2">
                        <option value="" selected>-省-</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['area']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value[1];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
?>
                   </select>
                    <select name="store_city" id="store_city" class=" mr-5 m_w_120 pd-5 mb-10 select2">
                        <option value="" selected>-市-</option>
                   </select>
                    <select name="store_area" id="store_area"  class=" mr-5 m_w_120 pd-5 mb-10 select2">
                        <option value="" selected>-区-</option>
                   </select>
                   <input name="tel_num" placeholder="联系电话" type="text" class="input_text input-text m_w_120 pd-5 mb-10 " style="width:160px!important;">
                   <input type="submit" class="btn btn-warning radius ml-5 mb-10" id="submit" name="submit" onclick="return false;" value="搜索">
                 </div>
             </form>
       </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
	areaData = <?php echo json_encode($_smarty_tpl->tpl_vars['area']->value);?>
;
$(function(){
	$(".select2").select2({
        width:'150px'
    });
	$('#submit').click(function(){
		search = $("#formSearch").serialize();
      $("#flexigrid").flexOptions({url: 'get_store_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>&role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&'+search, method: 'post', qtype:'', query:'',}).flexReload();
  });
	
	$('#store_province').change(function(){
		province = $(this).val();
		area_data = areaData[province];
		str = '<option value="" selected>-市-</option>';
		$.each(area_data,function(k,v){
			str+='<option value="'+v[0]+'">'+v[1]+'</option>';
		})
		$('#store_city').html(str);
		$('#store_area').html('<option value="" selected>-区-</option>');
	})
	$('#store_city').change(function(){
		city = $(this).val();
		area_data = areaData[city];
		str = '<option value="" selected>-区-</option>';
		$.each(area_data,function(k,v){
			str+='<option value="'+v[0]+'">'+v[1]+'</option>';
		})
		$('#store_area').html(str);
	})
	$("#flexigrid").flexigrid({
		url: 'get_store_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>&role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '门店logo', name : 'storelogo', width : 60, sortable : true, align: 'center'},
			{display: '门店名称', name : 'member_name', width : 200, sortable : true, align: 'center'},
			{display: '导购数量', name : 'member_email', width : 60, sortable : true, align: 'center'},
			{display: '门店形式', name : 'member_email', width : 80, sortable : true, align: 'center'},
			{display: '授权品牌', name : 'member_email', width : 200, sortable : true, align: 'center'},
			{display: '返点比例', name : 'member_email', width : 60, sortable : true, align: 'center'},
			{display: '扣点比例', name : 'member_email', width : 280, sortable : true, align: 'left', className: 'percentage-s'},
			{display: '联系电话', name : 'member_mobile', width : 80, sortable : true, align: 'center'},
			{display: '地址', name : 'member_sex', width : 200, sortable : true, align: 'center'},
			
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增门店', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			{display: '<i class="fa fa-download"></i>批量下载二维码', name : 'download', bclass : 'download', title : '下载选定门店的二维码', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量<?php if (!isset($_smarty_tpl->tpl_vars['op']->value)) {?>暂停<?php } else { ?>开启<?php }?>营业', name : 'stop', bclass : 'stop', title : '将选定行门店营业状态修改', onpress : fg_operate },
			{display: '<i class="fa fa-trash-o"></i>批量删除', name : 'delete', bclass : 'delete', title : '将选定行门店删除', onpress : fg_operate },
		],
/* 		searchitems : [
			{display: '联系电话', name : 'ous_tel'},
			{display: '门店名称', name : 'store_name'}
		], */
		title: "<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
if ($_smarty_tpl->tpl_vars['role']->value == 'w') {?>实体店<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'd') {?>电商店<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'g') {?>供应店铺<?php } else { ?>店铺<?php }
}?>列表"
	});
	function fg_operate(name, grid) {
    if (name == 'delete') {
        if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
            return false;
        }
    }else if (name == 'add') {
    	window.location.href="store_edit?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>";
    }else if(name=='download'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	$.ajax({
	        type: "post",
	        dataType: "json",
	        url: '<?php echo base_url("vmall.php/receive/download_much");?>
'+'?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
	        data: "id=" + itemlist,
	        beforeSend:function(){
				layer.msg('正在下载，请稍等', {icon: 1});
			},
	        success: function(data){
			if(data.state=='403'){
				login_ajax('shopadmin');
			}else
	        	if(data.state){
	        		
	        		location.href = data.data;
	        		layer.msg(data.msg, {icon: 1});
	        	}else{
	        		layer.msg(data.msg, {icon: 2});
	        	}
	        	
	        }
	    });
    }else if(name=='stop'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	update_ad_management(itemlist);
    }
}
});
//下载二维码
function call_code(id){
	
	 window.location.href='<?php echo base_url("vmall.php/receive/create_code?id=");?>
'+id;

}
//营业
function update_ad_management(data){
	//console.log(typeof(data));
	var stname = '';
	if(typeof(data)=='object'){
		var id = data.store_id;
		var state = data.state;
		var stname = data.name;
	}else{
		id = data;
		data = data.split(',');
		size = data.length;
		if(size>0&&id!=''){
			stname = '这'+size+'个店铺';
		}else{
			stname = '所有店铺';
		}
		
	}
	layer.confirm('确认修改'+stname+'的营业状态吗？',
	   {btn: ['确认','取消']}, 
	   function(){
		   $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "update_ad_management?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>&role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>",
		        data: "id="+id,
		        success: function(data){
				  if(data.state=='403'){
			           login_ajax('shopadmin');
		            }else{
		            	layer.msg(data.msg);
		            	$("#flexigrid").flexReload();
		            }
		        }
		   })
	   }
	)
}

//营业
function update_ad_managements(id,stname){
	layer.confirm('确认修改'+stname+'的营业状态吗？',
	   {btn: ['确认','取消']}, 
	   function(){
		   $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "update_ad_management?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>&role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>",
		        data: "id="+id,
		        success: function(data){
				  if(data.state=='403'){
			           login_ajax('shopadmin');
		            }else{
		            	layer.msg(data.msg);
		            	$("#flexigrid").flexReload();
		            }
		        }
		   })
	   }
	)
}
//编辑
function fg_edit(id){
	window.location.href="store_edit?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=edit&id="+id;
}
//删除
function fg_delete(id,name){
	var stname = '';
	if(typeof(id)=='object'){
		var size = id.length;
		stname = '这'+size+'个店铺';
		id = id.join(',');
	}else{
		stname = name;
	}
	layer.confirm('确认删除'+stname+'吗？',
	   {btn: ['确认','取消']}, 
	   function(){
		   $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "store_del?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>",
		        data: "id="+id,
		        success: function(data){
				  if(data.state=='403'){
			           login_ajax('shopadmin');
		            }else{
		            	layer.msg(data.msg);
		            	$("#flexigrid").flexReload();
		            }
		        }
		   })
	   }
	)
	//console.log(typeof(id))
}
<?php echo '</script'; ?>
>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
