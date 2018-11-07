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

		get_template_part( 'templates/custom-single/detail-trainer' );
		

		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;

		// the_post_navigation();

	endwhile; // End of the loop.
get_footer();
