<?php
/**
 * Options Footer
 * @package Beau-Core
 * @subpackage Redux
 */
 Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'beau-core' ),
    'id'               => 'footer',
    'customizer_width' => '200px',
    'icon'             => 'el-icon-arrow-down'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'beau-core' ),
    'id'               => 'footer_option',
    'subsection'        => true,
    'customizer_width' => '200px',
    'fields'            => array(
    	array(
		    'id'             => 'footer-padding',
		    'type'           => 'spacing',
		    'output'         => array('footer'),
		    'mode'           => 'margin',
		    'units_extended' => 'false',
		    'title'          => esc_html__( 'Footer padding','beau-core' ),
		    'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'beau-core'),
		    'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'beau-core'),
		),

		array(
		    'id'       => 'footer-font-color',
		    'type'     => 'color',
		    'title'    => __('Footer font Color', 'beau-core'),
		    'subtitle' => __('Pick a color for the Footer font.', 'beau-core'),
		    'validate' => 'color',
		    'output'    => array(
		        'color' => 'footer, footer a, .footer-widget .menu-footer-custom a, .footer-widget .address', 
		    )
		),
		array(
		    'id'        => 'number-footer-columns',
		    'type'      => 'slider',
		    'title'     => __('Number of Footer Columns', 'beau-core'),
		    'subtitle'  => __('Controls the number of Footer Columns', 'beau-core'),
		    "default"   => 3,
		    "min"       => 0,
		    "step"      => 1,
		    "max"       => 6,
		    'display_value' => 'label'
		),
		array(
			'id'=>'thongtin-text',
		    'type' => 'textarea',
		    'title' => __('Thông tin footer', 'beau-core'), 
		    'subtitle' => __('Thông tin Text with HTML format', 'beau-core'),
		    'validate' => 'html_custom',
		    'default' => 'Itbiz © 2016 Beautheme. All Rights Reserved.',
		    'allowed_html' => array(
		        'a' => array(
		            'href' => array(),
		            'title' => array()
		        ),
		        'br' => array(),
		        'em' => array(),
				'strong' => array(),
				'ul'=> array(),
				'li'=> array(),
				'i'=>array()
		    ),
		),
		array(
		    'id'=>'text-button-footer',
		    'type' => 'textarea',
		    'title' => __('Button on footer', 'yoga'), 
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
		array(
            'id'       => 'backtop-option',
		    'type'     => 'switch',
		    'title'    => __('Back to top option', 'beau-core'),
		    'subtitle' => __('Turn on to use the Back to top features', 'beau-core'),		    
		    'default'  => true,
        ),
    )
) );

			
Redux::setSection( $opt_name, array(
        'title'             => esc_html__( 'Footer Background Option','beau-core' ),
        'id'                => 'footer-bg-img',
        'subsection'        => true,
        'customizer_width'  => '200px',
        'fields'            => array(
	        array(         
			    'id'       => 'footer-background',
			    'type'     => 'background',
			    'title'    => __('Footer Background', 'beau-core'),
			    'subtitle' => __('footer background with image, color, etc.', 'beau-core'),
			    'desc'     => __('This is the description field, again good for additional info.', 'beau-core'),
			    'output'    => array(
			        'background-color' => 'footer, .home footer',
			        'background-image' => 'footer', 
			        'background-repeat' => 'footer', 
			        'background-position' => 'footer', 
			        'background-size' => 'footer', 
			        'background-attachment' => 'footer', 
			    )
			),
	    )
    )
);