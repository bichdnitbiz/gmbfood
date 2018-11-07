<?php
/**
 * Sample Fields
 * @package Beau-Core
 * @subpackage Redux
 */
//  Redux::setSection( $opt_name, array(
//     'title'            => __( 'Sample Fields', 'beau-core' ),
//     'id'               => 'sample-feilds',
//     'customizer_width' => '200px',
//     'icon'             => 'el el-wordpress',
//  	'fields'            => array(
//         array(
//             'id'       => 'button-set-single',
// 		    'type'     => 'button_set',
// 		    'title'    => __('Button Set, Single', 'redux-framework-demo'),
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    //Must provide key => value pairs for options
// 		    'options' => array(
// 		        '1' => 'Opt 1', 
// 		        '2' => 'Opt 2', 
// 		        '3' => 'Opt 3'
// 		     ), 
// 		    'default' => '2'
//         ),
//         array(
//         	'id'       => 'opt-color2',
// 		    'type'     => 'color',
// 		    'title'    => __('Body Background Color', 'redux-framework-demo'), 
// 		    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
// 		    'default'  => '#FFFFFF',
// 		    'validate' => 'color',
// 			'transparent' => false
//         ),
//         array(
//         	'id'       => 'opt-color',
// 		    'type'     => 'color_alpha',
// 		    'title'    => __('Body Background Color', 'redux-framework-demo'), 
// 		    'subtitle' => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
// 		    'default'  => '#FFFFFF',
// 		    'validate' => 'color',
// 			'transparent' => false
//         ),
//         array(
//         	'id'       => 'css_editor',
// 		    'type'     => 'ace_editor',
// 		    'title'    => __('CSS Code', 'redux-framework-demo'),
// 		    'subtitle' => __('Paste your CSS code here.', 'redux-framework-demo'),
// 		    'mode'     => 'css',
// 		    'theme'    => 'monokai',
// 		    'desc'     => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
// 		    'default'  => "#header{\nmargin: 0 auto;\n}"
//         ),
//         array(
//         	'id'       => 'opt-color-gradient',
// 		    'type'     => 'color_gradient',
// 		    'title'    => __('Header Gradient Color Option', 'redux-framework-demo'),
// 		    'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'validate' => 'color',
// 		    'default'  => array(
// 		        'from' => '#1e73be',
// 		        'to'   => '#00897e', 
// 		    ),
// 		    'transparent' => false
//         ),
//         array(
// 		    'id'          => 'opt-date',
// 		    'type'        => 'date',
// 		    'title'       => __('Date Option', 'redux-framework-demo'), 
// 		    'subtitle'    => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'        => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'placeholder' => 'Click to enter a date'
// 		),
// 		array(
// 		    'id'       => 'opt_dimensions',
// 		    'type'     => 'dimensions',
// 		    'units'    => array('em','px','%'),
// 		    'title'    => __('Dimensions (Width/Height) Option', 'redux-framework-demo'),
// 		    'subtitle' => __('Allow your users to choose width, height, and/or unit.', 'redux-framework-demo'),
// 		    'desc'     => __('Enable or disable any piece of this field. Width, Height, or Units.', 'redux-framework-demo'),
// 		    'default'  => array(
// 		        'Width'   => '200', 
// 		        'Height'  => '100'
// 		    ),
// 		),
// 		array(
// 		    'id'       => 'opt-link-color',
// 		    'type'     => 'link_color',
// 		    'title'    => __('Links Color Option', 'redux-framework-demo'),
// 		    'subtitle' => __('Only color validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'default'  => array(
// 		        'regular'  => '#1e73be', // blue
// 		        'hover'    => '#dd3333', // red
// 		        'active'   => '#8224e3',  // purple
// 		        'visited'  => '#8224e3',  // purple
// 		    )
// 		),
// 		array(
// 		    'id'       => 'opt-media',
// 		    'type'     => 'media', 
// 		    'url'      => true,
// 		    'title'    => __('Media w/ URL', 'redux-framework-demo'),
// 		    'desc'     => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
// 		    'subtitle' => __('Upload any media using the WordPress native uploader', 'redux-framework-demo'),
// 		    'default'  => array(
// 		        'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'
// 		    ),
// 		    'url' => false
// 		),
// 		array(
// 		    'id'=>'multi-text',
// 		    'type' => 'multi_text',
// 		    'title' => __('Multi Text Option - Color Validated', 'redux-framework-demo'),
// 		    'validate' => 'color',
// 		    'subtitle' => __('If you enter an invalid color it will be removed. Try using the text "blue" as a color.  ;)', 'redux-framework-demo'),
// 		    'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo')
// 		),
// 		array(
// 		    'id'       => 'opt-layout',
// 		    'type'     => 'image_select',
// 		    'title'    => __('Main Layout', 'redux-framework-demo'), 
// 		    'subtitle' => __('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'redux-framework-demo'),
// 		    'options'  => array(
// 		        '1'      => array(
// 		            'alt'   => '1 Column', 
// 		            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
// 		        ),
// 		        '2'      => array(
// 		            'alt'   => '2 Column Left', 
// 		            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
// 		        ),
// 		        '3'      => array(
// 		            'alt'   => '2 Column Right', 
// 		            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
// 		        ),
// 		        '4'      => array(
// 		            'alt'   => '3 Column Middle', 
// 		            'img'   => ReduxFramework::$_url.'assets/img/3cm.png'
// 		        ),
// 		        '5'      => array(
// 		            'alt'   => '3 Column Left', 
// 		            'img'   => ReduxFramework::$_url.'assets/img/3cl.png'
// 		        ),
// 		        '6'      => array(
// 		            'alt'  => '3 Column Right', 
// 		            'img'  => ReduxFramework::$_url.'assets/img/3cr.png'
// 		        )
// 		    ),
// 		    'default' => '2'
// 		),
// 		// array(
// 		//     'id'          => 'opt-password',
// 		//     'type'        => 'password',
// 		//     'username'    => true,
// 		//     'title'       => 'SMTP Account',
// 		//     'placeholder' => array(
// 		//         'username'   => 'Enter your Username',
// 		//         'password'   => 'Enter your Password'
// 		//     )
// 		// ),
// 		array(
// 		    'id'       => 'opt-radio',
// 		    'type'     => 'radio',
// 		    'title'    => __('Radio Option', 'redux-framework-demo'), 
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    //Must provide key => value pairs for radio options
// 		    'options'  => array(
// 		        '1' => 'Opt 1', 
// 		        '2' => 'Opt 2', 
// 		        '3' => 'Opt 3'
// 		    ),
// 		    'default' => '2'
// 		),
// 		array(
// 		    'id'       => 'opt_checkbox',
// 		    'type'     => 'checkbox',
// 		    'title'    => __('Checkbox Option', 'redux-framework-demo'), 
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'default'  => '1'// 1 = on | 0 = off
// 		),
// 		array(
// 		    'id'       => 'opt-select',
// 		    'type'     => 'select',
// 		    'title'    => __('Select Option', 'redux-framework-demo'), 
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    // Must provide key => value pairs for select options
// 		    'options'  => array(
// 		        '1' => 'Opt 1',
// 		        '2' => 'Opt 2',
// 		        '3' => 'Opt 3'
// 		    ),
// 		    'default'  => '2',
// 		),
// 		array(
// 		    'id'       => 'opt-multi-select',
// 		    'type'     => 'select',
// 		    'multi'    => true,
// 		    'title'    => __('Multi Select Option', 'redux-framework-demo'), 
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    //Must provide key => value pairs for radio options
// 		    'options'  => array(
// 		        '1' => 'Opt 1',
// 		        '2' => 'Opt 2',
// 		        '3' => 'Opt 3'),
// 		    'default'  => array('2','3')
// 		),
// 		array(
// 		    'id'       => 'opt_multi_checkbox',
// 		    'type'     => 'checkbox',
// 		    'title'    => __('Multi Checkbox Option', 'redux-framework-demo'), 
// 		    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
		 
