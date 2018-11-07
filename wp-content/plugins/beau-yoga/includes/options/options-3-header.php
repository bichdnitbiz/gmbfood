<?php
/**
 * Options Header
 * @package Beau-Core
 * @subpackage Redux
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'beau-core' ),
    'id'               => 'header',
    'customizer_width' => '200px',
    'icon'             => 'el el-arrow-up',
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Header styling', 'beau-core' ),
    'id'               => 'header-styling',
    'subsection'        => true,
    'customizer_width' => '200px',
    'fields'            => array(
    	array(
            'id'       => 'search-option',
		    'type'     => 'switch',
		    'title'    => __('Search header', 'beau-core'),
		    'subtitle' => __('Turn on to use the search features', 'beau-core'),		    
		    'default'  => true,
        ),
        array(
        	'id'       => 'header-font-color',
		    'type'     => 'color',
		    'title'    => __('Header font Color', 'beau-core'), 
		    'subtitle' => __('Pick a font color for the Header.', 'beau-core'),
		    'validate' => 'color',
			'transparent' => false,
			'output'    => array(
		        'color' => 'header,header a,.right-menu .header-menu__search i,.right-menu .button-header a, .main-navigation a', 
		    )
        ),
        array(
		    'id'             => 'header-padding',
		    'type'           => 'spacing',
		    'output'         => array('.header-defaut'),
		    'mode'           => 'padding',
		    'units'          => array('em', 'px'),
		    'units_extended' => 'false',
		    'title'          => esc_html__( 'Header padding','beau-core' ),
		    'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'beau-core'),
		    'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'beau-core'),
		),
		array(
		    'id'=>'text-button-header',
		    'type' => 'textarea',
		    'title' => __('Button on header', 'yoga'), 
		    'subtitle' => __('Custom HTML Allowed (wp_kses)', 'yoga'),
		    'validate' => 'html_custom',
		    'default' => '<a href="#">Start Free Trial</a>',
		    'allowed_html' => array(
		        'a' => array(
		            'href' => array(),
		            'title' => array()
		        ),
		        'br' => array(),
		        'em' => array(),
		        'strong' => array()
		    )
		),
    )
) );
			
Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Header Background Option','beau-core' ),
        'id'                => 'header-bg-img',
        'subsection'        => true,
        'customizer_width'  => '200px',
        'fields'            => array(
	        array(         
			    'id'       => 'header-background',
			    'type'     => 'background',
			    'title'    => __('Header Background', 'beau-core'),
			    'subtitle' => __('Header background with image, color, etc.', 'beau-core'),
			    'desc'     => __('This is the description field, again good for additional info.', 'beau-core'),
			    'output'    => array(
			        'background-color' => 'header',
			        'background-image' => 'header', 
			        'background-repeat' => 'header', 
			        'background-position' => 'header', 
			        'background-size' => 'header', 
			        'background-attachment' => 'header', 
			    )
			),
	    )
    )
);

Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Sticky Header','beau-core' ),
        'id'                => 'sticky-header',
        'subsection'        => true,
        'customizer_width'  => '200px',
        'fields'            => array(
	        array(
	            'id'       => 'sticky-header',
			    'type'     => 'switch',
			    'title'    => __('Sticky Header', 'beau-core'),
			    'subtitle' => __('Turn on to use the Sticky Headers', 'beau-core'),	
			    'default'  => true,	   
	        ),
	        array(
			    'id'       => 'sticky-header-bg',
			    'type'     => 'color',
			    'compiler' => array('.sticky-header .header-defaut'),
			    'title'    => __('Header sticky Background Color', 'beau-core'),
			    'subtitle' => __('Pick a background color for the Header sticky.', 'beau-core'),
			    'validate' => 'color',
			    'output'    => array(
			        'background-color' => '.sticky-header .header-defaut', 
			    )
			),

			array(
			    'id'       => 'sticky-header-font-bg',
			    'type'     => 'color',
			    'title'    => __('Header sticky font Color', 'beau-core'),
			    'subtitle' => __('Pick a font color for the Header sticky.', 'beau-core'),
			    'validate' => 'color',
			    'output'    => array(
			        'color' => '.sticky-header,.sticky-header a, .sticky-header .header-defaut .right-menu .header-menu__search i,.sticky-header .header-defaut .right-menu .button-header a, .sticky-header .header-defaut .main-navigation a', 
			    )
			),
	        array(
			    'id'             => 'sticky-header-padding',
			    'type'           => 'spacing',
			    'output'         => array('.sticky-header .header-defaut'),
			    'mode'           => 'padding',
			    'units'          => array('em', 'px'),
			    'units_extended' => 'false',
			    'title'          => esc_html__( 'Header sticky padding','beau-core' ),
			    'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'beau-core'),
			    'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'beau-core'),
			),
	    )
    )
);