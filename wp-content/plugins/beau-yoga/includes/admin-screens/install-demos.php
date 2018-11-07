<?php
$bnb_theme          = wp_get_theme();

$bnb_version        = $bnb_theme->get( 'Version' );
$theme_bnb_url      = esc_url('http://beautheme.com/');

?>
<h1> <?php esc_html_e('Welcome to BnB','bnb');?>!</h1>
<div class="updated registration-notice-1" style="display: none;">
    <p><strong> <?php esc_html_e('Thanks for registering your purchase. You will now receive the automatic updates.','bnb');?> </strong></p>
</div>

<div class="updated error registration-notice-2" style="display: none;">
    <p><strong> <?php esc_html_e('Please provide all the three details for registering your copy of BnB','bnb');?>..</strong></p>
</div>

<div class="updated error registration-notice-3" style="display: none;">
    <p><strong><?php esc_html_e('Something went wrong. Please verify your details and try again.','bnb');?></strong> </p>
</div>
<?php
    $text_noti = 'BnB is now installed and ready to use! Get ready to build something beautiful. Please register your purchase to get support.';
    if (!function_exists('bnb_demo_import')) {
        $text_noti = 'Please install plugin Beautheme Importer to import demo';
    }
?>
<div class="about-text">
    <?php echo esc_attr($text_noti); ?>
</div>

<div class="bnb-logo">
    <span class="bnb-version"> <?php esc_html_e('Version ','bnb');?><?php echo esc_html($bnb_version);?></span>
</div>
<h2 class="nav-tab-wrapper">
    <?php
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb' ), esc_html__( "Product Registration", "bnb" ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-support' ), esc_html__( "Support", "bnb" ) );
        printf( '<a href="%s" class="nav-tab nav-tab-active">%s</a>', admin_url( 'admin.php?page=bnb-demos' ), esc_html__( "Install Demos", "bnb" ) );
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-plugins' ), esc_html__( "Plugins", "bnb" ) );
    ?>
</h2>

 <div class="bnb-mportant-notice bnb-focus  bnb-form-container to-register">
    <p class="about-description"><?php printf( __( 'Installing a demo provides pages, posts, images, theme options, widgets, sliders and more. IMPORTANT: The included plugins need to be installed and activated before you install a demo. Please check the "System Status" tab to ensure your server meets all requirements for a successful import. Settings that need attention will be listed in red. <a href="%s" target="_blank">View more info here</a>.', 'bnb' ), 'http://docs.beautheme.com/#importxml' ); ?></p>
</div>
<div class="clearfix"></div>
<?php
    if (function_exists('bnb_demo_import')) {
        bnb_demo_import();
    }
?>
