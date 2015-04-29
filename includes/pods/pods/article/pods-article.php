<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_article($post_id) {
  var_trace($post_id, 'POST_ID');
  /* URI: /media/objects/articles/<article-slug>[?lang=<language>] */

  $pod_slug = get_post_meta($post_id, 'pod_slug', true);
  if($pod_slug) {
    $pod = pods('article', $pod_slug);
    $pod_from_page = true;
  } else {
    $pod = pods('article', pods_var(3, 'url'));
    $pod_from_page = false;
  }
  var_trace('article pod - var 3: '. pods_var(3, 'url'));
  var_trace('article pod - var 4: '. pods_var(4, 'url'));
  
  return get_article_data($pod);
}

/**
 * Return a data structure with all the articles of a specific type.
 * By default, all articles are added to the list; to filter by
 * type (plain articles or data articles), the optional $type
 * parameter must be used.
 * 
 * @param Array $options An associative array of configuration options
 *   'type' (string) default:"all' - The type of article: all, plain, data
 *   'shallow' (bool) default:FALSE - Whether to generate shallow or
 *      full objects for each item (see documentation for get_article_data()
 *      for details
 * @return Array The data structure with all the good stuff
 */
function pods_prepare_article_list($options = []) {
  // check that type parameter is one of the expected values, else return
  if(array_key_exists('type', $options) and 'all' !== $options['type'] and 'plain' !== $options['type'] and 'data' !== $options['type']) {
    trigger_error('invalid type parameter');
    return;
  }
  
  if(!array_key_exists('type', $options)) {
    $options['type'] = 'all';
  }
  
  if(array_key_exists('shallow', $options) and !is_bool($options['shallow'])) {
    trigger_error("'shallow' parameter must be bool");
    return;
  }
  
  if(!array_key_exists('shallow', $options)) {
    $options['shallow'] = FALSE;
  }
  
  // set default parameter
  $find_params = ['limit' => -1 ];
  
  if('plain' === $options['type']) {
    $find_params['where'] = 'data_package.id IS NULL';
  } elseif('data' === $options['type']) {
    $find_params['where'] = 'data_package.id IS NOT NULL';
  }
  
  $pod = pods('article')->find($find_params);
  $articles = array();
  
  while($pod->fetch()) {
    $articles[] = get_article_data($pod, [ 'shallow' => TRUE ]);
  }
  
  return $articles;
}

/**
 * Retrieve article data and pack it as an array
 * 
 * @param Object $pod The pod object for this article
 * @param Array $options An associative array of options:
 *   'shallow' (bool) default: FALSE - If false, most details of linked
 *      objects (people details, etc.) will be added to the returned data
 *      structure; otherwise, only basic data from linked objects will
 *      be added (e.g. people names only)
 * @return Array The data structure with data on the requested article
 */
