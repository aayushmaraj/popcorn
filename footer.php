<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Popcorn
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'popcorn' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'popcorn' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'popcorn' ), 'popcorn', '<a href="http://underscores.me/">aayushma</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
	$(document).ready(function(){
		$('.movie-carousel').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1000,
			centerPadding: '60px',
			prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
		});

		AOS.init();

	  	$("#signup-link").click(function(e){
	  		e.preventDefault();
		    $("#login-form").addClass("hidden");
		    $("#signup-form").removeClass("hidden");
		    $(".modal-title").html("SIGN UP")
		});


		$("#login-link").click(function(e){
		  	 e.preventDefault();
			 $("#login-form").removeClass("hidden");
			 $("#signup-form").addClass("hidden");
			 $(".modal-title").html("LOG IN")
		});


	});

</script>
<?php wp_footer(); ?>

</body>
</html>
