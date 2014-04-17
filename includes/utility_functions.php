<?php
/**
 * Various utility functions used across the theme
 */

/**
 * Show WordPress' 404 page
 * (credits: https://wordpress.org/support/topic/display-wordpress-404-from-my-script#post-1180851)
 *
 */
if(!defined('redirect_to_404')) {
  function redirect_to_404() {
    status_header(404);
    nocache_headers();
    include(get_404_template());
    exit;
  }
} 

/**
 * output requested class if this is the last item in a N-items row
 *
 * @param string $class The class string to add (can be multiple space-separated classes if needed, no leading or trailing spaces)
 * @param int $current_item_index The index of the current item
 * @param int $items_per_row How many items fit in a row
 * @return string The requested class string if this is the last item in a row
 */
function class_if_last_item($class, $current_item_index, $items_per_row) {
  if($current_item_index % $items_per_row == 0) {
    return $class;
  }
}

/**
 * Hide lsecities.net page hierarchy in links if we are in labs subsite
 * This is of course a bit simplistic as there might be links that need
 * to be kept as they are, but for the current use cases this works fine.
 * 
 * @param string $string_blob The chunk of text on which to run the regexp
 * @return string The input text with links stripped
 */
function hide_lsecities_page_hierarchy_in_labs_links($string_blob) {
  return preg_replace('/https?:\/\/lsecities\.net\/labs/', '', $string_blob);
}

/**
 * Turn a filename relative to the theme's root to an absolute path
 * for reliable use in includes.
 */
function abspath_to($file) {
  return lc_data('theme_filesystem_abspath') . '/' . $file;
}

/**
 * Sort multi-value field from Pods::field()
 * Replaces sort functionality removed in Pods v2's field() vs v1's get_field()
 *
 * @param array $fields The fields array returned by field()
 * @param string $sort_by The linked table's field according to which to sort
 * @param mixed $sort_order (default: SORT_ASC) SORT_ASC or SORT_DESC
 * @return array The fields array, sorted as requested, or FALSE if an error occurs
 */
function sort_linked_field($fields, $sort_by = NULL, $sort_order = SORT_ASC) {
  if(!(count($fields) > 0) or !is_array($fields)) {
    error_log('Array to sort is not an array or is an empty array');
    return FALSE;
  }
  if(!isset($sort_by)) {
    error_log('Sort by field not provided');
    return FALSE;
  }

  $sorted_fields = array();
  foreach($fields as $key => $value) {
    $sorted_fields[$key] = $value[$sort_by];
  }
  
  setlocale(LC_COLLATE, 'en_GB.utf8');
  array_multisort($sorted_fields, $sort_order, SORT_LOCALE_STRING, $fields);
  return $fields;
}

/**
 * Log microtime and filename+line
 *
 * @param string $file the caller filename (normally caller would pass __FILE__ here)
 * @param string $line the caller line (normally caller would pass __LINE__ here)
 */
function log_timestamp($file = '', $line = '') {
  error_log(microtime(), zend_thread_id() . ' : ' . $file . ' : ' . $line);
}
