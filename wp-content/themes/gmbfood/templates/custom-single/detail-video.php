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
<div class="detail-video">
	<div class="container">
		<div class="row">
			<?php if (get_the_title()): ?>
				<div class="title-heading">
            		<h2 class="“read-more__text”"><?php echo get_the_title();?></h2>        
				</div>
			<?php endif ?>
			<?php if (get_the_author() && yoga_get_field('time_video') != ''): ?>
				<div class="detail-video__infor">
					<?php if (get_the_author()): ?>
						<span class="detail-video__author"><?php echo 'By : '.get_the_author().' /' ?></span>
					<?php endif ?>

					<?php if (yoga_get_field('time_video') != ''): ?>
						<span class="detail-video__time"><?php echo yoga_get_field('time_video'); ?></span>
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	</div>
	<?php if (yoga_get_field('video') != '' ||  the_content()): ?>
		
		<div class="detail-video__blockcontent">	
			<div class="detail-video__content container">
				<?php 
					if(yoga_get_field('video') != ''){?>
						<div class="detail-video__embed-container">
							<?php echo yoga_get_field('video'); ?>
							<div  id="flplay" class="detail-video__backgroundvideo img-fl-detail">
								<?php	the_post_thumbnail('img_background_video') ?>
								<?php
			                        echo '</div>';
			                        echo '<div class="click_play" id="click-img-play">';
			                        echo '<img src="'.get_template_directory_uri().'/assets/admin/images/play.png" alt="'.esc_html__('play','yoga').'">';
			                        echo '</div>';
			                    ?>	
							</div> 
						</div>

	                    <script type="text/javascript">
	                        (function($){
	                            "use strict";
	                            
	                            $(document).ready(function () {
	                                $('iframe').addClass('yplay');
	                                $('#click-img-play').click(function(){
	                                    console.log(typeof($(".yplay")[0]));
	                                    $('#flplay').slideUp('1500');
	                                    if( typeof($(".yplay")[0]) !== 'undefined' ) {
	                                        $(".yplay")[0].src += "?&autoplay=1";

	                                    } else {
	                                        $("#video_player").get(0).play();
	                                        console.log('ssd');
	                                    };

	                                    $('#click-img-play').hide(500);

	                               });
	                            });
	                        })(jQuery);
	                    </script>


					<?php	}
				?>
				<div class="container">
					<div class="row row-content">
							
						<div class="detail-video__left ">
							<span class="detail-video__desc"><?php esc_html_e('Description:','yoga'); ?> </span>
							
							<?php if (yoga_get_field('description') != ''): ?>
								<h4 class="detail-video__description">
									<?php echo yoga_get_field('description'); ?>
										
								</h4>
							<?php endif ?>
							<?php if (yoga_get_field('video_content') != ''): ?>
								<?php echo yoga_get_field('video_content') ?>
							<?php endif ?>
							<?php the_content();?>
						</div>
						
						<div class="detail-video__right">

							<?php if (yoga_get_field('view') != ''): ?>
								<div class="detail-video__view">
									<h4 class="detail-video__numberview"><?php echo yoga_get_field('view'); ?></h4>
									<span><?php esc_html_e('views','yoga'); ?></span>
								</div>
							<?php endif ?>

							<?php if (yoga_get_field('vote') != ''): ?>
								
								<div class="detail-video__vote">
									<?php if (yoga_get_field('vote') != ''): ?>
										<h4 class="detail-video__numbervote"><?php echo  yoga_get_field('vote'); ?></h4>
									<?php endif ?>
									<?php if (yoga_get_field('vote') != ''): ?>
										<span><?php esc_html_e('Average ( ','yoga'); ?><?php echo  yoga_get_field('vote'). ' votes )';?></span>
									<?php endif ?>
								</div>
							<?php endif ?>

							<?php if (yoga_get_field('related_tile') != ''): ?>
								<div class="detail-video__related ">
							        <h3 class="detail-video__related-tile"><?php echo  yoga_get_field('related_tile'); ?></h3>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	<?php endif ?>

</div>


