<?php // Virtual Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$image_one		      = get_sub_field('image_one');
$image_two		      = get_sub_field('image_two');
$image_one_link		  = get_sub_field('image_one_link');
$image_two_link		  = get_sub_field('image_two_link');
$virtual_option			= get_sub_field('virtual_option', false);
$cta_title		      = get_sub_field('cta_title');
$cta_link		        = get_sub_field('cta_link');
if ($cta_link) :
  $link_url		        = $cta_link['url'];
  $link_title		      = $cta_link['title'];
  $link_target	      = $cta_link['target'] ? $cta_link['target'] : '_self';
endif;
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section virtual-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="virtual-glasses">
          <div class="sec-pic"><a href="<?php echo $image_one_link;?>"><img src="<?php echo $image_one;?>" alt=""></a></div>
          <div class="sec-pic"><a href="<?php echo $image_two_link;?>"><img src="<?php echo $image_two;?>" alt=""></a></div>
        </div>
      </div>
      <div class="col-md-6">
        <?php
          while ( have_rows( 'virtual_option_one' ) ): the_row();
          $heading			= get_sub_field('heading');
          $icon		      = get_sub_field('icon');
          $content		  = get_sub_field('content');
        ?>
        <div class="virtual-option">
          <h3 class="title-xs"><?php echo $heading;?></h3>
          <a href="javascript:void(0)"  class="virtual_try_on_open" target="<?php echo esc_attr( $link_target );?>">
          <div class="virtual-col">
            <div class="sec-pic"><img src="<?php echo $icon;?>" alt="<?php echo $heading;?>"></div>
            <?php echo $content;?>
          </div>
          </a>
        </div>        
        <?php endwhile; ?>

        <?php
          while ( have_rows( 'virtual_option_two' ) ): the_row();
          $heading			= get_sub_field('heading');
          $link			    = get_sub_field('link');
          $icon		      = get_sub_field('icon');
          $content		  = get_sub_field('content');
        ?>
        <div class="virtual-option">
          <h3 class="title-xs"><?php echo $heading;?></h3>
          <a href="<?php echo $link;?>"  class="" target="<?php echo esc_attr( $link_target ); ?>">
          <div class="virtual-col">
            <div class="sec-pic"><img src="<?php echo $icon;?>" alt="<?php echo $heading;?>"></div>
            <?php echo $content;?>
          </div>
          </a>
        </div>        
        <?php endwhile; ?>

      </div>
    </div>
    <?php if( get_sub_field('cta_title') ): ?>
    <div class="cta text-center mt-5">
      <a href="javascript:void(0)"  class="btn btn-primary text-uppercase virtual_try_on_open" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $cta_title;?></a>
    </div>
    <?php endif; ?>
  </div>
</section>