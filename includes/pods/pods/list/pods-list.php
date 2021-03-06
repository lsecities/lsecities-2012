<?php
namespace LSECitiesWPTheme\pods_list;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @param array $pod_slugs list of slugs of pod list objects
 */
function pods_prepare_list($pod_slugs) {

  // Initialize arrays
  $obj = array();
  $lists = array();

  // For each list pod, add the list of its items to the main $list array
  foreach($pod_slugs as $slug) {
    // This is the list pod
    $this_pod = pods('list', $slug);
    // Set sort order for the items included in this list
    $sort_order = $this_pod->field('sort_descending') ? 'DESC' : 'ASC';

    // If the list_research_output_category field is set, we get all the
    // research_output pods tagged with the given category, sorted by
    // date (DESC or ASC according to the sort_descending flag
    if($this_pod->field('list_research_output_category')) {
      $items_pod = pods('research_output', array(
        'where' => 'category.slug = "' . $this_pod->field('list_research_output_category.slug' ) . '"',
        'orderby' => 'date ' . $sort_order
      ));

      $items = array();

      while($items_pod->fetch()) {
        $items[] = array(
          'uri' => $items_pod->field('uri'),
          'citation' => $items_pod->field('citation')
        );
      }

      array_push($lists, array(
        'type' => $this_pod->field('pod_type.slug'),
        'title' => $this_pod->field('name'),
        'sort_order' => $sort_order,
        'items' => $items
      ));
    } else {
      // Otherwise, we get all the pages selected in the list_pages multi-select pick field
      $item_pages = $this_pod->field('list_pages');

      $items = array();

      foreach($item_pages as $item) {
        $item_pod = pods($this_pod->field('pod_type.slug'), get_post_meta($item['ID'], 'pod_slug', true));
        var_trace(var_export($item_pod, true), 'ITEM_POD');

        // push each page to array, with page's menu_order as key
        $items[$item['menu_order']] = array(
          'title' => $item_pod->field('name'),
          'permalink' => get_permalink($item['ID']),
          'pod_featured_image_uri' => pods_image_url($item_pod->field('snapshot'), array(512, 768))
        );
      }

      // now sort according to key - and ascending or descending as requested
      if('DESC' === $sort_order) {
        krsort($items);
      } else {
        ksort($items);
      }

      array_push($lists, array(
        'type' => $this_pod->field('pod_type.slug'),
        'title' => $this_pod->field('name'),
        'page_id' => $this_pod->field('featured_item.ID'),
        'sort_order' => $sort_order,
        'items' => $items
      ));
    }

  }

  $obj['lists'] = $lists;

  return $obj;
}
