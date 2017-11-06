require.config({
  paths: {
  	'jquery':'jquery',
    'common':'common',
		'jquery-ui.min':'jquery-ui.min',
    'jquery.validate':'jquery.validate',
    'jquery.validation.min':'jquery.validation.min',
    "layer":"layer",
    "laydate":"laydate",
    'pageLoad':'pageLoad',
    'jQuery.md5':'jQuery.md5',
    'jQuery.md5.add':'jQuery.md5.add',
    'select2':'select2',
    'jquery.sumoselect.min':'jquery.sumoselect.min',
    'flexigrid':'flexigrid',
    'admin':'admin',
    'handsontable':'handsontable',
    'perfect-scrollbar.min':'perfect-scrollbar.min',
    'region':'region',
    'zeroClipboard':'../plugins/ZeroClipboard/ZeroClipboard.min',
    'ueditor_config':"../plugins/UEditor/ueditor.config",
    'ueditor_all':"../plugins/UEditor/ueditor.all",
    'zh_cn':'../plugins/UEditor/lang/zh-cn/zh-cn',
    'zeroclip':'../plugins/UEditor/third-party/zeroclipboard/ZeroClipboard'
  },
  shim:{
  	'ueditor_all':{deps:['ueditor_config']},
  	'zh_cn':{deps:['ueditor_all']},
  	'perfect-scrollbar.min':['jquery'],
    'common':['jquery'],
    "layer":['jquery'],
    'pageLoad':['jquery'],
    'jquery.validate':['jquery'],
    'jQuery.md5.add':['jquery'],
    'jQuery.md5':['jquery'],
    'jquery.sumoselect.min':['jquery'],
    'jquery-ui.min':['jquery'],
    'region':['jquery'],
    'admin':['jquery','jquery-ui.min','perfect-scrollbar.min']
  }
});

	require(['layer'],function(){
		/*ajax过期登录*/
		function login_ajax(demo,data){
			layer.msg(data.msg);
			 setTimeout(function(){
				    if(demo=='agent'){
				    	window.location.href="<{base_url()}>";
				    }else if(demo=='supp'){
				    	window.location.href="<{base_url()}>";
				    }else if(demo=='admin'){
				    	window.location.href="<{base_url('admin.php/login')}>";
				    }else if(demo=='shop'){
				    	window.location.href="<{base_url('shop.php/index/login')}>";
				    }else if(demo=='shopadmin'){
				    	window.location.href="<{base_url('shopadmin.php/login')}>";
				    }
			    },2000);
		}
	})

