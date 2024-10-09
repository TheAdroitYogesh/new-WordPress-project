<?php // Tutorial Row
global $i, $page_title ;
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section tutorials-sec" data-row="row-<?php echo $i; ?>">
<div class="tutorials-slider">
      <div class="owl-carousel">
          <?php
				if( have_rows('carousel') ): ?>
				<?php
					while ( have_rows( 'carousel' ) ): the_row();
					$image    = get_sub_field('image');
					$title	 = get_sub_field('title');
					?>
        <div class="item">
          <div class="code-area">
            <img src="<?php echo $image;?>" />
          </div>
          <div class="post-title"><?php echo $title;?></div>
        </div>
        <?php endwhile; ?>
		 <?php endif; ?>
      </div>
    </div>
    
  
</section>