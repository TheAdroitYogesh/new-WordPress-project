<?php // Deals Coupons Row
global $i, $page_title ;

$section_title     = get_sub_field('section_title');
$title_alignment   = get_sub_field('title_alignment');
$coupon_blocks		 = get_sub_field('coupon_blocks', false);

switch ($title_alignment) {
	case 'center':
		$grid_classes	= 'align-center text-center';
		break;
  case 'left':
    $grid_classes	= 'align-left text-left';
    break;
}
?>
<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section banner-coupon-sec pb-0" data-row="row-<?php echo $i; ?>">
	<div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="<?php echo $grid_classes;?> mb-5">
      <h3 class="title-xl"><?php echo $section_title;?></h3>
    </header>
    <?php endif; ?>
		<div class="row">
      <?php
        while ( have_rows( 'coupon_blocks' ) ): the_row();
        $add_coupon      = get_sub_field('add_coupon');
        $column_width			= get_sub_field('column_width');
        $add_link		     = get_sub_field('add_link');
        if ($add_link) :
          $link_url		        = $add_link['url'];
          $link_title		      = $add_link['title'];
          $link_target	      = $add_link['target'] ? $add_link['target'] : '_self';
        endif;

        switch ($column_width) {
          case 'full':
            $cell_classes	= 'col-md-12';
            break;
          case 'half':
            $cell_classes	= 'col-md-6';
            break;
          case 'one-third':
            $cell_classes	= 'col-md-4';
              break;
          case 'one-fourth':
            $cell_classes	= 'col-md-3';
              break;
          default:
            $cell_classes	= 'col-md-3';
        }

      ?>
      <div class="<?php echo $cell_classes;?> pt-4 pb-5 coupon-col">
        <div class="banner-block">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <div class="image"><img src="<?php echo $add_coupon;?>" alt=""></div>
          </a>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
	</div>
</section>