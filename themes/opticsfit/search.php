<?php get_header(); ?>

<style>
	.product-list-card{
	border: none;
}
</style>

	<section class="inner-banner background-image" style="background-image:url(<?php echo get_bloginfo('template_url'); ?>/images/inner-background.jpg)">
    	<div class="breadcrum-sec"><?php the_breadcrumb(); ?>&nbsp; Search </div>
    </section>



<?php 
if(isset($post)){
$attachment_id = $post->ID; // attachment ID
$url = wp_get_attachment_url( get_post_thumbnail_id($attachment_id) );
}
?>

<div class="entry-container">
	<div class="blog-sec">
		<header class="title-head m-auto text-center post-title">
			<h2 class="title mb-4" style="margin-top:50px;"><strong><?php printf( __( 'Search Results for: %s'), get_search_query() ); ?></strong></h2>
		</header>
		<div class="section blog-section">
			<div class="container">
			
			<div class="row">
			
				<?php
	$s=get_search_query();
	$args = array(
					'post_type' => 'product',
                    'posts_per_page' => 12,
                    'tax_query'           => array(
                                  ),
				);
			 if(isset($_GET['s'])&&!empty($_GET['s'])){
                        $category_filter = array(
                                         'taxonomy'        => 'product_cat',
                                         'field'           => 'slug',
                                         'terms'           => array(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_GET['s'])))),
                                         'operator'        => 'IN',
                                    );
                        array_push($args['tax_query'],$category_filter);
                    }
                    //echo '<pre>';print_r($args);echo '</pre>';

				$args['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		// The Query
			$query = new WP_Query( $args );
		if(!$query->have_posts()){
			$args = array(
					's' =>$_GET['s'],
					'post_type' => 'product',
                    'posts_per_page' => 12,
				);

				$args['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		// The Query
			$query = new WP_Query( $args );
		}
	if ( $query->have_posts() ) { while ( $query->have_posts() ) {
			
			$query->the_post();
			global $product;
			// $price = get_post_meta( get_the_ID(), '_price', true ); for price
			$price_sale = get_post_meta( get_the_ID(), '_sale_price', true);
			//echo $price_sale;
			
			?>
			   
			  <div class="col-md-3">
				  <div class="product-list-card card">

	

					  
					  <div class="product-img">
						  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id()); ?>" alt=""/></a>
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
                                    <?php
                                    if ($product->is_type( 'simple' )) {
                                        ?>
                                        <span class="final-price">₹<?php echo $product->get_regular_price(); ?></span> <span class="cut-price px-3">
                                         <?php   
                                        echo "₹".$product->get_sale_price();
                                         echo '</span>';
                                    }
                                    elseif($product->is_type('variable')){
                                        $lower_price     =  $product->get_variation_sale_price( 'min', true );
                                      $higher_price  =  $product->get_variation_regular_price( 'max', true );
                                     echo '<span class="final-price">';
                                    echo "₹".$lower_price; ?> - <?php echo  "₹".$higher_price;
                                     echo '</span>';
                                    }
                           
                                     ?>
                                </div>
                            </div>
				  </div>
			  </div>
				
	
                 <?php
  }
?>
  
		<div class="row" style="width: 100%; margin-top: 5%;">
		<div class="col-xl-12" style="font-size: 1.2rem;">
			<nav class="navigation pagination">
				<div class="nav-links">
					<?php
					$big = 999999999; // need an unlikely integer
					$mybaseurl = get_site_url().'?';
					$cat = get_query_var( 'product_cat' );
					$tag = get_query_var( 'product_tag' );
					if(isset($cat)&&!empty($cat)){
					$mybaseurl .= 'product_cat='.$cat;
					}
					if(isset($tag)&&!empty($tag)){
					$mybaseurl .= 'product_tag='.$tag;
					}
					if(isset($_GET['orderby'])){
					$mybaseurl .= '&orderby='.$_GET['orderby'];
					}
					echo paginate_links( array(
					'base' => $mybaseurl.'%_%',
					'current' => max( 1, get_query_var('page') ),
					'total' => $query->max_num_pages,
					'format' => '&page=%#%',
					) );

					// the_posts_pagination();
					?>
				</div>
			</nav>
		</div>
		</div>	
		<?php
			}else{
		?>
				<div class="alert text-center col-12">
          <h2><?php _e('Sorry, No Result Found.'); ?></h2>
        </div>
<?php } ?>
			
			</div>
				
				
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>