$(function () {
    $('.scroll-down').click(function () {
        $('html, body').animate({
            scrollTop: $('.section-scroll').offset().top
        }, 'slow');
        return false;
    });
});
