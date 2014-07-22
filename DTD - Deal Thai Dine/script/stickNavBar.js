	/* Dynamic top menu positioning
 *
 */

var num = 50; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.align-center').addClass('fixed');
    } else {
        $('.align-center').removeClass('fixed');
    }
});