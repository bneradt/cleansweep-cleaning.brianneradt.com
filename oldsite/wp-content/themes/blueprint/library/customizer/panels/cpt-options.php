<?php
/* 
	cpt-options.php
	Descripion: Custom Post Type Options in the Wordpress Customizer
*/
 

	/****************
	PANELS
	****************/

	/* 1st Level */
	$wp_customize->add_section(
		'cpt_options' , 
			array(
				'title'      => __( 'Custom Post Type', 'bonestheme' ),
				'description' => '',
				'priority'   => 150,
			) 
	);		

	/* 2nd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_main_layout',
			array(
				'title'      => __( 'CPT & Main Page Settings', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_options',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			)) 
	);
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_category_layout', 
			array(
				'title'      => __( 'Category Page Settings', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_options',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center><br>Use the Taxonomy (Category) Panels to categorize and filter your custom posts (dogs, in this example). You can use as few as one (Gender), or as many as further categorizing requires (Gender, Color, Availability, Age, etc.)',
			)) 
	);
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_single_layout', 
			array(
				'title'      => __( 'Single Page & ACF Settings', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_options',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			))
	);

	/* 3rd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_taxonomy_1_settings', 
			array(
				'title'      => __( 'Taxononomy (Category) 1', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_category_layout',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			))
	);
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_taxonomy_2_settings', 
			array(
				'title'      => __( 'Taxononomy (Category) 2', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_category_layout',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			))
	);
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_taxonomy_3_settings', 
			array(
				'title'      => __( 'Taxononomy (Category) 3', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_category_layout',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			))
	);
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'cpt_taxonomy_4_settings', 
			array(
				'title'      => __( 'Taxononomy (Category) 4', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'cpt_category_layout',
				'description' => '<center><b>**MAKE SURE TO RESET PERMALINKS**<br>**ANYTIME THIS INFO IS EDITED**</b></center>',
			))
	);


	/********************
	SETTINGS & CONTROLS
	********************/
	
	/* Add Custom Post Type Option */
	$wp_customize->add_setting(
		'add_cpt' 
	);
	$wp_customize->add_control(new Customizer_Toggle_Control( $wp_customize, 
		'add_cpt',
		array(
			'type' => 'toggle',
			'label' => 'Add CPT?',
			'section' => 'cpt_options',
		)
		)
	);
		
	/****************
	CPT & Main Page Settings
	****************/

	/* Custom Post Type Name*/
	$wp_customize->add_setting(
		'post-type-name',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'post-type-name',
		array(
			'label' => 'Post Type Name',
			'section' => 'cpt_main_layout',
			'type' => 'text',
			'input_attrs' => 
				array(
					'placeholder' => __( '' ),
			),
		)
	);
		
	/* Custom Post Type Name - Singular */
	$wp_customize->add_setting(
		'post-type-name-single',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'post-type-name-single',
		array(
			'label' => 'Post Type Name (singular)',
			'section' => 'cpt_main_layout',
			'type' => 'text',
			'input_attrs' => 
				array(
					'placeholder' => __( '' ),		
			),
		)
	);

	/* Custom Post Type Slug */
	$wp_customize->add_setting(
		'post-type-slug',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'post-type-slug',
		array(
			'label' => 'Post Type Slug',
			'description' => 'Enter slug using hyphens for spaces (SEO Friendly).<br>ex: available-puppies',
			'section' => 'cpt_main_layout',
			'type' => 'text',
			'input_attrs' => 
				array(
					'placeholder' => __( '' ),
			),
		)
	);
	
	/* Custom Post Type Posts per Page */
	$wp_customize->add_setting(
		'post-type-per-page',
		array(
			'default' => '10',
		)
	);
	$wp_customize->add_control(
		'post-type-per-page',
		array(
			'label' => 'Posts Per Page',
			'description' => 'Enter the number of posts you would like to display per page for post type archives. Enter -1 to remove pagination and show all posts on a single page',
			'section' => 'cpt_main_layout',
			'type' => 'text',
			
		)
	);

	/* Remove Sidebar from Custom Post Type Archives Page */ 
	$wp_customize->add_setting(
		'remove-cpt-main-page-sidebar'
	);
	$wp_customize->add_control(
		'remove-cpt-main-page-sidebar',
		array(
			'type' => 'checkbox',
			'label' => 'Remove CPT Main (Archives) Page Sidebar',
			'section' => 'cpt_main_layout',
		)
	);


	/**********************
	Category Page Settings
	**********************/

	/* Taxonomy Categories */	 

	for($i = 1; $i <= 4; $i++){	 
	
		/* Category Name */
		$wp_customize->add_setting(
			'cpt-taxonomy-'. $i . '-name',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'cpt-taxonomy-' . $i . '-name',
			array(
				'label' => 'Category ' . $i .  ' Name',
				'description' => '<i>ex: Gender</i><br>You will use these to categorize and filter your custom posts',
				'section' => 'cpt_taxonomy_' . $i . '_settings',
				'type' => 'text',
				'input_attrs' => 
					array(
						'placeholder' => __( '' ),
				),
			)
		);	 		 

		/* Category Name - Singular */
		$wp_customize->add_setting(
			'cpt-taxonomy-' . $i . '-name-single',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'cpt-taxonomy-' . $i . '-name-single',
			array(
				'label' => 'Category ' . $i .  ' Name (singular)',
				'description' => '<i>ex: Gender </i>',
				'section' => 'cpt_taxonomy_' . $i . '_settings',
				'type' => 'text',
				'input_attrs' => 
					array(
						'placeholder' => __( '' ),
				),
			)
		);
		
		/* Category Slug */
		$wp_customize->add_setting(
			'cpt-taxonomy-'. $i . '-slug',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'cpt-taxonomy-' . $i . '-slug',
			array(
				'label' => 'Category ' . $i . ' slug (SEO Friendly)',
				'description' => '<i>ex: gender</i>',
				'section' => 'cpt_taxonomy_' . $i . '_settings',
				'type' => 'text',
				'input_attrs' => 
					array(
						'placeholder' => __( '' ),
				),
			)
		);
	}

	/* Remove Sidebar from Custom Post Type Category Page */ 
	$wp_customize->add_setting(
		'remove-cpt-category-sidebar'
	);
	$wp_customize->add_control(
		'remove-cpt-category-sidebar',
		array(
			'type' => 'checkbox',
			'label' => 'Remove CPT Category Page Sidebar',
			'section' => 'cpt_category_layout',
		)
	);
	 
	/**************************
	Single Page & ACF Settings
	**************************/
	
	/* Remove Sidebar from Custom Post Type Single Page */ 	
	$wp_customize->add_setting(
		'remove-cpt-sidebar-single' 
	);
	$wp_customize->add_control(
		'remove-cpt-sidebar-single',
		array(
			'type' => 'checkbox',
			'label' => 'Remove CPT Single Sidebar',
			'section' => 'cpt_single_layout',
		)
	);

	/* Advanced Custom Fields */	 
	for($i = 1; $i <= 5; $i++){
		
		/* Custom Field Label */
		$wp_customize->add_setting(
			'acf-' . $i . '-label',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'acf-' . $i . '-label',
			array(
				'label' => 'ACF field ' . $i . ' Label',
				'description' => '<i>Take directly from ACF</i>',
				'section' => 'cpt_single_layout',
				'type' => 'text',
				'input_attrs' => 
					array(
						'placeholder' => __( '' ),
				),
			)
		);
		
		/* Custom Field Name */
		$wp_customize->add_setting(
			'acf-' . $i . '-name',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'acf-' . $i . '-name',
			array(
				'label' => 'ACF field ' . $i . ' Name',
				'description' => '<i>Take directly from ACF</i>',
				'section' => 'cpt_single_layout',
				'type' => 'text',
				'input_attrs' => 
					array(
						'placeholder' => __( '' ),
				),
			)
		);	 
	}

?>