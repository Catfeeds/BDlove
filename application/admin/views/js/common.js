function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}

function ajax_confirm(msg, url){
    if(confirm(msg)){
        ajaxget(url);
    }
}

function go(url){
    window.location = url;
}
function data_null(data,data_){
	
	data = !data?'':data;
    if(data_){
    	data_ = !data_?'':data_;
    	data = !data?data_:data;
	}
	return data;
}
/* 鏍煎紡鍖栭噾棰� */
function price_format(price){
    if(typeof(PRICE_FORMAT) == 'undefined'){
        PRICE_FORMAT = '&yen;%s';
    }
    price = number_format(price, 2);

    return PRICE_FORMAT.replace('%s', price);
}
function number_format(num, ext){
    if(ext < 0){
        return num;
    }
    num = Number(num);
    if(isNaN(num)){
        num = 0;
    }
    var _str = num.toString();
    var _arr = _str.split('.');
    var _int = _arr[0];
    var _flt = _arr[1];
    if(_str.indexOf('.') == -1){
        /* 鎵句笉鍒板皬鏁扮偣锛屽垯娣诲姞 */
        if(ext == 0){
            return _str;
        }
        var _tmp = '';
        for(var i = 0; i < ext; i++){
            _tmp += '0';
        }
        _str = _str + '.' + _tmp;
    }else{
        if(_flt.length == ext){
            return _str;
        }
        /* 鎵惧緱鍒板皬鏁扮偣锛屽垯鎴彇 */
        if(_flt.length > ext){
            _str = _str.substr(0, _str.length - (_flt.length - ext));
            if(ext == 0){
                _str = _int;
            }
        }else{
            for(var i = 0; i < ext - _flt.length; i++){
                _str += '0';
            }
        }
    }

    return _str;
}
/* 鐏嫄涓嬪彇鏈湴鍏ㄨ矾寰� */
function getFullPath(obj)
{
    if(obj)
    {
        //ie
        if (window.navigator.userAgent.indexOf("MSIE")>=1)
        {
            obj.select();
            if(window.navigator.userAgent.indexOf("MSIE") == 25){
                obj.blur();
            }
            return document.selection.createRange().text;
        }
        //firefox
        else if(window.navigator.userAgent.indexOf("Firefox")>=1)
        {
            if(obj.files)
            {
                //return obj.files.item(0).getAsDataURL();
                return window.URL.createObjectURL(obj.files.item(0));
            }
            return obj.value;
        }
        return obj.value;
    }
}
/* 杞寲JS璺宠浆涓殑 锛� */
function transform_char(str)
{
    if(str.indexOf('&'))
    {
        str = str.replace(/&/g, "%26");
    }
    return str;
}
//鍥剧墖鍨傜洿姘村钩缂╂斁瑁佸垏鏄剧ず
(function($){
    $.fn.VMiddleImg = function(options) {
        var defaults={
            "width":null,
            "height":null
        };
        var opts = $.extend({},defaults,options);
        return $(this).each(function() {
            var $this = $(this);
            var objHeight = $this.height(); //鍥剧墖楂樺害
            var objWidth = $this.width(); //鍥剧墖瀹藉害
            var parentHeight = opts.height||$this.parent().height(); //鍥剧墖鐖跺鍣ㄩ珮搴�
            var parentWidth = opts.width||$this.parent().width(); //鍥剧墖鐖跺鍣ㄥ搴�
            var ratio = objHeight / objWidth;
            if (objHeight > parentHeight && objWidth > parentWidth) {
                if (objHeight > objWidth) { //璧嬪€煎楂�
                    $this.width(parentWidth);
                    $this.height(parentWidth * ratio);
                } else {
                    $this.height(parentHeight);
                    $this.width(parentHeight / ratio);
                }
                objHeight = $this.height(); //閲嶆柊鑾峰彇瀹介珮
                objWidth = $this.width();
                if (objHeight > objWidth) {
                    $this.css("top", (parentHeight - objHeight) / 2);
                    //瀹氫箟top灞炴€�
                } else {
                    //瀹氫箟left灞炴€�
                    $this.css("left", (parentWidth - objWidth) / 2);
                }
            }
            else {
                if (objWidth > parentWidth) {
                    $this.css("left", (parentWidth - objWidth) / 2);
                }
                $this.css("top", (parentHeight - objHeight) / 2);
            }
        });
    };
})(jQuery);
function DrawImage(ImgD,FitWidth,FitHeight){
    var image=new Image();
    image.src=ImgD.src;
    if(image.width>0 && image.height>0)
    {
        if(image.width/image.height>= FitWidth/FitHeight)
        {
            if(image.width>FitWidth)
            {
                ImgD.width=FitWidth;
                ImgD.height=(image.height*FitWidth)/image.width;
            }
            else
            {
                ImgD.width=image.width;
                ImgD.height=image.height;
            }
        }
        else
        {
            if(image.height>FitHeight)
            {
                ImgD.height=FitHeight;
                ImgD.width=(image.width*FitHeight)/image.height;
            }
            else
            {
                ImgD.width=image.width;
                ImgD.height=image.height;
            }
        }
    }
}

