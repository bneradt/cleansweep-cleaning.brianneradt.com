<?php
/* 
Welcome this is the core Blueprint file where 
most of the main functions live. Any custom 
functions are best putin the functions.php file.
*/

// ENABLE "HIDDEN" SETTINGS PAGE
require_once( __DIR__ .  '/themeoptions.php' );

// Grab All Theme Mods to Utilize Down Below
$bp_theme_mods = get_theme_mods();

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bp_head_cleanup() {

	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'bp_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'bp_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// A better title
// http://www.deluxeblogtips.com/2012/03/better-title-meta-tag.html
function rw_title( $title, $sep, $seplocation ) {
  global $page, $paged;

  // Don't affect in feeds.
  if ( is_feed() ) return $title;

  // Add the blog's name
  if ( 'right' == $seplocation ) {
    $title .= get_bloginfo( 'name' );
  } else {
    $title = get_bloginfo( 'name' ) . $title;
  }

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );

  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " {$sep} {$site_description}";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
  }

  return $title;

} // end better title

// remove WP version from RSS
function bp_rss_version() { return ''; }

// remove WP version from scripts
function bp_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function bp_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function bp_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function bp_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function bp_scripts_and_styles() {

  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {

		// modernizr (without media query polyfill)
		wp_register_script( 'blueprint-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

		// register main stylesheet
		wp_register_style( 'blueprint-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

		// ie-only style sheet
		wp_register_style( 'blueprint-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			  wp_enqueue_script( 'comment-reply' );
		}

		//adding scripts file in the footer
		wp_register_script( 'blueprint-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

		// enqueue styles and scripts
		wp_enqueue_script( 'blueprint-modernizr' );
		wp_enqueue_style( 'blueprint-stylesheet' );
		wp_enqueue_style( 'blueprint-ie-only' );

		$wp_styles->add_data( 'blueprint-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

		/*
		I recommend using a plugin to call jQuery
		using the google cdn. That way it stays cached
		and your site will load faster.
		*/
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'blueprint-js' );

	}
//start custom styles and scripts


//FONT AWESOME ALWAYS ENQUEUED ON BLUEPRINT	
	if(get_theme_mod('font_awesome') ) { 
		wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v6.5.1/css/all.css' );
	}
	
//NOT NEEDED FOR BLUEPRINT THEME
	if(get_theme_mod('wow_animate')) {				
		wp_register_style( 'animate', get_stylesheet_directory_uri() . '/library/css/animate.css', array(), '', 'all' );
		wp_enqueue_style( 'animate' );
		
		wp_register_script( 'wow', get_stylesheet_directory_uri() . '/library/js/libs/wow.min.js', array(), '1.1.2', false );		
		wp_enqueue_script( 'wow', true);
		wp_add_inline_script( 'wow', 'new WOW().init();' );
	} 


	// Start Slick Slider 1
	if ( 
		( get_theme_mod( 'slider_or_static' ) == 'slider' ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-pre' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-pre-2' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-2' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-3' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-4' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-5' ), array('carousel', 'posts') ) ) || 
		( in_array( get_theme_mod( 'service-boxes-or-carousel-6' ), array('carousel', 'posts') ) )
	) {
	
			wp_enqueue_style( 'slick-slider-styles', get_stylesheet_directory_uri() . '/library/slick/slick.min.css', array(), '', 'all' );			

			wp_enqueue_style( 'slick-slider-theme-styles', get_stylesheet_directory_uri() . '/library/slick/accessible-slick-theme.min.css', array('slick-slider-styles'), '', 'all' );			

			wp_enqueue_script( 'slick-slider', get_stylesheet_directory_uri() . '/library/slick/slick.min.js', array('jquery'), '', true );			
	}
	
	if ( get_theme_mod( 'slider_or_static' ) == 'slider' ) {
		// build slick options variable
		$slick_options = 'regionLabel:\'Slider\',';

		if(get_theme_mod( 'slider-dots' )){
			$slick_options .= 'dots: true,';
		}
		if(get_theme_mod( 'slider-infinite' )){
			$slick_options .= 'infinite: true,';
		}
		if(get_theme_mod( 'slider-auto-play' )){
			$slick_options .= 'autoplay: true,';
		}
		if( !get_theme_mod( 'slider-arrows' ) ){
			$slick_options .= 'arrows: false,';
		}
		if(get_theme_mod( 'slider-speed' )){
			$slick_options .= 'speed: ' .get_theme_mod( 'slider-speed' ) . ',';
		}
		if(get_theme_mod( 'slider-additional-settings' )){
			$slick_options .= get_theme_mod( 'slider-additional-settings' ) . ',';
		}	
		//end build variable and entered below

		$slick_init_1 = 'jQuery(".single-item").slick({'.$slick_options.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_1 );
	}

	if ( get_theme_mod( 'service-boxes-or-carousel-pre' ) == 'carousel' ) {
		// build slick carousel options variable
		$slick_carousel_options_pre = 'regionLabel:\'Top Featured Section Carousel\',';
			
		if(get_theme_mod( 'carousel-dots-pre' )){
			$slick_carousel_options_pre .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-pre' )){
			$slick_carousel_options_pre .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-pre' )){
			$slick_carousel_options_pre .= 'autoplay: true,';
		}
		
		$slick_carousel_options_pre .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-pre', '3' ) . ',';

		$slick_carousel_options_pre .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-pre', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed-pre' )){
			$slick_carousel_options_pre .= 'speed: ' .get_theme_mod( 'carousel-speed-pre' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-pre' )){
			$slick_carousel_options_pre .= get_theme_mod( 'carousel-additional-settings-pre' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_2 = 'jQuery(".multiple-items-pre").slick({'.$slick_carousel_options_pre.'});';
		
		wp_add_inline_script( 'slick-slider', $slick_init_2 );	
		
	} else if ( get_theme_mod( 'service-boxes-or-carousel-pre' ) == 'posts' ) {
		// build slick carousel options variable
		$slick_carousel_options_pre = 'regionLabel:\'Top Featured Section Post Carousel\',';
			
		if(get_theme_mod( 'post-carousel-dots-pre' )){
			$slick_carousel_options_pre .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-pre' )){
			$slick_carousel_options_pre .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-pre' )){
			$slick_carousel_options_pre .= 'autoplay: true,';
		}
		
		$slick_carousel_options_pre .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-pre', '3' ) . ',';

		$slick_carousel_options_pre .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-pre', '3' ) . ',';
		
		if(get_theme_mod( 'post-carousel-speed-pre' )){
			$slick_carousel_options_pre .= 'speed: ' .get_theme_mod( 'post-carousel-speed-pre' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-pre' )){
			$slick_carousel_options_pre .= get_theme_mod( 'post-carousel-additional-settings-pre' ) . ',';
		}		
	
		$slick_init_2 = 'jQuery(".multiple-items-pre").slick({'.$slick_carousel_options_pre.'});';
		
		wp_add_inline_script( 'slick-slider', $slick_init_2 );	
	}

	if ( get_theme_mod( 'service-boxes-or-carousel-pre-2' ) == 'carousel' ) {
		// build slick carousel pre 2 options variable
		$slick_carousel_options_pre_2 = 'regionLabel:\'Top Featured Section Carousel 2\',';
			
		if(get_theme_mod( 'carousel-dots-pre-2' )){
			$slick_carousel_options_pre_2 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-pre-2' )){
			$slick_carousel_options_pre_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-pre-2' )){
			$slick_carousel_options_pre_2 .= 'autoplay: true,';
		}
		
		$slick_carousel_options_pre_2 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-pre-2', '3' ) . ',';
		
		$slick_carousel_options_pre_2 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-pre-2', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed-pre-2' )){
			$slick_carousel_options_pre_2 .= 'speed: ' .get_theme_mod( 'carousel-speed-pre-2' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-pre-2' )){
			$slick_carousel_options_pre_2 .= get_theme_mod( 'carousel-additional-settings-pre-2' ) . ',';
		}
		//end build variable and entered below
	
		$slick_init_pre_2 = 'jQuery(".multiple-items-pre-2").slick({'.$slick_carousel_options_pre_2.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_pre_2 );	
		
	} else if ( get_theme_mod( 'service-boxes-or-carousel-pre-2' ) == 'posts' ) {
		// build slick carousel pre 2 options variable
		$slick_carousel_options_pre_2 = 'regionLabel:\'Top Featured Section Post Carousel 2\',';
			
		if(get_theme_mod( 'post-carousel-dots-pre-2' )){
			$slick_carousel_options_pre_2 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-pre-2' )){
			$slick_carousel_options_pre_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-pre-2' )){
			$slick_carousel_options_pre_2 .= 'autoplay: true,';
		}
		
		$slick_carousel_options_pre_2 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-pre-2', '3' ) . ',';
		
		$slick_carousel_options_pre_2 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-pre-2', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed-pre-2' )){
			$slick_carousel_options_pre_2 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-pre-2' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-pre-2' )){
			$slick_carousel_options_pre_2 .= get_theme_mod( 'post-carousel-additional-settings-pre-2' ) . ',';
		}
		//end build variable and entered below
	
		$slick_init_pre_2 = 'jQuery(".multiple-items-pre-2").slick({'.$slick_carousel_options_pre_2.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_pre_2 );	
	}
	
	if (get_theme_mod( 'service-boxes-or-carousel' ) == 'carousel') {	
		// build slick carousel 2 options variable
		$slick_carousel_options = 'regionLabel:\'Bottom Featured Section Carousel\',';
			
		if(get_theme_mod( 'carousel-dots' )){
			$slick_carousel_options .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite' )){
			$slick_carousel_options .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play' )){
			$slick_carousel_options .= 'autoplay: true,';
		}
		
		$slick_carousel_options .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow', '3' ) . ',';
		
		$slick_carousel_options .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed' )){
			$slick_carousel_options .= 'speed: ' .get_theme_mod( 'carousel-speed' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings' )){
			$slick_carousel_options .= get_theme_mod( 'carousel-additional-settings' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_3 = 'jQuery(".multiple-items").slick({'.$slick_carousel_options.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_3 );
		
	} else if (get_theme_mod( 'service-boxes-or-carousel' ) == 'posts') {	
		// build slick carousel 2 options variable
		$slick_carousel_options = 'regionLabel:\'Bottom Featured Section Carousel\',';
			
		if(get_theme_mod( 'post-carousel-dots' )){
			$slick_carousel_options .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite' )){
			$slick_carousel_options .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play' )){
			$slick_carousel_options .= 'autoplay: true,';
		}
		
		$slick_carousel_options .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow', '3' ) . ',';
		
		$slick_carousel_options .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed' )){
			$slick_carousel_options .= 'speed: ' .get_theme_mod( 'post-carousel-speed' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings' )){
			$slick_carousel_options .= get_theme_mod( 'post-carousel-additional-settings' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_3 = 'jQuery(".multiple-items").slick({'.$slick_carousel_options.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_3 );
	}
	
	if (get_theme_mod( 'service-boxes-or-carousel-2' ) == 'carousel') {	
		// build slick carousel bottim feature section 2 options variable
		$slick_carousel_options_2 = 'regionLabel:\'Bottom Featured Section Carousel 2\',';
			
		if(get_theme_mod( 'carousel-dots-2' )){
			$slick_carousel_options_2 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-2' )){
			$slick_carousel_options_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-2' )){
			$slick_carousel_options_2 .= 'autoplay: true,';
		}
		
		$slick_carousel_options_2 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-2', '3' ) . ',';
		
		$slick_carousel_options_2 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-2', '3' ) . ',';
		
		if(get_theme_mod( 'carousel-speed-2' )){
			$slick_carousel_options_2 .= 'speed: ' .get_theme_mod( 'carousel-speed-2' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-2' )){
			$slick_carousel_options_2 .= get_theme_mod( 'carousel-additional-settings-2' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_2 = 'jQuery(".multiple-items-2").slick({'.$slick_carousel_options_2.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_2 );
		
	} else if (get_theme_mod( 'service-boxes-or-carousel-2' ) == 'posts') {	
		// build slick carousel bottim feature section 2 options variable
		$slick_carousel_options_2 = 'regionLabel:\'Bottom Featured Section Carousel 2\',';
			
		if(get_theme_mod( 'post-carousel-dots-2' )){
			$slick_carousel_options_2 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-2' )){
			$slick_carousel_options_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-2' )){
			$slick_carousel_options_2 .= 'autoplay: true,';
		}
		
		$slick_carousel_options_2 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-2', '3' ) . ',';
		
		$slick_carousel_options_2 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-2', '3' ) . ',';
		
		if(get_theme_mod( 'post-carousel-speed-2' )){
			$slick_carousel_options_2 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-2' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-2' )){
			$slick_carousel_options_2 .= get_theme_mod( 'post-carousel-additional-settings-2' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_2 = 'jQuery(".multiple-items-2").slick({'.$slick_carousel_options_2.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_2 );
	}

	if (get_theme_mod( 'service-boxes-or-carousel-3' ) == 'carousel') {	
		// build slick carousel bottim feature section 4 options variable
		$slick_carousel_options_3 = 'regionLabel:\'Bottom Featured Section Carousel 3\',';
			
		if(get_theme_mod( 'carousel-dots-3' )){
			$slick_carousel_options_3 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-3' )){
			$slick_carousel_options_3 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-3' )){
			$slick_carousel_options_3 .= 'autoplay: true,';
		}

		$slick_carousel_options_3 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-3', '3' ) . ',';

		$slick_carousel_options_3 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-3', '3' ) . ',';

		if(get_theme_mod( 'carousel-speed-3' )){
			$slick_carousel_options_3 .= 'speed: ' .get_theme_mod( 'carousel-speed-3' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-3' )){
			$slick_carousel_options_3 .= get_theme_mod( 'carousel-additional-settings-3' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_3 = 'jQuery(".multiple-items-3").slick({'.$slick_carousel_options_3.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_3 );
		
	} else if (get_theme_mod( 'service-boxes-or-carousel-3' ) == 'posts') {	
		// build slick carousel bottim feature section 2 options variable
		$slick_carousel_options_3 = 'regionLabel:\'Bottom Featured Section Carousel 2\',';
			
		if(get_theme_mod( 'post-carousel-dots-3' )){
			$slick_carousel_options_3 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-3' )){
			$slick_carousel_options_3 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-3' )){
			$slick_carousel_options_3 .= 'autoplay: true,';
		}
		
		$slick_carousel_options_3 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-3', '3' ) . ',';
		
		$slick_carousel_options_3 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-3', '3' ) . ',';
		
		if(get_theme_mod( 'post-carousel-speed-3' )){
			$slick_carousel_options_3 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-3' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-3' )){
			$slick_carousel_options_3 .= get_theme_mod( 'post-carousel-additional-settings-3' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_3 = 'jQuery(".multiple-items-3").slick({'.$slick_carousel_options_3.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_3 );
	}
	
	if (get_theme_mod( 'service-boxes-or-carousel-4' ) == 'carousel') {	
		// build slick carousel bottim feature section 4 options variable
		$slick_carousel_options_4 = 'regionLabel:\'Bottom Featured Section Carousel 4\',';
		
		if(get_theme_mod( 'carousel-dots-4' )){
			$slick_carousel_options_4 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-4' )){
			$slick_carousel_options_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-4' )){
			$slick_carousel_options_4 .= 'autoplay: true,';
		}

		$slick_carousel_options_4 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-4', '3' ) . ',';
		
		$slick_carousel_options_4 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-4', '3' ) . ',';
	
		if(get_theme_mod( 'carousel-speed-4' )){
			$slick_carousel_options_4 .= 'speed: ' .get_theme_mod( 'carousel-speed-4' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-4' )){
			$slick_carousel_options_4 .= get_theme_mod( 'carousel-additional-settings-4' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_4 = 'jQuery(".multiple-items-4").slick({'.$slick_carousel_options_4.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_4 );	
		
	} else if (get_theme_mod( 'service-boxes-or-carousel-4' ) == 'posts') {	
		// build slick carousel bottim feature section 4 options variable
		$slick_carousel_options_4 = 'regionLabel:\'Bottom Featured Section Carousel 4\',';
		
		if(get_theme_mod( 'post-carousel-dots-4' )){
			$slick_carousel_options_4 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-4' )){
			$slick_carousel_options_2 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-4' )){
			$slick_carousel_options_4 .= 'autoplay: true,';
		}

		$slick_carousel_options_4 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-4', '3' ) . ',';
		
		$slick_carousel_options_4 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-4', '3' ) . ',';
	
		if(get_theme_mod( 'post-carousel-speed-4' )){
			$slick_carousel_options_4 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-4' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-4' )){
			$slick_carousel_options_4 .= get_theme_mod( 'post-carousel-additional-settings-4' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_4 = 'jQuery(".multiple-items-4").slick({'.$slick_carousel_options_4.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_4 );	
	}
	
	if (get_theme_mod( 'service-boxes-or-carousel-5' ) == 'carousel') {	
		// build slick carousel bottim feature section 5 options variable
		$slick_carousel_options_5 = 'regionLabel:\'Bottom Featured Section Carousel 5\',';

		if(get_theme_mod( 'carousel-dots-5' )){
			$slick_carousel_options_5 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-5' )){
			$slick_carousel_options_5 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-5' )){
			$slick_carousel_options_5 .= 'autoplay: true,';
		}

		$slick_carousel_options_5 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-5', '3' ) . ',';

		$slick_carousel_options_5 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-5', '3' ) . ',';

		if(get_theme_mod( 'carousel-speed-5' )){
			$slick_carousel_options_5 .= 'speed: ' .get_theme_mod( 'carousel-speed-5' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-5' )){
			$slick_carousel_options_5 .= get_theme_mod( 'carousel-additional-settings-5' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_5 = 'jQuery(".multiple-items-5").slick({'.$slick_carousel_options_5.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_5 );	
		
	} else if (get_theme_mod( 'service-boxes-or-carousel-5' ) == 'posts') {	
		// build slick carousel bottim feature section 5 options variable
		$slick_carousel_options_5 = 'regionLabel:\'Bottom Featured Section Carousel 5\',';

		if(get_theme_mod( 'post-carousel-dots-5' )){
			$slick_carousel_options_5 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-5' )){
			$slick_carousel_options_5 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-5' )){
			$slick_carousel_options_5 .= 'autoplay: true,';
		}

		$slick_carousel_options_5 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-5', '3' ) . ',';

		$slick_carousel_options_5 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-5', '3' ) . ',';

		if(get_theme_mod( 'post-carousel-speed-5' )){
			$slick_carousel_options_5 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-5' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-5' )){
			$slick_carousel_options_5 .= get_theme_mod( 'post-carousel-additional-settings-5' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_5 = 'jQuery(".multiple-items-5").slick({'.$slick_carousel_options_5.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_5 );	
	}
	
	if (get_theme_mod( 'service-boxes-or-carousel-6' ) == 'carousel') {	
		// build slick carousel bottim feature section 6 options variable
		$slick_carousel_options_6 = 'regionLabel:\'Bottom Featured Section Carousel 6\',';
		
		if(get_theme_mod( 'carousel-dots-6' )){
			$slick_carousel_options_6 .= 'dots: true,';
		}
		if(get_theme_mod( 'carousel-infinite-6' )){
			$slick_carousel_options_6 .= 'infinite: true,';
		}
		if(get_theme_mod( 'carousel-auto-play-6' )){
			$slick_carousel_options_6 .= 'autoplay: true,';
		}

		$slick_carousel_options_6 .= 'slidesToShow: ' .get_theme_mod( 'carousel-slidestoshow-6', '3' ) . ',';
			
		$slick_carousel_options_6 .= 'slidesToScroll: ' .get_theme_mod( 'carousel-slidestoscroll-6', '3' ) . ',';

		if(get_theme_mod( 'carousel-speed-6' )){
			$slick_carousel_options_6 .= 'speed: ' .get_theme_mod( 'carousel-speed-6' ) . ',';
		}
		if(get_theme_mod( 'carousel-additional-settings-6' )){
			$slick_carousel_options_6 .= get_theme_mod( 'carousel-additional-settings-6' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_6 = 'jQuery(".multiple-items-6").slick({'.$slick_carousel_options_6.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_6 );	
		
	} else if (get_theme_mod( 'service-boxes-or-carousel-6' ) == 'posts') {	
		// build slick carousel bottim feature section 6 options variable
		$slick_carousel_options_6 = 'regionLabel:\'Bottom Featured Section Carousel 6\',';
		
		if(get_theme_mod( 'post-carousel-dots-6' )){
			$slick_carousel_options_6 .= 'dots: true,';
		}
		if(get_theme_mod( 'post-carousel-infinite-6' )){
			$slick_carousel_options_6 .= 'infinite: true,';
		}
		if(get_theme_mod( 'post-carousel-auto-play-6' )){
			$slick_carousel_options_6 .= 'autoplay: true,';
		}

		$slick_carousel_options_6 .= 'slidesToShow: ' .get_theme_mod( 'post-carousel-slidestoshow-6', '3' ) . ',';
			
		$slick_carousel_options_6 .= 'slidesToScroll: ' .get_theme_mod( 'post-carousel-slidestoscroll-6', '3' ) . ',';

		if(get_theme_mod( 'post-carousel-speed-6' )){
			$slick_carousel_options_6 .= 'speed: ' .get_theme_mod( 'post-carousel-speed-6' ) . ',';
		}
		if(get_theme_mod( 'post-carousel-additional-settings-6' )){
			$slick_carousel_options_6 .= get_theme_mod( 'post-carousel-additional-settings-6' ) . ',';
		}		
		//end build variable and entered below
	
		$slick_init_bottom_6 = 'jQuery(".multiple-items-6").slick({'.$slick_carousel_options_6.'});';
		wp_add_inline_script( 'slick-slider', $slick_init_bottom_6 );		
	}
	
	// COOKIE CONSENT 
	if( get_theme_mod( 'enable_cookie_consent' ) ) {
		
		wp_enqueue_style( 'cookie-consent-styles', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), '', 'all' );			
		
		wp_enqueue_script( 'cookie-consent-script', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js');
		
		$cookie_position = get_theme_mod( 'cookie-position', 'bottom' );
		
		$cookie_layout = get_theme_mod( 'cookie-layout', 'block' );

		$cookie_pallete_banner_bg = get_theme_mod( 'cookie-pallete-banner-bg', '#000' );
		$cookie_pallete_banner_text = get_theme_mod( 'cookie-pallete-banner-text', '#fff' );
		$cookie_pallete_button_bg = get_theme_mod( 'cookie-pallete-button-bg', '#f1d600' );
		$cookie_pallete_button_text = get_theme_mod( 'cookie-pallete-button-text', '#000' );
		

		$default_privacy_link =  get_home_url(). '/privacy-policy/';
		
		if("" == get_theme_mod( 'cookie-learn-more-link' )){
			set_theme_mod( 'cookie-learn-more-link',  $default_privacy_link);
		}
		
		$cookie_learn_more_link = get_theme_mod( 'cookie-learn-more-link', $default_privacy_link );

		$cookie_compliance_type = get_theme_mod( 'cookie-compliance-type' );
		
		$cookie_custom_text_message = get_theme_mod( 'cookie-custom-text-message', 'This website uses cookies to ensure you get the best experience on our website.' );
		
		$cookie_custom_text_button = get_theme_mod( 'cookie-custom-text-button', 'Got it!' );
		
		//if(get_theme_mod('cookie-custom-text-policy-link')) {
		$cookie_custom_text_policy_link = get_theme_mod( 'cookie-custom-text-policy-link', 'Learn More' );
		//}
		
		$cookie_var = 'window.addEventListener("load", function(){
				window.cookieconsent.initialise({
				  "palette": {
					"popup": {
					  "background": "'.$cookie_pallete_banner_bg.'",
					  "text": "'.$cookie_pallete_banner_text.'"
					},
					"button": {
					  "background": "'.$cookie_pallete_button_bg.'",
					  "text": "'.$cookie_pallete_button_text.'"
					}
				  },
				 
				  "theme": "'.$cookie_layout.'",
				  "position": "'.$cookie_position.'",					  
				  "content": {
					"link": "'.$cookie_custom_text_policy_link.'",
					"message": "'.$cookie_custom_text_message.'",
					"dismiss": "'.$cookie_custom_text_button.'",
					"href": "'.$cookie_learn_more_link.'"						
					
				  }
				})});';
		
		wp_add_inline_script( 'cookie-consent-script', $cookie_var );
	}
	//YEXT ID
	if(get_theme_mod( 'yext-id' )){
		//$clean_url = 'https://knowledgetags.yextpages.net/embed?key=TRClk0LrMx9dnhL2aiNB3i6sXEF9na-xu61g_MmmJsy0-qtVNnRTQ6WAqwvxK9Nz&account_id=737922&location_id=';
		$clean_url = 'https://knowledgetags.yextpages.net/embed?key=TRClk0LrMx9dnhL2aiNB3i6sXEF9na-xu61g_MmmJsy0-qtVNnRTQ6WAqwvxK9Nz&account_id=737922&entity_id=';
		wp_enqueue_script( 'yext-schema', $clean_url . get_theme_mod( 'yext-id' ) . '&locale=en' );
	}

	add_action('wp_head', 'google_analytics_code', 10);
	function google_analytics_code(){
		if (get_theme_mod( 'google-analytics-code' )) {
			echo get_theme_mod( 'google-analytics-code');
		}
	}
	
	add_action('wp_head', 'schema_markup_code', 15);
	function schema_markup_code(){
		if (get_theme_mod( 'schema-markup-code' )) {
			echo get_theme_mod( 'schema-markup-code');
		}
	}

	add_action('wp_head', 'additional_header_scripts', 15);
	function additional_header_scripts(){
		if (get_theme_mod( 'additional-header-scripts' )) {
			echo get_theme_mod( 'additional-header-scripts');
		}
	}
	
	add_action('wp_head', 'gtm_head_code', 15);
	function gtm_head_code(){
		if (get_theme_mod( 'gtm-head-code' )) {
			echo get_theme_mod( 'gtm-head-code');
		}
	}
	
	add_action('wp_body_open', 'gtm_body_code', 10);
	function gtm_body_code(){
		if (get_theme_mod( 'gtm-body-code' )) {
			echo get_theme_mod( 'gtm-body-code');
		}
	}
	// additional footer scripts from customizer
	add_action('wp_footer', 'additional_footer_scripts', PHP_INT_MAX);
	function additional_footer_scripts(){
		if (get_theme_mod( 'additional-footer-scripts' )) {
			echo get_theme_mod( 'additional-footer-scripts');
		}
	}
	
	wp_dequeue_style('shiftnav-font-awesome');
	
	/* Add Customizer CSS to front end only */
	if (!is_customize_preview()) {
		//wp_enqueue_style('blueprint-styles', get_template_directory_uri() . '/library/customizer/css/css-frontend.php', array(), '', 'all');	
		wp_enqueue_style('blueprint-styles', get_template_directory_uri() . '/library/customizer/css/css-frontend.css', array(), '', 'all');
	}
}



/*********************
THEME SUPPORT
*********************/
if ( get_theme_mod('default_blueprint_css') == '' ) {
	set_theme_mod('default_blueprint_css', '1');
	update_css_on_save();
}

// Updates the frontend CSS file on customizer save
function update_css_on_save() {

	$custom_css = file_get_contents(get_template_directory_uri() . '/library/customizer/css/css-frontend.php');

	$minified_css = preg_replace('/\s+/', ' ', trim($custom_css)); 

	file_put_contents(TEMPLATEPATH.'/library/customizer/css/css-frontend.css', $minified_css);
}

// Adding WP 3+ Functions & Theme Support
function blueprint_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'blueprint' ),   // main nav in header			
			'footer-links' => __( 'Footer Links', 'blueprint' ) // secondary nav in footer
		)
	);

	// this is the fallback for header menu
	function bones_main_nav_fallback() {
		wp_page_menu( array(
			'show_home' => true,
			'menu_class' => 'nav top-nav cf',      // adding custom nav class
			'include'     => '',
			'exclude'     => '',
			'echo'        => true,
			'link_before' => '',                  // before each link
			'link_after' => ''                    // after each link
		) );
	}	

	// this is the fallback for footer menu
	function bones_footer_links_fallback() {
		wp_page_menu( array(
			'show_home' => true,
			'menu_class' => 'footer-links cf',      // adding custom nav class
			'include'     => '',
			'exclude'     => '',
			'echo'        => true,
			'link_before' => '',                  // before each link
			'link_after' => ''                    // after each link
		) );
	}		
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

}


/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using bones_related_posts(); )
function bones_related_posts() {
	echo '<ul id="bones-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'bonestheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_postdata();
	echo '</ul>';
} 


/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function bones_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
}


/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bp_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bp_excerpt_more($more) {
	global $post;
	// edit here if you like
	
	//check if post is object otherwise you're not in singular post
    if( is_object($post) ) 
	
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="'. __( 'Read ', 'bonestheme' ) . esc_attr( get_the_title( $post->ID ) ).'">'. __( 'Read more &raquo;', 'bonestheme' ) .'</a>';
}

?>