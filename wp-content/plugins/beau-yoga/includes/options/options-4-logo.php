<?php
/**
 * Options Logo
 * @package Beau-Core
 * @subpackage Redux
 */
 Redux::setSection( $opt_name, array(
    'title'            => __( 'Logo', 'beau-core' ),
    'id'               => 'logo',
    'customizer_width' => '200px',
    'icon'             => 'el-icon-plus-sign'
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Logo', 'beau-core' ),
    'id'               => 'logo_option',
    'subsection'        => true,
    'customizer_width' => '200px',
    'fields'            => array(
    	array(
		    'id'       => 'yoga-logo',
		    'type'     => 'media', 
		    'url'      => true,
		    'title'    => __('Default Logo', 'beau-core'),
		    'desc'     => __('Select an image file for your logo.', 'beau-core'),
		    'url' => false
		),

		array(
		    'id'       => 'yoga-logo-fixed',
		    'type'     => 'media', 
		    'url'      => true,
		    'title'    => __('Sticky Header Logo', 'beau-core'),
		    'desc'     => __('Select an image file for your sticky header logo.', 'beau-core'),
		    'url' => false
		),

		array(
		    'id'       => 'yoga-logo-mobile',
		    'type'     => 'media', 
		    'url'      => true,
		    'title'    => __('Mobile Logo', 'beau-core'),
		    'desc'     => __('Select an image file for your mobile logo.', 'beau-core'),
		    'url' => false
		),
    	array(
		    'id'             => 'Logo-padding',
		    'type'           => 'spacing',
		    'output'         => array('.yoga-logo,.logo-mobile'),
		    'mode'           => 'margin',
		    'units_extended' => 'false',
		    'title'          => esc_html__( 'Logo padding','beau-core' ),
		    'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'beau-core'),
		    'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'beau-core'),
		),
    )
) );