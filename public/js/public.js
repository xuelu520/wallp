/**
 * Created by m_xuelu on 2015/12/14.
 */
$(function() {
    //����������λ�ô��ھඥ��100��������ʱ����ת���ӳ��֣�������ʧ
    $(window).scroll(function(){
        if($(window).scrollTop()>400) {
            $("#backToTop").show();
        } else {
            $("#backToTop").hide();
        }
    });


    //�������ת���Ӻ󣬻ص�ҳ�涥��λ��
    $("#backToTop").click(function(){
        $('body,html').animate({scrollTop:0},200);
        return false;
    });
});
function nav(id) {
    $('.list-group').find('a').removeClass('active');
    $('#'+id).addClass('active');
}