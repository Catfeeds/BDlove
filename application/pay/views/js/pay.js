var LODOP; //声明为全局变量   
	    function install_print(){
	    	url_32 = "<{base_url('data/print/CLodop_Setup_for_Win32NT_2.090.zip')}>";
			url_64 = "<{base_url('data/print/CLodop_Setup_for_Win64NT_2.090.zip')}>";
			url_3264 = "<{base_url('data/print/CLodopPrint_Setup_for_Win32NT.zip')}>";
			layer.open({
	            type: 1,
	            title: '<b>打印控件下载</b>',
	            skin: 'layui-layer-rim', //加上边框
	            area: ['520px', 'auto'], //宽高
	            content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form3" method="POST" enctype=multipart/form-data>' +
	            '<div id="" style="width:100%;text-align:center;font-size:14px;color:#FF00FF;" class="">打印机控件尚未安装启动!点击下载并安装,安装后请刷新页面。</div>'+
	            '<div style="width: 100%;text-align:center;color:#0096ff"><ul><li>点击下载：</li>' +
	            '<li><a href="'+url_32+'">32位版</a></li><li><a href="'+url_64+'">64位版</a></li><li><a href="'+url_3264+'">综合版</a></li></ul></div>'+
	            '</form></div>',

	        })
	    }
	   
	    
	    function CreateFullBill(data) {
	    	LODOP=getLodop(); 
	    	var topLength = 20;
			LODOP.PRINT_INIT("打印收银小票");
			LODOP.SET_PRINT_PAGESIZE(3,480,10);
			LODOP.ADD_PRINT_TEXT(topLength,2,180,30,data.store_name);
			LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
			LODOP.SET_PRINT_STYLEA(0,"FontColor","#800000");
			LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
			LODOP.ADD_PRINT_TEXT(topLength*2,2,180,20,data.time);
			LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
			LODOP.SET_PRINT_STYLEA(0,"FontColor","#800000");
			LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
			LODOP.ADD_PRINT_TEXT(topLength*3,2,180,25,"收银员："+data.spg_name);
			LODOP.ADD_PRINT_TEXT(topLength*4,2,180,25,"单号："+data.order_sn);
			LODOP.ADD_PRINT_TEXT(topLength*5,2,180,25,"商品   数量  单价  金额");
			LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
			LODOP.ADD_PRINT_LINE(topLength*6, 2,topLength*6,180,4);
			LODOP.ADD_PRINT_LINE(topLength*6+2, 2,topLength*6+2,180,4);
			var i=1;j=0;key=6;
			$.each(data.goods_info,function(k,v){
				j = key+i;
				LODOP.ADD_PRINT_TEXT(topLength*j,2,180,25,v.stock_code+"|"+v.gc_name+"|"+v.goods_size+v.color);
				LODOP.ADD_PRINT_TEXT(topLength*(j+1),2,180,25,v.goods_num+"|"+v.goods_pay_price+"|"+v.goods_pay_price_total);
				LODOP.SET_PRINT_STYLEA(0,"Alignment",3);
				i = i+2;
			})  
			key = key+i;
			LODOP.ADD_PRINT_LINE(topLength*key+8, 2,topLength*key+8,180,4);
			LODOP.ADD_PRINT_LINE(topLength*key+10, 2,topLength*key+10,180,4);
			LODOP.ADD_PRINT_TEXT(topLength*(key+1),2,180,25,"应收合计："+data.order_money);
			LODOP.ADD_PRINT_TEXT(topLength*(key+2),2,180,25,"实收:"+data.money+'  找零:'+data.charge);
			LODOP.ADD_PRINT_TEXT(topLength*(key+3),2,180,25,"电话:"+data.tel);
			LODOP.ADD_PRINT_TEXT(topLength*(key+4),2,180,25,"地址:"+data.address);
			LODOP.ADD_PRINT_TEXT(topLength*(key+5),2,180,20,"****谢谢光临****");
			LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
			LODOP.ADD_PRINT_TEXT(topLength*(key+6),2,180,25,"注:"+data.note);
			LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
	};
     
		$('button.btn').click(function(){
			$(this).siblings().removeClass('btn-primary');
			$(this).addClass('btn-primary');
			if($(this).attr('data-para')==1){
				$('div.form-group-pay').hide();
				$('div.form-group-cash').show();
			}else{
				$('div.form-group-pay').show();
				$('div.form-group-cash').hide();
			}
		})
		var key_sort = true;
		   $("table").delegate("#barcode","change",function(){ 
			   
			   if(key_sort){
				   
				   $(this).parent('td').siblings('td').find('input').val('');
	               $(this).parents('tr').find('td.stock_size').html('');
	               $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
				   check_barcode(this);
				   $(this).val('');
			   }
			}); 
		   $("table").delegate("#barcode","keydown",function(event){ 
			   if (event.keyCode == 13) {
				   key_sort = false;
		        	$(this).parent('td').siblings('td').find('input').val('');
	                $(this).parents('tr').find('td.stock_size').html('');
	                $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
		        	check_barcode(this);
		        	$(this).val('');
		        }
			}); 
		   /*$("table").delegate("#stockcode","change",function(){ 
			   $(this).parent('td').siblings('td').find('input').val('');
               $(this).parents('tr').find('td.stock_size').html('');
               $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
               check_goods(this);
			}); 
		   $("table").delegate("#stockcode","keydown",function(event){ 
			   if (event.keyCode == 13) {
		        	$(this).parent('td').siblings('td').find('input').val('');
	                $(this).parents('tr').find('td.stock_size').html('');
	                $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
	                check_goods(this);
	                $("table").delegate(".stock_code input","change",function(){ 
						return false;
					})
		        }
			}); */
		   /*会员查询*/
		   /*$('#searchUser').click(function(){
			   var searchVal = $('#membernum').val();console.log(searchVal);
			   if(searchVal==''){
				   swal({title:'',text:'请输入查询条件', type:"error",timer:2000});return false;
			   }
		   })*/
		   /*输入货号尺码确定*/
		   $('.stockSubmit').click(function(){
		    	 var stock_code = $('#stockcode').val();
		    	 var stock_size = $('#size').val();
		    	 if(stock_code==''||stock_size==''){
		    		 swal({title:'',text:'货号和尺码不能为空', type:"error",timer:2000});return false;
		    	 }else{
		    		 check_goods(stock_code,stock_size);
		    	 }
		    	 return false;
		     })
		   function appendHtml(stocks){
			    stock_k = $('.pay-content').find('tr').size()+1;
	       		user_name = '';
	       		if($('#userName').val()==''){
	       			user_name = $('#userTel').val();
	       		}else{
	       			user_name = $('#userName').val();
	       		}
	       		isHave = false;haveObj = [];
	       		$('tbody.pay-content').find('tr').each(function(){
	       			code = $(this).find('td.code').text();
	       			size = $(this).find('td.size').text();
	       			if(stocks.size==size&&stocks.stocks_sn==code){
	       				isHave = true;haveObj=$(this);
	       			}
	       		})
	       		if(isHave){
	       			oldNum = haveObj.find('td.num').find('input').val();
	       			oldNum = (oldNum=='')?1:oldNum;
	       			newNum = oldNum*1+1;
	       			haveObj.find('td.num').find('input').val(newNum);
	       			truePrice = haveObj.find('td.true_price').find('input').val();
	       			discount = haveObj.find('td.discount').find('input').val();
	       			totalPrice = number_format(truePrice*newNum,2);
	       			haveObj.find('td.num').find('input').val(newNum);
	       			haveObj.find('td.price_total').text(totalPrice);
	       			haveObj.find('td.stockData').find('input.stock_num').val(newNum);
	       			haveObj.find('td.stockData').find('input.stock_price_total').val(totalPrice);
	       			
	       		}else{
	       			tr_str = '<tr>'+
					'<td class="sort stockData"><span class="sort">'+stock_k+'</span>'+
					'<input type="hidden" name="put_goods_name[barcode][]" class="stock_barcode" value="'+stocks.stocks_bar_code+'"/>'+
					'<input type="hidden" name="put_goods_name[stock_code][]" class="stock_code" value="'+stocks.stocks_sn+'"/>'+
					'<input type="hidden" name="put_goods_name[stock_size][]" class="stock_size" value="'+stocks.size+'"/>'+
					'<input type="hidden" name="put_goods_name[stock_num][]" class="stock_num" value="1"/>'+
					'<input type="hidden" name="put_goods_name[stock_price][]" class="stock_price" value="'+stocks.stocks_price+'"/>'+
					'<input type="hidden" name="put_goods_name[stock_true_price][]" class="stock_true_price" value="'+stocks.stocks_price+'"/>'+
					'<input type="hidden" name="put_goods_name[stock_discount][]" class="stock_discount" value=""/>'+
					'<input type="hidden" name="put_goods_name[stock_price_total][]" class="stock_price_total" value="'+stocks.stocks_price+'"/>'+
					'</td>'+
					'<td class="barcode">'+stocks.stocks_bar_code+'</td>'+
					'<td class="code">'+stocks.stocks_sn+'</td>'+
					'<td class="size">'+stocks.size+'</td>'+
					'<td class="price">'+stocks.stocks_price+'</td>'+
					'<td class="col-xs-1 num"><input type="text" onchange="change(this)" class="form-control input-sm" value="1" placeholder="1"></td>'+
					'<td class="col-xs-1 true_price"><input type="text" onchange="change(this)" class="form-control input-sm" value="'+stocks.stocks_price+'" placeholder=""></td>'+
					'<td class="col-xs-1 discount"><input type="text" onchange="change(this)" class="form-control input-sm" placeholder=""></td>'+
					'<td class="sort price_total">'+stocks.stocks_price+'</td>'+
					'<td class="sort userinfo">'+user_name+'</td>'+
					'<td class="sort note"></td>'+
					'<td class="sort"><a href="javascript:;" onclick="delStock(this)">删除</a></td>'+
				    '</tr>';
   			     $('.pay-content').append(tr_str);
   			     stockSort();
	       		}
	       		/*stocks = data.data;
	       		var size_str = '<select name="put_goods_name[stock_size][]" id="" onchange="select_size(this)" class="form-data form-control">'+
	       		'<option value="'+stocks.size+'" data-stock="'+data_null(stocks.stocks_sn)+'" data-barcode="'+data_null(stocks.stocks_bar_code)+'" data-price="'+stocks.stocks_price+'">'+stocks.size+'</option>';
	       		size_str +='</select>';
	       		$(obj).parents('tr').find('td.stock_size').html(size_str);
	       		$(obj).parents('tr').find('td.stock_code input').val(data_null(stocks.stocks_sn));
	   			$(obj).parents('tr').find('td.stock_price input').val(stocks.stocks_price);
	   			$(obj).parents('tr').find('td.stock_num input').val(1);
	   			$(obj).parents('tr').find('td.stock_price_total input').val(stocks.stocks_price);
	   			$(obj).parents('tr').find('td.stock_price_total').find('.stock_prices').text(stocks.stocks_price);*/
	   			
		    }
			function check_goods(stock_code,stock_size){
					$.ajax({
		        		type: "post",
		                url: "check_goods",
		                data: {stock_code:stock_code,size:stock_size},
		                dataType: "json",
		                success: function(data){
		                	if(data.state){
		                		stocks = data.data;
		                		appendHtml(stocks);
		                		total_money();
		                	}else{
		                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
		                	}
		                }
					})
				
				
			}
		    
			function check_barcode(obj){
				barcode = $(obj).val();
				if(barcode){
					$.ajax({
		        		type: "post",
		                url: "check_barcode",
		                data: {barcode:barcode},
		                dataType: "json",
		                success: function(data){
		                	if(data.state){
		                		stocks = data.data;
		                		appendHtml(stocks);
		            			total_money();
		            			//info_success(obj);
		                	}else{
		                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
		                	}
		                }
					})
				}
				
			}
		function delStock(obj){
			$(obj).parents('tr').remove();
			total_money();
			stockSort();
		}	
		function change(obj){
			var thisTr = $(obj).parents('tr');
			var num = thisTr.find('td.num').find('input').val();
			var price = thisTr.find('td.price').text();
			var true_price = thisTr.find('td.true_price').find('input').val();
			var discount = thisTr.find('td.discount').find('input').val();
            if($(obj).parent('td').hasClass('true_price')){
            	true_price = $(obj).val();
            	discount = parseFloat(true_price/price).toFixed(2);
            }
            if($(obj).parent('td').hasClass('discount')){
            	discount = $(obj).val();
            	discount = (discount=='')?1:discount;
            	true_price = parseFloat(price*discount).toFixed(2);
            }
			numV = (num=='')?1:num;
			discountV = (discount=='')?1:discount;
			truePrice = parseFloat(discountV*price).toFixed(2);
			truePrice = (true_price=='')?truePrice:true_price;
			totalPrice = parseFloat(truePrice*numV).toFixed(2);
			var thisTd = thisTr.find('td.stockData');
			thisTd.find('input.stock_num').val(numV);
			thisTd.find('input.stock_true_price').val(truePrice);
			thisTd.find('input.stock_discount').val(discountV);
			thisTd.find('input.stock_price_total').val(totalPrice);
			thisTr.find('td.price_total').text(totalPrice);
			thisTr.find('td.true_price input').val(truePrice);
			thisTr.find('td.discount input').val(discountV);
			total_money();
		}
		function stockSort(){
			$('tbody.pay-content').find('tr').each(function(k,v){
				thisTd = $(this).find('td.stockData');
				thisTd.find('span.sort').text(k+1); 
			})
		}
		function total_money(){
			amount = 0;number = 0;total=0;
			$('tbody.pay-content').find('tr').each(function(){
				thisTd = $(this).find('td.stockData');
				barcode = thisTd.find('input.stock_barcode').val();
				stock_code = thisTd.find('input.stock_code').val();
				num = thisTd.find('input.stock_num').val();
				price = thisTd.find('input.stock_price').val();
				true_price = thisTd.find('input.stock_true_price').val();
				discount = thisTd.find('input.stock_discount').val();
				if(!isNaN(num*true_price)&&(barcode||stock_code)){
					amount +=parseFloat(num*true_price);
					number +=parseInt(num);
					total +=parseFloat(num*price);
				}
				
			})
			amount = number_format(amount,2);
			total = number_format(total,2);
			$('span.totalPrice').find('span.number').text(amount);
			$('span.totalPrice').find('span.num').text(number);
			$('span.totalPrice').find('input[name=totalPrice]').val(amount);
			$('span.totalPrice').find('input[name=total]').val(total);
		}
		/*确认收款*/
		function paySure(){
			 var payData = $('tbody.pay-content');
			 if(payData.find('tr').length==0){
				 swal({title:'',text:'请先添加商品', type:"error",timer:2000});return false;
			 }
			 $('#confirmpay').modal('show');
			 $('#confirmpay').on('shown.bs.modal', function () {
				  // 执行一些动作...
				  var totalPrice = $('span.totalPrice').find('span.number').text();
				  var total = $('span.totalPrice').find('input[name=total]').val();
				  var totalNumber = $('span.totalPrice').find('span.num').text();
				  var zr = number_format((total-totalPrice),2);
				  var userId = $('#user_id').val();
				  $('span.payNumber').text(totalNumber);
				  $('span.payPrice').text(totalPrice);
				  $('span.payHave').text(totalPrice);
				  $('td.payzr').text(zr);
				  if(userId){
					  $.ajax({
			        		type: "post",
			                url: "getUser",
			                data: {userId:userId},
			                dataType: "json",
			                success: function(data){
			                	if(data.state){
			                	  var userTel = data.user.tel;
			      				  var userBalance = data.user.balance;
			      				  var userGrade = data.user.mld_name;
			      				  var userName = data.user.user_name;
			      				  var userIntegral = data.user.integral;
			      				  var userCard = data.user.rechargeable_card_num;
			      				  //console.log(userName);
			      				$('td.payUserName').text(userName);
			  				    $('td.payUserTel').text(userTel);
			  				    $('td.payUserGrade').text(userGrade);
			  				    $('td.payUserBalance').text(userBalance);
			  				    $('td.payUserCard').text(userCard);
			  				    $('td.payUserIntegral').text(userIntegral);
			                	}
			                }
						})
				  }
				  paychange();
				  
			})
			return false;
		 } 
		function paychange(obj){
			if(obj){
				var type=$(obj).attr('name');objVal = $(obj).val();objVal=parseFloat(objVal);
			}
			var payHave = $('span.payPrice').text();payHave = parseFloat(payHave);
			var ml = $('input[name=payml]').val();ml = (ml=='')?0:parseFloat(ml);
			var balance = $('input[name=paybalance]').val();balance = (balance=='')?0:parseFloat(balance);
			var coupon = $('input[name=paycoupon]').val();coupon = (coupon=='')?0:parseFloat(coupon);
			var card = $('input[name=paycard]').val();card = (card=='')?0:parseFloat(card);
			var cash = $('input[name=paycash]').val();cash = (cash=='')?0:parseFloat(cash);
			var bank = $('input[name=paybank]').val();bank = (bank=='')?0:parseFloat(bank);
			var wx = $('input[name=paywx]').val();wx = (wx=='')?0:parseFloat(wx);
			var zfb = $('input[name=payzfb]').val();zfb = (zfb=='')?0:parseFloat(zfb);
			
				payHave = payHave-ml-balance-coupon-card;
				payHave = number_format(payHave,2);
				$('span.payHave').text(payHave);
			
			
				payS = $('span.payHave').text();payS = parseFloat(payS);
				payNow = cash+bank+wx+zfb;
				payNow = number_format(payNow,2);
				payRefaud = payNow-payS;
				payRefaud = number_format(payRefaud,2);
				$('span.payTrue').text(payNow);
				$('span.payRefaud').text(payRefaud);
			
			//console.log(type)
		}
		//指向下一个焦点
		function input_focus(){		
			//$("a.btn-yes").parents('tr').find('td.barcode input').focus();
		}

		function payOrder(){
			user = $('#userInfoForm').serialize();
			stock = $('#stockInfoForm').serialize();
			pay = $('#payInfoForm').serialize();
			$.ajax({
        		type: "post",
                url: "pay",
                data: user+'&'+stock+'&'+pay,
                dataType: "json",
                success: function(data){
                	alert(data.data)
                	if(data.state){
                		alert(data.data)
                		swal({title:'',text:data.msg, type:"success",timer:2000});
                		$('#confirmpay').modal('hide');
                		CreateFullBill(data.data);
            	    	LODOP.PRINT();
                		 setTimeout(function(){
                			 window.location.reload();
                		    },2000);
                	}else{
                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
                	}
                }
			})
			//return false;
		}
		function pay(){
			amount = 0;isPay = false;isSure = true;
			payRefaud = $('span.payRefaud').text();
			if(payRefaud==''){
				isSure = false;
			}else{
				if(parseFloat(payRefaud)<0){
					isSure = false;
				}
			}
			if(isSure){
				 payOrder();
			}else{
				swal({   title: "Are you sure?",   
					     text: "实际支付金额不够，确认结账？",   
					     type: "warning",   
					     showCancelButton: true,   
					     confirmButtonColor: "#DD6B55",   
					     cancelButtonText: "取消",   
					     confirmButtonText: "确认结账",   
					     closeOnConfirm: false 
					  }, 
				      function(){   
						  payOrder();  
						  swal("Deleted!", "Your imaginary file has been deleted.", "success");
				});
			}
			/*return false;
			$('tbody.pay-content').find('tr').each(function(){
				num = $(this).find('td.stock_num input').val();
				price = $(this).find('td.stock_price input').val();
				if(!isNaN(num*price)){
					isPay = true;
					amount +=parseFloat(num*price);
				}
				
			})
			//console.log(amount);
			//amount = $('#goods_price').val();
			amount = number_format(amount,2);
			if(amount>=0.1){
				
				$.ajax({
	        		type: "post",
	                url: 'pay?type='+$('button.btn-primary').attr('data-para'),
	                data: $('#micropay').serialize(),
	                dataType: "json",
	                success: function(data){
	                	if(data.state){
	                		swal({title:'',text:data.msg, type:"success",timer:2000});
	                		CreateFullBill(data.data);
	            	    	LODOP.PRINT();
	                		 setTimeout(function(){
	                			 window.location.reload();
	                		    },2000);
	                	}else{
	                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
	                	}
	                }
				})
			}else{
				if($('table').find('tr.odd').size()>=2){
					swal({title:'',text:'支付金额至少为0.1元', type:"error",timer:2000});return false;
				}else{
					swal({title:'',text:'没有货品信息', type:"error",timer:2000});return false;
				}
				
			}*/
		}