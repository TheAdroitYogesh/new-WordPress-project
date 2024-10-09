 <article id="post-<?php the_ID(); ?>" >
              <section class="inner-banner background-image" style="background-image:url(<?php echo get_bloginfo('template_url'); ?>/images/inner-background.jpg)">
        <div class="breadcrum-sec"><?php // the_breadcrumb(); ?><?php echo do_shortcode('[wpseo_breadcrumb]'); ?></div>
      </section> 


    <?php
        $cate = get_queried_object();
        $cateID = $cate->term_id;
      $thumbnail_id = get_term_meta( $cateID, 'thumbnail_id', true );
      $image_url    = wp_get_attachment_url( $thumbnail_id );
    ?>

    <style>
      @media only screen and (max-width: 600px) {
        #auglio-bubble {top: 78.5%!important; z-index: 99999!important;}
      .sort-by-filter-btn {position: fixed; width: 50%; left: 0; bottom: 0; z-index: 99999999;}
      .mobile-filter {position: fixed; width: 50%; bottom: 0; right: 0; z-index: 999999999; background-color: var(--secondary);}
      .filter-sidebar {position: fixed; top: 0; right: 0; left: 0; bottom: 0; z-index: 999999; transform: translateX(-110%); padding:0; transition: 0.5s ease all}
      .mobile-filter span {display: block; position: relative; font-size: 1.1rem; font-weight: 500; padding: 6.5px 0;}
      .filter-category-wrapper {width: 100%; background-color: #f2f2f2; overflow: auto;}
      .filter-sidebar.active {transform: translateX(0);}
      .mobile-filter.active span{opacity: 0;}
      .mobile-filter.active::after{content: "Close"; font-size: 1.1rem; font-weight: 500; position: absolute; top: 50%; left: 20%; transform: translate(-50%, -50%)}
 
}
      

    </style>

<section class="inner-banner-second">
  <div class="container">
    <div class="banner-img">    
          <img src="<?php echo $image_url; ?>"/>
    </div>
   </div>
</section>
    
    <?php
            
            if( have_rows('page_banner') ){
                get_template_part('partials/banners/internal/page_banner');
                $i  = 1;
            }         
    ?>
    <section class="section yogesh popular-product category-grid-wrapper">
        <div class="container">
            

<?php
$order_by = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : '';


            $orderby = 'date';
            $order = 'DESC';
                
                
            if ( 'price' === $order_by ) {
                
                $meta_key = '_price';
                $orderby = 'meta_value_num';
                $order = 'ASC';
            }
            if ( 'price-desc' === $order_by ) {
                $meta_key = '_price';
                $orderby = 'meta_value_num';
                $order = 'DESC';
            }
            if ( 'rating' === $order_by ) {
                $meta_key = '_wc_average_rating';
                $orderby = 'meta_value_num';
                $order = 'DESC';
            }
            if ( 'bestseller' === $order_by ) {
                $meta_key = 'total_sales';
                $orderby = 'meta_value_num';
                $order = 'DESC';
            }
            if ( 'popularity' === $order_by ) {
                $meta_key = '_wc_review_count';
                $orderby = 'meta_value_num';
                $order = 'DESC';
            }
            if ( 'date' === $order_by ) {
                $orderby = 'date';
                $order = 'DESC';
            }
            $cat = get_query_var( 'product_cat' );
            $tag = get_query_var( 'product_tag' );
            $default_posts_per_page = get_option( 'posts_per_page' );
            $args = array(
                'post_type' => array('product'),
                'post_status'         => 'publish',
                'posts_per_page'        => $default_posts_per_page,
                'tax_query'           => array(
                ),
                'orderby' => $orderby,
                'meta_key' => $meta_key,
                'order' => $order
            );
            $args['meta_query'] = array();
                    if(isset($_GET['pgs'])&&!empty($_GET['pgs'])){
                        $args['paged'] = $_GET['pgs'];
                    }
                    //$args['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;

                    if(isset($cat)&&!empty($cat)){
                        $category_filter = array(
                                         'taxonomy'        => 'product_cat',
                                         'field'           => 'slug',
                                         'terms'           => array($cat),
                                         'operator'        => 'IN',
                                    );
                        array_push($args['tax_query'],$category_filter);
                    }
                    if(isset($tag)&&!empty($tag)){
                        $tag_filter = array(
                                         'taxonomy'        => 'product_tag',
                                         'field'           => 'slug',
                                         'terms'           => array($tag),
                                         'operator'        => 'IN',
                                    );
                        array_push($args['tax_query'],$tag_filter);
                    }
                    if(isset($_GET['color'])&&!empty($_GET['color'])){
                                $category_filter = array(
                                  'taxonomy'        => 'pa_color',
                                  'field'           => 'slug',
                                  'terms'           => explode(",",$_GET['color']),
                                  'operator'        => 'IN',
                                );
                                array_push($args['tax_query'],$category_filter);
                    }
                    if(isset($_GET['trending'])&&!empty($_GET['trending'])){
                            $trendingfilter = array(
                                    'key' => 'trending',
                                    'value' => '1',
                                    'compare' => 'LIKE'
                                );
                            array_push($args['meta_query'],$trendingfilter);
                    }
                    if(isset($_GET['frame'])&&!empty($_GET['frame'])){
                                $category_filter = array(
                                  'taxonomy'        => 'pa_frame-size',
                                  'field'           => 'slug',
                                  'terms'           => explode(",",$_GET['frame']),
                                  'operator'        => 'IN',
                                );
                                array_push($args['tax_query'],$category_filter);
                            }
                    
                    
                    if(isset($_GET['brand'])&&!empty($_GET['brand'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_brand',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['brand']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    
                    
                    if(isset($_GET['material'])&&!empty($_GET['material'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_material',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['material']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_GET['shape'])&&!empty($_GET['shape'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_shape',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['shape']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_GET['style'])&&!empty($_GET['style'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_style',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['style']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_GET['type'])&&!empty($_GET['type'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_types',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['type']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_GET['activity'])&&!empty($_GET['activity'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_activity',
                          'field'           => 'slug',
                          'terms'           => explode(",",$_GET['activity']),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_GET['cat'])&&!empty($_GET['cat'])){
                                $category_filter = array(
                                  'taxonomy'        => 'product_cat',
                                  'field'           => 'slug',
                                  'terms'           => explode(",",$_GET['cat']),
                                  'operator'        => 'IN',
                                );
                                array_push($args['tax_query'],$category_filter);
                            }
            //echo '<pre>';print_r(min(explode(",",$_GET['price'])));echo '</pre>';exit;

            if(isset($_GET['s'])){
                $args['s'] = $_GET['s'];
            }
            //print_r($args);
             wp_reset_query(); 
            $loop = new WP_Query( $args );
           // echo '<pre>';print_r($loop);echo '</pre>';
            wp_reset_query(); 
            $countallproduct = $loop->found_posts;
            $currentpagecount = count($loop->posts); 
            if(isset($tag)&&!empty($tag)){
                $all_product_category = array();
                $all_product_category_id = array();
                $all_product_category_parent_id = array();
                foreach ($loop->posts as $single_post) {
                    $category_detail=get_the_terms($single_post->ID,'product_cat');//$post->ID
                    foreach($category_detail as $cd){
                        
                        if (!in_array($cd, $all_product_category))
                          {
                            array_push($all_product_category,$cd);
                            array_push($all_product_category_id,$cd->term_id);
                            if($cd->parent!=0){
                                array_push($all_product_category_parent_id,$cd->parent);
                            }
                          }
                    }
                }
                
            }
?>


            <div class="row">
                <div class="col-sm-9">
                <?php
//  $cate = get_queried_object();
// print_r($cate);
//   $catename = $cate->name;
//  echo $catename;

if ( is_product_category() ) {

    $term_id  = get_queried_object_id();
    $taxonomy = 'product_cat';

    // Get subcategories of the current category
    $terms    = get_terms([
        'taxonomy'    => $taxonomy,
        'hide_empty'  => true,
        'parent'      => get_queried_object_id()
    ]);

    $output = '<ul class="category-ul d-flex p-0 mb-3">';

    // Loop through product subcategories WP_Term Objects
    foreach ( $terms as $term ) {
        $term_link = get_term_link( $term, $taxonomy );

        $output .= '<li class="'. $term->slug .'nav-item"><a class="nav-link" href="'. $term_link .'">'. $term->name .'</a></li>';
    }

    echo $output . '</ul>';
}
?>
                    
                </div>



                <div class="col-sm-3 showing-results">
                    <span>Showing <?php echo $currentpagecount; ?> of <?php echo $countallproduct; ?> Results</span>
                </div>
            </div>
            <?php 
                                    $catlist = get_terms('product_cat');
                                    $catlist_all = get_terms('product_cat');
                                    $cat = get_query_var( 'product_cat' );
                                    $tag = get_query_var( 'product_tag' ); 
                                       $query_args = array(
                                            'status'    => 'publish',
                                            'limit'     => -1,
                                        );
                                        if(isset($cat)&&!empty($cat)){
                                           $query_args['category'] = $cat;
                                        }elseif(isset($tag)&&!empty($tag)){
                                            $query_args['tag'] = $tag;
                                        }

                                        $data = array();
                                        foreach( wc_get_products($query_args) as $product ){
                                            
                                            //print_r( $product );
                                            
                                            foreach( $product->get_attributes() as $taxonomy => $attribute ){
                                                //print_r($attribute );
                                                
                                                $attribute_name = wc_attribute_label( $taxonomy );
                                                if(!empty($attribute->get_terms())){
                                                
                                                foreach ( $attribute->get_terms() as $term ){
                                                    $data[$taxonomy][$term->term_id]['name'] = $term->name;
                                                    $data[$taxonomy][$term->term_id]['slug'] = $term->slug;
                                                 }
                                                
                                            }
                                        }


                                        }

                                                                            
                                        ?>

            <div class="row p-3">
              <div class="mobile-filter">
                <span>Filter:</span>
              </div>

                <div class="col-sm-3 filter-sidebar">
                    <div class="filter-category-wrapper px-3">
                        <!-- <h4 class="mb-5">Filters By</h4> -->
                        <div class="accordion category-dropdown" id="accordionExample">

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="true"
                                            aria-controls="collapseThree">
                                            Trending
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    
                                            <div class="btn-checkbox">
                                                <input type="checkbox" class="trendingcheckbox" name="trendingcheckbox" value="1"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['trending'])&&!empty($_GET['trending'])){ 

                                                        if (1==$_GET['trending']) {
                                                            echo 'checked';
                                                        }

                                                    } ?>>
                                                <label for="checkbox<?php  echo $count;$count++; ?>"><span class=""></span>Trending<small></small></label>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">Frame size
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                    if(isset($data['pa_frame-size'])){
                                $framelist = $data['pa_frame-size'];
                                $count =100;
                                if(!empty($framelist)){
                                sort($framelist);
                                foreach ($framelist as $singleframe) {
                                    ?>
                                        <div class="btn-checkbox">
                                            <input type="checkbox" class="framecheckbox" name="framecheckbox" value="<?php  echo $singleframe['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['frame'])&&!empty($_GET['frame'])){ 

                                                    if (in_array($singleframe['slug'],explode(",",$_GET['frame']))) {
                                                        echo 'checked';
                                                    }

                                                } ?>>
                                            <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singleframe['name']; ?>;"></span><?php  echo $singleframe['name']; ?><small></small></label>
                                        </div>
                                    <?php
                                }
                                }

                            }

?>
                                       

                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            FRAME COLOR
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        
                                    <?php
                                   if(isset($data['pa_color'])){
                                    $colorlist = $data['pa_color'];
                                    $count =200;
                                    if(!empty($colorlist)){
                                    sort($colorlist);
                                    foreach ($colorlist as $singleColor) {
                                        ?>
                                            <div class="btn-checkbox">
                                                <input type="checkbox" class="colorcheckbox" name="colorcheckbox" value="<?php  echo $singleColor['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['color'])&&!empty($_GET['color'])){ 

                                                        if (in_array($singleColor['slug'],explode(",",$_GET['color']))) {
                                                            echo 'checked';
                                                        }

                                                     } ?>>
                                                <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singleColor['name']; ?>;"></span><?php  echo $singleColor['name']; ?><small></small></label>
                                            </div>
                                        <?php
                                    }
                                }
}
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>

                            

                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            MATERIAL
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                     <?php
                                        if(isset($data['pa_material'])){
                                        $materiallist = $data['pa_material'];
                                        $count =400;
                                        if(!empty($materiallist)){
                                        foreach ($materiallist as $singlematerial) {
                                            ?>
                                                <div class="btn-checkbox">
                                                    <input type="checkbox" class="materialcheckbox" name="materialcheckbox" value="<?php  echo $singlematerial['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['material'])&&!empty($_GET['material'])){ 

                                                            if (in_array($singlematerial['slug'],explode(",",$_GET['material']))) {
                                                                echo 'checked';
                                                            }

                                                        } ?>>
                                                    <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singlematerial['name']; ?>;"></span><?php  echo $singlematerial['name']; ?><small></small></label>
                                                </div>
                                            <?php
                                        }
                                        }
                       }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive">
                                            SHAPE
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php
                                       if(isset($data['pa_shape'])){
                                        $shapelist = $data['pa_shape'];
                                        $count =500;
                                        if(!empty($shapelist)){
                                        foreach ($shapelist as $singleshape) {
                                            ?>
                                                <div class="btn-checkbox">
                                                    <input type="checkbox" class="shapecheckbox" name="shapecheckbox" value="<?php  echo $singleshape['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['shape'])&&!empty($_GET['shape'])){ 

                                                            if (in_array($singleshape['slug'],explode(",",$_GET['shape']))) {
                                                                echo 'checked';
                                                            }

                                                        } ?>>
                                                    <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singleshape['name']; ?>;"></span><?php  echo $singleshape['name']; ?><small></small></label>
                                                </div>
                                            <?php
                                        }
                                        }
}
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseSix" aria-expanded="false"
                                            aria-controls="collapseSix">
                                            STYLE
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                       if(isset($data['pa_style'])){
                                        $stylelist = $data['pa_style'];
                                        $count =600;
                                        if(!empty($stylelist)){
                                        foreach ($stylelist as $singlestyle) {
                                            ?>
                                                <div class="btn-checkbox">
                                                    <input type="checkbox" class="stylecheckbox" name="stylecheckbox" value="<?php  echo $singlestyle['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['style'])&&!empty($_GET['style'])){ 

                                                            if (in_array($singlestyle['slug'],explode(",",$_GET['style']))) {
                                                                echo 'checked';
                                                            }

                                                        } ?>>
                                                    <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singlestyle['name']; ?>;"></span><?php  echo $singlestyle['name']; ?><small></small></label>
                                                </div>
                                            <?php
                                        }
                                        }
               }
                                        ?>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header" id="headingEight">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseSeven" aria-expanded="false"
                                            aria-controls="collapseSeven">
                                            Type
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingEight"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                    if(isset($data['pa_types'])){
                                    $typelist = $data['pa_types'];
                                    $count =700;
                                    if(!empty($typelist)){
                                    foreach ($typelist as $singletype) {
                                        ?>
                                            <div class="btn-checkbox">
                                                <input type="checkbox" class="typecheckbox" name="typecheckbox" value="<?php  echo $singletype['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['type'])&&!empty($_GET['type'])){ 

                                                        if (in_array($singletype['slug'],explode(",",$_GET['type']))) {
                                                            echo 'checked';
                                                        }

                                                    } ?>>
                                                <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singletype['name']; ?>;"></span><?php  echo $singletype['name']; ?><small></small></label>
                                            </div>
                                        <?php
                                    }
                                    }
                         }
                                    ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingEight">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseEight" aria-expanded="false"
                                            aria-controls="collapseEight">
                                            Activity
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                       if(isset($data['pa_activity'])){
                                        $activitylist = $data['pa_activity'];
                                        $count =800;
                                        if(!empty($activitylist)){
                                        foreach ($activitylist as $singleactivity) {
                                            ?>
                                                <div class="btn-checkbox">
                                                    <input type="checkbox" class="activitycheckbox" name="activitycheckbox" value="<?php  echo $singleactivity['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['activity'])&&!empty($_GET['activity'])){ 

                                                            if (in_array($singleactivity['slug'],explode(",",$_GET['activity']))) {
                                                                echo 'checked';
                                                            }

                                                        } ?>>
                                                    <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singleactivity['name']; ?>;"></span><?php  echo $singleactivity['name']; ?><small></small></label>
                                                </div>
                                            <?php
                                        }
                                        }
               }
                                        ?>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-sm-9 all-products">
                    <div class="row align-items-center drop-sort">
                        <div class="sort-by-filter-btn col-md-12 d-flex align-items-center background-secondary px-4 py-2">
                            <span>Sort By:</span>
                            <ul class="sort-ul d-md-flex">
                                <li class="nav-item shorting <?php if(isset($_GET['orderby'])&&$_GET['orderby']=='rating'){ echo 'selectedshort'; }?>" data="rating" ><p class="nav-link" href="#">Relevance</p></li>
                                <li class="nav-item shorting <?php if(isset($_GET['orderby'])&&$_GET['orderby']=='bestseller'){ echo 'selectedshort'; }?>" data="bestseller"><p class="nav-link" href="#">Best Seller</p></li>
                                <li class="nav-item shorting  <?php if(isset($_GET['orderby'])&&$_GET['orderby']=='popularity'){ echo 'selectedshort'; }?>" data="popularity"><p class="nav-link" href="#">Popularityss</p></li>
                                <li class="nav-item shorting  <?php if(isset($_GET['orderby'])&&$_GET['orderby']=='price'){ echo 'selectedshort'; }?>" data="price"><p class="nav-link" href="#">Price - Low to High</p></li>
                                <li class="nav-item shorting  <?php if(isset($_GET['orderby'])&&$_GET['orderby']=='price-desc'){ echo 'selectedshort'; }?>" data="price-desc"><p class="nav-link" href="#">Price - High to Low</p></li>
                            </ul>

                        </div>
                    </div>


               
