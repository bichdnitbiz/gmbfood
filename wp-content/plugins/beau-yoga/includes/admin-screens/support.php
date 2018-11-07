<?php
$bnb_theme          = wp_get_theme();
if ($bnb_theme->parent_theme) {
    $template_dir   =  basename(get_template_directory());
    $bnb_theme      = wp_get_theme($template_dir);
}
$bnb_version        = $bnb_theme->get( 'Version' );
$theme_bnb_url      = esc_url('http://beautheme.com/');
?>

<div class="wrap about_wrap">
    <h1> <?php esc_html_e('Welcome to BnB','bnb');?>!</h1>

    <div class="updated registration-notice-1" style="display: none;">
        <p>
            <strong> <?php esc_html_e('Thanks for registering your purchase. You will now receive the automatic updates.','bnb');?> </strong>
        </p>
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
            printf( '<a href="%s" class="nav-tab nav-tab-active">%s</a>', admin_url( 'admin.php?page=bnb-support' ), esc_html__( "Support", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-demos' ), esc_html__( "Install Demos", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-plugins' ), esc_html__( "Plugins", "bnb" ) );
        ?>
    </h2>

    <div class="row">
        <div class="bnb-focus bnb-form-container to-register">
            <p class="bnb-mediumtext"><?php esc_html_e('To access our support forum and resources, you first must register your purchase','bnb');?>.<br><?php esc_html_e(' See the Product Registration tab for instructions on how to complete registration','bnb');?>.</p>
        </div>
    </div>
    <div class="row support-feature">
        <div class="feature_step support-feature">
            <h3><i class="dashicons dashicons-sos"></i><?php esc_html_e('Submit a ticket','bnb');?></h3>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, modi facere aspernatur natus. Unde, aliquid!','bnb');?> </p>
            <a href="#beautheme" class="button button-large button-primary bnb-register">Submit a ticket</a>
        </div>

        <div class="feature_step support-feature">
            <h3><i class="dashicons dashicons-book"></i><?php esc_html_e('Document','bnb');?></h3>
            <p><?php esc_html_e(' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, nulla..','bnb');?> </p>
            <a href="#beautheme" class="button button-large button-primary bnb-register">Document</a>
        </div>

        <div class="feature_step support-feature">
            <h3><i class="dashicons dashicons-portfolio"></i><?php esc_html_e('Knowledgebase','bnb');?></h3>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat eveniet hic autem, expedita architecto aliquid explicabo pariatur incidunt recusandae consequatur.','bnb');?> </p>
            <a href="#beautheme" class="button button-large button-primary bnb-register">Knowledgebase</a>
        </div>
    </div>
    <div class="row support-feature">

        <div class="feature_step support-feature">
            <h3><i class="dashicons dashicons-portfolio"></i><?php esc_html_e('Video tutorial','bnb');?></h3>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat eveniet hic autem, expedita architecto aliquid explicabo pariatur incidunt recusandae consequatur.','bnb');?> </p>
            <a href="#beautheme" class="button button-large button-primary bnb-register">Video tutorial</a>
        </div>


        <div class="feature_step support-feature">
            <h3><i class="dashicons dashicons-portfolio"></i><?php esc_html_e('Community Forum','bnb');?></h3>
            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat eveniet hic autem, expedita architecto aliquid explicabo pariatur incidunt recusandae consequatur.','bnb');?> </p>
            <a href="#beautheme" class="button button-large button-primary bnb-register">Community Forum</a>
        </div>

    </div>
</div>