/**
 * 娴姩DIV瀹氭椂鏄剧ず鎻愮ず淇℃伅,濡傛搷浣滄垚鍔�, 澶辫触绛�
 * @param string tips (鎻愮ず鐨勫唴瀹�)
 * @param int height 鏄剧ず鐨勪俊鎭窛绂绘祻瑙堝櫒椤堕儴鐨勯珮搴�
 * @param int time 鏄剧ず鐨勬椂闂�(鎸夌绠�), time > 0
 * @sample <a href="javascript:void(0);" onclick="showTips( '鎿嶄綔鎴愬姛', 100, 3 );">鐐瑰嚮</a>
 * @sample 涓婇潰浠ｇ爜琛ㄧず鐐瑰嚮鍚庢樉绀烘搷浣滄垚鍔�3绉掗挓, 璺濈椤堕儴100px
 * @copyright ZhouHr 2010-08-27
 */
function showTips( tips, height, time ){
    var windowWidth = document.documentElement.clientWidth;
    var tipsDiv = '<div class="tipsClass">' + tips + '</div>';

    $( 'body' ).append( tipsDiv );
    $( 'div.tipsClass' ).css({
        'top' : 200 + 'px',
        'left' : ( windowWidth / 2 ) - ( tips.length * 13 / 2 ) + 'px',
        'position' : 'fixed',
        'padding' : '20px 50px',
        'background': '#EAF2FB',
        'font-size' : 14 + 'px',
        'margin' : '0 auto',
        'text-align': 'center',
        'width' : 'auto',
        'color' : '#333',
        'border' : 'solid 1px #A8CAED',
        'opacity' : '0.90',
        'z-index' : '9999'
    }).show();
    setTimeout( function(){$( 'div.tipsClass' ).fadeOut().remove();}, ( time * 1000 ) );
}

function trim(str) {
    return (str + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '');
}
//寮瑰嚭妗嗙櫥褰�
function login_dialog(){
    $.show_nc_login();
}

/* 鏄剧ずAjax琛ㄥ崟 */
function ajax_form(id, title, url, width, model)
{
    if (!width)	width = 480;
    if (!model) model = 1;
    var d = DialogManager.create(id);
    d.setTitle(title);
    d.setContents('ajax', url);
    d.setWidth(width);
    d.show('center',model);
    return d;
}
//鏄剧ず涓€涓唴瀹逛负鑷畾涔塇TML鍐呭鐨勬秷鎭�
function html_form(id, title, _html, width, model) {
    if (!width)	width = 480;
    if (!model) model = 0;
    var d = DialogManager.create(id);
    d.setTitle(title);
    d.setContents(_html);
    d.setWidth(width);
    d.show('center',model);
    return d;
}
//鏀惰棌搴楅摵js
function collect_store(fav_id,jstype,jsobj){
    $.get('index.php?act=index&op=login', function(result){
        if(result=='0'){
            login_dialog();
        }else{
            var url = 'index.php?act=member_favorite_store&op=favoritestore';
            $.getJSON(url, {'fid':fav_id}, function(data){
                if (data.done){
                    showDialog(data.msg, 'succ','','','','','','','','',2);
                    if(jstype == 'count'){
                        $('[nctype="'+jsobj+'"]').each(function(){
                            $(this).html(parseInt($(this).text())+1);
                        });
                    }
                    if(jstype == 'succ'){
                        $('[nctype="'+jsobj+'"]').each(function(){
                            $(this).html("鏀惰棌鎴愬姛");
                        });
                    }
                    if(jstype == 'store'){
                        $('[nc_store="'+fav_id+'"]').each(function(){
                            $(this).before('<span class="goods-favorite" title="璇ュ簵閾哄凡鏀惰棌"><i class="have">&nbsp;</i></span>');
                            $(this).remove();
                        });
                    }
                }
                else
                {
                    showDialog(data.msg, 'notice');
                }
            });
        }
    });
}
//鏀惰棌鍟嗗搧js
function collect_goods(fav_id,jstype,jsobj){
    $.get('index.php?act=index&op=login', function(result){
        if(result=='0'){
            login_dialog();
        }else{
            var url = 'index.php?act=member_favorite_goods&op=favoritegoods';
            $.getJSON(url, {'fid':fav_id}, function(data){
                if (data.done)
                {
                    showDialog(data.msg, 'succ','','','','','','','','',2);
                    if(jstype == 'count'){
                        $('[nctype="'+jsobj+'"]').each(function(){
                            $(this).html(parseInt($(this).text())+1);
                        });
                    }
                    if(jstype == 'succ'){
                        $('[nctype="'+jsobj+'"]').each(function(){
                            $(this).html("鏀惰棌鎴愬姛");
                        });
                    }
                }
                else
                {
                    showDialog(data.msg, 'notice');
                }
            });
        }
    });
}
//鍔犺浇璐墿杞︿俊鎭�
function load_cart_information(){
    $.getJSON(SITEURL+'/index.php?act=cart&op=ajax_load&callback=?', function(result){
        var obj = $('.head-user-menu .my-cart');
        if(result){
            var html = '';
            if(result.cart_goods_num >0){
                for (var i = 0; i < result['list'].length; i++){
                    var goods = result['list'][i];
                    html+='<dl ncTpye="cart_item_'+goods['cart_id']+'"><dt class="goods-name"><a href="'+goods['goods_url']+'">'+goods['goods_name']+'</a></dt>';
                    html+='<dd class="goods-thumb"><a href="'+goods['goods_url']+'" title="'+goods['goods_name']+'"><img src="'+goods['goods_image']+'"></a></dd>';
                    html+='<dd class="goods-sales"></dd>';
                    html+='<dd class="goods-price"><em>&yen;'+goods['goods_price']+'脳'+goods['goods_num']+'</dd>';
                    html+='<dd class="handle"><a href="javascript:void(0);" onClick="drop_topcart_item('+goods['cart_id']+');">鍒犻櫎</a></dd>';
                    html+="</dl>";
                }
                obj.find('.incart-goods').html(html);
                obj.find('.incart-goods-box').perfectScrollbar('destroy');
                obj.find('.incart-goods-box').perfectScrollbar({suppressScrollX:true});
                html = "鍏�<i>"+result.cart_goods_num+"</i>绉嶅晢鍝�&nbsp;&nbsp;鎬昏閲戦锛�<em>&yen;"+result.cart_all_price+"</em>";
                obj.find('.total-price').html(html);
                if (obj.find('.addcart-goods-num').size()==0) {
                    obj.append('<div class="addcart-goods-num">0</div>');
                }
                obj.find('.addcart-goods-num').html(result.cart_goods_num);
                $('#rtoobar_cart_count').html(result.cart_goods_num).show();
            } else {
                html="<div class='no-order'><span>鎮ㄧ殑璐墿杞︿腑鏆傛棤鍟嗗搧锛岃刀蹇€夋嫨蹇冪埍鐨勫晢鍝佸惂锛�</span></div>";
                obj.find('.incart-goods').html(html);
                obj.find('.total-price').html('');
                $('.addcart-goods-num').remove();
                $('#rtoobar_cart_count').html('').hide();

            }
        }
    });
}

