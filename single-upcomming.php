<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Popcorn
 */

get_header();
?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<div class="movie-detail">

		<div class="container">
			<div data-aos="fade-up" data-aos-duration="3000">
			<h1>MOVIE DETAILS</h1>
		    </div>
			<div class="row">
				<div class="col-sm-4">
			       <div class="movie-details"  data-aos="fade-down" data-aos-duration="3000">
				        <?php  the_post_thumbnail(); ?>
			        </div>
		      </div>
		      <div class="col-sm-1"></div>
		      <div class="col-sm-7">
			<div class="about"  data-aos="fade-down" data-aos-duration="3000">
				<?php the_content();?>
			</div>
			<div class="detail-button" data-aos="fade-down" data-aos-duration="3000">
				<button class="give-review" data-toggle="modal" data-target="#exampleModal"> GIVE REVIEW</button>
				<button class="give-review" data-toggle="modal" data-target="#TrailerModal"> WATCH TRAILER</button>
				
			</div>
			 
		</div>
		</div>
		</div>
	</div>
			<div class="modal fade modal-review" id="exampleModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">GIVE REVIEW</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <?php
// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		        ?>


		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">POP</button>
		        <button type="button" class="btn btn-primary">OUT</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="TrailerModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <?php echo get_field('trailer_link'); ?>
		      </div>
		    </div>
		  </div>
		</div>
			<?php

			

			

		endwhile; // End of the loop.
		?>


<?php
get_footer();
