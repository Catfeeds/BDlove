/* m1000：搜索 | m1001：轮播广告 | m1002：通栏广告 | m1003：两栏广告 | m1004：商品推荐
   m1005：文本 | m1006：活动导航 | m1007：品牌导航 | m1008：自定义区域 | m1009：类目导航
   m1010：类别导航 | m1011：店招 | m1012：店铺信息*/
var PostContent=new Object(),PostContentnum =new Object(),keyword='',curpage=1,ordernum=1,goodsnum=1,brandnum=1,catenum=1,cate_num=1;
var TEMPLEimg = $("#TEMPLEimg").val();
var Meids = $("#defaultMid").val();
if(Meids<1){
	Meids='';
}
var configID='';

//商品推荐设置--获取所有商品
$(function(){
	ajax_get_all_goods_list(keyword,curpage);
	
	//初始化数据
	PostContent.m1= Meids; //模板id
	PostContent.m10='';//模板名称
	PostContent.m1000=new Object();
	PostContent.m1000 = {sortNum:'1'};
	PostContentnum.m1000='1';
	PostContent.m1011=new Object();
	PostContent.m1011 = {sortNum:'2'};
	PostContentnum.m1011='2';
	PostContent.m1012=new Object();
	PostContent.m1012 = {sortNum:'3'};
	PostContentnum.m1012='3';
	PostContent.m1001=new Object();
	PostContent.m1001.height='320';
	PostContent.m1001.sortNum='0';
	PostContent.m1001.content=new Array();
	PostContent.m1002=new Object();
	PostContent.m1002.sortNum='0';
	PostContent.m1003=new Object();
	PostContent.m1003.sortNum='0';
	PostContent.m1003.content=new Array(2);
	PostContent.m1004=new Object();
	PostContent.m1004.sortNum='0';
	PostContent.m1004.content=new Object();
	PostContent.m1004.content={
			type:'1',
			way:'radio11',
			select:'0',
			key:'',
			num:"10",
			sort:'0',
			title:'',
			shoutitle:false,
	}
	PostContent.m1004.content.gooodsid= new Array();
	PostContent.m1006=new Object();
	PostContent.m1006.sortNum='0';
    PostContent.m1006.content=new Array();  
	PostContent.m1007=new Object();
	PostContent.m1007.sortNum='0';
	PostContent.m1007.content=new Array();
    PostContent.m1008=new Object();
    PostContent.m1008.sortNum='0';
  	PostContent.m1009=new Object();
    PostContent.m1009.sortNum='0';
    PostContent.m1009.content=new Array();  
/*  	PostContent.m1010=new Object();
  	PostContent.m1010.sortNum='0';
	PostContent.m1010.content=new Array();  */
})

//搜索    店招    店铺信息    ---显示设置
$("body").on("click","#chkViewBox input",function(){
	id = $(this).attr("value");
	if(!($(this).attr("checked"))){
		$("#"+id).remove();
		if(id=='m1000'){
			delete PostContent['m1000'];
		}else if(id=='m1011'){
			delete PostContent['m1011'];
		}else if(id=='m1012'){
			delete PostContent['m1012'];
		}
		
	}else{
		
		if(id=='m1000'){
			var str1= ' <div class="wx_mod" modid="1000" id="m1000" >'+
				        '<div class="bd">'+
				            '<div class="v3_shop_bar">'+
				                '<div class="v3_shop_header mui-flex">'+
				                    '<div class="category_menu cell fixed">'+
				                        '<span class="more category_menu_icon">&#xe604;</span>'+
				                    '</div>'+
				                    '<div class="mobile_search cell">'+
				                        '<div class="m_search_wrap">'+
				                            '<input type="text" name="" id="" class="search_input" placeholder="搜索店内商品">'+
				                        '</div>'+
				                    '</div>'+
				               ' </div>'+
				            '</div>'+
				        '</div>'+
				    '</div>';
			if($("#m1011")){
				$("#m1011").before(str1);
			}else if($("#m1012")){
				$("#m1012").before(str1);
			}else{
				$("#wx_mod_replace").before(str1);
			}
			PostContent.m1000=new Object();
			PostContent.m1000 = {sortNum:'1'};
		}else if(id=='m1011'){
			var str2= '     <div class="wx_mod" modid="1011" id="m1011">'+
		        '<div class="title" style="padding: 10px; display: none;">店招模块</div>'+
		        '<div class="bd" style="display: block;">'+
		            '<a href="javascript:;" class="db"><img src="'+TEMPLEimg+'images/home_banner.jpg" class="wx-top-banner"></a>'+
		        '</div>'+
		    '</div>';
			if($("#m1000")){
				$("#m1000").after(str2)
			}else{
			    $("#wx_mod_replace").before(str2)
			}
			PostContent.m1011=new Object();
			PostContent.m1011 = {sortNum:'2'};
		}else if(id=='m1012'){
			var str3= '<div class="wx_mod" modid="1012" id="m1012" >'+
			' <div class="title" style="padding: 10px; display: none;">店铺信息模块</div>'+
			' <div class="bd" style="display: block;">'+
			' <div class="wx-shop-info">'+
			' <div class="info-l">'+
			' <img class="shop-logo" src="'+TEMPLEimg+'images/iconfont-stroe.png">'+
			' <h2>射洪  品牌店 </h2>'+
			'  <p>导购 某某某 正在为您服务</p>'+
			' </div>'+
			' <div class="info-r">'+
			' <span class="icon-yun shop-qrcode" style="display: block;">&#xe601;</span>'+
			' </div>'+
			' </div>'+
			' </div>'+
			' </div>';
			if($("#m1011")){
				$("#m1011").after(str3)
			}else if($("#m1000")){
				$("#m1000").after(str3)
			}else{
				$("#wx_mod_replace").before(str3);
			}
			PostContent.m1012=new Object();
			PostContent.m1012 = {sortNum:'3'};
		}
		
		
		
	}
});
	

//编辑模块名称
$("body").on("blur","#tplName",function(){
	PostContent.m10 = $(this).val();
});


//显示右侧编辑区域设置



var left_draggable_content="";
var id="";