//澶撮儴鍒犻櫎璐墿杞︿俊鎭紝鐧诲綍鍓嶄娇鐢╣oods_id,鐧诲綍鍚庝娇鐢╟art_id
function drop_topcart_item(cart_id){
    $.getJSON(SITEURL+'/index.php?act=cart&op=del&cart_id='+cart_id+'&callback=?', function(result){
        if(result.state){
            var obj = $('.head-user-menu .my-cart');
            //鍒犻櫎鎴愬姛
            if(result.quantity == 0){
                html="<div class='no-order'><span>鎮ㄧ殑璐墿杞︿腑鏆傛棤鍟嗗搧锛岃刀蹇€夋嫨蹇冪埍鐨勫晢鍝佸惂锛�</span></div>";
                obj.find('.incart-goods').html(html);
                obj.find('.total-price').html('');
                obj.find('.addcart-goods-num').remove();
                $('.cart-list').html('<li><dl><dd style="text-align: center; ">鏆傛棤鍟嗗搧</dd></dl></li>');
                $('div[ncType="rtoolbar_total_price"]').html('');
                $('#rtoobar_cart_count').html('').hide();
            }else{
                $('dl[ncTpye="cart_item_'+ cart_id+'"]').remove();
                $('li[ncTpye="cart_item_'+ cart_id+'"]').remove();
                html="鍏�<i>"+result.quantity+"</i>绉嶅晢鍝�&nbsp;&nbsp;鎬昏閲戦锛�<em>&yen;"+result.amount+"</em>";
                obj.find('.total-price').html(html);
                obj.find('.addcart-goods-num').html(result.quantity);
                obj.find('.incart-goods-box').perfectScrollbar('destroy');
                obj.find('.incart-goods-box').perfectScrollbar({suppressScrollX:true});
                $('div[ncType="rtoolbar_total_price"]').html("鍏辫閲戦锛�<em class='goods-price'>&yen;"+result.amount+"</em>");
                $('#rtoobar_cart_count').html(result.quantity);
                if ($('#rtoolbar_cartlist > ul').children().size() != result.quantity) {
                    $("#rtoolbar_cartlist").load(SHOP_SITE_URL+ '/index.php?act=cart&op=ajax_load&type=html');return ;
                }
            }
        }else{
            alert(result.msg);
        }
    });
}

