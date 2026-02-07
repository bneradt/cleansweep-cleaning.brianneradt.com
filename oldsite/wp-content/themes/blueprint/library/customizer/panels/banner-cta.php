<?php
/* 
	banner-cta.php
	Descripion: Settings for Banner & CTA in the Wordpress Customizer
*/

$blueprintType = get_theme_mod( 'basic-or-advanced' );
$videoBannerOption = get_theme_mod( 'enable_video_banner', '' );
$sliderBannerOption = get_theme_mod( 'enable_slider', '' );

	
	/****************
	PANELS
	****************/
	
	/* 1st Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'banner_cta' , 
		array(
			'title'      => __( 'Banner & CTA', 'bonestheme' ),
			'description' => '',
			'priority'   => 35,

		))
	);
	
	if( $blueprintType == 'advanced' ) {
		$wp_customize->add_setting(
			'disable-banner-section' 
		);
		$wp_customize->add_control(
			'disable-banner-section',
				array(
					'type' => 'checkbox',
					'label' => 'Disable Banner & CTA Section',
					'section' => 'banner_cta',
				)
		);
	}
	
	/* 2nd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'static_image',
			array(
				'title'      => __( 'Static Image', 'bonestheme' ),
				'priority'   => 15,
				'section'	     => 'banner_cta',
			)
		)
	);

	if( $blueprintType == 'advanced' || $videoBannerOption == '1' || $sliderBannerOption == '1' ) {
		
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'banner_option', 
				array(
					'title'      => __( 'Banner Option', 'bonestheme' ),
					'priority'   => 5,
					'section'	     => 'banner_cta',
				)
			) 
		);
	}
	if ($blueprintType == 'advanced' || $sliderBannerOption == '1' ) {
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
			'slideshow', 
				array(
					'title'      => __( 'Slider', 'bonestheme' ),
					'priority'   => 10,
					'section'	     => 'banner_cta',
					'description' => 'Slider Settings',
				)
			) 
		);
		
		//check the Banner & CTA theme mod setting - if it hasn't been set yet, set it to slider
		if (get_theme_mod( 'slider_or_static' ) == '') {
			set_theme_mod('slider_or_static', 'slider');
		}
	} 
	if ($blueprintType == 'advanced' || $videoBannerOption == '1' ) {
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
			'video_banner', 
				array(
					'title'      => __( 'Video', 'bonestheme' ),
					'priority'   => 20,
					'section'	     => 'banner_cta',
					'description' => 'Video Banner Settings',
				)
			) 
		);
	}
	
	/* 3rd Level */		 
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'banner_image', 
			array(
				'title'      => __( 'Banner Image', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'static_image',
			)
		) 
	);	

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'cta_box_color', 
			array(
				'title'      => __( 'CTA', 'bonestheme' ),
				'priority'   => 5,
				'section'	     => 'static_image',
			)
		) 
	);
	  
	if( $blueprintType == 'advanced' || $sliderBannerOption == '1' ) {
		for($i = 1; $i <= 5; $i++){
			$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
				'slide-' . $i, 
					array(
						'title'      => __( 'Slide ' . $i, 'bonestheme' ),
						'priority'   => 5,
						'section'	     => 'slideshow',
					)) 
			);		 
		} 
	}


	/********************
	SETTINGS & CONTROLS
	********************/

	/********************
	Banner Option
	********************/
	if ( $blueprintType == 'advanced' || ( $videoBannerOption == '1' && $sliderBannerOption == '1' ) ) {
		/* Banner Option */
		$wp_customize->add_setting(
			'slider_or_static',				
		); 
		$wp_customize->add_control(
			'slider_or_static',
				array(
					'type' => 'radio',
					'label' => 'Banner Option',
					'section' => 'banner_option',
					'choices' => array(
						'slider' => 'Slider',
						'static' => 'Static Image',
						'video' => 'Video Banner'
					),
				)
		);
	} 
		if ($blueprintType != 'advanced' ) {
			if ( $videoBannerOption == '1' && $sliderBannerOption == '1' ) {
				$wp_customize->add_setting(
					'slider_or_static',				
				); 
				$wp_customize->add_control(
					'slider_or_static',
						array(
							'type' => 'radio',
							'label' => 'Banner Option',
							'section' => 'banner_option',
							'choices' => array(
								'slider' => 'Slider',
								'static' => 'Static Image',
								'video' => 'Video Banner'
							),
						)
				);
				
			} else {
				if( $videoBannerOption == '1' ){
					/* Hidden Banner Option for Basic */
					$wp_customize->add_setting(
						'slider_or_static',				
					); 
					$wp_customize->add_control(
						'slider_or_static',
							array(
								'type' => 'radio',
								'label' => 'Banner Option',
								'section' => 'banner_option',
								'choices' => array(
									'static' => 'Static Image',
									'video' => 'Video Banner'
								),
							)
					);
				} 
				if( $sliderBannerOption == '1'){
					/* Hidden Banner Option for Slider */
					$wp_customize->add_setting(
						'slider_or_static',				
					); 
					$wp_customize->add_control(
						'slider_or_static',
							array(
								'type' => 'radio',
								'label' => 'Banner Option',
								'section' => 'banner_option',
								'choices' => array(
									'static' => 'Static Image',
									'slider' => 'Slider',
								),
							)
					);
				}
			}
		}

		/********************
		Slider
		********************/
		
		/* Static CTA */
		$wp_customize->add_setting(
			'use-static-cta' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
			'use-static-cta',
				array(
					'type' => 'toggle',
					'label' => 'Static CTA',
					'description' => '(CTA settings in slide 1 will apply to all slides)',
					'section' => 'slideshow',
				)
			)
		);		 

		/* Slider Minimum Height */
		$wp_customize->add_setting( 
			'slider-min-height', 
				array(
				'default' => '300',	
			) 
		);
		$wp_customize->add_control(
			'slider-min-height',
				array(
					'type' 		  => 'range',
					'label'       => __('Slider Min Height'),
					'section'     => 'slideshow',
					'settings'    => 'slider-min-height',
					'description' => __(''),
					'input_attrs' => array(
						'min' => 100,
						'max' => 600,
						'step' => 5,
					),
				)
		);		 
		
		/* Center CTA Vertically */
		$wp_customize->add_setting(
			'static-cta-vertical-center' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'static-cta-vertical-center',
				array(
					'type' => 'toggle',
					'label' => 'Manually Position CTA',
					'description' => '(If enabled, this will enable the vertical positioning selection below)',
					'section' => 'slideshow',
				)
			)
		);	 
	 
		/* CTA Vertical Positioning */
		$wp_customize->add_setting( 
			'static-cta-margin-top', 
				array(
				'default' => '40',	
			) 
		);
		$wp_customize->add_control(
			'static-cta-margin-top',
				array(
					'type' 		  => 'range',
					'label'       => __('CTA Vertical Positioning'),
					'section'     => 'slideshow',
					'settings'    => 'static-cta-margin-top',
					'description' => __(''),
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
				)
		);	
		
		/* CTA Horizontal Positioning */
		$wp_customize->add_setting(
			'static-cta-horizontal-position' 
		);
		$wp_customize->add_control(
			'static-cta-horizontal-position',
				array(
					'type' => 'radio',
					'label' => 'CTA Horizontal Positioning',
					'section' => 'slideshow',
					'choices' => array(
						'' => 'Center (Default)',
						'left' => 'Left',
						'right' => 'Right',
					),
				)
		);
		/* Slider Auto Play */
		$wp_customize->add_setting(
			'slider-auto-play' 
		);
		$wp_customize->add_control(
			'slider-auto-play',
				array(
					'type' => 'checkbox',
					'label' => 'Auto Play',
					'section' => 'slideshow',
					'description' => '',
				)
		);
		
		/* Slider Arrows */ 
		$wp_customize->add_setting(
			'slider-arrows',
			array(
				'default' => '1',	
			) 
		);
		$wp_customize->add_control(
			'slider-arrows',
				array(
					'type' => 'checkbox',
					'label' => 'Arrows',
					'section' => 'slideshow',
				)
		);

		/* Slider Dots */ 
		$wp_customize->add_setting(
			'slider-dots' 
		);
		$wp_customize->add_control(
			'slider-dots',
				array(
					'type' => 'checkbox',
					'label' => 'Dots',
					'section' => 'slideshow',
				)
		);

		/* Slider Infinite */ 
		$wp_customize->add_setting(
			'slider-infinite' 
		);
		$wp_customize->add_control(
			'slider-infinite',
				array(
					'type' => 'checkbox',
					'label' => 'Infinite',
					'section' => 'slideshow',
				)
		);

		/* Slider Speed */ 
		$wp_customize->add_setting( 
			'slider-speed', 
				array(
				'default' => '300',	
			) 
		);
		$wp_customize->add_control(
			'slider-speed',
				array(
					'type' 		  => 'range',
					'label'       => __('Speed (between slides)'),
					'section'     => 'slideshow',
					'settings'    => 'slider-speed',
					'description' => __(''),
					'input_attrs' => array(
						'min' => 100,
						'max' => 900,
						'step' => 100,
					),
				)
		);	
		
		/* Slider Additional Settings */ 
		$wp_customize->add_setting(
			'slider-additional-settings',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'slider-additional-settings',
			array(
				'label' => 'Additional Settings',
				'description' => 'example - centerMode: true,variableWidth: true<br>For all settings see http://kenwheeler.github.io/slick/',
				'section' => 'slideshow',
				'type' => 'textarea',
			)
		);	
		
		/********************
		Slides 
		********************/
		for($i = 1; $i <= 5; $i++){
			
			/* Show Slide */
			$wp_customize->add_setting(
				'show_slide-' . $i,
				array(
					'default' => true,
				)
			);
			$wp_customize->add_control(
				'show_slide-' . $i,
				array(
					'type' => 'checkbox',
					'label' => 'Show Slide',
					'section' => 'slide-' . $i,
				)
			);

			/* Slider Image Upload - Desktop */
			$wp_customize->add_setting( 
				'slider-img-upload-' . $i,
				array(
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'slider-img-upload-' . $i,
					array(
						'mime_type' => 'image',
						'label' => 'Banner Image Upload ' . $i,
						'section' => 'slide-' . $i,
						'settings' => 'slider-img-upload-' . $i,
					)
				)
			);
			
			/* Slider Image Upload - Mobile */	
			$wp_customize->add_setting( 
				'slider-mobile-img-upload-' . $i,
				array(
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'slider-mobile-img-upload-' . $i,
					array(
						'mime_type' => 'image',
						'label' => 'Mobile Banner Image Upload ' . $i,
						'section' => 'slide-' . $i,
						'settings' => 'slider-mobile-img-upload-' . $i,
						'description' => 'The full-size image will auto-crop for small screen devices (below 481px) if you don\'t like the way the image crops you can manually set an image here - (Maximum Width of 480px Recommended)'
					)
				)
			);

			/* Slide CTA Background Color */
			$wp_customize->add_setting(
				'cta-box-color-' . $i,
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-box-color-' . $i,
					array(
						'label' => 'CTA Background Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-box-color-' . $i,
					)
				)
			);

			/* Slide CTA Background Opacity */
			$wp_customize->add_setting( 
				'cta-opacity-' . $i,
					array(
					'default' => '.5',
				) 
			);
			$wp_customize->add_control( 
				'cta-opacity-' . $i,
					array(
						'type' => 'range',
						'priority' => 10,
						'section' => 'slide-' . $i,
						'label' => __( 'CTA Background Opacity' ),
						'description' => '',
						'input_attrs' => array(
							'min' => 0,
							'max' => 1,
							'step' => .1,
							'class' => 'example-class',
							'style' => 'color: #0085ba',
						),
					)
			);	 

			/* Slide CTA Text Color */
			$wp_customize->add_setting(
				'cta-text-color-' . $i,
					array(
						'default' => '#ffffff',
						'sanitize_callback' => 'sanitize_hex_color',
					)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-text-color-' . $i,
					array(
						'label' => 'Text Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-text-color-' . $i,
					)
				)
			);
			
			/* Slide CTA Button Text Color */
			$wp_customize->add_setting(
				'cta-button-text-color-picker-' . $i,
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-button-text-color-picker-' . $i,
					array(
						'label' => 'Button Text Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-button-text-color-picker-' . $i,
					)
				)
			);
			
			/* Slide CTA Button Hover Text Color */
			$wp_customize->add_setting(
				'cta-button-hover-text-color-picker-' . $i,
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-button-hover-text-color-picker-' . $i,
					array(
						'label' => 'Botton Hover Text Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-button-hover-text-color-picker-' . $i,
					)
				)
			);

			/* Slide CTA Button Background Color */
			$wp_customize->add_setting(
				'cta-button-bg-color-picker-' . $i,
				array(
					'default' => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-button-bg-color-picker-' . $i,
					array(
						'label' => 'Button BG Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-button-bg-color-picker-' . $i,
					)
				)
			);	

			/* Slide CTA Button Hover Background Color */
			$wp_customize->add_setting(
				'cta-button-hover-bg-color-picker-' . $i,
				array(
					'default' => '#cccccc',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'cta-button-hover-bg-color-picker-' . $i,
					array(
						'label' => 'Button Hover BG Color',
						'section' => 'slide-' . $i,
						'settings' => 'cta-button-hover-bg-color-picker-' . $i,
					)
				)
			);
			
			/* Slide CTA Title */
			$wp_customize->add_setting(
				'cta-title-' . $i,
				array(
					'default' => 'Featured Information Area',
				)
			);
			$wp_customize->add_control(
				'cta-title-' . $i,
				array(
					'label' => 'CTA Title',
					'section' => 'slide-' . $i,
					'type' => 'text',
					
				)
			);
			
			/* Slide CTA Title Font Family*/
			$wp_customize->add_setting(
				'cta-title-font-family-' . $i,
					array(
					  'default'        => '',
					)
			);
			$wp_customize->add_control(
				'cta-title-font-family-' . $i,
					array(
						'settings' => 'cta-title-font-family-' . $i,
						'label'   => __('CTA Title Font Family', 'bonestheme'),
						'section' => 'slide-' . $i,
						'type'    => 'select',
						'choices'    => $fontArray,
					)
			);
			
			/* Slide CTA Title Font Weight*/
			$wp_customize->add_setting(
				'cta-title-font-weight-' . $i,
					array(
						'default'        => 'normal',
					)
			);
			$wp_customize->add_control(
				'cta-title-font-weight-' . $i,
					array(
						'settings' => 'cta-title-font-weight-' . $i,
						'label'   => __('CTA Title Font Weight', 'bonestheme'),
						'section' => 'slide-' . $i,
						'type'    => 'select',
						'choices'    => array(
							'normal' => __('Normal', 'bonestheme'),
							'bold' => __('Bold', 'bonestheme'),
							'lighter' => __('Lighter', 'bonestheme'),
							),
					)
			);

			/* Slide CTA Content */
			$wp_customize->add_setting(
				'cta-content-' . $i,
					array(
						'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit<br />
				amet tellus imperdiet, fermentum quam id, tincidunt metus.',
				)
			);
			$wp_customize->add_control(
				'cta-content-' . $i,
				array(
					'label' => 'CTA Content',
					'section' => 'slide-' . $i,
					'type' => 'textarea',
					
				)
			);

			/* Slide CTA Text Font Family */
			$wp_customize->add_setting(
				'cta-text-font-family-' . $i,
					array(
						'default'        => '',
					)
			);
			$wp_customize->add_control(
				'cta-text-font-family-' . $i,
					array(
						'settings' => 'cta-text-font-family-' . $i,
						'label'   => __('CTA Content Font Family', 'bonestheme'),
						'section' => 'slide-' . $i,
						'type'    => 'select',
						'choices'    => $fontArray,
				)
			);
			
			/* Slide CTA Text Font Weight */
			$wp_customize->add_setting(
				'cta-text-font-weight-' . $i,
					  array(
						  'default'  => 'normal',
					  )
			);
			$wp_customize->add_control(
				'cta-text-font-weight-' . $i,
					array(
						'settings' => 'cta-text-font-weight-' . $i,
						'label'   => __('CTA Content Font Weight', 'bonestheme'),
						'section' => 'slide-' . $i,
						'type'    => 'select',
						'choices'    => array(
							'normal' => __('normal', 'bonestheme'),
							'bold' => __('bold', 'bonestheme'),
							'lighter' => __('lighter', 'bonestheme'),
							),
					)
			);
			
			/* Slide CTA Button Text */
			$wp_customize->add_setting(
				'cta-button-text-' . $i,
				array(
					'default' => 'Learn More',
				)
			);
			$wp_customize->add_control(
				'cta-button-text-' . $i,
				array(
					'label' => 'CTA Button Text',
					'section' => 'slide-' . $i,
					'type' => 'text',
					
				)
			);

			/* Slide CTA Button Aria Label */
			$wp_customize->add_setting(
				'cta-button-aria-label-' . $i,
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'cta-button-aria-label-' . $i,
				array(
					'label' => 'CTA Button Aria Label ' . $i,
					'section' => 'slide-' . $i,
					'type' => 'text',
					'input_attrs' => array(
						'placeholder' => __( 'Ex: Learn More About Web Design'),
					)
					
				)
			);

			/* Slide CTA Button Target URL */
			$wp_customize->add_setting(
				'cta-button-target-url-' . $i,
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'cta-button-target-url-' . $i,
				array(
					'label' => 'CTA Button Target URL ' . $i,
					'section' => 'slide-' . $i,
					'type' => 'text',
					
				)
			);
			
			/* Link New Tab */
			$wp_customize->add_setting(
				'cta_link_new_tab-' . $i
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
				'cta_link_new_tab-' . $i,
				array(
					'type' => 'toggle',
					'label' => 'Open Link in New Tab',
					'section' =>  'slide-' . $i
				)
				)
			);	
			
			/* Hide CTA */
			$wp_customize->add_setting(
				'hide_cta-' . $i
			);
			$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
				'hide_cta-' . $i,
				array(
					'type' => 'toggle',
					'label' => 'Hide CTA (do not display)',
					'section' => 'slide-' . $i,
				)
				)
			);
		}

		/********************
		Static Image - Banner Image
		********************/
		
		/* Banner Image Upload - Desktop*/
		$wp_customize->add_setting(
			'banner-img-upload',
			array(
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'banner-img-upload',
				array(
					'mime_type' => 'image',
					'label' => 'Banner Image Upload',
					'section' => 'banner_image',
					'settings' => 'banner-img-upload',
				)
			 )
		);
		
		/* Banner Image Upload - Mobile */
		$wp_customize->add_setting(
			'banner-img-mobile-upload',
			array(
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'banner-img-mobile-upload',
				array(
					'mime_type' => 'image',
					'label' => 'Mobile Banner Image Upload',
					'section' => 'banner_image',
					'settings' => 'banner-img-mobile-upload',
					'description' => 'The full-size image will auto-crop for small screen devices (below 481px) if you don\'t like the way the image crops you can manually set an image here - (Maximum Width of 480px Recommended)',
				)
			)
		);

		/* Banner Image Position */
		$wp_customize->add_setting(
			'banner-img-behavior',
				array(
					'default' => 'inherit',
				)
		 );
		$wp_customize->add_control(
			'banner-img-behavior', 
				array(
					'settings' => 'banner-img-behavior',
					'label'   => __('Banner Image Position', 'bonestheme'),
					'section' => 'banner_image',
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
		
		/* Banner Image Attachment */
		$wp_customize->add_setting(
			'banner-bg-attachment',
				array(
					'default' => 'scroll',
				)
		);
		$wp_customize->add_control(
			'banner-bg-attachment', 
				array(
					'settings' => 'banner-bg-attachment',
					'label'   => __('Banner Background Attachment', 'bonestheme'),
					'section' => 'banner_image',
					'type'    => 'select',
					'choices'    => array(
						'scroll' => __('Scroll (Default)', 'bonestheme'),
						'fixed' => __('Fixed', 'bonestheme'),
					),
				)
		);	 	 
		
		/* Banner Image Size */
		$wp_customize->add_setting(
			'banner-bg-size',
				array(
					'default' => 'auto',
				)
		);
		$wp_customize->add_control(
			'banner-bg-size', 
				array(
					'settings' => 'banner-bg-size',
					'label'   => __('Banner Background Size', 'bonestheme'),
					'section' => 'banner_image',
					'type'    => 'select',
					'choices'    => array(
						'auto' => __('Default', 'bonestheme'),
						'cover' => __('Cover', 'bonestheme'),
						'contain' => __('Contain', 'bonestheme'),
					),
				)
		);

		/* Banner Image Height */
		$wp_customize->add_setting( 
			'banner-height', 
				array(
				'default' => '200',	
			) 
		);
		$wp_customize->add_control(
			   'banner-height',
				array(
					'type' 		  => 'range',
					'label'       => __('Banner Height'),
					'section'     => 'banner_image',
					'settings'    => 'banner-height',
					'description' => __(''),
					'input_attrs' => array(
						'min' => 100,
						'max' => 600,
						'step' => 5,
					),
				)
		);	

		/* Hide Banner on Inner Pages */
		$wp_customize->add_setting(
			'hide_banner_inner' 
		);
		$wp_customize->add_control(
			'hide_banner_inner',
			array(
				'type' => 'checkbox',
				'label' => 'Hide banner on inner pages (do not display)',
				'description' => 'Do not hide if you want to use the banner as a featured image fallback on internal pages',
				'section' => 'banner_image',
			)
		);

		/********************
		Static Image - CTA
		********************/

		/* Center CTA Vertically */
		$wp_customize->add_setting(
			'banner-cta-vertical-center' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'banner-cta-vertical-center',
				array(
					'type' => 'toggle',
					'label' => 'Manually Position CTA',
					'description' => '(If enabled, this will enable the vertical positioning selection below)',
					'section' => 'cta_box_color',
				)
			)
		);
		
		/* CTA Vertical Positioning */
		$wp_customize->add_setting( 
			'banner-cta-bottom-positioning', 
				array(
				'default' => '0',	
			) 
		);
		$wp_customize->add_control(
			'banner-cta-bottom-positioning',
				array(
					'type' 		  => 'range',
					'label'       => __('CTA Vertical Positioning'),
					'section'     => 'cta_box_color',
					'settings'    => 'banner-cta-bottom-positioning',
					'description' => __(''),
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
				)
		);
		
		/* CTA Horizontal Positioning */
		$wp_customize->add_setting(
			'banner-cta-horizontal-position' 
		);
		$wp_customize->add_control(
			'banner-cta-horizontal-position',
				array(
					'type' => 'radio',
					'label' => 'CTA Horizontal Positioning',
					'section' => 'cta_box_color',
					'choices' => array(
						'' => 'Center (Default)',
						'left' => 'Left',
						'right' => 'Right',
					),
				)
		);

		
		/* CTA Background Color */
		$wp_customize->add_setting(
			'cta-box-color',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-box-color',
				array(
					'label' => 'CTA Background Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-box-color',
				)
			)
		);
		
		/* CTA Background Opacity */
		$wp_customize->add_setting( 
			'cta-opacity', 
				array(
				'default' => '.7',
			) 
		);
		$wp_customize->add_control( 
			'cta-opacity', 
				array(
					'type' => 'range',
					'priority' => 10,
					'section' => 'cta_box_color',
					'label' => __( 'CTA Background Opacity' ),
					'description' => '',
					'input_attrs' => array(
						'min' => 0,
						'max' => 1,
						'step' => .1,
						'class' => 'example-class',
						'style' => 'color: #0085ba',
					),
				)
		);	 

		/* CTA Text Color */
		$wp_customize->add_setting(
			'cta-text-color',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-text-color',
				array(
					'label' => 'Text Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-text-color',
				)
			)
		);

		/* CTA Button Text Color */
		$wp_customize->add_setting(
			'cta-button-text-color-picker',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-button-text-color-picker',
				array(
					'label' => 'Button Text Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-button-text-color-picker',
				)
			)
		);
		
		/* CTA Button Hover Text Color */
		$wp_customize->add_setting(
			'cta-button-hover-text-color-picker',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-button-hover-text-color-picker',
				array(
					'label' => 'Botton Hover Text Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-button-hover-text-color-picker',
				)
			)
		);
		
		/* CTA Button Background Color */
		$wp_customize->add_setting(
			'cta-button-bg-color-picker',
			array(
				'default' => '#444444',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-button-bg-color-picker',
				array(
					'label' => 'Button BG Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-button-bg-color-picker',
				)
			)
		);

		/* CTA Button Hover Background Color */
		$wp_customize->add_setting(
			'cta-button-hover-bg-color-picker',
			array(
				'default' => '#cccccc',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'cta-button-hover-bg-color-picker',
				array(
					'label' => 'Button Hover BG Color',
					'section' => 'cta_box_color',
					'settings' => 'cta-button-hover-bg-color-picker',
				)
			)
		);

		/* CTA Title */
		$wp_customize->add_setting(
			'cta-title',
			array(
				'default' => 'Featured Information Area',
			)
		);
		$wp_customize->add_control(
			'cta-title',
			array(
				'label' => 'CTA Title',
				'section' => 'cta_box_color',
				'type' => 'text',
				
			)
		);
		
		/* CTA Title Font Family */ 
		$wp_customize->add_setting(
			'cta-title-font-family',
				array(
				  'default'  => '',
				)
		);
		$wp_customize->add_control(
			'cta-title-font-family', 
				array(
					'settings' => 'cta-title-font-family',
					'label'   => __('CTA Title Font Family', 'bonestheme'),
					'section' => 'cta_box_color',
					'type'    => 'select',
					'choices'    => $fontArray,
				)

		);

		/* CTA Title Font Weight */
		$wp_customize->add_setting(
			'cta-title-font-weight',
				array(
					'default'        => 'normal',
				)
		);
		$wp_customize->add_control(
			'cta-title-font-weight', 
				array(
					'settings' => 'cta-title-font-weight',
					'label'   => __('CTA Title Font Weight', 'bonestheme'),
					'section' => 'cta_box_color',
					'type'    => 'select',
					'choices'    => array(
						'normal' => __('Normal', 'bonestheme'),
						'bold' => __('Bold', 'bonestheme'),
						'lighter' => __('Lighter', 'bonestheme'),
						),
				)
		);
		
		/* CTA Content */
		$wp_customize->add_setting(
			'cta-content',
				array(
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit<br />
			amet tellus imperdiet, fermentum quam id, tincidunt metus.',
			)
		);
		$wp_customize->add_control(
			'cta-content',
			array(
				'label' => 'CTA Content',
				'section' => 'cta_box_color',
				'type' => 'textarea',
				
			)
		);	 

		/* CTA Content Font Family*/
		$wp_customize->add_setting(
			'cta-text-font-family',
				array(
					'default'        => '',
				)
		);
		$wp_customize->add_control(
			'cta-text-font-family', 
				array(
					'settings' => 'cta-text-font-family',
					'label'   => __('CTA Content Font Family', 'bonestheme'),
					'section' => 'cta_box_color',
					'type'    => 'select',
					'choices'    => $fontArray,
			)
		);
		
		/* CTA Content Font Weight*/
		$wp_customize->add_setting(
			'cta-text-font-weight',
				  array(
					  'default'        => 'normal',
				  )
		);
		$wp_customize->add_control(
			'cta-text-font-weight', 
				array(
					'settings' => 'cta-text-font-weight',
					'label'   => __('CTA Content Font Weight', 'bonestheme'),
					'section' => 'cta_box_color',
					'type'    => 'select',
					'choices'    => array(
						'normal' => __('normal', 'bonestheme'),
						'bold' => __('bold', 'bonestheme'),
						'lighter' => __('lighter', 'bonestheme'),
						),
				)
		);
		
		/* CTA Button Text */
		$wp_customize->add_setting(
			'cta-button-text',
			array(
				'default' => 'Learn More',
			)
		);
		$wp_customize->add_control(
			'cta-button-text',
			array(
				'label' => 'CTA Button Text',
				'section' => 'cta_box_color',
				'type' => 'text',
				
			)
		);

		/* CTA Button URL */
		$wp_customize->add_setting(
			'cta-button-target-url',
			array(
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'cta-button-target-url',
			array(
				'label' => 'CTA Button Target URL',
				'section' => 'cta_box_color',
				'type' => 'text',
			)
		);
		
		/* Link New Tab */
		$wp_customize->add_setting(
			'cta_link_new_tab'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'cta_link_new_tab',
			array(
				'type' => 'toggle',
				'label' => 'Open Link in New Tab',
				'section' => 'cta_box_color',
			)
			)
		);	
	 
		/* Hide CTA */
		$wp_customize->add_setting(
			'hide_cta'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'hide_cta',
			array(
				'type' => 'toggle',
				'label' => 'Hide CTA (do not display)',
				'section' => 'cta_box_color',
			)
			)
		);	 
		
		/*****************
		VIDEO BANNER
		*****************/
			/* Uploaded Video (Media Gallery)*/
			$wp_customize->add_setting(
				'video-banner-upload',
				array(
					'sanitize_callback' => 'absint'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'video-banner-upload',
					array(
						'mime_type' => 'video',
						'label' => 'Banner Video Upload',
						'section' => 'video_banner',
						'settings' => 'video-banner-upload',
					)
				 )
			);
			
			/* Video HTML */ 
			$wp_customize->add_setting(
				'video-banner-html',
				array(
					'default' => '',
				)
			);
			$wp_customize->add_control(
				'video-banner-html',
				array(
					'label' => 'Video HTML',
					'description' => 'Insert Video iFrame Here',
					'section' => 'video_banner',
					'type' => 'textarea',
				)
			);	
			/* Video Aspect Ratio */
			$wp_customize->add_setting(
				'video-aspect-ratio',array(
					'default' => '56.25',
				)			
			); 
			$wp_customize->add_control(
				'video-aspect-ratio',
					array(
						'type' => 'radio',
						'label' => 'Video Aspect Ratio',
						'section' => 'video_banner',
						'choices' => array(
							'56.25' => '16:9 Aspect Ratio',
							'75' => '4:3 Aspect Ratio',	
							'66.66' => '3:2 Aspect Ratio',
							'62.5' => '8:5 Aspect Ratio',
							'100' => '1:1 Aspect Ratio',
						),
					)
			);
			
			/* Video Minimum Height */
			$wp_customize->add_setting( 
				'video-banner-height', 
					array(
					'default' => '',	
				) 
			);
			$wp_customize->add_control(
				'video-banner-height',
					array(
						'type' 		  => 'number',
						'label'       => __('Maximum Video Height'),
						'section'     => 'video_banner',
						'settings'    => 'video-banner-height',
						'description' => __('Set number below in pixels if you would like to set the videos maximum height'),
						
					)
			);
		
		/*****************
		SELECTIVE REFRESH
		*****************/
		
		$wp_customize->selective_refresh->add_partial(
			'banner-img-upload', 
			array(
				'selector' => '.banner-cta',
				'container_inclusive' => false,
				'render_callback' => 'banner-img-upload',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'cta-box-color', 
			array(
				'selector' => '.cta-bg',
				'container_inclusive' => false,
				'render_callback' => 'cta-box-color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'cta-title', 
			array(
				'selector' => '.cta-bg .title',
				'container_inclusive' => false,
				'render_callback' => 'cta-title',
			)
		);

		for($i = 1; $i <=5; $i++){
			$wp_customize->selective_refresh->add_partial(
				'slider-img-upload-' . $i, 
				array(
					'selector' => '.slider-cta-' . $i,
					'container_inclusive' => false,
					'render_callback' => 'slider-img-upload-' . $i,
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'cta-box-color-' . $i, 
				array(
					'selector' => '.cta-bg-' . $i,
					'container_inclusive' => false,
					'render_callback' => 'cta-box-color-' . $i,
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'cta-title-' . $i, 
				array(
					'selector' => '.shared-cta-bg .title-' . $i,
					'container_inclusive' => false,
					'render_callback' => 'cta-title-' . $i,
				)
			);	 
		} 
	

?>