//关闭右侧编辑模块
$("body").on("click",".box-edit-wrap .ui_dialog_close",function(){
	$(this).closest(".ui_dialog_wrapper").removeClass("active");
	$(this).closest(".box-edit-wrap").removeClass("openblock");
	$(".ui_overlay")[0].style.display="none";
	
	if($("#m"+id).find(".ui_mask_wrapper").hasClass("newssave")){
		
	}else{
		$("#m"+id).remove();
	}
	
	
	
	  $(".ui_mask_wrapper").each(function(k,v){
		  v.style.display="block";
	  });
	var idd = "m"+id;
});


  $( "#moduleList .ui-draggable" ).draggable({
	    containment:'#dragWrap',
	    connectToSortable: "#shopview",
	    helper: "clone",
	    revert: "invalid",
	      start: function() {
	    	  
	          $(".ui_mask_wrapper").each(function(k,v){
	    		  v.style.display="none";
	    	  });
	    	  id = $(this).attr("moduleid");
	    	  configID = id;
	    	  if(id==1001){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item m1001-d844 current" modtitle="图片轮播" modid="1001" id="m1001">'+
	    		    '<div class="title" style="display: none;padding: 10px;">轮播广告</div>'+
	    		    '<div class="bd">'+
	    		        '<div class="swiper-container" style="height: 160px;">'+
	    		            '<div class="swiper-wrapper">'+
	    		            '</div>'+
	    		            '<div class="swiper-pagination"></div>'+
	    		        '</div>'+
	    		    '</div>'+
	    		    '<div class="ui_mask_wrapper" style="">'+
	    		        '<div class="ui_mask">'+
	    		            '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		            '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		            '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		        '</div>'+
	    		    '</div>'+
	    		'</div>';
	    		
	    	  }else if(id==1002){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="通栏广告" modid="1002" id="m1002">'+
	    	        '<div class="title" style="display: none;padding: 10px;">通栏广告</div>'+
	    	        '<div class="bd">'+
	    	            '<div class="shop_mod_pic" data-lazyload="true">'+
	    	                '<a class="url" href="">'+
	    	                    '<img alt="图片" class="pp_init_img" data-src="https://qncdn.qiakr.com/qk_v3/fullcolumn.png" src="https://qncdn.qiakr.com/qk_v3/fullcolumn.png">'+
	    	                '</a>'+
	    	            '</div>'+
	    	        '</div>'+
	    	        '<div class="ui_mask_wrapper" style="">'+
	    	            '<div class="ui_mask">'+
	    	                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    	                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    	                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    	            '</div>'+
	    	        '</div>'+
	    	    '</div>';
	    		
	    	  }else if(id==1003){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="两栏广告" modid="1003" id="m1003">'+
	    		        '<div class="title" style="display: none;padding: 10px;">两栏广告</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shop_mod_pic shop_mod_pic_1" data-lazyload="true">'+
	    		                '<a href="" title="图片" class="url"><img alt="图片" class="pp_init_img" src="https://qncdn.qiakr.com/qk_v3/left.png"></a>'+
	    		                '<a href="" title="图片" class="url"><img alt="图片" class="pp_init_img" src="https://qncdn.qiakr.com/qk_v3/right.png"></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		            '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		               '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
	    	  }else if(id==1004){
	    		  left_draggable_content = '<div class="wx_mod sortable-item current" modtitle="商品推荐" modid="1004" id="m1004">'+
	    		        '<div class="title" style="display: none;padding: 10px;">商品推荐</div>'+
	    		        '<div class="bd m_recommend_bdm1004-62d6" id="m_recommend_bdm1004-62d6">'+
	    		            '<div class="wx_itemlist" data-lazyload="true">'+
	    		               '<div class="shop_mod_pic_1">'+
	    		                    '<div class="hproduct">'+
	    		                        '<p class="cover">'+
	    		                            '<a href="javascript:;"><img class="pp_init_img" src="https://qncdn.qiakr.com/qk_v3/goods.png" alt=""></a>'+
	    		                        '</p>'+
	    		                        '<p class="fn"><a href="javascript:;">商品标题</a></p>'+
	    		                        '<p class="prices"><strong><em>￥331.00</em><del>¥331.00</del></strong>'+
	    		                        '</p>'+
	    		                    '</div>'+
	    		                    '<div class="hproduct">'+
	    		                        '<p class="cover">'+
	    		                            '<a href="javascript:;"><img class="pp_init_img" src="https://qncdn.qiakr.com/qk_v3/goods.png" alt=""></a>'+
	    		                        '</p>'+
	    		                        '<p class="fn"><a href="javascript:;">商品标题</a></p>'+
	    		                        '<p class="prices"><strong><em>￥331.00</em><del>¥331.00</del></strong>'+
	    		                        '</p>'+
	    		                    '</div>'+
	    		                '</div>'+
	    		            '</div>'+
	    		        '</div>'+
	    		       '<div class="ui_mask_wrapper" style="">'+
	    		           '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		           '</div>'+
	    		       '</div>'+
	    		    '</div>';
	    		
	    	  }else if(id==1005){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="文本" modid="1005" id="m1005">'+
	    		        '<div class="title" style="display: none;padding: 10px;">文本</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shop_mod_text">'+
	    		            '</div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		            '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
	    	  }else if(id==1006){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="活动导航" modid="1006" id="m1006">'+
	    		        '<div class="title" style="display: none;padding: 10px;">活动导航</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shortcut_activity">'+
	    		                '<a href="javascript:;" class="shortcut_item cell coupon"><i class="iconfont shortcut_icon"></i>优惠券</a>'+
	    		                '<a href="javascript:;" class="shortcut_item cell miaosha"><i class="iconfont shortcut_icon"></i>秒杀</a>'+
	    		                '<a href="javascript:;" class="shortcut_item cell hongbao"><i class="iconfont shortcut_icon"></i>抢红包</a>'+
	    		                '<a href="javascript:;" class="shortcut_item cell newhot"><i class="iconfont shortcut_icon"></i>上新</a>'+
	    		           '</div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		           ' <div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
	    		  
	    	  }else if(id==1007){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="品牌导航" modid="1007" id="m1007">'+
	    		        '<div class="title" style="display: none;padding: 10px;">品牌导航</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shortcut_brand_wrap">'+
	    		                '<h3 class="shortcut_brand_tit">品牌精选 <a href="javascript:;">更多<i class="iconfont"></i></a></h3>'+
	    		                '<div class="shortcut_brand_list">'+
	    		                '</div>'+
	    		            '</div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		            '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
	    		  
	    	  }else if(id==1009){
	    		  left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="类目导航" modid="1009" id="m1009">'+
	    		        '<div class="title" style="display: none;padding: 10px;">类目导航</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shortcut_category_wrap">'+
	    		                '<h3 class="shortcut_brand_tit mb0">主题街 <a href="javascript:;">更多<i class="iconfont"></i></a></h3>'+
	    		                '<div class="shortcut_brand_list category-nav"></div>'+
	    		            '</div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		            '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
  	       }else if(id==1010){
	  	    	 left_draggable_content = '<div class="wx_mod sortable-item sortable-item current" modtitle="类目导航" modid="1010" id="m1010">'+
			        '<div class="title" style="display: none;padding: 10px;">类目导航</div>'+
			        '<div class="bd">'+
			            '<div class="shortcut_category_wrap">'+
			                '<h3 class="shortcut_brand_tit mb0">主题街 <a href="javascript:;">更多<i class="iconfont"></i></a></h3>'+
			                '<div class="shortcut_brand_list category-nav"></div>'+
			            '</div>'+
			        '</div>'+
			        '<div class="ui_mask_wrapper" style="">'+
			            '<div class="ui_mask">'+
			                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
			                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
			                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
			            '</div>'+
			        '</div>'+
			    '</div>';
  	       }else if(id==1008){
	    		  left_draggable_content = '<div class="wx_mod sortable-item current" modtitle="自定义代码" modid="1008" id="m1008">'+
	    		        '<div class="title" style="display: none;padding: 10px;">自定义代码</div>'+
	    		        '<div class="bd">'+
	    		            '<div class="shop_mod_html"></div>'+
	    		        '</div>'+
	    		        '<div class="ui_mask_wrapper" style="">'+
	    		            '<div class="ui_mask">'+
	    		                '<a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>'+
	    		                '<a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>'+
	    		                '<a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>'+
	    		            '</div>'+
	    		        '</div>'+
	    		    '</div>';
	    		
  	       }
	    	  
	    	  
	      },
	      drag: function() {
	        
	      },
	      stop: function() {
	    	  $(".ui_overlay")[0].style.display="block";
	    	    id = $(this).attr("moduleid");
	    		$("#me"+id).parent().addClass("openblock")
	    		$("#me"+id).addClass("active");
	    		module_sort();
	      }
  });
  
  
  
  
  
  
  $( "#shopview" ).droppable({
      accept: ".ui-draggable",
      activeClass: "ui-state-hover",
      hoverClass: "ui-state-active",
      drop: function( event,ui) {
    	        $(this).append(left_draggable_content);
    	  }

    });

  $( "#shopview" ).sortable({
		placeholder: "ui-state-highlight",
		revert: false,
		axis: "y",
		stop: function(event, ui){
			module_sort();
		}
		
	}).disableSelection();

  
 //对添加的模块排序
 function module_sort(){
	 var num_id =1;
	 $("#shopview .wx_mod").each(function(k,v){
		  if($(v).attr("id")=="m1000"){
			  PostContentnum.m1000=num_id;
		  }else if($(v).attr("id")=="m1011"){
			  PostContentnum.m1011=num_id;
		  }else if($(v).attr("id")=="m1012"){
			  PostContentnum.m1012=num_id;
		  }else if($(v).attr("id")=="m1001"){
			  PostContentnum.m1001=num_id;
		  }else if($(v).attr("id")=="m1002"){
			  PostContentnum.m1002=num_id;
		  }else if($(v).attr("id")=="m1003"){
			  PostContentnum.m1003=num_id;
		  }else if($(v).attr("id")=="m1004"){
			  PostContentnum.m1004=num_id;
		  }else if($(v).attr("id")=="m1005"){
			  PostContentnum.m1005=num_id;
		  }else if($(v).attr("id")=="m1006"){
			  PostContentnum.m1006=num_id;
		  }else if($(v).attr("id")=="m1007"){
			  PostContentnum.m1007=num_id;
		  }else if($(v).attr("id")=="m1008"){
			  PostContentnum.m1008=num_id;
		  }else if($(v).attr("id")=="m1009"){
			  PostContentnum.m1009=num_id;
		  }else if($(v).attr("id")=="m1010"){
			  PostContentnum.m1010=num_id;
		  }
		  num_id++;
	  });
	 console.log(PostContentnum)
 } 
  
  
  
