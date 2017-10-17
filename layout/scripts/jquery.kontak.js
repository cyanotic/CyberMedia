jQuery("#kontak").click(function () {
    jQuery("body,html").animate({
        scrollTop: $(document).height() - $(window).height()
    }, 600);
});