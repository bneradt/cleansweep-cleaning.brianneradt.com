<?php
/* 
	homepage-service-boxes.php
	Description: Settings for Bottom Feature Section in the Wordpress Customizer
*/
 
	/****************
	PANELS
	****************/
	
	/* 1st Level */
	$wp_customize->add_panel( 
		'homepage_service_boxes', 
			array(
				'title'      => __( 'Bottom Feature Section', 'bonestheme' ),
				'description' => '',
				'priority'   => 50,
			)
	);
	

	/* 2nd Level */
	$wp_customize->add_section( 
		'service_section_bg_color', 
			array(
				'title'      => __( 'Section Settings', 'bonestheme' ),
				'priority'   => 5,
				'panel'	     => 'homepage_service_boxes',
			)
	);
		
	$wp_customize->add_section( 
		'service_boxes_settings', 
			array(
				'title'      => __( 'Service Boxes Settings', 'bonestheme' ),
				'priority'   => 10,
				'panel'	     => 'homepage_service_boxes',
			)
	);	 

	/* 3rd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'service_boxes', 
			array(
				'title'      => __( 'Service Boxes Content', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'service_boxes_settings',
			)) 
	);

	if (get_theme_mod ( 'basic-or-advanced' ) == 'advanced') {
		
		/*2nd Level*/
		$wp_customize->add_section(
			'carousel', 
				array(
					'title'      => __( 'Carousel Settings', 'bonestheme' ),
					'priority'   => 15,
					'panel'	     => 'homepage_service_boxes',
					'description' => 'Carousel Settings'
				)
		);	 

		$wp_customize->add_section(  
			'post_carousel', 
				array(
					'title'      => __( 'Post Carousel Settings', 'bonestheme' ),
					'priority'   => 15,
					'panel'	     => 'homepage_service_boxes',
					'description' => ''
				)
		);	

		$wp_customize->add_section( 
			'post_content_map', 
				array(
					'title'      => __( 'Map Settings', 'bonestheme' ),
					'priority'   => 20,
					'panel'	     => 'homepage_service_boxes',
					'description' => 'Find location coordinates - https://www.gps-coordinates.net',
				)
		);
		
		/*3rd Level*/
		$limit = get_theme_mod('carousel-image-limit-bottom', 10 );
		for($i = 1; $i <= $limit; $i++){			 
			$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
				'carousel-' . $i, 
					array(
						'title'      => __( 'Carousel ' . $i, 'bonestheme' ),
						'priority'   => 5,
						'section'	     => 'carousel',
					)) 
			);	 	 
		}
	}	


	/********************
	SETTINGS & CONTROLS
	********************/

	/********************
	SECTION SETTINGS
	********************/
	
	/* Section label  */
	$wp_customize->add_setting(
		'bottom-feature-header'  
	);
	$wp_customize->add_control(
		'bottom-feature-header',
			array(
				'type' => 'text',
				'label' => 'Section Label',
				'description' => 'Appears at top of section before content',
				'section' => 'service_section_bg_color',
			)
	);
	
	/* Background Color */
	$wp_customize->add_setting(
		'service-section-bg-color',
			array(
				'default' => '#6e6e6e',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-section-bg-color',
				array(
					'label' => 'Background Color',
					'section' => 'service_section_bg_color',
					'settings' => 'service-section-bg-color',
				)
		)
	);

	/* Background Image */
	$wp_customize->add_setting( 
		'service-section-bg-image' 
	);
	$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'service-section-bg-image',
			array(
				'label' => 'Background Image',
				'section' => 'service_section_bg_color',
				'settings' => 'service-section-bg-image'
			)
		)
	);

	/* Background Image Position */
	$wp_customize->add_setting(
		'service-section-bg-img-position',
			array(
				'default' => 'inherit',
			)
	);
	$wp_customize->add_control(
		'service-section-bg-img-position', 
			array(
				'settings' => 'service-section-bg-img-position',
				'label'   => __('Background Image Position', 'bonestheme'),
				'section' => 'service_section_bg_color',
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

	/* Background Image Attachment */
	$wp_customize->add_setting(
		'service-section-bg-attachment',
			array(
				'default' => 'scroll',
			)
	);
	$wp_customize->add_control(
		'service-section-bg-attachment', 
			array(
				'settings' => 'service-section-bg-attachment',
				'label'   => __('Background Image Attachment', 'bonestheme'),
				'section' => 'service_section_bg_color',
				'type'    => 'select',
				'choices'    => array(
					'scroll' => __('Scroll (Default)', 'bonestheme'),
					'fixed' => __('Fixed', 'bonestheme'),
				),
			)
	);

	/* Background Image Size */
	$wp_customize->add_setting(
		'service-section-bg-img-size',
			array(
				'default' => 'auto',
			)
	);
	$wp_customize->add_control(
		'service-section-bg-img-size', 
			array(
				'settings' => 'service-section-bg-img-size',
				'label'   => __('Background Image Size', 'bonestheme'),
				'section' => 'service_section_bg_color',
				'type'    => 'select',
				'choices'    => array(
					'auto' => __('Default', 'bonestheme'),
					'cover' => __('Cover', 'bonestheme'),
					'contain' => __('Contain', 'bonestheme'),
				),
			)
	);

	if (get_theme_mod ( 'basic-or-advanced' ) == 'advanced') {

		/* Content Option */
		$wp_customize->add_setting(
			'service-boxes-or-carousel',
				array(
					'default' => 'map',
				)
		);
		$wp_customize->add_control(
			'service-boxes-or-carousel',
				array(
					'type' => 'radio',
					'label' => 'Content Option',
					'section' => 'service_section_bg_color',
					'choices' => array(
						'boxes' => 'Service Boxes',
						'carousel' => 'Carousel',
						'posts' => 'Post-Type Carousel',
						'widgets' => 'Widgets - edit in widgets panel',
						'map' => 'Map',
						'none' => 'None (hide section)',
					),
				)
		);
		
		/* Remove Section Wrapper */
		$wp_customize->add_setting(
			'service-section-remove-wrapper' 
		);
		$wp_customize->add_control(
			'service-section-remove-wrapper',
				array(
					'type' => 'checkbox',
					'label' => 'Remove section wrapper (extend content full width)',
					'section' => 'service_section_bg_color',
					'description' => '',
				)
		);
		
		/* Change Section Wrapper Display */
		$wp_customize->add_setting(
			'service-section-display-type' 
		);
		$wp_customize->add_control(
			'service-section-display-type',
				array(
					'type' => 'checkbox',
					'description' => 'This option is only applicable if \'Widgets\' is the selected Content Option. This changes the section wrapper to display:block (default is display:flex)',
					'label' => 'Change section wrapper display type',
					'section' => 'service_section_bg_color',
				)
		);
		
		/* Show on Inner Pages */
		$wp_customize->add_setting(
			'show_bottom_on_internal' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_bottom_on_internal',
			array(
				'type' => 'toggle',
				'label' => 'Display section on inner pages',
				'section' => 'service_section_bg_color',
			)
			)
		);
		
		/* Show on Blog */
		$wp_customize->add_setting(
			'show_on_blog' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_on_blog',
			array(
				'type' => 'toggle',
				'label' => 'Display section on main blog page',
				'section' => 'service_section_bg_color',
			)
			)
		);
		
		/* Show on Blog Posts */
		$wp_customize->add_setting(
			'show_on_posts' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_on_posts',
			array(
				'type' => 'toggle',
				'label' => 'Display section on single blog posts',
				'section' => 'service_section_bg_color',
			)
			)
		);
		
		/* Show Only on Specific Pages */
		$wp_customize->add_setting(
			'show_only_on_page_ids' 
		);
		$wp_customize->add_control(
			'show_only_on_page_ids',
			array(
				'type' => 'text',
				'label' => '-OR-',
				'description' => 'Display section only on page IDs below (comma seperated)',
				'section' => 'service_section_bg_color',
			)
		);		
	}

	/*******************************
	SERVICE BOXES SETTINGS
	********************************/

	/* How Many Service Boxes */
	$wp_customize->add_setting(
		'how_many',
			array(
				'default' => '3',
			)
	); 
	$wp_customize->add_control(
		'how_many',
			array(
				'type' => 'radio',
				'label' => 'How Many boxes?',
				'section' => 'service_boxes_settings',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
			)
	);
	
	/* Service Box Background Color */
	$wp_customize->add_setting(
		'service-box-color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-color',
				array(
					'label' => 'Service Box Background Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-color',
				)
		)
	);

	/* Service Box Text Color */
	$wp_customize->add_setting(
		'service-box-text-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-text-color',
				array(
					'label' => 'Service Box Text Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-text-color',
				)
		)
	);

	/* Service Box Link Color */
	$wp_customize->add_setting(
		'service-box-link-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-link-color',
				array(
					'label' => 'Service Box Link Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-link-color',
				)
		)
	);

	/* Service Box Link Hover Color */
	$wp_customize->add_setting(
		'service-box-link-hover-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-link-hover-color',
				array(
					'label' => 'Service Box Link Hover Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-link-hover-color',
				)
		)
	);

	/* Service Box Link Text Decoration */
	$wp_customize->add_setting(
		'service-box-link-text-decoration',
			array(
				'default' => 'underline',
			)
	 );
	$wp_customize->add_control(
		'service-box-link-text-decoration', 
			array(
				'settings' => 'service-box-link-text-decoration',
				'label'   => __('Text Decoration', 'bonestheme'),
				'section' => 'service_boxes_settings',
				'type'    => 'select',
				'choices'    => array(
					'none' => __('none', 'bonestheme'),
					'underline' => __('underline', 'bonestheme'),
				),
			)
	);

	/* Service Box Title Color */
	$wp_customize->add_setting(
		'service-box-title-color',
			array(
				'default' => 'inherit',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-title-color',
				array(
					'label' => 'Service Box Title Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-title-color',
				)
		)
	);

	/* Service Box Button Background Color */
	$wp_customize->add_setting(
		'service-box-button-bg-color-picker',
			array(
				'default' => '#444444',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-button-bg-color-picker',
				array(
					'label' => 'Button BG Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-button-bg-color-picker',
				)
		)
	);

	/* Service Box Button Text Color */
	$wp_customize->add_setting(
		'service-box-button-text-color-picker',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-button-text-color-picker',
				array(
					'label' => 'Button Text Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-button-text-color-picker',
				)
		)
	);

	/* Service Box Button Hover Background Color */
	$wp_customize->add_setting(
		'service-box-button-hover-bg-color-picker',
			array(
				'default' => '#cccccc',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-button-hover-bg-color-picker',
				array(
					'label' => 'Button Hover BG Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-button-hover-bg-color-picker',
				)
		)
	);

	/* Service Box Button Hover Text Color */
	$wp_customize->add_setting(
		'service-box-button-hover-text-color-picker',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'service-box-button-hover-text-color-picker',
				array(
					'label' => 'Botton Hover Text Color',
					'section' => 'service_boxes_settings',
					'settings' => 'service-box-button-hover-text-color-picker',
				)
		)
	);
		 
	/* Service Box Title Font Family */
	$wp_customize->add_setting(
		'service-box-title-font-family',
			array(
			  'default'        => '',
		)
	);
	$wp_customize->add_control(
		'service-box-title-font-family', 
			array(
				'settings' => 'service-box-title-font-family',
				'label'   => __('Service Box Title Font Family', 'bonestheme'),
				'section' => 'service_boxes_settings',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
		
	);

	/* Service Box Title Font Weight */
	$wp_customize->add_setting(
		'service-box-title-font-weight',
			array(
			  'default'        => 'normal',
			)
	);
	$wp_customize->add_control(
		'service-box-title-font-weight', 
			array(
				'settings' => 'service-box-title-font-weight',
				'label'   => __('Service Box Title Font Weight', 'bonestheme'),
				'section' => 'service_boxes_settings',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
					),
			)
	);

	/* Service Box Text Font Family */
	$wp_customize->add_setting(
		'service-box-text-font-family',
			array(
				'default'  => '',
			)
	);
	$wp_customize->add_control(
		'service-box-text-font-family', 
			array(
				'settings' => 'service-box-text-font-family',
				'label'   => __('Service Box Text Font Family', 'bonestheme'),
				'section' => 'service_boxes_settings',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
	);

	/* Service Box Text Font Weight */
	$wp_customize->add_setting(
		'service-box-text-font-weight',
			array(
				'default'        => 'normal',
			)
	);
	$wp_customize->add_control(
		'service-box-text-font-weight', 
			array(
				'settings' => 'service-box-text-font-weight',
				'label'   => __('Service Box Text Font Weight', 'bonestheme'),
				'section' => 'service_boxes_settings',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
				),
		)
	);
 
	/*********************
	SERVICE BOXES CONTENT
	**********************/

	for($i = 1; $i <= 6; $i++){
		
		/* Service Box Title*/
		$wp_customize->add_setting(
			'service-box-' . $i . '-title',
				array(
					'default' => 'Service Title',
				)
		);
		$wp_customize->add_control(
			'service-box-' . $i . '-title',
				array(
					'label' => 'Service Box ' . $i . ' Title',
					'section' => 'service_boxes',
					'type' => 'text',	
				)
		);

		/* Service Box Content */
		$wp_customize->add_setting(
			'service-box-' . $i . '-content',
			array(
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor',
			)
		);
		$wp_customize->add_control(
			'service-box-' . $i . '-content',
			array(
				'label' => 'Service Box ' .$i . ' Content',
				'section' => 'service_boxes',
				'type' => 'textarea',
				
			)
		);
		
		/* Service Box Button Text */
		$wp_customize->add_setting(
			'service-box-' . $i . '-button-text',
			array(
				'default' => 'Lorem ipsum',
			)
		);
		$wp_customize->add_control(
			'service-box-' . $i . '-button-text',
			array(
				'label' => 'Service Box ' . $i . ' Button Text',
				'section' => 'service_boxes',
				'type' => 'text',
				
			)
		);
		
		/* Service Box Button Aria Label */
		$wp_customize->add_setting(
			'service-box-' . $i . '-aria-label',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'service-box-' .$i . '-aria-label',
			array(
				'label' => 'Service Box ' . $i . ' Aria Label',
				'section' => 'service_boxes',
				'type' => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'Ex: Learn More About SEO' ),
				)
				
			)
		);

		/* Service Box Button Button Link */
		$wp_customize->add_setting(
			'service-box-' . $i . '-button-link',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'service-box-' .$i . '-button-link',
			array(
				'label' => 'Service Box ' . $i . ' Button Link',
				'section' => 'service_boxes',
				'type' => 'text',
				
			)
		);	 
	}	 
	

	/**********************
	CAROUSEL SETTINGS
	***********************/

	/* Carousel Image Limit */
	$wp_customize->add_setting( 
		'carousel-image-limit-bottom', 
			array(
			'default' => '10',	
		) 
	);
	$wp_customize->add_control(
		'carousel-image-limit-bottom',
		array(
			'type' => 'range',
			'label'       => __('Total Number of Carousel Sections'),
			'section'     => 'carousel',
			'settings'    => 'carousel-image-limit-bottom',
			'description' => __('Customizer will need to be refreshed after change in order to take effect.'),
			'input_attrs' => array(
				'min' => 0,
				'max' => 30,
				'step' => 1,
			),
		)
	);

	/* Space Between Slides */
	$wp_customize->add_setting(
		'space-between-slides',
			array(
			'default' => '0',	
		)
	);
	$wp_customize->add_control(
		'space-between-slides',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Space Between Slides (padding - in px)'),
				'section'     => 'carousel',
				'settings'    => 'space-between-slides',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 0,
					'max' => 20,
					'step' => 1,
				),
			)
	);

	/* Carousel Image Height */
	$wp_customize->add_setting( 
		'carousel-slide-height', 
			array(
				'default' => '',	
			) 
	);
	$wp_customize->add_control(
		'carousel-slide-height',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Carousel Image Height (in px)'),
				'section'     => 'carousel',
				'settings'    => 'carousel-slide-height',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 50,
					'max' => 500,
					'step' => 1,
				),
			)
	);

	/* Carousel Slick Autoplay */
	$wp_customize->add_setting(
		'carousel-auto-play' 
	);
	$wp_customize->add_control(
		'carousel-auto-play',
			array(
				'type' => 'checkbox',
				'label' => 'Auto Play',
				'section' => 'carousel',
				'description' => '',
			)
	);

	/* Carousel Slick Dots */
	$wp_customize->add_setting(
		'carousel-dots' 
	);
	$wp_customize->add_control(
		'carousel-dots',
			array(
				'type' => 'checkbox',
				'label' => 'Dots',
				'section' => 'carousel',
			)
	);

	/* Carousel Slick Infinite */
	$wp_customize->add_setting(
		'carousel-infinite' 
	);
	$wp_customize->add_control(
		'carousel-infinite',
			array(
				'type' => 'checkbox',
				'label' => 'Infinite',
				'section' => 'carousel',
			)
	);

	/* Carousel Slick Slides to Show */
	$wp_customize->add_setting( 
		'carousel-slidestoshow', 
			array(
			'default' => '3',	
		) 
	);
	$wp_customize->add_control(
		'carousel-slidestoshow',
			array(
				'type'		  => 'range',	
				'label'       => __('Slides To Show'),
				'section'     => 'carousel',
				'settings'    => 'carousel-slidestoshow',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 2,
					'max' => 9,
					'step' => 1,
				),
			)
	);

	/* Carousel Slick Slides to Scroll */
	$wp_customize->add_setting( 
		'carousel-slidestoscroll', 
			array(
			'default' => '3',	
		) 
	);
	$wp_customize->add_control(
		'carousel-slidestoscroll',
			array(
				'type'		  => 'range',
				'label'       => __('Slides To Scroll'),
				'section'     => 'carousel',
				'settings'    => 'carousel-slidestoscroll',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 1,
					'max' => 10,
					'step' => 1,
				),
			)
	);

	/* Carousel Slick Speed */
	$wp_customize->add_setting( 
		'carousel-speed', 
			array(
			'default' => '300',	
		) 
	);
	$wp_customize->add_control(
		'carousel-speed',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Speed (between slides - in milliseconds)'),
				'section'     => 'carousel',
				'settings'    => 'carousel-speed',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 100,
					'max' => 900,
					'step' => 100,
				),
			)
	);

	/* Carousel Slick Additional Settings */
	$wp_customize->add_setting(
		'carousel-additional-settings',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'carousel-additional-settings',
		array(
			'label' => 'Additional Settings',
			'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
			'section' => 'carousel',
			'type' => 'textarea',
		)
	);

	/**********************
	CAROUSEL IMAGE SETTINGS
	***********************/

	$limit = get_theme_mod('carousel-image-limit-bottom', 10 );

	for($ii = 1; $ii <= $limit; $ii++){
		
		/* Carousel Image Upload */
		$wp_customize->add_setting( 
			'carousel-img-upload-' . $ii,
			array(
				'default' => get_template_directory_uri()."/library/images/sbb-banner.jpg"
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'carousel-img-upload-' . $ii,
				array(
					'label' => 'Carousel Image Upload ' . $ii,
					'section' => 'carousel-' . $ii,
					'settings' => 'carousel-img-upload-' . $ii,
				)
			)
		);
		
		/* Carousel Image Alt Text */
		$wp_customize->add_setting( 
			'carousel-img-upload-alt-' . $ii,
			array(
				'default' => "",
			)
		);
		$wp_customize->add_control(
			'carousel-img-upload-alt-' . $ii,
			array(
				'type' => 'text',
				'label' => 'Carousel Image ' . $ii . ' Alt Text',
				'section' => 'carousel-' . $ii,
				'settings' => 'carousel-img-upload-alt-' . $ii,
			)
		);
		
		/* Carousel Image Title Text */
		$wp_customize->add_setting( 
			'carousel-img-upload-title-' . $ii,
			array(
				'default' => "",
			)
		);
		$wp_customize->add_control(
			'carousel-img-upload-title-' . $ii,
			array(
				'type' => 'text',
				'label' => 'Carousel Image ' . $ii . ' Title',
				'section' => 'carousel-' . $ii,
				'settings' => 'carousel-img-upload-title-' . $ii,
			)
		);	
		
		/* Carousel Text */
		$wp_customize->add_setting(
			'carousel-text-' . $ii,
			array(
				'default' => "",
			)
		);
		$wp_customize->add_control(
			'carousel-text-' . $ii,
				array(
					'type' => 'textarea',
					'label' => 'Carousel ' . $ii . ' Text',
					'section' => 'carousel-' . $ii,
					'settings' => 'carousel-text-' . $ii,
				)
		);
		
		/* Carousel Display Type */
		$wp_customize->add_setting(
			'carousel-type-' . $ii,
				array(
					'default' => 'image',
				)
		); 
		$wp_customize->add_control(
			'carousel-type-' . $ii,
				array(
					'type' => 'radio',
					'label' => 'Display Options',
					'section' => 'carousel-' . $ii,
					'choices' => array(
						'image' => 'Image',
						'text' => 'Text',
						'both' => 'Image & Text',
					),
				)
		);
	}

	/**********************
	POST CAROUSEL SETTINGS
	***********************/

	/* Post Type to Display */
	$wp_customize->add_setting(
		'post-carousel-post-type',
			array(
				'default'	=>	'post',
			)
	);
		/*Get Registered Post Types*/
		$post_types = array ('post'	=>	'post', 'page'	=>	'page');
		/*Check for Additional Registered Post Types*/
		$args = array(
		   'public'   => true,
		   '_builtin' => false
		);
		$additional_post_types = get_post_types( $args );
		if ( $additional_post_types ) { 
			foreach ( $additional_post_types  as $post_type ) {
			  $post_types[$post_type] = $post_type;
			}
		}
		/**/
	$wp_customize->add_control(
		'post-carousel-post-type',
			array(
				'settings' => 'post-carousel-post-type',
				'label'   => 'Select Post Type',
				'section' => 'post_carousel',
				'type'    => 'select',
				'choices'    => $post_types,
		)
	);
	
	/* Total Posts to Display */
	$wp_customize->add_setting(
		'post-carousel-total-posts',
		array(
			'default' => '10',
		)
	);
	$wp_customize->add_control(
		'post-carousel-total-posts',
		array(
			'label' => 'Total Number of Posts to Display',
			'section' => 'post_carousel',
			'type' => 'number',
			
		)
	);
	
	/* Post Carousel Featured Image */
	$wp_customize->add_setting(
		'post-carousel-featured-display' 
	);
	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
		'post-carousel-featured-display',
			array(
				'type' => 'toggle',
				'label' => 'Hide Featured Image',
				'section' => 'post_carousel',
				'description' => '',
			)
		)
	);
	
	/* Post Carousel Excerpt */
	$wp_customize->add_setting(
		'post-carousel-excerpt-display' 
	);
	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
		'post-carousel-excerpt-display',
			array(
				'type' => 'toggle',
				'label' => 'Hide Excerpt',
				'section' => 'post_carousel',
				'description' => '',
			)
		)
	);
	
	/* Post Carousel Excerpt */
	$wp_customize->add_setting(
		'post-carousel-button-display' 
	);
	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
		'post-carousel-button-display',
			array(
				'type' => 'toggle',
				'label' => 'Hide View Button',
				'section' => 'post_carousel',
				'description' => '',
			)
		)
	);
	
	/* Post Carousel Link Type */
	$wp_customize->add_setting(
		'post-carousel-link-display' 
	);
	$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
		'post-carousel-link-display',
			array(
				'type' => 'toggle',
				'label' => 'Make Entire Section Clickable',
				'section' => 'post_carousel',
				'description' => 'By default only the title and button are clickable, enable this to make the entire slide clickable',
			)
		)
	);
	
	/* Post Carousel Image Alignment */
	$wp_customize->add_setting(
		'post-carousel-image-pos' 
	);
	$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
		'post-carousel-image-pos',
			array(
				'type' => 'toggle',
				'label' => 'Align Image to the Left',
				'section' => 'post_carousel',
				'description' => '',
			)
		)
	);
	
	/* Space Between Slides */
	$wp_customize->add_setting( 
		'post-space-between-slides', 
			array(
			'default' => '0',	
		) 
	);
	$wp_customize->add_control(
		'post-space-between-slides',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Space Between Slides (padding - in px)'),
				'section'     => 'post_carousel',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 0,
					'max' => 20,
					'step' => 1,
				),
			)
	);
	
	/* Carousel Image Height */
	$wp_customize->add_setting( 
		'post-carousel-slide-height', 
			array(
			'default' => '',	
		) 
	);
	$wp_customize->add_control(
		'post-carousel-slide-height',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Carousel Image Height (in px)'),
				'section'     => 'post_carousel',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 50,
					'max' => 500,
					'step' => 1,
				),
			)
	); 

	/* View Post Text */
	$wp_customize->add_setting(
		'post-carousel-button-text',
		array(
			'default' => 'View Post',
		)
	);
	$wp_customize->add_control(
		'post-carousel-button-text',
		array(
			'label' => 'Button Text',
			'section' => 'post_carousel',
			'type' => 'text',
			
		)
	);
	/* Post Carousel Background Color */
	$wp_customize->add_setting(
		'post-carousel-bg-color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post-carousel-bg-color',
				array(
					'label' => 'Post Background Color',
					'section' => 'post_carousel',
					'settings' => 'post-carousel-bg-color',
				)
		)
	);
	
	/* Post Carousel Text Color */
	$wp_customize->add_setting(
		'post-carousel-text-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post-carousel-text-color',
				array(
					'label' => 'Post Text Color',
					'section' => 'post_carousel',
					'settings' => 'post-carousel-text-color',
				)
		)
	);
	
	/* Post Carousel Button Color */
	$wp_customize->add_setting(
		'post-carousel-button-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post-carousel-button-color',
				array(
					'label' => 'Post Button Color',
					'section' => 'post_carousel',
					'settings' => 'post-carousel-button-color',
				)
		)
	);
	
	/* Post Carousel Button Text Color */
	$wp_customize->add_setting(
		'post-carousel-button-text-color',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'post-carousel-button-text-color',
				array(
					'label' => 'Post Button Text Color',
					'section' => 'post_carousel',
					'settings' => 'post-carousel-button-text-color',
				)
		)
	);
	
	/* Carousel Slick Autoplay */
	$wp_customize->add_setting(
		'post-carousel-auto-play' 
	);
	$wp_customize->add_control(
		'post-carousel-auto-play',
			array(
				'type' => 'checkbox',
				'label' => 'Auto Play',
				'section' => 'post_carousel',
				'description' => '',
			)
	);

	/* Carousel Slick Dots */
	$wp_customize->add_setting(
		'post-carousel-dots'
	);
	$wp_customize->add_control(
		'post-carousel-dots',
			array(
				'type' => 'checkbox',
				'label' => 'Dots',
				'section' => 'post_carousel',
			)
	);

	/* Carousel Slick Infinite */
	$wp_customize->add_setting(
		'post-carousel-infinite'
	);
	$wp_customize->add_control(
		'post-carousel-infinite',
			array(
				'type' => 'checkbox',
				'label' => 'Infinite',
				'section' => 'post_carousel',
			)
	);

	/* Carousel Slick Slides to Show */
	$wp_customize->add_setting(
		'post-carousel-slidestoshow',
			array(
			'default' => '3',
		)
	);
	$wp_customize->add_control(
		'post-carousel-slidestoshow',
			array(
				'type'		  => 'range',	
				'label'       => __('Slides To Show'),
				'section'     => 'post_carousel',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 1,
					'max' => 6,
					'step' => 1,
				),
			)
	);

	/* Carousel Slick Slides to Scroll */
	$wp_customize->add_setting(
		'post-carousel-slidestoscroll',
			array(
			'default' => '3',
		)
	);
	$wp_customize->add_control(
		'post-carousel-slidestoscroll',
			array(
				'type'		  => 'range',
				'label'       => __('Slides To Scroll'),
				'section'     => 'post_carousel',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 1,
					'max' => 10,
					'step' => 1,
				),
			)
	);

	/* Carousel Slick Speed */
	$wp_customize->add_setting(
		'post-carousel-speed',
			array(
			'default' => '300',
		)
	);
	$wp_customize->add_control(
		'post-carousel-speed',
			array(
				'type' => 'range',
				'priority' => 10,
				'label'       => __('Speed (between slides - in milliseconds)'),
				'section'     => 'post_carousel',
				'description' => __(''),
				'input_attrs' => array(
					'min' => 100,
					'max' => 900,
					'step' => 100,
				),
			)
	);
	
	/* Carousel Slick Additional Settings */
	$wp_customize->add_setting(
		'post-carousel-additional-settings',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'post-carousel-additional-settings',
		array(
			'label' => 'Additional Settings',
			'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
			'section' => 'post_carousel',
			'type' => 'textarea',
		)
	);
	
	/***************
	MAP SETTINGS
	***************/

	/* Map Latitude */
	$wp_customize->add_setting(
		'latitude',
			array(
				'default' => '-21.807882',
			)
	);
	$wp_customize->add_control(
		'latitude',
			array(
				'label' => 'Latitude',
				'section' => 'post_content_map',
				'type' => 'text',	
			)
	);

	/* Map Longitude */
	$wp_customize->add_setting(
		'longitude',
			array(
				'default' => '134.863577',
			)
	);
	$wp_customize->add_control(
		'longitude',
			array(
				'label' => 'Longitude',
				'section' => 'post_content_map',
				'type' => 'text',
			)
	);

	/* Map Zoom */
	$wp_customize->add_setting(
		'zoom',
			array(
				'default' => '5',
			)
	);
	$wp_customize->add_control(
		'zoom',
			array(
				'label' => 'Zoom',
				'section' => 'post_content_map',
				'type' => 'text',
			)
	);
	/* Map Minimum Height */
	$wp_customize->add_setting(
		'map-min-height',
			array(
				'default' => '350',
			)
	);
	$wp_customize->add_control(
		'map-min-height',
			array(
				'label' => 'Map Height (in px, enter numbers only)',
				'section' => 'post_content_map',
				'type' => 'text',	
			)
	);

	/* Map iFrame */
	$wp_customize->add_setting(
		'map-iframe',
			array(
				'default' => '',
			)
	);
	$wp_customize->add_control(
		'map-iframe',
			array(
				'label' => '-OR- Google Map Iframe',
				'section' => 'post_content_map',
				'type' => 'textarea',
				'description' => 'Use this if no API key, set width (in iframe) to 100% and height to 350px',
			)
	);
	

	/*****************
	SELECTIVE REFRESH
	*****************/
		
	$wp_customize->selective_refresh->add_partial(
		'service-section-bg-color', 
		array(
			'selector' => '.service-boxes',
			'container_inclusive' => false,
			'render_callback' => 'service-section-bg-color',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'service-box-color', 
		array(
			'selector' => '.inner-service-box-bg',
			'container_inclusive' => false,
			'render_callback' => 'service-box-color',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'amenities-price', 
		array(
			'selector' => '.amenities-price',
			'container_inclusive' => false,
			'render_callback' => 'amenities-price',
		)
	);	
	$wp_customize->selective_refresh->add_partial(
		'agent-name', 
		array(
			'selector' => '.agent-name',
			'container_inclusive' => false,
			'render_callback' => 'agent-name',
		)
	);		
	for($i = 1; $i <= 6; $i++){
		$wp_customize->selective_refresh->add_partial(
			'service-box-' . $i . '-title', 
			array(
				'selector' => '.service-box-' . $i . '-title',
				'container_inclusive' => false,
				'render_callback' => 'service-box-' . $i . '-title',
			)
		);
	}
	$wp_customize->selective_refresh->add_partial(
		'carousel-auto-play', 
		array(
			'selector' => '.post-main-content-section-bg .multiple-items',
			'container_inclusive' => false,
			'render_callback' => 'carousel-auto-play',
		)
	);

?>