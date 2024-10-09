<?php // Why Choose Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$ad_banner			    = get_sub_field('ad_banner', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section banner-ad-sec" data-row="row-<?php echo $i; ?>">
	<div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
		<div class="row">
      <?php
        while ( have_rows( 'ad_banner' ) ): the_row();
        $ad_column_width       = get_sub_field('ad_column_width');
        $ad_image		          = get_sub_field('ad_image');
        $ad_title		          = get_sub_field('ad_title');
        $ad_content		        = get_sub_field('ad_content');
        $color_option		      = get_sub_field('color_option');
        $back_drop		        = get_sub_field('back_drop');
        $back_drop_width		  = get_sub_field('back_drop_width');
        $back_drop_position		= get_sub_field('back_drop_position');
        $ad_link		          = get_sub_field('ad_link');
        if ($ad_link) :
          $link_url		        = $ad_link['url'];
          $link_title		      = $ad_link['title'];
          $link_target	      = $ad_link['target'] ? $ad_link['target'] : '_self';
        endif;
      ?>
      <div class="<?php echo $ad_column_width;?>">
        <div class="banner-block <?php echo $color_option;?> <?php echo $back_drop;?> <?php echo $back_drop_width;?> <?php echo $back_drop_position;?>">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <div class="image"><img src="<?php echo $ad_image;?>" alt="<?php echo $ad_title;?>"></div>
            <div class="content">
              <h3 class="title-md"><?php echo $ad_title;?></h3>
              <?php echo $ad_content;?>
            </div>
          </a>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
	</div>
</section>