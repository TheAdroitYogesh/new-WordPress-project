<?php
/**
 * Template Name: Blog Page
 *
 * @package WordPress
 * @subpackage
 * @since HTML5 3.0
 */

get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
	$page_title			= get_the_title();
  $post_type		= get_field('post_type');
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
				
			<?php
			if( have_rows('page_banner') ): 
				get_template_part('partials/banners/internal/page_banner');
				$i	= 1;
			endif;
			
			?>

<section class="section blog-sec">
  <div class="container">
    <header class="align-left text-left ">
      <h4 class="title-xl">Popular topics</h4>
    </header>

    <div class="blogs">
          <?php
          $args = array(
            'post_type'			=> $post_type,
            'post_status'		=> 'publish',
            'posts_per_page'	=> 13,
            'paged'				=> $paged
          );
          $wp_query = new WP_Query( $args );
          
          if ($wp_query->have_posts()): ?>							
          <div class="row">
            <?php
            while ($wp_query->have_posts() ): $wp_query->the_post();
            $post_title				= get_the_title();
            $team_member_image		= get_field('team_member_image'); 
            ?>

            <div class="col-xl-3 col-md-6 pt-5 pb-3 blog-col">
              <div class="shine">
                <?php if ( has_post_thumbnail() ) { ?>
                  <div class="sec-pic">
                    <a href="<?php echo get_permalink(); ?>">
                      <?php the_post_thumbnail('blog_post'); ?>
                    </a>
                  </div>
                  <?php } else { ?>
                  <div class="sec-pic">
                    <a href="<?php echo get_permalink(); ?>">
                      <img src="<?php echo get_bloginfo('template_url'); ?>/images/no-image.jpg" alt="<?php the_title(); ?>" />
                    </a>
                  </div>
                <?php } ?>
                <div class="card-body">
            <p class="card-date"><?php echo get_the_date('j.m.Y'); ?></p>
          <a href="<?php echo get_permalink(); ?>"><h4 class="card-title"><?php echo $post_title;?></h4></a>
                  <?php $content = get_the_content();
                  $trimmed_content = wp_trim_words( $content, 25 ); ?>
                  <p class="card-text"><?php echo $trimmed_content; ?></p>
                </div>
              </div>
            </div>

            <?php endwhile; ?>
          </div>

          <?php
          if ( $wp_query->max_num_pages > 1 ) :
          ?>
          <nav class="pagination-nav">
            <?php 
            if (function_exists('pagenavi')) {
              pagenavi('<div class="pagenavi">', '</div>');
            };
            ?>
          </nav>
          <?php
          endif;

          else :
          ?>
          <p><?php _e( 'Apologies, but there are no posts to display.' ); ?></p>
          <?php
          endif;
          wp_reset_query();
          ?>
    </div>
  </div>
</section>
			
		</article>

	<?php endwhile; ?>

<?php get_footer(); ?>