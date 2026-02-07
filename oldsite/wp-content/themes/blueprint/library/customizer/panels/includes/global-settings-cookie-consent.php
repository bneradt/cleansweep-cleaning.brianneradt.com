<?php
/* 
	global-setting-cookie-consent.php
	Description: Adds cookie consent options to Global settings panel in Wordpress customizer
*/

/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'cookie_consent', 
	array(
		'title'      => __( 'Cookie Consent Popup', 'bonestheme' ),
		'priority'   => 5,
		'section'	     => 'global_settings',
		'description' => '',
	))
);


/********************
SETTINGS & CONTROLS
********************/

/* Enable Cookie Consent Popup */
$wp_customize->add_setting(
    'enable_cookie_consent',
		array(
				'default' => '1',
			)
);
$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
    'enable_cookie_consent',
    array(
        'type' => 'toggle',
        'label' => 'Enable Cookie Consent Popup',
        'section' => 'cookie_consent',
    )
	)
);

/* Cookie Consent Position */
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
				'bottom-left' => 'Floating left',
				'bottom-right' => 'Floating right',
			),
		)
);	

/* Cookie Consent Layout */
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

/* Cookie Consent Banner Background Color */
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
            'settings' => 'cookie-pallete-banner-bg',
			'section' => 'cookie_consent',
        )
    )
);

/* Cookie Consent Banner Text Color */
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
            'settings' => 'cookie-pallete-banner-text',
			'section' => 'cookie_consent',
        )
    )
);

/* Cookie Consent Button Background Color */
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
            'settings' => 'cookie-pallete-button-bg',
			'section' => 'cookie_consent',
        )
    )
);

/* Cookie Consent Button Text Color */
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
            'settings' => 'cookie-pallete-button-text',
			'section' => 'cookie_consent',
        )
    )
);

/* Link to Privacy Policy */
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

/* Cookie Consent Banner Text */
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

/* Cookie Consent Button Text */
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

?>