<?php
/* 
	global-settings-typography.php
	Descripion: adds settings and controllers typography panel 
*/

/* adds google fonts api function */	 
require('global-settings-google-font-api.php');

/****************	
PANELS
****************/

/* 1st Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
	'global_settings' , 
	array(
		'title'      => __( 'Global Settings', 'bonestheme' ),
		'description' => '',
		'priority'   => 20,
			
	)) 
);  

/* 2nd Level */

$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
	'typography_dropdown', 
	array(
		'title' => 'Typography',
		'section' => 'global_settings',
		'priority' => 5,
		'description' => '<strong>Set your theme default font settings here. Leave all other sections set to "Theme Default" to inherit these settings.</strong><br><br>*NOTE: You do not need to set your font family in each section unless you want something other than what is set here.*',
	))
);

/********************
SETTINGS & CONTROLS
********************/ 

/* Google Font API Key */

$wp_customize->add_setting(
   'google-font-api-key'
);
$wp_customize->add_control( 
   'google-font-api-key', 
   array(
		'section' => 'typography_dropdown',
		'settings' => 'google-font-api-key',
		'label'   => __('Google Font API Key', 'bonestheme'),
		'type'    => 'text',
	)
);

/* Body Font Family */
$wp_customize->add_setting(
   'body-typography', 
   array(
		'default' => 'Open Sans',
	)
);
$wp_customize->add_control( 
   'body-typography', 
   array(
		'section' => 'typography_dropdown',
		'settings' => 'body-typography',
		'label'   => __('Body Font Family', 'bonestheme'),
		'type'    => 'select',
		'choices'    => $fontArray,
	)
);

/* Body Font Weight */
$wp_customize->add_setting(
	'body-font-weight',
	array(
	  'default' => 'normal',
	)
);
$wp_customize->add_control(
	'body-font-weight', 
		array(
			'settings' => 'body-font-weight',
			'label'   => __('Font Weight', 'bonestheme'),
			'section' => 'typography_dropdown',
			'type'    => 'select',
			'choices' => array(
				'normal' => __('normal', 'bonestheme'),
				'bold' => __('bold', 'bonestheme'),
				'lighter' => __('lighter', 'bonestheme'),
			),
		)
);

/* Heading Font Family*/
$wp_customize->add_setting(
	'h1-font-family',
		array(
			'default' => '',
		)
);
$wp_customize->add_control(
	'h1-font-family', 
		array(
			'settings' => 'h1-font-family',
			'label'   => __('Heading Font Family', 'bonestheme'),
			'section' => 'typography_dropdown',
			'type'    => 'select',
			'choices'    => $fontArray,
	)
);

/* H1 Font Weight*/
$wp_customize->add_setting(
	'h1-font-weight',
		array(
		  'default'  => 'normal',
		)
);
$wp_customize->add_control(
	'h1-font-weight', 
		array(
			'settings' => 'h1-font-weight',
			'label'   => __('H1 Font Weight', 'bonestheme'),
			'section' => 'typography_dropdown',
			'type'    => 'select',
			'choices'    => array(
				'normal' => __('normal', 'bonestheme'),
				'bold' => __('bold', 'bonestheme'),
				'lighter' => __('lighter', 'bonestheme'),
			),
		)
);


?>