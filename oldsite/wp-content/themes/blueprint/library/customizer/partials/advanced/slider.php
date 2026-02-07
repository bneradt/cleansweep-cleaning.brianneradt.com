<?php if( get_theme_mod( 'slider_or_static' ) == 'slider' ) { ?>
			
	<?php
		$defaultBanner = get_template_directory_uri() . '/library/images/sbb-banner.jpg';
		$staticCTA = get_theme_mod( 'use-static-cta' );
	?>
	
	<style>
		@media(min-width:481px){
			<?php for($ii = 1; $ii <= 5; $ii++){ 
				$bannerImageID = get_theme_mod( 'slider-img-upload-' . $ii);
				if ($bannerImageID) {
					$desktopBanner = wp_get_attachment_image_url($bannerImageID,'full');
			?>
			.banner-<?php echo $ii; ?> {
				background-image:url('<?php echo $desktopBanner; ?>')!important;
			}
			<?php } } ?>
		}
	</style>

	<section class="banner-wrapper" aria-label="Main Banner Slider">
		<div class="single-item">
			
			<?php for($ii = 1; $ii <= 5; $ii++){ 
				if ( get_theme_mod('show_slide-' . $ii, '1') ) { ?>
				
				<?php 
					$bannerMobileImageID = get_theme_mod( 'slider-mobile-img-upload-' . $ii);
					if ($bannerMobileImageID) {
						$mobileBanner = wp_get_attachment_image_url($bannerMobileImageID,'full');
					} else {
						$bannerImageID = get_theme_mod( 'slider-img-upload-' . $ii);
						if ($bannerImageID) {
							$mobileBanner = wp_get_attachment_image_url($bannerImageID,'mobile-banner');
						} else {
							$mobileBanner = $defaultBanner;
						} 
					}
					
					$ctaBackgroundColorOne = hex2rgb(get_theme_mod( 'cta-box-color-' . $ii))[0];
					$ctaBackgroundColorTwo = hex2rgb(get_theme_mod( 'cta-box-color-' . $ii ))[1];
					$ctaBackgroundColorThree = hex2rgb(get_theme_mod( 'cta-box-color-' . $ii ))[2];
					$ctaBackgroundOpacity = get_theme_mod( 'cta-opacity-' . $ii, '.5' );
					
					$ctaTitle = get_theme_mod( 'cta-title-' . $ii, 'Featured Information Area' );
					$ctaContent = get_theme_mod( 'cta-content-' . $ii, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit<br>amet tellus imperdiet, fermentum quam id, tincidunt metus.' );
					$ctaButtonURL = get_theme_mod( 'cta-button-target-url-' . $ii );
					$ctaButtonAria = get_theme_mod( 'cta-button-aria-label-' . $ii );
					$ctaButtonText = get_theme_mod( 'cta-button-text-' . $ii, 'Learn More' );
					
					$ctaNewTab = get_theme_mod( 'cta_link_new_tab-' . $ii );
					$hideCTA = get_theme_mod( 'hide_cta-' . $ii );

				?>
				
				<div class="banner-<?php echo $ii; ?> banner-slide<?php if($ii == 1) { echo ' skip-lazy'; }; ?>" style="background-image: url(<?php echo $mobileBanner; ?> );">
					
					<?php if( $hideCTA == '' ) { ?>
					
						 <?php if( !$staticCTA ) { ?>
					
							<div class="shared-banner-cta slider-cta-<?php echo $ii; ?>">
						  
								<div class="shared-cta-bg cta-bg-<?php echo $ii; ?>" style="background: rgba(<?php echo $ctaBackgroundColorOne . ',' . $ctaBackgroundColorTwo . ',' . $ctaBackgroundColorThree . ',' . $ctaBackgroundOpacity; ?>);" >
									<div class="title-<?php echo $ii; ?> title">
									   <?php echo $ctaTitle; ?>
									</div>
									<div class="content-<?php echo $ii; ?>">
										<p><?php echo $ctaContent; ?></p>
									</div>
									<div class="button-<?php echo $ii; ?>">
									   <a href="<?php echo $ctaButtonURL; ?>" aria-label="<?php echo $ctaButtonAria; ?>" <?php if ($ctaNewTab) { echo 'target="_blank"'; } ?>><?php echo $ctaButtonText; ?></a>
									</div>
								</div><!--shared-cta-bg-->
							
							</div><!--shared-banner-cta--> 
				
						<?php } // end if use static cta ?>  
				
					<?php } // end if hide_cta ?>   

				</div><!--banner-->	
			
			<?php } } ?>
			
		</div><!--single-item-->

		<?php if( $staticCTA ) { ?>
	
			<div class="static-cta-container">
				<div class="shared-banner-cta static-cta slider-cta-1">        			
					<div class="shared-cta-bg static-cta-bg cta-bg-<?php echo $ii; ?>" style="background: rgba(<?php echo hex2rgb(get_theme_mod( 'cta-box-color-1' ))[0] . ',' . hex2rgb(get_theme_mod( 'cta-box-color-1' ))[1] . ',' . hex2rgb(get_theme_mod( 'cta-box-color-1', '#ff000000' ))[2] . ', ' . get_theme_mod( 'cta-opacity-1', '.5' ); ?>);" >
						<div class="title-1 title">
							<?php echo get_theme_mod( 'cta-title-1', 'Featured Information Area' ); ?>
						</div>
						<div class="content-1">
							<p><?php echo get_theme_mod( 'cta-content-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit<br>amet tellus imperdiet, fermentum quam id, tincidunt metus.' ); ?></p>
						</div>
						<div class="button-1">
							<a href="<?php echo get_theme_mod( 'cta-button-target-url-1' ); ?>" aria-label="<?php echo get_theme_mod( 'cta-button-aria-label-1'); ?>" <?php if ( get_theme_mod( 'cta_link_new_tab-1' ) ) { echo 'target="_blank"'; } ?>><?php echo get_theme_mod( 'cta-button-text-1', 'Learn More' ); ?></a>
						</div>                 
					</div><!--shared-cta-bg-->                            
				  </div><!--shared-banner-cta-->
			</div><!--static-cta-container-->
			
		<?php } // end if use static cta ?>

	</section><!--banner-wrapper-->
	
<?php } // end if slider ?>