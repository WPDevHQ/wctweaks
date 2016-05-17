<?php
/**
 * Plugin Name:       WCTweaks
 * Description:       Custom tweaks for WooCommerce based sites.
 * Plugin URI:        http://github.com/WPDevHQ/wctweaks
 * Version:           1.0.0
 * Author:            WPDevHQ
 * Author URI:        http://wpdevhq.com/
 * Requires at least: 4.0.0
 * Tested up to:      4.6-alpha
 *
 * @package Theme_Customisations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Theme_Customisations Class
 *
 * @class Theme_Customisations
 * @version	1.0.0
 * @since 1.0.0
 * @package	Theme_Customisations
 */
final class WC_Tweaks {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'wc_tweaks_setup' ), -1 );
		include_once( plugin_dir_path( __FILE__ ) . 'inc/functions.php' );
	}

	/**
	 * Setup all the things
	 */
	public function wc_tweaks_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'wc_tweaks_css' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'wc_tweaks_js' ) );
	}

	/**
	 * Enqueue the CSS
	 *
	 * @return void
	 */
	public function wc_tweaks_css() {
		wp_enqueue_style( 'wct-css', plugins_url( '/assets/css/style.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Javascript
	 *
	 * @return void
	 */
	public function wc_tweaks_js() {
		wp_enqueue_script( 'wct-js', plugins_url( '/assets/js/wct.js', __FILE__ ), array( 'jquery' ) );
	}
	
} // End Class

/**
 * The 'main' function
 *
 * @return void
 */
function wc_tweaks_main() {
	new WC_Tweaks();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'wc_tweaks_main' );
