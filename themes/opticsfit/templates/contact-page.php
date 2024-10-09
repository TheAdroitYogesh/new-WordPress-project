<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title		= get_the_title();
	$contact_form	= get_field('contact_form');
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
				
			<?php
			if( have_rows('page_banner') ): 
				get_template_part('partials/banners/internal/page_banner');
				$i	= 1;
			endif;
			
			get_template_part('rows/page_rows');
			?>
			<div class="section contact-sec background-image">
        <div class="container">
          <header class="title-head">
            <?php the_content(); ?>
          </header>
          <div class="contact-form-sec">
            <div class="row flex-row-reverse">
              <div class="col-md-6">
                <div class="contact-form">
                  <?php echo do_shortcode(get_field('contact_form')); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="google-map-sec">
                  <?php get_template_part('partials/contact_page/location_map'); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="contact-info">
				    <?php get_template_part('partials/contact_page/contact_details'); ?>
				  </div>
        </div>
      </div>
		</article>

	<?php endwhile; ?>

<?php get_footer(); ?>