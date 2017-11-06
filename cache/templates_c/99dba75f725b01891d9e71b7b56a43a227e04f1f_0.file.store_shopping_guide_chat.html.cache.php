<?php
/* Smarty version 3.1.29, created on 2017-04-22 17:02:12
  from "E:\www\yunjuke\application\vmall\views\store_shopping_guide_chat.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fb1c14cf78d5_44315044',
  'file_dependency' => 
  array (
    '99dba75f725b01891d9e71b7b56a43a227e04f1f' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\store_shopping_guide_chat.html',
      1 => 1492573310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fb1c14cf78d5_44315044 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1382958fb1c14c09f92_97897578';
?>
<html lang="zh-cn" ng-app="demo"><head>
<link rel="shortcut icon" href="<?php echo base_url();?>
/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_nike_name'];?>
</title>
<link href="<?php echo TEMPLE;?>
css/framework7.ios.messages.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
rongcloud/vendor/jqueryrebox/jquery-rebox-0.1.0.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
rongcloud/dist/css/RongIMWidget.css"/>



    
    
<style>
    .toptextarea{position: fixed;width: 100%;height: 100%;background: rgba(0,0,0,.6);z-index: 5001;display: none;}
    .toptextarea textarea{box-sizing:border-box;width: 100%;padding: 4px 8px;border:1px solid #c8c8cd;height: 32px;line-height: 22px;}
    .message .message-text{font-size:15px;}
    /* iphone4 */
    @media screen and (device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2){
        .message .message-text{font-size:14px;}
    }
    /* iphone5 */
    @media screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2){
        .message .message-text{font-size:14px;}
    }
</style>
</head>
    <body ng-controller="main">
		    <div class="salesInfo bdrbox" style="height: 100px;">
                <div class="wbox sales-info bdrbox">
                    <a href="../mall/salesProfile.htm?salesId=<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_id'];?>
" style="display:block;"><img src="<?php echo base_url();
echo $_smarty_tpl->tpl_vars['guide_info']->value['head_portrait'];?>
" class="size40 round"></a>
                    <div class="wbox-1 rel store-info">
                        <div class="sales">
                        	<span class="sales-name-box ell dib"><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_nike_name'];?>
</span>
                             <span class="onLineSatus c-8"></span>
                                                    </div>
                        <a href="../mall/getStoreHomePage.htm?storeId=191" class="store"><?php echo $_smarty_tpl->tpl_vars['guide_info']->value['area_name'];
echo $_smarty_tpl->tpl_vars['guide_info']->value['store_name'];?>
</a>
                    </div>
                    <!-- <a href="javascript:;" class="c-gr" id="infoFlod">收起</a> -->
                                    </div>
                <div class="wbox chat-menus bdrbox">
                    <div class="wbox-1"><a class="inStore" href="../mall/getStoreHomePage.htm?storeId=<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_store_id'];?>
"><i class="iconfont"></i> 进入店铺</a></div>
                    <div class="wbox-1"><a class="inStore" id="goTelephone" href="tel:<?php echo $_smarty_tpl->tpl_vars['guide_info']->value['spg_tel'];?>
"><i class="iconfont"></i> 致电导购</a></div>
                    <div class="wbox-1"><a class="newMsg" href="messageCenter.htm"><i class="iconfont"></i> 历史记录</a></div>
                </div>
            </div>
		  <input type="hidden" ng-bind="user">
          <input type="hidden" ng-model="targetId">

        
        <rong-widget></rong-widget>

    </body>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/vendor/jquery-2.2.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/vendor/angular-1.4.8.js"><?php echo '</script'; ?>
>

    <!-- 融云IMLib -->
    <?php echo '<script'; ?>
 src="http://cdn.ronghub.com/RongEmoji-2.2.4.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://cdn.ronghub.com/RongIMVoice-2.2.4.min.js"><?php echo '</script'; ?>
>

    <!-- 上传插件 -->
    <?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/vendor/plupload.full.min-2.1.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/vendor/qiniu-1.0.17.js"><?php echo '</script'; ?>
>

    <!-- 增强体验插件 -->
    <?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/vendor/jqueryrebox/jquery-rebox-0.1.0.js"><?php echo '</script'; ?>
>

    <!-- IM插件 -->
    <?php echo '<script'; ?>
 src="http://cdn.ronghub.com/RongIMLib-2.2.5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
rongcloud/dist/RongIMWidget.js"><?php echo '</script'; ?>
>   
<?php echo '<script'; ?>
>
var demo = angular.module("demo", ["RongWebIMWidget"]);

demo.controller("main", ["$scope", "WebIMWidget", "$http", function($scope, WebIMWidget, $http) {
    $scope.targetType = 1;
    $scope.targetId = '<?php echo $_smarty_tpl->tpl_vars['targetId']->value;?>
';
    var targetName = '<?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
';
    //注意实际应用中 appkey 、 token 使用自己从融云服务器注册的。
    WebIMWidget.init({
        appkey: "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['AppKey'];?>
",
        token: "<?php echo $_smarty_tpl->tpl_vars['getToken']->value['token'];?>
",
        displayConversationList: false,
        style:{
        	top:100,
            left:3,
            width:430
        },
        onSuccess: function(id) {
            $scope.user = id;
            document.title = '用户：' + id;
            console.log('连接成功：' + id);
        },
        onError: function(error) {
            console.log('连接失败：' + error);
        }
    });

    // 示例：获取 userinfo.json 中数据，根据 targetId 获取对应用户信息
    WebIMWidget.setUserInfoProvider(function(targetId,obj){
          var user = <?php echo $_smarty_tpl->tpl_vars['target']->value;?>
;
           if(user){
             obj.onSuccess({id:user.user_id,name:user.user_name,portraitUri:"<?php echo base_url();?>
"+user.head_portrait});
           }else{
             obj.onSuccess({id:targetId,name:"用户："+targetId});
           }
    });

    WebIMWidget.setGroupInfoProvider(function(targetId, obj){
        obj.onSuccess({
            name:'用户：'+targetName
        });
    })


    $scope.show = function() {
        WebIMWidget.show();
    };

    $scope.hidden = function() {
        WebIMWidget.hidden();
    };

    WebIMWidget.show();

    $(function(){
    	if (!!$scope.targetId) {
            WebIMWidget.setConversation(Number($scope.targetType), $scope.targetId, "用户：" + $scope.targetId);
            WebIMWidget.show();
        }
    });
}]);
<?php echo '</script'; ?>
>
</html><?php }
}
