<?php
/**
* Plugin Name: 	TinyBar
* Plugin URI:		http://wordpress.org/plugins/tiny-bar/
* Description: 	TinyBar displays a notification bar to your website. You can place it top or bottom of your webpage. It overlaps and hides when you scroll.
* Version: 		  2.2
* Author: 			HM Plugin
* Author URI: 	https://hmplugin.com
* Requires at least:   5.2
* Requires PHP:  7.2
* Tested up to:  6.3
* Text Domain:   tiny-bar
* Domain Path:   /languages/
* License:       GPL-2.0+
* License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( function_exists( 'tb_fs' ) ) {

  tb_fs()->set_basename( false, __FILE__ );

} else {

  if ( ! class_exists('HMTB_Master') ) {

    define('HMTB_PATH', plugin_dir_path(__FILE__));
    define('HMTB_ASSETS', plugins_url('/assets/', __FILE__));
    define('PGC_LANG', plugins_url('/languages/', __FILE__));
    define('HMTB_SLUG', plugin_basename(__FILE__));
    define('HMTB_PREFIX', 'hmtb_');
    define('HMTB_TEXT_DOMAIN', 'tiny-bar');
    define('HMTB_CLS_PREFIX', 'cls-hm-tiny-bar');
    define('HMTB_VERSION', '2.2');
    
    require_once HMTB_PATH . '/lib/freemius-integrator.php';
    require_once HMTB_PATH . 'inc/' . HMTB_CLS_PREFIX . '-master.php';

    $hmtb = new HMTB_Master();
    $hmtb->HMTB_run();
    
    register_activation_hook(__FILE__, array($hmtb, HMTB_PREFIX . 'register_settings'));
    
    // Donation link to plugin description
    add_filter( 'plugin_row_meta', 'hmtb_plugin_row_meta', 10, 2 );
    function hmtb_plugin_row_meta( $links, $file ) {
    
        if ( HMTB_SLUG === $file ) {
            $row_meta = array(
              'hmtb_donation'    => '<a href="' . esc_url( 'https://www.paypal.me/mhmrajib/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', HMTB_TEXT_DOMAIN ) . '" style="color:green; font-weight: bold;">' . esc_html__( 'Donate us', HMTB_TEXT_DOMAIN ) . '</a>'
            );
     
            return array_merge( $links, $row_meta );
        }
        return (array) $links;
    }

  }
}
