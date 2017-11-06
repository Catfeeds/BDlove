<?php
/* Smarty version 3.1.29, created on 2017-07-06 10:57:40
  from "D:\www\yunjuke\application\vmall\views\evaluate_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595da724f045b9_39709135',
  'file_dependency' => 
  array (
    '317540beb6eb26462ed61a3cab82f2c7af840ed7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\evaluate_list.html',
      1 => 1499309745,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_595da724f045b9_39709135 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>评价列表</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/weui1.css">
<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/example.css">
<script src="http://[::1]/yunjuke/application/vmall/views/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/example.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/weui.min.js"></script>


</head>
<style>
	.clear{
		clear: both;
	}
    .evalstar{
		width: 190px;
	}
	.evalstar li{
		float:left;
		margin-left: 5px;
	}
	.evalstar img{
		width: 15px;
	}
	.small{
		color: #999;
		font-size: 12px;
		margin-left: 5px;
	}
	.small-time{
		color: #999;
		font-size: 12px;
		margin-left: 5px;
		margin-top: -5px;
		float: right;
	}
	.content{
		padding:5px
		font-size: 16px;
	}
	.eval-img-group{
		margin:10px 5px;
		
	}
	.eval-img{
		width: 100px;
		margin-right: 10px;
		float: left;
	}
	.img-r{
		max-width: 100%;
		height: auto;
	}
	.info {
   margin: 10px;
   position  :relative;
   padding: 10px;
   margin-left: 15px;
   margin-right: 15px;
   background :#eee;
   border-radius :4px;
   text-align :center;
   font-size: 14px;
  }
  .nav {
   position   :absolute;
   top    :-8px;
   left    :30px;
   overflow   :hidden;
   width    :13px;
   height   :13px;
   background  :#eee;
  -webkit-transform :rotate(45deg);
  -moz-transform :rotate(45deg);
  -o-transform  :rotate(45deg);
   transform   :rotate(45deg);
  }
  .evaltar-name{
  	float: left;margin:3px 10px 0 5px;
  	font-size: 15px;
  }
  .head-logo{
  	width:35px;margin-right:5px;display:block;margin-top: 8px;
  }
  .pull-left{
  	float: left;
  }
  .pull-right{
  	float: right;
  }
  .eval-total{
  	display: flex;
  	justify-content:space-around;
  	padding: 5px;
  }
  .eval-total a{
  	color: #333;
  }
  .eval-total a p{
  	text-align: center;
  	font-size: 15px;
  }
  .eval-total a p:last-child{
  	font-size: 14px;
  }
  .eval-total .active{
  	color: red;
  }
</style>
<body ontouchstart>
	
	<div class="weui-gallery" id="gallery">
            <span class="weui-gallery__img" id="galleryImg"></span>
            <div class="weui-gallery__opr">
                <a href="javascript:" class="weui-gallery__del">
                    <i class="weui-icon-delete weui-icon_gallery-delete"></i>
                </a>
            </div>
        </div>

	<div class="weui-cells" style="margin-top: 0px;">
		
		<ul class="eval-total">
			<li>
				<a href="javascript:;" class="active">
					<p>全部评价</p>
					<p>1400</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>好评</p>
					<p>1390</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>中评</p>
					<p>26</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>差评</p>
					<p>283</p>
				</a>
			</li>
			<li>
				<a href="javascript:;">
					<p>有图</p>
					<p>2580</p>
				</a>
			</li>
		</ul>
		
	 		<div class="weui-cell">
			<div class="weui-cell__hd" style="align-self:flex-start"><img src="http://wx.qlogo.cn/mmopen/Q3auHgzwzM7Q6Bj9apMB2z9UgW53FxKS4jX6sGQLad5v8TQr7JbA3NYOD0Mr6D0Pvy1tyQiaxzk1xMbLnjmbZbw/0" alt="" class="head-logo"></div>
                <div class="weui-cell__bd">
                    <p><p class="evaltar-name">积小流</p><br>
                    	<ul class="evalstar">
                    								<li><img src="http://[::1]/yunjuke/application/vmall/views/images/evalstar2.png" alt="1"></li>
						
					</ul>
                   	</p>
                   	<p class="small-time">2017.07.05</p>
                   	<div class="clear"></div>
			        <p class="content">你嗷嗷嗷明明末</p>
			        <div class="eval-img-group">
			             			             				        	<div class="eval-img">
				        		<img src="http://[::1]/yunjuke/application/vmall/views/images/20170705155217595c9ab1a23d0_apply.jpg" alt="" class="img-r"/>
				        	</div>
				         				        	<div class="eval-img">
				        		<img src="http://[::1]/yunjuke/application/vmall/views/images/20170705155212595c9aac5f8ce_apply.jpg" alt="" class="img-r"/>
				        	</div>
				         			        				        		<div class="clear"></div>
			        </div>
			        
			        <div>
			           						
					</div>
					<div class="clear"></div>
										<p class="small pull-left">花色 ; L</p>
					<p class="small pull-right">购买日期：2017-06-31</p>
               </div>
		</div>
        
		
				<div class="weui-cell">
			<div class="weui-cell__hd" style="align-self:flex-start"><img src="http://wx.qlogo.cn/mmopen/Q3auHgzwzM7Q6Bj9apMB2z9UgW53FxKS4jX6sGQLad5v8TQr7JbA3NYOD0Mr6D0Pvy1tyQiaxzk1xMbLnjmbZbw/0" alt="" class="head-logo"></div>
                <div class="weui-cell__bd">
                    <p><p class="evaltar-name">积小流</p><br>
                    	<ul class="evalstar">
                    								<li><img src="http://[::1]/yunjuke/application/vmall/views/images/evalstar2.png" alt="1"></li>
													<li><img src="http://[::1]/yunjuke/application/vmall/views/images/evalstar2.png" alt="1"></li>
													<li><img src="http://[::1]/yunjuke/application/vmall/views/images/evalstar2.png" alt="1"></li>
						
					</ul>
                   	</p>
                   	<p class="small-time">2017.07.05</p>
                   	<div class="clear"></div>
			        <p class="content">你明明你明个你明明迷宫你明明</p>
			        <div class="eval-img-group">
			             			             				        	<div class="eval-img">
				        		<img src="http://[::1]/yunjuke/application/vmall/views/images/20170705155002595c9a2aedd4e_apply.jpg" alt="" class="img-r"/>
				        	</div>
				         				        	<div class="eval-img">
				        		<img src="http://[::1]/yunjuke/application/vmall/views/images/20170705154954595c9a22e72b1_apply.jpg" alt="" class="img-r"/>
				        	</div>
				         				        	<div class="eval-img">
				        		<img src="http://[::1]/yunjuke/application/vmall/views/images/20170705154947595c9a1b1ff38_apply.jpg" alt="" class="img-r"/>
				        	</div>
				         			        				        		<div class="clear"></div>
			        </div>
			        
			        <div>
			           						
					</div>
					<div class="clear"></div>
										<p class="small pull-left">花色 ; L</p>
					<p class="small pull-right">购买日期：2017-06-31</p>
               </div>
		</div>
        
		
				
	</div>
	
	
</body>
<script type="text/javascript">
        var $gallery = $("#gallery"), $galleryImg = $("#galleryImg");
            
        $(".eval-img-group").on("click", ".eval-img", function(){
            $galleryImg.css("background-image", "url("+$(this).find("img").attr("src")+")");
            $gallery.fadeIn(100);
        });
        $gallery.on("click", function(){
            $gallery.fadeOut(100);
        });


</script>
</html>
<?php }
}
