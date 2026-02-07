<?php 
	$blueprint = get_theme_mod( 'basic-or-advanced' );
	$sectionType = get_theme_mod( 'service-boxes-or-carousel', 'map' );
	$removeWrapper = get_theme_mod( 'service-section-remove-wrapper' );

if( $sectionType !== 'none' ) {

	$page_ids = get_theme_mod( 'show_only_on_page_ids' );

	if ( 
		( is_front_page() && !$page_ids ) || 
		( !is_front_page() && get_theme_mod( 'show_bottom_on_internal' ) ) || 
		( is_page( explode(',' , $page_ids) ) ) || 
		( is_home() && get_theme_mod( 'show_on_blog'  ) ) || 
		( is_single() && get_theme_mod( 'show_on_posts' ) )
	) {?>

		<section class="post-main-content cf" aria-label="<?php 
		if (get_theme_mod ( 'bottom-feature-header' )) {
			echo get_theme_mod ( 'bottom-feature-header' );
		} else {
			if ($sectionType == 'map') { 
				echo 'Map'; 
			} elseif($sectionType == 'carousel') { 
				echo 'Image Carousel'; 
			} elseif($sectionType == 'boxes') { 
				echo 'Service Boxes'; }
			else {
				echo 'Widgets';
			} 
		}?>">

			<div class="service-boxes post-main-content-section-bg cf" <?php if (get_theme_mod('service-section-bg-image')) {?>style="background-image:url(<?php echo get_theme_mod('service-section-bg-image'); ?>);"<?php } ?>>
				
				<?php if ($blueprint == '' || $blueprint == 'basic' || $sectionType != 'map' && $removeWrapper == '') { ?>
					<div class="post-main-content-inner wrap cf">
				<?php } //end if not nowrap ?>

					<?php if( get_theme_mod ( 'bottom-feature-header' )  ) {?>
						<div class="section-header h2"><?php echo get_theme_mod ( 'bottom-feature-header' ); ?></div>
					<?php } ?>

					<?php if ( $blueprint == '' || $blueprint == 'basic' || ( $blueprint == 'advanced' &&  $sectionType == 'boxes' ) ) { ?>
						<?php 
						$serviceBoxes = get_theme_mod( 'how_many', '3');
						
						if( $serviceBoxes != 0 ) {

							switch ( $serviceBoxes ) {
								case '1':
									$bgridClasses = "d-all t-all d-all";
									break;
								case '2':
									$bgridClasses = "m-all t-1of2 d-1of2";
									break;
								case '3':
									$bgridClasses = "m-all t-1of3 d-1of3";
									break;
								case '4':
									$bgridClasses = "m-all t-1of2 d-1of4";
									break;	
								case '5':
									$bgridClasses = "m-all t-1of2 d-1of3 xl-1of5";
									break;
								case '6':
									$bgridClasses = "m-all t-1of2 d-1of3 xl-1of6";
									break;
							} 

							for($iii = 1; $iii <= $serviceBoxes; $iii++){
							?>
								<div class="service-box-bg <?php echo $bgridClasses ?>">
									<div class="inner-service-box-bg" style="background: <?php echo get_theme_mod("service-box-color", "#fff"); ?>" >
										<div class="service-title" style="color:<?php echo get_theme_mod("service-box-title-color"); ?>">
											<h2 class="service-box-<?php echo $iii;?>-title"><?php echo get_theme_mod("service-box-$iii-title", "Service Title"); ?></h2>
										</div><!--service-title-->
										<div class="service-content">
											<p><?php echo get_theme_mod("service-box-$iii-content", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor"); ?></p>
										</div><!--service-content-->
										<div class="service-button">
											<a href="<?php echo get_theme_mod("service-box-$iii-button-link"); ?>" aria-label="<?php echo get_theme_mod("service-box-$iii-aria-label"); ?>"><?php echo get_theme_mod( "service-box-$iii-button-text", "Learn More" ); ?></a>
										</div><!--service-button-->
									</div><!--inner-service-box-bg-->
								</div><!--service-box-bg-->	
							<?php } //end for loop ?>
						<?php } ?>
						
					<?php } //end basic or services boxes ?>

					<?php if( $blueprint == 'advanced' ) { ?>
						
						<?php if( $sectionType == 'carousel'  ) { ?>

							<?php 
								$total_slides_2 = 0;
								for($total_slides_counter_2 = 1; $total_slides_counter_2 <= 10; $total_slides_counter_2++){
									
									if ( ( get_theme_mod('carousel-img-upload-' . $total_slides_counter_2) != '' ) || ( get_theme_mod('carousel-text-' . $total_slides_counter_2) != '' ) ){
										$total_slides_2 = $total_slides_2 + 1;
									}
								}
							?>
							<div class="multiple-items">
								<?php for($ii = 1; $ii <= $total_slides_2; $ii++){ ?>
									<?php if ( get_theme_mod ('carousel-type-' . $ii, 'image' ) != 'image' ) { ?>
										<div class="cf carousel-text">
											<?php echo get_theme_mod('carousel-text-' . $ii ); ?>
										</div>
									<?php } else { ?>
										<div class="carousel-image">
											<img alt="" src="<?php echo esc_url( get_theme_mod ('carousel-img-upload-' . $ii )); ?>">
										</div>
									<?php } ?>
									
								<?php } ?>
							</div><!--multiple-items-->

						<?php } //end if carousel ?>
						
						<?php if( $sectionType == 'posts' ) {

							$totalpostsPostSl = get_theme_mod('post-carousel-total-posts','10');
							$postTypePostSl = get_theme_mod('post-carousel-post-type', 'post');
							$hideFeaturedPostSl = get_theme_mod('post-carousel-featured-display');
							$hideExcerptPostSl = get_theme_mod('post-carousel-excerpt-display');
							$hideDatePostSl = get_theme_mod('post-carousel-date-display');
							$hideButtonPostSl = get_theme_mod('post-carousel-button-display');
							$ButtonText = get_theme_mod('post-carousel-button-text', 'View Post');
							$linkType = get_theme_mod('post-carousel-link-display','');
							$postImageAlign = get_theme_mod('post-carousel-image-pos','');
							$PostSl_query_args = array(
								'post_type' => $postTypePostSl,
								'posts_per_page' => $totalpostsPostSl,
							);
							$PostSl_query = new WP_Query( $PostSl_query_args );
							
							if ( $PostSl_query->have_posts() ) : ?>
							
								<div class="multiple-items">
									<?php while ( $PostSl_query->have_posts() ) : $PostSl_query->the_post(); // run the loop ?>
										<div class="carousel-post <?php if($postImageAlign){echo 'img-left';} ?>">
											<div class="carousel-post-inner cf">
												<?php if ($linkType) { ?>
													<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >	
												<?php } ?>
													<?php 
														if (!$hideFeaturedPostSl) {
															if ( has_post_thumbnail()) { the_post_thumbnail('medium_large', array('class' => 'post-image', 'alt' => '')); } 
														}
													?>
													<div class="fs-post-info">
														<?php if (!$linkType) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php } ?>
															<div class="h2 fs-post-title"><?php the_title();?></div>
														<?php if (!$linkType) { ?></a><?php } ?>													
														
														<?php if (!$hideDatePostSl) { ?><time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time( get_option('date_format') ); ?></time><?php } ?>
														
														<?php if (!$hideExcerptPostSl) { ?><div class="fs-post-excerpt"><?php the_excerpt(); ?></div><?php } ?>
														
														<?php if (!$hideButtonPostSl) { ?>
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
						
							<div id="post-content-widgets" class="cf">

								<div class="inner-post-content-widgets">
									<?php dynamic_sidebar( 'Bottom Feature Section Widgets' ); ?>
								</div>

							</div>

						<?php } //end if widgets ?>
						
						<?php if( $sectionType == 'map' ) { ?>	

							<?php if( !get_theme_mod( 'map-iframe' )) { ?>	
							<div id="map" id="post-content-map" class="cf"></div>
							<!-- Replace the value of the key parameter with your own API key. -->
							<?php 	
								$latitude = get_theme_mod( 'latitude' );
								$longitude = get_theme_mod( 'longitude' );
								if (!$latitude){
									$latitude = -21.807882;
								}
								if (!$longitude){
									$longitude = 134.863577;
								}
								$zoom = get_theme_mod( 'zoom' );
								if (!$zoom){
									$zoom = 5;
								}

							?>
							<script>
								function initMap() {
								  var myLatLng = {lat: <?php echo (float)$latitude; ?>, lng: <?php echo (float)$longitude; ?>};

								  var map = new google.maps.Map(document.getElementById('map'), {
									zoom: <?php echo (float)$zoom; ?>,
									center: myLatLng,
									mapId: 'Homepage Map Section',
								  });

								  var marker = new google.maps.marker.AdvancedMarkerElement({
									position: myLatLng,
									map: map,
									title: 'Hello World!'
								  });
								}
							</script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzvsIcNlNo-_NMgXLH95inmRa6dx2Fwwo&loading=async&libraries=marker&callback=initMap" async defer></script>
							<?php } //end if NOT map iframe ?>
							
							<?php if( get_theme_mod( 'map-iframe' )) { ?>	
								<?php echo get_theme_mod('map-iframe'); ?>
							<?php } //end if map iframe ?>
							
						<?php } //end if map ?>
						
					<?php } // end if advanced ?>


				<?php if ($blueprint == '' || $blueprint == 'basic' || $sectionType != 'map' && $removeWrapper == '') { ?>
					</div><!--post-main-content-inner wrap-->
				<?php }  //end if not nowrap ?>
		
			</div><!--post-main-content-section-bg-->
		</section><!--post-main-content-->
			
	<?php } //end display conditionals ?>

<?php } //end if advanced and section is enabled ?>