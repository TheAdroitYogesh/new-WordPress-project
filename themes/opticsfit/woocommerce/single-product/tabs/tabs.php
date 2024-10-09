<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="woocommerce-tabs wc-tabs-wrapper">
		<!-- [/SINGLE PRODUCT] -->
	<section class="section single-product-wrapper pt-0">
		<div class="container">
			<div class="row attributes-wrapper mt-3">
				<div class="col-md-6 offers-block">
					<div class="offers py-4 px-5 text-center">
						<p>Get More For Less</p>
						<p>Get <strong>2 Pairs</strong> of Glasses and get a <strong>10% Off</strong></p>
						<p>Get <strong>3 Pairs</strong> of Glasses and get a <strong>15% Off</strong></p>
					</div>
				</div>
				<div class="col-md-6 attributes">
					<!-- <table class="attributes-wrapper" width="100%">
						<tr>
							<td><span>Product ID </span>: ZG011AQA</td>
							<td><span>Frame Size</span> : Medium</td>
						</tr>
						<tr>
							<td><span>Fit</span> : Unisex</td>
							<td><span>Frame Material</span> : TR - 90</td>
						</tr>
						<tr>
							<td><span>Key Dimensions</span> : 52-18-134</td>
							<td><span>Brand</span> : Black Noir</td>
						</tr>
					</table> -->
					<?php
						global $product;
						do_action( 'woocommerce_product_additional_information', $product );
					?>
				</div>
			</div>
	</section>

	<section class="section four-column-sec p-0">
		<div class="container">
			<div class="choose-column-product">
				<div class="row infogrph">
				<!--	<div class="col-6 col-md-3">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/free-shipping.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Free Shipping</p>
								<p class="ico-subhead">On Orders over ₹500</p>
							</div>
						</div>
					</div>-->
					<div class="col-6 col-md-4">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/quick-payment.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Quick Payments</p>
								<p class="ico-subhead">100% Secure</p>
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/big-deals.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">Big Deals</p>
								<!--<p class="ico-subhead">Over 40% Cashback</p>-->
							</div>
						</div>
					</div>
					<div class="col-6 col-md-4">
						<div class="item-sec">
							<div class="ico-pic"><img src="<?php bloginfo('template_url'); ?>/images/support.png"
									alt="">
							</div>
							<div class="ico-content">
								<p class="ico-head">24/7 Support</p>
								<!--<p class="ico-subhead">Over 40% Cashback</p>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php


/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<section class="section">
  <header class="title-head text-center">
    <?php
			wp_reset_postdata();
			global $product;
			$terms = @get_the_terms( $product->ID, 'product_cat' );
     ?>
     <h3 class="title-lg white-text">The <?php  echo $terms[0]->name; ?> You Were Looking For</h3>
  </header>
	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
</section>
<?php endif; ?>