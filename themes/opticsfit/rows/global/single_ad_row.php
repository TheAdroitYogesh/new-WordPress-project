<?php // Single Ad Row
global $i, $page_title, $background_colour;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$background_image		= get_sub_field('background_image');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section advertise"
  data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>

    <div class="yellow-box-wrapper" style="background-image: url(<?php echo $background_image;?>);">
      <div class="container">
        <div class="yellow-box">
          <div class="yellow-box-content">
          <?php echo $section_content;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>