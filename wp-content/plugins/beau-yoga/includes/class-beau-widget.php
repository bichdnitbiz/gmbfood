<?php
/**
 * Settings Widgets
 * @package Beau-Core
 * @subpackage Core
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! class_exists( 'BeauCore_Widget' ) ) {
	/**
     * 
     */
	class BeauCore_Widget {
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
         * Widget Init
         *
         * @static
         * @access public
         * @since 1.0.0
         * @var string
         */
        public $wdget_lists;

   //  	public function __construct() {
   //  		$this->wdget_lists = array(
   //              'product',   
   //              'footer'    
   //          );
			// $beau_option = get_option( 'beau_option' );
			// foreach ( $this->wdget_lists as $wdget_list ) {
			// 	if($beau_option['widget_'.$wdget_list.'_init'] == true) {
			// 		 add_action( 'widgets_init', array($this,'register_widget_'.$wdget_list ));
			// 	}
			// }
			
   //  		$this->init();
           
   //      }
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
        private function init(){
        	foreach ( glob( BEAU_CORE_PATH . 'includes/widgets/widget-*.php', GLOB_NOSORT ) as $filename ) {
				include wp_normalize_path( $filename );
			}
        }
        /**
         * register_widget_sidebar
         * @return 
         */
        public function register_widget_product(){
        	register_sidebar(
		        array(
		            'name' => esc_html__('Product', 'beau-core' ),
		            'id' => 'widget-product',
		        )
		    );
        }

        public function register_widget_footer(){
            register_sidebar(
                array(
                    'name' => esc_html__('footer', 'beau-core' ),
                    'id' => 'widget-footer',
                )
            );
        }
	}
	//Load 
	new BeauCore_Widget();
}