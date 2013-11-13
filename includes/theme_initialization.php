<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme initialization
 * 
 * Functions and actions needed before anything else, initializing
 * admin functionality of the theme.
 */

function activate_categories_for_pages() {  
  // Add category metabox to page
  register_taxonomy_for_object_type('category', 'page');  
}
 // Add to the admin_init hook of your theme functions.php file 
add_action( 'admin_init', 'activate_categories_for_pages' );
