<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Styles Settings
*/
trait Hmtb_Styles
{
    protected $fields, $settings, $options;
    
    protected function set_styles_settings( $post ) {

        $this->fields   = $this->hmtb_styles_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

       $this->settings = apply_filters( 'hmtb_styles_settings', $this->options, $post );

        return update_option( 'hmtb_styles_settings', serialize( $this->settings ) );

    }

    protected function get_styles_settings() {

        $this->fields   = $this->hmtb_styles_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmtb_styles_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function hmtb_styles_option_fileds() {

        return [
            [
                'name'      => 'hmtb_background_color',
                'type'      => 'text',
                'default'   => '#166BC0',
            ],
            [
                'name'      => 'hmtb_background_color2',
                'type'      => 'text',
                'default'   => '#166BC0',
            ],
            [
                'name'      => 'hmtb_message_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmtb_msg_font_size',
                'type'      => 'number',
                'default'   => 12,
            ],
            [
                'name'      => 'hmtb_button_color',
                'type'      => 'text',
                'default'   => '#FFFF00',
            ],
            [
                'name'      => 'hmtb_button_font_color',
                'type'      => 'text',
                'default'   => '#166BC0',
            ],
            [
                'name'      => 'hmtb_button_text_size',
                'type'      => 'number',
                'default'   => 12,
            ],
            [
                'name'      => 'hmtb_button_font_weight',
                'type'      => 'string',
                'default'   => 'noraml',
            ],
            [
                'name'      => 'hmtb_close_icon_color',
                'type'      => 'text',
                'default'   => '#111111',
            ],
            [
                'name'      => 'hmtb_close_icon_hvr_color',
                'type'      => 'text',
                'default'   => '#FF0000',
            ],
            [
                'name'      => 'hmtb_button_hvr_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'hmtb_button_hvr_font_color',
                'type'      => 'text',
                'default'   => '#111111',
            ],
            [
                'name'      => 'hmtb_button_border_radius',
                'type'      => 'text',
                'default'   => 0,
            ],
        ];
    }
}