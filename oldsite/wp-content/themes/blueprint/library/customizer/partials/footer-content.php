<?php if( get_theme_mod( 'footer-content-option' ) =='default' || get_theme_mod( 'footer-content-option' ) =='' )  { ?>	

	<div id="footer-columns">

		<?php get_template_part('library/customizer/partials/footer-column-1');?>

		<?php get_template_part('library/customizer/partials/footer-column-2');?>

		<?php get_template_part('library/customizer/partials/footer-column-3');?>

	</div><!--footer-columns--> 

<?php } // end if default ?>

<?php get_template_part('library/customizer/partials/advanced/footer-widgets');?>