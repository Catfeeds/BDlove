<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:32:24
  from "D:\www\yunjuke\application\pay\views\place_order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cf89b9ec0_63633222',
  'file_dependency' => 
  array (
    '35a64131170740a66c3fac0c5d46f600bf9d37c4' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\place_order.html',
      1 => 1501837857,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
    '6fd20fc2a64b94f124169f08b9ca2c7b3ccf63ac' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\place_order_body.html',
      1 => 1502877638,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59c35cf89b9ec0_63633222 ($_smarty_tpl) {
?>
   <!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<style>
    
	table.table th, table.table td{
		padding:8px 0;
	}
    .arrow_box {
        position: absolute;
        background: #fff;
        border: 2px solid rgba(0,0,0,.3);
        left:0;
		margin-left:35px;
        top:-70px;
        z-index: 10;
        width: 250px;
        border-radius: 5px;;
    }
    .arrow_box li.text-l{
        width: 230px;
        height: 24px;
        line-height: 24px;
        border-bottom: 1px solid #ddd;
    }
    .arrow_box:after, .arrow_box:before {
        right: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }
	.mt-5{
		margin-top: 5px!important;
	}
    .arrow_box:after {
        border-color: rgba(95, 184, 120, 0);
       border-right-color: #fff;
        border-width: 8px;
        margin-top: -8px;

    }
    .arrow_box:before {
        border-color: rgba(160, 234, 180, 0);
        border-right-color: rgba(0,0,0,.3);
        border-width: 11px;
        margin-top: -11px;
        border-radius: 5px;;
    }
    
    
    
    .select2-container .select2-selection--multiple{
	height: 28px !important;
	min-height: 0px !important;
	position: relative;
	top: 4px;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
    	height: 26px !important;    	
    	box-sizing: border-box;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
    	height: 24px !important;
    	margin: 0px !important;
    	box-sizing: border-box;
    }
    
   /* */
  .select2-container .select2-selection--multiple a{
  	position: absolute;
  	right: 2px;
  	top: 12px;
  	
  }
  .select2-container .select2-selection--multiple:hover,.select2-container .select2-selection--multiple:focus{
  	border: 1px solid #0099CC;
  	box-shadow: 0 0 0 2px rgba(82, 168, 236, 0.15);
  	-moz-box-shadow:0 0 0 2px rgba(82, 168, 236, 0.15);
  	-webkit-box-shadow: 0 0 0 2px rgba(82, 168, 236, 0.15);
  
  }
input[type="text"].hide {
    display: none;
}
.c_blue {
    background-color: #0099CC;
}
td.pos-r{padding:8px 0 !important;}
</style>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/muitipleSelect/jquery.sumoselect.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            window.searchSelAll = $('.search-box-sel-all').SumoSelect({ 
                csvDispCount: 3,
                selectAll:true,
                search: true,
                searchText:'请选择.',
                okCancelInMulti:true ,
                floatWidth: 50,
            });
        });
    </script>
