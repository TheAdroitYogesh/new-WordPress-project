<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;
global $post;
$productid = $post->ID;
$terms = get_the_terms ( $productid, 'product_cat' );
$relatedcat = $terms[0]->term_id;
$query = new WP_Query( array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 4,
    'tax_query'      => array( array(
        'taxonomy'   => 'product_cat',
        'field'      => 'term_id',
        'terms'      => $relatedcat,
    ) )
) );

?>



<section id="icon-set" class="section p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header class="text-center">
                        <h3 class="title-lg white-text">You Might Also Like</h3>
                    </header>
                </div>

                <?php

                while ( $query->have_posts() ) {
                     $query->the_post();
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
                            <div class="color-icon">
                                <ul class="d-flex">
                                    <?php 

                                        $values = $product->get_attributes('pa_color');
                                        

                                        if(!empty($values)){
                                            foreach($values as $val){
                                                if($val->get_data()['name']=='pa_color'){
                                              $colordata = $val->get_data()['options'];
                                              foreach($colordata as $colorval){
                                                $singlecolorslug = get_term($colorval)->slug;
                                                $singlecolorname = get_term($colorval)->name;
                                                ?>  <li class="<?php  echo $singlecolorslug;  ?>"><a href=""><?php  echo $singlecolorname;  ?></a></li> <?php 

                                              }
                                              
                                              
                                          }
                                              
                                            }
                                        }
                                            
                                         ?>
                                </ul>
                            </div>
                        </div>
                        <div class="cat-grid">
                            <div class="product-title my-2"><a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></div>
                            <div class="price-quote">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>      


            </div>
        </div>
    </section>
<?php
wp_reset_postdata();
?>

<?php echo do_shortcode('[cusrev_reviews]'); ?>  

<!--faq-->
<?php
wp_reset_postdata();
global $i;

if ($i) {
    $i = $i;
} else {
    $i = 0;
}

if( have_rows('page_rows') ):
    while ( have_rows('page_rows') ) : the_row(); $i++;

         global $i, $page_title ;

        $section_heding       = get_sub_field('section_heding');
        $section_title            = get_sub_field('section_title');
        $section_content          = get_sub_field('section_content');
        $faqs                       = get_sub_field('faqs', false);

        ?>


<section<?php if ($section_title) echo ' id="' . sanitize_title($section_title) . '"'; ?> class="section faq-sec" data-row="row-<?php echo $i; ?>">
  <div class="container">
    <?php if( get_sub_field('section_title') ): ?>
    <header class="title-head text-center">
      <?php if( get_sub_field('section_heding') ): ?><small><span><?php echo $section_heding;?></span></small><?php endif; ?>
      <h4 class="title-xl"><?php echo $section_title;?></h4>
      <?php if( get_sub_field('section_content') ): ?><p><?php echo $section_content;?></p><?php endif; ?>
    </header>
    <?php endif; ?>
    <div class="ques-ans">
      <div class="accordion" id="quesans">
        <?php
        //Get you fields
          $counter = 0;
          while ( have_rows( 'faqs' ) ): the_row(); $counter++;
          $faq_question         = get_sub_field('faq_question');
          $faq_answer       = get_sub_field('faq_answer');
        ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?php echo $counter;?>">
            <button class="accordion-button collapsed d-flex align-items-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter;?>" aria-expanded="false" aria-controls="collapse<?php echo $counter;?>">
              <?php echo $faq_question;?>
            </button>
          </h2>
          <div id="collapse<?php echo $counter;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $counter;?>" data-bs-parent="#quesans">
            <div class="accordion-body">
              <?php echo $faq_answer;?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>


<?php
    endwhile;
endif;
wp_reset_postdata();