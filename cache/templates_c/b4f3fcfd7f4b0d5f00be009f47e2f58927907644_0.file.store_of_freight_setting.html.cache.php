<?php
/* Smarty version 3.1.29, created on 2017-07-06 14:53:50
  from "D:\www\yunjuke\application\admin\views\store_of_freight_setting.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595dde7e7698a5_80761700',
  'file_dependency' => 
  array (
    'b4f3fcfd7f4b0d5f00be009f47e2f58927907644' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_of_freight_setting.html',
      1 => 1496322119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_595dde7e7698a5_80761700 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13712595dde7e565e33_53779938';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
               <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>门店管理 - 门店<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_name'])) {?>(<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_name'];?>
)<?php }?>运费设置</h3>
						<h5>平台中的所有新闻的管理</h5>
					</div>
					<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_id'])) {?>
                <ul class="tab-base nc-row">
				        <li><a href="store_edit?op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">基本信息</a></li>
				        <li><a href="store_of_goods?op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">商品</a></li>
				        <li><a href="store_of_shopping_guide?op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">导购</a></li>
				        <li><a href="JavaScript:void(0);" class="current">运费</a></li>
				        <!-- <li><a href="store_of_notice_setting?op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">通知</a></li> -->
				        <li><a href="store_of_other?op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">其他</a></li>
			      </ul>
			      <?php }?>
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
           <input type="hidden" name="store_id" value="<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_id'])) {
echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];
}?>">
           <input type="hidden" name="store_name" value="<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_name'])) {
echo $_smarty_tpl->tpl_vars['store_data']->value['store_name'];
}?>">
            <div class="ncap-form-default">
                <dl class="row">
                   <dt class="tit">
                        <label for="store_arayacak">运费设置:</label>
                    </dt>
                    <dd class="opt">
                        <select name="store_arayacak" class="valid">
                            <?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['ept_id']) && !empty($_smarty_tpl->tpl_vars['store_data']->value['ept_id'])) {?>
                            <?php
$_from = $_smarty_tpl->tpl_vars['ept_arr']->value;
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ept_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['ept_id'] == $_smarty_tpl->tpl_vars['store_data']->value['ept_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['ept_name'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                            <?php } else { ?>
                            <option value="" >-请选择模板-</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['ept_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ept_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['ept_name'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
                            <?php }?>
                            
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
							<label for="qq_isuse_1" class="cb-enable <?php if (!isset($_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc']) || $_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc'] == 1) {?>selected<?php }?> " title="开启"><span>开启</span></label>
							<label for="qq_isuse_0" class="cb-disable <?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc']) && $_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc'] == 0) {?>selected<?php }?> " title="关闭"><span>关闭</span></label>
							<input type="radio" id="qq_isuse_1" name="qq_isuse" <?php if (!isset($_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc']) || $_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc'] == 1) {?>checked<?php }?>  value="1"  >
							<input type="radio" id="qq_isuse_0" name="qq_isuse" <?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc']) && $_smarty_tpl->tpl_vars['store_data']->value['is_show_ept_desc'] == 0) {?>checked<?php }?>   value="0"  >
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
                    					<textarea name="statistics_code" rows="6" class="tarea" id="statistics_code"><?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['ept_show_desc'])) {
echo $_smarty_tpl->tpl_vars['store_data']->value['ept_show_desc'];
}?></textarea>
											<p class="notic">若消费者选择自提，自提说明将在下单的时候显示，如右图。</br>
												自提说明填写示例如下，"门店自提说明"为标题不需要重复填写。</br>
												1.付款成功后，请在七天内前往门店进行自提。</br>
												2.付款后订单将会显示提货码，凭提货码即可自提。</p>
                    				</td>
                    				<td  align="left">
                    					 <img width="230"  height="380" src="<?php echo TEMPLE;?>
images/store_freight_setting.png"/>
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
<?php echo '<script'; ?>
 type="text/javascript">

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
<?php echo '</script'; ?>
>
</html>
<?php }
}
