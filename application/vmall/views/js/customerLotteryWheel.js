//老虎机逻辑
var Lottery = function(ops){
	this.conId = ops.conId,
	this.btnId = ops.btnId,
	this.index = 0,	//当前下标
	this.count = null,
	this.timer = null,
	this.speed = 10,	//初始转动速度
	this.times = 0,	//转动次数
	this.cycle = 24,	//至少转多少次
	this.prize = null;	//中奖位置
	this.ops = ops;
	this.init();
}
Lottery.prototype = {
	init:function(){
		var $loty = $("#" + this.conId);
		if ($loty.find(".loty_box").length>0) {
			this.count = $loty.find(".loty_box").length;
			$loty.find(".loty_box_"+this.index).addClass("active");
		};
		this.btnInit();
		return this;
	},
	btnInit: function(){
		var _this = this;
		$("#" + this.btnId).on("click", function(){
			var $this = $(this);
			_this.ops.before && _this.ops.before(function(res, position){
				// $this.off("click");
				$this.addClass("ing").off("click");
				_this.prize = position;//中奖位置，传入整数（最好7以下）
				_this.rotate(res);
			});
		}).removeClass("ing");
	},
	roll:function(){	//向前转一个格
		$(loty).find(".loty_box_"+this.index).removeClass("active");

		if (++ this.index > this.count - 1)
			this.index = 0;

		$(loty).find(".loty_box_"+this.index).addClass("active");

		return false;
	},
	rotate:function(para){	//循环转起
		var _this = this;
		// $(".loty_box_btn").addClass("ing");
		_this.times ++;
		_this.roll();
		if (_this.times > _this.cycle && _this.prize%_this.count == _this.index) {
			clearTimeout(_this.timer);
			_this.prize = null;
			_this.times = 0;
			_this.speed = 100;
			flag = false;

			_this.resultsPrize(para);
		}else{
			if (_this.times <= _this.cycle - 10)
				_this.speed -= 10;	
			else{
				if (_this.times > _this.cycle + 10)
					_this.speed += 110;
				else
					_this.speed += 20;
			}
			if (_this.speed < 40)
				_this.speed = 40;
			_this.timer = setTimeout(function(){
				_this.rotate(para);
			},_this.speed);
		}
		return false;
	},
	//结束后返回结果并重新初始化游戏即按钮的点击事件
	resultsPrize:function(para){
		
		function showLog(){
			
			luckyDrawId = $('#luckyDrawId').val();
			$.ajax({
				url: "showRewardLog?op=load",
				type: "post",
				data: {
					luckyDrawId: luckyDrawId,//getUrlParam("luckyDrawId")
					dai_user_id: $('#dai_user_id').val()||''
				},
				dataType:'json',
				success: function(res){
					
					if(res){
						var lotyRule = '';
						$.each(res,function(k,v){
							lotyRule +='<li>'+v+'</li>';
						})
						//alert(lotyRule)
						if(!!lotyRule){
							$("#lotyRule").html(lotyRule);
						}
						
					}
				}
			})
		}
		setTimeout(function(){
			showLog();
		}, 1000);
		this.ops.after && this.ops.after(para);

		var _this = this;
		setTimeout(function(){
			_this.btnInit();
		}, 1000);
	}
}
//老虎机逻辑结束

