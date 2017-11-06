<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:29:35
  from "D:\www\yunjuke\application\admin\views\finance_edit_bind_bank.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598049ff2951b8_77058583',
  'file_dependency' => 
  array (
    '8e5d4091bffa3a76c68d2759d8b21e4070d7f12d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_edit_bind_bank.html',
      1 => 1501117854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598049ff2951b8_77058583 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '28955598049ff17bd70_35876428';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <a class="back" href="javascript:history.back();" title="返回列表">
        <i class="fa fa-arrow-circle-o-left"></i>
      </a>
      <div class="subject">
        <h3>门店绑定银行卡</h3>
        <h5>修改绑定银行卡</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
  </div>
  <form method="post" action="" id="form1" name="form1">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>门店名称：</label>
        </dt>
        <dd class="opt">
          <input id="sname" name="sname" value="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['store_name'])) {
echo $_smarty_tpl->tpl_vars['row']->value['store_name'];
}?>" class="input-txt" type="text" disabled/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>开户银行：</label>
        </dt>
        <dd class="opt">
          <input id="bankName" name="bankName" value="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['bind_bank_name'])) {
echo $_smarty_tpl->tpl_vars['row']->value['bind_bank_name'];
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
          <input id="bankCode" name="bankCode" value="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['bind_bank_usn'])) {
echo $_smarty_tpl->tpl_vars['row']->value['bind_bank_usn'];
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
          <input id="bankUname" name="bankUname" value="<?php if (isset($_smarty_tpl->tpl_vars['row']->value['bind_bank_uname'])) {
echo $_smarty_tpl->tpl_vars['row']->value['bind_bank_uname'];
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
            url:'../edit_bind_bank_submit?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['store_id'];?>
',
            type:'post',
            data:fomedata,
            dataType:'json',
            success:function(data){
                if(data.state){
                    layer.msg('修改成功');
                    window.location.href = '../finance_account_store';
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

/*$("#bankCode").blur(function () {
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
