<?php
/* 
	global-settings-yext.php
	Description: adds section, settings and controllers for cookie consent section
*/
 
/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'yext' , 
	array(
		'title'      => __( 'Yext', 'bonestheme' ),
		'priority'   => 25,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

/********************
SETTINGS & CONTROLS
********************/

/* Yext ID */
$wp_customize->add_setting(
   'yext-id'
);
$wp_customize->add_control( 
   'yext-id', 
   array(
		'section' => 'yext',
		'settings' => 'yext-id',
		'label'   => __('Yext ID', 'bonestheme'),
	    'description' => __( 'Enter yext id below' ),
		'type'    => 'text',
		
	)
);

?>