function get_article_data($pod, $options = []) {
  // set defaults
  if(!array_key_exists('shallow', $options)) {
    $options['shallow'] = FALSE;
  }
  
  global $this_pod;
  $this_pod = new LC\PodObject($pod, 'Articles');

  lc_data('pods_toplevel_ancestor', 309);
  global $nav_show_conferences;
  $nav_show_conferences = $pod_from_page;

  // trim trailing slash (may be added by Varnish)
  $obj['request_language'] = strtolower(pods_var(4, 'url'));//rtrim(strtolower(pods_url_variable('lang', 'get')), '/');
  
  // save current path (used to generate links to translation of article, if available)
  $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
  $obj['current_page_uri'] = $uri_parts[0];
  $obj['lang2_slug'] = $pod->field('language.slug');
  $obj['lang2_name'] = $pod->field('language.name');
  $article_layout = $pod->field('layout');

  $obj['parent_publication_id'] = $pod->field('in_publication.id');
  $publication_pod = pods('publication_wrappers', $obj['parent_publication_id']);
  lc_data('publication_pod', $publication_pod);

  // research programmes
  $obj['research_programmes'] = array_map(function($item) { return $item['permalink']; }, $pod->field('research_programmes'));
  
  // grab the featured image URI
  $obj['featured_image_uri'] = pods_image_url($pod->field('heading_image'), 'original');
  
  // grab the ToC image URI
  $obj['toc_image_uri'] = pods_image_url($pod->field('cover_image'), 'original');
  
  var_trace($obj['request_language'], 'request_language');
  var_trace($obj['lang2_slug'], 'article_lang2');

  if(!empty($obj['request_language']) && $obj['request_language'] == $obj['lang2_slug']) {
    $obj['article_title'] = $pod->field('title_lang2');
    $obj['article_subtitle'] = $pod->field('subtitle_lang2');
    $obj['article_abstract'] = do_shortcode($pod->display('abstract_lang2'));
    $obj['article_summary'] = do_shortcode($pod->display('summary_lang2'));
    
    // do not include full article text if we are generating shallow data
    if(TRUE !== $options['shallow']) {
      $obj['article_text'] = do_shortcode($pod->display('text_lang2'));
    }
    $obj['article_extra_content'] = do_shortcode($pod->display('extra_content_lang2'));
    $obj['article_author_info'] = do_shortcode($pod->display('author_info_lang2'));
    $obj['pdf_uri'] = wp_get_attachment_url($pod->field('article_pdf_lang2.ID', TRUE));
    if(empty($obj['pdf_uri'])) {
      $obj['pdf_uri'] = $pod->field('article_pdf_uri_lang2');
    }
  } else {
    $obj['article_title'] = $pod->field('name');
    $obj['permalink'] = $pod->field('slug');
    $obj['article_subtitle'] = $pod->field('article_subtitle');
    $obj['article_abstract'] = do_shortcode($pod->display('abstract'));
    $obj['article_summary'] = do_shortcode($pod->display('summary'));
    // do not include full article text if we are generating shallow data
    if(TRUE !== $options['shallow']) {
      $obj['article_text'] = do_shortcode($pod->display('text'));
    }
    $obj['article_extra_content'] = do_shortcode($pod->display('extra_content'));
    $obj['article_author_info'] = do_shortcode($pod->display('author_info'));
    $obj['pdf_uri'] = wp_get_attachment_url($pod->field('article_pdf.ID', TRUE));
    if(empty($obj['pdf_uri'])) {
      $obj['pdf_uri'] = $pod->field('article_pdf_uri');
    }
  }

  // prepend base URI
  if(!preg_match('/^https?:\/\//i', $obj['pdf_uri']) && !empty($obj['pdf_uri'])) {
    // Istanbul newspaper follows different URI template
    if($pod->field('in_publication.slug') == 'istanbul-city-of-intersections') {
      $obj['pdf_uri'] = 'http://v0.urban-age.net/publications/newspapers/' . $obj['pdf_uri'];
    } else {
      $obj['pdf_uri'] = "http://v0.urban-age.net/0_downloads/" . $obj['pdf_uri'];
    }
  }

  $obj['article_publishing_date'] = $pod->field('publishing_date');
  if(!$obj['article_publishing_date']) {
    $obj['article_publishing_date'] = $publication_pod->field('publishing_date');
  }
  $obj['article_tags'] = $pod->field('tags');
  
  $__article_authors = $pod->field('authors');
  
  if($options['shallow'] and is_array($__article_authors)) {
    // if preparing a shallow object, filter out the array items we don't need
    $obj['article_authors'] = \LSECitiesWPTheme\filter_items($__article_authors, ['name', 'family_name']);
  } elseif(is_array($__article_authors)) {
    // otherwise, just add the set of full linked objects
    $obj['article_authors'] = $__article_authors;
  } else {
    $obj['article_authors'] = NULL;
  }

  // fetch any attachments, replace hostname until we switch to WP+Pods for the whole website
  $obj['attachments'] = $pod->field('attachments');

  $data_gallery_permalink = $pod->field('gallery.slug');
  $obj['data_gallery'] = \LSECitiesWPTheme\photo_gallery_get_galleria_data($data_gallery_permalink);

  return $obj;
}
