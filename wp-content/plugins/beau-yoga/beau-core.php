<?php
/**
 * Plugin Name: Beau Yoga
 * Plugin URI: http://beautheme.com
 * Description: BeauTheme Core Plugin for BeauTheme WP Themes
 * Version: 1.0.0
 * Author: BeauTheme
 * Author URI: http://beautheme.com
 *
 * @package Beau-Core
 * @subpackage Core
 */
// Plugin Folder Path.
if ( ! defined( 'BEAU_CORE_PATH' ) ) {
    define( 'BEAU_CORE_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'BEAU_CORE_PLUGIN_BASE' ) ) {
    define( 'BEAU_CORE_PLUGIN_BASE', plugin_basename( __FILE__ ) );
}
// Plugin Folder URL.
if ( ! defined( 'BEAU_CORE_URL' ) ) {
    define( 'BEAU_CORE_URL', plugin_dir_url( __FILE__ ) );
}
//Set theme will support
$beau_theme = 'Gmbfood';
$theme_info = wp_get_theme();
if($theme_info->get('Name') != $beau_theme){
	add_action( 'admin_notices', 'beaucore_fail_theme' );
	if(!function_exists('beaucore_fail_theme')) {
		function beaucore_fail_theme() {
			global $beau_theme;
		    $message = esc_html__( 'Beau Yoga does not support the theme you are actived but only supports theme ', 'beau-core' ).$beau_theme.esc_html__( ', plugin is currently NOT ACTIVE.', 'beau-core' );
		    $html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
		    echo wp_kses_post( $html_message );
		}
	}
	return;
}
if ( ! version_compare( PHP_VERSION, '5.4', '>=' ) ) {
    add_action( 'admin_notices', 'beaucore_fail_php_version' );
} else {
    require( BEAU_CORE_PATH . 'includes/plugin.php' );
}
if (!function_exists('beaucore_fail_php_version')) {
	function beaucore_fail_php_version() {
	    $message = esc_html__( 'Beau Yoga requires PHP version 5.4+, plugin is currently NOT ACTIVE.', 'beau-core' );
	    $html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	    echo wp_kses_post( $html_message );
	}
}

