<?php if( get_theme_mod( 'footer-content-option' ) =='footer_widgets' ) { ?>	
					
	<div id="footer-widgets" class="cf">		

		<?php dynamic_sidebar( 'Footer Widgets' ); ?>

	</div><!--footer-widgets-->
					
<?php } // end if footer_widgets ?>