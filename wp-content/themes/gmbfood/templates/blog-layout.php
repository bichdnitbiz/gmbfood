<?php
/**
 * The main template file
 *
 * @package yoga
 * @subpackage Templates
 */

if ( have_posts() ) :
	?>
	<div class="row content-archive">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'templates/post/content', get_post_format() );

		endwhile;
		?>
	</div>
	<?php 
		the_posts_pagination(); 
		else :

		get_template_part( 'templates/post/content', 'none' );

endif;
?>