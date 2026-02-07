<?php
/*
	global-settings-schema-markup.php
	Description: Adds textarea for input of additonal schema markup
*/
 
/****************
PANELS
****************/

/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'schema-markup' , 
	array(
		'title'      => __( 'Schema Markup', 'bonestheme' ),
		'priority'   => 20,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

/********************
SETTINGS & CONTROLS
********************/

/* Schema Markup */
$wp_customize->add_setting(
   'schema-markup-code'
);
$wp_customize->add_control( 
   'schema-markup-code', 
   array(
		'section' => 'schema-markup',
		'settings' => 'schema-markup-code',
		'label'   => __('Schema Markup', 'bonestheme'),
	    'description' => __( 'Schema markup will be inserted within the head tags of the website. Do not place plain text in this!' ),
		'type'    => 'textarea',
	)
);

?>