// 		    //Must provide key => value pairs for multi checkbox options
// 		    'options'  => array(
// 		        '1' => 'Opt 1',
// 		        '2' => 'Opt 2',
// 		        '3' => 'Opt 3'
// 		    ),
		 
// 		    //See how default has changed? you also don't need to specify opts that are 0.
// 		    'default' => array(
// 		        '1' => '1', 
// 		        '2' => '0', 
// 		        '3' => '0'
// 		    )
// 		),
// 		array(
// 		    'id'        => 'opt-slider-label',
// 		    'type'      => 'slider',
// 		    'title'     => __('Slider Example 1', 'redux-framework-demo'),
// 		    'subtitle'  => __('This slider displays the value as a label.', 'redux-framework-demo'),
// 		    'desc'      => __('Slider description. Min: 1, max: 500, step: 1, default value: 250', 'redux-framework-demo'),
// 		    "default"   => 250,
// 		    "min"       => 1,
// 		    "step"      => 1,
// 		    "max"       => 500,
// 		    'display_value' => 'label'
// 		),
// 		array(
// 		    'id' => 'opt-slider-text',
// 		    'type' => 'slider',
// 		    'title' => __('Slider Example 2 with Steps (5)', 'redux-framework-demo'),
// 		    'subtitle' => __('This example displays the value in a text box', 'redux-framework-demo'),
// 		    'desc' => __('Slider description. Min: 0, max: 300, step: 5, default value: 75', 'redux-framework-demo'),
// 		    "default" => 75,
// 		    "min" => 0,
// 		    "step" => 5,
// 		    "max" => 300,
// 		    'display_value' => 'text'
// 		),
		 
