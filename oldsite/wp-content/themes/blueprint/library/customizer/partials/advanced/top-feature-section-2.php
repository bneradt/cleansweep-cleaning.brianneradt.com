<?php 
	$blueprint = get_theme_mod( 'basic-or-advanced' );
	$sectionType = get_theme_mod( 'service-boxes-or-carousel-pre-2', 'none' );

if ( $blueprint == 'advanced' && $sectionType !== 'none' ) {
	
	$page_ids = get_theme_mod( 'show_only_on_page_ids_pre_2' ); 

	if (
		( is_front_page() && !$page_ids ) || 
		( !is_front_page() && get_theme_mod( 'show_top_on_internal_pre_2' ) ) || 
		( is_page( explode(',' , $page_ids) ) ) || 
		( is_home() && get_theme_mod( 'show_on_blog_pre_2' ) ) || 
		( is_single() && get_theme_mod( 'show_on_posts_pre_2' ) )
	) { ?>

		<section class="pre-main-content-2 cf" aria-label="<?php 
		if (get_theme_mod ( 'top-feature-header-2' )) {
			echo get_theme_mod ( 'top-feature-header-2' );
		} else {
			if($sectionType == 'carousel') { 
				echo 'Image Carousel'; 
			} elseif($sectionType == 'boxes') { 
				echo 'Service Boxes'; }
			else {
				echo 'Widgets';
			} 
		}?>">

			<div class="service-boxes-pre-2 pre-main-content-section-bg-2 cf" <?php if (get_theme_mod('service-section-bg-image-pre-2')) {?>style="background-image:url(<?php echo get_theme_mod('service-section-bg-image-pre-2'); ?>);"<?php } ?>>

				<?php if( get_theme_mod( 'service-section-remove-wrapper-pre-2' ) == '' ) { ?>
					<div class="pre-main-content-inner-2 wrap">
				<?php } //end if not nowrap ?>

				<?php if( get_theme_mod ( 'top-feature-header-2' )  ) {?>
					<div class="section-header h2"><?php echo get_theme_mod ( 'top-feature-header-2' ); ?></div>
				<?php } ?>	

				<?php if( $sectionType == 'boxes' || $sectionType == '' ) { ?>

					<?php
						$serviceBoxesPre2 = get_theme_mod( 'how_many_pre_2', '4');
						if( $serviceBoxesPre2 != 0 ) {

							switch ( $serviceBoxesPre2 ) {
								case '1':
									$bgridClassesPre = "d-all t-all d-all";
									break;
								case '2':
									$bgridClassesPre = "m-all t-1of2 d-1of2";
									break;
								case '3':
									$bgridClassesPre = "m-all t-1of3 d-1of3";
									break;
								case '4':
									$bgridClassesPre = "m-all t-1of2 d-1of4";
									break;
								case '5':
									$bgridClassesPre = "m-all t-1of2 d-1of3 xl-1of5";
									break;
								case '6':
									$bgridClassesPre = "m-all t-1of2 d-1of3 xl-1of6";
									break;
							}

							for($iii = 1; $iii <= $serviceBoxesPre2; $iii++){ 
						?>
							<div class="service-box-bg-pre-2 <?php echo $bgridClassesPre ?>">
								<div class="inner-service-box-bg-pre-2" style="background: <?php echo get_theme_mod("service-box-color-pre-2", "#fff"); ?>" >
									<div class="service-title-pre-2" style="color:<?php echo get_theme_mod("service-box-title-color-pre"); ?>">
										<div class="h2 service-box-<?php echo $iii;?>-title-pre-2"><?php echo get_theme_mod("service-box-$iii-title-pre-2", "Service Title"); ?></div>
									</div><!--service-title-->
									<div class="service-content-pre-2">
										<p><?php echo get_theme_mod("service-box-$iii-content-pre-2", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor"); ?></p>
									</div><!--service-content-->
									<div class="service-button-pre-2">
										<a href="<?php echo get_theme_mod("service-box-$iii-button-link-pre-2"); ?>" aria-label="<?php echo get_theme_mod("service-box-$iii-aria-label-pre-2"); ?>"><?php echo get_theme_mod( "service-box-$iii-button-text-pre-2", "Learn More" ); ?></a>
									</div><!--service-button-->
								</div><!--inner-service-box-bg-->
							</div><!--service-box-bg-->	

						<?php } //end for loop ?>
						
					<?php } ?>
			
				<?php }  ?>

				<?php if( $sectionType == 'carousel' ) { ?>	

					<?php 
						$total_slides_2 = 0;
						for($total_slides_counter_2 = 1; $total_slides_counter_2 <= 10; $total_slides_counter_2++){
							if ( ( get_theme_mod('carousel-img-upload-pre-2-' . $total_slides_counter_2) != '' ) || ( get_theme_mod('carousel-text-pre-2-' . $total_slides_counter_2) != '' ) ){
							
								$total_slides_2 = $total_slides_2 + 1;
							}
						}
					?>	

					<div class="multiple-items-pre-2">

						<?php for($ii = 1; $ii <= $total_slides_2; $ii++){ 
								$type = get_theme_mod ('carousel-type-pre-2-' . $ii, 'image' ); ?>	
							<?php if ( $type == 'image' ) { ?>
								<div class="carousel-image">
									<img alt=""  src="<?php echo esc_url( get_theme_mod ('carousel-img-upload-pre-2-' . $ii )); ?>">
								</div>
							<?php } elseif ( $type == 'text' ) { ?>
								<div class="cf carousel-text">
									<?php echo get_theme_mod('carousel-text-pre-2-' . $ii ); ?>
								</div>
							<?php } else { ?>
								<div class="carousel-image ">
									<img alt=""  src="<?php echo esc_url( get_theme_mod ('carousel-img-upload-pre-2-' . $ii )); ?>">
									<div class="inner-carousel-text"><?php echo get_theme_mod('carousel-text-pre-2-' . $ii ); ?></div>
								</div>
							<?php } ?>
						<?php }  ?>
					</div>

				<?php } //end if carousel ?>
				
				<?php if( $sectionType == 'posts' ) { 	

					$totalpostspreTwo = get_theme_mod('post-carousel-total-posts-pre-2','10');
					$postTypePreTwo = get_theme_mod('post-carousel-post-type-pre-2', 'post');
					$hideFeaturedPreTwo = get_theme_mod('post-carousel-featured-display-pre-2');
					$hideExcerptPreTwo = get_theme_mod('post-carousel-excerpt-display-pre-2');
					$hideDatePreTwo = get_theme_mod('post-carousel-date-display-pre-2');
					$hideButtonPreTwo = get_theme_mod('post-carousel-button-display-pre-2');
					$ButtonText = get_theme_mod('post-carousel-button-text-pre-2', 'View Post');
					$linkType = get_theme_mod('post-carousel-link-display-pre-2','');
					$postImageAlign = get_theme_mod('post-carousel-image-pos-pre-2','');
					$sl_query_two_args = array(
						'post_type' => $postTypePreTwo,
						'posts_per_page' => $totalpostspreTwo,
					);
					$slider_two_query = new WP_Query( $sl_query_two_args );
					
					if ( $slider_two_query->have_posts() ) : ?>
					
						<div class="multiple-items-pre-2">
							<?php while ( $slider_two_query->have_posts() ) : $slider_two_query->the_post(); // run the loop ?>
								<div class="carousel-post <?php if($postImageAlign){echo 'img-left';} ?>">
									<div class="carousel-post-inner cf">
										<?php if ($linkType) { ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >	
										<?php } ?>
											<?php 
												if (!$hideFeaturedPreTwo) {
													if ( has_post_thumbnail()) { the_post_thumbnail('medium_large', array('class' => 'post-image', 'alt' => '')); } 
												}
											?>
											<div class="fs-post-info">
												<?php if (!$linkType) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php } ?>
													<div class="h2 fs-post-title"><?php the_title();?></div>
												<?php if (!$linkType) { ?></a><?php } ?>
												
												<?php if (!$hideDatePreTwo) { ?><time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time( get_option('date_format') ); ?></time><?php } ?>
												
												<?php if (!$hideExcerptPreTwo) { ?><div class="fs-post-excerpt"><?php the_excerpt(); ?></div><?php } ?>
												
												<?php if (!$hideButtonPreTwo) { ?>
													<?php if (!$linkType) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php } ?>
														<div class="fs-post-button"><?php echo $ButtonText; ?></div>
													<?php if (!$linkType) { ?></a><?php } ?>
												<?php } ?>
											</div>
										<?php if ($linkType) { ?>
											</a>
										<?php } ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						
					<?php endif; wp_reset_query(); 

				} ?>	

				<?php if( $sectionType == 'widgets' ) { ?>	
					<div id="pre-content-widgets-2" class="cf">
						<div class="inner-pre-content-widgets-2">
							<?php dynamic_sidebar( 'Second Top Feature Section Widgets' ); ?>	
						</div><!--inner-pre-content-widgets-->
					</div><!--inner-inner-pre-content-widgets-->
				<?php } ?>

				<?php if( get_theme_mod( 'service-section-remove-wrapper-pre-2' ) =='' ) { ?>
					</div><!--pre-main-content-inner wrap-->
				<?php } //end if not nowrap ?>

			</div><!--pre-main-content-section-bg-->

		</section><!--pre-main-content-->

	<?php } //end display conditionals ?>
	
<?php } //end if advanced and section is enabled  ?>	