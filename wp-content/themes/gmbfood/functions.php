<?php
/**
 * Extra files & functions are hooked here.
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
/**
 * Include Beau-Library.
 */
include_once wp_normalize_path( get_template_directory() . '/includes/libs/beau-library.php' );
/**
 * Include the main yoga class.
 */
include_once wp_normalize_path( get_template_directory() . '/includes/class-yoga.php' );


/**
 * Define basic properties in the yoga class.
 */
yoga::$template_dir_path   = wp_normalize_path( get_template_directory() );
yoga::$template_dir_url    = get_template_directory_uri();
yoga::$stylesheet_dir_path = wp_normalize_path( get_stylesheet_directory() );
yoga::$stylesheet_dir_url  = get_stylesheet_directory_uri();

/**
 * Include the autoloader.
 */
include_once yoga::$template_dir_path . '/includes/class-yoga-autoload.php';


/**
 * Instantiate the autoloader.
 */
new yoga_Autoload();
/**
 * Instantiates the yoga class.
 * Make sure the class is properly set-up.
 * The yoga class is a singleton
 * so we can directly access the one true yoga object using this function.
 *
 * @return object yoga
 */
// @codingStandardsIgnoreLine
function yoga() {
	return yoga::get_instance();
}
yoga();
/*
 * Include the TGM configuration
 * We only need this while on the dashboard.
 */
if ( is_admin() ) {
	require_once yoga::$template_dir_path . '/includes/class-tgm-plugin-activation.php';
	require_once yoga::$template_dir_path . '/includes/yoga-tgm.php';
}
/**
 * Set the $content_width global.
 */
global $content_width;
if ( ! is_admin() && ( ! isset( $content_width ) || empty( $content_width ) ) ) {
	$content_width = (int) yoga()->get_content_width();
}
function yoga_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'yoga' ) . '</span>', $tags_list ); // WPCS: XSS OK.
            
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
    		/* translators: %s: post title */
    		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'yoga' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
    		echo '</span>';
   
	}
    wp_reset_postdata();
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'yoga' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/*
Register Navbar
*/
register_nav_menu('navbar', __('Main menu', 'yoga'));

//yoga_get_option
function yoga_get_option($key=''){
	global $beau_option;
	if(empty($key)) return false;
	$pId = get_the_ID();
	$pageOption = get_post_meta( $pId, $key, TRUE ); //page option
	$themeOption = isset($beau_option[$key]) ? $beau_option[$key] : '';

	/* Page option will be prefer than theme optin */
	if($pageOption) return $pageOption;
	if($themeOption) return $themeOption;
	return false;
}


if(!function_exists('yoga_html_wpkses')) {
    function yoga_html_wpkses($content=''){
        $kses = array(
            //formatting
            'strong' => array(),
            'em'     => array(),
            'b'      => array(),
            'br'      => array(),
            'i'      => array(),
            'ul'     => array(),
            'li'     => array(),
            'p'     => array(),
            //links
            'a'     => array(
                'href' => array()
            ),
            //Img
            'img'   =>  array(
                'src'   =>  array(),
                'class' =>  array(),
                'alt'   =>  array(),
                'width' =>  array(),
                'height'=>  array(),
                ),
            'video' => array(
                'class' =>  array(),
                'id' =>  array(),
                'width' =>  array(),
                'height' =>  array(),
                'preload' =>  array(),
                'controls' =>  array(),
                ),
            'source'    =>  array(
                'type'  =>  array(),
                'src'  =>  array(),
                ),
        );
        if($content != NULL) {
            return wp_kses($content,$kses);
        }
    }
}



/**
 * [yoga_get_post_id
 * @param  integer $post_id
 * @return   integer $post_id
 */
function yoga_get_post_id( $post_id = 0 ) {
    if( !$post_id ) {
        $post_id = (int) get_the_ID();
        if( !$post_id ) {
            $post_id = get_queried_object();
        }
    }
    if( is_object($post_id) ) {
        // post
        if( isset($post_id->post_type, $post_id->ID) ) {
            $post_id = $post_id->ID;
        // user
        } elseif( isset($post_id->roles, $post_id->ID) ) {
            $post_id = 'user_' . $post_id->ID;
        // term
        } elseif( isset($post_id->taxonomy, $post_id->term_id) ) {
            $post_id = $post_id->taxonomy . '_' . $post_id->term_id;
        // comment
        } elseif( isset($post_id->comment_ID) ) {
            $post_id = 'comment_' . $post_id->comment_ID;
        // default
        } else {
            $post_id = 0;
        }
    }
    // return
    return $post_id;
}

/**
 * get_field
 * @param string $selector
 * @param int $post_id
 * @param bolean $format_value
 * @return array
 */
function yoga_get_field($selector, $post_id = false, $format_value = true ) {
    $post_id = yoga_get_post_id( $post_id );
    if($selector != NULL) {
        if(function_exists('get_field')){
            return get_field($selector, $post_id, $format_value);
        }
        return false;
    }
    return false;
}

class yoga_walker_nav_menu extends Walker_Nav_menu {
    var $refine;

    function start_lvl( &$output, $depth = 0, $args = array() ){ // ul
        $indent = str_repeat("\t",$depth); // indents the outputted HTML
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span

        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-menu';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

        $item_output = $args->before;
        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }
}



/**
 * return share social
 * @return return social share text
 */
function yoga_social_share_text()
{
    do_action('yoga_before_share');
    get_template_part('templates/social-share-text');
    do_action('yoga_after_share');
}
add_image_size( 'img_detail_trainer', 690, 880);
add_image_size( 'img_size_video', 450, 465);
add_image_size('image_size_blog',1920,800);
add_image_size( 'img_size_blog', 380, 235);
add_image_size('img_background_video',1410,775);
 /**
 * Return list tags
 * @param  string $before before tag
 * @param  string $midle  midle loop
 * @param  string $after  after loop tag
 * @return string tag list
 */
function yoga_the_tags($before='',$midle='', $after='')
{
    do_action('yoga_before_tags');
    the_tags($before, $midle,$after );
    do_action('yoga_after_tags');
}

?>
 

