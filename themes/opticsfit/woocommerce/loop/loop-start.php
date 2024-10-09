<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" >


    <?php
    		$cate = get_queried_object();
            $cateID = $cate->term_id;
			$thumbnail_id = get_term_meta( $cateID, 'thumbnail_id', true );
			$image_url    = wp_get_attachment_url( $thumbnail_id );
    ?>
    
    <img src="<?php echo $image_url; ?>"/>
    
    <?php
            
            if( have_rows('page_banner') ): 
                get_template_part('partials/banners/internal/page_banner');
                $i  = 1;
            endif;          
    ?>

    <section class="section popular-product category-grid-wrapper">
        <div class="container">
            

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
                    <span>Showing 09 of 115 Results</span>
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



                <div class="col-sm-3 filter-sidebar">
                    <div class="filter-category-wrapper px-3">
                        <!-- <h4 class="mb-5">Filters By</h4> -->
                        <div class="accordion category-dropdown" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">Frame size
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                    if(isset($data['pa_frame-size'])){
                                $framelist = $data['pa_frame-size'];
                                $count =100;
                                if(!empty($framelist)){
                                foreach ($framelist as $singleframe) {
                                    ?>
                                        <div class="btn-checkbox">
                                            <input type="checkbox" class="framecheckbox" name="framecheckbox" value="<?php  echo $singleframe['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['frame_size'])&&!empty($_GET['frame_size'])){ 

                                                    if (in_array($singleframe['slug'],explode(",",$_GET['frame_size']))) {
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
                                <div class="card-header" id="headingThree">
                                    <h5 class="m-0 accordian-title">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            BRAND
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php
                                    if(isset($data['pa_brand'])){
                                    $brandlist = $data['pa_brand'];
                                    $count =300;
                                    if(!empty($brandlist)){
                                    foreach ($brandlist as $singlebrand) {
                                        ?>
                                            <div class="btn-checkbox">
                                                <input type="checkbox" class="brandcheckbox" name="brandcheckbox" value="<?php  echo $singlebrand['slug']; ?>"  id="checkbox<?php  echo $count; ?>" <?php   if(isset($_GET['brand'])&&!empty($_GET['brand'])){ 

                                                        if (in_array($singlebrand['slug'],explode(",",$_GET['brand']))) {
                                                            echo 'checked';
                                                        }

                                                    } ?>>
                                                <label for="checkbox<?php  echo $count;$count++; ?>"><span class="" style="background-color:<?php  echo $singlebrand['name']; ?>;"></span><?php  echo $singlebrand['name']; ?><small></small></label>
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

                        </div>
                    </div>
                </div>
                <div class="col-sm-9 all-products">
                    <div class="row align-items-center">
                        <div class="col-md-12 d-flex align-items-center background-secondary px-4">
                            <span>Sort By:2</span>
                            <ul class="sort-ul d-md-flex">
                                <li class="nav-item"><a class="nav-link" href="#">Relevance</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Popularity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Price - Low to High</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Price - High to Low</a></li>
                            </ul>

                        </div>
                    </div>



                    
<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">