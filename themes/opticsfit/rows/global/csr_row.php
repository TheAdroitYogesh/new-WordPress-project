<?php // CSR Row
global $i, $page_title ;

$section_heding                   = get_sub_field('section_heding');
$section_title			              = get_sub_field('section_title');
$section_content		              = get_sub_field('section_content');
$left_side_image_one		          = get_sub_field('left_side_image_one');
$left_side_image_two		          = get_sub_field('left_side_image_two');
$left_side_image_three		        = get_sub_field('left_side_image_three');
$left_side_image_three_title		  = get_sub_field('left_side_image_three_title');
$left_side_image_three_content    = get_sub_field('left_side_image_three_content');
$right_side_image		              = get_sub_field('right_side_image');
$right_side_image_heading		      = get_sub_field('right_side_image_heading');
$right_side_image_content		      = get_sub_field('right_side_image_content');
$footer_content		                = get_sub_field('footer_content');
$cta_title		                    = get_sub_field('cta_title');
$cta_link		        = get_sub_field('cta_link');
if ($cta_link) :
  $link_url		        = $cta_link['url'];
  $link_title		      = $cta_link['title'];
  $link_target	      = $cta_link['target'] ? $cta_link['target'] : '_self';
endif;
$social_link			                = get_sub_field('social_link', false);
$whatsapp_link			              = $social_link['field_620b8f6ca6c05']['url'];
$facebook_link			              = $social_link['field_620b8f7fa6c06']['url'];
$instagram_link			              = $social_link['field_620b8e90a6c02']['url'];
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section csr-initiatives-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <div class="csr-column">
      <?php if( get_sub_field('section_title') ): ?>
      <header class="title-head text-center">
        <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
        <h3 class="title-xl"><?php echo $section_title;?></h3>
        <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
      </header>
      <?php endif; ?>
      <div class="initiative-grid">
        <div class="grid-sec">
          <div class="grid-sixty">
            <div class="row">
              <div class="col-md-6">
                <div class="small-feed">
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo $left_side_image_one;?>" alt=""></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="small-feed">
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo $left_side_image_two;?>" alt=""></a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="big-feed">
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo $left_side_image_three;?>" alt="<?php echo $left_side_image_three_title;?>"></a>
                  <div class="feed-cont">
                    <div class="feed-content">
                      <div class="head"><?php echo $left_side_image_three_title;?></div>
                      <p><?php echo $left_side_image_three_content;?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="grid-fourty">
            <div class="big-feed">
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo $right_side_image;?>" alt="<?php echo $right_side_image_heading;?>"></a>
              <div class="feed-cont">
                <div class="feed-content">
                  <div class="head"><?php echo $right_side_image_heading;?></div>
                  <p><?php echo $right_side_image_content;?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cta text-center mt-5">
        <?php echo $footer_content;?>
        <?php if( get_sub_field('cta_title') ): ?>
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn btn-primary text-uppercase mt-5"><?php echo $cta_title;?></a>
        <?php endif; ?>
      </div>
      <div class="social-links text-center mt-5">
        <ul>         
          <li><a href="<?php echo $facebook_link;?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/Facebook-logo.png" alt="facebook" /></a></li>
          <li><a href="<?php echo $instagram_link;?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/instagram-logo.png" alt="instagram" /></a></li>
          <li><a href="<?php echo $whatsapp_link;?>" target="_blank"><img src="<?php echo get_bloginfo('template_url'); ?>/images/whatsapp-logo.png" alt="whatsapp" /></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>