<body style="background-color: #FFF; overflow: auto;">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en">&gt;</span> 手工下单  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <!-- 操作说明 -->
<!--  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span>
    </div>
    <ul>
      <li> 全站所有涉及的商品分类均来源于此处，强烈建议对此处谨慎操作。</li>
    </ul>
  </div>-->
  <form method="post" name="formSearch" id="formSearch" action="place_order"> 
  <div class="search mt-10 mb-5">
  <!-- <select name="auth_store_id" class="search pd-5 mb-10  select2" id="auth_store" style="min-width: 100px !important">
      <option value="" selected>-店铺-</option>
                  <option value="44">射洪-品牌店</option>
            <option value="47">射洪 妮可贝贝</option>
            <option value="51">射洪 ABC</option>
            <option value="54">射洪 全品牌店铺</option>
            <option value="61">万达 ABC 探路者</option>
            <option value="62">万达 大头儿子</option>
            <option value="65">ABC成都仓</option>
                </select> -->
    <select name="brand_id" class="search pd-5 mb-10  select2" id="brand" style="min-width: 100px !important">
      <option value="" selected>-品牌-</option>
                  <option value="380">妮可贝贝</option>
            <option value="384">Discovery</option>
            <option value="377">公主安娜</option>
            <option value="373">耐克</option>
            <option value="379">大头儿子</option>
                </select>
    <select name="gc_id" id="cate" class="selecte pd-5 mb-10 select2"  id="" style="min-width:80px !important">
      <option value="" selected>-分类-</option>
      <option value='100055' >|--精品童衣</option><option value='100099' >&nbsp;&nbsp;&nbsp;&nbsp;|--POLO衫</option><option value='100100' >&nbsp;&nbsp;&nbsp;&nbsp;|--马甲</option><option value='100101' >&nbsp;&nbsp;&nbsp;&nbsp;|--棉服</option><option value='100103' >&nbsp;&nbsp;&nbsp;&nbsp;|--背心</option><option value='100056' >&nbsp;&nbsp;&nbsp;&nbsp;|--衬衫</option><option value='100057' >&nbsp;&nbsp;&nbsp;&nbsp;|--运动上衣</option><option value='100058' >&nbsp;&nbsp;&nbsp;&nbsp;|--T恤</option><option value='100067' >&nbsp;&nbsp;&nbsp;&nbsp;|--裙子</option><option value='100096' >&nbsp;&nbsp;&nbsp;&nbsp;|--夹克</option><option value='100071' >&nbsp;&nbsp;&nbsp;&nbsp;|--针织衫</option><option value='100059' >&nbsp;&nbsp;&nbsp;&nbsp;|--冲锋衣</option><option value='100068' >&nbsp;&nbsp;&nbsp;&nbsp;|--小西服</option><option value='100069' >&nbsp;&nbsp;&nbsp;&nbsp;|--卫衣</option><option value='100070' >&nbsp;&nbsp;&nbsp;&nbsp;|--风衣</option><option value='100072' >&nbsp;&nbsp;&nbsp;&nbsp;|--羽绒服</option><option value='100097' >&nbsp;&nbsp;&nbsp;&nbsp;|--自营童衣</option><option value='100061' >|--时尚童裤</option><option value='100104' >&nbsp;&nbsp;&nbsp;&nbsp;|--冲锋裤</option><option value='100063' >&nbsp;&nbsp;&nbsp;&nbsp;|--运动裤</option><option value='100064' >&nbsp;&nbsp;&nbsp;&nbsp;|--牛仔裤</option><option value='100065' >&nbsp;&nbsp;&nbsp;&nbsp;|--休闲裤</option><option value='100066' >&nbsp;&nbsp;&nbsp;&nbsp;|--亲子装</option><option value='100092' >&nbsp;&nbsp;&nbsp;&nbsp;|--西裤</option><option value='100093' >&nbsp;&nbsp;&nbsp;&nbsp;|--短裤</option><option value='100094' >&nbsp;&nbsp;&nbsp;&nbsp;|--喇叭裤</option><option value='100095' >&nbsp;&nbsp;&nbsp;&nbsp;|--自营童裤</option><option value='100073' >|--潮流童鞋</option><option value='100074' >&nbsp;&nbsp;&nbsp;&nbsp;|--运动鞋</option><option value='100075' >&nbsp;&nbsp;&nbsp;&nbsp;|--帆布鞋</option><option value='100076' >&nbsp;&nbsp;&nbsp;&nbsp;|--皮鞋</option><option value='100077' >&nbsp;&nbsp;&nbsp;&nbsp;|--凉鞋</option><option value='100078' >&nbsp;&nbsp;&nbsp;&nbsp;|--学步鞋</option><option value='100079' >&nbsp;&nbsp;&nbsp;&nbsp;|--雨鞋</option><option value='100080' >&nbsp;&nbsp;&nbsp;&nbsp;|--亲子鞋</option><option value='100081' >&nbsp;&nbsp;&nbsp;&nbsp;|--自营童鞋</option><option value='100082' >|--儿童配件</option><option value='100083' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童帽子</option><option value='100084' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童袜子</option><option value='100085' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童眼镜</option><option value='100086' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童书包</option><option value='100087' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童背心</option><option value='100088' >&nbsp;&nbsp;&nbsp;&nbsp;|--打底裤</option><option value='100089' >&nbsp;&nbsp;&nbsp;&nbsp;|--家居服</option>
    </select>
    <select name="size" class="selecte pd-5 mb-10 select2" id="" style="min-width: 70px !important">
      <option value="" selected>-尺码-</option>
                  <option value="XXXL">XXXL</option>
            <option value="5">5</option>
            <option value="45">45</option>
            <option value="44">44</option>
            <option value="43">43</option>
            <option value="42">42</option>
            <option value="41">41</option>
            <option value="40">40</option>
            <option value="4.5">4.5</option>
            <option value="4">4</option>
            <option value="3XL">3XL</option>
            <option value="39">39</option>
            <option value="38">38</option>
            <option value="37">37</option>
            <option value="36">36</option>
            <option value="5.5">5.5</option>
            <option value="6">6</option>
            <option value="6.5">6.5</option>
            <option value="XXL">XXL</option>
            <option value="XS">XS</option>
            <option value="XL">XL</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="90">90</option>
            <option value="9.5">9.5</option>
            <option value="9">9</option>
            <option value="80">80</option>
            <option value="8.5">8.5</option>
            <option value="8">8</option>
            <option value="7.5">7.5</option>
            <option value="7">7</option>
            <option value="35">35</option>
            <option value="34">34</option>
            <option value="33">33</option>
            <option value="145">145</option>
            <option value="140">140</option>
            <option value="14">14</option>
            <option value="135">135</option>
            <option value="130">130</option>
            <option value="13.5">13.5</option>
            <option value="13">13</option>
            <option value="120">120</option>
            <option value="12.5">12.5</option>
            <option value="12">12</option>
            <option value="110">110</option>
            <option value="11.5">11.5</option>
            <option value="11">11</option>
            <option value="10.5">10.5</option>
            <option value="150">150</option>
            <option value="155">155</option>
            <option value="160">160</option>
            <option value="32">32</option>
            <option value="31">31</option>
            <option value="30">30</option>
            <option value="29">29</option>
            <option value="28">28</option>
            <option value="27">27</option>
            <option value="26">26</option>
            <option value="25">25</option>
            <option value="24">24</option>
            <option value="23">23</option>
            <option value="22">22</option>
            <option value="21">21</option>
            <option value="170">170</option>
            <option value="165">165</option>
            <option value="10">10</option>
                </select>
    <select name="color" class="selecte pd-5 mb-10 select2" id="" style="min-width: 70px !important">
      <option value="" selected>-颜色-</option>
                  <option value="黑">黑</option>
            <option value="白">白</option>
            <option value="灰">灰</option>
            <option value="棕">棕</option>
            <option value="红">红</option>
            <option value="橙">橙</option>
            <option value="黄">黄</option>
            <option value="绿">绿</option>
            <option value="青">青</option>
            <option value="蓝">蓝</option>
            <option value="紫">紫</option>
                </select>
    <select name="sex" class="selecte  pd-5 mb-10  " id="" style="min-width: 70px !important">
      <option value="" selected>-性别-</option>
                  <option value="2">男</option>
            <option value="1">女</option>
            <option value="0">中性</option>
                </select>
    <select name="stocks_price" class="selecte  pd-5 mb-10 " id="" style="min-width: 80px !important">
      <option value="" selected>-价格范围-</option>
                  <option value="0-100">100以下</option>
            <option value="101-200">101-200</option>
            <option value="201-300">201-300</option>
            <option value="301-400">301-400</option>
            <option value="401-500">401-500</option>
            <option value="501-1001">501-1001</option>
            <option value="1001-2000">1001-2000</option>
            <option value="2000">2000以上 </option>
                </select>
    <!-- <select name="discount" class="selecte  pd-5 mb-10  " id="" style="min-width: 80px !important">
      <option value="" selected>-折扣范围-</option>
                  <option value="0-0.3">3折以下</option>
            <option value="0.31-0.4">3.1-4折</option>
            <option value="0.41-0.5">4.1-5折</option>
            <option value="0.5">5折以上</option>
                </select> -->
    <select name="year_to_market" class="selecte  pd-5 mb-10  " id="" style="min-width: 60px !important"s>
      <option value="" selected>-年份-</option>
                   <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
                </select>
    <select name="season_to_market" class="selecte  pd-5 mb-10 " id="" style="min-width: 60px !important">
      <option value="" selected>-季节-</option>
                   <option value="1">春季</option>
            <option value="2">夏季</option>
            <option value="3">秋季</option>
            <option value="4">冬季</option>
                </select>
    <select name="sort" class="selecte  pd-5 mb-10 " id="" style="min-width: 60px !important">
      <option value="" selected>-排序-</option>
                  <option value="selas">销量</option>
            <option value="stocks">库存</option>
                </select>
    <select name="goods_image" class="selecte  pd-5 mb-10 " id="" style="min-width: 80px !important">
    <option value="" selected>-是否有图-</option>
                <option value="1">有图</option>
            <option value="2">无图</option>
                </select>
    <input name="stocks_sn" type="text"id="" placeholder="货号" style="width:200px !important" class="input-text input_text f-12   mysearch mb-10 ">
    <input name="goods_spu" type="text"id="" placeholder="款号" style="width:200px !important" class="input-text input_text f-12   mysearch mb-10 ">
    <input type="button" id="search" onclick="search_button()" class="btn btn-warning radius ml-5 pButton mb-10" value="搜索">
    <a class="btn btn-primary radius export ml-10 mb-10" href="javascript:;" onclick="fg_export()"><span><i class="fa fa-file-excel-o"></i>导出库存</span></a>
  </div>
  </form>
  <script>
  var fog=true;
