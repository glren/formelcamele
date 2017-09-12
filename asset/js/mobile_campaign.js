var $slider = {};
$slider = $('.layer-bxslider').bxSlider({
    auto: false,
    pause: 4000,
    controls: true,
    pager: false,
    prevText : '<img src="/asset/img/mobile/arw_bl_left.png" />',
    nextText : '<img src="/asset/img/mobile/arw_bl_right.png" />'
});

window.addEventListener("orientationchange", function() {
    if (window.orientation == 90 || window.orientation == -90) {
        $('body').addClass('sero');
    } else {
        $('body').removeClass('sero');
    }
});
$(window).trigger('orientationchange');