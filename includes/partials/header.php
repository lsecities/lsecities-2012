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

  // Set level2nav: children pages of the toplevel ancestor
  $obj['level2nav'] = wp_list_pages('child_of=' . $obj['toplevel_ancestor'] . '&depth=1&sort_column=menu_order&title_li=&echo=0');

  // check if we are in the Urban Age section
  lc_data('urban_age_section', ($obj['toplevel_ancestor'] == 94) ? true : false);
  
  // TODO: the following code doesn't seem to be used - check and remove
  // $logo_element_id = lc_data('urban_age_section') ? 'ualogo' : 'logo';

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
   * 
   * If the X-Site-Id HTTP request header is set, we configure several
   * settings of the microsite via the lc_data('conference_microsites')
   * configuration array.
   */ 
  $http_req_headers = getallheaders();
  $x_site_id = strtolower($http_req_headers['X-Site-Id']);
  if(strlen($x_site_id) > 0) {
    lc_data('x-site-id', $x_site_id);
    
    $microsite_configuration = array_shift(array_filter(lc_data('conference_microsites'), function($microsite) use ($x_site_id) { return $x_site_id === $microsite['x-site-id']; }));
    
    $obj['theme_js'] = $microsite_configuration['theme_js'];
    $obj['body_class_extra'] = $microsite_configuration['body_class_extra'];
    if(is_user_logged_in()) {
      $obj['body_class_extra'] .= ' user_logged_in';
    }
    
    lc_data('microsite_id', $microsite_configuration['x-site-id']);
    lc_data('body_class_extra', $microsite_configuration['body_class_extra']);
    $obj['conference_data'] = \LSECitiesWPTheme\conference\prepare_conference($microsite_configuration['conference_pod_slug']);
    
    // Now set microsite nav menus
    
    // We only use level2nav - set level1nav to empty string
    $obj['level1nav'] = '';
    
    // Check whether the current page is the microsite's homepage
    $microsite_homepage_id = $obj['conference_data']['conference_microsite_frontpage_wp_page']['ID'];
    $on_microsite_homepage = $post->ID == $microsite_homepage_id ? TRUE : FALSE;
    // And set classes for home item li accordingly
    $home_item_classes = 'page-item page-item-' . $microsite_homepage_id;
    $home_item_classes .= ($on_microsite_homepage == TRUE) ? ' current_page_item' : '';
    
    if(is_user_logged_in()) {
      // Add all subpages of microsite's homepage to navmenu for logged-in users
      $pages_included_in_navmenu = '&child_of=' . $microsite_homepage_id;
    } else {
      // Whereas for all other users, add pages from lists configured within the conference Pod
      $pages_included_in_navmenu = '&include=' . implode(',', $obj['conference_data']['microsite_navmenu_pages']);
    }

    $obj['level2nav'] = '<li class="' . $home_item_classes . '">' .
      '<a href="/">Home</a></li>' .
      wp_list_pages('echo=0&depth=1&sort_column=menu_order&title_li=' . $pages_included_in_navmenu);
      
    // And strip prefix
    // TODO: get full URI from WP's get_page_uri()
    $obj['level2nav'] = preg_replace('/https?:\/\/lsecities\.net\/ua\/conferences\/' . $microsite_configuration['conference_pod_slug']. '\/site/', '', $obj['level2nav']);

    // Enable appcache manifest, if needed
    if($microsite_configuration['appcache_manifest']) {
      $appcache_manifest = '/appcache-manifests/' . $microsite_configuration['appcache_manifest'];
    }
  }
  
  /* if within Newsletter section, do not populate level2nav: otherwise,
     all the children pages will be listd there! */
  elseif($post->ID == 1074 or in_array(1074, $post->ancestors)) {
    $obj['level2nav'] = '';
  } else {
    $include_pages = '617,306,309,311,94,8871,3338,12825';
    $obj['level1nav'] = wp_list_pages([
      'echo' => 0,
      'depth' => 1,
      'sort_column' => 'menu_order',
      'title_li' => '',
      'include' => $include_pages
    ]);
  }
  
  // set query vars for other partials
  set_query_var('lc_toplevel_ancestor', $obj['toplevel_ancestor']);
  set_query_var('lc_level1nav', $obj['level1nav']);
  set_query_var('lc_level2nav', $obj['level2nav']);
  set_query_var('lc_conference_obj', $obj);
      
  return $obj;
}
