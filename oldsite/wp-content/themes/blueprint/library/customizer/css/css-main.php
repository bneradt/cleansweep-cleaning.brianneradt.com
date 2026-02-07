body {
	<?php if(  get_theme_mod('body-typography') ) { ?>font-family: <?php echo get_theme_mod( 'body-typography' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'body-font-weight', '400' ); ?>;
	position:relative;
}
.wrap {
	max-width:<?php echo get_theme_mod('blueprint-max-width','1140'); ?>px;
}
<?php if ( get_theme_mod('header-max-width') ) { ?>
#inner-header.wrap,
.inner-top-bar.wrap {
    max-width:<?php echo get_theme_mod('header-max-width'); ?>px;
}
<?php } ?>
<?php if ( get_theme_mod('footer-max-width') ) { ?>
#inner-footer.wrap {
    max-width:<?php echo get_theme_mod('footer-max-width'); ?>px;
}
<?php } ?>
<?php if ( get_theme_mod( 'basic-or-advanced' ) !=='realestatepage') { ?>
#content {
	background-color: <?php echo get_theme_mod( 'main-content-bg-color', '#fff' ); ?>;
<?php if(get_theme_mod( 'main-content-bg-img-position' )) {?>
	background-position:<?php echo get_theme_mod( 'main-content-bg-img-position' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'main-content-bg-attachment' )) {?>
	background-attachment: <?php echo get_theme_mod( 'main-content-bg-attachment' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'main-content-bg-img-size' )) {?>
	background-size: <?php echo get_theme_mod( 'main-content-bg-img-size' ); ?>;
<?php } ?>
}
<?php  } //end if NOT real estate ?>

<?php if ( get_theme_mod( 'basic-or-advanced' ) =='realestatepage') { ?>
#container {
	background: #f7f7f7;
}
#content {
	background-color: #f7f7f7 !important;
	border-bottom: 1px solid #ddd;					
}
<?php  } //end if NOT real estate ?>
<?php if (get_theme_mod( 'main-content-text-color' )) {?>
#content, h1, h2, h3, h4, h5, h6 {
	color: <?php echo get_theme_mod( 'main-content-text-color' ); ?>;
}
<?php } ?>
#content a {
	color: <?php echo get_theme_mod( 'main-content-link-color', '#071230' ); ?>;
	text-decoration: <?php echo get_theme_mod( 'main-content-link-text-decoration', 'underline' ); ?>;
}
#content a:hover,#content a:active,#content a:focus {
	color: <?php echo get_theme_mod( 'main-content-link-hover-color', '#071230' ); ?>;
}
<?php if ( get_theme_mod( 'basic-or-advanced' ) !== 'realestatepage' ) { ?>
.header-social svg{
	fill: <?php echo get_theme_mod( 'sm-color', '#fff' ); ?>;
}
<?php  } //end if real estate ?>
.header-address svg {
    vertical-align: -0.125em;
}
<?php if ( get_theme_mod( 'basic-or-advanced' ) == 'realestatepage' ) { ?>
.header-social, .header-social a, .header-social a:visited, .header-social .fa {
	color: #000;
	font-size: 26px;
}
<?php  } //end if NOT real estate ?>
<?php if( !get_theme_mod( 'add-facebook' ) && !get_theme_mod( 'add-twitter' ) && !get_theme_mod( 'add-google' ) && !get_theme_mod( 'add-instagram' && !get_theme_mod( 'add-pinterest' && !get_theme_mod( 'add-youtube' ) && !get_theme_mod( 'add-linkedin' ) && !get_theme_mod( 'add-yelp' ) && !get_theme_mod( 'add-tripadvisor' ) && !get_theme_mod( 'add-etsy' ) ) )) { ?>
	.customize-partial-edit-shortcut-sm-color {
		display: none;
	}
<?php } // end if not no sm ?>
<?php if( !get_theme_mod( 'top-bar-use-widgets' )) { ?>
.inner-top-bar {
	display: flex;
	align-items:center;	
}
<?php } // end if not nowrap ?>
<?php if ( get_theme_mod( 'basic-or-advanced' ) !== 'realestatepage') { ?>
.top-bar {
	background-color: <?php echo get_theme_mod( 'topbar-color-picker', '#000000' ); ?>;
}
.top-bar, .header-phone a {
	color: <?php echo get_theme_mod( 'topbar-text-color', '#ffffff' ); ?>;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	<?php if( get_theme_mod( 'h1-font-family' ) ) { ?>font-family: <?php echo get_theme_mod( 'h1-font-family' );?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'h1-font-weight' ); ?>;
}		
<?php  } //end if NOT real estate ?>
<?php if ( get_theme_mod( 'basic-or-advanced' ) =='realestatepage') { ?>
.top-bar, .re-header-phone a {
	color: #000 !important;
}
.top-bar {
	border-bottom: 1px solid #ddd;	
	color: #000;
}
h1, h2, h3, h4, h5 {
	font-family: Oswald !important;
}
.footer h4 {
	font-family: Oswald !important;
}
<?php  } // end if real estate ?>
<?php if(get_theme_mod( 'page-title-color' )) { ?>
.page-title {
	color: <?php echo get_theme_mod( 'page-title-color' ); ?>;
}
<?php } ?>
<?php if(get_theme_mod( 'nav-over-banner' )) { ?>
.home header.header {
	position: absolute;
	top:0;
	right: 0;
	left: 0;
	z-index: 100;
}
<?php } ?>
/** NAV **/
<?php if( get_theme_mod ( 'basic-or-advanced' ) == 'basic' || get_theme_mod ( 'basic-or-advanced' ) == '' || get_theme_mod ( 'basic-nav-layout' )) { ?>
<?php if ( get_theme_mod( 'logo-nav-bg-color-picker', '#ffffff' ) ) { ?>
.logo-nav {
	background-color: <?php echo get_theme_mod( 'logo-nav-bg-color-picker', '#ffffff' ); ?>;
}
<?php } ?>
nav .nav li a, nav .nav li button {
	background-color: <?php if ( get_theme_mod( 'nav-item-bg-color-picker' ) ) { echo get_theme_mod( 'nav-item-bg-color-picker' ); } else { echo 'unset'; } ?>; 
	color: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#000' ); ?>;
	<?php if ( get_theme_mod( 'nav-font-weight' ) ) { ?>font-weight: <?php echo get_theme_mod( 'nav-font-weight' ); ?>;<?php } ?>
	<?php if ( get_theme_mod( 'nav-font-family' ) ) { ?>font-family: <?php echo get_theme_mod( 'nav-font-family' ); ?>;<?php } ?>
	padding: 1.75em .75em;
}
nav .nav li button svg {
	fill: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#000' ); ?>;
	vertical-align: -0.125em;
}
nav .nav li a:hover, nav .nav li a:focus, nav .nav li button:hover, nav .nav li button:focus, nav .nav li:hover, nav .nav li:hover button, nav .nav li:hover > span > a {
	background-color: <?php echo get_theme_mod( 'nav-item-hover-bg-color-picker', '#444' ); ?>;			
	color: <?php echo get_theme_mod( 'nav-item-hover-text-color-picker', '#fff' ); ?>;	
	text-decoration: none;
}
nav .nav li button:hover svg, nav .nav li button:active svg , nav .nav li button:focus svg  {
	fill: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#fff' ); ?>;
}
.nav li.current-menu-item a, .nav li.current_page_item a, .nav li.current_page_ancestor a {
	background-color: <?php echo get_theme_mod( 'nav-item-active-bg-color-picker','#444' ); ?>;
	color: <?php echo get_theme_mod( 'nav-item-active-text-color-picker', '#fff' ); ?>;
}
.nav li ul.sub-menu li a, .nav li ul.children li a {
	background-color: <?php echo get_theme_mod( 'sub-nav-item-bg-color-picker', '#fff' ); ?>;
	color: <?php echo get_theme_mod( 'sub-nav-item-text-color-picker', 'inherit' ); ?>;
}
.nav li ul.sub-menu li a:hover, .nav li ul.sub-menu li a:focus, .nav li ul.children li a:hover, .nav li ul.children li a:focus {
	background-color: <?php echo get_theme_mod( 'sub-nav-item-hover-bg-color-picker', '#444' ); ?>;
	color: <?php echo get_theme_mod( 'sub-nav-item-hover-text-color-picker', '#fff' ); ?>;
}
<?php } //end if basic ?>
<?php if( get_theme_mod ( 'basic-or-advanced' ) == 'advanced' && !get_theme_mod ( 'basic-nav-layout' ) ) { ?>
nav .nav li a, nav .nav li button  {
	background-color: <?php echo get_theme_mod( 'nav-item-bg-color-picker', '#6E6E6E' ); ?>;
	color: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#fff' ); ?>;
	<?php if ( get_theme_mod( 'nav-font-weight' ) ) { ?>font-weight: <?php echo get_theme_mod( 'nav-font-weight' ); ?>;<?php } ?>
	<?php if ( get_theme_mod( 'nav-font-family' ) ) { ?>font-family: <?php echo get_theme_mod( 'nav-font-family' ); ?>;<?php } ?>
}
nav .nav li button svg {
	fill: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#fff' ); ?>;
	vertical-align: -0.125em;
}
nav .nav li a:hover, nav .nav li a:focus, nav .nav li button:hover, nav .nav li button:focus, nav .nav li:hover, nav .nav li:hover button, nav .nav li:hover > span > a {
	background-color: <?php echo get_theme_mod( 'nav-item-hover-bg-color-picker', '#444' ); ?>;			
	color: <?php echo get_theme_mod( 'nav-item-hover-text-color-picker', '#fff' ); ?> ;	
	text-decoration: none;
}
nav .nav li button:hover svg, nav .nav li button:active svg , nav .nav li button:focus svg  {
	fill: <?php echo get_theme_mod( 'nav-item-text-color-picker', '#fff' ); ?>;
}
.nav li.current-menu-item a, .nav li.current_page_item a, .nav li.current_page_ancestor a {
	background-color: <?php echo get_theme_mod( 'nav-item-active-bg-color-picker','#444' ); ?> ;
	color: <?php echo get_theme_mod( 'nav-item-active-text-color-picker', '#fff' ); ?>;
}
.nav li ul.sub-menu li a, .nav li ul.children li a {
	background-color: <?php echo get_theme_mod( 'sub-nav-item-bg-color-picker', '#6E6E6E' ); ?>;
	color: <?php echo get_theme_mod( 'sub-nav-item-text-color-picker', '#fff' ); ?>;
}
.nav li ul.sub-menu li a:hover, .nav li ul.sub-menu li a:focus, .nav li ul.children li a:hover, .nav li ul.children li a:focus {
	background-color: <?php echo get_theme_mod( 'sub-nav-item-hover-bg-color-picker', '#444' ); ?>;
	color: <?php echo get_theme_mod( 'sub-nav-item-hover-text-color-picker', '#fff' ); ?>;
}
<?php } // end if advanced ?>
<?php if(!(get_theme_mod( 'nav-text-align' ) == 'inherit' || get_theme_mod( 'nav-text-align' ) == '' )) { ?>
nav .nav li {
	float: none;
}
nav > ul {
	display:flex;
	justify-content: <?php echo get_theme_mod( 'nav-text-align' ); ?>;
	flex-wrap: wrap;
}
nav ul .sub-menu {
	text-align: left;	
}
<?php } // end if nav alignment ?>
/** END NAV **/