//  $(".select2").select2({
////       placeholder:'请选择',
//////      dir: "rtl",
////    	 width:"220px",
////        allowClear: true,
////      dropdownAutoWidth:true,
////      closeOnSelect: false,   
////      multiple:true,
//      
//   });
  function batch_order(){
	   $('div.batch_order').toggle(
              function(){
                  $(this).parents("tr").find("input.hide").show();
                  $("a.size_").each(function(){
                      //if($(this).text()==0){
                          //$(this).parents("td").find("input").hide();
                      //}
                  })
              },
              function(){
                  if(fog==false){
                      return false
                  }
                  var i=[];
                  var k=$(this).parents("tr");
                  k.find('input').each(function(){
                      if($(this).val()!=0){
                          
                          i.push($(this).parent().find('.size_').attr('data-sa-id')+','+$(this).val());
                      }
                 })



                      data=i.join('|');
                      $(this).parents("tr").find("input.hide").hide();

                      $.post('push_shop_cart',{data:data},function(data){
                          if(typeof(data)=='string'){
                              data = jQuery.parseJSON(data);
                          }
                          if(data.state == '403'){
                              layer.msg(data.msg);
                              window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                          }else if(data.state == '401'){
                              layer.msg(data.msg);
                              return false;
                          }else if(data.state){
                              $('#shop_cart_total', window.parent.document).text(data.data);
                              layer.msg(data.msg);
                          }else{
                              layer.msg('下单失败，请重试');
                          }
                      })

              }
      )
}
  </script>
  
  <div class="flexigrid">
