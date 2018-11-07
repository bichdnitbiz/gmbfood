<?php
/**
 * Options typography
 * @package Beau-Core
 * @subpackage Redux
 */
 Redux::setSection( $opt_name, array(
    'title'            => __( 'Typography', 'beau-core' ),
    'id'               => 'typography',
    'customizer_width' => '200px',
    'icon'             => 'el-icon-fontsize'
) );

// Redux::setSection( $opt_name, array(
//     'title'            => __( 'Body Typography', 'beau-core' ),
//     'id'               => 'typography_option',
//     'subsection'        => true,
//     'customizer_width' => '200px',
//     'fields'            => array(
//     	array(
// 		    'id'          => 'typography-body',
// 		    'type'        => 'typography', 
// 		    'title'       => __('Body Typography', 'beau-core'),
// 		    'google'      => true, 
// 		    'font-backup' => true,
// 		    'output'      => array('body'),
// 		    'units'       =>'px',
// 		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
// 		),
//     )
// ) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Heading Typography', 'beau-core' ),
    'id'               => 'typography_heading',
    'subsection'        => true,
    'customizer_width' => '200px',
    'fields'            => array(
    	array(
		    'id'          => 'typography-h1',
		    'type'        => 'typography', 
		    'title'       => __('H1 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h1'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
		array(
		    'id'          => 'typography-h2',
		    'type'        => 'typography', 
		    'title'       => __('H2 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h2'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
		array(
		    'id'          => 'typography-h3',
		    'type'        => 'typography', 
		    'title'       => __('H3 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h3'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
		array(
		    'id'          => 'typography-h4',
		    'type'        => 'typography', 
		    'title'       => __('H4 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h4'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
		array(
		    'id'          => 'typography-h5',
		    'type'        => 'typography', 
		    'title'       => __('H5 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h5'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
		array(
		    'id'          => 'typography-h6',
		    'type'        => 'typography', 
		    'title'       => __('H6 Typography', 'beau-core'),
		    'google'      => true, 
		    'font-backup' => true,
		    'output'      => array('body.h6'),
		    'units'       =>'px',
		    'subtitle'    => __('These settings control the typography for all body text.', 'beau-core'),
		),
    )
) );

