<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *	Master Class Admin
 */
class HMTB_Admin
{
	use Hmtb_Common, Hmtb_General, Hmtb_Content, Hmtb_Styles;

	private $hmtb_version;
	private $hmtb_option_group;
	private $hmtb_assets_prefix;

	function __construct( $version ) {

		$this->hmtb_version = $version;
		$this->hmtb_option_group = HMTB_PREFIX . 'options_group';
		$this->hmtb_option_group_styles = HMTB_PREFIX . 'option_group_styles';
		$this->hmtb_assets_prefix = substr(HMTB_PREFIX, 0, -1) . '-';
	}

	/**
	 *	Loading the admin menu
	 */
	function hmtb_admin_menu() {

		add_menu_page(
			__('TinyBar', HMTB_TEXT_DOMAIN),
			__('TinyBar', HMTB_TEXT_DOMAIN),
			'manage_options',
			'hmtb-admin-panel',
			array( $this, 'hmtb_settings' ),
			'dashicons-bell',
			100
		);

		add_submenu_page(
			'hmtb-admin-panel',
			__('Settings', HMTB_TEXT_DOMAIN),
			__('Settings', HMTB_TEXT_DOMAIN),
			'manage_options',
			'hmtb-settings',
			array( $this, 'hmtb_settings' )
		);
	}

	/**
	 *	Loading admin panel assets
	 */
	function hmtb_enqueue_assets() {

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}

		wp_enqueue_style(
			$this->hmtb_assets_prefix . 'font-awesome', 
			HMTB_ASSETS .'css/fontawesome/css/all.min.css',
			array(),
			$this->hmtb_version,
			FALSE
		);

		wp_enqueue_style(
			$this->hmtb_assets_prefix . 'admin',
			HMTB_ASSETS . 'css/' . $this->hmtb_assets_prefix . 'admin.css',
			array(),
			$this->hmtb_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(
			'hmtb-admin',
			HMTB_ASSETS . 'js/' . $this->hmtb_assets_prefix . 'admin.js',
			array('jquery'),
			$this->hmtb_version,
			TRUE
		);
	}

	/**
	 *	Loading admin panel view/forms
	 */
	function hmtb_settings() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$hmtbNotiMessage = false;
		
		if ( isset( $_POST['updateGeneralSettings'] ) ) {

			$hmtbNotiMessage = $this->set_general_settings( $_POST );
		}

		if ( isset( $_POST['updateContentSettings'] ) ) {

			$hmtbNotiMessage = $this->set_content_settings( $_POST );
			delete_option('hmtb_message_content');
			delete_option('hmtb_button_text');
		}

		if ( isset( $_POST['updateStylesSettings'] ) ) {

			$hmtbNotiMessage = $this->set_styles_settings( $_POST );
		}

		$hmtbGeneralSettings 	= $this->get_general_settings();
		$hmtbContentSettings	= $this->get_content_settings();
		$hmtbStylesSettings 	= $this->get_styles_settings();

		require_once HMTB_PATH . 'admin/view/general.php';
	}

	protected function hmtb_display_notification( $type, $msg ) { 
		?>
		<div class="hmtb-alert <?php esc_attr_e( $type ); ?>">
			<span class="hmtb-closebtn">&times;</span> 
			<strong><?php esc_html_e( ucfirst( $type ) ); ?>!</strong>&nbsp;<?php esc_html_e( $msg ); ?>
		</div>
		<?php 
	}
}
?>