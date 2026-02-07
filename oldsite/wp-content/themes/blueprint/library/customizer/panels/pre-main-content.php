<?php
/*
	pre-main-content.php
	Description: Settings for Top Feature Section in the Wordpress Customizer
 */
 
if( get_theme_mod( 'basic-or-advanced' ) == 'advanced' ) {
	
		/****************	
		PANELS
		****************/

		/* 1st Level */
		$wp_customize->add_panel( 
			'pre_main',
			array(
				'title'      => __( 'Top Feature Section', 'bonestheme' ),
				'description' => '',
				'priority'   => 40,
			)
		);

		/* 2nd Level */
		$wp_customize->add_section( 
			'service_section_bg_color_pre', 
			array(
				'title'      => __( 'Section Settings', 'bonestheme' ),
				'priority'   => 5,
				'panel'	     => 'pre_main',
			)
		);

		$wp_customize->add_section(
			'service_boxes_settings_pre', 
			array(
				'title'      => __( 'Service Boxes Settings', 'bonestheme' ),
				'priority'   => 10,
				'panel'	     => 'pre_main',
			)
		);

		$wp_customize->add_section(
			'carousel_pre', 
			array(
				'title'      => __( 'Carousel Settings', 'bonestheme' ),
				'priority'   => 15,
				'panel'	     => 'pre_main',
				'description' => 'Carousel Settings'
			)
		);
		
		$wp_customize->add_section(
			'post_carousel_pre', 
			array(
				'title'      => __( 'Post Carousel Settings', 'bonestheme' ),
				'priority'   => 15,
				'panel'	     => 'pre_main',
				'description' => ''
			)
		);

		/* 3rd Level */
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'service_boxes_pre', 
			array(
				'title'      => __( 'Service Boxes Content', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'service_boxes_settings_pre',
			)) 
		);
	 
		$limit = get_theme_mod('carousel-image-limit', 10 );
		for($i = 1; $i <= $limit; $i++){		 
			$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
				'carousel-pre-' . $i, 
					array(
						'title'      => __( 'Carousel ' . $i, 'bonestheme' ),
						'priority'   => 5,
						'section'	     => 'carousel_pre',
					)) 
			);	 	 
		}
		
		
		/********************
		SETTINGS & CONTROLS
		********************/

		/********************
		SECTION SETTINGS
		********************/ 

		/* Section label  */
		$wp_customize->add_setting(
			'top-feature-header'  
		);
		$wp_customize->add_control(
			'top-feature-header',
				array(
					'type' => 'text',
					'label' => 'Section Label',
					'description' => 'Appears at top of section before content',
					'section' => 'service_section_bg_color_pre',
				)
		);
		
		/* Background Color */
		$wp_customize->add_setting(
			'service-section-bg-color-pre',
				array(
					'default' => '#6e6e6e',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-section-bg-color-pre',
					array(
						'label' => 'Background Color',
						'section' => 'service_section_bg_color_pre',
						'settings' => 'service-section-bg-color-pre',
					)
			)
		);

		/* Background Image */
		$wp_customize->add_setting( 
			'service-section-bg-image-pre' 
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'service-section-bg-image-pre',
					array(
						'label' => 'Background Image',
						'section' => 'service_section_bg_color_pre',
						'settings' => 'service-section-bg-image-pre'
					)
			)
		);

		/* Background Image Position */
		$wp_customize->add_setting(
			'service-section-bg-img-position-pre',
				array(
					'default' => 'inherit',
				)
		 );
		$wp_customize->add_control(
			'service-section-bg-img-position-pre', 
				array(
					'settings' => 'service-section-bg-img-position-pre',
					'label'   => __('Background Image Position', 'bonestheme'),
					'section' => 'service_section_bg_color_pre',
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
			'service-section-bg-attachment-pre',
				array(
					'default' => 'scroll',
				)
		);
		$wp_customize->add_control(
			'service-section-bg-attachment-pre', 
				array(
					'settings' => 'service-section-bg-attachment-pre',
					'label'   => __('Background Image Attachment', 'bonestheme'),
					'section' => 'service_section_bg_color_pre',
					'type'    => 'select',
					'choices'    => array(
						'scroll' => __('Scroll (Default)', 'bonestheme'),
						'fixed' => __('Fixed', 'bonestheme'),
					),
				)
		);
		
		/* Background Image Size */
		$wp_customize->add_setting(
			'service-section-bg-img-size-pre',
				array(
					'default' => 'auto',
				)
		 );
		$wp_customize->add_control(
			'service-section-bg-img-size-pre', 
				array(
					'settings' => 'service-section-bg-img-size-pre',
					'label'   => __('Background Image Size', 'bonestheme'),
					'section' => 'service_section_bg_color_pre',
					'type'    => 'select',
					'choices'    => array(
						'auto' => __('Default', 'bonestheme'),
						'cover' => __('Cover', 'bonestheme'),
						'contain' => __('Contain', 'bonestheme'),
					),
				)
		);

		/* Content Option */
		$wp_customize->add_setting(
			'service-boxes-or-carousel-pre',
				array(
					'default' => 'boxes',
				)
		); 
		$wp_customize->add_control(
			'service-boxes-or-carousel-pre',
				array(
					'type' => 'radio',
					'label' => 'Content Option',
					'section' => 'service_section_bg_color_pre',
					'choices' => array(
						'boxes' => 'Service Boxes',
						'carousel' => 'Carousel',
						'posts' => 'Post-Type Carousel',
						'widgets' => 'Widgets - edit in widgets panel',
						'none' => 'None (hide section)',
					),
				)
		); 

		/* Remove Section Wrapper */
		$wp_customize->add_setting(
			'service-section-remove-wrapper-pre' 
		);
		$wp_customize->add_control(
			'service-section-remove-wrapper-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Remove section wrapper (extend content full width)',
					'section' => 'service_section_bg_color_pre',
					'description' => '',
				)
		);
		
		/* Change Section Wrapper Display */
		$wp_customize->add_setting(
			'service-section-display-type-pre' 
		);
		$wp_customize->add_control(
			'service-section-display-type-pre',
				array(
					'type' => 'checkbox',
					'description' => 'This option is only applicable if \'Widgets\' is the selected Content Option. This changes the section wrapper to display:block (default is display:flex)',
					'label' => 'Change section wrapper display type',
					'section' => 'service_section_bg_color_pre',
				)
		);
		
		/* Show on Inner Pages */
		$wp_customize->add_setting(
			'show_top_on_internal_pre' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_top_on_internal_pre',
				array(
					'type' => 'toggle',
					'label' => 'Display section on inner pages',
					'section' => 'service_section_bg_color_pre',
				)
				)
		);
		
		/* Show on Blog */
		$wp_customize->add_setting(
			'show_on_blog_pre' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_on_blog_pre',
			array(
				'type' => 'toggle',
				'label' => 'Display section on main blog page',
				'section' => 'service_section_bg_color_pre',
			)
			)
		);
		
		/* Show on Blog Posts */
		$wp_customize->add_setting(
			'show_on_posts_pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'show_on_posts_pre',
			array(
				'type' => 'toggle',
				'label' => 'Display section on single blog posts',
				'section' => 'service_section_bg_color_pre',
			)
			)
		);
		
		/* Show Only on Specific Pages */
		$wp_customize->add_setting(
			'show_only_on_page_ids_pre'  
		);
		$wp_customize->add_control(
			'show_only_on_page_ids_pre',
				array(
					'type' => 'text',
					'label' => '-OR-',
					'description' => 'Display section only on page IDs below (comma seperated)',
					'section' => 'service_section_bg_color_pre',
				)
		);
		
		/*******************************
		SERVICE BOXES SETTINGS
		********************************/
		
		/* How Many Service Boxes */
		$wp_customize->add_setting(
			'how_many_pre',
				array(
					'default' => '4',
				)
		); 
		$wp_customize->add_control(
			'how_many_pre',
				array(
					'type' => 'radio',
					'label' => 'How Many boxes?',
					'section' => 'service_boxes_settings_pre',
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
			'service-box-color-pre',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-color-pre',
					array(
						'label' => 'Service Box Background Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-color-pre',
					)
			)
		);

		/* Service Box Text Color */
		$wp_customize->add_setting(
			'service-box-text-color-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-text-color-pre',
					array(
						'label' => 'Service Box Text Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-text-color-pre',
					)
			)
		);

		/* Service Box Link Color */
		$wp_customize->add_setting(
			'service-box-link-color-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-link-color-pre',
					array(
						'label' => 'Service Box Link Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-link-color-pre',
					)
			)
		);
		
		/* Service Box Link Hover Color */
		$wp_customize->add_setting(
			'service-box-link-hover-color-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-link-hover-color-pre',
					array(
						'label' => 'Service Box Link Hover Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-link-hover-color-pre',
					)
			)
		);		 

		/* Service Box Link Text Decoration */
		$wp_customize->add_setting(
			'service-box-link-text-decoration-pre',
				array(
					'default' => 'underline',
				)
		);
		$wp_customize->add_control(
			'service-box-link-text-decoration-pre', 
				array(
					'settings' => 'service-box-link-text-decoration',
					'label'   => __('Text Decoration', 'bonestheme'),
					'section' => 'service_boxes_settings_pre',
					'type'    => 'select',
					'choices'    => array(
						'none' => __('none', 'bonestheme'),
						'underline' => __('underline', 'bonestheme'),
					),
				)
		);	 

		/* Service Box Title Color */
		$wp_customize->add_setting(
			'service-box-title-color-pre',
				array(
					'default' => 'inherit',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-title-color-pre',
					array(
						'label' => 'Service Box Title Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-title-color-pre',
					)
			)
		);

		/* Service Box Button Background Color */
		$wp_customize->add_setting(
			'service-box-button-bg-color-picker-pre',
				array(
					'default' => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-bg-color-picker-pre',
					array(
						'label' => 'Button BG Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-button-bg-color-picker-pre',
					)
			)
		);

		/* Service Box Button Text Color */
		$wp_customize->add_setting(
			'service-box-button-text-color-picker-pre',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-text-color-picker-pre',
					array(
						'label' => 'Button Text Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-button-text-color-picker-pre',
					)
			)
		);

		/* Service Box Button Hover Background Color */
		$wp_customize->add_setting(
			'service-box-button-hover-bg-color-picker-pre',
				array(
					'default' => '#cccccc',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-hover-bg-color-picker-pre',
					array(
						'label' => 'Button Hover BG Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-button-hover-bg-color-picker-pre',
					)
			)
		);

		/* Service Box Button Hover Text Color */
		$wp_customize->add_setting(
			'service-box-button-hover-text-color-picker-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-hover-text-color-picker-pre',
					array(
						'label' => 'Botton Hover Text Color',
						'section' => 'service_boxes_settings_pre',
						'settings' => 'service-box-button-hover-text-color-picker-pre',
					)
			)
		);

		/* Service Box Title Font Family */
		$wp_customize->add_setting(
			'service-box-title-font-family-pre',
				array(
				  'default'        => '',
			)
		);
		$wp_customize->add_control(
			'service-box-title-font-family-pre', 
				array(
					'settings' => 'service-box-title-font-family-pre',
					'label'   => __('Service Box Title Font Family', 'bonestheme'),
					'section' => 'service_boxes_settings_pre',
					'type'    => 'select',
					'choices'    => $fontArray,
				)
		);

		/* Service Box Title Font Weight */
		$wp_customize->add_setting(
			'service-box-title-font-weight-pre',
				array(
				  'default'  => 'normal',
				)
		);
		$wp_customize->add_control(
			'service-box-title-font-weight-pre', 
				array(
					'settings' => 'service-box-title-font-weight-pre',
					'label'   => __('Service Box Title Font Weight', 'bonestheme'),
					'section' => 'service_boxes_settings_pre',
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
			'service-box-text-font-family-pre',
				array(
					'default'  => '',
				)
		);
		$wp_customize->add_control(
			'service-box-text-font-family-pre', 
				array(
					'settings' => 'service-box-text-font-family-pre',
					'label'   => __('Service Box Text Font Family', 'bonestheme'),
					'section' => 'service_boxes_settings_pre',
					'type'    => 'select',
					'choices'  => $fontArray,
				)
		);
		
		/* Service Box Text Font Weight */
		$wp_customize->add_setting(
			'service-box-text-font-weight-pre',
				array(
					'default'	=>	'normal',
				)
		);
		$wp_customize->add_control(
			'service-box-text-font-weight-pre',
				array(
					'settings' => 'service-box-text-font-weight-pre',
					'label'   => __('Service Box Text Font Weight', 'bonestheme'),
					'section' => 'service_boxes_settings_pre',
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
				'service-box-' . $i . '-title-pre',
					array(
						'default' => 'Service Title',
					)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-title-pre',
					array(
						'label' => 'Service Box ' . $i . ' Title',
						'section' => 'service_boxes_pre',
						'type' => 'text',	
					)
			);
			
			/* Service Box Content */
			$wp_customize->add_setting(
				'service-box-' . $i . '-content-pre',
				array(
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor',
				)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-content-pre',
				array(
					'label' => 'Service Box ' .$i . ' Content',
					'section' => 'service_boxes_pre',
					'type' => 'textarea',
					
				)
			);
			
			/* Service Box Button Text */
			$wp_customize->add_setting(
				'service-box-' . $i . '-button-text-pre',
				array(
					'default' => 'Lorem ipsum',
				)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-button-text-pre',
				array(
					'label' => 'Service Box ' . $i . ' Button Text',
					'section' => 'service_boxes_pre',
					'type' => 'text',
					
				)
			);

			/* Service Box Button Aria Link */
			$wp_customize->add_setting(
				'service-box-' . $i . '-aria-label-pre',
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'service-box-' .$i . '-aria-label-pre',
				array(
					'label' => 'Service Box ' . $i . ' Aria Label',
					'section' => 'service_boxes_pre',
					'type' => 'text',
					'input_attrs' => array(
						'placeholder' => __( 'Ex: Learn More About SEO' ),
					)
					
				)
			);

			/* Service Box Button Link */
			$wp_customize->add_setting(
				'service-box-' . $i . '-button-link-pre',
				array(
					'default' => '',
				)
			);

			$wp_customize->add_control(
				'service-box-' .$i . '-button-link-pre',
				array(
					'label' => 'Service Box ' . $i . ' Button Link',
					'section' => 'service_boxes_pre',
					'type' => 'text',
					
				)
			);
		}
  	 
	 
		/**********************
		CAROUSEL SETTINGS
		***********************/

		/* Carousel Image Limit */
		$wp_customize->add_setting( 
			'carousel-image-limit', 
				array(
				'default' => '10',	
			) 
		);
		$wp_customize->add_control(
			'carousel-image-limit',
				array(
					'type' => 'range',
					'label'       => __('Total Number of Carousel Sections'),
					'section'     => 'carousel_pre',
					'settings'    => 'carousel-image-limit',
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
			'space-between-slides-pre', 
				array(
				'default' => '0',	
			) 
		);
		$wp_customize->add_control(
				'space-between-slides-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Space Between Slides (padding - in px)'),
					'section'     => 'carousel_pre',
					'settings'    => 'space-between-slides-pre',
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
			'carousel-slide-height-pre', 
				array(
				'default' => '',	
			) 
		);
		$wp_customize->add_control(
				'carousel-slide-height-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Carousel Image Height (in px)'),
					'section'     => 'carousel_pre',
					'settings'    => 'carousel-slide-height-pre',
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
			'carousel-auto-play-pre' 
		);
		$wp_customize->add_control(
			'carousel-auto-play-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Auto Play',
					'section' => 'carousel_pre',
					'description' => '',
				)
		);

		/* Carousel Slick Dots */
		$wp_customize->add_setting(
			'carousel-dots-pre'
		);
		$wp_customize->add_control(
			'carousel-dots-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Dots',
					'section' => 'carousel_pre',
				)
		);

		/* Carousel Slick Infinite */
		$wp_customize->add_setting(
			'carousel-infinite-pre'
		);
		$wp_customize->add_control(
			'carousel-infinite-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Infinite',
					'section' => 'carousel_pre',
				)
		);

		/* Carousel Slick Slides to Show */
		$wp_customize->add_setting(
			'carousel-slidestoshow-pre',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'carousel-slidestoshow-pre',
				array(
					'type'		  => 'range',	
					'label'       => __('Slides To Show'),
					'section'     => 'carousel_pre',
					'settings'    => 'carousel-slidestoshow-pre',
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
			'carousel-slidestoscroll-pre',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'carousel-slidestoscroll-pre',
				array(
					'type'		  => 'range',
					'label'       => __('Slides To Scroll'),
					'section'     => 'carousel_pre',
					'settings'    => 'carousel-slidestoscroll-pre',
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
			'carousel-speed-pre',
				array(
				'default' => '300',
			)
		);
		$wp_customize->add_control(
			'carousel-speed-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Speed (between slides - in milliseconds)'),
					'section'     => 'carousel_pre',
					'settings'    => 'carousel-speed-pre',
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
			'carousel-additional-settings-pre',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'carousel-additional-settings-pre',
			array(
				'label' => 'Additional Settings',
				'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
				'section' => 'carousel_pre',
				'type' => 'textarea',
			)
		);


		/**********************
		CAROUSEL IMAGE SETTINGS
		***********************/
		$limit = get_theme_mod('carousel-image-limit', 10 );

		for($ii = 1; $ii <= $limit; $ii++){
			
			/* Carousel Image Upload */
			$wp_customize->add_setting(
				'carousel-img-upload-pre-' . $ii,
				array(
					'default' => get_template_directory_uri()."/library/images/sbb-banner.jpg"
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'carousel-img-upload-pre-' . $ii,
					array(
						'label' => 'Carousel Image Upload ' . $ii,
						'section' => 'carousel-pre-' . $ii,
						'settings' => 'carousel-img-upload-pre-' . $ii,
					)
				)
			);

			/* Carousel Image Alt Text */
			$wp_customize->add_setting(
				'carousel-img-upload-pre-alt-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
					'carousel-img-upload-pre-alt-' . $ii,
					array(
						'type' => 'text',
						'label' => 'Carousel Image ' . $ii . ' Alt Text',
						'section' => 'carousel-pre-' . $ii,
						'settings' => 'carousel-img-upload-pre-alt-' . $ii,
					)
			);

			/* Carousel Image Title Text */
			$wp_customize->add_setting(
				'carousel-img-upload-pre-title-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
					'carousel-img-upload-pre-title-' . $ii,
					array(
						'type' => 'text',
						'label' => 'Carousel Image ' . $ii . ' Title',
						'section' => 'carousel-pre-' . $ii,
						'settings' => 'carousel-img-upload-pre-title-' . $ii,
					)
			);
			
			/* Carousel Image Title Text */
			$wp_customize->add_setting(
				'carousel-img-upload-pre-title-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
					'carousel-img-upload-pre-title-' . $ii,
					array(
						'type' => 'text',
						'label' => 'Carousel Image ' . $ii . ' Title',
						'section' => 'carousel-pre-' . $ii,
						'settings' => 'carousel-img-upload-pre-title-' . $ii,
					)
			);
			
			/* Carousel Text */
			$wp_customize->add_setting(
				'carousel-text-pre-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
				'carousel-text-pre-' . $ii,
					array(
						'type' => 'textarea',
						'label' => 'Carousel ' . $ii . ' Text',
						'section' => 'carousel-pre-' . $ii,
						'settings' => 'carousel-text-pre-' . $ii,
					)
			);
			
			/* Carousel Display Type */
			$wp_customize->add_setting(
				'carousel-type-pre-' . $ii,
					array(
						'default' => 'image',
					)
			); 
			$wp_customize->add_control(
				'carousel-type-pre-' . $ii,
					array(
						'type' => 'radio',
						'label' => 'Display Options',
						'section' => 'carousel-pre-' . $ii,
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
			'post-carousel-post-type-pre',
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
			'post-carousel-post-type-pre',
				array(
					'settings' => 'post-carousel-post-type-pre',
					'label'   => 'Select Post Type',
					'section' => 'post_carousel_pre',
					'type'    => 'select',
					'choices'    => $post_types,
			)
		);
		
		/* Total Posts to Display */
		$wp_customize->add_setting(
			'post-carousel-total-posts-pre',
			array(
				'default' => '10',
			)
		);
		$wp_customize->add_control(
			'post-carousel-total-posts-pre',
			array(
				'label' => 'Total Number of Posts to Display',
				'section' => 'post_carousel_pre',
				'type' => 'number',
				
			)
		);
		
		/* Post Carousel Featured Image */
		$wp_customize->add_setting(
			'post-carousel-featured-display-pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-featured-display-pre',
				array(
					'type' => 'toggle',// light, ios, flat
					'label' => 'Hide Featured Image',
					'section' => 'post_carousel_pre',
					'description' => '',
				)
			)
		);
	
		/* Post Carousel Excerpt */
		$wp_customize->add_setting(
			'post-carousel-excerpt-display-pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-excerpt-display-pre',
				array(
					'type' => 'toggle',// light, ios, flat
					'label' => 'Hide Excerpt',
					'section' => 'post_carousel_pre',
					'description' => '',
				)
			)
		);
		
		/* Post Carousel Excerpt */
		$wp_customize->add_setting(
			'post-carousel-button-display-pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-button-display-pre',
				array(
					'type' => 'toggle',
					'label' => 'Hide View Button',
					'section' => 'post_carousel_pre',
					'description' => '',
				)
			)
		);
		
		/* Post Carousel Link Type */
		$wp_customize->add_setting(
			'post-carousel-link-display-pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-link-display-pre',
				array(
					'type' => 'toggle',
					'label' => 'Make Entire Section Clickable',
					'section' => 'post_carousel_pre',
					'description' => 'By default only the title and button are clickable, enable this to make the entire slide clickable',
				)
			)
		);
		
		/* Post Carousel Image Alignment */
		$wp_customize->add_setting(
			'post-carousel-image-pos-pre' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-image-pos-pre',
				array(
					'type' => 'toggle',
					'label' => 'Align Image to the Left',
					'section' => 'post_carousel_pre',
					'description' => '',
				)
			)
		);
	
		/* Space Between Slides */
		$wp_customize->add_setting( 
			'post-space-between-slides-pre', 
				array(
				'default' => '0',	
			) 
		);
		$wp_customize->add_control(
			'post-space-between-slides-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Space Between Slides (padding - in px)'),
					'section'     => 'post_carousel_pre',
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
			'post-carousel-slide-height-pre', 
				array(
				'default' => '275',	
			) 
		);
		$wp_customize->add_control(
			'post-carousel-slide-height-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Carousel Image Height (in px)'),
					'section'     => 'post_carousel_pre',
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
			'post-carousel-button-text-pre',
			array(
				'default' => 'View Post',
			)
		);
		$wp_customize->add_control(
			'post-carousel-button-text-pre',
			array(
				'label' => 'Button Text',
				'section' => 'post_carousel_pre',
				'type' => 'text',
			)
		);
		
		/* Post Carousel Background Color */
		$wp_customize->add_setting(
			'post-carousel-bg-color-pre',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-bg-color-pre',
					array(
						'label' => 'Post Background Color',
						'section' => 'post_carousel_pre',
						'settings' => 'post-carousel-bg-color-pre',
					)
			)
		);
		
		/* Post Carousel Text Color */
		$wp_customize->add_setting(
			'post-carousel-text-color-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-text-color-pre',
					array(
						'label' => 'Post Text Color',
						'section' => 'post_carousel_pre',
						'settings' => 'post-carousel-text-color-pre',
					)
			)
		);
		
		/* Post Carousel Button Color */
		$wp_customize->add_setting(
			'post-carousel-button-color-pre',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-button-color-pre',
					array(
						'label' => 'Post Button Color',
						'section' => 'post_carousel_pre',
						'settings' => 'post-carousel-button-color-pre',
					)
			)
		);
		
		/* Post Carousel Button Text Color */
		$wp_customize->add_setting(
			'post-carousel-button-text-color-pre',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-button-text-color-pre',
					array(
						'label' => 'Post Button Text Color',
						'section' => 'post_carousel_pre',
						'settings' => 'post-carousel-button-text-color-pre',
					)
			)
		);
		
		
		/* Carousel Slick Autoplay */
		$wp_customize->add_setting(
			'post-carousel-auto-play-pre' 
		);
		$wp_customize->add_control(
			'post-carousel-auto-play-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Auto Play',
					'section' => 'post_carousel_pre',
					'description' => '',
				)
		);

		/* Carousel Slick Dots */
		$wp_customize->add_setting(
			'post-carousel-dots-pre'
		);
		$wp_customize->add_control(
			'post-carousel-dots-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Dots',
					'section' => 'post_carousel_pre',
				)
		);

		/* Carousel Slick Infinite */
		$wp_customize->add_setting(
			'post-carousel-infinite-pre'
		);
		$wp_customize->add_control(
			'post-carousel-infinite-pre',
				array(
					'type' => 'checkbox',
					'label' => 'Infinite',
					'section' => 'post_carousel_pre',
				)
		);

		/* Carousel Slick Slides to Show */
		$wp_customize->add_setting(
			'post-carousel-slidestoshow-pre',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'post-carousel-slidestoshow-pre',
				array(
					'type'		  => 'range',	
					'label'       => __('Slides To Show'),
					'section'     => 'post_carousel_pre',
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
			'post-carousel-slidestoscroll-pre',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'post-carousel-slidestoscroll-pre',
				array(
					'type'		  => 'range',
					'label'       => __('Slides To Scroll'),
					'section'     => 'post_carousel_pre',
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
			'post-carousel-speed-pre',
				array(
				'default' => '300',
			)
		);
		$wp_customize->add_control(
			'post-carousel-speed-pre',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Speed (between slides - in milliseconds)'),
					'section'     => 'post_carousel_pre',
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
			'post-carousel-additional-settings-pre',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'post-carousel-additional-settings-pre',
			array(
				'label' => 'Additional Settings',
				'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
				'section' => 'post_carousel_pre',
				'type' => 'textarea',
			)
		);
	 
		/*****************
		SELECTIVE REFRESH
		*****************/

		$wp_customize->selective_refresh->add_partial(
			'service-section-bg-color-pre', 
			array(
				'selector' => '.service-boxes-pre',
				'container_inclusive' => false,
				'render_callback' => 'service-section-bg-color-pre',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'service-box-color-pre', 
			array(
				'selector' => '.inner-service-box-bg-pre',
				'container_inclusive' => false,
				'render_callback' => 'service-box-color-pre',
			)
		);
		for($i = 1; $i <= 4; $i++){
			$wp_customize->selective_refresh->add_partial(
				'service-box-' . $i . '-title-pre', 
				array(
					'selector' => '.service-box-' . $i . '-title-pre',
					'container_inclusive' => false,
					'render_callback' => 'service-box-' . $i . '-title-pre',
				)
			);
		}
		$wp_customize->selective_refresh->add_partial(
			'carousel-auto-play-pre', 
			array(
				'selector' => '.pre-main-content-section-bg .multiple-items-pre',
				'container_inclusive' => false,
				'render_callback' => 'carousel-auto-play-pre',
			)
		);		

} // end if advanced
	
?>