// 		array(
// 		    'id' => 'opt-slider-select',
// 		    'type' => 'slider',
// 		    'title' => __('Slider Example 3 with two sliders', 'redux-framework-demo'),
// 		    'subtitle' => __('This example displays the values in select boxes', 'redux-framework-demo'),
// 		    'desc' => __('Slider description. Min: 0, max: 500, step: 5, slider 1 default value: 100, slider 2 default value: 300', 'redux-framework-demo'),
// 		    "default" => array(
// 		        1 => 100,
// 		        2 => 300,
// 		    ),
// 		    "min" => 0,
// 		    "step" => 5,
// 		    "max" => "500",
// 		    'display_value' => 'select',
// 		    'handles' => 2,
		 
// 		),
		 
// 		array(
// 		    'id' => 'opt-slider-float',
// 		    'type' => 'slider',
// 		    'title' => __('Slider Example 4 with float values', 'redux-framework-demo'),
// 		    'subtitle' => __('This example displays float values', 'redux-framework-demo'),
// 		    'desc' => __('Slider description. Min: 0, max: 1, step: .1, default value: .5', 'redux-framework-demo'),
// 		    "default" => .5,
// 		    "min" => 0,
// 		    "step" => .1,
// 		    "max" => 1,
// 		    'resolution' => 0.1,
// 		    'display_value' => 'text'
// 		),
// 		array(
// 		    'id'      => 'homepage-blocks',
// 		    'type'    => 'sorter',
// 		    'title'   => 'Homepage Layout Manager',
// 		    'desc'    => 'Organize how you want the layout to appear on the homepage',
// 		    'options' => array(
// 		        'enabled'  => array(
// 		            'highlights' => 'Highlights',
// 		            'slider'     => 'Slider',
// 		            'staticpage' => 'Static Page',
// 		            'services'   => 'Services'
// 		        ),
// 		        'disabled' => array(
// 		        )
// 		    ),
// 		),
// 		array(
// 		    'id'       => 'opt-spinner',
// 		    'type'     => 'spinner', 
// 		    'title'    => __('JQuery UI Spinner Example 1', 'redux-framework-demo'),
// 		    'subtitle' => __('No validation can be done on this field type','redux-framework-demo'),
// 		    'desc'     => __('JQuery UI spinner description. Min:20, max: 100, step:20, default value: 40', 'redux-framework-demo'),
// 		    'default'  => '40',
// 		    'min'      => '20',
// 		    'step'     => '20',
// 		    'max'      => '100',
// 		),
// 		array(
// 		    'id'       => 'opt-switch',
// 		    'type'     => 'switch', 
// 		    'title'    => __('Switch On', 'redux-framework-demo'),
// 		    'subtitle' => __('Look, it\'s on!', 'redux-framework-demo'),
// 		    'default'  => true,
// 		),
// 		array(
// 		    'id'          => 'opt-typography',
// 		    'type'        => 'typography', 
// 		    'title'       => __('Typography', 'redux-framework-demo'),
// 		    'google'      => true, 
// 		    'font-backup' => true,
// 		    'output'      => array('h2.site-description'),
// 		    'units'       =>'px',
// 		    'subtitle'    => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
// 		    'default'     => array(
// 		        'color'       => '#333', 
// 		        'font-style'  => '700', 
// 		        'font-family' => 'Abel', 
// 		        'google'      => true,
// 		        'font-size'   => '33px', 
// 		        'line-height' => '40'
// 		    ),
// 		),
// 		array(
// 		    'id'       => 'opt-text',
// 		    'type'     => 'text',
// 		    'title'    => __('Text Option - Email Validated', 'redux-framework-demo'),
// 		    'subtitle' => __('This is a little space under the Field Title in the Options table, additional info is good in here.', 'redux-framework-demo'),
// 		    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'validate' => 'email',
// 		    'msg'      => 'custom error message',
// 		    'default'  => 'test@test.com'
// 		),
// 		array(
// 		    'id'=>'opt-textarea',
// 		    'type' => 'textarea',
// 		    'title' => __('Textarea Option - HTML Validated Custom', 'redux-framework-demo'), 
// 		    'subtitle' => __('Custom HTML Allowed (wp_kses)', 'redux-framework-demo'),
// 		    'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
// 		    'validate' => 'html_custom',
// 		    'default' => '<br />Some HTML is allowed in here.<br />',
// 		    'allowed_html' => array(
// 		        'a' => array(
// 		            'href' => array(),
// 		            'title' => array()
// 		        ),
// 		        'br' => array(),
// 		        'em' => array(),
// 		        'strong' => array()
// 		    )
// 		),
// 		array(
// 		    'id'             => 'opt-spacing',
// 		    'type'           => 'spacing',
// 		    'output'         => array('.site-header'),
// 		    'mode'           => 'margin',
// 		    'units'          => array('em', 'px'),
// 		    'units_extended' => 'false',
// 		    'title'          => __('Padding/Margin Option', 'redux-framework-demo'),
// 		    'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'redux-framework-demo'),
// 		    'desc'           => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
// 		    'default'            => array(
// 		        'margin-top'     => '1px', 
// 		        'margin-right'   => '2px', 
// 		        'margin-bottom'  => '3px', 
// 		        'margin-left'    => '4px',
// 		        'units'          => 'em', 
// 		    )
// 		),
//         array(
//         	'title' => __('Repeater Field', 'redux-framework-demo' ),
// 		    'icon' => 'el-icon-thumbs-up',
// 		    'fields' => array(
// 		        array(
// 		            'id'         => 'repeater-field-id',
// 		            'type'       => 'repeater',
// 		            'title'      => __( 'Title', 'redux-framework-demo' ),
// 		            'subtitle'   => __( '', 'redux-framework-demo' ),
// 		            'desc'       => __( '', 'redux-framework-demo' ),
// 		            //'group_values' => true, // Group all fields below within the repeater ID
// 		            //'item_name' => '', // Add a repeater block name to the Add and Delete buttons
// 		            //'bind_title' => '', // Bind the repeater block title to this field ID
// 		            //'static'     => 2, // Set the number of repeater blocks to be output
// 		            //'limit' => 2, // Limit the number of repeater blocks a user can create
// 		            //'sortable' => false, // Allow the users to sort the repeater blocks or not
// 		            'fields'     => array(
// 		                array(
// 		                    'id'          => 'title_field',
// 		                    'type'        => 'text',
// 		                    'placeholder' => __( 'Title', 'redux-framework-demo' ),
// 		                ),
// 		                array(
// 		                    'id'          => 'text_field',
// 		                    'type'        => 'text',
// 		                    'placeholder' => __( 'Text Field', 'redux-framework-demo' ),
// 		                ),
// 		                array(
// 		                    'id'          => 'select_field',
// 		                    'type'        => 'select',
// 		                    'title' => __( 'Select Field', 'redux-framework-demo' ),
// 		                    'options'     => array(
// 		                        '1'             => __( 'Option 1', 'redux-framework-demo' ),
// 		                        '2'             => __( 'Option 2', 'redux-framework-demo' ),
// 		                        '3'             => __( 'Option 3', 'redux-framework-demo' ),
// 		                    ),
// 		                    'placeholder' => __( 'Listing Field', 'redux-framework-demo' ),
// 		                ),
// 		            )
// 		        )
// 		    )
//         )
//     )
// ) );
// Redux::setSection( $opt_name, array(
//         'title'             => esc_html__( 'Colors','danlet' ),
//         'id'                => 'sample-feilds-colors',
//         'subsection'        => true,
//         'customizer_width'  => '200px',
//         'fields'            => array(
//         )
//     )
// );
// Redux::setSection( $opt_name, array(
//         'title'             => esc_html__( 'Colors2','danlet' ),
//         'id'                => 'sample-feilds-colors2',
//         'subsection'        => true,
//         'customizer_width'  => '200px',
//         'fields'            => array(
//         )
//     )
// );