<?php
/**
 * Template Name: Customer login
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title		= get_the_title();
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
			<section class="inner-banner background-image" style="background-image:url(<?php echo get_bloginfo('template_url'); ?>/images/inner-background.jpg)">
        <div class="breadcrum-sec"><?php the_breadcrumb(); ?></div>
      </section>
      <section class="section why-choose-sec">
        <div class="container">
          <div class="choose-column">
            <header class="title-head text-center mb-5">
              <h1 class="title-xl"><?php the_title(); ?></h1>
            </header>
            <div class="entry-container">
              <?php echo do_shortcode('[theme-my-login]'); ?>
            </div>
          </div>
        </div>
      </section>
		</article>

	<?php endwhile; ?>

<?php get_footer(); ?>