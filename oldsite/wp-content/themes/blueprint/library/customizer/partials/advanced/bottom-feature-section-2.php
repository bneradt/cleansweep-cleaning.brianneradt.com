<?php 
	$blueprint = get_theme_mod( 'basic-or-advanced' ); 
	$sectionType = get_theme_mod( 'service-boxes-or-carousel-' . $i, 'none' );

if ( $blueprint == 'advanced' && $sectionType !== 'none' ) { 

	$page_ids = get_theme_mod( 'show_only_on_page_ids_' . $i ); 

	if ( 
		( is_front_page() && !$page_ids ) || 
		( !is_front_page() && get_theme_mod( 'show_bottom_on_internal_' . $i ) ) || 
		( is_page( explode(',' , $page_ids) ) ) || 
		( is_home() && get_theme_mod( 'show_on_blog_' . $i ) ) || 
		( is_single() && get_theme_mod( 'show_on_posts_' . $i ) )
	) { ?>

		<section class="post-main-content-<?php echo $i;?> cf" aria-label="<?php 
		if (get_theme_mod ( 'bottom-feature-header-' . $i )) {
			echo get_theme_mod ( 'bottom-feature-header-' . $i );
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

			<div class="service-boxes-<?php echo $i;?> post-main-content-section-bg-<?php echo $i;?> cf" <?php if (get_theme_mod('service-section-bg-image-' . $i) ) {?>style="background-image:url(<?php echo get_theme_mod('service-section-bg-image-' . $i); ?>);"<?php } ?>>

			<?php if( get_theme_mod( 'service-section-remove-wrapper-' . $i ) == '' ) { ?>	
				<div class="post-main-content-inner-<?php echo $i;?> wrap">
			<?php } //end if not nowrap ?>	
			
			<?php if( get_theme_mod ( 'bottom-feature-header-' . $i )  ) {?>
				<div class="section-header h2"><?php echo get_theme_mod ( 'bottom-feature-header-' . $i ); ?></div>
			<?php } ?>
			
			<?php if( $sectionType  == 'boxes' || $sectionType == '' ) { ?>
			
				<?php
				$serviceBoxes = get_theme_mod( 'how_many_' . $i, '3');
				
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
					<div class="service-box-bg-<?php echo $i;?> <?php echo $bgridClasses ?>">
						<div class="inner-service-box-bg-<?php echo $i;?>" style="background: <?php echo get_theme_mod("service-box-color-" . $i, "#fff"); ?>" >
							<div class="service-title-<?php echo $i;?>" style="color:<?php echo get_theme_mod("service-box-title-color-" . $i ); ?>">
								<h2 class="service-box-<?php echo $iii;?>-title-<?php echo $i;?>"><?php echo get_theme_mod("service-box-$iii-title-$i", "Service Title"); ?></h2>
							</div><!--service-title-->
							<div class="service-content-<?php echo $i;?>">
								<p><?php echo get_theme_mod("service-box-$iii-content-$i", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor"); ?></p>
							</div><!--service-content-->
							<div class="service-button-<?php echo $i;?>">
								<a href="<?php echo get_theme_mod("service-box-$iii-button-link-$i"); ?>" aria-label="<?php echo get_theme_mod("service-box-$iii-aria-label-$i"); ?>"><?php echo get_theme_mod( "service-box-$iii-button-text-$i", "Learn More" ); ?></a>
							</div><!--service-button-->
						</div><!--inner-service-box-bg-->
					</div><!--service-box-bg-->	

					<?php } //end for loop ?>

				<?php } ?>

			<?php } //end if service boxes ?>

			<?php if( $sectionType == 'carousel'  ) { ?>

				<?php
					$total_slides_2 = 0;
					for($total_slides_counter_2 = 1; $total_slides_counter_2 <= 10; $total_slides_counter_2++){
						if ( ( get_theme_mod('carousel-img-upload-' . $i . '-' . $total_slides_counter_2) != '' ) || ( get_theme_mod('carousel-text-' . $i . '-' . $total_slides_counter_2) != '' ) ){
						
							$total_slides_2 = $total_slides_2 + 1;
						}
					}
				?>
				<div class="multiple-items-<?php echo $i;?>">
					<?php for($ii = 1; $ii <= $total_slides_2; $ii++){ ?>
					
						<?php if ( get_theme_mod ('carousel-type-' . $i . '-' . $ii, 'image' ) != 'image' ) { ?>
							<div class="cf carousel-text">
								<?php echo get_theme_mod('carousel-text-' . $i . '-' . $ii ); ?>
							</div>
						<?php } else { ?>
							<div class="carousel-image">
								<img alt="" src="<?php echo esc_url( get_theme_mod ('carousel-img-upload-' . $i . '-' . $ii )); ?>">
							</div>
							<?php } ?>
					<?php } ?>
				</div><!--multiple-items-->	

			<?php } //end if carousel ?>
			
			<?php if( $sectionType == 'posts' ) {

				$totalposts = get_theme_mod('post-carousel-total-posts-' . $i, '10');
				$postTypePost = get_theme_mod('post-carousel-post-type-' . $i , 'post');
				$hideFeaturedPost = get_theme_mod('post-carousel-featured-display-' . $i );
				$hideExcerptPost = get_theme_mod('post-carousel-excerpt-display-' . $i );
				$hideDatePost = get_theme_mod('post-carousel-date-display-' .$i );
				$hideButtonPost = get_theme_mod('post-carousel-button-display-' . $i );
				$ButtonText = get_theme_mod('post-carousel-button-text-' . $i, 'View Post');
				$linkType = get_theme_mod('post-carousel-link-display-' . $i,'');
				$postImageAlign = get_theme_mod('post-carousel-image-pos-' . $i,'');
				$PostSl_query_args = array(
					'post_type' => $postTypePost,
					'posts_per_page' => $totalposts,
				);
				$PostSl_query = new WP_Query( $PostSl_query_args );
				
				if ( $PostSl_query->have_posts() ) : ?>
				
					<div class="multiple-items-<?php echo $i;?>">
						<?php while ( $PostSl_query->have_posts() ) : $PostSl_query->the_post(); // run the loop ?>
							<div class="carousel-post <?php if($postImageAlign){echo 'img-left';} ?>">
								<div class="carousel-post-inner cf">
									<?php if ($linkType) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >	
									<?php } ?>
									<?php 
										if (!$hideFeaturedPost) {
											if ( has_post_thumbnail()) { the_post_thumbnail('medium_large', array('class' => 'post-image', 'alt' => '')); } 
										}
									?>
									<div class="fs-post-info">
										<?php if (!$linkType) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php } ?>
											<div class="h2 fs-post-title"><?php the_title();?></div>
										<?php if (!$linkType) { ?></a><?php } ?>										
										
										<?php if (!$hideDatePost) { ?><time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d'); ?>" itemprop="datePublished"><?php echo get_the_time( get_option('date_format') ); ?></time><?php } ?>
										
										<?php if (!$hideExcerptPost) { ?><div class="fs-post-excerpt"><?php the_excerpt(); ?></div><?php } ?>
										
										<?php if (!$hideButtonPost) { ?>
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

				<div id="post-content-widgets-<?php echo $i;?>" class="cf">
					<div class="inner-post-content-widgets-<?php echo $i;?>">
						<?php dynamic_sidebar( 'Bottom Feature Section ' . $i . ' Widgets' ); ?>
					</div>
				</div>

			<?php } //end if widgets ?>

			<?php if( get_theme_mod( 'service-section-remove-wrapper-' . $i ) =='' ) { ?>
				</div><!--post-main-content-inner wrap-->
			<?php } //end if not nowrap ?>

			<?php if( $sectionType == 'map' ) { ?>	

				<?php if( !get_theme_mod( 'map-iframe-' . $i )) { ?>
					<div id="map" id="post-content-map" class="cf"></div>
					<!-- Replace the value of the key parameter with your own API key. -->
					<?php 	
						$latitude = get_theme_mod( 'latitude-' . $i );
						$longitude = get_theme_mod( 'longitude-' . $i );
						if (!$latitude){
							$latitude = -21.807882;
						}
						if (!$longitude){
							$longitude = 134.863577;
						}
						$zoom = get_theme_mod( 'zoom-' . $i );
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
				
				<?php if( get_theme_mod( 'map-iframe-' . $i )) { ?>
					<?php echo get_theme_mod('map-iframe-' . $i ); ?>
				<?php } //end if map iframe ?>

			<?php } //end if map ?>

			</div><!--post-main-content-section-bg-->
		</section><!--post-main-content-->

	<?php } //end display conditionals ?>

<?php } //end if advanced and section is enabled ?>