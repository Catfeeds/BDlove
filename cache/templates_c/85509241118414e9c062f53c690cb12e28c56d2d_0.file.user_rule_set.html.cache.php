<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:08
  from "D:\www\yunjuke\application\admin\views\user_rule_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022c0891542_30130490',
  'file_dependency' => 
  array (
    '85509241118414e9c062f53c690cb12e28c56d2d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\user_rule_set.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598022c0891542_30130490 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4159598022c06f7264_97850512';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.input-text{
	width:80px !important;
	height:30px !important;
}
.tit{
	width:10% !important;
	margin-right:5% !important;
}
.opt{
	width:50% !important;
}
.points_reg{
	margin-top:5px;
}
p{
	color:#ccc;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>积分管理</h3>
        <h5>商城会员积分管理及获取日志</h5>
      </div>
      <ul class="tab-base nc-row">
        <li><a href="user_integral_detail" >积分明细</a></li>
        <li><a href="JavaScript:void(0);" class="current">规则设置</a></li>
        <li><a href="user_integral_change">积分增减</a></li>
        <li><a href="user_integral_rate">积分抵用比率</a></li>
        <li><a href="user_integral_grade">积分等级</a></li>
      </ul>
    </div>
  </div>
  <form method="post" name="settingForm" id="settingForm">
    <div class="ncap-form-default">
      <div class="title">
        <h3>会员日常获取积分设定</h3>
      </div>
      <dl class="row">
        <dt class="tit">是否显示积分</dt>
        <dd class="opt">
          <input id="points_reg" name="points_show" value="1" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['points_show']) && $_smarty_tpl->tpl_vars['user_rule']->value['points_show'] == 1) {?>checked<?php }?> class="" type="radio">是
          <input id="points_reg" name="points_show" value="2" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['points_show']) && $_smarty_tpl->tpl_vars['user_rule']->value['points_show'] == 2) {?>checked<?php }?> class="" type="radio">否
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">会员积分名称</dt>
        <dd class="opt">
          <input id="points_reg" name="points_name" value="<?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['points_name'])) {
echo $_smarty_tpl->tpl_vars['user_rule']->value['points_name'];
}?>" class="input-text" type="text">
          <p>可个性化显示积分单位，如金币，元宝等</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">商品实付1元得</dt>
        <dd class="opt">
        <?php
$_from = $_smarty_tpl->tpl_vars['grade']->value;
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
          <?php echo $_smarty_tpl->tpl_vars['v']->value['mld_name'];?>
&nbsp;&nbsp;<input id="points_reg" name="points_reg[<?php echo $_smarty_tpl->tpl_vars['v']->value['mld_id'];?>
]" value="<?php if (isset($_smarty_tpl->tpl_vars['v']->value['points'])) {
echo $_smarty_tpl->tpl_vars['v']->value['points'];
}?>" class="input-text points_reg" type="number">&nbsp;&nbsp;积分<br>
        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
          <p>若不赠送积分则填0；商品实付额：若订单使用了优惠券等优惠活动，会将优惠额均摊到订单所有商品上，如订单有商品A，原价为105.00元，使用10元优惠券，则该商品实付额为90.50元，其中不满1元不计积分（0.5不计积分）。</p>
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">支付类型限制</dt>
        <dd class="opt">
          <select name="pay_type">
           <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['pay_type']) && $_smarty_tpl->tpl_vars['user_rule']->value['pay_type'] == 0) {?>selected<?php }?>>无限制</option>
           <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['pay_type']) && $_smarty_tpl->tpl_vars['user_rule']->value['pay_type'] == 1) {?>selected<?php }?>>仅现金</option>
           <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['pay_type']) && $_smarty_tpl->tpl_vars['user_rule']->value['pay_type'] == 2) {?>selected<?php }?>>仅现金或余额</option>
           <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['pay_type']) && $_smarty_tpl->tpl_vars['user_rule']->value['pay_type'] == 3) {?>selected<?php }?>>仅现金或充值卡</option>
          </select>
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">获得积分时间</dt>
        <dd class="opt">
          确认收货后评价商品可获得
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">评价导购可获得</dt>
        <dd class="opt">
          <input id="points_reg" name="points_guide" value="<?php if (isset($_smarty_tpl->tpl_vars['user_rule']->value['points_guide'])) {
echo $_smarty_tpl->tpl_vars['user_rule']->value['points_guide'];
}?>" class="input-text" type="number">&nbsp;&nbsp;积分
          <p>每次消费后评价导购都还获得。</p>
        </dd>
      </dl>

      
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
	$("#submitBtn").click(function(){
		if($("#settingForm").valid()){
			var data = new FormData($('#settingForm')[0]);
			$.ajax({
				data:data,
				type:'post',
				dataType:'json',
				url:"<?php echo base_url();?>
admin.php/User/user_rule_update",
				cache: false,
               	processData: false,
                contentType: false,
				success:function(res){
					if(res=="success"){
						layer.alert('积分规则设置成功');
					}else if(res=="points_reg"){
						layer.alert('会员注册  不能为空');
					}else if(res=="points_login"){
						layer.alert('会员每天登陆   不能为空');
					}else if(res=="points_comments"){
						layer.alert('订单商品评论  不能为空');
					}else if(res=="points_orderrate"){
						layer.alert('消费额与赠送积分比例   不能为空');
					}else if(res=="points_ordermax"){
						layer.alert('每订单最多赠送积分 不能为空');
					}else{
						layer.alert('积分规则设置失败');
					}
				}
			});
		}
	});
	

})
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
