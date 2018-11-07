<?php
/**
 * yoga
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package yoga
 * @subpackage Core
 * @since 1.0
 * @version 1.0
 */
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if(!class_exists('yoga')) {
	class yoga {
		/**
		 * The template directory path.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $template_dir_path = '';

		/**
		 * The template directory URL.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $template_dir_url = '';

		/**
		 * The stylesheet directory path.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $stylesheet_dir_path = '';

		/**
		 * The stylesheet directory URL.
		 *
		 * @static
		 * @access public
		 * @var string
		 */
		public static $stylesheet_dir_url = '';
		/**
		 * The one, true instance of the yoga object.
		 *
		 * @static
		 * @access public
		 * @var null|object
		 */
		public static $instance = null;
		/**
		 * The option name
		 *
		 * @static
		 * @access private
		 * @var string
		 */
		private static $option_name = 'beau_option';
		/**
		 * yoga_Settings.
		 *
		 * @access public
		 * @var object
		 */
		public $settings;
		/**
		 * yoga_Options.
		 *
		 * @static
		 * @access public
		 * @var null|object
		 */
		public static $options = null;
		/**
		 * Bundled Plugins.
		 *
		 * @static
		 * @access public
		 * @var array
		 */
	
		public static $bundled_plugins = array(
			'beau_core' => array(
				'slug'    => 'beau-core',
				'name'    => 'Beau Core',
				'version' => '1.0.0',
			),
			'slider_revolution' => array(
				'slug'    => 'revslider',
				'name'    => 'Slider Revolution',
				'version' => '5.4.2',
			),
		);
		/**
		 * yoga_Init.
		 *
		 * @access public
		 * @var object
		 */
		public $init;
		/**
		 * Access the single instance of this class.
		 *
		 * @return yoga
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new yoga();
			}
			return self::$instance;
		}

		/**
		 * Shortcut method to get the settings.
		 */
		public static function settings() {
			return self::get_instance()->settings->get_all();
		}
		/**
		 * The class constructor
		 *
		 * @access private
		 */
		private function __construct() { 
			// Set static vars.
			if ( '' === self::$template_dir_path ) {
				self::$template_dir_path = wp_normalize_path( get_template_directory() );
			}
			if ( '' === self::$template_dir_url ) {
				self::$template_dir_url = get_template_directory_uri();
			}
			if ( '' === self::$stylesheet_dir_path ) {
				self::$stylesheet_dir_path = wp_normalize_path( get_stylesheet_directory() );
			}
			if ( '' === self::$stylesheet_dir_url ) {
				self::$stylesheet_dir_url = get_stylesheet_directory_uri();
			}

			//Load 
			$this->init     	= new yoga_Init();
		}
		// Get content with
		public function get_content_width( $site_width = 0 ) {
			return 900;

		}

	}
}