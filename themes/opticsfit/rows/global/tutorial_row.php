<?php // Tutorial Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$tutorials			      = get_sub_field('tutorials', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section tutorials-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
</div>
    <?php
$loop = new WP_Query(array('post_type' => 'video', 'posts_per_page' => -1, 'order' => 'desc'));
if ($loop->have_posts()) :
  $i = 1;
?>
  <div class="tutorials-slider">
    <div class="owl-carousel">
      <?php while ($loop->have_posts()) : $loop->the_post();
        $youtube_url = get_field('video_url');
        $youtube_array = explode('?v=', $youtube_url);
      ?>
        <div class="item">
          <div class="code-area">
            <a href="javascript:void(0);" class="video-thumb video-btn" data-bs-toggle="modal" data-bs-target="#VideoModal" data-src="https://www.youtube.com/embed/<?php echo $youtube_array[1]; ?>?">
              <img src="http://img.youtube.com/vi/<?php echo $youtube_array[1]; ?>/mqdefault.jpg" alt="<?php the_title(); ?>">
            </a>
          </div>
          <div class="post-title"><?php the_title(); ?></div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php $i++;
endif;
wp_reset_postdata();
?>
  
</section>