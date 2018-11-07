<?php
/**
 * Settings Custom Post Type 
 * @package Beau-Core
 * @subpackage Core
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! class_exists( 'BeauCore_PostType' ) ) {
    /**
     * The main beau-core class.
     */
    class BeauCore_PostType {
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

            // Register videos
            add_action( 'init', array( $this, 'videos_post_types' ) );

            // Register trainers
            add_action( 'init', array( $this, 'trainers_post_types' ) );

            //Register field afc.
            $this->init_acf();

            //Register twitter api.
            $this->init_twitter();
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
		 * Register field afc.
		 *
		 * @access public
		 * @since 1.0.0
		 */
		public function init_acf() {
			if( !function_exists( 'register_field_group' ) ) {
			    if (file_exists(BEAU_CORE_PATH. '/includes/libs/advanced-custom-fields/acf.php')) {
			        require_once(BEAU_CORE_PATH. '/includes/libs/advanced-custom-fields/acf.php');
			    }
			}
			foreach ( glob( BEAU_CORE_PATH . 'includes/acf/field-*.php', GLOB_NOSORT ) as $filename ) {
				include wp_normalize_path( $filename );
			}
		}

		/**
		 * Register twitter.
		 *
		 * @access public
		 * @since 1.0.0
		 */
		public function init_twitter() {
			if( !function_exists( 'twitter_api_get' ) ) {
			    if (file_exists(BEAU_CORE_PATH. '/includes/libs/wp-twitter-api/twitter-api.php')) {
			        require_once(BEAU_CORE_PATH. '/includes/libs/wp-twitter-api/twitter-api.php');
			    }
			}
		}


		/**
		 * Register custom post types.
		 *
		 * @access public
		 * @since 3.1.0
		 */
		public function videos_post_types() {
			register_post_type(
				'video',
				array(
					'labels' => array(
						'name'          => _x( 'Videos', 'Post Type General Name', 'beau-core' ),
						'singular_name' => _x( 'videos', 'Post Type Singular Name', 'beau-core' ),
						'add_new_item'  => _x( 'Add New Video Post', 'beau-core' ),
						'edit_item'  => _x( 'Edit Video Post', 'beau-core' ),
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array(
						'slug' => 'video-items',
					),
					'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
					'can_export' => true,
					'menu_icon'           => 'dashicons-format-video',
				)
			);
			register_taxonomy(
				'video_category',
				'video',
				array(
					'hierarchical' => true,
					'label'        => 'Video Categories',
					'query_var'    => true,
					'rewrite'      => true,
				)
			);
		}
		/**
		 * Register custom post types.
		 *
		 * @access public
		 * @since 3.1.0
		 */
		public function trainers_post_types() {
			register_post_type(
				'yoga_trainer',
				array(
					'labels' => array(
						'name'          => _x( 'Trainers', 'Post Type General Name', 'beau-core' ),
						'singular_name' => _x( 'Trainers', 'Post Type Singular Name', 'beau-core' ),
						'add_new_item'  => _x( 'Add New Trainer Post', 'beau-core' ),
						'edit_item'  => _x( 'Edit Trainer Post', 'beau-core' ),
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array(
						'slug' => 'trainer-items',
					),
					'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes'),
					'can_export' => true,
					'menu_icon'           => 'dashicons-id-alt',
				)
			);
		}
    }
   //Load 
   new BeauCore_PostType();
}
