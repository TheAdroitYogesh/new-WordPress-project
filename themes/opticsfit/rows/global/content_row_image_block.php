<?php // Why Choose Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$icon_blocks			= get_sub_field('icon_blocks', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section image-block-sec" data-row="row-<?php echo $i; ?>">
	<div class="container">
		<div class="choose-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h2 class="title-xl"><?php echo $section_title;?></h2>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="image-block">
        <div class="row">
          <?php
            while ( have_rows( 'icon_blocks' ) ): the_row();
            $add_icon			  = get_sub_field('add_icon');
            $add_title		  = get_sub_field('add_title');
            $add_content		= get_sub_field('add_content');
          ?>
          <div class="col-md-4">
            <div class="block text-center">
              <div class="image"><img src="<?php echo $add_icon;?>" alt="<?php echo $add_title;?>"></div>
              <div class="content">
                <h3 class="title-sm"><?php echo $add_title;?></h3>
                <?php echo $add_content;?>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
		</div>
	</div>
</section>