<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

        <?php if(get_theme_mod( 'yext-id' ) && '' != get_theme_mod( 'yext-id' )){ ?>
                  <script>
                    if (!yext) {
                        window.yOptInQ = window.yOptInQ || [];
                        var yext = {'analytics': {'optIn': function() { window.yOptInQ.push(arguments); }}};
                    }
                    yext.analytics.optIn(true);
                  </script>
        <?php } ?>

        <?php // customizer styles ?>
        <?php if (is_customize_preview()) {
			echo '<style>';
			require 'library/customizer/css/css-main.php';	
			echo '</style>';
		} ?>
        <?php // end customizer styles ?>
        
	</head>

	<body <?php body_class(); ?>>
		
		<?php wp_body_open(); ?>
		
			<?php do_action('blueprint_theme_start'); ?>

			<header class="header" role="banner">

				<a class="skip-link screen-reader-text" href="#nav">Skip to navigation</a>
				
				<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            	<?php get_template_part('library/customizer/partials/top-bar');?>
				
				<?php get_template_part('library/customizer/partials/logo-nav');?>
				
				<?php get_template_part('library/customizer/partials/advanced/logo-nav-seperate');?>
				
			</header>
			
			<?php 
				if( empty(get_theme_mod ( 'disable-banner-section' ) ) ) {

					do_action('blueprint_banner_before');

					get_template_part('library/customizer/partials/static-banner');
					
					if ( is_front_page() ) {
						get_template_part('library/customizer/partials/advanced/slider');
					
						get_template_part('library/customizer/partials/advanced/video-banner');
					}

					do_action('blueprint_banner_after');

				} 
			?>

			<?php get_template_part('library/customizer/partials/advanced/top-feature-section');?>
			
			<?php get_template_part('library/customizer/partials/advanced/top-feature-section-2');?>
			
			<?php do_action('blueprint_before_main_content'); ?>