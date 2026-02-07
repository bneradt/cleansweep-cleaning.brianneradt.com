<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type

if( get_theme_mod( 'add_cpt' )){ 

function custom_post_type() { 
	
	if( get_theme_mod( 'post-type-name' )){ 
	$post_type_name = get_theme_mod( "post-type-name" );
	}
	
	if( !get_theme_mod( 'post-type-name' )){ 
	$post_type_name = 'Custom Posts';
	}
	
	if( get_theme_mod( 'post-type-name-single' )){ 
	$post_type_name_single = get_theme_mod( "post-type-name-single" );
	}
	
	if( !get_theme_mod( 'post-type-name-single' )){ 
	$post_type_name_single = 'Custom Post';
	}
	
	if( get_theme_mod( 'post-type-slug' )){ 
	$post_type_slug = get_theme_mod( "post-type-slug" );
	}
	
	if( !get_theme_mod( 'post-type-slug' )){ 
	$post_type_slug = 'custom_type';
	}
	
	/*if( get_theme_mod( 'post-type-rewrite' )){ 
	$post_type_rewrite = get_theme_mod( "post-type-rewrite", "dogs" );
	}
	
	if( !get_theme_mod( 'post-type-rewrite' )){ 
	$post_type_rewrite = dogs;
	}*/	
	
	// creating (registering) the custom type 
	register_post_type( 'custom_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			
			//$post_type_name = echo get_theme_mod( "post-type-name", "Dogs" );			
			
			'name' => __( $post_type_name, 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( $post_type_name_single, 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All ' . $post_type_name, 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New ' . $post_type_name_single, 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit ' . $post_type_name_single, 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New ' . $post_type_name_single, 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View ' . $post_type_name_single, 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search ' . $post_type_name, 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-exerpt-view', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => $post_type_slug, 'with_front' => false ), /* you can specify its url slug */
			'has_archive' =>  $post_type_slug, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			'show_in_rest' => true, 
			'show_in_nav_menus' => true, 
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor'/*, 'author'*/, 'thumbnail', 'excerpt'/*, 'trackbacks', 'custom-fields', 'comments', 'revisions', 
			'sticky'*/)			
		) /* end of options */
	); /* end of register post type */

	
	/* this adds your post categories to your custom post type */
	//register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
}


	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_type');
} //end_if post type	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/


	// now let's add custom categories (these act like categories)

	/* 
	 creating variables for TAXONOMY 1
	*/
	
	if( get_theme_mod( 'cpt-taxonomy-1-name' )){ 
	$cpt_taxonomy_1_name = get_theme_mod( "cpt-taxonomy-1-name" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-1-name' )){ 
	$cpt_taxonomy_1_name = 'Category 1';
	}

	if( get_theme_mod( 'cpt-taxonomy-1-name-single' )){ 
	$cpt_taxonomy_1_name_single = get_theme_mod( "cpt-taxonomy-1-name-single" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-1-name-single' )){ 
	$cpt_taxonomy_1_name_single = 'Category 1';
	}

	if( get_theme_mod( 'cpt-taxonomy-1-slug' )){ 
	$cpt_taxonomy_1_slug = get_theme_mod( "cpt-taxonomy-1-slug" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-1-slug' )){ 
	$cpt_taxonomy_1_slug = 'taxonomy_1';
	}
	
	//register taxonomy 1

	register_taxonomy( 'custom_cat', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'show_in_rest' => true,	  
			'labels' => array(
				'name' => __( $cpt_taxonomy_1_name, 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( $cpt_taxonomy_1_name_single, 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search ' . $cpt_taxonomy_1_name, 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All ' . $cpt_taxonomy_1_name, 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent ' . $cpt_taxonomy_1_name_single, 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent ' . $cpt_taxonomy_1_name_single . ':', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit ' . $cpt_taxonomy_1_name_single, 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update ' . $cpt_taxonomy_1_name_single, 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add ' . $cpt_taxonomy_1_name_single, 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $cpt_taxonomy_1_slug ),
		)
	);


	/* 
	 creating variables for TAXONOMY 2
	*/
if( get_theme_mod( 'cpt-taxonomy-2-name' )){ 	
	if( get_theme_mod( 'cpt-taxonomy-2-name' )){ 
	$cpt_taxonomy_2_name = get_theme_mod( "cpt-taxonomy-2-name" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-2-name' )){ 
	$cpt_taxonomy_2_name = 'Category 2';
	}

	if( get_theme_mod( 'cpt-taxonomy-2-name-single' )){ 
	$cpt_taxonomy_2_name_single = get_theme_mod( "cpt-taxonomy-2-name-single" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-2-name-single' )){ 
	$cpt_taxonomy_2_name_single = 'Category 2';
	}

	if( get_theme_mod( 'cpt-taxonomy-2-slug' )){ 
	$cpt_taxonomy_2_slug = get_theme_mod( "cpt-taxonomy-2-slug" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-2-slug' )){ 
	$cpt_taxonomy_2_slug = 'taxonomy_2';
	}

	//register taxonomy 2

	register_taxonomy( 'custom_cat2', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'show_in_rest' => true,
			'labels' => array(
				'name' => __( $cpt_taxonomy_2_name, 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( $cpt_taxonomy_2_name_single, 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search ' . $cpt_taxonomy_2_name, 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All ' . $cpt_taxonomy_2_name, 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent ' . $cpt_taxonomy_2_name_single, 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent ' . $cpt_taxonomy_2_name_single . ':', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit ' . $cpt_taxonomy_2_name_single, 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update ' . $cpt_taxonomy_2_name_single, 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add ' . $cpt_taxonomy_2_name_single, 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $cpt_taxonomy_2_slug ),
		)
	);
}

	/* 
	 creating variables for TAXONOMY 3
	*/
if( get_theme_mod( 'cpt-taxonomy-3-name' )){ 	
	if( get_theme_mod( 'cpt-taxonomy-3-name' )){ 
	$cpt_taxonomy_3_name = get_theme_mod( "cpt-taxonomy-3-name" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-3-name' )){ 
	$cpt_taxonomy_3_name = 'Category 3';
	}

	if( get_theme_mod( 'cpt-taxonomy-3-name-single' )){ 
	$cpt_taxonomy_3_name_single = get_theme_mod( "cpt-taxonomy-3-name-single" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-3-name-single' )){ 
	$cpt_taxonomy_3_name_single = 'Category 3';
	}

	if( get_theme_mod( 'cpt-taxonomy-3-slug' )){ 
	$cpt_taxonomy_3_slug = get_theme_mod( "cpt-taxonomy-3-slug" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-3-slug' )){ 
	$cpt_taxonomy_3_slug = 'taxonomy_3';
	}

	//register taxonomy 3

	register_taxonomy( 'custom_cat3', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'show_in_rest' => true,  
			'labels' => array(
				'name' => __( $cpt_taxonomy_3_name, 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( $cpt_taxonomy_3_name_single, 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search ' . $cpt_taxonomy_3_name, 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All ' . $cpt_taxonomy_3_name, 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent ' . $cpt_taxonomy_3_name_single, 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent ' . $cpt_taxonomy_3_name_single . ':', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit ' . $cpt_taxonomy_3_name_single, 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update ' . $cpt_taxonomy_3_name_single, 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add ' . $cpt_taxonomy_3_name_single, 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $cpt_taxonomy_3_slug ),
		)
	);
}

	/* 
	 creating variables for TAXONOMY 4
	*/
if( get_theme_mod( 'cpt-taxonomy-4-name' )){ 	
	if( get_theme_mod( 'cpt-taxonomy-4-name' )){ 
	$cpt_taxonomy_4_name = get_theme_mod( "cpt-taxonomy-4-name" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-4-name' )){ 
	$cpt_taxonomy_4_name = 'Category 4';
	}

	if( get_theme_mod( 'cpt-taxonomy-4-name-single' )){ 
	$cpt_taxonomy_4_name_single = get_theme_mod( "cpt-taxonomy-4-name-single" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-4-name-single' )){ 
	$cpt_taxonomy_4_name_single = 'Category 4';
	}

	if( get_theme_mod( 'cpt-taxonomy-4-slug' )){ 
	$cpt_taxonomy_4_slug = get_theme_mod( "cpt-taxonomy-4-slug" );
	}
	
	if( !get_theme_mod( 'cpt-taxonomy-4-slug' )){ 
	$cpt_taxonomy_4_slug = 'taxonomy_4';
	}

	//register taxonomy 4

	register_taxonomy( 'custom_cat4', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'show_in_rest' => true,  
			'labels' => array(
				'name' => __( $cpt_taxonomy_4_name, 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( $cpt_taxonomy_4_name_single, 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search ' . $cpt_taxonomy_4_name, 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All ' . $cpt_taxonomy_4_name, 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent ' . $cpt_taxonomy_4_name_single, 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent ' . $cpt_taxonomy_4_name_single . ':', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit ' . $cpt_taxonomy_4_name_single, 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update ' . $cpt_taxonomy_4_name_single, 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add ' . $cpt_taxonomy_4_name_single, 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $cpt_taxonomy_4_slug ),
		)
	);
}


	// now let's add custom tags (these act like categories)

		/* 
	 creating variables for ability to rename 
	 custom tags tite through customizer
	*/
	
	/*if( get_theme_mod( 'post-type-tags-name' )){ 
	$post_type_tags_name = get_theme_mod( "post-type-tags-name" );
	}
	
	if( !get_theme_mod( 'post-type-tags-name' )){ 
	$post_type_tags_name = 'Custom Tags';
	}

	if( get_theme_mod( 'post-type-tags-name-single' )){ 
	$post_type_tags_name_single = get_theme_mod( "post-type-tags-name-single" );
	}
	
	if( !get_theme_mod( 'post-type-tags-name-single' )){ 
	$post_type_tags_name_single = 'Custom Tags';
	}

	if( get_theme_mod( 'post-type-category-slug' )){ 
	$post_type_tag_slug = get_theme_mod( "post-type-tag-slug" );
	}
	
	if( !get_theme_mod( 'post-type-category-slug' )){ 
	$post_type_tag_slug = 'custom_tag';
	}*/
	
	
	//register_taxonomy( 'custom_tag', 
	//	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	//	array('hierarchical' => true,    /* if this is false, it acts like tags */
	//		'labels' => array(
	//			'name' => __( $post_type_tags_name, 'bonestheme' ), /* name of the custom taxonomy */
	//			'singular_name' => __( $post_type_tags_name_single, 'bonestheme' ), /* single taxonomy name */
	//			'search_items' =>  __( 'Search ' . $post_type_tags_name, 'bonestheme' ), /* search title for taxomony */
	//			'all_items' => __( 'All ' . $post_type_tags_name, 'bonestheme' ), /* all title for taxonomies */
	//			'parent_item' => __( 'Parent ' . $post_type_tags_name_single, 'bonestheme' ), /* parent title for taxonomy */
	//			'parent_item_colon' => __( 'Parent ' . $post_type_tags_name_single . ':', 'bonestheme' ), /* parent taxonomy title */
	//			'edit_item' => __( 'Edit ' . $post_type_tags_name_single, 'bonestheme' ), /* edit custom taxonomy title */
	//			'update_item' => __( 'Update ' . $post_type_tags_name_single, 'bonestheme' ), /* update title for taxonomy */
	//			'add_new_item' => __( 'Add New ' . $post_type_tags_name_single, 'bonestheme' ), /* add new title for taxonomy */
	//			'new_item_name' => __( 'New Custom Tag Name', 'bonestheme' ) /* name title for taxonomy */
	//		),
	//		'show_admin_column' => true,
	//		'show_ui' => true,
	//		'query_var' => true,
	//		'rewrite' => array( 'slug' => $post_type_tag_slug ),
	//	)
	//);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'show_in_rest' => true,	  
			'labels' => array(
				'name' => __( 'Custom Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-tag' ),	  
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>