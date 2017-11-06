<?php
/* Smarty version 3.1.29, created on 2017-08-01 10:46:11
  from "D:\www\yunjuke\application\admin\views\goods_pic_room.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597feb7359edf6_03870671',
  'file_dependency' => 
  array (
    '6b3970256e3be42f633841bede86e332c1b749d2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_pic_room.html',
      1 => 1501555564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597feb7359edf6_03870671 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18559597feb7346a424_27084801';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style type="text/css">
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>图片空间</h3>
        <h5>商品图片及商家店铺相册管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>相册删除后，相册内全部图片都会删除，不能恢复，请谨慎操作</li>
    </ul>
  </div>
  <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

  $(function(){
    $("#flexigrid").flexigrid({
      url: 'goods_pic_room?op=getList',
      colModel : [
        {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
        {display: '相册名称', name : 'aclass_name', width : 120, sortable : true, align: 'left'},
        {display: '封面图片', name : 'aclass_cover', width : 150, sortable : false, align: 'center'},
        {display: '图片数量', name : 'pic_count', width : 150, sortable : false, align: 'center'},
        {display: '相册描述', name : 'aclass_des', width : 300, sortable : false, align: 'center'}
      ],
      buttons : [
        /* {display: '<i class="fa fa-file-image-o"></i>全部图片', name : 'add', bclass : 'add', title : '全部图片', onpress : fg_operation }, */
        {display: '<i class="fa fa-plus"></i>新建相册', name : 'add', bclass : 'add', title : '新建相册', onpress : fg_add},
        {display: '<i class="fa fa-file-image-o"></i>上传图片', name : 'upload', bclass : 'add', title : '上传图片',  onpress : fg_upload},
      ],
      searchitems : [
        {display: '相册ID', name : 'aclass_id'},
        {display: '相册名称', name : 'aclass_name'}
      ],
      sortname: "aclass_id",
      sortorder: "asc",
      title: '相册列表'
    });

  });
  /*创建相册*/
