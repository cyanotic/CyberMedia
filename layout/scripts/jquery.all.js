jQuery("#prof").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery("#visi-misi").click(function () {
    jQuery("body,html").animate({
        scrollTop: 550
    }, 600);
});
jQuery("#galeri").click(function () {
    jQuery("body,html").animate({
        scrollTop: 1000
    }, 600);
});
jQuery("#berita").click(function () {
    jQuery("body,html").animate({
        scrollTop: 1580
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});