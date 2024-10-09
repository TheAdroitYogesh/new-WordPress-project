<?php

/* ==========================================================================
   ACF Functions
   ========================================================================== */

/*
 * Set up Option pages
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'		=> 'Site Options',
		'menu_title'		=> 'Site Options',
		'menu_slug' 		=> 'site-options',
		'capability'		=> 'edit_posts',
		'redirect'			=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 		=> 'Contact Details',
		'menu_title'		=> 'Contact Details',
		'parent_slug'		=> 'site-options',
	));
}

/*
 * Register Google Maps API
 */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAmavXi5FuDFXst4AwLTbHspttwp7LmalU'); // change this on launch
}
add_action('acf/init', 'my_acf_init');

/*
 * Add title to flexible content rows
 * Used to modify the $title HTML displayed at the top of each flexible content layout.
 * https://www.advancedcustomfields.com/resources/acf-fields-flexible_content-layout_title/
 */
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    // load text sub field
    if( $text = get_sub_field('row_title') ) {
		$title  = $title . ' - ';
        $title .= '<b>' . esc_html($text) . '</b>';
    }
    return $title;
}