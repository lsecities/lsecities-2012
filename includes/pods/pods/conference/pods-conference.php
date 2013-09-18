<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_conference($pod_slug) {
  $pod = pods('conference', $pod_slug);
  $is_conference = true;

  $obj['conference_title'] = $pod->field('name');
  $obj['conference_tagline'] = $pod->field('tagline');
  $obj['event_programme_pdf'] = wp_get_attachment_url($pod->field('programme_pdf.ID'));
  $obj['event_info'] = $pod->field('info');
  
  $obj['event_hashtag'] = ltrim($pod->field('hashtag'), '#');

  $obj['event_blurb'] = do_shortcode($pod->field('abstract'));

  $slider = $pod->field('slider');
  if(!$slider) {
    $obj['featured_image_uri'] = get_the_post_thumbnail(get_the_ID(), array(960,367));
  }

  /* process list of partners */
  $obj['partners'] = array();
  $conference_partners_slugs = (array) $pod->field('partners.slug');
  // MONKEYPATCH_BEGIN: sort by slug
  asort($conference_partners_slugs);
  // MONKEYPATCH_END

  foreach($conference_partners_slugs as $conference_partners_slug) {
    $organization_pod = pods('organization', $conference_partners_slug);
    
    // MONKEYPATCH_BEGIN
    if($_GET["siteid"] == 'ec2012') {
      $logo_uri = wp_get_attachment_url($organization_pod->field('logo_white_raster.ID'));
    } else {
      $logo_uri = wp_get_attachment_url($organization_pod->field('logo.ID'));
    }
    // MONKEYPATCH_END
    
    array_push($obj['partners'], array(
        'id' => $organization_pod->field('slug'),
        'name' => $organization_pod->field('name'),
        'logo_uri' => $logo_uri,
        'web_uri' => $organization_pod->field('web_uri')
    ));
  }

  $obj['conference_publication_blurb'] = $pod->field('conference_newspaper.blurb');
  $obj['conference_publication_cover'] = wp_get_attachment_url($pod->field('conference_newspaper.snapshot.ID'));
  $obj['conference_publication_wp_page'] = get_permalink($pod->field('conference_newspaper.publication_web_page.ID'));
  $obj['conference_publication_pdf'] = $pod->field('conference_newspaper.publication_pdf_uri');
  $obj['conference_publication_issuu'] = $pod->field('conference_newspaper.issuu_uri');

  $obj['research_summary_title'] = $pod->field('research_summary.name');
  $obj['research_summary_blurb'] = $pod->field('research_summary.blurb');

  // tiles is a multi-select pick field so in theory we could have more
  // than one tile to display here, however initially we only process the
  // first one and ignore the rest - later on we should deal with more
  // complex cases (e.g. as a slider or so)
  var_trace('tiles: ' . var_export($pod->field('research_summary.visualization_tiles'), true), $TRACE_PREFIX, $TRACE_ENABLED);
  $visualization_tiles = $pod->field('research_summary.visualization_tiles');
  $tile_pod = pods('tile', $visualization_tiles[0]['slug']);
  var_trace('tile_image: ' . var_export($tile_pod->field('image'), true), $TRACE_PREFIX, $TRACE_ENABLED);
  $obj['research_summary_tile_image'] = wp_get_attachment_url($tile_pod->field('image.ID'));
  $obj['research_summary_pdf_uri'] = $pod->field('research_summary.data_section_pdf_uri');

  // generate list of items for conference menu (used in nav partial)
  $button_links = $pod->field('links') ? $pod->field('links') : array();
  $conference_menu = array();
  if(count($button_links)) {
    // sort by menu_order of linked items
    foreach($button_links as $sort_key => $sort_value) {
      $conference_menu[$sort_key] = $sort_value['menu_order'];
    }
    array_multisort($conference_menu, SORT_ASC, $button_links);
  }
  // add the conference homepage itself
  array_unshift($button_links, array('post_title' => $obj['conference_title'], 'guid' => '/ua/conferences/' . $pod_slug));
  $obj['button_links'] = $button_links;
  
  $conference_list = pods('list', 'urban-age-conferences');
  $pod_type = $conference_list->field('pod_type.slug');
  $pod_list = sort_linked_field($conference_list->field('list_pages'), 'menu_order', SORT_DESC);

  $obj['conferences_menu_items'] = array();
  
  if(count($pod_list)) {
    foreach($pod_list as $key => $item) {
      $item_pod = pods($pod_type, get_post_meta($item['ID'], 'pod_slug', true));
      $menu_conference_title = $item_pod->field('conference_title');
      $menu_conference_city_year = $item_pod->field('city') . ' | ' . $item_pod->field('year');
      $obj['conferences_menu_items'][] = array(
        'permalink' => get_permalink($item['ID']),
        'title' => ($menu_conference_title and $item_pod->field('show_title_in_navigation')) ? $menu_conference_title . '<br/>' . $menu_conference_city_year : $menu_conference_city_year
      );
    }
  }
  
  $obj['gallery'] = array(
   'picasa_gallery_id' => $pod->field('photo_gallery'),
   'slug' => $pod->field('slug')
  );

  return $obj;
}

/**
 * Given a post id, check if this is a child page of a given conference
 * frontpage and if so returns the parent conference's page ID.
 * At the moment we only use subpages of a parent conference page (i.e.
 * only a single level down), but just in case, we check all the
 * ancestry line in case nested page structures are used in the future.
 */
function parent_conference_page($post_id) {
  // get IDs of ancestor pages
  $ancestor_pages = get_post_ancestors($post_id);
  
  // include current page in array (we need to check current page as well)
  array_push($ancestor_pages, $post_id);
  
  foreach($ancestor_pages as $page_id) {
    if(lc_data('pods_conference__wp_page_template') === get_post_meta($page_id, '_wp_page_template', true)) {
      $post_obj = get_post($page_id, ARRAY_A);
      return array('id' => $page_id, 'slug' => $post_obj['post_name']);
    }
  }
  
  // If no ancestor page with template set to conference template,
  // return false.
  return false;
}
