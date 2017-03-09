/**
 * Created by macke on 2017-03-08.
 */
var headerHeight = 130;

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > headerHeight) {
        $('#navbar').removeClass('top-navbar');
        $('#navbar').addClass('fixed-navbar');
    } else {
        $('#navbar').removeClass('fixed-navbar');
        $('#navbar').addClass('top-navbar');
    }
});