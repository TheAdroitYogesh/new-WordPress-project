<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title		= get_the_title();
	$i	= 1;
	?>
				
			<?php 
			if( have_rows('page_banner') ): 
			while( have_rows('page_banner') ): the_row();
			
				get_template_part('partials/banners/home/page_banner');
			
			endwhile;
			endif;
			
			get_template_part('rows/page_rows');
			?>

	<?php endwhile; ?>

<?php get_footer(); ?>