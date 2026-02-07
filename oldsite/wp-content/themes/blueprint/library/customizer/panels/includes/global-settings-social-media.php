<?php
/* 
	global-setting-social-media.php
	Descripion: adds section, settings and controllers for social media to the global settings panel.
*/

/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'social_media', 
	array(
		'title'      => __( 'Social Media', 'bonestheme' ),
		'priority'   => 10,
		'section'	     => 'global_settings',
	))
);

/********************
SETTINGS & CONTROLS
********************/

/* Header Icon Color */
$wp_customize->add_setting(
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
);

/* Footer Icon Color */
$wp_customize->add_setting(
    'sm-color-footer',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sm-color-footer',
        array(
            'label' => 'Footer Icon Color',
            'section' => 'social_media',
            'settings' => 'sm-color-footer',
        )
    )
);

/* Add Facebook Checkbox */
$wp_customize->add_setting(
    'add-facebook',	
	array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'add-facebook',
    array(
        'type' => 'checkbox',
        'label' => 'Add Facebook Icon',
        'section' => 'social_media',
    )
);

/* Facebook URL */
$wp_customize->add_setting(
    'facebook_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'facebook_url',
    array(
        'label' => 'Facebook page URL',
        'section' => 'social_media',
        'type' => 'text',
		'input_attrs' => array(
		'placeholder' => __( 'https://www.facebook.com/mainstreethost/' ),
		),
    )
);

/* Add Twitter Checkbox */
$wp_customize->add_setting(
    'add-twitter',	
	array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'add-twitter',
    array(
        'type' => 'checkbox',
        'label' => 'Add X (Twitter) Icon',
        'section' => 'social_media',
    )
);

/* Twitter URL */
$wp_customize->add_setting(
    'twitter_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'twitter_url',
    array(
        'label' => 'X (Twitter) page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Google Checkbox */
$wp_customize->add_setting(
    'add-google'
);
$wp_customize->add_control(
    'add-google',
    array(
        'type' => 'checkbox',
        'label' => 'Add Google Icon',
        'section' => 'social_media',
    )
);

/* Google URL */
$wp_customize->add_setting(
    'google_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'google_url',
    array(
        'label' => 'Google page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add YouTube Checkbox */
$wp_customize->add_setting(
    'add-youtube'
);
$wp_customize->add_control(
    'add-youtube',
    array(
        'type' => 'checkbox',
        'label' => 'Add YouTube Icon',
        'section' => 'social_media',
    )
);

/* YouTube URL */
$wp_customize->add_setting(
    'youtube_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'youtube_url',
    array(
        'label' => 'YouTube page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Instagram Checkbox */
$wp_customize->add_setting(
    'add-instagram'
);
$wp_customize->add_control(
    'add-instagram',
    array(
        'type' => 'checkbox',
        'label' => 'Add Instagram Icon',
        'section' => 'social_media',
    )
);

/* Instagram URL */
$wp_customize->add_setting(
    'instagram_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'instagram_url',
    array(
        'label' => 'Instagram page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Pinterest Checkbox */
$wp_customize->add_setting(
    'add-pinterest'
);
$wp_customize->add_control(
    'add-pinterest',
    array(
        'type' => 'checkbox',
        'label' => 'Add Pinterest Icon',
        'section' => 'social_media',
    )
);

/* Pinterest URL */
$wp_customize->add_setting(
    'pinterest_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'pinterest_url',
    array(
        'label' => 'Pinterest page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Yelp Checkbox */
$wp_customize->add_setting(
    'add-yelp'
);
$wp_customize->add_control(
    'add-yelp',
    array(
        'type' => 'checkbox',
        'label' => 'Add Yelp Icon',
        'section' => 'social_media',
    )
);

/* Yelp URL */
$wp_customize->add_setting(
    'yelp_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'yelp_url',
    array(
        'label' => 'Yelp page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add LinkedIn Checkbox */
$wp_customize->add_setting(
    'add-linkedin'
);
$wp_customize->add_control(
    'add-linkedin',
    array(
        'type' => 'checkbox',
        'label' => 'Add Linkedin Icon',
        'section' => 'social_media',
    )
);

/* LinkedIn URL */
$wp_customize->add_setting(
    'linkedin_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'linkedin_url',
    array(
        'label' => 'Linkedin page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Etsy Checkbox */
$wp_customize->add_setting(
    'add-etsy'
);
$wp_customize->add_control(
    'add-etsy',
    array(
        'type' => 'checkbox',
        'label' => 'Add Etsy Icon',
        'section' => 'social_media',
    )
);
/* Etsy URL */
$wp_customize->add_setting(
    'etsy_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'etsy_url',
    array(
        'label' => 'Etsy page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add Houzz Checkbox */
$wp_customize->add_setting(
    'add-houzz'
);
$wp_customize->add_control(
    'add-houzz',
    array(
        'type' => 'checkbox',
        'label' => 'Add Houzz Icon',
        'section' => 'social_media',
    )
);

/* Houzz URL */
$wp_customize->add_setting(
    'houzz_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'houzz_url',
    array(
        'label' => 'Houzz page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

/* Add TikTok Checkbox */
$wp_customize->add_setting(
    'add-tiktok'
);
$wp_customize->add_control(
    'add-tiktok',
    array(
        'type' => 'checkbox',
        'label' => 'Add Tiktok Icon',
        'section' => 'social_media',
    )
);

/* TikTok URL */
$wp_customize->add_setting(
    'tiktok_url',
    array(
        'default' => '',
    )
);
$wp_customize->add_control(
    'tiktok_url',
    array(
        'label' => 'Tiktok page URL',
        'section' => 'social_media',
        'type' => 'text',
		
    )
);

if( get_theme_mod( 'basic-or-advanced' ) == 'advanced' ) {
	/* Header Icon Placement */
	$wp_customize->add_setting(
		'header_social',
		array(
			'default' => 'yes',
		)
	);
	$wp_customize->add_control(
		'header_social',
		array(
			'label' => 'Header Icon Placement',
			'section' => 'social_media',
			'type' => 'radio',
			'choices' => array(
					'yes' => __( 'Top Bar' ),
					'none' => __( 'None' ),
				),
			)
	);

	/* Footer Icon Placement */
	$wp_customize->add_setting(
		'footer_social',
		array(
			'default' => 'bottom',
		)
	);
	$wp_customize->add_control(
		'footer_social',
		array(
			'label' => 'Footer Icon Placement',
			'section' => 'social_media',
			'type' => 'radio',
			'choices' => array(
					'bottom' => __( 'Bottom Bar' ),
					'address' => __( 'Below Address in Footer Column' ),
					'none' => __( 'None' ),
				),
			)
	);
}

/*****************
SELECTIVE REFRESH
*****************/

$wp_customize->selective_refresh->add_partial(
	'sm-color', 
	array(
		'selector' => '.header-social',
		'container_inclusive' => false,
		'render_callback' => 'sm-color'
	)
);
$wp_customize->selective_refresh->add_partial(
	'sm-color-footer', 
	array(
		'selector' => '.footer-social',
		'container_inclusive' => false,
		'render_callback' => 'sm-color-footer'
	)
);
?>