/** Banner slider **/
<?php for ($i = 1; $i <= 5; $i++){ ?>
.banner-<?php echo $i; ?>{
	min-height: 150px; 
	background-size: <?php echo get_theme_mod( 'banner-bg-size-' . $i,'cover' ); ?>;
<?php if (get_theme_mod( 'banner-img-behavior-' . $i )) {?>
	background-position:<?php echo get_theme_mod( 'banner-img-behavior-' . $i ); ?>;
<?php } ?>
<?php if (get_theme_mod( 'banner-bg-attachment-' . $i  )) {?>
	background-attachment: <?php echo get_theme_mod( 'banner-bg-attachment-' . $i  ); ?>;
<?php } ?>
}
.slider-cta-<?php echo $i; ?>, .slider-cta-<?php echo $i; ?> .title {
	color:<?php echo get_theme_mod( 'cta-text-color-' . $i , '#fff' ); ?>;
}
.slider-cta-<?php echo $i; ?> .button-<?php echo $i; ?> a {
	background-color: <?php echo get_theme_mod( 'cta-button-bg-color-picker-' . $i , '#444444' ); ?>;
	color: <?php echo get_theme_mod( 'cta-button-text-color-picker-' . $i , '#ffffff' ); ?>;
}
.slider-cta-<?php echo $i; ?> a:hover {
	background-color: <?php echo get_theme_mod( 'cta-button-hover-bg-color-picker-' . $i , '#cccccc' ); ?>;			
	color: <?php echo get_theme_mod( 'cta-button-hover-text-color-picker-' . $i , '#000000' ); ?>;	
}
.slider-cta-<?php echo $i; ?> .title {
<?php if (!empty(get_theme_mod( 'cta-title-font-family-' . $i  ))) { if(get_theme_mod( 'cta-title-font-family-' . $i  ) != 'inherit' ) {?>
	font-family: <?php echo get_theme_mod( 'cta-title-font-family-' . $i  ); ?>; 
<?php } }?>
<?php if (get_theme_mod( 'cta-title-font-weight-' . $i  )) {?>
	font-weight: <?php echo get_theme_mod( 'cta-title-font-weight-' . $i  ); ?>;
<?php } ?>
	font-size: 1.75em;
	line-height: 1.4em;
	margin-bottom: 0.375em;
}
.slider-cta-<?php echo $i; ?> {
<?php if (!empty(get_theme_mod( 'cta-text-font-family-' . $i  ))) { if(get_theme_mod( 'cta-text-font-family-' . $i  ) != 'inherit' ) {?>
	font-family: <?php echo get_theme_mod( 'cta-text-font-family-' . $i  ); ?>;
<?php } } ?>
<?php if (get_theme_mod( 'cta-text-font-weight-' . $i  )) {?>
	font-weight: <?php echo get_theme_mod( 'cta-text-font-weight-' . $i  ); ?>;
<?php } ?>
}

<?php } // end loop for banner slider css ?>

