<?php if ( is_front_page() && !get_theme_mod ( 'hide-homepage-form' ) ) { ?>
	<?php if (get_theme_mod('pre-footer-form-bg-image')) {
		$preFooterBackground = wp_get_attachment_image_url(get_theme_mod('pre-footer-form-bg-image'),'full');
	}?>
	<section class="pre-footer-form" <?php if (isset($preFooterBackground)) {?>style="background-image:url('<?php echo $preFooterBackground; ?>')"<?php } ?> aria-label="Contact Form">
		
		<div class="inner-pre-footer-form wrap">

		<h2 class="pre-footer-form-title"><?php  echo get_theme_mod( 'pre-footer-contact-form-title', 'WE LOOK FORWARD TO WORKING WITH YOU' ); ?></h2>
			
			<?php 							
				$gformID = get_theme_mod( 'pre-footer-contact-form' );
				if (get_theme_mod( 'pre-footer-contact-form' ) && is_plugin_active('gravityforms/gravityforms.php')) {
				gravity_form( $gformID, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true, $tabindex = 0, $echo = true );
				} else {
				echo "<img src='" . get_template_directory_uri() . "/library/images/form2.JPG' style='margin:0 auto;display:block' alt='Form Placeholder Image'>";	
					}
			?>
			
			
		</div>

	</section>	
			
<?php } //end if front page ?>

<?php if ( !is_front_page() && !get_theme_mod ( 'hide-innerpage-cta' ) ) { ?>
<?php if (!is_page( array( 'Contact', 'Contact Us', 'contact', 'contact-us', 'contacts'  ))) { ?>
		<?php if (get_theme_mod('pre-footer-cta-bg-image')) {
		$preFooterBackground = wp_get_attachment_image_url(get_theme_mod('pre-footer-cta-bg-image'),'full');
	}?>
	<section class="pre-footer-cta" <?php if (isset($preFooterBackground)) {?>style="background-image:url('<?php echo $preFooterBackground; ?>')"<?php } ?> aria-label="Contact Us Section">
		
		<div class="inner-pre-footer-cta wrap">

			<h2 class="pre-footer-cta-title"><?php  echo get_theme_mod( 'pre-footer-cta-title', 'WE LOOK FORWARD TO WORKING WITH YOU' ); ?></h2>
			<a class="pre-footer-cta-button" href="<?php echo get_home_url() . "/" . get_theme_mod( 'pre-footer-cta-button-link', "contact"  ); ?>/" aria-label="<?php echo get_theme_mod( 'pre-footer-cta-button-aria-label' ); ?>"><?php  echo get_theme_mod( 'pre-footer-cta-button-text', 'Get Started Today!' ); ?></a>
			
		</div>

	</section>	
			
<?php } //end if NOT front page ?>   
<?php } //end if NOT contact page ?>