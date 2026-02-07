<?php 
	$blueprint = get_theme_mod( 'basic-or-advanced' );
	$sectionType = get_theme_mod( 'service-boxes-or-carousel-pre' );

if ( $blueprint == 'advanced' && $sectionType !== 'none' ) { 

	$page_ids = get_theme_mod( 'show_only_on_page_ids_pre' ); 

	if ( 
		( is_front_page() && !$page_ids ) || 
		( !is_front_page() && get_theme_mod( 'show_top_on_internal_pre' ) ) || 
		( is_page( explode(',' , $page_ids) ) ) || 
		( is_home() && get_theme_mod( 'show_on_blog_pre' ) ) || 
		( is_single() && get_theme_mod( 'show_on_posts_pre' ) )
	) { ?>

		<section class="pre-main-content cf" aria-label="<?php 
		if (get_theme_mod ( 'top-feature-header' )) {
			echo get_theme_mod ( 'top-feature-header' );
		} else {
			if($sectionType == 'carousel') { 
				echo 'Image Carousel'; 
			} elseif($sectionType == 'boxes') { 
				echo 'Service Boxes'; }
			else {
				echo 'Widgets';
			} 
		}?>">

			<div class="service-boxes-pre pre-main-content-section-bg cf" <?php if (get_theme_mod('service-section-bg-image-pre')) {?>style="background-image:url(<?php echo get_theme_mod('service-section-bg-image-pre'); ?>);"<?php } ?>>

				<?php if( get_theme_mod( 'service-section-remove-wrapper-pre' ) == '' ) { ?>
					<div class="pre-main-content-inner wrap">
				<?php } //end if not nowrap ?>

				<?php if( get_theme_mod ( 'top-feature-header' )  ) {?>
					<div class="section-header h2"><?php echo get_theme_mod ( 'top-feature-header' ); ?></div>
				<?php } ?>

				<?php if( $sectionType == 'boxes' || $sectionType == '' ) { ?>

					<?php
						$serviceBoxesPre = get_theme_mod( 'how_many_pre', '4');
						if( $serviceBoxesPre != 0 ) { 

							switch ( $serviceBoxesPre ) {
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

							for($iii = 1; $iii <= $serviceBoxesPre; $iii++){ 
						?>
							<div class="service-box-bg-pre <?php echo $bgridClassesPre ?>">                        	
								<div class="inner-service-box-bg-pre" style="background: <?php echo get_theme_mod("service-box-color-pre", "#fff"); ?>" >
									<div class="service-title-pre" style="color:<?php echo get_theme_mod("service-box-title-color-pre"); ?>">
										<div class="h2 service-box-<?php echo $iii;?>-title-pre"><?php echo get_theme_mod("service-box-$iii-title-pre", "Service Title"); ?></div>
									</div><!--service-title-->
									<div class="service-content-pre">
										<p><?php echo get_theme_mod("service-box-$iii-content-pre", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor"); ?></p>
									</div><!--service-content-->
									<div class="service-button-pre">
										<a href="<?php echo get_theme_mod("service-box-$iii-button-link-pre"); ?>" aria-label="<?php echo get_theme_mod("service-box-$iii-aria-label-pre"); ?>"><?php echo get_theme_mod( "service-box-$iii-button-text-pre", "Learn More" ); ?></a>
									</div><!--service-button-->                        
								</div><!--inner-service-box-bg-->   
							</div><!--service-box-bg-->	
						<?php } //end for loop ?>			
					<?php } ?>  	
				<?php } ?>
		
				<?php if( $sectionType == 'carousel' ) { ?>	
						
					<?php 
						$total_slides_2 = 0;
						for($total_slides_counter_2 = 1; $total_slides_counter_2 <= 10; $total_slides_counter_2++){
							if ( ( get_theme_mod('carousel-img-upload-pre-' . $total_slides_counter_2) != '' ) || ( get_theme_mod('carousel-text-pre-' . $total_slides_counter_2) != '' ) ){
								$total_slides_2 = $total_slides_2 + 1;
							} 
						}
					?>	
					
					<div class="multiple-items-pre">
							
						<?php for($ii = 1; $ii <= $total_slides_2; $ii++){ ?>
						
							<?php if ( get_theme_mod ('carousel-type-pre-' . $ii, 'image' ) != 'image' ) { ?>
								<div class="cf carousel-text">
									<?php echo get_theme_mod('carousel-text-pre-' . $ii ); ?>
								</div>
							<?php } else { ?>
								<div class="carousel-image">
									<img alt="" src="<?php echo esc_url( get_theme_mod ('carousel-img-upload-pre-' . $ii )); ?>">
								</div>
							<?php } ?>
						<?php }  ?>					 

					</div>

				<?php } ?>
				<?php if( $sectionType == 'posts' ) { ?>	

					<?php
					$totalpostspre = get_theme_mod('post-carousel-total-posts-pre','10');
					$postTypePre = get_theme_mod('post-carousel-post-type-pre', 'post');
					$hideFeaturedPre = get_theme_mod('post-carousel-featured-display-pre');
					$hideExcerptPre = get_theme_mod('post-carousel-excerpt-display-pre');
					$hideDatePre = get_theme_mod('post-carousel-date-display-pre');
					$hideButtonPre = get_theme_mod('post-carousel-button-display-pre');
					$ButtonText = get_theme_mod('post-carousel-button-text-pre', 'View Post');
					$linkType = get_theme_mod('post-carousel-link-display-pre','');
					$postImageAlign = get_theme_mod('post-carousel-image-pos-pre','');
					$sl_query_args = array(
						'post_type' => $postTypePre,
						'posts_per_page' => $totalpostspre,
					);
					$slider_query = new WP_Query( $sl_query_args );
					
					if ( $slider_query->have_posts() ) : ?>
					
						<div class="multiple-items-pre">
							<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); // run the loop ?>
								<div class="carousel-post <?php if($postImageAlign){echo 'img-left';} ?>">
									<div class="carousel-post-inner cf">
										<?php if ($linkType) { ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >	
										<?php } ?>
											<?php 
												if (!$hideFeaturedPre) {
													if ( has_post_thumbnail()) { the_post_thumbnail('medium_large', array('class' => 'post-image', 'alt' => '')); } 
												}
											?>
											<div class="fs-post-info">
												<?php if (!$linkType) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php } ?>
													<div class="h2 fs-post-title"><?php the_title();?></div>	
												<?php if (!$linkType) { ?></a><?php } ?>
												
												<?php if (!$hideDatePre) { ?><time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time( get_option('date_format') ); ?></time><?php } ?>
												
												<?php if (!$hideExcerptPre) { ?><div class="fs-post-excerpt cf"><?php the_excerpt(); ?></div><?php } ?>
												
												<?php if (!$hideButtonPre) { ?>
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
						
					<?php endif; wp_reset_query(); ?>

				<?php } ?>					
		
				<?php if( $sectionType == 'widgets' ) { ?>	
					
					<div id="pre-content-widgets" class="cf">			
						<div class="inner-pre-content-widgets">
							<?php dynamic_sidebar( 'Top Feature Section Widgets' ); ?>	
						</div>
					</div>

				<?php } ?>
							
				<?php if( get_theme_mod( 'service-section-remove-wrapper-pre' ) =='' ) { ?>		
					</div><!--pre-main-content-inner wrap-->
				<?php } //end if not nowrap ?>			
				
			</div><!--pre-main-content-section-bg-->

		</section><!--pre-main-content-->

	<?php } //end display conditionals ?>

<?php } //end if advanced and section is enabled ?>	