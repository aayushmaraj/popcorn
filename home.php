<?php

/**
*Template Name: Full-Width page

*/
get_header();
?>




<div class="home">
	<div class="container">

		<div class="top-recommended"  data-aos="fade-up" data-aos-duration="3000">
			<h1>TOP RECOMMENDED</h1>
			<br>
			<div class="row">
				<?php
						# code...
					
					$args = array(
					  'post_type'   => 'movie',
					  'post_status' => 'publish',
					  
					 );
					 
					$movie = new WP_Query( $args );
					if( $movie->have_posts() ) :
					?>
					    <?php
					      while( $movie->have_posts() ) :
					        $movie->the_post();
					        ?>
					        <div class="col-sm-3">

					<a  href="<?php the_permalink(); ?>"  class="onclick"  data-toggle="modal" data-target="#exampleModal" ><?php the_post_thumbnail();  ?></a>
				</div>
					        <?php
					      endwhile;
					      wp_reset_postdata();
					    ?>
					<?php
					else :
					  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
					endif;
					

					?>
				
			</div>
		</div>
		<!-- Modal -->
<div class="modal fade" id="exampleModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php if ( ! is_user_logged_in() ) { // Display WordPress login form: 
	$args = array( 'redirect' => home_url().'/movie', 'form_id' => 'loginform-custom', 'label_username' => __( '' ), 'label_password' => __( '' ),  'label_log_in' => __( 'Log In ' ), 'remember' => true ); wp_login_form( $args ); } else { // If logged in:
	 wp_loginout( home_url() ); // Display "Log Out" link. 
	 echo " | "; wp_register('', ''); // Display "Site Admin" link. 
	} ?>
       
      </div>
    </div>
  </div>
</div>


		<div class="up-comming" data-aos="fade-up" data-aos-duration="3000">
			<h1>UPCOMMING MOVIES </h1>
			<br>
			<div class="row">
				<div class="col-md-12">

				<div class="up-commingslider movie-carousel">
				
				<?php
						# code...
					
					$args = array(
					  'post_type'   => 'upcomming',
					  'post_status' => 'publish',
					  
					 );
					 
					$upcomming_movie = new WP_Query( $args );
					if( $upcomming_movie->have_posts() ) :
					?>
					    <?php
					      while( $upcomming_movie->have_posts() ) :
					        $upcomming_movie->the_post();
					        ?>
					         <div class="upcoming-image carousel-image">

					<a  href="<?php the_permalink(); ?>" ><?php the_post_thumbnail();  ?></a>
				</div>
					        <?php
					      endwhile;
					      wp_reset_postdata();
					    ?>
					<?php
					else :
					  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
					endif;
					

					?>
			</div>
				
			</div>
		</div>
		</div><!-- .up-coming -->



		<div class="tv-series" data-aos="fade-up" data-aos-duration="3000">
			<h1>TV SERIES </h1>
			<br>
			<div class="row">
				<div class="col-md-12">

				<div class="up-commingslider movie-carousel">
				
				<?php
						# code...
					
					$args = array(
					  'post_type'   => 'tvseries',
					  'post_status' => 'publish',
					  
					 );
					 
					$tvseries = new WP_Query( $args );
					if( $tvseries->have_posts() ) :
					?>
					    <?php
					      while( $tvseries->have_posts() ) :
					        $tvseries->the_post();
					        ?>
					         <div class="upcoming-image carousel-image">

					<a  href="<?php the_permalink(); ?>" ><?php the_post_thumbnail();  ?></a>
				</div>
					        <?php
					      endwhile;
					      wp_reset_postdata();
					    ?>
					<?php
					else :
					  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
					endif;
					

					?>
			</div>
				
			</div>
		</div>
		</div><!-- .up-coming -->

     </div>
</div>

<?php
get_footer();
?>