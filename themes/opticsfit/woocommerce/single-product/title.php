<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;
?>
<div class="product_meta">
    <?php do_action( 'woocommerce_product_meta_start' ); 
//Category

echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); 

the_title( '<h1 class="product_title entry-title">', '</h1>' );


//SKU

if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

        <span class="sku_wrapper"><span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( '', 'woocommerce' ); ?></span></span>
<?php endif; 

 do_action( 'woocommerce_product_meta_end' ); ?>

</div>
<?php 
echo do_shortcode('[yith_wcwl_add_to_wishlist]'); 
?>