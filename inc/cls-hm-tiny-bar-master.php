<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once HMTB_PATH . 'common/common.php';
require_once HMTB_PATH . 'common/general.php';
require_once HMTB_PATH . 'common/content.php';
require_once HMTB_PATH . 'common/styles.php';

/**
 * Our main plugin CLS
*/
class HMTB_Master 
{
	protected $hmtb_loader;
	protected $hmtb_version;
	
	/**
	 * CLS Constructor
	*/
	public function __construct() {
		$this->hmtb_version = HMTB_VERSION;
		add_action( 'plugins_loaded', array($this, HMTB_PREFIX . 'load_plugin_textdomain') );
		$this->hmtb_load_dependencies();
		$this->hmtb_trigger_admin_hooks();
		$this->hmtb_trigger_front_hooks();
	}

	function hmtb_load_plugin_textdomain() {
		load_plugin_textdomain( HMTB_TEXT_DOMAIN, FALSE, HMTB_TEXT_DOMAIN . '/languages/' );
	}

	private function hmtb_load_dependencies() {
		require_once HMTB_PATH . 'admin/' . HMTB_CLS_PREFIX . '-admin.php';
		require_once HMTB_PATH . 'front/' . HMTB_CLS_PREFIX . '-front.php';
		
		require_once HMTB_PATH . 'inc/' . HMTB_CLS_PREFIX . '-loader.php';
		$this->hmtb_loader = new HMTB_Loader();
	}
	
	private function hmtb_trigger_admin_hooks() {

		$hmtb_admin = new HMTB_Admin( $this->hmtb_version() );
		$this->hmtb_loader->add_action('admin_enqueue_scripts', $hmtb_admin, HMTB_PREFIX . 'enqueue_assets');
		$this->hmtb_loader->add_action('admin_menu', $hmtb_admin, HMTB_PREFIX . 'admin_menu');
	}
	
	private function hmtb_trigger_front_hooks() {

		$hmtb_front = new HMTB_Front( $this->hmtb_version() );
		$this->hmtb_loader->add_action('wp_enqueue_scripts', $hmtb_front, 'hmtb_front_assets');

		if ( ( 'hmtb-fixed' === get_option('hmtb_display_type') ) && ( 'top' === get_option('hmtb_display_option') ) ) {
			$this->hmtb_loader->add_action( 'wp_body_open', $hmtb_front, 'hmtb_display_content' );
		} else {
			$this->hmtb_loader->add_action( 'wp_footer', $hmtb_front, 'hmtb_display_content' );
		} 
	}
	
	function hmtb_run() {

		$this->hmtb_loader->hmtb_run();
	}
	
	function hmtb_version() {

		return $this->hmtb_version;
	}

	function hmtb_register_settings() {

		update_option('hmtb_display_type', 'hmtb-fixed');
		update_option('hmtb_display_option', 'top');
	}
}
?>