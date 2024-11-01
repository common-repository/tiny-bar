<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$hmtb_url_is_external = ( $hmtb_url_is_external ? 'target="_blank"' : null );
$hmtb_url_nofollow = ( $hmtb_url_nofollow ? 'rel="nofollow"' : null );
if ( null != get_option( 'hmtb_message_content' ) ) {
    $hmtb_message_content = get_option( 'hmtb_message_content' );
}
if ( null != get_option( 'hmtb_button_text' ) ) {
    $hmtb_button_text = get_option( 'hmtb_button_text' );
}
// Load Styling
include 'styles.php';
$page_id = get_queried_object_id();
$pages = ( !empty($hmtb_tinybar_allow_pages_ids) ? $hmtb_tinybar_allow_pages_ids : [] );
$display_tb = 'Y';
if ( !$hmtb_disable_tinybar ) {
    
    if ( 'Y' === $display_tb ) {
        ?>
        <div id="hmtb-<?php 
        esc_attr_e( $hmtb_display_option );
        ?>-bar" class="<?php 
        esc_attr_e( $hmtb_display_type );
        ?>">
            <div class="hmtb-content-wrapper">
                
                <div class="hmtb-msg-container">
                    
                    <div class="hmtb-msg-container-item">
                        <div class="message <?php 
        esc_attr_e( $hmtb_message_alignment );
        ?>">
                            <?php 
        echo  wp_kses_post( $hmtb_message_content ) ;
        ?>
                        </div>
                    </div>
                    <?php 
        ?>
                </div>

                <?php 
        
        if ( !$hmtb_hide_button ) {
            ?>
                    <div class="hmtb-btn-container">
                        <a href="<?php 
            echo  esc_url( $hmtb_uri ) ;
            ?>" class="hmtb-button" <?php 
            _e( $hmtb_url_is_external );
            ?> <?php 
            _e( $hmtb_url_nofollow );
            ?>>
                            <?php 
            esc_html_e( $hmtb_button_text );
            ?>
                        </a>
                    </div>
                    <?php 
        }
        
        ?>
            </div>
            <?php 
        ?>
        </div>
        <?php 
    }

}