//显示右侧编辑区域设置--品牌导航设置
 $("body").on("click","#typefile1007",function(){
	  var brands_info = "";
	    $.getJSON("ajax_get_all_brands_list",function(data){
	    	
  		if(data.state){
  			brands_info  = data.date;
  		}
        	  var htmls = '<tr data-tag="item" class="brandnavigation_item">'+
		        '<td data-tag="item-i">'+
        	  	'<input type="number" class="brand_item_num brandnavigation_item1007" name="orderNum" oldvalue="'+brandnum+'"  value="'+brandnum+'" style="border:none">'+
        	     '</td>'+
		        '<td class="tal">'+
		            '<select class="brand_select form-control input-sm w200" name="brandName" placeholder="请选择品牌">'+brands_info+
      	        '</select>'+
		       '</td>'+
		        '<td>'+
		            '<a href="javascript:;" class="icon_delete text-primary" title="删除">删除</a>'+
		        '</td>'+
		       '</tr>';
			  $("#brandListTbdme1007-09d5").append(htmls);
			  
			 var temp = { num:brandnum,select: 1};
			 PostContent.m1007.content.push(temp );
			 console.log(PostContent.m1007.content)
			 brandnum++;
       })
	
  
 })
 
 
 //品牌导航  --标题设置
 $("body").on("blur","#brandnavigationme1007",function(){
	 PostContent.m1007.title=$(this).val();
	 console.log(PostContent.m1007)
 })
  
 
//品牌导航  -下拉选择
$("body").on("change","select[name='brandName']",function(){
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	for(var key in PostContent.m1007.content){
	    for(var k in PostContent.m1007.content[key]){
	     	if(k=="num"){
	    		if(PostContent.m1007.content[key][k]==nums){
	    			PostContent.m1007.content[key]['select']=$(this).val();
		    	}
	    	}
	    }
	}
	console.log(PostContent.m1007.content)
});

 //品牌导航  --排序设置
$("body").on("change",".brandnavigation_item1007",function(){
	var oldnum = $(this).attr("oldvalue");
	var nums = $(this).val();
	for(var key in PostContent.m1007.content){
	    for(var k in PostContent.m1007.content[key]){
	      	if(k=="num"){
	    		if(PostContent.m1007.content[key][k]==oldnum){
	    			PostContent.m1007.content[key][k]=nums;
		    	}
	    	}
	    }
	}
	$(this).attr("oldvalue",nums);
	console.log(PostContent.m1007.content)
	
});

//删除推荐品牌
$("body").on("click",".brandnavigation_item .icon_delete",function(){
	$(this).parents("tr").remove();
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	for(var key in PostContent.m1007.content){
	    for(var k in PostContent.m1007.content[key]){
	    	if(k=="num"){
	    		if(PostContent.m1007.content[key][k]==nums){
		    		PostContent.m1007.content.splice([key],1);
		    	}
	    	}
	    	
	    }
	}
	console.log(PostContent.m1007.content)
});






