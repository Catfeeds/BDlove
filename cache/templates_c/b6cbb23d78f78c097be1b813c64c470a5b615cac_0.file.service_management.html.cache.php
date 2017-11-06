<?php
/* Smarty version 3.1.29, created on 2017-08-08 09:34:56
  from "D:\www\yunjuke\application\pay\views\service_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598915406aace3_94302558',
  'file_dependency' => 
  array (
    'b6cbb23d78f78c097be1b813c64c470a5b615cac' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\service_management.html',
      1 => 1501754115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598915406aace3_94302558 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13508598915404aef79_26466640';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	a:hover{
		color: #333;
	}
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
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>售后管理 
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="service_management"  ><span <?php if ($_smarty_tpl->tpl_vars['state']->value == 'pending') {?>class="current"<?php }?> >处理中</span></a>
			<a href="service_management?state=do"  ><span <?php if ($_smarty_tpl->tpl_vars['state']->value == 'do') {?>class="current"<?php }?> >已处理</span></a>
			<a href="service_management?state=alls"  ><span <?php if ($_smarty_tpl->tpl_vars['state']->value == 'alls') {?>class="current"<?php }?> >全部</span></a>
		</div>
	</div>
    <!-- 操作说明 -->
<!--     <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家提交申请，商家同意并经平台确认后，退款金额以预存款的形式返还给买家（充值卡部分只能退回到充值卡余额）。</li>
        </ul>
    </div> -->
        <form method="get" name="formSearch" id="formSearch">
        <div class="search mt-20 mb-10">
            申请时间：<input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5">
            — <input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30">
            <input type="text" name="buyer" id="" placeholder="买家" class="input-text input_text mb-10">
           <input type="text" name="order_sn" id=""  placeholder="订单编号" class="input-text input_text mb-10">
            <input type="button" class="ml-10 btn btn-warning radius" id="searchsubmit"  value="搜索">
         </div>
        </form>
        

        
        
    <table class="ncsc-default-tables orders mt-20  table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="10">商品列表</th>
        </tr>
        <tr>
            <th class="w10"><div class="sign all"><i class="ico-check"></i></div></th>
            <th colspan="2">商品信息</th>
            <th >单价（元）</th>
            <th >数量</th>
            <th >售后</th>
            <th >申请时间</th>
            <th >买家</th>
            <th >订单状态</th>
            <th >申请售后金额（元）</th>
        </tr>
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
 type="text/javascript">
    var isOnce = true;
    $(function(){
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
            search = $("#formSearch").serialize();
        }
        var url='';
        var state="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
";
        url='service_management?state='+state+'&'+search;
        $.ajax({
            url:url,
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
                if(data.state=='403'){
                    login_ajax('shopadmin');
                }else
                if(data.state){
                    //组装订单列表
                    isOnce = false;
                    $('.pDiv .pcur').val(data.page_info.page);
                    $('.pDiv .ptotal').html(data.page_info.page_count);
                    $('.pDiv .total').html(data.page_info.total_num);
                    $('.pDiv .pfrom').html(data.page_info.start);
                    $('.pDiv .pto').html(data.page_info.to);
                    var blanks = '<tr><td colspan="20" class="sep-row"></td></tr>';
                    var contents = '';
                    $.each(data.returns_info,function(n,order){
                        contents += blanks+'<tr><th colspan="20">'
                            +'<span class="ml10">订单编号：<em>'+order.order_sn+'</em></span>'
                            +'</th></tr>';
                        if((order.son).length != 0){
                            $.each(order.son,function(k,goods){
                                if(!goods.goods_image){
                                    goods.goods_image = '<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
';
                                }
                                if(k==0){
                                    contents += '<tr><td class="bdl" rowspan="'+(order.son).length+'" ><a class="sign"><i class="ico-check"></i></a></td>'
                                        +'<td class="w60"><div class="ncsc-goods-thumb"><a href="<?php echo base_url();?>
index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=120px>\'></a></div></td>'
                                        +'<td><dl class="goods-name"><dt><a target="_blank" href="<?php echo base_url();?>
index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a></dt><dd></dd></dl><dl class="goods-name"><dt>'+goods.color+'/'+goods.size+'</dt><dd></dd></dl></td>'
                                        +'<td><p>'+data_null(goods.goods_price)+'</p></td><td>'+goods.goods_num+'</td>'

                                        +'<td class="bdl" rowspan="'+(order.son).length+'">';
                                    if((order.refund_type == 1&&order.refund_state==1)||(order.refund_type == 1&&order.refund_state==2)){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款处理中</a></p>';
                                    }else if(order.refund_type == 1&&order.refund_state==3){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款已完成</a></p><p class="ncsc-order-amount">退款￥'+order.refund_amount+'</p>';
                                    }else if((order.refund_type == 2&&order.refund_state==1)||(order.refund_type == 2&&order.refund_state==2)){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款并退货处理中</a></p>';
                                    }else if(order.refund_type == 2&&order.refund_state==3){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款并退货已完成</a></p><p class="ncsc-order-amount">退款￥'+order.refund_amount+'</p>';
                                    }else if(order.refund_state==4){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">会员主动取消</a></p>';
                                    }
                                    contents+='</td>'
                                        +'<td class="bdl" rowspan="'+(order.son).length+'"><p></p><p>'+order.add_time+'</p></td>'
                                        +'<td class="bdl" rowspan="'+(order.son).length+'"><p></p><p>'+order.buyer_name+'</p></td>';

                                    if(order.order_status == 0){
                                        order.true_order_status = '已取消';
                                    }else if(order.order_status == 10){
                                        order.true_order_status = '未付款';
                                    }else if(order.order_status == 20){
                                        order.true_order_status = '已付款';
                                    }else if(order.order_status == 30 ){
                                        order.true_order_status = '已发货';
                                    }else if(order.order_status == 40 ){
                                        order.true_order_status = '已收货';
                                    }else if(order.order_status == 50){
                                        order.true_order_status = '已完成';
                                    }else{
                                        order.true_order_status = '未知';
                                    }
                                    contents+='<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+order.true_order_status+'</p><p></p></td>'+
                                        '<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+order.refund_amount_apply+'</p><p></p></td>'+
                                        +'</tr>';
                                }else{
                                    contents += '<tr><td class="w70">'
                                        +'<div class="ncsc-goods-thumb"><a href="<?php echo base_url();?>
index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'"'
                                        +'onmouseover="toolTip(\'<img src='+goods.goods_image+'>\')"'
                                        +'onmouseout="toolTip()"></a></div></td>'
                                        +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="<?php echo base_url();?>
index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a></dt>'
                                        +'<dd></dd></dl><dl class="goods-name"><dt>'+goods.color+'/'+goods.size+'</dt><dd></dd></dl></td><td><p>'+goods.goods_price+'</p></td><td>'+goods.goods_num+'</td></tr>';
                                }
                            });
                        }
                    });
                    $(".ncsc-default-tables.orders tbody").html(contents);
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
' width=120px>");
                    });
                }else{
                    $('.pDiv .pcur').val(1);
                    $('.pDiv .ptotal').html(1);
                    $('.pDiv .total').html(0);
                    $('.pDiv .pfrom').html(0);
                    $('.pDiv .pto').html(0);
                    var contents = '<tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>';
                    $(".ncsc-default-tables.orders tbody").html(contents);
                }
            },
            complete: function(XHR, TS){
                layer.closeAll('loading'); //关闭加载层
            }
        });
    }

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
