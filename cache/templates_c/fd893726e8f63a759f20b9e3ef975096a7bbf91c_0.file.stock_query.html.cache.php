<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:09:52
  from "D:\www\yunjuke\application\pay\views\stock_query.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598439e06b6a71_91446311',
  'file_dependency' => 
  array (
    'fd893726e8f63a759f20b9e3ef975096a7bbf91c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_query.html',
      1 => 1501636154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
  ),
),false)) {
function content_598439e06b6a71_91446311 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17799598439e04f9509_80790389';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>
plugins/select2/css/select2.min.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/jquery-ui/jquery-ui.min.js"><?php echo '</script'; ?>
>
	<style type="text/css">
		a:hover{
			color: #333;
		}
		.layui-layer-content{
			padding: 0 10px 10px 10px;
		}
	</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span>库存管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form  method="post"  name="formSearch" id="formSearch" >
         
        <div class="search mb-10">
            <select name="gc_id" class=" mr-5 m_w_120 pd-5 mb-10">
            	<option value="" selected="">-分类选择-</option>
           		<?php if (!empty($_smarty_tpl->tpl_vars['cate_option']->value)) {
echo $_smarty_tpl->tpl_vars['cate_option']->value;
}?>
			</select>
			
			<select name="brand_id" class="mr-5 m_w_120 pd-5 mb-10">
	            <option value="" selected="">-品牌选择-</option>
	            <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_brand_0_saved_item = isset($_smarty_tpl->tpl_vars['brand']) ? $_smarty_tpl->tpl_vars['brand'] : false;
$_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['brand']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
$__foreach_brand_0_saved_local_item = $_smarty_tpl->tpl_vars['brand'];
?>
	        		<option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</option> 
		        <?php
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_0_saved_local_item;
}
if ($__foreach_brand_0_saved_item) {
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_0_saved_item;
}
?>
		   </select>  
     
	        <select name="amount" class="mr-5 m_w_120 pd-5 mb-10">
	            <option value="" selected="">-是否有库存-</option>
	            	<option value="1">有库存</option> 
					<option value="0">无库存</option>
			</select>
			
			
	        <input name="stock_name" type="text"     class=" input-text input_text mb-10" placeholder="货品">
	        <input name="stock_sn"   type="text"     class=" input-text input_text mb-10" placeholder="款号">
	        <input name="stocks_bar_code"   type="text"     class=" input-text input_text mb-10" placeholder="条形码">

        <input id="searchBtn" type="button" class="btn btn-warning radius ml-10 mb-10" value="搜索">
        </div>
    </form>
    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">库存列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">操作</th>
            <th width="">商品信息</th>
            <th width="">品牌</th>
            <th width="">分类</th>
            <th width="">销售价</th>
            <th width="">吊牌价</th>
            <th width="">库存</th>
            <th width="">上市时间</th>
        </tr>
        <tr><th colspan="11">
            <span class="btn btn-primary radius" onclick="fg_operate('add')"><i class="fa fa-cloud-upload"> 批量修改库存</i></span>
            <span class="btn btn-danger radius" onclick="fg_operate('clear')"><i class="fa fa-trash"> 清除零库存数据</i></span>
        </th></tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="flexigrid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common_list_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
	
    function get_check()
    {
        $("input[name='check']:checkbox").each(function(i) {
            if($(this).attr("checked")){
                $(this).parent().parent().addClass('trSelected');
            } else {
                $(this).parent().parent().removeClass('trSelected');
            }
        });
    }
    $(function(){
        var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
        $(".select2").select2({
            width:'200px'
        });
        
        


    });  
    
    
    /*库存导入*/
	function import_amount(url){
		var str_div = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="formType"  enctype="">'+
		'<div class="ncap-form-default">'+
              '<dl class=""><dt class="tit" style="width:30%;">'+
                    '<label for="store_arayacak">导入方式：</label>'+
                '</dt>'+
                '<dd class="opt" style="width:60%;">'+
					'<div class="">'+
						'<input type="radio" id="qq_isuse_1" name="type"   value="1"  style="margin-left:20px;">全盘'+
						'<input type="radio" id="qq_isuse_0" name="type" checked value="0" style="margin-left:20px;" >局部'+
					'</div>'+
			   '</dd>'+
            '</dl>'+
            '<p class="notic" style="text-align:left;padding-left:13%;">全盘：清除当前门店的所有商品库存再导入；<br>局部：对目标库存进行修改；</p>'+
		'</div></form></div>';
	    layer.open({
			type: 1,
			btn: ['确认', '取消'],
			title: '<b>库存导入</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['420px', '230px'], //宽高
			content: str_div,
			yes: function(index){
				//layer.close(index);
				var type=$('#formType').serialize();
				data_import('门店商品库存',"<?php echo base_url('admin.php');?>
/write_import/excel_upload",url+'?'+type+'&name=');
			}, no: function(){
			}
		})
	}
	function fg_operate(name, grid) {
		get_check();
		if (name == 'import') {
			import_amount('storeGoods_import');
	    }else if (name == 'import_sku') {
			import_amount('storeGoodsSku_import');
	    }else if (name == 'import_barcode') {
			import_amount('storeGoodsBarcode_import');
	    }else if (name == 'add') {
	    	 var itemlist = new Array();
	        if($('.trSelected',grid).length>0){
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	            
	        }
	        fg_edit(itemlist);
	    }else if(name=='clear'){
	    	layer.confirm('确认清除库存为0的数据？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
            	$.ajax({
        	        type: "post",
        	        dataType: "json",
        	        url: "clearAmount",
        	        success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                            $.get('stock_query',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                            //layer.closeAll();
                        }
        	        }
            	})
            })
	    }
}
    
    
    

    function fg_edit(data){
    	get_check();
    	//console.log(typeof(data));
    	var stname = '';
    	if(typeof(data)=='number'){
    		$.ajax({
    	        type: "post",
    	        dataType: "json",
    	        url: "updateAmount",
    	        data: 'id='+data,
    	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else  if(data.state){
    	            	content = '<div class="amendstock-background"><input type="hidden" name="isNumber" id="isNumber" value="1"></div>'+
	            		'<div class="amengstock-content">'+
	            		'<h5 style="padding: 5px;border-bottom:1px solid #E0E0E0;">(<span class="red">'+data.row.goods_name+'</span>)调整库存、价格</h5>'+
    	        		'<div style="margin-top: 20px;"></div>'+
    	        	  '<table class="table table-border" style="border-top: 0px;">'+
    	        			/* '<thead>'+
    	        				'<tr>'+
    	        					'<th></th>'+
    	        					'<th>当前门店价格</th>'+
    	        					'<th>设定门店价格</th>'+
    	        				'</tr>'+
    	        			'</thead>'+ */
    	        			'<tbody>'+
    	        				'<tr>'+
    	        					'<td style="width: 33.3%;">吊牌价</td>'+
    	        					'<td style="width: 33.3%;">'+data.row.goods_marketprice+'</td>'+
    	        					/* '<td style="width: 33.3%;"><input type="text" class="input-text size-M"/></td>'+ */
    	        				'</tr>'+
    	        			'</tbody>'+
    	        		'</table>'+ 
    	        		'<div style="margin-top: 20px;"></div>'+
    	        		'<form id="goodsStocks"><div style="max-height:400px;overflow:auto"><table class="table table-border mb-10" style="border-top: 0px;">'+
    	        			'<thead>'+
    	        				'<tr>'+
    	        					'<th>货号</th>'+
    	        					'<th>颜色</th>'+
    	        					'<th>尺码</th>'+
    	        					'<th>条码</th>'+
    	        					'<th>销售价</th>'+
    	        					'<th>设定价格</th>'+
    	        					'<th>库存</th>'+
    	        				'</tr>'+
    	        			'</thead>'+'<tbody>';
    	        			$.each(data.data,function(k,v){
    	        				content+='<tr>'+
    	    					'<td style="width: 20%;">'+data_null(v.stocks_sn)+'<input type="hidden" value="'+data_null(v.stocks_sn)+'" name="stocks_sn[]"/><input type="hidden" value="'+v.goods_ea_id+'" name="goods_ea_id[]"/></td>'+
    	    					'<td style="width: 15%;">'+data_null(v.color_remark,v.color)+'</td>'+
    	    					'<td style="width: 15%;">'+data_null(v.size_note,v.size)+'<input type="hidden" value="'+v.size+'" name="size[]"/></td>'+
    	    					'<td style="width: 20%;">'+data_null(v.stocks_bar_code)+'</td>'+
    	    					'<td style="width: 10%;">￥'+v.price+'</td>'+
    	    					'<td style="width: 10%;"><input type="text" value="'+v.price+'" name="stocks_price[]" class="input-text size-M price"/></td>'+
    	    					'<td style="width: 10%;"><input type="text" value="'+v.amount+'" name="amount[]" class="input-text size-M amount"/></td>'+
    	    				'</tr>';
    	        			})
    	        			content+='</tbody>'+
    	        			'</table></div></form>'+
    	        			'<div style="height:50px;margin-top:10px"><div class="changeprice">'+
    	        				'<button class="btn pull-right mar-lef btn-warning radius ml-5 mr-10" onclick="changeAmount()">调库存</button>'+
    	        				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changeAmount" /></div>'+
    	        				'<span class="pull-right mar-lef ml-5" style="line-height: 30px;">批量调库存</span>'+
    	        			'</div>'+
    	        			'<div class="changeamount">'+
            				'<button class="btn pull-right mar-lef btn-warning radius ml-5" onclick="changePrice()">调价</button>'+
            				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changePrice" /></div>'+
            				'<span class="pull-right mar-lef" style="line-height: 30px;">批量调价</span><div style="clear: both;"></div>'+
            			    '</div>'+
    	        			'<div style="clear: both;"></div>'+
    	        			'<div style="margin: 10px;">'+
    	        				'<button class="btn pull-right mar-lef btn-warning radius ml-5" onclick="updateStocks('+data.row.goods_id+')">提交</button>'+
    	        				'<button class="btn pull-right mar-lef btn-default radius" onclick="cancel()">取消</button><div style="clear: both;"></div>'+
    	        			'</div></div>'+
    	        			'<div style="clear: both;"></div></div>';
    	        			//$('.amengstock-content').html(content);
    	        			//$('.amendstock-background').show();
    		            	//$('.amengstock-content').show();
    		            	//console.log(content)
    		            	 layer.open({
					    			type: 1,
					    			title: '<b>修改库存</b>',
					    			skin: 'layui-layer-rim', //加上边框n
					    			area: ['60%', 'auto'], //宽高
					    			content: content,
					    		})
    		            	
    		            	
    	            }else{
    	            	layer.msg(data.msg);
    	            }
    			  
    	        }
    	   })
    	   
    	}else{
    		if(data.length==0){
    			layer.msg("至少选择一个商品!");
    			return false;
    			//stname = '当前条件下的商品的库存';
    		}else{
    			stname = '这'+data.length+'个商品的库存';
    		}
    		layer.open({
    			type: 1,
    			btn: ['确认', '取消'],
    			title: '<b>修改库存</b>',
    			skin: 'layui-layer-rim', //加上边框n
    			area: ['420px', '180px'], //宽高
    			content: '<div class="pt-20 pb-20 pl-30 pr-30 "><form  id="form_edit" method="POST" enctype=>' +
    			'<div class="">修改'+stname+'为：<input type="number" name="stock" style="width:50px;" id="edit_amount" class=""><span value="" class="err"></span></div>' +
    			'</form></div>',
    			yes: function(index){
    				/*添加代理商表单验证*/
    				$('#form_edit').validate({
    					errorPlacement: function(error, element){
    						var error_td = element.nextAll('span.err');
    						error_td.append(error);
    					},
    					rules : {
    	                    stock:{required : true}
    	                },
    	                messages : {
    						stock : {required : '<i class="fa fa-exclamation-circle"></i>请填写库存量'}
    	                }
    				});
    				if($("#form_edit").valid()){
    					
    						   search = $("#formSearch").serialize();
    						   $.ajax({
    						        type: "post",
    						        dataType: "json",
    						        url: "update_goodsAmount",
    						        data: search+"&id="+data+'&amount='+$('#edit_amount').val(),
    						        success: function(data){
                                        if(data.state == '403'){
                                            layer.msg(data.msg);
                                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                                        }else if(data.state == '401'){
                                            layer.msg(data.msg);
                                            return false;
                                        }else {
    						            	layer.msg(data.msg);
    						            	layer.close(index);
    						            	$.get('stock_query',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
    						            }
    						        }
    						   })
    					   
    					
    				}
    			}, no: function(){
    			}
    		})
    		//console.log(data)
    		//data = data.join(',');
    	}
    	
    }
    $("div.amengstock-content").delegate("input.price","blur",function(){
    	  if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
    		  $(this).removeClass('isnum');
    	  }else{
    		  $(this).addClass('isnum');
    		  layer.msg('请输入正确的数字');
    	  }
    	});
    $("div.amengstock-content").delegate("input.amount","blur",function(){
    	  if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
    		  $(this).removeClass('isnum');
    	  }else{
    		  $(this).addClass('isnum');
    		  layer.msg('请输入正确的数字');
    	  }
    	});
    function isNumber(){
    	var isNum = true;
    	$('div.amengstock-content').find('table').find("input.input-text").each(function(){
    		if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
    			  $(this).removeClass('isnum');
    		  }else{
    			  $(this).addClass('isnum');
    			  isNum = false; 
    		  }
    	})
    	if(!isNum){
    		layer.alert('请输入正确的数字');
    		return false;
    	}
    }	
    function cancel(){
    	 layer.closeAll(); 
    }
    function changeAmount(){
    	var amount = $('.changeAmount').val();
    	if(parseFloat(amount)>=0&&!isNaN(amount)){
    		$('div.amengstock-content').find('table').find('input.amount').each(function(){
    			$(this).val(parseInt(amount));
    		})
    	}else{
    		layer.alert('请输入正确的数字');
    	}
    }
    function changePrice(){
    	var price = $('.changePrice').val();
    	if(parseFloat(price)>=0&&!isNaN(price)){
    		$('div.amengstock-content').find('table').find('input.price').each(function(){
    			$(this).val(number_format(price,2));
    		})
    	}else{
    		layer.alert('请输入正确的数字');
    	}
    }
    function updateStocks(id){
    	isNumber();
    	$.ajax({
            type: "post",
            dataType: "json",
            url: "updateStocks",
            data: $('#goodsStocks').serialize()+'&id='+id,
            success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
                	layer.closeAll();
                	layer.msg(data.msg);
                	$.get('stock_query',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                	
                }else{
                	layer.msg(data.msg);
                }
            }
       })
    }



<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
