/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

		//Font-awesome classes for social icons
		var iconClass = [
			"fa-facebook-official",
			"fa-twitter-square",
			"fa-google-plus-square",
			"fa-instagram",
			//"fa-pinterest-square",
			//"fa-youtube",
			//"fa-linkedin-square",
			//"fa-yelp",
			//"fa-tripadvisor"
		];
	
		function buildPlaceholder() {
			//Building Placeholder Icons
			var icons = "";
			for (var i = 0; i < iconClass.length; i++) {
				icons += '<i class="fa ' + iconClass[i] + '" style="margin:auto 1.5px;"></i>';
			}
			return icons;
		}
			
		
		//Placeholder if empty
		$(document).ready(function () {
				if (!($('.header-social a').length)){
						$('.header-social').html(buildPlaceholder());
						$('.footer-social').html(buildPlaceholder());
				}
		});
	

})(jQuery);
