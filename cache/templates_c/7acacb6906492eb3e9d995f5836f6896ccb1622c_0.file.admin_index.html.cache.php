<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:55:32
  from "E:\www\yunjuke\application\admin\views\admin_index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd5b1463f823_28821172',
  'file_dependency' => 
  array (
    '7acacb6906492eb3e9d995f5836f6896ccb1622c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\admin_index.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fd5b1463f823_28821172 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '187758fd5b1456f4d5_35462474';
?>
<!doctype html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>网渠通系统系统管理平台</title>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
/js/skin/layer.css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/common.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/jquery.cookie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/jquery.bgColorSelector.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/admincp.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/ajaxfileupload.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
/js/layer.js"><?php echo '</script'; ?>
>
</head>

<body style="background-color: rgb(70, 142, 51);">
<!--<div class="admincp-header">
    <div class="admincp-name flo_left ml-10">
        <a href="<?php echo base_url();?>
" class=""><img src="<?php echo TEMPLE;?>
/images/logo-160x45-white.png" alt=""></a>
    </div>
    <div class="flo_left xtzhx">系统管理中心</div>
    <div id="foldSidebar">
        <i class="fa fa-outdent " title="展开/收起侧边导航"></i>
    </div>
    &lt;!&ndash;展开/收起侧边导航&ndash;&gt;
    <div class="nc-module-menu ml-10">
        <ul class="nc-row">
            <?php
$_from = $_smarty_tpl->tpl_vars['menu_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_0_saved_item = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu'] : false;
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$__foreach_menu_0_saved_local_item = $_smarty_tpl->tpl_vars['menu'];
?>
            <li data-param="<?php echo $_smarty_tpl->tpl_vars['menu']->value['args'];?>
"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['menu']->value['text'];?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_local_item;
}
if ($__foreach_menu_0_saved_item) {
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_item;
}
?>
        </ul>
    </div>
    <div class="admincp-header-r">
        <div class="manager">
            <dl>
                <dt class="name"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</dt>
                <dd class="group"><?php echo $_smarty_tpl->tpl_vars['role_name']->value;?>
</dd>
            </dl>
        </span>
        </div>
        <ul class="operate nc-row">
            <li style="" nctype="pending_matters"><a class="toast show-option" href="javascript:void(0);" onclick="" title="查看待处理事项">&nbsp;<em>0</em></a></li>
            <li><a class="homepage show-option" target="_blank" href="#" title="新窗口打开网站首页">&nbsp;</a></li>
            <li><a class="siting show-option" target="_blank" href="#" title="设置按钮">&nbsp;</a></li>
            <li><a class="login-out show-option" href="login/logout" title="安全退出管理中心">&nbsp;</a></li>
        </ul>
    </div>

    <div class="clear"></div>
</div>-->
<div class="admincp-header">
    <div class="bgSelector"></div>
    <div id="foldSidebar"><i class="fa fa-outdent " title="展开/收起侧边导航"></i></div>
    <div class="admincp-name">
        <h1>聚客S2S2O</h1>

        <h2>新零售多门店线上线下系统</h2>
    </div>
    <div class="nc-module-menu">
        <ul class="nc-row">
            <ul class="nc-row">
                <?php
$_from = $_smarty_tpl->tpl_vars['menu_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_1_saved_item = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu'] : false;
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$__foreach_menu_1_saved_local_item = $_smarty_tpl->tpl_vars['menu'];
?>
                <li data-param="<?php echo $_smarty_tpl->tpl_vars['menu']->value['args'];?>
"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['menu']->value['text'];?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_1_saved_local_item;
}
if ($__foreach_menu_1_saved_item) {
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_1_saved_item;
}
?>
            </ul>
        </ul>
    </div>
    <div class="admincp-header-r">
        <div class="manager">
            <dl>
                <dt class="name"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</dt>
                <dd class="group"><?php echo $_smarty_tpl->tpl_vars['role_name']->value;?>
</dd>
            </dl>
      <span class="avatar">
      <input name="_pic" type="file" class="admin-avatar-file" id="_pic" title="设置管理员头像">
      <img alt="" nctype="admin_avatar" src=""> </span><i class="arrow" id="admin-manager-btn" title="显示快捷管理菜单"></i>

            <div class="manager-menu">
                <div class="title">
                    <h4>最后登录</h4>
                    <a href="javascript:void(0);" onclick="" class="edit-password">修改密码</a></div>
                <div class="login-date">
                    2016-10-21 14:44:43          <span>(IP:118.113.42.246          )</span></div>
                <div class="title">
                    <h4>常用操作</h4>
                    <a href="javascript:void(0)" class="add-menu">添加菜单</a></div>
                <ul class="nc-row" nctype="quick_link">
                    <li><a href="javascript:void(0);" onclick="openItem('system|cache')">清理缓存</a></li>
                </ul>
            </div>
        </div>
        <ul class="operate nc-row">
            <li style="" nctype="pending_matters"><a class="toast show-option" href="javascript:void(0);" onclick="" title="查看待处理事项">&nbsp;<em>12</em></a></li>
            <li><a class="sitemap show-option" nctype="map_on" href="javascript:void(0);" title="查看全部管理菜单">&nbsp;</a></li>
            <li><a class="homepage show-option" target="_blank" href="" title="新窗口打开商城首页">&nbsp;</a></li>
            <li><a class="login-out show-option" href="login/logout" title="安全退出管理中心">&nbsp;</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!--header标签结束-->
