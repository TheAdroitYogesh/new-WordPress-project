<?php

/*
 * Theme setup
 * Image sizes registered here
 */
require 'inc/setup.php';

/*
 * ACF functions
 */
require 'inc/acf.php';

/*
 * Menus
 */
require 'inc/menus.php';

/*
 * Breadcrumb
 */
require 'inc/breadcrumb.php';

/*
 * Media
 */
require 'inc/media.php';

/*
 * Post Types
 */
require 'inc/posttypes.php';

/*
 * Pagination
 */
require 'inc/pagination.php';

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title',3 );


//filter product
function filer_by_color(){
   // echo '<pre>';print_r($_POST);echo '</pre>';

                    $order_by = ( ! empty( $_POST['orderby'] ) ) ? $_POST['orderby'] : '';
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
                    if ( 'popularity' === $order_by ) {
                        $meta_key = '_wc_review_count';
                        $orderby = 'meta_value_num';
                        $order = 'DESC';
                    }
                    $default_posts_per_page = get_option( 'posts_per_page' );
                    if ( 'bestseller' === $order_by ) {
                        $meta_key = 'total_sales';
                        $orderby = 'meta_value_num';
                        $order = 'DESC';
                       $default_posts_per_page = 10;
                    }
                   
                    
                    $args= array(
                      'post_type'           => array('product'),
                      'post_status'         => 'publish',
                      'posts_per_page'        => $default_posts_per_page,
                      'tax_query'           => array(
                      ),
                      'orderby' => $orderby,
                      'meta_key' => $meta_key,
                        'order' => $order,
                        
                    );
                    $current_page = 1;
                    if(isset($_POST['current_page'])&&!empty($_POST['current_page'])){
                        $args['paged'] = $_POST['current_page'];
                        $current_page = $_POST['current_page'];
                    }
                    $args['meta_query'] = array();
                    if(isset($_POST['frame_filter'])&&!empty($_POST['frame_filter'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_frame-size',
                          'field'           => 'slug',
                          'terms'           => $_POST['frame_filter'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    if(isset($_POST['trending_filter'])&&!empty($_POST['trending_filter'])){
                        $trendingfilter = array(
                                    'key' => 'trending',
                                    'value' => '1',
                                    'compare' => 'LIKE'
                                );
                            array_push($args['meta_query'],$trendingfilter);
                    }
                    
                    if(isset($_POST['filter_data'])&&!empty($_POST['filter_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_color',
                          'field'           => 'slug',
                          'terms'           => $_POST['filter_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    
                    if(isset($_POST['brand_data'])&&!empty($_POST['brand_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_brand',
                          'field'           => 'slug',
                          'terms'           => $_POST['brand_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    
                    
                    if(isset($_POST['material_data'])&&!empty($_POST['material_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_material',
                          'field'           => 'slug',
                          'terms'           => $_POST['material_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_POST['shape_data'])&&!empty($_POST['shape_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_shape',
                          'field'           => 'slug',
                          'terms'           => $_POST['shape_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_POST['style_data'])&&!empty($_POST['style_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_style',
                          'field'           => 'slug',
                          'terms'           => $_POST['style_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    if(isset($_POST['type_data'])&&!empty($_POST['type_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_types',
                          'field'           => 'slug',
                          'terms'           => $_POST['type_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }

                    if(isset($_POST['activity_data'])&&!empty($_POST['activity_data'])){
                        $category_filter = array(
                          'taxonomy'        => 'pa_activity',
                          'field'           => 'slug',
                          'terms'           => $_POST['activity_data'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    
                    if(isset($_POST['cat_filter'])&&!empty($_POST['cat_filter'])){
                        $category_filter = array(
                          'taxonomy'        => 'product_cat',
                          'field'           => 'slug',
                          'terms'           => $_POST['cat_filter'],
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }else{
                        if(isset($_POST['url_data' ]['product_cat'])){
                        $cat = $_POST['url_data' ]['product_cat'];
                        $category_filter = array(
                          'taxonomy'        => 'product_cat',
                          'field'           => 'slug',
                          'terms'           => array($cat),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$category_filter);
                    }
                    }
                    if(isset($_POST['url_data' ]['product_tag'])){
                        $tag = $_POST['url_data' ]['product_tag'];
                        $tag_filter = array(
                          'taxonomy'        => 'product_tag',
                          'field'           => 'slug',
                          'terms'           => array($tag),
                          'operator'        => 'IN',
                        );
                        array_push($args['tax_query'],$tag_filter);
                        }

                    if(isset($_POST['s'])&&!empty($_POST['s'])){
                        $args['s'] = $_POST['s'];
                    }
                    //print_r($args);//exit;
                     wp_reset_query(); 
                    $loop = new WP_Query( $args );
                    //echo '<pre>';print_r($loop);echo '</pre>';
                    if ( 'bestseller' === $order_by ){
						$loop->max_num_pages = 1;
					}
                    wp_reset_query(); 
                    if(count($loop->posts)==0){
                        ?><h2>No Product Found</h2><?php
                    } 

                    ?>
                        
                    <?php
                       while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                    <li class="col-md-4">
                        <div class="product-card">
                            <div class="product-img mb-4">
                                    <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id()); ?>" alt=""/></a>
                                    <div class="color-icon">
                                        <ul class="d-flex">
                                           <?php 

                                                                                $args = array(
                                            'post_type'     => 'product_variation',
                                            'post_status' => 'publish',
                                            'numberposts'   => -1,
                                            'orderby'       => 'menu_order',
                                            'order'         => 'asc',
                                            'post_parent'   => get_the_ID() // get parent post-ID
                                        );
                                        $variations = get_posts( $args );

                                         foreach ( $variations as $variation ) {
                                            $variation_ID = $variation->ID;
                                            $variation = new WC_Product_Variation( $variation_ID );
                                           
                                           $image_tag = $variation->get_image();
                                           $image_id = $variation->get_image_id();
                                           $image_attributes = wp_get_attachment_image_src( $image_id );
                                          $image_url = $image_attributes[0];
                                           
                                            //echo $image_tag;
                                         $single_variation = $variation->get_data();
                                         $color_name = $single_variation['attributes']['pa_color'];
                                         ?>  <li image_url="<?php echo $image_url;    ?>" class="<?php  echo $color_name;  ?> variant_color"><a href="javascript:void(0)"><?php  echo $color_name;  ?></a></li> <?php

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
                    

                                
                    <?php endwhile; ?>
                    <script type="text/javascript">
                        $('.variant_color').click(function(){
                            var image_url = $(this).attr('image_url');
                            $(this).parent().parent().parent().find('img').attr('src',image_url);
                        });
                    </script>
                <?php
                if(isset($_POST['ratings_filter'])){
                    if($rattingcount==0){
                        ?><h2>No Product Found</h2><?php
                    }
                }
                ?>

                            <nav class="pagination-nav mt-4 mb-4">
                                <div class="pagenavi">
                                    
                                    <?php 
                                        $big = 999999999; // need an unlikely integer   
                                        $mybaseurl = '/?';

                                        

                                        if(isset($_POST['url_data' ]['product_cat'])){
                                            $mybaseurl = get_category_link( get_cat_ID( $_POST['url_data' ]['product_cat'])).'?';
                                        } 
                                        if(isset($_POST['url_data' ]['product_tag'])){
                                            $tag = get_term_by('slug', $_POST['url_data' ]['product_tag'], 'post_tag');
                                            $tag_id =  $tag->term_id;
                                            $mybaseurl = get_tag_link($tag_id ).'?';
                                           
                                        }
                                        if(isset($_POST['url_data' ]['product_cat'])){
                                            $mybaseurl .= 'product_cat='.$_POST['url_data' ]['product_cat'];
                                        }
                                        if(isset($_POST['url_data' ]['product_tag'])){
                                            $mybaseurl .= 'product_tag='.$_POST['url_data' ]['product_tag'];
                                        } 
                                        if(isset($_POST['orderby'])){
                                            $mybaseurl .= '&orderby='.$_POST['orderby'];
                                        } 
                                        if(isset($_POST['filter_data'])){
                                            $mybaseurl .= '&color='.implode(",",$_POST['filter_data']);
                                        }
                                        if(isset($_POST['trending_filter'])){
                                            $mybaseurl .= '&trending='.implode(",",$_POST['trending_filter']);
                                        }
                                        if(isset($_POST['frame_filter'])){
                                            $mybaseurl .= '&frame='.implode(",",$_POST['frame_filter']);
                                        }
                                        if(isset($_POST['brand_data'])){
                                            $mybaseurl .= '&brand='.implode(",",$_POST['brand_data']);
                                        }
                                        if(isset($_POST['material_data'])){
                                            $mybaseurl .= '&material='.implode(",",$_POST['material_data']);
                                        }
                                        if(isset($_POST['shape_data'])){
                                            $mybaseurl .= '&shape='.implode(",",$_POST['shape_data']);
                                        }
                                        if(isset($_POST['style_data'])){
                                            $mybaseurl .= '&style='.implode(",",$_POST['style_data']);
                                        }
                                        if(isset($_POST['type_data'])){
                                            $mybaseurl .= '&type='.implode(",",$_POST['type_data']);
                                        }
                                        if(isset($_POST['activity_data'])){
                                            $mybaseurl .= '&activity='.implode(",",$_POST['activity_data']);
                                        }
                                        $pagination = paginate_links(array(
                                            'mid_size'  => 2,
                                            'prev_text' =>esc_html__('Previous', 'travel-tour'),
                                            'next_text' => esc_html__('Next', 'travel-tour'),
                                            'current' => max( 1, $current_page ),
                                            'total' => $loop->max_num_pages,
                                            'type' => 'array',
                                            'base'      => $mybaseurl.'%_%',
                                            'format'    => '&pgs=%#%',

                                        ) );
                                        echo '<li>' . implode( '</li><li>', $pagination ) . '</li>';
                                    ?>
                                    
                                </div> 
                            </nav>
                            


                    <?php


    wp_die(); 
}
add_action( 'wp_ajax_filer_by_color', 'filer_by_color' );
add_action('wp_ajax_nopriv_filer_by_color', 'filer_by_color');



/** Remove product data tabs */
 
add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}
//remove download from my account
function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );

//** Remove Sale Badge  */
add_filter('woocommerce_sale_flash', 'hide_sale_flash');
function hide_sale_flash()
{
return false;
}


// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

// register a new menu
register_nav_menu('primary-menu', 'Primary Menu');

/**
 * Register a custom menu page. for lense power range
 */
function wpdocs_register_my_custom_menu_page(){
    add_menu_page( 
        __( 'Power Range', 'textdomain' ),
        'Power Range',
        'manage_options',
        'powerrange',
        'my_power_range_menu_page',
        'dashicons-image-filter',
        10
    ); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

/**
 * Display a custom menu page
 */
function my_power_range_menu_page(){
    
    ?>
    <h1>Power Range</h1>
        
        <div class="box-container">
            <?php
                if(!empty($_POST)){
                    $flag = 1;
                    if($_POST['work_con_1_cyl_min']>$_POST['work_con_1_cyl_max']){
                        $message = 'Work Min Cylindrical Value can not be greater then Work Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['work_con_2_cyl_min']>$_POST['work_con_2_cyl_max']){
                        $message = 'Work Min Cylindrical Value can not be greater then Work Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['work_con_1_sph_min']>$_POST['work_con_1_sph_max']){
                        $message = 'Work Min Spherical Value can not be greater then Work Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['work_con_2_sph_min']>$_POST['work_con_2_sph_max']){
                        $message = 'Work Min Spherical Value can not be greater then Work Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_1_cyl_min']>$_POST['adept_con_1_cyl_max']){
                        $message = 'Adept Min Cylindrical Value can not be greater then Adept Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_2_cyl_min']>$_POST['adept_con_2_cyl_max']){
                        $message = 'Adept Min Cylindrical Value can not be greater then Adept Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_3_cyl_min']>$_POST['adept_con_3_cyl_max']){
                        $message = 'Adept Min Cylindrical Value can not be greater then Adept Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_1_sph_min']>$_POST['adept_con_1_sph_max']){
                        $message = 'Adept Min Spherical Value can not be greater then Adept Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_2_sph_min']>$_POST['adept_con_2_sph_max']){
                        $message = 'Adept Min Spherical Value can not be greater then Adept Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['adept_con_3_sph_min']>$_POST['adept_con_3_sph_max']){
                        $message = 'Adept Min Spherical Value can not be greater then Adept Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['play_con_1_cyl_min']>$_POST['play_con_1_cyl_max']){
                        $message = 'Play Min Cylindrical Value can not be greater then Play Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['play_con_2_cyl_min']>$_POST['play_con_2_cyl_max']){
                        $message = 'Play Min Cylindrical Value can not be greater then Play Max Cylindrical Value';
                        $flag = 0;
                    }elseif($_POST['play_con_1_sph_min']>$_POST['play_con_1_sph_max']){
                        $message = 'Play Min Spherical Value can not be greater then Play Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['play_con_2_sph_min']>$_POST['play_con_2_sph_max']){
                        $message = 'Play Min Spherical Value can not be greater then Play Max Spherical Value';
                        $flag = 0;
                    }elseif($_POST['work_con_1_cyl_max']>=$_POST['work_con_2_cyl_min']){
                        $message = 'Work Cylindrical Value is comman in two conditions';
                        $flag = 0;
                    }elseif($_POST['adept_con_1_cyl_max']>=$_POST['adept_con_2_cyl_min']){
                        $message = 'Adept Cylindrical Value is comman in two conditions';
                        $flag = 0;
                    }elseif($_POST['adept_con_2_cyl_max']>=$_POST['adept_con_3_cyl_min']){
                        $message = 'Adept Cylindrical Value is comman in two conditions';
                        $flag = 0;
                    }elseif($_POST['play_con_1_cyl_max']>=$_POST['play_con_2_cyl_min']){
                        $message = 'Play Cylindrical Value is comman in two conditions';
                        $flag = 0;
                    }
                    $power_range_json = json_encode($_POST);
                    if($flag){
                        update_post_meta(999999, 'power_range_json', $power_range_json );
                    }else{
                        echo '<div class="alert alert-secondary" role="alert">'.$message.'</div>';
                    }
                    
                }
                $power_range_data= json_decode(get_post_meta( 999999, 'power_range_json', true ));
                
            ?>
            <form method="post" action="">
            <table style="text-align:center;" class="power_range_table">
                <tr>
                    <td colspan="5"><h2>Work(Blue Block)</h2></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><h3>Cylindrical</h3></td>
                    <td colspan="2"><h3>Spherical</h3></td>
                </tr>
                <tr>
                    <td>Condition 1</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_1_cyl_min; ?>" required name="work_con_1_cyl_min"  placeholder="Min" /></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_1_cyl_max; ?>" required name="work_con_1_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_1_sph_min; ?>" required name="work_con_1_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_1_sph_max; ?>" required name="work_con_1_sph_max" placeholder="Max"/></td>
                </tr>
                <tr>
                    <td>Condition 2</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_2_cyl_min; ?>" required name="work_con_2_cyl_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_2_cyl_max; ?>" required name="work_con_2_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_2_sph_min; ?>" required name="work_con_2_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->work_con_2_sph_max; ?>" required name="work_con_2_sph_max" placeholder="Max"/></td>
                </tr>
           
                <tr>
                    <td colspan="5"><h2>Adept(Photocrometic)</h2></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><h3>Cylindrical</h3></td>
                    <td colspan="2"><h3>Spherical</h3></td>
                </tr>
                <tr>
                    <td>Condition 1</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_1_cyl_min; ?>" required name="adept_con_1_cyl_min" placeholder="Min" /></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_1_cyl_max; ?>" required name="adept_con_1_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_1_sph_min; ?>" required name="adept_con_1_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_1_sph_max; ?>" required name="adept_con_1_sph_max" placeholder="Max"/></td>
                </tr>
                <tr>
                    <td>Condition 2</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_2_cyl_min; ?>" required name="adept_con_2_cyl_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_2_cyl_max; ?>" required name="adept_con_2_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_2_sph_min; ?>" required name="adept_con_2_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_2_sph_max; ?>" required name="adept_con_2_sph_max" placeholder="Max"/></td>
                </tr>
                <tr>
                    <td>Condition 3</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_3_cyl_min; ?>" required name="adept_con_3_cyl_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_3_cyl_max; ?>" required name="adept_con_3_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_3_sph_min; ?>" required name="adept_con_3_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->adept_con_3_sph_max; ?>" required name="adept_con_3_sph_max" placeholder="Max"/></td>
                </tr>
            
                <tr>
                    <td colspan="5"><h2>Play(Sun Protection (Tinted), Unbreakable)</h2></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><h3>Cylindrical</h3></td>
                    <td colspan="2"><h3>Spherical</h3></td>
                </tr>
                <tr>
                    <td>Condition 1</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_1_cyl_min; ?>" required name="play_con_1_cyl_min" placeholder="Min" /></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_1_cyl_max; ?>" required name="play_con_1_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_1_sph_min; ?>" required name="play_con_1_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_1_sph_max; ?>" required name="play_con_1_sph_max" placeholder="Max"/></td>
                </tr>
                <tr>
                    <td>Condition 2</td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_2_cyl_min; ?>" required name="play_con_2_cyl_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_2_cyl_max; ?>" required name="play_con_2_cyl_max" placeholder="Max"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_2_sph_min; ?>" required name="play_con_2_sph_min" placeholder="Min"/></td>
                    <td><input type="number" step="0.25" value="<?php echo $power_range_data->play_con_2_sph_max; ?>" required name="play_con_2_sph_max" placeholder="Max"/></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <button type="submit" >Submit</button>
                    </td>
                </tr>

            </table>
        </form>
        </div>
        <style type="text/css">
            table.power_range_table {
                width: 100%;
                border: 1px solid black;
            }
            .power_range_table td {
              border: 1px solid black;
              padding: 5px;
            }
            .alert.alert-secondary {
                width: 100%;
                background: #f2b7bf;
                padding: 13px 10px;
                font-size: 18px;
                margin: 10px 0px;
                color: red;
                border-radius: 5px;
            }
        </style>

    <?php  
}


//flow ajax
function lense_power_condtion(){

    $power_range_data = json_decode(get_post_meta( 999999, 'power_range_json', true ));
    if($_POST['lense_type']=='work'){

                     if($power_range_data->work_con_1_cyl_min <= $_POST['cylpower'] && $power_range_data->work_con_1_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->work_con_1_sph_min;
                        $max_value = $power_range_data->work_con_1_sph_max;
                     }elseif($power_range_data->work_con_2_cyl_min <= $_POST['cylpower'] && $power_range_data->work_con_2_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->work_con_2_sph_min;
                        $max_value = $power_range_data->work_con_2_sph_max;
                     }
                    ?>

                    <option value="">Select</option>
                    <?php 
                    $lensevalue = $min_value;
                    $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    }        
    }elseif($_POST['lense_type']=='adept'){

                if($power_range_data->adept_con_1_cyl_min <= $_POST['cylpower'] && $power_range_data->adept_con_1_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->adept_con_1_sph_min;
                        $max_value = $power_range_data->adept_con_1_sph_max;
                     }elseif($power_range_data->adept_con_2_cyl_min <= $_POST['cylpower'] && $power_range_data->adept_con_2_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->adept_con_2_sph_min;
                        $max_value = $power_range_data->adept_con_2_sph_max;
                     }elseif($power_range_data->adept_con_3_cyl_min <= $_POST['cylpower'] && $power_range_data->adept_con_3_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->adept_con_3_sph_min;
                        $max_value = $power_range_data->adept_con_3_sph_max;
                     }
                ?>
                <option value="">Select</option>
                <?php $lensevalue = $min_value;
                    $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                } 

    }elseif($_POST['lense_type']=='play'){
                    if($power_range_data->play_con_1_cyl_min <= $_POST['cylpower'] && $power_range_data->play_con_1_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->play_con_1_sph_min;
                        $max_value = $power_range_data->play_con_1_sph_max;
                     }elseif($power_range_data->play_con_2_cyl_min <= $_POST['cylpower'] && $power_range_data->play_con_2_cyl_max >= $_POST['cylpower']){
                        $min_value = $power_range_data->play_con_2_sph_min;
                        $max_value = $power_range_data->play_con_2_sph_max;
                     }
                    ?>

                 <option value="">Select</option>
                 <?php 
                 $lensevalue = $min_value;
                $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 
    }
    
    exit;
}






add_action( 'wp_ajax_lense_power_condtion', 'lense_power_condtion' );
add_action('wp_ajax_nopriv_lense_power_condtion', 'lense_power_condtion');

function so17687619_jquery_add_inline() {
    wp_add_inline_script( 'jquery-core', '$ = jQuery;' );
}
add_action( 'wp_enqueue_scripts', 'so17687619_jquery_add_inline' );

function yith_wishlist_counter_shortcode() {
    ob_start();

    // Get the wishlist count using YITH Wishlist function
    $wishlist_count = yith_wcwl_count_products();

    // Output the wishlist count
    echo '<span class="wishlist-counter">' . esc_html($wishlist_count) . '</span>';

    return ob_get_clean();
}
add_shortcode('wishlist_counter', 'yith_wishlist_counter_shortcode');

function enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);

    // Pass wishlist nonce and YITH Wishlist data to the script
    wp_localize_script('custom-script', 'wishlistCounter', array(
        'wishlistNonce' => wp_create_nonce('wishlist-nonce'),
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function register_shipped_order_status() {
    register_post_status( 'wc-shipped', array(
        'label'                     => 'Shipped',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Shipped <span class="count">(%s)</span>', 'Shipped <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_shipped_order_status' );
	
	
add_filter( 'wc_order_statuses', 'custom_order_status');
function custom_order_status( $order_statuses ) {
    $order_statuses['wc-shipped'] = _x( 'Shipped', 'Order status', 'woocommerce' ); 
    return $order_statuses;
}


add_action('woocommerce_order_status_changed', 'shipped_status_custom_notification', 10, 4);
function shipped_status_custom_notification( $order_id, $from_status, $to_status, $order ) {

   if( $order->has_status( 'shipped' )) {

        // Getting all WC_emails objects
        $email_notifications = WC()->mailer()->get_emails();

        // Customizing Heading and subject In the WC_email processing Order object
        $email_notifications['WC_Email_Customer_Processing_Order']->heading = __('Your Order shipped','woocommerce');
        $email_notifications['WC_Email_Customer_Processing_Order']->subject = 'Your {site_title} order shipped receipt from {order_date}';
		$email_notifications['WC_Email_Customer_Processing_Order']->template_html  = 'emails/customer-shipped-order.php';
        // Sending the customized email
        $email_notifications['WC_Email_Customer_Processing_Order']->trigger( $order_id );
    }

}

add_action( 'woocommerce_order_status_wc-shipped', array( WC(), 'send_transactional_email' ), 10, 1 );


add_filter( 'woocommerce_email_actions', 'filter_woocommerce_email_actions' );
function filter_woocommerce_email_actions( $actions ){
    $actions[] = 'woocommerce_order_status_wc-shipped';
    return $actions;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'custom_out_of_stock_label', 10 );

function custom_out_of_stock_label() {
    global $product;

    if ( !$product->is_in_stock() ) {
        echo '<span class="out-of-stock-label">' . esc_html__( 'Out of Stock', 'your-text-domain' ) . '</span>';
    }
}




// Remove cash on delivery payment method for specific categories
add_filter( 'woocommerce_available_payment_gateways', 'remove_cod_for_specific_categories' );
function remove_cod_for_specific_categories( $available_gateways ) {
    // Check if we are in the checkout page
    if ( is_checkout() ) {
        // Define the IDs of the categories for which cash on delivery should be removed
        $categories_to_exclude = array( 16 ); // Replace 123 and 456 with the IDs of sunglasses and eyeglasses categories respectively
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $product_id = $cart_item['product_id'];
            $product_categories = get_the_terms( $product_id, 'product_cat' );
            foreach ( $product_categories as $category ) {
                // If cart contains a product from any of the categories to exclude, remove cash on delivery
                if ( in_array( $category->term_id, $categories_to_exclude ) ) {
                    if ( isset( $available_gateways['cod'] ) ) {
                        unset( $available_gateways['cod'] );
                    }
                    return $available_gateways;
                }
            }
        }
    }
    return $available_gateways;
}


