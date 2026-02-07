<?php
/* 
	pre-main-content-2.php
	Description: Settings for Top Feature Section 2 in the Wordpress Customizer
*/

if( get_theme_mod( 'basic-or-advanced' ) == 'advanced' ) {
	
		/****************
		PANELS
		****************/

		/* 1st Level */
		$wp_customize->add_panel( 
			'pre_main_2' , 
				array(
					'title'      => __( 'Top Feature Section 2', 'bonestheme' ),
					'description' => '',
					'priority'   => 40,
				)
		);

		/* 2nd Level */
		$wp_customize->add_section( 
			'service_section_bg_color_pre_2', 
				array(
					'title'      => __( 'Section Settings', 'bonestheme' ),
					'priority'   => 5,
					'panel'	     => 'pre_main_2',
				)
		);
		
		$wp_customize->add_section( 
			'service_boxes_settings_pre_2', 
				array(
					'title'      => __( 'Service Boxes Settings', 'bonestheme' ),
					'priority'   => 10,
					'panel'	     => 'pre_main_2',
				)
		);

		$wp_customize->add_section( 
			'carousel_pre_2', 
				array(
					'title'      => __( 'Carousel Settings', 'bonestheme' ),
					'priority'   => 15,
					'panel'	     => 'pre_main_2',
					'description' => 'Carousel Settings'
				)
		);
		$wp_customize->add_section(
			'post_carousel_pre_2', 
			array(
				'title'      => __( 'Post Carousel Settings', 'bonestheme' ),
				'priority'   => 15,
				'panel'	     => 'pre_main_2',
				'description' => ''
			)
		);

		/* 3rd Level */
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'service_boxes_pre_2', 
				array(
					'title'      => __( 'Service Boxes Content', 'bonestheme' ),
					'priority'   => 5,
					'section'	     => 'service_boxes_settings_pre_2',
				)) 
		);
		
		$limit = get_theme_mod('carousel-image-limit-2', 10 );
		for($i = 1; $i <= $limit; $i++){		 
			$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
				'carousel-pre-2-' . $i, 
					array(
						'title'      => __( 'Carousel ' . $i, 'bonestheme' ),
						'priority'   => 5,
						'section'	     => 'carousel_pre_2',
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
			'top-feature-header-2'  
		);
		$wp_customize->add_control(
			'top-feature-header-2',
				array(
					'type' => 'text',
					'label' => 'Section Label',
					'description' => 'Appears at top of section before content',
					'section' => 'service_section_bg_color_pre_2',
				)
		);

		/* Background Color */
		$wp_customize->add_setting(
			'service-section-bg-color-pre-2',
				array(
					'default' => '#000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-section-bg-color-pre-2',
					array(
						'label' => 'Background Color',
						'section' => 'service_section_bg_color_pre_2',
						'settings' => 'service-section-bg-color-pre-2',
					)
			)
		);
		
		/* Background Image */
		$wp_customize->add_setting( 
			'service-section-bg-image-pre-2' 
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'service-section-bg-image-pre-2',
					array(
						'label' => 'Background Image',
						'section' => 'service_section_bg_color_pre_2',
						'settings' => 'service-section-bg-image-pre-2'
					)
			)
		);	 

		/* Background Image Position */
		$wp_customize->add_setting(
			'service-section-bg-img-position-pre-2',
				array(
					'default' => 'inherit',
				)
		 );
		$wp_customize->add_control(
			'service-section-bg-img-position-pre-2', 
				array(
					'settings' => 'service-section-bg-img-position-pre-2',
					'label'   => __('Background Image Position', 'bonestheme'),
					'section' => 'service_section_bg_color_pre_2',
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
			'service-section-bg-attachment-pre-2',
				array(
					'default' => 'scroll',
				)
		 );
		$wp_customize->add_control(
			'service-section-bg-attachment-pre-2', 
				array(
					'settings' => 'service-section-bg-attachment-pre-2',
					'label'   => __('Background Image Attachment', 'bonestheme'),
					'section' => 'service_section_bg_color_pre_2',
					'type'    => 'select',
					'choices'    => array(
						'scroll' => __('Scroll (Default)', 'bonestheme'),
						'fixed' => __('Fixed', 'bonestheme'),
					),
				)
		);
		
		/* Background Image Size */
		$wp_customize->add_setting(
			'service-section-bg-img-size-pre-2',
				array(
					'default' => 'auto',
				)
		);
		$wp_customize->add_control(
			'service-section-bg-img-size-pre-2', 
				array(
					'settings' => 'service-section-bg-img-size-pre-2',
					'label'   => __('Background Image Size', 'bonestheme'),
					'section' => 'service_section_bg_color_pre_2',
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
			'service-boxes-or-carousel-pre-2',
				array(
					'default' => 'none',
				)
		); 
		$wp_customize->add_control(
			'service-boxes-or-carousel-pre-2',
				array(
					'type' => 'radio',
					'label' => 'Content Option',
					'section' => 'service_section_bg_color_pre_2',
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
			'service-section-remove-wrapper-pre-2' 
		);
		$wp_customize->add_control(
			'service-section-remove-wrapper-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Remove section wrapper (extend content full width)',
					'section' => 'service_section_bg_color_pre_2',
					'description' => '',
				)
		);

		/* Change Section Wrapper Display */
		$wp_customize->add_setting(
			'service-section-display-type-pre-2' 
		);
		$wp_customize->add_control(
			'service-section-display-type-pre-2',
				array(
					'type' => 'checkbox',
					'description' => 'This option is only applicable if \'Widgets\' is the selected Content Option. This changes the section wrapper to display:block (default is display:flex)',
					'label' => 'Change section wrapper display type',
					'section' => 'service_section_bg_color_pre_2',
				)
		);

		/* Show on Inner Pages */
		$wp_customize->add_setting(
			'show_top_on_internal_pre_2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_top_on_internal_pre_2',
				array(
					'type' => 'toggle',
					'label' => 'Display section on inner pages',
					'section' => 'service_section_bg_color_pre_2',
				)
				)
		);
		/* Show on Blog */
		$wp_customize->add_setting(
			'show_on_blog_pre_2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_on_blog_pre_2',
			array(
				'type' => 'toggle',
				'label' => 'Display section on main blog page',
				'section' => 'service_section_bg_color_pre_2',
			)
			)
		);
		
		/* Show on Blog Posts */
		$wp_customize->add_setting(
			'show_on_posts_pre_2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'show_on_posts_pre_2',
			array(
				'type' => 'toggle',
				'label' => 'Display section on single blog posts',
				'section' => 'service_section_bg_color_pre_2',
			)
			)
		);
		/* Show Only on Specific Pages */
		$wp_customize->add_setting(
			'show_only_on_page_ids_pre_2' 
		);
		$wp_customize->add_control(
			'show_only_on_page_ids_pre_2' ,
			array(
				'type' => 'text',
				'label' => '-OR-',
				'description' => 'Display section only on page IDs below (comma seperated)',
				'section' => 'service_section_bg_color_pre_2',
			)
		);
		
		/*******************************
		SERVICE BOXES SETTINGS
		********************************/
		
		/* How Many Service Boxes */
		$wp_customize->add_setting(
			'how_many_pre_2',
				array(
					'default' => '4',
				)
		); 
		$wp_customize->add_control(
			'how_many_pre_2',
				array(
					'type' => 'radio',
					'label' => 'How Many boxes?',
					'section' => 'service_boxes_settings_pre_2',
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
			'service-box-color-pre-2',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-color-pre-2',
					array(
						'label' => 'Service Box Background Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-color-pre-2',
					)
			)
		);

		/* Service Box Text Color */
		$wp_customize->add_setting(
			'service-box-text-color-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-text-color-pre-2',
					array(
						'label' => 'Service Box Text Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-text-color-pre-2',
					)
			)
		);

		/* Service Box Link Color */
		$wp_customize->add_setting(
			'service-box-link-color-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-link-color-pre-2',
					array(
						'label' => 'Service Box Link Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-link-color-pre-2',
					)
			)
		);

		/* Service Box Link Hover Color */
		$wp_customize->add_setting(
			'service-box-link-hover-color-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-link-hover-color-pre-2',
					array(
						'label' => 'Service Box Link Hover Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-link-hover-color-pre-2',
					)
			)
		);

		/* Service Box Link Text Decoration */
		$wp_customize->add_setting(
			'service-box-link-text-decoration-pre-2',
				array(
					'default' => 'underline',
				)
		 );
		$wp_customize->add_control(
			'service-box-link-text-decoration-pre-2', 
				array(
					'settings' => 'service-box-link-text-decoration-2',
					'label'   => __('Text Decoration', 'bonestheme'),
					'section' => 'service_boxes_settings_pre_2',
					'type'    => 'select',
					'choices'    => array(
						'none' => __('none', 'bonestheme'),
						'underline' => __('underline', 'bonestheme'),
					),
				)
		);

		/* Service Box Title Color */
		$wp_customize->add_setting(
			'service-box-title-color-pre-2',
				array(
					'default' => 'inherit',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-title-color-pre-2',
					array(
						'label' => 'Service Box Title Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-title-color-pre_2',
					)
			)
		);

		/* Service Box Button Background Color */
		$wp_customize->add_setting(
			'service-box-button-bg-color-picker-pre-2',
				array(
					'default' => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-bg-color-picker-pre-2',
					array(
						'label' => 'Button BG Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-button-bg-color-picker-pre-2',
					)
			)
		);

		/* Service Box Button Text Color */
		$wp_customize->add_setting(
			'service-box-button-text-color-picker-pre-2',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-text-color-picker-pre-2',
					array(
						'label' => 'Button Text Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-button-text-color-picker-pre-2',
					)
			)
		);

		/* Service Box Button Hover Background Color */
		$wp_customize->add_setting(
			'service-box-button-hover-bg-color-picker-pre-2',
				array(
					'default' => '#cccccc',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-hover-bg-color-picker-pre-2',
					array(
						'label' => 'Button Hover BG Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-button-hover-bg-color-picker-pre-2',
					)
			)
		);

		/* Service Box Button Hover Text Color */
		$wp_customize->add_setting(
			'service-box-button-hover-text-color-picker-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color_2',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'service-box-button-hover-text-color-picker-pre-2',
					array(
						'label' => 'Botton Hover Text Color',
						'section' => 'service_boxes_settings_pre_2',
						'settings' => 'service-box-button-hover-text-color-picker-pre-2',
					)
			)
		);

		/* Service Box Title Font Family */
		$wp_customize->add_setting(
			'service-box-title-font-family-pre-2',
				array(
				  'default'        => '',
			)
		);
		$wp_customize->add_control(
			'service-box-title-font-family-pre-2', 
				array(
					'settings' => 'service-box-title-font-family-pre-2',
					'label'   => __('Service Box Title Font Family', 'bonestheme'),
					'section' => 'service_boxes_settings_pre_2',
					'type'    => 'select',
					'choices'    => $fontArray,
				)
		);

		/* Service Box Title Font Weight */
		$wp_customize->add_setting(
			'service-box-title-font-weight-pre-2',
				array(
				  'default'        => 'normal',
				)
		);
		$wp_customize->add_control(
			'service-box-title-font-weight-pre-2', 
				array(
					'settings' => 'service-box-title-font-weight-pre-2',
					'label'   => __('Service Box Title Font Weight', 'bonestheme'),
					'section' => 'service_boxes_settings_pre_2',
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
			'service-box-text-font-family-pre-2',
				array(
					'default'        => '',
				)
		);
		$wp_customize->add_control(
			'service-box-text-font-family-pre-2', 
				array(
					'settings' => 'service-box-text-font-family-pre-2',
					'label'   => __('Service Box Text Font Family', 'bonestheme'),
					'section' => 'service_boxes_settings_pre_2',
					'type'    => 'select',
					'choices'    => $fontArray,
				)
		);

		/* Service Box Text Font Weight */
		$wp_customize->add_setting(
			'service-box-text-font-weight-pre-2',
				array(
					'default'        => 'normal',
				)
		);
		$wp_customize->add_control(
			'service-box-text-font-weight-pre-2',
				array(
					'settings' => 'service-box-text-font-weight-pre-2',
					'label'   => __('Service Box Text Font Weight', 'bonestheme'),
					'section' => 'service_boxes_settings_pre_2',
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
				'service-box-' . $i . '-title-pre-2',
					array(
						'default' => 'Service Title',
					)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-title-pre-2',
					array(
						'label' => 'Service Box ' . $i . ' Title',
						'section' => 'service_boxes_pre_2',
						'type' => 'text',	
					)
			);
			
			/* Service Box Content */
			$wp_customize->add_setting(
				'service-box-' . $i . '-content-pre-2',
				array(
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum diam eu nisl aliquam finibus. Aliquam vel erat at erat tempor',
				)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-content-pre-2',
				array(
					'label' => 'Service Box ' .$i . ' Content',
					'section' => 'service_boxes_pre_2',
					'type' => 'textarea',
					
				)
			);
			
			/* Service Box Button Text */
			$wp_customize->add_setting(
				'service-box-' . $i . '-button-text-pre-2',
				array(
					'default' => 'Lorem ipsum',
				)
			);
			$wp_customize->add_control(
				'service-box-' . $i . '-button-text-pre-2',
				array(
					'label' => 'Service Box ' . $i . ' Button Text',
					'section' => 'service_boxes_pre_2',
					'type' => 'text',
					
				)
			);
			
			/* Service Box Button Aria Link */
			$wp_customize->add_setting(
				'service-box-' . $i . '-aria-label-pre-2',
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'service-box-' .$i . '-aria-label-pre-2',
				array(
					'label' => 'Service Box ' . $i . ' Aria Label',
					'section' => 'service_boxes_pre_2',
					'type' => 'text',
					'input_attrs' => array(
						'placeholder' => __( 'Ex: Learn More About Web Design' ),
					)		
				)
			);

			/* Service Box Button Link */
			$wp_customize->add_setting(
				'service-box-' . $i . '-button-link-pre-2',
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'service-box-' .$i . '-button-link-pre-2',
				array(
					'label' => 'Service Box ' . $i . ' Button Link',
					'section' => 'service_boxes_pre_2',
					'type' => 'text',
					
				)
			);
		}
		

		/**********************
		CAROUSEL SETTINGS
		***********************/

		/* Carousel Image Limit */
		$wp_customize->add_setting( 
			'carousel-image-limit-2', 
				array(
				'default' => '10',	
			)
		);
		$wp_customize->add_control(
			'carousel-image-limit-2',
			array(
				'type' => 'range',
				'label'       => __('Total Number of Carousel Sections'),
				'section'     => 'carousel_pre_2',
				'settings'    => 'carousel-image-limit-2',
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
			'space-between-slides-pre-2', 
				array(
				'default' => '0',	
			) 
		);
		$wp_customize->add_control(
			'space-between-slides-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Space Between Slides (padding - in px)'),
					'section'     => 'carousel_pre_2',
					'settings'    => 'space-between-slides-pre-2',
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
			'carousel-slide-height-pre-2', 
				array(
				'default' => '',	
			) 
		);
		$wp_customize->add_control(
			'carousel-slide-height-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Carousel Image Height (in px)'),
					'section'     => 'carousel_pre_2',
					'settings'    => 'carousel-slide-height-pre-2',
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
			'carousel-auto-play-pre-2' 
		);
		$wp_customize->add_control(
			'carousel-auto-play-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Auto Play',
					'section' => 'carousel_pre_2',
					'description' => '',
				)
		);

		/* Carousel Slick Dots */
		$wp_customize->add_setting(
			'carousel-dots-pre-2' 
		);
		$wp_customize->add_control(
			'carousel-dots-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Dots',
					'section' => 'carousel_pre_2',
				)
		);

		/* Carousel Slick Infinite */
		$wp_customize->add_setting(
			'carousel-infinite-pre-2' 
		);
		$wp_customize->add_control(
			'carousel-infinite-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Infinite',
					'section' => 'carousel_pre_2',
				)
		);
		
		/* Carousel Slick Slides to Show */
		$wp_customize->add_setting( 
			'carousel-slidestoshow-pre-2', 
				array(
				'default' => '3',	
			) 
		);
		$wp_customize->add_control(
			'carousel-slidestoshow-pre-2',
				array(
					'type'		  => 'range',	
					'label'       => __('Slides To Show'),
					'section'     => 'carousel_pre_2',
					'settings'    => 'carousel-slidestoshow-pre-2',
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
			'carousel-slidestoscroll-pre-2', 
				array(
				'default' => '3',	
			) 
		);
		$wp_customize->add_control(
			'carousel-slidestoscroll-pre-2',
				array(
					'type'		  => 'range',
					'label'       => __('Slides To Scroll'),
					'section'     => 'carousel_pre_2',
					'settings'    => 'carousel-slidestoscroll-pre-2',
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
			'carousel-speed-pre-2', 
				array(
				'default' => '300',	
			) 
		);
		$wp_customize->add_control(
			'carousel-speed-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Speed (between slides - in milliseconds)'),
					'section'     => 'carousel_pre_2',
					'settings'    => 'carousel-speed-pre-2',
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
			'carousel-additional-settings-pre-2',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'carousel-additional-settings-pre-2',
			array(
				'label' => 'Additional Settings',
				'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
				'section' => 'carousel_pre_2',
				'type' => 'textarea',
			)
		);


		/**********************
		CAROUSEL IMAGE SETTINGS
		***********************/

		$limit = get_theme_mod('carousel-image-limit-2', 10 );

		for($ii = 1; $ii <= $limit; $ii++){
			
			/* Carousel Image Upload */
			$wp_customize->add_setting( 
				'carousel-img-upload-pre-2-' . $ii,
				array(
					'default' => get_template_directory_uri()."/library/images/sbb-banner.jpg"
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'carousel-img-upload-pre-2-' . $ii,
					array(
						'label' => 'Carousel Image Upload ' . $ii,
						'section' => 'carousel-pre-2-' . $ii,
						'settings' => 'carousel-img-upload-pre-2-' . $ii,
					)
				)
			);

			/* Carousel Image Alt Text */
			$wp_customize->add_setting( 
				'carousel-img-upload-pre-2-alt-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
					'carousel-img-upload-pre-2-alt-' . $ii,
					array(
						'type' => 'text',
						'label' => 'Carousel Image ' . $ii . ' Alt Text',
						'section' => 'carousel-pre-2-' . $ii,
						'settings' => 'carousel-img-upload-pre-2-alt-' . $ii,
					)
			);
			
			/* Carousel Image Title Text */
			$wp_customize->add_setting( 
				'carousel-img-upload-pre-2-title-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
				'carousel-img-upload-pre-2-title-' . $ii,
				array(
					'type' => 'text',
					'label' => 'Carousel Image ' . $ii . ' Title',
					'section' => 'carousel-pre-2-' . $ii,
					'settings' => 'carousel-img-upload-pre-2-title-' . $ii,
				)
			);
			
			/* Carousel Text */
			$wp_customize->add_setting(
				'carousel-text-pre-2-' . $ii,
				array(
					'default' => "",
				)
			);
			$wp_customize->add_control(
				'carousel-text-pre-2-' . $ii,
					array(
						'type' => 'textarea',
						'label' => 'Carousel ' . $ii . ' Text',
						'section' => 'carousel-pre-2-' . $ii,
						'settings' => 'carousel-text-pre-2-' . $ii,
					)
			);
			
			/* Carousel Display Type */
			$wp_customize->add_setting(
				'carousel-type-pre-2-' . $ii,
					array(
						'default' => 'image',
					)
			); 
			$wp_customize->add_control(
				'carousel-type-pre-2-' . $ii,
					array(
						'type' => 'radio',
						'label' => 'Display Options',
						'section' => 'carousel-pre-2-' . $ii,
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
			'post-carousel-post-type-pre-2',
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
			'post-carousel-post-type-pre-2',
				array(
					'settings' => 'post-carousel-post-type-pre-2',
					'label'   => 'Select Post Type',
					'section' => 'post_carousel_pre_2',
					'type'    => 'select',
					'choices'    => $post_types,
			)
		);
		
		/* Total Posts to Display */
		$wp_customize->add_setting(
			'post-carousel-total-posts-pre-2',
			array(
				'default' => '10',
			)
		);
		$wp_customize->add_control(
			'post-carousel-total-posts-pre-2',
			array(
				'label' => 'Total Number of Posts to Display',
				'section' => 'post_carousel_pre_2',
				'type' => 'number',
				
			)
		);
		
		/* Post Carousel Featured Image */
		$wp_customize->add_setting(
			'post-carousel-featured-display-pre-2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-featured-display-pre-2',
				array(
					'type' => 'toggle',
					'label' => 'Hide Featured Image',
					'section' => 'post_carousel_pre_2',
					'description' => '',
				)
			)
		);
		
		/* Post Carousel Excerpt */
		$wp_customize->add_setting(
			'post-carousel-excerpt-display-pre-2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-excerpt-display-pre-2',
				array(
					'type' => 'toggle',
					'label' => 'Hide Excerpt',
					'section' => 'post_carousel_pre_2',
					'description' => '',
				)
			)
		);
		
		/* Post Carousel Excerpt */
		$wp_customize->add_setting(
			'post-carousel-button-display-pre-2' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-button-display-pre-2',
				array(
					'type' => 'toggle',
					'label' => 'Hide View Button',
					'section' => 'post_carousel_pre_2',
					'description' => '',
				)
			)
		);
		
		/* Post Carousel Link Type */
		$wp_customize->add_setting(
			'post-carousel-link-display-pre-2' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-link-display-pre-2',
				array(
					'type' => 'toggle',
					'label' => 'Make Entire Section Clickable',
					'section' => 'post_carousel_pre_2',
					'description' => 'By default only the title and button are clickable, enable this to make the entire slide clickable',
				)
			)
		);
		
		/* Post Carousel Image Alignment */
		$wp_customize->add_setting(
			'post-carousel-image-pos-pre-2' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'post-carousel-image-pos-pre-2',
				array(
					'type' => 'toggle',
					'label' => 'Align Image to the Left',
					'section' => 'post_carousel_pre_2',
					'description' => '',
				)
			)
		);
		
		/* Space Between Slides */
		$wp_customize->add_setting( 
			'post-space-between-slides-pre-2', 
				array(
				'default' => '0',	
			) 
		);
		$wp_customize->add_control(
			'post-space-between-slides-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Space Between Slides (padding - in px)'),
					'section'     => 'post_carousel_pre_2',
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
			'post-carousel-slide-height-pre-2', 
				array(
				'default' => '',	
			) 
		);
		$wp_customize->add_control(
			'post-carousel-slide-height-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Carousel Image Height (in px)'),
					'section'     => 'post_carousel_pre_2',
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
			'post-carousel-button-text-pre-2',
			array(
				'default' => 'View Post',
			)
		);
		$wp_customize->add_control(
			'post-carousel-button-text-pre-2',
			array(
				'label' => 'Button Text',
				'section' => 'post_carousel_pre_2',
				'type' => 'text',
				
			)
		);

		/* Post Carousel Text Color */
		$wp_customize->add_setting(
			'post-carousel-bg-color-pre-2',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-bg-color-pre-2',
					array(
						'label' => 'Post Background Color',
						'section' => 'post_carousel_pre_2',
						'settings' => 'post-carousel-bg-color-pre-2',
					)
			)
		);
		
		/* Post Carousel Text Color */
		$wp_customize->add_setting(
			'post-carousel-text-color-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-text-color-pre-2',
					array(
						'label' => 'Post Text Color',
						'section' => 'post_carousel_pre_2',
						'settings' => 'post-carousel-text-color-pre-2',
					)
			)
		);
		
		/* Post Carousel Button Color */
		$wp_customize->add_setting(
			'post-carousel-button-color-pre-2',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-button-color-pre-2',
					array(
						'label' => 'Post Button Color',
						'section' => 'post_carousel_pre_2',
						'settings' => 'post-carousel-button-color-pre-2',
					)
			)
		);
		
		/* Post Carousel Button Text Color */
		$wp_customize->add_setting(
			'post-carousel-button-text-color-pre-2',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'post-carousel-button-text-color-pre-2',
					array(
						'label' => 'Post Button Text Color',
						'section' => 'post_carousel_pre_2',
						'settings' => 'post-carousel-button-text-color-pre-2',
					)
			)
		);


		/* Carousel Slick Autoplay */
		$wp_customize->add_setting(
			'post-carousel-auto-play-pre-2' 
		);
		$wp_customize->add_control(
			'post-carousel-auto-play-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Auto Play',
					'section' => 'post_carousel_pre_2',
					'description' => '',
				)
		);

		/* Carousel Slick Dots */
		$wp_customize->add_setting(
			'post-carousel-dots-pre-2'
		);
		$wp_customize->add_control(
			'post-carousel-dots-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Dots',
					'section' => 'post_carousel_pre_2',
				)
		);

		/* Carousel Slick Infinite */
		$wp_customize->add_setting(
			'post-carousel-infinite-pre-2'
		);
		$wp_customize->add_control(
			'post-carousel-infinite-pre-2',
				array(
					'type' => 'checkbox',
					'label' => 'Infinite',
					'section' => 'post_carousel_pre_2',
				)
		);

		/* Carousel Slick Slides to Show */
		$wp_customize->add_setting(
			'post-carousel-slidestoshow-pre-2',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'post-carousel-slidestoshow-pre-2',
				array(
					'type'		  => 'range',	
					'label'       => __('Slides To Show'),
					'section'     => 'post_carousel_pre_2',
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
			'post-carousel-slidestoscroll-pre-2',
				array(
				'default' => '3',
			)
		);
		$wp_customize->add_control(
			'post-carousel-slidestoscroll-pre-2',
				array(
					'type'		  => 'range',
					'label'       => __('Slides To Scroll'),
					'section'     => 'post_carousel_pre_2',
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
			'post-carousel-speed-pre-2',
				array(
				'default' => '300',
			)
		);
		$wp_customize->add_control(
			'post-carousel-speed-pre-2',
				array(
					'type' => 'range',
					'priority' => 10,
					'label'       => __('Speed (between slides - in milliseconds)'),
					'section'     => 'post_carousel_pre_2',
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
			'post-carousel-additional-settings-pre-2',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'post-carousel-additional-settings-pre-2',
			array(
				'label' => 'Additional Settings',
				'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
				'section' => 'post_carousel_pre_2',
				'type' => 'textarea',
			)
		);
		
		/*****************
		SELECTIVE REFRESH
		*****************/

		$wp_customize->selective_refresh->add_partial(
			'service-section-bg-color-pre-2', 
			array(
				'selector' => '.service-boxes-pre-2',
				'container_inclusive' => false,
				'render_callback' => 'service-section-bg-color-pre',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'service-box-color-pre-2', 
			array(
				'selector' => '.inner-service-box-bg-pre-2',
				'container_inclusive' => false,
				'render_callback' => 'service-box-color-pre-2',
			)
		);	
		for($i = 1; $i <= 4; $i++){	
			$wp_customize->selective_refresh->add_partial(
				'service-box-' . $i . '-title-pre-2', 
				array(
					'selector' => '.service-box-' . $i . '-title-pre-2',
					'container_inclusive' => false,
					'render_callback' => 'service-box-' . $i . '-title-pre-2',
				)
			);
		}
		$wp_customize->selective_refresh->add_partial(
			'carousel-auto-play-pre-2', 
			array(
				'selector' => '.pre-main-content-section-bg-2 .multiple-items-pre-2',
				'container_inclusive' => false,
				'render_callback' => 'carousel-auto-play-pre-2',
			)
		);

} // end if advanced
	
?>