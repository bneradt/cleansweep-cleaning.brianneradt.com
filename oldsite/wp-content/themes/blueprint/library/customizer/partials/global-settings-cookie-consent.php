<?php
/* global-setting-social-media.php
 * Descripion: adds section, settings and controllers   
 * for cookie consent section
 */
 
 
 
// panels - first level
  	
// panels - second level


//sections  (final level) 

//if( get_theme_mod( 'basic-or-advanced' ) =='') {
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'cookie_consent', 
	array(
		'title'      => __( 'Cookie Consent Popup', 'bonestheme' ),
		'priority'   => 5,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

// settings & controls

/*$wp_customize->add_setting(
    'sm-color',
    array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sm-color',
        array(
            'label' => 'Header Icon Color',
            'section' => 'social_media',
            'settings' => 'sm-color',
        )
    )
);*/
$wp_customize->add_setting(
    'enable_cookie_consent',
		array(
				'default' => '1',
			)
);
$wp_customize->add_control(
    'enable_cookie_consent',
    array(
        'type' => 'checkbox',
        'label' => 'Enable Cookie Consent Popup',
        'section' => 'cookie_consent',
    )
);

$wp_customize->add_setting(
    'cookie-position',
		array(
			'default' => 'bottom',
		)
); 
$wp_customize->add_control(
    'cookie-position',
		array(
			'type' => 'radio',
			'label' => 'Position',
			'section' => 'cookie_consent',
			'choices' => array(
				'bottom' => 'Bottom',
				'top' => 'Top',
				/*'top' =>'Banner top (pushdown)',*/
				'bottom-left' => 'Floating left',
				'bottom-right' => 'Floating right',
			),
		)
);	

$wp_customize->add_setting(
    'cookie-layout',
		array(
			'default' => 'block',
		)
); 
$wp_customize->add_control(
    'cookie-layout',
		array(
			'type' => 'radio',
			'label' => 'Layout',
			'section' => 'cookie_consent',
			'choices' => array(
				'block' => 'Block',
				'classic' => 'Classic',
				'edgeless' =>'Edgeless',
				'wire' => 'Wire',
			),
		)
);	

$wp_customize->add_setting(
    'cookie-pallete-banner-bg',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'cookie-pallete-banner-bg',
        array(
            'label' => 'Banner Color',
            /*'section' => 'topbar_color_picker',*/
            'settings' => 'cookie-pallete-banner-bg',
			'section' => 'cookie_consent',
        )
    )
);

$wp_customize->add_setting(
    'cookie-pallete-banner-text',
    array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'cookie-pallete-banner-text',
        array(
            'label' => 'Banner Text Color',
            /*'section' => 'topbar_color_picker',*/
            'settings' => 'cookie-pallete-banner-text',
			'section' => 'cookie_consent',
        )
    )
);

$wp_customize->add_setting(
    'cookie-pallete-button-bg',
    array(
        'default' => '#f1d600',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'cookie-pallete-button-bg',
        array(
            'label' => 'Button Color',
            /*'section' => 'topbar_color_picker',*/
            'settings' => 'cookie-pallete-button-bg',
			'section' => 'cookie_consent',
        )
    )
);

$wp_customize->add_setting(
    'cookie-pallete-button-text',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'cookie-pallete-button-text',
        array(
            'label' => 'Button Text Color',
            /*'section' => 'topbar_color_picker',*/
            'settings' => 'cookie-pallete-button-text',
			'section' => 'cookie_consent',
        )
    )
);

$wp_customize->add_setting(
    'cookie-learn-more-link',
    array(
        'default' => '',
    )
);

$wp_customize->add_control(
    'cookie-learn-more-link',
    array(
        'label' => 'Link to privacy policy',
        'section' => 'cookie_consent',
        'type' => 'text',
		
    )
);

$wp_customize->add_setting(
    'cookie-custom-text-message',
    array(
        'default' => 'This website uses cookies to ensure you get the best experience on our website.',
    )
);

$wp_customize->add_control(
    'cookie-custom-text-message',
    array(
        'label' => 'Message',
        'section' => 'cookie_consent',
        'type' => 'textarea',
		
    )
);

$wp_customize->add_setting(
    'cookie-custom-text-button',
    array(
        'default' => 'Got it!',
    )
);

$wp_customize->add_control(
    'cookie-custom-text-button',
    array(
        'label' => 'Dismiss button text',
        'section' => 'cookie_consent',
        'type' => 'text',
		
    )
);
//selective refresh 

/*$wp_customize->selective_refresh->add_partial(
	'basic-or-advanced', 
	array(
		'selector' => 'body',
		'container_inclusive' => false,
		'render_callback' => 'basic-or-advanced'
	)
);*/


//} //end if selection is made

?>