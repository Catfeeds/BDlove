<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:14:55
  from "D:\www\yunjuke\application\admin\views\finance_account_sys.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980468f9c4cb6_22222028',
  'file_dependency' => 
  array (
    '438cb07af042b81cae1e7241f9873059de277325' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_account_sys.html',
      1 => 1501578885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5980468f9c4cb6_22222028 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '70275980468f8326d8_97304777';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
	#cashsubmit{
		float: right;
		height: 20px;
		width: 40px;
		text-align: center;
		font-size: 12px;
		padding: 0;

	}
	.cash-background{
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background: #333;
		opacity: 0.5;
		z-index: 99;
	}
	.cash-content{
		position: fixed;
		width: 30%;
		min-height: 200px;
		max-height: 80%;
		min-width: 540px;
		top:10%;
		left: 35%;
		background: #fff;
		z-index: 100;
		padding: 20px;
		margin-bottom: 20%;
		overflow-y: scroll;
		border-radius: 5px;
	}

</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>平台账户明细</h3>
						<h5>平台账户相关信息</h5>
					</div>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li>可根据收支情况一览了解账户当前信息，可根据平台账户明细了解之前的账户活动</li>
				</ul>
			</div>
			<div class="ncap-form-all ncap-stat-general-single mt-20">
				<div class="title">
					<h3>收支情况一览</h3></div>
				<dl class="row">
					<dd class="opt">
						<ul class="nc-row">
							<li title="收款金额：<?php echo $_smarty_tpl->tpl_vars['asset_in']->value;?>
元">
								<h4>收款金额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="<?php echo $_smarty_tpl->tpl_vars['asset_in']->value;?>
"><?php echo ceil($_smarty_tpl->tpl_vars['asset_in']->value);?>
</h2>
								<h6>元</h6></li>
							<li title="退款金额：0.00元">
								<h4>退款金额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="0.00">0</h2>
								<h6>元</h6></li>
							<li title="抽成金额：<?php echo $_smarty_tpl->tpl_vars['sys_cc']->value;?>
元">
								<h4>抽成金额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="<?php echo $_smarty_tpl->tpl_vars['sys_cc']->value;?>
"><?php echo ceil($_smarty_tpl->tpl_vars['sys_cc']->value);?>
</h2>
								<h6>元</h6></li>
							<li title="返点金额：<?php echo $_smarty_tpl->tpl_vars['sys_fd']->value;?>
元">
								<h4>返点金额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="<?php echo $_smarty_tpl->tpl_vars['sys_fd']->value;?>
"><?php echo ceil($_smarty_tpl->tpl_vars['sys_fd']->value);?>
</h2>
								<h6>元</h6></li>
							<li title="提现金额：<?php echo $_smarty_tpl->tpl_vars['sys_cash']->value;?>
元">
								<h4>提现金额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="<?php echo $_smarty_tpl->tpl_vars['sys_cash']->value;?>
"><?php echo ceil($_smarty_tpl->tpl_vars['sys_cash']->value);?>
</h2>
								<h6>元</h6></li>
							<li title="余额：<?php echo $_smarty_tpl->tpl_vars['asset']->value;?>
元">
								<h4>余额</h4>
								<h2 id="count-number" class="timer" data-speed="1500" data-to="<?php echo $_smarty_tpl->tpl_vars['asset']->value;?>
