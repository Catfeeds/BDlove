//上拉刷新监听
function scrollToLoadMore(option){
    var wHeight = $(window).height();
    window.onscroll = function(){
        var sHeight = $("body").scrollTop(); 
        var cHeight = $(document).height();
        if(sHeight >= cHeight-wHeight-(option.distance ? option.distance : 20)){
            if($(".loading-bottom").length > 0) {
                return false;
            }else{
                dataPage += (option.length ? option.length : 1);
                option.callback();
            }
        }
    }
}