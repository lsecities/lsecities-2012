<?php
namespace LSECitiesWPTheme\page_header;

/**
 * Prepare data for template header
 * 
 * @return array The header/page data as an array
 */
function prepare_header() {
  // Global WordPress variables we need here
  global $post;
  
  /**
   * define hierarchy/ancestors for Pods and navigation bars
   */
  // get full ancestor chain
  $ancestors = get_ancestors($post->ID, 'page');
  // prepend current post ID
  array_unshift($ancestors, $post->ID);
  // get toplevel ancestor for this page
  $obj['toplevel_ancestor'] = array_pop($ancestors);
  // If we are on the root frontpage ('/', page ID 393), set ancestor to nil
  if($obj['toplevel_ancestor'] == 393) { $obj['toplevel_ancestor'] = null; }
  /**
   * If we are processing a Pods page for document types such as Event
   * or Article, manually set our current position within the
   * page hierarchy.
   * TODO - this code will never get triggered at the moment as
   * the lc_data variable pods_toplevel_ancestor cannot have been
   * set at this stage: this needs to be fixed.
   */
  if(lc_data('pods_toplevel_ancestor')) {
    $obj['toplevel_ancestor'] = lc_data('pods_toplevel_ancestor');
  }

  var_trace(var_export($ancestors, true), 'ancestors (array)');
  var_trace($ancestors[0], 'ancestor[0]');
  var_trace($obj['toplevel_ancestor'], 'toplevel_ancestor');

  // co-branding: check the X-Site-Id HTTP header from frontend cache
  /**
   * Co-branding
   * For microsites (e.g. Electric City conference, City Transformations
   * conference) we get a custom HTTP header from the frontend reverse
   * proxy, which is used to set up the microsite: e.g. custom
   * templates, extra classes for HTML elements, menus, etc.
   */ 
  $http_req_headers = getallheaders();
  if(strlen($http_req_headers["X-Site-Id"]) > 0) {
    lc_data('x-site-id', $http_req_headers["X-Site-Id"]);
    var_trace(lc_data('x-site-id'), 'lc_x-site-id');
  }

  if($_GET["siteid"] == 'ec2012') { // we are being called via the ec2012 microsite
    $obj['body_class_extra'] = 'ec2012';
    lc_data('microsite_id', 'ec2012');
    // TODO: use microsite_id all over, remove site-ec2012
    lc_data('site-ec2012', true);
  } elseif(lc_data('x-site-id') === 'rio2013') {
    $obj['body_class_extra'] = 'rio2013';
    lc_data('microsite_id', 'rio2013');
  } elseif(lc_data('x-site-id') === 'delhi2014') {
    $obj['body_class_extra'] = 'delhi2014';
    lc_data('microsite_id', 'delhi2014');
  }

  $obj['level2nav'] = wp_list_pages('child_of=' . $obj['toplevel_ancestor'] . '&depth=1&sort_column=menu_order&title_li=&echo=0');

  // check if we are in the Urban Age section
  lc_data('urban_age_section', ($obj['toplevel_ancestor'] == 94) ? true : false);
  
  // TODO: the following code doesn't seem to be used - check and remove
  // $logo_element_id = lc_data('urban_age_section') ? 'ualogo' : 'logo';

  if(lc_data('x-site-id') === 'ec2012') { // Electric City conference minisite
    // If we are navigating the EC2012 minisite via reverse proxy, display appropriate menu
    $obj['level1nav'] = '';
    $class_for_current_page = $post->ID == 2701 ? ' current_page_item' : '';
    if(!is_user_logged_in()) {
      $only_include_top_pages_ids = '&include=2714,2716,3288,3290,3294,2949,3160,3098';
    } else {
      $only_include_top_pages_ids = '&child_of=2701';
    }
    $obj['level2nav'] = '<li class="page-item page-item-2701' . $class_for_current_page . '">' .
      '<a href="/">Home</a></li>' . 
      wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=' . $only_include_top_pages_ids);
    // And strip prefix
    $obj['level2nav'] = preg_replace('/https?:\/\/lsecities\.net\/ua\/conferences\/2012-london\/site/', '', $obj['level2nav']);
    var_trace($obj['level2nav'], 'header_level2nav');
    // enable appcache manifest, if needed
    // $appcache_manifest = '/appcache-manifests/ec2012.appcache';
  } elseif(lc_data('x-site-id') === 'rio2013') {
    // If we are navigating the Rio 2013 minisite via reverse proxy, display appropriate menu
    $obj['level1nav'] = '';
    $class_for_current_page = $post->ID == 5449 ? ' current_page_item' : '';
    
    // only show selected subpages in top navmenu
    $only_include_top_pages_ids = '&include=5523,5455,5458,5530,5532';
    
    $obj['level2nav'] = '<li class="page-item page-item-5449' . $class_for_current_page . '">' .
      '<a href="/">Home</a></li>' . 
      wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=' . $only_include_top_pages_ids);
    // And strip prefix
    $obj['level2nav'] = preg_replace('/https?:\/\/lsecities\.net\/ua\/conferences\/2013-rio\/site/', '', $obj['level2nav']);
    var_trace($obj['level2nav'], 'header_level2nav');
    // enable appcache manifest, if needed
    // $appcache_manifest = '/appcache-manifests/rio2013.appcache';
  } elseif(lc_data('x-site-id') === 'delhi2014') {
    // If we are navigating the Delhi 2014 minisite via reverse proxy, display appropriate menu
    $obj['level1nav'] = '';
    $class_for_current_page = $post->ID == 6918 ? ' current_page_item' : '';
    
    // only show selected subpages in top navmenu
    $only_include_top_pages_ids = '&include=6918';
    
    $obj['level2nav'] = '<li class="page-item page-item-6918' . $class_for_current_page . '">' .
      '<a href="/">Home</a></li>' . 
      wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=' . $only_include_top_pages_ids);
    // And strip prefix
    $obj['level2nav'] = preg_replace('/https?:\/\/lsecities\.net\/ua\/conferences\/2014-delhi\/site/', '', $obj['level2nav']);
    var_trace($obj['level2nav'], 'header_level2nav');
    // enable appcache manifest, if needed
    // $appcache_manifest = '/appcache-manifests/delhi2014.appcache';
  }
  /* if within Newsletter section, do not populate level2nav: otherwise,
     all the children pages will be listd there! */
  elseif($post->ID == 1074 or in_array(1074, $post->ancestors)) {
    $obj['level2nav'] = '';
  } else {
    $include_pages = '617,306,309,311,94,629,3338';
    $obj['level1nav'] = '<li><a href="/" title="Home">Home</a></li>' . wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=&include=' . $include_pages);
  }
  
  // set query vars for other partials
  set_query_var('lc_toplevel_ancestor', $obj['toplevel_ancestor']);
  set_query_var('lc_level1nav', $obj['level1nav']);
  set_query_var('lc_level2nav', $obj['level2nav']);
      
  return $obj;
}
