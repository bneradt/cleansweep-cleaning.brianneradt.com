<?php
/*
	global-settings-business-information.php
	Descripion: adds section, settings and controllers for social media to the global settings panel.
*/

/****************
PANELS
****************/
	
/* 2nd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize, 
	'business_info' , 
	array(
		'title' => __( 'Business Information', 'bonestheme' ),
		'description' => 'Enter business information here.',
		'priority' => 10,
		'section' => 'global_settings',
	)) 
);

/* 3rd Level */
$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
	'hours', 
	array(
		'title'  => __( 'Hours', 'bonestheme' ),
		'priority'   => 5,
		'section' => 'business_info',
	)) 
);

/********************
SETTINGS & CONTROLS
********************/

/* Contact Info Section Title */
$wp_customize->add_setting(
	'contact-form-title',
	array(
		'default' => 'Contact Us',
	)
);
$wp_customize->add_control(
	'contact-form-title',
	array(
		'label' => 'Contact Info Section Title',
		'section' => 'business_info',
		'type' => 'text',	
	)
);

/* Business Name */
$wp_customize->add_setting(
	'business-name',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'business-name',
	array(
		'label' => 'Business Name',
		'type' => 'text',
		'section' => 'business_info',
	)
);

/* Phone Number */
$wp_customize->add_setting(
	'phone-number',
	array(
		'default' => '888-555-1234',
	)
);
$wp_customize->add_control(
	'phone-number',
	array(
		'label' => 'Phone Number',
		'section'	  => 'business_info',
		'type' => 'phone',
		'input_attrs' => 
			array(
				'placeholder' => __( '(123) 456-7891' ),		
			),
	)
);

/* Email */
$wp_customize->add_setting(
	'email',
	array(
		'default' => 'name@domain.com',
		'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control(
	'email',
	array(
		'label' => 'Email',
		'section'	     => 'business_info',
		'type' => 'email',
		'input_attrs' => 
			array(
				'placeholder' => __( 'email@domain.com' ),		
			),
	)
);

/* Add Email Icon Checkbox */
$wp_customize->add_setting(
    'add-email'
);
$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
    'add-email',
    array(
        'type' => 'toggle',
        'label' => 'Add Email Icon',
        'section' => 'business_info',
    )
	)
);

/* Address Street */
$wp_customize->add_setting(
	'address-street',
	array(
		'default' => '1234 Main St',
	)
);
$wp_customize->add_control(
	'address-street',
	array(
		'label' => 'Address',
		'section' => 'business_info',
		'description' => __( 'Street' ),
		'type' => 'text',
		'input_attrs' => 
			array(
				'placeholder' => __( '1234 Main St' ),
			),
	)
);

/* Address City / Town */
$wp_customize->add_setting(
	'address-city',
	array(
		'default' => 'Citytown',	
	)
);
$wp_customize->add_control(
	'address-city',
	array(
		'label' => '',
		'section' => 'business_info',
		'description' => __( 'City / Town' ),
		'type' => 'text',
		'input_attrs' => 
			array(
				'placeholder' => __( 'Citytown' ),
			),
	)
);

/* Address State */
$wp_customize->add_setting(
	'address-state',
	array(
		'default' => 'NY',
	)
);
$wp_customize->add_control(
	'address-state',
	array(
		'label' => '',
		'section' => 'business_info',
		'description' => __( 'State' ),
		'type' => 'text',
		'input_attrs' => 
			array(
				'placeholder' => __( 'NY' ),
			),
	)
);

/* Address ZIP */
$wp_customize->add_setting(
	'address-zip',
	array(
		'default' => '12345',
	)
);
$wp_customize->add_control(
	'address-zip',
	array(
		'label' => '',
		'section' => 'business_info',
		'description' => __( 'Zip' ),
		'type' => 'text',
		'input_attrs' => 
			array(
				'placeholder' => __( '12345' ),
			),
	)
);

/********************
Hours
********************/

/* Business Hours Section Title */
$wp_customize->add_setting(
	'business-info-title',
	array(
		'default' => 'Business Hours',
	)
);
$wp_customize->add_control(
	'business-info-title',
	array(
		'label' => 'Business Hours Section Title',
		'type' => 'text',
		'section' => 'hours',
	)
);

/* By Appointment Only All */
$wp_customize->add_setting(
	'apt_all'
);
$wp_customize->add_control(
	'apt_all',
	array(
		'type' => 'checkbox',
		'label' => 'By Appointment Only (All)',
		'section' => 'hours',
	)
);

/* Monday - Open */
$wp_customize->add_setting(
	'monday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'monday-open',
	array(
		'label' => 'MONDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Monday - Close */
$wp_customize->add_setting(
	'monday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'monday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Monday - Options */
$wp_customize->add_setting(
	'monday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'monday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/* Tuesday - Open */
$wp_customize->add_setting(
	'tuesday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'tuesday-open',
	array(
		'label' => 'TUESDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Tuedsay - CLose */
$wp_customize->add_setting(
	'tuesday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'tuesday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Tuesday - Options */
$wp_customize->add_setting(
	'tuesday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'tuesday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),	
	)
);

/* Wednesday - Open */
$wp_customize->add_setting(
	'wednesday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'wednesday-open',
	array(
		'label' => 'WEDNESDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Wednesday - Close */
$wp_customize->add_setting(
	'wednesday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'wednesday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Wednesday - Options */
$wp_customize->add_setting(
	'wednesday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'wednesday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/* Thursday - Open */
$wp_customize->add_setting(
	'thursday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'thursday-open',
	array(
		'label' => 'THURSDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Thursday - Close */
$wp_customize->add_setting(
	'thursday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'thursday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Thursday - Options */
$wp_customize->add_setting(
	'thursday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'thursday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/* Friday - Open */
$wp_customize->add_setting(
	'friday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'friday-open',
	array(
		'label' => 'FRIDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Friday - Close */
$wp_customize->add_setting(
	'friday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'friday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Friday - Options */
$wp_customize->add_setting(
	'friday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'friday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/* Saturday - Open */
$wp_customize->add_setting(
	'saturday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'saturday-open',
	array(
		'label' => 'SATURDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Saturday - Close */
$wp_customize->add_setting(
	'saturday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'saturday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Saturday - Options */
$wp_customize->add_setting(
	'saturday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'saturday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/* Sunday - Open */
$wp_customize->add_setting(
	'sunday-open',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'sunday-open',
	array(
		'label' => 'SUNDAY',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Sunday - Close */
$wp_customize->add_setting(
	'sunday-close',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'sunday-close',
	array(
		'label' => 'to',
		'section' => 'hours',
		'type' => 'time',
	)
);

/* Sunday - Options */
$wp_customize->add_setting(
	'sunday_other',
	array(
		'default' => '',
	)
);
$wp_customize->add_control(
	'sunday_other',
	array(
		'type' => 'radio',
		'label' => '-OR-',
		'section' => 'hours',
		 'choices' => array(
			'appointment' => __( 'By Appointment' ),
			'closed' => __( 'Closed' ),
			'clear' => __( '(Clear Selection)' ),
		  ),
	)
);

/*****************
SELECTIVE REFRESH
*****************/

$wp_customize->selective_refresh->add_partial(
	'monday-open', 
	array(
		'selector' => '.monday',
		'container_inclusive' => false,
		'render_callback' => 'monday-open',
	)
);
$wp_customize->selective_refresh->add_partial(
	'phone-number', 
	array(
		'selector' => '.header-phone-number',
		'container_inclusive' => false,
		'render_callback' => 'phone-number',
	)
);

?>
