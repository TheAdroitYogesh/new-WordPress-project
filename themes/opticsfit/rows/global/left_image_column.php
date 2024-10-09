<?php // Blog Row
global $i, $page_title ;

$section_heding       = get_sub_field('section_heding');
$section_title			  = get_sub_field('section_title');
$section_content		  = get_sub_field('section_content');
$sec_image		        = get_sub_field('sec_image');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?>
  class="section identity-sec text-white" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="row d-flex align-items-center">    
      <div class="col-md-6">
        <img src="<?php echo $sec_image;?>" alt="<?php echo $section_title;?>" />
      </div>
      <div class="col-md-6 content-sec">
        <?php if( get_sub_field('section_title') ): ?>
        <header class="title-head">
          <?php if( get_sub_field('section_heding') ): ?><small><span class="text-white"><?php echo $section_heding;?></span></small><?php endif; ?>
          <h4 class="title-xl"><?php echo $section_title;?></h4>
          <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
        </header>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>