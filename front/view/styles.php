<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$page_id = get_queried_object_id();
$pages = ( !empty($hmtb_tinybar_allow_pages_ids) ? $hmtb_tinybar_allow_pages_ids : [] );
$display_tb = $hmtb_bar_height;
?>
<style type="text/css">
<?php 

if ( 'hmtb-fixed' === $hmtb_display_type && 'top' === $hmtb_display_option ) {
    ?>
    @media(min-width:500px) {
        body {
            padding-top: <?php 
    esc_attr_e( $display_tb );
    ?>px!important;
        }
    }
    <?php 
    
    if ( !$hmtb_hide_on_mobile ) {
        ?>
        @media(max-width:500px) {
            body {
                padding-top: <?php 
        esc_attr_e( $display_tb * 2 );
        ?>px!important;
            }
        }
    <?php 
    }

}


if ( 'c' === $hmtb_bar_bg_type ) {
    ?>
    #hmtb-top-bar, #hmtb-bottom-bar {
        background-color: <?php 
    esc_attr_e( $hmtb_background_color );
    ?>!important;
    }
    <?php 
}

?>
#hmtb-top-bar, #hmtb-bottom-bar {
    min-height: <?php 
esc_attr_e( $hmtb_bar_height );
?>px;
    color: <?php 
esc_attr_e( $hmtb_message_color );
?>;
}
.hmtb-content-wrapper {
    color: <?php 
esc_attr_e( $hmtb_message_color );
?>!important;
    max-width: <?php 
esc_attr_e( $hmtb_content_width );
?>px;
    min-height: <?php 
esc_attr_e( $hmtb_bar_height );
?>px;
    grid-template-columns: auto 200px;
    grid-gap: 10px;
    text-align: <?php 
esc_attr_e( $hmtb_message_alignment );
?>;
}
.hmtb-msg-container,
.hmtb-msg-container a {
  color: <?php 
esc_attr_e( $hmtb_message_color );
?>!important;
  font-size: <?php 
esc_attr_e( $hmtb_msg_font_size );
?>px;
  line-height: <?php 
esc_attr_e( $hmtb_msg_font_size + 10 );
?>px;
}
<?php 

if ( $hmtb_scroll_hide ) {
    ?>
    #hmtb-top-bar.hmtb-overlap.hmtb-hide, 
    #hmtb-bottom-bar.hmtb-overlap.hmtb-hide {
        height: 0px;
        opacity:0.5;
        -moz-transition:all 0.5s ease-in-out;
        -o-transition:all 0.5s ease-in-out;
        transition:all 0.5s ease-in-out;
        -webkit-transition:all 0.5s ease-in-out;
    }
    #hmtb-top-bar.hmtb-overlap.hmtb-hide { top:-<?php 
    esc_attr_e( $hmtb_bar_height );
    ?>px; }
    #hmtb-bottom-bar.hmtb-overlap.hmtb-hide { bottom:-<?php 
    esc_attr_e( $hmtb_bar_height );
    ?>px; }
    <?php 
}

?>
.txtType { color: <?php 
esc_attr_e( $hmtb_message_color );
?>; }
.hmtb-btn-container a.hmtb-button,
.hmtb-content-wrapper > .hmtb-btn-container > a.hmtb-button {
    background: <?php 
esc_attr_e( $hmtb_button_color );
?>;
    color: <?php 
esc_attr_e( $hmtb_button_font_color );
?>;
    font-weight: <?php 
esc_attr_e( $hmtb_button_font_weight );
?>;
    font-size: <?php 
esc_attr_e( $hmtb_button_text_size );
?>px;
    min-width: <?php 
esc_attr_e( $hmtb_button_width );
?>px;
    border-radius: <?php 
esc_attr_e( $hmtb_button_border_radius );
?>px;
}
.hmtb-btn-container a.hmtb-button:hover {
    background: <?php 
esc_attr_e( $hmtb_button_hvr_color );
?>;
    color: <?php 
esc_attr_e( $hmtb_button_hvr_font_color );
?>;
}
.tbp-close {
    position: absolute;
    right: 20px;
    font-size: 24px;
    z-index: 9999;
    cursor: pointer;
    box-sizing: content-box;
    overflow: visible;
    display: none;
    color: <?php 
esc_attr_e( $hmtb_close_icon_color );
?>;
    top: calc(50% - 12px);
}
.tbp-close:hover {
    color: <?php 
esc_attr_e( $hmtb_close_icon_hvr_color );
?>;
    -webkit-animation: rotation .3s  linear;
}
@-webkit-keyframes rotation {
    from {
      -webkit-transform: rotate(0deg);
    }
    to {
      -webkit-transform: rotate(90deg);
    }
  }
<?php 
?>
</style>