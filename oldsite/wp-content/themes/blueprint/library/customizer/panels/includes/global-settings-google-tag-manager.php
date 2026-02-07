<?php
/* 
	global-settings-google-tag-manager.php
	Descripion: Adds textarea sections for Google Tag Manager scripts
*/
 
/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'gtm' , 
	array(
		'title'      => __( 'Google Tag Manager', 'bonestheme' ),
		'priority'   => 20,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

/********************
SETTINGS & CONTROLS
********************/

/* Google Tag Manager Head Code */
$wp_customize->add_setting(
   'gtm-head-code'
);
$wp_customize->add_control( 
   'gtm-head-code', 
   array(
		'section' => 'gtm',
		'settings' => 'gtm-head-code',
		'label'   => __('Google Tag Manager <head> code', 'bonestheme'),
	    'description' => __( 'This portion of the code will be inserted within the head tags of the website. Do not place plain text in this!' ),
		'type'    => 'textarea',
		
	)
);

/* Google Tag Manager Body Code */
$wp_customize->add_setting(
   'gtm-body-code'
);
$wp_customize->add_control( 
   'gtm-body-code', 
   array(
		'section' => 'gtm',
		'settings' => 'gtm-body-code',
		'label'   => __('Google Tag Manager <body> code', 'bonestheme'),
	    'description' => __( 'This portion of the code will be inserted after the opening body tag of the website. Do not place plain text in this!' ),
		'type'    => 'textarea',
		
	)
);

?>