<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:47:39
  from "D:\www\yunjuke\application\admin\views\finance_set_account.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598442bb09b045_01890651',
  'file_dependency' => 
  array (
    '91915fb1f29a04ba61f532cd991b8c37cf86615e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_set_account.html',
      1 => 1501740383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598442bb09b045_01890651 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '14472598442bad7fc36_79942510';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>平台绑定银行卡</h3>
        <h5>平台绑定银行卡信息</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
      <ul>
      	<li>设置平台绑定的银行卡信息，请认真核实银行卡卡号</li>
      </ul>
  </div>
  <form method="post" action="" id="form1" name="form1">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>开户银行：</label>
        </dt>
        <dd class="opt">
          <input id="bankName" name="bankName" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_name']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_name']->value;
}?>" class="input-txt" type="text"/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>银行卡号：</label>
        </dt>
        <dd class="opt">
          <input id="bankCode" name="bankCode" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_usn']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_usn']->value;
}?>" class="input-txt" type="number"/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>银行卡开户人：</label>
        </dt>
        <dd class="opt">
          <input id="bankUname" name="bankUname" value="<?php if (isset($_smarty_tpl->tpl_vars['bind_bank_uname']->value)) {
echo $_smarty_tpl->tpl_vars['bind_bank_uname']->value;
}?>" class="input-txt" type="text"/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <div class="bot">
        <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a>
      </div>
    </div>
  </form>
</div>
<div id="goTop">
  <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
  <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>

</body>
</html>
<?php echo '<script'; ?>
>

    //按钮先执行验证再提交表单
    $("#submitBtn").click(function(){
        if($("#form1").valid()){
            /*if($("#bankCode").next().text()!=''){
                $("#bankCode").next().html('<label class="error">银行卡号不正确！</label>');
                return;
            }*/
            var fomedata = $("#form1").serialize();
            $.ajax({
                url:'edit_sys_bank',
                type:'post',
                data:fomedata,
                dataType:'json',
                success:function(data){
                    if(data.state){
                        layer.msg('修改成功');
                        window.location.href = 'finance_set_account';
                    }else{
                        layer.msg('修改失败');
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
            bankName : {
                required : true,
            },
            bankCode : {
                required : true,
            },
            bankUname:{
                required : true,
            }
        },
        messages : {
            bankName : {
                required : '<i class="fa fa-exclamation-circle"></i>银行名不能为空',
            },
            bankCode : {
                required : '<i class="fa fa-exclamation-circle"></i>银行卡号不能为空',
            },
            bankUname : {
                required : '<i class="fa fa-exclamation-circle"></i>银行卡开户人不能为空',
            }
        }
    });

/*    $("#bankCode").blur(function () {
        var code=$(this).val();
        var reg = /^(\d{16}|\d{19})$/;
        if(!reg.test(code)){
            $(this).next().html('<label class="error">银行卡号不正确！</label>');
        }else {
            $(this).next().html('');
        }
    })*/


<?php echo '</script'; ?>
><?php }
}
