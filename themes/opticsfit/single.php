<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post();
  $page_title   = get_the_title();
  

    global $product;
                    if (isset($product)) {
                      if ( !empty($product->get_id()) ) {

                            get_template_part( 'templates/content', 'product' );

                      }else{

                            get_template_part( 'templates/content', 'single' );

                      }

                    }else{
                      get_template_part( 'templates/content', 'single' );
                    }




   endwhile; ?>

<?php get_footer(); ?>