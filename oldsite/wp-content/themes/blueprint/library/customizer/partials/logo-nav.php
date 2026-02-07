<?php if( get_theme_mod ( 'basic-or-advanced' ) == 'basic' || get_theme_mod ( 'basic-or-advanced' ) == '' || get_theme_mod ( 'basic-nav-layout' )) { ?>
<div class="logo-nav cf" >
	<div id="inner-header" class="wrap cf">

		<div id="logo" class="d-2of7 t-all m-all" itemscope itemtype="https://schema.org/Organization">
			<a itemprop="url" href="<?php echo home_url(); ?>" rel="nofollow"><img itemprop="logo" src="<?php             
				echo get_theme_mod( 'img-upload', get_template_directory_uri()."/library/images/sbb-logo.png");?>" alt="<?php bloginfo( 'name' ); ?> Logo">
			</a>
		</div><!--logo-->

		<nav class="d-5of7 t-all m-all last-col" id="nav" aria-label="Main" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
					 'container' => false,                           // remove nav container
					 'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					 'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
					 'menu_class' => 'nav top-nav cf',               // adding custom nav class
					 'theme_location' => 'main-nav',                 // where it's located in the theme
					 'before' => '<span itemprop="name">',                                 // before the menu
					 'after' => '</span>',                                  // after the menu
					 'link_before' => '',                            // before each link
					 'link_after' => '',                             // after each link
					 'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => 'bones_main_nav_fallback'                             // fallback function (if there is one)
			)); ?>				
		</nav>
		
	</div><!--inner-header-->
</div><!--logo-nav-->
<?php } //end if basic ?>