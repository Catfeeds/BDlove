<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:51:08
  from "D:\www\yunjuke\application\pay\views\mall_express_tools.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d6ffc54d3e5_79750869',
  'file_dependency' => 
  array (
    '4229596910d8a7087b1b5f06cbabbcc1551bb57d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express_tools.html',
      1 => 1501581895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598d6ffc54d3e5_79750869 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16278598d6ffc393d08_73667940';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	.sign{width: 20px;height: 20px;margin: 0 10px;}
	.sign  .ico-check{
		background: url(<?php echo TEMPLE;?>
images/flexigrid_pic.png) no-repeat 0 0;
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
			<?php if (empty($_smarty_tpl->tpl_vars['data']->value)) {?>
			<tbody>
			<tr><td colspan="20"><li class="goods_list  no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr>
			</tbody>
			<?php } else { ?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
			<tbody>
			<tr>
				<th colspan="20" <?php if (isset($_smarty_tpl->tpl_vars['val']->value['default']) && $_smarty_tpl->tpl_vars['val']->value['default'] == 1) {?>class = 'red'<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['val']->value['ept_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['ept_name'];
}?>
					(快递公司：<?php if (isset($_smarty_tpl->tpl_vars['val']->value['express_code'])) {
echo $_smarty_tpl->tpl_vars['val']->value['express_code'];?>
-<?php echo $_smarty_tpl->tpl_vars['val']->value['express_name'];
}?>)
				<?php if (isset($_smarty_tpl->tpl_vars['val']->value['default']) && $_smarty_tpl->tpl_vars['val']->value['default'] == 1) {?>默认快递<?php }?>
					<span class="fr mr5">
        <time title="最后编辑时间"><i class="icon-time"></i><?php if (isset($_smarty_tpl->tpl_vars['val']->value['add_time'])) {
echo $_smarty_tpl->tpl_vars['val']->value['add_time'];
}?></time>
         <a class="J_Modify btn btn-primary radius size-MINI" href="javascript:void(0)" onclick="edit_info(this)" data-id="<?php if (isset($_smarty_tpl->tpl_vars['val']->value['data'])) {
echo $_smarty_tpl->tpl_vars['val']->value['data'];
}?>"><i class="fa fa-edit"></i>修改</a>
          <a class="J_Delete btn btn-danger radius size-MINI" href="javascript:void(0)" onclick="del_info('<?php echo $_smarty_tpl->tpl_vars['val']->value['ept_id'];?>
')" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value['ept_id'];?>
" ><i class="fa fa-trash"></i>删除</a></span></th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['val']->value['express_info'])) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['val']->value['express_info'];
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
			<tr>
				<?php if ($_smarty_tpl->tpl_vars['v']->value['count'] > 0) {?><td rowspan='<?php echo $_smarty_tpl->tpl_vars['v']->value['count'];?>
' class="bdl"><a class="sign" onclick="sign_select(this)"><i class="ico-check"></i></a></td><?php }?>
				<td class="cell-area tl"><?php if (isset($_smarty_tpl->tpl_vars['v']->value['area_name'])) {
echo $_smarty_tpl->tpl_vars['v']->value['area_name'];
}?></td>
				<td><?php if (isset($_smarty_tpl->tpl_vars['v']->value['first_nums'])) {
echo $_smarty_tpl->tpl_vars['v']->value['first_nums'];
}?></td>
				<td><?php if (isset($_smarty_tpl->tpl_vars['v']->value['first_fee'])) {
echo $_smarty_tpl->tpl_vars['v']->value['first_fee'];
}?></td>
				<td><?php if (isset($_smarty_tpl->tpl_vars['v']->value['loan_nums'])) {
echo $_smarty_tpl->tpl_vars['v']->value['loan_nums'];
}?></td>
				<td><?php if (isset($_smarty_tpl->tpl_vars['v']->value['loan_fee'])) {
echo $_smarty_tpl->tpl_vars['v']->value['loan_fee'];
}?></td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
			<?php }?>
			</tbody>
			<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
			<?php }?>
		</table>
	</div>
<div class="flexigrid">
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup-left">每页最多显示
				<select class="select prp" onchange="change_page()" name="rp">
					<option value="10" <?php if ($_smarty_tpl->tpl_vars['rp']->value == 10) {?>selected="selected"<?php }?>>10&nbsp;&nbsp;</option>
					<option value="20" <?php if ($_smarty_tpl->tpl_vars['rp']->value == 20) {?>selected="selected"<?php }?>>20&nbsp;&nbsp;</option>
					<option value="25" <?php if ($_smarty_tpl->tpl_vars['rp']->value == 25) {?>selected="selected"<?php }?>>25&nbsp;&nbsp;</option>
					<option value="40" <?php if ($_smarty_tpl->tpl_vars['rp']->value == 40) {?>selected="selected"<?php }?>>40&nbsp;&nbsp;</option>
				</select>条
			</div>
			<div class="pGroup-middle">
				<div class="pFirst pButton" onclick="load_page_one()" title="最前页">
					<i class="fa fa-fast-backward"></i>
				</div>
				<div class="pPrev pButton" onclick="load_page_prev()" title="前一页">
					<i class="fa fa-backward"></i>
				</div> <span class="pcontrol">
              <input type="number" style="width:40px;" size="4" onkeypress="if (event.keyCode == 13)change_sel();" name="page" class="pcur" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" title="输入要跳转的页码并回车"> / <span class="ptotal page_total"><?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
</span>页</span>
				<div class="pNext pButton" onclick="load_page_next()" title="下一页"><i class="fa fa-forward"></i></div>
				<div class="pLast pButton" onclick="load_page_last()" title="最后页"><i class="fa fa-fast-forward"></i></div>
			</div>
			<div class="pPageStat"></div>
			<div class="pGroup-right">
            <span class="pPageStat1">共<span class="total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>条记录，
                              当前页：<span class="pfrom"><?php echo $_smarty_tpl->tpl_vars['this_page']->value;?>
</span>-<span class="pto"><?php echo $_smarty_tpl->tpl_vars['this_total']->value;?>
</span>条</span>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>

</div>
</body>
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
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
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

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
