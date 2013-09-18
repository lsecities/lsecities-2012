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
    $pod = pods('article', pods_url_variable(3));
    $pod_from_page = false;
  }

  global $this_pod;
  $this_pod = new LC\PodObject($pod, 'Articles');

  lc_data('pods_toplevel_ancestor', 309);
  global $nav_show_conferences;
  $nav_show_conferences = $pod_from_page;

  $lang = strtolower(pods_url_variable('lang', 'get'));
  $article_lang2 = $pod->field('language.slug');
  $article_layout = $pod->field('layout');

  $publication_pod = pods('publication_wrappers', $pod->field('in_publication.id'));
  lc_data('publication_pod', $publication_pod);

  // grab the image URI from the Pod
  $obj['featured_image_uri'] = wp_get_attachment_url($pod->field('heading_image.ID'));

  var_trace($lang, 'request_language');
  var_trace($article_lang2, 'article_lang2');

  if(!empty($lang) && $lang == $article_lang2) {
    $obj['article_title'] = $pod->field('title_lang2');
    $obj['article_subtitle'] = $pod->field('subtitle_lang2');
    $obj['article_abstract'] = do_shortcode($pod->field('abstract_lang2'));
    $obj['article_summary'] = do_shortcode($pod->field('summary_lang2'));
    $obj['article_text'] = do_shortcode($pod->field('text_lang2'));
    $obj['article_extra_content'] = do_shortcode($pod->field('extra_content_lang2'));
    $obj['pdf_uri'] = wp_get_attachment_url($pod->field('article_pdf_lang2.ID'));
    if(empty($obj['pdf_uri'])) {
      $obj['pdf_uri'] = $pod->field('article_pdf_uri_lang2');
    }
  } else {
    $obj['article_title'] = $pod->field('name');
    $obj['article_subtitle'] = $pod->field('article_subtitle');
    $obj['article_abstract'] = do_shortcode($pod->field('abstract'));
    $obj['article_summary'] = do_shortcode($pod->field('summary'));
    $obj['article_text'] = do_shortcode($pod->field('text'));
    $obj['article_extra_content'] = do_shortcode($pod->field('extra_content'));
    $obj['pdf_uri'] = wp_get_attachment_url($pod->field('article_pdf.ID'));
    if(empty($obj['pdf_uri'])) {
      $obj['pdf_uri'] = $pod->field('article_pdf_uri');
    }
  }

  // prepend base URI
  if(!preg_match('/^https?:\/\//i', $obj['pdf_uri']) && !empty($obj['pdf_uri'])) {
    // Istanbul newspaper follows different URI template
    if($pod->field('in_publication.slug') == 'istanbul-city-of-intersections') {
      $obj['pdf_uri'] = 'http://v0.urban-age.net/publications/newspapers/' . $pdf_uri;
    } else {
      $obj['pdf_uri'] = "http://v0.urban-age.net/0_downloads/" . $pdf_uri;
    }
  }

  $obj['article_publishing_date'] = $pod->field('publishing_date');
  if(!$obj['article_publishing_date']) {
    $obj['article_publishing_date'] = $publication_pod->field('publishing_date');
  }
  $obj['article_tags'] = $pod->field('tags');
  $obj['article_authors'] = $pod->field('authors');

  // fetch any attachments, replace hostname until we switch to WP+Pods for the whole website
  $obj['attachments'] = $pod->field('attachments');

  $obj['gallery'] = galleria_prepare($pod);

  return $obj;
}
