<?php // Blog Row
global $i, $page_title ;

$section_heding       = get_sub_field('section_heding');
$section_title			  = get_sub_field('section_title');
$section_content		  = get_sub_field('section_content');
$column_sec			      = get_sub_field('column_sec', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section mission-vision" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h4 class="title-xl"><?php echo $section_title;?></h4>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="row">
        <?php
          while ( have_rows( 'column_sec' ) ): the_row();
          $column_content			= get_sub_field('column_content');
        ?>
        <div class="col-md-6">
          <div class="column-sec">
            <?php echo $column_content;?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>