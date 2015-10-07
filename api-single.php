<?php
namespace LSECitiesWPTheme;
/**
 * Template Name: API/SingleItem
 * Description: The template used to return a JSON view of a single item
 *
 * @package LSECities2012
 *
 * URI: /api/v0/<singular_pod>/*
 */

// TECHNICAL_DEBT: this should be in theme configuration
$pods_to_classes = [
  'article' => 'Article',
  'award' => 'Award',
  'event' => 'Event'
];

// in the URI scheme for singular items, the pod name is the penultimate URI path part
$pod_type = pods_v(-2, 'url');

// check if we know about this Pod type
if(array_key_exists($pod_type, $pods_to_classes)) {
  /**
   * TECHNICAL_DEBT: we should be using something like
   * $pods_to_classes[$pod_type], but this doesn't seem to be working with the
   * current version of PHP, so we need to switch over $pod_type
   */
  if('article' === $pod_type) {
    $obj = new Article(pods_v('last', 'url'));
  }
  
  if('award' === $pod_type) {
    $obj = new Award(pods_v('last', 'url'));
  }
    
  if('event' === $pod_type) {
    $obj = new Event(pods_v('last', 'url'));
  }

  if($_REQUEST['shallow'] === 'true') {
    $options = [ 'shallow' => TRUE ];
  }

  header("Content-Type: application/json");
  echo $obj->to_json($options);
} else {
  redirect_to_404();
}
