<?php
/**
 * Template Name: Wishlist
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title	= get_the_title();
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
			
			<?php
			if( have_rows('page_banner') ): 
				get_template_part('partials/banners/internal/page_banner');
				$i	= 1;
			endif; ?>

			<div class="section entry-container pb-0">
				<div class="container clearfix">
                   <?php echo do_shortcode( '[yith_wcwl_wishlist]' ); ?>
				</div>
            </div>
			
		</article>

	<?php endwhile; ?>

<?php get_footer(); ?>