//类目导航，分类导航  -- 标题设置

$("body").on("blur",".form-group_ui_form_row",function(){
	var  idds=$(this).attr("ids");
	if(idds==1009){
		PostContent.m1009.title=$(this).val();
	}else{
		PostContent.m1010.title=$(this).val();
	}
})

//类目导航，分类导航  -- 	显示名称

$("body").on("blur","input[name='categoryThemeName']",function(){
	var idds = $(this).closest("tr").attr("idds");
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	if(idds==1009){
		for(var key in PostContent.m1009.content){
		    for(var k in PostContent.m1009.content[key]){
		     	if(k=="num"){
		    		if(PostContent.m1009.content[key][k]==nums){
		    			PostContent.m1009.content[key]['name']=$(this).val();
			    	}
		    	}
		    }
		}
	}else{
		for(var key in PostContent.m1010.content){
		    for(var k in PostContent.m1010.content[key]){
		     	if(k=="num"){
		    		if(PostContent.m1010.content[key][k]==nums){
		    			PostContent.m1010.content[key]['name']=$(this).val();
			    	}
		    	}
		    }
		}
	}
})


//类目导航，分类导航  -- 下拉选择
$("body").on("change","select[name='categoryName']",function(){
	var idds = $(this).closest("tr").attr("idds");
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	if(idds==1009){
		for(var key in PostContent.m1009.content){
		    for(var k in PostContent.m1009.content[key]){
		     	if(k=="num"){
		    		if(PostContent.m1009.content[key][k]==nums){
		    			PostContent.m1009.content[key]['select']=$(this).val();
			    	}
		    	}
		    }
		}
	}else{
		for(var key in PostContent.m1010.content){
		    for(var k in PostContent.m1010.content[key]){
		     	if(k=="num"){
		    		if(PostContent.m1010.content[key][k]==nums){
		    			PostContent.m1010.content[key]['select']=$(this).val();
			    	}
		    	}
		    }
		}
	}	
});

//类目导航，分类导航  --排序设置
$("body").on("change",".categoryNav_item input[name='orderNum']",function(){
	var idds = $(this).closest("tr").attr("idds");
	var oldnum = $(this).attr("oldvalue");
	var nums = $(this).val();
	if(idds==1009){
		for(var key in PostContent.m1009.content){
		    for(var k in PostContent.m1009.content[key]){
		     	if(k=="num"){
		     		if(PostContent.m1009.content[key][k]==oldnum){
		    			PostContent.m1009.content[key][k]=nums;
			    	}
		    	}
		    }
		}
		console.log(PostContent.m1009)
	}else{
		for(var key in PostContent.m1010.content){
		    for(var k in PostContent.m1010.content[key]){
		     	if(k=="num"){
		     		if(PostContent.m1010.content[key][k]==oldnum){
		    			PostContent.m1010.content[key][k]=nums;
			    	}
		    	}
		    }
		}
		console.log(PostContent.m1010)
	}
	$(this).attr("oldvalue",nums);
	
	
});

//删除 类目导航，分类导航  
$("body").on("click",".categoryNav_item .icon_delete",function(){
	var idds = $(this).closest("tr").attr("idds");
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	
	if(idds==1009){
		for(var key in PostContent.m1009.content){
		    for(var k in PostContent.m1009.content[key]){
		     	if(k=="num"){
		     		if(PostContent.m1009.content[key][k]==nums){
			    		PostContent.m1009.content.splice([key],1);
			    	}
		     	}
		    }
		}
		console.log(PostContent.m1009)
	}else{
		for(var key in PostContent.m1010.content){
		    for(var k in PostContent.m1010.content[key]){
		     	if(k=="num"){
		     		if(PostContent.m1010.content[key][k]==nums){
			    		PostContent.m1010.content.splice([key],1);
			    	}
		    	}
		    }
		}
		console.log(PostContent.m1010)
	}
	$(this).parents("tr").remove();
});


