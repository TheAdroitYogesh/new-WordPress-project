<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$phone_number		= get_field('phone_number', 'option');
?>

<div class="top-header d-flex laign-items-center">
  <a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/logo-white.png" alt="Logo"></a>
  <div class="right-panel d-flex align-items-center ms-auto">
    <?php if ($phone_number) : ?>
    <div class="tollfree">
      <a href="tel:<?php echo $phone_number; ?>"><i class="fa-solid fa-phone"></i> <?php echo $phone_number; ?></a>
    </div>
    <?php endif; ?>
    <div class="search-sec">
      <a href="javascript:void()" class="search-ico d-none"><i class="fa-solid fa-magnifying-glass"></i></a>
       <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="form-control me-2" placeholder="What are you looking for?" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        <button class="btn btn-search" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/ei_search.png" alt=""></button>
      </form>
    </div>
    <div class="cart-sec">
      <a href="https://www.opticsfit.in//cart/">My Bag <img src="<?php echo get_bloginfo('template_url'); ?>/images/shopping-bag.png" alt=""><span class="cart-number"><?php global $woocommerce;
echo $woocommerce->cart->cart_contents_count; ?></span></a>
       <a href="https://www.opticsfit.in//wishlist/"> <img src="<?php echo get_bloginfo('template_url'); ?>/images/heart-image.png" alt=""><span class="cart-number"><?php echo do_shortcode('[wishlist_counter]');?></span></a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</div>