(function($) {

    // USE STRICT
    "use strict";

    var hmtbColorPicker = [
        '#hmtb_background_color',
        '#hmtb_background_color2',
        '#hmtb_message_color',
        '#hmtb_button_color',
        '#hmtb_button_font_color',
        '#hmtb_close_icon_color',
        '#hmtb_close_icon_hvr_color',
        '#hmtb_button_hvr_color',
        '#hmtb_button_hvr_font_color',
    ];

    $.each(hmtbColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $('.hmtb-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

    var aw_uploader = '';
    $("#hmtb_bg_img_remove").hide();

    $('body').on('click', '#hmtb_bg_img_add', function(e) {
        //alert('Hello');
        e.preventDefault();
        aw_uploader = wp.media({
                title: 'Select TinyBar Background Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#hmtb_container_bg_img_url').val(attachment.url);
                $("#hmtb_bg_img_add").hide();
                $("#hmtb_bg_img_remove").show();
            })
            .open();
    });

    $("#hmtb_bg_img_remove").click(function() {
        $('#hmtb_container_bg_img_url').val('');
        $(this).hide();
        $("#hmtb_bg_img_add").show();
    });

})(jQuery);