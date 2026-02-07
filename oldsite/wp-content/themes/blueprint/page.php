<?php get_header(); ?>

<?php if ( has_post_thumbnail() ) { ?>
	<?php $pageFeatImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<div class="page-feat-img" style="background-image:url(<?php echo $pageFeatImg[0] ?>);min-height: 150px;background-position: center center"></div>
<?php } // end if feat img ?>

	<div id="content" <?php if (get_theme_mod('main-content-bg-image')) {?>style="background-image:url(<?php echo get_theme_mod('main-content-bg-image'); ?>);"<?php } ?>>
		<?php do_action('blueprint_content_before'); ?>
		<div id="inner-content" class="wrap cf">
				
			 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<main id="post-<?php the_ID(); ?>" <?php 
					if( ( is_front_page() && get_theme_mod( 'front-page-layout' ) ) || ( !is_front_page() && get_theme_mod( 'page-layout' ) ) ) {
						post_class('m-all t-2of3 d-5of7 cf');
					} else {
						post_class('m-all t-all d-all cf');
					}

				?> >

					<header class="article-header">
					
						<h1 class="page-title"><?php the_title(); ?></h1>									

					</header> <?php // end article header ?>
						
					<section class="entry-content cf">
					
						<?php the_content(); ?>
						
					</section> <?php // end article section ?>
						
						
				</main>
			<?php endwhile; endif; ?>
			
			<?php if( is_front_page() && get_theme_mod( 'front-page-layout' )){ ?> 
				<?php get_sidebar(); ?>
			<?php } // end if ?>
			<?php if( !is_front_page() && get_theme_mod( 'page-layout' )){ ?>
				<?php get_sidebar(); ?>
			<?php } // end if ?>
			
		</div>
		<?php do_action('blueprint_content_after'); ?>
	</div>

<?php get_footer(); ?>