//自定义代码保存
$("body").on("click","#btn-primaryme1008",function(){
	PostContent.m1008.content= appcontent.body.innerHTML;
	//console.log(PostContent.m1008)
});












  
//显示右侧编辑区域设置
  $(".typefile").on("change", function(e){
	  var lengs = $('#carouselListTbdme1001-4f6e').children('tr').length;
  	  if(lengs>4){
  		   alert("亲，最多只能上传5张图片哦！",2000,"");
  		  return false;
  	  }
	  ids= $(this).attr("typefile");
	  var src, url = window.URL || window.webkitURL || window.mozURL, files = e.target.files;
	  var formData = new FormData();
      for (var i = 0, len = files.length; i < len; ++i) {
    	  
    	  var file = files[i];
          if (url) {
              src = url.createObjectURL(file);
          } else {
              src = e.target.result;
          }
          formData.append("file["+i+"]",file);//文件上传
          if(ids==1001){//轮播广告
        	  var strs = '<tr data-tag="item" class="carousel_item">'+
                  '<td data-tag="item-i"><input type="number" class="carousel_item_num" name="orderNum" oldvalue="'+ordernum+'"  value="'+ordernum+'" style="border:none"></td>'+                 
                  '<td>'+
	                  '<div class="uploaded" style="margin:10px 0">'+                                    
	                  	'<img src="'+ src +'" width="94" height="54" data-tag="item-img">'+                                
	                  '</div>'+                            
	             ' </td>'+                            
	              '<td class="tal">'+
				    '<select name="imgLinkType" class="select-default form-control input-sm w200" style="display: block; margin-bottom: 10px;">'+
				        '<option value="1" selected="">微商城首页</option>'+
				        '<option value="2">个人中心</option>'+
				        '<option value="3">我的导购</option>'+
				        '<option value="4">我的订单</option>'+
				        '<option value="5">我的购物车</option>'+
				        '<option value="6">我的收藏</option>'+
				        '<option value="0">自定义链接</option>'+
				    '</select>'+
					'<input class="ui_form_text form-control input-sm w200" name="customerLinkUrl" type="text" placeholder="请输入图片的跳转链接，以http或https开头" style="display:none;" id="customerLink'+ids+'">'+
				'</td>'+         
				'<td><a href="javascript:;" class="icon_delete" idds ="'+ids+'" title="删除">删除</a></td>'+                        
			'</tr>';
        	  $("#carouselListTbdme1001-4f6e").append(strs);
        	  
        	  var demo = {
        			  num:ordernum,
        			  src:src,
        			  select:1,
        			  href:'',
        	  }
        	  $.ajax({
        			type: "POST",
        	        url: "store_decoration_pic_onload",
        	        data: formData,
        	        dataType: "json",
        	        processData: false,
                    contentType: false,
        	        success: function(data){
        	        	demo.src=data.msg;
        	        }
        		});
        	  PostContent.m1001.content.push(demo);
        	  ordernum++;
          }else if(ids==1002){//通栏广告
        	  $("#me"+ids).find(".select_img").find(".ui_image_preview")[0].src=src;
        	  PostContent.m1002.content = {
        			  src:src,
        			  select:1,
        			  href:'',
        	  }
        	  $.ajax({
        			type: "POST",
        	        url: "store_decoration_pic_onload",
        	        data: formData,
        	        dataType: "json",
        	        processData: false,
                    contentType: false,
        	        success: function(data){
        	        	PostContent.m1002.content.src=data.msg;
        	        }
        		});
          }else if(ids==1003){//两栏广告
      		  var demo = {
        			  src:src,
        			  select:1,
        			  href:'',
        	  }
        	  $.ajax({
        			type: "POST",
        	        url: "store_decoration_pic_onload",
        	        data: formData,
        	        dataType: "json",
        	        processData: false,
                    contentType: false,
        	        success: function(data){
        	        	demo.src=data.msg;
        	        }
        		});
        	  if($(this).attr("flag") =="left"){
        		  $(".ui_form_row .1003left")[0].src=src;
        		  PostContent.m1003.content[0]=demo
        	  }else{
        		  $(".ui_form_row .1003right")[0].src=src;
        		  PostContent.m1003.content[1]=demo
        	  }
        	  console.log(PostContent.m1003.content)
          }else if(ids==1009){//类目导航
        	  var cate_info = "";
      	    $.getJSON("ajax_get_all_cate_list?op=1009",function(data){
          		if(data.state){
          			cate_info  = data.date;
          		}
          		var htmls = '<tr data-tag="item" class="categoryNav_item" idds="1009">'+
					        '<td data-tag="item-i"><input type="number" class="brand_item_num" name="orderNum" oldvalue="'+catenum+'" value="'+catenum+'" style="border:none"></td>'+
					        '<td>'+
					            '<div class="uploaded" style="margin:10px 0">'+
					                '<img src="'+src+'" width="60" class="brand_td_img" height="60" data-tag="item-img">'+
					            '</div>'+
					        '</td>'+
					        '<td class="tal">'+
					            '<select class="category_select w200" name="categoryName" placeholder="请选择类目">'+cate_info+
			        	        '</select>'+
					        '</td>'+
					        '<td>'+
					        	'<input type="text" name="categoryThemeName" placeholder="6个字以内" class="ui_form_text category-theme-name form-control input-sm w140" value="">'+
					        '</td>'+
					        '<td><a href="javascript:;" class="icon_delete" title="删除">删除</a></td>'+
					    '</tr>';
          		
					  $("#categoryListTblme1009-1485").append(htmls);
		        	  var demo = {
		        			  num:catenum,
		        			  src:src,
		        			  select:1,
		        			  name:'',
		        	  }
		        	  $.ajax({
		        			type: "POST",
		        	        url: "store_decoration_pic_onload",
		        	        data: formData,
		        	        dataType: "json",
		        	        processData: false,
		                    contentType: false,
		        	        success: function(data){
		        	        	demo.src=data.msg;
		        	        }
		        		});
		        	  PostContent.m1009.content.push(demo);
		        	  //console.log(PostContent.m1009.content)
					  catenum++;
               })
          }else if(ids==1010){//自定义导航
        	  var cate_info = "";
        	    $.getJSON("ajax_get_all_cate_list?op=1009",function(data){
            		if(data.state){
            			cate_info  = data.date;
            		}
            		var htmls = '<tr data-tag="item" class="categoryNav_item" idds="1010">'+
  					        '<td data-tag="item-i"><input type="number" class="brand_item_num" name="orderNum"  oldvalue="'+cate_num+'" value="'+cate_num+'" style="border:none"></td>'+
  					        '<td>'+
  					            '<div class="uploaded" style="margin:10px 0">'+
  					                '<img src="'+src+'" width="60" class="brand_td_img" height="60" data-tag="item-img">'+
  					            '</div>'+
  					        '</td>'+
  					        '<td class="tal">'+
  					            '<select class="category_select w200" name="categoryName" placeholder="请选择类目">'+cate_info+
  			        	        '</select>'+
  					        '</td>'+
  					        '<td>'+
  					        	'<input type="text" name="categoryThemeName" placeholder="6个字以内" class="ui_form_text category-theme-name form-control input-sm w140" value="">'+
  					        '</td>'+
  					        '<td><a href="javascript:;" class="icon_delete" title="删除">删除</a></td>'+
  					    '</tr>';
            		
  					  $("#groupListTblme1010-58c9").append(htmls);
  					var demo = {
		        			  num:cate_num,
		        			  src:src,
		        			  select:1,
		        			  name:'',
		        	  }
		        	  $.ajax({
		        			type: "POST",
		        	        url: "store_decoration_pic_onload",
		        	        data: formData,
		        	        dataType: "json",
		        	        processData: false,
		                    contentType: false,
		        	        success: function(data){
		        	        	demo.src=data.msg;
		        	        }
		        		});
		        	  PostContent.m1010.content.push(demo);
		        	  //console.log(PostContent.m1010.content)
  					  cate_num++;
                 })
          }
          
      }
      

      //图片上传之后清空对象
      for(var key in formData ){
    	  delete formData[key];
      }
    
  })

//删除广告
$("body").on("click",".carousel_item .icon_delete",function(){
	$(this).parents("tr").remove();
	var nums = Number($(this).parent().siblings().find("input[name='orderNum']").val());
	for(var key in PostContent.m1001.content){
	    for(var k in PostContent.m1001.content[key]){
	    	if(k=="num"){
	    		if(PostContent.m1001.content[key][k]==nums){
		    		PostContent.m1001.content.splice([key],1);
		    	}
	    	}
	    	
	    }
	}
	console.log(PostContent.m1001.content);
 })
  
//添加广告时 选择广告尺寸  
$(".row_content .radio-primary").click(function(){
	$("#carousel-tips-heightme1001-4f6e").html($(this).find("input").val());
	PostContent.m1001.height=$(this).find("input").val();
	//console.log(PostContent)
});
  
