<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:46:05
  from "D:\www\yunjuke\application\admin\views\website_article_management_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdd5dbbb606_82139693',
  'file_dependency' => 
  array (
    'fb2aca41cea6d663c652bef236304d9609e1c60b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_article_management_add.html',
      1 => 1492225975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdd5dbbb606_82139693 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15322597fdd5da19628_11312977';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="<?php echo base_url();?>
admin.php/Website/website_article_management" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>文章管理 - 新增文章</h3>
                <h5>网站系统文章索引与管理</h5>
            </div>
        </div>
    </div>
    <form id="article_form" method="post" name="articleForm">
        <input type="hidden" name="form_submit" value="ok">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="article_title" id="article_title" class="input-txt">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="cate_id"><em>*</em>所属分类</label>
                </dt>
                <dd class="opt">
                    <select name="ac_id" id="ac_id">
                        <option value="">-请选择-</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['Artclass']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
						 	 <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
						<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
                    </select>
                    <span class="err"></span>
                    <p class="notic">当选择发布“商城公告”时，还需要设置下面的“出现位置”项</p>
                </dd>
            </dl>
            <dl class="row" nctype="article_position" >
                <dt class="tit">
                    <label>出现位置</label>
                </dt>
                <dd class="opt">
                    <input id="article_position1" name="article_position" checked="checked" value="1" type="radio">
                    <label for="article_position1"><span>商城前台</span></label>
                    <input id="article_position2" name="article_position" value="2" type="radio">
                    <label for="article_position2"><span>买家中心</span></label>
                    <input id="article_position3" name="article_position" value="3" type="radio">
                    <label for="article_position3"><span>商家中心</span></label>
                    <input id="article_position4" name="article_position" value="4" type="radio">
                    <label for="article_position4"><span>全站</span></label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row" nctype="article_position" style="display: none">
                <dt class="tit">
                    <label>出现位置</label>
                </dt>
                <dd class="opt">
                    <input id="article_position1" name="article_position"  value="1" type="radio">
                    <label for="article_position1"><span>商城前台</span></label>
                    <input id="article_position2" name="article_position" value="2" type="radio">
                    <label for="article_position2"><span>买家中心</span></label>
                    <input id="article_position3" name="article_position" value="3" type="radio">
                    <label for="article_position3"><span>商家中心</span></label>
                    <input id="article_position4" name="article_position" value="4" type="radio">
                    <label for="article_position4"><span>全站</span></label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="articleForm">链接</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="article_url" id="article_url" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">当填写"链接"后点击文章标题将直接跳转至链接地址，不显示文章内容。链接格式请以http://开头</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>显示</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="article_show1" class="cb-enable selected">是</label>
                        <label for="article_show0" class="cb-disable">否</label>
                        <input id="article_show1" name="article_show" checked="checked" value="1" type="radio">
                        <input id="article_show0" name="article_show" value="0" type="radio">
                    </div>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">排序</dt>
                <dd class="opt">
                    <input type="text" value="255" name="article_sort" id="article_sort" class="input-txt">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>文章内容</label>
                </dt>
                <dd class="opt">
                    <div class="" style="width: 70%;">
                        <!-- 加载编辑器的容器 -->
                        <textarea id="content" name="content" type="text/plain"></textarea>
                        <!-- 实例化编辑器 -->
                        <?php echo '<script'; ?>
 type="text/javascript">
                            var appcontent = UE.getEditor('content');
                        <?php echo '</script'; ?>
>

                    </div>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">图片上传</dt>
                <dd class="opt">
                    <div class="input-file-show" id="divComUploadContainer">
                    	<span class="show">
							<a class="nyroModal" rel="gal" href="">
								<i class="fa fa-picture-o"  id="view_img" data-geo="<img src='<?php echo TEMPLE;?>
images/default_user_portrait.gif' width=100px height=50px>" ></i>
							</a>
						</span>
                    	<span class="type-file-box">
				            <input class="type-file-file" id="fileupload" name="fileupload" type="file" size="30" multiple="" hidefocus="true" title="点击按钮选择文件上传">
				            <input type="text" name="text" id="text" class="type-file-text">
				            <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
				         </span>
				     </div>
                    <div id="thumbnails" class="ncap-thumb-list">
                        <h5><i class="fa fa-exclamation-circle"></i>上传后的图片可以插入到富文本编辑器中使用，无用附件请手动删除，如不处理系统会始终保存该附件图片。</h5>
                        <ul>
                        </ul>
                    </div>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>

//按钮先执行验证再提交表
$(document).ready(function(){
    $("#fileupload").change(function () {
        $("#text").val($(this).val());
    });
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#article_form").valid()){
   			var data = new FormData($('#article_form')[0]);
   			$.ajax({
   				data:data,
   				type:'post',
   				dataType:'json',
   				url:"website_article_management_add",
   				cache: false,
                processData: false,
                contentType: false,
   				success:function(res){
   					if(res=="success"){
   						layer.alert('文章添加成功');
   					}else if(res.state=="article_position_false"){
   						layer.alert(res.msg);
   					}else if(res.state=="file_type_false"){
   						layer.alert(res.msg);
   					}else if(res.state=="file_copy_false"){
   						layer.alert(res.msg);
   					}else if(res=="false"){
   						layer.alert('文章添加失败');
   					}
   				}
   			});
		 }
	});
	$("#article_form").validate({
		errorPlacement: function(error, element){
			var error_td = element.parents('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            article_title : {required : true,},
            ac_id : {required : true,},
            content : {required : true},
        },
        messages : {
            article_title : {required : '<i class="fa fa-exclamation-circle"></i>标题名称不能为空',},
            ac_id : {required : '<i class="fa fa-exclamation-circle"></i>请选择所属分类',},
            content : {required : '<i class="fa fa-exclamation-circle"></i>文章内容不能为空',},
        }
	});
});

<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
