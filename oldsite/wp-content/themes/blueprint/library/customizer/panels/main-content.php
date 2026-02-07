<?php
/*
	main-content.php
	Descripion: Settings for Main Content & Sidebar in the Wordpress Customizer
*/
 
	
	/****************
	PANELS
	****************/

	if( get_theme_mod( 'basic-or-advanced' ) == 'advanced') {
		
		/* 1st Level */
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'main_page_content' , 
				array(
					'title'      => __( 'Main Content & Sidebar', 'bonestheme' ),
					'description' => '',
					'priority'   => 40,
				)) 
		);
		/* 2nd Level */
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'main_page_content_bg_image' , 
				array(
					'title'      => __( 'Background Image', 'bonestheme' ),
					'description' => '',
					'priority'   => 40,
					'section'   => 'main_page_content',
				)) 
		);	
		
	}

	if( get_theme_mod( 'basic-or-advanced' ) =='basic' || get_theme_mod( 'basic-or-advanced' ) == '') {
		
		/* 1st Level */
		$wp_customize->add_section( 
			'main_page_content' ,
				array(
					'title'      => __( 'Main Content & Blog Sidebar', 'bonestheme' ),
					'description' => '',
					'priority'   => 40,
				)
		);
		
	}


	/********************
	SETTINGS & CONTROLS
	********************/
	
	/* Background Color */
	$wp_customize->add_setting(
		'main-content-bg-color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main-content-bg-color',
				array(
					'label' => 'Background Color',
					'section' => 'main_page_content',
					'settings' => 'main-content-bg-color',
				)
		)
	);	 

	/* Page Title Color */
	$wp_customize->add_setting(
		'page-title-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'page-title-color',
				array(
					'label' => 'Page Title (H1) Color',
					'section' => 'main_page_content',
					'settings' => 'page-title-color',
				)
		)
	);

	/* Text Color */
	$wp_customize->add_setting(
		'main-content-text-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main-content-text-color',
				array(
					'label' => 'Text Color',
					'section' => 'main_page_content',
					'settings' => 'main-content-text-color',
				)
		)
	);

	/* Link Color */
	$wp_customize->add_setting(
		'main-content-link-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main-content-link-color',
				array(
					'label' => 'Link Color',
					'section' => 'main_page_content',
					'settings' => 'main-content-link-color',
				)
		)
	);

	/* Link Hover Color*/
	$wp_customize->add_setting(
		'main-content-link-hover-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main-content-link-hover-color',
				array(
					'label' => 'Link Hover Color',
					'section' => 'main_page_content',
					'settings' => 'main-content-link-hover-color',
				)
		)
	);

	/* Link Text Decoration */
	$wp_customize->add_setting(
		  'main-content-link-text-decoration',
		  array(
			  'default'        => 'underline',
		  )
	);
	$wp_customize->add_control(
		'main-content-link-text-decoration', 
			array(
				'settings' => 'main-content-link-text-decoration',
				'label'   => __('Link Text Decoration', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => array(
					'none' => __('none', 'bonestheme'),
					'underline' => __('underline', 'bonestheme'),
				),
			)
	);

	if (get_theme_mod ( 'basic-or-advanced' ) == 'advanced') {
		
		/* Homepage Sidebar */
		$wp_customize->add_setting(
			'front-page-layout'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'front-page-layout',
			array(
				'type' => 'toggle',
				'label' => 'Homepage Sidebar',
				'section' => 'main_page_content',
			)
			)
		);

		/* Inner Page Sidebar */
		$wp_customize->add_setting(
			'page-layout'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'page-layout',
			array(
				'type' => 'toggle',
				'label' => 'Inner Page Sidebar',
				'section' => 'main_page_content',
			)
			)
		);
	} //end if advanced
	 
	/* Sidebar Widget Title Background Color */
	$wp_customize->add_setting(
		'widget-title-bg-color',
			array(
				'default' => '#cccccc',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widget-title-bg-color',
				array(
					'label' => 'Sidebar Widget Title BG Color',
					'section' => 'main_page_content',
					'settings' => 'widget-title-bg-color',
				)
		)
	);

	/* Sidebar Widget Title Text Color */
	$wp_customize->add_setting(
		'widget-title-text-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widget-title-text-color',
				array(
					'label' => 'Sidebar Widget Title Text Color',
					'section' => 'main_page_content',
					'settings' => 'widget-title-text-color',
				)
		)
	);

	/* Sidebar Widget Title Border Color */ 
	$wp_customize->add_setting(
		'widget-title-border-color',
			array(
				'default' => '#444444',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widget-title-border-color',
				array(
					'label' => 'Sidebar Widget Title Border Color',
					'section' => 'main_page_content',
					'settings' => 'widget-title-border-color',
				)
		)
	);

	/* Sidebar Widget Text Color */
	$wp_customize->add_setting(
		'widget-text-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widget-text-color',
				array(
					'label' => 'Sidebar Widget Text Color',
					'section' => 'main_page_content',
					'settings' => 'widget-text-color',
				)
		)
	);
	
	/* Sidebar Widget Link Color */
	$wp_customize->add_setting(
		'widget-link-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'widget-link-color',
				array(
					'label' => 'Sidebar Widget Link Color',
					'section' => 'main_page_content',
					'settings' => 'widget-link-color',
				)
		)
	);

	/* Sidebar Widget Title Font Family */
	$wp_customize->add_setting(
		'widget-title-font-family',
			array(
			  'default'        => '',
		)
	);
	$wp_customize->add_control(
		'widget-title-font-family', 
			array(
				'settings' => 'widget-title-font-family',
				'label'   => __('Sidebar Widget Title Font Family', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
	);

	/* Sidebar Widget Title Font Weight */
	$wp_customize->add_setting(
		'widget-title-font-weight',
			array(
			  'default' => 'bold',
			)
	);
	$wp_customize->add_control(
		'widget-title-font-weight', 
			array(
				'settings' => 'widget-title-font-weight',
				'label'   => __('Sidebar Widget Title Font Weight', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
					),
			)
	);

	/* Sidebar Widget Text Font Family */
	$wp_customize->add_setting(
		'widget-text-font-family',
			array(
				'default'  => '',
			)
	);
	$wp_customize->add_control(
		'widget-text-font-family', 
			array(
				'settings' => 'widget-text-font-family',
				'label'   => __('Sidebar Widget Text Font Family', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
	);

	/* Sidebar Widget Text Font Weight */
	$wp_customize->add_setting(
		'widget-text-font-weight',
			array(
				'default' => 'normal',
			)
	);
	$wp_customize->add_control(
		'widget-text-font-weight', 
			array(
				'settings' => 'widget-text-font-weight',
				'label'   => __('Sidebar Widget Text Font Weight', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
				),
		)
	);
	
	/* Sidebar Widget Link Font Family */
	$wp_customize->add_setting(
		'widget-link-font-family',
			array(
				'default'  => '',
			)
	);
	$wp_customize->add_control(
		'widget-link-font-family', 
			array(
				'settings' => 'widget-link-font-family',
				'label'   => __('Sidebar Widget Link Font Family', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
	);

	/* Sidebar Widget Link Font Weight */
	$wp_customize->add_setting(
		'widget-link-font-weight',
			array(
				'default' => 'normal',
			)
	);
	$wp_customize->add_control(
		'widget-link-font-weight', 
			array(
				'settings' => 'widget-link-font-weight',
				'label'   => __('Sidebar Widget Link Font Weight', 'bonestheme'),
				'section' => 'main_page_content',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
				),
		)
	);
	/********************
	Background Image
	********************/
	
	/* Background Image */
	$wp_customize->add_setting( 
		'main-content-bg-image' 
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'main-content-bg-image',
				array(
					'label' => 'Background Image',
					'section' => 'main_page_content_bg_image',
					'settings' => 'main-content-bg-image'
				)
		)
	);	 

	/* Background Image Position*/
	$wp_customize->add_setting(
		'main-content-bg-img-position',
			array(
				'default' => 'inherit',
			)
	);
	$wp_customize->add_control(
		'main-content-bg-img-position', 
			array(
				'settings' => 'main-content-bg-img-position',
				'label'   => __('Background Image Position', 'bonestheme'),
				'section' => 'main_page_content_bg_image',
				'type'    => 'select',
				'choices'    => array(
					'inherit' => __('Left Top', 'bonestheme'),
					'left center' => __('Left Center', 'bonestheme'),
					'left bottom' => __('Left Bottom', 'bonestheme'),
					'right top' => __('Right Top', 'bonestheme'),
					'right center' => __('Right Center', 'bonestheme'),
					'right bottom' => __('Right Bottom', 'bonestheme'),
					'center top' => __('Center Top', 'bonestheme'),
					'center center' => __('Center Center', 'bonestheme'),
					'center bottom' => __('Center Bottom', 'bonestheme'),
				),
			)
	);
	
	/* Background Image Attachement */
	$wp_customize->add_setting(
		'main-content-bg-attachment',
			array(
				'default' => 'scroll',
			)
	);
	$wp_customize->add_control(
		'main-content-bg-attachment', 
			array(
				'settings' => 'main-content-bg-attachment',
				'label'   => __('Background Image Attachment', 'bonestheme'),
				'section' => 'main_page_content_bg_image',
				'type'    => 'select',
				'choices'    => array(
					'scroll' => __('Scroll (Default)', 'bonestheme'),
					'fixed' => __('Fixed', 'bonestheme'),
				),
			)
	);

	/* Background Image Size */
	$wp_customize->add_setting(
		'main-content-bg-img-size',
			array(
				'default' => 'auto',
			)
	);
	$wp_customize->add_control(
		'main-content-bg-img-size', 
			array(
				'settings' => 'main-content-bg-img-size',
				'label'   => __('Background Image Size', 'bonestheme'),
				'section' => 'main_page_content_bg_image',
				'type'    => 'select',
				'choices'    => array(
					'auto' => __('Default', 'bonestheme'),
					'cover' => __('Cover', 'bonestheme'),
					'contain' => __('Contain', 'bonestheme'),
				),
			)
	);

	/*****************
	SELECTIVE REFRESH
	*****************/
	
	add_theme_support( 'customize-selective-refresh-widgets' );

	$wp_customize->selective_refresh->add_partial(
		'widget-title-bg-color', 
		array(
			'selector' => '#sidebar1 .widget-1',
			'container_inclusive' => false,
			'render_callback' => 'widget-title-bg-color'
		)
	);	 

	$wp_customize->selective_refresh->add_partial(
		'img-upload', 
		array(
			'selector' => '#logo',
			'container_inclusive' => false,
			'render_callback' => 'img-upload',
		)
	);
	
	if ( get_theme_mod( 'basic-or-advanced' ) !== 'realestatepage') { 

		$wp_customize->selective_refresh->add_partial(
			'main-content-bg-color', 
			array(
				'selector' => '#main',
				'container_inclusive' => false,
				'render_callback' => 'main-content-bg-color'
			)
		);
	}


?>