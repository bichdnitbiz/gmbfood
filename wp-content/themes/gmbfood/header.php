<?php
/**
 * The header for our theme
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yoga
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php 
	$sticky_header = $responsive_option = $style_header ='';
	if (function_exists('yoga_get_option')) { 
		$sticky_header = yoga_get_option('sticky-header');
		$responsive_option = yoga_get_option('responsive-option');
		$style_header = yoga_get_option('header-style');
	}
?>
<?php if ($responsive_option == '1'): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php endif ?>
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( !is_404() ): ?>
	<header class="header">
		<?php get_template_part( 'templates/header/header-content' ); ?>

		<?php if ($style_header != false): ?>
			<?php 
			$slide_id = '';
			if (function_exists('yoga_get_field')) {
				$slide_id = yoga_get_field('select_slide');
			}
			if ($slide_id != '0' && $slide_id != NULL && $slide_id != '' && $slide_id != 'Select'): ?>
				<div class="slide-header">
					<?php
		                if (function_exists('putRevSlider')) {
		                    putRevSlider($slide_id);
		                }
		            ?>
				</div>
			<?php endif ?>
		<?php endif ?>
	</header><!-- /header -->

	<?php if ($sticky_header != false): ?>
		<div class="sticky-header">
			<?php get_template_part( 'templates/header/header-content' ); ?>
		</div>
	<?php endif ?>

	<?php 
		/*Popup search header */
		get_template_part( 'templates/header/header', 'popup' );
	?>
<?php endif ?>