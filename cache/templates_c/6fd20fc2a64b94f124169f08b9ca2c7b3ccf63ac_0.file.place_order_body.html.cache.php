<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:32:24
  from "D:\www\yunjuke\application\pay\views\place_order_body.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cf895c2b2_84282515',
  'file_dependency' => 
  array (
    '6fd20fc2a64b94f124169f08b9ca2c7b3ccf63ac' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\place_order_body.html',
      1 => 1502877638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c35cf895c2b2_84282515 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1748959c35cf87ba2d6_55084006';
?>
<style>
    .border-b{border-bottom: 1px solid #ddd;min-width:26px}
</style>
<?php if (isset($_smarty_tpl->tpl_vars['goods_info']->value) == true) {?>
<div class="bk-gray pd-10">
    <ul id="list">
    <?php if (empty($_smarty_tpl->tpl_vars['goods_info']->value) !== TRUE) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['goods_info']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_goods_0_saved_item = isset($_smarty_tpl->tpl_vars['goods']) ? $_smarty_tpl->tpl_vars['goods'] : false;
$_smarty_tpl->tpl_vars['goods'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['goods']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->value) {
$_smarty_tpl->tpl_vars['goods']->_loop = true;
$__foreach_goods_0_saved_local_item = $_smarty_tpl->tpl_vars['goods'];
?>
   
      <li class="goods_list mb-40">
        <div class="goods_info cl">
          <img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['goods_image'];?>
" width="70" height="70"  data-geo='<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['goods_image'];?>
" width=300px>' class="f-l" alt="">
          <div class="goods_info_text f-l ml-20">
            <div class="f-16"><b>货号：<span class="goods_article_number"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['stocks_sku'];?>
 </span>名称：<?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['goods_name'];?>
</b></div>
            <div class="f-14">吊牌价：<span class="c-red"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['stocks_marketprice'];?>
</span>元</div>
            <div class="f-14">
              品牌：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['brand_name'];?>
</span>
              商品分类：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['gc_name'];?>
</span>
              性别：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['sex'];?>
</span>
             <!--  <?php if ($_smarty_tpl->tpl_vars['goods']->value['attr']) {?>
              <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['attr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_attr_1_saved_item = isset($_smarty_tpl->tpl_vars['attr']) ? $_smarty_tpl->tpl_vars['attr'] : false;
$_smarty_tpl->tpl_vars['attr'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['attr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attr']->value) {
$_smarty_tpl->tpl_vars['attr']->_loop = true;
$__foreach_attr_1_saved_local_item = $_smarty_tpl->tpl_vars['attr'];
?>
              <?php echo $_smarty_tpl->tpl_vars['attr']->value['key'];?>
：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['attr']->value['val'];?>
</span>
              <?php
$_smarty_tpl->tpl_vars['attr'] = $__foreach_attr_1_saved_local_item;
}
if ($__foreach_attr_1_saved_item) {
$_smarty_tpl->tpl_vars['attr'] = $__foreach_attr_1_saved_item;
}
?>
              <?php }?> -->
              颜色：<span class="c-red mr-5"><?php if (!empty($_smarty_tpl->tpl_vars['goods']->value['sku']['color_remark'])) {
echo $_smarty_tpl->tpl_vars['goods']->value['sku']['color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['goods']->value['sku']['color'];
}?></span>
              重量：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['weight'];?>
KG</span>
              发布季：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['year_to_market'];
echo $_smarty_tpl->tpl_vars['goods']->value['sku']['season_to_market'];?>
</span>
             款号：<span class="c-red mr-5"><?php echo $_smarty_tpl->tpl_vars['goods']->value['sku']['goods_spu'];?>
</span>       
            </div>
          </div>
        </div>
        <div class="goods_table mt-10">
          <table class=" table table-border table-bordered table-bg" style="width:auto;">
            <tr class="text-c"  bgcolor="F6F6F6">
              
              <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['sku_size'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_size_2_saved_item = isset($_smarty_tpl->tpl_vars['size']) ? $_smarty_tpl->tpl_vars['size'] : false;
$__foreach_size_2_saved_key = isset($_smarty_tpl->tpl_vars['k_size']) ? $_smarty_tpl->tpl_vars['k_size'] : false;
$_smarty_tpl->tpl_vars['size'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k_size'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['size']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k_size']->value => $_smarty_tpl->tpl_vars['size']->value) {
$_smarty_tpl->tpl_vars['size']->_loop = true;
$__foreach_size_2_saved_local_item = $_smarty_tpl->tpl_vars['size'];
?>
              <th class="size_stock" width="100px">
                  <div class=" china_size" data-size="<?php echo $_smarty_tpl->tpl_vars['k_size']->value;?>
">
                      <?php if (!empty($_smarty_tpl->tpl_vars['size']->value)) {
echo $_smarty_tpl->tpl_vars['size']->value;
} else {
echo $_smarty_tpl->tpl_vars['k_size']->value;
}?>
                  </div>
              </th>
              <?php
$_smarty_tpl->tpl_vars['size'] = $__foreach_size_2_saved_local_item;
}
if ($__foreach_size_2_saved_item) {
$_smarty_tpl->tpl_vars['size'] = $__foreach_size_2_saved_item;
}
if ($__foreach_size_2_saved_key) {
$_smarty_tpl->tpl_vars['k_size'] = $__foreach_size_2_saved_key;
}
?>
              <th width="100px">合计</th>
              <th width="100px">销售价</th>
              <th width="100px">折扣</th>
              
              <th width="200px;">退货比例+超出扣款</th>
              
            </tr>  
            <?php if (isset($_smarty_tpl->tpl_vars['goods']->value['sku_info'])) {?>       
           <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['sku_info'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_stock_3_saved_item = isset($_smarty_tpl->tpl_vars['stock']) ? $_smarty_tpl->tpl_vars['stock'] : false;
$_smarty_tpl->tpl_vars['stock'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['stock']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['stock']->value) {
$_smarty_tpl->tpl_vars['stock']->_loop = true;
$__foreach_stock_3_saved_local_item = $_smarty_tpl->tpl_vars['stock'];
?>
            <tr class="text-c va-t">
              
              <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['sku_size'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_size_4_saved_item = isset($_smarty_tpl->tpl_vars['size']) ? $_smarty_tpl->tpl_vars['size'] : false;
$__foreach_size_4_saved_key = isset($_smarty_tpl->tpl_vars['k_size']) ? $_smarty_tpl->tpl_vars['k_size'] : false;
$_smarty_tpl->tpl_vars['size'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k_size'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['size']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k_size']->value => $_smarty_tpl->tpl_vars['size']->value) {
$_smarty_tpl->tpl_vars['size']->_loop = true;
$__foreach_size_4_saved_local_item = $_smarty_tpl->tpl_vars['size'];
?>
              <?php
$_from = $_smarty_tpl->tpl_vars['stock']->value['stock_size'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_stock_size_5_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_stock_size']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_stock_size'] : false;
$__foreach_stock_size_5_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_stock_size_5_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_stock_size'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_stock_size']->value['iteration']++;
$__foreach_stock_size_5_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
              <?php if ($_smarty_tpl->tpl_vars['k_size']->value == $_smarty_tpl->tpl_vars['value']->value['size']) {?>
              <td class="" >
                <div class=" size_num " style=""><a href="javascript:;" data-ea-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['goods_ea_id'];?>
" data-sa-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['ssa_id'];?>
" class="size_"><?php echo $_smarty_tpl->tpl_vars['value']->value['amount'];?>
</a></div>
                <input type="text" class="w_20 text-c hide "style="">
              </td>
              <?php break 1;?>
             <?php } elseif ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_stock_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_stock_size']->value['iteration'] : null) == count($_smarty_tpl->tpl_vars['stock']->value['stock_size'])) {?>
              <td class="" >
                <div class=" size_num " style=""><a href="javascript:;" class="size_">0</a></div>
                <input type="text" class="w_20 text-c hide "style="">
              </td>
              <?php break 1;?>
              <?php }?>
              <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_stock_size_5_saved_local_item;
}
if ($__foreach_stock_size_5_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_stock_size'] = $__foreach_stock_size_5_saved;
}
if ($__foreach_stock_size_5_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_stock_size_5_saved_item;
}
if ($__foreach_stock_size_5_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_stock_size_5_saved_key;
}
?>
              <?php
$_smarty_tpl->tpl_vars['size'] = $__foreach_size_4_saved_local_item;
}
if ($__foreach_size_4_saved_item) {
$_smarty_tpl->tpl_vars['size'] = $__foreach_size_4_saved_item;
}
if ($__foreach_size_4_saved_key) {
$_smarty_tpl->tpl_vars['k_size'] = $__foreach_size_4_saved_key;
}
?>
              <td class="pos-r showall">
                <div class="c-red size_num pos-r ">
                  <span  class="c-red"><?php echo $_smarty_tpl->tpl_vars['stock']->value['size_total'];?>
</span>
                  <div class=" w-100 right hide pos-a bottom batch_order" style="right: -80px;top: -1px;">
                    <a href="javascript:;" class=" c_blue pr-10 pl-10 btn btn-secondary radius size-MINI" style="color:#fff;display: block;">使用批量下单</a>
                  </div>
                </div>
              </td>
              <td><?php echo $_smarty_tpl->tpl_vars['stock']->value['stocks_price'];?>
</td>
              <td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['stock']->value['stocks_price']/$_smarty_tpl->tpl_vars['goods']->value['sku']['stocks_marketprice']);?>
</td>
              
              <td>100%+10%</td>
              
              
            </tr>
            <?php
$_smarty_tpl->tpl_vars['stock'] = $__foreach_stock_3_saved_local_item;
}
if ($__foreach_stock_3_saved_item) {
$_smarty_tpl->tpl_vars['stock'] = $__foreach_stock_3_saved_item;
}
?>
             
          </table>
        </div>
        <div class="goods_total"></div>
      </li>
      <?php }?>

      <?php
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_local_item;
}
if ($__foreach_goods_0_saved_item) {
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_item;
}
?>
      <?php } else { ?>
       <li class="goods_list mb-40 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li>
      <?php }?>
    </ul>
  </div>
    <div class="pDiv">
      <div class="pDiv2">
         <div class="pGroup-left">每页最多显示
             <select class="select prp pButton" name="rp">
                 <option value="5"  <?php if ($_smarty_tpl->tpl_vars['page_info']->value['rp'] == 5) {?>selected="selected" <?php }?>>5&nbsp;&nbsp;</option>
                 <option value="10" <?php if ($_smarty_tpl->tpl_vars['page_info']->value['rp'] == 10) {?>selected="selected" <?php }?>>10&nbsp;&nbsp;</option>
                 <option value="15" <?php if ($_smarty_tpl->tpl_vars['page_info']->value['rp'] == 15) {?>selected="selected" <?php }?>>15&nbsp;&nbsp;</option>
                 <option value="20" <?php if ($_smarty_tpl->tpl_vars['page_info']->value['rp'] == 20) {?>selected="selected" <?php }?>>20&nbsp;&nbsp;</option>
                 <option value="40" <?php if ($_smarty_tpl->tpl_vars['page_info']->value['rp'] == 40) {?>selected="selected" <?php }?>>40&nbsp;&nbsp;</option>
             </select>条
         </div> 
         <div class="pGroup-middle"> 
             <div class="pFirst pButton" title="最前页">
               <i class="fa fa-fast-backward"></i> 
             </div>
             <div class="pPrev pButton" title="前一页">
               <i class="fa fa-backward"></i>
             </div> <span class="pcontrol"> 
             <input type="text" size="4" class="pcur pButton" value="<?php echo $_smarty_tpl->tpl_vars['page_info']->value['page'];?>
" title="输入要跳转的页码并回车"> / <span class="ptotal"><?php echo $_smarty_tpl->tpl_vars['page_info']->value['page_count'];?>
</span>页</span> 
             <div class="pNext pButton" title="下一页"><i class="fa fa-forward"></i></div>
             <div class="pLast pButton" title="最后页"><i class="fa fa-fast-forward"></i></div>
        </div>
        <div class="pPageStat"></div>
        <div class="pGroup-right">
           <span class="pPageStat1">共<span class="total"><?php echo $_smarty_tpl->tpl_vars['page_info']->value['total_num'];?>
</span>条记录，
                             当前页：<span class="pfrom"><?php echo $_smarty_tpl->tpl_vars['page_info']->value['start'];?>
</span>-<span class="pto"><?php if (empty($_smarty_tpl->tpl_vars['goods_info']->value) !== TRUE) {
echo $_smarty_tpl->tpl_vars['page_info']->value['to'];
} else { ?>0<?php }?></span>条</span>
       </div>
      </div>
      <div style="clear:both"></div> 
    </div>
    <?php }?>
   <?php echo '<script'; ?>
>
   		batch_order();
   <?php echo '</script'; ?>
>
  <?php }
}
