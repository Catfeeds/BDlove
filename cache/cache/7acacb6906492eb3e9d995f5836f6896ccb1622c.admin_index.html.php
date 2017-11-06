<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:55:32
  from "E:\www\yunjuke\application\admin\views\admin_index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd5b147bc4c9_66404480',
  'file_dependency' => 
  array (
    '7acacb6906492eb3e9d995f5836f6896ccb1622c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\admin_index.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd5b147bc4c9_66404480 ($_smarty_tpl) {
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
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views//css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views//css/index.css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views//css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views//css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views//js/skin/layer.css"/>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/jquery.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/jquery.cookie.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/jquery.bgColorSelector.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/admincp.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/layer.js"></script>
</head>

<body style="background-color: rgb(70, 142, 51);">
<!--<div class="admincp-header">
    <div class="admincp-name flo_left ml-10">
        <a href="http://[::1]/yunjuke/" class=""><img src="http://[::1]/yunjuke/application/admin/views//images/logo-160x45-white.png" alt=""></a>
    </div>
    <div class="flo_left xtzhx">系统管理中心</div>
    <div id="foldSidebar">
        <i class="fa fa-outdent " title="展开/收起侧边导航"></i>
    </div>
    &lt;!&ndash;展开/收起侧边导航&ndash;&gt;
    <div class="nc-module-menu ml-10">
        <ul class="nc-row">
                        <li data-param="system"><a href="javascript:void(0);">平台</a></li>
                        <li data-param="shops"><a href="javascript:void(0);">商城</a></li>
                        <li data-param="weixin"><a href="javascript:void(0);">微信</a></li>
                        <li data-param="app"><a href="javascript:void(0);">手机端</a></li>
                    </ul>
    </div>
    <div class="admincp-header-r">
        <div class="manager">
            <dl>
                <dt class="name">lg</dt>
                <dd class="group">超级管理员</dd>
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
                                <li data-param="system"><a href="javascript:void(0);">平台</a></li>
                                <li data-param="shops"><a href="javascript:void(0);">商城</a></li>
                                <li data-param="weixin"><a href="javascript:void(0);">微信</a></li>
                                <li data-param="app"><a href="javascript:void(0);">手机端</a></li>
                            </ul>
        </ul>
    </div>
    <div class="admincp-header-r">
        <div class="manager">
            <dl>
                <dt class="name">lg</dt>
                <dd class="group">超级管理员</dd>
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
                <div id="admincpNavTabs_system" class="nav-tabs">
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-system-0 iconfont"></span>

                        <h3>平台</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="system|web">站点设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/area">地区设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/upload">上传设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/set">邮件设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|sms/set">短信设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/logistics">物流管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/admin">权限管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/admin_log">操作日志</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|web/cache">清理缓存</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-system-1 iconfont"></span>

                        <h3>会员</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="system|Member/member_step_qq">帐号同步</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|Member/website_member_agreement">会员协议</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-system-2 iconfont"></span>

                        <h3>网站</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="system|Website/pic_mall_set">图片设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|Website/website_article_classify">文章分类</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="system|Website/website_article_management">文章管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                    </div>
                <div id="admincpNavTabs_shops" class="nav-tabs">
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-0 iconfont"></span>

                        <h3>设置</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_set">商城设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_pic_set">图片设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_search">搜索设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_news">消息通知</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_payment">支付方式</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_express">快递公司</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_express_interface">快递接口</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_express_tools">运费设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Mall/mall_template_management">模版管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-1 iconfont"></span>

                        <h3>店铺</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Stores/store_management">店铺管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Stores/store_shopping_guide">导购管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|stores/store_decoration">微商城装修</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|stores/store_area_setting">门店区域设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|stores/store_cashier">门店收银</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|stores/store_department">集合店管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-2 iconfont"></span>

                        <h3>商品</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_management">商品管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_classify_management">分类管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_self_taxonomy">自定义标签分类</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/code_segment">码段管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/code_segment_size">尺码管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_brand_management">品牌管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_type_management">类型管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Goods/goods_pic_room">图片空间</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-3 iconfont"></span>

                        <h3>会员</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|User/user_management">会员管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|User/user_integral_detail">积分管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-4 iconfont"></span>

                        <h3>交易</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Business/business_order">订单管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Business/business_refund_pending">退款管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Business/business_return_goods_pending">退货管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Business/business_consultation">咨询管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Business/business_evaluate_buyers">评价管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-5 iconfont"></span>

                        <h3>促销</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/couponOfNewman">新会员送券</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/CouponOfShopping">买后送券</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/qiangHongBao">抢红包</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/CouponOfSales">发券给导购</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/CouponOfReceive">领券活动</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/OfDiscount">满减满折</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/OfSeckill">天天闪购</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/specialPromotion">商品专题</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/OfLimitTimeDiscount">限时折扣</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/GameOfSign">签到</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/GameOfLottery">大转盘</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Promotion/GameOfScratch">刮刮卡</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-shops-6 iconfont"></span>

                        <h3>统计</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="shops|Statistics/sales_discount">限时折扣</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Statistics/sales_group">团购管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Statistics/sales_full_send">满就送</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="shops|Statistics/sales_together">拼团管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                    </div>
                <div id="admincpNavTabs_weixin" class="nav-tabs">
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-weixin-0 iconfont"></span>

                        <h3>设置</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="weixin|weixin/information_set">公众号授权</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="weixin|weixin/menu_management">菜单设置</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="weixin|weixin/reply_management">自动回复</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-weixin-1 iconfont"></span>

                        <h3>粉丝</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="weixin|follow/follow_management">粉丝管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                    </div>
                <div id="admincpNavTabs_app" class="nav-tabs">
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-app-0 iconfont"></span>

                        <h3>设置</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="app|App/app_version_manage">版本管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="app|App/app_version_feedback">用户反馈</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-app-1 iconfont"></span>

                        <h3>用户</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="app|App/App_user_manage">用户管理</a>
                        </li>
                                                <li><a href="javascript:void(0);" data-param="app|App/app_user_msg_manage">消息管理</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                        <dl>
                <dt>
                    <a href="javascript:void(0);">
                        <span class="ico-app-2 iconfont"></span>

                        <h3>统计</h3></a>
                </dt>
                <dd class="sub-menu">
                    <ul>
                                                <li><a href="javascript:void(0);" data-param="app|App/app_statistics">统计概况</a>
                        </li>
                                            </ul>
                </dd>
            </dl>
                    </div>
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
<script>
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
</script>
</body>

</html><?php }
}
