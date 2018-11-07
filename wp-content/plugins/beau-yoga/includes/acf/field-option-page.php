<?php
/**
 * Page Options
 * @package Beau-Core
 * @subpackage Core
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$list_slide = '';
if (function_exists('get_sliders')) {
    $list_slide = get_sliders();
}
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array (
    'key' => 'group_option_page',
    'title' => 'Page options',
    'fields' => array (
        
        //Header Options
        array (
            'key' => 'field_tab_page_header',
            'label' => 'Header Options',
            'name' => 'page_header',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array (
            'key' => 'header-style',
            'label' => 'Choose header style',
            'name' => 'header-style',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '30',
                'class' => '',
                'id' => '',
            ),
            'choices' => array (
                ''          => 'Header none slide',
                'header-slide'  => 'Header slide',
            ),
            'default_value' => array (
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
        array (
            'key' => 'field_select_slide',
            'label' => 'Slider header',
            'name' => 'select_slide',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field' => 'header-style',
                        'operator' => '==',
                        'value' => 'header-slide',
                    ),
                ),
            ),
            'wrapper' => array (
                'width' => '30',
                'class' => '',
                'id' => '',
            ),
            'choices' => $list_slide,
            'default_value' => array (
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
         //Footer Options
        array (
            'key' => 'field_tab_page_footer',
            'label' => 'Footer Options',
            'name' => 'page_footer',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        
        array (
            'key' => 'field_background_color_footer',
            'label' => 'Background color footer',
            'name' => 'background_color_footer',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
        ),
        array (
            'key' => 'field_tab_page_logo',
            'label' => 'Logo Options',
            'name' => 'page_logo',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
         array (
            'key' => 'field_main_logo',
            'label' => 'Main logo',
            'name' => 'main_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 33,
                'class' => 'customLogoPage',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array (
            'key' => 'field_mobile_logo',
            'label' => 'Mobile logo',
            'name' => 'mobile_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 33,
                'class' => 'customLogoPage',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array (
            'key' => 'field_header_fixed_logo',
            'label' => 'Header fixed logo',
            'name' => 'header_fixed_logo',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 33,
                'class' => 'customLogoPage',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));
endif;