<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:42:06
  from "D:\www\yunjuke\application\admin\views\goods_add_goods_third.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a51acef0fa58_28601288',
  'file_dependency' => 
  array (
    'ac51d0107cc2f2232ff51ba3063cf13072cd1898' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_add_goods_third.html',
      1 => 1501728598,
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
function content_59a51acef0fa58_28601288 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/style.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/ajaxfileupload.js"></script>

<body style="background-color: #FFF; overflow: auto;">
<div class="page wrapper_search">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品库管理</h3>
        <h5>管理数据的新增、编辑、删除</h5>
      </div>
    </div>
  </div>
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>请使用jpg\jpeg\png等格式、单张大小不超过4M的正方形图片。</li>
            <li>上传图片最大尺寸将被保留为1280像素。</li>
            <li>每种颜色最多可上传5张图片或从图片空间中选择已有的图片，上传后的图片也将被保存在店铺图片空间中以便其它使用。</li>
            <li>通过更改排序数字修改商品图片的排列显示顺序。</li>
            <li>图片质量要清晰，不能虚化，要保证亮度充足。</li>
            <li>操作完成后请点下一步，否则无法在网站生效。</li>
        </ul>
    </div>
    <form action="goods_add_goods_fourth" class="mt-20" id="goods_image" method="post">
    	<input name="goods_id" type="hidden" value="20438">
        <div class="ncsc-form-goods-pic">
            <div class="container">
              <!--循环商品的颜色-->
             <!--没有相册数组或者循环次数大于图片数组的大小-->
             <div class="ncsc-goodspic-list">
                                        <div class="title">
                        <h3>颜色：灰色</h3>
                    </div>
                                        <ul class="goods-pic-list" nctype="ul_40705">
                        <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[0][0][color_id]" value="40705">
                            <input type="hidden" name="img[0][0][goods_id]" value="20438">
                            <div class="upload-thumb"><img src="http://[::1]/yunjuke/data/shop/album_pic/1_201708291541515.jpg" nctype="file_00">
                                <input type="hidden" name="img[0][0][goods_image]" value="1_201708291541515.jpg" nctype="file_00">
                            </div>
                            <div class="show-default selected" nctype="file_00">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[0][0][is_default]" value="1">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[0][0][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_00" id="file_00">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                                                  <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[0][1][color_id]" value="40705">
                            <input type="hidden" name="img[0][1][goods_id]" value="20438">
                            <div class="upload-thumb"><img src="http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif" nctype="file_01">
                                <input type="hidden" name="img[0][1][goods_image]" value="" nctype="file_01">
                            </div>
                            <div class="show-default" nctype="file_01">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[0][1][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[0][1][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_01" id="file_01">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                                                 <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[0][2][color_id]" value="40705">
                            <input type="hidden" name="img[0][2][goods_id]" value="20438">
                            <div class="upload-thumb"><img src="http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif" nctype="file_02">
                                <input type="hidden" name="img[0][2][goods_image]" value="" nctype="file_02">
                            </div>
                            <div class="show-default" nctype="file_02">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[0][2][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[0][2][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_02" id="file_02">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                                                 <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[0][3][color_id]" value="40705">
                            <input type="hidden" name="img[0][3][goods_id]" value="20438">
                            <div class="upload-thumb"><img src="http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif" nctype="file_03">
                                <input type="hidden" name="img[0][3][goods_image]" value="" nctype="file_03">
                            </div>
                            <div class="show-default" nctype="file_03">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[0][3][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[0][3][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_03" id="file_03">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                                                 <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[0][4][color_id]" value="40705">
                            <input type="hidden" name="img[0][4][goods_id]" value="20438">
                            <div class="upload-thumb"><img src="http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif" nctype="file_04">
                                <input type="hidden" name="img[0][4][goods_image]" value="" nctype="file_04">
                            </div>
                            <div class="show-default" nctype="file_04">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[0][4][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[0][4][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_04" id="file_04">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                                            </ul>
                    <div class="ncsc-select-album">
                        <a class="ncbtn selected" href="javascript:;" nctype="select-0" data-name="jumpMenu_default"><i class="fa fa-photo"></i>从图片空间选择</a>
                        <a href="javascript:void(0);" nctype="close_album" class="ncbtn ml5" style="display: none" ><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                    </div>
                    <div nctype="album-0 " class="hide demo">
                        <div class="goods-gallery" nctype="gallery-0"><!--<a class="sample_demo" href="">提交</a>-->
                            <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                            <span class="r">
                                <select name="jumpMenu_default" style="width:100px;" data-function="insert_img" data-id="40705" onchange="get_pic(this,1)">
                                     <option value="" style="width:80px;">请选择...</option>
                                                                                                               <option value="1" style="width:80px;">默认相册</option>
                                                                                                          </select>
                            </span>
                            </div>
                            <ul class="list pic_list">
                            </ul>
                            <div class="pagination">
                            </div>
                        </div>
                    </div>
                </div>
                                    </div>
        </div>
        <div class="bottom tc hr32"><label class="submit-border"><input type="submit" class="submit" value="下一步，确认商品发布"></label></div>
    </form>

</div>
<script type="text/javascript">
    $(function(){
        // 商品图片ajax上传
        $('.ncsc-upload-btn').find('input[type="file"]').unbind().bind('change', function(){
            var id = $(this).attr('id');
            ajaxFileUpload(id);
        });
       /* //凸显鼠标触及区域、其余区域半透明显示
        $(".container > div").jfade({
            start_opacity:"1",
            high_opacity:"1",
            low_opacity:".5",
            timing:"200"
        });*/
       /* //浮动导航  waypoints.js
        $("#uploadHelp").waypoint(function(event, direction) {
            $(this).parent().toggleClass('sticky', direction === "down");
            event.stopPropagation();
        });*/
        // 关闭相册
        /*$('a[nctype="close_album"]').click(function(){
            $(this).hide();
            $(this).prev().show();
            $(this).parent().next().html('');
        });*/
        // 绑定点击事件
        $('div[nctype^="file"]').each(function(){
            if ($(this).prev().find('input[type="hidden"]').val() != '') {
                selectDefaultImage($(this));
            }
        });
    });
		
		
    // 图片上传ajax
    function ajaxFileUpload(id, o) {
        //$('img[nctype="' + id + '"]').attr('src', SHOP_TEMPLATES_URL + "/images/loading.gif");

        $.ajaxFileUpload({
            url : 'goods_pic_upload?op=ajax_upload',
            secureuri : false,
            fileElementId : id,
            dataType : 'json',
            data : {name : id},
            success : function (data, status) {
            	console.log(data);
                if (typeof(data.error) != 'undefined') {
                    layer.msg(data.error);
                    $('img[nctype="' + id + '"]').attr('src','http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif');
                } else {
                    $('input[nctype="' + id + '"]').val(data.data);
                    $('img[nctype="' + id + '"]').attr('src', data.pic_info.pic_url);
                    selectDefaultImage($('div[nctype="' + id + '"]'));      // 选择默认主图
                    checkDefaultImage($('div[nctype="' + id + '"]'));
                }
                //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
            },
            error : function (data, status, e) {
            	layer.msg(e);
                //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
            }
        });
        return false;

    }
    //从图片空间选择
    $(".ncsc-select-album .selected").click(function(){
        $(this).hide();
        $(this).next('a[nctype="close_album"]').show();
        var name = $(this).data("name");
        var obj = $(this).parents("div").find('select[name="'+name+'"]');
        get_pic(obj,1);
        $(this).parents(".ncsc-select-album").next().show();
    })
    //关闭相册
    $('a[nctype="close_album"]').click(function(){
        $(this).hide();
        $(this).prev('a[nctype="select-0"]').show();
        $(this).parents(".ncsc-select-album").next().hide();
    })
    //点击 设置默认图片
    selectDefaultImage($(".show-default"))
    // 选择默认主图&&删除
    function selectDefaultImage($this) {
        // 默认主题
        $this.click(function(){
            $(this).parents('ul:first').find('.show-default').removeClass('selected').find('input').val('0');
            $(this).addClass('selected').find('input').val('1');
            
            $(".show-default:not('.selected')").mouseenter(function(){
							if(!$(this).prev().find('input').val()==''){
								$(this).css('border-color','#27A9E3');
								$(this).find('p').css({'display':'block','color':'#27A9E3'});
								$(this).find('.del').css({'display':'block','color':'#27A9E3'});
							}
						})
						
						$(".show-default:not('.selected')").mouseleave(function(){
							if(!$(this).prev().find('input').val()==''){
								$(this).css('border-color','#fff');
								$(this).find('p').css({'display':'none','color':'#27A9E3'});
								$(this).find('.del').css({'display':'none','color':'#27A9E3'});
							}
						})

        });
        // 删除
        $this.parents('li:first').find('a[nctype="del"]').click(function(){
        		$(this).parent().css('border-color','#fff');
						$(this).prev().css({'display':'none','color':'#27A9E3'});
						$(this).css({'display':'none','color':'#27A9E3'});
            $this.unbind('click').removeClass('selected').find('input').val('0');
            $this.prev().find('input').val('').end().find('img').attr('src', 'http://[::1]/yunjuke/application/admin/views/img/default_goods_image_240.gif');
            checkDefaultImage($this);
        });
    }

    // 验证是否存在默认主题，没有选择第一个图片
    function checkDefaultImage($this) {
        if ($this.parents('ul:first').find('.show-default').find('input[value="1"]').length == 0) {
            $_thumb = $this.parents('ul:first').find('.upload-thumb').each(function(){
                if ($(this).find('input').val() != '') {
                    $(this).next().parents('ul:first').find('.show-default').removeClass('selected').find('input').val('0');
                    $(this).next().addClass('selected').find('input').val('1');
                    return false;
                }
            });
        }
    }
    // 从图片空间插入主图
    function insert_img(obj) {
    	var name = $(obj).data('name');
    	var src = $(obj).data('src');
    	var a_id = $(obj).data('id');
    	
        $_thumb = $('ul[nctype="ul_'+ a_id +'"]').find('.upload-thumb').each(function(){
            if ($(this).find('input').val() == '') {
                $(this).find('img').attr('src', src);
                $(this).find('input').val(name);
                selectDefaultImage($(this).next());      // 选择默认主图
                checkDefaultImage($(this).next());
                return false;
            }
        });
    }
    function get_pic(this_obj,curr){
    	var aid = $(this_obj).data('id');
    	var aclass_id = $(this_obj).val();
    	  $.getJSON('goods_pic_room_view?op=page', {aclass_id:aclass_id,rp:24,
    		  curpage:curr //向服务端传的参数，此处只是演示
    	  }, function(data){
    		  var content = '';
    		  var onclick_function = $(this_obj).data('function');
    		 if(data.pic_info){
    			 $.each(data.pic_info,function(k,v){
    				 content += '<li data-name="'+v.apic_cover+'" data-src="'+v.pic_url+'" data-id="'+aid+'" onclick="'+onclick_function+'(this)">'+
    				 '<a href="JavaScript:void(0);"><img src='+v.pic_url+' ></a></li>';
    			 })
    		 }
    		  $(this_obj).parents('.demo').find('.pic_list').html(content);
    	    //显示分页
    	    laypage({
    	      cont: $(this_obj).parents('.demo').find(".pagination"),
    	      skin: '#41BEDD',
    	      pages: data.page_info.page_count, //通过后台拿到的总页数
    	      curr: data.page_info.curr, //当前页
    	      jump: function(obj, first){ //触发分页后的回调
    	        if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
    	        	get_pic(this_obj,obj.curr);
    	        }
    	      }
    	    });
    	});
    }
    
    $(".show-default:not('.selected')").mouseenter(function(){
			if(!$(this).prev().find('input').val()==''){
				$(this).css('border-color','#27A9E3');
				$(this).find('p').css({'display':'block','color':'#27A9E3'});
				$(this).find('.del').css({'display':'block','color':'#27A9E3'});
			}
		})
		
		$(".show-default:not('.selected')").mouseleave(function(){
			if(!$(this).prev().find('input').val()==''){
				$(this).css('border-color','#fff');
				$(this).find('p').css({'display':'none','color':'#27A9E3'});
				$(this).find('.del').css({'display':'none','color':'#27A9E3'});
			}
		})
</script>

<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
