function scrollToOrder() {
    document.querySelector('#scrollHere').scrollIntoView({
        behavior: 'smooth',
        block: 'start',
    });

}

jQuery(document).ready(function($) {
    $('.dropdown-menu option, .dropdown-menu select').click(function(e) {
        e.stopPropagation();
    });

    var header = $('#masthead').height();
    var footer = $('#colophon').height();
    var calcSize = header + footer;
    $('#content').css("min-height", "calc(100vh - " + calcSize + "px - 4rem)");

})