<?php
/* 
	external-libraries.php
	Descripion: adds settings and controllers for external libraries to the Wordpress Customizer
*/
 
	/****************
	PANELS
	****************/
	
	$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'external-libraries' , 
			array(
				'title'      => __( 'External Libraries', 'bonestheme' ),
				'description' => '',
				'priority'   => 55,
				'section'	     => 'global_settings',
				
		)) 
	);

	/********************
	SETTINGS & CONTROLS
	********************/
	
	/* Enable Animate.css & WOW.js */
	$wp_customize->add_setting( 'wow_animate' , array(
		'default' => 0,
    ) );
	$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
	'wow_animate', array(
	  'label' => __( 'Enable Animate.css & WOW.js' ),
	  'type' => 'toggle',
	  'section' => 'external-libraries',
	) 
	));
	
	/* Enable Font Awesome */
	$wp_customize->add_setting( 'font_awesome' , array(
		'default' => 0,
    ) );

	$wp_customize->add_control(  new Customizer_Toggle_Control( $wp_customize, 
	'font_awesome', array(
	  'label' => __( 'Enable Font Awesome 6' ),
	  'type' => 'toggle',
	  'section' => 'external-libraries',
	) 
	));
 
?>