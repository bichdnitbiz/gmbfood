<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yoga
 * @since 1.0
 * @version 1.0
 */

$background_color_footer = $text_header = '';
if (function_exists('yoga_get_option')) {
	$background_color_footer = yoga_get_option('background_color_footer');
	$text_header = yoga_get_option('text-button-header');
}
?>
<?php if ( !is_404() ): ?>
	<footer>
		<div class="container">
			<div class="widget-footer">
				<div class="row">
					<?php
			            if (yoga_get_option('number-footer-columns')!= NULL) {
			                $numshow = intval(yoga_get_option('number-footer-columns'));
			            }else{
			                $numshow = 3;
			            }
			            $columns = intval(12/$numshow);
			            if($numshow > 0){
			                if (function_exists("dynamic_sidebar")) {
			                    for ($i=1; $i <= $numshow; $i++) {
			                            echo '<div class="footer-widget col-md-'.$columns.' col-sm-'.$columns.' col-xs-12"><ul class="footer-column">';
			                            if ( is_active_sidebar( 'sidebar-footer-'.$i ) ){
			                                    dynamic_sidebar( 'sidebar-footer-'.$i );
			                            }
			                            echo '</ul></div>';
			                     }
			                }
			            }
			        ?>
		        </div>
			</div>
			<?php 
			$copyright = '';
			$back_top = '';
			if (function_exists('yoga_get_option')) {
				$copyright = yoga_get_option('copyright-text');
				$back_top = yoga_get_option('backtop-option');
			}
			?>
			
			<div class="copyright">
				<?php if ($copyright != ''): ?>
					<div class="copyright-text"><?php echo esc_attr($copyright) ?></div>
				<?php endif ?>
				<?php if ($back_top == '1'): ?>
					<a href="#" class="back-to-top"></a>
				<?php endif ?>
			</div>
		</div>
	</footer>
<?php endif ?>
<?php wp_footer(); ?>
</body>
</html>
