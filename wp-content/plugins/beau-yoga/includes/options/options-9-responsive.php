<?php
/**
 * Options Responsive
 * @package Beau-Core
 * @subpackage Redux
 */
 Redux::setSection( $opt_name, array(
    'title'            => __( 'Responsive', 'beau-core' ),
    'id'               => 'responsive',
    'customizer_width' => '200px',
    'icon'             => 'el-icon-resize-horizontal',
    'fields'            => array(
        array(
            'id'       => 'responsive-option',
		    'type'     => 'switch',
		    'title'    => __('Responsive option', 'beau-core'),
		    'subtitle' => __('Turn on to use the responsive design features', 'beau-core'),		    
		    'default'  => true,
        ),
    )
) );