<ul class="row products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
    <?php
                if(count($loop->posts)>0){
                       while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                    <li class="col-md-4">
                        <div class="product-card">
                            <div class="product-img mb-4">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                    <?php
                                        global $product;

                                        if (!$product->is_in_stock()) {
                                            echo '<span class="out-of-stock-p">Out of Stock</span>';
                                        }
                                        ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id()); ?>" alt=""/></a>
                                    <div class="color-icon">
                                        <ul class="d-flex">
                                            <?php 

                                                                                $args = array(
                                            'post_type'     => 'product_variation',
                                            'post_status'   => array( 'private', 'publish' ),
                                            'numberposts'   => -1,
                                            'orderby'       => 'menu_order',
                                            'order'         => 'asc',
                                            'post_parent'   => get_the_ID() // get parent post-ID
                                        );
                                        $variations = get_posts( $args );

                                         foreach ( $variations as $variation ) {
                                            $variation_ID = $variation->ID;
                                            $variation = new WC_Product_Variation( $variation_ID );
                                            // $available_variations = $variation->get_available_variations();
                                            // foreach( $available_variations as $key => $value ){ 
                                            //     var_dump( $value['attributes'] ) ;
                                            // }
                                           
                                           $image_tag = $variation->get_image();
                                           $image_id = $variation->get_image_id();
                                           $image_attributes = wp_get_attachment_image_src( $image_id );
                                          $image_url = $image_attributes[0];
                                           
                                            //echo $image_tag;
                                         $single_variation = $variation->get_data();
                                         $color_name = $single_variation['attributes']['pa_color'];
                                         ?>  <li image_url="<?php echo $image_url;    ?>" class="<?php  echo $color_name;  ?> variant_color"><a href="javascript:void(0)"><?php  echo $color_name;  ?></a></li> <?php
                                         //echo '<pre>'; print_r( $single_variation);  echo '</pre>'; exit;

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
                    </li>
                    

                                
                    <?php endwhile; 
                        }else{
                             ?><h2>No Product Found</h2><?php
                        }
                    ?>


        <nav class="pagination-nav mt-4 mb-4">
                <div class="pagenavi">
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
                              if(isset($_GET['pgs'])){
                                  $currentpage = $_GET['pgs'];
                              }else{
                                  $currentpage = 1;
                              }
                              echo paginate_links( array(
                              'base' => $mybaseurl.'%_%',
                              'current' => max( 1, $currentpage ),
                              'total' => $loop->max_num_pages,
                              'format' => '&pgs=%#%',
                              ) );

                              // the_posts_pagination();
                              ?>
                </div>
        </nav>

