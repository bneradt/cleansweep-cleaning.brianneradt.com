<?php
/* 
	global-settings-additional-footer-scripts.php
	Descripion: Adds section for additional footer scripts
*/

/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'additional-footer' , 
	array(
		'title'      => __( 'Additional Footer Scripts', 'bonestheme' ),
		'priority'   => 30,
		'section'	     => 'global_settings',
		'description' => '',
	))
);


/********************
SETTINGS & CONTROLS
********************/

/* Additional Footer Scripts Text Area */
$wp_customize->add_setting(
   'additional-footer-scripts'
);
$wp_customize->add_control( 
   'additional-footer-scripts', 
   array(
		'section' => 'additional-footer',
		'settings' => 'additional-footer-scripts',
		'label'   => __('Additional Footer Scripts', 'bonestheme'),
	    'description' => __( 'Anything here will be inserted before the closing body tag of the website. Do not place plain text in this!' ),
		'type'    => 'textarea',
		
	)
);

?>