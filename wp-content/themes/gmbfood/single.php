<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yoga
 * @since 1.0
 * @version 1.0
 */

get_header();
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		// get_template_part( 'templates/post/content', get_post_format() );
	get_template_part( 'templates/custom-single/single' );

	endwhile; // End of the loop.
get_footer();
