<?php
/* 
	global-settings-additional-header-scripts.php
	Descripion: Adds section for additional header scripts
*/

/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'additional-header' , 
	array(
		'title'      => __( 'Additional Header Scripts', 'bonestheme' ),
		'priority'   => 25,
		'section'	     => 'global_settings',
		'description' => '',
	))
);


/********************
SETTINGS & CONTROLS
********************/

/* Additional Header Scripts Text Area */
$wp_customize->add_setting(
   'additional-header-scripts'
);
$wp_customize->add_control( 
   'additional-header-scripts', 
   array(
		'section' => 'additional-header',
		'settings' => 'additional-header-scripts',
		'label'   => __('Additional Header Scripts', 'bonestheme'),
	    'description' => __( 'Anything here will go within the head tags of the website. Do not place plain text in this!' ),
		'type'    => 'textarea',
		
	)
);

?>