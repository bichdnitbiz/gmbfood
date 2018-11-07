<?php
/**
 * Template Name: Canvas
 *
 * @package Yoga
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); 
while ( have_posts() ) : the_post();
	the_content();
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
    wp_reset_postdata();
endwhile;

do_action( 'yoga_after_content' ); ?>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */