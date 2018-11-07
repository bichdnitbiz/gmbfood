<?php
/**
 * Plugin 
 * @package Beau-Core
 * @subpackage Core
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! class_exists( 'BeauCore_Plugin' ) ) {
    /**
     * The main fusion-core class.
     */
    class BeauCore_Plugin {

        /**
         * Plugin version, used for cache-busting of style and script file references.
         *
         * @since   1.0.0
         * @var  string
         */
        const VERSION = '1.0.0';

        /**
         * Instance of the class.
         *
         * @static
         * @access protected
         * @since 1.0.0
         * @var object
         */
        protected static $instance = null;

        /**
         * JS folder URL.
         *
         * @static
         * @access public
         * @since 1.0.0
         * @var string
         */
        public static $js_folder_url;

        /**
         * JS folder path.
         *
         * @static
         * @access public
         * @since 1.0.0
         * @var string
         */
        public static $js_folder_path;

        /**
         * Initialize the plugin by setting localization and loading public scripts
         * and styles.
         *
         * @access private
         * @since 1.0.0
         */
        private function __construct() {
            self::$js_folder_url = BEAU_CORE_URL . 'assets/js';
            self::$js_folder_path = BEAU_CORE_PATH . 'assets/js';
            add_action( 'after_setup_theme', array( $this, 'load_beau_core_text_domain' ) );
            add_action( 'after_setup_theme', array( $this, 'add_image_size' ) );

            $this->BeauCore_Function_Init();
            $this->BeauCore_PostType_Init();
            $this->BeauCore_Redux_Init();
            $this->BeauCore_Options_Init();
            $this->BeauCore_Widget_Init();
            $this->BeauCore_AdminScreen_Init();
            $this->BeauCore_API_Init();
            // Load scripts & styles.
            add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );

            //Register plugin meta
            add_filter( 'plugin_row_meta', [ $this, 'plugin_row_meta' ], 10, 2 );

        }

        /**
         * Register the plugin text domain.
         *
         * @access public
         * @return void
         */
        public function load_beau_core_text_domain() {
            load_plugin_textdomain( 'beau-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
        }

        /**
         * Register plugin meta
         * @access public
         * @return array
         */
        public function plugin_row_meta( $plugin_meta, $plugin_file ) {
            if ( BEAU_CORE_PLUGIN_BASE === $plugin_file ) {
                $row_meta = [
                    'docs' => '<a href="https://docs.beautheme.com/" title="' . esc_attr( __( 'View Beau Yoga Documentation', 'beau-core' ) ) . '" target="_blank">' . __( 'Docs & FAQs', 'beau-core' ) . '</a>',
                
                ];

                $plugin_meta = array_merge( $plugin_meta, $row_meta );
            }

            return $plugin_meta;
        }
        /**
         * Return an instance of this class.
         *
         * @static
         * @access public
         * @since 1.0.0
         * @return object  A single instance of the class.
         */
        public static function get_instance() {

            // If the single instance hasn't been set yet, set it now.
            if ( null === self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;

        }

        /**
         * Add image sizes.
         *
         * @access  public
         */
        public function add_image_size() {
            //add_image_size( 'full', 940, 400, true );
           
        }

        /**
         * Enqueues scripts.
         *
         * @access public
         */
        public function enqueue_styles() {

            wp_enqueue_style( 'beau-core-style', BEAU_CORE_URL.'assets/css/style.min.css','all');
        }

        /**
         * BeauCore_Function_Init
         * @access public 
         */
        public function BeauCore_Function_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/function.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/function.php');
            }

        }

        /**
         * BeauCore_PostType_Init
         * @access public 
         */
        public function BeauCore_PostType_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/class-beau-posttype.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/class-beau-posttype.php');
            }
        }
        /**
         * BeauCore_Redux_Init
         * @access public 
         */
        public function BeauCore_Redux_Init(){
            if( !class_exists( 'ReduxFramework' ) ) {
                if ( file_exists( BEAU_CORE_PATH.'/includes/libs/redux/ReduxCore/framework.php' ) ) {
                    require_once wp_normalize_path( BEAU_CORE_PATH.'/includes/libs/redux/ReduxCore/framework.php' );
                }
            }
        }
        /**
         * BeauCore_Options_Init
         * @access public 
         */
        public function BeauCore_Options_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/class-option-theme.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/class-option-theme.php');

            }

        }
         /**
         * BeauCore_Widget_Init
         * @access public 
         */
        public function BeauCore_Widget_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/class-beau-widget.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/class-beau-widget.php');

            }

        }
        /**
         * BeauCore_AdminScreen_Init
         * @access public 
         */
        public function BeauCore_AdminScreen_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/class-admin-screens.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/class-admin-screens.php');
            }

        }

        /**
         * BeauCore_API_Init
         * @access public 
         */
        public function BeauCore_API_Init(){
            if (file_exists(BEAU_CORE_PATH.'/includes/apis/mailchimp-api.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/apis/mailchimp-api.php');
            }
            if (file_exists(BEAU_CORE_PATH.'/includes/apis/twitter-api.php')) {
                include_once wp_normalize_path( BEAU_CORE_PATH.'/includes/apis/twitter-api.php');
            }
        }

    }
} // End if().
// Load the instance of the plugin.
add_action( 'plugins_loaded', array( 'BeauCore_Plugin', 'get_instance' ) );


