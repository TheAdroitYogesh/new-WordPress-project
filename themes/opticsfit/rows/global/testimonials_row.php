<?php // Tutorial Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section testimonials-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <?php
      $loop = new WP_Query( array('post_type' => 'testimonials', 'posts_per_page' => -1, 'order' => 'desc') );
        if ( $loop->have_posts() ) :
        $i=1;
    ?>
    <div class="testimonials-slider">
      <div class="owl-carousel">
        <?php while ( $loop->have_posts() ) : $loop->the_post();
          $designation		= get_field('designation');
        ?>
        <div class="item">
          <div class="item-body">
            <?php the_content(); ?>
          </div>
          <div class="user-detail">
            <div class="sec-pic"><?php the_post_thumbnail('usersquare'); ?></div>
            <div class="user-content">
              <?php the_title(); ?>,<br>
              <span><?php echo $designation;?></span>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php $i++; endif; wp_reset_postdata();?>
  </div>
</section>