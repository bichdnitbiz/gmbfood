<?php
/**
 * The sidebar containing the main widget area
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yoga
 * @since 1.0
 * @version 1.0
 */
if ( ! is_active_sidebar( 'widget-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'widget-sidebar' ); ?>
</aside><!-- #secondary -->
<?php
