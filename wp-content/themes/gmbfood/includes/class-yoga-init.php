<?php
/**
 * yoga_Init
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
if(!class_exists('yoga_Init')) {
	class yoga_Init{
		/**
		 * The one, true instance of the yoga object.
		 *
		 * @static
		 * @access public
		 * @var null|object
		 */
		public static $instance = null;
		
		/**
		 * Constructor.
		 *
		 * @access  public
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
			add_action( 'after_setup_theme', array( $this, 'add_theme_supports' )); 
			add_action( 'widgets_init', array($this,'register_widget_sidebar_init' ));
			// Add contact methods for author page.
			add_filter( 'user_contactmethods', array( $this, 'modify_contact_methods' ) );
			// Allow shortcodes in widget text.
			add_filter( 'widget_text', 'do_shortcode' );
			// Remove post_format from preview link.
			add_filter( 'preview_post_link', array( $this, 'remove_post_format_from_link' ), 9999 );

			add_filter( 'wp_tag_cloud', array( $this, 'remove_font_size_from_tagcloud' ) );

			// Add contact methods for author page.
			add_filter( 'user_contactmethods', array( $this, 'modify_contact_methods' ) );
			// Load Script
			add_action( 'wp_enqueue_scripts', array($this,'scripts') );
			// Load styles
			add_action( 'wp_enqueue_scripts', array($this,'styles') );
			// Load logo
			add_action( 'logo-type', array($this,'option_logo') );

			// Load main menu
			add_action( 'nav-menu', array($this,'main_nav') );

			// Load Styles
			add_action( 'wp_enqueue_scripts', array($this,'styles') );
			add_action( 'admin_init', array($this,'wpdocs_theme_add_editor_styles' ));


		}

		/**
		 * Load the theme textdomain.
		 *
		 * @access  public
		 */
		public function load_textdomain() {

			// Path: wp-content/theme/languages/en_US.mo.
			$loaded = load_theme_textdomain( 'yoga', yoga::$template_dir_path . '/languages' );
		}

		/**
		 * Add theme_supports.
		 *
		 * @access  public
		 */
		public function add_theme_supports() {

			// Default WP generated title support.
			add_theme_support( 'title-tag' );
			// Default RSS feed links.
			add_theme_support( 'automatic-feed-links' );
			// Default custom header.
			add_theme_support( 'custom-header' );
			// Default custom backgrounds.
			add_theme_support( 'custom-background' );
			// Woocommerce Support.
			add_theme_support( 'woocommerce' );

			add_theme_support( 'wc-product-gallery-slider' );

			// Post Formats.
			add_theme_support( 'post-formats', array( 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );
			// Add post thumbnail functionality.
			add_theme_support( 'post-thumbnails' );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );
		}
		/**
         * register sidebar
      	* @access  public
         */
        public function register_widget_sidebar_init(){
        	register_sidebar(
		        array(
		            'name' => esc_html__('SideBar', 'yoga' ),
		            'id' => 'widget-sidebar',
		        )
		    );
        }
        /**
		 * Modifies user contact methods and adds some more social networks.
		 *
		 * @param array $profile_fields The profile fields.
		 * @return array The profile fields with additional contact methods.
		 */
		public function modify_contact_methods( $profile_fields ) {
			// Add new fields.
			$profile_fields['author_email'] = 'Email (Author Page)';
			$profile_fields['author_facebook'] = 'Facebook (Author Page)';
			$profile_fields['author_twitter']  = 'Twitter (Author Page)';
			$profile_fields['author_linkedin'] = 'LinkedIn (Author Page)';
			$profile_fields['author_dribble']  = 'Dribble (Author Page)';
			$profile_fields['author_gplus']    = 'Google+ (Author Page)';
			$profile_fields['author_custom']   = 'Custom Message (Author Page)';

			return $profile_fields;
		}
		/**
		 * Register navigation menus.
		 *
		 * @access  public
		 */
		public function register_nav_menus() {
			register_nav_menus( array('main_navigation' => esc_html__('Main Navigation', 'yoga' ),));
		}

		/**
		 * Registers an editor stylesheet for the theme.
		 */
		function wpdocs_theme_add_editor_styles() {
		    add_editor_style( 'yoga-custom.css' );
		}

		/**
		 * @return [array]
		 */
		public function register_font() {
			$fonts_url = '';
			$fonts     = array();
			$subsets   = 'latin,latin-ext';

			/*
			 * Translators: If there are characters in your language that are not supported
			 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Marmelad font: on or off', 'yoga' ) ) {
				$fonts[] = 'Marmelad:300,300italic,400,400italic,700,700italic';
			}

			/*
			 * Translators: If there are characters in your language that are not supported
			 * by Montserrat Alternates, translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Montserrat Alternates font: on or off', 'yoga' ) ) {
				$fonts[] = 'Montserrat Alternates:100,300,300italic,400,400italic,700,700italic';
			}

			/*
			 * Translators: To add an additional character subset specific to your language,
			 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
			 */
			$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'yoga' );

			if ( 'cyrillic' == $subset ) {
				$subsets .= ',cyrillic,cyrillic-ext';
			} elseif ( 'greek' == $subset ) {
				$subsets .= ',greek,greek-ext';
			} elseif ( 'devanagari' == $subset ) {
				$subsets .= ',devanagari';
			} elseif ( 'vietnamese' == $subset ) {
				$subsets .= ',vietnamese';
			}

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => urlencode( implode( '|', $fonts ) ),
					'subset' => urlencode( $subsets ),
				), '//fonts.googleapis.com/css' );
			}

			return $fonts_url;
		}

		/**
		 * Function scripts js
		 */
		function scripts(){

			wp_enqueue_script( 'boostrap', get_theme_file_uri( 'assets/js/bootstrap.min.js' ),array('jquery'),filemtime(get_theme_file_path('assets/js/bootstrap.min.js' )),true);
			//Slick slide
		    wp_enqueue_script( 'slick-min', ( '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js' ),array('jquery'),('cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js' ),true);

			//js main
    		wp_enqueue_script( 'yoga', get_theme_file_uri( 'assets/js/yoga.js' ),array('jquery'),filemtime(get_theme_file_path('assets/js/yoga.js' )),true);

    		//js header fixed
    		wp_enqueue_script( 'header-fixed', get_theme_file_uri( 'assets/js/yoga-header-fixed.js' ),array('jquery'),filemtime(get_theme_file_path('assets/js/yoga-header-fixed.js' )),true);

			// js bootstrap
		    wp_enqueue_script( 'tether-min', get_theme_file_uri( 'assets/js/tether.min.js' ),array('jquery'),filemtime(get_theme_file_path('assets/js/tether.min.js' )),true);
			

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Funcion styles
		 */
		function styles(){
			//slick slide css
			wp_enqueue_style( 'slick', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css", array()  );
			wp_enqueue_style( 'slick-theme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css", array()  );
			//bootstrap css
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/sass/bootstrap4/bootstrap.css", array()  );
			//Main style
			wp_enqueue_style( 'yoga-style', get_stylesheet_uri() );
			//Font style
			wp_enqueue_style( 'yoga-fonts', $this->register_font(), array(), null );
			//Icon beau
			wp_enqueue_style( 'font-icobeau', get_template_directory_uri() . "/assets/css/IcoBeau.css", array()  );
			//Font-awesome
    		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . "/assets/css/font-awesome.min.css", array()  );
			//animate css
			wp_enqueue_style( 'animate', get_template_directory_uri() . "/assets/css/animate.css", array()  );
		}

		/**
		 * Funcion GetOption item
		 * @param string - $option
		 * @return array
		 */
		function GetOption($option){
		    global $beau_option;
		    if (isset($beau_option[$option])) {
		        $option =  $beau_option[$option];
		    }else{
		        $option = NULL;
		    }
		    return $option;
		}

	    /**
		 * option_logo
		 * @param string $logoTYpe
		 * @return array
		 */
		function option_logo($logoTYpe='main_logo'){
		    $store_logo = $themeOptionLogo = $store_logo_img ='';
		    switch ($logoTYpe) {
		        case 'main_logo':
		            $themeOptionLogo = 'yoga-logo';
		            break;
		        case 'header_fixed_logo':
		            $themeOptionLogo = 'yoga-logo-fixed';
		            break;
		            case 'main_logo':
		            $themeOptionLogo = 'main_logo';
		            break;
		        case 'mobile_logo':
		            $themeOptionLogo = 'yoga-logo-mobile';
		            break;

		        default:
		            $themeOptionLogo = 'yoga-logo';
		            break;
		    }
		    if (yoga_get_option($themeOptionLogo)!= NULL) {
		        $store_logo_img = yoga_get_option($themeOptionLogo);
		        $store_logo = $store_logo_img['url'];
		    }
		    if (function_exists('yoga_get_field')) {
		        $enable_customLogo = yoga_get_field('main_logo', get_the_ID());
		        if ($enable_customLogo) {
		            $store_logo = yoga_get_field($logoTYpe, get_the_ID());
		        }
		    }
		    if ($store_logo=='') {
		        $store_logo = get_template_directory_uri().'/assets/images/logo.png';
		    }
		    if ($logoTYpe == 'header_fixed_logo') {
		    	$store_logo = get_template_directory_uri().'/assets/images/logo-sticky.png';
		    }
		?>
		    <a class="<?php echo esc_attr($logoTYpe) ?>" href="<?php echo esc_url(home_url( '/' ));?>">
			<svg width="150px" height="52px" viewBox="0 0 116 40">
				<g stroke="none" stroke-width="0" fill-rule="evenodd" fill="#414042">
				<path d="M88.2730275,4.03155963 L84.3669725,4.03155963 L84.3669725,0.000366972477 L88.2730275,0.000366972477 L92.3042202,0 L96.2106422,0.000366972477 L96.2106422,4.03155963 L92.3042202,4.03155963 L92.3042202,15.8179817 L88.2730275,15.8179817 L88.2730275,4.03155963 Z M76.4572477,15.8179817 L76.4572477,0 L80.4884404,0 L80.4884404,15.8179817 L76.4572477,15.8179817 Z M93.5177982,39.5445872 L93.5177982,23.7266055 L97.5489908,23.7266055 L97.5489908,39.5445872 L93.5177982,39.5445872 Z M114.35545,23.726789 L114.35545,27.2699083 L106.784073,35.8750459 L114.35545,35.8750459 L114.35545,39.5444037 L101.427009,39.5444037 L101.427009,35.980367 L108.89233,27.3965138 L101.91178,27.3965138 L101.91178,23.726789 L114.35545,23.726789 Z M0,26.5630092 L5.47266055,21.0903486 L21.0917431,21.0892477 L21.0917431,39.5446606 L0,39.5446606 L0,26.5630092 Z M54.3576514,0.000183486239 C59.282422,0.000183486239 63.2747156,3.99247706 63.2747156,8.91724771 C63.2747156,14.1851376 59.0046239,18.4552294 53.7371009,18.4552294 L23.7282936,18.4552294 L23.7282936,0.000183486239 L54.3576514,0.000183486239 Z M54.3576514,21.0905321 C59.282422,21.0905321 63.2747156,25.0828257 63.2747156,30.0075963 C63.2747156,35.2754862 59.0046239,39.545578 53.7371009,39.545578 L23.7282936,39.545578 L23.7282936,21.0905321 L54.3576514,21.0905321 Z M87.3195229,31.5936514 C88.4050275,31.6644771 89.1609908,32.0226422 89.5841101,32.6692477 C89.9088807,33.1896147 90.0707156,34.011633 90.0707156,35.1367706 C90.0707156,36.9503486 89.6270459,38.1668624 88.7378716,38.784844 C88.0314495,39.2912661 86.7470459,39.5444771 84.8839266,39.5444771 L76.4571376,39.5444771 L76.4571376,23.7268624 L84.7995229,23.7268624 C86.5353028,23.7268624 87.7631927,23.9661284 88.4835596,24.4442936 C89.3727339,25.0483303 89.8171376,26.1595229 89.8171376,27.7760367 C89.8171376,28.8868624 89.6615413,29.7033761 89.3518165,30.2226422 C88.9841101,30.8696147 88.305945,31.2703486 87.3195229,31.424844 L87.3195229,31.5936514 Z M85.1973211,35.7481468 C85.4864954,35.5235596 85.6314495,35.1019083 85.6314495,34.4831927 C85.6314495,33.8215413 85.4688807,33.3936514 85.1441101,33.1969541 C84.9037431,33.0560367 84.4450275,32.985945 83.7675963,32.985945 L80.4857615,32.985945 L80.4857615,36.0853945 L83.6831927,36.0853945 C84.4035596,36.0853945 84.9074128,35.9734679 85.1973211,35.7481468 Z M80.4857615,27.185945 L80.4857615,30.0538349 L83.5345688,30.0538349 C84.2824587,30.0538349 84.7764037,29.958789 85.0175046,29.7694312 C85.2571376,29.5793394 85.3771376,29.1683303 85.3771376,28.5353028 C85.3771376,28.0292477 85.305945,27.6846606 85.1653945,27.5019083 C84.9819083,27.2912661 84.6072294,27.185945 84.0435596,27.185945 L80.4857615,27.185945 Z M0,0 L21.0917431,0 L21.0917431,18.4554128 L4.38275229,18.4554128 L0,22.8381651 L0,0 Z M2.63633028,15.8190826 L18.4550459,15.8190826 L18.4550459,2.63669725 L2.63633028,2.63669725 L2.63633028,15.8190826 Z" id="itbiz"></path>
				</g>
			</svg>
			</a>
		<?php
		}

		public function remove_font_size_from_tagcloud( $tagcloud ) {
	        return preg_replace( '/ style=(["\'])[^\1]*?\1/i', '', $tagcloud, -1 );
	    }

	    public function remove_post_format_from_link( $url ) {
	        $url = remove_query_arg( 'post_format', $url );
	        return $url;
	    }
        public static function get_instance() {
	        if ( null === self::$instance ) {
	            self::$instance = new yoga_Init();
	        }
	        return self::$instance;
	    }
	    /**
		 * Show menu by theme location
		 *
		 */
		public function main_nav( $slug ) {
		    $menu = array(
		      'theme_location' => $slug,
		      'menu_class'    => 'yoga-menu',
		      'menu_id'       => '',
		      'container' => 'nav',
		      'container_class' => $slug,
		    );
		    wp_nav_menu( $menu );
		}

	}
}