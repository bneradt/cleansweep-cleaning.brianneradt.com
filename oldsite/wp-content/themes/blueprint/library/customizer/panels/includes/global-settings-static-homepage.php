<?php
/* 
	global-settings-static-homepage.php
	Description: 
*/
 
/****************
PANELS
****************/

$wp_customize->get_section('static_front_page')->title = __( 'Homepage & Blog Page Display' );
$wp_customize->get_section('static_front_page')->description = __( '' );
$wp_customize->get_section('static_front_page')->priority =  '20';
$wp_customize->get_control( 'show_on_front' )->section = 'global_settings';
$wp_customize->get_control( 'page_on_front' )->section = 'global_settings';
$wp_customize->get_control( 'page_for_posts' )->section = 'global_settings';
$wp_customize->remove_section( 'static_front_page' );

/********************
SETTINGS & CONTROLS
********************/

/* Import Old H1s */
$wp_customize->add_setting(
   'import-old-h1s'
	
);
$wp_customize->add_control( 
   'import-old-h1s', 
   array(
		'section' => 'global_settings',
		'settings' => 'import-old-h1s',
		'label'   => __('Import old custom H1s', 'bonestheme'),
	    'description' => __( 'If site was cloned - import custom titles from old h1 plugin or headway custom page title field' ),
		'type'    => 'checkbox',
	)
);
if ( get_theme_mod('basic-or-advanced') == 'advanced' ) {
	$wp_customize->add_setting(
	   'blueprint-max-width',
		array(
			'default' => '1140'
		)
		
	);
	$wp_customize->add_control( 
	   'blueprint-max-width', 
	   array(
			'section' => 'global_settings',
			'settings' => 'blueprint-max-width',
			'label'   => __('Wrapper Max-Width (px)', 'bonestheme'),
			'description' => __( '' ),
			'type'    => 'text',
		)
	);
}
?>