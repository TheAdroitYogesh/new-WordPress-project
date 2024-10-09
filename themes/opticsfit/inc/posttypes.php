<?php

/* ==========================================================================
   Register Post Types
   ========================================================================== */
 
/** POST NAME post type */
//add_action('init', 'POST_NAME_register');
 
function POST_NAME_register() {
 
	$labels = array(
		'name' => _x('POST_NAME', 'post type general name'),
		'singular_name' => _x('POST_NAME_SINGULAR', 'post type singular name'),
		'add_new' => _x('Add New POST_NAME_SINGULAR', 'POST_TYPE'), // Change POST_TYPE to appropraite name (this is the post type name)
		'add_new_item' => __('Add New POST_NAME_SINGULAR'),
		'edit_item' => __('Edit POST_NAME_SINGULAR'),
		'new_item' => __('New POST_NAME_SINGULAR'),
		'view_item' => __('View POST_NAME_SINGULAR'),
		'search_items' => __('Search POST_NAME_PLURAL'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true, // Can this post type be accessed by a URL?
		'publicly_queryable' => true,
		'show_in_nav_menus' => false, // Can this post type be added to navigation menus?
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 40,
		'menu_icon' => 'dashicons-', // https://developer.wordpress.org/resource/dashicons/
		'rewrite' => array( 'slug' => 'URL_SLUG' ), // Change URL_SLUG to appropraite URL slug
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor')
	  ); 
 
	register_post_type( 'POST_TYPE' , $args ); // Change POST_TYPE to appropraite name (this is the post type name)
}

//hook into the init action and call create_book_taxonomies when it fires
//add_action( 'init', 'create_POST_NAME_taxonomies', 0 );

function create_POST_NAME_taxonomies() {
	
  	$labels = array(
		'name' => _x( 'POST_NAME Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'POST_NAME Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Categories' ),
		'all_items' => __( 'All Categories' ),
		'edit_item' => __( 'Edit Category' ), 
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add Category' ),
		'new_item_name' => __( 'New Category' ),
		'menu_name' => __( 'POST_NAME Categories' ),
  	); 	

	register_taxonomy('POST_TAXONOMY',array('POST_TYPE'), array(  // Change POST_TAXONOMY to appropraite name (this is the category name) + Change POST_TYPE to custom post type
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true, // Whether to generate and allow a UI for managing terms in this taxonomy in the admin
		//'meta_box_cb' => false, // Provide a callback function for the meta box display. If false, no meta box is shown - useful when using ACF to limit adding terms to posts 
		'query_var' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'rewrite' => array( 'slug' => 'URL_SLUG' ), // Change URL_SLUG to appropraite name (this is the category url slug)
	));
}

/* ==========================================================================
   Add taxonomy filter
   ========================================================================== */

add_action( 'restrict_manage_posts', 'coord_restrict_manage_posts' );

function coord_restrict_manage_posts() {

    // only display these taxonomy filters on desired custom post_type listings
    global $typenow;
	
    if ($typenow == 'POST_TYPE') {

        // create an array of taxonomy slugs you want to filter by - if you want to retrieve all taxonomies, could use get_taxonomies() to build the list
        $filters = array('POST_TAXONOMY');

        foreach ($filters as $tax_slug) {
            // retrieve the taxonomy object
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            // retrieve array of term objects per taxonomy
            $terms = get_terms($tax_slug);

            // output html for taxonomy dropdown filter
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>Show All $tax_name</option>";
            foreach ($terms as $term) {
                // output each select option line, check against the last $_GET to show the current option selected
                echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
            }
            echo "</select>";
        }
    }
}

/** Team post type */
add_action('init', 'team_register');
function team_register() {
 
	$labels = array(
		'name' => _x('Team', 'post type general name'),
		'singular_name' => _x('Team', 'post type singular name'),
		'add_new' => _x('Add New Team Member', 'team'), // Change POST_TYPE to appropraite name (this is the post type name)
		'add_new_item' => __('Add New Team Member'),
		'edit_item' => __('Edit Team Member'),
		'new_item' => __('New Team Member'),
		'view_item' => __('View Team Member'),
		'search_items' => __('Search Team'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true, // Can this post type be accessed by a URL?
		'publicly_queryable' => true,
		'show_in_nav_menus' => false, // Can this post type be added to navigation menus?
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 40,
		'menu_icon' => 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
		'rewrite' => array( 'slug' => 'team' ), // Change URL_SLUG to appropraite URL slug
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title')
	  ); 
 
	register_post_type( 'team' , $args ); // Change POST_TYPE to appropraite name (this is the post type name)
}

/** Video Tips post type */
add_action('init', 'video');
function video() {
 
	$labels = array(
		'name' => _x('Video', 'post type general name'),
		'singular_name' => _x('Video', 'post type singular name'),
		'add_new' => _x('Add New Video', 'video'), // Change POST_TYPE to appropraite name (this is the post type name)
		'add_new_item' => __('Add New Video'),
		'edit_item' => __('Edit Video'),
		'new_item' => __('New Video'),
		'view_item' => __('View Video'),
		'search_items' => __('Search Video'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true, // Can this post type be accessed by a URL?
		'publicly_queryable' => true,
		'show_in_nav_menus' => false, // Can this post type be added to navigation menus?
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 40,
		'menu_icon' => 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
		'rewrite' => array( 'slug' => 'video' ), // Change URL_SLUG to appropraite URL slug
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title')
	  ); 
 
	register_post_type( 'video' , $args ); // Change POST_TYPE to appropraite name (this is the post type name)
}

/** Team post type */
add_action('init', 'testimonials');
function testimonials() {
 
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonials', 'post type singular name'),
		'add_new' => _x('Add New Testimonials', 'testimonials'), // Change POST_TYPE to appropraite name (this is the post type name)
		'add_new_item' => __('Add New Testimonials'),
		'edit_item' => __('Edit Testimonials'),
		'new_item' => __('New Testimonials'),
		'view_item' => __('View Testimonials'),
		'search_items' => __('Search Testimonials'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true, // Can this post type be accessed by a URL?
		'publicly_queryable' => true,
		'show_in_nav_menus' => false, // Can this post type be added to navigation menus?
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 40,
		'menu_icon' => 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
		'rewrite' => array( 'slug' => 'testimonials' ), // Change URL_SLUG to appropraite URL slug
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'testimonials' , $args ); // Change POST_TYPE to appropraite name (this is the post type name)
}






// /** Team post type */
// add_action('init', 'testimonialstasting'); // Corrected function name here
// function testimonialstasting() {
 
//     $labels = array(
//         'name' => _x('Testimonials-tasting', 'post type general name'),
//         'singular_name' => _x('Testimonials-tasting', 'post type singular name'),
//         'add_new' => _x('Add New Testimonials', 'testimonials'), // Change POST_TYPE to appropriate name (this is the post type name)
//         'add_new_item' => __('Add New Testimonials-tasting'),
//         'edit_item' => __('Edit Testimonials-tasting'),
//         'new_item' => __('New Testimonials-tasting'),
//         'view_item' => __('View Testimonials-tasting'),
//         'search_items' => __('Search Testimonials-tasting'),
//         'not_found' =>  __('Nothing found'),
//         'not_found_in_trash' => __('Nothing found in Trash'),
//         'parent_item_colon' => ''
//     );
 
//     $args = array(
//         'labels' => $labels,
//         'public' => true, // Can this post type be accessed by a URL?
//         'publicly_queryable' => true,
//         'show_in_nav_menus' => false, // Can this post type be added to navigation menus?
//         'show_ui' => true,
//         'query_var' => true,
//         'menu_position' => 40,
//         'menu_icon' => 'dashicons-groups', // https://developer.wordpress.org/resource/dashicons/
//         'rewrite' => array( 'slug' => 'testimonials-tasting' ), // Change URL_SLUG to appropriate URL slug
//         'capability_type' => 'post',
//         'hierarchical' => false,
//         'supports' => array('title','editor','thumbnail')
//     ); 
 
//     register_post_type( 'testimonials-tasting' , $args ); // Change POST_TYPE to appropriate name (this is the post type name)
// }
