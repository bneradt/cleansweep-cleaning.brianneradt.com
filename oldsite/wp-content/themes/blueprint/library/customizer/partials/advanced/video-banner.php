<?php 
	$sectionType = get_theme_mod( 'slider_or_static' );
	if ($sectionType == 'video') {
		$videoUpload = get_theme_mod( 'video-banner-upload', '' ) ;
		$videoHTML = get_theme_mod( 'video-banner-html', '' ) ;
		$videoHeight = get_theme_mod( 'video-banner-height', '' );
		$videoAspect = get_theme_mod( 'video-aspect-ratio', '56.25' );
		if ($videoHeight) {
			echo '<section class="bp-video-banner" style="max-height: ' . $videoHeight . 'px;overflow: hidden;display: flex;justify-content: center;align-items: center;">';
		} else {
			echo '<section class="bp-video-banner" style="overflow: hidden;display: flex;justify-content: center;align-items: center;">';
		}
		if ($videoUpload) {
			echo '<div style="position:relative;width:100%;padding-top:' . $videoAspect . '%">';
				echo '<video autoplay muted> <source src="' . wp_get_attachment_url($videoUpload) . '" type="video/mp4">Your browser does not support the video tag.</video>';
			echo '</div>';
		} else if ($videoHTML) {
			echo '<div style="position:relative;width:100%;padding-top:' . $videoAspect . '%">';
				echo $videoHTML;
			echo '</div>';
		}
		echo '</section>';
		
	}