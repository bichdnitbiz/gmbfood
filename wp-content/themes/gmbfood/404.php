<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package yoga
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="section-404">
			    <div class="container">
			        <div class="box-text404">
			            <div class="title-box404"><?php esc_html_e('Error! - 404 Not found', 'yoga'); ?></div>
			            <div class="text-404"><?php esc_html_e('the resource requested could not be found on this server', 'yoga'); ?></div>
			            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e('Home Page', 'yoga'); ?>" class="btn btn-primary"><?php esc_html_e('Home page', 'yoga'); ?></a>
			        </div>
			    </div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

