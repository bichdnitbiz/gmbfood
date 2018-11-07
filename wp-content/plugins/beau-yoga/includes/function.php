<?php 
function get_sliders() {
    $list_slide = array();
    $count = '';
    if(function_exists('set_revslider_as_theme')){
            // get a list of all available sliders
        $my_sliders = new RevSlider();
        
            // grab the "alias" names of the sliders
        $my_slider_array = $my_sliders->getAllSliderAliases();
        $count = count($my_slider_array);
        $list_slide[''] = 'Select...';
        for ($i=0; $i < $count; $i++) {
            $list_slide[($my_slider_array[$i])] = $my_slider_array[$i];
        }
        if (count($my_slider_array) == 0) {
            $list_slide = array(0=>esc_html__('No slider found','yoga'));
        }
    }else{
        $list_slide = array(esc_html__('No slider found','yoga'));
    }
    return $list_slide;
}

// Created on 05.08.2015
// by: Meik
function beau_instagram_image($username, $slice = 99) {

   $username = strtolower($username);

    // if (!$instagram = get_transient('instagram-media-'.sanitize_title_with_dashes($username))) {
   $remote = wp_remote_get('http://instagram.com/'.trim($username));

   if (is_wp_error($remote))
    return new WP_Error('site_down', __('Unable to communicate with Instagram.', 'bologna'));

if ( 200 != wp_remote_retrieve_response_code( $remote ) )
    return new WP_Error('invalid_response', __('Instagram did not return a 200.', 'bologna'));

$shards = explode('window._sharedData = ', $remote['body']);

$insta_json = explode(';</script>', $shards[1]);
$insta_array = json_decode($insta_json[0], TRUE);
if (!$insta_array)
    return new WP_Error('bad_json', __('Instagram has returned invalid data.', 'bologna'));
$username_fromur = $insta_array['entry_data']['ProfilePage'][0]['user']['username'];
$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
$instagram = array();
foreach ($images as $images) {
    if ($username_fromur == $username) {
        $instagram[] = array(
            'link'          => $images['thumbnail_src'],
            'time'          => $images['date'],
            'link_to'       => 'https://instagram.com/p/'.$images['code'].'/?taken-by='.$username,
            'comments'      => $images['comments']['count'],
            'likes'         => $images['likes']['count'],
            'type'          => $images['is_video'],
            'code'          => $images['code'],
            );
    }
}
$instagram = base64_encode( serialize( $instagram ) );
set_transient('instagram-media-'.sanitize_title_with_dashes($username), $instagram, apply_filters('null_instagram_cache_time', HOUR_IN_SECONDS*2));
    // }
$instagram = unserialize( base64_decode( $instagram ) );
return array_slice($instagram, 0, $slice);
}

function beau_instagram_folow($username, $slice = 99) {
    $username = strtolower($username);

    $remote = wp_remote_get('http://instagram.com/'.trim($username));

    if (is_wp_error($remote)){
        return new WP_Error('site_down', __('Unable to communicate with Instagram.', 'beautheme'));
    }

    if ( 200 != wp_remote_retrieve_response_code( $remote ) ){
        return new WP_Error('invalid_response', __('Instagram did not return a 200.', 'beautheme'));
    }

    $shards = explode('window._sharedData = ', $remote['body']);

    $insta_json = explode(';</script>', $shards[1]);

    $insta_array = json_decode($insta_json[0], TRUE);
    if (!$insta_array) return new WP_Error('bad_json', __('Instagram has returned invalid data.', 'beautheme'));
    $follows_insta = $insta_array['entry_data']['ProfilePage'][0]['user']['followed_by']['count'];

    return $follows_insta;
}


/**
 * Register WIDGETS
 *
 */
function yoga_register_sidebar() {

    $col = $sidebarWidgets = "";
    
    //Register to show sidebar on footer
    if (yoga_get_option('number-footer-columns')!= NULL) {
        $col    = intval(yoga_get_option('number-footer-columns'));
    }
    if($col==0){
        $col  = 3;
    }
    $columns = intval(12/$col);
    if($columns==1){
        register_sidebar(
            array(  // 1
                'name' => esc_html__( 'Footer sidebar', 'yoga' ),
                'description' => esc_html__( 'This is footer sidebar ', 'yoga' ),
                'id' => 'sidebar-footer-1',
                'before_widget' => '<div class="footer-column col-md-12 col-sm-12 col-xs-12"><div class="footer-widget">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<div class="title-widget text-16x yoga-title  text-title yoga-title-20"><span>',
                'after_title' => '</span></div>'
            )
        );
    }else{
        for ($i=1; $i <= $col; $i++) {
            register_sidebar(
                array(
                    'name' => 'Footer sidebar '.$i,
                    'id' => 'sidebar-footer-'.$i,

                    'before_title' => '<div class="title-widget text-16x yoga-title  text-title yoga-title-20"><span>',
                    'after_title' => '</span></div>'
                )
            );
        }
    }
}
add_action( 'widgets_init', 'yoga_register_sidebar' );

add_image_size('img-category-video',450,310);


?>