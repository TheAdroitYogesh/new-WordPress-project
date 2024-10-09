<?php // Blog Row
global $i, $page_title ;

$section_heding       = get_sub_field('section_heding');
$section_title			  = get_sub_field('section_title');
$section_content		  = get_sub_field('section_content');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section blog-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <div class="blog-slider mobsli">
      <div class="row owl-carousel">
        <?php
          $args = array(
            'post_type'			=> 'post',
            'post_status'		=> 'publish',
            'orderby'			=> 'date',
            'order' 			=> 'desc',
            'posts_per_page'	=> 3
          );
          $team_query = new WP_Query( $args );
          if ($team_query->have_posts()):
          $count = $team_query->found_posts; 
          while ($team_query->have_posts() ): $team_query->the_post();
          $post_title				= get_the_title();
          $team_member_image		= get_field('team_member_image'); 
        ?>
        <div class="col-lg-4">
          <div class="card shine">
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="sec-pic">
                <a href="<?php echo get_permalink(); ?>">
                  <?php the_post_thumbnail('full'); ?>
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
              <h4 class="card-title"><?php echo $post_title;?></h4>
              <?php $content = get_the_content();
              $trimmed_content = wp_trim_words( $content, 25 ); ?>
              <p class="card-text"><?php echo $trimmed_content; ?></p>
              <a href="<?php echo get_permalink(); ?>" class="btn btn-primary text-uppercase">Read More</a>
            </div>
          </div>
        </div>
        <?php endwhile;?>
		    <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>