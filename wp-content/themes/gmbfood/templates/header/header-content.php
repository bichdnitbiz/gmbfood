<?php 
	$style_header = $text_header = $search_option = '';
	if (function_exists('yoga_get_option')) {
		$style_header = yoga_get_option('header-style');
		$text_header = yoga_get_option('text-button-header');
		$search_option = yoga_get_option('search-option');
	}
?>
<div class="row header-defaut <?php echo esc_attr($style_header) ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="yoga-logo">
		            <?php do_action('logo-type','main_logo');?>
					<?php do_action('logo-type','header_fixed_logo');?>
		        </div>
		        <div class="logo-mobile">
		            <?php do_action('logo-type','mobile_logo');?>
		        </div>
			</div>
			<div class="col-md-10">
				<div class="right-menu">
					<div class="button-header">
						<?php echo yoga_html_wpkses($text_header); ?>
					</div>
					<?php if ($search_option == '1'): ?>
						<div class="header-menu__search">
		                    <div class="search" data-toggle="modal" data-target="#search-popup">
		                        <i class="fa fa-search"></i>
		                    </div>
		                </div> 
		            <?php endif ?>

					<div class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'yoga' ); ?>">
						<?php
						        wp_nav_menu( array(
						            'theme_location' => 'navbar',
							        'container'      => false,
							        'menu_class'     => 'nav navbar-nav',
							        'fallback_cb'    => '__return_false',
							        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							        'depth'          => 2,
									'walker' => new yoga_walker_nav_menu()
						       ) );
						?>
					</div><!-- #site-navigation -->
					
					<!-- Mobile menu -->
					<nav class="navbar navbar-topbar navbar-dark">
					  <button class="navbar-toggler hidden-xl-up" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
					    &#9776;
					  </button>
					  <div class="collapse navbar-toggleable-xs" id="collapsingNavbar">
					    <?php
					        wp_nav_menu( array(
					          'theme_location' => 'navbar',
					          'container'      => false,
					          'menu_class'     => 'nav navbar-nav',
					          'fallback_cb'    => '__return_false',
					          'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					          'depth'          => 2,
					          'walker'         => new yoga_walker_nav_menu()
					       ) );
					    ?>
					  </div>
					</nav>
					<!-- End Mobile menu -->
				</div>
			</div>
		</div>
	</div>
</div>