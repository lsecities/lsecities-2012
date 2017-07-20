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

  /* if within Newsletter section, do not populate level2nav: otherwise,
     all the children pages will be listd there! */
  if($post->ID == 1074 or in_array(1074, $post->ancestors)) {
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
