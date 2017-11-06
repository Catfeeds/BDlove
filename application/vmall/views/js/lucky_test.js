$(document).ready(function(){
    var n=0,
        i=0,
        position=7,//中奖的位置
        speed=200;//旋转的速度
    $('#btn').click(function(){
        restore(7);
    })

    // 还原
    function restore(){
        n++;
        if(n>7){
            n=0;
        }
        $('.loty_box').removeClass('active');
        $('.loty_box_'+n).addClass('active');
        if(i<position-1){
            var timer = setTimeout(restore,speed);
            i++;
        }else{
            clearTimeout(timer);
            i=0;
            alert(position);
            n=0;
        }
    }

})