//商品推荐设置  选择推荐方式
  $("#recommendWayme1004-70cc  .radio-info").click(function(){
	  if($(this).find("input").attr("id")=='radio121'){//自动
			PostContent.m1004.content.type='1';
		  if($("#autoRecSettingsme1004").hasClass("hide")){
			  $("#autoRecSettingsme1004").removeClass("hide")
		  }
		  if($("#handleRecSettingsme1004").hasClass("hide")==false){
			  $("#handleRecSettingsme1004").addClass("hide")
		  }
	  }else{//手动
			PostContent.m1004.content.type='2';
		  if($("#handleRecSettingsme1004").hasClass("hide")){
			  $("#handleRecSettingsme1004").removeClass("hide")
		  }
		  if($("#autoRecSettingsme1004").hasClass("hide")==false){
			  $("#autoRecSettingsme1004").addClass("hide")
		  }
	  }
  });
  

//商品推荐设置  自动推荐  商品类别
 $("#sltShowTypeme1004-70cc .radio-info").click(function(){
	 PostContent.m1004.content.way=$(this).find("input").attr("id");
	 if($(this).hasClass("radio-info_divs")){
		 //按新品 按特价
			PostContent.m1004.content.select='';
		 $(".div_select")[0].style.display="none";
	 }else{
		 $("#form-group_orderType").css("display",'block');
		 $(".div_select")[0].style.display="block";
		 if($(this).find("input").attr("id")=='radio11'){//按类目  
			 $("#sltCategoryme1004-70cc").siblings().addClass("hide");
			 $("#sltCategoryme1004-70cc").removeClass("hide");
			 
		 }else if($(this).find("input").attr("id")=='radio11x'){//按自定义分类 
			 $("#sltGroupme1004-70cc").siblings().addClass("hide");
			 $("#sltGroupme1004-70cc").removeClass("hide");
			 
		 }else if($(this).find("input").attr("id")=='radio12'){//按品牌 
			 $("#sltBrandme1004-70cc").siblings().addClass("hide");
			 $("#sltBrandme1004-70cc").removeClass("hide");
			 
		 }else if($(this).find("input").attr("id")=='radio15'){//按销量
			 $(".div_select")[0].style.display="none";
			 $("#form-group_orderType").css("display",'none');
			 $("#sltBrandme1004-70cc").siblings().addClass("hide");
			 $("#sltBrandme1004-70cc").removeClass("hide");
		 }
	 }
 });
 
//	商品推荐设置  自动推荐  参数设置
 $("body").on("click",".div_select select",function(){
	 PostContent.m1004.content.select=$(this).val();
})
 $("body").on("blur",".form-group input[name='keywords']",function(){
	 PostContent.m1004.content.key=$(this).val();
})
 $("body").on("click",".form-group select[name='limitNum']",function(){
	 PostContent.m1004.content.num=$(this).val();
})
 $("body").on("click",".form-group select[name='orderType']",function(){
	 PostContent.m1004.content.sort=$(this).val();
})

 $("body").on("blur",".form-group input[name='recTitle']",function(){
	 PostContent.m1004.content.title=$(this).val();
})

 $("body").on("click","#handleRecSettingsme1004 .checkbox-info input",function(){
	 if(PostContent.m1004.content.shoutitle){
		 PostContent.m1004.content.shoutitle=false;
	 }else{
		 PostContent.m1004.content.shoutitle=true;
	 }
})
function ajax_get_all_goods_list(keyword,curpage){
    $.getJSON(encodeURI("ajax_get_all_goods_list?keyword="+keyword+"&curpage="+curpage),function(data){
    		if(data.state){
    			var htmlstr="";
    			$.each(data.date,function(k,v){
	    		   htmlstr+='<tr id="'+v.goods_id+'-'+v.goods_spu+'">'+
	    		        '<td>'+
	    		            '<span class="img" style="background-image: url('+v.goods_image+')"></span>'+
	    		            '<div>'+
	    		               '<p class="name">'+v.goods_name+'</p>'+
	    		                '<p class="price">￥'+v.goods_marketprice+'</p>'+
	    		            '</div>'+
	    		        '</td>'+
	    		        '<td>'+
	    		           '<a href="javascript:;" class="add-rec" data-id="'+v.goods_id+'" data-stockid="'+v.goods_spu+'" data-name="'+v.goods_name+'" data-price="114" data-picurl="'+v.goods_image+'" data-tagprice="'+v.goods_marketprice+'">添加</a>'+
	    		        '</td>'+
	    		    '</tr>';
    			})
    			$("#proRecTbdme1004-70cc").empty();
    			$("#proRecTbdme1004-70cc").append(htmlstr);
    			$("#navgationme1004-70cc").empty();
    			$("#navgationme1004-70cc").append(data.pageinfo);
    		}else{
    			$("#proRecTbdme1004-70cc").empty();
    			$("#proRecTbdme1004-70cc").append('<tr><td class="tbl-placeholder" colspan="2">暂无商品信息！</td></tr>');
    			$("#navgationme1004-70cc").empty();
    			
    		}
	  
   })
}

 //搜索商品
 $("body").on("click","#searchProsme1004-70cc",function(){
	 var key = $("#keywordme1004-70cc").val();
	ajax_get_all_goods_list(key,curpage);
	
});
 
//翻页获取商品
$("body").on("click",".pagination a",function(){
	
	var pages = '';
	if($(this).hasClass("prev")){
		pages = Number($(".pagination .active").find("a").html())-1;
	}else if($(this).hasClass("next")){
		pages = Number($(".pagination .active").find("a").html())+1;
	}else{
		if($(this).hasClass("active")){
			return false;
		}
		pages = $(this).attr("data-page");
	}

	ajax_get_all_goods_list('',pages);
	
});

//添加推荐商品
$("body").on("click",".choose-rec-pro .add-rec",function(){
	if($(this).hasClass("recommended")){
		return false;
	}
	$(this).addClass("recommended");
	$(this).html("");
 var str ='<tr id="p-'+$(this).attr("data-id")+'" data-proid="'+$(this).attr("data-id")+'" data-stockid="'+$(this).attr("data-stockid")+'" data-proname="'+$(this).attr("data-name")+'" data-proimg="'+$(this).attr("data-picurl")+'" data-tagprice="'+$(this).attr("data-tagprice")+'">'+
				'<td>'+	
					'<input type="number" oldvalue="'+goodsnum+'" value="'+goodsnum+'" class="number-default" style="border:none">'+
				'</td>'+
				'<td>'+
					'<span class="img" style="background-image:url('+$(this).attr("data-picurl")+')"></span>'+
					'<div>'+
						'<p class="name">'+$(this).attr("data-name")+'</p>'+
						'<p class="price">￥'+$(this).attr("data-tagprice")+'</p>'+
					'</div>'+
			   '</td>'+
			   '<td>'+
			   		'<a href="javascript:;" class="del-rec">取消</a>'+
			   '</td>'+
			 '</tr>';
 $("#proRecResTbdme1004-70cc").append(str);
 $(this).html("已添加");
 var demo={num:goodsnum,goods_id:$(this).attr("data-id"),goods_spu:$(this).attr("data-stockid")};
 PostContent.m1004.content.gooodsid.push(demo);
 //console.log(PostContent.m1004.content);
 goodsnum++;
});


