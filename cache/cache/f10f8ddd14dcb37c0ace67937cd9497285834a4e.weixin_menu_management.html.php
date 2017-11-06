<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:31:06
  from "D:\www\yunjuke\application\admin\views\weixin_menu_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980202a920399_00123736',
  'file_dependency' => 
  array (
    'f10f8ddd14dcb37c0ace67937cd9497285834a4e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\weixin_menu_management.html',
      1 => 1496923836,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5980202a920399_00123736 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css" />


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>微信自定义菜单</h3>
						<h5>设置微信公众号底部菜单</h5>
					</div>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 由于微信客户端缓存，需要24小时微信客户端才会展现出来。可以尝试取消关注公众账号后再次关注，则可以看到创建后的效果。</li>
					<li>一级菜单最多4个汉字，二级菜单最多7个汉字。</li>
				</ul>
			</div>
			<form method="post" id="form_email" action="http://www.juketz.com/admin.php/weixin/setting" name="settingForm">
				<input type="hidden" name="form_submit" value="ok">
				<div class="ncap-form-default">

					<div class="menu_setting_area">
						<div class="menu_preview_area">
							<div class="mobile_menu_preview">
								<div class="mobile_hd tc">久思微</div>
								<div class="mobile_bd">
								
								
									<ul class="pre_menu_list">
		                                																				<li class="pre_menu_item size1of3" data-name="BE购物" data-type="1" data-value="" style="display: block; width: 33.33%;">
										<a href="javascript:void(0);" class="pre_menu_link">
										<i class="icon_menu_dot"></i><span class="">BE购物</span>
										</a>
										<div class="sub_pre_menu_box" style="display: none;">
										<ul class="sub_pre_menu_list">
																				<li id="" class="jslevel2">
										<a href="javascript:void(0);" class="jsSubView">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">子菜单名称</span></span>
										</a></li>
										<li class="js_addMenuBox"><a href="javascript:void(0);" class="jsSubView js_addL2Btn" title="最多添加5个子菜单">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon14_menu_add"></i></span>
										</a></li>
																				</ul>
										<i class="arrow arrow_out"></i><i class="arrow arrow_in"></i></div></li>
																				<li class="pre_menu_item size1of3" data-name="会员服务" data-type="2" data-value="" style="display: block; width: 33.33%;">
										<a href="javascript:void(0);" class="pre_menu_link">
										<i class="icon_menu_dot"></i><span class="">会员服务</span>
										</a>
										<div class="sub_pre_menu_box" style="display: none;">
										<ul class="sub_pre_menu_list">
																														<li id="" class="jslevel2" data-name="童装订制" data-type="9" data-value="">
										<a href="javascript:void(0);" class="jsSubView">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">童装订制</span></span>
										</a></li>
																				<li id="" class="jslevel2" data-name="热门穿搭" data-type="6" data-value="">
										<a href="javascript:void(0);" class="jsSubView">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">热门穿搭</span></span>
										</a></li>
																				<li id="" class="jslevel2" data-name="我的导购" data-type="4" data-value="">
										<a href="javascript:void(0);" class="jsSubView">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">我的导购</span></span>
										</a></li>
																				<li class="js_addMenuBox"><a href="javascript:void(0);" class="jsSubView js_addL2Btn" title="最多添加5个子菜单">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon14_menu_add"></i></span>
										</a></li>
										
																				</ul>
										<i class="arrow arrow_out"></i><i class="arrow arrow_in"></i></div></li>
																				<li class="pre_menu_item size1of3" data-name="个人中心" data-type="2" data-value="" style="display: block; width: 33.33%;">
										<a href="javascript:void(0);" class="pre_menu_link">
										<i class="icon_menu_dot"></i><span class="">个人中心</span>
										</a>
										<div class="sub_pre_menu_box" style="display: none;">
										<ul class="sub_pre_menu_list">
																				<li id="" class="jslevel2">
										<a href="javascript:void(0);" class="jsSubView">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">子菜单名称</span></span>
										</a></li>
										<li class="js_addMenuBox"><a href="javascript:void(0);" class="jsSubView js_addL2Btn" title="最多添加5个子菜单">
										<span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon14_menu_add"></i></span>
										</a></li>
																				</ul>
										<i class="arrow arrow_out"></i><i class="arrow arrow_in"></i></div></li>
																				
										<li class="add_pre_menu_box pre_menu_link on" style="display: none;">
											<a class="addimgparent"><img src="http://[::1]/yunjuke/application/admin/views/images/add_pre_menu_box.png" class="addimg"  alt="添加菜单">
											</a>
										</li>
										
																			</ul>
								</div>
							</div>
						</div>
						<div class="menu_form_area">
							<div id="js_none" class="menu_initial_tips tips_global" style="display: none;">点击左侧菜单进行编辑操作</div>
							<div id="js_rightBox" class="portable_editor to_left" style="display: block;">
								<div class="editor_inner">
									<div class="global_mod float_layout menu_form_hd js_second_title_bar">
										<h4 class="global_info">访问主页</h4>
										<div class="global_extra">
											<a href="javascript:void(0);" id="jsDelBt">删除菜单</a>
										</div>
									</div>
									<div id="js_innerNone" style="display: block;" class="msg_sender_tips tips_global">已添加子菜单，仅可设置菜单名称。</div>
									<div class="menu_from_bd" id="view">
										<div class="frm_control_group js_setNameBox"> <label for="" class="frm_label"> 
											<strong>菜单名称</strong>    </label>
											<div class="frm_controls"> <span class="frm_input_box with_counter counter_in append"> 
												<input type="text" class="frm_input js_menu_name" value="" placeholder="" onchange="save_val(1)" id="changename">    </span>

												<p class="frm_tips js_titleNolTips">字数不超过4个汉字或8个字母</p>
											</div>
										</div>
										<div class="frm_control_group js_setNameBox"> <label for="" class="frm_label"> 
											<strong>菜单类型</strong>    </label>
											<div class="frm_controls">  
												  <select name="type" class="type form_select" onchange="save_val(2)">
													<option value="1">聚客商城</option>
													<option value="2">个人中心</option>
													<option value="20">在线客服</option>
													<option value="4">我的导购</option>
													<option value="5">折扣中心</option>
													<option value="6">热门穿搭</option>
													<option value="7">积分小游戏</option>
													<option value="8">积分礼品</option>
													<option value="9">童装订制</option>
													<option value="10">我的订单</option>
													<option value="11">我的购物车</option>
													<option value="12">我的收藏</option>
													<option value="13">我的优惠券</option>
													<option value="14">满减满折</option>
													<option value="15">抢红包</option>
													<option value="16">会员签到</option>
													<option value="17">积分商城</option>
													<option value="18">刮刮卡</option>
													<option value="19">大转盘</option>
												    <option value="3" selected="">自定义链接</option>
			                                     </select>   
											</div>
										</div>
										<div class="frm_control_group js_setNameBox"> <label for="" class="frm_label"> 
											<strong>链接地址</strong>    </label>
											<div class="frm_controls"> <span class="frm_input_box with_counter counter_in append"> 
												<input type="text" class="frm_input js_menu_name" value="http://" placeholder="请添加完整的链接地址" onchange="save_val(3)" id="changevalue">    </span>

											</div>
										</div>
									</div>
								</div>
								<span class="editor_arrow_wrp"> <i class="editor_arrow editor_arrow_out"></i><i class="editor_arrow editor_arrow_in"></i></span>
							</div>
						</div>
					</div>
                   <script type="text/javascript">
					   $(function(){
                   	  $('.pre_menu_item').live("click",function(){
						  	$(".current").removeClass("current");
                   	  	    $(this).siblings().removeClass("current").find('div').css("display","none");
                   	  	    $(this).addClass("current").find('div').css("display","block");
	                   	  	var menuname = $(this).attr('data-name');var menutype = $(this).attr('data-type');var menulink = $(this).attr('data-value');
							$('#changename').val(menuname);
							$('select.form_select').val(menutype);
						    $('#changevalue').val(menulink);
						    if(menutype==3){
						    	$('#changevalue').parents('div.js_setNameBox').show();
						    }else{
						    	$('#changevalue').parents('div.js_setNameBox').hide();
						    }
                   	  	});
                   	  $('.js_addMenuBox').live("click",function(){
                   	  	  if(($(this).siblings().length)<5)
                   	  	  {
                   	  	  	$(this).parent().prepend('<li id="" class="jslevel2"><a class="jsSubView"><span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">子菜单名称</span></span></a></li>');
                   	  	  }
                   	  	  else{
                   	  	  	$(this).css("display","none");
                   	  	  }
                   	  	});
//						**************************   
						   
						$('.add_pre_menu_box').click(function(){
                   	  	  if(($(this).siblings().length)<5)
                   	  	  {
                   	  	  	$(this).before('<li class="pre_menu_item size1of3"><a href="javascript:void(0);" class="pre_menu_link"><i class="icon_menu_dot"></i><span class="">菜单名称</span></a><div class="sub_pre_menu_box" style="display: none;"><ul class="sub_pre_menu_list"><li id="" class="jslevel2"><a href="javascript:void(0);" class="jsSubView"><span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon20_common"></i><span class="js_l2Title">子菜单名称</span></span></a></li><li class="js_addMenuBox"><a href="javascript:void(0);" class="jsSubView js_addL2Btn" title="最多添加5个子菜单"><span class="sub_pre_menu_inner js_sub_pre_menu_inner"><i class="icon14_menu_add"></i></span></a></li></ul><i class="arrow arrow_out"></i><i class="arrow arrow_in"></i></div></li>');
 
                   	  	  }
                   	  	  else{
                   	  	  	$(this).css("display","none");
                   	  	  }
                   	  	});
						   
						   
						   
						$(".jslevel2").live("click",function(event){
							$('.pre_menu_item').removeClass("current")
							$(".current").removeClass("current");
							$(this).addClass("current");
							var menuname = $(this).attr('data-name');var menutype = $(this).attr('data-type');var menulink = $(this).attr('data-value');
							$('#changename').val(menuname);
							$('select.form_select').val(menutype);
							$('#changevalue').val(menulink);
							if(menutype==3){
						    	$('#changevalue').parents('div.js_setNameBox').show();
						    }else{
						    	$('#changevalue').parents('div.js_setNameBox').hide();
						    }
							event.stopPropagation();
						   
					   })
//				点击加号增加菜单名称
					   var i=$('li.pre_menu_item').size();
					   $(".add_pre_menu_box").live("click",function(){
						   i++;
						   if(i>3){
							   i=3;
						   }
					   	   addimg();
						   
					   })
					   function addimg(){
						   if(i===0){
							 remove();
						   $(".pre_menu_item").css("display","none");
						   $(".add_pre_menu_box").css({"display":"block","width":"100%"})
					   }else if(i===1){
						   remove();
						   $(".pre_menu_item:eq(0)").css({"display":"block","width":"50%"})
						   $(".add_pre_menu_box").css({"display":"block","width":"48%"})
					   }else if(i===2){
						   remove();
						   $(".pre_menu_item:eq(0)").css({"display":"block","width":"33.3%"})
						   $(".pre_menu_item:eq(1)").css({"display":"block","width":"33.3%"})
						   $(".add_pre_menu_box").css({"display":"block","width":"32.3%"})
					   }else if(i===3){
						   remove();
						   $(".pre_menu_item:eq(0)").css({"display":"block","width":"33.3%"})
						   $(".pre_menu_item:eq(1)").css({"display":"block","width":"33.3%"})
						   $(".pre_menu_item:eq(2)").css({"display":"block","width":"33.3%"})
						   $(".add_pre_menu_box").css("display","none")
					   }else{
						   return false;
					   }
					   }
						   
						function remove(){
							$(".pre_menu_item").css("display","none");
						   $(".add_pre_menu_box").css("display","none");
						}
						  
//		点击加号增加菜单名称结束
			
					   
//			删除选中菜单		   
					   $("#jsDelBt").click(function(){
						   if($(".current")!=undefined){
						   i--;
						   if(i<0){
							   i=0
						   }
						   $(".current").remove();
						   if($(".pre_menu_item").length==0){
							   $(".add_pre_menu_box").css({"display":"block","width":"100%"})
							   
						   }else if($(".pre_menu_item").length==1){
							   $(".pre_menu_item").css({"display":"block","width":"50%"})
							   $(".add_pre_menu_box").css({"display":"block","width":"48%"})
							   
						   }else if($(".pre_menu_item").length==2){
							   $(".add_pre_menu_box").css({"display":"block","width":"32.3%"})
							   
			
						   }
						   }
					   })
					   
//					   写菜单名改变选中菜单名称
					   $("#changename").change(function(){
						   $(".current span:eq(0)").html($(this).val())
					   })
					    })
					function save_val(type){
						   obj = $('ul.pre_menu_list').find('li.current');
						   var type_val = '';
						   if(type==1){
							   type_val = $('#changename').val();
							   obj.attr('data-name',type_val);
						   }else if(type==2){
							   type_val = $('select.form_select').val();
							   if(type_val==3){
								   $('#changevalue').parents('div.js_setNameBox').show();
							   }else{
								   $('#changevalue').parents('div.js_setNameBox').hide();
								   obj.attr('data-value','');
							   }
							   obj.attr('data-type',type_val);
						   }else if(type==3){
							   type_val = $('#changevalue').val();
							   obj.attr('data-value',type_val);
						   }
						   
					  }    
                  </script>
					<div class="bot">
						<a href="JavaScript:void(0);" class="btn btn-success radius" id="getup">保存并发布</a>
						<span class="btn btn-cancel radius" id="getup-span" style="display:none;">保存并发布</a>
					</div>
				</div>
			</form>
		</div>
		<div id="goTop">
			<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
			<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
		</div>
	<script type="text/javascript">
	//提交保存
	$(function(){
		$('#getup').click(function(){
			$(this).hide();
			obj = $(this);
			$('#getup-span').show();
			var data = new Array();
			$('ul.pre_menu_list').children('li.pre_menu_item').each(function(k,v){
				var data_k=new Array();
				
				$(this).find('ul.sub_pre_menu_list').children('li.jslevel2').each(function(ka,va){
					var data_son=new Array();
					var data_son = {'name':$(this).attr('data-name'),'type':$(this).attr('data-type'),'value':$(this).attr('data-value'),'parent':k};
					//data_son=[$(this).attr('data-name'),$(this).attr('data-type'),$(this).attr('data-value'),k];
					data_k.push(data_son);
				})
				data.push({'son':data_k,'name':$(this).attr('data-name'),'type':$(this).attr('data-type'),'value':$(this).attr('data-value'),'parent':0});
			})
			//console.log(data);
			data_post = JSON.stringify(data);
			//console.log(data_post)
			$.ajax({
				type: "post",
		        url: "menu_submit",
		        data: 'data='+data_post,
		        dataType: "json",
		        success: function(data){
		        	obj.show();
					$('#getup-span').hide();
				if(data.state=='403'){
					login_ajax('shopadmin');return false;
				}
		        	if(data.errcode==0){
		        		layer.alert('设置并发布成功',function(){location.reload();});
		        		
		        	}else if(data.errcode>0){
		        		layer.msg('设置成功但发布失败');
		        	}else{
		        		layer.msg('设置成功发布失败，请检查设置参数是否正确');
		        	}
		        }
		   })
		})
	})
	</script>
	</body></html><?php }
}
