<?php
namespace LSECitiesWPTheme\publication;

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

function pods_prepare_publication($pod_slug) {
  $pod = pods('publication_wrappers', $pod_slug);
  
  var_trace(var_export($pod->fields(), TRUE), 'publication_POD');

  $obj['title'] = $pod->field('name');
  $obj['subtitle'] = $pod->field('publication_subtitle');
  $obj['abstract'] = do_shortcode($pod->field('abstract'));
  $obj['blurb'] = $pod->display('blurb');
  $obj['issuu_uri'] = $pod->field('issuu_uri');
  $obj['cover_image_uri'] = pods_image_url($pod->field('snapshot'), array(200,350));

  $obj['publication_category'] = $pod->field('category.slug');

  // get tiles for heading slider
  $obj['heading_slides'] = array();
  $slider_pod = pods('slide', $pod->field('heading_slides.slug'));
  if($slider_pod->exists()) {
    foreach((array)$slider_pod->field('tiles.slug') as $tile_slug) {
      $tile = pods('tile', $tile_slug);
      if($tile) {
        $obj['heading_slides'][] = pods_image_url($tile->field('image'), 'original');
      }
    }
  }

  /**
   * Fetch data for English language publication PDF and extra ('alt') publication PDF
   */
  $__publication_pdf = $pod->field('publication_pdf');
  $__publication_alt_pdf = $pod->field('publication_alt_pdf');
  $__publication_alt_pdf_label = $pod->field('publication_alt_pdf_label');

  $obj['pdf'] = $__publication_pdf ?
    wp_get_attachment_url($__publication_pdf['ID']) :
    $pod->field('publication_pdf_uri');
  $obj['pdf_filesize'] = $__publication_pdf ?
    sprintf("%0.1f MB", filesize(get_attached_file($__publication_pdf['ID'], TRUE)) / 1e+6 ) :
    '';
  $obj['alt_pdf'] = $__publication_alt_pdf ?
    wp_get_attachment_url($__publication_alt_pdf['ID']) :
    $pod->field('publication_alt_pdf_uri');
  $obj['alt_pdf_filesize'] = $__publication_alt_pdf ?
    sprintf("%0.1f MB", filesize(get_attached_file($__publication_alt_pdf['ID'], TRUE)) / 1e+6 ) :
    '';
  $obj['alt_pdf_label'] = $__publication_alt_pdf && $__publication_alt_pdf_label ?
    $__publication_alt_pdf_label :
    'Download extra content';

  /**
   * Fetch data for 2nd language publication PDF and extra ('alt') publication PDF
   */
  $__publication_pdf_lang2 = $pod->field('publication_pdf_lang2');
  $__publication_alt_pdf_lang2 = $pod->field('publication_alt_pdf_lang2');
  $__publication_alt_pdf_label_lang2 = $pod->field('publication_alt_pdf_label_lang2');
  
  if($pod->field('language.slug')) {
    $obj['pdf_lang2'] = $__publication_pdf_lang2 ?
      wp_get_attachment_url($__publication_pdf_lang2['ID']) :
      $pod->field('publication_pdf_lang2_uri');
    $obj['pdf_filesize_lang2'] = $__publication_pdf_lang2 ?
      sprintf("%0.1f MB", filesize(get_attached_file($__publication_pdf_lang2['ID'], TRUE)) / 1e+6 ) :
      '';
    $obj['alt_pdf_lang2'] = $__publication_alt_pdf_lang2 ?
      wp_get_attachment_url($__publication_alt_pdf_lang2['ID']) :
      $pod->field('publication_alt_pdf_lang2_uri');
    $obj['alt_pdf_filesize_lang2'] = $__publication_alt_pdf_lang2 ?
      sprintf("%0.1f MB", filesize(get_attached_file($__publication_alt_pdf_lang2['ID'], TRUE)) / 1e+6 ) :
      '';
    $obj['alt_pdf_label_lang2'] = $__publication_alt_pdf_label_lang2;
  }

  $obj['extra_publication_metadata'] = $pod->display('extra_publication_metadata');

  $obj['publication_authors']['list'] = people_list($pod->field('authors'), 'family_name', SORT_ASC);
  $obj['publication_authors']['string'] = implode(', ', $obj['publication_authors']['list']);
  
  $obj['publication_editors']['list'] = people_list($pod->field('editors'), 'family_name', SORT_ASC);
  $obj['publication_editors']['string'] = implode(', ', $obj['publication_editors']['list']);
  
  $obj['publication_contributors']['list'] = people_list($pod->field('contributors'), 'family_name', SORT_ASC);
  $obj['publication_contributors']['string'] = implode(', ', $obj['publication_contributors']['list']);

  $publication_partners_list = sort_linked_field($pod->field('partner_organizations'), 'name', SORT_ASC);
  if(is_array($publication_partners_list)) {
    foreach($publication_partners_list as $publication_partner) {
      if($publication_partner['web_uri']) {
        $publication_partners .= '<a href="' . $publication_partner['web_uri'] . '">' . $publication_partner['name'] . '</a>, ';
      } else {
        $publication_partners .= $publication_partner['name'] . ', ';
      }
    }
    $publication_partners = substr($publication_partners, 0, -2);
  }
  $obj['publication_partners']['string'] = $publication_partners;
  
  $obj['publication_catalogue_data'] = $pod->field('catalogue_data');
  $obj['publishing_date'] = $pod->field('publishing_date');

  $gallery_permalink = $pod->field('gallery.slug');
  $obj['gallery'] = \LSECitiesWPTheme\photo_gallery_get_galleria_data($gallery_permalink, 'fullbleed');

  $obj['wp_posts_reviews'] = array();
  if($pod->field('reviews_category.term_id')) {
    $obj['wp_posts_reviews'] = get_posts(array('category' => $pod->field('reviews_category.term_id'), 'numberposts' => 10));
  }
  
  return $obj;
}

