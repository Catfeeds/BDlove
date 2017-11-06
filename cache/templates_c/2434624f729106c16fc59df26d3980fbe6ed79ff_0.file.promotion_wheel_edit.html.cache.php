<?php
/* Smarty version 3.1.29, created on 2017-10-11 13:58:42
  from "D:\www\yunjuke\application\admin\views\promotion_wheel_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ddb3128ac271_36950452',
  'file_dependency' => 
  array (
    '2434624f729106c16fc59df26d3980fbe6ed79ff' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_wheel_edit.html',
      1 => 1507688891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59ddb3128ac271_36950452 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2786559ddb31244afe1_60463897';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
	.mb-special-layout{background-color: #fff;}
	.mb-special-layout div{float: left;}
	.mb-special-layout .ncap-form-default{width: 72.5%;}
	.select2{margin-bottom:0;}
	.limit_container{
		width:500px;
		height:100px;
		border:1px solid #efefef;
		margin-top:10px;
		background: #f5f5f5;
	}
	.selected-group-goods{
		width:180px;
		border:1px solid #eee;
		text-align: center;
		padding:5px;
		margin:2px;
	}
	.selected-group-goods div{
		width:100%;
		margin:0 auto;
		display:block;
		white-space:nowrap;
		overflow:hidden;
		text-overflow:ellipsis;
	}
	.selected-group-goods img{
		width:180px;
		height:180px;
	}
	.search_goods{
		border:1px solid #eee;
		padding: 10px;
		width:100%;
	}
	.col-xs-3{
		width:22%!important;
	}
	.choice_title{
		border-bottom: 1px solid #eee;
		padding-bottom: 10px;
		margin-bottom:10px;
		width:100%;
	}
	p{
		margin-bottom:0 ;
	}
	#preview img{
		width:90px;
		height: 90px;
		vertical-align: top;
		margin-right: 7px;
		margin-bottom: 5px;
	}
	.uploadimg{
		position: relative;
		float: left;
	}
	.fa-close:before, .fa-times:before {
		position: absolute;
		top: -7px;
		left: 88px;
	}
	.ncap-form-default{display:none;}
	.active{display:block;}
.flexigrid .mDiv {
    display: none;
    
}
.flexigrid .mDiv,.pDiv{
    display: none;
    
}
.flexigrid .bDiv{width:100%;}
#createDetail{min-width:960px !important;}
.flexigrid .bDiv .no-data{min-width:960px !important;}
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

	<div class="mb-special-layout">
		<div class="mb-item-box" style="padding-left: 25px;padding-top: 50px;">
			<img src="<?php echo TEMPLE;?>
images/gameLottery.jpg"  width="300px"  height="540px"/>
		</div>
		<div class="ncap-form-default active" id="add_form_op">
			<form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
				<dl class="row">
					<dt class="tit">
						<label for="per_shopping"><em>*</em>活动名称：</label>
					</dt>
					<dd class="opt">
						<input id="per_shopping" name="wheels_name" type="text" class="input-txt" value="">
						<span class="err"></span>
					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="start_time"><em>*</em>活动时间：</label>
					</dt>
					<dd class="opt">
						<input type="text" id="start_time" onclick="laydate()" value="" name="start_time" style="background-color: #fff" class="data-start">
						至&nbsp;<input type="text" id="end_time" onclick="laydate()" value="" name="end_time" style="background-color: #fff" class="data-end">
						<span class="err"></span>

					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="per_integration"><em>*</em>每次消耗：</label>
					</dt>
					<dd class="opt">

						<input id="per_integration" name="point" type="number" style="width: 100px">&nbsp;&nbsp;积分

						<span class="err"></span>
						<p class="notic">填写0则不需要积分即可抽奖</p>
					</dd>
				</dl>
				<dl class="row">
					<dt class="tit">
						<label for="per_num">每人免费抽奖次数：</label>
					</dt>
					<dd class="opt">

						<input id="per_num" name="free_limit" type="number" style="width: 100px">&nbsp;&nbsp;次

						<span class="err"></span>
						<p class="notic">不填则没有免费次数</p>
					</dd>
				</dl>
				<!-- <dl class="row" >
					<dt class="tit">
						<label for="lottery_time_limit">每人抽奖次数限制:</label>
					</dt>
					<dd class="opt">
						<div class="area-region-select">
							<select class="valid select2" id="lottery_time_limit" name="lottery_time_limit">
								<option value="0">不限制</option>
								<option value="1">限制</option>
							</select></div>
						<input id="lottery_time_limit_input" name="limit" style="display: none;" type="number" value="">
					</dd>
				</dl>
				<dl class="row" >
					<dt class="tit">
						<label for="lottery_time_day_limit">每人每天抽奖次数限制:</label>
					</dt>
					<dd class="opt">
						<div class="area-region-select">
							<select class="valid select2" id="lottery_time_day_limit" name="lottery_time_day_limit">
								<option value="0">不限制</option>
								<option value="1">限制</option>
							</select>
						</div>
						<input id="lottery_time_day_limit_input" name="day_limit" style="display: none;" type="number" value="">
					</dd>
				</dl> -->
				<dl class="row" >
					<dt class="tit">

						<label for=""><em>*</em>活动门店:</label>

					</dt>
					<dd class="opt">
						<!-- <div class="area-region-select"> -->
						<select class="valid select2" id="store_id" name="store_id">
							<option value="">请选择</option>
							<?php
$_from = $_smarty_tpl->tpl_vars['store']->value;
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['arr']->value['store_id']) && $_smarty_tpl->tpl_vars['arr']->value['store_id'] == $_smarty_tpl->tpl_vars['v']->value['store_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
</option>
							<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
						</select>
						<!-- </div> -->
						<span class="err"></span>
						<div style="clear: both;"></div>
						<div id="goods_input" class="limit_container" style="display: none;"></div>
					</dd>
				</dl>

				<dl class="row" >
					<dt class="tit">
						<label for=""><em>*</em>活动商品:</label>
					</dt>
					<dd class="opt">
						<div class="selected-group-goods" >
							<div class="goods-thumb"><img id="groupbuy_goods_image" src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
"></div>
							<div class="goods-name" id="groupbuy_goods_name"><?php if (isset($_smarty_tpl->tpl_vars['arr']->value['goods_name'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['goods_name'];
}?></div>
							<div class="goods-price">吊牌价：￥<span id="groupbuy_goods_price">0.00</span></div>

						</div>
						<input id="goods_id" name="goods_id" type="hidden" value="<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['goods_id'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['goods_id'];
}?>"><span class="err"></span>
						<div style="clear: both;"></div>
						<div style="margin-top: 10px;">
							<a href="javascript:void(0);" id="" class="btn btn-primary radius">选择商品</a>
						</div>
						<div style="clear: both;"></div>
						<div class="row search_goods" style="margin-top: 10px;">
							<div class="choice_title">
								搜索店内商品 <input type="text" name="search_goods_name" id="search_goods_name">
								<a href="javascript:;" id="btn_search_goods" class="btn btn-primary radius size-S">搜索</a>
								<span>不输入名称直接搜索将显示店内所有普通商品，特殊商品不能参加</span>
							</div>
							<div style="clear: both;"></div>
							<div class="div_goods_search_result" style="display:none;">


							</div>
						</div>
					</dd>
				</dl>
				<!-- <dl class="row" >


                <dl class="row" >

                    <dt class="tit">
                        <label for="store_limit"><em>*</em>门店限制:</label>
                    </dt>
                    <dd class="opt">

                        <div class="area-region-select">
                            <select class="valid select2" id="goods_limit" name="lottery_time_day_limit">

                                <option value="0">不限制</option>
                                <option value="1">限制</option>
                            </select>

                        </div>
                        <img src="<?php echo base_url();?>
/data/images/default_goods_image.jpg" width="50" height="50" data-geo="<img src=<?php echo base_url();?>
/data/images/default_goods_image.jpg width=300px>" class="f-l" alt="">
                        <input id="goods_id" name="goods_id" readonly  type="hidden" value=""><span class="err"></span>
                        <p class="goods_name"></p>
                        <a id="goods_input_edit" style="display: none;">编辑</a>

                        <div style="clear: both;"></div>

                        <div id="goods_input" class="limit_container" style="display: none;"></div>

                        <div id="goods_input" class="limit_container" style="display: none;"></div>

                    </dd>
                </dl> -->

				<dl class="row">
					<dt class="tit">
						<label for="statistics_code"><em>*</em>活动规则：</label>
					</dt>
					<dd class="opt">
						<textarea name="rule" rows="6" class="tarea" id="statistics_code"></textarea>
						<span class="err"></span>

					</dd>
				</dl>
				<div class="bot">
					<input name="wheels_id" id="wheels_id" type="hidden" value="<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['wheels_id'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['wheels_id'];
}?>">
					<a id="submit" href="javascript:void(0)" class="btn btn-success radius">下一步</a>
				</div>
			</form>
		</div>


		<!-- <div class="ncap-form-default"  style="display:inline-block;">
          <div id="flexigrid"></div>
        </div> -->

		<div class="ncap-form-default">
			<form id="wheel_prize_add" method="post" action="wheel_prize_add" enctype="multipart/form-data">
				<div id="createList">
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-warning alert-dismissible fade in">
								<strong>奖品概率说明：</strong>
								<div class="mt5 mb5">问题1：1%是不是就是抽100次有1次中奖的这种说法是不对的，跟抛硬币的原理一样，抛硬币是每次抛都有50%的概率抛到正面，而不是抛2次一定有1次是正面。</div>
								<div class="mb5">问题2：我概率设置的99%，抽了好几次都不中奖，概率设置1%连续中了好几次。抽奖跟运气有关系，运气好可能1%的概率就抽中了，运气不好的99%概率抽好几次也不中，跟抛硬币原理一样，连续抛几次都是正面或者都是反面的情况也是存在的。</div>
							</div>
						</div>
					</div>
					<div class="card-box mb20" style="border:none;">
						<div class="tr"><a id="addPrizeBtn" onclick="add_prize(this)" class="btn btn-default w-xs">添加奖品</a></div>
						
						<div id="flexigrid"></div>


						<!--	<div id="prize_list">
                                <div class="table-responsive">
                                    <table class="table dataTable">
                                        <colgroup>
                                          </colgroup>
                                          <thead>
                                          <tr>
                                            <th>奖品名称</th>
                                            <th>奖品类型</th>
                                            <th>总数量/剩余数量</th>
                                            <th>概率</th>
                                            <th>操作</th>
                                          </tr>
                                          </thead>
                                          <tbody id="prizeList">
                                          <tr>	<td>满100送50</td>	<td>优惠券</td>	<td>50/35</td>	<td>50%</td>	<td data-i="0"><a href="javascript:void(0)" data-id="4895" class="editPrizeBtn">编辑奖品</a> - <a href="javascript:void(0)" class="setPrizeNumBtn">增减库存</a></td></tr>
                                      </tbody>
                                      </table>
                                    <nav><ul id="" class="pagination"></ul></nav>
                                </div>
                            </div>
                            <div class="tc mt20">
                                <button class="btn btn-default w-xs mr20 nextEvt" data-next="0">上一步</button>
                                <button class="btn btn-default w-xs nextEvt" data-next="2">完成设置</button>
                            </div>
                        </div>-->
						<div class="tc mt20">
							<div class="btn btn-default w-xs mr40 " id="add_action">上一步</div>
							<div class="btn btn-default w-xs " id="next"><a href="wheel">完成设置</a></div>
						</div>

					</div>
				</div>


				<div id="createDetail" style="display:none;">
				<input id="wheels_prize_id" type="hidden" name="wheels_prize_id" value="">
					<dl class="row" >
						<dt class="tit">
							<label for="prize_type"><em>*</em>奖品类型：</label>
						</dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="prize_type" name="prize_type">
									<option value="1">折扣优惠券</option>
									<!-- <option value="2">满减优惠券</option> -->
									<option value="3">积分</option>
									<option value="5">红包</option>
								</select>
							</div>
						</dd>
					</dl>
					//start 红包
					<dl class="row" id="integral_info" style="display:none;">
						<dt class="tit">
							<label for="integral"><em>*</em>每个奖品积分数：</label>
						</dt>
						<dd class="opt">
							<input id="integral" type="number" name="point" value="">&nbsp;&nbsp;积分<span class="err"></span>
						</dd>
					</dl>
					<dl class="row" id="money_info" style="display:none;">
						<dt class="tit">
							<label for="money"><em>*</em>红包金额范围：</label>
						</dt>
						<dd class="opt">
							<input id="money" type="number" name="cash" value="">-<input id="money_max" type="number" name="cash_max" value="">&nbsp;&nbsp;元<span class="err"></span>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
							<label for="prize_num"><em>*</em>奖品剩余数：</label>
						</dt>
						<dd class="opt">
							<input id="prize_num" type="number" name="prize_num" value=""><span class="err"></span>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
							<label for="prize_chance"><em>*</em>中奖概率：</label>
						</dt>
						<dd class="opt">
							<input id="prize_chance" type="number" name="prize_percent" value="">&nbsp;&nbsp;%
							<span class="err"></span>
							<p class="notic">停止发放该奖品，可设置概率为0%</p>
						</dd>
					</dl>
					
						<span id="coupon_reduce" style="display: none">
							<dl class="row">
								<dt class="tit"><b style="font-size: 16px;">满减优惠券信息</b></dt>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="coupon_name"><em>*</em>优惠券名称：</label>
								</dt>
								<dd class="opt">
									<input id="coupon_name" type="text"  name="coupon_name" placeholder="优惠券名称"><span class="err"></span>
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="coupon_price"><em>*</em>面值：</label>
								</dt>
								<dd class="opt">
									<input id="coupon_price" type="number"  name="face_value" value="" placeholder="0.00">&nbsp;&nbsp;元
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="coupon_full"><em>*</em>订单满：</label>
								</dt>
								<dd class="opt">
									<input id="coupon_full" type="number"  value="" name="coupon_start" placeholder="0.00">&nbsp;&nbsp;元可用
								</dd>
							</dl>
							<dl class="row" >
								<dt class="tit">
									<label for="coupon_valid"><em>*</em>优惠券有效期：</label>
								</dt>
								<dd class="opt">
									<div class="area-region-select">
										<select class="valid select2" id="coupon_valid">
											<option value="0">固定有效期</option>
											<option value="1">领取后计算有效期</option>
										</select>
									</div>
								</dd>
							</dl>
							
							<dl class="row" id="after_time" style="display: none;">
								<dt class="tit">
									<label for="prize_valid_time"><em>*</em>领取后，</label>
								</dt>
								<dd class="opt">
									<input id="prize_valid_time" type="text"   name="flexible_time" placeholder="1">&nbsp;&nbsp;天内有效
									<p class="notic">示例：设置领取7天内有效，若消费者1月1日领取优惠券，1月1日～1月7日内有效</p>
								</dd>
							</dl>
						</span>
						<span id="coupon_sale">
							<dl class="row">
								<dt class="tit"><b style="font-size: 16px;">打折优惠券信息</b></dt>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="coupon_sale_name"><em>*</em>优惠券名称：</label><span class="err"></span>
								</dt>
								<dd class="opt">
									<input id="coupon_sale_name" type="text" name="coupon_name" value="" placeholder="优惠券名称">
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="coupon_sale_price"><em>*</em>折扣：</label>
								</dt>
								<dd class="opt">
									<input id="coupon_sale_price" type="number"  name="discount" value="" placeholder="0">&nbsp;&nbsp;折<span class="err"></span>
									<p class="notic">请填写0～9的数字</p>

								</dd>
							</dl>
							<dl class="row" >
								<dt class="tit">
									<label for="coupon_sale_valid"><em>*</em>优惠券有效期：</label>
								</dt>
								<dd class="opt">
									<div class="area-region-select">
										<select class="valid select2" id="coupon_sale_valid" name="state">
											<option value="1">固定有效期</option>
											<option value="0">领取后计算有效期</option>
										</select>
									</div>
								</dd>
							</dl>
							
							<dl class="row" id="after_sale_time" style="display: none;">
								<dt class="tit">
									<label for="prize_sale_chance"><em>*</em>领取后，</label>
								</dt>
								<dd class="opt">
									<input id="prize_sale_chance" type="text" name="flexible_time" value="" placeholder="1">&nbsp;&nbsp;天内有效
									<p class="notic">示例：设置领取7天内有效，若消费者1月1日领取优惠券，1月1日～1月7日内有效</p>
								</dd>
							</dl>
						</span>
						<dl class="row" id="fixed_sale_time">
								<dt class="tit">
									<label for="start_sale_time"><em>*</em>有效期：</label>
								</dt>
								<dd class="opt">
									<input type="text" id="start_sale_time" onclick="laydate()" value="" name="start_sale_time" style="background-color: #fff" class="data-start" placeholder="起始时间">
									至&nbsp;<input type="text" id="end_sale_time" onclick="laydate()" value="" name="end_sale_time" style="background-color: #fff" class="data-end" placeholder="截止时间"><span class="err"></span>
								</dd>
							</dl>
						<span id="goods_info" style="display: none">
							<dl class="row">
								<dt class="tit"><b style="font-size: 16px;">实物商品基础信息</b></dt>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="prize_goods_name"><em>*</em>商品名称：</label>
								</dt>
								<dd class="opt">
									<input id="prize_goods_name" type="text"  value="">
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="prize_stylenumber">商品款号：</label>
								</dt>
								<dd class="opt">
									<input id="prize_stylenumber" type="text"  value="" placeholder="选填，款号">
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="prize_goods_sku">商品条形码：</label>
								</dt>
								<dd class="opt">
									<input id="prize_goods_sku" type="text"  value="" placeholder="选填，sku编码">
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="prize_goods_code">商品编码：</label>
								</dt>
								<dd class="opt">
									<input id="prize_goods_code" type="text"  value="" placeholder="选填">
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="prize_goods_name"><em>*</em>商品图片：</label>
								</dt>
								<dd class="opt">
									<div class="formControls">
										<div id="preview"></div>
										<div style="clear:both"></div>
										<input type="file" name ="pic_info" onchange="preview(this)" style="opacity:0"/>
										<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-243px"><i class="fa fa-cloud-download"></i>上传图片</span>
									</div>
								</dd>
							</dl>
							<dl class="row" >
								<dt class="tit">
									<label for="logistics_limit"><em>*</em>物流方式限制：</label>
								</dt>
								<dd class="opt">
									<div class="area-region-select">
										<select class="valid select2" id="logistics_limit">
											<option value="0">不限制</option>
											<option value="1">快递发货</option>
											<option value="2">门店自提</option>
										</select>
									</div>
									<p class="notic">可设置仅限到店自提，用于门店引流。</p>
								</dd>
							</dl>
							<dl class="row">
								<dt class="tit">
									<label for="choice_sotre"><em>*</em>提货门店/发货门店：</label>
								</dt>
								<dd class="opt">
									<input id="choice_sotre" type="text"  value="" placeholder="点击选择门店">
								</dd>
							</dl>
						</span>
					<dl class="row">
						<dt class="tit"><b style="font-size: 16px;">其他中奖限制条件</b></dt>
					</dl>
					<dl class="row" >
						<dt class="tit">
							<label for="num_limit">中奖次数限制：</label>
						</dt>
						<!-- <dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="num_limit" name="num_limit">
									<option value="0">不限制</option>
									<option value="1">限制</option>
								</select>
							</div>
							<div id="num_input" style="display: none"><input name="prize_limit" type="number"/>&nbsp;&nbsp;次</div>
							<div style="clear: both"></div>
							<p class="notic" id="num_input_notic" style="display: none;">可设置仅限到店自提，用于门店引流。</p>
						</dd> -->
						<dd class="opt">
							
							<input name="prize_limit" type="number"/>&nbsp;&nbsp;次
							
							<p class="notic" id="num_input_notic" style="display: none;">为空则不限制。</p>
						</dd>
					</dl>
					<div class="bot">
													<input type="hidden" id="wheels_id_prize"value="0" name="wheels_id">
						<div class="btn btn-default w-xs mr40 cancelCreateBtn" id="back">取消返回</div>
						<div class="btn btn-default w-xs saveCreateBtn" id="save">保存</div>
						<!-- <a id="submit_prize" href="javascript:void(0)" class="btn btn-success radius">下一步</a> -->

					</div>
				</div>
			</form>
		</div>


	</div>

</div>

<div id="goTop">
	<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
	<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
	 //  alert("<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
");
	    if("<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
"=='update'&&$('#wheels_id').val()){

	      $("#per_shopping").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['wheels_name'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['wheels_name'];
}?>");
	      $("#per_num").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['free_limit'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['free_limit'];
}?>");
	      $("#start_time").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['start_time'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['start_time'];
}?>");
	      $("#end_time").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['end_time'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['end_time'];
}?>");
	     /*  $("#start_sale_time").val("<?php echo $_smarty_tpl->tpl_vars['arr']->value['start_time'];?>
");
	      $("#end_sale_time").val("<?php echo $_smarty_tpl->tpl_vars['arr']->value['end_time'];?>
"); */
	      $("#per_integration").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['point'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['point'];
}?>");
	      $("#statistics_code").val("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['rule'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['rule'];
}?>");
	        $("#groupbuy_goods_image").attr("src", "<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['wheels_image'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['wheels_image'];
}?>");
	        $('#store_id option[value="<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['store_id'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['store_id'];
}?>"]').attr("selected", true);
	         $("#groupbuy_goods_price").html("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['goods_marketprice'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['goods_marketprice'];
}?>");


	        $("#per_shopping").attr("readonly",true);
	        $("#start_time").attr("readonly",true);
	        $("#end_time").attr("readonly",true);
	        $("#per_integration").attr("readonly",true);
	        $("#statistics_code").attr("readonly",true);
	        $("#groupbuy_goods_image").attr("readonly",true);
	        $('#store_id').attr("readonly",true);

	       // $("#groupbuy_goods_price").html("<?php if (isset($_smarty_tpl->tpl_vars['arr']->value['goods_marketprice'])) {
