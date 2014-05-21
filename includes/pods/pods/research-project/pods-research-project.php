<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_research_project($pod_slug) {
  $pod = pods('research_project');
  $pod->find(array('where' => "t.slug = '" . $pod_slug . "'"));

  if(!$pod->total_found()) {
    redirect_to_404();
  }

  $pod->fetch();

  // for menus etc.
  global $this_pod;
  $this_pod = new LC\PodObject($pod, 'Research');

  // prepare array for return data structure
  $obj = array();

  lc_data('META_last_modified', $pod->field('modified'));

  var_trace('pod_slug: ' . $pod_slug);

  $obj['title'] = $pod->field('name');
  $obj['tagline'] = $pod->field('tagline');
  $obj['summary'] = do_shortcode($pod->display('summary'));
  $obj['blurb'] = do_shortcode($pod->display('blurb'));
  $obj['keywords'] = $pod->field('keywords');
  $obj['web_uri'] = $pod->field('web_uri');
  
  $obj['events_blurb'] = $pod->display('events_blurb');
  
  
  return $obj;
}