</ul>
<!----Pagination---->

     <?php 
    //show category description 
    $term_object = get_queried_object();
    if(!empty($term_object->description)){
        ?>
            <div class="category-content">
                <h2><?php echo $term_object->name; ?></h2>
                <?php echo $term_object->description; ?>
                <a href="#collapse" class="nav-toggle">Read More</a>
            </div> 
        <?php
        }
    ?> 
<script>
$(document).ready(function () {
    $('.nav-toggle').click(function () {
        var collapse_content_selector = $(this).attr('href');
        var toggle_switch = $(this);
        $(collapse_content_selector).toggle(function () {
            if ($(this).css('display') == 'none') {
                toggle_switch.html('Read More');
            } else {
                toggle_switch.html('Read Less');
            }
        });
    });

});					
</script>
                


                </div>
            </div>
        </div>
    </section>
</article>

<script type="text/javascript">

$(document).ready(function () {

        if ($(window).width() <= 650) {
  $('.drop-sort span').on('click', function() {
    $('.sort-ul').slideToggle();
    $(this).toggleClass('active');
  });
}


        $('.variant_color').click(function(){
            var image_url = $(this).attr('image_url');
            $(this).parent().parent().parent().find('img').attr('src',image_url);
        });
        
       $('.trendingcheckbox').change(function(){
            change_filter();
        });
        $('.framecheckbox').change(function(){
            change_filter();
        });
       
        $('.colorcheckbox').change(function(){
            change_filter();
        });
        
         $('.brandcheckbox').change(function(){
          change_filter();
        });
        
        $('.materialcheckbox').change(function(){
              change_filter();
        });

        $('.shapecheckbox').change(function(){
            change_filter();
        });

        $('.stylecheckbox').change(function(){
          change_filter();
        });
        $('.typecheckbox').change(function(){
          change_filter();
        });
        $('.activitycheckbox').change(function(){
          change_filter();
        });
        $('.shorting').click(function(){
            $('.shorting').removeClass('selectedshort');
            $(this).addClass('selectedshort');
            change_filter();
        });
        
    function change_filter(){
        // alert('testing');
$('.products').html('<div class="LoadingProducts" style="margin-left:40%;margin-top:200px;width:130px"><img src="<?php echo  
content_url();  ?>/uploads/2022/03/blue-loader.gif" ></div>');
    $('.showing-results').hide();

     <?php wp_reset_query(); ?>       
    var siteurl = "<?php echo get_permalink( get_the_ID() ).'?' ?>";
    
            
    var product_cat = '<?php echo $cat = get_query_var( 'product_cat' ); ?>';
    if(product_cat!=''){
        siteurl = siteurl+'product_cat='+product_cat;
    }

    var product_tag = '<?php echo $cat = get_query_var( 'product_tag' ); ?>';
    if(product_tag!=''){
        siteurl = siteurl+'product_tag='+product_tag;
    }

    var trendingselected = new Array();
    $("input:checkbox[name=trendingcheckbox]:checked").each(function() {
        trendingselected.push($(this).val());
    });
    if(trendingselected!=''){
        siteurl = siteurl+'&trending='+trendingselected;
    } 

    var frameselected = new Array();
    $("input:checkbox[name=framecheckbox]:checked").each(function() {
        frameselected.push($(this).val());

    });
    if(frameselected!=''){
        siteurl = siteurl+'&frame='+frameselected;
    }

    var colorselected = new Array();
    $("input:checkbox[name=colorcheckbox]:checked").each(function() {
        colorselected.push($(this).val());
    });
    if(colorselected!=''){
        siteurl = siteurl+'&color='+colorselected;
    }
    
    var brandselected = new Array();
    $("input:checkbox[name=brandcheckbox]:checked").each(function() {
      brandselected.push($(this).val());
    });
    if(brandselected!=''){
        siteurl = siteurl+'&brand='+brandselected;
    }
    
     var materialselected = new Array();
    $("input:checkbox[name=materialcheckbox]:checked").each(function() {
      materialselected.push($(this).val());
    });
    if(materialselected!=''){
        siteurl = siteurl+'&material='+materialselected;
    }

    var shapeselected = new Array();
    $("input:checkbox[name=shapecheckbox]:checked").each(function() {
      shapeselected.push($(this).val());
    });
    if(shapeselected!=''){
        siteurl = siteurl+'&shape='+shapeselected;
    }

    var styleselected = new Array();
    $("input:checkbox[name=stylecheckbox]:checked").each(function() {
      styleselected.push($(this).val());
    });
    if(styleselected!=''){
        siteurl = siteurl+'&style='+styleselected;
    }

    var typeselected = new Array();
    $("input:checkbox[name=typecheckbox]:checked").each(function() {
      typeselected.push($(this).val());
    });
    if(typeselected!=''){
        siteurl = siteurl+'&type='+typeselected;
    }

    var activityselected = new Array();
    $("input:checkbox[name=activitycheckbox]:checked").each(function() {
        activityselected.push($(this).val());
    });
    if(activityselected!=''){
        siteurl = siteurl+'&activity='+activityselected;
    }

    orderby = '';
    orderby = $('.selectedshort').attr('data');
    vars = [];
    hash={};
    hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    if(orderby!=''){
     // console.log(siteurl);
        // siteurl = siteurl+'&orderby='+orderby;
        
        if (typeof vars["pgs"] === "undefined") {
        siteurl = siteurl+'&orderby='+orderby;
        }else{
        siteurl = siteurl+'&orderby='+orderby+'&pgs='+vars["pgs"];
        }

    }
      if (typeof vars["pgs"] === "undefined") {
        current_page ='';
      
      }else{
      current_page = vars["pgs"];
      }
     console.log(current_page);
    

    window.history.pushState({page: "another"}, "another page", siteurl);

    <?php 
            $urlParams = array();
            $cat = get_query_var( 'product_cat' );
            $tag = get_query_var( 'product_tag' );
            if(isset($cat)&&!empty($cat)){
                $urlParams['product_cat'] = $cat;
            }elseif(isset($tag)&&!empty($tag)){
                $urlParams['product_tag'] = $tag;
            }
            if(isset($_GET['s'])){
                $search_data = $_GET['s'];
            }
            
        ?>
    
        
        var data = {
            'action': 'filer_by_color',
            'orderby': orderby,
            'trending_filter': Object.assign({}, trendingselected),
            'frame_filter': Object.assign({}, frameselected),
            'filter_data': Object.assign({}, colorselected),
            'brand_data': Object.assign({}, brandselected),
            'material_data': Object.assign({}, materialselected),
            'shape_data': Object.assign({}, shapeselected),
            'style_data': Object.assign({}, styleselected),
            'type_data': Object.assign({}, typeselected),
            'activity_data': Object.assign({}, activityselected),
            'current_page' : current_page,
            'url_data': <?php echo json_encode($urlParams);  ?>,
            's': '<?php if (!empty($search_data)) {echo $search_data;}    ?>'
        };
        //console.log(data);
        var ajaxurl = "<?php  echo  admin_url() ;  ?>admin-ajax.php";
        jQuery.post(ajaxurl, data, function(response) {
            $('.products').html(response);
            
        });
    }

    var orderby = '<?php echo $_GET['orderby']; ?>';
    if(orderby!=''){
        // console.log('yogesh');
        change_filter();
        //$('.showing-results').show();
    }

  });

</script>


<script>

  $(document).on("click", ".mobile-filter", function(){
    $(this).toggleClass('active')
    $(".filter-sidebar").toggleClass("active")

  })

</script>