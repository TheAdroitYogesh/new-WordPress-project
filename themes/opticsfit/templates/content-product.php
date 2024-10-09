
<?php $page_title   = get_the_title(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(sanitize_title($page_title)); ?>>
  <section class="section popular-product category-grid-wrapper">
     <div class="breadcrumb-wrapper">
       <div class="container">
         <div class="row">
          <div class="col-sm-9">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
               <?php woocommerce_breadcrumb(); ?>
              </ol>
            </nav>
          </div>
          <div class="col-sm-3">
            <div class="offer">At just ₹
            <?php
              global $product;
                if ($product->is_type( 'simple' )) {
               
                    if(!empty($product->get_sale_price())){
                      echo $product->get_sale_price();
                    }else{
                      echo $product->get_regular_price();
                    }
              }elseif($product->is_type('variable')){
                $lower_price     =  $product->get_variation_sale_price( 'min', true );
                        echo $lower_price; 
              }?>
            /- 
              <?php
              global $product;
                if ($product->is_type( 'simple' )) {
               
                    if(!empty($product->get_sale_price())){
                      echo '('.round(($product->get_regular_price() - $product->get_sale_price())*100/$product->get_regular_price(),2).'% off)';
                    }else{
                    }
              }elseif($product->is_type('variable')){
                $lower_price     =  $product->get_variation_sale_price( 'min', true );
                $higher_price  =  $product->get_variation_regular_price( 'max', true );
                echo '('.round(($higher_price - $lower_price)*100/$higher_price,2).'% off)';
              }?>
            </div>
          </div>
        </div>
       </div>
     </div>
   </section>
    <section class="section single-product-wrapper pt-0">
      <?php the_content();?>
    </section>
</article>