<?php if (get_the_post_thumbnail() != ''): ?>
	<div class="blog-detail__image">
		<?php the_post_thumbnail('image_size_blog'); ?>
	</div>
<?php endif ?>
<div class="blog-detail">
	<div class=" container blog-detail__wrapper">
		<div class="blog-detail__inner">
			<?php if (get_the_date() != ''): ?>
				<p class="blog-detail__date">
					<?php the_date(); ?>
				</p>	
			<?php endif ?>
			<?php if (get_the_date() != ''): ?>
				<div class="blog-detail_title">
					<?php the_date(); ?>	
				</div>
			<?php endif ?>
			<?php if (get_the_title() != ''): ?>
				<h2 class="blog-detail_title">
					<?php the_title();?>	
				</h2>
			<?php endif ?>

			<?php if (get_the_author() != ''): ?>
				<div class="blog-detail__author">
					 <?php echo get_avatar(get_the_author_meta( 'ID' ),40); ?> 
					<?php echo esc_html__('by ', 'yoga') ?><span class="name-author"><?php echo get_the_author(); ?></span>
				</div>
			<?php endif ?>

			<div class="blog-detail__content">
				<div class="tags-share__share pull-left">
					<?php  yoga_social_share_text(); ?>
	       		</div>
				<div class="entry-content">
					<?php 
						the_content();
					    wp_link_pages( array(
					        'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
					        'after'       => '</div>',
					        'link_before' => '<span>',
					        'link_after'  => '</span>',
					    ) );
					?>
				</div>
				<div class="blog-detail__tag">
					<?php the_tags('',''); ?>
		        </div>
		        <?php 
		        $next_post = get_next_post();
		        if (!empty( $next_post )): ?>
		        	<div class="blog-detail__next">
						<div class="blog-detail__text-next"><?php esc_html_e('NEXT POST', 'yoga') ?></div>
						<?php
							if (!empty( $next_post )): ?>
							  <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
						<?php endif; ?>
					</div>
		        <?php endif ?>
			</div>
		</div>
	</div>
</div>
<div class=" container">
	<div class="blog-detail__inner">
		<?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
</div>