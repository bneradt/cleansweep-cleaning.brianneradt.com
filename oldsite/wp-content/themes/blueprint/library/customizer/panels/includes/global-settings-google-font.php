<?php //ADDS GOOGLE FONT SELECT IN THE CUSTOMIZER
function google_fonts() {
	$fontarray = [];
	$weight = '';
	if(get_theme_mod( 'body-typography' ) == 'inherit' || get_theme_mod( 'body-typography' ) == '') {
		$defaultfont = 'Lato:ital,wght@0,400;0,700;1,400;1,700';
		array_push($fontarray,$defaultfont);
	} 
	else {
		$f1 = get_theme_mod( 'body-typography' );
		switch(get_theme_mod( 'body-font-weight')) {
			case 'bold': $weight = ':wght@400;700'; break; 
			case 'lighter': $weight = ':wght@300;400'; break;
		}
		if( get_theme_mod( 'h1-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'h1-font-family' ) == 'inherit'){ 
			switch(get_theme_mod( 'h1-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
			if( get_theme_mod( 'h1-font-weight' ) != get_theme_mod( 'footer-column-title-font-weight-h4' ) ){
				$weight = ':wght@300;400;700';
			}
		}
		if( get_theme_mod( 'nav-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'nav-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'nav-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'cta-title-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'cta-title-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'cta-title-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'cta-text-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'cta-text-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'cta-text-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'service-box-title-font-family-pre' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-title-font-family-pre' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-title-font-weight-pre' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'service-box-text-font-family-pre' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-text-font-family-pre' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-text-font-weight-pre')) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		
		if( get_theme_mod( 'service-box-title-font-family-pre-2' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-title-font-family-pre-2' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-title-font-weight-pre-2' )) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'service-box-text-font-family-pre-2' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-text-font-family-pre-2' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-text-font-weight-pre-2')) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'service-box-title-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-title-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-title-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'service-box-text-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-text-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'service-box-text-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 	
		for($i = 1; $i <= 5; $i++){
			if( get_theme_mod( 'service-box-title-font-family-' . $i ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-title-font-family-' . $i ) == 'inherit' ){
				switch(get_theme_mod( 'service-box-title-font-weight-' . $i )) {
					case 'bold': $weight = ':wght@400;700'; break; 
					case 'lighter': $weight = ':wght@300;400'; break;
				}
			} 
			if( get_theme_mod( 'service-box-text-font-family-' . $i ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'service-box-text-font-family-' . $i ) == 'inherit' ){
				switch(get_theme_mod( 'service-box-text-font-weight-' . $i )) {
					case 'bold': $weight = ':wght@400;700'; break; 
					case 'lighter': $weight = ':wght@300;400'; break;
				}
			} 	
		}
		if( get_theme_mod( 'widget-title-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'widget-title-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'widget-title-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'widget-text-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'widget-text-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'widget-text-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break;
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'footer-text-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'footer-text-font-family' ) == 'inherit' ){
			switch(get_theme_mod( 'footer-text-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		} 
		if( get_theme_mod( 'footer-column-title-font-family' ) == get_theme_mod( 'body-typography' ) || get_theme_mod( 'footer-column-title-font-family' ) == 'inherit' ){ 
			switch(get_theme_mod( 'footer-column-title-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
			}
		}
		$f1 = $f1 . $weight;
		$fontarray[] = $f1;
	}
	if(!(get_theme_mod( 'h1-font-family' ) == 'inherit' || get_theme_mod( 'h1-font-family' ) == '')) { 
			$f2 = urlencode(get_theme_mod( 'h1-font-family' ));
			$weight = '';
			switch(get_theme_mod( 'h1-font-weight' )) {
				case 'bold': $weight = ':wght@400;700'; break; 
				case 'lighter': $weight = ':wght@300;400'; break;
				}
			if( get_theme_mod( 'h1-font-weight' ) != get_theme_mod( 'footer-column-title-font-weight-h4' ) ){ 
			$weight = ':wght@300;400;700';
			}
			$f2 = $f2 . $weight;
			$fontarray[] = $f2;
	} // end if 
	if(!(get_theme_mod( 'nav-font-family' ) == 'inherit' || get_theme_mod( 'nav-font-family' ) == '')) { 
			$f3 = urlencode(get_theme_mod( 'nav-font-family'));
			$weight = '';
			switch(get_theme_mod( 'nav-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f3 = $f3 . $weight;
			$fontarray[] = $f3;
	}// end if 
	if(!(get_theme_mod( 'cta-title-font-family' ) == 'inherit' || get_theme_mod( 'cta-title-font-family' ) == '')) { 
			$f4 = urlencode(get_theme_mod( 'cta-title-font-family'));
			$weight = '';
			switch(get_theme_mod( 'cta-title-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f4 = $f4 . $weight;	
			$fontarray[] = $f4;
	}// end if 
	if(!(get_theme_mod( 'cta-text-font-family' ) == 'inherit' || get_theme_mod( 'cta-text-font-family' ) == '')) { 
			$f5 = urlencode(get_theme_mod( 'cta-text-font-family'));
			$weight = '';
			switch(get_theme_mod( 'cta-text-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f5 = $f5 . $weight;
			$fontarray[] = $f5;
	} // end if 
	if(!(get_theme_mod( 'service-box-title-font-family-pre' ) == 'inherit' || get_theme_mod( 'service-box-title-font-family-pre' ) == '')) { 
			$f6 = urlencode(get_theme_mod( 'service-box-title-font-family-pre' ));
			$weight = '';
			switch(get_theme_mod( 'service-box-title-font-weight-pre' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f6 = $f6 . $weight;
			$fontarray[] = $f6;
	}// end if 
	if(!(get_theme_mod( 'service-box-text-font-family-pre' ) == 'inherit' || get_theme_mod( 'service-box-text-font-family-pre' ) == '')) { 
			$f7 = urlencode(get_theme_mod( 'service-box-text-font-family-pre' ));
			$weight = '';		
			switch(get_theme_mod( 'service-box-text-font-weight-pre' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f7 = $f7 . $weight;
			$fontarray[] = $f7;
	}// end if 
		if(!(get_theme_mod( 'service-box-title-font-family-pre-2' ) == 'inherit' || get_theme_mod( 'service-box-title-font-family-pre-2' ) == '')) { 
			$f8 = urlencode(get_theme_mod( 'service-box-title-font-family-pre-2' ));
			$weight = '';
			switch(get_theme_mod( 'service-box-title-font-weight-pre-2' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f8 = $f8 . $weight;
			$fontarray[] = $f8;
		}// end if 
		if(!(get_theme_mod( 'service-box-text-font-family-pre-2' ) == 'inherit' || get_theme_mod( 'service-box-text-font-family-pre-2' ) == '')) { 
				$f9 = urlencode(get_theme_mod( 'service-box-text-font-family-pre-2' ));
				$weight = '';		
				switch(get_theme_mod( 'service-box-text-font-weight-pre-2' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
				$f9 = $f9 . $weight;
				$fontarray[] = $f9;
		}// end if 
	if(!(get_theme_mod( 'service-box-title-font-family' ) == 'inherit' || get_theme_mod( 'service-box-title-font-family' ) == '')) { 
			$f10 = urlencode(get_theme_mod( 'service-box-title-font-family' ));
			 $weight = '';
			switch(get_theme_mod( 'service-box-title-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f10 = $f10 . $weight;
			$fontarray[] = $f10;
	}// end if 
	if(!(get_theme_mod( 'service-box-text-font-family' ) == 'inherit' || get_theme_mod( 'service-box-text-font-family' ) == '')) { 
			$f11 = urlencode(get_theme_mod( 'service-box-text-font-family' ));
			$weight = '';
			switch(get_theme_mod( 'service-box-text-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f11 = $f11 . $weight;
			$fontarray[] = $f11;
	}// end if
	for($i = 1; $i <= 5; $i++){
		if(!(get_theme_mod( 'service-box-title-font-family-' . $i ) == 'inherit' || get_theme_mod( 'service-box-title-font-family-' . $i ) == '')) { 
				$f12 = urlencode(get_theme_mod( 'service-box-title-font-family-' . $i ));
				 $weight = '';
				switch(get_theme_mod( 'service-box-title-font-weight-' . $i )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
				$f12 = $f12 . $weight;
				$fontarray[] = $f12;
		}// end if 
		
		if(!(get_theme_mod( 'service-box-text-font-family-' . $i ) == 'inherit' || get_theme_mod( 'service-box-text-font-family-' . $i  ) == '')) { 
				$f13 = urlencode(get_theme_mod( 'service-box-text-font-family-' . $i ));
				$weight = '';
				switch(get_theme_mod( 'service-box-text-font-weight-' . $i )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
				$f13 = $f13 . $weight;
				$fontarray[] = $f13;
		}// end if 
	}
	if(!(get_theme_mod( 'widget-title-font-family' ) == 'inherit' || get_theme_mod( 'widget-title-font-family' ) == '')) { 
			$f14 = urlencode(get_theme_mod( 'widget-title-font-family' ));
			 $weight = '';
			switch(get_theme_mod( 'widget-title-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f14 = $f14 . $weight;
			$fontarray[] = $f14;
	}// end if 
	if(!(get_theme_mod( 'widget-text-font-family' ) == 'inherit' || get_theme_mod( 'widget-text-font-family' ) == '')) { 
			$f15 = urlencode(get_theme_mod( 'widget-text-font-family' ));
			$weight = '';
			switch(get_theme_mod( 'widget-text-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f15 = $f15 . $weight;
			$fontarray[] = $f15;
	}// end if 
	if(!(get_theme_mod( 'footer-text-font-family' ) == 'inherit' || get_theme_mod( 'footer-text-font-family' ) == '')) { 
			$f16 = urlencode(get_theme_mod( 'footer-text-font-family' ));
			$weight = '';
			switch(get_theme_mod( 'footer-text-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f16 = $f16 . $weight;
			$fontarray[] = $f16;
	}// end if 
	if(!(get_theme_mod( 'footer-column-title-font-family' ) == 'inherit' || get_theme_mod( 'footer-column-title-font-family' ) == '')) { 
			$f17 = urlencode(get_theme_mod( 'footer-column-title-font-family' ));
			$weight = '';
			switch(get_theme_mod( 'footer-column-title-font-weight' )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
			$f17 = $f17 . $weight;
			$fontarray[] = $f17;
	} // end if 
	
	for($i = 1; $i <= 5; $i++){ //banner cta title font family 1-5 
		if(!(get_theme_mod( 'cta-title-font-family-' . $i ) == 'inherit' || get_theme_mod( 'cta-title-font-family-' . $i ) == '')){ 
				$f18 = urlencode(get_theme_mod( 'cta-title-font-family-' . $i ));
				$weight = '';
				switch(get_theme_mod( 'cta-title-font-weight-' . $i )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
				$f18 = $f18 . $weight;
				$fontarray[] = $f18;
		} 
		//banner cta text font family 1-5 
		if(!(get_theme_mod( 'cta-text-font-family-' . $i ) == 'inherit' || get_theme_mod( 'cta-text-font-family-' . $i ) == '')){ 
				$f19 = urlencode(get_theme_mod( 'cta-text-font-family-' . $i ));
				$weight = '';
				switch(get_theme_mod( 'cta-text-font-weight-' . $i  )) {case 'bold': $weight = ':wght@400;700'; break; case 'lighter': $weight = ':wght@300;400'; break;}
				$f19 = $f19 . $weight;
				$fontarray[] = $f19;
		}
	}
	$uniquearray = array_unique($fontarray);
	$separated = implode('&family=',$uniquearray);
	$includefonts = 'https://fonts.googleapis.com/css2?family=' . $separated . '&display=swap';
	wp_enqueue_style('googleFonts', $includefonts, array(), null);
}
add_action('wp_enqueue_scripts', 'google_fonts');
function google_preconnect(){
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'google_preconnect',7);
?>