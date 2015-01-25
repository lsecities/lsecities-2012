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
  if($config['from_post_meta'] and $config['post_id'] and $permalink = get_post_meta($config['post_id'], 'pod_slug', TRUE)) {
    return $permalink;
  }
  
  // If callee wants to retrieve permalink from URI, try to do so
  if($config['from_uri'] and $permalink = pods_v($config['uri_var_position'], 'url')) {
    return $permalink;
  }
}
