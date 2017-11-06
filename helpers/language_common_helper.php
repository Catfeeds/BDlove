<?php
/**
 * 公共语言
 */
defined('BASEPATH') OR exit('No direct script access allowed');
function language_common(){
	$this->config->set_item($_LANG['go_back'],'返回上一页');
    $this->config->set_item($_LANG['handle_jump'],'页面如不能自动跳转，请选择手动操作...');
    $this->config->set_item($_LANG['system_message'],'系统消息');
	/*
$_LANG['go_back']				= '返回上一页';
$_LANG['system_message']		= '系统消息';
$_LANG['auto_redirection'] 		= '如果您不做出选择，将在 <span id="spanSeconds">3</span> 秒后跳转到第一个链接地址。';
$_LANG['priv_error'] 			= '对不起,您没有执行此项操作的权限!';
$_LANG['errand_store']			= '全民跑客电商后台';
$_LANG['handle_jump']			= '页面如不能自动跳转，请选择手动操作...';
$_LANG['system_message']		= '系统消息';
$_LANG['unknown_error']			= '未知错误，请稍后重试！';



$_LANG['loading'] = '正在处理您的请求...';

/**
 * 管理员日志语言
 */
 /*
$_LANG['log_action']['add']				= '增加';
$_LANG['log_action']['del']				= '删除';
$_LANG['log_action']['edit']			= '修改';
$_LANG['log_action']['disable']			= '禁用';
$_LANG['log_action']['export']          = '导出数据';

$_LANG['log_action']['admin_log']				= '管理员日志';
$_LANG['log_action']['sms']				        = '短信接口';
$_LANG['log_action']['sms_tpl']				    = '短信模板';
$_LANG['log_action']['admin_user']				= '管理员';
$_LANG['log_action']['role']					= '后台角色';
$_LANG['log_action']['img_upload_set']			= '图片上传设置';
$_LANG['log_action']['advertisement']			= '广告';
$_LANG['log_action']['ads_position']			= '广告位';
$_LANG['log_action']['flow_list']				= '平台账户流水';
$_LANG['log_action']['account_list']			= '资金账号';
$_LANG['log_action']['user_account_flow']		= '用户账户流水';
return $_LANG;*/
}
?>