echo $_smarty_tpl->tpl_vars['arr']->value['goods_marketprice'];
}?>");
	        $("#hide_help").hide();

	    }


	})
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
		$("#goods_limit").change(function() {
			if(document.getElementById("goods_limit").selectedIndex == 1) {
				document.getElementById("goods_input").style.display = 'block';
				document.getElementById("goods_input_edit").style.display = 'block';
			} else {
				document.getElementById("goods_input").style.display = 'none';
				document.getElementById("goods_input_edit").style.display = 'none';
			}
		});
		$("#store_limit").change(function() {
			if(document.getElementById("store_limit").selectedIndex == 1) {
				document.getElementById("store_input").style.display = 'block';
				document.getElementById("store_input_edit").style.display = 'block';
			} else {
				document.getElementById("store_input").style.display = 'none';
				document.getElementById("store_input_edit").style.display = 'none';
			}
		});

		/* $('#store_id').change(function(){
		 store_id = $(this).val();
		 if(!!store_id){
		 $.ajax({
		 type: "POST",
		 url: "get_goods_class",
		 data: '',
		 dataType: "html",
		 success: function(data){
		 var place_order = '<div class="search mt-10 mb-5"><form id="change_goods_search_form">'+
		 '<select name="change_goods_gc_id" id="change_goods_gc_id" class="selecte pd-5 mb-10 ml-10"  id="" style="min-width:80px !important">'+
		 '<option value="" selected>-分类-</option>'+data+
		 '</select>'+
		 '<input name="change_stocks_sn" type="text" id="change_stocks_sn" placeholder="货号/款号" style="width:200px !important;vertical-align: middle;border-radius:4px" class="input-text input_text f-12 mysearch mb-10 ml-10">'+
		 '<input type="button" id="change_goods_search" onclick="" class="btn btn-warning radius ml-10 pButton mb-10" value="搜索">'+
		 '</div>'+
		 '<div class="pd-10">'+
		 '<ul id="change_search_list">'+
		 '</ul></form></div><div class="pagination"></div>';
		 layer.open({
		 type: 1,
		 skin: 'layui-layer-rim', //加上边框
		 title: '<b>选择商品</b>',
		 area: ['920px', '580px'], //宽高
		 content: place_order,
		 btn: ['确定','取消'], //按钮
		 success:function(){
		 $('#change_goods_search').click(function(){
		 class_id = $('#change_goods_gc_id').val();
		 stocks_code = $('#change_stocks_sn').val();
		 if(class_id==''&&stocks_code==''){
		 //layer.msg('请输入搜索条件');return false;
		 }
		 function show_content(curr){
		 $.ajax({
		 type: "POST",
		 url: "goods_search",
		 data: $('#change_goods_search_form').serialize()+'&store='+store_id+'&page='+curr,
		 dataType: "json",
		 success: function(data){
		 if(data.state){

		 page = parseInt(data.page);data_goods = data.data;total_page = parseInt(data.total_page);rp = parseInt(data.rp);

		 li_str = '';
		 $.each(data_goods,function(k,goods_info){
		 li_str += '<li class="goods_list mb-15">' +
		 '<input type="checkbox" name="check" data-name="'+data_null(goods_info.goods_name)+'" class="check_goods" onclick="check_goods(this)" value="'+goods_info.goods_id+'">'+
		 '        <div class="goods_info cl">' +

		 '          <img src="'+goods_info.goods_image+'" width="50" height="50"  data-geo="'+goods_info.goods_image+'" class="f-l" alt="">' +
		 '          <div class="goods_info_text f-l ml-20">' +
		 '            <div class="f-16"><b>名称：'+data_null(goods_info.goods_name)+
		 '</b></div>' +
		 '            <div class="f-14">' +
		 '<span class="f-14">吊牌价：<span class="c-red">'+number_null(goods_info.goods_marketprice)+'</span>元</span>'+
		 '              品牌：<span class="c-red mr-5">'+data_null(goods_info.brand_name)+'</span>商品分类：<span class="c-red mr-5">'+data_null(goods_info.gc_name)+'</span>性别：<span class="c-red mr-5">'+data_null(goods_info.sex)+'</span>颜色：<span class="c-red mr-5">'+data_null(goods_info.color_remark,goods_info.color)+'</span>' +
		 '              重量：<span class="c-red mr-5">'+data_null(goods_info.weight)+'KG</span>发布季：<span class="c-red mr-5"> '+data_null(goods_info.time_market)+'</span>款号：<span class="c-red mr-5">'+data_null(goods_info.goods_spu)+'</span>' +
		 '            </div>' +
		 '          </div>' +
		 '        </div>' +
		 '        <div class="goods_table mt-10">' +
		 '        </div>' +
		 '      </li>';
		 })
		 $('#change_search_list').html(li_str);
		 pages = total_page
		 curr = page
		 laypage({
		 cont: $('div.pagination'), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
		 pages: pages, //通过后台拿到的总页数
		 curr:  curr || 1, //当前页
		 first: '首页',
		 last: '末页',
		 groups:5,
		 jump: function(obj, first){ //触发分页后的回调
		 if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
		 show_content(obj.curr);
		 }
		 }
		 });
		 }else{
		 layer.msg(data.msg);
		 }
		 },
		 complete:function(){
		 $('img').error(function(){
		 $(this).attr('src', "<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
");
		 $(this).attr('data-geo', "<img src=<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
 width=300px>");

		 });
		 }
		 })
		 }
		 show_content(1);

		 })

		 },
		 yes:function(index){

		 select_goods_id = $("[name='check'][checked]").val();
		 select_goods_img = $("[name='check'][checked]").parent().find('img').attr('src');
		 select_goods_name = $("[name='check'][checked]").attr('data-name');
		 if(!!select_goods_id){
		 $('#goods_id').val(select_goods_id);
		 $('#goods_id').prev().attr('src',select_goods_img);
		 $('#goods_id').prev().attr('data-geo',"<img src="+select_goods_img+" width=300px>");
		 $('#goods_id').siblings('p').text(select_goods_name);
		 layer.closeAll();
		 }else{
		 layer.msg('请先选择商品！');
		 return false;
		 }
		 },no:function(){}
		 })
		 }
		 });
		 }
		 }) */

		//选择商品
		$('#btn_show_search_goods').on('click', function() {
			$('#div_search_goods').show();
		});
		//关闭 选择商品弹出
		$('#btn_hide_search_goods').on('click', function() {
			$('#div_search_goods').hide();
		});
		//选择商品  搜索
		$("#btn_search_goods").click(function(){
			search_goods_name = $('#search_goods_name').val();
			group_id = $('#now_groupbuy_id').val();
			store_id = $('#store_id').val();
			if(!store_id){
				layer.msg('请先选择活动门店!');return false;
			}
			function show_content(curr,group_id){
				$.ajax({
					type: "post",
					url: "goods_search",
					data: {search_goods_name:search_goods_name,page:curr,group_id:group_id,store:store_id},
					dataType: "json",
					success: function(data){
						if(data.state=='403'){
							login_ajax('shopadmin');return false;
						}
						page = parseInt(data.page);data_goods = data.data;total_page = parseInt(data.total_page);rp = parseInt(data.rp);
						if(data.state){

							if(data_goods!=''){
								str ='';
								$.each(data_goods,function(k,v){

									fg_v = JSON.stringify(v).replace(/ /g,"！");

									str +='<div class="selected-group-goods col-xs-3">'+
											'<div class="goods-thumb"><img id="groupbuy_goods_image" src="'+v.goods_image+'"></div>'+
											'<input name="search_goods_id" class="search_goods_id" type="hidden" value="'+v.goods_id+'">'+
											'<div class="goods-name">'+v.goods_name+'</div>'+
											'<div class="goods-price">吊牌价：￥<span nctype="groupbuy_goods_price">'+v.goods_marketprice+'</span></div>'+
											'<a href="javascript:;" class="btn btn-primary" onclick=select_goods('+fg_v+')><i class="fa fa-check-circle-o"></i>选择该商品</a>'+
											'</div>';

								})
								str +='<div class="pagination"></div> ';
							}
							$('.div_goods_search_result').show();
							$('.div_goods_search_result').html(str);
							pages = total_page
							curr = page
							laypage({
								cont: $('div.pagination'), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
								pages: pages, //通过后台拿到的总页数
								curr:  curr || 1, //当前页
								first: '首页',
								last: '末页',
								groups:5,
								jump: function(obj, first){ //触发分页后的回调
									if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
										show_content(obj.curr,group_id);
									}
								}
							});
						}else{
							str = '<div style="font-size:20px;color:red;">未找到符合条件的商品！</div>';
							$('.div_goods_search_result').show();
							$('.div_goods_search_result').html(str);

						}
					}
				})
			}
			show_content(1,group_id)
			//console.log(search_goods_name)
		})

		//结束时间不能大于开始时间且不能小于现在
		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
			var start_date = $("#start_time").val();
			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
			var date1 = new Date();
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		$("#add_form").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : {
				wheels_name : {
					required : true
				},
				start_time : {
					required : true
				},

				end_time : {
					required : true,
					greaterThanStartDate : true,
					greaterThanNowDate : true,
				},
				point: {
					required : true,
					min : 0,
				},
				store_id : {
					required : true
				},
				goods_id : {
					required : true
				},
				rule : {
					required : true
				},
			},
			messages : {
				wheels_name : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动名称'
				},
				start_time : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动开始时间'
				},
				end_time : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
					greaterThanStartDate : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
					greaterThanNowDate : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
				},
				point : {
					required : '<i class="fa fa-exclamation-circle"></i>请输入每次消耗积分数',
					min : '<i class="fa fa-exclamation-circle"></i>消耗积分数不得小于0',
				},
				store_id : {
					required : '<i class="fa fa-exclamation-circle"></i>请限制参加活动的门店'
				},
				goods_id : {
					required : '<i class="fa fa-exclamation-circle"></i>请选择参加活动的商品'
				},
				rule : {
					required : '<i class="fa fa-exclamation-circle"></i>请填写活动规则'
				},
			}
		});
		$('#submit').click(function(){
			obj_s = $(this);
			if($('#add_form').valid()){
				var data = $("#add_form").serialize();
				$.ajax({
					type:'POST',
					data : data,
					url:'wheels_edit',
					success:function(data){
						if(data.state=='403'){
							login_ajax('shopadmin',data);
						}else if(data.state){
							obj_s.parents('.ncap-form-default').removeClass('active');
							obj_s.parents('.ncap-form-default').next().addClass('active');
							$('#wheels_id').val(data.wheels_id);
							$('#wheels_id_prize').val(data.wheels_id);
							/* $("#flexigrid").flexigrid({
							 url: 'get_prize_list?wheels_id='+data.wheels_id,
							 colModel : [
							 {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
							 {display: '奖品名称', name : 'wheels_name', width : 150, sortable : true, align: 'center'},
							 {display: '奖品类型', name : 'point', width : 150, sortable : true, align: 'left'},
							 {display: '总数量/剩余数量', name : 'user_num', width : 150, sortable : true, align: 'left'},
							 {display: '中奖概率', name : 'wheels_num', width : 150, sortable : true, align: 'left'},
							 ],
							 buttons : [
							 {display: '<i class="fa fa-plus"></i>新建奖品', name : 'add', bclass : 'add', title : '新建奖品', onpress : fg_operate },

							 ],

							 title: '奖品列表'
							 }); */
						}else{
							layer.msg(data_null(data.msg));
						}
						
					},
					dataType:'json'
				});
			}
		})


	})
    $('#add_action').click(function(){
    	$(this).parents('.ncap-form-default').prev().addClass('active');
    	$(this).parents('.ncap-form-default').removeClass('active');
		
    })
	//start   wheels_prize_add 奖品添加奖品
  
	$("#save").click(function(){
		obj_s = $(this);
		
		
	//	alert(data);
//结束时间不能大于开始时间且不能小于现在
		jQuery.validator.methods.greaterThanStartDate = function(value, element) {
			var start_date = $("#start_time").val();
			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanNowDate = function(value, element) {
			var date1 = new Date();
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanStartDate1 = function(value, element) {
			var start_date = $("#start_sale_time").val();
			var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		jQuery.validator.methods.greaterThanNowDate1 = function(value, element) {
			var date1 = new Date();
			var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
			return date1 < date2;
		};
		prizeType = $('#prize_type').val();
		var Rules = {};var Messages = {};
		if(prizeType==1){
			Rules = {
					prize_num : {
						required : true,
						min:1
					},
					prize_percent : {
						required : true,
						min:0,
						max:99
					},

					end_sale_time : {
						required : true,
						greaterThanStartDate1 : true,
						greaterThanNowDate1 : true,
					},
					coupon_name: {
						required : true,
						
					},
					discount : {
						required : true,
						min:0,
						max:10
					},
					
				};
			Messages =  {
					prize_num : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入奖品数量',
						min:'<i class="fa fa-exclamation-circle"></i>数量最小为0',
					},
					prize_percent : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入中奖概率',
						min:'<i class="fa fa-exclamation-circle"></i>概率最小为0',
						max:'<i class="fa fa-exclamation-circle"></i>概率应小于100%',
					},
					end_sale_time : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
						greaterThanStartDate1 : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
						greaterThanNowDate1 : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
					},
					coupon_name : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入卷名称',
						
					},
					discount : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入卷折扣值',
						min:'<i class="fa fa-exclamation-circle"></i>折扣最小为0',
						max:'<i class="fa fa-exclamation-circle"></i>折扣最大为10',
					},
				};
		}else if(prizeType==3){
			Rules = {
					point : {
						required : true,
						min:1
					},
					prize_num : {
						required : true,
						min:0
					},
					prize_percent : {
						required : true,
						min:1,
						max:99
					},
					end_sale_time : {
						required : true,
						greaterThanStartDate1 : true,
						greaterThanNowDate1 : true,
					},
					
				};
			Messages =  {
					point : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入积分值',
						min:'<i class="fa fa-exclamation-circle"></i>积分最小为1',
					},
					prize_num : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入奖品数量',
						min:'<i class="fa fa-exclamation-circle"></i>数量最小为0',
					},
					prize_percent : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入中奖概率',
						min:'<i class="fa fa-exclamation-circle"></i>概率最小为0',
						
						max:'<i class="fa fa-exclamation-circle"></i>概率应小于100%',
					},
					end_sale_time : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
						greaterThanStartDate1 : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
						greaterThanNowDate1 : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
					},
				};
		}else if(prizeType==5){
			Rules = {
					cash : {
						required : true,
						min:0.01
					},
					cash_max : {
						required : true,
						min:0.01,
					},
					prize_num : {
						required : true,
						min:0,
					},
					prize_percent : {
						required : true,
						min:0,
						max:99,
					},
					end_sale_time : {
						required : true,
						greaterThanStartDate1 : true,
						greaterThanNowDate1 : true,
					},
					
				};
			Messages =  {
					cash : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入红包最小金额值',
						min:'<i class="fa fa-exclamation-circle"></i>红包金额最少为0.01元',
					},
					cash_max : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入红包最大金额值',
						min:'<i class="fa fa-exclamation-circle"></i>红包金额最少为0.01元',
					},
					prize_num : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入奖品数量',
						min:'<i class="fa fa-exclamation-circle"></i>数量最小为0',
					},
					prize_percent : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入中奖概率',
							min:'<i class="fa fa-exclamation-circle"></i>概率最小为0',
							max:'<i class="fa fa-exclamation-circle"></i>概率应小于100%',
					},
					end_sale_time : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入活动结束时间',
						greaterThanStartDate1 : '<i class="icon-exclamation-sign">结束时间不能小于开始时间</i>',
						greaterThanNowDate1 : '<i class="icon-exclamation-sign">结束时间不能小于当前时间</i>',
					},
				};
		}
		$("#wheel_prize_add").validate({
			errorPlacement: function(error, element){
				var error_td = element.parent('dd').children('span.err');
				error_td.append(error);
			},
			rules : Rules,
			messages :Messages
		});
		//alert($('#wheel_prize_add').valid())
		isSubmit = $('#wheel_prize_add').valid();isSubmit=1;
		if(isSubmit){	
			var data = $("#wheel_prize_add").serialize();
		$.ajax({
			type:'POST',
			data : data,
			url:'wheel_prize_add',
			success:function(data){
				if(data.state=='403'){
					login_ajax('shopadmin',data);
				}else if(data.state){
					//alert('ok');
					//obj_s.parents('.ncap-form-default').removeClass('active');
					//obj_s.parents('.ncap-form-default').next().addClass('active');
					$('#createDetail').hide();
					$('#createList').show();
					//$('#wheels_prize_id').val(data.wheels_prize_id);
//alert(data.wheels_id);

					$("#flexigrid").flexOptions({url: 'get_prize_list?wheels_id='+data.wheels_id}).flexReload();

					//$('#prize_list').flexReload();
					//   prize_list(data.wheels_id);
				}
				//layer.msg(data);
			},
			dataType:'json'
		});
		}



	})

	//end     wheels_prize_add 奖品添加结束

	//start   反回按钮

	$("#back").click(function(){

		$('#createDetail').hide();
		$('#createList').show();




	})



	//end




	//start  奖品列表


	/* $("#prize_list").flexigrid({

	 url: 'get_prize_list?wheels_id='+data.wheels_id,
	 colModel : [
	 {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
	 {display: '奖品名称', name : 'wheels_name', width : 150, sortable : true, align: 'center'},
	 {display: '奖品类型', name : 'point', width : 150, sortable : true, align: 'left'},
	 {display: '总数量/剩余数量', name : 'user_num', width : 150, sortable : true, align: 'left'},
	 {display: '中奖概率', name : 'wheels_num', width : 150, sortable : true, align: 'left'},
	 ],
	 buttons : [
	 {display: '<i class="fa fa-plus"></i>新建奖品', name : 'add', bclass : 'add', title : '新建奖品', onpress : fg_operate },

	 ],

	 title: '奖品列表'
	 });*/



	function prize_list(wheels_id) {

		//alert(wheels_id);
		$("#flexigrid").flexigrid({

			url: 'get_prize_list?wheels_id='+wheels_id,
			//url: 'get_prize_list?wheels_id=117',
			colModel: [
				{display: '操作', name: 'operation', width: 150, sortable: false, align: 'center', className: ''},
				{display: '奖品名称', name: 'prize_type', width: 150, sortable: true, align: 'left'},
				{display: '奖品类型', name: 'prize_type', width: 150, sortable: true, align: 'left'},
				{display: '总数量/剩余数量', name: 'prize_num', width: 150, sortable: true, align: 'left'},
				{display: '概率 ', name: 'prize_percent', width: 150, sortable: true, align: 'left'},

			],
			
			searchitems: [
				{display: '奖品列表', name: 'wheels_name'},
			],
			title: '活动奖品列表'
		});

	}
	prize_list($('#wheels_id').val());
	//奖品修改页面--（修改部分参数）
	 function check(){

       var value= $("#prize_chance").val();
       var wheels_id =$('#wheels_id').val();var wheels_prize_id =$('#wheels_prize_id').val();
           $.post("check_chance", { "value": value ,"wheels_id":wheels_id,'wheels_prize_id':wheels_prize_id||''},
           function(data){
               if(data!='ok'){
               layer.alert('其他奖品概率总和已达到'+data+'%,总和不能超过100%,请重新填写!');
               $("#prize_chance").val('0');
           }


           }, "html");

    }


    $("#prize_chance").change(function(){

        check();
    })
    function prize_edit(wheels_prize_id,prize_type){
//alert('奖品编辑 ');
        $.post("get_one_prize", { wheels_prize_id: wheels_prize_id,prize_type:prize_type},
                function(data){

                    $('#createList').hide();
                    $('#createDetail').show();
//start
                    $("#prize_type").val(prize_type);
                    $("#wheels_prize_id").val(wheels_prize_id);
                    $("#start_sale_time").val(data.start_date);
                    $("#end_sale_time").val(data.end_date);
                    if(prize_type==3){
//积分：
                        $("#prize_type").val(data.prize_type);       //类型
                        $("#prize_num").val(data.prize_have);         //奖品剩余数
                        $("#prize_chance").val(data.prize_percent);      //概率
                        $("#integral").val(data.point);      //积分奖励
//alert(data.prize_limit);
                        if(data.prize_limit>0){
                            $('#num_limit option:eq(1)').attr('selected','selected');
                            $('#prize_limit').val(data.prize_limit);
                            $('#num_input').show();
                        }else {
                            $('#num_limit option:eq(0)').attr('selected','selected');
                            $('#prize_limit').val('0');
                            $('#num_input').hide();
                        }


                        $("#coupon_reduce").hide();
                        $("#coupon_sale").hide();
                        $("#money_info").hide();
                        $("#integral_info").fadeIn();


                    }

                    if(prize_type==5){


                        $("#prize_type").val(data.prize_type);       //类型
                        $("#prize_num").val(data.prize_have);         //奖品剩余数
                        $("#prize_chance").val(data.prize_percent);      //概率
                        $("#money").val(data.cash1);//奖金
                        $("#money_max").val(data.cash2);//奖金
                        if(data.prize_limit>0){
                            $('#num_limit option:eq(1)').attr('selected','selected');
                            $('#prize_limit').val(data.prize_limit);
                            $('#num_input').show();
                        }else {
                            $('#num_limit option:eq(0)').attr('selected','selected');
                            $('#prize_limit').val('0');
                            $('#num_input').hide();
                        }



                        $("#coupon_reduce").hide();
                        $("#coupon_sale").hide();
                        $("#integral_info").hide();
                        $("#money_info").fadeIn();
                    }

                    if(prize_type==1){


                        $("#prize_type").val(data.prize_type);       //类型
                        $("#prize_num").val(data.prize_have);         //奖品剩余数
                        $("#prize_chance").val(data.prize_percent);      //概率

                        $("#coupon_sale_name").val(data.coupon_name);   //打折券名称
                        $("#coupon_sale_price").val(data.coupon_discount); //折扣值*

                        if(data.prize_limit>0){
                            $('#num_limit option:eq(1)').attr('selected','selected');
                            $('#prize_limit').val(data.prize_limit);
                            $('#num_input').show();
                        }else {
                            $('#num_limit option:eq(0)').attr('selected','selected');
                            $('#prize_limit').val('0');
                            $('#num_input').hide();
                        }




                        $("#coupon_reduce").hide();
                        $("#coupon_sale").hide();
                        $("#integral_info").hide();
                        $("#money_info").hide();
                        $("#coupon_sale").fadeIn();
                    }
                    if(prize_type==2){


                        $("#prize_type").val(data.prize_type);       //类型
                        $("#prize_num").val(data.prize_have);         //奖品剩余数
                        $("#prize_chance").val(data.prize_percent);      //概率


                        $("#coupon_name").val(data.coupon_name);   //满减券名称
                        $("#coupon_price").val(data.coupon_denomination);  //面值


                        if(data.prize_limit>0){
                            $('#num_limit option:eq(1)').attr('selected','selected');
                            $('#prize_limit').val(data.prize_limit);
                            $('#num_input').show();
                        }else {
                            $('#num_limit option:eq(0)').attr('selected','selected');
                            $('#prize_limit').val('0');
                            $('#num_input').hide();
                        }



                        $("#coupon_reduce").hide();
                        $("#coupon_sale").hide();
                        $("#integral_info").hide();
                        $("#money_info").hide();
                        $("#coupon_sale").fadeIn();
                    }



                    $('#prize_type').attr("readonly",true);

                     $('#coupon_sale_price ').attr("readonly",true);
                     $('#money ').attr("readonly",true);
                     $('#integral').attr("readonly",true);
                     $('#coupon_price ').attr("readonly",true);
                    $('#coupon_sale_name').attr("readonly",true);
                    $('#coupon_name ').attr("readonly",true);
                    $('#start_sale_time ').attr("readonly",true);
                    $('#end_sale_time ').attr("readonly",true);
                    
 /*                   // alert(data.wheels_prize_id);
                    $("#prize_type").val(data.prize_type);       //类型
                    $("#prize_num").val(data.prize_num);         //奖品剩余数
                    $("#prize_chance").val(data.prize_percent);      //概率
                    $("#money").val(data.cash);//奖金
                    $("#integral").val(data.point);      //积分奖励

                    $("#coupon_sale_name").val(data.coupon_name);   //打折券名称
                    $("#coupon_name").val(data.coupon_name);   //满减券名称
                    $("#coupon_price").val(data.coupon_denomination);  //面值
                    $("#coupon_sale_price").val(data.coupon_discount); //折扣值*/






                },'json'

        );




        /*       $('#prize_type').attr("disabled","disabled");
         $('#prize_type').attr("disabled","disabled");
         $('#coupon_sale_price ').attr("disabled","disabled");
         $('#money ').attr("disabled","disabled");
         $('#integral').attr("disabled","disabled");
         $('#coupon_price ').attr("disabled","disabled");*/

       $('.saveCreateBtn').attr("data-save-1",prize_type);
        $('.saveCreateBtn').attr("data-save-2",wheels_prize_id);
        check();
    }

	//end  奖品列表








	$("#goods_input_edit").on('click',function(){
		layer.open({
			type: 1,
			title:'选择商品',
			skin: 'layui-layer-rim', //加上边框
			area: ['420px', '240px'], //宽高
			btn:['确定','取消'],
			content: 'html内容'
		});
	})
	function fg_operate(name, grid) {
		if (name == 'add') {
			$('.flexigrid').parent().removeClass('active');
			$('.flexigrid').parent().next().addClass('active');
		}

		if(name=='add_prize'){
			add_prize();
		}


	}
	function check_goods(obj){
		//console.log($(obj).is(':checked'));
		if($(obj).is(':checked')){
			$(obj).attr('checked',true);
			$(obj).parent().siblings().children().attr('checked',false);
		}else{
			$(obj).attr('checked',false);

		}
	}
	function select_goods(goods){
		re = new RegExp("！","g");
		groupbuy_goods_name = data_null(goods.goods_name).replace(re," ");
		$('#goods_id').val(goods.goods_id);
		$('#groupbuy_goods_image').attr('src',data_null(goods.goods_image));
		$('#groupbuy_goods_price').text(data_null(goods.goods_marketprice));
		$('#groupbuy_goods_name').text(groupbuy_goods_name);
		$('.div_goods_search_result').hide();
	}
	function add_prize(){
		wheels_id = $('#wheels_id').val();
		$('#wheels_prize_id').val('');
		$('input').attr('readonly',false);
        $('#prize_chance').val('');
		$('#createList').hide();
		$('#createDetail').show();
	}
	function add_action(){
		$('#createList').hide();
		$('#add_form_op').addClass('active');

	}
	//app
	$("#prize_type").change(function() {
		if(document.getElementById("prize_type").value == 1) {
			$("#integral_info").hide();
			$("#money_info").hide();
			$("#coupon_reduce").hide();
			$("#coupon_sale").fadeIn();
		} else if(document.getElementById("prize_type").value == 2){
			$("#integral_info").hide();
			$("#coupon_sale").hide();
			$("#money_info").hide();
			$("#coupon_reduce").fadeIn();
		}else if(document.getElementById("prize_type").value == 3){
			$("#money_info").hide();
			$("#coupon_reduce").hide();
			$("#coupon_sale").hide();
			$("#integral_info").fadeIn();
		}else if(document.getElementById("prize_type").value == 5){
			$("#integral_info").hide();
			$("#coupon_reduce").hide();
			$("#coupon_sale").hide();
			$("#money_info").fadeIn();
		}
	});
	$("#coupon_valid").change(function() {
		if(document.getElementById("coupon_valid").selectedIndex == 0) {
			$("#after_time").hide();
			$("#fixed_time").fadeIn();
		} else {
			$("#fixed_time").hide();
			$("#after_time").fadeIn();
		}
	});
	$("#coupon_sale_valid").change(function() {
		if(document.getElementById("coupon_sale_valid").selectedIndex == 0) {
			$("#after_sale_time").hide();
			$("#fixed_sale_time").fadeIn();
		} else {
			$("#fixed_sale_time").hide();
			$("#after_sale_time").fadeIn();
		}
	});
	$("#num_limit").change(function() {
		if(document.getElementById("num_limit").selectedIndex == 1) {
			document.getElementById("num_input").style.display = 'block';
			document.getElementById("num_input_notic").style.display = 'block';
		} else {
			document.getElementById("num_input").style.display = 'none';
			document.getElementById("num_input_notic").style.display = 'none';
		}
	});

	$("body").on("click","#preview .uploadimg .remove",function(){
		var urls = $(this).parent().attr("imgname");$(this).parent().remove();
		if(urls){
			$.ajax({
				type: "POST",
				url: "del_set_onload?url="+urls,
				data: 123,
				dataType: "json",
				success: function(data){
				}
			});
		}
	});
//奖品库存修改
	function stock_edit(wheels_prize_id){
//alert('库存修改');

		var content='<dl class="row"><dt class="tit"><label for="stock">剩余数量：</label> </dt>'+
				'<dd class="opt">'+
				'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="stock" name="prize_have" type="number" style="width: 100px">&nbsp;&nbsp;份'+
				'</dd>'+
				'</dl>';

		layer.open({
			type: 1,
			skin: 'layui-layer-rim', //加上边框
			title: '<b>选择商品</b>',
			area: ['300px', '200px'], //宽高
			content:content,
			btn: ['确定','取消'], //按钮
			yes:function(){

				var prize_have =$('#stock').val();
				layer.closeAll();
				$.post("wheel_stock_edit", { wheels_prize_id: wheels_prize_id,prize_have:prize_have},
						function(data){
							$("#flexigrid").flexReload();
							//测试按钮
						//	window.location.href="wheel_prize_set";
						});


			},
			no:function(){}


		})



	}








<?php echo '</script'; ?>
>

</html><?php }
}