<style>
    .border-b{border-bottom: 1px solid #ddd;min-width:26px}
</style>
   <script>
   		batch_order();
   </script>
  
 </div>
<script>
var loading = true;
var c_class = true;
 //分页
   $(function(){
	 //批量下单点击任意地方也下单
	   $("body").on('click',function(){
		   if($(':focus').length==0){
			   var input_num=$('input.hide');
			   var statu = false;i=[];
			   $.each(input_num,function(){
				   if($(this).css('display')=='inline-block'){
					   
					   if($(this).val()!=0){
						   statu = true;
	                      
	                       i.push($(this).parent().find('.size_').attr('data-sa-id')+','+$(this).val())
	                   }
				   }
			   })
			   if(statu){
				   $('input.hide').hide();		   
				   data=i.join('|');
                   $.post('push_shop_cart',{data:data},function(data){
                       if(typeof(data)=='string'){
                           data = jQuery.parseJSON(data);
                       }
                       if(data.state == '403'){
                           layer.msg(data.msg);
                           window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                       }else if(data.state == '401'){
                           layer.msg(data.msg);
                           return false;
                       }else if(data.state){
	                        $('#shop_cart_total', window.parent.document).text(data.data);
	                           layer.msg(data.msg);
	                        }else{
	                           layer.msg('下单失败，请重试');
	                       }
                   })
			   }
			   //alert(1);
		   }
	   })
	   $(".select2").select2(); 
		/*商品图片放大*/
       $( document ).tooltip({
           items: "img, [data-geo], [title]",
           content: function() {
               var element = $( this );
               if ( element.is( "[data-geo]" ) ) {
                   return element.data( "geo" );
               }
               if ( element.is( "[title]" ) ) {
                   return element.attr( "title" );
               }
               if ( element.is( "img" ) ) {
                   return element.attr( "alt" );
               }
           }
       });
   
       //
	   
	   $('.mysearch').bind('keydown', function (e) {    
		   var key = e.which;
		   if(key == 13){
			   page('1');
		   }
	 });
	 //页面大小
	  $('.flexigrid').on('change','.prp',function(){
		  var flag = false;
	  	   $('.pButton').each(function(){
	  		  if($(this).hasClass('p_loading')){
	  			  flag = true;
	  		  }
	  	   })
	  	   if(flag){
	  		  return true;
	  	   }
	 	  	$(this).addClass('p_loading');
	 		  page('1');
	  })
	  /* $('.prp').change(function(){          
		   
	 	  });*/
	 	  
	  //输入框输入分页
	   $('.flexigrid').on('keydown','.pcur',function(e){ 
		   var flag = false;
 	  	   $('.pButton').each(function(){
                        if($(this).hasClass('p_loading')){
                          flag = true;
                        }
 	  	   })
 	  	   if(flag){
 	  		  return true;
 	  	   }
		   var key = e.which;
		   if(key == 13){
                        var curpage = parseInt($('.pcur').val());p_ptotal = parseInt($('.ptotal').text());
                        
                                if(curpage > p_ptotal){
                                        curpage = p_ptotal;
                                }
                                $(this).addClass('p_loading');
                                page(curpage);
                        
                   }
	   });
	  //前一页
	  $('.flexigrid').on('click','.pPrev',function(){ //前一页
 	  // $('.pPrev').click(function(){          
 		   var flag = false;
	  	   $('.pButton').each(function(){
	  		  if($(this).hasClass('p_loading')){
	  			  flag = true;
	  		  }
	  	   })
	  	   if(flag){
	  		  return true;
	  	   }
 		  if(parseInt($('.pcur').val()) == 1){
 			  layer.tips('已经是第一页啦', '.pPrev', {
 				  tips: [1, '#3595CC'],
 				  time: 3000
 				})
 			  return false;
 		  }
 		  var curpage = parseInt($('.pcur').val())-1 > 0 ? parseInt($('.pcur').val())-1 : 1;
 		  $(this).addClass('p_loading');
 		  page(curpage);
 	  });
 	 $('.flexigrid').on('click','.pNext',function(){ //后一页
 	 // $('.pNext').click(function(){           
 		  if(parseInt($('.pcur').val()) == parseInt($('.ptotal').html())){
 			  layer.tips('已经是最后一页啦', '.pNext', {
 				  tips: [1, '#3595CC'],
 				  time: 3000
 				})
 			  return false;
 		  }
 		  var curpage = parseInt($('.pcur').val())+1 > 0 ? parseInt($('.pcur').val())+1 : 1;
 		  page(curpage);
 	  });
 	 $('.flexigrid').on('click','.pFirst',function(){ //第一页
 	  //$('.pFirst').click(function(){          //第一页
 		   var flag = false;
	  	   $('.pButton').each(function(){
	  		  if($(this).hasClass('p_loading')){
	  			  flag = true;
	  		  }
	  	   })
	  	   if(flag){
	  		  return true;
	  	   }
 		  if(parseInt($('.pcur').val()) == 1){
 			  layer.tips('已经是第一页啦', '.pPrev', {
 				  tips: [1, '#3595CC'],
 				  time: 3000
 				})
 			  return false;
 		  }
 		  var curpage = 1;
 		  $(this).addClass('p_loading');
 		  page(curpage);
 	  });
 	$('.flexigrid').on('click','.pLast',function(){ //最后一页
 	  //$('.pLast').click(function(){          //最后一页
 		  var flag = false;
	  	   $('.pButton').each(function(){
	  		  if($(this).hasClass('p_loading')){
	  			  flag = true;
	  		  }
	  	   })
	  	   if(flag){
	  		  return true;
	  	   }
 		  if(parseInt($('.pcur').val()) == parseInt($('.ptotal').html())){
 			  layer.tips('已经是最后一页啦', '.pNext', {
 				  tips: [1, '#3595CC'],
 				  time: 3000
 				})
 			  return false;
 		  } 
 		  var curpage = parseInt($('.ptotal').html());
 		 $(this).addClass('p_loading');
 		  page(curpage);
 	  });
 	  
   });
 //搜索
  function search_button(){
    var flag = false;
    $('.pButton').each(function(){
           if($(this).hasClass('p_loading')){
                   flag = true;
           }
    })
    if(flag){
           return true;
    }
         $(this).addClass('p_loading');
        page('1');
    
  }
   function page(curpage){
	   if(loading){
                loading = false;
	  }else{
                return false;
	  }
 	  var rp = $('.prp').length>0 ? $('.prp').val() : 10;
 	  var data = $('#formSearch').serialize();
 	 $.ajax({
                type: "post",
                url: "place_order?op=page",
                data: data+"&rp="+rp+"&curpage="+curpage,
                dataType: "html",
                beforeSend: function(data){
                        loading = true;
                        var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
                },
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else  if(data.indexOf('goods_list') >= 0){
                        $(".flexigrid").html(data);
                    }else{
//                    console.log(data);return false;
//                        data = JSON.parse(data);
                        if(data.state){
                            layer.msg(data.msg);
                            setTimeout(function(){
                                if (window.parent != window)
                            {
                              window.top.location.href = "../login/logout";
                            }
                            },3000)
                        }
                    }
                    layer.closeAll('loading'); //关闭加载层
                },
                complete: function(XHR, TS){
            	    $('img').error(function(){
                      $(this).attr('src', "http://[::1]/yunjuke/data/images/default_goods_image.jpg");
                      $(this).attr('data-geo', "<img src=http://[::1]/yunjuke/data/images/default_goods_image.jpg width=300px>");
                      
                    });
                    layer.closeAll('loading'); //关闭加载层
               }
         });	  
   }
 /*公告*/
 $('.flexigrid').on('mouseover mouseout','span i.news',function(event){ //最后一页
	 if(event.type == "mouseover"){
 /*$("span i.news").hover(
         function(){*/
         	var index = $(this);
                var notice = $(this).data('notice');
                var html = "<div class='arrow_box f-12 pos-r' style='font-style: normal;'><div class='layui-layer-title text-l ' ><b>仓库公告</b><a href='../message/index/2' class='pos-a bottom f-12' style='right:15px;color:#666'>更多公告</a></div>"+
                    "<ul class=' pd-10' style='height: 96px;overflow: hidden;'>";
                    $.each(notice,function(k,v){
                        html +="<li class='text-l text-overflow' style='border-bottom: 1px solid #ddd'>"+
                        "<a data-title='"+v.title+"' data-content='"+v.content+"' data-time='"+v.add_time+
                        "'href='javascript:;'style='color: #666;' onclick='fg_detail(this)'>"+(++k)+"."+v.title+"</a>"+
                        "</li>";
                    })
                    html +="</ul></div>";
                    index.append(html);
     		/*$.ajax({
     			type: "get",
     			url: "notice?op=way_msg&depot_code="+depot_code,
     			data:'',
     			dataType: "json",
     			success: function(data){
                                if(data.state=='403'){
                                        login_ajax('agent',data);
                                }else if(data.state == true){
                                    layer.msg(data.msg);
                                    setTimeout(function(){
                                            if (window.parent != window)
                                    {
                                      window.top.location.href = "../login/logout";
                                    }
                                    },3000)
                                }else{
                                var html = "<div class='arrow_box f-12 pos-r' style='font-style: normal;'><div class='layui-layer-title text-l ' ><b>仓库公告</b><a href='../message/index/2' class='pos-a bottom f-12' style='right:15px;color:#666'>更多公告</a></div>"+
                                "<ul class=' pd-10' style='height: 96px;overflow: hidden;'>";
                                $.each(data,function(k,v){
                                        html +="<li class='text-l text-overflow' style='border-bottom: 1px solid #ddd'><a data-title='"+v.title+"' data-content='"+v.content+"' data-time='"+v.add_time+"'href='javascript:;'style='color: #666;' onclick='fg_detail(this)'>"+(++k)+"."+v.title+"</a></li>";
                                })
                                html +="</ul></div>";
                                index.append(html);
    		  		}
     			}
     		})*/
          }else{
                $(".arrow_box").remove();                 	  
          }
    })
 function fg_detail(obj) {
//    console.log(obj);return false;
     /*详情*/    
     var title = $(obj).data('title');
     var time = $(obj).data('time');
     time = new Date(parseInt(time) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');     
     var content = $(obj).data('content');
     var data = '<div class="pd-10"><p style="text-align: center;"><span style="font-size: 18px;"><strong>'+title+'</strong></span></p><p style="text-align: center;"><span style="font-family: 楷体, 楷体_GB2312, SimKai; font-size: 14px;">'+time+'</span></p><p>'+content+'</p></div>';
         layer.open({
             type: 1,
             shadeClose :true,
             title: '<b>信息</b>',
             area: ['500px', 'anto'], //宽高
             content: data
         });
 } 
 /*#addr*/
 $('.flexigrid').on('mouseover mouseout','span#addr',function(event){ //最后一页
	 if(event.type == "mouseover"){
   /*$("span#addr").hover(
           function(){*/
         	var depot_info = $(this).data("info");
                var content = "<ul class=' pd-10' >";
                content += "<li class='text-l ' style='border-bottom: 1px solid #ddd'>1.发货日期安排："+depot_info.shipment_time+"</li>";
                content += "<li class='text-l ' style='border-bottom: 1px solid #ddd'>2.截止交单时间："+depot_info.deliver_time+"</li>";
                content += "<li class='text-l ' style='border-bottom: 1px solid #ddd'>3.渠道配货率："+depot_info.distribution_rate+"</li>";
                content += "<li class='text-l ' style='border-bottom: 1px solid #ddd'>4.退货政策："+depot_info.refunds_note+"</li>";         
                content += "<li class='text-l text-overflow' style='border-bottom: 1px solid #ddd'>5.物流说明："+depot_info.express+"</li>";
                content += "<li class='text-l text-overflow' style='border-bottom: 1px solid #ddd'>6."+depot_info.other_note+"</li>";
                content += "</ul>";
                layer.tips(content, $(this), {
                    tips: [3, '#3595CC'],
                    time: 4000000000000
                });
           }else{
        	   layer.closeAll()
           }
   })
   $(function(){	  
      $("#cate_1").change(function(){
    	  if(c_class){
     		 c_class = false;
     	 }else{
     		 return false;
     	 }
     	 get_son_cate_list();
      })     
   });
    
   function get_son_cate_list(){     //获取相应的二级分类
        var cate_1 = $("#cate_1").val();
        if(cate_1 != ''){
            $.ajax({
                type: "post",
                url: "get_son_cate_list",
                data:"parent_id="+cate_1,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else {
                        c_class = true;
                        $("#cate_2").find("option").remove();
                        $("#cate_2").html(data);
                    }
                }
           });
        }
   }
   
   $(function(){	   
	   $('.flexigrid').on('mouseover mouseout','.showall',function(event){ //最后一页
			 if(event.type == "mouseover"){
       //$(".size_num").parents("td").hover(
				 $(this).parents("tr").find("div.batch_order").show();
                 if($(this).find("a").html()==0){
                     $(this).find("a").css("cursor","default");
                 }
               }else{
            	   if($(this).parents("tr").find("input.hide").css("display")=="none"){
                       $(this).parents("tr").find("div.batch_order").hide();
                     }
               }
              
	   });
       //批量下单 只能填写正整数  且商品数量应不大于实际数量
      
       $('.flexigrid').on('change','input.hide',function(){ //最后一页
       //$("input.hide").change(function(){
           var k=$(this).val()*1;
           var i=$(this).parents("td").find(".size_").text()*1;
           if((/^(\+|-)?\d+$/.test( k )&&k>0)){
               /* if(k>i){
                   layer.msg('商品数量应小于实际数量');
                   $(this).val('');
                   return fog=false;
               }else{ */
                   return fog=true;
               //}
           }else{
               $(this).val('');
               layer.msg('请填写正整数');
               return fog=false;
           }
       })
       /*批量下单*/
       /*$('.flexigrid').on('click','div.batch_order',function(){ //最后一页   	   
    	         
       })*/

       $(".flexigrid").on("click",'a.size_',function(){
            //if($(this).text()!=0){
                $.post('push_shop_cart',{data:$(this).attr('data-sa-id')+',1'},function(data){
                    if(typeof(data)=='string'){
                        data = jQuery.parseJSON(data);
                    }
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
                    	$('#shop_cart_total', window.parent.document).text(data.data);
                        layer.msg(data.msg);
                    }else{
                        layer.msg('下单失败，请重试');
                    }
                })
            //}

         	
       })
     })
     <!--获取指定渠道下相应的品牌列表-->
