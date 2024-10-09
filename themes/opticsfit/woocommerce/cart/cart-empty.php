<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
    <p class="return-to-shop">
        <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
            <?php
                /**
                 * Filter "Return To Shop" text.
                 *
                 * @since 4.6.0
                 * @param string $default_text Default text.
                 */
                echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
            ?>
        </a>
    </p>
<?php endif; ?>

<section id="icon-set" class="section p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="title-head text-center">
                        <h3 class="title-lg white-text">You Might Also Be Interested In </h3>
                    </header>
                </div>
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                        'posts_per_page' => 4,
                    );
                    $loop = new WP_Query( $args );
                    //echo '<pre>'; print_r($loop); echo '</pre>';
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    $price = get_post_meta( get_the_ID(), '_price', true );
                    global $product; 
                ?>

                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-img mb-4">
                        <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                        <a href="<?php echo get_permalink() ?>" class="product-thumb">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                            </a>
                        <!--    <div class="wishlist-icon icon mb-4">
                                <i class="fa fa-heart-o"></i>
                            </div>-->
                            <div class="color-icon">
                                <ul class="d-flex">
                                    <?php
                                    $values = $product->get_attributes('pa_color');
                                    if(!empty($values))
                                    {
                                      foreach($values as $val)
                                      {
                                        //echo '<pre>'; print_r($val); echo '</pre>';
                                        if($val->get_data()['name']=='pa_color')
                                        {
                                          $colordata = $val->get_data()['options'];
                                          //echo '<pre>'; print_r($colordata); echo '</pre>';
                                          foreach($colordata as $colorval)
                                          {
                                            //echo '<pre>'; print_r($colorval); echo '</pre>';
                                            $singlecolorslug = get_term($colorval)->slug;
                                            $singlecolorname = get_term($colorval)->name;
                                            ?> <li class="<?php  echo $singlecolorslug;  ?>"><a href=""><?php  echo $singlecolorname;  ?></a></li>
                                            <?php 
                                          }
                                        }
                                      }
                                    }

                                    ?>
                                    <!--<li class="gold"><a href="">gold</a></li>
                                    <li class="grey"><a href="">grey</a></li>
                                    <li class="blue"><a href="">blue</a></li>
                                    <li class="black"><a href="">black</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="cat-grid">
                            <!--<div class="img-tag">
                                <span class="glass-type">SMALL GLASSES</span>
                            </div>-->
                            <div class="product-title my-2"><a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                            <div class="price-quote">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>

            </div>
        </div>
    </section>