//鍔犺浇鏈€杩戞祻瑙堢殑鍟嗗搧
function load_history_information(){
    $.getJSON(SITEURL+'/index.php?act=index&op=viewed_info', function(result){
        var obj = $('.head-user-menu .my-mall');
        if(result['m_id'] >0){
            if (typeof result['consult'] !== 'undefined') obj.find('#member_consult').html(result['consult']);
            if (typeof result['consult'] !== 'undefined') obj.find('#member_voucher').html(result['voucher']);
        }
        var goods_id = 0;
        var text_append = '';
        var n = 0;
        if (typeof result['viewed_goods'] !== 'undefined') {
            for (goods_id in result['viewed_goods']) {
                var goods = result['viewed_goods'][goods_id];
                text_append += '<li class="goods-thumb"><a href="'+goods['url']+'" title="'+goods['goods_name']+
                    '" target="_blank"><img src="'+goods['goods_image']+'" alt="'+goods['goods_name']+'"></a>';
                text_append += '</li>';
                n++;
                if (n > 4) break;
            }
        }
        if (text_append == '') text_append = '<li class="no-goods">鏆傛棤鍟嗗搧</li>';;
        obj.find('.browse-history ul').html(text_append);
    });
}
/*
 * 鐧诲綍绐楀彛
 *
 * 浜嬩欢缁戝畾璋冪敤鑼冧緥
 * $("#btn_login").nc_login({
 *     nchash:'<?php echo getNchash();?>',
 *     formhash:'<?php echo Security::getTokenValue();?>',
 *     anchor:'cms_comment_flag'
 * });
 *
 * 鐩存帴璋冪敤鑼冧緥
 * $.show_nc_login({
 *     nchash:'<?php echo getNchash();?>',
 *     formhash:'<?php echo Security::getTokenValue();?>',
 *     anchor:'cms_comment_flag'
 * });

 */

(function($) {
    $.show_nc_login = function(options) {
        var settings = $.extend({}, {action:'/index.php?act=login&op=login&inajax=1', nchash:'', formhash:'' ,anchor:''}, options);
        var login_dialog_html = $('<div class="quick-login"></div>');
        var ref_url = document.location.href;
        var add_html = '<span class="other">';
        if (connect_qq == '1'){
            add_html += '<a href="'+MEMBER_SITE_URL+'/index.php?act=connect_qq" title="QQ璐﹀彿鐧诲綍" class="qq"><i></i></a>';
        }
        if (connect_sn == '1'){
            add_html += '<a href="'+MEMBER_SITE_URL+'/index.php?act=connect_sina" title="鏂版氮寰崥璐﹀彿鐧诲綍" class="sina"><i></i></a>';
        }
        if (connect_wx == '1'){
            add_html += '<a href="javascript:void(0);" onclick="ajax_form(\'weixin_form\', \'寰俊璐﹀彿鐧诲綍\', \''+LOGIN_SITE_URL+'/index.php?act=connect_wx&op=index\', 360);" title="寰俊璐﹀彿鐧诲綍" class="wx"><i></i></a>';
        }
        add_html += '</span>';
        login_dialog_html.append('<form class="bg" method="post" id="ajax_login" action="'+LOGIN_SITE_URL+settings.action+'"></form>').find('form')
            .append('<input type="hidden" value="ok" name="form_submit">')
            .append('<input type="hidden" value="'+settings.formhash+'" name="formhash">')
            .append('<input type="hidden" value="'+settings.nchash+'" name="nchash">')
            .append('<dl><dt>鐢ㄦ埛鍚�</dt><dd><input type="text" name="user_name" autocomplete="off" class="text"></dd></dl>')
            .append('<dl><dt>瀵�&nbsp;&nbsp;&nbsp;鐮�</dt><dd><input type="password" autocomplete="off" name="password" class="text"></dd></dl>')
            .append('<dl><dt>楠岃瘉鐮�</dt><dd><input type="text" size="10" maxlength="4" class="text fl w60" name="captcha"><img border="0" onclick="this.src=\'index.php?act=seccode&amp;op=makecode&amp;nchash='+settings.nchash+'&amp;t=\' + Math.random()" name="codeimage" title="鐪嬩笉娓咃紝鎹竴寮�" src="index.php?act=seccode&amp;op=makecode&amp;nchash='+settings.nchash+'" class="fl ml10"><span>涓嶅尯鍒嗗ぇ灏忓啓</span></dd></dl>')
            .append('<ul><li>鈥�&nbsp;濡傛灉鎮ㄦ病鏈夌櫥褰曡处鍙凤紝璇峰厛<a class="register" href="'+LOGIN_SITE_URL+'/index.php?act=login&amp;op=register">娉ㄥ唽浼氬憳</a>鐒跺悗鐧诲綍</li><li>鈥�&nbsp;濡傛灉鎮�<a class="forget" href="'+LOGIN_SITE_URL+'/index.php?act=login&amp;op=forget_password">蹇樿瀵嗙爜</a>锛燂紝鐢宠鎵惧洖瀵嗙爜</li></ul>')
            .append('<div class="enter"><input type="submit" name="Submit" value="鐧�&#12288;&#12288;褰�" class="submit">'+add_html+'</div><input type="hidden" name="ref_url" value="'+ref_url+'">');

        login_dialog_html.find('input[type="submit"]').click(function(){
            ajaxpost('ajax_login', '', '', 'onerror');
        });
        html_form("form_dialog_login", "鐧诲綍", login_dialog_html, 360);
    };
    $.fn.nc_login = function(options) {
        return this.each(function() {
            $(this).on('click',function(){
                $.show_nc_login(options);
                return false;
            });
        });
    };

})(jQuery);

