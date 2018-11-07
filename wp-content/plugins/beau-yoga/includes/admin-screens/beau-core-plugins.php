<?php
$bnb_theme          = wp_get_theme();
if ($bnb_theme->parent_theme) {
    $template_dir   =  basename(get_template_directory());
    $bnb_theme      = wp_get_theme($template_dir);
}
$bnb_version        = $bnb_theme->get( 'Version' );
$theme_bnb_url      = esc_url('http://beautheme.com/');
$plugins            = TGM_Plugin_Activation::$instance->plugins;

?>

<div class="wrap about_wrap">
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

    <div class="about-text"> <?php esc_html_e('Bn;B is now installed and ready to use! Get ready to build something beautiful. Please register your purchase to get support.','bnb');?></div>

    <div class="bnb-logo">
        <span class="bnb-version"> <?php esc_html_e('Version ','bnb');?><?php echo esc_html($bnb_version);?></span>
    </div>
    <h2 class="nav-tab-wrapper">
        <?php
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb' ), esc_html__( "Product Registration", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-support' ), esc_html__( "Support", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-demos' ), esc_html__( "Install Demos", "bnb" ) );
            printf( '<a href="%s" class="nav-tab nav-tab-active">%s</a>', admin_url( 'admin.php?page=bnb-plugins' ), esc_html__( "Plugins", "bnb" ) );
        ?>
    </h2>
    <div class="clearfix"></div>
    <div class="bnb-demo-themes bnb-plugins-list">
        <div class="themelist-bnb theme-browser rendered">
            <div class="themes wp-clearfix">
            <?php foreach ($plugins as $plugin) {?>
            <?php
                $class              = '';
                $plugin_status      = '';
                $file_path          = $plugin['file_path'];
                $plugin_action      = bnb_plugin_link( $plugin );

                if ( is_plugin_active( $file_path ) ) {
                    $plugin_status  = 'active';
                    $class          = 'active';
                }
            ?>
                <div aria-describedby="bnb-action bnb-name" class="theme <?php echo esc_attr($class);?> focus" data-slug="bnb" tabindex="0">
                    <div class="theme-screenshot">
                    </div>
                    <span class="more-details" id="bnb-action">
                    <?php if ( isset( $plugin['required'] ) && $plugin['required'] ) : ?>
                        <?php esc_html_e( 'Required', 'bnb' ); ?>
                    <?php else:?>
                        <?php esc_html_e( 'Recommend', 'bnb' ); ?>
                    <?php endif; ?>
                    </span>
                    <h2 class="theme-name" id="bnb-name">
                        <span class="bnb-theme-name">
                            <?php echo esc_html($plugin['name']);?>
                        </span>
                    </h2>
                    <div class="theme-actions">
                        <?php foreach ( $plugin_action as $action ) { echo bnb_display_html($action); } ?>
                    </div>
                    <?php if ( isset( $plugin_action['update'] ) && $plugin_action['update'] ) : ?>
                        <div class="theme-update">
                            <?php printf( __( 'Update Available: Version %s', 'bnb' ), $plugin['version'] ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php }?>
            </div>
        </div><!--End .themelist-bnb-->
    </div><!--End .bnb-demo-themes-->
</div>
