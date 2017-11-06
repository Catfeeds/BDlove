<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:32:11
  from "D:\www\yunjuke\application\pay\views\goods_in.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35ceb1d6535_45076367',
  'file_dependency' => 
  array (
    'b38b0009a332e2c2e186cca673ea10fbfc177c62' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_in.html',
      1 => 1502782919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:place_order_body.html' => 1,
  ),
),false)) {
function content_59c35ceb1d6535_45076367 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2809559c35ceae61397_37961853';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/muitipleSelect/jquery.sumoselect.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span> 商品迁入  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
      <select name="auth_store_id" class="search pd-5 mb-10  select2" id="auth_store" style="min-width: 100px !important">
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['ways'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['ways'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_store_0_saved_item = isset($_smarty_tpl->tpl_vars['store']) ? $_smarty_tpl->tpl_vars['store'] : false;
$_smarty_tpl->tpl_vars['store'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['store']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->_loop = true;
$__foreach_store_0_saved_local_item = $_smarty_tpl->tpl_vars['store'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['store']->value['auth_store_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['store']->value['auth_store_name'];?>
</option>
        <?php
$_smarty_tpl->tpl_vars['store'] = $__foreach_store_0_saved_local_item;
}
if ($__foreach_store_0_saved_item) {
$_smarty_tpl->tpl_vars['store'] = $__foreach_store_0_saved_item;
}
?>
        <?php }?>
      </select>
      <select name="brand_id" class="search pd-5 mb-10 select2" id="brand" style="min-width: 100px !important">

      </select>
      <select name="gc_id" id="cate" class="selecte pd-5 mb-10 select2"   style="min-width:80px !important">
        <option value="" selected>-分类-</option>
        <?php echo $_smarty_tpl->tpl_vars['search']->value['cate_option'];?>

      </select>

      <select name="sex" class="selecte  pd-5 mb-10  "  style="min-width: 70px !important">
        <option value="" selected>-性别-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['sexs'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['sexs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_sex_1_saved_item = isset($_smarty_tpl->tpl_vars['sex']) ? $_smarty_tpl->tpl_vars['sex'] : false;
$__foreach_sex_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['sex'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['sex']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['sex']->value) {
$_smarty_tpl->tpl_vars['sex']->_loop = true;
$__foreach_sex_1_saved_local_item = $_smarty_tpl->tpl_vars['sex'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sex']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['sex'] = $__foreach_sex_1_saved_local_item;
}
if ($__foreach_sex_1_saved_item) {
$_smarty_tpl->tpl_vars['sex'] = $__foreach_sex_1_saved_item;
}
if ($__foreach_sex_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_sex_1_saved_key;
}
?>
        <?php }?>
      </select>
      <select name="stocks_price" class="selecte  pd-5 mb-10 "  style="min-width: 80px !important">
        <option value="" selected>-价格范围-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['price_area'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['price_area'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_price_area_2_saved_item = isset($_smarty_tpl->tpl_vars['price_area']) ? $_smarty_tpl->tpl_vars['price_area'] : false;
$__foreach_price_area_2_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['price_area'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['price_area']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['price_area']->value) {
$_smarty_tpl->tpl_vars['price_area']->_loop = true;
$__foreach_price_area_2_saved_local_item = $_smarty_tpl->tpl_vars['price_area'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['price_area']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['price_area'] = $__foreach_price_area_2_saved_local_item;
}
if ($__foreach_price_area_2_saved_item) {
$_smarty_tpl->tpl_vars['price_area'] = $__foreach_price_area_2_saved_item;
}
if ($__foreach_price_area_2_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_price_area_2_saved_key;
}
?>
        <?php }?>
      </select>

      <select name="year_to_market" class="selecte  pd-5 mb-10  "  style="min-width: 60px !important"s>
        <option value="" selected>-年份-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['years'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['years'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_year_3_saved_item = isset($_smarty_tpl->tpl_vars['year']) ? $_smarty_tpl->tpl_vars['year'] : false;
$_smarty_tpl->tpl_vars['year'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['year']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->_loop = true;
$__foreach_year_3_saved_local_item = $_smarty_tpl->tpl_vars['year'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['year'] = $__foreach_year_3_saved_local_item;
}
if ($__foreach_year_3_saved_item) {
$_smarty_tpl->tpl_vars['year'] = $__foreach_year_3_saved_item;
}
?>
        <?php }?>
      </select>
      <select name="season_to_market" class="selecte  pd-5 mb-10 "  style="min-width: 60px !important">
        <option value="" selected>-季节-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['quarters'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['quarters'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_quarter_4_saved_item = isset($_smarty_tpl->tpl_vars['quarter']) ? $_smarty_tpl->tpl_vars['quarter'] : false;
$__foreach_quarter_4_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['quarter'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['quarter']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['quarter']->value) {
$_smarty_tpl->tpl_vars['quarter']->_loop = true;
$__foreach_quarter_4_saved_local_item = $_smarty_tpl->tpl_vars['quarter'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['quarter']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['quarter'] = $__foreach_quarter_4_saved_local_item;
}
if ($__foreach_quarter_4_saved_item) {
$_smarty_tpl->tpl_vars['quarter'] = $__foreach_quarter_4_saved_item;
}
if ($__foreach_quarter_4_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_quarter_4_saved_key;
}
?>
        <?php }?>
      </select>
      <select name="sort" class="selecte  pd-5 mb-10 "  style="min-width: 60px !important">
        <option value="" selected>-排序-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['orders'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['orders'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_order_5_saved_item = isset($_smarty_tpl->tpl_vars['order']) ? $_smarty_tpl->tpl_vars['order'] : false;
$__foreach_order_5_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['order'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['order']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
$__foreach_order_5_saved_local_item = $_smarty_tpl->tpl_vars['order'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_5_saved_local_item;
}
if ($__foreach_order_5_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_5_saved_item;
}
if ($__foreach_order_5_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_order_5_saved_key;
}
?>
        <?php }?>
      </select>
      <select name="goods_image" class="selecte  pd-5 mb-10 "  style="min-width: 80px !important">
        <option value="" selected>-是否有图-</option>
        <?php if (!empty($_smarty_tpl->tpl_vars['search']->value['picture'])) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['search']->value['picture'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_picture_6_saved_item = isset($_smarty_tpl->tpl_vars['picture']) ? $_smarty_tpl->tpl_vars['picture'] : false;
$__foreach_picture_6_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['picture']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['picture']->value) {
$_smarty_tpl->tpl_vars['picture']->_loop = true;
$__foreach_picture_6_saved_local_item = $_smarty_tpl->tpl_vars['picture'];
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['picture']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['picture'] = $__foreach_picture_6_saved_local_item;
}
if ($__foreach_picture_6_saved_item) {
$_smarty_tpl->tpl_vars['picture'] = $__foreach_picture_6_saved_item;
}
if ($__foreach_picture_6_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_picture_6_saved_key;
}
?>
        <?php }?>
      </select>
      <input name="stocks_sn" type="text" placeholder="货号"  class="input-text input_text f-12   mysearch mb-10 ">
      <input name="goods_spu" type="text" placeholder="款号"  class="input-text input_text f-12   mysearch mb-10 ">
      <input type="button" id="search" onclick="search_button()" class="btn btn-warning radius ml-5 pButton mb-10" value="搜索">
      <a class="btn btn-primary radius export ml-5 mb-10" href="javascript:;" onclick="goods_in()"><span><i class="fa fa-sign-in" aria-hidden="true"></i>将搜索结果迁入店铺</span></a>

    </div>
  </form>
  <?php echo '<script'; ?>
>
      var flag=true;

      function batch_order(){
          $('div.batch_order').toggle(
              function(){
                  $(this).parents("tr").find("input.hide").show();
                  $("a.size_").each(function(){
                      if($(this).text()==0){
                          $(this).parents("td").find("input").hide();
                      }
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
                          window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                      }else if(data.state == '401'){
                          layer.msg(data.msg);
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
  <?php echo '</script'; ?>
>

  <div class="flexigrid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:place_order_body.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>
  <?php echo '<script'; ?>
>
      var loading = true;
      var c_class = true;
      var key = false;
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
                              window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                          }else if(data.state == '401'){
                              layer.msg(data.msg);
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
      //获取品牌
      function get_brands(store_id) {
          var content = '';
          $.ajax({
              type:'get',
              dataType:'json',
              url:'get_goods_in_brands?store_id='+store_id,
              success: function(data) {
                  if(data.state == '403'){
                      layer.msg(data.msg);
                      window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                  }else if(data.state == '401'){
                      layer.msg(data.msg);
                  }else if (data.state == true) {
                      if (data.info.length>0) {
                          $.each(data.info,function(k,v){
                              content += '<option value="'+v.brand_id+'">'+v.brand_name+'</option>';
                          });
                      } else {
                          layer.msg('未查询到授权品牌！');
                      }
                  } else {
                      layer.msg('授权品牌获取失败！请稍后重试');
                  }
                  $("select[name='brand_id").html(content);
              }
          });
      }
      //搜索
      function search_button(){
          if($("select[name='brand_id").val()) {
              key = true;
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
          } else {
              layer.msg('请选择品牌');
              return false;
          }
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
                      window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                  }else if(data.state == '401'){
                      layer.msg(data.msg);
                  }else if(data.indexOf('goods_list') >= 0){
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

              }
          });
      }

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
                          window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                      }else if(data.state == '401'){
                          layer.msg(data.msg);
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
          $('.flexigrid').on('mouseover mouseout','.size_num',function(event){ //最后一页
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

          $(".flexigrid").on("click",'a.size_',function(){
              if($(this).text()!=0){
                  $.post('push_shop_cart',{data:$(this).attr('data-sa-id')+',1'},function(data){
                      if(typeof(data)=='string'){
                          data = jQuery.parseJSON(data);
                      }
                      if(data.state == '403'){
                          layer.msg(data.msg);
                          window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                      }else if(data.state == '401'){
                          layer.msg(data.msg);
                      }else if(data.state){
                          $('#shop_cart_total', window.parent.document).text(data.data);
                          layer.msg(data.msg);
                      }else{
                          layer.msg('下单失败，请重试');
                      }
                  })
              }


          })
      })

      //迁入商品
      function goods_in() {
          if(key) {
              layer.closeAll();
              $.ajax({
                  type:'post',
                  url:'place_order?op=page&goods_in=1',
                  data:$("form").serialize(),
                  dataType:'json',
                  beforeSend:function(){
                      layer.msg('数据提交中...',{icon:1});
                      var index = layer.load(1,{shade: false});
                  },
                  success:function(data){
                      layer.closeAll();
                      if(data.state == '403'){
                          layer.msg(data.msg);
                          window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                      }else if(data.state == '401'){
                          layer.msg(data.msg);
                      }else if(data.state == true) {
                          if (data.ctr == 2) {
                              layer.msg('成功迁入'+data.num+'条数据,更新'+data.n+'条数据');
                          } else {
                              layer.msg('商品已存在，库存修改成功！');
                          }
                      }else {
                          layer.msg('迁入失败！请稍后重试');
                      }
                  }
              });
          } else {
              layer.msg('请先获取数据');
          }
      }
      //得到授权的品牌
      get_brands($('#auth_store').val());
      $('#auth_store').change(function() {
          $("select[name='brand_id").html('');
          get_brands($(this).val());
      });

  <?php echo '</script'; ?>
>

  <div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</div>
</body>
</html><?php }
}
