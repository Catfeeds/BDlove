<?php
/* Smarty version 3.1.29, created on 2017-08-07 11:42:55
  from "D:\www\yunjuke\application\pay\views\user_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5987e1bf0b2742_45010785',
  'file_dependency' => 
  array (
    '5a39081afabec7c271ef122c67bd11d9fba0b95c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\user_management.html',
      1 => 1501813462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
  ),
),false)) {
function content_5987e1bf0b2742_45010785 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '248825987e1bee14353_24786108';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
 dt.tit {
    width: 100px !important;
    padding-right: 2px !important;
 	font-size:14px !important;
}
.ncap-form-default dl.row{
	padding:4px 0 !important;
}
.input-text{
	width:150px ;
	height:30px !important;
}
.mDiv h5{
	display: inline !important;
}
.ncap-form-default dd.opt {
    text-align: left;
    width: 20%;
}
.ncap-form-default dd.opt1 {
    text-align: left;
    width: 80%;
}
.ncap-form-default dd.opt2 {
    text-align: left;
    min-width: 155px !important;
}
dl.row1{
	float:left;
	width:30%;
}
dl.row2{
	float:left;
	width:40% !important;
}
span.check{
	padding:0 4px;
	border-left:1px solid #ccc;
	border-bottom:1px solid #ccc;
	border-top:1px solid #ccc;
	display:inline-block;
	height:28px;
	line-height:28px;
}
span.check_box{
	display:inline-block;
	height:30px;
    cursor:pointer;
	border-right:1px solid #ccc;
}
span.current{
	background-color:#ccc;
}

</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
	  <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 会员管理 <span class="c-gray en">&gt;</span> 会员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
  </div>

	<!-- 操作说明 -->
	<!--  <div class="explanation" id="explanation">
    <!--<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
          <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
          <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
          <li>通过会员管理，你可以进行查看、编辑会员资料等操作</li>
          <li>你可以根据条件搜索会员，然后选择相应的操作</li>
        </ul>
      </div>-->
	<form id="formSearch" method="post" action="user_list" enctype="multipart/form-data">
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label for="class_sort">加入时间：</label>
				</dt>
				<dd class="opt opt1">
					<div class="area-region-select">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time"
							   style="background-color: #fff" class="input-text  data-start">
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time"
									  style="background-color: #fff" class="input-text  data-end">
						<input name="time" class="check_i" type="hidden" value=""/>
						<span class="check_box  check_boxtime">
								 <span class="check  all current" data-para="all">全部</span>
								 <span class="check time" data-start="<?php echo $_smarty_tpl->tpl_vars['now_start']->value;?>
" data-end="<?php echo $_smarty_tpl->tpl_vars['now_end']->value;?>
">今日</span>
								 <span class="check time" data-start="<?php echo $_smarty_tpl->tpl_vars['tom_start']->value;?>
" data-end="<?php echo $_smarty_tpl->tpl_vars['tom_end']->value;?>
">昨日</span>
								 <span class="check time" data-start="<?php echo $_smarty_tpl->tpl_vars['week_start']->value;?>
"
									   data-end="<?php echo $_smarty_tpl->tpl_vars['now_end']->value;?>
">最近7天</span>
								 <span class="check time" data-start="<?php echo $_smarty_tpl->tpl_vars['mon_start']->value;?>
"
									   data-end="<?php echo $_smarty_tpl->tpl_vars['now_end']->value;?>
">最近30天</span>
						        </span>
					</div>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name">消费金额：</label>
				</dt>
				<dd class="opt opt1">
					<input type="number" id="start_monney" value="" name="start_monney" style="background-color: #fff"
						   class="input-text  data-start">
					至&nbsp;<input type="number" id="end_monney" value="" name="end_monney"
								  style="background-color: #fff" class="input-text  data-end">
					<input name="monney" class="check_i" type="hidden" value=""/>
					<span class="check_box check_boxmoney">
							 <span class="check all current" data-para="all">全部</span>
							 <span class="check money" data-start="100" data-end="500">100~500元</span>
							 <span class="check money" data-start="500" data-end="2000">500~2000元</span>
							 <span class="check money" data-start="2000" data-end="">2000元以上</span>
						    </span>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name">消费单数：</label>
				</dt>
				<dd class="opt opt1">
					<input type="number" id="start_num" value="" name="start_num" style="background-color: #fff"
						   class="input-text  data-start">
					至&nbsp;<input type="number" id="end_num" value="" name="end_num" style="background-color: #fff"
								  class="input-text  data-end">
					<input name="num" class="check_i" type="hidden" value=""/>
					<span class="check_box check_boxnumber">
							 <span class="check all current" data-para="all">全部</span>
							 <span class="check number" data-start="0" data-end="10">0~10单</span>
							 <span class="check number" data-start="10" data-end="50">10~50单</span>
							 <span class="check number" data-start="50" data-end="">50单以上</span>
						    </span>
				</dd>
			</dl>
			<?php if ($_smarty_tpl->tpl_vars['store_type']->value == 1) {?>
			<dl class="row row1 yincan">
				<dt class="tit">
					<label for="class_sort">所属门店：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<?php echo $_smarty_tpl->tpl_vars['store_name']->value;?>

						<span class="err"></span></div>
					<span class="err"></span>

				</dd>
			</dl>
			<dl class="row row1 yincan">
				<dt class="tit">
					<label for="class_sort">所属导购：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="valid" name="underguide" id="area_region_select_guide">
							<option value="0" class="underguide">-请选择-</option>
								<?php if (!empty($_smarty_tpl->tpl_vars['guides']->value)) {?>
								<?php
$_from = $_smarty_tpl->tpl_vars['guides']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['spg_id'];?>
" class="understore">-<?php echo $_smarty_tpl->tpl_vars['val']->value['spg_name'];?>
-</option>
								<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
								<?php }?>
						</select>
						<span class="err"></span>
					</div>
					<span class="err"></span>

				</dd>
			</dl>
			<?php }?>
			<dl class="row row1">
				<dt class="tit">
					<label for="class_sort">姓名：</label>
				</dt>
				<dd class="opt">
					<input type="text" id="true_name" value="" name="true_name" style="background-color: #fff"
						   class="input-text">
				</dd>
			</dl>
			<?php if ($_smarty_tpl->tpl_vars['store_type']->value == 1) {?>
			<dl class="row row1 yincan">
				<dt class="tit">
					<label for="class_sort">微信昵称：</label>
				</dt>
				<dd class="opt">
					<input id="wx_nike" name="wx_nike" type="text" class="input-text" value="">
					<span class="err"></span>

				</dd>
			</dl>
			<?php }?>
			<dl class="row row1 row2">
				<dt class="tit">
					<label for="class_sort">手机号：</label>
				</dt>
				<dd class="opt opt2">
					<input type="text" id="mobile" value="" name="mobile" style="background-color: #fff"
						   class="input-text">
				</dd>
				<a id="submit" href="javascript:void(0)" class="btn btn-warning radius">搜索</a>
			</dl>
		</div>
	</form>
  <div class="">
	  <table class="table table-border table-bordered table-hover table-bg table-content mt-20">
		  <thead>
		  <tr>
			  <th scope="col" colspan="13">会员列表</th>
		  </tr>
		  <tr class="text-c">
			  <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
			  <?php if ($_smarty_tpl->tpl_vars['store_type']->value == 1) {?>
			  <th width="">操作</th>
			  <?php }?>
			  <th width="">会员昵称</th>
			  <th width="10%">手机号</th>
			  <th width="">性别</th>
			  <?php if ($_smarty_tpl->tpl_vars['store_type']->value == 1) {?>
			  <th width="10%">最近绑定导购</th>
			  <?php }?>
			  <th width="10%">付款订单数</th>
			  <th width="10%">付款订单额</th>
			  <?php if ($_smarty_tpl->tpl_vars['store_type']->value == 1) {?>
			  <th width="">剩余积分</th>
			  <th width="">账户余额</th>
			  <?php }?>
			  <th width="">加入时间</th>
		  </tr>

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
</div>
<?php echo '<script'; ?>
 type="text/javascript">

  $(function(){
	  var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
	  $(".select2").select2();
	  $('#submit').click(function(){
		  load_page_to(url);
	  });
	  load_page(url);
	$('span.check').click(function(){
		$(this).parents('dd').find('.check_i').val("");
		$(this).parents('dd').find('.data-start').val("");
		$(this).parents('dd').find('.data-end').val("");
		$(this).siblings('span').removeClass('current');
		if($(this).hasClass("all")){
			var time = $(this).attr('data-para');
			$(this).parents('dd').find('.check_i').val(time);
		}else{
			var datastart =$(this).attr('data-start');
			var dataend =$(this).attr('data-end');
			$(this).parents('dd').find('.data-start').val(datastart);
			$(this).parents('dd').find('.data-end').val(dataend);
		}
		$(this).addClass('current');
	});

      $("body").on('click',"#submit",function () {
        var stime=$("#start_time").val();
        var  etime=$("#end_time").val();
        if(stime||etime)
        {
            if(Date.parse(stime)>Date.parse(etime))
            {
                layer.msg('开始时间必须小于结束时间');
                return false;
            }
        }
        $("#flexigrid").flexOptions({url: 'user_list?'+$("#formSearch").serialize(),query:'',qtype:''}).flexReload();
    });


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
	    	window.location.href="user_management_add";
	    }else if (name == 'csv'){
	    	var itemlist = new Array();
	        if($('.trSelected',grid).length>0){
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	        }
            fg_csv(itemlist);
        }
	}

	function fg_delete(id, name) {
		if (typeof id == 'number') {
	    	var id = new Array(id.toString()); 
		};
		if(typeof name == 'undefined'){
			var str = '删除后将不能恢复，确认删除 这' + id.length + ' 项吗？';
		}else{
			var str = '删除后将不能恢复，确认删除 ' + name + ' 吗？';
		}
		layer.confirm(str, {
			  btn: ['确定','取消'] //按钮
			}, function(){
			  layer.msg('删除中', {icon: 1});
			  $.ajax({
			        type: "post",
			        dataType: "json",
			        url: "member_del",
			        data: "id="+id,
			        success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else{
                            layer.msg(data);
						}
	    				$("#flexigrid").flexReload();
			        }
			    });
			}, function(){
			    return ;
	    });
	}
	function fg_csv(ids){
		if(ids.length == 0 ){
			layer.msg('请至少选择一项需要导出的数据');
			return false;
		}
		
		id = ids.join(',');
		window.location.href = 'user_management_excel?id=' + id;

	}
	

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
