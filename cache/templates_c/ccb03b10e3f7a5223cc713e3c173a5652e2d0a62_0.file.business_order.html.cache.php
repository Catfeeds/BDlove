<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:31:27
  from "D:\www\yunjuke\application\pay\views\business_order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cbfa075e0_72884190',
  'file_dependency' => 
  array (
    'ccb03b10e3f7a5223cc713e3c173a5652e2d0a62' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\business_order.html',
      1 => 1505803588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c35cbfa075e0_72884190 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1535759c35cbf688c92_45622591';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	.sign{width: 20px;height: 20px;margin: 0 10px;}
	.sign  .ico-check{
		background: url(<?php echo TEMPLE;?>
images/flexigrid_pic.png) no-repeat 0 0;
		display: inline-block;
		width: 20px;
		height: 20px;
		cursor: pointer;
		vertical-align: middle;
	}
	tr.trSelected .sign  .ico-check{  background-position: -20px 0;}
	.ncsc-default-table thead th { font-weight:normal;line-height: 20px; color: #555; background-color: #F5F5F5; text-align:center; height: 20px; padding: 8px 0; border-bottom: solid 1px #c8c8c8;border-top: 1px solid #c8c8c8 }
	.order tbody tr td.sep-row2{height: auto;padding:8px 0;border-bottom: 1px solid #c8c8c8;background-color: #f5f5f5}
	.tDiv2 {
		font-size: 0;
		float: left;
		overflow: hidden;
		padding-left: 20px;;
	}
	.fbutton {
		vertical-align: top;
		letter-spacing: normal;
		display: inline-block;
		padding-right: 8px;
		margin-left: 8px;
		margin-right: -1px;
		border-right: dotted 1px #D7D7D7;
		cursor: pointer;
	}
	.fbutton div {
		font-size: 12px;
		line-height: 20px;
		color: #999;
		background-color: #FFFFFF;
		height: 20px;
		padding: 2px 7px;
		border: solid 1px #F0F0F0;
		border-radius: 4px;
	}
	.order tbody tr td.bdl{border-right: 1px solid #E6E6E6;vertical-align: middle}
.order .buyer-info dt {
    width: 60px !important;
}
input.w-20{width:40px;}
p.p-width{height:20px;}
input.waybill_sn{margin:0 10px;width:100px;border-radius: 4px;padding: 2px 4px;border: 1px solid #D7D7D7;color: #333;}
.ncsc-goods-thumb{
	margin-left: 20px;
	margin-right: 20px;
}
.status-color-r{color:#f30;}
.status-color-y{color:#f37b1d;}
.status-color-b{color:#99CC00;}
.status-color-g{color:#00cc40;}

.new-store-select{
	    line-height: 16px;
    color: #FFF;
    display: inline-block;
    height: 16px;
    padding-left: 5px;
    padding-right: 5px;
    min-width: 50px;
    text-align: center;
    margin-right: 2px;
    box-shadow: inset 1px 1px 0 rgba(255,255,255,0.25);
    cursor: default;
    height: 20px!important;
    line-height: 20px!important;
}

/*new*/
.good_property{
	color: #999;
	margin-right: 20px;
}
.weui-cells {
    font-size: 15px;
    margin-top: 10px;
}
.good_property_content{
	width: 70%;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.good_property_content a{
	color: #DD2727;
	margin-left: 10px;
}
.good_info{
	margin: 15px;
}
.good_info p{
	float: left;
}
.cl{
	margin-top: 15px;
}
.cl label{
	text-align: right;
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
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i>  订单管理 <span class="c-gray en">&gt;</span> 订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<!-- <div class="explanation" id="explanation" style="width: 99%; color: rgb(111, 156, 13); background-color: rgb(242, 242, 242); height: auto;">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示" style="display: block;"></span>
        </div>
        <ul>
            <li> 默认显示最近一天的订单，查看更多的订单请选择日期进行查询！</li>
            <li>  “未付款”订单中“黄色”显示的订单中部分商品库存不够！该订单不能进行付款操作！！</li>
            <li>  “未付款”订单中“红色”显示的订单中所有商品库存全无或部分商品已经下架！该订单不能进行付款操作！</li>
            <li>  “配货中”订单中“取消”列，”√“显示的表示您提出了取消申请！</li>
            <li>  “已发货”订单中“退货”列，”√“显示的表示您提出了退货申请！</li>
            <li> “已发货”订单中“拒绝”列，”×“显示的表示您的退货申请被拒绝！</li>
            <li>支持Excel数据文件格式：.xlsx <a href="javascript:window.location.href = 'waybill_tp'">下载运单导入(按款号)格式文件。</a>。</li>
            <li>支持Excel数据文件格式：.xlsx <a href="javascript:window.location.href = 'waybill_tp_order'">下载运单导入(按订单)格式文件。</a>。</li>
        </ul>
    </div>
    <div style="clear: both;"></div> -->
<div class="page-container">
   
    <div class="mt-20 mb-10 c-666">
        <form method="get" name="formSearch" id="formSearch">
            下单时间：<input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5">
            — <input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30">
            <select name="order_type" class="f-12  mr-10 selecte pd-5 m_w_120 ">
                  <option value="">订单类型</option>
                  <option value="10">未付款</option>
                  <option value="20">已付款</option>
                  <option value="31">部分发货</option>
                  <option value="30">已发货</option>
                  <option value="40">已收货</option>
                  <option value="0">已取消</option>
                </select>
                <input type="text" name="stocks_sn" id="" placeholder="商品货号" class=" w100">
                <input type="text" name="goods_spu" id="" placeholder="商品款号" class=" w100">
            <input type="text" name="buyer" id="" placeholder="买家" class=" w100 mr-10">
            <input type="text" name="buyer_tel" id="" placeholder="买家电话" class=" w100 mr-10">
            <input type="text" name="pay_sn" id="" placeholder="收银单号" class=" w100">
            <input type="text" name="order_sn" id="" placeholder="订单编号" class=" w100">
            <input type="button" class="ml-10 btn btn-warning radius" id="searchsubmit"  value="搜索">
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray "> 
	<span class="l"> 
            <!-- <a href="javascript:;" class="btn btn-danger radius " onclick="fg_operate('cancel')"><span><i class="fa fa-trash"></i>批量取消</span></a>
            <a class="btn btn-primary  radius  " href="javascript:;" onclick="fg_operate('remark')"><span><i class="fa fa-flag"></i>批量备注</span></a> -->
            <a class="btn btn-primary radius export" href="javascript:;" onclick="fg_operate('export')"><span><i class="fa fa-file-excel-o"></i>导出订单</span></a>
            <a href="javascript:;" class="btn btn-secondary radius " onclick="fg_operate('pei')"><span><i class="fa fa-credit-card"></i>订单配货</span></a>
            <a class="btn btn-primary radius import" href="javascript:;" onclick="fg_operate('import')"><span><i class="fa fa-cloud-download"></i>运单导入</span></a>
           <!--  <a class="btn btn-success radius " href="javascript:;" onclick="fg_operate('send')"><span><i class="fa fa-truck"></i>订单发货</span></a> -->
            
            
	</span>
	
	</div>
    <table class="ncsc-default-table order" style="margin-bottom: 60px;">
	  	<thead>
		    <tr>
		      <th class="w10">
				  <div class="sign all"><i class="ico-check"></i></div>
			  </th>
		      <th colspan="2">商品</th>
		      <!-- <th class="w100">单价（元）</th> -->
		      <th class="w40">数量</th>
		      <th class="w40">实发数量</th>
		      <th class="w120">快递</th> 
		      <th class="w40"></th>
		      <th class="w60">运费</th>
		      <th class="w100">买家</th>
		      <th class="w100">备注</th>
		      <th class="w90">交易状态</th>
		      <th class="w100">交易操作</th>
		    </tr>
<!--			<tr>
				<th colspan="9"  class="sep-row2">
					<div class="tDiv2"><div class="fbutton"><div class="add" title="新增数据"><span><i class="fa fa-plus"></i>新增数据</span></div></div></div>
				</th>
			</tr>-->
	  	</thead>
  		<tbody>
  		
        </tbody>
  </table>
  <div class="flexigrid">
  	<div class="pDiv">
     <div class="pDiv2">
          <div class="pGroup-left">每页最多显示
              <select class="select prp" name="rp">
                  <option value="2"  >2&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected="selected">15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur" value="1" title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页"><i class="fa fa-fast-forward"></i></div>
         </div>
         <div class="pPageStat"></div>
         <div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">?</span>条记录，
                              当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>
        </div>
       </div>
       <div style="clear:both"></div> 
   </div>
  
  </div>
  
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/jQuery_md5/jQuery.md5.add.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
var userId = "<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
";
var isOnce = true;
$(function(){
	//获取时间
	function getTime(totime){
	    if(totime == undefined){
	        var today = new Date();
	    }else{
	        var now = new Date().getTime();
	        var today = new Date(now + totime*1000);
	    }
	    
	    var year = today.getFullYear();
	    var month = today.getMonth()+1;
	    var day = today.getDate();
	    var hours = today.getHours();
	    var minutes = today.getMinutes();
	    var second = today.getSeconds();
	    if (month >= 1 && month <= 9) {
	        month = "0" + month;
	    }
	    if (day >= 0 && day <= 9) {
	        day = "0" + day;
	    }
	    return year + '-' + month + '-' + day;
	}
	$("#startime").val(getTime(-3600*24*90));
	$("#endtime").val(getTime());
	
    // 高级搜索提交
    $('#searchsubmit').click(function(){
        getOrder_lists(1);
    });
    if(isOnce){
    	getOrder_lists(1);
    }
    $('.prp').change(function(){          //页面大小
    	getOrder_lists(1);
    });
    $('.pcur').bind('keydown', function (e) {    //输入框输入分页
 	   var key = e.which;
 	   if(key == 13){
 		   var curpage = $('.pcur').val();
		   if(curpage > parseInt($('.ptotal').html())){
			   curpage = parseInt($('.ptotal').html());
		   }
		   getOrder_lists(curpage);
 	   }
    });
	$('.pPrev').click(function(){          //前一页
	 if(parseInt($('.pcur').val()) == 1){
	  layer.tips('已经是第一页啦', '.pPrev', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = parseInt($('.pcur').val())-1 > 0 ? parseInt($('.pcur').val())-1 : 1;
	 getOrder_lists(curpage);
	});
	$('.pNext').click(function(){           //后一页
	 if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) || (parseInt($('.ptotal').html()) == 0)){
	  layer.tips('已经是最后一页啦', '.pNext', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = parseInt($('.pcur').val())+1 > 0 ? parseInt($('.pcur').val())+1 : 1;
	 getOrder_lists(curpage);
	});
	$('.pFirst').click(function(){          //第一页
	 if(parseInt($('.pcur').val()) == 1){
	  layer.tips('已经是第一页啦', '.pPrev', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = 1;
	 getOrder_lists(curpage);
	});
	$('.pLast').click(function(){          //最后一页
	 if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) ||( parseInt($('.ptotal').html()) == 0)){
	  layer.tips('已经是最后一页啦', '.pNext', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 } 
	 var curpage = parseInt($('.ptotal').html());
	 getOrder_lists(curpage);
	});

});
function getOrder_lists(page){
    var search = '';
    if(!isOnce){
    	search = '?'+$("#formSearch").serialize();
    }
    $.ajax({
        url:'order_management'+search,
        data:{
                'rp':$('.select.prp').val(),
                'curpage':page
        },
        type:'post',
        dataType:'json',
        beforeSend:function(){
                var index = layer.load(0, {shade: false},{time:0});
        },
        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
                    //组装订单列表
                    isOnce = false;
                    $('.pDiv .pcur').val(data.page_info.page);
                    $('.pDiv .ptotal').html(data.page_info.page_count);
                    $('.pDiv .total').html(data.page_info.total_num);
                    $('.pDiv .pfrom').html(data.page_info.start);
                    $('.pDiv .pto').html(data.page_info.to);
                    var blanks = '<tr><td colspan="20" class="sep-row"></td></tr>';
                    var contents = '';
                    var type_way='';
                    $.each(data.goods_info,function(n,order){
                    	type_way='1';
                    	detail_order = JSON.stringify({'order_sn':order.order_sn});
                        if(order.pay_type == 1){
                        	order.pay_type = '微信';
                        }else if(order.pay_type == 2){
                        	order.pay_type = '线下';
                        }else if(order.pay_type == 3){
                        	order.pay_type = '余额';
                        }else if(order.pay_type == 4){
                        	order.pay_type = '支付宝';
                        }
                        mark_o = {'order_sn':order.order_sn,'order_status':order.order_status,'seller_flag':order.seller_flag,'seller_note':order.seller_note};
                        fg_order_info = JSON.stringify(mark_o);
                        contents += blanks+'<tr><th colspan="20">'
                        +'<span class="ml10">订单编号：<em>'+order.order_sn+'</em></span>'
                        +'<span>收银单号：<em class="goods-time">'+data_null(order.pay_sn)+'</em></span>'
                        +'<span>下单时间：<em class="goods-time">'+order.created_time+'</em></span>'
                        +'<span>订单类型：<em >'+order.order_type_+'</em></span>'
                        +'<span>支付方式：<em >'+order.pay_type+'</em></span>'

                        +'<span class="fr mr5"><a href=javascript:fg_remark('+fg_order_info+') class="size-MINI btn btn-primary radius"  title="">备注</a></span>'
                        +'<span class="fr mr5"><a href="waybill_print?op=rm&order_sn='+order.order_sn+'" class="size-MINI btn btn-success radius" target="_blank" title="热敏打印">热敏打印</a></span>'
                        +'<span class="fr mr5"><a href="waybill_print?order_sn='+order.order_sn+'" class="size-MINI btn btn-secondary radius" target="_blank" title="打印面单">打印面单</a></span>'
                        +'<span class="fr mr5"><a href="business_order_print?order_sn='+order.order_sn+'" class="size-MINI btn btn-success radius" target="_blank" title="打印发货单">打印发货单</a></span></th></tr>';
                        if((order.son).length != 0){
                        	type_way='2';
                            $.each(order.son,function(k,goods){
                            	if(!goods.goods_image){
                            		goods.goods_image = '<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
';
                            	}
                            	if(order.shipping_type==1){ //运送方式:快递
                            		 var refund_state_str = '';
                                 	/* if(goods.refund_state==null || goods.refund_state=='' || goods.refund_state==4){
                                 		refund_state_str =   '<span class="new-store-select" data-id="1/'+order+'/'+goods+'" style="background:#f93;margin-left: 25px;color:#FFF;">退款</span>'+
                                                              '<span class="new-store-select" data-id="2/'+order+'/'+goods+'"style="background:#f93;margin-left: 10px;color:#FFF;">退货</span>';
                                         
                                 	} */
                                  	if(goods.refund_state==null || goods.refund_state=='' || goods.refund_state==4){
                                  		if(order.order_status > 10 && order.store_id>0){
                                  		   if(goods.goods_return){
                                  			 var a=order.order_sn,
                                  			c=data_num(goods.goods_pay_price),
                                  			d=goods.goods_name,
                                  			e=goods.goods_id,
                                  			f=goods.goods_num,
                                  			t= order.created_time;
                                  		   t=t.replace(' ','*');
                                  		   d=d.replace(' ','*');
                                  		   refund_o = {'a':order.order_sn,'c':c,'d':d,'e':e,'f':f,'t':t,'s':data_null(goods.stock_code),'size':data_null(goods.goods_size_remark,goods.goods_size),
                                  				  'color':data_null(goods.goods_color_remark,goods.goods_color),'tel':order.receive_mobile,'r':goods.rec_id,'refund_id':data_null(goods.goods_return.refund_id),
                                  				  'refund_seller_state':goods.goods_return.seller_state,'refund_refund_state':goods.goods_return.refund_state,'reason_id':goods.goods_return.reason_id,'refund_amount_apply':goods.goods_return.refund_amount_apply,
                                  				  'refund_amount':goods.goods_return.refund_amount,'refund_num':goods.goods_return.goods_num,'pic_info':goods.goods_return.pic_info,'refund_message':goods.goods_return.buyer_message,'reason_info':goods.goods_return.reason_info,
                                  				  'refund_address':data_null(goods.goods_return.refund_address).replace(/ /g,"！"),'refund_tel':goods.goods_return.refund_tel,'buyer_name':data_null(goods.goods_return.buyer_name).replace(/ /g,"！"),
                                  				  'express_id':data_null(goods.goods_return.express_id),'invoice_no':data_null(goods.goods_return.invoice_no),'add_time':goods.goods_return.add_time,'seller_time':goods.goods_return.seller_time,'shipping_status':goods.shipping_status};
                                  		   
                                  		  refund_o = JSON.stringify(refund_o);
                                  			  refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#f93;margin-left: 25px;color:#FFF;">退</span>';
                                  		   }
                                 		}
                                  	}
                                	express_name0 = data_null(order.express_name,order.create_express);
                                	express_name1 = data_null(order.logistics_name,order.logistics_company_name);
                                	express_name = data_null(express_name1,express_name0);
                                	orderInfo = {'order_sn':order.order_sn,'rec_id':goods.rec_id,'goods_num':goods.goods_num,'waybill_sn':data_null(goods.express_sn)};
                                	//console.log(orderInfo)
                                    fg_orderInfo = JSON.stringify(orderInfo);
                                    if(order.order_status>=20&&order.order_status<40&&data_num(goods.shipping_status)!=1){
                                    	ship_num = goods.goods_num;is_refund = '';
                                    	if(refund_state_str){
                                    		ship_num = parseInt(ship_num)-parseInt(data_num(goods.goods_return.goods_num));is_refund = 'readonly';
                                    		if(goods.goods_return.seller_state==2||goods.goods_return.seller_state==3){
                                        		refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#aaa;margin-left: 25px;color:#FFF;">退</span>';
                                        	}
                                    	}
                                    	//<p class="p-width" style="margin-top:10px"><a class="blue" onclick=fg_cancel('+fg_orderInfo+',this) href="javascript:;">取消</a></p>
                                    	contents_express = '<td class=""><p class="express p-width">'+express_name+'</p>'
                                        +'<p class="waybill p-width" title="运单号"><input name="waybill_sn" onchange=changeSn('+fg_orderInfo+',this) class="waybill_sn" type="text" value="'+data_null(goods.express_sn)+'"></p></td>'
                                        +'<td><p class="p-width"></p><p class="p-width"><a class="blue" onclick=fg_send('+fg_orderInfo+',this) href="javascript:;">发货</a></p></td>';
                                    	contents_goodsNum = '<td><p class="p-width"></p><p><input name="true_goods_num" '+is_refund+' onchange=changeNum('+fg_orderInfo+',this) type="number"  class="w-20" value="'+ship_num+'"></p></td>';
                                    }else if(order.order_status>=30&&order.order_status<40&&data_num(goods.shipping_status)==1){
                                    	ship_num = goods.goods_num;is_refund = '已发货';
                                    	if(refund_state_str&&goods.goods_return.seller_state==2){
                                    		ship_num = parseInt(ship_num)-parseInt(data_num(goods.goods_return.goods_num));
                                    		refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#aaa;margin-left: 25px;color:#FFF;">退</span>';
                                     		if(ship_num==0){
                                     			is_refund = '已退货';
                                     		}else if(ship_num<goods.goods_num){
                                     			is_refund = '部分退货';
                                     		}  
                                    	}
                                    	if(refund_state_str&&goods.goods_return.seller_state==3){
                                    		refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#aaa;margin-left: 25px;color:#FFF;">退</span>';
                                    	}
                                    	contents_express = '<td class=""><p class="express p-width">'+express_name+'</p>'
                                        +'<p class="waybill p-width" title="运单号"><input name="waybill_sn" class="waybill_sn" onchange=changeSn('+fg_orderInfo+',this) type="text" value="'+data_null(goods.express_sn)+'"></p></td>'
                                        +'<td><p class="p-width"></p><p class="p-width status-color-b">'+is_refund+'</p></td>';
                                    	contents_goodsNum = '<td><p class="p-width"></p><p>'+ship_num+'</p></td>';
                                    }
                                    else if(order.order_status>=40){
                                    	ship_num = goods.goods_num;is_refund = '已发货';
                                    	if(refund_state_str&&goods.goods_return.seller_state==2){
                                    		ship_num = parseInt(ship_num)-parseInt(data_num(goods.goods_return.goods_num));
                                    		refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#aaa;margin-left: 25px;color:#FFF;">退</span>';
                                     		if(ship_num==0){
                                     			is_refund = '已退货';
                                     		}else if(ship_num<goods.goods_num){
                                     			is_refund = '部分退货';
                                     		}  
                                    	}
                                    	if(refund_state_str&&goods.goods_return.seller_state==3){
                                    		refund_state_str =   '<span class="new-store-select" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#aaa;margin-left: 25px;color:#FFF;">退</span>';
                                    	}
                                		contents_express = '<td class=""><p class="express p-width">'+express_name+'</p>'
                                        +'<p class="waybill p-width" title="运单号">'+data_null(order.waybill_sn)+'</p></td>'
                                        +'<td><p class="p-width"></p><p class="p-width status-color-b">'+is_refund+'</p></td>';
                                		contents_goodsNum = '<td><p class="p-width"></p><p>'+ship_num+'</p></td>';
                                	}else{
                                		contents_express = '<td class=""><p class="p-width"></p><p class="express p-width">'+express_name+'</p>'
                                        +'</td>'
                                        +'<td><p class="p-width"></p><p class="p-width"></p></td>';
                                		contents_goodsNum = '<td><p class="p-width"></p><p></p></td>';
                                	}
                                }else{//运送方式:自提
                                	contents_express = '<td class=""><p class="express">自提</p></td>';
                                	contents_goodsNum ='<td><p class="p-width"></p><p></p></td><td><p class="p-width"></p><p></p></td>';
                                } 
                            	buyer_name = (order.order_type==3)?order.u_store_name:order.user_name;
                            	buyer_tel = (order.order_type==3)?order.u_ous_tel:order.tel;
                            	
                            	
                               
                                if(k==0){
                                    contents += '<tr class="order-'+order.order_sn+'" data-rec="'+goods.rec_id+'"><td class="bdl orderSelect" data-id="'+order.order_sn+'" rowspan="'+(order.son).length+'" ><a class="sign"><i class="ico-check"></i></a></td>'
                                    +'<td class="w70"><div class="ncsc-goods-thumb"><a href="" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=300px>\'></a></div></td>'
                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="">'+goods.goods_name+
                                    '</a></dt><dd class="text-l">颜色：'+data_null(goods.goods_color_remark,goods.goods_color)+'，尺码：'+data_null(goods.goods_size_remark,goods.goods_size)+'</dd><dd class="text-l">货号：'+data_null(goods.stock_code)+refund_state_str+'</dd></dl></td>'
                                    +'<td><p class="p-width"></p><p class="p-width">'+goods.goods_num+'</p></td>'+contents_goodsNum
                                    +contents_express;
                                    contents +='<td class="bdl" rowspan="'+(order.son).length+'"><p class="ncsc-order-amount"></p>';
                                    if(order.shipping_type==1){ //运送方式:快递
                                    	order.carriage = (order.carriage>0)?order.carriage:'';
                                        contents += '<p class="goods-freight">'+data_null(order.carriage,order.create_carriage)+'</p></td>';
                                    }else{//运送方式:自提
                                    	contents += '<p class="goods-freight">自提</p></td>';
                                    }
                                    
                                    contents +='<td class="bdl" rowspan="'+(order.son).length+'"><div class="buyer">'+data_null(buyer_name,order.receive_name)+'<p member_id="2"></p><div class="buyer-info"><em></em>'
                                    +'<div class="con">'
                                    +'<h3><i></i><span>收货信息</span></h3>'
                                    +'<dl><dt>联系人：</dt><dd>'+data_null(order.receive_name,buyer_name)+'</dd></dl><dl><dt>联系电话：</dt>'
                                    +'<dd>'+data_null(order.receive_mobile,buyer_tel)+'</dd></dl><dl><dt>联系地址：</dt><dd>'+data_null(order.receive_address)+'</dd></dl></div></div></div></td>';
                                    var setBtn = '';status_color = '';
                                    if(order.order_status == 0){
                                        order.true_order_status = '已取消';status_color = 'status-color-r';
                                    }else if(order.order_status == 10){
                                        order.true_order_status = '未付款';status_color = 'status-color-y';
                                        setBtn = '<a href="javascript:orderCancel(\''+order.order_sn+'\')" class="ncbtn ncbtn-grapefruit mt5"><i class="icon-remove-circle"></i>取消订单</a>';
                                    }else if(order.order_status == 20){
                                        order.true_order_status = '已付款';status_color = 'status-color-b';
                                        if(order.shipping_type==1){
                                        	//setBtn += '<a class="ncbtn ncbtn-mint mt10" onclick=sendOrder('+fg_orderInfo+',this) href="javascript:;"><i class="fa fa-truck"></i>设置发货</a>';
                                        }
                                        
                                    }else if(order.order_status == 30 ){
                                        order.true_order_status = '已发货';status_color = 'status-color-g';
                                    }else if(order.order_status == 31 ){
                                        order.true_order_status = '部分发货';status_color = 'status-color-g';
                                    }else if(order.order_status == 40 ){
                                        order.true_order_status = '已收货';status_color = 'status-color-g';
                                    }else if(order.order_status == 50){
                                        order.true_order_status = '已完成';status_color = 'status-color-g';
                                    }else{
                                    	order.true_order_status = '未知';
                                    }
                                    
                                    contents+='<td class="bdl" rowspan="'+(order.son).length+'"><p>'+data_null(order.buyer_message)+'</p></td>'
                                    +'<td class="bdl bdr" rowspan="'+(order.son).length+'"><p class="'+status_color+'">'+order.true_order_status+'</p><p><a href=javascript:fg_detail('+detail_order+')>订单详情</a></p><p></p></td>'
                                    +'<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+setBtn+'</p></td></tr>';
                                }else{
                                    contents += '<tr class="order-'+order.order_sn+'" data-rec="'+goods.rec_id+'"><td class="w70">'
                                    +'<div class="ncsc-goods-thumb"><a href="" target="_blank"><img src="'+goods.goods_image+'"'
                                    +'onmouseover="toolTip(\'<img src='+goods.goods_image+'>\')"'
                                    +'onmouseout="toolTip()"></a></div></td>'
                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="">'+goods.goods_name+'</a></dt>'
                                    +'<dd class="text-l">颜色：'+data_null(goods.goods_color_remark,goods.goods_color)+'，尺码：'+data_null(goods.goods_size_remark,goods.goods_size)+
                                    '</dd><dd class="text-l">货号：'+data_null(goods.stock_code)+refund_state_str+'</dd></dl></td><td><p class="p-width"></p><p class="p-width">'+goods.goods_num+'</p></td>'
                                    +contents_goodsNum+contents_express+'</tr>';
                                }
                            });
                        }
                    });
                    $(".ncsc-default-table.order tbody").html(contents);
                    //标记订单
                    $("tr").delegate(".sign","click",function(){
                        if($(this).parents("tr").hasClass('trSelected')){
                            if($(this).hasClass("all")){
                                    $(".sign").parents("tr").removeClass("trSelected")
                            }else{
                                    $(this).parents("tr").removeClass("trSelected")
                            }
                        }else{
                            if($(this).hasClass("all")){
                                    $(".sign").parents("tr").addClass("trSelected")
                            }else{
                                    $(this).parents("tr").addClass("trSelected")
                            }
                        }
                    })
                    $("img").error(function(){ 
                    	$(this).attr("src", "<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
"); 
                    	$(this).attr("data-geo", "<img src='<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
' width=300px>"); 
                    }); 
            }else{
                $('.pDiv .pcur').val(1);
                $('.pDiv .ptotal').html(1);
                $('.pDiv .total').html(0);
                $('.pDiv .pfrom').html(0);
                $('.pDiv .pto').html(0);
                var contents = '<tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>';
                $(".ncsc-default-table.order tbody").html(contents);
            }
        },
        complete: function(XHR, TS){
                layer.closeAll('loading'); //关闭加载层
        }
    });
}
/*详情*/
function fg_detail(order_sn) {
	window.location.href = 'order_detail?order_sn='+order_sn.order_sn;
    /* layer.closeAll('iframe'); //关闭所有的iframe层
    layer.open({
        type: 2,
        title: '订单详情',
        shadeClose: true,
        shade: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['100%', '100%'],
        content: 'order_detail?order_sn='+order_sn.order_sn
    }); */
}
//实发数量
function changeNum(orderInfo,obj){
	if(parseInt($(obj).val())>parseInt(orderInfo.goods_num)){
		layer.msg('实发数量不能大于下单数量',{icon:2});
		$(obj).val(orderInfo.goods_num);
		return false;
	}
	if(parseInt($(obj).val())<0){
		layer.msg('实发数量不能为负数',{icon:2});
		$(obj).val(orderInfo.goods_num);
		return false;
	}
	 /* $.ajax({
	        url: "order_cancel",
	        data: data,
	        type: 'POST',
	        dataType: 'json',
	        success: function (msg) {
	            layer.closeAll();
	            layer.msg(msg);
	            getOrder_lists(1);
	        }
	    }); */
}
//运单号
function changeSn(orderInfo,obj){
	if(!!orderInfo.waybill_sn&&$(obj).val()!=''){
		layer.confirm('确认更改此单运单号？',function(){
			$.ajax({
			    url: "waybill_sn_change",
			    data: {data:orderInfo,waybill_sn:$(obj).val()},
			    type: 'POST',
			    dataType: 'json',
			    success: function (data) {
			        layer.closeAll();
			        layer.msg(data.msg);
			        getOrder_lists($('.pcur').val());
			    }
		    });
		})
	}
}
//取消订单
function orderCancel(order_sn){
    layer.open({
        type:1,
        skin: 'layui-layer-rim', //加上边框
        area: ['420px', 'auto'], //宽高
        title:'取消订单',
        content: '<form method="post" class="eject_con " id="order_cancel_form" onsubmit="return cancelGo(this)">'
                +'<input type="hidden" name="order_sn" value="'+order_sn+'">'
                +'<dl><dt>订单编号：</dt><dd><span class="num">'+order_sn+'</span></dd></dl>'
                +'<dl><dt>取消缘由：</dt><dd><ul class="checked">'
                +'<li class="c-666"><input type="radio" checked="checked" name="state_info" id="d1" value="1"><label for="d1">无法备齐货物</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" id="d2" value="2"><label for="d2">不是有效的订单</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" id="d3" value="3"><label for="d3">买家主动要求</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" flag="other_reason" id="d4" value="0"><label for="d4">其他原因</label></li>'
                +'<li id="other_reason" style="display:none; height:48px;"><textarea name="state_info1" rows="2" id="other_reason_input" style="width:200px;"></textarea></li>'
                +'</ul></dd></dl><dl class="bottom"><dt>&nbsp;</dt><dd><input type="submit" class="submit" id="confirm_button" value="确定"></dd></dl></form>',
        success: function(){
            $(function(){
                $('ul.checked li input').click(function(){
                    if($(this).attr('id')=='d4'){
                        $('#other_reason').show();
                    }else{
                        $('#other_reason').hide();
                    }
                });
            })
        }
    });
}
function cancelGo(obj){
    var data = $(obj).serialize();
    $.ajax({
        url: "order_cancel",
        data: data,
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            layer.closeAll();
            layer.msg(msg);
            getOrder_lists(1);
        }
    });
    return false;
}
function fg_send(orderInfo,obj){
	waybill_sn = $(obj).parents('tr').find('.waybill_sn').val();
	true_goods_num = $(obj).parents('tr').find('input[name=true_goods_num]').val();
	if(parseInt(true_goods_num)<0){
		layer.msg('实发数量应大于等于0！',{icon:2});
		return false;
	}
	if(parseInt(true_goods_num)>0&&waybill_sn==''){
		layer.msg('请先填写运单号',{icon:2});
		return false;
	}
	$.ajax({
	    url: "send",
	    data: {data:orderInfo,waybill_sn:waybill_sn,true_goods_num:true_goods_num},
	    type: 'POST',
	    dataType: 'json',
	    beforeSend: function(){
	    	$(obj).attr('onclick','');
	    },
	    success: function (data) {
	    	$(obj).attr('onclick','fg_send('+orderInfo+',this)');
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
            }else if(data.state){
                layer.closeAll();
                layer.msg(data.msg);
                getOrder_lists($('.pcur').val());
            }else{
            	layer.msg(data.msg);
            }
	    }
    });
}
function fg_cancel(orderInfo,obj){
	layer.confirm('确认取消此商品？',function(){
		$.ajax({
		    url: "cancel",
		    data: {data:orderInfo},
		    type: 'POST',
		    dataType: 'json',
		    success: function (data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else {
                    layer.closeAll();
                    layer.msg(data.msg);
                    getOrder_lists($('.pcur').val());
                }
		    }
	    });
	})
	
}
function sendOrder(orderInfo,obj){
	tr_class = $(obj).parents('tr').attr('class');
	isSubmit = true;goods_num = 0;waybill_sn_ = '';
	k=1;goods_info = [];
	$('tr.'+tr_class).each(function(){
		waybill_sn = $(this).find('.waybill_sn').val();
		true_goods_num = $(this).find('input[name=true_goods_num]').val();
		if(!waybill_sn){
			isSubmit = false;
		}
		if(k==1){
			waybill_sn_ = waybill_sn;
		}
		goods = {'rec_id':$(this).attr('data-rec'),'goods_num':parseInt(true_goods_num)};
		goods_info.push(goods);
		goods_num +=parseInt(true_goods_num);
		k++;
	})
	if(!isSubmit){
		layer.msg('请先填写运单号',{icon:2});return false;
	}
	if(!(goods_num>0)){
		layer.msg('发货数量为0，请直接取消此订单',{icon:2});return false;
	}
	//console.log(orderInfo+waybill_sn_+goods)
	$.ajax({
	    url: 'sendOrder',
	    data: {data:orderInfo,waybill_sn:waybill_sn_,goods:goods_info},
	    type: 'POST',
	    dataType: 'json',
	    beforeSend: function(){
	    	$(obj).attr('onclick','');
	    },
	    success: function (data) {
	    	$(obj).attr('onclick','sendOrder('+orderInfo+',this)');
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
            }else {
                layer.closeAll();
                layer.msg(data.msg);
                getOrder_lists($('.pcur').val());
            }
	    }
    });
}
//操作
function fg_operate(name){
	var trData = $('table.order').find('tbody').find('tr.trSelected');
	var itemlist = new Array();
	if(trData.length>0){          
        trData.each(function(){
            var id=$(this).find('.orderSelect').attr('data-id');
            if(id!=''){
                itemlist.push(id);
            }           	
        });
    }
	var id = itemlist.join(',');
	if(name=='export'){
		if(id){
			title='确认导出选中的订单？';
		}else{
			title='确认导出当前搜索条件下的订单？';
		}
		url_s = 'orderOp?op=export';
	}else if(name=='pei'){
		if(id){
			title='确认设置选中的订单为配货状态？';
		}else{
			title='确认设置当前搜索条件下的已付款订单为配货状态？';
		}
		
		url_s = 'orderOp?op=pei';
	}else if(name=='import'){
		//运单导入
	    //will_import('按款号',"<?php echo base_url('supplier.php');?>
/write_import/excel_upload",'waybill_import?name=');
	    
	    
	    will_import('按订单',"<?php echo base_url('pay.php');?>
/write_import/excel_upload",'waybill_import?type=order&name=');
	    return false;
	}
	layer.confirm(title,function(){
		layer.closeAll();
		if(name=='export'){
			var form = $("<form></form>");
	         form.attr('action', url_s+'&' + $("#formSearch").serialize());
	         form.attr('method', 'post');
	         input1 = $("<input type='hidden' name='id' />");
	         input1.attr('value', id);
	         form.append(input1);
	         form.appendTo("body");
	         form.css('display', 'none');
	         form.submit();
	         layer.msg('开始生成导出文件');
		}else{
			$.ajax({
			    url: url_s+'&' + $("#formSearch").serialize(),
			    data: {id:id},
			    type: 'POST',
			    dataType: 'json',
			    success: function (data) {
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else {
                        layer.closeAll();
                        layer.msg(data.msg);
                        getOrder_lists($('.pcur').val());
                    }
			    }
		    });
		}
         
	})
}
/*运单导入*/
 function will_import(type,site_url,content_url){
    	layer.open({
            type: 1,
            btn: ['确认', '取消'],
            title: '<b>运单导入（'+type+'）</b>',
            skin: 'layui-layer-rim', //加上边框
            area: ['520px', '180px'], //宽高
            content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form3" method="POST" enctype=multipart/form-data>' +
            '<table class="table">' +
            '<tr> ' +
            '<td class="text-l f-14"  style="width: 80px;">选择文件：</td>' +
            '<td class="text-l pos-r"><div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div><div class="err pos-a" style="bottom: -10px;"></div></td> ' +
            '</tr>' +

            '</table>'+
            '</form></div>',
            yes: function(index){
                /*添加代理商表单验证*/
                $('#form3').validate({
                    errorPlacement: function(error, element){
                        var error_td = element.parents('.input-file-show').next('div.err');
                        error_td.append(error);
                    },
                    rules : {
                        file_ : {
                            required : true
                        }
                    },
                    messages : {
                        file_ : {
                            required : '<i class="fa fa-exclamation-circle"></i>请选择文件'
                        }
                    }
                });
                if($("#form3").valid()){
                	var data = new FormData($('#form3')[0]);
                	layer.close(index);
                	$.ajax({
                		data:data,
                    	type:'post',
                    	url:site_url,
                    	dataType:'json',
                    	cache: false,
                    	processData: false,
                        contentType: false,
                    	success:function(data){
                            if(data.state == '403'){
                                layer.msg(data.msg);
                                window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                            }else if(data.state == '401'){
                                layer.msg(data.msg);
                            }else if(data['state'] == false){
                    			layer.alert(data['msg']);
                    		}else{
                    			//iframe层
                    			layer.open({
                       			  type: 2,
                       			  title: '导入明细',
            						scrollbar:false,
            						shade: 0.8,
                       			  area: ['60%', '520px'],
                       			  content: content_url+data['name']
                    			}); 
                    		}
                    	}
                	});
                }
            }, no: function(){
            }
        })
    }
 
/*备注*/
function fg_remark(data) {
    if(data.order_status == 10){
    	data.order_status_ = '<span style="color:#f30">未付款</span>';
    }else if(data.order_status == 0){
    	data.order_status_ = '<span style="color:#f30">已取消</span>';
    }else if(data.order_status == 20){
    	//console.log(order.out_order_sn);
        data.order_status_ = '<span style="color:#99CC00">已付款</span>';
    }else if(data.order_status == 30){
    	data.order_status_ = '<span style="color:#00cc40">已发货</span>';
    }else if(data.order_status == 40){
    	data.order_status_ = '<span style="color:#00cc40">已收货</span>';
    }else if(data.order_status == 50){
    	data.order_status_ = '<span style="color:#00cc40">已完成</span>';
    }else{
    	data.order_status_ = '<span style="color:#F00">未知</span>';
    }
    var content = '<div class="pd-10"><form action="" id="remark_form"><input type="hidden" name="order_sn" value="' + data.order_sn + '"><table class="table table-border table-bordered table-bg">' +
            '<tr><td width="50%">订单编号：' + data.order_sn + '</td><td width="50%">订单状态：' + data.order_status_ + '</td></tr></table><table class="table table-border table-bordered table-bg mt-20">' +
            '<tr class="text-c"><td width="15%">标记</td><td width="85%" class="text-l">';
    if (data.seller_flag == '1') {
        
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1" checked=checked><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '2') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2" checked=checked><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '3') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1" ><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3" checked=checked ><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '4') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4" checked=checked><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '5') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5" checked=checked><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    }
    content += '<span class="err"></span></td></tr>' +
            '<tr><td width="15%" class="va-m">备注</td><td width="85%"><textarea name="seller_note"  class="pd-5 f-12" style="width:70%;height:100px;" id="" cols="30" rows="10">';
    if (data.seller_note != 'null') {
        content += data_null(data.seller_note);
    }
    content += '</textarea><span class="err"></span>' +
            '<div class="f-14" style="color:#999">500字内</div></td></tr></table></form></div>';
    layer.open({
        type: 1,
        title: '<b>添加备注</b>',
        btn: ['确定', '取消'],
        skin: 'layui-layer-rim', //加上边框
        area: ['500px', '380px'], //宽高
        content: content,
        yes: function (index) {
            var value = $("#remark_form").serialize();
            $.ajax({
                type: "post",
                dataType: "json",
                url: "remark_update",
                data: value,
                success: function (data) {
                    layer.msg(data.msg);
                    layer.close(index);
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if (data.state == true) {
                        getOrder_lists(1);
                    }
                }
            });
        }, no: function () {}
    })
}



//获取时间
function getTime(totime){
    if(totime == undefined){
        var today = new Date();
    }else{
        var now = new Date().getTime();
        var today = new Date(now + totime*1000);
    }
    
    var year = today.getFullYear();
    var month = today.getMonth()+1;
    var day = today.getDate();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var second = today.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (day >= 0 && day <= 9) {
        day = "0" + day;
    }
    //return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + second;
    return year + '-' + month + '-' + day + ' ' + '23' + ':' + '59' + ':' + '59';
}

//售后处理
function new_store_select(data_fun,obj){
	var timess = new Date(data_null(data_fun.add_time*1000)).toLocaleString().replace(/:\d{1,2}$/,'');
      d=(data_fun.d).replace('*',' ');
   var goods_pays_price = parseFloat(data_num((data_fun.c)*(data_fun.f))).toFixed(2); 
   var refundreason = <?php if (isset($_smarty_tpl->tpl_vars['refundreason']->value)) {
echo $_smarty_tpl->tpl_vars['refundreason']->value;
}?>;
  var content='<form  method="post" enctype="multipart/form-data" id="form_email_guide"  name="settingForm">'+
  ' <input type="hidden" id="goods_name" name="goods_name" value="'+data_fun.d+'"/>'+
  ' <input type="hidden" id="goods_num" name="goods_num" value="'+data_fun.f+'"/>'+
  ' <input type="hidden" id="goods_id" name="goods_id" value="'+data_fun.e+'"/>'+
  ' <input type="hidden" id="rec_id" name="rec_id" value="'+data_fun.r+'"/>'+
  ' <input type="hidden" id="order_sn" name="order_sn" value="'+data_fun.a+'"/>'+
  ' <input type="hidden" id="seller_state" name="seller_state" value="'+data_null(data_fun.refund_seller_state)+'"/>'+
  ' <input type="hidden" id="refund_state" name="refund_state" value="'+data_null(data_fun.refund_refund_state)+'"/>'+
  ' <input type="hidden" id="refund_id" name="refund_id" value="'+data_fun.refund_id+'"/>'+
  '<div class="cl">'+
		'<label class="form-label col-xs-3">商品名称：</label>'+
		'<div class="formControls col-xs-8">'+data_fun.d+'<span>  '+data_fun.s+'  '+data_fun.size+'  '+data_fun.color+'  '+data_fun.f+'  '+'</span>'+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">订单金额：</label>'+
		'<div class="formControls col-xs-8">￥ '+goods_pays_price+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">订单编号：</label>'+
		'<div class="formControls col-xs-8">'+data_fun.a+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">申请时间：</label>'+
		'<div class="formControls col-xs-8">'+timess+
		'</div>'+
	'</div>';
		refund_status = '';
		if(data_fun.refund_id){
			reason_id = data_fun.reason_id;
			reason_info = data_fun.reason_info;
			refund_num = data_null(data_fun.refund_num);
			refund_amount_apply = data_null(data_fun.refund_amount_apply);
			refund_amount = data_null(data_fun.refund_amount);
			re = new RegExp("！","g");
			buyer_name = data_null(data_fun.buyer_name).replace(re," ");
			refund_tel = data_null(data_fun.refund_tel);
			
			refund_address = data_null(data_fun.refund_address).replace(re," ");
			refund_message = data_null(data_fun.refund_message);
			pic_info = data_null(data_fun.pic_info);
			//'<div class="uploadimg" id="uploadimg2" imgname="2017091116193459b64716c3c21_apply.JPG"><img src=""><i class="fa fa-times remove" aria-hidden="true"></i></div>';
			if(data_fun.refund_refund_state==4){
				layer_btn = '';
				refund_status_str = '已取消';
			}else if(data_fun.refund_seller_state==1&&data_fun.refund_refund_state>=1){
				refund_status_str = '待处理';
				layer_btn = ['同意','不同意','关闭'];
			}else if(data_fun.refund_seller_state==2&&data_fun.refund_refund_state>=1){
				refund_status_str = '已同意';
				layer_btn = '';
			}else if(data_fun.refund_seller_state==3&&data_fun.refund_refund_state>=1){
				refund_status_str = '已拒绝';
				layer_btn = '';
			}
			refund_status = '<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款状态：</label>'+
			'<div class="formControls col-xs-8"><span class="red">'+refund_status_str+
			'</span></div>'+
		'</div>';
		}else{
			reason_id = '';
			reason_info = '-请选择-';
			refund_num = '';
			refund_amount_apply = '';
			refund_amount = '';
			buyer_name = '';
			refund_tel = data_null(data_fun.tel);
			refund_address = '';
			refund_message = '';
			pic_info = '';
			layer_btn = ['确定','关闭'];
		}
		//console.log(pic_info);
		pic_img = '';
		if(pic_info&&typeof(pic_info)=='object'){
			$.each(pic_info,function(k,v){
				pic_img += '<div class="uploadimg" id="uploadimg2" imgname="'+v+'"><img src=<?php echo base_url("data/shop/refund_pic/");?>
'+v+'></div>';
			})
		}
		
		content +=refund_status+'<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款原因：</label>'+
			'<div class="formControls col-xs-8">'+
				reason_info+
			'</div>'+
		'</div>'+
		'<div class="cl">'+
		'<label class="form-label col-xs-3">退货数量：</label>'+
		'<div class="formControls col-xs-8">'+
			refund_num+
		'</div>'+
	    '</div>'+
	    '<div class="cl">'+
		'<label class="form-label col-xs-3">退货/款申请金额：</label>'+
		'<div class="formControls col-xs-8">'+
		  refund_amount_apply+
		'</div>'+
	    '</div>'+
		'<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款金额：</label>'+
			'<div class="formControls col-xs-8">'+
				'<input type="text" name="refund_amount" id="refund_amount" value="'+refund_amount_apply+'" class="radius"  max_amout="'+goods_pays_price+'" placeholder="'+goods_pays_price+'" style="width: 160px;"><span class="err"></span>'+
			'</div>'+
		'</div>'+
		/* '<div class="cl">'+
		'<label class="form-label col-xs-3">退货地址：</label>'+
		'<div class="formControls col-xs-8"><input type="text" readonly value="'+refund_address+'" name="refund_address" style="width:420px;border:none;" class="" id="refund_address">'+
			
		'</div>'+
	   '</div>'+
	   '<div class="cl">'+
		'<label class="form-label col-xs-3">退货联系人：</label>'+
		'<div class="formControls col-xs-8"><input type="hidden" name="contact_tel" id="refund_contact_tel" value=""><input type="text" readonly value="'+buyer_name+'" name="refund_contact" style="width:420px;border:none;" class="" id="refund_contact">'+
			
		'</div>'+
	   '</div>'+ */
		'<div class="cl">'+
			'<label class="form-label col-xs-3">退货联系人手机号码：</label>'+
			'<div class="formControls col-xs-8">'+
				refund_tel+
			'</div>'+
		'</div>'+
		'<div class="cl">'+
		'<label class="form-label col-xs-3">退货联系人留言：</label>'+
		'<div class="formControls col-xs-8">'+
		  refund_message+
		'</div>'+
	    '</div>'+
		'<div class="cl">'+
			'<label class="form-label col-xs-3">备注信息：</label>'+
			'<div class="formControls col-xs-8">'+
				'<textarea name="buyer_message" id="buyer_message" style="width:300px;height:100px"></textarea>'+
			'</div>'+
		'</div>'+
		'<div class="cl" style="border-bottom:1px solid #ccc">'+
			'<label class="form-label col-xs-3">图片举证：</label>'+
			'<div class="formControls col-xs-9">'+
				'<div id="preview">'+pic_img+'</div>'+
				'<div style="clear:both"></div>'+
				
			'</div>'+
		'</div>'+
		'<div class="cl">'+
		'<label class="form-label col-xs-3">支付密码：</label>'+
		'<div class="formControls col-xs-8">'+
			'<input type="password" name="pay_pwd" id="pay_pwd" value="" class="radius"  placeholder="请输入支付密码" style="width: 160px;"><span class="err"></span>'+
		'</div>'+
	'</div>'+
		'</form>';
	  
	layer.open({
    type: 1,
    skin: 'layui-layer-rim', //加上边框
    title: '<b>申请退货/款</b>',
    area: ['620px', '520px'], //宽高
    content: content,
    btn: layer_btn, //按钮
    success :function(){
    	
    },
    yes:function(index){
    	$('#form_email_guide').validate({
            errorPlacement: function(error, element){
                var error_td = element.nextAll('span.err');
                error_td.append(error);
            },
            rules : {
            	pay_pwd : {required : true},
            },
            messages : {
            	pay_pwd : {required : '<i class="fa fa-exclamation-circle"></i> 请输入支付密码！'},
            }
        });
    	if($("#form_email_guide").valid()){
        	
   	     pwd = $('#pay_pwd').val();
     	pwd = pwd_addMD5(pwd);
     	$('#pay_pwd').val('');
     	var form_data = $("#form_email_guide").serialize();
		   $.ajax({
				type: "POST",
		        url: "post_apply_deal?op=w",
		        data: form_data+'&pwd='+pwd,
		        dataType: "json",
		        success: function(data){
		        	if(data.state){
		        		layer.closeAll();
		        		layer.msg(data.msg);
		        		getOrder_lists(1);
	        	    }else{
	        	    	layer.msg(data.msg);
	        	    }
		        }
			 });
    	}
       
        
    },btn2:function(){
    	if(data_fun.refund_id){
    		if(data_fun.refund_refund_state!=4&&data_fun.refund_seller_state==1){
    			$('#form_email_guide').validate({
    	            errorPlacement: function(error, element){
    	                var error_td = element.nextAll('span.err');
    	                error_td.append(error);
    	            },
    	            rules : {
    	            	pay_pwd : {required : true},
    	            },
    	            messages : {
    	            	pay_pwd : {required : '<i class="fa fa-exclamation-circle"></i> 请输入支付密码！'},
    	            }
    	        });
    	    	if($("#form_email_guide").valid()){
	    			var form = document.getElementById("form_email_guide");
	       	        var form_data =new FormData(form);
	        		$.ajax({
	    				type: "POST",
	    		        url: "post_apply_deal?op=cancel",
	    		        data: form_data,
	    		        dataType: "json",
	    		        success: function(data){
	    		        	
	    		        	if(data.state){
	    		        		layer.closeAll();
	    		        		layer.msg(data.msg);
	    		        		getOrder_lists(1);
	    	        	    }else{
	    	        	    	layer.msg(data.msg);
	    	        	    }
	    		        }
	    			 });
    	    	}
    		}else{
        			
    		}
    			
    	}
    },
    btn3:function(){
    	
    }
    })
}























var numsimg= 1;
function preview(file){
	var lengs = $('#preview').children('.uploadimg').length;
	if(lengs>4){
		   layer.msg("亲，最多只能上传5张图片哦！");
		  return false;
	  }
	
	    
	    
	    
 	var prevDiv = document.getElementById('preview');  
 	if(file.files && file.files[0]){
 		var reader = new FileReader();
 		reader.onload = function(evt){
			prevDiv.innerHTML += '<div class="uploadimg" id="uploadimg'+numsimg+'"><img src="' + evt.target.result + '" /><i class="fa fa-times remove" aria-hidden="true"></i></div>';
		}
 		reader.readAsDataURL(file.files[0]);
 	}
 	  var form_datas = new FormData($('#form_email_guide')[0]);  
    $.ajax({
		type: "POST",
        url: "apply_set_onload",
        data: form_datas,
        dataType: "json",
        cache: false,  
        processData: false,  
        contentType: false,
        success: function(data){
        	console.log(data)
        	if(data.state){
        		$("#uploadimg"+numsimg).attr("imgname",data.msg);
        	}else{
        		layer.msg(data.msg);
        		$("#uploadimg"+numsimg).remove();
        	}
        }
	});
    
 	numsimg++;
}



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













<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