" style="right: 70px"><?php echo ceil($_smarty_tpl->tpl_vars['asset']->value);?>
</h2>
								<h6 style="right: 55px">元</h6>
								<input type="button" class="ml-10 btn btn-secondary radius" id="cashsubmit" value="提现"></li>
						</ul>
					</dd>
				</dl>
			</div>
			<div class="mt-10 mb-10 c-666">
				<form method="post" name="formSearch" id="formSearch">
					交易时间：<input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5"> — <input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30"> 订单号：
					<input type="text" name="order_id" id="order_id" class=" w130">
					<input type="button" class="ml-10 btn btn-warning radius" id="searchsubmit" value="搜索">
				</form>
			</div>
			<div id="flexigrid"></div>
		</div>

		<div id="goTop">
			<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
			<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
		</div>



		<!--弹出框-->
		<div class="cash-background" style="display:none;"><input type="hidden" name="isNumber" id="isNumber" value="1"></div>
		<div class="cash-content" style="display:none;">
			<h4 style="padding: 5px;border-bottom:1px solid #E0E0E0;">平台提现</h4>
			<form method="post" action="" id="form1" name="form1">
				<div class="ncap-form-default">
					<dl class="row">
						<dt class="tit" style="width: 15%">
							<label><em>*</em>开户银行：</label>
						</dt>
						<dd class="opt">
							<input id="bankName" name="bankName" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_name']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_name']->value;
}?>" class="input-txt" type="text" disabled/>
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit" style="width: 15%">
							<label><em>*</em>银行账号：</label>
						</dt>
						<dd class="opt">
							<input id="bankCode" name="bankCode" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_usn']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_usn']->value;
}?>" class="input-txt" type="text" disabled/>
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit" style="width: 17%">
							<label><em>*</em>银行开户人：</label>
						</dt>
						<dd class="opt" style="width: 80%">
							<input id="bankUname" name="bankUname" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_uname']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_uname']->value;
}?>" class="input-txt" type="text" disabled/>
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit" style="width: 15%">
							<label><em>*</em>提现金额：</label>
						</dt>
						<dd class="opt">
							<input id="cashNum" name="cashNum" value="" class="input-txt" type="text"/>
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<div class="bot">
						<a href="JavaScript:void(0);" class="ml-10 btn btn-secondary radius" id="submitBtn">确认</a>
						<a href="JavaScript:void(0);" class="ml-10 btn btn-secondary radius" id="quxiaoBtn">取消</a>
					</div>
				</div>
			</form>

		</div>


	</body>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {
			$('#searchsubmit').click(function() {
				var search = $("#formSearch").serialize();
				$("#flexigrid").flexOptions({
					url: 'get_finance_account_sys?' + search
				}).flexReload();
			});

			$("#flexigrid").flexigrid({
				url: 'get_finance_account_sys',
				dataType: 'xml',
				colModel: [{
						display: '流水号',
						name: 'id',
						width: 60,
						sortable: false,
						align: 'center'
					},
					{
						display: '订单号',
						name: 'order_sn',
						width: 150,
						sortable: false,
						align: 'center'
					},
					{
						display: '交易号',
						name: 'pay_sn',
						width: 150,
						sortable: false,
						align: 'center'
					},
					{
						display: '账户支出',
						name: 'asset_out',
						width: 60,
						sortable: false,
						align: 'center'
					},
					{
						display: '账户收入',
						name: 'asset_in',
						width: 60,
						sortable: false,
						align: 'center'
					},
					{
						display: '余额',
						name: 'asset',
						width: 90,
						sortable: false,
						align: 'center'
					},
					{
						display: '备注',
						name: 'note',
						width: 280,
						sortable: false,
						align: 'center'
					},
					{
						display: '交易时间',
						name: 'create_time',
						width: 125,
						sortable: false,
						align: 'center'
					}
				],
				/*searchitems : [
				    {display: '门店', name : 'id'}
				],*/
				sortname: "",
				sortorder: "",
				rp: 40,
				title: '平台账户明细'
			});
		});
	<?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
>
		$("#cashsubmit").click(function () {
			$(".cash-background").show();
			$(".cash-content").show();
        })

		$("#quxiaoBtn").click(function () {
            $(".cash-background").hide();
            $(".cash-content").hide();

        })

        //按钮先执行验证再提交表单
        $("#submitBtn").click(function(){
            if($("#form1").valid()){
                var fomedata = $("#form1").serialize();
                $.ajax({
                    url:'apply_sys_cash',
                    type:'post',
                    data:fomedata,
                    dataType:'json',
                    success:function(data){
                        if(data.state){
                            layer.msg(data.msg);
                            window.location.href = 'finance_account_sys';
                        }else{
                            layer.msg(data.msg);
                        }
                    }
                });
            }
        });

        $("#form1").validate({
            errorPlacement: function(error, element){
                var error_td = element.parent('dd').children('span.err');
                error_td.append(error);
            },
            rules : {
                cashNum : {
                    required: true
                }
            },
            messages : {
                cashNum : {
                    required : '<i class="fa fa-exclamation-circle"></i>提现金额不能为空',
                }
            }
        });
	<?php echo '</script'; ?>
>

	</html><?php }
}
