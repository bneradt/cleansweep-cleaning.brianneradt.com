<?php do_action('before_sidebar'); ?>
				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

<?php if( get_theme_mod ( 'basic-or-advanced' ) !=='realestatepage' ) { ?>					
					
					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						<!--<div class="no-widgets">
							<p><?php // _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
						</div>-->

					<?php endif; ?>
<?php } //end if NOT realestate ?>

				
					
					
<?php if( get_theme_mod ( 'basic-or-advanced' ) =='realestatepage' ) { ?>					
					<div class="realestate-sidebar">
					<a class="sched" href="<?php if ( get_theme_mod( 'schedule-showing-link' )) { echo get_theme_mod( 'schedule-showing-link' ); } else echo '#contact';?>"> Schedule a Showing</a>
					<p><span>Price:</span> $<?php echo get_theme_mod( 'amenities-price' ); ?></p>
					<p><span>Beds:</span> <?php echo get_theme_mod( 'amenities-beds' ); ?></p>
					<p><span>Sq Ft:</span> <?php echo get_theme_mod( 'amenities-square-feet' ); ?></p>
					<p><span>Property Type:</span> <?php echo get_theme_mod( 'amenities-property-type' ); ?></p>
					</div>	
<?php } //end if IS realestate ?>					
				</div>
