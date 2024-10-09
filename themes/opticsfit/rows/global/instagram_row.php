<?php // Instagram Row
global $i, $page_title ;

$section_heding       = get_sub_field('section_heding');
$section_title			  = get_sub_field('section_title');
$section_content		  = get_sub_field('section_content');
$instagram_shortcode	= get_sub_field('instagram_shortcode');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section instagram-sec"
  data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <div class="instafeeds-sec">
      <?php echo do_shortcode(get_sub_field('instagram_shortcode')); ?>
      <?php //echo apply_shortcodes( '[insta-gallery id="1"]' ); ?>
      <?php /*
      <div class="grid-sec">
        <div class="grid-fourty">
          <div class="big-feed">
            <img src="<?php echo get_bloginfo('template_url'); ?>/images/nextgen-eyewear1.jpg" alt="">
          </div>
        </div>
        <div class="grid-sixty">
          <div class="row">
            <div class="col-md-6">
              <div class="small-feed">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/nextgen-eyewear2.jpg" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-feed">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/nextgen-eyewear3.jpg" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-feed">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/nextgen-eyewear4.jpg" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="small-feed">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/nextgen-eyewear5.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>*/?>

    </div>
  </div>
  </section>