<?php
/*
Template Name: CPT Taxonomy Page
*
* This is your custom page template. You can create as many of these as you need.
* Simply name is "page-whatever.php" and in add the "Template Name" title at the
* top, the same way it is here.
*
* When you create your page, you can just select the template and viola, you have
* a custom page template to call your very own. Your mother would be so proud.
*
* For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

				<main id="main" class="<?php if( get_theme_mod( 'remove-cpt-category-sidebar' ) ) { echo 'm-all t-all d-all cf'; } else { echo 'm-all t-2of3 d-5of7 cf'; } ?>" >
				
					  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					  <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >                                  
						
							<header class="article-header">

								<h1 class="page-title"><?php the_title(); ?></h1>

							</header> <?php // end article header ?>
						
								  
							<section class="entry-content cf">
								  <?php the_content(); ?>
				
							</section> <?php // end article section ?>

					  </article>

					  <?php endwhile; endif; ?>                                         
					  
				<?php
			 
				$taxes_for_loop = [];
				$taxes_for_loop['relation'] = 'AND';
				$posts_per_page = get_theme_mod('post-type-per-page','10');

				$meta = get_post_meta( get_the_ID() );
				$taxDisplayOne = $meta['cpt-tax-display-1'][0] ?? ''; 
				$taxDisplayTwo = $meta['cpt-tax-display-2'][0] ?? ''; 
				$taxDisplayThree = $meta['cpt-tax-display-3'][0] ?? ''; 
				$taxDisplayFour = $meta['cpt-tax-display-4'][0] ?? ''; 
				$order = $meta['bp_cpt_page_order'][0] ?? 'DESC'; 
				$orderby = $meta['bp_cpt_page_orderby'][0] ?? 'date'; 
				
				// get taxonomies associated with current page
				if( $taxDisplayOne ) {
					$taxes_1 = unserialize($taxDisplayOne);
					 $taxes_for_loop[] = array(
					  'taxonomy' => 'custom_cat',
					  'field' => 'slug',
					  'terms' => $taxes_1,
					);
				}
				if( $taxDisplayTwo ) {
					$taxes_2 = unserialize($taxDisplayTwo);
					$taxes_for_loop[] = array(
					  'taxonomy' => 'custom_cat2',
					  'field' => 'slug',
					  'terms' => $taxes_2,
					);
				}			
				if( $taxDisplayThree ) {	
					$taxes_3 = unserialize($taxDisplayThree);
					$taxes_for_loop[] = array(
					  'taxonomy' => 'custom_cat3',
					  'field' => 'slug',
					  'terms' => $taxes_3,
					);
				}
				if( $taxDisplayFour ) {
					$taxes_4 = unserialize($taxDisplayFour);
					$taxes_for_loop[] = array(
					  'taxonomy' => 'custom_cat4',
					  'field' => 'slug',
					  'terms' => $taxes_4,
					);
				}
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
					  'post_type' => 'custom_type',
					  'tax_query' => $taxes_for_loop,
					  'posts_per_page' => $posts_per_page,
					  'paged' => $paged,
					  'order' => $order,
					  'orderby' => $orderby,
				);
				
				$products = new WP_Query( $args );
				/** assigining products to wp query so pagination works **/
				
				$wp_query = $products;
				
					  if( $products->have_posts() ) {
							while( $products->have_posts() ) {
								  $products->the_post();
								  ?>

								  <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> >

										<header class="article-header">                                        
								  
										  <!--<h1><?php // the_title() ?></h1>-->
										  <h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										</header>
								  
										<section class="entry-content">
											  
											  <?php 
											  
											  the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
											  the_excerpt( '<span class="read-more">' . __( 'Read More &raquo;', 'bonestheme' ) . '</span>' ); 
											  
											  ?>

										</section>

								  </article>                                      
								  
								  <?php
							}
					  }else {
						echo 'No Custom Posts!';
					  }
				?>    
				
				<?php bones_page_navi(); ?>	
					
				</main>

		  <?php if( !get_theme_mod( 'remove-cpt-category-sidebar' )){ ?>
				<?php get_sidebar(); ?>
		  <?php } // end if ?>
	</div>

</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>