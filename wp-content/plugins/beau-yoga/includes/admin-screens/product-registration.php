<?php
$bnb_theme          = wp_get_theme();
if ($bnb_theme->parent_theme) {
    $template_dir   =  basename(get_template_directory());
    $bnb_theme      = wp_get_theme($template_dir);
}
$bnb_version        = $bnb_theme->get( 'Version' );
$support_url        = esc_url("http://support.beautheme.com");
$docs_url        = esc_url("http://docs.beautheme.com");
$theme_bnb_url      = esc_url('http://beautheme.com/');
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

    <div class="about-text"> <?php esc_html_e('BnB is now installed and ready to use! Get ready to build something beautiful. Please register your purchase to get support.','bnb');?></div>
    <div class="bnb-logo">
        <span class="bnb-version"> <?php esc_html_e('Version ','bnb');?><?php echo esc_html($bnb_version);?></span>
    </div>
    <h2 class="nav-tab-wrapper">
        <?php
            printf( '<a href="%s" class="nav-tab  nav-tab-active">%s</a>', admin_url( 'admin.php?page=bnb' ), esc_html__( "Product Registration", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-support' ), esc_html__( "Support", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-demos' ), esc_html__( "Install Demos", "bnb" ) );
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bnb-plugins' ), esc_html__( "Plugins", "bnb" ) );
        ?>
    </h2>
    <div class="registration-steps">
        <div class="feature-section row">
            <div class="feature_step">
                <h3> <?php esc_html_e('Step 1 - Signup for Support','bnb');?> </h3>
                <p> <a href="<?php echo esc_url($support_url); ?>" target="_blank"> <?php esc_html_e('Click here','bnb');?> </a> <?php esc_html_e('to signup at our support center. View a tutorial','bnb');?> <a href="<?php echo esc_url($docs_url)?>" target="_blank"> <?php esc_html_e('here','bnb');?> </a> . <?php esc_html_e('This gives you access to our documentation, knowledgebase, video tutorials and ticket system.','bnb');?></p>
            </div>
            <div class="feature_step">
                <h3> <?php esc_html_e('Step 2 - Generate an API Key','bnb');?> </h3>
                <p><?php esc_html_e('Once you registered at our support center, you need to generate a product API key under the "Licenses" section of your Themeforest account. View a tutorial','bnb');?> <a href="#Link_to_get_api_key" target="_blank"> <?php esc_html_e('here','bnb');?> </a>.
                </p>
            </div>
            <div class="feature_step last">
                <h3><?php esc_html_e('Step 3 - Purchase Validation','bnb');?></h3>
                <p><?php esc_html_e(' Enter your ThemeForest username, purchase code and generated API key into the fields below. This will give you access to automatic theme updates.','bnb');?> </p>
            </div>
        </div>
    </div>

    <div class="feature-section">
        <div class="bnb-focus bnb-form-container">
            <p class="about-description"><?php esc_html_e('After Steps 1-2 are complete, enter your credentials below to complete product registration.','bnb');?></p>
            <div class="bnb_register">
                <form id="bnb_register--form">
                    <input name="action" type="hidden" value="bnb_regis_product">
                    <input id="bnb_username" name="bnb_username" placeholder="<?php esc_html_e('Themeforest Username','bnb');?>" type="text" value="">
                    <input id="bnb_purchase_code" name="bnb_purchase_code" placeholder="<?php esc_html_e('Enter Themeforest Purchase Code','bnb');?>" type="text" value="">
                    <input type="hidden" name="status" value="active">
                </form>
            </div>
            <div id="bnb-result"></div>
            <button type="button" class="button button-large button-primary bnb-register" id="bnb-register-product"> <?php esc_html_e('Submit','bnb');?> </button>
            <span class="bnb-loader">
                <i class="loader-icon spinner"></i>
                <span></span>
            </span>
        </div>
    </div>
    <div class="bnb-thanks">
        <p class="description"><?php esc_html_e('Thank you for choosing BnB. We are honored and are fully dedicated to making your experience perfect.','bnb');?></p>
    </div>
</div>