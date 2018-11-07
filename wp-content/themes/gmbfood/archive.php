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
// Get the term IDs assigned to post.

$data = get_queried_object();
$terms = get_terms( 'video_category', array(
    'hide_empty' => false,
) );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="video-archive">';
    foreach ( $terms as $term ) {
    	if ($term->slug == $data->slug) {
    		$active = 'active';
    	}
    	if ($term->slug != $data->slug) {
    		$active = '';
    	}
        $i++;
        $term_list .= '<a class="'.$active.'" href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'yoga' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' / ';
        }
        else {
            $term_list .= '</p>';
        }
    }
}
?>
<?php get_header(); ?>
	<div id="content" class="container">
		<div class="title-heading padding">
			<?php 
				the_archive_title( '<h2 class="read-more__text">', '</h2>' ); 
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</div>
		<?php echo $term_list; ?>
		<?php
			if ( have_posts() ) :
				?>
				<div class="container">
					<div class="video-block row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'templates/post/content-video' );

						endwhile;
						?>
					</div>
				</div>
				<?php 
					the_posts_pagination(); 
					else :

					get_template_part( 'templates/post/content', 'none' );

			endif;
		?>
	</div>
	<?php do_action( 'yoga_after_content' ); ?>
<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
