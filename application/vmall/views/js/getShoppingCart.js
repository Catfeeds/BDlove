
$("input.yes").prop("checked",false);
sessionStorage.removeItem("usedCoupon");
/*$("#returnStore").attr("href","../mall/getStoreHomePage.htm?storeId="+sessionStorage.storeId)*/
var priceTottle = 0,selectedStore;
getPayment();
// 勾选商品

//goodsstock为商品库存，ordernum为所选商品数量
function lookStock(goodsstock,ordernum){
	if(parseInt(goodsstock)>=parseInt(ordernum)){
		return true;
	}else{
		return false;
	}
}

$(".storeMsg .yes").click(function(){
	var obj = $(this);
	isAll = true;//全自提
	isAllCC = true;
	  obj.parents('.cart-list').siblings('.cart-list').find('.list').find('.yes').each(function(){
			var type = $(this).attr('data-type');
			if(type==1&&$(this).prop('checked')){
				isAll = false;
			}
			if(type==2&&$(this).prop('checked')){
				isAllCC = false;
			}
		})
	//console.log(isAll);
  
  var thisStoreSel = $(this).parent().siblings('.list').find('input[name="checkProduct"]');
	  thisStoreSel.each(function(){
		  $(this).prop("checked",true);
	  })
  var amountOK = true;recieveOK = true;rType = true;
  thisStoreSel.each(function(){
	  if(obj.prop("checked")){
//		  判断是否库存不足
		  var amount = $(this).attr('data-amount');
		  var this_num = $(this).attr('data-num');
		  var recieveType = $(this).attr('data-type');
		  if(lookStock(amount,this_num)){
			   $(this).prop("checked",true);
			   if(recieveType!=2){
				   rType = false;
			   } 
			 }else{
				 amountOK = false;
				$(this).prop("checked",false);
			 }
	  }else{
	    thisStoreSel.prop("checked",false);
	  }
  })

  //判断是否自提还是快递
  isAllC = true;
	thisStoreSel.each(function(){
		if($(this).prop("checked")){
			if($(this).attr('data-type')==2){
				isAllC = false;
			}
			if(rType&&isAll){
				
			}else{
				recieveOK = false;
			}
			
			
		}
	})
 if(!amountOK){
	 obj.prop("checked",false);
	 
	 $("#notstock").show(function(){});
	 setTimeout(function(){$("#notstock").hide()},1000);
	 if(!recieveOK){
		 if(!isAllC||rType||!isAllCC){
			 if(!isAllC){
				 obj.prop("checked",false);
			 }
			 $("#recieveType").show(function(){});
			 setTimeout(function(){$("#recieveType").hide()},1000); 
		 }
		 remove_check();

	 }
	 
 }else{

	 if(!recieveOK){
		 if(!isAllC||rType||!isAllCC){
			 if(!isAllC){
				 obj.prop("checked",false);
			 }
			 $("#recieveType").show(function(){});
			 setTimeout(function(){$("#recieveType").hide()},1000); 
		 }
		 
		 remove_check();
		
	 }
	
 }
  getPayment();
});
function remove_check(){
	$('.list').find('.yes').each(function(){
		if($(this).attr('data-type')==2){
			$(this).prop("checked",false);
		}
	})
}
/*$('.list .yes, .storeMsg .yes').click(function(){
  if($(this).prop("checked")){
    var otherStore = $(this).closest(".cart-list").siblings().find('input[name="checkProduct"]:checked');
    if(otherStore.length>0){
        mobileAlert("暂不支持跨店铺结算");
        otherStore.prop("checked",false);
    }
    if($(this).closest(".cart-list").find("input.self:checked").length > 0 && $(this).closest(".cart-list").find("input.post:checked").length > 0 && !$(this).closest(".cart-list").data("supplier")){
      $(this).closest(".cart-list").find("input.self").prop("checked",false);
      mobileAlert("到店自提的商品请单独下单");
    }
  }
  getPayment();
});*/
$('.list .yes').click(function(){
    if($(this).is(':checked')==false){
    	getPayment();
    	return '';
    }
	var type = $(this).attr('data-type');isType = true;
	if(type==2){
		$('dl.wbox').find('.yes').each(function(){
			if($(this).is(':checked')&&$(this).attr('data-type')!=2){
					isType = false;console.log(11);
					$('.wbox').find('.yes').each(function(){
						if($(this).is(':checked')&&$(this).attr('data-type')==2){
							$(this).prop("checked",false);
						}
					})
			}
		})
	}else{
		$('dl.wbox').find('.yes').each(function(){
			if($(this).is(':checked')&&$(this).attr('data-type')==2){
					isType = false;$(this).prop("checked",false);
			}
		})
		
		
	}
	//console.log(isType)
	if(!isType){
		 $("#recieveType").show(function(){});
		 setTimeout(function(){$("#recieveType").hide()},1000);	
	}
	var amount = $(this).attr('data-amount');
	var this_num = $(this).attr('data-num');
	if(lookStock(amount,this_num)){
	  if($(this).closest(".list").find('input[name="checkProduct"]').not("input:checked").length==0){
		$(this).closest(".cart-list").find(".storeMsg .yes").prop("checked",true);
	  }else{
		$(this).closest(".cart-list").find(".storeMsg .yes").prop("checked",false);
	  }
	}else{
		$("#notstock").show(function(){});
		setTimeout(function(){$("#notstock").hide()},1500);
		$(this).prop("checked",false);	  
	}
	getPayment();
});

