<?php // Why Choose Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$icon_blocks			= get_sub_field('icon_blocks', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section product-carousel-sec" data-row="row-<?php echo $i; ?>">
	<div class="container">
		<div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h2 class="title-xl"><?php echo $section_title;?></h2>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="pro-slider">
        <?php
          $featured_posts = get_sub_field('product_listing');
          $featured_posts = get_posts(array(
          'posts_per_page'	=> 10,
          'post_type'			=> 'post'
        ));
        if( $featured_posts ): ?>
        <div class="owl-carousel">
          <?php foreach( $featured_posts as $post ): 
            setup_postdata($post); ?>
            <div class="item">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
          <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
		</div>
	</div>
</section>