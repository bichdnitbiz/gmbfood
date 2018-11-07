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
<div class="trainer-dt">
	<div class="container">
		<?php
			if(yoga_get_field('number_class') != ''){
				echo yoga_get_field('number_class');
			}
		 ?>
		<div class="trainer-dt__block row">
			<div class="trainer-dt__left col-sm-6">

				<?php if (get_the_title() != ''): ?>
					<div class="trainer-dt__title">
						<?php the_title(); ?>
					</div>
				<?php endif ?>

				<?php if (yoga_get_field('job') != ''): ?>
					<div class="trainer-dt__subtitle">
						<?php echo yoga_get_field('job'); ?>
					</div>
				<?php endif ?>

				<?php if (yoga_get_field('excerpt') != ''): ?>
					<div class="trainer-dt__subcontent">
						<?php echo yoga_get_field('excerpt'); ?>
					</div>
				<?php endif ?>

			</div>

			<div class="trainer-dt__right col-sm-6">
				<div class="back-trainer">
					<a href="#"><?php esc_html_e('Back to  trainer','yoga'); ?></a>
				</div>
				<?php if( has_post_thumbnail() ){
					the_post_thumbnail('img_detail_trainer');
				}?>
			</div>

		</div>
	</div>
	<div class="container"> 
		<div class="trainer-dt__block row">
			<?php if (yoga_get_field('trainer_content') !=''): ?>
				<div class="tags-share__share">
					<span class="trainer-dt__fllow"><?php esc_html_e('FLLOW ME','yoga');?></span>
					<?php  yoga_social_share_text(); ?>
	       		</div>
			<?php endif ?>
			
	        <div class="trainer-dt__content">
	        	<?php
	        		if( yoga_get_field('trainer_content') != ''){

	        			echo yoga_get_field('trainer_content');
	        		}
	        	?>
	        	<?php
	        		if(yoga_get_field('website') != ''){ ?>
						<div class="trainer-dt__website">
			        		<?php echo yoga_get_field('website'); ?>

			        	</div>
	        	<?php	}
	        	?>
	        </div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="container">
			
		<div class="row">
			<div class="trainer-dt__related">
				<?php
			        $args=array(
			        	'post_type' => 'video',
			        	'posts_per_page'=>3,
			        	'orderby'        => 'rand',
			        );
			        $my_query = new wp_query($args);
			        if( $my_query->have_posts() ) 
			        {
			        	echo '<h3 class="col-sm-12 ">'.esc_html('Recent videos').'</h3>';
			        	echo '<ul class="trainer-dt__recent-video">';
			            while ($my_query->have_posts())
			            {
			                $my_query->the_post();
			                ?>
			                <li class="col-md-6 col-xl-4 ">
			                	<div class="trainer-dt__img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img_size_video'); ?></a></div>
			                	<div class="trainer-dt__info-video">
			                		<span class="trainer-dt__author"><?php echo get_the_author() ?></span>
			                		<h4 class="trainer-dt__title-video"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			                		<span class="trainer-dt__time-video"><?php echo get_post_meta(get_the_ID(),'time_video',true); ?></span>
			                		
			                	</div>
			                </li>
			                <?php
			            }
			            echo '</ul>';
			        }
				?>
			</div>
		</div>
	</div>
</div>