<div class="admincp-container unfold">
    <div class="admincp-container-left">
        <div class="top-border">
            <span class="nav-side"></span><span class="sub-side"></span>
        </div>
        <?php
$_from = $_smarty_tpl->tpl_vars['menu_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_2_saved_item = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu'] : false;
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$__foreach_menu_2_saved_local_item = $_smarty_tpl->tpl_vars['menu'];
?>
        <div id="admincpNavTabs_<?php echo $_smarty_tpl->tpl_vars['menu']->value['args'];?>
" class="nav-tabs">
            <?php
$_from = $_smarty_tpl->tpl_vars['menu']->value['content'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_sonmenu_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu'] : false;
$__foreach_sonmenu_3_saved_item = isset($_smarty_tpl->tpl_vars['sonmenu']) ? $_smarty_tpl->tpl_vars['sonmenu'] : false;
$_smarty_tpl->tpl_vars['sonmenu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu'] = new Smarty_Variable(array('index' => -1));
$_smarty_tpl->tpl_vars['sonmenu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['sonmenu']->value) {
$_smarty_tpl->tpl_vars['sonmenu']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu']->value['index']++;
$__foreach_sonmenu_3_saved_local_item = $_smarty_tpl->tpl_vars['sonmenu'];
?>
            <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-<?php echo $_smarty_tpl->tpl_vars['menu']->value['args'];?>
-<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu']->value['index'] : null);?>
 iconfont"></span>

                        <h3><?php echo $_smarty_tpl->tpl_vars['sonmenu']->value['text'];?>
</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                        <?php
$_from = $_smarty_tpl->tpl_vars['sonmenu']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_list_4_saved_item = isset($_smarty_tpl->tpl_vars['list']) ? $_smarty_tpl->tpl_vars['list'] : false;
$_smarty_tpl->tpl_vars['list'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['list']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
$__foreach_list_4_saved_local_item = $_smarty_tpl->tpl_vars['list'];
?>
                        <li><a href="javascript:void(0);" data-param="<?php echo $_smarty_tpl->tpl_vars['menu']->value['args'];?>
|<?php echo $_smarty_tpl->tpl_vars['list']->value['args'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['text'];?>
</a>
                        </li>
                        <?php
$_smarty_tpl->tpl_vars['list'] = $__foreach_list_4_saved_local_item;
}
if ($__foreach_list_4_saved_item) {
$_smarty_tpl->tpl_vars['list'] = $__foreach_list_4_saved_item;
}
?>
                    </ul>
                </dd>
            </dl>
            <?php
$_smarty_tpl->tpl_vars['sonmenu'] = $__foreach_sonmenu_3_saved_local_item;
}
if ($__foreach_sonmenu_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sonmenu'] = $__foreach_sonmenu_3_saved;
}
if ($__foreach_sonmenu_3_saved_item) {
$_smarty_tpl->tpl_vars['sonmenu'] = $__foreach_sonmenu_3_saved_item;
}
?>
        </div>
        <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_2_saved_local_item;
}
if ($__foreach_menu_2_saved_item) {
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_2_saved_item;
}
?>
        <!--平台结束-->

        <div class="about" title="" onclick="ajax_form(1,'about', 'index.php', '', '');">
            <i class="fa fa-copyright"></i><span>网渠通</span>
        </div>
    </div>
    <div class="admincp-container-right">
        <div class="top-border"></div>
        <iframe src="" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%"
                height="94%" scrolling="yes" onload="window.parent"></iframe>
    </div>
</div>
<?php echo '<script'; ?>
>
    function test(url) {
        $('#workspace').attr('src', url);
    }
    /*待处理事项弹出框*/
    $(".admincp-header-r li:eq(0)").on("click", function () {
        layer.open({
            type: 1,
            title: '<b>待处理事项</b>',
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '240px'], //宽高
            content: '<div class="pd-10">' +
            '<table class="table">' +
            '<tr> ' +
            '<td class="text-c"><div class="text-overflow" style="width: 80px;">张三—订单</div></td>' +
            '<td class="text-l text-overflow"><a href="" class="f-14 text-overflow" style="color:#3B639F;display: block;width:280px"><i class="iconfont">&#xe606;</i>有20个下单72超过小时未通知到货的订单</a></td> ' +
            '</tr>' +
            '</table>' +
            '</div>'
        });
    })
<?php echo '</script'; ?>
>
</body>

</html><?php }
}