/*
 * 涓轰綆鐗堟湰IE娣诲姞placeholder鏁堟灉
 *
 * 浣跨敤鑼冧緥锛�
 * [html]
 * <input id="captcha" name="captcha" type="text" placeholder="楠岃瘉鐮�" value="" >
 * [javascrpt]
 * $("#captcha").nc_placeholder();
 *
 * 鐢熸晥鍚庢彁浜よ〃鍗曟椂锛宲laceholder鐨勫唴瀹逛細琚彁浜ゅ埌鏈嶅姟鍣紝鎻愪氦鍓嶉渶瑕佹妸鍊兼竻绌�
 * 鑼冧緥锛�
 * $('[data-placeholder="placeholder"]').val("");
 * $("#form").submit();
 *
 */
(function($) {
    $.fn.nc_placeholder = function() {
        var isPlaceholder = 'placeholder' in document.createElement('input');
        return this.each(function() {
            if(!isPlaceholder) {
                $el = $(this);
                $el.focus(function() {
                    if($el.attr("placeholder") === $el.val()) {
                        $el.val("");
                        $el.attr("data-placeholder", "");
                    }
                }).blur(function() {
                    if($el.val() === "") {
                        $el.val($el.attr("placeholder"));
                        $el.attr("data-placeholder", "placeholder");
                    }
                }).blur();
            }
        });
    };
})(jQuery);

/*
 * 寮瑰嚭绐楀彛
 */
(function($) {
    $.fn.nc_show_dialog = function(options) {

        var that = $(this);
        var settings = $.extend({}, {width: 480, title: '', close_callback: function() {}}, options);

        var init_dialog = function(title) {
            var _div = that;
            that.addClass("dialog_wrapper");
            that.wrapInner(function(){
                return '<div class="dialog_content">';
            });
            that.wrapInner(function(){
                return '<div class="dialog_body" style="position: relative;">';
            });
            that.find('.dialog_body').prepend('<h3 class="dialog_head" style="cursor: move;"><span class="dialog_title"><span class="dialog_title_icon">'+settings.title+'</span></span><span class="dialog_close_button">X</span></h3>');
            that.append('<div style="clear:both;"></div>');

            $(".dialog_close_button").click(function(){
                settings.close_callback();
                _div.hide();
            });

            that.draggable({handle: ".dialog_head"});
        };

        if(!$(this).hasClass("dialog_wrapper")) {
            init_dialog(settings.title);
        }
        settings.left = $(window).scrollLeft() + ($(window).width() - settings.width) / 2;
        settings.top  = ($(window).height() - $(this).height()) / 2;
        $(this).attr("style","display:none; z-index: 1100; position: fixed; width: "+settings.width+"px; left: "+settings.left+"px; top: "+settings.top+"px;");
        $(this).show();

    };
})(jQuery);

/**
 * Membership card
 *
 *
 * Example:
 *
 * HTML part
 * <a href="javascript" nctype="mcard" data-param="{'id':5}"></a>
 *
 * JAVASCRIPT part
 * <script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.js"></script>
 * <link href="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
 * $('a[nctype="mcard"]').membershipCard();
 */
