<?php
/**
 * Options Advanced
 * @package Beau-Core
 * @subpackage Redux
 */
// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }
//  Redux::setSection( $opt_name, array(
//     'title'            => __( 'Advanced', 'beau-core' ),
//     'id'               => 'advanced',
//     'customizer_width' => '200px',
//     'icon'             => 'el el-puzzle',
//     'fields'            => array(
//         array(
//             'id'       => 'widget_footer_init',
// 		    'type'     => 'switch',
// 		    'title'    => __('Register Footer Widget', 'beau-core'),
// 		    'subtitle' => __('Turn on to enable Footer widget', 'beau-core'),		    
// 		    'default'  => true,
//         ),
//          array(
//             'id'       => 'widget_product_init',
// 		    'type'     => 'switch',
// 		    'title'    => __('Register Product Widget', 'beau-core'),
// 		    'subtitle' => __('Turn on to enable Product widget', 'beau-core'),		    
// 		    'default'  => true,
//         ),
//     )
// ) );