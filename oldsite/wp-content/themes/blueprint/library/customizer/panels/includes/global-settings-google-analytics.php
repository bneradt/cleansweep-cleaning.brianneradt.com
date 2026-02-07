<?php
/* 
	global-settings-google-analytics.php
	Description: Adds text area to input Google Analytics script.
*/
 
/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'google-analytics' , 
	array(
		'title'      => __( 'Google Analytics', 'bonestheme' ),
		'priority'   => 20,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

/********************
SETTINGS & CONTROLS
********************/

/* Google Analytics */
$wp_customize->add_setting(
   'google-analytics-code'
);
$wp_customize->add_control( 
   'google-analytics-code', 
   array(
		'section' => 'google-analytics',
		'settings' => 'google-analytics-code',
		'label'   => __('Google Analytics', 'bonestheme'),
	    'description' => __( 'Enter entire code including script tags' ),
		'type'    => 'textarea',
		
	)
);


?>