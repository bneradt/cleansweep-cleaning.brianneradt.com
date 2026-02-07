<?php
/*
Author: Andrew Greco & Matthew Tresch
URL: http://www.mainstreethost.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BLUEPRINT CORE (if you remove this, the theme will break)
require_once( 'library/blueprint.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BLUEPRINT
Let's get everything up and running.
*********************/

function blueprint_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'blueprint', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bp_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bp_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bp_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bp_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bp_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bp_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  blueprint_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'blueprint_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bp_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bp_excerpt_more' );

  // Update frontend CSS file on Theme Customizer save
  add_action( 'customize_save_after', 'update_css_on_save' );
  
  // Update frontend CSS file when theme options page is saved
  add_action('update_option_theme_mods_blueprint', 'update_css_on_save');

} /* end blueprint ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'blueprint_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'blueprint-thumb-600', 600, 150, true );
add_image_size( 'blueprint-thumb-300', 300, 100, true );
add_image_size( 'mobile-banner', 480, 600, true);
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'blueprint-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'blueprint-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'blueprint_custom_image_sizes' );

function blueprint_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'blueprint-thumb-600' => __('600px by 150px'),
        'blueprint-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function blueprint_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

	$wp_customize->selective_refresh->remove_partial( 'nav_menu' );
	
  	 $wp_customize->remove_section('title_tagline');
  	 $wp_customize->remove_section('colors');
     $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');
	
  // $wp_customize->remove_panel( 'widgets' );

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}
add_action( 'customize_register', 'blueprint_theme_customizer' );

//sepreated customizer options by panels into thier own files
/*
*pe-customizer.php adds the abilty to nest panels deeper than the 1-level default
*the code can be found here -  *https://gist.github.com/OriginalEXE/9a6183e09f4cae2f30b006232bb154af
*/  
require('library/customizer/panels/includes/pe-customizer.php');
require('library/customizer/panels/global-settings.php');
require('library/customizer/panels/includes/opacity-slider.php');
require('library/customizer/panels/includes/global-settings-google-font.php');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function blueprint_register_sidebars() {
	register_sidebar(array(
		'id' => 'top-bar-widgets',
		'name' => __( 'Top Bar Widgets', 'blueprinttheme' ),
		'description' => __( 'Top Bar Widgets', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle h2">',
		'after_title' => '</div>',
	));	
	register_sidebar(array(
		'id' => 'header-widget',
		'name' => __( 'Header Widget', 'blueprinttheme' ),
		'description' => __( 'Header Widget', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle h2">',
		'after_title' => '</div>',
	));
	
	register_sidebar(array(
		'id' => 'pre-content-widgets',
		'name' => __( 'Top Feature Section Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle h2">',
		'after_title' => '</div>',
	));

	register_sidebar(array(
		'id' => 'pre-content-widgets-2',
		'name' => __( 'Second Top Feature Section Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widgettitle h2">',
		'after_title' => '</div>',
	));	
	
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'id' => 'post-content-widgets',
		'name' => __( 'Bottom Feature Section Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'id' => 'post-content-widgets-2',
		'name' => __( 'Bottom Feature Section 2 Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'id' => 'post-content-widgets-3',
		'name' => __( 'Bottom Feature Section 3 Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'post-content-widgets-4',
		'name' => __( 'Bottom Feature Section 4 Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'post-content-widgets-5',
		'name' => __( 'Bottom Feature Section 5 Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'id' => 'post-content-widgets-6',
		'name' => __( 'Bottom Feature Section 6 Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));		
	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => __( 'Footer Widgets', 'blueprinttheme' ),
		'description' => __( 'Link widget title ex: [link href = https://yourlink.com]Title[/link]', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));		
	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'blueprinttheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'blueprinttheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function blueprint_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="https://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'blueprinttheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'blueprinttheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'blueprinttheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'blueprinttheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds. 
*/
/*function blueprint_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'blueprint_fonts');
*/
/******************BEGIN ADDITIONAL THEME CUSTOMIZATINS AND MODIFICATIONS*****************/

/**********************************************/
/****************GRAVITYFORMS****************/
/*********************************************/

/*
Adds gravity forms field title visibilty: hidden for use of placeholders only. 
*/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/**********************************************/
/******************WOOCOMMERCE*****************/
/*********************************************/
/**
 * Check if WooCommerce is activated
 */
if ( class_exists( 'woocommerce'  ) ) {

/*
Adds wooCommerce theme support. 
*/
function blueprint_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'blueprint_add_woocommerce_support' );

add_action( 'after_setup_theme', 'layerswoo_theme_setup' );
function layerswoo_theme_setup() {
   add_theme_support( 'wc-product-gallery-zoom' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
add_action('after_sidebar', 'close_content_and_inner_content');

function my_theme_wrapper_start() {
  echo '<div id="content">';
  	echo '<div id="inner-content" class="wrap cf">';	
  		echo '<main id="main" class="m-all t-2of3 d-5of7 cf col-xs-12 col-sm-8 col-lg-8" role="main">';
}

function my_theme_wrapper_end() {
  		echo '</main>';
}

function close_content_and_inner_content()
{  
  	echo '</div>'; //closes id="inner_content" 
  echo '</div>'; //closes id="content"
	 
}

/* Remove woo PRODUCT sidebar if option selected in customizer **/
if( get_theme_mod( 'hide-sidebar-product' )) {
	function remove_sidebar_product_pages() {	
		if ( is_product() ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}
	}	
	add_action( 'wp', 'remove_sidebar_product_pages' );	
}

/* Remove woo CATEGORY page sidebar if option selected in customizer */
	if( get_theme_mod( 'hide-sidebar-woo-category' )) { 
		function remove_sidebar_woo_category_pages() {	
			if ( is_product_category() ) {
				remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			}
		}
		add_action( 'wp', 'remove_sidebar_woo_category_pages' );
	}

/* Remove woo SHOP PAGE (product archive) sidebar if option selected in customizer */
	if( get_theme_mod( 'hide-sidebar-shop' )) {
		function remove_sidebar_shop_pages() {	
			if ( is_shop() ) {
				remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			}
		}
		add_action( 'wp', 'remove_sidebar_shop_pages' );	
	}
	
} //END Check if WooCommerce is activated


/**********************************************/
/*************ROBOTS.TXT MODS***************/
/*********************************************/
/**
 * Deal with the custom RSS templates. 
 * This is so the feeds can be noindexed as disallow in robots.txt was causing issues. 
 */
function my_custom_rss() {
  get_template_part( 'feed', 'rss2' );
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'my_custom_rss', 10, 1 );

/**********************************************/
/**************SCHEMA MARKUP MODS****************/
/*********************************************/

/* Remove 'hentry' from post_class() */
	add_filter( 'post_class','remove_hentry' );
	
	function remove_hentry( $classless ) {
		$classless = array_diff( $classless, array( 'hentry' ) );
		return $classless;
	}

/* Adds schema markup to nav menu items (along with additional markup in nav function) */
	add_filter( 'nav_menu_link_attributes', 'add_menu_attributes', 10, 3 );
	
	function add_menu_attributes( $atts, $item, $args ) {
	  $atts['itemprop'] = 'url';
	  return $atts;
	}

/*************************************************/
/*****CUSTOM META BOX FOR CUSTOM PAGE TITLES******/
/*************************************************/

/* Add meta box */
	add_action( 'admin_menu', 'custom_h1_add_metabox' );
	
	function custom_h1_add_metabox() {
		/*Default Post Types*/
		$post_types = array ('post', 'page');
		/*Check for Additional Registered Post Types*/
		$args = array(
		   'public'   => true,
		   '_builtin' => false
		);
		$additional_post_types = get_post_types( $args );
		if ( $additional_post_types ) { // If there are any custom public post types.
			foreach ( $additional_post_types  as $post_type ) {
			  $post_types[] = $post_type;
			}
		}

		add_meta_box(
			'custom_h1_metabox', // metabox ID, it also will be the HTML id attribute
			'Custom Page Title', // title
			'custom_h1_display_metabox', // this is a callback function, which will print HTML of our metabox
			$post_types, // post type or post types in array
			'side', // position on the screen where metabox should be displayed (normal, side, advanced)
			'low' // priority over another metaboxes on this page (default, low, high, core)
		);
	}
	
/* Build custom field meta box */
	function custom_h1_display_metabox( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'custom_h1_metabox_nonce' );
		$html = '<p><input style="width: 100%" type="text" name="custom_h1_title" value="' . esc_attr( get_post_meta($post->ID, 'custom_h1_title',true) )  . '" /></p>';
		echo $html;
	}

/* Save Custom H1 Data */
	add_action( 'save_post', 'custom_h1_save_post_meta', 10, 2 );
	
	function custom_h1_save_post_meta( $post_id, $post ) {
		/* Security checks */
		if ( !isset( $_POST['custom_h1_metabox_nonce'] ) 
		|| !wp_verify_nonce( $_POST['custom_h1_metabox_nonce'], basename( __FILE__ ) ) )
			return $post_id;
		/* Check current user permissions */
		$post_type = get_post_type_object( $post->post_type );
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $post_id;
		/* Do not save the data if autosave */
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;
		/* Default Post Types */
		$post_types = array ('post', 'page');
		/* Check for Additional Registered Post Types */
		$args = array(
		   'public'   => true,
		   '_builtin' => false
		);
		/* If there are any custom public post types */
		$additional_post_types = get_post_types( $args );
		if ( $additional_post_types ) {
			foreach ( $additional_post_types  as $post_type ) {
			  $post_types[] = $post_type;
			}
		}
		if ( in_array($post->post_type, $post_types) ){ 
			update_post_meta($post_id, 'custom_h1_title', sanitize_text_field( $_POST['custom_h1_title'] ) );
		}
		return $post_id;
	}


/* replace H1 with custom title on frontend */
	add_filter( 'the_title', 'replace_title_on_frontend_but_not_in_nav', 10, 2 );
	
	function replace_title_on_frontend_but_not_in_nav( $title, $id = null ) {
		if ( ! is_admin() && ! is_null( $id ) ) {
			$post = get_post( $id );
			/*Default Post Types*/
			$post_types = array ('post', 'page');
			/*Check for Additional Registered Post Types*/
			$args = array(
			   'public'   => true,
			   '_builtin' => false
			);
			$additional_post_types = get_post_types( $args );
			if ( $additional_post_types ) { // If there are any custom public post types.
				foreach ( $additional_post_types  as $post_type ) {
				  $post_types[] = $post_type;
				}
			}
			if ( $post instanceof WP_Post &&  in_array($post->post_type, $post_types) ) {
				$new_title = get_post_meta( $id, 'custom_h1_title', true );
				if( !empty( $new_title ) /*&& in_the_loop()*/) {
					if (!is_page('sitemap')){
						$title = $new_title;
					}
				}
			}
		}
		return $title;
	}

/* */
	add_filter( 'pre_wp_nav_menu', 'remove_title_filter_nav_menu', 10, 2 );
	
	function remove_title_filter_nav_menu( $nav_menu, $args ) {
		/* we are working with menu, so remove the title filter*/
		remove_filter( 'the_title', 'replace_title_on_frontend_but_not_in_nav', 10, 2 );
		return $nav_menu;
	}

/* this filter fires just before the nav menu item creation process*/
	add_filter( 'wp_nav_menu_items', 'add_title_filter_non_menu', 10, 2 );
	
	function add_title_filter_non_menu( $items, $args ) {
		// we are done working with menu, so add the title filter back
		add_filter( 'the_title', 'replace_title_on_frontend_but_not_in_nav', 10, 2 );
		return $items;
	}
	
/* this filter fires after nav menu item creation is done*/
	add_filter( 'pre_get_posts', 'remove_title_filter_archive' );
	
	function remove_title_filter_archive( $query ) {
		/* we are working with an archive loop so remove the title filter*/
		if ( is_page_template( 'page-cpt_tax.php' ) && !$query->is_main_query() ) {
			remove_filter( 'the_title', 'replace_title_on_frontend_but_not_in_nav', 10, 2 );
		}
		return;
	}

/* Add Columns for Custom H1 Data in Admin */
	add_filter( 'manage_edit-page_columns', 'add_columns' );
	add_filter( 'manage_edit-post_columns', 'add_columns' );
	add_filter( 'manage_edit-product_columns', 'add_columns' );	
	
	function add_columns( $columns ) {
		$columns['custom_h1_title'] = 'Custom Page Title';
		return $columns;
	}

/* Set Custom H1 Data in Columns */
	add_action( 'manage_page_posts_custom_column', 'h1_columns_content', 10, 2 );
	add_action( 'manage_post_posts_custom_column', 'h1_columns_content', 10, 2 );
	add_action( 'manage_product_posts_custom_column', 'h1_columns_content', 10, 2 );
	
	function h1_columns_content( $column_name, $post_id ) {
		if ( 'custom_h1_title' != $column_name ) {
			return;
		}
		$h1 = get_post_meta( $post_id, 'custom_h1_title', true );
		
		echo $h1;
	}


/* Add Custom H1 Field to Quick Edit Menu */
	add_action( 'quick_edit_custom_box', 'quick_edit_add_h1', 10, 2 );
	
	function quick_edit_add_h1( $column_name, $post_type ) {
		
		if ( 'custom_h1_title' != $column_name ) {
			return;
		}
		
		printf( '<fieldset class="inline-edit-col-left"><label><span class="title" style="line-height: 1.25;">%s</span>
			<span class="input-text-wrap"><input type="text" name="custom_h1_title" class="custom_h1_title" placeholder=""></span></label></fieldset>',
			'Custom Page Title'
		);
	}

/* Populate Custom H1 Data in Quick Edit Screen */
	function quick_edit_populate() { 

	add_action('admin_head-edit.php','quick_edit_populate',10, 2);
	?>
	<script>
	jQuery(function(){
		jQuery('body').on('click', '.inline button.editinline', function() {
			var id = inlineEditPost.getId(this);
			var edit_row = jQuery( '#edit-' + id );
			var post_row = jQuery( '#post-' + id );
			// get the data
			var ch1 = jQuery( '.column-custom_h1_title', post_row ).html();
			// populate the data
			jQuery( ':input[name="custom_h1_title"]', edit_row ).val( ch1 );
		});
	});
	</script>
<?php	
}

/* Save Custom H1 Data from Quick Edit Screen */
	/* add_action( 'save_post', 'edit_post_change_title_in_list' ); */
	add_action( 'save_post', 'save_quick_edit_data' );
	
	function save_quick_edit_data( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		if ( ! current_user_can( 'edit_post', $post_id )  ) {
			return $post_id;
		}
		$customh1 = empty( $_POST['custom_h1_title'] ) ? '' : $_POST['custom_h1_title'];
		update_post_meta( $post_id, 'custom_h1_title', $customh1 );
	}

/***************/
/* WooCommerce */
/***************/

/* Check if WooCommerce is Active - Add Custom H1 Fields to Categories */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	add_filter( 'woocommerce_page_title', 'filter_woocommerce_page_title', 10, 1 );
	add_action('product_cat_add_form_fields', 'custom_h1_add_category', 10, 1);
	add_action('product_cat_edit_form_fields', 'custom_h1_edit_category', 10, 1);
	add_action('edited_product_cat', 'save_category_custom_h1', 10, 1);
	add_action('create_product_cat', 'save_category_custom_h1', 10, 1);
}

/* Display Custom H1 on Shop & Category Pages */
	function filter_woocommerce_page_title( $page_title ) { 
	   if(is_shop()) {
			$post_id = get_option( 'woocommerce_shop_page_id' );
			$customH1 = get_post_meta($post_id, 'custom_h1_title' ,true);
			if ($customH1) {
				$page_title = $customH1;
			}
		} else {
			$term_id = get_queried_object()->term_id;   
			$customH1 = get_term_meta($term_id, 'custom_h1_title', true);	
			if ($customH1) {
				$page_title = $customH1;
			}
		}
	   return $page_title;     
	}; 

/* Add Custom H1 Field to Add New Category */
	function custom_h1_add_category() {
		?>   
		<div class="form-field">
			<label for="custom_h1_title"><?php _e('Custom Page Title', 'wh'); ?></label>
			<input type="text" name="custom_h1_title" id="custom_h1_title">
			<p class="description"><?php _e('Enter Custom Page Title', 'wh'); ?></p>
		</div>
		<?php
	}

/* Add Custom H1 Field to Category Edit Screen */
	function custom_h1_edit_category($term) {
		//getting term ID
		$term_id = $term->term_id;
		// retrieve the existing value(s) for this meta field.
		$custom_h1 = get_term_meta($term_id, 'custom_h1_title', true);
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="custom_h1_title"><?php _e('Custom Page Title', 'wh'); ?></label></th>
			<td>
				<input type="text" name="custom_h1_title" id="custom_h1_title" value="<?php echo esc_attr($custom_h1) ? esc_attr($custom_h1) : ''; ?>">
			</td>
		</tr>
		<?php
	}

/* Save extra taxonomy fields callback function */
	function save_category_custom_h1($term_id) {
		$custom_h1 = filter_input(INPUT_POST, 'custom_h1_title');
		update_term_meta($term_id, 'custom_h1_title', $custom_h1);
	}

/* CUSTOM META BOX FOR CPT PAGES */

	add_action( 'add_meta_boxes', 'add_product_meta');
	function add_product_meta() {
		global $post;

		if( !empty($post) ) {
			$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

			if($pageTemplate == 'page-cpt_tax.php' ) {
				add_meta_box( 
					'custom-metabox',    // Unique ID
					'Page Options',   // Title
					'fill_metabox',     // Callback function
					'page', 			// Admin page (or post type)
					'side', 			// Context
					'high' 				// Priority
				);
			}
		}
	};

	function fill_metabox( $post ) {
		wp_nonce_field( basename(__FILE__), 'mam_nonce' );
		
		$postmeta_1 = maybe_unserialize( get_post_meta( $post->ID, 'cpt-tax-display-1', true ) );
		$postmeta_2 = maybe_unserialize( get_post_meta( $post->ID, 'cpt-tax-display-2', true ) );
		$postmeta_3 = maybe_unserialize( get_post_meta( $post->ID, 'cpt-tax-display-3', true ) );
		$postmeta_4 = maybe_unserialize( get_post_meta( $post->ID, 'cpt-tax-display-4', true ) );
		
		$elements = [];
		$tax_terms = [];
		
		$taxonomies = get_taxonomies(array(), 'objects'); 
		foreach($taxonomies as $taxonomy){
			if (strpos($taxonomy->name, 'custom_cat') !== FALSE){
				
				$elements[strtolower($taxonomy->label)] = $taxonomy->label;
				
				$terms = get_terms($taxonomy->name, array('hide_empty' => 0,));
				foreach($terms as $term){
					$tax_terms[$taxonomy->label][$term->slug] = $term->name;
				}
			}
		}

		// Loop through array and make a checkbox for each element
		$i = 1; 
		foreach ( $elements as $id => $element) {
				
			// If the postmeta for checkboxes exist and 
			// this element is part of saved meta check it.
		   
			?>
			
			<div class="tax_group">
				<div style="font-weight: bold;">Select Taxonomies to Display</div>
				<!--<input class="parent_tax" type="checkbox" name="multval[]" value="<?php echo $id;?>" <?php echo $checked; ?> />-->
				<label for="<?php echo $id;?>"><?php echo $element;?></label>
				<?php
				
					foreach($tax_terms as $tax_term_key => $tax_term_values){
						if ($tax_term_key == $element){
							foreach($tax_term_values as $tax_term_keys_each => $tax_term_values_each){
									
									if ( is_array( $postmeta_1 ) && in_array( $tax_term_keys_each, $postmeta_1 ) ) {
										$checked = 'checked="checked"';
									} else if ( is_array( $postmeta_2 ) && in_array( $tax_term_keys_each, $postmeta_2 ) ) {
										$checked = 'checked="checked"';
									} else if ( is_array( $postmeta_3 ) && in_array( $tax_term_keys_each, $postmeta_3 ) ) {
										$checked = 'checked="checked"';
									} else if ( is_array( $postmeta_4 ) && in_array( $tax_term_keys_each, $postmeta_4 ) ) {
										$checked = 'checked="checked"';
									} else {
										$checked = null;
									}
								
								?>
									<p style="margin-left: 20px;">
										<input class="child_tax" type="checkbox" name="multval-<?php echo $i; ?>[]" value="<?php echo $tax_term_keys_each;?>" <?php echo $checked; ?> />
										<label for="<?php echo $tax_term_keys_each;?>"><?php echo $tax_term_values_each;?></label>
									</p>
								<?php 
							}
						}
					 } $i++;
				?>
			</div>
			
			<?php
		}
		?>
		<div class="order_group">	
			<?php 
			$bpCptOrder = get_post_meta($post->ID, 'bp_cpt_page_orderby',true);
			$html = '<label for="bp_cpt_page_orderby" style="font-weight: 600;">Post CPT Order</label>';
			$html .= '<select id="bp_cpt_page_orderby" name="bp_cpt_page_orderby" style="width:250px;box-sizing: border-box;">';
				$html .= '<option value="date" '. selected($bpCptOrder, 'date', false) .'>Date (Default)</option>';
				$html .= '<option value="title" '. selected($bpCptOrder, 'title', false) .'>Title</option>';
				$html .= '<option value="menu_order" '. selected($bpCptOrder, 'menu_order', false) .'>Custom / Menu Order</option>';
				$html .= '<option value="rand" '. selected($bpCptOrder, 'rand', false) .'>Random</option>';
				
			$html .= '</select>';
			
			$bpCptOrderBy = get_post_meta($post->ID, 'bp_cpt_page_order',true);
			$html .= '<label for="bp_cpt_page_order" style="font-weight: 600;">Post CPT Order</label>';
			$html .= '<select id="bp_cpt_page_order" name="bp_cpt_page_order" style="width:250px;box-sizing: border-box;">';
				$html .= '<option value="desc" '. selected($bpCptOrderBy, 'desc', false) .'>DESC (Default)</option>';
				$html .= '<option value="asc" '. selected($bpCptOrderBy, 'asc', false) .'>ASC</option>';
			
			$html .= '</select>';
			echo $html;
			
			?>
		</div>
		<script>
			// enable check all for tax boxes
			jQuery('.parent_tax').on('change', function(){
				if (jQuery(this).prop('checked')){
					jQuery(this).closest('.tax_group').find('.child_tax').each(function(){
					jQuery(this).prop('checked', 'checked');                                                      
				});
				}else{
					jQuery(this).closest('.tax_group').find('.child_tax').each(function(){
						jQuery(this).removeProp('checked');                                                      
					});   
				}
			});
		</script>
		<?php
	}

add_action( 'save_post_custom_type', 'save_cpt_post_data');

function save_cpt_post_data( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'mam_nonce' ] ) && wp_verify_nonce( $_POST[ 'mam_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return $post_id;
    }

	// If the checkbox was not empty, save it as array in post meta
	if ( ! empty( $_POST['multval-1'] ) ) {
		update_post_meta( $post_id, 'cpt-tax-display-1', $_POST['multval-1'] );
	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'cpt-tax-display-1' );
	}
	
	if ( ! empty( $_POST['multval-2'] ) ) {
		update_post_meta( $post_id, 'cpt-tax-display-2', $_POST['multval-2'] );
	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'cpt-tax-display-2' );
	}
	if ( ! empty( $_POST['multval-3'] ) ) {
		update_post_meta( $post_id, 'cpt-tax-display-3', $_POST['multval-3'] );
	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'cpt-tax-display-3' );
	}
	if ( ! empty( $_POST['multval-4'] ) ) {
		update_post_meta( $post_id, 'cpt-tax-display-4', $_POST['multval-4'] );
	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'cpt-tax-display-4' );
	}
	if ( !empty( $_POST['bp_cpt_page_order']) ){ 
		update_post_meta( $post_id, 'bp_cpt_page_order', $_POST['bp_cpt_page_order'] );
	}
	if ( !empty($_POST['bp_cpt_page_orderby']) ){ 
		update_post_meta( $post_id, 'bp_cpt_page_orderby', $_POST['bp_cpt_page_orderby'] );
	}

}


/* USE THE SAME TEMPLATE FOR ALL TAXONOMIES OF INTEGRATED POST TYPE */
	add_filter( 'template_include', 'use_one_cpt_archive_page_template', 99 );

	function use_one_cpt_archive_page_template( $template ) {

		if ( is_tax(array( 'custom_cat2', 'custom_cat3', 'custom_cat4' ) ) ) {
			$new_template = locate_template( array( 'taxonomy-custom_cat.php' ) );
			if ( '' != $new_template ) {
				return $new_template ;
			}
		}

		return $template;
	}

/*********************************/
/* NAITIVE WP FUCNTIONALITY MODS */
/*********************************/

/* restore classic editor instead of guttenberg */
	/* add_filter('use_block_editor_for_post', '__return_false'); */

/* restores ability for Add Media function to include the title tag when adding image to the content. */
	add_filter( 'media_send_to_editor', 'restore_image_title', 15, 2 );
	
	function restore_image_title( $html, $id ) {
		$attachment = get_post($id);
		$addtitle = esc_attr($attachment->post_title);
		return str_replace('<img', '<img title="' . $addtitle . '" '  , $html);      
	}

/* restores title tag to native WP galleries */
	add_filter('wp_get_attachment_link', 'restore_title_to_gallery', 10, 4);
	
	function restore_title_to_gallery( $content, $id ) {
		$img_title = get_the_title($id);
		return str_replace('<img', '<img title="' . esc_attr($img_title) . '" ', $content);
	}

/* MAKE WIDGET TITLES CLICKABLE */
// We will make use of widget_title filter to replace custom tags with html tags

	add_filter( 'widget_title', 'accept_html_widget_title' );

	function accept_html_widget_title( $mytitle ) { 
		/* The sequence of String Replacement is important!! */
		$mytitle = str_replace( '[link', '<a', $mytitle );
		$mytitle = str_replace( '[/link]', '</a>', $mytitle );
		$mytitle = str_replace( ']', '>', $mytitle );
		
		return $mytitle;
	}

/* IMPORT OLD H1 PLUGIN TITLES/HEADWAY CUSTOM TITLES */
	if( get_theme_mod ( 'import-old-h1s' )) {
		function migrate_h1(){
			if(get_option('h1_migration_status') != 'completed'){

				$msh_h1tag_data = get_option('msh_h1tag_data');

				$ptargs = array (
					'public'   => true,
					'_builtin' => false
				); 
				$post_types = get_post_types( $ptargs );

				$registered_post_types = [];
				foreach ( $post_types  as $post_type ) {
					$registered_post_types[] = $post_type;
				}
				$registered_post_types[] = 'post';
				$registered_post_types[] = 'page';

				$args = array(
					'post_type'        => $registered_post_types,
					'posts_per_page'   => -1 // Get every post
				);
				$posts = get_posts($args);
				foreach ( $posts as $post ) {
					$oldh1 = $msh_h1tag_data[$post->ID];
					$headwaytitle = get_post_meta($post->ID,'_hw_alternate-title',true);
					if( isset($headwaytitle) ){
						update_post_meta($post->ID,'custom_h1_title', $headwaytitle);
					} elseif ( isset($oldh1) ) {
						update_post_meta($post->ID, 'custom_h1_title', $oldh1 );                          
					}
				}

			}
			update_option( 'h1_migration_status', 'completed' );
		}

		add_action('admin_init','migrate_h1');
	}

/* Remove Site Health Dashboard Widget */
	add_action('wp_dashboard_setup', 'themeprefix_remove_dashboard_widget' );
	
	function themeprefix_remove_dashboard_widget() {
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
	}

/* Disable Site Health Email Notifications */
	add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );

/* Change Shiftnav toggle from <i> to <span> re:ADA Compliance */
	add_filter( 'shiftnav_main_toggle_content' , 'custom_toggle_content' );
	
	function custom_toggle_content( $toggle_content ){
		return $toggle_content = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>';
	}

/* allows footer container bg image to be lazy loaded */
	add_filter( 'eio_allowed_background_image_elements','add_lazy_container');
	
	function add_lazy_container($element_types) {
		$element_types[] = 'footer'; 
		return $element_types;
	}


define( 'EIO_LL_THRESHOLD', 300 );


/* DON'T DELETE THIS CLOSING TAG */ ?>