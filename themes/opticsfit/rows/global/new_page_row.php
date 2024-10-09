<?php // New Page Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$range_content			= get_sub_field('range_content', false);
$footer_content			= get_sub_field('footer_content');
$right_side_image		= get_sub_field('right_side_image');
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section why-choose-sec"
  data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h2 class="title-xl"><?php echo $section_title;?></h2>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="prefet-fit">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="column-one">
              <div class="row">
                <?php
                  while ( have_rows( 'range_content' ) ): the_row();
                  $range_icon			= get_sub_field('range_icon');
                  $range_title		= get_sub_field('range_title');
                  $range_link		= get_sub_field('range_link');
								?>
                <div class="col-lg-3 col-md-6">
                  <a href="<?php echo $range_link;?>">
                    <div class="column">
                      <div class="ico"><img src="<?php echo $range_icon;?>" alt="<?php echo $range_title;?>"></div>
                      <div class="content"><?php echo $range_title;?></div>
                    </div>
                  </a>

                </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="column-two">
              <div class="column">
                <div class="image"><img src="<?php echo $right_side_image;?>" alt="<?php echo $section_title;?>"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="title-foot mt-5 text-center">
      <?php echo $footer_content;?>
    </footer>
  </div>
  </section>