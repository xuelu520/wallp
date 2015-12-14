/**
 * Created by m_xuelu on 2015/12/14.
 */
function nav(id) {
    $('.list-group').find('a').removeClass('active');
    $('#'+id).addClass('active');
}