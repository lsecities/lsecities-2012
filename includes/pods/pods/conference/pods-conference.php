<?php
/**
 * Data management for Conferences
 * 
 * @package LSECities2012
 */
namespace LSECitiesWPTheme\conference;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Return page id from a WordPress page object
 * @param Object $page the WordPress page
 * @return integer The page's ID
 */
function page_id($page) {
  return $page['ID'];
}

function prepare_conference($pod_slug) {
  $pod = pods('conference', $pod_slug);
  $is_conference = true;

  // stop if no pod with such $pod_slug was found
  if(0 === $pod->total_found()) {
    return false;
  }
  
  $pod_slug = $pod->field('slug');
  
  // core conference data
  $obj['conference_title'] = $pod->field('name');
  $obj['conference_tagline'] = $pod->display('tagline');
  $obj['conference_year'] = $pod->field('year');
  $obj['start_date'] = $pod->field('start_date');
  $obj['end_date'] = $pod->field('end_date');
  $obj['event_info'] = $pod->display('info');
  $obj['event_blurb'] = do_shortcode($pod->display('abstract'));
  
  $obj['event_programme_pdf'] = wp_get_attachment_url($pod->field('programme_pdf.ID'));;

  $obj['conference_live_now'] = $pod->field('conference_live_now');
  
  // Microsite navigation menus (pre/during/after conference), if applicable
  $obj['microsite_navmenu_pages_pre'] = array_map(__NAMESPACE__ . '\page_id', $pod->field('microsite_navmenu_pages_pre'));
  $obj['microsite_navmenu_pages_live'] = array_map(__NAMESPACE__ . '\page_id', $pod->field('microsite_navmenu_pages_live'));
  $obj['microsite_navmenu_pages_post'] = array_map(__NAMESPACE__ . '\page_id', $pod->field('microsite_navmenu_pages_post'));
  
  /**
   * depending on whether the conference is upcoming, live or past,
   * generate list of pages for top nav menu from related
   * page list from Conference pod
   */
  $timezone = new \DateTimeZone('Europe/London'); // TODO: add timezone handling in Conference pod
  $conference_date_start = new \DateTime($pod->field('start_date'), $timezone);
  $conference_date_start_utc = clone $conference_date_start;
  $conference_date_start_utc->setTimezone(new \DateTimeZone('UTC'));
  $conference_date_end = new \DateTime($pod->field('end_date'), $timezone);
  $conference_date_end_utc = clone $conference_date_end;
  $conference_date_end_utc->setTimezone(new \DateTimeZone('UTC'));
  $datetime_now = new \DateTime('now');
  
  if($obj['conference_live_now']) {
    // If the conference is live, use the live menu
    $obj['microsite_navmenu_pages'] = $obj['microsite_navmenu_pages_live'];
  } elseif($conference_date_end > $datetime_now) {
    // If the conference is upcoming, use the pre-conference menu
    $obj['microsite_navmenu_pages'] = $obj['microsite_navmenu_pages_pre'];
  } else {
    // Otherwise - if the conference has happened - use the post-conference menu
    $obj['microsite_navmenu_pages'] = $obj['microsite_navmenu_pages_post'];
  }
  
  // Conference WP page and microsite WP page
  $obj['conference_wp_page'] = $pod->field('conference_wp_page');
  $obj['conference_microsite_frontpage_wp_page'] = $pod->field('conference_microsite_frontpage_wp_page');
  
  $slider = $pod->field('slider');
  if(!$slider) {
    $post_thumbnail_uri_data = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array(960,367) );
    $obj['featured_image_uri'] = $post_thumbnail_uri_data[0];
  }

  /**
   * Background photos for conference microsite, if applicable
   */
  $background_photos = pods('media', [ 'where' => "conference_microsite.slug = '" . $pod_slug . "'", 'orderby' => 'RAND()' ]);
  while($background_photos->fetch()) {
    $obj['microsite_background_photos'][] = [
      'uri' => pods_image_url($background_photos->field('id'), 'full'),
      'title' => $background_photos->field('title'),
      'attribution_name' => get_post_meta($background_photos->field('id'), '_attribution_name', true),
      'description' => $background_photos->field('post_content')
    ];
  }
  
  /* process list of partners */
  $obj['partners'] = get_conference_partners($pod, 'partners');
  /* process list of media partners */
  $obj['media_partners'] = get_conference_partners($pod, 'media_partners');

  $obj['conference_publication_blurb'] = $pod->display('conference_newspaper.blurb');
  $obj['conference_publication_cover'] = wp_get_attachment_url($pod->field('conference_newspaper.snapshot.ID'));
  $obj['conference_publication_wp_page'] = get_permalink($pod->field('conference_newspaper.publication_web_page.ID'));
  $obj['conference_publication_pdf'] = $pod->field('conference_newspaper.publication_pdf_uri');
  $obj['conference_publication_issuu'] = $pod->field('conference_newspaper.issuu_uri');

  // Twitter hashtag
  $obj['twitter_hashtag'] = $pod->field('hashtag');
  $obj['twitter_hashtag_uri'] = 'https://twitter.com/search?q=' . urlencode($obj['twitter_hashtag']) . '&src=typd&f=realtime';
  
  $obj['research_summary_title'] = $pod->field('research_summary.name');
  $obj['research_summary_blurb'] = $pod->display('research_summary.blurb');

  // tiles is a multi-select pick field so in theory we could have more
  // than one tile to display here, however initially we only process the
  // first one and ignore the rest - later on we should deal with more
  // complex cases (e.g. as a slider or so)
  var_trace('tiles: ' . var_export($pod->field('research_summary.visualization_tiles'), true), $TRACE_PREFIX);
  $visualization_tiles = $pod->field('research_summary.visualization_tiles');
  $tile_pod = pods('tile', $visualization_tiles[0]['slug']);
  var_trace('tile_image: ' . var_export($tile_pod->field('image'), true), $TRACE_PREFIX);
  $obj['research_summary_tile_image'] = pods_image_url($tile_pod->field('image'));
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
  if($pod->field('conference_wp_page.post_name')) {
    array_unshift($button_links, array('post_title' => $obj['conference_title'], 'guid' => '/ua/conferences/' . $pod->field('conference_wp_page.post_name')));
  } else {
    array_unshift($button_links, array('post_title' => $obj['conference_title'], 'guid' => '/ua/conferences/' . $pod_slug));
  }
  $obj['button_links'] = $button_links;
  
  $conference_list = pods('list', 'urban-age-conferences');
  $pod_type = $conference_list->field('pod_type.slug');
  $pod_list = $conference_list->field('list_pages');

  $obj['conferences_menu_items'] = array();
  
  if(count($pod_list)) {
    foreach($pod_list as $key => $item) {
      $item_pod = pods($pod_type, get_post_meta($item['ID'], 'pod_slug', true));
      $menu_conference_title = $item_pod->field('conference_title');
      $menu_conference_city_year = $item_pod->field('city') . ' | ' . $item_pod->field('year');
      $obj['conferences_menu_items'][$item['menu_order']] = array(
        'permalink' => get_permalink($item['ID']),
        'title' => ($menu_conference_title and $item_pod->field('show_title_in_navigation')) ? $menu_conference_title . '<br/>' . $menu_conference_city_year : $menu_conference_city_year
      );
    }
    krsort($obj['conferences_menu_items']);
  }
  
  $obj['gallery'] = array(
   'picasa_gallery_id' => $pod->field('photo_gallery'),
   'slug' => $pod->field('slug')
  );

  return $obj;
}