(function($){
    $.fn.membershipCard = function(options){
        var defaults = {
            type:''			// params  shop/circle/cms/micorshop
        };
        options = $.extend(defaults,options);
        return this.each(function(){
            var $this = $(this);
            var data_str = $(this).attr('data-param');eval('data_str = '+data_str);
            var _uri = SITEURL+'/index.php?act=member_card&callback=?&uid='+data_str.id+'&from='+options.type;
            var _dl = '';
            $this.qtip({
                content: {
                    text: 'Loading...',
                    ajax: {
                        url: _uri,
                        type: 'GET',
                        dataType: 'jsonp',
                        success: function(data) {
                            if(data){
                                _dl = $('<dl></dl>');
                                // member name
                                _dttmp = $('<dt class="member-id"></dt>');
                                _dttmp.append('<i class="sex'+data.sex+'"></i>')
                                    .append('<a href="'+SHOP_SITE_URL+'/index.php?act=member_snshome&mid='+data.id+'" target="_blank">'+data.name+'</a>'+(data.truename != ''?'('+data.truename+')':''));
                                //show membergrade
                                if(options.type == 'shop'){
                                    _dttmp.append(((data.level_name)?'&nbsp;<div class="nc-grade-mini">'+data.level_name+'</div>':''));
                                }
                                _dttmp.appendTo(_dl);

                                // avatar
                                $('<dd class="avatar"><a href="'+SHOP_SITE_URL+'/index.php?act=member_snshome&mid='+data.id+'" target="_blank"><img src="'+data.avatar+'" /></a><dd>')
                                    .appendTo(_dl);
                                // info
                                var _info = '';
                                if(typeof connect !== 'undefined' && connect === 1 && data.follow != 2){
                                    var class_html = 'chat_offline';
                                    var text_html = '绂荤嚎';
                                    if (typeof user_list[data.id] !== 'undefined' && user_list[data.id]['online'] > 0 ) {
                                        class_html = 'chat_online';
                                        text_html = '鍦ㄧ嚎';
                                    }
                                    _info += '<a class="chat '+class_html+'" title="鐐瑰嚮杩欓噷缁欐垜鍙戞秷鎭�" href="JavaScript:chat('+data.id+');">'+text_html+'</a>';
                                }
                                if(data.qq != ''){
                                    _info += '<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='+data.qq+'&site=qq&menu=yes" title="QQ: '+data.qq+'"><img border="0" src="http://wpa.qq.com/pa?p=2:'+data.qq+':52" style=" vertical-align: middle;"/></a>';
                                }
                                if(data.ww != ''){
                                    _info += '<a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid='+data.ww+'&site=cntaobao&s=1&charset='+_CHARSET+'" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid='+data.ww+'&site=cntaobao&s=2&charset='+_CHARSET+'" alt="鐐瑰嚮杩欓噷缁欐垜鍙戞秷鎭�" style=" vertical-align: middle;"/></a>';
                                }
                                if(_info == ''){
                                    _info = '--';
                                }
                                var _ul = $('<ul></ul>').append('<li>鍩庡競锛�'+((data.areainfo != null)?data.areainfo:'--')+'</li>')
                                    .append('<li>鐢熸棩锛�'+((data.birthday != null)?data.birthday:'--')+'</li>')
                                    .append('<li>鑱旂郴锛�'+_info+'</li>').appendTo('<dd class="info"></dd>').parent().appendTo(_dl);
                                // ajax info
                                if(data.url != ''){
                                    $.getJSON(data.url+'/index.php?act=member_card&op=mcard_info&uid='+data.id, function(d){
                                        if(d){
                                            eval('var msg = '+options.type+'_function(d);');
                                            msg.appendTo(_dl);
                                        }
                                    });
                                    data.url = '';
                                }

                                // bottom
                                var _bottom;
                                if(data.follow != 2){
                                    _bottom = $('<div class="bottom"></div>');
                                    var _a;
                                    if(data.follow == 1){
                                        $('<div class="follow-handle" nctype="follow-handle'+data.id+'" data-param="{\'mid\':'+data.id+'}"></div>')
                                            .append('<a href="javascript:void(0);" >宸插叧娉�</a>')
                                            .append('<a href="javascript:void(0);" nctype="nofollow">鍙栨秷鍏虫敞</a>').find('a[nctype="nofollow"]').click(function(){
                                                onfollow($(this));
                                            }).end().appendTo(_bottom);
                                    }else{
                                        $('<div class="follow-handle" nctype="follow-handle'+data.id+'" data-param="{\'mid\':'+data.id+'}"></div>')
                                            .append('<a href="javascript:void(0);" nctype="follow">鍔犲叧娉�</a>').find('a[nctype="follow"]').click(function(){
                                                follow($(this));
                                            }).end().appendTo(_bottom);
                                    }
                                    $('<div class="send-msg"> <a href="'+MEMBER_SITE_URL+'/index.php?act=member_message&op=sendmsg&member_id='+data.id+'" target="_blank"><i></i>绔欏唴淇�</a> </div>').appendTo(_bottom);
                                }

                                var _content = $('<div class="member-card"></div>').append(_dl).append(_bottom);
                                this.set('content.text', ' ');this.set('content.text', _content);
                            }
                        }
                    }
                },
                position: {
                    viewport: $(window)
                },
                hide: {
                    fixed: true,
                    delay: 300
                },
                style: 'qtip-wiki'
            });
        });
        function follow(o){
            var data_str = o.parent().attr('data-param');
            eval( "data_str = "+data_str);
            $.getJSON(MEMBER_SITE_URL+'/index.php?act=member_snsfriend&op=addfollow&callback=?&mid='+data_str.mid, function(data){
                if(data){
                    $('[nctype="follow-handle'+data_str.mid+'"]').html('<a href="javascript:void(0);" >宸插叧娉�</a> <a href="javascript:void(0);" nctype="nofollow">鍙栨秷鍏虫敞</a>').find('a[nctype="nofollow"]').click(function(){
                        onfollow($(this));
                    });
                }
            });
        }
        function onfollow(o){
            var data_str = o.parent().attr('data-param');
            eval( "data_str = "+data_str);
            $.getJSON(MEMBER_SITE_URL+'/index.php?act=member_snsfriend&op=delfollow&callback=?&mid='+data_str.mid, function(data){
                if(data){
                    $('[nctype="follow-handle'+data_str.mid+'"]').html('<a href="javascript:void(0);" nctype="follow">鍔犲叧娉�</a>').find('a[nctype="follow"]').click(function(){
                        follow($(this));
                    });
                }
            });
        }
        function shop_function(d){
            return ;
        }
        function circle_function(d){
            var rs = $('<dd class="ajax-info"></dd>');
            $.each(d,function(i, n){
                rs.append('<div class="rank-div" title="'+n.circle_name+'鍦堢瓑绾�'+n.cm_level+'锛岀粡楠屽€�'+n.cm_exp+'"><a href="'+CIRCLE_SITE_URL+'/index.php?act=group&c_id='+n.circle_id+'" target="_blank">'+n.circle_name+'</a><i></i><em class="rank-em rank-'+n.cm_level+'">'+n.cm_level+'</em></div>');
            });
            return rs;
        }
        function microshop_function(d){
            var rs = $('<dd class="ajax-info"></dd>');
            rs.append('<span class="ajax-info-microshop">闅忓績鐪嬶細' + d.goods_count + '</span>');
            rs.append('<span class="ajax-info-microshop">涓汉绉€锛�' + d.personal_count + '</span>');
            return rs;
        }
    };
})(jQuery);

