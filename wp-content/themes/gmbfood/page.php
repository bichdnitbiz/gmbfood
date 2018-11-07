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
	<div id="content-page-default" class="container">
		<div class="title-heading">
			<h2 class="read-more__text"><?php the_title();?></h2>
		</div>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post();
				the_content();
			    wp_link_pages( array(
			        'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
			        'after'       => '</div>',
			        'link_before' => '<span>',
			        'link_after'  => '</span>',
			    ) );
			    wp_reset_postdata();
			endwhile;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			
			do_action( 'yoga_after_content' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<?php do_action( 'yoga_after_content' ); ?>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
