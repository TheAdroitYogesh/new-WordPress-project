<?php // Trending Row
global $i, $page_title ;

$section_heding     = get_sub_field('section_heding');
$section_title			= get_sub_field('section_title');
$section_content		= get_sub_field('section_content');
$products			      = get_sub_field('products', false);
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section trending-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h3 class="title-xl"><?php echo $section_title;?></h3>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
  </div>
  <div class="everyone-glasses">
    <div class="container">
      <div class="everyone-column">
        <?php
          while ( have_rows( 'products' ) ): the_row();
          $product_image			= get_sub_field('product_image');
          $product_title		= get_sub_field('product_title');
          $product_link		= get_sub_field('product_link');
          if ($product_link) :
            $link_url		        = $product_link['url'];
            $link_title		      = $product_link['title'];
            $link_target	      = $product_link['target'] ? $product_link['target'] : '_self';
          endif;
        ?>
        <div class="card shine">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <div class="sec-pic"><img src="<?php echo $product_image;?>" class="card-img-top" alt="<?php echo $product_title;?>"></div>
            <h3 class="card-title"><?php echo $product_title;?></h3>
          </a>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>