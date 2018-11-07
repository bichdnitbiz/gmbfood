<?php
/**
 * Plugins for TGM usage.
 * @package yoga
 * @subpackage Core
 * @since 1.0
 * @version 1.0
 */
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}		// TMGA 
		function yoga_register_required_plugins() {
			$theme_text_domain = 'yoga';
			/*
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(

				// This is an example of how to include a plugin bundled with a theme.
				array (
		            'name'       => esc_html__('Contact Form 7', 'gmbfood'),
		            'slug'       => 'contact-form-7',
		            'required'   =>true,
				),
				array (
		            'name'       => esc_html__('Yoast seo', 'gmbfood'),
		            'slug'       => 'wordpress-seo',
		            'required'   =>true,
				),
				array (
					'name'       => esc_html__('Revolution Slide', 'gmbfood'),
					'slug'       => 'revslider',
					'source'     => 'general/revslider.zip',
					'required'   => true,
					'thumbnail'  => get_template_directory_uri() . '/assets/images/plugins/revslider.png',
				)
			);

			/*
			 * Array of configuration settings. Amend each line as needed.
			 *
			 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
			 * strings available, please help us make TGMPA even better by giving us access to these translations or by
			 * sending in a pull-request with .po file(s) with the translations.
			 *
			 * Only uncomment the strings in the config array if you want to customize the strings.
			 */
			$config = array(
			'domain'        	=> $theme_text_domain,
			'default_path'  	=> 'http://plugins.beautheme.com/',
			'parent_slug' 		=> 'yoga',
			'menu'            	=> 'yoga-plugins',
			'has_notices'     	=> true,
			'is_automatic'    	=> true,
			'message'         	=> '',
			
		);
			tgmpa( $plugins, $config );
		}
add_action( 'tgmpa_register', 'yoga_register_required_plugins' );

/**
 * Returns the user capability for showing the notices.
 *
 * @return string
 */
function yoga_tgm_show_admin_notice_capability() {
	return 'edit_theme_options';
}
add_filter( 'tgmpa_show_admin_notice_capability', 'yoga_tgm_show_admin_notice_capability' );
