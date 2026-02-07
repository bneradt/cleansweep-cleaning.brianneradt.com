<?php if( 
	get_theme_mod( 'default-footer-column-settings' ) =='hide_form' || 
	//get_theme_mod( 'default-footer-column-settings' ) =='hide_feed' || 
	get_theme_mod( 'default-footer-column-settings' ) =='hide_contact_us'  
) { ?>

<div class="contact-info footer-1 d-1of2 t-1of2 m-all">

<?php } // end if hide ?>		

<?php if( 
	//get_theme_mod( 'default-footer-column-settings' ) =='hide_form' || 
	get_theme_mod( 'default-footer-column-settings' ) =='all' || 
	get_theme_mod( 'default-footer-column-settings' ) ==''  
) { ?>			

<div class="footer-2 d-1of3 t-1of3 m-all">

<?php } // end if hide ?>

<?php if( 
	//get_theme_mod( 'default-footer-column-settings' ) =='hide_form' || 
	get_theme_mod( 'default-footer-column-settings' ) == 'hide_feed' //|| 
	//get_theme_mod( 'default-footer-column-settings' ) =='hide_contact_us'  
) { ?>

<div style="display: none;" class="footer-2">

<?php } // end if hide ?>	

	<div class="footer-col-title" style="color: <?php echo get_theme_mod( 'footer-title-color' ); ?> !important;"><?php echo get_theme_mod( 'blog-social-feed-title', 'Navigation' ); ?></div>
	
	<?php if( get_theme_mod ( 'blog-social-feed' ) ) { ?>
	
		<?php echo get_theme_mod( 'blog-social-feed' ); ?>		
		
	<?php } else { ?>
	
			<div role="navigation">
				<?php wp_nav_menu(array(
				'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
				'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
				'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
				'menu_class' => 'footer-nav cf',            // adding custom nav class
				'theme_location' => 'footer-links',             // where it's located in the theme
				'before' => '',                                 // before the menu
				'after' => '',                                  // after the menu
				'link_before' => '',                            // before each link
				'link_after' => '',                             // after each link
				'depth' => 0,                                   // limit the depth of the nav
				'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
				)); ?>				
			</div>      
	
	<?php } // end if not custom HTML option ?>
	
</div><!--footer-2-->