/* static cta */
<?php if( get_theme_mod ( 'use-static-cta' )) { ?>
.banner-wrapper {
	position: relative;
}
.static-cta-container {
	position: absolute;
	<?php if( get_theme_mod ( 'static-cta-vertical-center' )) { ?>
	bottom: <?php echo get_theme_mod( 'static-cta-margin-top', '40' ); ?>%;
	<?php } else {?>
	bottom:50%;
	transform: translateY(50%);
	<?php }?>
	<?php if (get_theme_mod('static-cta-horizontal-position') != 'left') { ?>right: 0;<?php } ?>
	<?php if (get_theme_mod('static-cta-horizontal-position') != 'right') { ?>left: 0;<?php } ?>
}
.static-cta-bg {
	z-index: 999;
}

<?php } // end if use static cta ?>
<?php if( !get_theme_mod ( 'use-static-cta' )) { ?>
.banner-slide .shared-banner-cta {
	position: absolute;
	<?php if( get_theme_mod ( 'static-cta-vertical-center' )) { ?>
	bottom: <?php echo get_theme_mod( 'static-cta-margin-top', '40' ); ?>%;
	<?php } else {?>
	bottom:50%;
	transform: translateY(50%);
	<?php }?>
	<?php if (get_theme_mod('static-cta-horizontal-position') != 'left') { ?>right: 0;<?php } ?>
	<?php if (get_theme_mod('static-cta-horizontal-position') != 'right') { ?>left: 0;<?php } ?>
}
<?php } ?>
.banner-wrapper .banner-slide {
	min-height:<?php echo get_theme_mod( 'slider-min-height', '300' ); ?>px;
	position:relative;
}

/* end static cta */

/** banner static image **/
.banner {
	min-height:<?php echo get_theme_mod( 'banner-height', '200' ); ?>px;
<?php if(get_theme_mod( 'banner-bg-size' )) {?>
	background-size: <?php echo get_theme_mod( 'banner-bg-size' ); ?>;		
<?php } ?>
<?php if(get_theme_mod( 'banner-img-behavior' )) {?>
	background-position:<?php echo get_theme_mod( 'banner-img-behavior' ); ?>;
<?php } ?>
position:relative;
}
.banner .shared-banner-cta{
	position:absolute;
	<?php if( get_theme_mod ( 'banner-cta-vertical-center' )) { ?>
	bottom: <?php echo get_theme_mod( 'banner-cta-bottom-positioning', '0' ); ?>%;
	<?php } else { ?>
	bottom:50%;
	transform: translateY(50%);
	<?php }?>
	<?php if (get_theme_mod('banner-cta-horizontal-position') != 'left') { ?>right: 0;<?php } ?>
	<?php if (get_theme_mod('banner-cta-horizontal-position') != 'right') { ?>left: 0;<?php } ?>
	transition: linear 300ms;
}
<?php if( get_theme_mod( 'banner-bg-attachment' )) {?>
@media only screen and (min-width: 990px) {

.banner {
	background-attachment: <?php echo get_theme_mod( 'banner-bg-attachment' ); ?>;
}
}
<?php } ?>
.banner-cta, .banner-cta .title {
	color:<?php echo get_theme_mod( 'cta-text-color', '#fff' ); ?>;
}
.banner-cta .button a {
	background-color: <?php echo get_theme_mod( 'cta-button-bg-color-picker', '#444444' ); ?>;
	color: <?php echo get_theme_mod( 'cta-button-text-color-picker', '#ffffff' ); ?>;
}
.banner-cta a:hover, .banner-cta a:focus {
	background-color: <?php echo get_theme_mod( 'cta-button-hover-bg-color-picker', '#cccccc' ); ?>;			
	color: <?php echo get_theme_mod( 'cta-button-hover-text-color-picker', '#000000' ); ?>;	
}
.banner-cta .title {
	<?php if( get_theme_mod( 'cta-title-font-family' ) ) { ?>font-family: <?php echo get_theme_mod( 'cta-title-font-family' ); ?>;<?php } ?>
	<?php if( get_theme_mod( 'cta-title-font-weight' ) ) {?>font-weight: <?php echo get_theme_mod( 'cta-title-font-weight' ); ?>;<?php } ?>
	font-size: 1.75em;
	line-height: 1.4em;
}		
.banner-cta {
<?php if( get_theme_mod( 'cta-text-font-family' ) ) { ?>font-family: <?php echo get_theme_mod( 'cta-text-font-family' ); ?>;<?php } ?>
<?php if( get_theme_mod( 'cta-text-font-weight' ) ) {?>
	font-weight: <?php echo get_theme_mod( 'cta-text-font-weight' ); ?>;
<?php } ?>
}
/** end banner static image **/


