<section class="no-results not-found">
		<div class="title-box book-center text-title text-3x title-post"><span><?php esc_html_e( 'Nothing Found', 'yoga' ); ?></span></div>
		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                <p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'yoga' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
            <?php elseif ( is_search() ) : ?>
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'yoga' ); ?></p>
            <?php else : ?>
                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'yoga' ); ?></p>
            <?php endif; ?>
            <?php get_search_form(); ?>
		</div><!-- .page-content -->
</section><!-- .no-results -->