/*
 * 鍦板潃鑱斿姩閫夋嫨
 * input涓嶄负绌烘椂鍑虹幇缂栬緫鎸夐挳锛岀偣鍑绘寜閽繘琛岃仈鍔ㄩ€夋嫨
 *
 * 浣跨敤鑼冧緥锛�
 * [html]
 * <input id="region" name="region" type="hidden" value="" >
 * [javascrpt]
 * $("#region").nc_region();
 *
 * 榛樿浠巆ache璇诲彇鍦板尯鏁版嵁锛屽鏋滈渶浠庢暟鎹簱璇诲彇锛堝鍚庡彴鍦板尯绠＄悊锛夛紝鍒欓渶璁剧疆瀹歴rc鍙傛暟
 * $("#region").nc_region({{src:'db'}});
 *
 * 濡傞渶鎸囧畾鍦板尯涓嬫媺鏄剧ず灞傜骇锛岄渶鎸囧畾show_deep鍙傛暟锛岄粯璁ゆ湭闄愬埗
 * $("#region").nc_region({{show_deep:2}}); 杩欐牱鏈€澶氬彧浼氭樉绀�2绾ц仈鍔�
 *
 * 绯荤粺鍒嗚嚜鍔ㄥ皢宸茬粡閫夋嫨鐨勫湴鍖篒D瀛樻斁鍒癐D渚濇涓篲area_1銆乢area_2銆乢area_3銆乢area_4銆乢area鐨刬nput妗嗕腑
 * _area瀛樻斁閫変腑鐨勬渶鍚庝竴绾D
 * 杩欎簺input妗嗛渶瑕佹墜鍔ㄥ湪妯℃澘涓垱寤�
 *
 * 鍙栧緱宸查€夊€�
 * $('#region').val() ==> 娌冲寳 鐭冲搴勫競 浜曢檳鐭垮尯
 * $('#region').fetch('islast')  ==> true; 濡傛灉闈炴渶鍚庝竴绾э紝杩斿洖false
 * $('#region').fetch('area_id') ==> 1127
 * $('#region').fetch('area_ids') ==> 3 73 1127
 * $('#region').fetch('selected_deep') ==> 3 宸查€夋嫨鍒嗙被鐨勬繁搴�
 * $("#region").fetch('area_id_1') ==> 3
 * $("#region").fetch('area_id_2') ==> 73
 * $("#region").fetch('area_id_3') ==> 1127
 * $("#region").fetch('area_id_4') ==> ''
 */

