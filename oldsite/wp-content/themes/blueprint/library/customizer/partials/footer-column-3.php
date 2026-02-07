<?php if( get_theme_mod( 'default-footer-column-settings' ) =='hide_form' || get_theme_mod( 'default-footer-column-settings' ) =='hide_feed' ) { ?>
	<div class="contact-info footer-1 d-1of2 t-1of2 m-all">

<?php } // end if hide ?>		

<?php if( get_theme_mod( 'default-footer-column-settings' ) =='all' || get_theme_mod( 'default-footer-column-settings' ) =='' ) { ?>	

	<div class="contact-info footer-3 d-1of3 t-1of3 m-all">

<?php } // end if hide ?>

<?php if( get_theme_mod( 'default-footer-column-settings' ) =='hide_contact_us' ) { ?>

	<div style="display: none;" class="contact-info footer-3">
	
<?php } // end if hide ?>	


<div class="footer-col-title" style="color: <?php echo get_theme_mod( 'footer-title-color' ); ?> !important;"><?php echo get_theme_mod( 'business-info-title','Business Hours' ); ?></div>
	
	<?php if( get_theme_mod( 'apt_all' )) { echo "By Appointment Only"; } ?>
	<?php if( !get_theme_mod( 'apt_all' )) { ?>
	<div class="hours">                            
	<!--<div style="margin-bottom: 0px;">Hours:</div>-->
	<div class="cf">
		<div class="open-close"><span class="weekday monday">Monday:</span> 
			<?php if( get_theme_mod( 'monday_other' ) == '' || get_theme_mod( 'monday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'monday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'monday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'monday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'monday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div> 

	<div class="cf">
		<div class="open-close"><span class="weekday">Tuesday:</span> 
			<?php if( get_theme_mod( 'tuesday_other' ) == '' || get_theme_mod( 'tuesday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'tuesday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'tuesday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'tuesday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'tuesday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>

	<div class="cf">
		<div class="open-close"><span class="weekday">Wednesday:</span> 
			<?php if( get_theme_mod( 'wednesday_other' ) == '' || get_theme_mod( 'wednesday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'wednesday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'wednesday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'wednesday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'wednesday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>
		
	<div class="cf">
		<div class="open-close"><span class="weekday">Thursday:</span> 
			<?php if( get_theme_mod( 'thursday_other' ) == '' || get_theme_mod( 'thursday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'thursday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'thursday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'thursday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'thursday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>
		
	<div class="cf">
		<div class="open-close"><span class="weekday">Friday:</span> 
			<?php if( get_theme_mod( 'friday_other' ) == '' || get_theme_mod( 'friday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'friday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'friday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'friday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'friday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>
		
	<div class="cf">
		<div class="open-close"><span class="weekday weekend">Saturday:</span> 
			<?php if( get_theme_mod( 'saturday_other' ) == '' || get_theme_mod( 'saturday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'saturday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'saturday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'saturday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'saturday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>
		
	<div class="cf">
		<div class="open-close"><span class="weekday weekend">Sunday:</span> 
			<?php if( get_theme_mod( 'sunday_other' ) == '' || get_theme_mod( 'sunday_other' ) == 'clear' ) { ?>
				 <?php echo date('g:i a',strtotime(get_theme_mod( 'sunday-open' ))); ?></div> -  
				 <div class="open-close"><?php echo date('g:i a',strtotime(get_theme_mod( 'sunday-close' ))); ?>
			<?php } ?>
			<?php if( get_theme_mod ( 'sunday_other' ) == 'appointment') { echo "By Appointment"; } ?>
			<?php if( get_theme_mod ( 'sunday_other' ) == 'closed') { echo "Closed"; } ?>
		</div>
	</div>

	</div><!--hours-->   
	<?php } // end if not hidehours ?>

	<!--
			<div class="footer-social">                                                            
				<?php if( get_theme_mod( 'add-facebook' )) { ?>
					<a href="<?php echo get_theme_mod( 'facebook_url' ); ?>" target="_new"><i class="fab fa-facebook-square"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-twitter' )) { ?>
					<a href="<?php echo get_theme_mod( 'twitter_url' ); ?>" target="_new"><i class="fab fa-twitter-square"></i></a>
				<?php } // end if ?>

				  <?php if( get_theme_mod( 'add-google' )) { ?>
					<a href="<?php echo get_theme_mod( 'google_url' ); ?>" target="_new"><i class="fab fa-google" aria-hidden="true"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-youtube' )) { ?>
					<a href="<?php echo get_theme_mod( 'youtube_url' ); ?>" target="_new"><i class="fab fa-youtube"></i></a>
				<?php } // end if ?>
				
				<?php if( get_theme_mod( 'add-instagram' )) { ?>
					<a href="<?php echo get_theme_mod( 'instagram_url' ); ?>" target="_new"><i class="fab fa-instagram"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-pinterest' )) { ?>
					<a href="<?php echo get_theme_mod( 'pinterest_url' ); ?>" target="_new"><i class="fab fa-pinterest-square"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-linkedin' )) { ?>
					<a href="<?php echo get_theme_mod( 'linkedin_url' ); ?>" target="_new"><i class="fab fa-linkedin"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-yelp' )) { ?>
					<a href="<?php echo get_theme_mod( 'yelp_url' ); ?>" target="_new"><i class="fab fa-yelp"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-tripadvisor' )) { ?>
				 	<a href="<?php echo get_theme_mod( 'tripadvisor_url' ); ?>" target="_new"><i class="fab fa-tripadvisor"></i></a>
				<?php } // end if ?>

				<?php if( get_theme_mod( 'add-etsy' )) { ?>
				 	<a href="<?php echo get_theme_mod( 'etsy_url' ); ?>" target="_new"><i class="fab fa-etsy"></i></a>
				<?php } // end if ?>
				
				<?php if( get_theme_mod( 'add-houzz' )) { ?>
    				<a href="<?php echo get_theme_mod( 'houzz_url' ); ?>" target="_new"><i class="fab fa-houzz"></i></a>
				<?php } // end if ?>

			</div><!--footer-social-->
	
</div><!--footer-3--> 
