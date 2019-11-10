$(function() {
    $('.scroll-down').click (function() {
        $('html, body').animate({
            scrollTop: $('section.cat-products').offset().top
        }, 'slow');
        return false;
    });
});
