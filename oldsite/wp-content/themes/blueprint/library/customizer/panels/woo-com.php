<?php
/* woo-com.php
 * Description: Adds options to disable sidebar on WooCommerce pages
 */
 

	/****************
	PANELS
	****************/
	
	/* 2nd Level */
	$wp_customize->add_section( 
		'sidebar-options', 
		array(
			'title'      => __( 'Sidebar Options', 'bonestheme' ),
			'priority'   => 5,
			'panel'	     => 'woocommerce',
		)
	);

	/********************
	SETTINGS & CONTROLS
	********************/

	/* Hide Sidebar on Single Product Page*/
	$wp_customize->add_setting(
		'hide-sidebar-product' 
	);
	$wp_customize->add_control(
		'hide-sidebar-product',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Product Page Sidebar',
				'section' => 'sidebar-options',
				'description' => '',
			)
	);
	
	/* Hide Sidebar on Categories*/
	$wp_customize->add_setting(
		'hide-sidebar-woo-category' 
	);
	$wp_customize->add_control(
		'hide-sidebar-woo-category',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Woo Category Sidebar',
				'section' => 'sidebar-options',
				'description' => '',
			)
	);
	
	/* Hide Sidebar on Shop Page*/
	$wp_customize->add_setting(
		'hide-sidebar-shop' 
	);
	$wp_customize->add_control(
		'hide-sidebar-shop',
			array(
				'type' => 'checkbox',
				'label' => 'Hide Shop (Product Archives) Page Sidebar',
				'section' => 'sidebar-options',
				'description' => '',
			)
	); 


?>