//删除推荐商品
$("body").on("click",".choose-rec-pro .del-rec",function(){
	var ids = $(this).parents("tr").attr("data-proid") +"-"+$(this).parents("tr").attr("data-stockid");
	$("#"+ids).find(".add-rec").removeClass("recommended");
	$("#"+ids).find(".add-rec").html("添加");
	var nums = $(this).parent().siblings().find("input[type='number']").val();
	for(var key in PostContent.m1004.content.gooodsid){
	    for(var k in PostContent.m1004.content.gooodsid[key]){
	    	if(k=='num'){
	    		if(PostContent.m1004.content.gooodsid[key][k]==nums){
		    		PostContent.m1004.content.gooodsid.splice([key],1);
		    	}
	    	}
	    }
	}
	$(this).parents("tr").remove();
	//console.log(PostContent.m1004.content);
});

//修改商品排序
$("body").on("change","#proRecResTbdme1004-70cc input[type='number']",function(){
	var oldnum = $(this).attr("oldvalue");
	var nums = $(this).val();
	for(var key in PostContent.m1004.content.gooodsid){
	    for(var k in PostContent.m1004.content.gooodsid[key]){
	    	if(k=='num'){
	    		if(PostContent.m1004.content.gooodsid[key][k]==oldnum){
		    		PostContent.m1004.content.gooodsid[key][k]=nums;
		    	}
	    	}
	    }
	}
	$(this).attr("oldvalue",nums);
	console.log(PostContent.m1004.content);
	
});












//轮播广告    选择自定义链接时弹出提示框
$("body").on("change","select[name='imgLinkType']",function(){
	var ids = $(this).parent().next().find("a").attr("idds");
	var nums = $(this).parent().siblings().find("input").val();
	if(ids=='1001'){
		for(var key in PostContent.m1001.content){
		    for(var k in PostContent.m1001.content[key]){
		     	if(k=="num"){
		    		if(PostContent.m1001.content[key][k]==nums){
		    			PostContent.m1001.content[key]['select']=$(this).val();
		    			PostContent.m1001.content[key]['href']='';
			    	}
		    	}
		    }
		}
		//console.log(PostContent.m1001.content)
	}
	$(this).next()[0].style.display="none";
	if($(this).val()<1){
		$(this).next()[0].style.display="block";
	}
	
});


//通栏广告  选择自定义链接时弹出提示框
$("body").on("change","#linkSltme1002-8ded select[name='imgLinkType']",function(){
	PostContent.m1002.content.select=$(this).val();
	PostContent.m1002.content.href='';
	$(this).next()[0].style.display="none";
	if($(this).val()<1){
		$(this).next()[0].style.display="block";
	}
	//console.log(PostContent.m1002.content)
});


//两栏广告  选择自定义链接时弹出提示框
$("body").on("change",".twocolumn-linkme1003-3545 select[name='imgLinkType']",function(){
	if($(this).parent().hasClass("dibleft")){
		PostContent.m1003.content[0].select=$(this).val();
		PostContent.m1003.content[0].href='';
	}else{
		PostContent.m1003.content[1].select=$(this).val();
		PostContent.m1003.content[1].href='';
	}
	$(this).next()[0].style.display="none";
	if($(this).val()<1){
		$(this).next()[0].style.display="block";
	}
	//console.log(PostContent.m1003.content)
});



//保存自定义链接地址
$("body").on("blur","input[name='customerLinkUrl']",function(){
	var hrefs = $(this).val();
	var ids = $(this).parent().next().find("a").attr("idds");
	var nums = $(this).parent().siblings().find("input").val();
	if(ids=='1001'){
		for(var key in PostContent.m1001.content){
		    for(var k in PostContent.m1001.content[key]){
		      	if(k=="num"){
		    		if(PostContent.m1001.content[key][k]==nums){
			    		PostContent.m1001.content[key]['select']=0;
			    		PostContent.m1001.content[key]['href']=hrefs;
			    	}
		    	}
		    }
		}
		//console.log(PostContent.m1001.content)
	}
});


//通栏广告  选择自定义链接时弹出提示框
$("body").on("blur","#linkSltme1002-8ded input[name='customerLinkUrl']",function(){
	var hrefs = $(this).val();
	PostContent.m1002.content.select=0;
	PostContent.m1002.content.href=hrefs;
	//console.log(PostContent.m1002.content)
	
});



//通栏广告  选择自定义链接时弹出提示框
$("body").on("blur",".twocolumn-linkme1003-3545 input[name='customerLinkUrl']",function(){
	var hrefs = $(this).val();
	if($(this).parent().hasClass("dibleft")){
		PostContent.m1003.content[0].select=0;
		PostContent.m1003.content[0].href=hrefs;
	}else{
		PostContent.m1003.content[1].select=0;
		PostContent.m1003.content[1].href=hrefs;
	}
	//console.log(PostContent.m1003.content)
	
});

//通栏广告  选择自定义链接时弹出提示框
$("body").on("blur",".twocolumn-linkme1003-3545 input[name='customerLinkUrl']",function(){
	var hrefs = $(this).val();
	if($(this).parent().hasClass("dibleft")){
		PostContent.m1003.content[0].select=0;
		PostContent.m1003.content[0].href=hrefs;
	}else{
		PostContent.m1003.content[1].select=0;
		PostContent.m1003.content[1].href=hrefs;
	}
	//console.log(PostContent.m1003.content)
	
});



//文本设置
$("body").on("blur","#textModContentme1005-f105",function(){
	PostContent.m1005=new Object();
	PostContent.m1005.sortNum='0';
	PostContent.m1005.content= $(this).val();
	//console.log(PostContent.m1005)
});




//左侧编辑模块展开 收起
$("body").on("click",".ui_mask_wrapper .btn_fold",function(){
	$(this).addClass("down");
	$("#"+$(this).closest(".wx_mod").attr('id')).find(".title").css("display","block");
	$("#"+$(this).closest(".wx_mod").attr('id')).find(".bd").css("display","none");
});