// 自动勾选店铺下的商品
if(sessionStorage.storeId){
  $(".cart-list").each(function(i,e){
    if($(e).data("store")==sessionStorage.storeId){
      $(e).find(".storeMsg .yes").trigger("click");
    }
  })
}

// 编辑购物车
$(".storeMsg .edit").on("click",function(e){
  e.preventDefault();
  if(!$(this).hasClass("doing")){
    $(this).text("完成").addClass("doing").closest(".cart-list");
    $(this).parent().next().find(".fc-grey p").addClass("choice-style");
  }else{
    $(this).text("编辑").removeClass("doing").closest(".cart-list");
    $(this).parent().next().find(".fc-grey p").removeClass("choice-style");
    $(this).closest(".cart-list").find(".shopCount").each(function(i,e){
    	$(e).html($(this).closest("dl").find("input.count").val());
    })
  }
});

// 编辑购物车数量
$(".d-plus .count").on("blur",function(){
    var count = ~~$(this).val(), maxCount = ~~$(this).data("max"),limitBuyCount=~~$(this).data("limit");
    if(limitBuyCount){
        // 限购获取库存和限购数量的最小值
        if(count > Math.min(limitBuyCount,maxCount)){
            $(this).val(Math.min(limitBuyCount,maxCount));
            return false;
        }
    }else{
        // 未限购
        if(count > maxCount){
            $(this).val(maxCount);
            return false;
        }
    }
    if(count <= 1){
        $(this).val("1");
    }else{
        $(this).val(count);
    }
    getPayment();
});
$(".d-plus .jia, .d-plus .jian").on("click",function(){
    var countInput = $(this).parent().find(".count"),
        priceSingle=$(this).closest(".list").find(".price").text(),
        max = ~~countInput.data("max"),
        limitBuyCount = ~~countInput.data("limit");
    if($(this).hasClass("jia")){
    	$(".d-plus button.jian").removeClass("min");
        if(limitBuyCount){
            if(~~countInput.val() >= Math.min(limitBuyCount,max)){
                return false;
            }
        }else{
            if(~~countInput.val() >= max){
                return false;
            }
        }
        priceTottle = priceTottle + parseFloat(priceSingle);
        countInput.val(~~countInput.val()+1);
    }else{
      if(~~countInput.val() <= 1) {
      	$(this).addClass("min");
      	return false;
      }
      priceTottle = priceTottle - parseFloat(priceSingle);
      countInput.val(~~countInput.val()-1);
    }
    getPayment();
});

// 删除购物车
$(".cart-list .remove").on("click",function(e){
  var _t = $(this),cartid = _t.data("id");
  $.getJSON("deleteCart?CartId="+cartid,function(data){
    if(data.state){
      var store = _t.closest(".cart-list");
      _t.parent().remove();
      getPayment();
      if(store.find(".list .wbox").length==0){
        store.remove();
      }
      if($('section.cart-list').length==0){
    	  str = '<div class="qk-pro-list"><ul class="small-block-grid-2" id="favListItem"><section class="noResult tc"><span>购物车为空哦</span><div><a href="'+goods_url+'" class="btn btn-red" style="display:inline-block;background:#e04241;">立即去添加</a></div></section></ul></div>';
    	  $('body').prepend(str);
      }
      $('#userCartTotal').html(data.data);
    }
  })
});