/**
 * Compile list of people in a specific role (authors, editors, etc.)
 * @param PodsField $people_field the Pods field containing the list of people to process
 * @param string $sort_by the linked table's field on which to sort
 * @param int $sort_order whether to sort ascending or descending (SORT_ASC, SORT_DESC)
 * @return (bool|array) an array of people full names, or false if no people are found
 */
function people_list($people_field, $sort_by, $sort_order = SORT_ASC) {
  $result = array();
  
  // if a sort_by field name is provided, sort the people field
  if($sort_by and $sort_order) {
    $list = sort_linked_field($people_field, $sort_by, $sort_order);
  } else {
    $list = $people_field;
  }
  
  // if people field is empty, just return false
  if(!is_array($list)) {
    return FALSE;
  }
  
  foreach($list as $list_item) {
    $result[] = $list_item['name'] . ' ' . $list_item['family_name'];
  }
  
  return $result;
}

/**
 * Prepare the ToC of a publication, to be used
 * in side navigation (article pod) or publication pages
 * @param string $pod_slug the slug of the publication Pod
 * @return array data structure with publication ToC data (articles
 * grouped by section, if applicable)
 */
function pods_prepare_table_of_contents($pod_slug) {
  // retrieve pod by slug
  $pod = pods('publication_wrappers', $pod_slug);

  // return if no such pod was found
  if(!$pod->exists()) {
    return;
  }

  // initialize output array
  $obj = array();

  // Check category of publication; this is used to check whether
  // cover images for ToCs are needed
  $obj['publication_category'] = $pod->field('category.slug');
  
  $obj['title'] = $pod->field('name');

  if(count($pod->field('articles'))) {
    $sections = array();
    foreach(preg_split("/\n/", $pod->field('sections')) as $section_line) {
      preg_match("/^(\d+)?\s?(.*)$/", $section_line, $matches);
      array_push($sections, array( 'id' => $matches[1], 'title' => $matches[2]));
    }

    if(!count($sections)) {
      $sections = array("010" => "");
    }

    foreach($sections as $section) {
      $articles = array();

      foreach(sort_linked_field($pod->field('articles'), 'sequence', SORT_ASC) as $article) {

        $article_pod = pods('article', $article['id']);
        $article_lang2 = $article_pod->field('language');

				// TODO: just rely on full ordering when repeatable fields are available in Pods
				// here we are using substr because the leading zero from
				// $article['sequence'] is actually dropped by Pods when entering data as the
				// value is numeric; this only works if we never have more than 9 sections in
				// a single publication - more than fine for now.
				var_trace('section_substr: ' . substr($section['id'], 0, 1) . ', article_sequence: ' . $article['sequence']);

        if(preg_match("/^" . substr($section['id'], 0, 1) . "/", $article['sequence'])) {
          $this_article = array();

          $this_article['uri'] = PODS_BASEURI_ARTICLES . '/' . $article['slug'] . '/en-gb/';
          $this_article['title'] = $article['name'];
          if(!empty($article_lang2['name'])) {
            $this_article['lang2_uri'] = PODS_BASEURI_ARTICLES . '/' . $article['slug'] . '/' . strtolower($article_lang2['language_code']) . '/';
            $this_article['lang2_title'] = $article['title_lang2'];
            $this_article['lang2_langname'] = $article_lang2['name'];
          }

          $this_article['authors'] = array();

          foreach(sort_linked_field($article_pod->field('authors'), 'family_name', SORT_ASC) as $author) {
            $this_article['authors'][] = $author['name'] . ' ' . $author['family_name'];
          }

          // If this is the ToC for a data publication, add ToC cover
          // images for each article
          if('research-data' == $obj['publication_category']) {
            // grab the cover image image URI, 1000x1000px crop
            $cover_image_uri = pods_image_url($article_pod->field('cover_image'), [ 1000, 1000 ]);
            // if none is set and a featured image is available, use that (but crop it as it may be very large)
            if(empty($cover_image_uri) and $article_pod->field('heading_image')) {
              $cover_image_uri = pods_image_url($article_pod->field('heading_image'), [ 1000, 1000 ]);
            }
          }

          $articles[] = array(
            'title' => $this_article['title'],
            'uri' => $this_article['uri'],
            'authors' => $this_article['authors'],
            'cover_image_uri' => $cover_image_uri,
            'lang2_title' => $this_article['lang2_title'],
            'lang2_uri' => $this_article['lang2_uri'],
            'lang2_langname' => $this_article['lang2_langname']
          );
        }
      }

      // only add section if it is not empty (i.e. has 1+ articles)
      if(count($articles)) {
        $obj['sections'][] = array(
          'id' => $section['id'],
          'title' => $section['title'],
          'articles' => $articles
        );
      }
    }
  }

  return $obj;
}