(function($) {
    $.fn.nc_region = function(options) {
        var $region = $(this);
        var settings = $.extend({}, {
            area_id: 0,
            region_span_class: "_region_value",
            src: "cache",
            show_deep: 0,
            btn_style_html: "",
            tip_type: ""
        }, options);
        settings.islast = false;
        settings.selected_deep = 0;
        settings.last_text = "";

        this.each(function() {
            //console.log($(this));
            var $inputArea = $(this);
            if ($inputArea.val() === "") {
                initArea($inputArea)
            } else {
                var $region_span = $('<span id="_area_span" class="' + settings.region_span_class + '">' + $inputArea.val() + "</span>");
                var $region_btn = $('<input type="button" class="input-btn" ' + settings.btn_style_html + ' value="编辑" />');
                $inputArea.after($region_span);
                $region_span.after($region_btn);
                $region_btn.on("click", function() {
                    $region_span.remove();
                    $region_btn.remove();
                    initArea($inputArea)
                });
                settings.islast = true
            }
            this.settings = settings;
            if ($inputArea.val() && /^\d+$/.test($inputArea.val())) {
                $.getJSON(SITEURL + "/index.php?act=index&op=json_area_show&area_id=" + $inputArea.val() + "&callback=?", function(data) {
                    $("#_area_span").html(data.text == null ? "鏃�" : data.text)
                })
            }
        });

        function initArea($inputArea) {
            settings.$area = $("<select></select>");
            $inputArea.before(settings.$area);
            loadAreaArray(function() {
                loadArea(settings.$area, settings.area_id)
            })
        }
        function loadArea($area, area_id) {
            if ($area && nc_a[area_id].length > 0) {
                var areas = [];
                areas = nc_a[area_id];
                if (settings.tip_type && settings.last_text != "") {
                    $area.append("<option value=''>" + settings.last_text + "(*)</option>")
                } else {
                    $area.append("<option value='0'>-请选择-</option>")
                }
                for (i = 0; i < areas.length; i++) {
                    $area.append("<option value='" + areas[i][0] + "'>" + areas[i][1] + "</option>")
                }
                settings.islast = false
            }
            $area.on("change", function() {
                var region_value = "",
                    area_ids = [],
                    selected_deep = 1;
                $(this).nextAll("select").remove();
                $region.parent().find("select").each(function() {
                    if ($(this).find("option:selected").val() != "") {
                        region_value += $(this).find("option:selected").text() + " ";
                        area_ids.push($(this).find("option:selected").val())
                    }
                });
                settings.selected_deep = area_ids.length;
                settings.area_ids = area_ids.join(" ");
                $region.val(region_value);
                settings.area_id_1 = area_ids[0] ? area_ids[0] : "";
                settings.area_id_2 = area_ids[1] ? area_ids[1] : "";
                settings.area_id_3 = area_ids[2] ? area_ids[2] : "";
                settings.area_id_4 = area_ids[3] ? area_ids[3] : "";
                settings.last_text = $region.prevAll("select").find("option:selected").last().text();
                var area_id = settings.area_id = $(this).val();
                if ($('#_area_1').length > 0) $("#_area_1").val(settings.area_id_1);
                if ($('#_area_2').length > 0) $("#_area_2").val(settings.area_id_2);
                if ($('#_area_3').length > 0) $("#_area_3").val(settings.area_id_3);
                if ($('#_area_4').length > 0) $("#_area_4").val(settings.area_id_4);
                if ($('#_area').length > 0) $("#_area").val(settings.area_id);
                if ($('#_areas').length > 0) $("#_areas").val(settings.area_ids);
                if (settings.show_deep > 0 && $region.prevAll("select").size() == settings.show_deep) {
                    settings.islast = true;
                    if (typeof settings.last_click == 'function') {
                        settings.last_click(area_id);
                    }
                    return
                }
                if (area_id > 0) {
                    if (nc_a[area_id] && nc_a[area_id].length > 0) {
                        var $newArea = $("<select></select>");
                        $(this).after($newArea);
                        loadArea($newArea, area_id);
                        settings.islast = false
                    } else {
                        settings.islast = true;
                        if (typeof settings.last_click == 'function') {
                            settings.last_click(area_id);
                        }
                    }
                } else {
                    settings.islast = false
                }
                if ($('#islast').length > 0) $("#islast").val("");
            })
        }
        function loadAreaArray(callback) {
            if (typeof nc_a === "undefined") {
                //alert(SITEURL + "/area.php?act=newArea&src=" + settings.src + "&callback=?");
                $.getJSON("newArea?op=json_area&callback=?", function(data) {
                    nc_a = data;
                    callback()
                })
            } else {
                callback()
            }
        }
        if (typeof jQuery.validator != 'undefined') {
            jQuery.validator.addMethod("checklast", function(value, element) {
                return $(element).fetch('islast');
            }, "璇峰皢鍦板尯閫夋嫨瀹屾暣");
        }
    };
    $.fn.fetch = function(k) {
        var p;
        this.each(function() {
            if (this.settings) {
                p = eval("this.settings." + k);
                return false
            }
        });
        return p
    }
})(jQuery);

/* 鍔犲叆璐墿杞� */
function addcart(goods_id,quantity,callbackfunc) {
    if (!quantity) return false;
    var url = 'index.php?act=cart&op=add';
    quantity = parseInt(quantity);
    $.getJSON(url, {'goods_id':goods_id, 'quantity':quantity}, function(data) {
        if (data != null) {
            if (data.state) {
                if(callbackfunc){
                    eval(callbackfunc + "(data)");
                }
                // 澶撮儴鍔犺浇璐墿杞︿俊鎭�
                load_cart_information();
                $("#rtoolbar_cartlist").load(SHOP_SITE_URL + '/index.php?act=cart&op=ajax_load&type=html');
            } else {
                alert(data.msg);
            }
        }
    });
}
function import_change(obj){
	$("#textfield2").val($(obj).val());
}
/*数据导入 title导入名称 ；site_url导入数据上传路径；content_url导入数据处理路径*/
function data_import(title,site_url,content_url){
	layer.open({
        type: 1,
        btn: ['确认', '取消'],
        title: '<b>'+title+'导入</b>',
        skin: 'layui-layer-rim', //加上边框
        area: ['520px', '180px'], //宽高
        content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form3" method="POST" enctype=multipart/form-data>' +
        '<table class="table">' +
        '<tr> ' +
        '<td class="text-l f-14"  style="width: 80px;">选择文件：</td>' +
        '<td class="text-l pos-r"><div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" onchange="import_change(this)" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div><div class="err pos-a" style="bottom: -10px;"></div></td> ' +
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
                		if(data['state'] == false){
                			layer.alert(data['msg']);
                		}else{
                			layer.closeAll();
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