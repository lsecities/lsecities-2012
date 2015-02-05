<?php

namespace LSECitiesWPTheme;

/**
 * Retrieve permalink for Pod object depending on configuration
 * @param Array $config
 * @return String The permalink, if found, or null if not
 */
function get_pod_permalink($config) {
  // set defaults
  if($config['from_uri'] === TRUE and empty($config['uri_var_position'])) {
    $config['uri_var_position'] = 'last';
  }
  
  // If callee wants to retrieve permalink from post meta, try to do so
  if($config['from_post_meta'] === TRUE and $config['post_id'] and $permalink = get_post_meta($config['post_id'], 'pod_slug', TRUE)) {
    return $permalink;
  }
  
  // If callee wants to retrieve permalink from URI, try to do so
  if($config['from_uri'] === TRUE and $permalink = pods_v($config['uri_var_position'], 'url')) {
    return $permalink;
  }
}

/**
 * Given an array of associative arrays such as people as returned by
 * $pod->field('authors') or so, strip out array elements from each item
 * in the array, except the fields to keep as listed in $keys_to_keep.
 * 
 * @param Array $array The source array of associative arrays
 * @param Array $keys_to_keep A list of keys of elements to keep; all
 *   the items with other keys will be removed
 * @return Array The result array with unwanted keys stripped off each
 *   array element
 */
function filter_items($array, $keys_to_keep) {
  if(!is_array($array)) {
    return NULL;
  }
  
  return array_map(function($item) use ($keys_to_keep) {
    // see: http://stackoverflow.com/questions/4260086/php-how-to-use-array-filter-to-filter-array-keys
    return array_intersect_key($item, array_flip($keys_to_keep));
  },
  $array);
}
