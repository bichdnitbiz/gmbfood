<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Yoga
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item blog-item--vertical blog-archive col-lg-4  col-sm-6'); ?>>
	
	<?php if ( is_sticky() && is_home() ) :?>
		<div class="sticky-post">
			<span><?php echo esc_html__('Stick','yoga'); ?></span>
		</div>
	<?php endif;?>
	
	<?php if(get_the_post_thumbnail() != '') : ?>
		<div class="blog-item__image">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('img_size_blog'); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="blog-item__info">
		<p data-color="date" class="post-date"><?php echo get_the_date('l / m.j') ?></p>

		<h5 class="color--brand font-weight-bold blog-item__title">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title color--brand font-weight-bold blog-item__title">', '</h1>' );
				} else{
					the_title( '<h5 class="color--brand font-weight-bold blog-item__title" ><a data-color="title" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				}
			?>
		</h5>

        <p  data-color="excerpt" class="heading--sub3 blog-item__excerpt">
             <?php echo get_the_excerpt();?>
        </p>

        <div class="author-item-blog">
        	<p><?php echo esc_html__('By:','yoga'); ?> <?php the_author(); ?></p>
        </div>
        
        <div class="category-item-blog">
        	<?php echo esc_html__('Category:','yoga'); ?>
			<?php the_category( ', ' ); ?>
        </div>

        <?php $tags = wp_get_post_tags(get_the_ID()); ?>
		<?php if(!empty($tags)) : ?>
			<div class="tag-item-blog">
				<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
			</div>
		<?php endif; ?>
        
		<div class="color--primary d-inline-block blog-item_readmore">
			 <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Readmore', 'yoga') ?></a>
		</div>

	</div>

</article><!-- #post-## -->
