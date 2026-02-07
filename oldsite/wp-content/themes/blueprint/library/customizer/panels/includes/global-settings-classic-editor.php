<?php
/* global-setting-classic-editor.php
 * Descripion: adds section, settings and controllers   
 * for cookie consent section
 */
 
 
 
// panels - first level
  	
// panels - second level


// sections  (final level) 

// if( get_theme_mod( 'basic-or-advanced' ) =='') {
/*
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,  
	'classic-editor', 
	array(
		'title'      => __( 'Use Classic Editor', 'bonestheme' ),
		'priority'   => 25,
		'section'	     => 'global_settings',
		'description' => '',
	))
);

// settings & controls


$wp_customize->add_setting(
   'use-classic'//, 
   //array(
	//	'default'        => '',
	//)
);
$wp_customize->add_control( 
   'use-classic', 
   array(
		'section' => 'classic-editor',
		'settings' => 'use-classic',
		'label'   => __('Use Classic Editor (instead of Guttenburg)', 'bonestheme'),
	    'description' => __( '' ),
		'type'    => 'checkbox',
		
	)
);
*/

// selective refresh 

/* $wp_customize->selective_refresh->add_partial(
	'basic-or-advanced', 
	array(
		'selector' => 'body',
		'container_inclusive' => false,
		'render_callback' => 'basic-or-advanced'
	)
); */


// } // end if selection is made

?>