<?php
/**
 * Wellcome 
 * @package Beau-Core
 * @subpackage BeauCore_AdminScreen
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$theme = wp_get_theme();
?>
<div class="wrap about-wrap">
    <h1> <?php esc_html_e('Welcome to ','beau-core'); echo $theme->get( 'Name' );?> <?php echo $theme->get( 'Version' ); ?> !</h1>
   <div class="about-text"> Bla bla bla </div>
	<div class="welcome-tour">
		<iframe width="1120" height="630" src="https://www.youtube.com/embed/XrMssQ2JB48?rel=0" frameborder="0" allowfullscreen></iframe>

		<div class="col three-col">

			<div class="col">
				<h3><?php esc_attr_e( 'Welcome To ', 'beau-core' ); ?><?php echo $theme->get( 'Name' ); ?></h3>
				<p><?php esc_attr_e( 'In 2012 we set out to make the perfect theme and beau-core was born. Since then it has been the #1 selling theme with an ever growing user base of nearly 300,000 customers. We are thrilled you chose beau-core and feel it will change your outlook on what a Wordpress theme can do.', 'beau-core' ); ?></p>
			</div>

			<div class="col">
				<h3><?php esc_attr_e( 'Powerful Customization Tools', 'beau-core' ); ?></h3>
				<p><?php echo $theme->get( 'Name' ); ?><?php esc_attr_e( ' includes an incredibly advanced options network. This network consists of Theme Options,  Page Options . Together these tools, along with other included assets allow you to build professional websites without having to code.', 'beau-core' ); ?></p>
			</div>

			<div class="col last-feature last">
				<h3><?php esc_attr_e( '5 Star Customer Support', 'beau-core' ); ?></h3>
				<p><?php esc_attr_e( 'Beau understands that there can be no product success, without excellent customer support. We strive to always provide 5 star support and to treat you as we would want to be treated. This helps form a relationship between us that benefits all Beau customers.', 'beau-core' ); ?></p>
			</div>

		</div>
	</div>
	<div class="beau-thanks">
		<p class="description"><?php esc_attr_e( 'Thank you for choosing Beau. We are honored and are fully dedicated to making your experience perfect.', 'beau-core' ); ?></p>
	</div>

</div>