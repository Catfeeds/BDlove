<?php
/* Smarty version 3.1.29, created on 2017-05-31 18:36:04
  from "D:\www\yunjuke\application\admin\views\weixin_auth.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_592e9c94e65758_54243268',
  'file_dependency' => 
  array (
    '381a61a89610bbd5095cf2dcf0f6d8ad0090315c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\weixin_auth.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_592e9c94e65758_54243268 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13765592e9c94ba2635_59818164';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
span.red{color:red;}
span.green{color:#00BB9C;}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>微信公众号授权</h3>
        <h5>对接微商城所关联的微信公众号</h5>
      </div>
      </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
<li> 若绑定洽客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
<li>仅微信认证后的服务号可使用完整洽客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li>
    </ul>
  </div>
  <form method="post" id="form_email" action="setting" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">公众微信号：</dt>
        <dd class="opt">
           <?php if (isset($_smarty_tpl->tpl_vars['weixin_auther_info']->value['alias'])) {
echo $_smarty_tpl->tpl_vars['weixin_auther_info']->value['alias'];
} else { ?>--<?php }?>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">公众号昵称：</dt>
        <dd class="opt">
          <?php if (isset($_smarty_tpl->tpl_vars['weixin_auther_info']->value['nick_name'])) {
echo $_smarty_tpl->tpl_vars['weixin_auther_info']->value['nick_name'];
} else { ?>--<?php }?>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">公众号类型：</dt>
        <dd class="opt">
          <?php if (!isset($_smarty_tpl->tpl_vars['weixin_auther_info']->value['verify_type_info'])) {?>-<?php }
if (!isset($_smarty_tpl->tpl_vars['weixin_auther_info']->value['service_type_info'])) {?>-<?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['verify_type']->value[$_smarty_tpl->tpl_vars['weixin_auther_info']->value['verify_type_info']['id']])) {
echo $_smarty_tpl->tpl_vars['verify_type']->value[$_smarty_tpl->tpl_vars['weixin_auther_info']->value['verify_type_info']['id']];
}
if (isset($_smarty_tpl->tpl_vars['service_type']->value[$_smarty_tpl->tpl_vars['weixin_auther_info']->value['service_type_info']['id']])) {
echo $_smarty_tpl->tpl_vars['service_type']->value[$_smarty_tpl->tpl_vars['weixin_auther_info']->value['service_type_info']['id']];
}?>
          <p class="notic">账号升级后，请重新授权微信公众号</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">微信接口状态：</dt>
        <dd class="opt">
           <table class="table table-border table-bordered table-bg">
  <thead class="text-c">
    <tr>
       <th>消息及自定义菜单管理</th>
      <th>用户管理</th>
      <th>二维码获取</tthd>
      <th>网页授权</th>
    </tr>
  </thead>
  <tbody>
    <tr  class="text-c">
      <td><?php if (!in_array(15,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info']) && in_array(1,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="red">设置公众号微信菜单。</span><?php } else { ?>设置公众号微信菜单。<?php }
if (!in_array(1,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info']) && in_array(15,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="red">微信粉丝关注及相关消息处理，如首访语</span><?php } else { ?>微信粉丝关注及相关消息处理，如首访语<?php }?></td>
      <td>获取用户基本信息接口，如微信昵称、性别、头像等。需"网页授权"权限才可使用</td>
      <td>用于生成导购专属公众号二维码。</td>
      <td>用于微信用户直接登陆洽客商城页面。</td>
    </tr>
    <tr class="text-c">
      <td><?php if (in_array(1,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info']) || in_array(15,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="green"><i class="fa fa-check-circle"></i>已获得</span><?php } else { ?><span class="red"><i class="fa fa-times-circle"></i>未获得</span><?php }?></td>
      <td><?php if (in_array(2,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="green"><i class="fa fa-check-circle"></i>已获得</span><?php } else { ?><span class="red"><i class="fa fa-times-circle"></i>未获得</span><?php }?></td>
      <td><?php if (in_array(3,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="green"><i class="fa fa-check-circle"></i>已获得</span><?php } else { ?><span class="red"><i class="fa fa-times-circle"></i>未获得</span><?php }?></td>
      <td><?php if (in_array(4,$_smarty_tpl->tpl_vars['weixin_auth_info']->value['func_info'])) {?><span class="green"><i class="fa fa-check-circle"></i>已获得</span><?php } else { ?><span class="red"><i class="fa fa-times-circle"></i>未获得</span><?php }?></td>
    </tr>
   
  </tbody>
</table>
        </dd>
      </dl>
      <div class="bot">
     <?php if (empty($_smarty_tpl->tpl_vars['weixin_auther_info']->value)) {?>
         <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="_blank" class="btn btn-danger radius" id="getup">公众号授权</a>
     <?php } else { ?>
	     <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="_blank" class="btn btn-warning radius" id="getup">重新授权</a>
	     <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" target="_blank" class="btn btn-danger radius ml-20" id="getup">更换公众号</a>
     <?php }?>
      </div>
    </div>
  </form>
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