function get_brand_list(depot){
	var depot_code = $(depot).val();
	var html = '<option value="">-品牌-</option>';
	$('#brand').html(html);
	$.ajax({
        type: "get",
        url: "get_brand_list?depot_code="+depot_code,
        data: '',
        dataType: "json",
        success: function(data){
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
                return false;
            }else {
                html += data;
                $('#brand').html(html);
            }
        }
	})
}
function fg_export(){
    var search = $("#formSearch").serialize();
    //var list = {'基本信息':['商品名称','条形码','类别','品牌'],'相关属性':['颜色','性别','吊牌价','上市时间']};
    var list1 = {'e_goods_name':'商品名称','e_stocks_bar_code':'条形码','e_class':'类别','e_brand':'品牌'};
    var list2 = {'e_color':'颜色','e_sex':'性别','e_goods_marketprice':'吊牌价','e_year':'上市时间'};
    var content = '<div class="pd-10" style="overflow: auto">'+
            '<form action="" id="form-list">'+
            '<table class="table table-border" style="">'+
            '<tbody>'+
            '<th colspan="5" bgcolor="#F5F5F5">'+
            '<input type="checkbox"  class="ml-20 mr-5 th_checkbox" nctype="modulesAll" value="2"  id="selectAll">全选</th>';

            content += '<tr><td width="20%" class=""><div class="w-100 f-r pr-5" style="border-right: 1px dotted #ddd">'+
              '<input type="checkbox" nctype="groupAll" class="mr-5" value="" >基本资料</div></td>';
            $.each(list1,function(k,v){
                content += '<td><input type="checkbox" name="export['+k+']" class="ml-10 mt-5 f-l" value="'+v+'" style="margin-right:3px"><span class="mr-5 f-l ">'+v+'</span> ';
                content +='</td>';
            });
            content += '</tr>';
            content += '<tr><td width="20%" class=""><div class="w-100 f-r pr-5" style="border-right: 1px dotted #ddd">'+
                '<input type="checkbox" nctype="groupAll" class="mr-5" value="" >相关属性</div></td>';
            $.each(list2,function(k,v){
                content += '<td><input type="checkbox" name="export['+k+']" class="ml-10 mt-5 f-l" value="'+v+'" style="margin-right:3px"><span class="mr-5 f-l ">'+v+'</span> ';
                content += '</td>';
            });
            content +='</tr></tbody>'+
            '</table></form>'+
            '</div>';
    var index = layer.open({
        type: 1,
        title: '<b>导出字段选择</b>',
        skin: 'layui-layer-rim', //加上边框
        area: ['500px', '250px'], //宽高
        btn: ['提交', '取消'],
        content: content,
        success:function(){
            // 全选
            $('#selectAll').click(function(){
              $('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
            });
            // 功能模块
            $('input[nctype="modulesAll"]').click(function(){
                $(this).parents('table').find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
            });
            // 功能组
            $("tr input[type=checkbox]").eq(0).attr("nctype","groupAll");
            $('input[nctype="groupAll"]').click(function(){
                $(this).parents('tr').find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
            });
        },
        yes: function () {
            var form = $("<form></form>");
            var list = $("#form-list").serialize();
            form.attr('action', 'place_order_export?' + search+'&'+list);
            form.attr('method', 'post');
            form.appendTo("body");
            form.css('display', 'none');
            layer.closeAll();
            form.submit();
            layer.msg('开始生成导出文件');
        }, no: function () {}
    })
}

   </script>
  <div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
