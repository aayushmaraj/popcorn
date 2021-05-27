<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Popcorn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body   data-spy="scroll" data-target=".header" data-offset="50">
<div id="page" class="site">
<div class="header" data-spy="affix" data-offset-top="197">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-3">
			<div class="logo">
			
           <?php
           if ( function_exists( 'the_custom_logo' ) ) {
						 the_custom_logo();
						} 

           ?>
</div>
</div>
		<div class="col-sm-5 col-md-5 offset-md-1">
			<div class="navigation" >
				<?php
				wp_nav_menu( array(
				'theme-location' => 'menu-1',
				'menu-id'=> 'primary-menu'
				) );
				?>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="search-box">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>"> 
					<label> <span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span> <input type="search" class="form" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" /> </label>
					 <button type="submit" class="search-submit"><i class="fa fa-search"></i></button> 
					</form>
			</div>
		</div>
		</div>
	</div>
</div>





	<div id="content" class="site-content">
		