/**
 * Prepare metadata for live conference frontpage on conference microsites
 */
function prepare_conference_live($pod_slug) {
  $pod = pods('conference', $pod_slug);
  
  $obj = array();
  
  $obj['live_streaming_video_embedcode'] = $pod->field('live_streaming_video_embedcode');
  $obj['live_streaming_notice'] = $pod->field('live_streaming_notice');
  $obj['live_twitter_querystring'] = $pod->field('live_twitter_querystring');
  $obj['live_twitter_widget_id'] = $pod->field('live_twitter_widget_id');
  
  $live_storify_stories_uris = preg_replace('/^https?:\/\//', '', explode("\n", $pod->field('live_storify_stories')));

  foreach($live_storify_stories_uris as $story_uri) {
    $obj['live_storify_stories'] .= '<script src="//' . $story_uri . '.js?template=slideshow"></script>
    <noscript>[<a href="//' . $story_uri . '" target="_blank">View the story on Storify</a>]</noscript>
    ';
  }
  
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

/**
 * Build array with conference partner data
 *
 * @param Object $pod The conference Pod object
 * @param string $partner_field The pick field used for this type of partners within the conference Pod object (must be linked to Organizations pod)
 * @return array The list of requested partners
 */
function get_conference_partners($pod, $partner_field) {
  /* process list of partners */
  $partners = array();
  $conference_partners_slugs = $pod->field($partner_field . '.slug');
  // MONKEYPATCH_BEGIN: sort by slug
  asort($conference_partners_slugs);
  // MONKEYPATCH_END

  foreach($conference_partners_slugs as $conference_partners_slug) {
    $organization_pod = pods('organization', $conference_partners_slug);
   
    // MONKEYPATCH_BEGIN
    if('ec2012' === lc_data('microsite_id')) {
      $logo_uri = pods_image_url($organization_pod->field('logo_white_raster'), [ 600, 300 ]);
    } else {
      $logo_uri = pods_image_url($organization_pod->field('logo'), [ 600, 300 ]);
    }
    // MONKEYPATCH_END

    $partners[] = [
        'id' => $organization_pod->field('slug'),
        'name' => $organization_pod->field('name'),
        'logo_uri' => $logo_uri,
        'web_uri' => $organization_pod->field('web_uri')
    ];
  }

  return $partners;
}
