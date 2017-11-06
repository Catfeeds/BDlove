var wx;
var Share = function(options){
    wx = options.wx || {};
    this.options = options;
    this.title = options.title || '';
    this.description = options.description || '';
    this.imgurl = options.imgurl || '';
    this.shareurl = options.shareurl || location.href;

    this.wxConfig(options.appId, options.timestamp, options.nonceStr, options.signature);
}
Share.prototype = {
    wxConfig: function(appId, timestamp, nonceStr, signature){
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来,若要查看传入的参数,可以在pc端打开,参数信息会通过log打出,仅在pc端时才会打印。
            appId: appId, // 必填,公众号的唯一标识
            timestamp: timestamp, // 必填,生成签名的时间戳
            nonceStr: nonceStr, // 必填,生成签名的随机串
            signature: signature,// 必填,签名
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone'
            ] // 必填,需要使用的JS接口列表,所有JS接口列表见附录2
        });

        var _this = this;
        wx.ready(function(){
            _this.wxReady(_this);
        });
    },
    wxReady: function(_this){
        // wx.checkJsApi({
        //     jsApiList: [
        //         'onMenuShareTimeline',
        //         'onMenuShareAppMessage',
        //         'onMenuShareQQ',
        //         'onMenuShareWeibo',
        //         'onMenuShareQZone'
        //     ]
        // });

        _this.onMenuShareTimeline(_this);
        _this.onMenuShareAppMessage(_this);
        _this.onMenuShareQQ(_this);
        _this.onMenuShareWeibo(_this);
        _this.onMenuShareQZone(_this);

    },
    onMenuShareTimeline: function(_this){
        wx.onMenuShareTimeline({
            title: _this.title, // 分享标题
            link: _this.shareurl, // 分享链接
            imgUrl: _this.imgurl, // 分享图标
            trigger: function () {

            },
            success: function () {
                // 用户确认分享后执行的回调函数
                //alert("time line share success");
            },
            cancel: function () {
                //alert("cancel!")
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                // alert(JSON.stringify(res));
            }
        });
    },
    onMenuShareAppMessage: function(_this){
        wx.onMenuShareAppMessage({
            title: _this.title, // 分享标题
            desc: _this.description, // 分享描述
            link: _this.shareurl, // 分享链接
            imgUrl: _this.imgurl, // 分享图标
            type: 'link', // 分享类型,music、video或link,不填默认为link
            dataUrl: '', // 如果type是music或video,则要提供数据链接,默认为空
            trigger: function () {
                //alert("sharetrigger:"+shareurl);
            },
            success: function () {
                // 用户确认分享后执行的回调函数
                //alert("share success");
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                //alert("share cancel");
            },
            fail: function (res) {
                // alert(JSON.stringify(res));
            }
        });
    },
    onMenuShareQQ: function(_this){
        wx.onMenuShareQQ({
            title: _this.title, // 分享标题
            desc: _this.description, // 分享描述
            link: _this.shareurl, // 分享链接
            imgUrl: _this.imgurl, // 分享图标
            trigger: function (res) {
                //alert('用户点击分享到QQ');
            },
            complete: function (res) {
                // alert(JSON.stringify(res));
            },
            success: function (res) {
                //alert('已分享');
            },
            cancel: function (res) {
                //alert('已取消');
            },
            fail: function (res) {
                // alert(JSON.stringify(res));
            }
        });
    },
    onMenuShareWeibo: function(_this){
        wx.onMenuShareWeibo({
            title: _this.title, // 分享标题
            desc: _this.description, // 分享描述
            link: _this.shareurl, // 分享链接
            imgUrl: _this.imgurl, // 分享图标
            success: function () { 
               // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
    },
    onMenuShareQZone: function(_this){
        wx.onMenuShareQZone({
            title: _this.title, // 分享标题
            desc: _this.description, // 分享描述
            link: _this.shareurl, // 分享链接
            imgUrl: _this.imgurl, // 分享图标
            success: function () { 
               // 用户确认分享后执行的回调函数
            },
            cancel: function () { 
                // 用户取消分享后执行的回调函数
            }
        });
    }
}
