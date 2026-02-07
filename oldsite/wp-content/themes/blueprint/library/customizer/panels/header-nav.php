<?php
/* 
	header-nav.php
	Descripion: Settings for Header & Navigation in the Wordpress Customizer
*/
 
$blueprintType = get_theme_mod( 'basic-or-advanced' );

	/****************
	PANELS
	****************/
	
	/* 1st Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'header_nav' , 
		array(
			'title'      => __( 'Header & Navigation', 'bonestheme' ),
			'description' => '',
			'priority'   => 30,
		)) 
	);
  	
	/* 2nd Level */
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'topbar_color_picker', 
		array(
			'title'      => __( 'Top Bar', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);
	
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'logo_nav_bg_color_picker', 
		array(
			'title'      => __( 'Logo Section', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);
	
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'nav_item_bg_color_picker', 
		array(
			'title'      => __( 'Navigation', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);
	
	/* If Shiftnav is activated*/
	if(in_array('shiftnav-responsive-mobile-menu/shiftnav-responsive-mobile-menu.php', apply_filters('active_plugins', get_option('active_plugins')))){

		$wp_customize->get_panel('shiftnav_config_togglebar')->title = __( 'ShiftNav (Mobile Menu)' );
		$wp_customize->get_panel('shiftnav_config_togglebar')->priority = __( '35' );
		$wp_customize->get_section('shiftnav_config_shiftnav-main_config')->panel = __( 'shiftnav_config_togglebar' );
		$wp_customize->get_section('shiftnav_config_shiftnav-main_config')->title = __( 'Panel Display' );
		$wp_customize->get_section('shiftnav_config_shiftnav-main_content')->panel = __( 'shiftnav_config_togglebar' );
	} 

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'logo', 
		array(
			'title'      => __( 'Logo Upload', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'nav_item_text_color_picker', 
		array(
			'title'      => __( 'Nav Item Text Color', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);		

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'nav_item_hover_bg_color_picker', 
		array(
			'title'      => __( 'Nav Item Hover Background Color', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);	

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'nav_item_hover_text_color_picker', 
		array(
			'title'      => __( 'Nav Item Hover Text Color', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);	

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'nav_item_active_bg_color_picker', 
		array(
			'title'      => __( 'Nav Item Active BG Color', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);	
		
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
		'nav_item_active_text_color_picker', 
		array(
			'title'      => __( 'Nav Item Active Text Color', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'header_nav',
		)) 
	);	


	/********************
	SETTINGS & CONTROLS
	********************/

	/* Enable Nav Over Banner */
	$wp_customize->add_setting(
		'nav-over-banner'
	);
	$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize,
		'nav-over-banner',
		array(
			'type' => 'toggle',
			'label' => 'Enable navigation overlay banner image',
			'section' => 'header_nav',
			'description' => '',
		))
	);
		
	if( $blueprintType == 'advanced') {

		/* Enable Basic Nav Layout */
		$wp_customize->add_setting(
			'basic-nav-layout'
		);
		$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize,
			'basic-nav-layout',
			array(
				'type' => 'toggle',
				'label' => 'Use Basic BP nav/logo layout (side by side) ',
				'section' => 'header_nav',
				'description' => '',
			))
		);
		
		/* Header Max-width */
		$wp_customize->add_setting(
		   'header-max-width'			
		);
		$wp_customize->add_control( 
		   'header-max-width', 
		   array(
				'section' => 'header_nav',
				'settings' => 'header-max-width',
				'label'   => __('Header Wrapper Max-Width (px)', 'bonestheme'),
				'description' => __( 'Leave blank to use main wrapper width' ),
				'type'    => 'number',
			)
		);
	}
	

	/****************
	TOP BAR
	****************/

	/* Top Bar Background Color*/
	$wp_customize->add_setting(
		'topbar-color-picker',
		array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'topbar-color-picker',
			array(
				'label' => 'Top Bar Background Color',
				'settings' => 'topbar-color-picker',
				'section' => 'topbar_color_picker',
			)
		)
	);

	/* Top Bar Text Color*/
	$wp_customize->add_setting(
		'topbar-text-color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'topbar-text-color',
			array(
				'label' => 'Top Bar Text Color',
				'settings' => 'topbar-text-color',
				'section' => 'topbar_color_picker',
			)
		)
	); 

	/* Replace Default Phone Number Content*/
	$wp_customize->add_setting(
	   'top-bar-custom-phone-text' 
	);
	$wp_customize->add_control( 
	   'top-bar-custom-phone-text', 
	   array(
			'section' => 'topbar_color_picker',
			'settings' => 'top-bar-custom-phone-text',
			'label'   => __('Replace default phone number content', 'bonestheme'),
			'type'    => 'text',
			'description' => 'Enter custom content to display instead of default',
			
		)
	);
		 
	if ( $blueprintType == 'advanced') {
		
		/* Use Widgets in Top Bar*/
		$wp_customize->add_setting(
			'top-bar-use-widgets'
		);

		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'top-bar-use-widgets',
			array(
				'type' => 'toggle',
				'label' => 'Use widgets instead of section defaults ',
				'section' => 'topbar_color_picker',
				'description' => '(edit in widgets panel)',

			))
		);
		
		/* Disable Top Bar */
		$wp_customize->add_setting(
			'disable-topbar-section' 
		);
		$wp_customize->add_control(new Customizer_Toggle_Control( $wp_customize, 
			'disable-topbar-section',
				array(
					'type' => 'toggle',
					'label' => 'Disable Top Bar Section',
					'section' => 'topbar_color_picker',
				)
			)
		);
	}
	
	/****************
	LOGO SECTION
	****************/	
	
	/* Logo Upload */
	$wp_customize->add_setting( 
		'img-upload', 
		 array(
			'default' => get_template_directory_uri()."/library/images/sbb-logo.png"
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
			'img-upload',
			array(
				'label' => 'Logo Upload',
				//'section' => 'logo',
				'settings' => 'img-upload',
				'section' => 'logo_nav_bg_color_picker',
			)
		)
	);

	/* Logo/Nav Background Color */
	$wp_customize->add_setting(
		'logo-nav-bg-color-picker',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
		
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'logo-nav-bg-color-picker',
			array(
				'label' => 'Section Background Color',
				'settings' => 'logo-nav-bg-color-picker',
				'section' => 'logo_nav_bg_color_picker',
			)
		)
	);
	
	
	if( $blueprintType == 'advanced') {
		
		/* Use Widget Instead of Default Contact Info */
		$wp_customize->add_setting(
			'header-address-setting'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'header-address-setting',
			array(
				'type' => 'toggle',
				'label' => 'Use widget instead of default contact info',
				'section' => 'logo_nav_bg_color_picker',
				'description' => '(edit in widgets panel)',

			))
		);
		
	}
	
	/****************
	NAVIGATION
	****************/

	if( $blueprintType == 'advanced') {	
	
		/* Navigation Bar Background Color */ 
		$wp_customize->add_setting(
			'nav-bg-color-picker',
			array(
				'default' => '#6e6e6e',
				'default' => '#6e6e6e',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
				'nav-bg-color-picker',
				array(
					'label' => 'Nav Bar Background Color',
					'settings' => 'nav-bg-color-picker',
					'section' => 'nav_item_bg_color_picker',
				)
			)
		);
		
	}
	
	/* Navigation Item Background Color */
	if( $blueprintType == 'basic' || $blueprintType == '' || get_theme_mod ( 'basic-nav-layout' ) ) {		 
		$wp_customize->add_setting(
			'nav-item-bg-color-picker',
			array(
				'default' => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	if ( $blueprintType == 'advanced' ) {	 
		$wp_customize->add_setting(
			'nav-item-bg-color-picker',
			array(
				'default' => '#6e6e6e',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'nav-item-bg-color-picker',
		array(
			'label' => 'Nav Item Background Color',
			'settings' => 'nav-item-bg-color-picker',
			'section' => 'nav_item_bg_color_picker',
		)
		)
	);
	 
	/* Navigation Item Text Color */
	if( $blueprintType == 'basic' || $blueprintType =='' || get_theme_mod ( 'basic-nav-layout' ) ) {	 
		$wp_customize->add_setting(
			'nav-item-text-color-picker',
			array(
				'default' => '#000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	if ( $blueprintType == 'advanced' ) {	 
		$wp_customize->add_setting(
			'nav-item-text-color-picker',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'nav-item-text-color-picker',
			array(
				'label' => 'Nav Item Text Color',
				'settings' => 'nav-item-text-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Navigation Item Hover Background Color */
	$wp_customize->add_setting(
		'nav-item-hover-bg-color-picker',
		array(
			'default' => '#444444',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'nav-item-hover-bg-color-picker',
			array(
				'label' => 'Nav Item Hover Background Color',
				'settings' => 'nav-item-hover-bg-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Navigation Item Hover Text Color */
	$wp_customize->add_setting(
		'nav-item-hover-text-color-picker',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'nav-item-hover-text-color-picker',
			array(
				'label' => 'Nav Item Hover Text Color',
				'settings' => 'nav-item-hover-text-color-picker',
				'section' => 'nav_item_bg_color_picker',
				
			)
		)
	);

	/* Navigation Item Active Background Color */
	$wp_customize->add_setting(
		'nav-item-active-bg-color-picker',
		array(
			'default' => '#444444',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'nav-item-active-bg-color-picker',
			array(
				'label' => 'Nav Item Active Background Color',
				'settings' => 'nav-item-active-bg-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Navigation Item Active Text Color */
	$wp_customize->add_setting(
		'nav-item-active-text-color-picker',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'nav-item-active-text-color-picker',
			array(
				'label' => 'Nav Item Active Text Color',
				'settings' => 'nav-item-active-text-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Sub-Menu Navigation Item Background Color */	 
	if( $blueprintType == 'basic' || $blueprintType == '' || get_theme_mod ( 'basic-nav-layout' )) {		 
		$wp_customize->add_setting(
			'sub-nav-item-bg-color-picker',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}	 
	if( $blueprintType == 'advanced' ) {		 
		$wp_customize->add_setting(
			'sub-nav-item-bg-color-picker',
			array(
				'default' => '#6e6e6e',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'sub-nav-item-bg-color-picker',
			array(
				'label' => 'Sub Nav Item Background Color',
				'settings' => 'sub-nav-item-bg-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Sub-Menu Navigation Item Text Color */	
	if( $blueprintType == 'basic' || $blueprintType == '' || get_theme_mod ( 'basic-nav-layout' )) {	 
		$wp_customize->add_setting(
			'sub-nav-item-text-color-picker',
			array(
				'default' => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	if( $blueprintType == 'advanced') {	 
		$wp_customize->add_setting(
			'sub-nav-item-text-color-picker',
			array(
				'default' => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
	}
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'sub-nav-item-text-color-picker',
			array(
				'label' => 'Sub Nav Item Text Color',
				'settings' => 'sub-nav-item-text-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Sub-Menu Navigation Item Hover Background Color */	
	$wp_customize->add_setting(
		'sub-nav-item-hover-bg-color-picker',
		array(
			'default' => '#444444',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'sub-nav-item-hover-bg-color-picker',
			array(
				'label' => 'Sub Nav Item Hover Background Color',
				'settings' => 'sub-nav-item-hover-bg-color-picker',
				'section' => 'nav_item_bg_color_picker',
			)
		)
	);

	/* Sub-Menu Navigation Item Hover Text Color */	
	$wp_customize->add_setting(
		'sub-nav-item-hover-text-color-picker',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'sub-nav-item-hover-text-color-picker',
			array(
				'label' => 'Sub Nav Item Hover Text Color',
				'settings' => 'sub-nav-item-hover-text-color-picker',
				'section' => 'nav_item_bg_color_picker',
				
			)
		)
	);
	
	/* Navigation Text Alignment */	
	$wp_customize->add_setting(
		'nav-text-align',
			array(
				'default' => 'inherit',
			)
	);
	$wp_customize->add_control(
		'nav-text-align', 
			array(
				'settings' => 'nav-text-align',
				'label'   => __('Nav Text Alignment', 'bonestheme'),
				'section' => 'nav_item_bg_color_picker',
				'type'    => 'select',
				'choices'    => array(
					'inherit' => __('Left', 'bonestheme'),
					'center' => __('Center', 'bonestheme'),
					'right' => __('Right', 'bonestheme'),
				),
			)
	);	 
		 
	/* Navigation Font Family */
	$wp_customize->add_setting(
		'nav-font-family',
			array(
			  'default'   => '',
		)
	);
	$wp_customize->add_control(
		'nav-font-family', 
			array(
				'settings' => 'nav-font-family',
				'label'   => __('Nav Font Family', 'bonestheme'),
				'section' => 'nav_item_bg_color_picker',
				'type'    => 'select',
				'choices'    => $fontArray,
		)

	);

	/* Navigation Font Weight */
	$wp_customize->add_setting(
		  'nav-font-weight',
		  array(
			  'default'        => 'normal',
		  )
	);
	$wp_customize->add_control(
		'nav-font-weight', 
			array(
				'settings' => 'nav-font-weight',
				'label'   => __('Nav Font Weight', 'bonestheme'),
				'section' => 'nav_item_bg_color_picker',
				'type'    => 'select',
				'choices'    => array(
			'normal' => __('normal', 'bonestheme'),
			'bold' => __('bold', 'bonestheme'),
			'lighter' => __('lighter', 'bonestheme'),
			),
		)
	);

	/*****************
	SELECTIVE REFRESH
	*****************/

	$wp_customize->selective_refresh->add_partial(
		'img-upload', 
		array(
			'selector' => '#logo',
			'container_inclusive' => false,
			'render_callback' => 'img-upload',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'topbar-color-picker', 
		array(
			'selector' => '.inner-top-bar',
			'container_inclusive' => false,
			'render_callback' => 'topbar_color_picker',
		)
	); 
	$wp_customize->selective_refresh->add_partial(
		'topbar-text-color', 
		array(
			'selector' => '.header-phone',
			'container_inclusive' => false,
			'render_callback' => 'topbar-text-color',
		)
	);
	
	$wp_customize->selective_refresh->add_partial(
		'logo-nav-bg-color-picker', 
		array(
			'selector' => '.logo-nav',
			'container_inclusive' => false,
			'render_callback' => 'logo-nav-bg-color-picker',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'nav-bg-color-picker', 
		array(
			'selector' => '.top-nav',
			'container_inclusive' => false,
			'render_callback' => 'nav-bg-color-picker',
		)
	);


?>