<?php
/**
 * The main template file
 *
 * @package yoga
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
	<div id="content" class="container">
		<div class="title-heading">
			<h2 class="read-more__text"><?php esc_html_e('Search results for: ','yoga')?><br><?php echo esc_html( get_search_query() ); ?></h2>		
			
		</div>
		<div id="primary" class="content-area">
			<main id="main" class="site-main container" role="main">

			<?php
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
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<?php do_action( 'yoga_after_content' ); ?>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
