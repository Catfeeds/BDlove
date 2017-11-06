<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:14
  from "D:\www\yunjuke\application\admin\views\user_integral_rate.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022c620e9b4_45146652',
  'file_dependency' => 
  array (
    'c4cb236dd4c4e6d804c53ac79d9cdeac70bd4c49' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\user_integral_rate.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598022c620e9b4_45146652 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '29019598022c614b488_30385327';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
        <li><a href="user_rule_set">规则设置</a></li>
        <li><a href="user_integral_change">积分增减</a></li>
        <li><a href="JavaScript:void(0);" class="current">积分抵用比率</a></li>
        <li><a href="user_integral_grade">积分等级</a></li>
      </ul>
    </div>
  </div>
  <form method="post" name="settingForm" id="settingForm">
    <div class="ncap-form-default">
      <div class="title">
        <h3>会员积分抵用比率设定</h3>
      </div>
      <dl class="row">
        <dt class="tit">积分比例</dt>
        <dd class="opt">
          <input id="points_orderrate" name="integral_rate" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" class="input-txt" type="text">
          <p class="notic">例:设置为1000，表明消费1000积分抵用1单位货币</p>
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
            var data = $('#settingForm').serialize();
            $.ajax({
                data:data,
                type:'post',
                dataType:'json',
                url:"<?php echo base_url();?>
admin.php/User/user_integral_rate_set",
                success:function(res){
                    if(res=="success"){
                        layer.alert('积分积分抵用比率设置成功');
                    }else{
                        layer.alert('积分积分抵用比率设置失败');
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
