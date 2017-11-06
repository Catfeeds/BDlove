<?php
/* Smarty version 3.1.29, created on 2017-09-15 14:11:33
  from "D:\www\yunjuke\application\admin\views\PromotionGameOfLotteryEdit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59bb6f15eca2e1_08985094',
  'file_dependency' => 
  array (
    '5702d82b0dd2b8417eb6af5d1f0bb1e36f9af9f1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\PromotionGameOfLotteryEdit.html',
      1 => 1501575948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59bb6f15eca2e1_08985094 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '22459bb6f15d89d90_31438294';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<style>
		.mb-special-layout{background-color: #fff;}
		.mb-special-layout div{float: left;}
		.mb-special-layout .ncap-form-default{width: 72.5%;}
	</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>大转盘-添加活动</h3>
						<h5>添加大转盘抽奖活动</h5>
					</div>
					 <ul class="tab-base nc-row">
						       
						        <li><a href="JavaScript:void(0);" class="current">设置活动规则</a></li>
						        <li><a href="JavaScript:void(0);">奖品设置</a></li>
						        <li><a href="JavaScript:void(0);">完成</a></li>
						      
					      </ul>
				</div>
				
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 注意：创建好优惠券后就不可以修改，请确认后再创建</li>
				</ul>
			</div>
			<form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
				<div class="mb-special-layout">
					<div class="mb-item-box" style="padding-left: 25px;padding-top: 50px;">
                       <img src="<?php echo TEMPLE;?>
images/gameLottery.jpg"  width="350px"  height="540px"/>
                    </div>
                    <div class="ncap-form-default">
                       <dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>活动名称：</label>
                     </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">
							
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>活动时间：</label>
                </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">张
							<span class="err"></span>

						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每次消耗：</label>
                </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">积分
							<span class="err"></span>
                            <p class="notic">填写0则不需要积分即可抽奖</p>
						</dd>
					</dl>
					<dl class="row" >
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每人抽奖次数限制:</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="lottery_time_limit" name="lottery_time_limit">
									<option value="0">不限制</option>
									<option value="1">限制</option>
								</select></div>
								<input id="lottery_time_limit_input" name="lottery_time_day_limit_input" style="display: none;" type="text" placeholder="0次"  class="input-txt" value="">
								
						</dd>
					</dl>
					<dl class="row" >
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每人每天抽奖次数限制:</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="lottery_time_day_limit" name="lottery_time_day_limit">
									<option value="0">不限制</option>
									<option value="1">限制</option>
								</select> </div>
								
									<input id="lottery_time_day_limit_input" name="lottery_time_day_limit_input" style="display: none;" type="text" placeholder="0次"  class="input-txt" value="">
								
								
							
						</dd>
					</dl>
					
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">活动规则：</label>
                </dt>
						<dd class="opt">
							<textarea name="statistics_code" rows="6" class="tarea" id="statistics_code"></textarea>
							<span class="err"></span>

						</dd>
					</dl>
					<div class="bot">
						<a id="submit" href="javascript:void(0)" class="btn btn-success radius">下一步</a>
					</div>
					</div>
				</div>
			</form>
			</div>

			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>
	<?php echo '<script'; ?>
 type="text/javascript">
		
		$(document).ready(function() {
			$("#lottery_time_day_limit").change(function() {
				if(document.getElementById("lottery_time_day_limit").selectedIndex == 1) {
					document.getElementById("lottery_time_day_limit_input").style.display = 'block';
				} else {

					document.getElementById("lottery_time_day_limit_input").style.display = 'none';
				}
			});
			$("#lottery_time_limit").change(function() {
				if(document.getElementById("lottery_time_limit").selectedIndex == 1) {
					document.getElementById("lottery_time_limit_input").style.display = 'block';
				} else {

					document.getElementById("lottery_time_limit_input").style.display = 'none';
				}
			});
		})
	<?php echo '</script'; ?>
>

	</html><?php }
}
