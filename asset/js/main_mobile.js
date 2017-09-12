/* Downloaded from https://www.codeseek.co/ */
$(document).ready(function() {
    $('.bxslider').bxSlider({
//        mode : 'fade',
        auto: true,
        pause: 4000,
        controls: true,
        pager: false,
        prevText : '<img src="/asset/img/left_side.png" />',
        nextText : '<img src="/asset/img/right_side.png" />'
    });
    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        adjHeight = windowHeight;

    $('.classy').css({
        'width': windowWidth + 'px',
        'height': (adjHeight - 40) + 'px'
    });

    window.addEventListener("orientationchange", function() {
        if (window.orientation == 90 || window.orientation == -90) {

        } else {
            $('.classy').css({
               'width': windowWidth + 'px',
               'height': (adjHeight - 40) + 'px'
            });
        }
    });

});
$(window).resize(function() {
    var windowWidth = $(window).width(),
        windowHeight = $(window).height(),
        adjHeight = windowHeight;
    $('.classy').css({
        'width': windowWidth + 'px',
        'height': adjHeight + 'px'
    });
    $('.classy video').css({
        'min-width': windowWidth + 'px',
        'min-height': (adjHeight) + 'px'
    });
});