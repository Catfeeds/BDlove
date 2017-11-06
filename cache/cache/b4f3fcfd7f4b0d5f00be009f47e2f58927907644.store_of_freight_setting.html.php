<?php
/* Smarty version 3.1.29, created on 2017-07-06 14:53:50
  from "D:\www\yunjuke\application\admin\views\store_of_freight_setting.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595dde7e84c1e7_74771646',
  'file_dependency' => 
  array (
    'b4f3fcfd7f4b0d5f00be009f47e2f58927907644' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_of_freight_setting.html',
      1 => 1496322119,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1497237694,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_595dde7e84c1e7_74771646 ($_smarty_tpl) {
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css"> 
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
	layer.msg(data.msg);
	 setTimeout(function(){
		    if(demo=='agent'){
		    	window.location.href="http://[::1]/yunjuke/index.php/login";
		    }else if(demo=='supp'){
		    	window.location.href="http://[::1]/yunjuke/supplier.php/login";
		    }else if(demo=='admin'){
		    	window.location.href="http://[::1]/yunjuke/admin.php/login";
		    }else if(demo=='shop'){
		    	window.location.href="http://[::1]/yunjuke/index.php/index/login";
		    }else if(demo=='shopadmin'){
		    	window.location.href="http://[::1]/yunjuke/admin.php/index/login";
		    }
	    },2000);
}
</script>
</head>
<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
               <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>门店管理 - 门店(射洪-品牌店)运费设置</h3>
						<h5>平台中的所有新闻的管理</h5>
					</div>
					                <ul class="tab-base nc-row">
				        <li><a href="store_edit?op=edit&id=44">基本信息</a></li>
				        <li><a href="store_of_goods?op=edit&id=44">商品</a></li>
				        <li><a href="store_of_shopping_guide?op=edit&id=44">导购</a></li>
				        <li><a href="JavaScript:void(0);" class="current">运费</a></li>
				        <!-- <li><a href="store_of_notice_setting?op=edit&id=44">通知</a></li> -->
				        <li><a href="store_of_other?op=edit&id=44">其他</a></li>
			      </ul>
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
        <form method="post" id="settingForm" name="settingForm" action="store_freight_set">
           <input type="hidden" name="store_id" value="44">
           <input type="hidden" name="store_name" value="射洪-品牌店">
            <div class="ncap-form-default">
                <dl class="row">
                   <dt class="tit">
                        <label for="store_arayacak">运费设置:</label>
                    </dt>
                    <dd class="opt">
                        <select name="store_arayacak" class="valid">
                                                                                    <option value="6" >圆通快递</option>
                                                        <option value="5" >申通快递</option>
                                                        <option value="4" selected>顺丰快递</option>
                                                                                    
                        </select><span class="err"></span>
                        <p class="notic">快递模版请在快递管理处新增或者编辑删除等操作</p>
                        
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="store_arayacak">是否显示自提说明:</label>
                    </dt>
                    <dd class="opt">
						<div class="onoff">
							<label for="qq_isuse_1" class="cb-enable  " title="开启"><span>开启</span></label>
							<label for="qq_isuse_0" class="cb-disable selected " title="关闭"><span>关闭</span></label>
							<input type="radio" id="qq_isuse_1" name="qq_isuse"   value="1"  >
							<input type="radio" id="qq_isuse_0" name="qq_isuse" checked   value="0"  >
						</div>
						<p class="notic">商户下的门店为区域性，部分区域为经销商自治；不期望经销商A的客户看到其他经销商，已保证经销商利益，可使用本功能</p>
				   </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="store_arayacak">自提显示说明:</label>
                    </dt>
                    <dd class="opt">
                    	<table>
                    		<tbody>
                    			<tr>
                    				<td width="450">
                    					<textarea name="statistics_code" rows="6" class="tarea" id="statistics_code">付款后订单将会显示提货码，凭提货码即可自提</textarea>
											<p class="notic">若消费者选择自提，自提说明将在下单的时候显示，如右图。</br>
												自提说明填写示例如下，"门店自提说明"为标题不需要重复填写。</br>
												1.付款成功后，请在七天内前往门店进行自提。</br>
												2.付款后订单将会显示提货码，凭提货码即可自提。</p>
                    				</td>
                    				<td  align="left">
                    					 <img width="230"  height="380" src="http://[::1]/yunjuke/application/admin/views/images/store_freight_setting.png"/>
                    				</td>
                    			</tr>
                    		</tbody>
                    	</table>
						
				   </dd>
                </dl>
                <div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
            </div>
        </form>
    </div>
  
    <div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">

  $(document).ready(function(){
	  valid_rule = {
			  store_arayacak : {
		            required : true,
		          },
		        };
	  valid_msg = {
			  store_arayacak : {
	              required : '<i class="icon-exclamation-sign">请选择运费模板</i>',
	            },
	          };
	  $("#settingForm").validate({
	      errorPlacement: function(error, element){
	        var error_td = element.parents('dl').find('span.err');
	        error_td.append(error);
	      },
	      rules : valid_rule,
	      messages : valid_msg
	    });
		$('#submitBtn').click(function(){
			  
		    $('#settingForm').submit();
			 
		})
  })
</script>
</html>
<?php }
}
