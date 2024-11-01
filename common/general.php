<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: General Settings
*/
trait Hmtb_General
{
    protected $fields, $settings, $options;
    
    protected function set_general_settings( $post ) {

        $this->fields   = $this->hmtb_general_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

       $this->settings = apply_filters( 'hmtb_general_settings', $this->options, $post );

        return update_option( 'hmtb_general_settings', serialize( $this->settings ) );

    }

    protected function get_general_settings() {

        $this->fields   = $this->hmtb_general_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmtb_general_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function hmtb_general_option_fileds() {

        return [
            [
                'name'      => 'hmtb_display_type',
                'type'      => 'string',
                'default'   => 'hmtb-fixed',
            ],
            [
                'name'      => 'hmtb_display_option',
                'type'      => 'string',
                'default'   => 'top',
            ],
            [
                'name'      => 'hmtb_scroll_hide',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_bar_height',
                'type'      => 'number',
                'default'   => 80,
            ],
            [
                'name'      => 'hmtb_content_width',
                'type'      => 'number',
                'default'   => 1100,
            ],
            [
                'name'      => 'hmtb_close_icon_place',
                'type'      => 'string',
                'default'   => 'desktop',
            ],
            [
                'name'      => 'hmtb_hide_on_mobile',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_hide_button',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_message_alignment',
                'type'      => 'string',
                'default'   => 'left',
            ],
            [
                'name'      => 'hmtb_tinybar_allow_pages',
                'type'      => 'string',
                'default'   => 'all',
            ],
            [
                'name'      => 'hmtb_tinybar_allow_pages_ids',
                'type'      => 'multipe_checkbox',
                'default'   => [],
            ],
            [
                'name'      => 'hmtb_disable_tinybar',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_display_countdown_timer',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_button_width',
                'type'      => 'number',
                'default'   => 50,
            ],
            [
                'name'      => 'hmtb_bar_bg_type',
                'type'      => 'string',
                'default'   => 'c',
            ],
        ];
    }
}