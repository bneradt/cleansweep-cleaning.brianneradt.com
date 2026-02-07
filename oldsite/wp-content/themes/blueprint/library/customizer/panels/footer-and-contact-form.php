<?php
/* footer-and-contact-form.php
 * Descripion: Adds options for the Blueprint footer in the Wordpress Customizer
 */
 
	
	/****************
	PANELS
	****************/
	
	/* 1st Level */
	$wp_customize->add_panel( 
		'footer_and_contact_form', 
			array(
				'title'      => __( 'Footer', 'bonestheme' ),
				'description' => '',
				'priority'   => 60,
			)
	);
	
	/* 2nd Level */
	$wp_customize->add_section(
		'footer_color_picker', 
		array(
			'title'      => __( 'Footer Settings', 'bonestheme' ),
			'priority'   => 5,
			'panel'	     => 'footer_and_contact_form',
		)
	);	
	$wp_customize->add_section( 
		'blog_social_feed', 
		array(
			'title'      => __( 'Footer Nav', 'bonestheme' ),
			'priority'   => 5,
			'panel'	     => 'footer_and_contact_form',
		)
	);

	$wp_customize->add_section( 
		'bottombar_color_picker', 
		array(
			'title'      => __( 'Bottom Bar Colors', 'bonestheme' ),
			'priority'   => 5,
			'panel'	     => 'footer_and_contact_form',
		)
	);
	
	/* 3rd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'footer_bg_image', 
		array(
			'title'      => __( 'Background Image', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'footer_color_picker',
		)) 
	);


	/********************
	SETTINGS & CONTROLS
	********************/

	/***************
	Footer Settings
	***************/
	if( get_theme_mod( 'basic-or-advanced' ) == 'advanced') {
		
		/* Content Option */
		$wp_customize->add_setting(
			'footer-content-option',
				array(
					'default' => 'default',
				)
		); 
		$wp_customize->add_control(
			'footer-content-option',
				array(
					'type' => 'radio',
					'label' => 'Content Option',
					'section' => 'footer_color_picker',
					'choices' => array(
						'default' => 'Default Footer Content',
						'footer_widgets' => 'Widgets - edit in widgets panel',
					),
				)
		); 	

		/* Disable Columns */	 
		$wp_customize->add_setting(
			'default-footer-column-settings',
				array(
					'default' => 'all',
				)
		);
		$wp_customize->add_control(
			'default-footer-column-settings',
				array(
					'type' => 'radio',
					'label' => 'Default Content Column Settings',
					'section' => 'footer_color_picker',
					'choices' => array(
						'all' => 'Show All',
						'hide_form' => 'Hide Contact Us Column',
						'hide_feed' => 'Hide Navigation Column',
						'hide_contact_us' => 'Hide Business Hours Column',
					),
				)
		);
		$wp_customize->add_setting(
		   'footer-max-width'			
		);
		$wp_customize->add_control( 
		   'footer-max-width', 
		   array(
				'section' => 'footer_color_picker',
				'settings' => 'footer-max-width',
				'label'   => __('Footer Wrapper Max-Width (px)', 'bonestheme'),
				'description' => __( 'Leave blank to use main wrapper width' ),
				'type'    => 'number',
			)
		);
		
	} 	 

	/* Background Color */
	$wp_customize->add_setting(
		'footer-bg-color',
		array(
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer-bg-color',
			array(
				'label' => 'Background Color',
				'section' => 'footer_color_picker',
				'settings' => 'footer-bg-color',
			)
		)
	);

	/* Text Color */
	$wp_customize->add_setting(
		'footer-text-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer-text-color',
			array(
				'label' => 'Text Color',
				'section' => 'footer_color_picker',
				'settings' => 'footer-text-color',
			)
		)
	);

	/* Column Title Color */
	$wp_customize->add_setting(
		'footer-title-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer-title-color',
			array(
				'label' => 'Column Title Color',
				'section' => 'footer_color_picker',
				'settings' => 'footer-title-color',
			)
		)
	);

	/* Link Text Color */
	$wp_customize->add_setting(
		'footer-link-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer-link-color',
			array(
				'label' => 'Link Color',
				'section' => 'footer_color_picker',
				'settings' => 'footer-link-color',
			)
		)
	);

	/* Link Text Hover Color */
	$wp_customize->add_setting(
		'footer-link-hover-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer-link-hover-color',
			array(
				'label' => 'Link Hover Color',
				'section' => 'footer_color_picker',
				'settings' => 'footer-link-hover-color',
			)
		)
	);

	/* Link Text Decoration */
	$wp_customize->add_setting(
		'footer-link-text-decoration',
			array(
				'default' => 'none',
			)
	);
	$wp_customize->add_control(
		'footer-link-text-decoration', 
			array(
				'settings' => 'footer-link-text-decoration',
				'label'   => __('Link Text Decoration', 'bonestheme'),
				'section' => 'footer_color_picker',
				'type'    => 'select',
				'choices'    => array(
					'none' => __('none', 'bonestheme'),
					'underline' => __('underline', 'bonestheme'),
				),
			)
	);
	
	/* Column Title Font Weight*/
	$wp_customize->add_setting(
	'footer-column-title-font-weight-h4',
		array(
			'default' => 'bold',
		)
	);
	$wp_customize->add_control(
		'footer-column-title-font-weight-h4', 
			array(
				'settings' => 'footer-column-title-font-weight-h4',
				'label'   => __('Footer Column Title Font Weight', 'bonestheme'),
				'section' => 'footer_color_picker',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
				),
			)
	);
	
	$wp_customize->add_setting(
		'footer-text-font-family',
			array(
				'default' => '',
			)
	);
	$wp_customize->add_control(
		'footer-text-font-family',
			array(
			'settings' => 'footer-text-font-family',
			'label'   => __('Footer Text Font Family', 'bonestheme'),
			'section' => 'footer_color_picker',
			'type'    => 'select',
			'choices'    => $fontArray,
		)
	);

	$wp_customize->add_setting(
		'footer-text-font-weight',
			array(
				'default' => 'normal',
			)
	);
	$wp_customize->add_control(
		'footer-text-font-weight', 
			array(
				'settings' => 'footer-text-font-weight',
				'label'   => __('Footer Text Font Weight', 'bonestheme'),
				'section' => 'footer_color_picker',
				'type'    => 'select',
				'choices'    => array(
					'normal' => __('normal', 'bonestheme'),
					'bold' => __('bold', 'bonestheme'),
					'lighter' => __('lighter', 'bonestheme'),
				),
			)
	);	 

	$wp_customize->add_setting(
		'footer-column-title-font-family',
			array(
				'default' => '',
			)
	);
	$wp_customize->add_control(
		'footer-column-title-font-family', 
			array(
				'settings' => 'footer-column-title-font-family',
				'label'   => __('Footer Column Title Font Family', 'bonestheme'),
				'section' => 'footer_color_picker',
				'type'    => 'select',
				'choices'    => $fontArray,
			)
	);
	
	/***************
	Background Image
	***************/

	/* Background Image Upload */
	$wp_customize->add_setting( 
		'footer-bg-image' 
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer-bg-image',
				array(
					'label' => 'Background Image',
					'section' => 'footer_bg_image',
					'settings' => 'footer-bg-image'
				)
		)
	);	 

	/* Background Image Position */
	$wp_customize->add_setting(
		'footer-bg-img-position',
			array(
				'default' => 'inherit',
			)
	);
	$wp_customize->add_control(
		'footer-bg-img-position', 
			array(
				'settings' => 'footer-bg-img-position',
				'label'   => __('Background Image Position', 'bonestheme'),
				'section' => 'footer_bg_image',
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
		'footer-bg-attachment',
			array(
				'default' => 'scroll',
			)
	);
	$wp_customize->add_control(
		'footer-bg-attachment', 
			array(
				'settings' => 'footer-bg-attachment',
				'label'   => __('Background Image Attachment', 'bonestheme'),
				'section' => 'footer_bg_image',
				'type'    => 'select',
				'choices'    => array(
					'scroll' => __('Scroll (Default)', 'bonestheme'),
					'fixed' => __('Fixed', 'bonestheme'),
				),
			)
	);

	/* Background Image Size */
	$wp_customize->add_setting(
		'footer-bg-img-size',
			array(
				'default' => 'auto',
			)
	);
	$wp_customize->add_control(
		'footer-bg-img-size', 
			array(
				'settings' => 'footer-bg-img-size',
				'label'   => __('Background Image Size', 'bonestheme'),
				'section' => 'footer_bg_image',
				'type'    => 'select',
				'choices'    => array(
					'auto' => __('Default', 'bonestheme'),
					'cover' => __('Cover', 'bonestheme'),
					'contain' => __('Contain', 'bonestheme'),
				),
			)
	);

	/***************
	Footer Nav
	***************/

	/* Footer Nav Title */
	$wp_customize->add_setting(
		'blog-social-feed-title',
		array(
			'default' => 'Navigation',
		)
	);
	$wp_customize->add_control(
		'blog-social-feed-title',
		array(
			'label' => 'Footer Nav Title (or custom HTML block title)',
			'section' => 'blog_social_feed',
			'description' => 'Configure footer nav links under menu panel',
			'type' => 'text',
		)
	);
	/* Custom HTML Field to Replace Navigation*/
	$wp_customize->add_setting(
		'blog-social-feed',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'blog-social-feed',
		array(
			'label' => '- OR -',
			'section' => 'blog_social_feed',
			'description' => 'Custom HTML (instead of nav links if needed)',
			'type' => 'textarea',
		)
	);
	
	/***************
	Bottom Bar Colors
	***************/	
	
	/* Background Color */
	$wp_customize->add_setting(
		'bottombar-bg-color',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bottombar-bg-color',
			array(
				'label' => 'Background Color',
				'section' => 'bottombar_color_picker',
				'settings' => 'bottombar-bg-color',
			)
		)
	);

	/* Text Color */
	$wp_customize->add_setting(
		'bottombar-text-color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'bottombar-text-color',
			array(
				'label' => 'Text Color',
				'section' => 'bottombar_color_picker',
				'settings' => 'bottombar-text-color',
			)
		)
	);


	/*****************
	SELECTIVE REFRESH
	*****************/


	$wp_customize->selective_refresh->add_partial(
		'footer-bg-color', 
		array(
			'selector' => '#inner-footer',
			'container_inclusive' => false,
			'render_callback' => 'footer-bg-color',
		)
	);	
	$wp_customize->selective_refresh->add_partial(
		'contact-form-title', 
		array(
			'selector' => '.footer-1 h4',
			'container_inclusive' => false,
			'render_callback' => 'contact-form-title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blog-social-feed-title', 
		array(
			'selector' => '.footer-2 h4',
			'container_inclusive' => false,
			'render_callback' => 'blog-social-feed-title',
		)
	);




/*
 * Function: customizer_js
 * Parameters: wp_customize object
 * Returns: void
 * Customizer live preview customizations
 * includes placeholders & frontend customizations for live preview
 */
function customizer_js( $wp_customize ) {
	wp_enqueue_script(
		'themecustomizer', //Give the script an ID
		get_template_directory_uri() . '/library/customizer/panels/assets/js/theme-customizer.js', //Point to file
		array( 'jquery', 'customize-preview' ), //Define dependencies
		'', //Define a version (optional) 
		true //Put script in footer?
	);

}
//add_action( 'customize_preview_init', 'customizer_js' );
?>