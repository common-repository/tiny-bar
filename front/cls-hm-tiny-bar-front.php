<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
*	Front Mmaster
*/
class HMTB_Front 
{
	use Hmtb_Common, Hmtb_General, Hmtb_Content, Hmtb_Styles;

	private $hmtb_version;

	public function __construct( $version ) {
		$this->hmtb_version = $version;
		$this->hmtb_assets_prefix = substr(HMTB_PREFIX, 0, -1) . '-';
	}
	
	public function hmtb_front_assets() {

		wp_enqueue_style(
			$this->hmtb_assets_prefix . 'font-awesome', 
			HMTB_ASSETS .'css/fontawesome/css/all.min.css',
			array(),
			$this->hmtb_version,
			FALSE
		);
		
		wp_enqueue_style(
			'hmtb-countdown',
			HMTB_ASSETS . 'css/hmtb-countdown.css',
			array(),
			$this->hmtb_version,
			FALSE
		);

		wp_enqueue_style(
			'hmtb-front',
			HMTB_ASSETS . 'css/hmtb-front.css',
			array(),
			$this->hmtb_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}
		
		wp_enqueue_script(
			'hmtb-countdown',
			HMTB_ASSETS . 'js/hmtb-countdown.js',
			array('jquery'),
			$this->hmtb_version,
			FALSE
		);
		
		wp_enqueue_script(
			'hmtb-front',
			HMTB_ASSETS . 'js/hmtb-front.js',
			array('jquery'),
			$this->hmtb_version,
			FALSE
		);
	}
	
	public function hmtb_display_content() {

		$hmtbGeneralSettings 	= $this->get_general_settings();
		$hmtbContentSettings 	= $this->get_content_settings();
		$hmtbStylesSettings		= $this->get_styles_settings();

		//print_r( $hmtbContentSettings );
		foreach ( $hmtbContentSettings as $option_name => $option_value ) {
			if ( isset( $hmtbContentSettings[$option_name] ) ) {
				${"" . $option_name}  = $option_value;
			}
		}

		//print_r( $hmtbGeneralSettings );
		foreach ( $hmtbGeneralSettings as $option_name => $option_value ) {
			if ( isset( $hmtbGeneralSettings[$option_name] ) ) {
				${"" . $option_name}  = $option_value;
			}
		}

		//print_r( $hmtbStylesSettings );
		foreach ( $hmtbStylesSettings as $option_name => $option_value ) {
			if ( isset( $hmtbStylesSettings[$option_name] ) ) {
				${"" . $option_name}  = $option_value;
			}
		}
		
		include HMTB_PATH . 'front/view/tiny-bar.php';
	}
}
?>