<?php // Virtual Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$image		          = get_sub_field('image');
$content		        = get_sub_field('content');
$cta_title		      = get_sub_field('cta_title');
$cta_link		        = get_sub_field('cta_link');
if ($cta_link) :
  $link_url		        = $cta_link['url'];
  $link_title		      = $cta_link['title'];
  $link_target	      = $cta_link['target'] ? $cta_link['target'] : '_self';
endif;
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section virtual-inner-sec" data-row="row-<?php echo $i; ?>">
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
        <div class="virtual-pic">
          <div class="sec-pic"><img src="<?php echo $image;?>" alt=""></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="virtual-content">
          <?php echo $content;?>
        </div>
        <?php if( get_sub_field('cta_title') ): ?>
        <div class="cta mt-5">
          <a href="javascript:void(0)"  class="btn btn-primary text-uppercase virtual_try_on_open" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $cta_title;?></a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>