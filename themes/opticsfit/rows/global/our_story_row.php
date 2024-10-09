<?php // Our Story Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$sec_image		      = get_sub_field('sec_image');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?>
  class="section our-story-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h2 class="title-xl"><?php echo $section_title;?></h2>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="row align-items-center">
        <div class="col-md-11 m-auto mb-5">
          <img src="<?php echo $sec_image;?>" alt="our-image"/>
        </div>
      </div>
    </div>
  </div>
  </section>