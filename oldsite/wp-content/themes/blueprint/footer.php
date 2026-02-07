		
		<?php do_action('after_sidebar'); ?>

		<?php get_template_part('library/customizer/partials/advanced/bottom-feature-section'); ?>

		<?php
			for($i = 2; $i <= 6; $i++){
				require get_template_directory() . '/library/customizer/partials/advanced/bottom-feature-section-2.php';
			}
		?>
		
		<?php get_template_part('library/customizer/partials/pre-footer-form-and-cta');?>
		
		<?php do_action('blueprint_before_footer'); ?>
		
			<footer class="footer" role="contentinfo" <?php if (get_theme_mod('footer-bg-image')) {?>style="background-image:url(<?php echo get_theme_mod('footer-bg-image'); ?>);"<?php } ?>>	
				
				<div id="inner-footer" class="wrap cf">
					
					<?php get_template_part('library/customizer/partials/footer-content');?>
					
				</div><!--inner-footer-->
				
				<?php get_template_part('library/customizer/partials/bottom-bar');?>

			</footer>
			
		<?php do_action('blueprint_theme_end'); ?>
		
		<?php wp_footer(); ?>
		
		<?php 
		if( is_front_page() ) { 
		
			if( get_theme_mod( 'nav-over-banner' ) ) {
				$sectionType = get_theme_mod( 'slider_or_static', 'static' );
				
				if ($sectionType == 'static' && !get_theme_mod ( 'banner-cta-vertical-center' ) ) { ?>
					
					<script>
						function headerPadding() {
							setTimeout(function() {
								var headOffset = jQuery('header.header').height();
								var headOffsetSplit = jQuery('header.header').height() / 2;

								jQuery('.banner').each(function(){
									jQuery(this).css('padding-top', headOffset + 'px');
								});

								jQuery('.shared-banner-cta').each(function(){
									jQuery(this).css('bottom', 'calc(50% - ' + headOffsetSplit + 'px)');
								});

							}, 150);
						}
						headerPadding();
						window.addEventListener("resize", headerPadding);
					</script>
				<?php } elseif ($sectionType == 'slider'  && !get_theme_mod ( 'static-cta-vertical-center' ) ) { ?>
					<script>
						function headerPadding() {
							setTimeout(function() {
								var headOffset = jQuery('header.header').height();
								var headOffsetSplit = jQuery('header.header').height() / 2;

								jQuery('.banner-slide').each(function(){
									jQuery(this).css('padding-top', headOffset + 'px');
								});

								jQuery('.shared-banner-cta').each(function(){
									jQuery(this).css('bottom', 'calc(50% - ' + headOffsetSplit + 'px)');
								});

							}, 150);
						}
						headerPadding();
						window.addEventListener("resize", headerPadding);
					</script>
					
				<?php }
			}
		}
		?>
		

	</body>

</html> <!-- end of site. what a ride! -->
