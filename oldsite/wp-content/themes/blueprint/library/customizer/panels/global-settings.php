<?php
/* 
	global-settings.php
	Descripion: adds includes for settings and controllers for items in the global settings panel 
*/

   //By Convention, classes start with a capital and are camelCased
   class GlobalSettings{
		
		//MUST USE THIS FUNCTION -  since PHP 5.3.3
		function __construct(){
			//initialize stuff here
			add_action( 'customize_register',  array( &$this, 'getIncludes' ) );
		}

		function getIncludes($wp_customize){	
			require('includes/global-settings-basic-or-advanced.php'); 
			require('includes/global-settings-cookie-consent.php'); 
			require('includes/global-settings-typography.php');
			require('includes/global-settings-business-information.php');
			require('includes/global-settings-social-media.php');
			require('includes/global-settings-static-homepage.php');
			require('includes/global-settings-widgets.php');
			require('includes/global-settings-yext.php');
			require('includes/global-settings-google-analytics.php');
			require('includes/global-settings-google-tag-manager.php');
			require('includes/global-settings-schema-markup.php');
			require('includes/global-settings-additional-header-scripts.php');
			require('includes/global-settings-additional-footer-scripts.php');
			
			// Add Other Panels to combine all into single customize_register action
			require('banner-cta.php');
			require('header-nav.php');
			require('pre-main-content.php');
			require('pre-main-content-2.php');
			require('main-content.php');
			require('homepage-service-boxes.php');
			require('homepage-service-boxes-2.php');
			require('pre-footer-form-and-cta-settings.php');
			require('footer-and-contact-form.php');
			require('blog.php');
			require('cpt-options.php');
			require('woo-com.php');
			
			require('external-libraries.php');

			//require('includes/opacity-slider.php');
		}
	}

	$global_settings = new GlobalSettings();

?>