var luckyDrawId = $('#luckyDrawId').val();//getUrlParam("luckyDrawId");
var encPass = hex_md5("${" + luckyDrawId + "}[LUCKYDRAW]");
var Loty = {
	indexArr: [0, 1, 2, 3, 4, 5, 6, 7],
	dataArr: [],
	supplierId: null,
	consumePoints :0,
	remainTimes: 0,//剩余次数
	remainPoints: 0,//剩余积分
	needMembershipCard:false,//会员卡
	defImg: {
		coupon: JSTEMPLE+'images/prize_cou.png',//优惠券
		point: JSTEMPLE+'images/prize_interation.png',//积分的图片(小钱)
		product: JSTEMPLE+'images/loty_icon.png',//礼物图片
		cash: JSTEMPLE+'images/prize_money.png',//现金图片
		resCoupon: JSTEMPLE+'images/prize_cou.png'//券的图片
	},
	arr: [//页面里面要使用的图片
		'https://qncdn.qiakr.com/mall/loty/loty_bg.png',
		'https://qncdn.qiakr.com/mall/loty/loty_hd.png',
		'https://qncdn.qiakr.com/mall/loty/loty_con_top.png',
		'https://qncdn.qiakr.com/mall/loty/loty_bg_1.png',
		'https://qncdn.qiakr.com/mall/loty/loty_bg_2.png',
		'https://qncdn.qiakr.com/mall/loty/loty_bg_3.png',
		'https://qncdn.qiakr.com/mall/loty/loty_p_0.png',
		'https://qncdn.qiakr.com/mall/loty/loty_icon.png',
		'https://qncdn.qiakr.com/mall/loty/loty_btn.png',
		'https://qncdn.qiakr.com/mall/loty/loty_btn_ing.png',
		'https://qncdn.qiakr.com/mall/loty/loty_line.png',
      JSTEMPLE+'images/prize_cou.png',
		'https://qncdn.qiakr.com/mall/loty/loty_p_top.png',
		'https://qncdn.qiakr.com/mall/loty/loty_r_l.png',
		'https://qncdn.qiakr.com/mall/loty/loty_r_r.png',
		'https://qncdn.qiakr.com/mall/loty/loty_w_l.png',
		'https://qncdn.qiakr.com/mall/loty/loty_w_r.png',
		'https://qncdn.qiakr.com/mall/loty/loty_is_top.png',
		'https://qncdn.qiakr.com/mall/loty/loty_cofe.png',
		JSTEMPLE+'images/loty_rule_tt.png'
	],
	init: function(){
		var _this = this;

		//this.is_wechat();
		 this.share();

		$("body").css("min-height", document.body.offsetHeight);
		
		this.preloadimages(Loty.arr);	

		this.loadData();

		$(function(){
			_this.renderLights();
		});

		if(!/micromessenger/i.test(navigator.userAgent) && !/qiakr_wv/i.test(navigator.userAgent)){
			
			//return;
      }
		
		this.render();

		this.eventInit();
	},
	is_wechat:function(){
		// var ua = navigator.userAgent.toLowerCase();  
	 //    if(ua.match(/MicroMessenger/i)=="micromessenger") {  
	 //        return true;  
	 //    } else {  
	 //        $(".wh_status").removeClass("hide").css("z-index", 9);
	 //        $(".wh_wrap p").text("请在微信端打开");
	 //        $(".wh_wrap .wh_txt").html("");
	 //    }  
	},
	 share:function(){
	 
	 	   /* $.post("getWechatJsApiTicket",{suid:getUrlParam("supplierId"),url:location.href.split('#')[0]},function(data){
	 	       
	 	    	var re = data.result.config;
	 	        new Share({
	 	            wx: wx,
	 	            appId: re.appId, // 必填，公众号的唯一标识
	 	            timestamp: re.timestamp, // 必填，生成签名的时间戳
	 	            nonceStr: re.noncestr, // 必填，生成签名的随机串
	 	            signature: re.signature,// 必填，签名，见附录1
  
	 	            title: document.title,   //分享标题
	 	            description:  '幸运大转盘,大奖等你来～', //分享描述
	 	            imgurl:'https://qncdn.qiakr.com/5.5/zhuan.png',  //分享图标
		            shareurl: location.href.split('#')[0]  //分享链接
	 	        });
	 	    },'json');*/
	 	
	 },
	loadData: function(){ //加载中奖奖品信息
		$.ajax({
			url: "getRewardListOfLuckyDraw",
			type: "post",
			data: {
				luckyDrawId: luckyDrawId,//getUrlParam("luckyDrawId")
				dai_user_id: $('#dai_user_id').val()||''
			},
			dataType:'json',
			success: function(res){
				if (res.status != 0)
					return mobileAlert(res.errmsg || "系统繁忙，请稍后再试",2000);

				$(".qrimg").attr("src", res.qrcodeUrl || "");
				Loty.dataArr = res.rewardVoList;//中奖的信息列表
				$.each(Loty.dataArr, function(i, item){
					var img = Loty.getImg(item.rewardType, item.productPicUrl || Loty.defImg.product), index;
					if (i < 4){
						var $item = $(".loty_box_" + i*2);
						index = i*2;
					} else {
						var $item = $(".loty_box_" + ((i-4)*2 + 1));
						index = ((i-4)*2 + 1);
					}
					Loty.dataArr[i].position = index;
					delete Loty.indexArr[index];

					$item.find("img").attr("src", img);
					$item.find("p").text(item.rewardName);
				});

				var arr = [];
				$.each(Loty.indexArr, function(i, item){
					if (item)
						arr.push(item);
				});
				Loty.indexArr = arr;
			}
		});

		$.ajax({
			url: "getLuckyDrawInfo",
			type: "post",
			data: {
				luckyDrawId: luckyDrawId,//getUrlParam("luckyDrawId")
				dai_user_id: $('#dai_user_id').val()||''
			},
			dataType:'json',
			success: function(res){
				if (res.status != 0)
					return mobileAlert(res.errmsg || "系统繁忙，请稍后再试",2000);
            
				document.title = res.luckyDraw.luckyDrawTitle;
				Loty.needMembershipCard =res.luckyDraw.needMembershipCard;
				Loty.consumePoints = res.luckyDraw.consumePoints;
				$(".loty_consPoints .perNeed").text(res.luckyDraw.consumePoints);
				if(res.luckyDraw.consumePoints==0){
					$(".loty_consPoints .needTip").remove();
				}
				if(res.surplusLuckyDrawCount<0){
					$(".loty_consPoints .lastTip").remove();
				}else{
					$(".loty_consPoints .last").text(res.surplusLuckyDrawCount);
				}
				if (res.customerWechatSubscribe)
					$("body").addClass("follow");

				$(".qrimg").attr('src',res.qrcodeUrl);
				if (res.customerWechatSubscribe) {
					$("#guanzhu").css('display','none!important');
				}
				var lotyRule = '';
				if(res.luckyDraw.actionLog){
					$.each(res.luckyDraw.actionLog,function(k,v){
						lotyRule +='<li>'+v+'</li>';
					})
				}
				//var lotyRule = res.luckyDraw.actionLog.replace(/\n/g, "<li></li>");
				$("#lotyRule").html(lotyRule);
				Loty.supplierId = res.luckyDraw.supplierId;

				switch(parseInt(res.luckyDrawStatus)){ //1:进行中 2:未开始 3:已结束
					case 1:
						break;
					case 2:
						$(".wh_status").removeClass("hide")
							.find("p").text("活动未开始")
							.next("div").find("span").text(getLocalTime(res.luckyDraw.startTime));	
						break;
					case 3:
						$(".wh_status").removeClass("hide")
							.find("p").text("活动已结束")
							.next("div").remove();
						break;
					default:
						break;				
				}
				Loty.remainPoints = res.surplusLuckyDrawCount<0 ? 99999 : res.surplusLuckyDrawCount;
				
			}
		});
	},
	getImg: function(type, pic, isRes){
		var img;
		switch(parseInt(type)){
			case 1:
				img = isRes? Loty.defImg.resCoupon : Loty.defImg.coupon;//折扣券
				break;
			case 2:
				img = isRes? Loty.defImg.resCoupon : Loty.defImg.coupon;//
				break;	
			case 3:
				img = Loty.defImg.point;//
				break;
			case 4:
				img = pic.split(",")[0] || "";//
			case 5:
				img = Loty.defImg.cash;//1折扣卷，2满送卷，3积分，4实物，5现金红包
			break;		
		}
		return img;
	},
	getLotteryData:function(callback){
		//console.log(Loty.remainPoints)
		//console.log(Loty.consumePoints)
		/*if(!$('#dai_user_id').val()){
			if(parseFloat(Loty.remainPoints)<parseFloat(Loty.consumePoints)){
	        	return mobileAlert("积分不足!",2000);
			}
		}*/
		
		//console.log($('#luckyDrawId').val())
		$.ajax({
			url: "customerLuckyDraw",
			type: "post",
			data: {
				luckyDrawId: luckyDrawId,//getUrlParam("luckyDrawId")
				encPass: encPass,
				dai_user_id: $('#dai_user_id').val()||''
			},
			dataType:'json',
			success: function(res){
				if (res.status != 0){
					return mobileAlert(res.errmsg || "系统繁忙，请稍后再试",2000);
				}
				if(res.luckyStatus==2){
					return mobileAlert(res.errmsg || "活动已停止！",2000);
				}
				//Loty.remainTimes --;//剩余次数
				var data = res.result;
				Loty.remainPoints = parseFloat(data.integral);
				$(".loty_consPoints .last").text(Loty.remainPoints);
				
				if (data.lucky){
					/*if(data.luckyRewardType == 3&&data.chouType==1){
						Loty.remainPoints +=parseInt(data.rewardPrice);
					}*/
					//$(".loty_consPoints .last").text(Loty.remainPoints);
					
					var img = Loty.getImg(data.luckyRewardType, data.productPicUrl || Loty.defImg.product, true);
					$(".cover_con img").attr("src", img);
					//$(".cover_con img").attr("src", img)[data.luckyRewardType==3?"addClass":"removeClass"]("bor5");
					$(".cover_con p").text(data.rewardName);
					//$(".cover_con").show();$(".cover_con_no").hide();
					//console.log(Loty.remainTimes);console.log(data);
					if (Loty.remainPoints < Loty.consumePoints){
						if (data.luckyRewardType == 4) {//实物商品
							$(".cover_con .jumpList")
								.text("填写收货地址")
								.attr("data-url", "customerLotteryAddress?rewardName=" + data.rewardName + "&customerOrderId=" + 
								data.customerOrderId + "&exchangeProductId=" + data.exchangeProductId + "&luckyRecordId=" + data.luckyRecordId + 
								"&deliveryLimit=" + data.deliveryLimit + "&supplierId=" + data.supplierId + "&pic=" + (data.productPicUrl&&data.productPicUrl.split(",")[0]) + 
								"&luckyDrawRewardId=" + data.luckyDrawRewardId);
							// $(".cover_con .jumpListTxt").text("查看我的奖品").attr("data-url", "").removeClass("hide");
							$(".cover_con .jumpListTxt").addClass("hide");
						} else {
							$('.c_con_btn_one').addClass('c_con_disbtn');
							//$('.c_con_btn_one').removeClass('c_con_btn_one');
							$('.c_con_btn_one').text('积分不足');
							$(".cover_con .jumpList").text("卡卷中心").attr("data-url", "customerLotteryWheelList?luckyDrawId=" + getUrlParam("luckyDrawId") + "&supplierId=" + Loty.supplierId);
							$(".cover_con .jumpListTxt").addClass("hide");
						}
					} else {
						if (data.luckyRewardType == 4) { //实物商品
							// $(".cover_con .jumpList").text("继续抽奖").attr("data-url", "reload");
							// $(".cover_con .jumpListTxt")
							// 	.text("填写收货地址")
							// 	.attr("data-url", "customerLotteryAddress.htm?rewardName=" + data.rewardName + "&customerOrderId=" + data.customerOrderId + "&exchangeProductId=" + data.exchangeProductId + "&luckyRecordId=" + data.luckyRecordId + "&deliveryLimit=" + data.deliveryLimit + "&supplierId=" + data.supplierId + "&pic=" + (data.productPicUrl&&data.productPicUrl.split(",")[0]) + "&luckyDrawRewardId=" + data.luckyDrawRewardId)
							// 	.removeClass("hide");
							$(".cover_con .jumpList")
								.text("填写收货地址")
								.attr("data-url", "customerLotteryAddress?rewardName=" + data.rewardName + "&customerOrderId=" + data.customerOrderId + 
										"&exchangeProductId=" + data.exchangeProductId + "&luckyRecordId=" + data.luckyRecordId + "&deliveryLimit=" + data.deliveryLimit + 
										"&supplierId=" + data.supplierId + "&pic=" + (data.productPicUrl&&data.productPicUrl.split(",")[0]) + "&luckyDrawRewardId=" + 
										data.luckyDrawRewardId);
								$(".cover_con .jumpListTxt").addClass("hide");
						} else {
							$(".cover_con .jumpList").attr("data-url", "reload");
							//$(".cover_con .jumpList").text("继续抽奖").attr("data-url", "reload");
							$(".cover_con .jumpListTxt").text("卡卷中心").attr("data-url", "").removeClass("hide");
						}
					}
					var position, id = data.luckyDrawRewardId; //中奖位置
					//console.log(id)
					$.each(Loty.dataArr, function(i, item){
						if (id == item.luckyDrawRewardId){
							position = item.position;
						}
					});
				} else {
					//$(".cover_con img").attr("src", JSTEMPLE+'images/no_prize.png');
					//$(".cover_con_no").show();$(".cover_con").hide();
					/*if (Loty.remainPoints <= Loty.consumePoints){ 
						$(".cover_con_no .c_con_btn").addClass("hide");
						$(".cover_con_no .c_con_disbtn").removeClass("hide");
					} else {
						$(".cover_con_no .c_con_disbtn").addClass("hide");
						$(".cover_con_no .c_con_btn").removeClass("hide");
					}*/
					var position = Loty.indexArr[Math.floor(Math.random()*Loty.indexArr.length)];
				}
				callback && callback(res.result, position || 0);
			}
		});
	},
	render: function(){
		var _this = this;
				
		var Lt = new Lottery({
			conId: "loty",
			btnId: "btn",
			before: function(callback){
				// var luckyDrawId = getUrlParam("luckyDrawId");
				// var encPass = hex_md5("${" + luckyDrawId + "}[LUCKYDRAW]");
				if(!_this.needMembershipCard){
					if(sessionStorage.isLogin == "false"){
		                showMPLoginBox(function(){
							_this.getLotteryData(callback);
	                	}, _this.supplierId);
		                return false;
		            } else {
		            	_this.getLotteryData(callback);
		            }
				}else{
					if(sessionStorage.isLogin == "false"){
		                showMPLoginBox(function(){

	                	}, _this.supplierId);
		                return false;
		            }
					require(["../js/mall/regVip.js"],function(Vip){
			            Vip.regVip({
			                type:1,
			                suid:_this.supplierId,
			                successFn:function(){
			                    _this.getLotteryData(callback);
			                }
			            });
			        });
				}
				
			},
			after: function(res){
				$("body").addClass("ovh");
				 setTimeout(function(){
					if(res.lucky==1){
						//$(".loty_cover").show().find(".c_is_top").addClass("bottomShow");
						$(".loty_cover").show().removeClass("no");
					} else 
						//$(".loty_cover").addClass("no").show().find(".c_is_top").addClass("bottomShow");
					    $(".loty_cover").show().addClass("no");
				}, 500); 
			}
		});
	},
	renderLights: function(){ //在闪的灯
		var clazz = '', pd = 8, stance = 6;
		for (var i = 1; i < 25; i ++){
			clazz = i%2 == 0 ? "even" : "odd",
			XClA = "", YCAL = "", X = 0, Y = 0,
			interX = ($(".loty_container").width() - 20)/7,
			interY = $(".loty_container").height()*1.125/6;

			if (i <= 8){
				XClA = "left", YCAL = "top";
				X = pd + (i-1) * (interX - 1.5) - 0 + "px";
				Y = stance + 'px';
			} else if (i >= 9 && i <= 12){
				XClA = "right", YCAL = "top";
				Y = (i - 8) * interY - 0 + "px";
				X = stance + 'px';
			} else if (i >= 13 && i <= 20){
				XClA = "right", YCAL = "bottom";
				X = pd + (i-13) * (interX - 1.5) - 0 + "px";
				Y = stance + 'px';
			} else if (i >= 21 && i <= 24){
				XClA = "left", YCAL = "bottom";
				Y = (i - 20) * interY - 0 + "px";
				X = stance + 'px';
			}

			$(".loty_container").append('<span class="' + clazz +'" style="' + XClA + ':' + X + ';' + YCAL + ': ' + Y + '"></span>');
		}

		setInterval(function(){
			$(".even,.odd").toggleClass("light");
		}, 1000);
	},
	resetLoty: function(){
		$(".loty_cover").removeClass("no").hide().find(".c_is_top").removeClass("bottomShow");
	},
	eventInit: function(){
		$('.header').on('click',function(){
			$.msg.alert({
				title:'　',
				content:$('#qrCodeWrap').html(),
				closeByMask:true,
				hasCloseBtn: true,
				clsIn:'fadeInDown',
				clsOut:'fadeOutUp'
			});
		})
		// $(".cover_con .c_con_btn").on("click", function(){
		// 	window.location.href = 'exchangeRecord.htm';
		// });
		$(".cover_con_no .c_con_btn").on("click", function(){
			// window.location.replace(location.href);
			Loty.resetLoty();
		});
		$(".jumpList").on("click", function(){
			var url = $(this).attr("data-url");
			if (url == "reload"){
				// window.location.replace(location.href);
				Loty.resetLoty();
			} else {
				window.location.href = url || "customerLotteryWheelList?luckyDrawId=" + getUrlParam("luckyDrawId") + "&supplierId=" + Loty.supplierId;
			}	
		});
		$(".jumpListTxt").on("click", function(){
			var url = $(this).attr("data-url");

			window.location.href = url || "customerLotteryWheelList?luckyDrawId=" + getUrlParam("luckyDrawId") + "&supplierId=" + Loty.supplierId;
		});
	},
	preloadimages: function(arr) {
      qkUtil.imagesLoaded({
			list:arr,
			loading:function(index){
				$(".loading-tiao div").width(((index - 1)/arr.length) * 100 + "%");
			},
			loaded:function(index){
				$("#loading").addClass("ctn-hide-ani");
				setTimeout(function () {
                  $(".opcEvt").css("opacity", 1);
                  $("#loading").remove();
              }, 500);
			}
		});
  }
}

Loty.init();
