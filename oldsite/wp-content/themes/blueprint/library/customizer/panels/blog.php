<?php
/*
	blog.php
	Descripion: Settings for Blog
*/
 
	if( get_theme_mod( 'basic-or-advanced' ) == 'advanced') {

		/****************
		PANELS
		****************/

		/* 1st Level */
		$wp_customize->add_section( new PE_WP_Customize_section ( $wp_customize,
			'blog_page_content' , 
				array(
					'title'      => __( 'Blog', 'bonestheme' ),
					'description' => '',
					'priority'   => 140,
				)) 
		);
		
		/********************
		SETTINGS & CONTROLS
		********************/
		
		/* Blog Template Option */
		$wp_customize->add_setting(
			'blog_layout',
				array(
					'default' => 'default',
				)
		); 
		$wp_customize->add_control(
			'blog_layout',
				array(
					'type' => 'radio',
					'label' => 'Blog Layout',
					'section' => 'blog_page_content',
					'choices' => array(
						'default' => 'Default',
						'grid' => 'Grid',

					),
				)
		); 
		
		/* Byline */
		$wp_customize->add_setting(
			'blog_byline'
		); 
		$wp_customize->add_control(
			'blog_byline',
				array(
					'type' => 'select',
					'label' => 'Byline Display',
					'section' => 'blog_page_content',
					'choices' => array(
						'' => 'Show Date and Author',
						'date' => 'Show Date Only',
						'author' => 'Show Author Only',
						'none' => 'None',

					),
				)
		); 
		
		/* Category / Tag Dispaly */
		$wp_customize->add_setting(
			'blog_taxonomies'
		); 
		$wp_customize->add_control(
			'blog_taxonomies',
				array(
					'type' => 'select',
					'label' => 'Category / Tag Display',
					'section' => 'blog_page_content',
					'choices' => array(
						'' => 'Show Categories and Tags',
						'cats' => 'Show Categories Only',
						'tags' => 'Show Tags Only',
						'none' => 'None',

					),
				)
		);
		
		/* Category / Tag Display */
		$wp_customize->add_setting(
			'blog_post_layout'
		); 
		$wp_customize->add_control(
			'blog_post_layout',
				array(
					'type' => 'select',
					'label' => 'Post Layout in Blog',
					'section' => 'blog_page_content',
					'choices' => array(
						'' => 'Standard (Featured Image Left)',
						'block' => 'Block (Featured Image Top)',
						//'tags' => 'Hover ( Show Title/Content on Hover )',

					),
				)
		);
		
		/* Disable Blog Post Excerpt*/
		$wp_customize->add_setting(
			'blog_post_disable_excerpt' 
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
			'blog_post_disable_excerpt',
				array(
					'type' => 'toggle',
					'label' => 'Disable Blog Post Excerpt',
					'section' => 'blog_page_content',
				)
			)
		);
			
		/* Hide Featured Image on Posts */
		$wp_customize->add_setting(
		   'hide-featured-img'
		);
		$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 
		   'hide-featured-img', 
			   array(
					'section' => 'blog_page_content',
					'settings' => 'hide-featured-img',
					'label'   => __('Hide featured images on posts pages', 'bonestheme'),
					'description' => __( '' ),
					'type'    => 'toggle',
				)
			)
		);
		/* Default Featured Image*/
		$wp_customize->add_setting(
			'blog_post_default_featured',
			array(
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'blog_post_default_featured',
				array(
					'mime_type' => 'image',
					'label' => 'Default Featured Image',
					'section' => 'blog_page_content',
					'settings' => 'blog_post_default_featured',
				)
			 )
		);

		/*****************
		SELECTIVE REFRESH
		*****************/


	}


?>