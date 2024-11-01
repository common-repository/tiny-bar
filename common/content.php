<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Slide Settings
*/
trait Hmtb_Content
{
    protected $fields, $settings, $options;
    
    protected function set_content_settings( $post ) {

        $this->fields   = $this->hmtb_content_option_fileds();

        $this->options  = $this->build_set_settings_options( $this->fields, $post );

       $this->settings = apply_filters( 'hmtb_content_settings', $this->options, $post );

        return update_option( 'hmtb_content_settings', serialize( $this->settings ) );

    }

    protected function get_content_settings() {

        $this->fields   = $this->hmtb_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('hmtb_content_settings') ) );
        
        return $this->build_get_settings_options( $this->fields, $this->settings );
	}

    protected function hmtb_content_option_fileds() {

        return [
            [
                'name'      => 'hmtb_message_content',
                'type'      => 'editor',
                'default'   => 'There is no message to display. Please add one.',
            ],
            [
                'name'      => 'hmtb_button_text',
                'type'      => 'text',
                'default'   => 'Button Text',
            ],
            [
                'name'      => 'hmtb_uri',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmtb_url_is_external',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_url_nofollow',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'hmtb_container_bg_img_url',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'hmtb_countdown_date',
                'type'      => 'text',
                'default'   => date("Y/m/d"),
            ],
            [
                'name'      => 'hmtb_countdown_time',
                'type'      => 'text',
                'default'   => '23:59:59',
            ],
        ];
    }
}