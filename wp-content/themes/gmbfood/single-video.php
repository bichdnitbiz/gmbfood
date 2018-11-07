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
	
		get_template_part( 'templates/custom-single/detail-video' );
		

		// If comments are open or we have at least one comment, load up the comment template.
		?>
			<div class="container">
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
			</div>
		<?php

	endwhile; // End of the loop.
get_footer();
