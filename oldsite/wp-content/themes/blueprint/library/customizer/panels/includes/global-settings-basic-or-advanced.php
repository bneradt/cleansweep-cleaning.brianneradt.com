<?php
/* 
	global-settings-basic-or-advanced.php
	Descripion: Controls the settings to be shown in the customizer.
 */

if( !get_theme_mod( 'basic-or-advanced' )) {
	
	/****************
	PANELS
	****************/

	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
		'basic_or_advanced', 
		array(
			'title'      => __( 'Basic or Advanced', 'bonestheme' ),
			'priority'   => 5,
			'section'	     => 'global_settings',
			'description' => '<strong>*Once selection is made, the page will save and the browser will refresh (if prompted, select yes) in order to display the appropriate settings.*<br><br>**This option will disappear once selection is made.**</strong>',
		))
	);

	/********************
	SETTINGS & CONTROLS
	********************/

	/* Main Blueprint Option */
	$wp_customize->add_setting(
		'basic-or-advanced',
			array(
				'default' => '',
			)
	); 
	$wp_customize->add_control(
		'basic-or-advanced',
			array(
				'type' => 'radio',
				'label' => 'Basic or Advanced Blueprint?',
				'section' => 'basic_or_advanced',
				'choices' => array(
					'basic' => 'Basic',
					'advanced' => 'Advanced',
				),
			)
	);	

	/*****************
	SELECTIVE REFRESH
	*****************/

	$wp_customize->selective_refresh->add_partial(
		'basic-or-advanced', 
		array(
			'selector' => 'body',
			'container_inclusive' => false,
			'render_callback' => 'basic-or-advanced'
		)
	);
	
} 

?>