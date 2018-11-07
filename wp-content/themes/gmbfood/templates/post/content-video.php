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

$time_video = yoga_get_field('time_video');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('video-item col-md-4'); ?>>
	<?php if(get_the_post_thumbnail() != '') : ?>
		<div class="video-item__img">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('img-category-video'); ?>
				<span class="button-play-video"><i class="fa fa-play" aria-hidden="true"></i></span>
			</a>
		</div>
	<?php endif; ?>
	<?php if ( get_the_title()!= ''): ?>
		<h2 class="video-item__title">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	<?php endif ?>
	<?php if ( get_the_author()!= ''): ?>
		<span class="video-item__author"><?php echo esc_html__('By:', 'yoga') ?> <?php the_author() ?></span>
	<?php endif ?>
	<?php if ($time_video != ''): ?>
		<span class="video-item__time"><i class="fa fa-clock-o" aria-hidden="true"></i>   <?php echo esc_attr($time_video) ?></span>
	<?php endif ?>
	
</article><!-- #post-## -->
