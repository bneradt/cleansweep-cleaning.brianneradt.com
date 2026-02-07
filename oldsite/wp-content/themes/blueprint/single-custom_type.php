<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
				

				<div id="inner-content" class="wrap cf">
									
					<main id="main" class="<?php 
						if( !get_theme_mod( 'remove-cpt-sidebar-single' )):
							echo 'm-all t-2of3 d-5of7 cf col-xs-12 col-sm-8 col-lg-8';
						endif;   

						if( get_theme_mod( 'remove-cpt-sidebar-single' )):
							echo 'm-all t-all d-all cf col-xs-12 col-sm-8 col-lg-8';
						endif;

					?>" role="main">
						

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
						
									<!--<p class="byline vcard"><?php
										//printf( __( 'Posted <time class="updated" datetime="%1$s">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>-->

								</header>

								<section class="entry-content cf">
									<?php 
									
									the_post_thumbnail('medium', array('class' => 'alignleft'));
									the_content(); 
									
									?>
								</section> <!-- end article section -->
								
								
								<?php if( get_theme_mod( 'acf-1-label' )){  ?>
															
	
								<section class="acf-1 acf-field">									
									
										<?php 
																		  
										$acf_1_label = get_theme_mod( "acf-1-label" );									

									
										$acf_1_name = get_theme_mod( "acf-1-name" );
	
	
										$acf_1_name_var = get_field( $acf_1_name , false, false);							
	
										?>
									
										<?php if( get_field($acf_1_name) ): ?>
									
										<p><span class="acf-field-label"><?php echo $acf_1_label . ':' ?> </span><?php echo $acf_1_name_var ?><p>
									
										<?php endif; ?>
								
								</section>
								
								<?php } // end if  ?>
								
								<?php if( get_theme_mod( 'acf-2-label' )){  ?>
															
	
								<section class="acf-2 acf-field">									
									
										<?php 
																		  
										$acf_2_label = get_theme_mod( "acf-2-label" );									

									
										$acf_2_name = get_theme_mod( "acf-2-name" );
	
	
										$acf_2_name_var = get_field( $acf_2_name , false, false);	
									
										?>
										
										<?php if( get_field($acf_2_name) ): ?>
									
										<p><span class="acf-field-label"><?php echo $acf_2_label . ':' ?> </span><?php echo ($acf_2_name_var) ?><p>
										
										<?php endif; ?>
								
								</section>
								
								<?php } // end if  ?>
								
								<?php if( get_theme_mod( 'acf-3-label' )){  ?>
															
	
								<section class="acf-3 acf-field">									
									
										<?php 
																		  
										$acf_3_label = get_theme_mod( "acf-3-label" );									

									
										$acf_3_name = get_theme_mod( "acf-3-name" );
	
	
										$acf_3_name_var = get_field( $acf_3_name , false, false);	
									
										?>
										
										<?php if( get_field($acf_3_name) ): ?>
										
										<p><span class="acf-field-label"><?php echo $acf_3_label . ':' ?> </span><?php echo ($acf_3_name_var) ?><p>
									
										<?php endif; ?>
								
								</section>
								
								<?php } // end if  ?>
								
								<?php if( get_theme_mod( 'acf-4-label' )){  ?>
															
	
								<section class="acf-4 acf-field">									
									
										<?php 
																		  
										$acf_4_label = get_theme_mod( "acf-4-label" );									

									
										$acf_4_name = get_theme_mod( "acf-4-name" );
	
									
										$acf_4_name_var = get_field( $acf_4_name , false, false);	
		
										?>
										
										<?php if( get_field($acf_4_name) ): ?>		
									
										<p><span class="acf-field-label"><?php echo $acf_4_label . ':' ?> </span><?php echo ($acf_4_name_var) ?><p>
									
										<?php endif; ?>
								
								</section>
								
								<?php } // end if  ?>
								
								<?php if( get_theme_mod( 'acf-5-label' )){  ?>
															
	
								<section class="acf-5 acf-field">									
									
										<?php 
																		  
										$acf_5_label = get_theme_mod( "acf-5-label" );									

									
										$acf_5_name = get_theme_mod( "acf-5-name" );
	
										
										$acf_5_name_var = get_field( $acf_5_name , false, false);	
									
										?>
										
										<?php if( get_field($acf_5_name) ): ?>
										
										<p><span class="acf-field-label"><?php echo $acf_5_label . ':' ?> </span><?php echo ($acf_5_name_var) ?><p>
									
										<?php endif; ?>
								
								</section>
								
								<?php } // end if  ?>
								

								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?>

								</footer>

								<?php // comments_template(); ?>

							</article>
							
							
							
							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php if( !get_theme_mod( 'remove-cpt-sidebar-single' )){ ?>
							<?php get_sidebar(); ?>
						<?php } // end if ?>

				</div>

			</div>

<?php get_footer(); ?>