/** start pre main section **/
/** pre main service boxes **/
.service-boxes-pre {
	background-color: <?php echo get_theme_mod( 'service-section-bg-color-pre', '#6E6E6E'); ?>;
	background-position:<?php echo get_theme_mod( 'service-section-bg-img-position-pre' ); ?>;
	background-attachment: <?php echo get_theme_mod( 'service-section-bg-attachment-pre' ); ?>;
	background-size: <?php echo get_theme_mod( 'service-section-bg-img-size-pre' ); ?>;	
}
<?php if (get_theme_mod( 'service-box-text-color-pre' )) {?>
.service-boxes-pre, .service-boxes-pre h2 {
	color: <?php echo get_theme_mod( 'service-box-text-color-pre' ); ?>;
}
<?php } ?>
<?php if (get_theme_mod( 'service-box-link-color-pre' ) || get_theme_mod( 'service-box-link-text-decoration-pre' )) {?>
.service-boxes-pre a {
	color: <?php echo get_theme_mod( 'service-box-link-color-pre' ); ?>;
	text-decoration: <?php echo get_theme_mod( 'service-box-link-text-decoration-pre' ); ?>;
}
<?php } ?>
.service-boxes-pre a:hover {
	color: <?php echo get_theme_mod( 'service-box-link-hover-color-pre' ); ?>;
}
.service-boxes-pre .h2  {
<?php if(get_theme_mod( 'service-box-title-color-pre' )) {?>
	color: <?php echo get_theme_mod( 'service-box-title-color-pre' ); ?>;
<?php } ?>
	<?php if ( get_theme_mod( 'service-box-title-font-family-pre' ) ) { ?> font-family: <?php echo get_theme_mod( 'service-box-title-font-family-pre' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-title-font-weight-pre', 'normal' ); ?>;
}
.service-boxes-pre {
	<?php if ( get_theme_mod( 'service-box-text-font-family-pre' ) ) { ?>font-family: <?php echo get_theme_mod( 'service-box-text-font-family-pre' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-text-font-weight-pre','normal' ); ?>;
}			
<?php if (get_theme_mod( 'service-box-button-bg-color-picker-pre' ) || get_theme_mod( 'service-box-button-text-color-picker-pre' )) {?>
.pre-main-content .service-boxes-pre .service-button-pre a {
	background-color: <?php echo get_theme_mod( 'service-box-button-bg-color-picker-pre' ); ?>;			
	color: <?php echo get_theme_mod( 'service-box-button-text-color-picker-pre' ); ?>;	
}
<?php } ?>
<?php if (get_theme_mod( 'service-box-button-hover-bg-color-picker-pre' ) || get_theme_mod( 'service-box-button-hover-text-color-picker-pre' )) {?>
.pre-main-content .service-boxes-pre .service-button-pre a:hover {
	background-color: <?php echo get_theme_mod( 'service-box-button-hover-bg-color-picker-pre' ); ?>;		
	color: <?php echo get_theme_mod( 'service-box-button-hover-text-color-picker-pre' ); ?>;	
}
<?php } ?>
/** end service boxes **/

/** top carousel **/
.multiple-items-pre .carousel-image img {
	height: <?php echo get_theme_mod( 'carousel-slide-height-pre', '275'); ?>px;
	object-fit:cover;
	width:100%;
	padding: <?php echo get_theme_mod( 'space-between-slides-pre', '0' ); ?>px;
}

/* Post Carousel */
.pre-main-content .carousel-post {
	padding: 0 <?php echo get_theme_mod( 'post-space-between-slides-pre', '0' ); ?>px;
}
.pre-main-content .carousel-post-inner {
	background-color:  <?php echo get_theme_mod( 'post-carousel-bg-color-pre', '#ffffff' ); ?>;
	width: 100%;
}
.pre-main-content .carousel-post > a {
	display:block;
	text-decoration:none;
}
.pre-main-content .fs-post-title,
.pre-main-content .fs-post-excerpt {
	color:<?php echo get_theme_mod( 'post-carousel-text-color-pre', '#000000'); ?>;
}
.pre-main-content .carousel-post img {
    padding: 0;
	height: <?php echo get_theme_mod( 'post-carousel-slide-height-pre', '275'); ?>px;
	object-fit:cover;
	width:100%;
}
.pre-main-content .carousel-post .fs-post-button {
    display: inline-block;
    border: 2px solid #000000;
    text-decoration: none;
    padding: 5px 20px;
	background-color: <?php echo get_theme_mod( 'post-carousel-button-color-pre', '#000000'); ?>;
	color: <?php echo get_theme_mod( 'post-carousel-button-text-color-pre', '#ffffff'); ?>;
}
<?php if ( get_theme_mod('post-carousel-image-pos-pre') ) { ?>
.pre-main-content .carousel-post.img-left {
    display: flex !important;
}
@media(min-width:768px) {
.pre-main-content .carousel-post.img-left img {
    width: 40%;
    float: left;
}
.pre-main-content .carousel-post.img-left .fs-post-info {
    padding: 10px 30px 10px 20px;
    width: 60%;
    float: left;
    text-align: left;
}
}
<?php } ?>
/** end pre main section**/

/** start pre main section 2 **/			
/** pre main service boxes 2 **/
.service-boxes-pre-2 {
	background-color: <?php echo get_theme_mod('service-section-bg-color-pre-2', '#000'); ?>;
	background-position:<?php echo get_theme_mod( 'service-section-bg-img-position-pre-2' ); ?>;
	background-attachment: <?php echo get_theme_mod( 'service-section-bg-attachment-pre-2' ); ?>;
	background-size: <?php echo get_theme_mod( 'service-section-bg-img-size-pre-2' ); ?>;	
}
<?php if (get_theme_mod( 'service-box-text-color-pre-2' )) {?>
.service-boxes-pre-2, .service-boxes-pre-2 h2 {
	color: <?php echo get_theme_mod( 'service-box-text-color-pre-2' ); ?>;
}
<?php } ?>
<?php if ( get_theme_mod( 'service-box-link-color-pre-2' ) || get_theme_mod( 'service-box-link-text-decoration-pre-2' )) {?>
.service-boxes-pre-2 a {
	color: <?php echo get_theme_mod( 'service-box-link-color-pre-2' ); ?>;
	text-decoration: <?php echo get_theme_mod( 'service-box-link-text-decoration-pre-2' ); ?>;
}
<?php } ?>
.service-boxes-pre-2 a:hover {
	color: <?php echo get_theme_mod( 'service-box-link-hover-color-pre-2' ); ?>;
}
.service-boxes-pre-2 .h2  {
<?php if(get_theme_mod( 'service-box-title-color-pre-2' )) { ?>
	color: <?php echo get_theme_mod( 'service-box-title-color-pre-2' ); ?>;
<?php } ?>
	<?php if(get_theme_mod( 'service-box-title-font-family-pre-2' )) { ?>font-family: <?php echo get_theme_mod( 'service-box-title-font-family-pre-2' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-title-font-weight-pre-2', 'normal' ); ?>;
}
.service-boxes-pre-2 {
	<?php if ( get_theme_mod( 'service-box-text-font-family-pre-2' )) { ?>font-family: <?php echo get_theme_mod( 'service-box-text-font-family-pre-2' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-text-font-weight-pre-2', 'normal' ); ?>;
}			
<?php if (get_theme_mod( 'service-box-button-bg-color-picker-pre-2' ) || get_theme_mod( 'service-box-button-text-color-picker-pre-2' )) {?>
.pre-main-content-2 .service-boxes-pre-2 .service-button-pre-2 a {
	background-color: <?php echo get_theme_mod( 'service-box-button-bg-color-picker-pre-2' ); ?>;			
	color: <?php echo get_theme_mod( 'service-box-button-text-color-picker-pre-2' ); ?>;	
}
<?php } ?>
<?php if (get_theme_mod( 'service-box-button-hover-bg-color-picker-pre-2' ) || get_theme_mod( 'service-box-button-hover-text-color-picker-pre-2' )) {?>
.pre-main-content-2 .service-boxes-pre-2 .service-button-pre-2 a:hover {
	background-color: <?php echo get_theme_mod( 'service-box-button-hover-bg-color-picker-pre-2' ); ?>;		
	color: <?php echo get_theme_mod( 'service-box-button-hover-text-color-picker-pre-2' ); ?>;	
}
<?php } ?>
/** end service boxes **/		

/** top carousel 2 **/

.multiple-items-pre-2 img {
	height: <?php echo (get_theme_mod( 'carousel-slide-height-pre-2' ) ? get_theme_mod( 'carousel-slide-height-pre-2' ) : '275');?>px;
	object-fit:cover;
	width:100%;
	padding: <?php echo get_theme_mod( 'space-between-slides-pre-2', '0' ); ?>px;
}

/* Post Carousel */
.pre-main-content-2 .carousel-post {
	padding: 0 <?php echo get_theme_mod( 'post-space-between-slides-pre-2', '0' ); ?>px;
}
.pre-main-content-2 .carousel-post-inner {
	background-color:  <?php echo get_theme_mod( 'post-carousel-bg-color-pre', '#ffffff' ); ?>;
	width: 100%;
}
.pre-main-content-2 .carousel-post > a {
	display:block;
	text-decoration:none;
}
.pre-main-content-2 .fs-post-title,
.pre-main-content-2 .fs-post-excerpt {
	color:<?php echo get_theme_mod( 'post-carousel-text-color-pre-2', '#000000'); ?>;
}
.pre-main-content-2 .carousel-post img {
    padding: 0;
	height: <?php echo get_theme_mod( 'post-carousel-slide-height-pre-2', '275'); ?>px;
	object-fit:cover;
	width:100%;
}
.pre-main-content-2 .carousel-post .fs-post-button {
    display: inline-block;
    border: 2px solid #000000;
    text-decoration: none;
    padding: 5px 20px;
	background-color: <?php echo get_theme_mod( 'post-carousel-button-color-pre-2', '#000000'); ?>;
	color: <?php echo get_theme_mod( 'post-carousel-button-text-color-pre-2', '#ffffff'); ?>;
}
<?php if ( get_theme_mod('post-carousel-image-pos-pre-2') ) { ?>
.pre-main-content-2 .carousel-post.img-left {
    display: flex !important;
}
@media(min-width:768px) {
.pre-main-content-2 .carousel-post.img-left img {
    width: 40%;
    float: left;
}
.pre-main-content-2 .carousel-post.img-left .fs-post-info {
    padding: 10px 30px 10px 20px;
    width: 60%;
    float: left;
    text-align: left;
}
}
<?php } ?>
/** end pre main 2 section**/

/** start post main**/
.post-main-content .service-boxes {
<?php if (get_theme_mod( 'service-section-bg-img-position' )){?>
	background-position:<?php echo get_theme_mod( 'service-section-bg-img-position' ); ?>;
<?php }?>
<?php if (get_theme_mod( 'service-section-bg-attachment' )){?>
	background-attachment: <?php echo get_theme_mod( 'service-section-bg-attachment' ); ?>;
<?php }?>
<?php if (get_theme_mod( 'service-section-bg-img-size' )){?>
	background-size: <?php echo get_theme_mod( 'service-section-bg-img-size' ); ?>;
<?php } ?>
<?php if( (get_theme_mod ( 'basic-or-advanced' ) !=='realestatepage') && get_theme_mod( 'service-section-bg-color' )) { ?>	
	background-color: <?php echo get_theme_mod( 'service-section-bg-color' ); ?>;
<?php } // end if NOT realestate ?>
<?php if( get_theme_mod ( 'basic-or-advanced' ) =='realestatepage' ) { ?>	
	background-color: #fff; 
	border-top: 1px solid #ddd;
	border-bottom: 1px solid #ddd;
	color: #000;
<?php } // end if realestate ?>
	font-family: <?php echo get_theme_mod( 'service-box-text-font-family', 'inherit' ); ?>;
	font-weight: <?php echo get_theme_mod( 'service-box-text-font-weight', 'normal' ); ?> ;
<?php if( get_theme_mod( 'service-boxes-or-carousel' ) == 'map' || get_theme_mod( 'service-boxes-or-carousel' ) == '' && get_theme_mod ( 'basic-or-advanced' ) == 'advanced' ) { ?>
	padding: 0;
	height: <?php echo get_theme_mod( 'map-min-height', '350' ); ?>px;
<?php } // end if map css ?>
}
<?php if(get_theme_mod( 'service-box-text-color' )) {?>
.service-boxes, .service-boxes h2 {
	color: <?php echo get_theme_mod( 'service-box-text-color' ); ?>;
}
<?php } ?>
<?php if ( get_theme_mod( 'service-box-link-color' ) || get_theme_mod( 'service-box-link-text-decoration' )) {?>
.service-boxes a {
	color: <?php echo get_theme_mod( 'service-box-link-color' ); ?>;
	text-decoration: <?php echo get_theme_mod( 'service-box-link-text-decoration' ); ?>;
}
<?php } ?>
<?php if (get_theme_mod( 'service-box-link-hover-color' )) {?>
.service-boxes a:hover {
	color: <?php echo get_theme_mod( 'service-box-link-hover-color' ); ?>;
}
<?php } ?>
.service-boxes h2  {
<?php if(get_theme_mod( 'service-box-title-color' )) { ?>
	color: <?php echo get_theme_mod( 'service-box-title-color' ); ?>;
<?php } ?>
	<?php if(get_theme_mod( 'service-box-title-font-family' )) { ?>font-family: <?php echo get_theme_mod( 'service-box-title-font-family' ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-title-font-weight', 'normal' ); ?>;
}			
<?php if( get_theme_mod ( 'basic-or-advanced' ) =='realestatepage' ) { ?> 
.service-boxes h2  {
	color: #000;
	font-family: oswald !important;
}
<?php } // end if realestate ?>

<?php if (get_theme_mod( 'service-box-button-bg-color-picker' ) || get_theme_mod( 'service-box-button-text-color-picker' )) {?>
.post-main-content .service-boxes .service-button a {
	background-color: <?php echo get_theme_mod( 'service-box-button-bg-color-picker' ); ?>;			
	color: <?php echo get_theme_mod( 'service-box-button-text-color-picker' ); ?>;	
}
<?php } ?>
<?php if(get_theme_mod( 'service-box-button-hover-bg-color-picker' ) || get_theme_mod( 'service-box-button-hover-text-color-picker' )) {?>
.post-main-content .service-boxes .service-button a:hover {
	background-color: <?php echo get_theme_mod( 'service-box-button-hover-bg-color-picker' ); ?>;		
	color: <?php echo get_theme_mod( 'service-box-button-hover-text-color-picker' ); ?>;	
}
<?php } ?>	
/** bottom carousel **/
.multiple-items img {
	height: <?php echo (get_theme_mod( 'carousel-slide-height' ) ? get_theme_mod( 'carousel-slide-height') : '275');?>px;
	object-fit:cover;
	width:100%;
	padding: <?php echo get_theme_mod( 'space-between-slides', '0' ); ?>px;
}
/* Post Carousel*/
.post-main-content .carousel-post {
	padding: 0 <?php echo get_theme_mod( 'post-space-between-slides', '0' ); ?>px;
}
.post-main-content .carousel-post-inner {
	background-color:  <?php echo get_theme_mod( 'post-carousel-bg-color-pre', '#ffffff' ); ?>;
	width: 100%;
}
.post-main-content .carousel-post > a {
	display:block;
	text-decoration:none;
}
.post-main-content .fs-post-title,
.post-main-content .fs-post-excerpt {
	color:<?php echo get_theme_mod( 'post-carousel-text-color', '#000000'); ?>;
}
.post-main-content .carousel-post img {
    padding: 0;
	height: <?php echo get_theme_mod( 'post-carousel-slide-height', '275'); ?>px;
	object-fit:cover;
	width:100%;
}
.post-main-content .carousel-post .fs-post-button {
    display: inline-block;
    border: 2px solid #000000;
    text-decoration: none;
    padding: 5px 20px;
	background-color: <?php echo get_theme_mod( 'post-carousel-button-color', '#000000'); ?>;
	color: <?php echo get_theme_mod( 'post-carousel-button-text-color', '#ffffff'); ?>;
}
<?php if ( get_theme_mod('post-carousel-image-pos') ) { ?>
.post-main-content .carousel-post.img-left {
    display: flex !important;
}
@media(min-width:768px) {
.post-main-content .carousel-post.img-left img {
    width: 40%;
    float: left;
}
.post-main-content .carousel-post.img-left .fs-post-info {
    padding: 10px 30px 10px 20px;
    width: 60%;
    float: left;
    text-align: left;
}
}
<?php } ?>
/** end post main section **/

/** start post main 2 (bottom feature section 2)**/	
<?php for ($i = 2; $i <= 6; $i++){
?>
.post-main-content-<?php echo $i; ?> .service-boxes-<?php echo $i; ?> {
	background-color: <?php echo get_theme_mod( 'service-section-bg-color-' . $i ); ?>; 
	background-position:<?php echo get_theme_mod( 'service-section-bg-img-position-' . $i ); ?>;
	background-attachment: <?php echo get_theme_mod( 'service-section-bg-attachment-' . $i ); ?>;
	background-size: <?php echo get_theme_mod( 'service-section-bg-img-size-' . $i ); ?>;
	font-family: <?php echo get_theme_mod( 'service-box-text-font-family-' . $i, 'inherit' ); ?>;
	font-weight: <?php echo get_theme_mod( 'service-box-text-font-weight-' . $i, 'normal' ); ?>;
<?php if( get_theme_mod( 'service-boxes-or-carousel-' . $i ) =='map' ) { ?>
	padding: 0;
	
<?php } // end if map css ?>
}
<?php if( get_theme_mod( 'service-boxes-or-carousel-' . $i ) =='map' ) { ?>
.post-main-content-<?php echo $i; ?> .service-boxes-<?php echo $i; ?> #map {
	height: <?php echo get_theme_mod( 'map-min-height-' . $i, '350' ); ?>px;
}
<?php } // end if map css ?>
.service-boxes-<?php echo $i; ?>, .service-boxes-<?php echo $i; ?> h2 {
	color: <?php echo get_theme_mod( 'service-box-text-color-' . $i ); ?>;
}
.service-boxes-<?php echo $i; ?> a {
	color: <?php echo get_theme_mod( 'service-box-link-color-' . $i ); ?>;
	text-decoration: <?php echo get_theme_mod( 'service-box-link-text-decoration-' . $i ); ?>;
}
.service-boxes-<?php echo $i; ?> a:hover {
	color: <?php echo get_theme_mod( 'service-box-link-hover-color-' . $i ); ?>;
}
.service-boxes-<?php echo $i; ?> h2  {
<?php if(get_theme_mod( 'service-box-title-color-' . $i )) { ?>
	color: <?php echo get_theme_mod( 'service-box-title-color-' . $i ); ?>;
<?php } ?>
	<?php if(get_theme_mod( 'service-box-title-font-family-' . $i )) { ?>font-family: <?php echo get_theme_mod( 'service-box-title-font-family-' . $i ); ?>;<?php } ?>
	font-weight: <?php echo get_theme_mod( 'service-box-title-font-weight-' . $i, 'normal' ); ?>;
}
<?php if (get_theme_mod( 'service-box-button-bg-color-picker-' . $i ) || get_theme_mod( 'service-box-button-text-color-picker-' . $i )) {?>
.post-main-content-<?php echo $i; ?> .service-boxes-<?php echo $i; ?> .service-button-<?php echo $i; ?> a {
	background-color: <?php echo get_theme_mod( 'service-box-button-bg-color-picker-' . $i ); ?>;			
	color: <?php echo get_theme_mod( 'service-box-button-text-color-picker-' . $i ); ?>;	
}
<?php } ?>
<?php if (get_theme_mod( 'service-box-button-hover-bg-color-picker-' . $i ) || get_theme_mod( 'service-box-button-hover-text-color-picker-' . $i )) { ?>
.post-main-content-<?php echo $i; ?> .service-boxes-<?php echo $i; ?> .service-button-<?php echo $i; ?> a:hover {
	background-color: <?php echo get_theme_mod( 'service-box-button-hover-bg-color-picker-' . $i ); ?>;		
	color: <?php echo get_theme_mod( 'service-box-button-hover-text-color-picker-' . $i ); ?>;	
}
<?php } ?>
/** bottom carousel **/
.multiple-items-<?php echo $i; ?> img {
	height: <?php echo (get_theme_mod( 'carousel-slide-height-' . $i ) ? get_theme_mod( 'carousel-slide-height-' . $i) : '275');?>px;
	object-fit:cover;
	width:100%;
	padding: <?php echo get_theme_mod( 'space-between-slides-' . $i, '0' ); ?>px;
}
/* Post Carousel*/
.post-main-content-<?php echo $i; ?> .carousel-post {
	padding: 0 <?php echo get_theme_mod( 'post-space-between-slides-' . $i, '0' ); ?>px;
}
.post-main-content-<?php echo $i; ?> .carousel-post-inner {
	background-color:  <?php echo get_theme_mod( 'post-carousel-bg-color-pre', '#ffffff' ); ?>;
	width: 100%;
}
.post-main-content-<?php echo $i; ?> .carousel-post > a {
	display:block;
	text-decoration:none;
}
.post-main-content-<?php echo $i; ?> .fs-post-title,
.post-main-content-<?php echo $i; ?> .fs-post-excerpt {
	color:<?php echo get_theme_mod( 'post-carousel-text-color-' . $i, '#000000'); ?>;
}
.post-main-content-<?php echo $i; ?> .carousel-post img {
    padding: 0;
	height: <?php echo get_theme_mod( 'post-carousel-slide-height-' . $i, '275'); ?>px;
	object-fit:cover;
	width:100%;
}
.post-main-content-<?php echo $i; ?> .carousel-post .fs-post-button {
    display: inline-block;
    border: 2px solid #000000;
    text-decoration: none;
    padding: 5px 20px;
	background-color: <?php echo get_theme_mod( 'post-carousel-button-color-' . $i, '#000000'); ?>;
	color: <?php echo get_theme_mod( 'post-carousel-button-text-color-' . $i, '#ffffff'); ?>;
}
<?php if ( get_theme_mod('post-carousel-image-pos-' . $i ) ) { ?>
.post-main-content-<?php echo $i; ?> .carousel-post.img-left {
    display: flex !important;
}
@media(min-width:768px) {
.post-main-content-<?php echo $i; ?> .carousel-post.img-left img {
    width: 40%;
    float: left;
}
.post-main-content-<?php echo $i; ?> .carousel-post.img-left .fs-post-info {
    padding: 10px 30px 10px 20px;
    width: 60%;
    float: left;
    text-align: left;
}
}
<?php } ?>
<?php } // end loop for additional bottom feature sections css ?>

/** end post main section 2**/

/** start widget title link styles**/
.pre-main-content .widgettitle a, .pre-main-content-2 .widgettitle a, .post-main-content .widgettitle a, .post-main-content-2 .widgettitle a, .post-main-content-3 .widgettitle a, .post-main-content-4 .widgettitle a, .post-main-content-5 .widgettitle a, .post-main-content-6 .widgettitle a{ 		
	text-decoration: none;
	color: inherit;
}
/** end widget title link styles**/

#sidebar1 .widget .widgettitle, #sidebar1 .widget_block > h2 {
<?php if( !(get_theme_mod( 'widget-title-font-family' ) == 'inherit' || get_theme_mod( 'widget-title-font-family' ) == '' )) {?>
	font-family: <?php echo get_theme_mod( 'widget-title-font-family' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'widget-title-font-weight' )) {?>
	font-weight: <?php echo get_theme_mod( 'widget-title-font-weight' ); ?>;
<?php } ?>
	background-color: <?php echo get_theme_mod( 'widget-title-bg-color', '#ccc' ); ?>;
	color: <?php echo get_theme_mod( 'widget-title-text-color', '#000' ); ?>;
	border-bottom: 2px solid <?php echo get_theme_mod( 'widget-title-border-color', '#444' ); ?>;
	font-size: 1.1em;
	padding-left: 0.5em;
}
#sidebar1 .widget{
<?php if(get_theme_mod( 'widget-text-color' )) {?>
	color: <?php echo get_theme_mod( 'widget-text-color' ); ?>;
<?php } ?>
<?php if( !(get_theme_mod( 'widget-text-font-family' ) == 'inherit' || get_theme_mod( 'widget-text-font-family' ) == '' )) {?>
	font-family: <?php echo get_theme_mod( 'widget-text-font-family'); ?>;
<?php } ?>
<?php if(get_theme_mod( 'widget-text-font-weight' )) {?>
	font-weight: <?php echo get_theme_mod( 'widget-text-font-weight' ); ?>;
<?php } ?>
}
#sidebar1 .widget a {
<?php if(get_theme_mod( 'widget-link-color' )) {?>
	color: <?php echo get_theme_mod( 'widget-link-color' ); ?>;
<?php } ?>
<?php if( !(get_theme_mod( 'widget-link-font-family' ) == 'inherit' || get_theme_mod( 'widget-link-font-family' ) == '' )) {?>
	font-family: <?php echo get_theme_mod( 'widget-link-font-family'); ?>;
<?php } ?>
<?php if(get_theme_mod( 'widget-link-font-weight' )) {?>
	font-weight: <?php echo get_theme_mod( 'widget-link-font-weight' ); ?>;
<?php } ?>
} 
<?php if ( get_theme_mod( 'basic-or-advanced' ) !=='realestatepage') { ?>
.pre-footer-form {
	background-color:<?php echo get_theme_mod( 'pre-footer-form-bg-color', '#fff' ); ?>;
}
.pre-footer-form input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], select, textarea, .field {
	background-color: <?php echo get_theme_mod( 'pre-footer-form-field-bg-color', '#ddd' ); ?>;	
	max-width: 100%;
	color: <?php echo get_theme_mod( 'pre-footer-form-field-text-color', '#000' ); ?>;
}
.pre-footer-form input[type="text"]:focus, .pre-footer-form input[type="text"]:active, .pre-footer-form input[type="password"]:focus, input[type="password"]:active, input[type="datetime"]:focus, input[type="datetime"]:active, input[type="datetime-local"]:focus, input[type="datetime-local"]:active, input[type="date"]:focus, input[type="date"]:active, input[type="month"]:focus, input[type="month"]:active, input[type="time"]:focus, input[type="time"]:active, input[type="week"]:focus, input[type="week"]:active, input[type="number"]:focus, input[type="number"]:active, input[type="email"]:focus, input[type="email"]:active, input[type="url"]:focus, input[type="url"]:active, input[type="search"]:focus, input[type="search"]:active, input[type="tel"]:focus, input[type="tel"]:active, input[type="color"]:focus, input[type="color"]:active, select:focus, select:active, textarea:focus, textarea:active, .field:focus, .field:active {
	filter: brightness(105%);
	outline: none;
}
.pre-footer-form .gform_fields .gfield input::-webkit-input-placeholder, .pre-footer-form .gform_fields .gfield textarea::-webkit-input-placeholder {
/* Chrome/Opera/Safari */
	color: <?php echo get_theme_mod( 'pre-footer-form-field-text-color', '#757575' ); ?>; 
}
.pre-footer-form .gform_fields .gfield input::-moz-placeholder, .pre-footer-form .gform_fields .gfield textarea::-webkit-input-placeholder { 
	/* Firefox 19+ */
	color: <?php echo get_theme_mod( 'pre-footer-form-field-text-color', '#757575' ); ?>; 
}
.pre-footer-form .gform_fields .gfield input:-ms-input-placeholder, .pre-footer-form .gform_fields .gfield textarea:-ms-input-placeholder, {
	/* IE 10+ */
	color: <?php echo get_theme_mod( 'pre-footer-form-field-text-color', '#757575' ); ?>; 
}
.pre-footer-form .gform_fields .gfield input:-moz-placeholder, .pre-footer-form .gform_fields .gfield textarea:-ms-input-placeholder, {
	/* Firefox 18- */
	color: <?php echo get_theme_mod( 'pre-footer-form-field-text-color', '#757575' ); ?>; 
}
.pre-footer-form-title {
	margin-top: 0;	
	margin-bottom: 1.33em;
	padding-top: 1.4em;
	font-size: 1.1em;
	font-weight: 700;
	<?php if(get_theme_mod( 'pre-footer-contact-form-title-color' )) {?>
	color: <?php echo get_theme_mod( 'pre-footer-contact-form-title-color' ); ?>;
	<?php } ?>
}
.pre-footer-form .gform_wrapper {
	margin-bottom: 0px;
	padding-bottom: 16px;
}
.pre-footer-cta {
	padding: 1em 0 2.5em;
	text-align: center;   						
	background-color: <?php echo get_theme_mod( 'pre-footer-cta-section-bg-color', '#9e9e9e' ); ?>; 
}
footer.footer {
<?php if(get_theme_mod( 'footer-bg-color' )) {?>
	background-color:<?php echo get_theme_mod( 'footer-bg-color' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-text-color' )) {?>
	color:<?php echo get_theme_mod( 'footer-text-color' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-text-font-family' )) {?>
	font-family: <?php echo get_theme_mod( 'footer-text-font-family' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-text-font-weight' )) {?>
	font-weight: <?php echo get_theme_mod( 'footer-text-font-weight' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-bg-img-position' )) {?>
	background-position:<?php echo get_theme_mod( 'footer-bg-img-position' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-bg-attachment' )) {?>
	background-attachment: <?php echo get_theme_mod( 'footer-bg-attachment' ); ?>;
<?php } ?>
<?php if(get_theme_mod( 'footer-bg-img-size' )) {?>
	background-size: <?php echo get_theme_mod( 'footer-bg-img-size' ); ?>;
<?php } ?>
}
#footer-columns .footer-col-title {
	font-weight: <?php echo get_theme_mod( 'footer-column-title-font-weight-h4', 'bold' ); ?>; 
	margin: 1.3em 0 1.5em;
	font-size: 1.1em;
}
.pre-footer-cta-title {
	font-size: 1.1em;
	font-weight: 700;
	margin: 1.33em 0;
}
.inner-pre-footer-cta a {
	border: 2px solid #000;
	padding: .25em .5em;
	text-transform: uppercase;					
	text-decoration: none;
	font-weight: bold;
	color: <?php echo get_theme_mod( 'pre-footer-cta-button-text-color-picker', '#000000' ); ?>;
	background-color: <?php echo get_theme_mod( 'pre-footer-cta-button-bg-color-picker', '#9e9e9e' ); ?>;
}
.inner-pre-footer-cta a:hover {
	color: <?php echo get_theme_mod( 'pre-footer-cta-button-text-color-picker-hover', '#ffffff' ); ?>;
	background-color: <?php echo get_theme_mod( 'pre-footer-cta-button-bg-color-picker-hover', '#444444' ); ?>;
}
.footer-nav {
	margin-top: 0px;
}
<?php  } //end if NOT real estate ?>
<?php if ( get_theme_mod( 'basic-or-advanced' ) =='realestatepage') { ?>
.footer {
	background: #f7f7f7;
	border-top: 1px solid #ddd;
}		
.gfield input, textarea, .lidd_mc_input input {
	border: 1px solid #ddd;
}
<?php  } //end if real estate ?>
.footer a {
	color: <?php echo get_theme_mod( 'footer-link-color', '#000' ); ?>;
	text-decoration: <?php echo get_theme_mod( 'footer-link-text-decoration', 'none' ); ?>;
}
.footer a:hover {
	color: <?php echo get_theme_mod( 'footer-link-hover-color' ); ?>;
}
.bottom-bar {
	background: <?php echo get_theme_mod( 'bottombar-bg-color', '#000000' ); ?>;
	color: <?php echo get_theme_mod( 'bottombar-text-color', '#fff' ); ?>;
}
.bottom-bar a, .bottom-bar a:active, .bottom-bar a:visited{
	color: <?php echo get_theme_mod( 'bottombar-text-color', '#fff' ); ?>;
}
.bottom-bar svg,
.contact-info .social svg {
	fill:  <?php echo get_theme_mod( 'sm-color-footer', '#fff' ); ?>;
}
/**  WooCommerce Styles  **/
<?php if( get_theme_mod( 'hide-sidebar-product' )) { ?>
.single-product main {
	width: 100%;
}
<?php } // end if hide product sidebar ?>
<?php if( get_theme_mod( 'hide-sidebar-shop' )) { ?>
.post-type-archive-product main {
	width: 100%;
}
<?php } // end if hide product sidebar ?>
<?php if( get_theme_mod( 'hide-sidebar-woo-category' )) { ?>
.tax-product_cat main {
	width: 100%;
}
<?php } // end if hide product sidebar ?>
/** End WooCommerce Styles **/

/**  Nav Skiplink Styles  **/
.screen-reader-text {
	border: 0;
	clip: rect(1px,1px,1px,1px);
	-webkit-clip-path: inset(50%);
	clip-path: inset(50%);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute;
	width: 1px;
	word-wrap: normal;
}
.screen-reader-text:focus {
	background-color: #f1f1f1;
	border-radius: 3px;
	box-shadow: 0 0 2px 2px rgb(0 0 0 / 60%);
	clip: auto;
	display: block;
	font-weight: 700;
	height: auto;
	left: 0;
	line-height: normal;
	padding: 1em 1.618em;
	text-decoration: none;
	top: 0;
	width: auto;
	z-index: 100000;
	outline: none;
}
.screen-reader-text.skip-link:focus {
	-webkit-clip-path: none;
}
.bp-video-banner iframe, 
.bp-video-banner video, 
.bp-video-banner .rll-youtube-player{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
}
.fs-post-info {padding: 10px;}
<?php 
$shiftOptions = get_option('shiftnav_togglebar');
if ( isset($shiftOptions) ) {
$style = $shiftOptions['toggle_target'] ?? '';
$color = $shiftOptions['text_color'] ?? '#fff';
if ( $style == 'entire_bar' ) { ?>
#shiftnav-toggle-main.shiftnav-toggle.shiftnav-toggle-main-entire-bar:before {content:url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" height="16" width="14" fill="<?php echo urlencode($color);?>" viewBox="0 0 448 512"%3E%3C!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--%3E%3Cpath d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/%3E%3C/svg%3E');}
<?php } else { ?>
button#shiftnav-toggle-main-button svg{fill:<?php echo $color; ?>}
<?php } }?>
@media only screen and (min-width: 768px) {
<?php if(get_theme_mod('service-section-display-type-pre') == true) { ?>div.inner-pre-content-widgets {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-pre-2') == true) { ?>div.inner-pre-content-widgets-2 {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type') == true) { ?>div.inner-post-content-widgets {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-2') == true) { ?>div.inner-post-content-widgets-2 {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-3') == true) { ?>div.inner-post-content-widgets-3 {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-4') == true) { ?>div.inner-post-content-widgets-4 {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-5') == true) { ?>div.inner-post-content-widgets-5 {display: block;}<?php } ?>
<?php if(get_theme_mod('service-section-display-type-6') == true) { ?>div.inner-post-content-widgets-6 {display: block;}<?php } ?>
}