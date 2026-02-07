<?php
/* 
	pre-footer-form-and-cta-settings.php
	Descripion: 
*/
 
	/****************	
	PANELS
	****************/

	/* 1st Level */
	$wp_customize->add_panel( 
		'pre_footer_form_and_cta' , 
			array(
				'title'      => __( 'Pre Footer Form & CTA', 'bonestheme' ),
				'description' => '',
				'priority'   => 50,
			)
	);

	/* 2nd Level */
	$wp_customize->add_section( 
		'pre_footer_form', 
			array(
				'title'      => __( 'Form Settings (homepage)', 'bonestheme' ),
				'priority'   => 5,
				'panel'	     => 'pre_footer_form_and_cta',
			)
	);
	$wp_customize->add_section(
		'pre_footer_cta', 
			array(
				'title'      => __( 'CTA Settings (Internal Pages)', 'bonestheme' ),
				'priority'   => 5,
				'panel'	     => 'pre_footer_form_and_cta',
			)
	);

 
	/********************
	SETTINGS & CONTROLS
	********************/	 
		
		/********************
		Form Settings (Homepage)
		********************/
		
		/* Background Image */
		$wp_customize->add_setting(
			'pre-footer-form-bg-image',
			array(
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'pre-footer-form-bg-image',
				array(
					'mime_type' => 'image',
					'label' => 'Background Image',
					'section' => 'pre_footer_form',
					'settings' => 'pre-footer-form-bg-image',
				)
			)
		);

		/* Background Color */
		$wp_customize->add_setting(
			'pre-footer-form-bg-color',
				array(
					'default' => '#fff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-form-bg-color',
					array(
						'label' => 'Form Section BG Color',
						'section' => 'pre_footer_form',
						'settings' => 'pre-footer-form-bg-color',
					)
			)
		);

		/* Gravity Form ID */
		$wp_customize->add_setting(
			'pre-footer-contact-form',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'pre-footer-contact-form',
			array(
				'label' => 'Gravity Form ID',
				'section' => 'pre_footer_form',
				'type' => 'text',
			)
		);

		/* Contact Form Title */
		$wp_customize->add_setting(
			'pre-footer-contact-form-title',
			array(
				'default' => 'WE LOOK FORWARD TO WORKING WITH YOU',
			)
		);
		$wp_customize->add_control(
			'pre-footer-contact-form-title',
			array(
				'label' => 'Contact Form Title',
				'section' => 'pre_footer_form',
				'type' => 'text',
				'settings' => 'pre-footer-contact-form-title'
			)
		);

		/* Form Title Color */
		$wp_customize->add_setting(
			'pre-footer-contact-form-title-color',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-contact-form-title-color',
					array(
						'label' => 'Form Title Color',
						'section' => 'pre_footer_form',
						'settings' => 'pre-footer-contact-form-title-color',
					)
			)
		);

		/* Form Field Background Color */
		$wp_customize->add_setting(
			'pre-footer-form-field-bg-color',
				array(
					'default' => '#ddd',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-form-field-bg-color',
					array(
						'label' => 'Form Field BG Color',
						'section' => 'pre_footer_form',
						'settings' => 'pre-footer-form-field-bg-color',
					)
			)
		);

		/* Form Field Text Color */
		$wp_customize->add_setting(
			'pre-footer-form-field-text-color',
				array(
					'default' => '#757575',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-form-field-text-color',
					array(
						'label' => 'Form Field Text Color',
						'section' => 'pre_footer_form',
						'settings' => 'pre-footer-form-field-text-color',
					)
			)
		);	

		/* Hide Form Option */
		$wp_customize->add_setting(
			'hide-homepage-form' 
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize,
			'hide-homepage-form',
				array(
					'type' => 'toggle',
					'label' => 'Hide Homepage Form',
					'section' => 'pre_footer_form',
					'description' => '',
				)
			)
		);	 	
	
		/********************
		CTA Settings (Internal Pages)
		********************/
		
		/* Background Image */
		$wp_customize->add_setting(
			'pre-footer-cta-bg-image',
			array(
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'pre-footer-cta-bg-image',
				array(
					'mime_type' => 'image',
					'label' => 'Background Image',
					'section' => 'pre_footer_cta',
					'settings' => 'pre-footer-cta-bg-image',
				)
			)
		);
		
		/* Background Color */
		$wp_customize->add_setting(
			'pre-footer-cta-section-bg-color',
				array(
					'default' => '#9e9e9e',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-cta-section-bg-color',
					array(
						'label' => 'CTA Section BG Color',
						'section' => 'pre_footer_cta',
						'settings' => 'pre-footer-cta-section-bg-color',
					)
			)
		);		

		/* CTA Title */
		$wp_customize->add_setting(
			'pre-footer-cta-title',
			array(
				'default' => 'WE LOOK FORWARD TO WORKING WITH YOU',
			)
		);
		$wp_customize->add_control(
			'pre-footer-cta-title',
			array(
				'label' => 'CTA Title',
				'section' => 'pre_footer_cta',
				'type' => 'text',
			)
		);	

		/* CTA Button Text */
		$wp_customize->add_setting(
			'pre-footer-cta-button-text',
			array(
				'default' => 'GET STARTED TODAY!',
			)
		);
		$wp_customize->add_control(
			'pre-footer-cta-button-text',
			array(
				'label' => 'CTA Button Text',
				'section' => 'pre_footer_cta',
				'type' => 'text',
			)
		);

		/* CTA Button Link */
		$wp_customize->add_setting(
			'pre-footer-cta-button-link',
			array(
				'default' => 'contact',
			)
		);
		$wp_customize->add_control(
			'pre-footer-cta-button-link',
			array(
				'label' => 'CTA Button Link',
				'section' => 'pre_footer_cta',
				'description' => 'page extension only, no slashes',
				'type' => 'text',
			)
		);	

		/* CTA Button Aria Label */
		$wp_customize->add_setting(
			'pre-footer-cta-button-aria-label',
			array(
				'default' => '',
			)
		);
		$wp_customize->add_control(
			'pre-footer-cta-button-aria-label',
			array(
				'label' => 'ARIA Label',
				'section' => 'pre_footer_cta',
				'description' => '',
				'type' => 'text',
			)
		);	

		/* CTA Button Background Color */
		$wp_customize->add_setting(
			'pre-footer-cta-button-bg-color-picker',
				array(
					'default' => '#9e9e9e',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-cta-button-bg-color-picker',
					array(
						'label' => 'CTA Button BG Color',
						'section' => 'pre_footer_cta',
						'settings' => 'pre-footer-cta-button-bg-color-picker',
					)
			)
		);

		/* CTA Button Text Color */
		$wp_customize->add_setting(
			'pre-footer-cta-button-text-color-picker',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-cta-button-text-color-picker',
					array(
						'label' => 'CTA Text Color',
						'section' => 'pre_footer_cta',
						'settings' => 'pre-footer-cta-button-text-color-picker',
					)
			)
		);

		/* CTA Button Background Hover Color */
		$wp_customize->add_setting(
			'pre-footer-cta-button-bg-color-picker-hover',
				array(
					'default' => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-cta-button-bg-color-picker-hover',
					array(
						'label' => 'CTA Button BG Hover Color',
						'section' => 'pre_footer_cta',
						'settings' => 'pre-footer-cta-button-bg-color-picker-hover',
					)
			)
		);	

		/* CTA Button Text Hover Color */
		$wp_customize->add_setting(
			'pre-footer-cta-button-text-color-picker-hover',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'pre-footer-cta-button-text-color-picker-hover',
					array(
						'label' => 'CTA Text Hover Color',
						'section' => 'pre_footer_cta',
						'settings' => 'pre-footer-cta-button-text-color-picker-hover',
					)
			)
		);			

		/* Hide CTA Option */
		$wp_customize->add_setting(
			'hide-innerpage-cta' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize,
			'hide-innerpage-cta',
				array(
					'type' => 'toggle',
					'label' => 'Hide Inner-page CTA ',
					'section' => 'pre_footer_cta',
					'description' => '',
				)
			)
		);

		/*****************
		SELECTIVE REFRESH
		*****************/
		$wp_customize->selective_refresh->add_partial(
			'pre-footer-form-bg-color', 
			array(
				'selector' => '.pre-footer-form',
				'container_inclusive' => false,
				'render_callback' => 'pre-footer-form-bg-color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'pre-footer-contact-form-title-color', 
			array(
				'selector' => '.pre-footer-form-title',
				'container_inclusive' => false,
				'render_callback' => 'pre-footer-contact-form-title-color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'pre-footer-cta-section-bg-color', 
			array(
				'selector' => '.inner-pre-footer-cta',
				'container_inclusive' => false,
				'render_callback' => 'pre-footer-cta-section-bg-color',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'pre-footer-cta-title', 
			array(
				'selector' => '.pre-footer-cta-title',
				'container_inclusive' => false,
				'render_callback' => 'pre-footer-cta-title',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'pre-footer-cta-button-text', 
			array(
				'selector' => '.pre-footer-cta-button',
				'container_inclusive' => false,
				'render_callback' => 'pre-footer-cta-button-text',
			)
		);

?>