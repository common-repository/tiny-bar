(function(window, $) {

    "use strict";

    $('div#hmtb-top-bar').children(":first").addClass("txtType");
    $('div#hmtb-bottom-bar').children(":first").addClass("txtType");

    $(document).on('click', "#tbp-close-icon", function() {
        $(this).parent().hide();
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() >= 500) {
            $('#hmtb-top-bar.hmtb-overlap').addClass("hmtb-hide");
            $('#hmtb-bottom-bar.hmtb-overlap').addClass("hmtb-hide");
        }
        if ($(window).scrollTop() < 500) {
            $('#hmtb-top-bar.hmtb-overlap').removeClass("hmtb-hide");
            $('#hmtb-bottom-bar.hmtb-overlap').removeClass("hmtb-hide");
        }
    });

})(window, jQuery);