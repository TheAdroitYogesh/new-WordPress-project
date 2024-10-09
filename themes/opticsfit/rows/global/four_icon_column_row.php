<?php // Icon Row
global $i, $page_title ;

$icon_sec			      = get_sub_field('icon_sec', false);
?>
<section id="icon-set" class="section four-column-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="choose-column">
      <div class="row">
        <?php
          while ( have_rows( 'icon_sec' ) ): the_row();
          $icon_pic			        = get_sub_field('icon_pic');
          $icon_heading			    = get_sub_field('icon_heading');
          $icon_sub_heading			= get_sub_field('icon_sub_heading');
        ?>
        <div class="col-6 col-lg-3">
          <div class="item-sec">
            <div class="ico-pic"><img src="<?php echo $icon_pic;?>" alt="<?php echo $icon_heading;?>"></div>
            <div class="ico-content">
              <p class="ico-head"><?php echo $icon_heading;?></p>
              <p class="ico-subhead"><?php echo $icon_sub_heading;?></p>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>