function fg_add(){
    layer.open({
      type: 1,
      btn:['提交'],
      skin: 'layui-layer-rim', //加上边框
      area: ['400px', '30%'], //宽高
      content: '<div class="pd-20"><form action="" id="creat_form"><table class="table">' +
      '<tr><td class="text-r w80"><em class="c-red mr-5 va-m">*</em>相册名称：</td><td><input type="text" name="param[aclass_name]" class=" w180"><div class="err"></div></td></tr>' +
      '<tr><td  class="text-r va-t w80">描述：</td><td><textarea name="param[aclass_des]" id="" class="pd-5 h-50 w180" cols="" rows=""></textarea></td></tr>' +
      '<tr><td  class="text-r w80">排序：</td><td><input type="number" min="0"  max="255" value="255" name="param[aclass_sort]" class="w-50 input-text w50 radius"></td></tr></table></form></div>',
      yes:function(){
        /*表单验证*/
        $('#creat_form').validate({
          errorPlacement: function (error, element) {
            var error_td = element.next('div.err');
            error_td.append(error);
          },
          rules: {
            name: {
              required: true
            }
          },
          messages: {
            name: {
              required: '<i class="fa fa-exclamation-circle"></i>请输相册名称'
	
		      }
          }
		});
        if($("#creat_form").valid()){
            var data = $("#creat_form").serialize();
              $.ajax({
      	        type: "post",
      	        dataType: "json",
      	        url:'goods_pic_room_edit?op=add',
      	        data: data,
      	        success: function(data){
      	        	layer.msg(data.msg);
					if(data.state=='403'){
				login_ajax('shopadmin');
			}else
      	            if(data.state==true){
      	            //询问框
      	            	layer.confirm('继续添加？', {
       	            	    btn: ['确定','去相册列表'] //按钮
       	            	}, function(){
       	            		layer.closeAll(); 
       	            		fg_add();
       	            	}, function(){
       	            		window.location.href="goods_pic_room";
       	            	});
      	        	}
      	        }
      	    });
        }
      }
  })
}
  function fg_operation(name, bDiv) {
      window.location.href = 'goods_pic_room_view';
  }
  //上传图片
  function fg_upload() {
	  layer.open({
  		  type:2,
  		  title: '<b>批量上传图片</b>',
  		  skin: 'layui-layer-rim', //加上边框
  		  area: ['80%', '90%'], //宽高
  		  content:"goods_pic_room_box"
      })
	        	/*layer.open({
	    	        type: 1,
	    	        title:'上传图片',
	    	        btn:['确定',"取消"],
	    	        skin: 'layui-layer-rim', //加上边框
	    	        area: ['500px', '40%'], //宽高
	    	        content: '<div class="pd-10"><form action="" id="up_form"><table class="table">' +
	    	        '<tr><td class="text-r w80"><em class="c-red mr-5 va-m">*</em>选择相册：</td><td><select name="param[aclass_id]" class="w200 input-text" id="">'+option_html+'</select><span class="err"></span></td></tr>' +
	    	        '<tr><td  class="text-r va-t w80">图片标签：</td><td><textarea name="param[apic_tag]" id="" class="pd-5 h-50 w180" cols="" rows=""></textarea></td></tr>' +
	    	        '<tr><td  class="text-r w80">上传图片：</td><td><div class="input-file-show"><span class="show"><a class="nyroModal" rel="gal" href="">' +
	    	        '<i class="fa fa-picture-o"  id="" data-geo=\'<img src="<?php echo TEMPLE;?>
images/default_user_portrait.gif" width=100px height=50px>\'></i>' +
	    	        '</a></span><span class="type-file-box"><input name="image" type="file" class="type-file-file" id="live_pic1" size="30" hidefocus="true"> ' +
	    	        '<input type="text" name="textfield1" id="textfield1" class="type-file-text">' +
	    	        ' <input type="button" name="button1" id="button1" value="选择上传..." class="type-file-button"></span><span class="err"></span></div></td></tr></table></form></div>',
	    	        success:function(){
	    	          $("#live_pic1").change(function(){$("#textfield1").val($("#live_pic1").val());});
	    	        },
	    	        yes:function(){
	    	          /!*表单验证*!/
	    	           jQuery.validator.addMethod("checkPic", function(value, element) {
	    				    var filepath=$("input[name='image']").val();
	    				    //获得上传文件名
	    				    var fileArr=filepath.split("\\");
	    				    var fileTArr=fileArr[fileArr.length-1].toLowerCase().split(".");
	    				    var filetype=fileTArr[fileTArr.length-1];
	    				    //切割出后缀文件名
	    				    console.log();
	    				    if(filetype == "jpg" || filetype == "jpeg" || filetype == "png" || filetype == "bmp" || filetype == "gif"){
	    				        return true;
	    				    }else{
	    				        return false;
	    				    }
	    			  }, "请上传gif、jpeg、png、bmp、jpg格式的图片");
	    	          $('#up_form').validate({
	    	            errorPlacement: function (error, element) {
	    	              var error_td = element.nextAll('span.err');
	    	              error_td.append(error);
	    	            },
	    	            rules: {
	    	              'param[aclass_id]': {
	    	                required: true
	    	              },
	    	              image:{
	    	            	  required: true,
	    	            	  checkPic:true
	    	              }
	    	            },
	    	            messages: {
	    	              'param[aclass_id]': {
	    	                required: '<i class="fa fa-exclamation-circle"></i>请输相册名称'
	    	              },
	    	              image: {
	    	            	    required: '<i class="fa fa-exclamation-circle"></i>请上传图片',
	    		                checkPic: '<i class="fa fa-exclamation-circle"></i>请上传gif、jpeg、png、bmp、jpg格式的图片'
	    		              },
	    	            }
	    	          })
	    	          
	    	          if( $('#up_form').valid()){
	    	        	  var formData = new FormData($("#up_form")[0]); 
	                      $.ajax({
	              	        type: "post",
	              	        dataType: "json",
	              	        url:'goods_pic_upload',
	              	        cache: false,
	                      	processData: false,
	                        contentType: false,
	              	        data: formData,
	              	        success: function(data){
	              	        	layer.msg(data.msg);
	              	            if(data.state==true){
	              	            	window.location.href="goods_pic_room";	               	            	
	              	        	}
	              	        }
	              	    });
	    	          }
	    	        }
	    	      });
	        }
	    });*/
  }
  //查看
  function fg_view(aclass_id) {
	  window.location.href = 'goods_pic_room_view?aclass_id='+aclass_id;
  }
  //编辑
  function fg_edit(data) {
	  var content = '<div class="pd-20"><form action="" id="creat_form"><table class="table">' +
	  '<input type="hidden" name="aclass_id" value="'+data.aclass_id+'">'+
      '<tr><td class="text-r w80"><em class="c-red mr-5 va-m">*</em>相册名称：</td><td><input type="text" value="'+data.aclass_name+'" name="param[aclass_name]" class=" w180"><div class="err"></div></td></tr>'+
      '<tr><td  class="text-r va-t w80">描述：</td><td><textarea name="param[aclass_des]" id="" class="pd-5 h-50 w180" cols="" rows="">'+data.aclass_des+'</textarea></td></tr>' +
      '<tr><td  class="text-r w80">排序：</td><td><input type="number" value="'+data.aclass_sort+'" min="0"  max="255" name="param[aclass_sort]" class="w-50 input-text w50 radius"></td></tr>'+
      '</table></form></div>';
	  layer.open({
	      type: 1,
	      btn:['提交'],
	      skin: 'layui-layer-rim', //加上边框
	      area: ['400px', '30%'], //宽高
	      content: content,
	      yes:function(){
	        /*表单验证*/
	        $('#creat_form').validate({
	          errorPlacement: function (error, element) {
	            var error_td = element.next('div.err');
	            error_td.append(error);
	          },
	          rules: {
	            name: {
	              required: true
	            }
	          },
	          messages: {
	            name: {
	              required: '<i class="fa fa-exclamation-circle"></i>请输相册名称'
		
			      }
	          }
			});
	        if($("#creat_form").valid()){
				 var data = $("#creat_form").serialize();
	              $.ajax({
	      	        type: "post",
	      	        dataType: "json",
	      	        url:'goods_pic_room_edit?op=edit',
	      	        data: data,
	      	        success: function(data){
	      	        	layer.msg(data.msg);
						if(data.state=='403'){
				login_ajax('shopadmin');
			}else
	      	            if(data.state==true){
	      	            	window.location.href="goods_pic_room";
	      	        	}
	      	        }
	      	    });
	        }
	      }
	  })
  }
  //删除
  function fg_delete(id) {
  	if (typeof id == 'number') {
      	var id = new Array(id.toString());
  	};
  	layer.confirm('确认要删除这 ' + id.length + ' 项吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
		    ids = id.join(',');
		    $.ajax({
	            type: "GET",
	            dataType: "json",
	            url: "goods_pic_room_edit?op=delete&aclass_id="+ids,
	            data: '',
	            success: function(data){
				if(data.state=='403'){
				login_ajax('shopadmin');
			}else
		        	if(data.state==false){
		        		layer.msg(data.msg);
		        	}else if(data.state==true){
			        	layer.msg(data.msg);
		        	}
		        	window.location.href="goods_pic_room";
		        }
	        });
		});	    
  }

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
