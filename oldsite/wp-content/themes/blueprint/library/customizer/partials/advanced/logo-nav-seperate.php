<?php if( get_theme_mod ( 'basic-or-advanced' ) =='advanced' && !get_theme_mod ( 'basic-nav-layout' )) { ?>
<div class="logo-nav cf" style="background-color: <?php echo get_theme_mod( 'logo-nav-bg-color-picker', '#ffffff' ); ?>;">
	<div id="inner-header" class="wrap cf">

		<div id="logo" class="d-1of2 t-1of2 m-all" itemscope itemtype="http://schema.org/Organization">
			<a itemprop="url" href="<?php echo home_url(); ?>" rel="nofollow"><img itemprop="logo" src="<?php             
				echo get_theme_mod( 'img-upload', get_template_directory_uri()."/library/images/sbb-logo.png");?>" alt="<?php bloginfo( 'name' ); ?> Logo">
			</a>
		</div><!--logo-->

		<div class="header-address d-1of2 t-1of2 m-all">

			<?php if( !get_theme_mod( 'header-address-setting' )) { ?>
				<div class="header-email"><span class="contacts"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"></path></svg> </span><a href="mailto:<?php echo get_theme_mod( 'email', 'name@domain.com' ); ?>"><?php echo get_theme_mod( 'email', 'name@domain.com' ); ?></a></div>
				<div class="header-mailing"><span class="contacts"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="15" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg> </span><?php echo get_theme_mod( 'address-street','1234 Main St.' ); ?><?php if( get_theme_mod( 'address-street' )) { ?>,<?php } // end if street ?> <?php echo get_theme_mod( 'address-city','Citytown' ); ?><?php if( get_theme_mod( 'address-city' )) { ?>,<?php } // end if city ?> <?php echo get_theme_mod( 'address-state','NY' ); ?> <?php echo get_theme_mod( 'address-zip','12345' ); ?></div>
			<?php } // end if default address ?>
			<?php if( get_theme_mod( 'header-address-setting' )) { ?>
				<div id="header-widget" class="">	
					<?php // dynamic_sidebar( 'Header Widget' ); ?>

					<?php if ( is_active_sidebar( 'Header Widget' ) ) : ?>

						<?php dynamic_sidebar( 'Header Widget' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<div class="no-widgets">
							<p><?php _e( 'Add widget(s) using the widgets panel and they will appear here.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>								

				</div><!--header-widget-->
			<?php } // end if widget ?>

		</div><!--header-address-->

	</div><!--inner-header-->
	
</div><!--logo-nav-->

<div class="nav-bg cf" style="background-color: <?php echo get_theme_mod( 'nav-bg-color-picker', '#6E6E6E' ); ?>;">
	
	<nav class="wrap cf" id="nav" aria-label="Main" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
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
	
</div><!--nav-bg-->

<?php } // end if advanced ?>