$("body").on("click",".ui_mask_wrapper .ui_mask .down",function(){
	$(this).removeClass("down");
	$("#"+$(this).closest(".wx_mod").attr('id')).find(".title").css("display","none");
	$("#"+$(this).closest(".wx_mod").attr('id')).find(".bd").css("display","block");
});


//点击左侧模块编辑 弹出右侧编辑模块
$("body").on("click",".ui_mask_wrapper .ui_mask .btn_edit",function(){
	var model = $("#me"+$(this).closest(".wx_mod").attr('modid')).siblings();
	$(model).each(function(k,v){
		if($(v).hasClass("active")){
			$(v).removeClass("active")
		}
	})
	$("#me"+$(this).closest(".wx_mod").attr('modid')).addClass("active");
	
	$("#me"+$(this).closest(".wx_mod").attr('modid')).parent().addClass("openblock");
	
	
	
	$(".ui_overlay")[0].style.display="block";//关闭左侧遮罩层
});


//左侧模块的删除
$("body").on("click",".ui_mask_wrapper .ui_mask .btn_trash",function(){
	var iddd = $(this).closest(".wx_mod").attr('id');
	if(PostContent.m1){
		 $.getJSON("del_store_decorate_tpl?id="+PostContent.m1+"&mid="+iddd,function(data){
			console.log(data)
		 });
	}
	
	  if(iddd=="m1001"){
		  delete PostContent.m1001;
			PostContent.m1001=new Object();
			PostContent.m1001.height='320';
			PostContent.m1001.sortNum='0';
			PostContent.m1001.content=new Array();
	  }else if(iddd=="m1002"){
		  delete PostContent.m1002;
		    PostContent.m1002=new Object();
		    PostContent.m1002.sortNum='0';
	  }else if(iddd=="m1003"){
		  delete PostContent.m1003;
		    PostContent.m1003=new Object();
			PostContent.m1003.sortNum='0';
			PostContent.m1003.content=new Array(2);
	  }else if(iddd=="m1004"){
		  delete PostContent.m1004;
		    PostContent.m1004=new Object();
			PostContent.m1004.sortNum='0';
			PostContent.m1004.content=new Object();
			PostContent.m1004.content={
					type:'1',
					way:'radio11',
					select:'0',
					key:'',
					num:"10",
					sort:'0',
					title:'',
					shoutitle:false,
			}
			PostContent.m1004.content.gooodsid= new Array();
	  }else if(iddd=="m1005"){
		  delete PostContent.m1005;
		    PostContent.m1005=new Object();
			PostContent.m1005.sortNum='0';
	  }else if(iddd=="m1006"){
		  delete PostContent.m1006;
		    PostContent.m1006=new Object();
			PostContent.m1006.sortNum='0';
		    PostContent.m1006.content=new Array();  
			  
	  }else if(iddd=="m1007"){
		  delete PostContent.m1007;
		    PostContent.m1007=new Object();
			PostContent.m1007.sortNum='0';
			PostContent.m1007.content=new Array();
	
	  }else if(iddd=="m1008"){
		  delete PostContent.m1008;
		    PostContent.m1008=new Object();
		    PostContent.m1008.sortNum='0';
	
	  }else if(iddd=="m1009"){
		  delete PostContent.m1009;
		  	PostContent.m1009=new Object();
		    PostContent.m1009.sortNum='0';
		    PostContent.m1009.content=new Array();  

	  }else if(iddd=="m1010"){
		  delete PostContent.m1010;
		  	PostContent.m1010=new Object();
		  	PostContent.m1010.sortNum='0';
			PostContent.m1010.content=new Array();
	  }
	
	$("#"+iddd).remove();
});



//保存模板
$("body").on("click","#btnSaveConf",function(){
	    PostContent.m10 =$("#tplName").val();
	var PostContents   = new Object();
		PostContents.m1    =  PostContent.m1;
		PostContents.m10   =  PostContent.m10;
		PostContents.m1000 =  PostContent.m1000;
		PostContents.m1011 =  PostContent.m1011;
		PostContents.m1012 =  PostContent.m1012;
	if($("#tplName").val()=='' || $("#tplName").val()== null  || $("#tplName").val()==false){
		alert("请输入模板名称");
		$("#tplName").focus();
		return false;
	}
	
	if(configID=='1001'){
		PostContents.m1001 =  PostContent.m1001;
	}else if(configID=='1002'){
		PostContents.m1002 =  PostContent.m1002;
	}else if(configID=='1003'){
		PostContents.m1003 =  PostContent.m1003;
	}else if(configID=='1004'){
		PostContents.m1004 =  PostContent.m1004;
	}else if(configID=='1005'){
		PostContents.m1005 =  PostContent.m1005;
	}else if(configID=='1006'){
		PostContents.m1006 =  PostContent.m1006;
	}else if(configID=='1007'){
		PostContents.m1007 =  PostContent.m1007;
	}else if(configID=='1008'){
		PostContents.m1008 =  PostContent.m1008;
	}else if(configID=='1009'){
		PostContents.m1009 =  PostContent.m1009;
	}else if(configID=='1010'){
		PostContents.m1010 =  PostContent.m1010;
	}
	    PostContents.PostContentnum = JSON.stringify(PostContentnum);
	console.log(PostContents);
	  $.ajax({
			type: "POST",
	        url: "save_store_decorate_tpl",
	        data: PostContents,
	        dataType: "json",
	        success: function(data){
	        	if(data.state){
	            	 if(data.state == '403'){
	            		    alert(data.msg);
	                        window.top.location.href = "<{base_url('admin.php/Index/')}>login_out";
	                    }else if(data.state == '401'){
	                    	alert(data.msg);
	                        return false;
	                    }else{
	                    	 PostContent.m1 = data.sdt_id;
		   	            	 PostContent.m10 = data.sdt_name;
		   	            	 $("#m"+configID).find("div").remove();
		   	            	 $("#m"+configID).append(data.data);
		   	            	 $("#m"+configID).removeClass("current");
		   	            	 
		   	            	 
		   	            	 $("#me"+configID).removeClass("active");
		   	            	 $("#me"+configID).parent().removeClass("openblock");
		   	            	 $(".ui_overlay")[0].style.display="none";//关闭左侧遮罩层
			   	          	 $(".ui_mask_wrapper").each(function(k,v){
			   	        		  v.style.display="block";
			   	        	 });
			   	             alert("保存成功");
			   	             window.location.reload();
	                    }
	            	
	             }else{
	            	 alert(data.msg)
	             }	
	        }
		});
});

