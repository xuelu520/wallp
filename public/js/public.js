/**
 * Created by m_xuelu on 2015/12/14.
 */
$(function() {
    //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
    $(window).scroll(function(){
        if($(window).scrollTop()>400) {
            $("#backToTop").show();
        } else {
            $("#backToTop").hide();
        }
    });


    //当点击跳转链接后，回到页面顶部位置
    $("#backToTop").bind('click',function(){
        $('body,html').animate({scrollTop:0},250);
        return false;
    });
});

// 左侧菜单高亮方法
function nav(id) {
    $('.list-group').find('a').removeClass('active');
    $('#'+id).addClass('active');
}