// 结算购物车价格
function getPayment(){
	var num=0;
  priceTottle = 0;
  Zepto.each($('.list .yes:checked'),function(i,e){
    var dl = $(e).closest("dl");
    t_price = parseFloat((Math.floor(parseFloat(dl.find(".price").text())*100))/100);
    t_num = parseInt(dl.find(".count").val());
    t_priceTottle = parseFloat(t_price*t_num);
    priceTottle += t_priceTottle||0 ;
    num++;
  });
  $("#gotoPays span").html(num);
  $("#priceTottle").html(priceTottle.toFixed(2));
  if(priceTottle == 0){
    $("#gotoPays").attr("disabled","disabled");
  }else{
    $("#gotoPays").removeAttr("disabled");
  }
  $('.list .yes').each(function(){
	  if($(this).is(':checked')==false){
		  $(this).parents('.list').prev().find('.yes').prop("checked",false);	  
	  }
  })
}
$(".d-plus").on("click",function(e){
  e.preventDefault();
});


$("#gotoPays").on("click",function(){
  if(!$(this).attr("disabled")){
	  var stockArray=[];
	 $('input.post_goods').each(function(){
		 if($(this).is(':checked')){
			 tit = $(this).parents('section.cart-list');
			 tid = $(this).parents('dl.wbox').find('dd.stockInfo');
			 tip = $(this).parents('dl.wbox').find('dd.action');
			 price_total = parseFloat(tid.find('span.price').text())*parseInt(tid.find('input.count').val());
			 price_total = price_total.toFixed(2);
			 //alert(tid.find('input.count').val());
			 var goodsMsg = {
					    "goods_id":$(this).attr('stockid'),
				        "goods_a_id":tid.attr('data-skuid'),
				        "goods_ea_id":tid.attr('data-goodseaid'),
				        "goods_spec" :tid.find('span.size').text(), 
				        "ssa_id" :tid.attr('data-id'), 
				        "stocks_price" :tid.find('span.price').text(), 
				        "bl_id" :tid.attr('data-bl'), 
				        "goods_num" :tid.find('input.count').val(), 
				        "cart_id" :tid.attr('data-cartid'), 
				        "goods_img" :tid.attr('data-img'), 
				        "goods_color" :tid.attr('data-color'), 
				        "color_remark" :tid.attr('data-size-remark'), 
				        "size_remark" :tid.attr('data-color-remark'), 
				        "goods_name" :tid.attr('data-name'), 
				        "goods_price" :price_total, 
				        "receive_type" :tid.attr('data-type'), 
			 }
			 var stockMsg = {
				        "storeName":tit.find('a.store').text(),
				        "storeId":tit.find('a.store').attr('data-id'),
				        "goods" :goodsMsg,
				        "cart_id" :tid.attr('data-cartid'),
				      }
			 stockArray.push(stockMsg);
		 }
		 
	 })
	 var stockInfo = JSON.stringify(stockArray);
	 sessionStorage.stockInfo = JSON.stringify(stockArray);
	 //console.log(confirm_url);return false;
	 window.location.href = confirm_url+'&info='+stockInfo;
	 //console.log(stockInfo)
    /*var stockArray=[];
      tit=$('.list .yes:checked').eq(0).closest(".cart-list").find("a.store");
      firstChecked = $('.list .yes:checked').eq(0);
      delivery = firstChecked.closest(".cart-list").data("supplier") ? 1 : (firstChecked.hasClass("self") ? 2 : 1);
    //console.log(delivery);return false;
    var stockMsg = {
        "storeName":tit.text(),
        "storeId":tit.data("id"),
        "salesId" : firstChecked.data("salesid"),
        "stockList":[],
        "delivery":delivery,
        "sourceType":$('.list .yes:checked').eq(0).closest(".cart-list").data("supplier") ? 1 : 0,
      }
  
    Zepto.each($('.list .yes:checked'),function(i,e){
      var dd = $(e).closest("dl").find(".stockInfo");
      if(parseInt(dd.find(".count").val())>0){
        stockMsg.stockList.push({
        	"img":dd.find(".size40").attr("src").split("?")[0],
            "name":dd.find(".name").text(),
            "id":dd.data("id"),
            "cartId":dd.data("cartid"),
            "size":dd.find(".size").text(),
            "color":dd.find(".color").text(),
            "skuId":dd.data("skuid"),
            "count":dd.find(".count").val(),
            "price":dd.siblings(".action").find(".price").text()
        });
      }
    });
    console.log(stockMsg);return false;
    stockArray.push(stockMsg)
    sessionStorage.stockInfo = JSON.stringify(stockArray);
    if(location.pathname.indexOf("qstore") > -1){
      location.href="../mall/confirmOrderInfo.htm?storeId="+tit.data("id")+"&salesId="+firstChecked.data("salesid");
    }else{
      location.href="confirmOrderInfo.htm?suid="+getUrlParam("suid")+"&storeId="+tit.data("id")+"&salesId="+firstChecked.data("salesid");
    }*/
  }
});
$(".toShoppingCart").hide();