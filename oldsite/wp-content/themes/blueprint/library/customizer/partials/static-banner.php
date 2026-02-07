<?php 
$sectionType = get_theme_mod( 'slider_or_static', 'static' );
$hideInner = get_theme_mod( 'hide_banner_inner' );

if( !in_array($sectionType, array('slider', 'video') )  ) {

	if( 
		!$hideInner && is_front_page() || 
		$hideInner && is_front_page()  || 
		!$hideInner && !is_front_page() && !has_post_thumbnail() 
	) { ?>

		<?php 
			$defaultBanner = get_template_directory_uri() . '/library/images/sbb-banner.jpg'; 

			$bannerImageID = get_theme_mod( 'banner-img-upload');
			$bannerSmallImageID = get_theme_mod( 'banner-img-mobile-upload');
			
			if($bannerSmallImageID && $bannerImageID) {
				$mobileBanner = wp_get_attachment_image_url($bannerSmallImageID,'full');
				$desktopBanner = wp_get_attachment_image_url($bannerImageID,'full');
			} elseif ($bannerImageID) {
				$desktopBanner = wp_get_attachment_image_url($bannerImageID,'full');
				$mobileBanner = wp_get_attachment_image_url($bannerImageID,'mobile-banner');
			} else {
				$desktopBanner = $defaultBanner;
				$mobileBanner = $defaultBanner;
			}
			$ctaBackgroundColorOne = hex2rgb(get_theme_mod( 'cta-box-color' ))[0];
			$ctaBackgroundColorTwo = hex2rgb(get_theme_mod( 'cta-box-color' ))[1];
			$ctaBackgroundColorThree = hex2rgb(get_theme_mod( 'cta-box-color' ))[2];
			$ctaBackgroundOpacity = get_theme_mod( 'cta-opacity', '.7' );

			$ctaTitle = get_theme_mod( 'cta-title', 'Featured Information Area' );
			$ctaContent = get_theme_mod( 'cta-content', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit<br>amet tellus imperdiet, fermentum quam id, tincidunt metus.' );
			$ctaButtonURL = get_theme_mod( 'cta-button-target-url' );
			$ctaButtonAria = get_theme_mod( 'cta-button-aria-label' );
			$ctaButtonText = get_theme_mod( 'cta-button-text', 'Learn More' );
			$ctaNewTab = get_theme_mod( 'cta_link_new_tab' );
			$hideCTA = get_theme_mod( 'hide_cta' );
			
		?>

		<div class="banner desktop-banner skip-lazy" role="complementary" style="background-image: url(<?php echo $desktopBanner; ?> );">
			<?php if ( is_front_page() ) { ?>

				<?php if( $hideCTA  == '') { ?>
					<div class="shared-banner-cta banner-cta">
						<div class="shared-cta-bg cta-bg" style="background: rgba(<?php echo $ctaBackgroundColorOne . ',' . $ctaBackgroundColorTwo . ',' . $ctaBackgroundColorThree . ',' . $ctaBackgroundOpacity; ?>);" >
							<div class="title">
								<?php echo $ctaTitle; ?>
							</div>
							<div class="content">
								<p><?php echo $ctaContent; ?></p>
							</div>
							<div class="button">
								<a href="<?php echo $ctaButtonURL; ?>" aria-label="<?php echo $ctaButtonAria; ?>" <?php if ($ctaNewTab) { echo 'target="_blank"'; } ?>><?php echo $ctaButtonText; ?></a>
							</div>
						</div>
					  </div>
				<?php } // end if hide_cta ?>

			<?php } // end if is_front_page ?> 
		</div><!--banner-->
		<div class="banner mobile-banner skip-lazy" role="complementary" style="background-image: url(<?php echo $mobileBanner; ?> );">
			<?php if ( is_front_page() ) { ?>

				<?php if( $hideCTA  == '') { ?>
					<div class="shared-banner-cta banner-cta">
						<div class="shared-cta-bg cta-bg" style="background: rgba(<?php echo $ctaBackgroundColorOne . ',' . $ctaBackgroundColorTwo . ',' . $ctaBackgroundColorThree . ',' . $ctaBackgroundOpacity; ?>);" >
							<div class="title">
								<?php echo $ctaTitle; ?>
							</div>
							<div class="content">
								<p><?php echo $ctaContent; ?></p>
							</div>
							<div class="button">
								<a href="<?php echo $ctaButtonURL; ?>" aria-label="<?php echo $ctaButtonAria; ?>" <?php if ($ctaNewTab) { echo 'target="_blank"'; } ?>><?php echo $ctaButtonText; ?></a>
							</div>
						</div>
					  </div>  
				<?php } // end if hide_cta ?>   

			<?php } // end if is_front_page ?> 
		</div><!--banner-->

	<?php } // end if hide on inner ?>	

<?php } ?>