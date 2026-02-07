<?php
/*
	homepage-service-boxes-2.php
	Description: Settings for Bottom Feature Section 2-6 in the Wordpress Customizer
*/

if( get_theme_mod( 'basic-or-advanced' ) == 'advanced') {
		
		for($b = 2; $b <= 6; $b++){
			
			/****************
			PANELS
			****************/

			/* 1st Level */
			$wp_customize->add_panel( 
				'homepage_service_boxes_' . $b, 
					array(
						'title'      => __( 'Bottom Feature Section ' . $b, 'bonestheme' ),
						'description' => '',
						'priority'   => 50,
					)
			);
			
			/* 2nd Level */
			$wp_customize->add_section( 
				'service_section_bg_color_' . $b, 
					array(
						'title'      => __( 'Section Settings', 'bonestheme' ),
						'priority'   => 5,
						'panel'	     => 'homepage_service_boxes_' . $b,
					)
			);

			$wp_customize->add_section( 
				'service_boxes_settings_' . $b, 
					array(
						'title'      => __( 'Service Boxes Settings', 'bonestheme' ),
						'priority'   => 10,
						'panel'	     => 'homepage_service_boxes_' . $b,
					)
			);
			
			$wp_customize->add_section(
				'carousel_' . $b, 
					array(
						'title'      => __( 'Carousel Settings', 'bonestheme' ),
						'priority'   => 15,
						'panel'	     => 'homepage_service_boxes_' . $b,
						'description' => 'Carousel Settings'
					)
			);
			$wp_customize->add_section( 
				'post_carousel_' . $b, 
					array(
						'title'      => __( 'Post Carousel Settings', 'bonestheme' ),
						'priority'   => 17,
						'panel'	     => 'homepage_service_boxes_' . $b,
						'description' => ''
					)
			);
			 
			$wp_customize->add_section( 
				'post_content_map_' .$b, 
					array(
						'title'      => __( 'Map Settings', 'bonestheme' ),
						'priority'   => 20,
						'panel'	 => 'homepage_service_boxes_' . $b,
						'description' => 'Find location coordinates - https://www.gps-coordinates.net',
					)
			);
			
			/* 3rd Level */
			$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
				'service_boxes_' . $b, 
					array(
						'title'      => __( 'Service Boxes Content', 'bonestheme' ),
						'priority'   => 5,
						'section'	     => 'service_boxes_settings_' . $b,
					)) 
			);
			
			$limit = get_theme_mod('carousel-image-limit-bottom-'. $b, 10 );
			for($i = 1; $i <= $limit; $i++){			 
				$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
					'carousel-' . $b . '-' . $i, 
						array(
							'title'      => __( 'Carousel ' . $i, 'bonestheme' ),
							'priority'   => 5,
							'section'	     => 'carousel_' . $b,
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
				'bottom-feature-header-' . $b   
			);
			$wp_customize->add_control(
				'bottom-feature-header-' . $b,
					array(
						'type' => 'text',
						'label' => 'Section Label',
						'description' => 'Appears at top of section before content',
						'section' => 'service_section_bg_color_' . $b,
					)
			);

			/* Background Color */
			$wp_customize->add_setting(
				'service-section-bg-color-' . $b,
					array(
						'default' => '#6e6e6e',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-section-bg-color-' . $b,
						array(
							'label' => 'Background Color',
							'section' => 'service_section_bg_color_' . $b,
							'settings' => 'service-section-bg-color-' . $b,
						)
				)
			);

			/* Background Image */
			$wp_customize->add_setting( 
				'service-section-bg-image-' . $b 
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'service-section-bg-image-' . $b,
						array(
							'label' => 'Background Image',
							'section' => 'service_section_bg_color_' . $b,
							'settings' => 'service-section-bg-image-' . $b
						)
				)
			);

			/* Background Image Position */
			$wp_customize->add_setting(
				'service-section-bg-img-position-' . $b,
					array(
						'default' => 'inherit',
					)
			);
			$wp_customize->add_control(
				'service-section-bg-img-position-' . $b, 
					array(
						'settings' => 'service-section-bg-img-position-' . $b,
						'label'   => __('Background Image Position', 'bonestheme'),
						'section' => 'service_section_bg_color_' . $b,
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
				'service-section-bg-attachment-' . $b,
					array(
						'default' => 'scroll',
					)
			);
			$wp_customize->add_control(
				'service-section-bg-attachment-' . $b, 
					array(
						'settings' => 'service-section-bg-attachment-' . $b,
						'label'   => __('Background Image Attachment', 'bonestheme'),
						'section' => 'service_section_bg_color_' . $b,
						'type'    => 'select',
						'choices'    => array(
							'scroll' => __('Scroll (Default)', 'bonestheme'),
							'fixed' => __('Fixed', 'bonestheme'),
						),
					)
			);
			
			/* Background Image Size */
			$wp_customize->add_setting(
				'service-section-bg-img-size-' . $b,
					array(
						'default' => 'auto',
					)
			);
			$wp_customize->add_control(
				'service-section-bg-img-size-' . $b, 
					array(
						'settings' => 'service-section-bg-img-size-' . $b,
						'label'   => __('Background Image Size', 'bonestheme'),
						'section' => 'service_section_bg_color_' . $b,
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
				'service-boxes-or-carousel-' . $b,
					array(
						'default' => 'none',
					)
			);
			$wp_customize->add_control(
				'service-boxes-or-carousel-' . $b,
					array(
						'type' => 'radio',
						'label' => 'Content Option',
						'section' => 'service_section_bg_color_' . $b,
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
				'service-section-remove-wrapper-' . $b 
			);
			$wp_customize->add_control(
				'service-section-remove-wrapper-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Remove section wrapper (extend content full width)',
						'section' => 'service_section_bg_color_' . $b,
						'description' => '',
					)
			);

			/* Change Section Wrapper Display */
			$wp_customize->add_setting(
				'service-section-display-type-' . $b  
			);
			$wp_customize->add_control(
				'service-section-display-type-' . $b ,
					array(
						'type' => 'checkbox',
						'description' => 'This option is only applicable if \'Widgets\' is the selected Content Option. This changes the section wrapper to display:block (default is display:flex)',
						'label' => 'Change section wrapper display type',
						'section' => 'service_section_bg_color_' . $b,
					)
			);

			/* Show on Inner Pages */
			$wp_customize->add_setting(
				'show_bottom_on_internal_' . $b 
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
				'show_bottom_on_internal_' . $b,
				array(
					'type' => 'toggle',
					'label' => 'Display section on inner pages',
					'section' => 'service_section_bg_color_' . $b,
				)
				)
			);
			
			/* Show on Blog */
			$wp_customize->add_setting(
				'show_on_blog_' . $b 
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
				'show_on_blog_' . $b,
				array(
					'type' => 'toggle',
					'label' => 'Display section on main blog page',
					'section' => 'service_section_bg_color_' . $b,
				)
				)
			);
			
			/* Show on Blog Posts */
			$wp_customize->add_setting(
				'show_on_posts_' . $b 
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
				'show_on_posts_' . $b,
				array(
					'type' => 'toggle',
					'label' => 'Display section on single blog posts',
					'section' => 'service_section_bg_color_' . $b,
				)
				)
			);
			
			/* Show Only on Specific Pages */
			$wp_customize->add_setting(
				'show_only_on_page_ids_' . $b 
			);
			$wp_customize->add_control(
				'show_only_on_page_ids_' . $b,
				array(
					'type' => 'text',
					'label' => '-OR-',
					'description' => 'Display section only on page IDs below (comma seperated)',
					'section' => 'service_section_bg_color_' . $b,
				)
			);	

			/*******************************
			SERVICE BOXES SETTINGS
			********************************/
	
			/* How Many Service Boxes */
			$wp_customize->add_setting(
				'how_many_' . $b,
					array(
						'default' => '3',
					)
			);
			$wp_customize->add_control(
				'how_many_' . $b,
					array(
						'type' => 'radio',
						'label' => 'How Many boxes?',
						'section' => 'service_boxes_settings_' . $b,
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
				'service-box-color-' . $b,
					array(
						'default' => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-color-' . $b,
						array(
							'label' => 'Service Box Background Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-color-' . $b,
						)
				)
			);

			/* Service Box Text Color */
			$wp_customize->add_setting(
				'service-box-text-color-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-text-color-' . $b,
						array(
							'label' => 'Service Box Text Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-text-color-' . $b,
						)
				)
			);

			/* Service Box Link Color */
			$wp_customize->add_setting(
				'service-box-link-color-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color_' . $b,
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-link-color-' . $b,
						array(
							'label' => 'Service Box Link Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-link-color-' . $b,
						)
				)
			);

			/* Service Box Link Hover Color */
			$wp_customize->add_setting(
				'service-box-link-hover-color-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-link-hover-color-' . $b,
						array(
							'label' => 'Service Box Link Hover Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-link-hover-color-' . $b,
						)
				)
			);

			/* Service Box Link Text Decoration */
			$wp_customize->add_setting(
				'service-box-link-text-decoration-' . $b,
					array(
						'default' => 'underline',
					)
			 );
			$wp_customize->add_control(
				'service-box-link-text-decoration-' . $b, 
					array(
						'settings' => 'service-box-link-text-decoration-' . $b,
						'label'   => __('Text Decoration', 'bonestheme'),
						'section' => 'service_boxes_settings_' . $b,
						'type'    => 'select',
						'choices'    => array(
							'none' => __('none', 'bonestheme'),
							'underline' => __('underline', 'bonestheme'),
						),
					)
			);
	 
			/* Service Box Title Color */
			$wp_customize->add_setting(
				'service-box-title-color-' . $b,
					array(
						'default' => 'inherit',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-title-color-' . $b,
						array(
							'label' => 'Service Box Title Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-title-color-' . $b,
						)
				)
			);

			/* Service Box Button Background Color */
			$wp_customize->add_setting(
				'service-box-button-bg-color-picker-' . $b,
					array(
						'default' => '#444444',
						'sanitize_callback' => 'sanitize_hex_color_' . $b,
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-button-bg-color-picker-' . $b,
						array(
							'label' => 'Button BG Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-button-bg-color-picker-' . $b,
						)
				)
			);

			/* Service Box Button Text Color */
			$wp_customize->add_setting(
				'service-box-button-text-color-picker-' . $b,
					array(
						'default' => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-button-text-color-picker-' . $b,
						array(
							'label' => 'Button Text Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-button-text-color-picker-' . $b,
						)
				)
			);

			/* Service Box Button Hover Background Color */
			$wp_customize->add_setting(
				'service-box-button-hover-bg-color-picker-' . $b,
					array(
						'default' => '#cccccc',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-button-hover-bg-color-picker-' . $b,
						array(
							'label' => 'Button Hover BG Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-button-hover-bg-color-picker-' . $b,
						)
				)
			);

			/* Service Box Button Hover Text Color */
			$wp_customize->add_setting(
				'service-box-button-hover-text-color-picker-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'service-box-button-hover-text-color-picker-' . $b,
						array(
							'label' => 'Botton Hover Text Color',
							'section' => 'service_boxes_settings_' . $b,
							'settings' => 'service-box-button-hover-text-color-picker-' . $b,
						)
				)
			);
	 
			/* Service Box Title Font Family */
			$wp_customize->add_setting(
				'service-box-title-font-family-' . $b,
					array(
					  'default'  => '',
				)
			);
			$wp_customize->add_control(
				'service-box-title-font-family-' . $b, 
					array(
						'settings' => 'service-box-title-font-family-' . $b,
						'label'   => __('Service Box Title Font Family', 'bonestheme'),
						'section' => 'service_boxes_settings_' . $b,
						'type'    => 'select',
						'choices'    => $fontArray,
					)
				
			);

			/* Service Box Title Font Weight */
			$wp_customize->add_setting(
				'service-box-title-font-weight-' . $b,
					array(
					  'default'  => 'normal',
					)
			);
			$wp_customize->add_control(
				'service-box-title-font-weight-' . $b, 
					array(
						'settings' => 'service-box-title-font-weight-' . $b,
						'label'   => __('Service Box Title Font Weight', 'bonestheme'),
						'section' => 'service_boxes_settings_' . $b,
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
				'service-box-text-font-family-' . $b,
					array(
						'default'  => '',
					)
			);
			$wp_customize->add_control(
				'service-box-text-font-family-' . $b, 
					array(
						'settings' => 'service-box-text-font-family-' . $b,
						'label'   => __('Service Box Text Font Family', 'bonestheme'),
						'section' => 'service_boxes_settings_' . $b,
						'type'    => 'select',
						'choices'    => $fontArray,
					)
			);

			/* Service Box Text Font Weight */
			$wp_customize->add_setting(
				'service-box-text-font-weight-' . $b,
					array(
						'default'        => 'normal',
					)
			);
			$wp_customize->add_control(
				'service-box-text-font-weight-' . $b, 
					array(
						'settings' => 'service-box-text-font-weight-' . $b,
						'label'   => __('Service Box Text Font Weight', 'bonestheme'),
						'section' => 'service_boxes_settings_' . $b,
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
					'service-box-' . $i . '-title-' .$b,
						array(
							'default' => 'Service Title',
						)
				);
				$wp_customize->add_control(
					'service-box-' . $i . '-title-' . $b,
						array(
							'label' => 'Service Box ' . $i . ' Title',
							'section' => 'service_boxes_' . $b,
							'type' => 'text',	
						)
				);

				/* Service Box Content */
				$wp_customize->add_setting(
					'service-box-' . $i . '-content-' . $b,
					array(
						'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor',
					)
				);
				$wp_customize->add_control(
					'service-box-' . $i . '-content-' . $b,
					array(
						'label' => 'Service Box ' .$i . ' Content',
						'section' => 'service_boxes_' . $b,
						'type' => 'textarea',
						
					)
				);

				/* Service Box Button Text */
				$wp_customize->add_setting(
					'service-box-' . $i . '-button-text-' . $b,
					array(
						'default' => 'Lorem ipsum',
					)
				);
				$wp_customize->add_control(
					'service-box-' . $i . '-button-text-' . $b,
					array(
						'label' => 'Service Box ' . $i . ' Button Text',
						'section' => 'service_boxes_' . $b,
						'type' => 'text',
						
					)
				);

				/* Service Box Button Aria Link */
				$wp_customize->add_setting(
					'service-box-' . $i . '-aria-label-' . $b,
					array(
						'default' => '',
					)
				);
				$wp_customize->add_control(
					'service-box-' . $i . '-aria-label-' .$b,
					array(
						'label' => 'Service Box ' . $i . ' Aria Label',
						'section' => 'service_boxes_' . $b,
						'type' => 'text',
						'input_attrs' => array(
							'placeholder' => __( 'Ex: Learn More About Web Design' ),
						)
						
					)
				);	

				/* Service Box Button Link */
				$wp_customize->add_setting(
					'service-box-' . $i . '-button-link-' . $b,
					array(
						'default' => '',
					)
				);
				$wp_customize->add_control(
					'service-box-' . $i . '-button-link-' .$b,
					array(
						'label' => 'Service Box ' . $i . ' Button Link',
						'section' => 'service_boxes_' . $b,
						'type' => 'text',
						
					)
				);	 
			}


			/**********************
			CAROUSEL SETTINGS
			***********************/

			/* Carousel Image Limit */
			$wp_customize->add_setting( 
				'carousel-image-limit-bottom-' . $b, 
					array(
					'default' => '10',	
				) 
			);
			$wp_customize->add_control(
				'carousel-image-limit-bottom-' . $b,
				array(
					'type' => 'range',
					'label'       => __('Total Number of Carousel Sections'),
					'section'     => 'carousel_' . $b,
					'settings'    => 'carousel-image-limit-bottom-' . $b,
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
				'space-between-slides-' . $b, 
					array(
					'default' => '0',	
				) 
			);
			$wp_customize->add_control(
				'space-between-slides-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Space Between Slides (padding - in px)'),
						'section'     => 'carousel_' . $b,
						'settings'    => 'space-between-slides-' . $b,
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
				'carousel-slide-height-' . $b, 
					array(
					'default' => '',	
				) 
			);
			$wp_customize->add_control(
				'carousel-slide-height-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Carousel Image Height (in px)'),
						'section'     => 'carousel_' . $b,
						'settings'    => 'carousel-slide-height-' . $b,
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
				'carousel-auto-play-' . $b 
			);
			$wp_customize->add_control(
				'carousel-auto-play-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Auto Play',
						'section' => 'carousel_' . $b,
						'description' => '',
					)
			);

			/* Carousel Slick Dots */
			$wp_customize->add_setting(
				'carousel-dots-' . $b 
			);
			$wp_customize->add_control(
				'carousel-dots-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Dots',
						'section' =>  'carousel_' . $b 
					)
			);

			/* Carousel Slick Infinite */
			$wp_customize->add_setting(
				'carousel-infinite-' . $b 
			);
			$wp_customize->add_control(
				'carousel-infinite-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Infinite',
						'section' => 'carousel_' . $b ,
					)
			);

			/* Carousel Slick Slides to Show */
			$wp_customize->add_setting( 
				'carousel-slidestoshow-' . $b, 
					array(
					'default' => '3',	
				) 
			);
			$wp_customize->add_control(
				'carousel-slidestoshow-' . $b,
					array(
						'type'		  => 'range',	
						'label'       => __('Slides To Show'),
						'section'     => 'carousel_' . $b,
						'settings'    => 'carousel-slidestoshow-' . $b,
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
				'carousel-slidestoscroll-' . $b, 
					array(
					'default' => '3',	
				) 
			);
			$wp_customize->add_control(
				'carousel-slidestoscroll-' . $b,
					array(
						'type'		  => 'range',
						'label'       => __('Slides To Scroll'),
						'section'     => 'carousel_' . $b,
						'settings'    => 'carousel-slidestoscroll-' . $b,
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
				'carousel-speed-' . $b, 
					array(
					'default' => '300',	
				) 
			);
			$wp_customize->add_control(
				'carousel-speed-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Speed (between slides - in milliseconds)'),
						'section'     => 'carousel_' . $b,
						'settings'    => 'carousel-speed-' . $b,
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
				'carousel-additional-settings-' . $b,
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'carousel-additional-settings-' . $b,
				array(
					'label' => 'Additional Settings',
					'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
					'section' => 'carousel_' . $b,
					'type' => 'textarea',
				)
			);
			
			
			/**********************
			CAROUSEL IMAGE SETTINGS
			***********************/

			$limit = get_theme_mod('carousel-image-limit-bottom-' . $b, 10 );
				 
			for($ii = 1; $ii <= $limit; $ii++){
				
				/* Carousel Image Upload */
				$wp_customize->add_setting( 
					'carousel-img-upload-' . $b . '-' . $ii,
					array(
						'default' => get_template_directory_uri()."/library/images/sbb-banner.jpg"
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						'carousel-img-upload-' . $b . '-' . $ii,
						array(
							'label' => 'Carousel Image Upload ' . $ii,
							'section' => 'carousel-' . $b . '-' . $ii,
							'settings' => 'carousel-img-upload-' . $b . '-' . $ii,
						)
					)
				);	 

				/* Carousel Image Alt Text */
				$wp_customize->add_setting( 
					'carousel-img-upload-alt-' . $b . '-' . $ii,
					array(
						'default' => "",
					)
				);
				$wp_customize->add_control(
						'carousel-img-upload-alt-' . $b . '-' . $ii,
						array(
							'type' => 'text',
							'label' => 'Carousel Image ' . $ii . ' Alt Text',
							'section' => 'carousel-' . $b . '-' . $ii,
							'settings' => 'carousel-img-upload-alt-' . $b . '-' . $ii,
						)
				);	

				/* Carousel Image Title Text */
				$wp_customize->add_setting( 
					'carousel-img-upload-title-' . $b . '-' . $ii,
					array(
						'default' => "",
					)
				);
				$wp_customize->add_control(
						'carousel-img-upload-title-' . $b . '-' . $ii,
						array(
							'type' => 'text',
							'label' => 'Carousel Image ' . $ii . ' Title',
							'section' => 'carousel-' . $b . '-' . $ii,
							'settings' => 'carousel-img-upload-title-' . $b . '-' . $ii,
						)
				);
				
				/* Carousel Text */
				$wp_customize->add_setting(
					'carousel-text-' . $b . '-' . $ii,
					array(
						'default' => "",
					)
				);
				$wp_customize->add_control(
					'carousel-text-' . $b . '-' . $ii,
						array(
							'type' => 'textarea',
							'label' => 'Carousel ' . $ii . ' Text',
							'section' => 'carousel-' . $b . '-' . $ii,
							'settings' => 'carousel-text-' . $b . '-' . $ii,
						)
				);
				
				/* Carousel Display Type */
				$wp_customize->add_setting(
					'carousel-type-' . $b . '-' . $ii,
						array(
							'default' => 'image',
						)
				); 
				$wp_customize->add_control(
					'carousel-type-' . $b . '-' . $ii,
						array(
							'type' => 'radio',
							'label' => 'Display Options',
							'section' => 'carousel-' . $b . '-' . $ii,
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
				'post-carousel-post-type-' . $b,
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
				'post-carousel-post-type-' . $b,
					array(
						'settings' => 'post-carousel-post-type-' . $b,
						'label'   => 'Select Post Type',
						'section' => 'post_carousel_' . $b,
						'type'    => 'select',
						'choices'    => $post_types,
				)
			);
		
			/* Total Posts to Display */
			$wp_customize->add_setting(
				'post-carousel-total-posts-' . $b,
				array(
					'default' => '10',
				)
			);
			$wp_customize->add_control(
				'post-carousel-total-posts-' . $b,
				array(
					'label' => 'Total Number of Posts to Display',
					'section' => 'post_carousel_' . $b,
					'type' => 'number',
					
				)
			);
			
			/* Post Carousel Featured Image */
			$wp_customize->add_setting(
				'post-carousel-featured-display-' . $b,
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
				'post-carousel-featured-display-' . $b,
					array(
						'type' => 'toggle',
						'label' => 'Hide Featured Image',
						'section' => 'post_carousel_' . $b,
						'description' => '',
					)
				)
			);
			
			/* Post Carousel Excerpt */
			$wp_customize->add_setting(
				'post-carousel-excerpt-display-' . $b, 
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
				'post-carousel-excerpt-display-' . $b,
					array(
						'type' => 'toggle',
						'label' => 'Hide Excerpt',
						'section' => 'post_carousel_' . $b,
						'description' => '',
					)
				)
			);
			
			/* Post Carousel Excerpt */
			$wp_customize->add_setting(
				'post-carousel-button-display-' . $b, 
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
				'post-carousel-button-display-' . $b,
					array(
						'type' => 'toggle',
						'label' => 'Hide View Button',
						'section' => 'post_carousel_' . $b,
						'description' => '',
					)
				)
			);
			
			/* Post Carousel Link Type */
			$wp_customize->add_setting(
				'post-carousel-link-display-' . $b 
			);
			$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
				'post-carousel-link-display-' . $b,
					array(
						'type' => 'toggle',
						'label' => 'Make Entire Section Clickable',
						'section' => 'post_carousel_' . $b,
						'description' => 'By default only the title and button are clickable, enable this to make the entire slide clickable',
					)
				)
			);
			
			/* Post Carousel Image Alignment */
			$wp_customize->add_setting(
				'post-carousel-image-pos-' . $b 
			);
			$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
				'post-carousel-image-pos-' . $b,
					array(
						'type' => 'toggle',
						'label' => 'Align Image to the Left',
						'section' => 'post_carousel_' . $b,
						'description' => '',
					)
				)
			);
			
			/* Space Between Slides */
			$wp_customize->add_setting( 
				'post-space-between-slides-' . $b, 
					array(
					'default' => '0',	
				) 
			);
			$wp_customize->add_control(
				'post-space-between-slides-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Space Between Slides (padding - in px)'),
						'section'     => 'post_carousel_' . $b,
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
				'post-carousel-slide-height-' . $b, 
					array(
					'default' => '',	
				) 
			);
			$wp_customize->add_control(
				'post-carousel-slide-height-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Carousel Image Height (in px)'),
						'section'     => 'post_carousel_' . $b,
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
				'post-carousel-button-text-' . $b, 
				array(
					'default' => 'View Post',
				)
			);
			$wp_customize->add_control(
				'post-carousel-button-text-' . $b,
				array(
					'label' => 'Button Text',
					'section' => 'post_carousel_' . $b,
					'type' => 'text',
					
				)
			);
			
			/* Post Carousel Text Color */
			$wp_customize->add_setting(
				'post-carousel-bg-color-' . $b,
					array(
						'default' => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post-carousel-bg-color-' . $b,
						array(
							'label' => 'Post Background Color',
							'section' => 'post_carousel_' . $b,
							'settings' => 'post-carousel-bg-color-' . $b,
						)
				)
			);
			
			/* Post Carousel Text Color */
			$wp_customize->add_setting(
				'post-carousel-text-color-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post-carousel-text-color-' . $b,
						array(
							'label' => 'Post Text Color',
							'section' => 'post_carousel_' . $b,
							'settings' => 'post-carousel-text-color-' . $b,
						)
				)
			);
			
			/* Post Carousel Button Color */
			$wp_customize->add_setting(
				'post-carousel-button-color-' . $b,
					array(
						'default' => '#000000',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post-carousel-button-color-' . $b,
						array(
							'label' => 'Post Button Color',
							'section' => 'post_carousel_' . $b,
							'settings' => 'post-carousel-button-color-' . $b,
						)
				)
			);
			
			/* Post Carousel Button Text Color */
			$wp_customize->add_setting(
				'post-carousel-button-text-color-' . $b,
					array(
						'default' => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post-carousel-button-text-color-' . $b,
						array(
							'label' => 'Post Button Text Color',
							'section' => 'post_carousel_' . $b,
							'settings' => 'post-carousel-button-text-color-' . $b,
						)
				)
			);
			
			/* Carousel Slick Autoplay */
			$wp_customize->add_setting(
				'post-carousel-auto-play-' . $b, 
			);
			$wp_customize->add_control(
				'post-carousel-auto-play-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Auto Play',
						'section' => 'post_carousel_' . $b,
						'description' => '',
					)
			);

			/* Carousel Slick Dots */
			$wp_customize->add_setting(
				'post-carousel-dots-' . $b,
			);
			$wp_customize->add_control(
				'post-carousel-dots-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Dots',
						'section' => 'post_carousel_' . $b,
					)
			);

			/* Carousel Slick Infinite */
			$wp_customize->add_setting(
				'post-carousel-infinite-' . $b,
			);
			$wp_customize->add_control(
				'post-carousel-infinite-' . $b,
					array(
						'type' => 'checkbox',
						'label' => 'Infinite',
						'section' => 'post_carousel_' . $b,
					)
			);

			/* Carousel Slick Slides to Show */
			$wp_customize->add_setting(
				'post-carousel-slidestoshow-' . $b,
					array(
					'default' => '3',
				)
			);
			$wp_customize->add_control(
				'post-carousel-slidestoshow-' . $b,
					array(
						'type'		  => 'range',	
						'label'       => __('Slides To Show'),
						'section'     => 'post_carousel_' . $b,
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
				'post-carousel-slidestoscroll-' . $b,
					array(
					'default' => '3',
				)
			);
			$wp_customize->add_control(
				'post-carousel-slidestoscroll-' . $b,
					array(
						'type'		  => 'range',
						'label'       => __('Slides To Scroll'),
						'section'     => 'post_carousel_' . $b,
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
				'post-carousel-speed-' . $b,
					array(
					'default' => '300',
				)
			);
			$wp_customize->add_control(
				'post-carousel-speed-' . $b,
					array(
						'type' => 'range',
						'priority' => 10,
						'label'       => __('Speed (between slides - in milliseconds)'),
						'section'     => 'post_carousel_' . $b,
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
				'post-carousel-additional-settings-' . $b,
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'post-carousel-additional-settings-' . $b,
				array(
					'label' => 'Additional Settings',
					'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
					'section' => 'post_carousel_' . $b,
					'type' => 'textarea',
				)
			);
		
			/***************
			MAP SETTINGS
			***************/

			/* Map Latitude */
			$wp_customize->add_setting(
				'latitude-' . $b,
					array(
						'default' => '-21.807882',
					)
			);
			$wp_customize->add_control(
				'latitude-' . $b,
					array(
						'label' => 'Latitude',
						'section' => 'post_content_map_' . $b,
						'type' => 'text',	
					)
			);

			/* Map Longitude */
			$wp_customize->add_setting(
				'longitude-' . $b,
					array(
						'default' => '134.863577',
					)
			);
			$wp_customize->add_control(
				'longitude-' . $b,
					array(
						'label' => 'Longitude',
						'section' => 'post_content_map_' . $b,
						'type' => 'text',
					)
			);

			/* Map Zoom */
			$wp_customize->add_setting(
				'zoom-' . $b,
					array(
						'default' => '5',
					)
			);
			$wp_customize->add_control(
				'zoom-' . $b,
					array(
						'label' => 'Zoom',
						'section' => 'post_content_map_' . $b,
						'type' => 'text',
					)
			);

			/* Map Minimum Height */
			$wp_customize->add_setting(
				'map-min-height-' . $b,
					array(
						'default' => '350',
					)
			);
			$wp_customize->add_control(
				'map-min-height-' . $b,
					array(
						'label' => 'Map Height (in px, enter numbers only)',
						'section' => 'post_content_map_' . $b,
						'type' => 'text',	
					)
			);

			/* Map iFrame */
			$wp_customize->add_setting(
				'map-iframe-' . $b,
					array(
						'default' => '',
					)
			);
			$wp_customize->add_control(
				'map-iframe-' . $b,
					array(
						'label' => '-OR- Google Map Iframe',
						'section' => 'post_content_map_' . $b,
						'type' => 'textarea',
						'description' => 'Use this if no API key, set width (in iframe) to 100% and height to 350px',
					)
			);			
	 


			/*****************
			SELECTIVE REFRESH
			*****************/
			
			$wp_customize->selective_refresh->add_partial(
				'service-section-bg-color-' . $b, 
				array(
					'selector' => '.service-boxes-' . $b,
					'container_inclusive' => false,
					'render_callback' => 'service-section-bg-color-' . $b,
				)
			);
				 
			$wp_customize->selective_refresh->add_partial(
				'service-box-color-' . $b, 
				array(
					'selector' => '.inner-service-box-bg-' . $b,
					'container_inclusive' => false,
					'render_callback' => 'service-box-color-' . $b,
				)
			);
			for($i = 1; $i <= 6; $i++){	
				$wp_customize->selective_refresh->add_partial(
					'service-box-' . $i . '-title-' . $b,
					array(
						'selector' => '.service-box-' . $i . '-title-' . $b,
						'container_inclusive' => false,
						'render_callback' => 'service-box-' . $i . '-title-' . $b,
					)
				);
			}
			$wp_customize->selective_refresh->add_partial(
				'carousel-auto-play-3', 
				array(
					'selector' => '.post-main-content-section-bg-3 .multiple-items-3',
					'container_inclusive' => false,
					'render_callback' => 'carousel-auto-play-3',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'carousel-auto-play-4', 
				array(
					'selector' => '.post-main-content-section-bg-4 .multiple-items-4',
					'container_inclusive' => false,
					'render_callback' => 'carousel-auto-play-4',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'carousel-auto-play-5', 
				array(
					'selector' => '.post-main-content-section-bg-5 .multiple-items-5',
					'container_inclusive' => false,
					'render_callback' => 'carousel-auto-play-5',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'carousel-auto-play-6', 
				array(
					'selector' => '.post-main-content-section-bg-6 .multiple-items-6',
					'container_inclusive' => false,
					'render_callback' => 'carousel-auto-play-6',
				)
			);
	
		} // end for loop

	
} // end if advanced
?>