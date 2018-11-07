<?php
/**
 * Admin Screens 
 * @package Beau-Core
 * @subpackage Core
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! class_exists( 'BeauCore_AdminScreen' ) ) {
    /**
     * The main beau-core class.
     */
    class BeauCore_AdminScreen {
		/**
         * Instance of the class.
         *
         * @static
         * @access protected
         * @since 1.0.0
         * @var object
         */
        protected static $instance = null;

        public function __construct() {

        	add_action( 'wp_before_admin_bar_render', array($this,'toolbar_admin' ));
        	add_action('admin_menu',array($this,'admin_menu'));

        }
        private function add_wp_toolbar( $title, $parent = false, $href = '', $meta = array(), $id_element = ''){
		    global $wp_admin_bar;

		    if ( current_user_can( 'edit_theme_options' ) ) {
		        if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
		            return;
		        }
		        // Set custom ID
		        if ( $id_element ) {
		            $id_element = $id_element;
		        } else {
		            $id_element = strtolower( str_replace( ' ', '-', $title ) );
		        }

		        $meta = strpos( $href, site_url() ) !== false ? array() : array( 'target' => '_blank' ); // open in new tab
		        $meta = array_merge( $meta, $meta );

		        $wp_admin_bar->add_node( array(
		            'parent' => $parent,
		            'id'     => $id_element,
		            'title'  => $title,
		            'href'   => $href,
		            'meta'   => $meta,
		        ) );
		    }
		}
		public function toolbar_admin(){
		    global $wp_admin_bar;

		    if ( current_user_can( 'edit_theme_options' ) ) {

		        $registration_complete  = false;
		        $tf_username            = isset( $beau_core_options['beau_core_username'] ) ? $beau_core_options['beau_core_username'] : '';
		        $cus_api                = isset( $beau_core_options['beau_core_api'] ) ? $beau_core_options['beau_core_api'] : '';
		        $cus_purchase_code      = isset( $beau_core_options['beau_core_purchase_code'] ) ? $beau_core_options['beau_core_purchase_code'] : '';
		        if ( '' !== $tf_username && '' !== $tf_api && '' !== $tf_purchase_code ) {
		            $registration_complete = true;
		        }
		        $parent_menu_title = '<span class="dashicons-admin-generic"></span> <span class="ab-label">Beau</span>';
		        $this->add_wp_toolbar( $parent_menu_title, false, admin_url( 'admin.php?page=beau' ), array( 'class' => 'beau-core-menu' ), 'beau-core' );
		        $this->add_wp_toolbar( esc_html__( 'Wellcome', 'beau-core' ), 'beau-core', admin_url( 'admin.php?page=beau' ) );
		    }
		}
		public function admin_menu(){
		    if ( current_user_can( 'edit_theme_options' ) ) {
		        //Change add_theme_page for add_menu_page and add_sub_menu_page
		        $welcome_screen = add_menu_page( 'Beau', 'Beau', 'administrator', 'beau', array($this,'welcome_screen'), 'dashicons-admin-generic', 3 );

		        // $plugins 	= add_theme_page(esc_html__( 'Plugins Require', 'beau' ),'beau-plugins', 'beau_core_plugins_tab' );
// 
		        // add_action( 'admin_print_scripts-' . $beau_core_welcome_screen,array($this,'beau_core_welcome_scripts' ));
		        // add_action( 'admin_print_scripts-' . $support, 'beau_core_support_screen_scripts' );
		        // add_action( 'admin_print_scripts-' . $demos, 'beau_core_demos_screen_scripts' );
		        // add_action( 'admin_print_scripts-' . $plugins, 'beau_core_plugins_screen_scripts' );
		    }
		}
		public function welcome_screen() {
			include_once(BEAU_CORE_PATH. '/includes/admin-screens/wellcome.php');
		}

    }
    //Load 
     new BeauCore_AdminScreen();
}
