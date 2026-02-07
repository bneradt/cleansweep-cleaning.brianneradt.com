<?php get_header(); ?>
<?php 
	$themeSettings = get_option( 'theme_mods_blueprint' );
	$layout = $themeSettings[ 'blog_layout' ] ?? 'default';
	$bylineDisplay = $themeSettings[ 'blog_byline' ] ?? '';
	$taxDisplay = $themeSettings[ 'blog_taxonomies' ] ?? '';
	$postLayout = $themeSettings[ 'blog_post_layout' ] ?? '';
	$excerpt = $themeSettings[ 'blog_post_disable_excerpt' ] ?? '';
	$defaultImg = $themeSettings[ 'blog_post_default_featured' ] ?? '';
	
	if ($layout == 'default') {
		$bodyClasses = 'm-all t-2of3 d-5of7 cf';
	} else {
		$bodyClasses = 'm-all t-all d-all blog-grid';
	}
	$title = get_the_title( get_option('page_for_posts', true) );
?>
	<div id="content">

		<div id="inner-content" class="wrap cf">
		
				<h1 class="blog-title"><?php echo $title;?></h1>

				<?php if (have_posts()) : ?>
				<main id="main" class="<?php echo $bodyClasses; ?>" role="main">
					
					<?php while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
						
						
							<?php if ($postLayout == 'block')  { ?>
									<?php if ( has_post_thumbnail()) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
											<?php the_post_thumbnail('medium_large', array('class' => 'image-top', 'alt' => '')); ?>
										</a>
									<?php } elseif ($defaultImg != '') { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
											<img src="<?php echo wp_get_attachment_image_url($defaultImg,'medium_large'); ?>" class="image-top" alt="">
										</a>
									<?php } ?>
								<?php } ?>
						
							<header class="article-header">

								<h2 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

								<p class="byline entry-meta vcard">
										<?php 
											if($bylineDisplay == '' || $bylineDisplay == 'date' ) {
												printf( __( 'Posted', 'bonestheme' ).' %1$s',
													/* the time the post was published */
													'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
												); 
											}
											if($bylineDisplay == '' || $bylineDisplay == 'author' ) {
												printf( __( '', 'bonestheme' ).' %1$s',
													/* the author of the post */
													'<span class="by">by</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
												); 
											}
										?>	
								</p>

							</header>

							<section class="entry-content cf">
								<?php if ($postLayout == '') {?>
									<?php if ( has_post_thumbnail()) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
											<?php the_post_thumbnail('thumbnail', array('class' => 'alignleft', 'alt' => '')); ?>
										</a>
									<?php endif; ?>
								<?php } ?>
								<?php  
									if ($excerpt == '') {
										the_excerpt(); 
									}
								?>
								
							</section>

							<footer class="article-footer cf">

								<?php 
									if($taxDisplay == '' || $taxDisplay == 'cats' ) {
										printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); 
									}
									if($taxDisplay == '' || $taxDisplay == 'tags' ) {
										the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); 
									}
								?>

							</footer>

						</article>

					<?php endwhile; ?>
					<?php if ($layout == 'default') { bones_page_navi(); } ?>
					</main>
					<?php if ($layout == 'grid') { bones_page_navi(); } ?>
					
					<?php else : ?>	
						<main id="main" class="<?php echo $bodyClasses; ?>" role="main"></main>
					<?php endif; ?>


		<?php if ( $layout == 'default' ) { 
			get_sidebar();  
		} ?>
		</div>

	</div>


<?php get_footer(); ?>
